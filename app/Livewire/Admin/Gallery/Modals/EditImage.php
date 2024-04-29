<?php

namespace App\Livewire\Admin\Gallery\Modals;

use Livewire\{Component, WithFileUploads};
use Livewire\Attributes\{On, Rule}; 

use App\Models\Gallery;

class EditImage extends Component
{
    use WithFileUploads;

    public $modal;

    #[Rule('required')]
    public $type;
    #[Rule('file|mimes:jpg,jpeg,png|max:5120')]
    public $file;
    public $status;

    public $gallery = [];

    #[On('selected-image')]
    public function data(Gallery $gallery) {
        $this->gallery = $gallery;
        $this->type = $gallery->type;
        $this->status = $gallery->status;
    }

    public function update() {
        if ($this->validateOnly('type')) {
            $this->gallery->update([
                'type' => $this->type,
                'status' => $this->status,
            ]);
    
            if ($this->file && $this->validateOnly('file')) {
                $this->gallery->addMedia($this->file)->toMediaCollection('gallery');
            }
    
            return redirect()->route('gallery');
        }
    }

    public function render()
    {
        return view('livewire.admin.gallery.modals.edit-image');
    }
}
