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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionChecklist1"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countChecklist1">Total ({{ $checklist1s->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printChecklist1"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST 1</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($checklist1s->sortByDesc('created_at')->all() as $checklist1)
                                                {{ $checklist1->name }} @if ($checklist1s->last()->id != $checklist1->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($checklist1s->sortByDesc('created_at')->all() as $checklist1)
                                                {{ $checklist1->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionChecklist1" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="checklist1Table"
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
                                            @foreach ($checklist1s as $checklist1)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $checklist1->name }}</td>
                                                    <td>{{ $checklist1->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $checklist1->priority }}</td>
                                                    <td>{{ $checklist1->date_generate }}</td>
                                                    <td>{{ $checklist1->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionChecklist2"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countChecklist2">Total ({{ $checklist2s->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printChecklist2"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST 2</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($checklist2s->sortByDesc('created_at')->all() as $checklist2)
                                                {{ $checklist2->name }} @if ($checklist2s->last()->id != $checklist2->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($checklist2s->sortByDesc('created_at')->all() as $checklist2)
                                                {{ $checklist2->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionChecklist2" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="checklist2Table"
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
                                            @foreach ($checklist2s as $checklist2)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $checklist2->name }}</td>
                                                    <td>{{ $checklist2->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $checklist2->priority }}</td>
                                                    <td>{{ $checklist2->date_generate }}</td>
                                                    <td>{{ $checklist2->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionsuratIzin"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countsuratIzin">Total ({{ $suratIzins->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printsuratIzin"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>SURAT IZIN PELAKSANAAN PEKERJAAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($suratIzins->sortByDesc('created_at')->all() as $suratIzin)
                                                {{ $suratIzin->name }} @if ($suratIzins->last()->id != $suratIzin->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($suratIzins->sortByDesc('created_at')->all() as $suratIzin)
                                                {{ $suratIzin->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionsuratIzin" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="suratIzinTable"
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
                                            @foreach ($suratIzins as $suratIzin)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $suratIzin->name }}</td>
                                                    <td>{{ $suratIzin->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $suratIzin->priority }}</td>
                                                    <td>{{ $suratIzin->date_generate }}</td>
                                                    <td>{{ $suratIzin->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionsuratPerbaikan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countsuratPerbaikan">Total ({{ $suratPerbaikans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printsuratPerbaikan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>SURAT PERBAIKAN GANGGUAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($suratPerbaikans->sortByDesc('created_at')->all() as $suratPerbaikan)
                                                {{ $suratPerbaikan->name }} @if ($suratPerbaikans->last()->id != $suratPerbaikan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($suratPerbaikans->sortByDesc('created_at')->all() as $suratPerbaikan)
                                                {{ $suratPerbaikan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionsuratPerbaikan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="suratPerbaikanTable"
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
                                            @foreach ($suratPerbaikans as $suratPerbaikan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $suratPerbaikan->name }}</td>
                                                    <td>{{ $suratPerbaikan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $suratPerbaikan->priority }}</td>
                                                    <td>{{ $suratPerbaikan->date_generate }}</td>
                                                    <td>{{ $suratPerbaikan->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionsuratPemeriksaan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countsuratPemeriksaan">Total ({{ $suratPemeriksaans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printsuratPemeriksaan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>SURAT PEMERIKSAAN RUTIN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($suratPemeriksaans->sortByDesc('created_at')->all() as $suratPemeriksaan)
                                                {{ $suratPemeriksaan->name }} @if ($suratPemeriksaans->last()->id != $suratPemeriksaan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($suratPemeriksaans->sortByDesc('created_at')->all() as $suratPemeriksaan)
                                                {{ $suratPemeriksaan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionsuratPemeriksaan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="suratPemeriksaanTable"
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
                                            @foreach ($suratPemeriksaans as $suratPemeriksaan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $suratPemeriksaan->name }}</td>
                                                    <td>{{ $suratPemeriksaan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $suratPemeriksaan->priority }}</td>
                                                    <td>{{ $suratPemeriksaan->date_generate }}</td>
                                                    <td>{{ $suratPemeriksaan->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionflightCalibration"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countflightCalibration">Total ({{ $flightCalibrations->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printflightCalibration"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>HASIL FLIGHT CALIBRATION PAPI</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($flightCalibrations->sortByDesc('created_at')->all() as $flightCalibration)
                                                {{ $flightCalibration->name }} @if ($flightCalibrations->last()->id != $flightCalibration->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($flightCalibrations->sortByDesc('created_at')->all() as $flightCalibration)
                                                {{ $flightCalibration->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionflightCalibration" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="flightCalibrationTable"
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
                                            @foreach ($flightCalibrations as $flightCalibration)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $flightCalibration->name }}</td>
                                                    <td>{{ $flightCalibration->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $flightCalibration->priority }}</td>
                                                    <td>{{ $flightCalibration->date_generate }}</td>
                                                    <td>{{ $flightCalibration->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordioncurrentRegulator"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countcurrentRegulator">Total ({{ $currentRegulators->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printcurrentRegulator"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>DATA PERALATAN CONSTANT CURRENT REGULATOR (CCR)</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($currentRegulators->sortByDesc('created_at')->all() as $currentRegulator)
                                                {{ $currentRegulator->name }} @if ($currentRegulators->last()->id != $currentRegulator->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($currentRegulators->sortByDesc('created_at')->all() as $currentRegulator)
                                                {{ $currentRegulator->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordioncurrentRegulator" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="currentRegulatorTable"
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
                                            @foreach ($currentRegulators as $currentRegulator)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $currentRegulator->name }}</td>
                                                    <td>{{ $currentRegulator->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $currentRegulator->priority }}</td>
                                                    <td>{{ $currentRegulator->date_generate }}</td>
                                                    <td>{{ $currentRegulator->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordioncurrentRegulatordua"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countcurrentRegulatordua">Total ({{ $currentRegulatorduas->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printcurrentRegulatordua"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>DATA PERALATAN CONSTANT CURRENT REGULATOR (CCR) T 11 - T 12</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($currentRegulatorduas->sortByDesc('created_at')->all() as $currentRegulatordua)
                                                {{ $currentRegulatordua->name }} @if ($currentRegulatorduas->last()->id != $currentRegulatordua->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($currentRegulatorduas->sortByDesc('created_at')->all() as $currentRegulatordua)
                                                {{ $currentRegulatordua->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordioncurrentRegulatordua" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="currentRegulatorduaTable"
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
                                            @foreach ($currentRegulatorduas as $currentRegulatordua)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $currentRegulatordua->name }}</td>
                                                    <td>{{ $currentRegulatordua->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $currentRegulatordua->priority }}</td>
                                                    <td>{{ $currentRegulatordua->date_generate }}</td>
                                                    <td>{{ $currentRegulatordua->id }}</td>
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
        const checklist1Table = $('#checklist1Table').DataTable(tableConfig);
        const checklist2Table = $('#checklist2Table').DataTable(tableConfig);
        const suratIzinTable = $('#suratIzinTable').DataTable(tableConfig);
        const suratPerbaikanTable = $('#suratPerbaikanTable').DataTable(tableConfig);
        const suratPemeriksaanTable = $('#suratPemeriksaanTable').DataTable(tableConfig);
        const flightCalibrationTable = $('#flightCalibrationTable').DataTable(tableConfig);
        const currentRegulatorTable = $('#currentRegulatorTable').DataTable(tableConfig);
        const currentRegulatorduaTable = $('#currentRegulatorduaTable').DataTable(tableConfig);


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
        setupTableRowClickHandler(checklist1Table);
        setupTableRowClickHandler(checklist2Table);
        setupTableRowClickHandler(suratIzinTable);
        setupTableRowClickHandler(suratPerbaikanTable);
        setupTableRowClickHandler(suratPemeriksaanTable);
        setupTableRowClickHandler(flightCalibrationTable);
        setupTableRowClickHandler(currentRegulatorTable);
        setupTableRowClickHandler(currentRegulatorduaTable);
        



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
            printReport("{{ route('report.electrical-utility.north-visual-aid.preventive') }}");
        });
        $('#printChecklist1').click(function() {
            printReport("{{ route('report.electrical-utility.north-visual-aid.checklist1') }}");
        });
        $('#printChecklist2').click(function() {
            printReport("{{ route('report.electrical-utility.north-visual-aid.checklist2') }}");
        });
        $('#printsuratIzin').click(function() {
            printReport("{{ route('report.electrical-utility.north-visual-aid.suratIzin') }}");
        });
        $('#printsuratPerbaikan').click(function() {
            printReport("{{ route('report.electrical-utility.north-visual-aid.suratPerbaikan') }}");
        });
        $('#printsuratPemeriksaan').click(function() {
            printReport("{{ route('report.electrical-utility.north-visual-aid.suratPemeriksaan') }}");
        });
        $('#printflightCalibration').click(function() {
            printReport("{{ route('report.electrical-utility.north-visual-aid.flightCalibration') }}");
        });
        $('#printcurrentRegulator').click(function() {
            printReport("{{ route('report.electrical-utility.north-visual-aid.currentRegulator') }}");
        });
        $('#printcurrentRegulatordua').click(function() {
            printReport("{{ route('report.electrical-utility.north-visual-aid.currentRegulatordua') }}");
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
                const url ="{{ route('nva-work-orders') }}";
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

                // checklist1 Table
                $('#countChecklist1').text('Total (' + data.data.checklist1s.length + ')');
                checklist1Table.clear().draw();
                data.data.checklist1s.forEach((value, i) => {
                    let newRow = checklist1Table.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));

                    checklist1Table.draw();
                });

                // checklist2 Table
                $('#countChecklist2').text('Total (' + data.data.checklist2s.length + ')');
                checklist2Table.clear().draw();
                data.data.checklist2s.forEach((value, i) => {
                    let newRow = checklist2Table.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    checklist2Table.draw();
                });


            // SURAT IZIN PELAKSANAAN PEKERJAAN Table
                $('#countsuratIzin').text('Total (' + data.data.suratIzins.length + ')');
                suratIzinTable.clear().draw();
                data.data.suratIzins.forEach((value, i) => {
                    let newRow = suratIzinTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    suratIzinTable.draw();
                });

                $('#countsuratPerbaikan').text('Total (' + data.data.suratPerbaikans.length + ')');
                suratPerbaikanTable.clear().draw();
                data.data.suratPerbaikans.forEach((value, i) => {
                    let newRow = suratPerbaikanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    suratPerbaikanTable.draw();
                });

                $('#countsuratPemeriksaan').text('Total (' + data.data.suratPemeriksaans.length + ')');
                suratPemeriksaanTable.clear().draw();
                data.data.suratPemeriksaans.forEach((value, i) => {
                    let newRow = suratPemeriksaanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    suratPemeriksaanTable.draw();
                });

                $('#countflightCalibration').text('Total (' + data.data.flightCalibrations.length + ')');
                flightCalibrationTable.clear().draw();
                data.data.flightCalibrations.forEach((value, i) => {
                    let newRow = flightCalibrationTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    flightCalibrationTable.draw();
                });

                $('#countcurrentRegulator').text('Total (' + data.data.currentRegulators.length + ')');
                currentRegulatorTable.clear().draw();
                data.data.currentRegulators.forEach((value, i) => {
                    let newRow = currentRegulatorTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    currentRegulatorTable.draw();
                });

                $('#countcurrentRegulatordua').text('Total (' + data.data.currentRegulatorduas.length + ')');
                currentRegulatorduaTable.clear().draw();
                data.data.currentRegulatorduas.forEach((value, i) => {
                    let newRow = currentRegulatorduaTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    currentRegulatorduaTable.draw();
                });
                
                $('#loading').addClass('d-none');
            } catch (error) {
                $.alert(error.message);
                console.log(error);
            }


        }
    </script>
@endsection
