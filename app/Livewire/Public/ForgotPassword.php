<?php

namespace App\Livewire\Public;

use Livewire\Component;
use Livewire\Attributes\Rule;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

use App\Mail\ForgotPassword as ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;

class ForgotPassword extends Component
{
    #[Rule('required|email|exists:users,email|max:50')]
    public $email;
    public $code;
    #[Rule('nullable|string|min:8|confirmed')]
    public $password;
    public $password_confirmation;

    public $validated = false;

    public $user = [];

    public function sendEmail()
    {
        if ($this->validate()) {
            try {
                $token = rand(100000, 999999);
    
                Mail::to($this->email)->send(new ForgotPasswordMail(['token' => $token]));
    
                $this->user = User::where('email', $this->email)->update([
                    'reset_token' => $token
                ]);
            } catch (\Throwable $th) {
                $this->js('alert("We\'re unable to process your request at this time.")');
            }
        }
    }

    public function verifyCode()
    {
        $this->user = User::where('email', $this->email)->first();

        $this->validate([
            'code' => 'required|max:50|in:' . json_encode($this->user->reset_token)
        ], [
            'code.in' => 'Invalid reset code.'
        ]);

        $this->validated = true;
    }

    public function update()
    {
        if ($this->password && $this->validateOnly('password')) {
            $this->user->update([
                'password' => Hash::make($this->password)
            ]);

            $this->js('alert("Password reset successful.")');

            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.public.forgot-password')->extends('layouts.public.blank');
    }
}
