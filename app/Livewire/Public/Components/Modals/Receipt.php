<?php

namespace App\Livewire\Public\Components\Modals;

use Livewire\Component;

class Receipt extends Component
{
    public $modal;
    public $transaction = [];

    public function render()
    {
        return view('livewire.public.components.modals.receipt');
    }
}
