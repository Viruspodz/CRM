<?php

namespace App\Livewire\Crm;

use Livewire\Component;

class ManageOpportunity extends Component
{
    public function render()
    {
        return view('livewire.crm.manage-opportunity')->layout('components.layouts.crm');
    }
}
