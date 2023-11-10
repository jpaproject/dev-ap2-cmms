@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item active">Assets</li>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/bootstrap-datepicker3.min.css') }}">
    <style>
        tr {
            cursor: pointer;
        }

        .select2-container--default .select2-selection--single {
            height: 40px;
            /* adjust the height value as needed */
            line-height: 40px;
            /* ensure the text is vertically centered */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }

    </style>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="form-row">
                                <div class="form-group col-12"><span>Choose Asset</span></div>
                                <div class="form-group col-12 col-lg-5">
                                    <select class="form-control select2 @error('asset') is-invalid @enderror"
                                        style="width: 100%; height:50px;" id="asset" name="asset">
                                        <option value="">Choose Or Type Selection</option>
                                        @foreach ($assets as $result)
                                            <option value="{{ $result->id }}" @if($result->id == $asset->id) selected @endif>{{ $result->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-2">
                                    <select name="daterange" class="form-control" id="daterange">
                                        <option value="day">Day</option>
                                        <option value="month">Month</option>
                                        <option value="year">Year</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-2" id="datepicker-area">
                                    <input type="text" name="date" id="date" value="{{ $date }}"
                                        autocomplete="off" class="datepicker form-control time" required>

                                    <input type="text" name="month" id="month" value="{{ $month }}"
                                        autocomplete="off" class="datepicker-month form-control d-none time" required>

                                    <input type="text" name="year" id="year" value="{{ $year }}"
                                        autocomplete="off" class="datepicker-year form-control d-none time" required>
                                </div>
                                <div class="form-group col-sm-6 col-md-2 col-lg-1">
                                    <button type="button" onclick="submitDate()" class="btn btn-success">
                                        <div><i class="fa fa-paper-plane"></i></div>
                                    </button>
                                    <a href="" class="btn btn-danger">
                                        <div><i class="fa fa-sync"></i></div>
                                    </a>

                                </div>


                                <div class="form-group col-sm-6 col-md-2 col-lg-2 mb-0" id="result">
                                    <h3 class="d-inline" id="resultData">{{ $work_orders->count() }} data</h3>
                                </div>
                            </div>
                                <div class="form-group col-md-12 text-center d-none" id="loading">
                                    <i class="fas fa-spinner fa-spin fa-2x mr-1"></i>
                                    <h4 class="d-inline font-weight-bold">Loading</h4>
                                </div>
                        </div>

                        <div class="card-body">
                            <table id="woTable" class="table-hover table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Maintenance</th>
                                        <th>Priority</th>
                                        <th>Datetime</th>
                                        <th>Id</th>
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
        $(document).ready(function() {
            $('.select2').select2({
                tags: false
            });
        });

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

        $('#daterange').on('change', function() {
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

        const woTable = $('#woTable').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "columnDefs": [{
                "targets": [5],
                "visible": false,
                "searchable": false
            }, ]
        });

        $('tbody').on('click', 'tr', function() {
            var data = woTable.row(this).data();
            window.location.href = '/work-orders/' + data[5]
        });

        const submitDate = () => {
            let daterange = $('#daterange').val();
            let date;
            let asset = $('#asset').val();

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
                url: '/api/asset-history',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    date,
                    daterange,
                    asset
                },
                async: false,
                success: function(data) {
                    $('#resultData').text(data.data.length + ' data');
                    woTable.clear().draw();
                    data.data.forEach((value, i) => {
                        woTable.row.add([
                            i + 1,
                            value.name,
                            (value.schedule_maintenance) ? value.schedule_maintenance.name :
                            'N/A',
                            value.priority,
                            value.date_generate,
                            value.id,
                        ]);

                        woTable.draw();
                    });
                },
                error: function(data) {
                    $.alert(data.responseJSON.message);
                    console.log(data);
                },
                complete: function() {
                    setTimeout(() => {
                        $('#loading').addClass('d-none');
                        $('#result').removeClass('d-none');
                    }, 300);
                }
            });
        }
    </script>
@endsection
