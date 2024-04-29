<?php

namespace App\Livewire\Public\Components\Tabs;

use Livewire\Component;

use App\Models\{Transaction AS TransactionModel, ItemType, Payment};

class Transaction extends Component
{
    public $payment_modal = false;
    
    public $transactions = [];
    public $item_types;
    public $payments = [];

    public function mount()
    {
        $this->transactions = $this->userTransactions(auth()->user()->id)->get();
        $this->item_types = $this->item_types();
        $this->payments = $this->userPayments();
    }

    public function transactions()
    {
        return TransactionModel::with(['user', 'package', 'reservation', 'payment'])->latest();
    }
    
    public function userTransactions($user_id)
    {
        return $this->transactions()->where('user_id', $user_id);
    }
    public function userPayments()
    {
        return Payment::all();
    }
    public function togglePaymentModal($id) {
        $this->payment_modal = !$this->payment_modal;
        
        $this->dispatch('selected-paymnet-form', payment: $id);
    }
    public function item_types() {
        return ItemType::all();
    }
    public function render()
    {
        return view('livewire.public.components.tabs.transaction');
    }
}
