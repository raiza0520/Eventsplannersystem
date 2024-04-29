<?php

namespace App\Livewire\Admin\Bank\Modals;

use Livewire\Component;
use Livewire\Attributes\Rule;

use App\Models\Bank;

class AddBank extends Component
{
    public $modal;

    #[Rule('required|unique:services,name|max:50')]
    public $name;
    #[Rule('required|max:50')]
    public $account_name;
    #[Rule('required|max:50')]
    public $account_number;

    public function save() {
        if ($this->validate()) {
            $service = Bank::create([
                'name' => $this->name,
                'account_name' => $this->account_name,
                'account_number' => $this->account_number,
            ]);
    
            return redirect()->route('banks');
        }
    }

    public function render()
    {
        return view('livewire.admin.bank.modals.add-bank');
    }
}
