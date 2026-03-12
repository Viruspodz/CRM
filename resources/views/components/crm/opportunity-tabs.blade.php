@foreach ($deals as $deal)
    <div class="relative p-2 bg-white rounded-lg shadow-[0px_2px_4px_0px_rgba(0,0,0,0.10),0px_0px_2px_0px_rgba(0,0,0,0.25)] cursor-pointer"
        data-id="{{ $deal->id }}" wire:click="selectOpportunity({{ $deal->id }})" draggable="true">
        <!-- Tags -->
        <div class="flex gap-[2px] text-white text-[7px] font-semibold mb-1">
            <!-- Lead Level -->
            @switch($deal->priority)
                @case(1)
                    <div class="relative grid place-items-center w-[28px] py-[2px] rounded-full bg-[#E31C79]">High</div>
                    @break
                @case(2)
                    <div class="relative grid place-items-center w-[28px] py-[2px] rounded-full bg-[#071D49]">Low</div>
                    @break
            @endswitch
        </div>

        <!-- Details -->
        <div>
            <div class="flex gap-[2px]">
                @if ($deal->is_registered)
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="..." fill="#149D8C" />
                    </svg>
                @endif
                <p class="text-sm text-[#071D49] font-bold truncate">
                    {{ $deal->contact_name }}
                </p>
            </div>
            <p class="text-[9px] font-bold text-[#42505A]">
                <span>{{ $deal->property_owner_tag ?? 'N/A' }}</span>
            </p>
            <p class="text-[9px] text-[#647887]">
                <span>{{ \Carbon\Carbon::parse($deal->created_at)->format('m/d/Y - h:i A') }}</span>
            </p>
        </div>

        <!-- Unread Border Left -->
        @if ($deal->priority == 1)
            <div class="absolute top-0 left-0 w-4 h-full border-l-4 border-red-700 rounded-full"></div>
        @endif
    </div>
@endforeach
