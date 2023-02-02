<?php

namespace App\Http\Livewire;

use App\Models\CompanyType;
use Livewire\Component;

class DeliveryCompanyComponent extends Component
{
    public $search;

    public function destroy($id)
    {
        $company_type = CompanyType::find($id);
        $company_type->delete();
        session()->flash('success', 'Delivery has been deleted successfully!');
    }

    public function render()
    {
        if($this->search)
        {
            $all_company_types = CompanyType::where('name','LIKE', '%'. $this->search . '%')->paginate(5);
        }else {

            $all_company_types = CompanyType::paginate(20);
        }

        return view('livewire.delivery-company-component', [
            'all_company_types' => $all_company_types,
        ])->layout('layouts.base');
    }
}
