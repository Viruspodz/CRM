<div class="h-full p-4 bg-white shadow-md">
    <!-- Navigation Bar -->
    <div class="flex flex-col items-center justify-between mb-4 space-y-4 lg:flex-row lg:space-y-0">
        <!-- Navigation Tabs -->
        <x-crm.crm-tabs/>
        <div class="flex items-center w-full space-x-4 lg:w-3/4">
            <!-- Search Bar -->
            <div class="relative flex flex-col items-center w-full gap-1 px-2">
                <div class="relative flex items-center w-full">
                    <input type="text" id="search"
                        class="border-1 peer block w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-6 py-4 text-sm text-gray-900 focus:border-[#071D49] focus:outline-none focus:ring-0"
                        placeholder=" " />
                    <div class="absolute top-4.5 left-1">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
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
            <button class="flex items-center gap-2 text-nowrap" x-on:click="tab='pipeline';localStorage.setItem('tab', 'pipeline')">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                    <path d="M8.70825 15.8622C8.11068 15.2646 7.68043 14.5646 7.4175 13.8202C7.21603 13.2499 6.59114 12.9529 6.0243 13.1543C5.45746 13.3558 5.15697 13.9807 5.35843 14.5475C5.72722 15.5958 6.32821 16.5758 7.1614 17.409C10.139 20.3867 14.9572 20.3969 17.945 17.4432L19.3655 18.8637C19.6011 19.0993 19.9529 19.1676 20.2602 19.0413C20.5675 18.9149 20.7656 18.6144 20.7656 18.2832V13.9124C20.7656 13.4582 20.4002 13.0929 19.946 13.0929H15.5752C15.244 13.0929 14.9435 13.2909 14.8172 13.5982C14.6908 13.9056 14.7591 14.2573 14.9947 14.4929L16.3982 15.8963C14.2606 17.9964 10.8288 17.9861 8.70484 15.8622H8.70825ZM4.375 10.0879C4.375 10.5421 4.74037 10.9074 5.19453 10.9074H9.56534C9.89657 10.9074 10.1971 10.7094 10.3234 10.4021C10.4498 10.0948 10.3815 9.74304 10.1458 9.50742L8.7424 8.10398C10.88 6.00394 14.3118 6.01418 16.4357 8.13813C17.0333 8.7357 17.4635 9.43571 17.7265 10.1801C17.9279 10.7504 18.5528 11.0475 19.1197 10.846C19.6865 10.6445 19.987 10.0196 19.7855 9.45279C19.4168 8.40789 18.8158 7.42787 17.9792 6.59127C15.0015 3.61365 10.1834 3.60341 7.19554 6.55712L5.77503 5.13661C5.53941 4.90099 5.1877 4.8327 4.88038 4.95904C4.57305 5.08539 4.375 5.38588 4.375 5.7171V10.0845V10.0879Z" fill="#42505A"/>
                </svg>
                Switch to Pipeline View
            </button>
        </div>
    </div>

    Funnel View
</div>

