<?php

namespace App\Livewire\Public;

use Livewire\Component;

use App\Models\Service;

class Services extends Component
{
    public $services = [];

    public function mount() {
        $this->services = $this->services()->get();
    }

    public function services() {
        return Service::where('status', true);
    }

    public function render()
    {
        return view('livewire.public.services')->extends('layouts.public.app');
    }
}
