<div>
<div class="min-h-screen p-6 bg-gray-100">
    <div class="grid grid-cols-2 gap-4">
    <div class="p-4 bg-[#d60a64] text-white rounded-lg text-center">
    <h3 class="text-2xl font-bold">{{ $totalDeals }}</h3>
            <p>Total Deals</p>
        </div>
    
    
        <div class="p-4 bg-[#d60a64] text-white rounded-lg text-center">
        <h3 class="text-2xl font-bold">₱{{ number_format($totalPotentialIncome, 2) }}</h3>
        <p>Total Potential Income</p>
        </div>

    </div>

    <div class="grid grid-cols-4 gap-4 mt-4">
        <div class="p-3 text-center bg-white rounded-lg shadow-md text-primary-700">
            <span class="font-semibold">RealHomes Deals</span>
            <p class="text-lg font-bold">{{ $dealsByType['realhomes']  }}</p>
        </div>
        
        <div class="p-3 text-center bg-white rounded-lg shadow-md text-primary-700">
            <span class="font-semibold">Repay Deals</span>
            <p class="text-lg font-bold">{{ $dealsByType['repay'] ?? 0 }}</p>
        </div>
        

        <div class="p-4 text-center bg-white border-l-4 border-green-500 rounded-lg shadow-md text-gray-text-primary-600">
        <h3 class="text-xl font-bold text-green-600">₱{{ number_format($closedWonTotalIncome, 2) }}</h3>
        <p class="text-gray-600">✔️ Closed Won</p>
        <p class="text-sm text-gray-500">Deals: <strong>{{ $closedWonCount }}</strong></p>
    </div>

    <div class="p-4 text-center bg-white border-l-4 border-red-500 rounded-lg shadow-md text-gray-text-primary-600">
        <h3 class="text-xl font-bold text-red-600">₱{{ number_format($closedLostTotalIncome, 2) }}</h3>
        <p class="text-gray-600">❌ Closed Lost</p>
        <p class="text-sm text-gray-500">Deals: <strong>{{ $closedLostCount }}</strong></p>
    </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mt-6">
        <div class="p-4 bg-white rounded-lg shadow-md">
            <h3 class="mb-4 text-lg font-bold text-gray-text-primary-600">Deals by Stage</h3>
            <div id="dealsByStageChart" style="height: 300px;"></div>
        </div>

        <div class="p-4 bg-white rounded-lg shadow-md">
            <h3 class="mb-4 text-lg font-bold text-gray-text-primary-600">Won vs Lost Deals</h3>
            <div id="wonLostChart" style="height: 300px;"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 mt-6">
        <div class="p-4 bg-white rounded-lg shadow-md">
            <h3 class="mb-4 text-lg font-bold text-gray-text-primary-600">Deals Per Month</h3>
            <div id="dealsPerMonthChart" style="height: 300px;"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 mt-6">
        <div class="p-4 bg-white rounded-lg shadow-md">
            <h3 class="mb-4 text-lg font-bold text-gray-text-primary-600">Deals by Product Type</h3>
            <div id="dealsByProductChart" style="height: 300px;"></div>
        </div>
    </div>
</div>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
   
            var dealsByStageData = google.visualization.arrayToDataTable([
                ['Stage', 'Count'],
                @foreach ($dealsByStage as $stage => $count)
                    ['{{ $stage }}', {{ $count }}],
                @endforeach
            ]);

            var dealsByStageOptions = { 
                title: 'Deals by Stage', 
                colors: ['#d60a64'], 
                bars: 'vertical', 
                bar: { groupWidth: '60%' } 
            };
            var dealsByStageChart = new google.visualization.BarChart(document.getElementById('dealsByStageChart'));
            dealsByStageChart.draw(dealsByStageData, dealsByStageOptions);


            var wonLostData = google.visualization.arrayToDataTable({!! json_encode($wonVsLost) !!});
            var wonLostOptions = { 
                title: 'Won vs. Lost Deals', 
                colors: ['#4CAF50', '#F44336'], 
                areaOpacity: 0.2 
            };
            var wonLostChart = new google.visualization.AreaChart(document.getElementById('wonLostChart'));
            wonLostChart.draw(wonLostData, wonLostOptions);

            
            var dealsPerMonthData = google.visualization.arrayToDataTable([
                ['Month', 'Deals'],
                @foreach ($dealsPerMonth as $month => $count)
                    ['{{ DateTime::createFromFormat("!m", $month)->format("F") }}', {{ $count }}],
                @endforeach
            ]);

            var dealsPerMonthOptions = { 
                title: 'Deals Per Month', 
                colors: ['#d60a64'], 
                curveType: 'function', 
                legend: { position: 'bottom' } 
            };
            var dealsPerMonthChart = new google.visualization.LineChart(document.getElementById('dealsPerMonthChart'));
            dealsPerMonthChart.draw(dealsPerMonthData, dealsPerMonthOptions);

       
            var dealsByProductData = google.visualization.arrayToDataTable([
                ['Product Type', 'Count'],
                @foreach ($dealsByProductType as $product => $count)
                    ['{{ $product }}', {{ $count }}],
                @endforeach
            ]);

            var dealsByProductOptions = { 
                title: 'Deals by Product Type', 
                colors: ['#FFA500', '#FF6347', '#4682B4'], 
                pieHole: 0.4 
            };
            var dealsByProductChart = new google.visualization.PieChart(document.getElementById('dealsByProductChart'));
            dealsByProductChart.draw(dealsByProductData, dealsByProductOptions);
        }
    </script>
</div>
