<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <tallstackui:script />
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>


</head>

<body>
    <div x-data="{ isSidebarOpen: false }" class="relative flex min-h-screen bg-[#FAFAFA]">
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 z-30 flex-shrink-0 w-64 bg-white shadow-lg lg:relative lg:translate-x-0 lg:w-[300px] transition-transform transform"
            :class="{ '-translate-x-full': !isSidebarOpen, 'translate-x-0': isSidebarOpen }">
            <livewire:components.sidebar />
        </aside>

        <!-- Overlay for Mobile -->
        <div x-show="isSidebarOpen" @click="isSidebarOpen = false"
            class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden" x-transition></div>

        <!-- Main Content -->
        <div class="w-full p-3 mb-4 overflow-auto ">
            <!-- Header -->
            <header class="flex items-center justify-between px-4 py-3 ">
                <!-- Hamburger Button -->
                <button @click="isSidebarOpen = !isSidebarOpen" class="text-gray-600 lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                </button>

                <!-- Logout Button -->
                {{-- <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full px-4 py-2 font-semibold text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Log out
                        </button>
                    </form>
                </div> --}}
            </header>

            <!-- Main Content -->
            <main class="flex-1 p-10 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
    @stack('scripts')
</body>

</html>