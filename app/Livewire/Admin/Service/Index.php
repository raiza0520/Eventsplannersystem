<?php

namespace App\Livewire\Admin\Service;

use Livewire\Component;

use App\Models\Service;

class Index extends Component
{
    

    public $edit_service_modal = false;

    public $services = [];

    public function mount() {
        $this->services = $this->services();
    }

    public $search;
    
    public function updatedSearch($value) 
    {
        $this->services = Service::where('name', 'LIKE', '%' . $value . '%')->get();
    }

    public function toggleEditServiceModal($id) {
        $this->edit_service_modal = !$this->edit_service_modal;
        
        $this->dispatch('selected-service', service: $id);
    }
    
    public function services() {
        return Service::all();
    }

    public function render()
    {
        return view('livewire.admin.service.index')->extends('layouts.admin.app');
    }
}
