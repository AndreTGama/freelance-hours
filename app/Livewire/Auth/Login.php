<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';

    protected $rules = [
        'email' => ['required', 'email', 'exists:users,email'],
        'password' => ['required'],
    ];

    public function login()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();
        if (!$user || !Hash::check($this->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'E-mail ou senha incorreto',
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        session(['auth_token' => $token]);

        session()->regenerate();

        return redirect()->intended('/');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
