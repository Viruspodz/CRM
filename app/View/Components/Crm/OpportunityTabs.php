<?php

namespace App\View\Components\Crm;

use Closure;
use App\Models\Deal;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OpportunityTabs extends Component
{
    public $deals;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Fetch deals with their representative data
        $this->deals = Deal::with('representative')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.crm.opportunity-tabs', [
            'deals' => $this->deals,
        ]);
    }
}
