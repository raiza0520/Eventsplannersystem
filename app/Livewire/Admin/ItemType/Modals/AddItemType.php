<?php

namespace App\Livewire\Admin\ItemType\Modals;

use Livewire\{Component, WithFileUploads};
use Livewire\Attributes\Rule;

use App\Models\ItemType;

class AddItemType extends Component
{
    use WithFileUploads;

    public $modal;

    #[Rule('required|file|mimes:jpg,jpeg,png|max:5120')]
    public $file;

    #[Rule('required|unique:services,name|max:50')]
    public $name;

    #[Rule('required')]
    public $type;

    #[Rule('required')]
    public $itemprice;

    public function save() {
        if ($this->validate()) {
            $service = ItemType::create([
                'name' => strtolower($this->name),
                'itemprice' => $this->itemprice,
                'type' => $this->type
            ]);
            
             $service->addMedia($this->file)->toMediaCollection('itemTypes');

            return redirect()->route('item-types');
        }
    }

    public function render()
    {
        return view('livewire.admin.item-type.modals.add-item-type');
    }
}
