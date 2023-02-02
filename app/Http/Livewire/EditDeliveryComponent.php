<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class EditDeliveryComponent extends Component
{
    public $delivery_id;
    public $state;
    public $basic_cost;
    public $waiting_time;
    public $company_id;

    public function mount($delivery_id)
    {
        $delivery = Company::find($delivery_id);
        $this->state = $delivery->state;
        $this->basic_cost = $delivery->basic_cost;
        $this->waiting_time = $delivery->waiting_time;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'state' => 'required',
            'basic_cost' => 'required|numeric',
            'waiting_time' => 'required'
        ]);
    }

    public function updateDelivery()
    {
        $this->validate([
            'state' => 'required',
            'basic_cost' => 'required|numeric',
            'waiting_time' => 'required'
        ]);

        $delivery = Company::find($this->delivery_id);
        $delivery->state = $delivery->state;
        $delivery->basic_cost = $delivery->basic_cost;
        $delivery->waiting_time = $delivery->waiting_time;
        $delivery->save();
        session()->flash('message', 'Delivery has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.edit-delivery-component')->layout('layouts.base');
    }
}
