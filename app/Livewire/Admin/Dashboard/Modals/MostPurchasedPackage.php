<?php

namespace App\Livewire\Admin\Dashboard\Modals;

use Livewire\Component;

use App\Models\{Package, Service};

class MostPurchasedPackage extends Component
{
    public $modal;
    public $service_id;

    public $packages = [];
    public $services = [];

    public function mount() 
    {
        $this->packages = $this->packages()->get();
        $this->services = $this->services()->get();
    }

    public function updatedServiceId($value) 
    {
        $this->packages = $this->packages()->where('service_id', $value)->get();
    }

    public function packages() 
    {
        return Package::withSum(['transactions' => function ($transactions) {
            $transactions->where('remarks', 'accepted');
            $transactions->whereBetween('created_at', [date('Y-m-01'), date('Y-m-t')]);
        }], 'total_amount')
        ->where('status', true);
    }

    public function services() 
    {
        return Service::where('status', true);
    }

    public function render()
    {
        return view('livewire.admin.dashboard.modals.most-purchased-package');
    }
}
