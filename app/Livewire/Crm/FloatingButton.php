<?php

namespace App\Livewire\Crm;

use Livewire\Component;

class FloatingButton extends Component
{

    public $checkUsers;
    public $selectedContacts;
    public $tagProperty;
    public $userProperties;
    public $contacts;
    public $selectedOpportunity;
    public $timezones;
    public $opportunities;

    public $appointmentIsUser = false;
    public $appointmentAuto = false;
    public $appointmentEmail = '';
    public $appointmentNumber = '';
    public $appointmentProperty = null;
    public $selectedOpportunityId = null;
    public $addAppointment = false;
    public $showSuccessMessage = false;
    public $successMessage = '';
    public $appointmentTimezone = 'UTC';

    public function checkEmail() {
        
    }

    public function render()
    {

        return view('livewire.crm.floating-button')->layout('components.layouts.crm');
    }
}
