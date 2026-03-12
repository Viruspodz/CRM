<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Deal;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $totalDeals;
    public $totalPotentialIncome;
    public $dealsByStage;
    public $wonVsLost;
    public $dealsPerMonth;
    public $dealsByProductType;
    public $dealsByType;

    public $closedWonCount;
    public $closedLostCount;
    public $closedWonTotalIncome;
    public $closedLostTotalIncome;
    
    public function mount()
    {
        $this->totalDeals = Deal::count();
    
        // Exclude "Closed Won" and "Closed Lost" from Total Potential Income
        $this->totalPotentialIncome = Deal::whereNotIn('deal_stage', ['Closed Won', 'Closed Lost'])->sum('potential_income');
    
        // Count Closed Won & Closed Lost Deals
        $this->closedWonCount = Deal::where('deal_stage', 'Closed Won')->count();
        $this->closedLostCount = Deal::where('deal_stage', 'Closed Lost')->count();
    
        // Calculate the total income for Closed Won & Closed Lost
        $this->closedWonTotalIncome = Deal::where('deal_stage', 'Closed Won')->sum('potential_income');
        $this->closedLostTotalIncome = Deal::where('deal_stage', 'Closed Lost')->sum('potential_income');
    
        // Deals by Stage (Bar Chart)
        $this->dealsByStage = Deal::selectRaw('deal_stage, COUNT(*) as count')
            ->groupBy('deal_stage')
            ->pluck('count', 'deal_stage')
            ->toArray();
    
        // Won vs. Lost Deals (Area Chart)
        $this->wonVsLost = [
            ['Stage', 'Count'],
            ['Closed Won', $this->closedWonCount],
            ['Closed Lost', $this->closedLostCount]
        ];
    
        // Deals Per Month (Line Chart)
        $this->dealsPerMonth = Deal::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();
    
        // Deals by Product Type (Pie Chart)
        $this->dealsByProductType = Deal::selectRaw('product_type, COUNT(*) as count')
            ->groupBy('product_type')
            ->pluck('count', 'product_type')
            ->toArray();


        $this->dealsByType = [
            'realhomes' => Deal::where('deal_type', 'realhomes')->count(),
            'repay' => Deal::where('deal_type', 'repay')->count(),
        ];
            

    }
    

    public function render()
    {
        return view('livewire.dashboard')->layout('components.layouts.crm');
    }
}
