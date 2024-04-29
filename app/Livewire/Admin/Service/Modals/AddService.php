<?php

namespace App\Livewire\Admin\Service\Modals;

use Livewire\{Component, WithFileUploads};
use Livewire\Attributes\Rule;

use App\Models\Service;

class AddService extends Component
{
    use WithFileUploads;

    public $modal;

    #[Rule('required|unique:services,name|max:50')]
    public $name;

    #[Rule('required|file|mimes:jpg,jpeg,png|max:5120')]
    public $file;

    public function save() {
        if ($this->validate()) {
            $service = Service::create([
                'name' => $this->name
            ]);
    
            $service->addMedia($this->file)->toMediaCollection('services');
    
            return redirect()->route('services');
        }
    }

    public function render()
    {
        return view('livewire.admin.service.modals.add-service');
    }
}
