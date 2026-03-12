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
                        Search Appointment
                    </label>
                </div>
            </div>
        </div>
    </div>

    Calendar View
</div>

