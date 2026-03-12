<?php

namespace App\Livewire\Crm;

use Livewire\Component;

class CrmIndex extends Component
{
    public function render()
    {
        return view('livewire.crm.crm-index')->layout('components.layouts.crm');
    }
}
