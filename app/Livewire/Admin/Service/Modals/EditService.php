<?php

namespace App\Livewire\Admin\Service\Modals;

use Livewire\{Component, WithFileUploads};
use Livewire\Attributes\{On, Rule}; 

use App\Models\Service;

class EditService extends Component
{
    use WithFileUploads;

    public $modal;
    #[Rule('required|max:50')]
    public $name;
    #[Rule('file|mimes:jpg,jpeg,png|max:1024')]
    public $file;
    public $status;

    public $service = [];

    #[On('selected-service')]
    public function data(Service $service) {
        $this->service = $service;
        $this->name = $service->name;
        $this->status = $service->status;
    }

    public function update() {
        if ($this->validateOnly('name')) {
            $this->service->update([
                'name' => $this->name,
                'status' => $this->status,
            ]);
    
            if ($this->file && $this->validateOnly('file')) {
                $this->service->addMedia($this->file)->toMediaCollection('services');
            }
    
            return redirect()->route('services');
        }
    }

    public function render()
    {
        return view('livewire.admin.service.modals.edit-service');
    }
}
