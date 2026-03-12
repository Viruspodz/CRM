<div class="w-full h-full " x-data="app()">

    <div x-cloack>
        {{-- @livewire('crm.floating-button') --}}
    </div>

    {{-- FUNNEL --}}
    <div x-cloak x-show="tab == 'funnel'">
        @livewire('crm.crm-funnel')
    </div>
    {{-- PIPELINE --}}
    <div x-cloak x-show="tab == 'pipeline'">
        @livewire('crm.crm-pipeline')
    </div>
    {{-- CALENDAR --}}
    <div x-cloak x-show="tab == 'calendar'">
        @livewire('crm.crm-calendar')
    </div>

    {{-- FORECAST --}}
    <div x-cloak x-show="tab == 'forecast'">
        @livewire('crm.crm-forecast')
    </div>

</div>

@push('scripts')
<script>
    function app() {
        return {
            tab: 'pipeline', // Default value
            mobileTab: false,
            toggle: false,
        };
    }
</script>
@endpush