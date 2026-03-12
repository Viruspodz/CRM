<div class="flex flex-col items-start justify-between w-full h-auto gap-2 p-3 transition-shadow bg-white rounded-lg shadow-md hover:shadow-lg card"
    draggable="true" data-id="{{ $id }}" data-priority="{{ $dealPriority }}" data-lead="{{ $industry }}">
    <div class="flex flex-wrap items-center justify-start w-full gap-1">
        <!-- Priority Badge -->
        @if($dealPriority == 'High')
        <div class="px-2 py-1 text-xs font-semibold text-white bg-green-600 rounded-full shrink-0">High</div>
        @elseif($dealPriority == 'Mid')
        <div class="px-2 py-1 text-xs font-semibold text-gray-800 bg-yellow-400 rounded-full shrink-0">Mid</div>
        @elseif($dealPriority == 'Low')
        <div class="px-2 py-1 text-xs font-semibold text-white bg-gray-400 rounded-full shrink-0">Low</div>
        @endif

        <!-- Industry Badge -->
        <div class="px-2 py-1 text-xs font-semibold text-white bg-pink-600 rounded-full shrink-0">
            {{ $industry }}
        </div>

        <!-- Days Left Badge -->
        <div class="px-2 py-1 {{ $daysLeft < 0 ? 'bg-gray-600' : 'bg-blue-400' }} text-white text-xs font-semibold rounded-full shrink-0">
            {{ abs((int) $daysLeft) }} {{ $daysLeft < 0 ? 'Days Ago' : 'Days Left' }}
        </div>
    </div>

    <!-- Deal Information -->
    <div class="w-full overflow-hidden">
        <div class="text-base font-bold text-gray-800 truncate">{{ $dealName }}</div>
        <div class="text-sm text-gray-600"><strong>Contact: </strong>{{ $contactName }}</div>
        <div class="text-xs text-gray-500 truncate">{{ $productType }}</div>
    </div>
</div>
