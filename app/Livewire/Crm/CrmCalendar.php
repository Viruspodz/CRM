<?php

namespace App\Livewire\Crm;

use Livewire\Component;

class CrmCalendar extends Component
{
    public function render()
    {
        return view('livewire.crm.crm-calendar')->layout('components.layouts.crm');
    }
}
