@if ($paginator->hasPages())
<div>
    <div style=" flex: 1; display: flex; justify-content: center; align-items: center;">
        <nav role="navigation" aria-label="Pagination Navigation" class="flex flex-row justify-between gap-2">             
            {{-- Previous Page Link --}}
            <button aria-disabled="{{ $paginator->onFirstPage() }}" {{ $paginator->onFirstPage() ? 'disabled' : null }} wire:click="previousPage('{{ $paginator->getPageName() }}')" class="{{ $paginator->onFirstPage() ? 'bg-neutral-300 cursor-default ' : 'bg-white  hover:opacity-50 ' }}px-4 py-2 border border-neutral-100 transition-opacity rounded-4px">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>
    
            {{-- Pagination Elements --}}
            @if($paginator->lastPage() < 5) {{-- 5 --}}
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <div wire:click="gotoPage({{ $i }}, '{{ $paginator->getPageName() }}')" class="{{$i === $paginator->currentPage() ? 'text-primary-500 border-primary-500' : 'text-dark-gray-400'}} h-full border px-4 py-2  cursor-pointer">{{$i}}</div>
                @endfor
            @else
                @if ($paginator->currentPage() < 3)
                    @for ($i = 1; $i < 4; $i++)
                        <div wire:click="gotoPage({{ $i }}, '{{ $paginator->getPageName() }}')" wire:key="{{$i}}" class="{{$i === $paginator->currentPage() ? 'text-primary-500 border-primary-500' : 'text-dark-gray-400' }} cursor-pointer px-4 py-2 font-bold bg-white border  hover:opacity-50 transition-opacity rounded-4px">
                            {{$i}}
                        </div>
                    @endfor
                    <button class="px-4 py-2 font-bold bg-white border text-dark-gray-400 border-neutral-100 rounded-4px">
                        ...
                    </button>
                    <button wire:click="gotoPage({{ $paginator->lastPage() }}, '{{ $paginator->getPageName() }}')" class="px-4 py-2 font-bold transition-opacity bg-white border cursor-pointer text-dark-gray-400 border-neutral-100 hover:opacity-50 rounded-4px">
                        {{ $paginator->lastPage() }}
                    </button>
                @elseif ($paginator->currentPage() > 3 && $paginator->currentPage() < $paginator->lastPage() - 2)
                    <button wire:click="gotoPage({{ 1 }}, '{{ $paginator->getPageName() }}')" class="px-4 py-2 font-bold transition-opacity bg-white border cursor-pointer text-dark-gray-400 border-neutral-100 hover:opacity-50 rounded-4px ">
                        1
                    </button>
                    <button class="px-4 py-2 font-bold bg-white border text-dark-gray-400 border-neutral-100 rounded-4px">
                        ...
                    </button>
                    @for ($i = $paginator->currentPage() - 1; $i <= $paginator->currentPage() + 1; $i++)
                        <div wire:key="{{$i}}" class="{{$i === $paginator->currentPage() ? 'text-primary-500 border-primary-500 ' : 'text-dark-gray-400 '}} cursor-pointer px-4 py-2 font-bold bg-white border  hover:opacity-50 transition-opacity rounded-4px" wire:click="gotoPage({{ $i }}, '{{ $paginator->getPageName() }}')">
                            {{$i}}
                        </div>
                    @endfor
                    <button class="px-4 py-2 font-bold bg-white border text-dark-gray-400 border-neutral-100 rounded-4px">
                        ...
                    </button>
                    <button wire:click="gotoPage({{ $paginator->lastPage() }}, '{{ $paginator->getPageName() }}')" class="px-4 py-2 font-bold transition-opacity bg-white border cursor-pointer text-dark-gray-400 border-neutral-100 hover:opacity-50 rounded-4px">
                        {{ $paginator->lastPage() }}
                    </button>
                @else
                    <button wire:click="gotoPage({{ 1 }}, '{{ $paginator->getPageName() }}')" class="px-4 py-2 font-bold transition-opacity bg-white border cursor-pointer text-dark-gray-400 border-neutral-100 hover:opacity-50 rounded-4px">
                        1
                    </button>
                    <button class="px-4 py-2 font-bold bg-white border text-dark-gray-400 border-neutral-100 rounded-4px">
                        ...
                    </button>
                    @for ($i = $paginator->lastPage() - 2; $i <= $paginator->lastPage(); $i++)
                        <div wire:key="{{$i}}" class="{{$i === $paginator->currentPage() ? 'text-primary-500 border-primary-500 ' : 'text-dark-gray-400 '}} cursor-pointer px-4 py-2 font-bold bg-white border  hover:opacity-50 transition-opacity rounded-4px" wire:click="gotoPage({{ $i }}, '{{ $paginator->getPageName() }}')">
                            {{$i}}
                        </div>
                    @endfor
                @endif                      
            @endif
            
            {{-- Next Page Link --}}
            <button aria-disabled="{{ !$paginator->hasMorePages() }}" {{ !$paginator->hasMorePages() ? 'disabled' : null }} wire:click="nextPage('{{ $paginator->getPageName() }}')" class="{{ !$paginator->hasMorePages() ? 'bg-neutral-300 cursor-default ' : 'bg-white hover:opacity-50 '}}px-4 py-2  border border-neutral-100 transition-opacity rounded-4px" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" rel="next">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </nav>
     </div>
    
     <div style=" flex: 1; display: flex; justify-content: center; align-items: center;" class="mt-3">
        <div>
            <p class="text-sm leading-5 text-gray-700">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>
     </div>
     <div>
         
         
    </div>
</div>
@endif
