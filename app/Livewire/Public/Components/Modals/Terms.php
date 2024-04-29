<?php

namespace App\Livewire\Public\Components\Modals;

use Livewire\Component;

class Terms extends Component
{
    public $modal;

    public function render()
    {
        return view('livewire.public.components.modals.terms')->extends('layouts.public.app');
    }
}