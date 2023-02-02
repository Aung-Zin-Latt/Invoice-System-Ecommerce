<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\City;
use App\Models\Company;
use App\Models\CompanyType;
use App\Models\Country;
use App\Models\NinjavanDelivery;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PotatoDelivery;
use App\Models\Product;
use App\Models\RoyalDelivery;
use App\Models\Shipping;
use App\Models\Township;
use App\Models\Transaction;
use Cache;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Str;

class AddOrderCheckoutComponent extends Component
{
    public $selectedCountry = null;
    public $selectedCity = null;
    public $selectedTownship = null;

    public $cities = null;
    public $townships = null;

    public $ship_to_different;
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;

    public $zipcode;
    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_selectedCountry = null;
    public $s_selectedCity = null;
    public $s_selectedTownship = null;
    public $s_zipcode;
    public $paymentmode;
    public $thankyou;
    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;
    public $signed;

    // delivery property
    public $delivery;
    public $services;
    public $total;
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            // 'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'selectedCountry' => 'required',
            'selectedCity' => 'required',
            'selectedTownship' => 'required',
            // 'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);
        if ($this->ship_to_different) {
            $this->validateOnly($fields, [
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required|numeric',
                's_line1' => 'required',
                's_selectedCountry' => 'required',
                's_selectedCity' => 'required',
                's_selectedTownship' => 'required',
                's_zipcode' => 'required',
            ]);
        }
        if ($this->paymentmode == 'card') {
            $this->validateOnly($fields, [
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
            ]);
        }
    }
    public function placeOrder()
    {


        DB::transaction(function () {
            $this->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'mobile' => 'required|numeric',
                'line1' => 'required',
                'selectedCountry' => 'required',
                'selectedCity' => 'required',
                'selectedTownship' => 'required',
                'paymentmode' => 'required',
                'delivery' => 'required'
            ]);

            $order = new Order();
            $order->user_id = Auth::user()->id;
            // Calculate Delivery Charge
            if( $this->delivery == '1')
            {
                $states = Township::where('id', $this->selectedTownship)->get();
                foreach($states as $state )
                {
                    $d_charges = RoyalDelivery::where('name', $state->name)->pluck('basic_cost');
                }
                $deliver_company = "Royal Delivery Service";
            }elseif($this->delivery == 2) {
                $states = Township::where('id', $this->selectedTownship)->get();
                foreach($states as $state )
                {
                    $d_charges = NinjavanDelivery::where('name', $state->name)->pluck('basic_cost');
                }
                $deliver_company = "Ninjavan Delivery Service";
            }else {
                $states = Township::where('id', $this->selectedTownship)->get();
                foreach($states as $state )
                {
                    $d_charges = PotatoDelivery::where('name', $state->name)->pluck('basic_cost');
                }
                $deliver_company = "Potato Delivery Service";
            }
            if(session()->get('checkout'))
            {
                $order->subtotal = session()->get('checkout')['subtotal'];
                $order->discount = session()->get('checkout')['discount'];
                $order->total = session()->get('checkout')['total'];
            } else{
                $order->subtotal = 0;
                $order->discount = 0;
                $order->tax = 0;
                $order->total = $this->total;
            }

            $order->firstname = $this->firstname;
            $order->lastname = $this->lastname;
            if($this->email)
            {
                $order->email = $this->email;
            }else {
                $order->email = Auth::user()->email;
            }
            $order->mobile = $this->mobile;
            $order->line1 = $this->line1;
            $order->line2 = $this->line2;

            $order->country_id = $this->selectedCountry;
            $order->city_id = $this->selectedCity;
            $order->township_id = $this->selectedTownship;
            if($this->zipcode)
            {
                $order->zipcode = $this->zipcode;
            }else {
                $order->zipcode = '110112';
            }
            $order->status = 'ordered';
            $order->is_shipping_different = $this->ship_to_different ? 1 : 0;
            // save Devlivery Charge and Company
            foreach($d_charges as $d_charge)
            {
                $order->delivery_charge = $d_charge;
            }
            $order->delivery_company = $deliver_company;

            // Save User Sign
            $order->user_sign = $this->signed;
            $order->save();


            foreach (Cart::instance('cart')->content() as $item) {
                $orderItem = new OrderItem();
                $orderItem->product_id = $item->id;
                $orderItem->order_id = $order->id;
                $orderItem->order_id;
                $orderItem->price = $item->price;
                $orderItem->quantity = $item->qty;
                if ($item->options) {
                    $orderItem->options = serialize($item->options);
                }
                $orderItem->save();
                // try {
                //     Product::find($item->id)->decrement('quantity', $item->qty);
                // } catch (\Exception $e) {
                //     dd($e);
                // }
            }
            if ($this->ship_to_different) {
                $this->validate([
                    's_firstname' => 'required',
                    's_lastname' => 'required',
                    's_email' => 'required|email',
                    's_mobile' => 'required|numeric',
                    's_line1' => 'required',
                    's_selectedCountry' => 'required',
                    's_selectedCity' => 'required',
                    's_selectedTownship' => 'required',
                    's_zipcode' => 'required',
                ]);
                $shipping = new Shipping();
                $shipping->order_id = $order->id;
                $shipping->firstname = $this->s_firstname;
                $shipping->lastname = $this->s_lastname;
                $shipping->email = $this->s_email;
                $shipping->mobile = $this->s_mobile;
                $shipping->line1 = $this->s_line1;
                $shipping->line2 = $this->s_line2;
                $shipping->country_id = $this->s_selectedCountry;
                $shipping->city_id = $this->s_selectedCity;
                $shipping->township_id = $this->s_selectedTownship;
                $shipping->zipcode = $this->s_zipcode;
                $shipping->save();
            }
            if ($this->paymentmode == 'cod') {
                $this->makeTransaction($order->id, 'pending');
                $this->resetCart();
            }

            $this->sendOrderConfirmationMail($order);
        });
    }
    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }
    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentmode;
        $transaction->status = $status;
        $transaction->save();
    }
    public function sendOrderConfirmationMail($order)
    {
        try {
            Mail::to($this->email)->send(new OrderMail($order));
        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou) {
            return redirect()->route('thankyou');
        }
        //  else if (!session()->get('checkout')) {
        //     return redirect()->route('product.cart');
        // }
    }

    public function render()
    {
        if($this->delivery == 1)
        {
            $states = Township::where('id', $this->selectedTownship)->get();
            foreach($states as $state )
            {
                $this->services = Company::where('state', $state->name)
                                            ->where('company_id', $this->delivery)->get();
            }
        }

        $countries = Cache::remember('countries', now()->addMinute(10), function () {
            return Country::get();
        });
        // Get Delivery Companies
        $delivery_companies = CompanyType::get();

        $this->verifyForCheckout();

        return view('livewire.add-order-checkout-component', [
            'countries' => $countries,
            'services' => $this->services,
            'delivery_companies' => $delivery_companies
        ])->layout('layouts.base');
    }

    public function updatedSelectedCountry($country_id)
    {
        $this->cities = City::where('country_id', $country_id)->get();
    }
    public function updatedSelectedCity($city_id)
    {
        $this->townships = Township::where('city_id', $city_id)->get();
    }
    public function updatedShippingSelectedCountry($country_id)
    {
        $this->cities = City::where('country_id', $country_id)->get();
    }
    public function updatedShippingSelectedCity($city_id)
    {
        $this->townships = Township::where('city_id', $city_id)->get();
    }
}
