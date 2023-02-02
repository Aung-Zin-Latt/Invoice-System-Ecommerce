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
        session()->flash('success', 'Successfully Deleted');
    }

    public function render()
    {
        if($this->search)
        {
            $allDeliveries = Company::where('state','LIKE', '%'. $this->search . '%')->paginate(5);
        }else {

            $allDeliveries = Company::paginate(20);
        }

        return view('livewire.all-delivery-component', [
            'allDeliveries' => $allDeliveries
        ])->layout('layouts.base');
    }
}
