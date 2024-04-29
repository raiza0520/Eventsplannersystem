<?php

namespace App\Livewire\Public;

use Livewire\Component;

use App\Models\Gallery;

class Portfolio extends Component
{
    public $images = [];

    public function mount() {
        $this->images = $this->gallery()->get();
    }
    
    public function gallery() {
        return Gallery::where('type', 'portfolio');
    }

    public function render()
    {
        return view('livewire.public.portfolio')->extends('layouts.public.app');
    }
}
