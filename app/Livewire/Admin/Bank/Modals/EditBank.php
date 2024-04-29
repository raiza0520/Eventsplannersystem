<?php

namespace App\Livewire\Admin\Bank\Modals;

use Livewire\Component;
use Livewire\Attributes\{On, Rule}; 

use App\Models\Bank;

class EditBank extends Component
{
    public $modal;

    #[Rule('required|max:50')]
    public $name;
    #[Rule('required|max:50')]
    public $account_name;
    #[Rule('required|max:50')]
    public $account_number;
    public $status;

    public $bank = [];

    #[On('selected-bank')]
    public function data(Bank $bank) {
        $this->bank = $bank;
        $this->name = $bank->name;
        $this->account_name = $bank->account_name;
        $this->account_number = $bank->account_number;
        $this->status = $bank->status;
    }

    public function update() {
        if ($this->validate()) {
            $this->bank->update([
                'name' => $this->name,
                'account_name' => $this->account_name,
                'account_number' => $this->account_number,
                'status' => $this->status,
            ]);
    
            return redirect()->route('banks');
        }
    }

    public function render()
    {
        return view('livewire.admin.bank.modals.edit-bank');
    }
}
