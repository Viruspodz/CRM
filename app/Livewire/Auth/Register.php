<?php
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function mount()
    {
        if (!Auth::check() || Auth::user()->email !== 'admin@realhomes.ph') {
            return redirect()->route('dashboard')->with('error', 'You are not allowed to access this page.');
        }
    }
    


    public function register()
    {
        if (Auth::user()->email !== 'admin@realhomes.ph') {
            session()->flash('error', 'Only admin can register new users.');
            return;
        }

        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
