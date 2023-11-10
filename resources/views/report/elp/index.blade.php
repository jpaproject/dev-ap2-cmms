@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item active">Reports</li>
@endsection

<link rel="stylesheet" href="{{ asset('plugins/datepicker/bootstrap-datepicker3.min.css') }}">
<style>
    tr {
        cursor: pointer;
    }

    /* Red background for rows with status "reject" */
    .status-reject {
        background-color: #E74646;
        /* Red shade */
    }

    /* Green background for rows with status "done" */
    .status-complete {
        background-color: #A8DF8E;
        /* Green shade */
    }

    .status-open {
        background-color: #F7E987;
        /* Green shade */
    }
</style>

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body pb-1">
                            <h3>Date Range</h3>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <select name="daterange" class="form-control" id="daterange">
                                        <option value="day">Day</option>
                                        <option value="month">Month</option>
                                        <option value="year">Year</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4" id="datepicker-area">
                                    <input type="text" name="date" id="date" value="{{ $date }}"
                                        autocomplete="off" class="datepicker form-control time" required>

                                    <input type="text" name="month" id="month" value="{{ $month }}"
                                        autocomplete="off" class="datepicker-month form-control d-none time" required>

                                    <input type="text" name="year" id="year" value="{{ $year }}"
                                        autocomplete="off" class="datepicker-year form-control d-none time" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="button" onclick="submitDate()" class="btn btn-success">
                                        <div><i class="fa fa-paper-plane"></i></div>
                                    </button>
                                    <a href="" class="btn btn-danger">
                                        <div><i class="fa fa-sync"></i></div>
                                    </a>

                                </div>
                                <div class="form-group col-md-3 d-none" id="loading">
                                    <i class="fas fa-spinner fa-spin fa-2x"></i>
                                    <h4 class="d-inline font-weight-bold">Loading</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.flash-message')
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#preventiveAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countPreventive">Total ({{ $preventives->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printPreventive"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>PREVENTIVE</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($preventives->sortByDesc('created_at')->all() as $workOrder)
                                                {{ $workOrder->name }} @if ($preventives->last()->id != $workOrder->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($preventives->sortByDesc('created_at')->all() as $workOrder)
                                                {{ $workOrder->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="preventiveAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="preventiveTable"
                                        class="table-hover table-responsive-xl table">
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
                                            @foreach ($preventives as $preventive)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $preventive->name }}</td>
                                                    <td>{{ $preventive->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $preventive->priority }}</td>
                                                    <td>{{ $preventive->date_generate }}</td>
                                                    <td>{{ $preventive->id }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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

        });

        // DataTable Structure
        const tableConfig = {
            "paging": true,
            "ordering": true,
            "info": true,
            "columnDefs": [{
                "targets": [5],
                "visible": false,
                "searchable": false
            }, ]
        };

        const preventiveTable = $('#preventiveTable').DataTable(tableConfig);


        // If table row was selected
        function setupTableRowClickHandler(table) {
            $('tbody').on('click', 'tr', function() {
                var data = table.row(this).data();
                if (data && data.length > 5) {
                    var targetURL = '/work-order-reports/' + data[5];
                    window.open(targetURL, '_blank'); // Open in new blank page/tab
                }
            });
        }

        setupTableRowClickHandler(preventiveTable);
        const printReport = (url) => {
            let daterange = $('#daterange').val();
            let date;

            if (daterange == 'day') {
                date = $('#date').val();
            } else if (daterange == 'month') {
                date = $('#month').val();
            } else if (daterange == 'year') {
                date = $('#year').val();
            }

            var targetURL = url;

            // Append the selected date and daterange as query parameters
            targetURL += "?daterange=" + daterange + "&date=" + date;

            // Open the targetURL in a new blank window
            window.open(targetURL, '_blank');
        }

        $('#printPreventive').click(function() {
            printReport("{{ route('report.energy-power-supply.electrical-protection.preventive') }}");
        });

        function getStatus(status) {
            if (status == 'Open') {
                return 'status-open';
            }
            if (status == 'Complete') {
                return 'status-complete';
            }
            if (status == 'Reject') {
                return 'status-reject';
            }
            return '';
        }

        // Using AXIOS
        const submitDate = async () => {
            let daterange = $('#daterange').val();
            let date;

            $('#loading').removeClass('d-none');

            if (daterange == 'day') {
                date = $('#date').val()
            } else if (daterange == 'month') {
                date = $('#month').val()
            } else if (daterange == 'year') {
                date = $('#year').val()
            }

            try {
                const url ="{{ route('elp-work-orders') }}";
                let data = await axios.post(url, {
                    date,
                    daterange
                });
                data = data.data
                //  Preventive Table
                $('#countPreventive').text('Total (' + data.data.preventives.length + ')');
                preventiveTable.clear().draw();
                data.data.preventives.forEach((value, i) => {
                    let newRow = preventiveTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));

                    preventiveTable.draw();
                });

                $('#loading').addClass('d-none');
            } catch (error) {
                $.alert(error.message);
                console.log(error);
            }

        }
    </script>
@endsection
