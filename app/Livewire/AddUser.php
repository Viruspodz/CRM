<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddUser extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public $users = [];
    public $showEditModal = false;
    public $showAddModal = false;
    public $deletingUserId = null;
    public $showDeleteModal = false;
    public $editingUser = [
        'id' => null,
        'name' => '',
        'email' => '',
    ];
    public $userIdBeingDeleted = null;
    public $userIdBeingReset = null;
    public $showResetModal = false;
        

    
    public function mount()

    {
        if (!Auth::check() || Auth::user()->user_type !== 'Admin') {
            abort(403, 'Unauthorized action.');
        }

        // Initialize any other data you need
        $this->loadUsers();
    }

    public function addUser()
    {
        if (Auth::user()->user_type !== 'Admin') {
            session()->flash('error', 'You are not authorized to perform this action.');
            return;
        }

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create the user
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Check if user was successfully created
        $createdUser = User::where('email', $this->email)->first();

        if ($createdUser) {
            $this->reset(['name', 'email', 'password', 'password_confirmation']);
            session()->flash('success', 'User added successfully!');
        } else {
            session()->flash('error', 'Failed to create user. Please try again.');
        }
    }

    public function loadUsers()
    {
        $this->users = User::all(); 
    }

    public function openAddModal()
{
    $this->reset(['name', 'email', 'password', 'password_confirmation']);
    $this->showAddModal = true;
}


public function editUser($userId)
{
    $user = User::find($userId);

    if ($user) {
        $this->editingUser = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];

        $this->showEditModal = true;
    } else {
        session()->flash('error', 'User not found.');
    }
}



public function updateUser()
{
    $this->validate([
        'editingUser.name' => 'required|string|max:255',
        'editingUser.email' => 'required|email|unique:users,email,' . $this->editingUser['id'],
    ]);

    $user = User::findOrFail($this->editingUser['id']);

    $user->update([
        'name' => $this->editingUser['name'],
        'email' => $this->editingUser['email'],
    ]);

    $this->showEditModal = false;
    $this->editingUser = ['id' => null, 'name' => '', 'email' => ''];
    session()->flash('success', 'User updated successfully!');
    $this->loadUsers();
}


public function confirmDelete($userId)
{
    $this->userIdBeingDeleted = $userId;
    $this->showDeleteModal = true;
}

public function deleteUser()
{
    User::destroy($this->userIdBeingDeleted);
    $this->showDeleteModal = false;
    $this->userIdBeingDeleted = null;
    session()->flash('success', 'User deleted successfully!');
    $this->loadUsers();
}

public function confirmResetPassword($userId)
{
    $this->userIdBeingReset = $userId;
    $this->showResetModal = true;
}

public function resetPassword()
{
    $user = User::find($this->userIdBeingReset);
    if ($user) {
        $user->password = Hash::make('password');
        $user->save();

        session()->flash('success', 'Password reset to "password".');
    } else {
        session()->flash('error', 'User not found.');
    }

    $this->showResetModal = false;
    $this->userIdBeingReset = null;
}



    public function render()
    {
        return view('livewire.add-user')->layout('components.layouts.crm');
    }
}
