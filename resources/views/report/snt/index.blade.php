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
        <form method="POST" action=""  enctype="multipart/form-data" id="form2">
            <div class="container-fluid">
            <div class="row">
                <div class="col-6">
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionchecklistSewage"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countchecklistSewage">Total ({{ $checklistSewages->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printchecklistSewage"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST SEWAGE TREATMENT PLANT HARIAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($checklistSewages->sortByDesc('created_at')->all() as $checklistSewage)
                                                {{ $checklistSewage->name }} @if ($checklistSewages->last()->id != $checklistSewage->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($checklistSewages->sortByDesc('created_at')->all() as $checklistSewage)
                                                {{ $checklistSewage->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionchecklistSewage" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="checklistSewageTable"
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
                                            @foreach ($checklistSewages as $checklistSewage)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $checklistSewage->name }}</td>
                                                    <td>{{ $checklistSewage->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $checklistSewage->priority }}</td>
                                                    <td>{{ $checklistSewage->date_generate }}</td>
                                                    <td>{{ $checklistSewage->id }}</td>
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
            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionperawatanSewage"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countperawatanSewage">Total ({{ $perawatanSewages->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printperawatanSewage"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>PERAWATAN SEWAGE TREATMENT PLANT HARIAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($perawatanSewages->sortByDesc('created_at')->all() as $perawatanSewage)
                                                {{ $perawatanSewage->name }} @if ($perawatanSewages->last()->id != $perawatanSewage->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($perawatanSewages->sortByDesc('created_at')->all() as $perawatanSewage)
                                                {{ $perawatanSewage->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionperawatanSewage" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="perawatanSewageTable"
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
                                            @foreach ($perawatanSewages as $perawatanSewage)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $perawatanSewage->name }}</td>
                                                    <td>{{ $perawatanSewage->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $perawatanSewage->priority }}</td>
                                                    <td>{{ $perawatanSewage->date_generate }}</td>
                                                    <td>{{ $perawatanSewage->id }}</td>
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

            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionchecklistLp"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countchecklistLp">Total ({{ $checklistLps->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printchecklistLp"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST LIFTING PUMP</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($checklistLps->sortByDesc('created_at')->all() as $checklistLp)
                                                {{ $checklistLp->name }} @if ($checklistLps->last()->id != $checklistLp->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($checklistLps->sortByDesc('created_at')->all() as $checklistLp)
                                                {{ $checklistLp->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionchecklistLp" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="checklistLpTable"
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
                                            @foreach ($checklistLps as $checklistLp)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $checklistLp->name }}</td>
                                                    <td>{{ $checklistLp->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $checklistLp->priority }}</td>
                                                    <td>{{ $checklistLp->date_generate }}</td>
                                                    <td>{{ $checklistLp->id }}</td>
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

            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionchecklistLpHarian"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countchecklistLpHarian">Total ({{ $checklistLpHarians->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printchecklistLpHarian"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST LIFTING PUMP HARIAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($checklistLpHarians->sortByDesc('created_at')->all() as $checklistLpHarian)
                                                {{ $checklistLpHarian->name }} @if ($checklistLpHarians->last()->id != $checklistLpHarian->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($checklistLpHarians->sortByDesc('created_at')->all() as $checklistLpHarian)
                                                {{ $checklistLpHarian->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionchecklistLpHarian" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="checklistLpHarianTable"
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
                                            @foreach ($checklistLpHarians as $checklistLpHarian)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $checklistLpHarian->name }}</td>
                                                    <td>{{ $checklistLpHarian->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $checklistLpHarian->priority }}</td>
                                                    <td>{{ $checklistLpHarian->date_generate }}</td>
                                                    <td>{{ $checklistLpHarian->id }}</td>
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

            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionchecklistDelaceration"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countchecklistDelaceration">Total ({{ $checklistDelacerations->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printchecklistDelaceration"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST DELACERATION HARIAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($checklistDelacerations->sortByDesc('created_at')->all() as $checklistDelaceration)
                                                {{ $checklistDelaceration->name }} @if ($checklistDelacerations->last()->id != $checklistDelaceration->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($checklistDelacerations->sortByDesc('created_at')->all() as $checklistDelaceration)
                                                {{ $checklistDelaceration->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionchecklistDelaceration" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="checklistDelacerationTable"
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
                                            @foreach ($checklistDelacerations as $checklistDelaceration)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $checklistDelaceration->name }}</td>
                                                    <td>{{ $checklistDelaceration->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $checklistDelaceration->priority }}</td>
                                                    <td>{{ $checklistDelaceration->date_generate }}</td>
                                                    <td>{{ $checklistDelaceration->id }}</td>
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

            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionperawatanT3"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countperawatanT3">Total ({{ $perawatanT3s->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printperawatanT3"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>PERAWATAN T3 VIP</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($perawatanT3s->sortByDesc('created_at')->all() as $perawatanT3)
                                                {{ $perawatanT3->name }} @if ($perawatanT3s->last()->id != $perawatanT3->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($perawatanT3s->sortByDesc('created_at')->all() as $perawatanT3)
                                                {{ $perawatanT3->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionperawatanT3" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="perawatanT3Table"
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
                                            @foreach ($perawatanT3s as $perawatanT3)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $perawatanT3->name }}</td>
                                                    <td>{{ $perawatanT3->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $perawatanT3->priority }}</td>
                                                    <td>{{ $perawatanT3->date_generate }}</td>
                                                    <td>{{ $perawatanT3->id }}</td>
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

            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionincinerator123Harian"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countincinerator123Harian">Total ({{ $incinerator123Harians->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printincinerator123Harian"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST PERAWATAN INCINERATOR 123 HARIAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($incinerator123Harians->sortByDesc('created_at')->all() as $incinerator123Harian)
                                                {{ $incinerator123Harian->name }} @if ($incinerator123Harians->last()->id != $incinerator123Harian->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($incinerator123Harians->sortByDesc('created_at')->all() as $incinerator123Harian)
                                                {{ $incinerator123Harian->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionincinerator123Harian" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="incinerator123HarianTable"
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
                                            @foreach ($incinerator123Harians as $incinerator123Harian)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $incinerator123Harian->name }}</td>
                                                    <td>{{ $incinerator123Harian->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $incinerator123Harian->priority }}</td>
                                                    <td>{{ $incinerator123Harian->date_generate }}</td>
                                                    <td>{{ $incinerator123Harian->id }}</td>
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

            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionincinerator567Harian"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countincinerator567Harian">Total ({{ $incinerator567Harians->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printincinerator567Harian"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST PERAWATAN INCINERATOR 567 HARIAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($incinerator567Harians->sortByDesc('created_at')->all() as $incinerator567Harian)
                                                {{ $incinerator567Harian->name }} @if ($incinerator567Harians->last()->id != $incinerator567Harian->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($incinerator567Harians->sortByDesc('created_at')->all() as $incinerator567Harian)
                                                {{ $incinerator567Harian->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionincinerator567Harian" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="incinerator567HarianTable"
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
                                            @foreach ($incinerator567Harians as $incinerator567Harian)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $incinerator567Harian->name }}</td>
                                                    <td>{{ $incinerator567Harian->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $incinerator567Harian->priority }}</td>
                                                    <td>{{ $incinerator567Harian->date_generate }}</td>
                                                    <td>{{ $incinerator567Harian->id }}</td>
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

            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionincinerator123Mingguan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countincinerator123Mingguan">Total ({{ $incinerator123Mingguans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printincinerator123Mingguan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST PERAWATAN INCINERATOR 123 MINGGUAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($incinerator123Mingguans->sortByDesc('created_at')->all() as $incinerator123Mingguan)
                                                {{ $incinerator123Mingguan->name }} @if ($incinerator123Mingguans->last()->id != $incinerator123Mingguan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($incinerator123Mingguans->sortByDesc('created_at')->all() as $incinerator123Mingguan)
                                                {{ $incinerator123Mingguan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionincinerator123Mingguan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="incinerator123MingguanTable"
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
                                            @foreach ($incinerator123Mingguans as $incinerator123Mingguan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $incinerator123Mingguan->name }}</td>
                                                    <td>{{ $incinerator123Mingguan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $incinerator123Mingguan->priority }}</td>
                                                    <td>{{ $incinerator123Mingguan->date_generate }}</td>
                                                    <td>{{ $incinerator123Mingguan->id }}</td>
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

            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionincinerator456Mingguan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countincinerator456Mingguan">Total ({{ $incinerator456Mingguans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printincinerator456Mingguan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST PERAWATAN INCINERATOR 456 MINGGUAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($incinerator456Mingguans->sortByDesc('created_at')->all() as $incinerator456Mingguan)
                                                {{ $incinerator456Mingguan->name }} @if ($incinerator456Mingguans->last()->id != $incinerator456Mingguan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($incinerator456Mingguans->sortByDesc('created_at')->all() as $incinerator456Mingguan)
                                                {{ $incinerator456Mingguan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionincinerator456Mingguan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="incinerator456MingguanTable"
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
                                            @foreach ($incinerator456Mingguans as $incinerator456Mingguan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $incinerator456Mingguan->name }}</td>
                                                    <td>{{ $incinerator456Mingguan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $incinerator456Mingguan->priority }}</td>
                                                    <td>{{ $incinerator456Mingguan->date_generate }}</td>
                                                    <td>{{ $incinerator456Mingguan->id }}</td>
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

            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionincinerator123Bulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countincinerator123Bulanan">Total ({{ $incinerator123Bulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printincinerator123Bulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST PERAWATAN INCINERATOR 123 BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($incinerator123Bulanans->sortByDesc('created_at')->all() as $incinerator123Bulanan)
                                                {{ $incinerator123Bulanan->name }} @if ($incinerator123Bulanans->last()->id != $incinerator123Bulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($incinerator123Bulanans->sortByDesc('created_at')->all() as $incinerator123Bulanan)
                                                {{ $incinerator123Bulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionincinerator123Bulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="incinerator123BulananTable"
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
                                            @foreach ($incinerator123Bulanans as $incinerator123Bulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $incinerator123Bulanan->name }}</td>
                                                    <td>{{ $incinerator123Bulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $incinerator123Bulanan->priority }}</td>
                                                    <td>{{ $incinerator123Bulanan->date_generate }}</td>
                                                    <td>{{ $incinerator123Bulanan->id }}</td>
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

            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionincinerator456Bulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countincinerator456Bulanan">Total ({{ $incinerator456Bulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printincinerator456Bulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST PERAWATAN INCINERATOR 456 BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($incinerator456Bulanans->sortByDesc('created_at')->all() as $incinerator456Bulanan)
                                                {{ $incinerator456Bulanan->name }} @if ($incinerator456Bulanans->last()->id != $incinerator456Bulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($incinerator456Bulanans->sortByDesc('created_at')->all() as $incinerator456Bulanan)
                                                {{ $incinerator456Bulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionincinerator456Bulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="incinerator456BulananTable"
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
                                            @foreach ($incinerator456Bulanans as $incinerator456Bulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $incinerator456Bulanan->name }}</td>
                                                    <td>{{ $incinerator456Bulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $incinerator456Bulanan->priority }}</td>
                                                    <td>{{ $incinerator456Bulanan->date_generate }}</td>
                                                    <td>{{ $incinerator456Bulanan->id }}</td>
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
        </form>
        
    
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
        const checklistSewageTable = $('#checklistSewageTable').DataTable(tableConfig);
        const perawatanSewageTable = $('#perawatanSewageTable').DataTable(tableConfig);
        const checklistLpTable = $('#checklistLpTable').DataTable(tableConfig);
        const checklistLpHarianTable = $('#checklistLpHarianTable').DataTable(tableConfig);
        const checklistDelacerationTable = $('#checklistDelacerationTable').DataTable(tableConfig);
        const perawatanT3Table = $('#perawatanT3Table').DataTable(tableConfig);
        const incinerator123HarianTable = $('#incinerator123HarianTable').DataTable(tableConfig);
        const incinerator567HarianTable = $('#incinerator567HarianTable').DataTable(tableConfig);
        const incinerator123MingguanTable = $('#incinerator123MingguanTable').DataTable(tableConfig);
        const incinerator456MingguanTable = $('#incinerator456MingguanTable').DataTable(tableConfig);
        const incinerator123BulananTable = $('#incinerator123BulananTable').DataTable(tableConfig);
        const incinerator456BulananTable = $('#incinerator456BulananTable').DataTable(tableConfig);


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
        setupTableRowClickHandler(checklistSewageTable);
        setupTableRowClickHandler(perawatanSewageTable);
        setupTableRowClickHandler(checklistLpTable);
        setupTableRowClickHandler(checklistLpHarianTable);
        setupTableRowClickHandler(checklistDelacerationTable);
        setupTableRowClickHandler(perawatanT3Table);
        setupTableRowClickHandler(incinerator123HarianTable);
        setupTableRowClickHandler(incinerator567HarianTable);
        setupTableRowClickHandler(incinerator123MingguanTable);
        setupTableRowClickHandler(incinerator456MingguanTable);
        setupTableRowClickHandler(incinerator123BulananTable);
        setupTableRowClickHandler(incinerator456BulananTable);
        


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
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.preventive') }}");
        });
        $('#printchecklistSewage').click(function() {
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.checklistSewage') }}");
        });
        $('#printperawatanSewage').click(function() {
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.perawatanSewage') }}");
        });
        $('#printchecklistLp').click(function() {
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.checklistLp') }}");
        });
        $('#printchecklistLpHarian').click(function() {
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.checklistLpHarian') }}");
        });
        $('#printchecklistDelaceration').click(function() {
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.checklistDelaceration') }}");
        });
        $('#printperawatanT3').click(function() {
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.perawatanT3') }}");
        });
        $('#printincinerator123Harian').click(function() {
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.incinerator123Harian') }}");
        });
        $('#printincinerator567Harian').click(function() {
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.incinerator567Harian') }}");
        });
        $('#printincinerator123Mingguan').click(function() {
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.incinerator123Mingguan') }}");
        });
        $('#printincinerator456Mingguan').click(function() {
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.incinerator456Mingguan') }}");
        });
        $('#printincinerator123Bulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.incinerator123Bulanan') }}");
        });
        $('#printincinerator456Bulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.sanitation-facility.incinerator456Bulanan') }}");
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
                const url ="{{ route('snt-work-orders') }}";
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

                $('#countchecklistSewage').text('Total (' + data.data.checklistSewages.length + ')');
                checklistSewageTable.clear().draw();
                data.data.checklistSewages.forEach((value, i) => {
                    let newRow = checklistSewageTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));

                    checklistSewageTable.draw();
                });

                $('#countperawatanSewage').text('Total (' + data.data.perawatanSewages.length + ')');
                perawatanSewageTable.clear().draw();
                data.data.perawatanSewages.forEach((value, i) => {
                    let newRow = perawatanSewageTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    perawatanSewageTable.draw();
                });


            // SURAT IZIN PELAKSANAAN PEKERJAAN Table
                $('#countchecklistLp').text('Total (' + data.data.checklistLps.length + ')');
                checklistLpTable.clear().draw();
                data.data.checklistLps.forEach((value, i) => {
                    let newRow = checklistLpTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    checklistLpTable.draw();
                });

                $('#countchecklistLpHarian').text('Total (' + data.data.checklistLpHarians.length + ')');
                checklistLpHarianTable.clear().draw();
                data.data.checklistLpHarians.forEach((value, i) => {
                    let newRow = checklistLpHarianTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    checklistLpHarianTable.draw();
                });

                $('#countchecklistDelaceration').text('Total (' + data.data.checklistDelacerations.length + ')');
                checklistDelacerationTable.clear().draw();
                data.data.checklistDelacerations.forEach((value, i) => {
                    let newRow = checklistDelacerationTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    checklistDelacerationTable.draw();
                });

                $('#countperawatanT3').text('Total (' + data.data.perawatanT3s.length + ')');
                perawatanT3Table.clear().draw();
                data.data.perawatanT3s.forEach((value, i) => {
                    let newRow = perawatanT3Table.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    perawatanT3Table.draw();
                });

                $('#countincinerator123Harian').text('Total (' + data.data.incinerator123Harians.length + ')');
                incinerator123HarianTable.clear().draw();
                data.data.incinerator123Harians.forEach((value, i) => {
                    let newRow = incinerator123HarianTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    incinerator123HarianTable.draw();
                });

                $('#countincinerator567Harian').text('Total (' + data.data.incinerator567Harians.length + ')');
                incinerator567HarianTable.clear().draw();
                data.data.incinerator567Harians.forEach((value, i) => {
                    let newRow = incinerator567HarianTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    incinerator567HarianTable.draw();
                });

                $('#countincinerator123Mingguan').text('Total (' + data.data.incinerator123Mingguans.length + ')');
                incinerator123MingguanTable.clear().draw();
                data.data.incinerator123Mingguans.forEach((value, i) => {
                    let newRow = incinerator123MingguanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    incinerator123MingguanTable.draw();
                });

                $('#countincinerator456Mingguan').text('Total (' + data.data.incinerator456Mingguans.length + ')');
                incinerator456MingguanTable.clear().draw();
                data.data.incinerator456Mingguans.forEach((value, i) => {
                    let newRow = incinerator456MingguanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    incinerator456MingguanTable.draw();
                });

                $('#countincinerator123Bulanan').text('Total (' + data.data.incinerator123Bulanans.length + ')');
                incinerator123BulananTable.clear().draw();
                data.data.incinerator123Bulanans.forEach((value, i) => {
                    let newRow = incinerator123BulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    incinerator123BulananTable.draw();
                });

                $('#countincinerator456Bulanan').text('Total (' + data.data.incinerator456Bulanans.length + ')');
                incinerator456BulananTable.clear().draw();
                data.data.incinerator456Bulanans.forEach((value, i) => {
                    let newRow = incinerator456BulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    incinerator456BulananTable.draw();
                });
                
                $('#loading').addClass('d-none');
            } catch (error) {
                $.alert(error.message);
                console.log(error);
            }

        }
    </script>
@endsection
