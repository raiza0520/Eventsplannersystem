<?php

namespace App\Livewire\Admin\Gallery\Modals;

use Livewire\{Component, WithFileUploads};
use Livewire\Attributes\Rule;

use App\Models\Gallery;

class AddImage extends Component
{
    use WithFileUploads;

    public $modal;

    #[Rule('required|file|mimes:jpg,jpeg,png|max:5120')]
    public $file;

    #[Rule('required')]
    public $type;

    public function save() {
        if ($this->validate()) {
            $gallery = Gallery::create([
                'type' => $this->type
            ]);
    
            $gallery->addMedia($this->file)->toMediaCollection('gallery');
    
            return redirect()->route('gallery');
        }
    }

    public function render()
    {
        return view('livewire.admin.gallery.modals.add-image');
    }
}
