<?php

namespace App\Livewire;

use App\Models\Deal;
use App\Models\DealRepresentative;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\User;


class CreateDeal extends Component
{
    public $isModalOpen = false;
    public $users;

    public $dealStages = []; 
    public $productTypes = [];
    public $priorities = [];
    public $propertyOwnerTags = [];

    public string $activeTab = 'realhomes';

    public $deal = [
        'user_id' => null,
        'deal_name' => '',
        'industry' => '',
        'product_type' => '',
        'contact_name' => '',
        'designation' => '',
        'property_owner_tag' => '',
        'contact_number' => '',
        'email_address' => '',
        'location' => '',
        'deal_size' => '',
        'potential_income' => null,
        'deal_stage' => '',
        'probability' => null,
        'weighted_forecast' => null,
        'priority' => '',
        'from_date' => '',
        'expected_close_date' => '',
        'next_step' => '',
        'remarks' => '',
        'deal_representative_id' => null,
        'deal_type' => 'realhomes',
    ];

    protected $listeners = ['openModal'];

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->reset('deal');
        $this->isModalOpen = false;
    }

    public function mount()
    {
        $this->dealStages = $this->getEnumValues('deal_stage');
        $this->productTypes = $this->getEnumValues('product_type');
        $this->priorities = $this->getEnumValues('priority');
        $this->propertyOwnerTags = $this->getEnumValues('property_owner_tag');
        $this->users = User::all();

    }

    public function createDeal()
    {
        $this->validate([

            'deal.user_id' => 'required|exists:users,id', 
            'deal.deal_name' => 'required|string|max:255',
            'deal.industry' => 'required|string|max:255',
            'deal.product_type' => 'nullable|string|in:' . implode(',', $this->productTypes),
            'deal.contact_name' => 'nullable|string|max:255',
            'deal.designation' => 'nullable|string|max:255',
            'deal.property_owner_tag' => 'required|string|in:' . implode(',', $this->propertyOwnerTags),
            'deal.contact_number' => 'nullable|string|max:20',
            'deal.email_address' => 'nullable|email|max:255',
            'deal.location' => 'nullable|string|max:255',
            'deal.deal_size' => 'nullable|string|max:255',
            'deal.potential_income' => 'nullable|numeric',
            'deal.deal_stage' => 'required|string|in:' . implode(',', $this->dealStages),
            'deal.probability' => 'nullable|numeric|min:0|max:100',
            'deal.weighted_forecast' => 'nullable|numeric',
            'deal.priority' => 'required|string|in:' . implode(',', $this->priorities),
            'deal.from_date' => 'nullable|date',
            'deal.expected_close_date' => 'nullable|date',
            'deal.next_step' => 'nullable|string|max:255',
            'deal.remarks' => 'nullable|string|max:255',
            'deal.deal_representative_id' => 'nullable|exists:deal_representatives,id',
            'deal.deal_type' => 'required|in:realhomes,repay', 
        ]);
    
        $newDeal = Deal::create($this->deal);

        $newDeal->deal_type = $this->activeTab;
        $newDeal->save();
    
        $this->dispatch('dealCreated', $newDeal->id);
        session()->flash('success', 'Deal created successfully!');
        $this->closeModal();
    }
    

    public function getEnumValues($column)
    {
        // Fetch ENUM values from the database
        $type = DB::select("SHOW COLUMNS FROM deals WHERE Field = '{$column}'")[0]->Type;
    
        preg_match('/^enum\((.*)\)$/', $type, $matches);
    
        $enum = [];
        if (isset($matches[1])) {
            foreach (explode(',', $matches[1]) as $value) {
                $enum[] = trim($value, "'");
            }
        }
    
        return $enum;
    }
    
    public function render()
    {
        $representatives = DealRepresentative::all();

        return view('livewire.create-deal', compact('representatives'));
    }
}
