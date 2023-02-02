<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddDeliveryCompanyComponent extends Component
{
    public $name;

    public function updated($fields) {
        
    }

    public function addDeliveryCompany()
    {
        $company_type = new CompanyType();
        $company_type->name = $this->name;
        $company_type->save();
        session()->flash('message', 'Delivery company name has been added successfully!');
    }

    public function render()
    {
        return view('livewire.add-delivery-company-component')->layout('layouts.base');
    }
}
