<?php

namespace App\Livewire\Admin\ItemType;

use Livewire\Component;

use App\Models\ItemType;

class Index extends Component
{
    public $edit_item_type_modal = false;

    public $item_types = [];
    
    public function mount() {
        $this->item_types = $this->item_types();
    }

    public $search;
    
    public function updatedSearch($value) 
    {
        $this->item_types = ItemType::where('name', 'LIKE', '%' . $value . '%')->get();
    }

    public function toggleEditItemTypeModal($id) {
        $this->edit_item_type_modal = !$this->edit_item_type_modal;
        
        $this->dispatch('selected-item-type', item_type: $id);
    }

    public function toggleDeleteItemTypeModal($id) {
        $this->delete_package_modal = !$this->delete_package_modal;

        $this->dispatch('selected-package', package: $id);
    }
    
    public function item_types() {
        return ItemType::all();
    }

    public function render()
    {
        return view('livewire.admin.item-type.index')->extends('layouts.admin.app');
    }
}
