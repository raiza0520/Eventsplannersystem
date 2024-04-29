<?php

namespace App\Livewire\Admin\Transaction\Modals;

use Livewire\Component;

class Receipt extends Component
{
    public $modal;
    public $transaction = [];

    public function render()
    {
        return view('livewire.admin.transaction.modals.receipt');
    }
}
