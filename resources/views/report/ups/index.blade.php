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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionkerjaPagi"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countkerjaPagi">Total ({{ $kerjaPagis->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printkerjaPagi"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>LAPORAN HASIL KERJA OPERASIONAL PAGI SIANG</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($kerjaPagis->sortByDesc('created_at')->all() as $kerjaPagi)
                                                {{ $kerjaPagi->name }} @if ($kerjaPagis->last()->id != $kerjaPagi->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($kerjaPagis->sortByDesc('created_at')->all() as $kerjaPagi)
                                                {{ $kerjaPagi->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionkerjaPagi" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="kerjaPagiTable"
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
                                            @foreach ($kerjaPagis as $kerjaPagi)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $kerjaPagi->name }}</td>
                                                    <td>{{ $kerjaPagi->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $kerjaPagi->priority }}</td>
                                                    <td>{{ $kerjaPagi->date_generate }}</td>
                                                    <td>{{ $kerjaPagi->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionkerjaMalam"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countkerjaMalam">Total ({{ $kerjaMalams->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printkerjaMalam"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>LAPORAN HASIL KERJA OPERASIONAL MALAM</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($kerjaMalams->sortByDesc('created_at')->all() as $kerjaMalam)
                                                {{ $kerjaMalam->name }} @if ($kerjaMalams->last()->id != $kerjaMalam->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($kerjaMalams->sortByDesc('created_at')->all() as $kerjaMalam)
                                                {{ $kerjaMalam->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionkerjaMalam" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="kerjaMalamTable"
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
                                            @foreach ($kerjaMalams as $kerjaMalam)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $kerjaMalam->name }}</td>
                                                    <td>{{ $kerjaMalam->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $kerjaMalam->priority }}</td>
                                                    <td>{{ $kerjaMalam->date_generate }}</td>
                                                    <td>{{ $kerjaMalam->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionlaporanKerusakan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countlaporanKerusakan">Total ({{ $laporanKerusakans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printlaporanKerusakan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>LAPORAN KERUSAKAN DAN PERBAIKAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($laporanKerusakans->sortByDesc('created_at')->all() as $laporanKerusakan)
                                                {{ $laporanKerusakan->name }} @if ($laporanKerusakans->last()->id != $laporanKerusakan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($laporanKerusakans->sortByDesc('created_at')->all() as $laporanKerusakan)
                                                {{ $laporanKerusakan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionlaporanKerusakan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="laporanKerusakanTable"
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
                                            @foreach ($laporanKerusakans as $laporanKerusakan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $laporanKerusakan->name }}</td>
                                                    <td>{{ $laporanKerusakan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $laporanKerusakan->priority }}</td>
                                                    <td>{{ $laporanKerusakan->date_generate }}</td>
                                                    <td>{{ $laporanKerusakan->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionpengukuranPeralatanMingguan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countpengukuranPeralatanMingguan">Total ({{ $pengukuranPeralatanMingguans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printpengukuranPeralatanMingguan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>PENGUKURAN PERALATAN DUA MINGGUAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($pengukuranPeralatanMingguans->sortByDesc('created_at')->all() as $pengukuranPeralatanMingguan)
                                                {{ $pengukuranPeralatanMingguan->name }} @if ($pengukuranPeralatanMingguans->last()->id != $pengukuranPeralatanMingguan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($pengukuranPeralatanMingguans->sortByDesc('created_at')->all() as $pengukuranPeralatanMingguan)
                                                {{ $pengukuranPeralatanMingguan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionpengukuranPeralatanMingguan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="pengukuranPeralatanMingguanTable"
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
                                            @foreach ($pengukuranPeralatanMingguans as $pengukuranPeralatanMingguan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pengukuranPeralatanMingguan->name }}</td>
                                                    <td>{{ $pengukuranPeralatanMingguan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $pengukuranPeralatanMingguan->priority }}</td>
                                                    <td>{{ $pengukuranPeralatanMingguan->date_generate }}</td>
                                                    <td>{{ $pengukuranPeralatanMingguan->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionpengukuranPeralatanBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countpengukuranPeralatanBulanan">Total ({{ $pengukuranPeralatanBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printpengukuranPeralatanBulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>PENGUKURAN PERALATAN ENAM BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($pengukuranPeralatanBulanans->sortByDesc('created_at')->all() as $pengukuranPeralatanBulanan)
                                                {{ $pengukuranPeralatanBulanan->name }} @if ($pengukuranPeralatanBulanans->last()->id != $pengukuranPeralatanBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($pengukuranPeralatanBulanans->sortByDesc('created_at')->all() as $pengukuranPeralatanBulanan)
                                                {{ $pengukuranPeralatanBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionpengukuranPeralatanBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="pengukuranPeralatanBulananTable"
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
                                            @foreach ($pengukuranPeralatanBulanans as $pengukuranPeralatanBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pengukuranPeralatanBulanan->name }}</td>
                                                    <td>{{ $pengukuranPeralatanBulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $pengukuranPeralatanBulanan->priority }}</td>
                                                    <td>{{ $pengukuranPeralatanBulanan->date_generate }}</td>
                                                    <td>{{ $pengukuranPeralatanBulanan->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordiondataUkur"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countdataUkur">Total ({{ $dataUkurs->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printdataUkur"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>DATA UKUR LOAD BEBAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($dataUkurs->sortByDesc('created_at')->all() as $dataUkur)
                                                {{ $dataUkur->name }} @if ($dataUkurs->last()->id != $dataUkur->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($dataUkurs->sortByDesc('created_at')->all() as $dataUkur)
                                                {{ $dataUkur->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordiondataUkur" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="dataUkurTable"
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
                                            @foreach ($dataUkurs as $dataUkur)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $dataUkur->name }}</td>
                                                    <td>{{ $dataUkur->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $dataUkur->priority }}</td>
                                                    <td>{{ $dataUkur->date_generate }}</td>
                                                    <td>{{ $dataUkur->id }}</td>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionpengukuranBattery"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countpengukuranBattery">Total ({{ $pengukuranBatterys->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printpengukuranBattery"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHEKLIST PENGUKURAN TEGANGAN BATTERY BANK</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($pengukuranBatterys->sortByDesc('created_at')->all() as $pengukuranBattery)
                                                {{ $pengukuranBattery->name }} @if ($pengukuranBatterys->last()->id != $pengukuranBattery->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($pengukuranBatterys->sortByDesc('created_at')->all() as $pengukuranBattery)
                                                {{ $pengukuranBattery->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionpengukuranBattery" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="pengukuranBatteryTable"
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
                                            @foreach ($pengukuranBatterys as $pengukuranBattery)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pengukuranBattery->name }}</td>
                                                    <td>{{ $pengukuranBattery->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $pengukuranBattery->priority }}</td>
                                                    <td>{{ $pengukuranBattery->date_generate }}</td>
                                                    <td>{{ $pengukuranBattery->id }}</td>
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
        const kerjaPagiTable = $('#kerjaPagiTable').DataTable(tableConfig);
        const kerjaMalamTable = $('#kerjaMalamTable').DataTable(tableConfig);
        const laporanKerusakanTable = $('#laporanKerusakanTable').DataTable(tableConfig);
        const pengukuranPeralatanMingguanTable = $('#pengukuranPeralatanMingguanTable').DataTable(tableConfig);
        const pengukuranPeralatanBulananTable = $('#pengukuranPeralatanBulananTable').DataTable(tableConfig);
        const dataUkurTable = $('#dataUkurTable').DataTable(tableConfig);
        const pengukuranBatteryTable = $('#pengukuranBatteryTable').DataTable(tableConfig);


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
        setupTableRowClickHandler(kerjaPagiTable);
        setupTableRowClickHandler(kerjaMalamTable);
        setupTableRowClickHandler(laporanKerusakanTable);
        setupTableRowClickHandler(pengukuranPeralatanMingguanTable);
        setupTableRowClickHandler(pengukuranPeralatanBulananTable);
        setupTableRowClickHandler(dataUkurTable);
        setupTableRowClickHandler(pengukuranBatteryTable);
        



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
            printReport("{{ route('report.electrical-utility.ups.preventive') }}");
        });
        $('#printkerjaPagi').click(function() {
            printReport("{{ route('report.electrical-utility.ups.kerjaPagi') }}");
        });
        $('#printkerjaMalam').click(function() {
            printReport("{{ route('report.electrical-utility.ups.kerjaMalam') }}");
        });
        $('#printlaporanKerusakan').click(function() {
            printReport("{{ route('report.electrical-utility.ups.laporanKerusakan') }}");
        });
        $('#printpengukuranPeralatanMingguan').click(function() {
            printReport("{{ route('report.electrical-utility.ups.pengukuranPeralatanMingguan') }}");
        });
        $('#printpengukuranPeralatanBulanan').click(function() {
            printReport("{{ route('report.electrical-utility.ups.pengukuranPeralatanBulanan') }}");
        });
        $('#printdataUkur').click(function() {
            printReport("{{ route('report.electrical-utility.ups.dataUkur') }}");
        });
        $('#printpengukuranBattery').click(function() {
            printReport("{{ route('report.electrical-utility.ups.pengukuranBattery') }}");
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
                const url ="{{ route('ups-work-orders') }}";
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


                $('#countkerjaPagi').text('Total (' + data.data.kerjaPagis.length + ')');
                kerjaPagiTable.clear().draw();
                data.data.kerjaPagis.forEach((value, i) => {
                    let newRow = kerjaPagiTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    kerjaPagiTable.draw();
                });

                $('#countkerjaMalam').text('Total (' + data.data.kerjaMalams.length + ')');
                kerjaMalamTable.clear().draw();
                data.data.kerjaMalams.forEach((value, i) => {
                    let newRow = kerjaMalamTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    kerjaMalamTable.draw();
                });

                $('#countlaporanKerusakan').text('Total (' + data.data.laporanKerusakans.length + ')');
                laporanKerusakanTable.clear().draw();
                data.data.laporanKerusakans.forEach((value, i) => {
                    let newRow = laporanKerusakanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    laporanKerusakanTable.draw();
                });

                $('#countpengukuranPeralatanMingguan').text('Total (' + data.data.pengukuranPeralatanMingguans.length + ')');
                pengukuranPeralatanMingguanTable.clear().draw();
                data.data.pengukuranPeralatanMingguans.forEach((value, i) => {
                    let newRow = pengukuranPeralatanMingguanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    pengukuranPeralatanMingguanTable.draw();
                });

                $('#countpengukuranPeralatanBulanan').text('Total (' + data.data.pengukuranPeralatanBulanans.length + ')');
                pengukuranPeralatanBulananTable.clear().draw();
                data.data.pengukuranPeralatanBulanans.forEach((value, i) => {
                    let newRow = pengukuranPeralatanBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    pengukuranPeralatanBulananTable.draw();
                });

                $('#countdataUkur').text('Total (' + data.data.dataUkurs.length + ')');
                dataUkurTable.clear().draw();
                data.data.dataUkurs.forEach((value, i) => {
                    let newRow = dataUkurTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    dataUkurTable.draw();
                });

                $('#countpengukuranBattery').text('Total (' + data.data.pengukuranBatterys.length + ')');
                pengukuranBatteryTable.clear().draw();
                data.data.pengukuranBatterys.forEach((value, i) => {
                    let newRow = pengukuranBatteryTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    pengukuranBatteryTable.draw();
                });

                
                $('#loading').addClass('d-none');
            } catch (error) {
                $.alert(error.message);
                console.log(error);
            }


        }
    </script>
@endsection
