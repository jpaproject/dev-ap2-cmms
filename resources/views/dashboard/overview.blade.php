@extends('layouts.app')

@section('breadcumb')
<li class="breadcrumb-item active">Overview</li>
@endsection

@section('style')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card-body row" hidden>
                <div class="form-group col-md-2">
                    <select name="daterange" class="form-control" id="daterange">
                        <option value="day">Day</option>
                        <option value="month">Month</option>
                        <option value="year">Year</option>
                    </select>
                </div>
                <div class="form-group col-md-3" id="datepicker-area">
                    <input type="text" name="date" id="date" value="{{$date}}"
                        autocomplete="off" class="datepicker form-control time"
                        required>

                    <input type="text" name="month" id="month" value="{{$month}}"
                        autocomplete="off" class="datepicker-month form-control d-none time" required>

                    <input type="text" name="year" id="year" value="{{$year}}"
                        autocomplete="off" class="datepicker-year form-control  d-none time"
                        required>
                </div>
                <div class="form-group col-md-2">
                    <button type="button" onclick="submitDate()"
                        class="btn btn-success">
                        <div><i class="fa fa-paper-plane"></i></div>
                    </button>
                    <a href="" class="btn btn-danger">
                        <div><i class="fa fa-sync"></i></div>
                    </a>

                </div>

            </div>
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $asset_count }}</h3>

                        <p>Assets</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-archive"></i>
                    </div>

                    <a href="{{ route('assets.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $schedule_maintenance_count }}</h3>

                        <p>Maintenances</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-tools"></i>
                    </div>

                    <a href="{{ route('schedule-maintenances.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $bom_count }}</h3>

                        <p>Bom</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-th"></i>
                    </div>

                    <a href="{{ route('boms.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card card-warning col-6">
                <div class="card-header text-white">
                    <h3 class="card-title">Work Order Statistics</h3>
                </div>

                <div class="card-body">
                    <div class="chart">
                        <canvas id="workOrderChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>

            <div class="card card-warning col-6">
                <div class="card-header text-white">
                    <h3 class="card-title">Form Statistics</h3>
                </div>
                <div class="chart">
                    <canvas id="formChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('script')
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<script>
        let totalForm = {!! $totalForm !!}
        let completeForm = {!! $completeForm !!}
    let chartConfig = {
        labels  : '',
        datasets: [
            {
                label               : 'Work Order',
                backgroundColor     : 'rgba(0,0,0,0)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius         : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : @json($work_order_count['value'])
            }
        ]
    }

    let workOrderChart = $('#workOrderChart').get(0).getContext('2d')
    let formChart = $('#formChart').get(0).getContext('2d')
    let chartData = $.extend(true, {}, chartConfig)

    let chartOptions = {
        responsive           : true,
        maintainAspectRatio  : false,
        datasetFill          : false,
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Day'
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    beginAtZero: true,
                    steps: 2,
                    stepValue: 2,
                    precision: 0
                }
            }]
        },
    }

    const lineChart = new Chart(workOrderChart, {
      type: 'line',
      data: chartData,
      options: chartOptions
    })


    const dataForm = {
        labels : ['Jumlah Form', 'Form Yang Telah Dikerjakan'],
        datasets: [{
            data: [totalForm, completeForm],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            ],
            borderWidth: 1
        }]
    };

    const barChart = new Chart(formChart, {
      type: 'bar',
      data: dataForm,
    //   options: chartOptions
    })
</script>
@endsection
