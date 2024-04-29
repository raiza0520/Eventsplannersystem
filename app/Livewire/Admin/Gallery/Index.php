<?php

namespace App\Livewire\Admin\Gallery;

use Livewire\Component;

use App\Models\Gallery;

class Index extends Component
{
    public $edit_image_modal = false;

    public $images = [];

    public function mount() {
        $this->images = $this->gallery();
    }

    public function toggleEditImageModal($id) {
        $this->edit_image_modal = !$this->edit_image_modal;
        
        $this->dispatch('selected-image', gallery: $id);
    }
    
    public function gallery() {
        return Gallery::all();
    }

    public function render()
    {
        return view('livewire.admin.gallery.index')->extends('layouts.admin.app');
    }
}
