<?php

namespace App\Livewire\Admin\Transaction;

use Livewire\Component;

use App\Models\{Package, Transaction, Reservation, Payment, ItemType};

class Manage extends Component
{
    public Transaction $transaction;

    public $package;
    public $reservation;
    public $payment;
    public $item_types;

    public function mount()
    {
        $this->package = $this->transaction->package->with('service')->first();
        $this->reservation = $this->transaction->reservation;
        $this->payment = $this->transaction->payment;
        $this->item_types = $this->item_types();
    }

    
    public function updateRemarks($value) {
        if (in_array($value, ['accepted', 'declined', 'cancelled'])) {
            $this->transaction->update([
                'remarks' => $value
            ]);
        }

        return redirect()->route('transactions.manage', ['transaction' => $this->transaction->id]);
    }
    public function item_types() {
        return ItemType::all();
    }
    public function render()
    {
        return view('livewire.admin.transaction.manage')->extends('layouts.admin.app');
    }
}
