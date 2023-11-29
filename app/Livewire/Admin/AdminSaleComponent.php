<?php

namespace App\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleComponent extends Component
{
    public $sale_date;
    public $status;

    public function mount(){
        $sale = Sale::find(1);
        $this->sale_date = $sale->sale;
        $this->status= $sale->status;
    }

    public function updateSale(){
        $sale = Sale::find(1);
        $sale->sale = $this->sale_date;
        $sale->status = $this->status;
        $sale->save();
        session()->flash('message', 'Sale date updated!!');
    }
    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout('layouts.base');
    }
}