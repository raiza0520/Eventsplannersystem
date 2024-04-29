<?php

namespace App\Livewire\Admin\Dashboard\Modals;

use Livewire\Component;

class ViewProfile extends Component
{
    public $modal;
    
    public function mount() 
    {
        $this->name = auth()->user()->name;
    }

    public function render()
    {
        return view('livewire.admin.dashboard.modals.view-profile');
    }
}
