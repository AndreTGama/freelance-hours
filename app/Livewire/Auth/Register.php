<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Register extends Component
{
    public string $email = '';
    public string $name = '';
    public string $password = '';
    public string $confirm_password = '';
    public string $successMessage = '';

    protected $rules = [
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'name' => ['required', 'max:255'],
        'password' => ['required', 'min:8', 'max:255'],
        'confirm_password' => ['required', 'same:password', 'max:255'],
    ];

    public function register()
    {
        try
        {
            $this->validate();

            User::create([
                'email' => $this->email,
                'name' => $this->name,
                'password' => $this->password
            ]);
            $this->successMessage = 'Cadastro realizado com sucesso!';

            $this->reset(['email', 'name', 'password', 'confirm_password']);
        } catch (\Throwable $th) {

            throw ValidationException::withMessages([
                'error' => $th->getMessage(),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
