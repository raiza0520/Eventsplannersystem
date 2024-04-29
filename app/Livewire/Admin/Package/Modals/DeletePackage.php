<?php

namespace App\Livewire\Admin\Package\Modals;

use Livewire\Component;
use Livewire\Attributes\On; 

use App\Models\{Package, Service};

class DeletePackage extends Component
{
    public $modal;

    public $id;
    public $name;
    public $service_id;
    public $no_of_pax;
    public $inclusions;
    public $status;

    public $services = [];
    
    protected $listeners = ['selectedPackageData'];

    public function mount() 
    {
        $this->services = $this->services()->get();
    }

    public function delete() 
    {
        Package::find($this->id)->delete();
        
        return redirect()->route('packages');
    }

    #[On('selected-package')]
    public function data(Package $package) 
    {
        $this->id = $package->id;
        $this->name = $package->name;
        $this->service_id = $package->service_id;
        $this->no_of_pax = $package->no_of_pax;
        $this->inclusions = $package->inclusions;
        $this->status = $package->status;
    }

    public function services() 
    {
        return Service::where('status', true);
    }

    public function render()
    {
        return view('livewire.admin.package.modals.delete-package');
    }
}
