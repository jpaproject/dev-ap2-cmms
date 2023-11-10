@extends('layouts.app')

@section('breadcumb')
<li class="breadcrumb-item active">Work Orders</li>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('plugins/datepicker/bootstrap-datepicker3.min.css') }}">

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                            </div>
                            <div class="col-3 d-flex justify-content-end">
                                <a href="{{ route('work-orders.create.iot') }}" class="btn btn-md btn-success w-100">
                                    <i class="fa fa-list"></i>
                                    Create IOT Work Order
                                </a>
                            </div>
                        </div>

                        @include('components.flash-message')

                    </div>

                    <div class="card-body">
                        <table id="workOrderTable" class="table table-hover table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Maintenance</th>
                                    <th>Priority</th>
                                    <th>Datetime</th>
                                    <th>Id</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($work_orders as $work_order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $work_order->name }}</td>
                                    <td>{{ $work_order->scheduleMaintenance->name ?? 'N/A'}}</td>
                                    <td>{{ $work_order->priority }}</td>
                                    <td>{{ $work_order->date_generate }}</td>
                                    <td>{{ $work_order->id }}</td>
                                    <td>
                                        <a href="{{route('work-orders.show.iot',$work_order->id)}}">
                                            <button class="btn btn-info"><i class="fa fa-eye"></i> VIEW</button>
                                        </a>
                                        <button class="btn btn-success">GENERATE TOKEN</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
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

    // $('tbody').on('click', 'tr', function () {
    //     var data = workOrderTable.row( this ).data();
    //     window.location.href = '/work-orders/' + data[5]
    // });

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
@endsection
