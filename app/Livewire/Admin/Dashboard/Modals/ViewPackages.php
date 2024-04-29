<?php

namespace App\Livewire\Admin\Dashboard\Modals;

use Livewire\Component;

use App\Models\Package;

class ViewPackages extends Component
{
    public $modal;

    public $packages = [];

    public function mount() {
        $this->packages = $this->packages()->get();
    }
    
    public function packages() {
        return Package::where('status', true);
    }
    
    public function render()
    {
        return view('livewire.admin.dashboard.modals.view-packages');
    }
}
