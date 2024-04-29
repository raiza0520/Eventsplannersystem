<?php

namespace App\Livewire\Admin\Transaction\Modals;

use Livewire\Component;
use Livewire\Attributes\{On, Rule}; 

use App\Models\Transaction;

class Reason extends Component
{

    public $modal;
    public $transaction = [];


    public function render()
    {
        return view('livewire.admin.transaction.modals.reason');
    }
}
