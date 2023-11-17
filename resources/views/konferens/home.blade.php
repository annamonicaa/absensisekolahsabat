@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/konferens/home">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="ttl">Selamat Datang Konferens</h1>
            <div class="card shadow no-border">
                <div class="">
                    <div class="custom card-header">{{ __('Persentase Kehadiran') }}</div>
                </div>

                <div class="card-body">
                    <canvas id="chart2"></canvas>
                </div>
            </div>
            <div class="card shadow no-border">
            <div class="card-body">
            <div class="table-responsive-md">
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th>Tanggal</th> --}}
                        <th>Jemaat</th>
                        <th>Yang ingin didoakan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prayer as $p)
                        <tr class="">
                            <td>{{ $p->church->name }}</td>
                            <td>{{ $p->req }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">Tidak Ada Data</td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@push('javascript')
    <script>

        var data = <?= json_encode($results, JSON_NUMERIC_CHECK) ?>;
        console.log(data);
        var labels = data.map(function(e) {
            return e['name'].trim();
        });
        var values = data.map(function(e) {
            return e['percent'];
        });
        console.log("Script is running");

        var backgroundColors =  [
            'rgba(255, 99, 132, 1)', 
            'rgba(54, 162, 235, 1)',
        ];
        var ctx = document.getElementById('chart2').getContext('2d');
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
                maintainAspectRatio: false,
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
                                ctx.fillText(data.toFixed(2) + '%', bar._model.x + 12, bar._model.y + 7);
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
                    text: 'Perbandingan Persentase Kehadiran di Setiap Jemaat',
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
                            max: 100
                        }
                    }]
                }
            }
        })

    </script>
    @endpush
@endsection
