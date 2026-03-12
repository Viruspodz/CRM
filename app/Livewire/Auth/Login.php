<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();
    
        $credentials = ['email' => $this->email, 'password' => $this->password];
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('sales-forecast');
        }
    
        // Authentication failed
        $this->addError('email', 'The provided credentials are incorrect.');
    }
    public function logout()
    {
        Auth::logout(); // Log out the user

        // Invalidate the session
        session()->invalidate();
        session()->regenerateToken();

        // Redirect to the login page after logging out
        return redirect()->route('login');
    }
    
    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}

