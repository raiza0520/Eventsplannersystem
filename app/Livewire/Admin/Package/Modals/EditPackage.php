<?php

namespace App\Livewire\Admin\Package\Modals;

use Livewire\{Component, WithFileUploads};
use Livewire\Attributes\{On, Rule}; 

use App\Models\{Package, Service, ItemType};

class EditPackage extends Component
{
    use WithFileUploads;

    public $modal;

    public $file;
    #[Rule('required|max:50')]
    public $name;
    #[Rule('required|numeric|gt:0')]
    public $price;
    #[Rule('required|exists:services,id')]
    public $service_id;
    #[Rule('required|numeric|gt:0')]
    public $no_of_pax;
    #[Rule('required')]
    public $inclusions;
    public $status;

    public $package = [];
    public $services = [];
    public $item_types = [];

    public $addons = [];
    public $customize = [];

    public $addon_types = [];
    public $customize_types = [];

    public function mount() 
    {
        $this->services = $this->services()->get();
        $this->item_types = $this->item_types()->get();
    }

    public function update() 
    {
        if ($this->validate()) {
            $this->package->update([
                'name' => $this->name,
                'price' => $this->price,
                'service_id' => $this->service_id,
                'no_of_pax' => $this->no_of_pax,
                'inclusions' => $this->inclusions,
                'addons' => (object) $this->addons,
                'customize' => (object) $this->customize,
                'status' => $this->status
            ]);

            if ($this->file && $this->validate(['file' => 'file|mimes:jpg,jpeg,png|max:5120'])) {
                $this->package->addMedia($this->file)->toMediaCollection('packages');
            }
    
            return redirect()->route('packages');
        }
    }

    #[On('selected-package')]
    public function data(Package $package) 
    {
        $this->package = $package;
        $this->name = $package->name;
        $this->price = $package->price;
        $this->service_id = $package->service_id;
        $this->no_of_pax = $package->no_of_pax;
        $this->inclusions = $package->inclusions;
        $this->addons = json_decode(json_encode($package->addons), true) ?? [];
        $this->customize = json_decode(json_encode($package->customize), true) ?? [];
        $this->status = $package->status;

        $this->addon_types = array_fill_keys(array_keys((array) $package->addons), true);
        $this->customize_types = array_fill_keys(array_keys((array) $package->customize), true);
    }

    public function updated($key, $value) 
    {
        $keys = explode('.', $key);

        if (in_array($keys[0], ['addon_types', 'customize_types'])) {
            if ($value) {
                            
                if ($keys[0] == 'addon_types') {
                    $this->addons[$keys[1]][] = [
                        'name' => $keys[1]
                    ];
                }
                else {
                    $this->customize[$keys[1]][] = [
                        'name' => $keys[1]
                    ];
                }
            }
            else {
                if ($keys[0] == 'addon_types') {
                    unset($this->addons[$keys[1]]);
                }
                else {
                    unset($this->customize[$keys[1]]);
                }
            }
        }
    }

    public function addAddonItemType($type) 
    {
        $this->addons[$type][] = [
            'name' => '',
            'price' => 0
        ];
    }

    public function removeAddonItemType($type, $key) 
    {
        unset($this->addons[$type][$key]);

        if (count($this->addons[$type]) == 0) {
            unset($this->addons[$type]);

            $this->$type['addons'] = false;
        }
    }

    public function addCustomizeItemType($type) 
    {
        $this->customize[$type][] = [
            'name' => '',
            'price' => 0
        ];
    }

    public function removeCustomizeItemType($type, $key) 
    {
        unset($this->customize[$type][$key]);

        if (count($this->customize[$type]) == 0) {
            unset($this->customize[$type]);

            $this->$type['customize'] = false;
        }
    }

    public function services() 
    {
        return Service::where('status', true);
    }

    public function item_types() 
    {
        return ItemType::where('status', true);
    }

    public function render()
    {
        return view('livewire.admin.package.modals.edit-package');
    }
}
