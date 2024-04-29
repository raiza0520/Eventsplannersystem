<?php

namespace App\Livewire\Admin\Bank;

use Livewire\Component;

use App\Models\Bank;

class Index extends Component
{
    public $edit_bank_modal = false;

    public $banks = [];

    public function mount() {
        $this->banks = $this->banks();
    }

    public $search;
    
    public function updatedSearch($value) 
    {
        $this->banks = Bank::where(function ($bank) use ($value)
        {
            $bank->where('name', 'LIKE', '%' . $value . '%');
            $bank->orWhere('account_name', 'LIKE', '%' . $value . '%');
            $bank->orWhere('account_number', 'LIKE', '%' . $value . '%');
        })
        ->get();
    }

    public function toggleEditBankModal($id) {
        $this->edit_bank_modal = !$this->edit_bank_modal;
        
        $this->dispatch('selected-bank', bank: $id);
    }
    
    public function banks() {
        return Bank::all();
    }

    public function render()
    {
        return view('livewire.admin.bank.index')->extends('layouts.admin.app');
    }
}
