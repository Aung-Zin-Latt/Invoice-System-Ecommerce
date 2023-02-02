<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Profile;
use Cache;
use Carbon\Carbon;
use FunctionName;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderPrintComponent extends Component
{
    public $date;

    public function mount($date)
    {
        $this->date = $date;
    }

    public function render()
    {
        if ($this->date == 'daily') {
            $order_items =  OrderItem::whereDate('created_at', Carbon::today())->orderBy('id', 'DESC')->get();
            $allOrders =   Order::whereDate('created_at', Carbon::today())->orderBy('id', 'DESC')->get();
        }
        $order_items =  OrderItem::whereDate('created_at', $this->date)->orderBy('id', 'DESC')->get();
        $allOrders =  Order::whereDate('created_at', $this->date)->orderBy('id', 'DESC')->get();
        $users =  Profile::where('user_id', Auth::user()->id)->first();

        return view('livewire.order-print-component', [
            'allOrders' => $allOrders,
            'order_items' => $order_items,
            'users' => $users
        ])->layout('layouts.base');
    }
}
