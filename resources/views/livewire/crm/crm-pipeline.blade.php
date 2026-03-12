<div class="h-full p-4 bg-white shadow-md">
    <!-- Navigation Bar -->
    <div class="flex flex-col items-center justify-between mb-4 space-y-4 lg:flex-row lg:space-y-0">
        <!-- Navigation Tabs -->
        <x-crm.crm-tabs />
        {{-- <div class="flex items-center w-full space-x-4 lg:w-3/4">
            <!-- Search Bar -->
            <div class="relative flex flex-col items-center w-full gap-1 px-2">
                <div class="relative flex items-center w-full">
                    <input type="text" id="search"
                        class="border-1 peer block w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-6 py-4 text-sm text-gray-900 focus:border-[#071D49] focus:outline-none focus:ring-0"
                        placeholder=" " />
                    <div class="absolute top-4.5 left-1">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M19.9382 7.66933C18.512 4.24469 15.1704 2.01004 11.4607 2.00013C7.46246 1.97907 3.90737 4.54006 2.66105 8.3391C1.41473 12.1381 2.7619 16.3074 5.99559 18.6588C9.22927 21.0103 13.6107 21.0068 16.8407 18.6501L19.7207 21.5301C20.0135 21.8226 20.4878 21.8226 20.7807 21.5301C21.0731 21.2373 21.0731 20.7629 20.7807 20.4701L17.9907 17.6801C20.5968 15.04 21.3644 11.094 19.9382 7.66933ZM18.6011 14.1691C17.4036 17.0547 14.5849 18.9342 11.4607 18.9301V18.8901C7.22037 18.8847 3.77812 15.4603 3.75066 11.2201C3.74662 8.09586 5.62605 5.27717 8.51172 4.0797C11.3974 2.88223 14.7203 3.54208 16.9295 5.75127C19.1387 7.96046 19.7986 11.2834 18.6011 14.1691Z"
                                fill="#0B1C3F" />
                        </svg>
                    </div>
                    <label for="search"
                        class="absolute top-2 left-6 z-10 origin-[0] -translate-y-4 scale-75 transform cursor-text select-none bg-white px-2 text-sm text-gray-500 duration-300 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:scale-100 peer-focus:top-2 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:px-2 peer-focus:text-blue-600 pointer-events-none">
                        Search Name
                    </label>
                </div>
            </div>
            <!-- Switch View Button -->
            <button class="flex items-center gap-2 text-nowrap"
                x-on:click="tab='funnel';localStorage.setItem('tab', 'funnel')">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                    <path
                        d="M8.70825 15.8622C8.11068 15.2646 7.68043 14.5646 7.4175 13.8202C7.21603 13.2499 6.59114 12.9529 6.0243 13.1543C5.45746 13.3558 5.15697 13.9807 5.35843 14.5475C5.72722 15.5958 6.32821 16.5758 7.1614 17.409C10.139 20.3867 14.9572 20.3969 17.945 17.4432L19.3655 18.8637C19.6011 19.0993 19.9529 19.1676 20.2602 19.0413C20.5675 18.9149 20.7656 18.6144 20.7656 18.2832V13.9124C20.7656 13.4582 20.4002 13.0929 19.946 13.0929H15.5752C15.244 13.0929 14.9435 13.2909 14.8172 13.5982C14.6908 13.9056 14.7591 14.2573 14.9947 14.4929L16.3982 15.8963C14.2606 17.9964 10.8288 17.9861 8.70484 15.8622H8.70825ZM4.375 10.0879C4.375 10.5421 4.74037 10.9074 5.19453 10.9074H9.56534C9.89657 10.9074 10.1971 10.7094 10.3234 10.4021C10.4498 10.0948 10.3815 9.74304 10.1458 9.50742L8.7424 8.10398C10.88 6.00394 14.3118 6.01418 16.4357 8.13813C17.0333 8.7357 17.4635 9.43571 17.7265 10.1801C17.9279 10.7504 18.5528 11.0475 19.1197 10.846C19.6865 10.6445 19.987 10.0196 19.7855 9.45279C19.4168 8.40789 18.8158 7.42787 17.9792 6.59127C15.0015 3.61365 10.1834 3.60341 7.19554 6.55712L5.77503 5.13661C5.53941 4.90099 5.1877 4.8327 4.88038 4.95904C4.57305 5.08539 4.375 5.38588 4.375 5.7171V10.0845V10.0879Z"
                        fill="#42505A" />
                </svg>
                Switch to Funnel View
            </button>
        </div> --}}
    </div>

    <!-- Data Summary Cards -->
    <div class="w-full">
        <div class="w-full h-[calc(100%-82px)] grid text-white xl:grid-cols-7 relative xl:gap-0.5">
            <!-- Header Section -->
            <div class="flex items-center justify-between p-4 text-center shadow bg-secondary-100 hover:shadow-lg">
                <div>
                    <p class="font-bold">Lead</p>
                    <p>₱{{ number_format($totalIncomeByStage['Lead'] ?? 0, 2) }}</p>
                </div>
                <span class="px-3 py-1 ml-4 text-lg font-bold text-white">0</span>
            </div> 
            <div class="flex items-center justify-between p-4 text-left shadow bg-secondary-100 hover:shadow-lg">
                <div>
                    <p class="font-bold">Contacted</p>
                    <p>₱{{ number_format($totalIncomeByStage['Contacted'] ?? 0, 2) }}</p>
                    </div>
                <span class="px-3 py-1 ml-4 text-lg font-bold text-white">0</span>
            </div>
            <div class="flex items-center justify-between p-4 text-center shadow bg-secondary-100 hover:shadow-lg">
                <div>
                    <p class="font-bold">Appointment</p>
                    <p>₱{{ number_format($totalIncomeByStage['Appointment'] ?? 0, 2) }}</p>

                </div>
                <span class="px-3 py-1 ml-4 text-lg font-bold text-white">0</span>
            </div>
            <div class="flex items-center justify-between p-4 text-center shadow bg-secondary-100 hover:shadow-lg">
                <div>
                    <p class="font-bold">Presentation</p>
                    <p>₱{{ number_format($totalIncomeByStage['Presentation'] ?? 0, 2) }}</p>

                </div>
                <span class="px-3 py-1 ml-4 text-lg font-bold text-white">0</span>
            </div>

            <div class="flex items-center justify-between p-4 text-center shadow bg-secondary-100 hover:shadow-lg">
                <div>
                    <p class="font-bold">Quotation</p>
                    <p>₱{{ number_format($totalIncomeByStage['Quotation'] ?? 0, 2) }}</p>
                </div>
                <span class="px-3 py-1 ml-4 text-lg font-bold text-white">0</span>
            </div>

            <div class="flex items-center justify-between p-4 text-center shadow bg-secondary-100 hover:shadow-lg">
                <div>
                    <p class="font-bold">Closed Won</p>
                    <p>₱{{ number_format($totalIncomeByStage['Closed Won'] ?? 0, 2) }}</p>

                </div>
                <span class="px-3 py-1 ml-4 text-lg font-bold text-white">0</span>
            </div>

            <div class="flex items-center justify-between p-4 text-center shadow bg-secondary-100 hover:shadow-lg">
                <div>
                    <p class="font-bold">Closed Lost</p>
                    <p>₱{{ number_format($totalIncomeByStage['Closed Lost'] ?? 0, 2) }}</p>

                </div>
                <span class="px-3 py-1 ml-4 text-lg font-bold text-white">0</span>
            </div>

            <!-- Content Section -->
            <div class="flex flex-col gap-4 p-2 bg-white border-l border-[#e4ebee] column" id="lead-column">
                <!-- Cards for Initial -->
                @foreach ($opportunities->where('deal_stage', 'Lead') ?? [] as $opportunity)
                    <div 
                        class="cursor-pointer card" 
                        data-id="{{ htmlspecialchars($opportunity->id, ENT_QUOTES, 'UTF-8') }}" 
                        wire:click="fetchDealDetails({{ $opportunity->id }})"

                    >
                        <x-crm.opportunity-card
                            id="{{ $opportunity->id }}"
                            deal-priority="{{ $opportunity->priority }}"
                            industry="{{ $opportunity->industry }}"
                            days-left="{{ $opportunity->days_left ?? 'N/A' }}"
                            deal-name="{{ $opportunity->deal_name }}"
                            contact-name="{{ $opportunity->contact_name }}"
                            product-type="{{ $opportunity->product_type }}"
                        />
                    </div>
                @endforeach
            </div>

            <div class="flex flex-col gap-4 p-2 bg-white border-l border-[#e4ebee] column" id="contacted-column">
                <!-- Cards for Presentation -->
                @foreach ($opportunities->where('deal_stage', 'Contacted') ?? [] as $opportunity)
                <div class="card" data-id="{{ htmlspecialchars($opportunity->id, ENT_QUOTES, 'UTF-8') }}">
                <x-crm.opportunity-card
                            id="{{ $opportunity->id }}"
                            deal-priority="{{ $opportunity->priority }}"
                            industry="{{ $opportunity->industry }}"
                            days-left="{{ $opportunity->days_left ?? 'N/A' }}"
                            deal-name="{{ $opportunity->deal_name }}"
                            contact-name="{{ $opportunity->contact_name }}"
                            product-type="{{ $opportunity->product_type }}"
                        />
                </div>
                @endforeach
            </div>
            <div class="flex flex-col gap-4 p-2 bg-white border-l border-[#e4ebee] column" id="appointment-column">
                <!-- Cards for Sold -->
                @foreach ($opportunities->where('deal_stage', 'Appointment') ?? [] as $opportunity)
                <div class="card" data-id="{{ htmlspecialchars($opportunity->id, ENT_QUOTES, 'UTF-8') }}">
                <x-crm.opportunity-card
                            id="{{ $opportunity->id }}"
                            deal-priority="{{ $opportunity->priority }}"
                            industry="{{ $opportunity->industry }}"
                            days-left="{{ $opportunity->days_left ?? 'N/A' }}"
                            deal-name="{{ $opportunity->deal_name }}"
                            contact-name="{{ $opportunity->contact_name }}"
                            product-type="{{ $opportunity->product_type }}"
                        />
                </div>
                @endforeach
            </div>
            <div class="flex flex-col gap-4 p-2 bg-white border-l border-[#e4ebee] column" id="presentation-column">
                <!-- Cards for Closed -->
                @foreach ($opportunities->where('deal_stage', 'Presentation') ?? [] as $opportunity)
                <div class="card" data-id="{{ htmlspecialchars($opportunity->id, ENT_QUOTES, 'UTF-8') }}">
                <x-crm.opportunity-card
                            id="{{ $opportunity->id }}"
                            deal-priority="{{ $opportunity->priority }}"
                            industry="{{ $opportunity->industry }}"
                            days-left="{{ $opportunity->days_left ?? 'N/A' }}"
                            deal-name="{{ $opportunity->deal_name }}"
                            contact-name="{{ $opportunity->contact_name }}"
                            product-type="{{ $opportunity->product_type }}"
                        />
                </div>
                @endforeach
            </div>
            <div class="flex flex-col gap-4 p-2 bg-white border-l border-[#e4ebee] column" id="quotation-column">
                <!-- Cards for Closed -->
                @foreach ($opportunities->where('deal_stage', 'Quotation') ?? [] as $opportunity)
                <div class="card" data-id="{{ htmlspecialchars($opportunity->id, ENT_QUOTES, 'UTF-8') }}">
                <x-crm.opportunity-card
                            id="{{ $opportunity->id }}"
                            deal-priority="{{ $opportunity->priority }}"
                            industry="{{ $opportunity->industry }}"
                            days-left="{{ $opportunity->days_left ?? 'N/A' }}"
                            deal-name="{{ $opportunity->deal_name }}"
                            contact-name="{{ $opportunity->contact_name }}"
                            product-type="{{ $opportunity->product_type }}"
                        />
                </div>
                @endforeach
            </div>
            <div class="flex flex-col gap-4 p-2 bg-white border-l border-[#e4ebee] column" id="closed won-column">
                <!-- Cards for Closed -->
                @foreach ($opportunities->where('deal_stage', 'Closed Won') ?? [] as $opportunity)
                <div class="card" data-id="{{ htmlspecialchars($opportunity->id, ENT_QUOTES, 'UTF-8') }}">
                <x-crm.opportunity-card
                            id="{{ $opportunity->id }}"
                            deal-priority="{{ $opportunity->priority }}"
                            industry="{{ $opportunity->industry }}"
                            days-left="{{ $opportunity->days_left ?? 'N/A' }}"
                            deal-name="{{ $opportunity->deal_name }}"
                            contact-name="{{ $opportunity->contact_name }}"
                            product-type="{{ $opportunity->product_type }}"
                        />
                </div>
                @endforeach
            </div>
            <div class="flex flex-col gap-4 p-2 bg-white border-l border-[#e4ebee] column" id="closed lost-column">
                <!-- Cards for Closed -->
                @foreach ($opportunities->where('deal_stage', 'Closed Lost') ?? [] as $opportunity)
                <div class="card" data-id="{{ htmlspecialchars($opportunity->id, ENT_QUOTES, 'UTF-8') }}">
                <x-crm.opportunity-card
                            id="{{ $opportunity->id }}"
                            deal-priority="{{ $opportunity->priority }}"
                            industry="{{ $opportunity->industry }}"
                            days-left="{{ $opportunity->days_left ?? 'N/A' }}"
                            deal-name="{{ $opportunity->deal_name }}"
                            contact-name="{{ $opportunity->contact_name }}"
                            product-type="{{ $opportunity->product_type }}"
                        />
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- <!-- Modal -->
    @if ($showModal)
    <div class="modal fade show" style="display: block;" tabindex="-1" aria-labelledby="opportunityModalLabel"
        aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="opportunityModalLabel">Opportunity Details</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Deal Name:</strong> {{ $selectedDeal['deal_name'] ?? 'N/A' }}</p>
                    <p><strong>Priority:</strong> {{ $selectedDeal['priority'] ?? 'N/A' }}</p>
                    <p><strong>Industry:</strong> {{ $selectedDeal['industry'] ?? 'N/A' }}</p>
                    <p><strong>Days Left:</strong> {{ $selectedDeal['days_left'] ?? 'N/A' }}</p>
                    <p><strong>Contact Name:</strong> {{ $selectedDeal['contact_name'] ?? 'N/A' }}</p>
                    <p><strong>Product Type:</strong> {{ $selectedDeal['product_type'] ?? 'N/A' }}</p>
                </div>
            </div>
        </div> 
    </div>
    @endif

    <!-- Modal Background Overlay -->
    @if ($showModal)
    <div class="modal-backdrop fade show"></div>
    @endif --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const columnIds = [
            'lead-column', 'contacted-column', 'appointment-column', 
            'presentation-column', 'quotation-column', 'closed won-column', 'closed lost-column'
        ];

        // Function to check if movement is backward
        function isMovingBack(originalStage, newStage) {
            const stages = ['lead', 'contacted', 'appointment', 'presentation', 'quotation', 'closed won', 'closed lost'];
            return stages.indexOf(newStage) < stages.indexOf(originalStage);
        }

        columnIds.forEach(columnId => {
            const column = document.getElementById(columnId);

            if (column) {
                try {
                    new Sortable(column, {
                        group: 'opportunity-stage', // Shared group for cross-column dragging
                        animation: 150,
                        onStart: (event) => {
                            event.item.dataset.originalColumn = event.from.getAttribute('id'); // Store original column
                        },
                        onEnd: (event) => {
                            const dealId = event.item.getAttribute('data-id');
                            const originalColumn = document.getElementById(event.item.dataset.originalColumn);
                            const newColumn = event.to;
                            const originalStage = originalColumn.getAttribute('id').replace('-column', '');
                            const newStage = newColumn.getAttribute('id').replace('-column', '');

                            // Prevent backward movement
                            if (isMovingBack(originalStage, newStage)) {
                                Swal.fire("Action Not Allowed", "You cannot move deals backward!", "error");
                                originalColumn.appendChild(event.item); // Move back to original column
                                return;
                            }

                            // Show confirmation popup
                            Swal.fire({
                                title: "Move Opportunity?",
                                text: `Are you sure you want to move this opportunity to "${newStage}"?`,
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonText: "Yes, move it!",
                                confirmButtonColor: "#d60a64",
                                cancelButtonText: "No, cancel",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Move the deal to the new column
                                    newColumn.appendChild(event.item);

                                    // Livewire dispatch (if Livewire is available)
                                    if (typeof Livewire !== 'undefined') {
                                        Livewire.dispatch('updateDealStage', { dealId, newStage });
                                    } else {
                                        console.error('Livewire is not defined');
                                    }
                                } else {
                                    // Move the deal back to its original column if cancelled
                                    originalColumn.appendChild(event.item);
                                }
                            });

                            event.item.classList.remove("dragging");
                        },
                    });
                } catch (error) {
                    console.error('Error initializing Sortable:', error);
                }
            } else {
                console.warn(`Column with ID "${columnId}" not found.`);
            }
        });

        // Listen for Livewire refresh event
        Livewire.on('refreshBoard', () => {
            Swal.fire("Success!", "Deal stage updated successfully!", "success");
        });

        // Listen for custom alert event from Livewire
        Livewire.on('showAlert', (title, message, icon) => {
            Swal.fire(title, message, icon);
        });

    });
</script>


<style>
        .dragging {
            opacity: 0.5;
            background-color: lightblue;
        }
    </style>

</div>