<?php

namespace App\Livewire\Public;

use Livewire\Component;
use Livewire\Attributes\Rule;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

use App\Mail\SignUp as SignUpMail;
use Illuminate\Support\Facades\Mail;

class Register extends Component
{
    #[Rule('required|min:2|max:50')]
    public $given_name;

    #[Rule('required|min:2|max:50')]
    public $family_name;

    #[Rule('required|email|unique:users,email|max:50')]
    public $email;

    #[Rule('required|min:6|max:50')]
    public $password;

    public function register() {
        if ($this->validate()) {
            $name = $this->given_name . ' ' . $this->family_name;

            $user = User::create([
                'name' => $name,
                'given_name' => $this->given_name,
                'family_name' => $this->family_name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => 'client'
            ]);

            Mail::to($this->email)->send(new SignUpMail([
                'name' => $name,
                'content' => 'Thank you for registering with Dani’s Catering and Events!'
            ]));

            Auth::login($user);

            return $this->redirect('/', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.public.register')->extends('layouts.public.blank');
    }
}
