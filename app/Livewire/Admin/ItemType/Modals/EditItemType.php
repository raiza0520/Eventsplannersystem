<?php

namespace App\Livewire\Admin\ItemType\Modals;

use Livewire\Component;

use Livewire\Attributes\{On, Rule}; 

use App\Models\ItemType;

class EditItemType extends Component
{
    public $modal;
    #[Rule('required|max:50')]
    public $name;
    #[Rule('required')]
    public $itemprice;
    #[Rule('required')]
    public $type;
    public $status;

    public $item_type = [];

    #[On('selected-item-type')]
    public function data(ItemType $item_type) {
        $this->item_type = $item_type;
        $this->name = $item_type->name;
        $this->itemprice = $item_type->itemprice;
        $this->type = $item_type->type;
        $this->status = $item_type->status;
    }

    public function update() {
        if ($this->validateOnly('name')) {
            $this->item_type->update([
                'name' => $this->name,
                'type' => $this->type,
                'itemprice' => $this->itemprice,
                'status' => $this->status,
            ]);
    
            return redirect()->route('item-types');
        }
    }

    public function render()
    {
        return view('livewire.admin.item-type.modals.edit-item-type');
    }
}
