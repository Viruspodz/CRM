<div x-data="data()">
    @push('styles')
        <style>
            /* For Chrome, Safari, Edge, and Opera */
            input[type="time"]::-webkit-calendar-picker-indicator {
                display: none;
                -webkit-appearance: none;
            }
    
            /* For Firefox */
            input[type="time"] {
                -moz-appearance: textfield;
            }
    
            /* For Internet Explorer */
            input[type="time"]::-ms-clear {
                display: none;
            }
            /* For Chrome, Safari, Edge, and Opera */
            input[type="date"]::-webkit-calendar-picker-indicator {
                display: none;
                -webkit-appearance: none;
            }
    
            /* For Firefox */
            input[type="date"] {
                -moz-appearance: textfield;
            }
    
            /* For Internet Explorer */
            input[type="date"]::-ms-clear {
                display: none;
            }
    
        </style>
    @endpush
    
            <div id="draggableSticky" class="fixed z-30 pointer-events-none right-2 bottom-28"">
                <div class="absolute cursor-pointer pointer-events-auto right-16 bottom-20 lg:bottom-52" x-cloak">
                   
                    <div @click="opportunityModal=true; mobileTab = false" class="flex items-center justify-between text-xs text-white semi-bold group">
                        <span class="w-36 justify-center flex py-3 rounded-sm semi-bold bg-[#90A1AD] group-hover:bg-[#E31C79] align-middle">
                            Create Deal
                        </span>
                        <div class="rounded-full px-[10px] py-[12.5px] bg-[#90A1AD] group-hover:bg-[#E31C79] ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="20" viewBox="0 0 17 17" fill="none">
                                <path d="M7.50008 16.5C7.21675 16.5 6.97925 16.4042 6.78758 16.2125C6.59591 16.0208 6.50008 15.7833 6.50008 15.5V9.5L0.70008 2.1C0.45008 1.76667 0.41258 1.41667 0.58758 1.05C0.76258 0.683333 1.06675 0.5 1.50008 0.5H15.5001C15.9334 0.5 16.2376 0.683333 16.4126 1.05C16.5876 1.41667 16.5501 1.76667 16.3001 2.1L10.5001 9.5V15.5C10.5001 15.7833 10.4042 16.0208 10.2126 16.2125C10.0209 16.4042 9.78341 16.5 9.50008 16.5H7.50008Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>
    
    
                {{-- Pink Circle Close and Open --}}
                <span class="absolute  cursor-pointer right-14  bottom-1 lg:bottom-32 rounded-full bg-[#E31C79] transition-transform h-16 w-16 pointer-events-auto" :class="toggle === true ? 'rotate-[-45deg]' : 'rotate-[0deg]'" @click="toggle = !toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none" class="mx-auto mt-5">
                        <path d="M9.6875 13.3125H0.3125L0.3125 10.1875H9.6875V0.8125L12.8125 0.8125V10.1875L22.1875 10.1875V13.3125L12.8125 13.3125L12.8125 22.6875H9.6875L9.6875 13.3125Z" fill="white"/>
                    </svg>
                <span>
            </div>
            {{-- New Lead Modal --}}
            {{-- Add Opportunity --}}
            <div x-cloak x-show="opportunityModal" class="fixed inset-0 z-40 flex items-center justify-center bg-black/50">
                <div @click.outside="opportunityModal = false; $wire.resetInputFields()" class=" bg-white flex flex-col rounded-md max-h-[95vh] h-[800px]">
                    <div class="flex items-center justify-between px-8 py-6 border-b-2 ">
                        <p class="text-[24px] font-[700] text-[#11263C]">Add Opportunity</p>
                        <span @click="opportunityModal = false; $wire.resetInputFields()" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                            <path d="M14.2003 12.0008L19.5821 6.61748C19.7275 6.47704 19.8435 6.30905 19.9233 6.12331C20.0031 5.93757 20.0451 5.7378 20.0468 5.53565C20.0486 5.3335 20.0101 5.13303 19.9335 4.94593C19.857 4.75883 19.7439 4.58885 19.601 4.44591C19.458 4.30296 19.288 4.18992 19.1009 4.11337C18.9138 4.03682 18.7134 3.9983 18.5112 4.00006C18.3091 4.00181 18.1093 4.04381 17.9236 4.1236C17.7378 4.20339 17.5698 4.31937 17.4294 4.46478L12.0461 9.84654L6.66436 4.46478C6.52392 4.31937 6.35593 4.20339 6.17018 4.1236C5.98444 4.04381 5.78467 4.00181 5.58253 4.00006C5.38038 3.9983 5.17991 4.03682 4.99281 4.11337C4.80571 4.18992 4.63573 4.30296 4.49278 4.44591C4.34984 4.58885 4.23679 4.75883 4.16024 4.94593C4.0837 5.13303 4.04518 5.3335 4.04693 5.53565C4.04869 5.7378 4.09069 5.93757 4.17048 6.12331C4.25026 6.30905 4.36625 6.47704 4.51165 6.61748L9.89341 11.9992L4.51165 17.3825C4.36625 17.523 4.25026 17.691 4.17048 17.8767C4.09069 18.0624 4.04869 18.2622 4.04693 18.4644C4.04518 18.6665 4.0837 18.867 4.16024 19.0541C4.23679 19.2412 4.34984 19.4111 4.49278 19.5541C4.63573 19.697 4.80571 19.8101 4.99281 19.8866C5.17991 19.9632 5.38038 20.0017 5.58253 19.9999C5.78467 19.9982 5.98444 19.9562 6.17018 19.8764C6.35593 19.7966 6.52392 19.6806 6.66436 19.5352L12.0461 14.1535L17.4294 19.5352C17.5698 19.6806 17.7378 19.7966 17.9236 19.8764C18.1093 19.9562 18.3091 19.9982 18.5112 19.9999C18.7134 20.0017 18.9138 19.9632 19.1009 19.8866C19.288 19.8101 19.458 19.697 19.601 19.5541C19.7439 19.4111 19.857 19.2412 19.9335 19.0541C20.0101 18.867 20.0486 18.6665 20.0468 18.4644C20.0451 18.2622 20.0031 18.0624 19.9233 17.8767C19.8435 17.691 19.7275 17.523 19.5821 17.3825L14.2003 11.9992V12.0008Z" fill="#1C1B1F"/>
                                        </svg>
                        </span>
                    </div>
    
                    <!-- Middle Content-->
                    <div class="sm:px-8 px-2 py-6 gap-11 flex flex-col w-screen sm:w-[650px] overflow-y-auto">
                        <div class="flex flex-col gap-5">
                            <p class="text-[20px] font-[700] text-[#647887]">Personal Details</p>
    
                            <!-- Email -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                        <path d="M4.718 0.441476C4.718 0.889476 4.67533 1.32148 4.59 1.73748C4.51533 2.14281 4.43533 2.56414 4.35 3.00148C4.734 2.78814 5.11267 2.58014 5.486 2.37748C5.85933 2.17481 6.26467 1.99881 6.702 1.84948L6.798 1.81748L7.246 3.16148L7.118 3.20948C6.69133 3.36948 6.26467 3.47614 5.838 3.52948C5.41133 3.57214 4.974 3.60948 4.526 3.64148C4.878 3.94014 5.20867 4.23348 5.518 4.52148C5.82733 4.79881 6.11533 5.12414 6.382 5.49748L6.462 5.60948L5.294 6.42548L5.23 6.32948C4.974 5.94548 4.75 5.56681 4.558 5.19348C4.37667 4.80948 4.19 4.41481 3.998 4.00948C3.806 4.41481 3.614 4.80948 3.422 5.19348C3.24067 5.56681 3.022 5.94548 2.766 6.32948L2.702 6.42548L1.534 5.60948L1.614 5.49748C1.88067 5.12414 2.16867 4.79881 2.478 4.52148C2.78733 4.23348 3.118 3.94014 3.47 3.64148C3.022 3.60948 2.58467 3.57214 2.158 3.52948C1.73133 3.47614 1.30467 3.36948 0.878 3.20948L0.75 3.16148L1.198 1.81748L1.294 1.84948C1.73133 1.99881 2.13667 2.17481 2.51 2.37748C2.88333 2.58014 3.262 2.78814 3.646 3.00148C3.56067 2.56414 3.47533 2.14281 3.39 1.73748C3.31533 1.32148 3.278 0.889476 3.278 0.441476V0.313477H4.718V0.441476Z" fill="#E31C79"/>
                                    </svg>
                                    <label for="email" class="text-[#647887] text-[12px] sm:text-[16px] font-[400]">Email</label>
                                </div>
                                <div class="flex flex-col w-1/2">
                                    <input  wire:model.live="email" id="email" @input.debounce.500ms="$wire.checkEmail()" type="email" class="text-[12px] sm:text-[16px] rounded-md border-[#647887] h-9 w-full sm:h-10 sm:w-72 font-[400] text-[#647887] "/>
                                    @if($errors->has('email'))
                                        @error('email') <span class="text-red-500 font-bold text-[10px]">{{ '*' . $message }}</span> @enderror
                                    @elseif(collect($checkUsers)->isNotEmpty())
                                            <div class="flex gap-0.5 items-center">
                                                <span class="rounded-full bg-[#005C35] w-3 h-3 flex justify-center items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" fill="none">
                                                            <g clip-path="url(#clip0_33465_5785)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.43266 2.07234C7.52639 2.1661 7.57905 2.29326 7.57905 2.42584C7.57905 2.55842 7.52639 2.68558 7.43266 2.77934L3.68499 6.52701C3.63547 6.57655 3.57667 6.61584 3.51195 6.64265C3.44724 6.66946 3.37787 6.68326 3.30783 6.68326C3.23778 6.68326 3.16842 6.66946 3.1037 6.64265C3.03899 6.61584 2.98019 6.57655 2.93066 6.52701L1.06866 4.66534C1.0209 4.61922 0.982814 4.56405 0.956609 4.50304C0.930405 4.44204 0.916611 4.37643 0.916035 4.31004C0.915458 4.24365 0.928108 4.17781 0.953249 4.11636C0.978389 4.05492 1.01552 3.99909 1.06246 3.95214C1.10941 3.9052 1.16523 3.86807 1.22668 3.84293C1.28813 3.81779 1.35397 3.80514 1.42036 3.80572C1.48675 3.80629 1.55236 3.82009 1.61336 3.84629C1.67436 3.87249 1.72954 3.91059 1.77566 3.95834L3.30766 5.49034L6.72533 2.07234C6.77176 2.02588 6.82689 1.98902 6.88758 1.96387C6.94826 1.93872 7.0133 1.92578 7.07899 1.92578C7.14468 1.92578 7.20972 1.93872 7.27041 1.96387C7.33109 1.98902 7.38623 2.02588 7.43266 2.07234Z" fill="white"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath id="clip0_33465_5785">
                                                            <rect width="8" height="8" fill="white" transform="translate(0.25 0.369141)"/>
                                                            </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </span>
                                                    <p class="flex text-[10px] text-[#647887] font-[700]">This email is registered with RealHolmes!</p>
                                            </div>
    
                                    @endif
    
                                </div>
                            </div>
    
                            <!-- First Name -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                        <path d="M4.718 0.441476C4.718 0.889476 4.67533 1.32148 4.59 1.73748C4.51533 2.14281 4.43533 2.56414 4.35 3.00148C4.734 2.78814 5.11267 2.58014 5.486 2.37748C5.85933 2.17481 6.26467 1.99881 6.702 1.84948L6.798 1.81748L7.246 3.16148L7.118 3.20948C6.69133 3.36948 6.26467 3.47614 5.838 3.52948C5.41133 3.57214 4.974 3.60948 4.526 3.64148C4.878 3.94014 5.20867 4.23348 5.518 4.52148C5.82733 4.79881 6.11533 5.12414 6.382 5.49748L6.462 5.60948L5.294 6.42548L5.23 6.32948C4.974 5.94548 4.75 5.56681 4.558 5.19348C4.37667 4.80948 4.19 4.41481 3.998 4.00948C3.806 4.41481 3.614 4.80948 3.422 5.19348C3.24067 5.56681 3.022 5.94548 2.766 6.32948L2.702 6.42548L1.534 5.60948L1.614 5.49748C1.88067 5.12414 2.16867 4.79881 2.478 4.52148C2.78733 4.23348 3.118 3.94014 3.47 3.64148C3.022 3.60948 2.58467 3.57214 2.158 3.52948C1.73133 3.47614 1.30467 3.36948 0.878 3.20948L0.75 3.16148L1.198 1.81748L1.294 1.84948C1.73133 1.99881 2.13667 2.17481 2.51 2.37748C2.88333 2.58014 3.262 2.78814 3.646 3.00148C3.56067 2.56414 3.47533 2.14281 3.39 1.73748C3.31533 1.32148 3.278 0.889476 3.278 0.441476V0.313477H4.718V0.441476Z" fill="#E31C79"/>
                                    </svg>
                                    <label for="firstname"  class="text-[#647887] text-[12px] sm:text-[16px] font-[400]">First Name</label>
                                </div>
                                <div class="flex flex-col w-1/2">
                                    <input id="firstname" wire:model.live='first_name'  class="flex text-[12px] sm:text-[16px] rounded-md border-[#647887] h-9 w-full sm:h-10 sm:w-72 font-[400] text-[#647887]"/>
                                    @error('first_name') <span class="text-red-500 font-bold text-[10px]">{{ '*' . $message }}</span> @enderror
                                </div>
                            </div>
    
                            <!-- Last Name -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                        <path d="M4.718 0.441476C4.718 0.889476 4.67533 1.32148 4.59 1.73748C4.51533 2.14281 4.43533 2.56414 4.35 3.00148C4.734 2.78814 5.11267 2.58014 5.486 2.37748C5.85933 2.17481 6.26467 1.99881 6.702 1.84948L6.798 1.81748L7.246 3.16148L7.118 3.20948C6.69133 3.36948 6.26467 3.47614 5.838 3.52948C5.41133 3.57214 4.974 3.60948 4.526 3.64148C4.878 3.94014 5.20867 4.23348 5.518 4.52148C5.82733 4.79881 6.11533 5.12414 6.382 5.49748L6.462 5.60948L5.294 6.42548L5.23 6.32948C4.974 5.94548 4.75 5.56681 4.558 5.19348C4.37667 4.80948 4.19 4.41481 3.998 4.00948C3.806 4.41481 3.614 4.80948 3.422 5.19348C3.24067 5.56681 3.022 5.94548 2.766 6.32948L2.702 6.42548L1.534 5.60948L1.614 5.49748C1.88067 5.12414 2.16867 4.79881 2.478 4.52148C2.78733 4.23348 3.118 3.94014 3.47 3.64148C3.022 3.60948 2.58467 3.57214 2.158 3.52948C1.73133 3.47614 1.30467 3.36948 0.878 3.20948L0.75 3.16148L1.198 1.81748L1.294 1.84948C1.73133 1.99881 2.13667 2.17481 2.51 2.37748C2.88333 2.58014 3.262 2.78814 3.646 3.00148C3.56067 2.56414 3.47533 2.14281 3.39 1.73748C3.31533 1.32148 3.278 0.889476 3.278 0.441476V0.313477H4.718V0.441476Z" fill="#E31C79"/>
                                    </svg>
                                    <label for="lastname" class="text-[#647887] text-[12px] sm:text-[16px] font-[400]">Last Name</label>
                                </div>
                                <div class="flex flex-col w-1/2">
                                    <input id="lastname" wire:model.live='last_name' class="flex text-[12px] sm:text-[16px] rounded-md border-[#647887] h-9 w-full sm:h-10 sm:w-72 font-[400] text-[#647887]"/>
                                    @error('last_name') <span class="text-red-500 font-bold text-[10px]">{{ '*' . $message }}</span> @enderror
                                </div>
                            </div>
    
                            <!-- Mobile Number -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                        <path d="M4.718 0.441476C4.718 0.889476 4.67533 1.32148 4.59 1.73748C4.51533 2.14281 4.43533 2.56414 4.35 3.00148C4.734 2.78814 5.11267 2.58014 5.486 2.37748C5.85933 2.17481 6.26467 1.99881 6.702 1.84948L6.798 1.81748L7.246 3.16148L7.118 3.20948C6.69133 3.36948 6.26467 3.47614 5.838 3.52948C5.41133 3.57214 4.974 3.60948 4.526 3.64148C4.878 3.94014 5.20867 4.23348 5.518 4.52148C5.82733 4.79881 6.11533 5.12414 6.382 5.49748L6.462 5.60948L5.294 6.42548L5.23 6.32948C4.974 5.94548 4.75 5.56681 4.558 5.19348C4.37667 4.80948 4.19 4.41481 3.998 4.00948C3.806 4.41481 3.614 4.80948 3.422 5.19348C3.24067 5.56681 3.022 5.94548 2.766 6.32948L2.702 6.42548L1.534 5.60948L1.614 5.49748C1.88067 5.12414 2.16867 4.79881 2.478 4.52148C2.78733 4.23348 3.118 3.94014 3.47 3.64148C3.022 3.60948 2.58467 3.57214 2.158 3.52948C1.73133 3.47614 1.30467 3.36948 0.878 3.20948L0.75 3.16148L1.198 1.81748L1.294 1.84948C1.73133 1.99881 2.13667 2.17481 2.51 2.37748C2.88333 2.58014 3.262 2.78814 3.646 3.00148C3.56067 2.56414 3.47533 2.14281 3.39 1.73748C3.31533 1.32148 3.278 0.889476 3.278 0.441476V0.313477H4.718V0.441476Z" fill="#E31C79"/>
                                    </svg>
                                    <label for="mobilenumber" class="text-[#647887] text-[12px] sm:text-[16px] font-[400]">Mobile Number</label>
                                </div>
                                <div class="flex flex-col w-1/2">
                                    <input id="mobilenumber" wire:model.live='mobile_number' class="flex text-[12px] sm:text-[16px] rounded-md border-[#647887] h-9 w-full sm:h-10 sm:w-72 font-[400] text-[#647887]"/>
                                    @error('mobile_number') <span class="text-red-500 font-bold text-[10px]">{{ '*' . $message }}</span> @enderror
                                </div>
                            </div>
    
                            <!-- Source -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                        <path d="M4.718 0.441476C4.718 0.889476 4.67533 1.32148 4.59 1.73748C4.51533 2.14281 4.43533 2.56414 4.35 3.00148C4.734 2.78814 5.11267 2.58014 5.486 2.37748C5.85933 2.17481 6.26467 1.99881 6.702 1.84948L6.798 1.81748L7.246 3.16148L7.118 3.20948C6.69133 3.36948 6.26467 3.47614 5.838 3.52948C5.41133 3.57214 4.974 3.60948 4.526 3.64148C4.878 3.94014 5.20867 4.23348 5.518 4.52148C5.82733 4.79881 6.11533 5.12414 6.382 5.49748L6.462 5.60948L5.294 6.42548L5.23 6.32948C4.974 5.94548 4.75 5.56681 4.558 5.19348C4.37667 4.80948 4.19 4.41481 3.998 4.00948C3.806 4.41481 3.614 4.80948 3.422 5.19348C3.24067 5.56681 3.022 5.94548 2.766 6.32948L2.702 6.42548L1.534 5.60948L1.614 5.49748C1.88067 5.12414 2.16867 4.79881 2.478 4.52148C2.78733 4.23348 3.118 3.94014 3.47 3.64148C3.022 3.60948 2.58467 3.57214 2.158 3.52948C1.73133 3.47614 1.30467 3.36948 0.878 3.20948L0.75 3.16148L1.198 1.81748L1.294 1.84948C1.73133 1.99881 2.13667 2.17481 2.51 2.37748C2.88333 2.58014 3.262 2.78814 3.646 3.00148C3.56067 2.56414 3.47533 2.14281 3.39 1.73748C3.31533 1.32148 3.278 0.889476 3.278 0.441476V0.313477H4.718V0.441476Z" fill="#E31C79"/>
                                    </svg>
                                    <label for="source" class="text-[#647887] text-[12px] sm:text-[16px] font-[400]">Source</label>
                                </div>
                                <div class="flex flex-col w-1/2">
                                    <select wire:model.live='source' id="source" class="flex text-[12px] sm:text-[16px] rounded-md border-[#647887] h-9 w-full sm:h-10 sm:w-72 font-[400] text-[#647887]">
                                        <option value='facebook' >Facebook</option>
                                        <option value='linkedIn' selected>LinkedIn</option>
                                        <option value='x'>X &lpar;Formerly Twitter&rpar;</option>
                                        <option value='whatsapp'>WhatsApp</option>
                                        <option value='viber'>Viber</option>
                                        <option value='email'>Email</option>
                                    </select>
                                    @error('source') <span class="text-red-500 font-bold text-[10px]">{{ '*' . $message }}</span> @enderror
                                </div>
                            </div>
    
    
                            <!-- Qualification -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                        <path d="M4.718 0.441476C4.718 0.889476 4.67533 1.32148 4.59 1.73748C4.51533 2.14281 4.43533 2.56414 4.35 3.00148C4.734 2.78814 5.11267 2.58014 5.486 2.37748C5.85933 2.17481 6.26467 1.99881 6.702 1.84948L6.798 1.81748L7.246 3.16148L7.118 3.20948C6.69133 3.36948 6.26467 3.47614 5.838 3.52948C5.41133 3.57214 4.974 3.60948 4.526 3.64148C4.878 3.94014 5.20867 4.23348 5.518 4.52148C5.82733 4.79881 6.11533 5.12414 6.382 5.49748L6.462 5.60948L5.294 6.42548L5.23 6.32948C4.974 5.94548 4.75 5.56681 4.558 5.19348C4.37667 4.80948 4.19 4.41481 3.998 4.00948C3.806 4.41481 3.614 4.80948 3.422 5.19348C3.24067 5.56681 3.022 5.94548 2.766 6.32948L2.702 6.42548L1.534 5.60948L1.614 5.49748C1.88067 5.12414 2.16867 4.79881 2.478 4.52148C2.78733 4.23348 3.118 3.94014 3.47 3.64148C3.022 3.60948 2.58467 3.57214 2.158 3.52948C1.73133 3.47614 1.30467 3.36948 0.878 3.20948L0.75 3.16148L1.198 1.81748L1.294 1.84948C1.73133 1.99881 2.13667 2.17481 2.51 2.37748C2.88333 2.58014 3.262 2.78814 3.646 3.00148C3.56067 2.56414 3.47533 2.14281 3.39 1.73748C3.31533 1.32148 3.278 0.889476 3.278 0.441476V0.313477H4.718V0.441476Z" fill="#E31C79"/>
                                    </svg>
                                    <label class="text-[#647887] text-[12px] sm:text-[16px] font-[400]">Qualification</label>
                                </div>
                                <div class="flex gap-2">
                                    <label class="group has-[:checked]:bg-[#B00000] has-[:checked]:border-0  has-[:checked]:text-white flex items-center justify-between text-[#647887] w-20 sm:w-28 px-3 py-1 rounded-full border-[#647887] hover:bg-[#647887] has-[:checked]:hover:bg-[#B00000] hover:text-white border has-[:checked]:cursor-auto cursor-pointer">
                                        <p class="text-[10px] sm:text-[13px] font-[500] select-none">Hot</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none" class="hidden group-has-[:checked]:block">
                                            <path d="M8.72754 12.3691L11.5575 15.1991L17.2275 9.53906" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <input type="radio" class="sr-only" x-model="qualification" value="5" />
                                    </label>
    
                                    <label class="group has-[:checked]:bg-[#5AA5D7] has-[:checked]:border-0 has-[:checked]:text-white flex items-center justify-between text-[#647887] w-20 sm:w-28 px-3 py-1 rounded-full border-[#647887] hover:bg-[#647887] has-[:checked]:hover:bg-[#5AA5D7] hover:text-white border has-[:checked]:cursor-auto cursor-pointer">
                                        <p class="text-[10px] sm:text-[13px] font-[500] select-none">Cold</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none" class="hidden group-has-[:checked]:block">
                                            <path d="M8.72754 12.3691L11.5575 15.1991L17.2275 9.53906" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <input type="radio"  class="sr-only" x-model="qualification" value="2"/>
                                    </label>
                                </div>
                            </div>
    
                            <!-- Label -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                        <path d="M4.718 0.441476C4.718 0.889476 4.67533 1.32148 4.59 1.73748C4.51533 2.14281 4.43533 2.56414 4.35 3.00148C4.734 2.78814 5.11267 2.58014 5.486 2.37748C5.85933 2.17481 6.26467 1.99881 6.702 1.84948L6.798 1.81748L7.246 3.16148L7.118 3.20948C6.69133 3.36948 6.26467 3.47614 5.838 3.52948C5.41133 3.57214 4.974 3.60948 4.526 3.64148C4.878 3.94014 5.20867 4.23348 5.518 4.52148C5.82733 4.79881 6.11533 5.12414 6.382 5.49748L6.462 5.60948L5.294 6.42548L5.23 6.32948C4.974 5.94548 4.75 5.56681 4.558 5.19348C4.37667 4.80948 4.19 4.41481 3.998 4.00948C3.806 4.41481 3.614 4.80948 3.422 5.19348C3.24067 5.56681 3.022 5.94548 2.766 6.32948L2.702 6.42548L1.534 5.60948L1.614 5.49748C1.88067 5.12414 2.16867 4.79881 2.478 4.52148C2.78733 4.23348 3.118 3.94014 3.47 3.64148C3.022 3.60948 2.58467 3.57214 2.158 3.52948C1.73133 3.47614 1.30467 3.36948 0.878 3.20948L0.75 3.16148L1.198 1.81748L1.294 1.84948C1.73133 1.99881 2.13667 2.17481 2.51 2.37748C2.88333 2.58014 3.262 2.78814 3.646 3.00148C3.56067 2.56414 3.47533 2.14281 3.39 1.73748C3.31533 1.32148 3.278 0.889476 3.278 0.441476V0.313477H4.718V0.441476Z" fill="#E31C79"/>
                                    </svg>
                                    <label class="text-[#647887] text-[12px] sm:text-[16px] font-[400]">Label</label>
                                </div>
                                <div class="flex gap-2">
                                    <label class="group has-[:checked]:bg-[#E31C79] has-[:checked]:border-0 has-[:checked]:text-white flex items-center justify-between text-[#647887] w-20 sm:w-28 px-3 py-1 rounded-full border-[#647887] hover:bg-[#647887] has-[:checked]:hover:bg-[#E31C79] hover:text-white border has-[:checked]:cursor-auto cursor-pointer">
                                        <p class="text-[10px] sm:text-[13px] font-[500">Lead</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none" class="hidden group-has-[:checked]:block">
                                            <path d="M8.72754 12.3691L11.5575 15.1991L17.2275 9.53906" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <input type="radio" class="sr-only" x-model="label" value="1" checked />
                                    </label>
    
                                    <label class="group has-[:checked]:bg-[#071D49] has-[:checked]:border-0 has-[:checked]:text-white flex items-center justify-between text-[#647887] w-20 sm:w-28 px-3 py-1 rounded-full border-[#647887] hover:bg-[#647887] has-[:checked]:hover:bg-[#071D49] hover:text-white border has-[:checked]:cursor-auto cursor-pointer">
                                        <p class="text-[10px] sm:text-[13px] font-[500]">Client</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none" class="hidden group-has-[:checked]:block">
                                            <path d="M8.72754 12.3691L11.5575 15.1991L17.2275 9.53906" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <input type="radio" class="sr-only" x-model="label" value="2"/>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Add Tag -->
                        <div class="flex flex-col gap-5">
                            <p class="text-[20px] font-[700] text-[#647887]">Tag Contacts</p>
                            <div class="flex gap-3">
    
                                @if($selectedContacts)
                                    @foreach ($selectedContacts as $selectedContact)
                                        <div class="rounded-full bg-[#E4EBEE] flex justify-center items-center w-14 h-14 relative ">
                                            @if($selectedContact['profile_photo_path'])
                                            <span class="flex items-center justify-center w-full h-full overflow-hidden rounded-full">
                                                <img class="w-full h-full objec-cover" src="{{ url('/my-dp/' .$selectedContact['profile_photo_path']) }}">
                                            </span>
                                            @else
                                            <span class="flex items-center justify-center w-full h-full overflow-hidden rounded-full">
                                                <span class="text-[#647887] text-[30px] ">{{strtoupper($selectedContact['first_name'][0]) }}</span>
                                            </span>
                                            @endif
                                            <span class="absolute top-0 cursor-pointer -right-2" @click="$wire.removeContact({{$selectedContact['id']}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 17 17" fill="none">
                                                    <path d="M11.043 1.70215H5.45634C3.02967 1.70215 1.58301 3.14882 1.58301 5.57548V11.1555C1.58301 13.5888 3.02967 15.0355 5.45634 15.0355H11.0363C13.463 15.0355 14.9097 13.5888 14.9097 11.1621V5.57548C14.9163 3.14882 13.4697 1.70215 11.043 1.70215ZM10.4897 9.90215C10.683 10.0955 10.683 10.4155 10.4897 10.6088C10.3897 10.7088 10.263 10.7555 10.1363 10.7555C10.0097 10.7555 9.88301 10.7088 9.78301 10.6088L8.24967 9.07548L6.71634 10.6088C6.61634 10.7088 6.48967 10.7555 6.36301 10.7555C6.23634 10.7555 6.10967 10.7088 6.00967 10.6088C5.81634 10.4155 5.81634 10.0955 6.00967 9.90215L7.54301 8.36882L6.00967 6.83548C5.81634 6.64215 5.81634 6.32215 6.00967 6.12882C6.20301 5.93548 6.52301 5.93548 6.71634 6.12882L8.24967 7.66215L9.78301 6.12882C9.97634 5.93548 10.2963 5.93548 10.4897 6.12882C10.683 6.32215 10.683 6.64215 10.4897 6.83548L8.95634 8.36882L10.4897 9.90215Z" fill="#647887"/>
                                                </svg>
                                            </span>
                                        </div>
                                    @endforeach
                                @endif
    
                                <div @click="toggleTagContact = true" class="rounded-full bg-[#E4EBEE] flex justify-center items-center w-14 h-14 cursor-pointer relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                                        <mask id="mask0_35266_5984" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="38" height="38">
                                        <rect x="0.0703125" width="37.5" height="37.5" fill="#D9D9D9"/>
                                        </mask>
                                        <g mask="url(#mask0_35266_5984)">
                                        <path d="M17.2578 20.3125H7.88281V17.1875H17.2578V7.8125H20.3828V17.1875H29.7578V20.3125H20.3828V29.6875H17.2578V20.3125Z" fill="#90A1AD"/>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            @error('selectedContactId') <span class="text-red-500 font-bold text-[10px]">{{ '*' . $message }}</span> @enderror
                            @error('selectedContactId.*') <span class="text-red-500 font-bold text-[10px]">{{ '*' . $message }}</span> @enderror
                        </div>
    
                        <!-- Tag Property -->
                        <div class="flex flex-col gap-5">
                            <p class="text-[20px] font-[700] text-[#647887]">Tag Property</p>
                            @if ($tagProperty)
                                <div class="flex relative w-full items-center pr-3 rounded-lg shadow-[0px_2px_4px_0px_rgba(0,0,0,0.10),0px_0px_2px_0px_rgba(0,0,0,0.25)]">
                                    <div class="w-[20%] h-full">
                                        @if($tagProperty->photos->first())
                                            <img class="object-cover w-full h-full rounded-l-lg" src="{{ url('/thumb/' . $tagProperty->photos->first()->id) }}">
                                        @else
                                            <img class="object-cover w-full h-full rounded-l-lg" src="{{ url('/images/rhlogo-white.svg') }}">
                                        @endif
                                    </div>
                                    <div class="flex justify-between items-center w-[80%]">
                                        <div class="flex flex-col w-full py-3 pl-2">
                                            <div class="flex items-center w-[80%]">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                        <path d="M8.54036 1.62793C4.63745 1.62793 1.45703 4.80835 1.45703 8.71126C1.45703 12.6142 4.63745 15.7946 8.54036 15.7946C12.4433 15.7946 15.6237 12.6142 15.6237 8.71126C15.6237 4.80835 12.4433 1.62793 8.54036 1.62793ZM11.9262 7.0821L7.90995 11.0983C7.81078 11.1975 7.6762 11.2542 7.53453 11.2542C7.39286 11.2542 7.25828 11.1975 7.15911 11.0983L5.15453 9.09376C4.94911 8.88835 4.94911 8.54835 5.15453 8.34293C5.35995 8.13751 5.69995 8.13751 5.90536 8.34293L7.53453 9.9721L11.1754 6.33126C11.3808 6.12585 11.7208 6.12585 11.9262 6.33126C12.1316 6.53668 12.1316 6.8696 11.9262 7.0821Z" fill="#149D8C"/>
                                                    </svg>
                                                </span>
                                                <p class="truncate font-[700] text-[16px] text-[#647887]">{{ $tagProperty->name ?? '' }}</p>
                                            </div>
                                            <p class="pl-1 truncate w-[80%] font-[400] text-[14px] text-[#90A1AD]">&#8369;{{ number_format($tagProperty->price, 2) }}</p>
                                            <p class="pl-1 truncate w-[80%] font-[700] text-[10px] text-[#90A1AD]">Property Code:&nbsp;{{ $tagProperty->property_code ?? 'N/A' }}</p>
                                        </div>
                                        <span @click="$wire.getTagProperty(null)" class="absolute -translate-y-1/2 cursor-pointer top-1/2 right-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" viewBox="0 0 35 34" fill="none">
                                                <mask id="mask0_32827_121918" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="35" height="34">
                                                <rect x="0.25" width="34" height="34" fill="#D9D9D9"/>
                                                </mask>
                                                <g mask="url(#mask0_32827_121918)">
                                                <path d="M9.31536 26.9163L7.33203 24.933L15.2654 16.9997L7.33203 9.06634L9.31536 7.08301L17.2487 15.0163L25.182 7.08301L27.1654 9.06634L19.232 16.9997L27.1654 24.933L25.182 26.9163L17.2487 18.983L9.31536 26.9163Z" fill="#1C1B1F"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            @else
                                <div @click="toggleTagProperty = true" class="rounded-full bg-[#E4EBEE] flex justify-center items-center cursor-pointer relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                                        <mask id="mask0_35266_5984" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="38" height="38">
                                        <rect x="0.0703125" width="37.5" height="37.5" fill="#D9D9D9"/>
                                        </mask>
                                        <g mask="url(#mask0_35266_5984)">
                                        <path d="M17.2578 20.3125H7.88281V17.1875H17.2578V7.8125H20.3828V17.1875H29.7578V20.3125H20.3828V29.6875H17.2578V20.3125Z" fill="#90A1AD"/>
                                        </g>
                                    </svg>
                                </div>
                            @endif
                            @error('property') <span class="text-red-500 font-bold text-[10px]">{{ '*' . $message }}</span> @enderror
                        </div>
    
                        <!-- Others Details -->
                        <div class="flex flex-col gap-5">
                            <p class="text-[20px] font-[700] text-[#647887]">Other Details</p>
    
                            <!-- Starting Date -->
                            <div class="flex items-center justify-between">
                                <label for="startingdate" class="text-[#647887] text-[12px] sm:text-[16px] font-[400]">Starting Date</label>
                                <div class="flex flex-col w-1/2">
                                    <div class="relative">
                                        <input id="startingdate" wire:model.live="start_date" type="date" class="text-[12px] sm:text-[16px] rounded-md border-[#647887] h-9 w-full sm:h-10 sm:w-72 font-[400] text-[#647887]" x-on:focus="(e) => e.currentTarget.showPicker();"/>
                                        <svg class="absolute -translate-y-1/2 pointer-events-none right-2 top-1/2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M8 2V5" stroke="#647887" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16 2V5" stroke="#647887" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3.5 9.08984H20.5" stroke="#647887" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="#647887" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M15.6947 13.7002H15.7037" stroke="#647887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M15.6947 16.7002H15.7037" stroke="#647887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M11.9955 13.7002H12.0045" stroke="#647887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M11.9955 16.7002H12.0045" stroke="#647887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.29431 13.7002H8.30329" stroke="#647887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.29431 16.7002H8.30329" stroke="#647887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    @error('start_date') <span class="text-red-500 font-bold text-[10px]">{{ '*' . $message }}</span> @enderror
                                </div>
                            </div>
    
                            <!-- Expected Closing -->
                            <div class="flex items-center justify-between">
                                <label for="closingdate" class="text-[#647887] text-[12px] sm:text-[16px] font-[400]">Expected Closing</label>
                                <div class="flex flex-col w-1/2">
                                    <div class="relative">
                                        <input id="closingdate" wire:model.live="closing_date" type="date" class="text-[12px] sm:text-[16px] rounded-md border-[#647887] h-9 w-full sm:h-10 sm:w-72 font-[400] text-[#647887]" x-on:focus="(e) => e.currentTarget.showPicker();"/>
                                        <svg class="absolute -translate-y-1/2 pointer-events-none right-2 top-1/2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M8 2V5" stroke="#647887" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16 2V5" stroke="#647887" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3.5 9.08984H20.5" stroke="#647887" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="#647887" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M15.6947 13.7002H15.7037" stroke="#647887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M15.6947 16.7002H15.7037" stroke="#647887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M11.9955 13.7002H12.0045" stroke="#647887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M11.9955 16.7002H12.0045" stroke="#647887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.29431 13.7002H8.30329" stroke="#647887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.29431 16.7002H8.30329" stroke="#647887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    @error('closing_date') <span class="text-red-500 font-bold text-[10px]">{{ '*' . $message }}</span> @enderror
                                </div>
                            </div>
    
                            <!-- Opportunity Notes -->
                            <div class="flex justify-between ">
                                <label for="opportunitynotes" class="text-[#647887] text-[12px] sm:text-[16px] font-[400]">Notes</label>
                                <div class="flex flex-col w-1/2">
                                    <textarea id="opportunitynotes" wire:model.live="opportunity_notes" class="text-[12px] sm:text-[16px] rounded-md border-[#647887] h-32 w-full sm:h-32 sm:w-72 font-[400] text-[#647887] resize-none"></textarea>
                                </div>
                            </div>
    
                        </div>
                    </div>
    
                    <!-- Add Opportunity Buttons -->
                    <div>
                        <div class="relative flex justify-center gap-2 py-6 border-t-2 px-9">
                            <button @click="opportunityModal = false" class="flex justify-center text-[12px] w-full font-[700] border border-[#E31C79] text-[#E31C79] p-2 rounded-lg">CANCEL</button>
                            <button @click="setOpportunity()" class="flex justify-center text-[12px] w-full font-[700] border bg-[#E31C79] text-white p-2 rounded-lg">SUBMIT</button>
    
                             <!-- Modal for Tag Property -->
                             <div x-cloak x-show="toggleTagProperty" class="absolute w-screen landscape:lg:w-[400px] h-[95vh] landscape:lg:h-[calc(100vh-300px)] py-8 px-5  bg-white flex flex-col gap-6 shadow-[0px_2px_4px_0px_rgba(0,0,0,0.10),0px_4px_8px_0px_rgba(0,0,0,0.25)] rounded-lg  xl:left-[90%] bottom-[1%] xl:bottom-full" @click.outside = "$wire.resetPage();toggleTagProperty = false">
    
                                    <div class="flex justify-between">
                                        <p class="text-[20px] font-[700] text-[#42505A]">Tag Property</p>
                                        <span @click="toggleTagProperty = false" class="cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                            <mask id="mask0_32827_120231" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="35" height="35">
                                            <rect x="0.75" y="0.894531" width="34" height="34" fill="#D9D9D9"/>
                                            </mask>
                                            <g mask="url(#mask0_32827_120231)">
                                            <path d="M9.81634 27.8109L7.83301 25.8275L15.7663 17.8942L7.83301 9.96087L9.81634 7.97754L17.7497 15.9109L25.683 7.97754L27.6663 9.96087L19.733 17.8942L27.6663 25.8275L25.683 27.8109L17.7497 19.8775L9.81634 27.8109Z" fill="#1C1B1F"/>
                                            </g>
                                        </svg>
                                        </span>
                                    </div>
    
                                    <div class="flex text-[16px] rounded-md border-[#647887] h-12  w-full font-[400] text-[#647887] border items-center gap-1 px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                            <path d="M8.10502 14.5938C11.5803 14.5938 14.3975 11.7766 14.3975 8.30131C14.3975 4.82605 11.5803 2.00879 8.10502 2.00879C4.62976 2.00879 1.8125 4.82605 1.8125 8.30131C1.8125 11.7766 4.62976 14.5938 8.10502 14.5938Z" stroke="#647887" stroke-width="0.993556" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M15.0591 15.2554L13.7344 13.9307" stroke="#647887" stroke-width="0.993556" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <input id="searchproperty" @input="searchTagProperty()" placeholder="Search via name or property code" class="w-full h-8 px-0 text-lg text-black border-0 ring-0 focus:ring-0"/>
                                    </div>
    
                                <div class="flex flex-col justify-between h-full overflow-y-auto">
                                    <div class="flex flex-col">
                                        {{-- @foreach ($userProperties as  $userProperty)
                                            <span class="flex flex-col mb-2 text-[#42505A] cursor-pointer hover:bg-[#E4EBEE] rounded-lg p-2" @click="$wire.getTagProperty({{$userProperty->id}}); toggleTagProperty = false">
                                                <p class="truncate">{{ $userProperty->name ?? ''}}</p>
                                                <p class="text-xs">Property Code:&nbsp;{{ $userProperty->property_code ?? 'N/A'}}</p>
                                            </span>
                                        @endforeach --}}
                                    </div>
                                        @if($userProperties instanceof \Illuminate\Pagination\LengthAwarePaginator )
                                        <div class="flex justify-center mt-4">
                                        {{$userProperties->links('pagination.crm-pagination')}}
                                        </div>
                                        @endif
    
                                </div>
                            </div>
    
                            <!-- Modal for Tag Contacts -->
                            <div x-cloak x-show="toggleTagContact" class="absolute w-screen landscape:lg:w-[400px] h-[95vh] landscape:lg:h-[calc(100vh-300px)] py-8 px-5 bg-white flex flex-col gap-6 shadow-[0px_2px_4px_0px_rgba(0,0,0,0.10),0px_4px_8px_0px_rgba(0,0,0,0.25)] rounded-lg  xl:left-[90%] bottom-[1%] xl:bottom-full" @click.outside = "toggleTagContact = false">
                                <div class="flex justify-between">
                                    <p class="text-[20px] font-[700] text-[#42505A]">Tag Contact</p>
                                    <span @click="toggleTagContact = false" class="cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                            <path d="M14.2003 12.0008L19.5821 6.61748C19.7275 6.47704 19.8435 6.30905 19.9233 6.12331C20.0031 5.93757 20.0451 5.7378 20.0468 5.53565C20.0486 5.3335 20.0101 5.13303 19.9335 4.94593C19.857 4.75883 19.7439 4.58885 19.601 4.44591C19.458 4.30296 19.288 4.18992 19.1009 4.11337C18.9138 4.03682 18.7134 3.9983 18.5112 4.00006C18.3091 4.00181 18.1093 4.04381 17.9236 4.1236C17.7378 4.20339 17.5698 4.31937 17.4294 4.46478L12.0461 9.84654L6.66436 4.46478C6.52392 4.31937 6.35593 4.20339 6.17018 4.1236C5.98444 4.04381 5.78467 4.00181 5.58253 4.00006C5.38038 3.9983 5.17991 4.03682 4.99281 4.11337C4.80571 4.18992 4.63573 4.30296 4.49278 4.44591C4.34984 4.58885 4.23679 4.75883 4.16024 4.94593C4.0837 5.13303 4.04518 5.3335 4.04693 5.53565C4.04869 5.7378 4.09069 5.93757 4.17048 6.12331C4.25026 6.30905 4.36625 6.47704 4.51165 6.61748L9.89341 11.9992L4.51165 17.3825C4.36625 17.523 4.25026 17.691 4.17048 17.8767C4.09069 18.0624 4.04869 18.2622 4.04693 18.4644C4.04518 18.6665 4.0837 18.867 4.16024 19.0541C4.23679 19.2412 4.34984 19.4111 4.49278 19.5541C4.63573 19.697 4.80571 19.8101 4.99281 19.8866C5.17991 19.9632 5.38038 20.0017 5.58253 19.9999C5.78467 19.9982 5.98444 19.9562 6.17018 19.8764C6.35593 19.7966 6.52392 19.6806 6.66436 19.5352L12.0461 14.1535L17.4294 19.5352C17.5698 19.6806 17.7378 19.7966 17.9236 19.8764C18.1093 19.9562 18.3091 19.9982 18.5112 19.9999C18.7134 20.0017 18.9138 19.9632 19.1009 19.8866C19.288 19.8101 19.458 19.697 19.601 19.5541C19.7439 19.4111 19.857 19.2412 19.9335 19.0541C20.0101 18.867 20.0486 18.6665 20.0468 18.4644C20.0451 18.2622 20.0031 18.0624 19.9233 17.8767C19.8435 17.691 19.7275 17.523 19.5821 17.3825L14.2003 11.9992V12.0008Z" fill="#1C1B1F"/>
                                        </svg>
    
                                    </span>
                                </div>
    
                                <div class="flex text-[16px] rounded-md border-[#647887] h-12  w-full font-[400] text-[#647887] border items-center gap-1 px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                        <path d="M8.10502 14.5938C11.5803 14.5938 14.3975 11.7766 14.3975 8.30131C14.3975 4.82605 11.5803 2.00879 8.10502 2.00879C4.62976 2.00879 1.8125 4.82605 1.8125 8.30131C1.8125 11.7766 4.62976 14.5938 8.10502 14.5938Z" stroke="#647887" stroke-width="0.993556" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.0591 15.2554L13.7344 13.9307" stroke="#647887" stroke-width="0.993556" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <input id="searchcontact" @input="searchTagContact()" placeholder="Search for a contact" class="w-full h-8 px-0 text-lg text-black border-0 ring-0 focus:ring-0"/>
                                </div>
    
                                <div class="flex flex-col justify-between h-full overflow-y-auto">
                                    <div class="flex flex-col">
                                        @if($selectedContacts)
                                            <div class="flex flex-col gap-2">
                                                <p class="font-[700] text-[16px] text-[#42505A]"> Tagged Contacts </p>
                                                @foreach ($selectedContacts as $selectedContact)
                                                    <div class="flex">
                                                        <div class="rounded-full bg-[#E4EBEE] flex justify-center items-center w-11 h-11 relative cursor-pointer overflow-hidden">
                                                            @if($selectedContact['profile_photo_path'])
                                                                <img class="object-cover w-full h-full" src="{{ url('/my-dp/' .$selectedContact['profile_photo_path']) }}">
                                                            @else
                                                                <span class="text-[#647887] text-[24px] ">{{strtoupper($selectedContact['first_name'][0]) }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="flex flex-col group-hover:bg-[#E4EBEE] rounded-lg p-2 text-[#42505A]">
                                                            <p class="truncate font-[700] text-[17px] max-w-[250px]">{{ $selectedContact['first_name']}} {{ $selectedContact['last_name']}}</p>
                                                            <p class="text-[14px] max-w-[250px] truncate">{{ $selectedContact['email']}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
    
                                        <p class="font-[700] text-[16px] text-[#42505A]"> Contacts </p>
                                        {{-- @foreach ($contacts as  $contact)
                                            <div class="flex mb-2 text-[#42505A] cursor-pointer rounded-lg px-2 hover:bg-[#E4EBEE] items-center gap-2" @click="$wire.getTagContacts({{$contact->id}}); toggleTagProperty = false">
                                                <div class="rounded-full bg-[#E4EBEE] overflow-hidden flex justify-center border-[2px] border-white items-center w-11 h-11 relative cursor-pointer">
                                                    @if($registerContacts->isNotEmpty())
                                                        @foreach ($registerContacts as $registerContact)
                                                            @if ($registerContact->email == $contact->email && $registerContact->id != null)
                                                                    <img class="object-cover w-full h-full" src="{{ url('/my-dp/' .$registerContact->id) }}"/>
                                                                @php
                                                                break; // Exit loop since we found a match
                                                                @endphp
                                                            @else
                                                                <span class="text-[#647887] text-[24px] ">{{strtoupper($contact->first_name[0]) }}</span>
                                                                @php
                                                                break; // Exit loop since we found a match
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <span class="text-[#647887] text-[24px] ">{{strtoupper($contact->first_name[0]) }}</span>
                                                    @endif
                                                </div>
                                                <div class="flex flex-col p-2 rounded-lg">
                                                    <p class="truncate font-[700] text-[17px] max-w-[250px]">{{ $contact->first_name}} {{ $contact->last_name}}</p>
                                                    <p class="text-[14px] max-w-[250px] truncate">{{ $contact->email}}</p>
                                                </div>
                                            </div>
                                        @endforeach --}}
                                    </div>
                                    @if($contacts instanceof \Illuminate\Pagination\LengthAwarePaginator )
                                        <div class="flex justify-center mt-4">
                                            {{$contacts->links('pagination.crm-pagination')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    

    
    @push('scripts')
    <script>
        function data(){
            return {
                toggleTagProperty: false,
                toggleTagOpportunity: false,
                toggleSearchTimezone: false,
                toggleTagContact: false,
                opportunityModal: false,
                showAppointmentClose: true,
                appointmentIsUser: @entangle('appointmentIsUser').live,
                appointmentAuto: @entangle('appointmentAuto').live,
                appointmentEmail: @entangle('appointmentEmail').live,
                appointmentNumber: @entangle('appointmentNumber').live,
                query: @entangle('appointmentProperty').live,
                selectedOpportunityId: @entangle('selectedOpportunityId').live,
                selectedOpportunity: @entangle('selectedOpportunity').live,
                addAppointment:@entangle('addAppointment').live,
                appointment_location: '',
    
                // success
                showSuccessMessage: @entangle('showSuccessMessage').live,
                successMessage: @entangle('successMessage').live,
    
                // TIMEZONE
                selectedTimezone: "{{old('timezone')}}",
                appointmentTimezone: @entangle('appointmentTimezone').live,
                searchTimezone: null,
                timezones: [],
                continentCapitalMap: new Map(),
                isTimezoneVisible: false,
    
                //Opportunity Variables
                qualification: 2,
                label: 1,
                setOpportunity(){
                    @this.newSet('qualification', this.qualification);
                    @this.newSet('label', this.label);
                    @this.save();
                },
                searchTagProperty(){
                    @this.newSet('searchParam', document.getElementById('searchproperty').value)
                },
                searchTagContact(){
                    @this.newSet('contactSearchParam', document.getElementById('searchcontact').value)
                },
                searchTagOpportunity(){
                    @this.newSet('leadSearchParam', document.getElementById('searchopportunity').value)
                },
                init(){
                    this.$wire.on('saveSuccess',(val) => {
                        this.opportunityModal = val[0];
                        window.location.reload();
                    } )
                    this.$wire.on('setCloseButton',(val) => {
                        this.showAppointmentClose = val[0]
                    } )
                    this.$wire.on('setLabel',(val) => {
                        this.label = val[0]
                    } )
                    this.$wire.on('getOpportunities',() => {
                            window.location.reload();
                    } )
    
    
                }
            }
        }
    </script>
    
    @endpush
    </div>
    