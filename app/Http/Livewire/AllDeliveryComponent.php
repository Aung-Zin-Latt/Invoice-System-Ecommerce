<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\NinjavanDelivery;
use App\Models\RoyalDelivery;
use Livewire\Component;

class AllDeliveryComponent extends Component
{
    public $search;

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        session()->flash('success', 'Delivery has been deleted successfully!');
    }

    public function render()
    {
        if($this->search)
        {
            $allDeliveries = Company::where('state','LIKE', '%'. $this->search . '%')->orderBy('id', 'DESC')->paginate(5);
        }else {

            $allDeliveries = Company::orderBy('id', 'DESC')->paginate(20);
        }

        return view('livewire.all-delivery-component', [
            'allDeliveries' => $allDeliveries
        ])->layout('layouts.base');
    }
}
