<?php

namespace App\Http\Livewire;

use DB;
use Cart;
use Cache;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrdersComponent extends Component
{

    public $daily;
    public $orders_by_date;
    public $date = 'daily';
    public $daile_orders;
    public function store($order_id)
    {
        $orderItems = Cache::remember("order-items-{$order_id}", now()->addMinute(10), function () use ($order_id) {
            return OrderItem::where('order_id', $order_id)->get();
        });

        foreach ($orderItems as $order_item) {
            Cart::instance('cart')->add($order_item->product_id, $order_item->product->name, $order_item->quantity, $order_item->product->sale_price)->associate('App\Models\Product');
        }
        session()->flash('success_message', 'Item added in Cart');
        $this->emitTo('cart-count-component', 'refreshComponent');
        return redirect('/cart');
    }
    public function updateOrderStatus($order_id, $status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        if ($status == "delivered") {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        } else if ($status == "canceled") {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message', 'Order status has been updated successfully!');
    }
    // print preview
    // Delete Order
    public function destroy($id)
    {
        Order::find($id)->delete();
        session()->flash('success', 'Order Deleted!');
    }

    public function render()
    {
        $orders = Order::get();
        if ($this->daily == 'daily') {
            $orders = Order::whereDate('created_at', Carbon::today())->orderBy('id', 'DESC')->paginate(12);
        }
        elseif ($this->date)
        {
            $orders = Order::whereDate('created_at', $this->date)->orderBy('id', 'DESC')->paginate(12);
        } else {
            $orders = Order::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'DESC')->paginate(12);
        }

        return view('livewire.orders-component', [
            'orders' => $orders,
        ])->layout('layouts.base');
    }
}
