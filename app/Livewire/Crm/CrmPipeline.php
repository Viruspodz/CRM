<?php

    namespace App\Livewire\Crm;

    use App\Models\Deal;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;
    use Livewire\Component;

    class CrmPipeline extends Component
    {
        public $opportunities;
        public $showModal = false;
        public $selectedDeal = null;
        public $totalIncomeByStage = [];

        public function fetchDealDetails($dealId)
        {
            $this->selectedDeal = $this->opportunities->firstWhere('id', $dealId);
            if ($this->selectedDeal) {
                $this->showModal = true; // Show the modal
            }
        }
    
        public function closeModal()
        {
            $this->showModal = false; // Hide the modal
            $this->selectedDeal = null; // Clear selected deal data
        }
    
        protected $listeners = [
            'updateDealStage' => 'updateDealStage',
        ];
    
        public function mount()
        {
            DB::transaction(function () {
                // Fetch data from the deals table
                $this->opportunities = Deal::select(
                    'id',
                    'deal_name',
                    'contact_name',
                    'product_type',
                    'priority',
                    'deal_stage',
                    'expected_close_date',
               'industry',
                 'potential_income'
            ) 
                ->get()
                ->map(function ($deal) {
                    // Ensure deal_stage is set to "Initial" if empty
                    if (empty($deal->deal_stage)) {
                        $deal->deal_stage = 'Initial';
                        $deal->save(); // Persist the change in the database
                    }

                    // Calculate days left as an integer
                    $deal->days_left = $this->calculateDaysLeft($deal->expected_close_date);
                    return $deal;
                });

                $this->totalIncomeByStage = Deal::select('deal_stage', DB::raw('SUM(potential_income) as total'))
                ->groupBy('deal_stage')
                ->pluck('total', 'deal_stage')
                ->toArray();
        
        });
    }

    private function calculateDaysLeft($expectedCloseDate)
    {
        if (!$expectedCloseDate) {
            return null; // Return null if no date is provided
        }
    
        $expectedDate = Carbon::parse($expectedCloseDate)->startOfDay();
        $currentDate = Carbon::now()->startOfDay();
    
        return $currentDate->diffInDays($expectedDate, false); // Allow negative values
    }
    

    public function updateDealStage($dealId, $newStage)
    {
        
        $deal = Deal::find($dealId); // Use the correct model name
       
        if ($deal) {
            $deal->deal_stage = $newStage; // Update the stage
            $deal->save(); // Save the changes
        }
   
        // Refresh the opportunities to reflect changes
        $this->mount();
    
        // Emit an event to notify the frontend if needed
        $this->dispatch('dealStageUpdated', $dealId, $newStage);
    }
    
    
    public function render()
    {
        return view('livewire.crm.crm-pipeline', [
            'opportunities' => $this->opportunities,
                'totalIncomeByStage' => $this->totalIncomeByStage,
            ]);
        }
    }
