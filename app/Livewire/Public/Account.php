<?php

namespace App\Livewire\Public;

use Livewire\Component;

class Account extends Component
{
    public $tab;

    public function render()
    {
        return view('livewire.public.account')->extends('layouts.public.app');
    }
}
