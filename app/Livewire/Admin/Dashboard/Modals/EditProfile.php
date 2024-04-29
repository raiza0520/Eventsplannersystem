<?php

namespace App\Livewire\Admin\Dashboard\Modals;

use Livewire\{Component, WithFileUploads};
use Livewire\Attributes\Rule;

use Illuminate\Support\Facades\Hash;

class EditProfile extends Component
{
    use WithFileUploads;

    public $modal;

    public $file;
    #[Rule('required|max:50')]
    public $name;
    #[Rule('nullable|string|min:8|confirmed')]
    public $password;
    public $password_confirmation;

    public function mount() 
    {
        $this->name = auth()->user()->name;
    }

    public function save() 
    {
        if ($this->validate()) {
            auth()->user()->update([
                'name' => $this->name
            ]);

            if ($this->file && $this->validate(['file' => 'file|mimes:jpg,jpeg,png|max:5120'])) {
                auth()->user()->addMedia($this->file)->toMediaCollection('users');
            }

            if ($this->password) {
                auth()->user()->update([
                    'password' => Hash::make($this->password)
                ]);
                
                auth()->logout();

                return redirect()->route('home');
            }

            return redirect()->route('dashboard');
        }
    }
    
    public function render()
    {
        return view('livewire.admin.dashboard.modals.edit-profile');
    }
}
