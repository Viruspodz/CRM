@props(['id' => null, 'maxWidth' => '2xl'])

@php
    $maxWidthClass = match($maxWidth) {
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        default => 'sm:max-w-2xl',
    };
@endphp

<div 
    x-data="{ show: @entangle($attributes->wire('model')) }" 
    x-show="show"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6 sm:px-0 bg-gray-900/75"
    @keydown.escape.window="show = false"
>
    <div 
        x-show="show" 
        x-transition 
        class="w-full {{ $maxWidthClass }} bg-white rounded-lg shadow-xl overflow-hidden"
        @click.away="show = false"
    >
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-800">
                {{ $title ?? 'Modal Title' }}
            </h2>
        </div>

        <div class="px-6 py-4">
            {{ $slot }}
        </div>

        <div class="px-6 py-4 bg-gray-100 text-right">
            {{ $footer ?? '' }}
        </div>
    </div>
</div>
