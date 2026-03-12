<?php

namespace App\Livewire\Crm;

use Livewire\Component;

class CrmFunnel extends Component
{
    public function render()
    {
        return view('livewire.crm.crm-funnel')->layout('components.layouts.crm');
    }
}
