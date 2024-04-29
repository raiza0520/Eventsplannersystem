<?php

namespace App\Livewire\Public;

use Livewire\Component;
use Livewire\Attributes\Rule;

use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    #[Rule('required|email|exists:users,email|max:50')]
    public $email;

    #[Rule('required|min:6|max:50')]
    public $password;

    public function login() {
        if ($this->validate()) {
            if (Auth::attempt(['email' => $this->email, 'password' => $this->password], false)) {
                switch (Auth::user()->role) {
                    case 'admin':
                        return redirect()->route('dashboard');
                        break;
                    
                    case 'client':
                        return redirect()->route('home');
                        break;
                }
            }
            else {
                $this->addError('password', 'Password doesn\'t match.');
            }
        }
    }

    public function render()
    {
        return view('livewire.public.login')->extends('layouts.public.blank');
    }
}
