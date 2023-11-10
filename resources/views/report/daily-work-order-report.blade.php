@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item active">Reports</li>
@endsection

@section('style')
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordion1"
                                            class="float-right btn btn-md btn-danger">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="">Work Order({{ $workOrders->count() }})</span>
                                        </a>
                                        <a href="{{ route('view-daily-wok-order-reports') }}"
                                            class="float-right btn btn-md btn-info mr-2" target="_blank">
                                            <i class="fas fa-eye"></i>
                                            Daily Work Order Report
                                        </a>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance name :</span>
                                            @foreach ($workOrders->sortByDesc('created_at')->all() as $workOrder)
                                                {{ $workOrder->name }} @if ($workOrders->last()->id != $workOrder->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($workOrders->sortByDesc('created_at')->all() as $workOrder)
                                                {{ $workOrder->code }}
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div id="accordion1" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table id="table" class="table table-hover table-responsive-xl">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Estimate Complete</th>
                                                <th>Actual Complete</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($workOrders->sortByDesc('created_at')->all() as $work_order)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $work_order->name }}</td>
                                                    <td>{{ $work_order->suggested_completion_date ?? 'N/A' }}</td>
                                                    <td>{{ $work_order->actual_completion_date ?? 'N/A' }}</td>
                                                    <td>{{ $work_order->workOrderStatus->name }}</td>
                                                    @if (auth()->user()->can('location-delete'))
                                                        <td>
                                                            <div class="btn-group" role="group">
                                                                @can('location-detail')
                                                                    <a href="{{ route('work-order-reports', $work_order->id) }}"
                                                                        class="btn btn-info text-white" target="_blank">
                                                                        <i class="fas fa-eye"></i>
                                                                        WO Report
                                                                    </a>
                                                                @endcan
                                                            </div>
                                                        </td>
                                                    @endif
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
    {{-- @foreach ($workOrders as $workOrder)
        <script>
            $('#table-' + {{ $loop->iteration }}).DataTable({
                'bLengthChange': false,
                'searching': false,
                "paging": false,
                "ordering": false,
                "info": false
            });
        </script>
    @endforeach --}}
@endsection
