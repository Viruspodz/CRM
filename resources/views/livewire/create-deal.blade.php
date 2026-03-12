<div>
    @if($isModalOpen)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div 
            class="relative w-2/3 max-h-[90vh]  overflow-y-auto bg-white rounded-lg shadow-lg sm:w-1/2 md:w-2/5">

            <!-- Sticky Modal Header -->
            <div class="sticky top-0 z-10 flex flex-col justify-between w-full gap-4 p-4 bg-white">
                <div class="flex justify-between">
                    <h3 class="text-lg font-bold">Create New Deal</h3>
                    <button wire:click="closeModal"
                        class="text-gray-500 rounded hover:text-gray-700 focus:outline-none focus:ring focus:ring-gray-300"
                        aria-label="Close Modal">
                        &times;
                    </button>
                </div>
                <div x-data="{ activeTab: @entangle('activeTab').live }">
                    <!-- Sticky Tab Buttons -->
                    <div class="sticky top-0 z-10 flex">
                        <button @click="$wire.set('activeTab', 'realhomes')" 
                            :class="{'border-b-2 border-primary-500': activeTab === 'realhomes'}"
                            class="px-4 py-2 text-sm font-medium focus:outline-none">
                            RealHomes
                        </button>
                    
                        <button @click="$wire.set('activeTab', 'repay')" 
                            :class="{'border-b-2 border-primary-500': activeTab === 'repay'}"
                            class="px-4 py-2 text-sm font-medium focus:outline-none">
                            Repay
                        </button> 
                    </div>
                </div>
                
                
            </div>

                <div>
                    {{-- Tab Content --}}
                    <form wire:submit.prevent="createDeal">
                        <div class="p-4 space-y-4">
                            <!-- Deal Name -->
                            <div>
                                <label for="deal_name" class="block text-sm font-medium text-gray-700">Deal Name</label>
                                <input type="text" id="deal_name" wire:model="deal.deal_name"
                                    class="w-full p-2 border rounded">
                                @error('deal.deal_name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Industry -->
                            <div>
                                <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                                <input type="text" id="industry" wire:model.defer="deal.industry"
                                    class="w-full p-2 border rounded">
                                @error('deal.industry') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Product Type Only for RealHomes tab -->
                            <div>
                                
                                @if ($activeTab === 'realhomes')
                                    <label for="product_type" class="block text-sm font-medium text-gray-700">Product Type</label>
                                    <select id="product_type" wire:model.defer="deal.product_type" class="w-full p-2 border rounded">
                                        <option value="">Select Product Type</option>
                                        @foreach($productTypes as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="hidden" id="product_type" wire:model.defer="deal.product_type" value="Merchant">
                                @endif
                            
                                @error('deal.product_type') 
                                    <span class="text-sm text-red-500">{{ $message }}</span> 
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
                                <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
                                <input type="text" id="designation" wire:model.defer="deal.designation"
                                    class="w-full p-2 border rounded">
                                @error('deal.designation') <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                        @if ($activeTab === 'realhomes')
                            <!-- Client Type Tag for RealHomes -->
                            <div>
                                <label for="property_owner_tag" class="block text-sm font-medium text-gray-700">Client Type Tag</label>
                                <select id="property_owner_tag" wire:model.defer="deal.property_owner_tag"
                                    class="w-full p-2 border rounded">
                                    <option value="">Select Client Type Tag</option>
                                    @foreach($propertyOwnerTags as $tag)
                                        <option value="{{ $tag }}">{{ $tag }}</option>
                                    @endforeach
                                </select>
                                @error('deal.property_owner_tag') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                        @elseif ($activeTab === 'repay')
                            <!-- Client Type Tag for Repay -->
                            <div>
                                <label for="property_owner_tag" class="block text-sm font-medium text-gray-700">Client Type Tag</label>
                                <select id="property_owner_tag" wire:model.defer="deal.property_owner_tag"
                                    class="w-full p-2 border rounded">
                                    <option value="">Select Client Type Tag</option>
                                    <option value="Merchant">Merchant</option>
                                    <option value="NGO">NGO</option>
                                    <option value="Charitable Institutions">Charitable Institutions</option>
                                </select>
                                @error('deal.property_owner_tag') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                        @endif
                    

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
                            <label for="email_address" class="block text-sm font-medium text-gray-700">Location</label>
                            <input type="text" id="location" wire:model.defer="deal.location"
                                class="w-full p-2 border rounded">
                            @error('deal.location') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <!-- Deal Size -->
                        <div>
                            <label for="deal_size" class="block text-sm font-medium text-gray-700">Deal Size</label>
                            <input type="text" id="deal_size" wire:model.defer="deal.deal_size"
                                class="w-full p-2 border rounded">
                            @error('deal.deal_size') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
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
                            <label for="deal_stage" class="block text-sm font-medium text-gray-700">Deal Stage</label>
                            <select id="deal_stage" wire:model.defer="deal.deal_stage"
                                class="w-full p-2 border rounded">
                                <option value="">Select Deal Stage</option>
                                @foreach($dealStages as $stage)
                                <option value="{{ $stage }}">{{ $stage }}</option>
                                @endforeach
                            </select>
                            @error('deal.deal_stage') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <!-- Probability -->
                        <div>
                            <label for="probability" class="block text-sm font-medium text-gray-700">Probability</label>
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
                            @error('deal.weighted_forecast') <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Priority -->
                        <div>
                            <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                            <select id="priority" wire:model.defer="deal.priority" class="w-full p-2 border rounded">
                                <option value="">Select Priority</option>
                                @foreach($priorities as $priority)
                                <option value="{{ $priority }}">{{ $priority }}</option>
                                @endforeach
                            </select>
                            @error('deal.priority') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <!-- From Date -->
                        <div>
                            <label for="from_date" class="block text-sm font-medium text-gray-700">From Date</label>
                            <input type="date" id="from_date" wire:model.defer="deal.from_date"
                                class="w-full p-2 border rounded">
                            @error('deal.from_date') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <!-- Expected Close Date -->
                        <div>
                            <label for="expected_close_date" class="block text-sm font-medium text-gray-700">Expected
                                Close
                                Date</label>
                            <input type="date" id="expected_close_date" wire:model.defer="deal.expected_close_date"
                                class="w-full p-2 border rounded">
                            @error('deal.expected_close_date') <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Next Step -->
                        <div>
                            <label for="next_step" class="block text-sm font-medium text-gray-700">Next Step</label>
                            <input type="text" id="next_step" wire:model.defer="deal.next_step"
                                class="w-full p-2 border rounded">
                            @error('deal.next_step') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <!-- Remarks -->
                        <div>
                            <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                            <input type="text" id="remarks" wire:model.defer="deal.remarks"
                                class="w-full p-2 border rounded">
                            @error('deal.remarks') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
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



                        <div class="flex justify-end mt-4">
                            {{-- <button type="button" wire:click="closeModal"
                                class="px-4 py-2 mr-2 text-white bg-gray-500 rounded">Cancel</button> --}}
                            <input type="hidden" wire:model.defer="deal.deal_type">
                            <button type="submit" class="px-4 py-2 text-white rounded bg-primary-600">Save</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
    @endif
</div>