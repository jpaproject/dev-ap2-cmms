@extends('user-technicals.layouts.app')

@section('breadcumb')
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('style')
<style>

</style>
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
                        <h3>{{ $total_work_orders }}</h3>

                        <p>Today Work Order</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <a href="{{ route('user-technical.work-order') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card card-warning">
            <div class="card-header text-white">
                <h3 class="card-title">Form Statistics</h3>
            </div>
            <div class="chart">
                <canvas id="formChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script>
     $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        startView: 2,
        minViewMode: 0,
        language: "id",
        daysOfWeekHighlighted: "0",
        autoclose: true,
        todayHighlight: true,
        toggleActive: true,
        container: '#datepicker-area'
    });

    $('.datepicker-month').datepicker({
        format: "yyyy-mm",
        startView: 2,
        minViewMode: 1,
        language: "id",
        daysOfWeekHighlighted: "0",
        autoclose: true,
        todayHighlight: true,
        toggleActive: true,
        container: '#datepicker-area'
    });

    $('.datepicker-year').datepicker({
        format: "yyyy",
        startView: 2,
        minViewMode: 2,
        language: "id",
        daysOfWeekHighlighted: "0",
        autoclose: true,
        todayHighlight: true,
        toggleActive: true,
        container: '#datepicker-area'
    });

    $('#daterange').on('change', function () {
        val = $(this).val();
        if (val == 'day') {
            $('.datepicker').removeClass('d-none');
            $('.datepicker-month').addClass('d-none');
            $('.datepicker-year').addClass('d-none');
        } else if (val == 'month') {
            $('.datepicker').addClass('d-none');
            $('.datepicker-month').removeClass('d-none');
            $('.datepicker-year').addClass('d-none');
        } else if (val == 'year') {
            $('.datepicker').addClass('d-none');
            $('.datepicker-month').addClass('d-none');
            $('.datepicker-year').removeClass('d-none');
        }

    })

    const workOrderTable = $('#workOrderTable').DataTable({
        "paging":   true,
        "ordering": true,
        "info":     true,
        "columnDefs": [
            {
                "targets": [ 5 ],
                "visible": false,
                "searchable": false
            },
        ]
    });

    $('tbody').on('click', 'tr', function () {
        var data = workOrderTable.row( this ).data();
        window.location.href = 'work-orders/' + data[5]
    });

    const submitDate = () => {
        let daterange = $('#daterange').val();
        let date;

        $('#loading').removeClass('d-none');
        $('#result').addClass('d-none');

        if (daterange == 'day') {
            date = $('#date').val()
        } else if (daterange == 'month') {
            date = $('#month').val()
        } else if (daterange == 'year') {
            date = $('#year').val()
        }

        $.ajax({
            type: 'POST',
            url: '/api/work-orders',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                date,
                daterange
            },
            async: false,
            success: function (data) {
                $('#resultData').text(data.data.length + ' data');
                workOrderTable.clear().draw();
                data.data.forEach((value, i) => {
                    workOrderTable.row.add([
                        i+1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);

                    workOrderTable.draw();
                });
            },
            error: function (data) {
                $.alert(data.responseJSON.message);
                console.log(data);
            },
            complete: function(){
                setTimeout(() => {
                    $('#loading').addClass('d-none');
                    $('#result').removeClass('d-none');
                }, 300);
            }
        });
    }
</script>
<script>
        let totalForm = {!! $totalForm !!}
        let completeForm = {!! $completeForm !!}

        let formChart = $('#formChart').get(0).getContext('2d')



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
