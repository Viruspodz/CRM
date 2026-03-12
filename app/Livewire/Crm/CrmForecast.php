<?php

namespace App\Livewire\Crm;

use Livewire\Component;

class CrmForecast extends Component
{
    public function render()
    {
        return view('livewire.crm.crm-forecast')->layout('components.layouts.crm');
    }
}
