<?php

namespace App\Livewire\Public;

use Livewire\Component;

class AboutUs extends Component
{
    public function render()
    {
        return view('livewire.public.about-us')->extends('layouts.public.app');
    }
}
