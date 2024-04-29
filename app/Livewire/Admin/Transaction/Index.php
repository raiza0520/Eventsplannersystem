<?php

namespace App\Livewire\Admin\Transaction;

use Livewire\Component;

use App\Models\Transaction;

class Index extends Component
{
    public $transactions = [];

    public function mount()
    {
        $this->transactions = $this->transactions()->get();
    }

    public $search;
    
    public function updatedSearch($value) 
    {
        $this->transactions = Transaction::where(function ($transactions) use ($value) {
            $transactions->whereHas('user', function ($user) use ($value) {
                $user->where('name', 'like', '%' . $value . '%');
            });

            $transactions->orWhereHas('package', function ($package) use ($value) {
                $package->where('name', 'like', '%' . $value . '%');
            });
        })
        ->get();
    }
    public function filteredStatus(){
        
    }
    public function refresh()
    {
        $this->transactions = $this->transactions()->get();
    }
    public function transactions()
    {
        return Transaction::with(['user', 'reservation'])->latest();
    }
    
    public function render()
    {
        return view('livewire.admin.transaction.index')->extends('layouts.admin.app');
    }
}
