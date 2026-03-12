<div>
    <!-- Modal Trigger Button -->
    <button wire:click="$dispatch('openModal')"
        class="flex items-center px-4 py-2 mb-6 space-x-2 text-white rounded bg-primary-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <span>Create Deal</span>
    </button>

    <!-- Include Create Deal Component -->
    @livewire('create-deal')

   <!-- Search Input -->
   <div class="flex items-center mb-4 space-x-2">
   <input type="text" 
           wire:model.defer="search_term_model" 
           placeholder="Search Deals..." 
           class="w-full p-2 border rounded" 
           wire:keydown.enter="handleSearch" />

        <button class="px-4 py-2  text-white rounded bg-primary-600" wire:click="handleSearch">
            Search
        </button>
    <!-- Filter Dropdown -->
<div class="relative inline-block text-left" x-data="{ open: false }">
    <button @click="open = !open" class="flex items-center px-4 py-2 space-x-2 text-white rounded-lg bg-primary-600 hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-400">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4Zm0 7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-2Zm1 6a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1H4Z" />
        </svg>
        <span>Filters</span>
    </button>

   <!-- Dropdown Content -->
<div x-show="open" @click.away="open = false" class="absolute z-50 mt-2 bg-white border border-gray-300 rounded-lg shadow-lg w-36 p-4 space-y-4">
    <!-- Assigned Deals Filter -->
    <label class="flex items-center space-x-2">
        <input type="checkbox" wire:model="showAssignedOnly" class="form-checkbox text-primary-600">
        <span class="text-sm text-gray-700">My Deals</span>
    </label>

    <!-- Deal Type Filter -->
    <div>
        <label for="dealTypeFilter" class="block mb-1 text-sm font-medium text-gray-700">Deal Type</label>
        <select id="dealTypeFilter" wire:model="filterDealType" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-400">
            <option value="">All</option>
            <option value="RealHomes">RealHomes</option>
            <option value="Repay">Repay</option>
        </select>
    </div>

    <!-- Apply Filter Button -->
    <button type="button" wire:click="applyFilters" class="w-full p-2 mt-4 bg-primary-600 text-white rounded-lg">
        Apply Filter
    </button>
        </div>
    </div>
</div>



    <!-- Deals Table -->
    <div class="w-full p-3 mb-4 overflow-auto bg-white shadow-sm rounded-2xl">
        <x-table.standard>
            <!-- Table Header -->
            <x-slot:table_header>
                @foreach([
                'deal_number' => 'Deal Number',
                'deal_type' => 'Deal Type',
                'deal_name' => 'Deal Name',
                'industry' => 'Industry',
                'product_type' => 'Product Type',
                'contact_name' => 'Contact Name',
                'designation' => 'Designation',
                'property_owner_tag' => 'Client Type Tag',
                'contact_number' => 'Contact Number',
                'email_address' => 'Email Address',
                'location' => 'Location',
                'deal_size' => 'Deal Size',
                'potential_income' => 'Potential Income',
                'deal_stage' => 'Deal Stage',
                'probability' => 'Probability (%)',
                'weighted_forecast' => 'Weighted Forecast',
                'priority' => 'Priority',
                'from_date' => 'From Date',
                'expected_close_date' => 'Expected Close Date',
                '   ' => 'Assigned Representative',
                'next_step' => 'Next Step',
                'remarks' => 'Remarks',
                'actions' => 'Actions'
                ] as $field => $label)
                <x-table.standard.th>
                    <a href="#" wire:click.prevent="handleSort('{{ $field }}')" class="flex items-center space-x-1">
                        <span>{{ $label }}</span>
                        @if ($field === $field)
                        <span class="inline-block w-4 h-4">
                            @if ($sort === 'asc')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-full h-full">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18" />
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-full h-full">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3" />
                            </svg>
                            @endif
                        </span>
                        @endif
                    </a>
                </x-table.standard.th>
                @endforeach
            </x-slot:table_header>

            <!-- Table Data -->
            <x-slot:table_data>
                @forelse($deals as $deal)
                <x-table.standard.row>
                    <x-table.standard.td>{{ $deal->deal_number }}</x-table.standard.td>
                    <x-table.standard.td>{{ ucfirst($deal->deal_type) }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->deal_name }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->industry }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->product_type }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->contact_name }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->designation }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->property_owner_tag }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->contact_number }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->email_address }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->location }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->deal_size }}</x-table.standard.td>
                    <x-table.standard.td>{{ number_format($deal->potential_income, 2) }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->deal_stage }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->probability }}</x-table.standard.td>
                    <x-table.standard.td>{{ number_format($deal->weighted_forecast, 2) }}</x-table.standard.td>
                    <x-table.standard.td>{{ ucfirst($deal->priority) }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->from_date }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->expected_close_date }}</x-table.standard.td>
                    <!-- <x-table.standard.td>{{ $deal->representative->name ?? 'N/A' }}</x-table.standard.td> -->
                    <x-table.standard.td>{{ $deal->user->name ?? 'N/A' }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->next_step }}</x-table.standard.td>
                    <x-table.standard.td>{{ $deal->remarks }}</x-table.standard.td>
                    <x-table.standard.td>
        
                    {{-- @if(auth()->user()->id === $deal->user_id || auth()->user()->user_type === 'Admin')  --}}
                        <button class="px-4 py-2 text-white rounded-md bg-primary-600"
                            wire:click="editDeal({{ $deal->id }})">
                            Edit
                        </button>
                    {{-- @endif --}}
                </x-table.standard.td>


                </x-table.standard.row>
                @empty
                <x-table.standard.row>
                    <x-table.standard.td colspan="21">
                        <div class="text-center text-gray-500">No results found</div>
                    </x-table.standard.td>
                </x-table.standard.row>
                @endforelse
            </x-slot:table_data>
        </x-table.standard>



        <div>
            @if($isModalOpen)
            <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75">
                <div
                    class="relative w-full max-h-screen p-6 overflow-y-auto bg-white rounded-lg shadow-lg md:w-3/4 lg:w-2/3">
                    <div class="flex items-center justify-between mb-6">
                        <!-- Modal Header -->
                        <h3 class="text-xl font-bold">Edit Deal</h3>
                        <button wire:click="closeModal"
                            class="text-gray-500 rounded hover:text-gray-700 focus:outline-none focus:ring focus:ring-gray-300"
                            aria-label="Close Modal">
                            &times;
                        </button>
                    </div>

                    <form wire:submit.prevent="saveDeal">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <!-- Deal Name -->
                            <div>
                                <label for="deal_name" class="block text-sm font-medium text-gray-700">Deal Name</label>
                                <input type="text" id="deal_name" wire:model="deal.deal_name"
                                    class="w-full p-2 border rounded">
                                @error('deal.deal_name') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Industry -->
                            <div>
                                <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                                <input type="text" id="industry" wire:model.defer="deal.industry"
                                    class="w-full p-2 border rounded">
                                @error('deal.industry') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Product Type -->
                            <div>
                                <label for="product_type" class="block text-sm font-medium text-gray-700">Product
                                    Type</label>
                                    <select id="product_type" wire:model.defer="deal.product_type" class="w-full p-2 border rounded">
                                        <option value="">No Product Type</option>
                                        @foreach($productTypes as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                @error('deal.product_type') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Contact Name -->
                            <div>
                                <label for="contact_name" class="block text-sm font-medium text-gray-700">Contact
                                    Name</label>
                                <input type="text" id="contact_name" wire:model.defer="deal.contact_name"
                                    class="w-full p-2 border rounded">
                                @error('deal.contact_name') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Designation -->
                            <div>
                                <label for="designation"
                                    class="block text-sm font-medium text-gray-700">Designation</label>
                                <input type="text" id="designation" wire:model.defer="deal.designation"
                                    class="w-full p-2 border rounded">
                                @error('deal.designation') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Property Owner Tag -->
                            <div>
                                <label for="property_owner_tag" class="block text-sm font-medium text-gray-700">Client Type Tag</label>
                                <select id="property_owner_tag" wire:model.defer="deal.property_owner_tag"
                                    class="w-full p-2 border rounded">
                                    <option value="">Select Client Type</option>
                                    @foreach($propertyOwnerTags as $tag)
                                    <option value="{{ $tag}}">{{ $tag }}</option>
                                    @endforeach
                                </select>
                                @error('deal.property_owner_tag') <span class="text-sm text-red-500">{{ $message
                                    }}</span>
                                @enderror
                            </div>

                            <!-- Contact Number -->
                            <div>
                                <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact
                                    Number</label>
                                <input type="text" id="contact_number" wire:model.defer="deal.contact_number"
                                    class="w-full p-2 border rounded">
                                @error('deal.contact_number') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div>
                                <label for="email_address" class="block text-sm font-medium text-gray-700">Email
                                    Address</label>
                                <input type="email" id="email_address" wire:model.defer="deal.email_address"
                                    class="w-full p-2 border rounded">
                                @error('deal.email_address') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" id="location" wire:model.defer="deal.location"
                                    class="w-full p-2 border rounded">
                                @error('deal.location') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Deal Size -->
                            <div>
                                <label for="deal_size" class="block text-sm font-medium text-gray-700">Deal Size</label>
                                <input type="text" id="deal_size" wire:model.defer="deal.deal_size"
                                    class="w-full p-2 border rounded">
                                @error('deal.deal_size') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Potential Income -->
                            <div>
                                <label for="potential_income" class="block text-sm font-medium text-gray-700">Potential
                                    Income</label>
                                <input type="number" step="0.01" id="potential_income"
                                    wire:model.defer="deal.potential_income" class="w-full p-2 border rounded">
                                @error('deal.potential_income') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Deal Stage -->
                            <div>
                                <label for="deal_stage" class="block text-sm font-medium text-gray-700">Deal
                                    Stage</label>
                                <select id="deal_stage" wire:model.defer="deal.deal_stage"
                                    class="w-full p-2 border rounded">
                                    <option value="">Select Deal Stage</option>
                                    @foreach($dealStages as $stage)
                                    <option value="{{ $stage }}">{{ $stage }}</option>
                                    @endforeach
                                </select>
                                @error('deal.deal_stage') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Probability -->
                            <div>
                                <label for="probability"
                                    class="block text-sm font-medium text-gray-700">Probability</label>
                                <input type="number" step="0.01" id="probability" wire:model.defer="deal.probability"
                                    class="w-full p-2 border rounded">
                                @error('deal.probability') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Weighted Forecast -->
                            <div>
                                <label for="weighted_forecast" class="block text-sm font-medium text-gray-700">Weighted
                                    Forecast</label>
                                <input type="number" step="0.01" id="weighted_forecast"
                                    wire:model.defer="deal.weighted_forecast" class="w-full p-2 border rounded">
                                @error('deal.weighted_forecast') <span class="text-sm text-red-500">{{ $message
                                    }}</span>
                                @enderror
                            </div>

                            <!-- Priority -->
                            <div>
                                <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                                <select id="priority" wire:model.defer="deal.priority"
                                    class="w-full p-2 border rounded">
                                    <option value="">Select Priority</option>
                                    @foreach($priorities as $priority)
                                    <option value="{{ $priority }}">{{ $priority }}</option>
                                    @endforeach
                                </select>
                                @error('deal.priority') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- From Date -->
                            <div>
                                <label for="from_date" class="block text-sm font-medium text-gray-700">From Date</label>
                                <input type="date" id="from_date" wire:model.defer="deal.from_date"
                                    class="w-full p-2 border rounded">
                                @error('deal.from_date') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Expected Close Date -->
                            <div>
                                <label for="expected_close_date"
                                    class="block text-sm font-medium text-gray-700">Expected Close Date</label>
                                <input type="date" id="expected_close_date" wire:model.defer="deal.expected_close_date"
                                    class="w-full p-2 border rounded">
                                @error('deal.expected_close_date') <span class="text-sm text-red-500">{{ $message
                                    }}</span> @enderror
                            </div>

                            <!-- Next Step -->
                            <div>
                                <label for="next_step" class="block text-sm font-medium text-gray-700">Next Step</label>
                                <input type="text" id="next_step" wire:model.defer="deal.next_step"
                                    class="w-full p-2 border rounded">
                                @error('deal.next_step') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Remarks -->
                            <div>
                                <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                                <input type="text" id="remarks" wire:model.defer="deal.remarks"
                                    class="w-full p-2 border rounded">
                                @error('deal.remarks') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>


                            <div>
                            <label for="user_id" class="block text-sm font-medium text-gray-700">Deal
                            Representative</label>
                            <select id="user_id" wire:model.defer="deal.user_id" class="w-full p-2 border rounded">
                                <option value="">Select Representative</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('deal.user_id') <span class="text-sm text-red-500">{{ $message }}</span> 
                            @enderror
                        </div>



                        <div class="flex justify-end mt-6">
                            <button type="button" wire:click="closeModal"
                                class="px-4 py-2 mr-4 text-white bg-gray-500 rounded">Cancel</button>
                            <button type="submit" class="px-4 py-2 text-white rounded bg-primary-600">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif  
        </div>

    </div>

    <!-- Pagination -->
    <div class="flex justify-center">
        {{ $deals->links('pagination.custom-pagination') }}
    </div>
</div>