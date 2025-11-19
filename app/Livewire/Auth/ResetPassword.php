<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;

class ResetPassword extends Component
{
    public $token;
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $success = false;

    public function mount($token)
    {
        $this->token = $token;
        $this->email = request()->email ?? '';
    }

    public function resetPassword()
    {
        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user) {
                $user->password = Hash::make($this->password);
                $user->save();

                event(new PasswordReset($user));
            }
        );

        $this->success = $status === Password::PASSWORD_RESET;
    }

    public function render()
    {
        return view('auth.reset-password')
            ;
    }
}