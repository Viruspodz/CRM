<?php

namespace App\View\Components\Crm;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OpportunityCard extends Component
{
    public $dealPriority;
    public $industry;
    public $daysLeft;
    public $dealName;
    public $contactName;
    public $productType;
    public $id;

    /**
     * Create a new component instance.
     *
     * @param string $dealPriority
     * @param string $industry
     * @param int $daysLeft
     * @param string $dealName
     * @param string $contactName
     * @param string $productType
     */
    public function __construct($dealPriority, $industry, $daysLeft, $dealName, $contactName, $productType)
    {
        $this->dealPriority = $dealPriority;
        $this->industry = $industry;
        $this->daysLeft = $daysLeft;
        $this->dealName = $dealName;
        $this->contactName = $contactName;
        $this->productType = $productType;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.crm.opportunity-card');
    }
}
