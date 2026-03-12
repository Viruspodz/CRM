<?php

namespace App\Livewire;

use App\Models\Deal;
use Livewire\Component;
use App\Models\DealRepresentative;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ProductType;
class SalesForecast extends Component
{
    use WithPagination;

    public $search_term_model = '';
    public $search_term = '';
    public $field = 'created_at';
    public $sort = 'desc';
    public $allowed_field = ['deal_name', 'deal_type' ,'industry', 'product_type', 'potential_income', 'probability', 'weighted_forecast', 'priority','deal_number'];
    public $users = [];
    public $dealStages = []; 
    public $productTypes = [];
    public $priorities = [];
    public $propertyOwnerTags = [];
    public $showAssignedOnly = false;
    public $filterDealType = '';

    public $isModalOpen = false;
    public $dealId = null;
    public $deal = [
        'deal_type' => '',
        'deal_name' => '',
        'industry' => '',
        'product_type' => '',
        'potential_income' => null,
        'probability' => null,
        'weighted_forecast' => null,
        'priority' => '',
    ];

    protected $listeners = [
        'dealUpdated' => '$refresh',
        'editDeal'
    ];

    public function mount()
    {
        $this->dealStages = $this->getEnumValues('deal_stage');
        $this->productTypes = $this->getEnumValues('product_type');
        $this->priorities = $this->getEnumValues('priority');
        $this->propertyOwnerTags = $this->getEnumValues('property_owner_tag');
    }

    public function getEnumValues($column)
    {
        // Fetch column details from the database
        $result = DB::select("SHOW COLUMNS FROM deals WHERE Field = ?", [$column]);
    
        // Check if the result is empty (column not found)
        if (empty($result)) {
            return [];
        }
    
        $type = $result[0]->Type;
    
        // Extract ENUM values
        preg_match('/^enum\((.*)\)$/', $type, $matches);
    
        if (!isset($matches[1])) {
            return [];
        }
    
        return array_map(fn($value) => trim($value, "'"), explode(',', $matches[1]));
    }

    public function handleSearch()
    {
        $this->search_term = $this->search_term_model;
        $this->resetPage();
    }

    public function handleSort($field_name)
    {
        if ($this->field === $field_name) {
            $this->sort = $this->sort === 'desc' ? 'asc' : 'desc';
            return;
        }
        $this->field = $field_name;
        $this->sort = 'desc';
        $this->resetPage();
    }

    public function editDeal($dealId)
    {
        $deal = Deal::findOrFail($dealId);
    
        $this->dealId = $dealId; 
        $this->deal = $deal->toArray();
        $this->users = User::all(); 

        $this->isModalOpen = true;

    }
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function loadDeal()
    {
        $deal = Deal::findOrFail($this->dealId);
    
        $this->deal = [
            'deal_name' => $deal->deal_name,
            'deal_type' => $deal->deal_type,
            'industry' => $deal->industry,
            'product_type' => $deal->product_type,
            'contact_name' => $deal->contact_name,
            'designation' => $deal->designation,
            'property_owner_tag' => $deal->property_owner_tag,
            'contact_number' => $deal->contact_number,
            'email_address' => $deal->email_address,
            'location' => $deal->location,
            'deal_size' => $deal->deal_size,
            'potential_income' => $deal->potential_income,
            'deal_stage' => $deal->deal_stage,
            'probability' => $deal->probability,
            'weighted_forecast' => $deal->weighted_forecast,
            'priority' => $deal->priority,
            'from_date' => $deal->from_date ? \Carbon\Carbon::parse($deal->from_date)->format('Y-m-d') : null,
            'expected_close_date' => $deal->expected_close_date ? \Carbon\Carbon::parse($deal->expected_close_date)->format('Y-m-d') : null,
            'next_step' => $deal->next_step,
            'remarks' => $deal->remarks,
            // 'deal_representative_id' => $deal->deal_representative_id,
        ];
    }
    

    public function saveDeal()
    {
        $this->validate([
            'deal.deal_name' => 'required|string|max:255',
            'deal.industry' => 'required|string|max:255',
            'deal.product_type' => 'nullable|string',
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
        ]);


        $deal = Deal::findOrFail($this->dealId);
        $deal->update($this->deal);
    
        session()->flash('success', 'Deal updated successfully!');
        $this->isModalOpen = false;
        $this->dispatch('dealUpdated');
    }
    

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->reset('deal', 'dealId');
    }

    public function updatedShowAssignedOnly()
    {
        
        $this->resetPage(); // If using pagination
    }

    public function updatedFilterDealType()
    {
     
        $this->resetPage(); // If using pagination
    }

    public function getDealsProperty()
{
    $query = Deal::query();

    if ($this->showAssignedOnly) {
        $query->where('user_id', auth()->id());
    }

    if (!empty($this->filterDealType)) {
        $query->where('deal_type', $this->filterDealType);
    }

    if (!empty($this->search_term_model)) {
        $query->where('deal_name', 'like', '%' . $this->search_term_model . '%');
        // Add more fields if needed for searching
    }

    // Apply sorting here if needed...
    
    return $query->latest()->paginate(10);
}

public function applyFilters()
{
    $this->resetPage(); // Reset pagination when filters are applied

 

    $this->getDealsProperty(); // Make sure to refresh the deals list after applying filters
}


public function render()
{
    $query = Deal::query(); // Initialize the query variable

    // Apply filters
    if ($this->showAssignedOnly) {
        $query->where('user_id', auth()->id());
    }

    if (!empty($this->filterDealType)) {
        $query->where('deal_type', $this->filterDealType);
    }

    if (!empty($this->search_term_model)) {
        $query->where(function ($q) {
            $q->where('deal_name', 'like', '%' . $this->search_term_model . '%')
                ->orWhere('industry', 'like', '%' . $this->search_term_model . '%')
                ->orWhere('product_type', 'like', '%' . $this->search_term_model . '%')
                ->orWhere('deal_number', 'like', '%' . $this->search_term_model . '%')
                ->orWhere('contact_name', 'like', '%' . $this->search_term_model . '%')
                ->orWhere(DB::raw("CAST(potential_income AS CHAR)"), 'like', '%' . $this->search_term_model . '%')
                ->orWhere(DB::raw("CAST(probability AS CHAR)"), 'like', '%' . $this->search_term_model . '%')
                ->orWhere(DB::raw("CAST(weighted_forecast AS CHAR)"), 'like', '%' . $this->search_term_model . '%')
                ->orWhere('priority', 'like', '%' . $this->search_term_model . '%');
        })
        ->orWhereHas('user', function ($q) {
            $q->where('name', 'like', '%' . $this->search_term_model . '%')
              ->orWhere('email', 'like', '%' . $this->search_term_model . '%');
        });
    }

    // Apply sorting
    if ($this->field === '' || !in_array($this->field, $this->allowed_field)) {
        $this->field = 'created_at';
    }

    if ($this->sort === '' || !in_array($this->sort, ['desc', 'asc'])) {
        $this->sort = 'desc';
    }

    $deals = $query->orderBy($this->field, $this->sort)->paginate(5);

    $representatives = DealRepresentative::all();

    return view('livewire.sales-forecast', compact('deals', 'representatives'))->layout('components.layouts.crm');
}

}
