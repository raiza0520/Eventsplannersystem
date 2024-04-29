<?php

namespace App\Livewire\Public;

use Livewire\Component;

use App\Models\Gallery;

class Index extends Component
{
    public $current = 0;

    public $images = [];

    public function mount() {
        $this->images = $this->gallery()->get();
    }

    public function toggleNext()
    {
        $this->current = ($this->current + 1) % count($this->images);
    }

    public function togglePrevious()
    {
        $this->current = ($this->current - 1 + count($this->images)) % count($this->images);
    }
    
    public function gallery() {
        return Gallery::where('type', 'carousel');
    }

    public function render()
    {
        return view('livewire.public.index')->extends('layouts.public.app');
    }
}
