@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow no-border">
                <div class="">
                    <div class="custom card-header">{{ __('Laporan') }}</div>
                </div>

                <div class="card-body">
                    <div>
                    <canvas id="chart" width="1000" height="400"></canvas>
                    <h5 class="text-right mt-4">Total: <b>{{ $totalHadir }}</b></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('javascript')
    <script>
        var data = <?= json_encode($result) ?>;
        var labels = data.map(function(e) {
            return e['name'].trim();
        });
        var values = data.map(function(e) {
            return e['jumlah'];
        });
        console.log(Chart);
        console.log("Script is running");

        var backgroundColors =  [
            'rgba(255, 99, 132, 1)', 
            'rgba(54, 162, 235, 1)',
        ];
        var ctx = document.getElementById('chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: backgroundColors,
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                "hover": {
                    "animationDuration": 0
                },
                "animation": {
                    "duration": 1,
                    "onComplete": function() {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;

                        ctx.font = Chart.helpers.fontString(12, Chart.defaults.global.defaultFontStyle, 'Poppins');
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function(dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function(bar, index) {
                                var data = dataset.data[index];
                                ctx.fillText(data, bar._model.x + 12, bar._model.y + 7);
                            });
                        });
                    }
                },
                legend: {
                    display: false,
                    position: 'bottom',
                    labels: {
                        fontColor: 'black',
                        fontSize: 14,
                        fontFamily: "'Poppins'",
                        boxWidth: 0
                    }
                },
                title: {
                    display: true,
                    text: 'Perbandingan Jumlah ',
                    fontFamily: "'Poppins'",
                    fontSize: 14,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        gridLines: {
                            display: false
                        },
                        // barThickness: 20,
                        // barPercentage: 0.5,
                        // categoryPercentage: 1,
                    }],
                    xAxes: [{
                        gridLines: {
                            display: true
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 10,
                            min: 0,
                            max: 50
                        }
                    }]
                }
            }
        })

    </script>
    @endpush

@endsection
