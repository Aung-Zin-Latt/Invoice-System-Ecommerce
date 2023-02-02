<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Company;
use App\Models\CompanyType;
use Livewire\Component;

class AddDeliveryComponent extends Component
{
    public $name;
    public $state;
    public $basic_cost;
    public $waiting_time;
    public $company_id;
    // Validation
    public function updated($fileds)
    {
        $this->validateOnly($fileds,[
            'name' => 'required',
            'state' => 'required',
            'basic_cost' => 'required',
            'waiting_time' => 'required'
        ]);
    }
    // Delivery Compnay Name
    public function addDeliveryCompanyName()
    {
        $company_type = new CompanyType();
        $company_type->name = $this->name;
        $company_type->save();
        session()->flash('message', 'Successfully Added Delivery Company Name');
    }

    // Add Develivery
    public function addNewDelivery()
    {
        $this->validate([
            'name' => 'required',
            'state' => 'required',
            'basic_cost' => 'required',
            'waiting_time' => 'required'
        ]);
        $company = new Company();
        $company->state = $this->state;
        $company->basic_cost = $this->basic_cost;
        $company->waiting_time = $this->waiting_time;
        $company->company_id = $this->company_id;
        $company->save();
        session()->flash('message', 'Successfuly added New Delivery State');
    }

    public function render()
    {
        $delivery_companies = CompanyType::get();
        $states = City::get();

        return view('livewire.add-delivery-component', [
            'delivery_companies' => $delivery_companies,
            'states' => $states,
        ])->layout('layouts.base');
    }
}
