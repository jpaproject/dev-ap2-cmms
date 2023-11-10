@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item active">Reports</li>
@endsection
@section('style')
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
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
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

            @include('components.flash-message')
            <div class="row mt-2">
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
                                    </div>
                                </div>
                            </div>
                            <div id="preventiveAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="preventiveTable"
                                        class="table-hover table-responsive-xl   table">
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordioncarBodyHarian"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countcarBodyHarian">Total ({{ $carBodyHarians->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printcarBodyHarian"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>VEHICLE CAR BODY HARIAN</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="accordioncarBodyHarian" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="carBodyHarianTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($carBodyHarians as $carBodyHarian)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $carBodyHarian->name }}</td>
                                                    <td>{{ $carBodyHarian->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $carBodyHarian->priority }}</td>
                                                    <td>{{ $carBodyHarian->date_generate }}</td>
                                                    <td>{{ $carBodyHarian->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordioncarBodyTigaBulanan" class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countcarBodyTigaBulanan">Total
                                                ({{ $carBodyTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printcarBodyTigaBulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>VEHICLE CARBODY TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($carBodyTigaBulanans->sortByDesc('created_at')->all() as $carBodyTigaBulanan)
                                                {{ $carBodyTigaBulanan->name }} @if ($carBodyTigaBulanans->last()->id != $carBodyTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($carBodyTigaBulanans->sortByDesc('created_at')->all() as $carBodyTigaBulanan)
                                                {{ $carBodyTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordioncarBodyTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="carBodyTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($carBodyTigaBulanans as $carBodyTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $carBodyTigaBulanan->name }}</td>
                                                    <td>{{ $carBodyTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $carBodyTigaBulanan->priority }}</td>
                                                    <td>{{ $carBodyTigaBulanan->date_generate }}</td>
                                                    <td>{{ $carBodyTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionairBrakeSystemHarian"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countairBrakeSystemHarian">Total
                                                ({{ $airBrakeSystemHarians->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printairBrakeSystemHarian" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>AIR BRAKE SYSTEM HARIAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($airBrakeSystemHarians->sortByDesc('created_at')->all() as $airBrakeSystemHarian)
                                                {{ $airBrakeSystemHarian->name }} @if ($airBrakeSystemHarians->last()->id != $airBrakeSystemHarian->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($airBrakeSystemHarians->sortByDesc('created_at')->all() as $airBrakeSystemHarian)
                                                {{ $airBrakeSystemHarian->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionairBrakeSystemHarian" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="airBrakeSystemHarianTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($airBrakeSystemHarians as $airBrakeSystemHarian)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $airBrakeSystemHarian->name }}</td>
                                                    <td>{{ $airBrakeSystemHarian->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $airBrakeSystemHarian->priority }}</td>
                                                    <td>{{ $airBrakeSystemHarian->date_generate }}</td>
                                                    <td>{{ $airBrakeSystemHarian->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionairBrakeSystemTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countairBrakeSystemTigaBulanan">Total
                                                ({{ $airBrakeSystemTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printairBrakeSystemTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>AIR BRAKE SYSTEM TIGA BULANAN</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="accordionairBrakeSystemTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="airBrakeSystemTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($airBrakeSystemTigaBulanans as $airBrakeSystemTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $airBrakeSystemTigaBulanan->name }}</td>
                                                    <td>{{ $airBrakeSystemTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $airBrakeSystemTigaBulanan->priority }}</td>
                                                    <td>{{ $airBrakeSystemTigaBulanan->date_generate }}</td>
                                                    <td>{{ $airBrakeSystemTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionbogieHarian"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countbogieHarian">Total ({{ $bogieHarians->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printbogieHarian"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>VEHICLE BOGIE HARIAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($bogieHarians->sortByDesc('created_at')->all() as $bogieHarian)
                                                {{ $bogieHarian->name }} @if ($bogieHarians->last()->id != $bogieHarian->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($bogieHarians->sortByDesc('created_at')->all() as $bogieHarian)
                                                {{ $bogieHarian->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionbogieHarian" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="bogieHarianTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($bogieHarians as $bogieHarian)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $bogieHarian->name }}</td>
                                                    <td>{{ $bogieHarian->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $bogieHarian->priority }}</td>
                                                    <td>{{ $bogieHarian->date_generate }}</td>
                                                    <td>{{ $bogieHarian->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionbogieTigaBulanan" class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countbogieTigaBulanan">Total
                                                ({{ $bogieTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printbogieTigaBulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>VEHICLE BOGIE TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($bogieTigaBulanans->sortByDesc('created_at')->all() as $bogieTigaBulanan)
                                                {{ $bogieTigaBulanan->name }} @if ($bogieTigaBulanans->last()->id != $bogieTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($bogieTigaBulanans->sortByDesc('created_at')->all() as $bogieTigaBulanan)
                                                {{ $bogieTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionbogieTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="bogieTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($bogieTigaBulanans as $bogieTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $bogieTigaBulanan->name }}</td>
                                                    <td>{{ $bogieTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $bogieTigaBulanan->priority }}</td>
                                                    <td>{{ $bogieTigaBulanan->date_generate }}</td>
                                                    <td>{{ $bogieTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionvehicleMingguan" class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countvehicleMingguan">Total
                                                ({{ $vehicleMingguans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printvehicleMingguan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>VEHICLE MINGGUAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($vehicleMingguans->sortByDesc('created_at')->all() as $vehicleMingguan)
                                                {{ $vehicleMingguan->name }} @if ($vehicleMingguans->last()->id != $vehicleMingguan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($vehicleMingguans->sortByDesc('created_at')->all() as $vehicleMingguan)
                                                {{ $vehicleMingguan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionvehicleMingguan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="vehicleMingguanTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($vehicleMingguans as $vehicleMingguan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $vehicleMingguan->name }}</td>
                                                    <td>{{ $vehicleMingguan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $vehicleMingguan->priority }}</td>
                                                    <td>{{ $vehicleMingguan->date_generate }}</td>
                                                    <td>{{ $vehicleMingguan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorHarian" class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorHarian">Total ({{ $exteriorHarians->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printexteriorHarian"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>VEHICLE EXTERIOR HARIAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorHarians->sortByDesc('created_at')->all() as $exteriorHarian)
                                                {{ $exteriorHarian->name }} @if ($exteriorHarians->last()->id != $exteriorHarian->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorHarians->sortByDesc('created_at')->all() as $exteriorHarian)
                                                {{ $exteriorHarian->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorHarian" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorHarianTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorHarians as $exteriorHarian)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorHarian->name }}</td>
                                                    <td>{{ $exteriorHarian->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $exteriorHarian->priority }}</td>
                                                    <td>{{ $exteriorHarian->date_generate }}</td>
                                                    <td>{{ $exteriorHarian->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordioninteriorHarian" class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countinteriorHarian">Total ({{ $interiorHarians->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printinteriorHarian"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>VEHICLE INTERIOR HARIAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($interiorHarians->sortByDesc('created_at')->all() as $interiorHarian)
                                                {{ $interiorHarian->name }} @if ($interiorHarians->last()->id != $interiorHarian->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($interiorHarians->sortByDesc('created_at')->all() as $interiorHarian)
                                                {{ $interiorHarian->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordioninteriorHarian" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="interiorHarianTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($interiorHarians as $interiorHarian)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $interiorHarian->name }}</td>
                                                    <td>{{ $interiorHarian->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $interiorHarian->priority }}</td>
                                                    <td>{{ $interiorHarian->date_generate }}</td>
                                                    <td>{{ $interiorHarian->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorMingguan" class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorMingguan">Total
                                                ({{ $exteriorMingguans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printexteriorMingguan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>VEHICLE EXTERIOR MINGGUAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorMingguans->sortByDesc('created_at')->all() as $exteriorMingguan)
                                                {{ $exteriorMingguan->name }} @if ($exteriorMingguans->last()->id != $exteriorMingguan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorMingguans->sortByDesc('created_at')->all() as $exteriorMingguan)
                                                {{ $exteriorMingguan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorMingguan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorMingguanTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorMingguans as $exteriorMingguan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorMingguan->name }}</td>
                                                    <td>{{ $exteriorMingguan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $exteriorMingguan->priority }}</td>
                                                    <td>{{ $exteriorMingguan->date_generate }}</td>
                                                    <td>{{ $exteriorMingguan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordioninteriorGDTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countinteriorGDTigaBulanan">Total
                                                ({{ $interiorGDTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printinteriorGDTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>INTERIOR GENERAL DISTRIBUTION TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($interiorGDTigaBulanans->sortByDesc('created_at')->all() as $interiorGDTigaBulanan)
                                                {{ $interiorGDTigaBulanan->name }} @if ($interiorGDTigaBulanans->last()->id != $interiorGDTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($interiorGDTigaBulanans->sortByDesc('created_at')->all() as $interiorGDTigaBulanan)
                                                {{ $interiorGDTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordioninteriorGDTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="interiorGDTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($interiorGDTigaBulanans as $interiorGDTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $interiorGDTigaBulanan->name }}</td>
                                                    <td>{{ $interiorGDTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $interiorGDTigaBulanan->priority }}</td>
                                                    <td>{{ $interiorGDTigaBulanan->date_generate }}</td>
                                                    <td>{{ $interiorGDTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordioninteriorMCTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countinteriorMCTigaBulanan">Total
                                                ({{ $interiorMCTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printinteriorMCTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>INTERIOR MASTER CONTROLLER TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($interiorMCTigaBulanans->sortByDesc('created_at')->all() as $interiorMCTigaBulanan)
                                                {{ $interiorMCTigaBulanan->name }} @if ($interiorMCTigaBulanans->last()->id != $interiorMCTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($interiorMCTigaBulanans->sortByDesc('created_at')->all() as $interiorMCTigaBulanan)
                                                {{ $interiorMCTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordioninteriorMCTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="interiorMCTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($interiorMCTigaBulanans as $interiorMCTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $interiorMCTigaBulanan->name }}</td>
                                                    <td>{{ $interiorMCTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $interiorMCTigaBulanan->priority }}</td>
                                                    <td>{{ $interiorMCTigaBulanan->date_generate }}</td>
                                                    <td>{{ $interiorMCTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordioninteriorTCMSTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countinteriorTCMSTigaBulanan">Total
                                                ({{ $interiorTCMSTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printinteriorTCMSTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>INTERIOR TRAIN CONTROL MONITORING SYSTEM (TCMS) TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($interiorTCMSTigaBulanans->sortByDesc('created_at')->all() as $interiorTCMSTigaBulanan)
                                                {{ $interiorTCMSTigaBulanan->name }} @if ($interiorTCMSTigaBulanans->last()->id != $interiorTCMSTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($interiorTCMSTigaBulanans->sortByDesc('created_at')->all() as $interiorTCMSTigaBulanan)
                                                {{ $interiorTCMSTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordioninteriorTCMSTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="interiorTCMSTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($interiorTCMSTigaBulanans as $interiorTCMSTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $interiorTCMSTigaBulanan->name }}</td>
                                                    <td>{{ $interiorTCMSTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $interiorTCMSTigaBulanan->priority }}</td>
                                                    <td>{{ $interiorTCMSTigaBulanan->date_generate }}</td>
                                                    <td>{{ $interiorTCMSTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordioninteriorLPLTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countinteriorLPLTigaBulanan">Total
                                                ({{ $interiorLPLTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printinteriorLPLTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>INTERIOR LED PASSENGER LIGHT TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($interiorLPLTigaBulanans->sortByDesc('created_at')->all() as $interiorLPLTigaBulanan)
                                                {{ $interiorLPLTigaBulanan->name }} @if ($interiorLPLTigaBulanans->last()->id != $interiorLPLTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($interiorLPLTigaBulanans->sortByDesc('created_at')->all() as $interiorLPLTigaBulanan)
                                                {{ $interiorLPLTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordioninteriorLPLTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="interiorLPLTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($interiorLPLTigaBulanans as $interiorLPLTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $interiorLPLTigaBulanan->name }}</td>
                                                    <td>{{ $interiorLPLTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $interiorLPLTigaBulanan->priority }}</td>
                                                    <td>{{ $interiorLPLTigaBulanan->date_generate }}</td>
                                                    <td>{{ $interiorLPLTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordioninteriorFDSTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countinteriorFDSTigaBulanan">Total
                                                ({{ $interiorFDSTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printinteriorFDSTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>INTERIOR FIRE DETECTION SYSTEM TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($interiorFDSTigaBulanans->sortByDesc('created_at')->all() as $interiorFDSTigaBulanan)
                                                {{ $interiorFDSTigaBulanan->name }} @if ($interiorFDSTigaBulanans->last()->id != $interiorFDSTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($interiorFDSTigaBulanans->sortByDesc('created_at')->all() as $interiorFDSTigaBulanan)
                                                {{ $interiorFDSTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordioninteriorFDSTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="interiorFDSTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($interiorFDSTigaBulanans as $interiorFDSTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $interiorFDSTigaBulanan->name }}</td>
                                                    <td>{{ $interiorFDSTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $interiorFDSTigaBulanan->priority }}</td>
                                                    <td>{{ $interiorFDSTigaBulanan->date_generate }}</td>
                                                    <td>{{ $interiorFDSTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorBECTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorBECTigaBulanan">Total
                                                ({{ $exteriorBECTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorBECTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR BRAKE ELECTRONIC CONTROL UNIT TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorBECTigaBulanans->sortByDesc('created_at')->all() as $exteriorBECTigaBulanan)
                                                {{ $exteriorBECTigaBulanan->name }} @if ($exteriorBECTigaBulanans->last()->id != $exteriorBECTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorBECTigaBulanans->sortByDesc('created_at')->all() as $exteriorBECTigaBulanan)
                                                {{ $exteriorBECTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorBECTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorBECTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorBECTigaBulanans as $exteriorBECTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorBECTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorBECTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorBECTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorBECTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorBECTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorDCTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorDCTigaBulanan">Total
                                                ({{ $exteriorDCTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorDCTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR DC ARRESTER TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorDCTigaBulanans->sortByDesc('created_at')->all() as $exteriorDCTigaBulanan)
                                                {{ $exteriorDCTigaBulanan->name }} @if ($exteriorDCTigaBulanans->last()->id != $exteriorDCTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorDCTigaBulanans->sortByDesc('created_at')->all() as $exteriorDCTigaBulanan)
                                                {{ $exteriorDCTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorDCTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorDCTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorDCTigaBulanans as $exteriorDCTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorDCTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorDCTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorDCTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorDCTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorDCTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorESKTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorESKTigaBulanan">Total
                                                ({{ $exteriorESKTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorESKTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR EXTENTION SYSTEM CONTACTOR TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorESKTigaBulanans->sortByDesc('created_at')->all() as $exteriorESKTigaBulanan)
                                                {{ $exteriorESKTigaBulanan->name }} @if ($exteriorESKTigaBulanans->last()->id != $exteriorESKTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorESKTigaBulanans->sortByDesc('created_at')->all() as $exteriorESKTigaBulanan)
                                                {{ $exteriorESKTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorESKTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorESKTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorESKTigaBulanans as $exteriorESKTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorESKTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorESKTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorESKTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorESKTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorESKTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorHJBTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorHJBTigaBulanan">Total
                                                ({{ $exteriorHJBTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorHJBTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR HIGH TENSION JUNCTION BOX (HJB) TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorHJBTigaBulanans->sortByDesc('created_at')->all() as $exteriorHJBTigaBulanan)
                                                {{ $exteriorHJBTigaBulanan->name }} @if ($exteriorHJBTigaBulanans->last()->id != $exteriorHJBTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorHJBTigaBulanans->sortByDesc('created_at')->all() as $exteriorHJBTigaBulanan)
                                                {{ $exteriorHJBTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorHJBTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorHJBTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorHJBTigaBulanans as $exteriorHJBTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorHJBTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorHJBTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorHJBTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorHJBTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorHJBTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorFJBTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorFJBTigaBulanan">Total
                                                ({{ $exteriorFJBTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorFJBTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR FLEET TENSION JUNCTION BOX (FJB) TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorFJBTigaBulanans->sortByDesc('created_at')->all() as $exteriorFJBTigaBulanan)
                                                {{ $exteriorFJBTigaBulanan->name }} @if ($exteriorFJBTigaBulanans->last()->id != $exteriorFJBTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorFJBTigaBulanans->sortByDesc('created_at')->all() as $exteriorFJBTigaBulanan)
                                                {{ $exteriorFJBTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorFJBTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorFJBTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorFJBTigaBulanans as $exteriorFJBTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorFJBTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorFJBTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorFJBTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorFJBTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorFJBTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorHSCBTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorHSCBTigaBulanan">Total
                                                ({{ $exteriorHSCBTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorHSCBTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR HIGH SPEED CIRCUIT BRAKE (HSCB) TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorHSCBTigaBulanans->sortByDesc('created_at')->all() as $exteriorHSCBTigaBulanan)
                                                {{ $exteriorHSCBTigaBulanan->name }} @if ($exteriorHSCBTigaBulanans->last()->id != $exteriorHSCBTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorHSCBTigaBulanans->sortByDesc('created_at')->all() as $exteriorHSCBTigaBulanan)
                                                {{ $exteriorHSCBTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorHSCBTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorHSCBTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorHSCBTigaBulanans as $exteriorHSCBTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorHSCBTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorHSCBTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorHSCBTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorHSCBTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorHSCBTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorLJBTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorLJBTigaBulanan">Total
                                                ({{ $exteriorLJBTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorLJBTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR LOW TENSION JUNCTION BOX (LJB) TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorLJBTigaBulanans->sortByDesc('created_at')->all() as $exteriorLJBTigaBulanan)
                                                {{ $exteriorLJBTigaBulanan->name }} @if ($exteriorLJBTigaBulanans->last()->id != $exteriorLJBTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorLJBTigaBulanans->sortByDesc('created_at')->all() as $exteriorLJBTigaBulanan)
                                                {{ $exteriorLJBTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorLJBTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorLJBTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorLJBTigaBulanans as $exteriorLJBTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorLJBTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorLJBTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorLJBTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorLJBTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorLJBTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorPCSTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorPCSTigaBulanan">Total
                                                ({{ $exteriorPCSTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorPCSTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR POWER CHANGEOVER SWITCH (PCS) TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorPCSTigaBulanans->sortByDesc('created_at')->all() as $exteriorPCSTigaBulanan)
                                                {{ $exteriorPCSTigaBulanan->name }} @if ($exteriorPCSTigaBulanans->last()->id != $exteriorPCSTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorPCSTigaBulanans->sortByDesc('created_at')->all() as $exteriorPCSTigaBulanan)
                                                {{ $exteriorPCSTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorPCSTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorPCSTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorPCSTigaBulanans as $exteriorPCSTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorPCSTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorPCSTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorPCSTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorPCSTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorPCSTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorSIVTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorSIVTigaBulanan">Total
                                                ({{ $exteriorSIVTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorSIVTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR STATIC INVERTER (SIV) TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorSIVTigaBulanans->sortByDesc('created_at')->all() as $exteriorSIVTigaBulanan)
                                                {{ $exteriorSIVTigaBulanan->name }} @if ($exteriorSIVTigaBulanans->last()->id != $exteriorSIVTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorSIVTigaBulanans->sortByDesc('created_at')->all() as $exteriorSIVTigaBulanan)
                                                {{ $exteriorSIVTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorSIVTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorSIVTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorSIVTigaBulanans as $exteriorSIVTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorSIVTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorSIVTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorSIVTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorSIVTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorSIVTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorLHTTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorLHTTigaBulanan">Total
                                                ({{ $exteriorLHTTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorLHTTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR LED HEAD TAIL LIGHT TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorLHTTigaBulanans->sortByDesc('created_at')->all() as $exteriorLHTTigaBulanan)
                                                {{ $exteriorLHTTigaBulanan->name }} @if ($exteriorLHTTigaBulanans->last()->id != $exteriorLHTTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorLHTTigaBulanans->sortByDesc('created_at')->all() as $exteriorLHTTigaBulanan)
                                                {{ $exteriorLHTTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorLHTTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorLHTTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorLHTTigaBulanans as $exteriorLHTTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorLHTTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorLHTTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorLHTTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorLHTTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorLHTTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorTMTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorTMTigaBulanan">Total
                                                ({{ $exteriorTMTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorTMTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR TRACTION MOTOR TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorTMTigaBulanans->sortByDesc('created_at')->all() as $exteriorTMTigaBulanan)
                                                {{ $exteriorTMTigaBulanan->name }} @if ($exteriorTMTigaBulanans->last()->id != $exteriorTMTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorTMTigaBulanans->sortByDesc('created_at')->all() as $exteriorTMTigaBulanan)
                                                {{ $exteriorTMTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorTMTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorTMTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorTMTigaBulanans as $exteriorTMTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorTMTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorTMTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorTMTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorTMTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorTMTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorVACTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorVACTigaBulanan">Total
                                                ({{ $exteriorVACTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorVACTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR VENTILATION AND AIR CONDITION TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorVACTigaBulanans->sortByDesc('created_at')->all() as $exteriorVACTigaBulanan)
                                                {{ $exteriorVACTigaBulanan->name }} @if ($exteriorVACTigaBulanans->last()->id != $exteriorVACTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorVACTigaBulanans->sortByDesc('created_at')->all() as $exteriorVACTigaBulanan)
                                                {{ $exteriorVACTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorVACTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorVACTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorVACTigaBulanans as $exteriorVACTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorVACTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorVACTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorVACTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorVACTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorVACTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorEHTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorEHTigaBulanan">Total
                                                ({{ $exteriorEHTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorEHTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR ELECTRIC HORN TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorEHTigaBulanans->sortByDesc('created_at')->all() as $exteriorEHTigaBulanan)
                                                {{ $exteriorEHTigaBulanan->name }} @if ($exteriorEHTigaBulanans->last()->id != $exteriorEHTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorEHTigaBulanans->sortByDesc('created_at')->all() as $exteriorEHTigaBulanan)
                                                {{ $exteriorEHTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorEHTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorEHTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorEHTigaBulanans as $exteriorEHTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorEHTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorEHTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorEHTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorEHTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorEHTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorJPTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorJPTigaBulanan">Total
                                                ({{ $exteriorJPTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorJPTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR JUMPER PLUG TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorJPTigaBulanans->sortByDesc('created_at')->all() as $exteriorJPTigaBulanan)
                                                {{ $exteriorJPTigaBulanan->name }} @if ($exteriorJPTigaBulanans->last()->id != $exteriorJPTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorJPTigaBulanans->sortByDesc('created_at')->all() as $exteriorJPTigaBulanan)
                                                {{ $exteriorJPTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorJPTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorJPTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorJPTigaBulanans as $exteriorJPTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorJPTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorJPTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorJPTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorJPTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorJPTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorMDSTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorMDSTigaBulanan">Total
                                                ({{ $exteriorMDSTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorMDSTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR MDS & FUSE BOX TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorMDSTigaBulanans->sortByDesc('created_at')->all() as $exteriorMDSTigaBulanan)
                                                {{ $exteriorMDSTigaBulanan->name }} @if ($exteriorMDSTigaBulanans->last()->id != $exteriorMDSTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorMDSTigaBulanans->sortByDesc('created_at')->all() as $exteriorMDSTigaBulanan)
                                                {{ $exteriorMDSTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorMDSTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorMDSTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorMDSTigaBulanans as $exteriorMDSTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorMDSTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorMDSTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorMDSTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorMDSTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorMDSTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorVVTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorVVTigaBulanan">Total
                                                ({{ $exteriorVVTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorVVTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR VVVF INVERTER TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorVVTigaBulanans->sortByDesc('created_at')->all() as $exteriorVVTigaBulanan)
                                                {{ $exteriorVVTigaBulanan->name }} @if ($exteriorVVTigaBulanans->last()->id != $exteriorVVTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorVVTigaBulanans->sortByDesc('created_at')->all() as $exteriorVVTigaBulanan)
                                                {{ $exteriorVVTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorVVTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorVVTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorVVTigaBulanans as $exteriorVVTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorVVTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorVVTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorVVTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorVVTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorVVTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorPCTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorPCTigaBulanan">Total
                                                ({{ $exteriorPCTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorPCTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR POWER COLLECTOR TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorPCTigaBulanans->sortByDesc('created_at')->all() as $exteriorPCTigaBulanan)
                                                {{ $exteriorPCTigaBulanan->name }} @if ($exteriorPCTigaBulanans->last()->id != $exteriorPCTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorPCTigaBulanans->sortByDesc('created_at')->all() as $exteriorPCTigaBulanan)
                                                {{ $exteriorPCTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorPCTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorPCTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorPCTigaBulanans as $exteriorPCTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorPCTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorPCTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorPCTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorPCTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorPCTigaBulanan->id }}</td>
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


            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#accordionexteriorBATTigaBulanan"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countexteriorBATTigaBulanan">Total
                                                ({{ $exteriorBATTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2"
                                            id="printexteriorBATTigaBulanan" type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>EXTERIOR BATTERY BOX & BATTERY TIGA BULANAN</h3>
                                        {{-- <span class="text-md">
                                            <span class="text-bold">Maintenance Name :</span>
                                            @foreach ($exteriorBATTigaBulanans->sortByDesc('created_at')->all() as $exteriorBATTigaBulanan)
                                                {{ $exteriorBATTigaBulanan->name }} @if ($exteriorBATTigaBulanans->last()->id != $exteriorBATTigaBulanan->id)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                        <br>
                                        <span class="text-md">
                                            <span class="text-bold">Maintenance Code :</span>
                                            @foreach ($exteriorBATTigaBulanans->sortByDesc('created_at')->all() as $exteriorBATTigaBulanan)
                                                {{ $exteriorBATTigaBulanan->code }}
                                            @endforeach
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="accordionexteriorBATTigaBulanan" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="exteriorBATTigaBulananTable"
                                        class="table-hover table-responsive-xl   table">
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
                                            @foreach ($exteriorBATTigaBulanans as $exteriorBATTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $exteriorBATTigaBulanan->name }}</td>
                                                    <td>{{ $exteriorBATTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $exteriorBATTigaBulanan->priority }}</td>
                                                    <td>{{ $exteriorBATTigaBulanan->date_generate }}</td>
                                                    <td>{{ $exteriorBATTigaBulanan->id }}</td>
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
        const carBodyHarianTable = $('#carBodyHarianTable').DataTable(tableConfig);
        const carBodyTigaBulananTable = $('#carBodyTigaBulananTable').DataTable(tableConfig);
        const airBrakeSystemHarianTable = $('#airBrakeSystemHarianTable').DataTable(tableConfig);
        const bogieHarianTable = $('#bogieHarianTable').DataTable(tableConfig);
        const vehicleMingguanTable = $('#vehicleMingguanTable').DataTable(tableConfig);
        const bogieTigaBulananTable = $('#bogieTigaBulananTable').DataTable(tableConfig);
        const airBrakeSystemTigaBulananTable = $('#airBrakeSystemTigaBulananTable').DataTable(tableConfig);
        const exteriorHarianTable = $('#exteriorHarianTable').DataTable(tableConfig);
        const interiorHarianTable = $('#interiorHarianTable').DataTable(tableConfig);
        const exteriorMingguanTable = $('#exteriorMingguanTable').DataTable(tableConfig);
        const interiorGDTigaBulananTable = $('#interiorGDTigaBulananTable').DataTable(tableConfig);
        const interiorMCTigaBulananTable = $('#interiorMCTigaBulananTable').DataTable(tableConfig);
        const interiorTCMSTigaBulananTable = $('#interiorTCMSTigaBulananTable').DataTable(tableConfig);
        const interiorLPLTigaBulananTable = $('#interiorLPLTigaBulananTable').DataTable(tableConfig);
        const exteriorBECTigaBulananTable = $('#exteriorBECTigaBulananTable').DataTable(tableConfig);
        const exteriorDCTigaBulananTable = $('#exteriorDCTigaBulananTable').DataTable(tableConfig);
        const exteriorESKTigaBulananTable = $('#exteriorESKTigaBulananTable').DataTable(tableConfig);
        const exteriorHJBTigaBulananTable = $('#exteriorHJBTigaBulananTable').DataTable(tableConfig);
        const exteriorFJBTigaBulananTable = $('#exteriorFJBTigaBulananTable').DataTable(tableConfig);
        const exteriorHSCBTigaBulananTable = $('#exteriorHSCBTigaBulananTable').DataTable(tableConfig);
        const exteriorLJBTigaBulananTable = $('#exteriorLJBTigaBulananTable').DataTable(tableConfig);
        const exteriorPCSTigaBulananTable = $('#exteriorPCSTigaBulananTable').DataTable(tableConfig);
        const exteriorSIVTigaBulananTable = $('#exteriorSIVTigaBulananTable').DataTable(tableConfig);
        const exteriorLHTTigaBulananTable = $('#exteriorLHTTigaBulananTable').DataTable(tableConfig);
        const exteriorTMTigaBulananTable = $('#exteriorTMTigaBulananTable').DataTable(tableConfig);
        const exteriorVACTigaBulananTable = $('#exteriorVACTigaBulananTable').DataTable(tableConfig);
        const exteriorEHTigaBulananTable = $('#exteriorEHTigaBulananTable').DataTable(tableConfig);
        const exteriorJPTigaBulananTable = $('#exteriorJPTigaBulananTable').DataTable(tableConfig);
        const exteriorMDSTigaBulananTable = $('#exteriorMDSTigaBulananTable').DataTable(tableConfig);
        const exteriorVVTigaBulananTable = $('#exteriorVVTigaBulananTable').DataTable(tableConfig);
        const exteriorPCTigaBulananTable = $('#exteriorPCTigaBulananTable').DataTable(tableConfig);
        const interiorFDSTigaBulananTable = $('#interiorFDSTigaBulananTable').DataTable(tableConfig);
        const exteriorBATTigaBulananTable = $('#exteriorBATTigaBulananTable').DataTable(tableConfig);


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
        setupTableRowClickHandler(carBodyHarianTable);
        setupTableRowClickHandler(carBodyTigaBulananTable);
        setupTableRowClickHandler(airBrakeSystemHarianTable);
        setupTableRowClickHandler(bogieHarianTable);
        setupTableRowClickHandler(vehicleMingguanTable);
        setupTableRowClickHandler(bogieTigaBulananTable);
        setupTableRowClickHandler(airBrakeSystemTigaBulananTable);
        setupTableRowClickHandler(exteriorHarianTable);
        setupTableRowClickHandler(interiorHarianTable);
        setupTableRowClickHandler(exteriorMingguanTable);
        setupTableRowClickHandler(interiorGDTigaBulananTable);
        setupTableRowClickHandler(interiorMCTigaBulananTable);
        setupTableRowClickHandler(interiorTCMSTigaBulananTable);
        setupTableRowClickHandler(interiorLPLTigaBulananTable);
        setupTableRowClickHandler(exteriorBECTigaBulananTable);
        setupTableRowClickHandler(exteriorDCTigaBulananTable);
        setupTableRowClickHandler(exteriorESKTigaBulananTable);
        setupTableRowClickHandler(exteriorHJBTigaBulananTable);
        setupTableRowClickHandler(exteriorFJBTigaBulananTable);
        setupTableRowClickHandler(exteriorHSCBTigaBulananTable);
        setupTableRowClickHandler(exteriorLJBTigaBulananTable);
        setupTableRowClickHandler(exteriorPCSTigaBulananTable);
        setupTableRowClickHandler(exteriorSIVTigaBulananTable);
        setupTableRowClickHandler(exteriorLHTTigaBulananTable);
        setupTableRowClickHandler(exteriorTMTigaBulananTable);
        setupTableRowClickHandler(exteriorVACTigaBulananTable);
        setupTableRowClickHandler(exteriorEHTigaBulananTable);
        setupTableRowClickHandler(exteriorJPTigaBulananTable);
        setupTableRowClickHandler(exteriorMDSTigaBulananTable);
        setupTableRowClickHandler(exteriorVVTigaBulananTable);
        setupTableRowClickHandler(exteriorPCTigaBulananTable);
        setupTableRowClickHandler(interiorFDSTigaBulananTable);
        setupTableRowClickHandler(exteriorBATTigaBulananTable);




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
            printReport("{{ route('report.mechanical-equipment.apm.preventive') }}");
        });
        $('#printcarBodyHarian').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.carBodyHarian') }}");
        });
        $('#printcarBodyTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.carBodyTigaBulanan') }}");
        });
        $('#printairBrakeSystemHarian').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.airBrakeSystemHarian') }}");
        });
        $('#printbogieHarian').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.bogieHarian') }}");
        });
        $('#printvehicleMingguan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.vehicleMingguan') }}");
        });
        $('#printbogieTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.bogieTigaBulanan') }}");
        });
        $('#printairBrakeSystemTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.airBrakeSystemTigaBulanan') }}");
        });
        $('#printexteriorHarian').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorHarian') }}");
        });
        $('#printinteriorHarian').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.interiorHarian') }}");
        });
        $('#printexteriorMingguan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorMingguan') }}");
        });
        $('#printinteriorGDTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.interiorGDTigaBulanan') }}");
        });
        $('#printinteriorMCTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.interiorMCTigaBulanan') }}");
        });
        $('#printinteriorTCMSTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.interiorTCMSTigaBulanan') }}");
        });
        $('#printinteriorLPLTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.interiorLPLTigaBulanan') }}");
        });
        $('#printexteriorBECTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorBECTigaBulanan') }}");
        });
        $('#printexteriorDCTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorDCTigaBulanan') }}");
        });
        $('#printexteriorESKTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorESKTigaBulanan') }}");
        });
        $('#printexteriorHJBTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorHJBTigaBulanan') }}");
        });
        $('#printexteriorFJBTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorFJBTigaBulanan') }}");
        });
        $('#printexteriorHSCBTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorHSCBTigaBulanan') }}");
        });
        $('#printexteriorLJBTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorLJBTigaBulanan') }}");
        });
        $('#printexteriorPCSTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorPCSTigaBulanan') }}");
        });
        $('#printexteriorSIVTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorSIVTigaBulanan') }}");
        });
        $('#printexteriorLHTTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorLHTTigaBulanan') }}");
        });
        $('#printexteriorTMTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorTMTigaBulanan') }}");
        });
        $('#printexteriorVACTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorVACTigaBulanan') }}");
        });
        $('#printexteriorEHTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorEHTigaBulanan') }}");
        });
        $('#printexteriorJPTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorJPTigaBulanan') }}");
        });
        $('#printexteriorMDSTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorMDSTigaBulanan') }}");
        });
        $('#printexteriorVVTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorVVTigaBulanan') }}");
        });
        $('#printexteriorPCTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorPCTigaBulanan') }}");
        });
        $('#printinteriorFDSTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.interiorFDSTigaBulanan') }}");
        });
        $('#printexteriorBATTigaBulanan').click(function() {
            printReport("{{ route('report.mechanical-equipment.apm.exteriorBATTigaBulanan') }}");
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
                const url = "{{ route('apm-work-orders') }}";
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

                $('#countcarBodyHarian').text('Total (' + data.data.carBodyHarians.length + ')');
                carBodyHarianTable.clear().draw();
                data.data.carBodyHarians.forEach((value, i) => {
                    let newRow = carBodyHarianTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));

                    carBodyHarianTable.draw();
                });

                $('#countcarBodyTigaBulanan').text('Total (' + data.data.carBodyTigaBulanans.length + ')');
                carBodyTigaBulananTable.clear().draw();
                data.data.carBodyTigaBulanans.forEach((value, i) => {
                    let newRow = carBodyTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    carBodyTigaBulananTable.draw();
                });


                $('#countairBrakeSystemHarian').text('Total (' + data.data.airBrakeSystemHarians.length + ')');
                airBrakeSystemHarianTable.clear().draw();
                data.data.airBrakeSystemHarians.forEach((value, i) => {
                    let newRow = airBrakeSystemHarianTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    airBrakeSystemHarianTable.draw();
                });

                $('#countbogieHarian').text('Total (' + data.data.bogieHarians.length + ')');
                bogieHarianTable.clear().draw();
                data.data.bogieHarians.forEach((value, i) => {
                    let newRow = bogieHarianTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    bogieHarianTable.draw();
                });

                $('#countvehicleMingguan').text('Total (' + data.data.vehicleMingguans.length + ')');
                vehicleMingguanTable.clear().draw();
                data.data.vehicleMingguans.forEach((value, i) => {
                    let newRow = vehicleMingguanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    vehicleMingguanTable.draw();
                });

                $('#countbogieTigaBulanan').text('Total (' + data.data.bogieTigaBulanans.length + ')');
                bogieTigaBulananTable.clear().draw();
                data.data.bogieTigaBulanans.forEach((value, i) => {
                    let newRow = bogieTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    bogieTigaBulananTable.draw();
                });

                $('#countairBrakeSystemTigaBulanan').text('Total (' + data.data.airBrakeSystemTigaBulanans.length +
                    ')');
                airBrakeSystemTigaBulananTable.clear().draw();
                data.data.airBrakeSystemTigaBulanans.forEach((value, i) => {
                    let newRow = airBrakeSystemTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    airBrakeSystemTigaBulananTable.draw();
                });

                $('#countexteriorHarian').text('Total (' + data.data.exteriorHarians.length + ')');
                exteriorHarianTable.clear().draw();
                data.data.exteriorHarians.forEach((value, i) => {
                    let newRow = exteriorHarianTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorHarianTable.draw();
                });

                $('#countinteriorHarian').text('Total (' + data.data.interiorHarians.length + ')');
                interiorHarianTable.clear().draw();
                data.data.interiorHarians.forEach((value, i) => {
                    let newRow = interiorHarianTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    interiorHarianTable.draw();
                });

                $('#countexteriorMingguan').text('Total (' + data.data.exteriorMingguans.length + ')');
                exteriorMingguanTable.clear().draw();
                data.data.exteriorMingguans.forEach((value, i) => {
                    let newRow = exteriorMingguanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorMingguanTable.draw();
                });

                $('#countinteriorGDTigaBulanan').text('Total (' + data.data.interiorGDTigaBulanans.length + ')');
                interiorGDTigaBulananTable.clear().draw();
                data.data.interiorGDTigaBulanans.forEach((value, i) => {
                    let newRow = interiorGDTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    interiorGDTigaBulananTable.draw();
                });

                $('#countinteriorMCTigaBulanan').text('Total (' + data.data.interiorMCTigaBulanans.length + ')');
                interiorMCTigaBulananTable.clear().draw();
                data.data.interiorMCTigaBulanans.forEach((value, i) => {
                    let newRow = interiorMCTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    interiorMCTigaBulananTable.draw();
                });

                $('#countinteriorTCMSTigaBulanan').text('Total (' + data.data.interiorTCMSTigaBulanans.length +
                ')');
                interiorTCMSTigaBulananTable.clear().draw();
                data.data.interiorTCMSTigaBulanans.forEach((value, i) => {
                    let newRow = interiorTCMSTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    interiorTCMSTigaBulananTable.draw();
                });

                $('#countinteriorLPLTigaBulanan').text('Total (' + data.data.interiorLPLTigaBulanans.length + ')');
                interiorLPLTigaBulananTable.clear().draw();
                data.data.interiorLPLTigaBulanans.forEach((value, i) => {
                    let newRow = interiorLPLTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    interiorLPLTigaBulananTable.draw();
                });

                $('#countexteriorBECTigaBulanan').text('Total (' + data.data.exteriorBECTigaBulanans.length + ')');
                exteriorBECTigaBulananTable.clear().draw();
                data.data.exteriorBECTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorBECTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorBECTigaBulananTable.draw();
                });

                $('#countexteriorDCTigaBulanan').text('Total (' + data.data.exteriorDCTigaBulanans.length + ')');
                exteriorDCTigaBulananTable.clear().draw();
                data.data.exteriorDCTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorDCTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorDCTigaBulananTable.draw();
                });

                $('#countexteriorESKTigaBulanan').text('Total (' + data.data.exteriorESKTigaBulanans.length + ')');
                exteriorESKTigaBulananTable.clear().draw();
                data.data.exteriorESKTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorESKTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorESKTigaBulananTable.draw();
                });

                $('#countexteriorHJBTigaBulanan').text('Total (' + data.data.exteriorHJBTigaBulanans.length + ')');
                exteriorHJBTigaBulananTable.clear().draw();
                data.data.exteriorHJBTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorHJBTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorHJBTigaBulananTable.draw();
                });

                $('#countexteriorFJBTigaBulanan').text('Total (' + data.data.exteriorFJBTigaBulanans.length + ')');
                exteriorFJBTigaBulananTable.clear().draw();
                data.data.exteriorFJBTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorFJBTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorFJBTigaBulananTable.draw();
                });

                $('#countexteriorHSCBTigaBulanan').text('Total (' + data.data.exteriorHSCBTigaBulanans.length +
                ')');
                exteriorHSCBTigaBulananTable.clear().draw();
                data.data.exteriorHSCBTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorHSCBTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorHSCBTigaBulananTable.draw();
                });

                $('#countexteriorLJBTigaBulanan').text('Total (' + data.data.exteriorLJBTigaBulanans.length + ')');
                exteriorLJBTigaBulananTable.clear().draw();
                data.data.exteriorLJBTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorLJBTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorLJBTigaBulananTable.draw();
                });

                $('#countexteriorPCSTigaBulanan').text('Total (' + data.data.exteriorPCSTigaBulanans.length + ')');
                exteriorPCSTigaBulananTable.clear().draw();
                data.data.exteriorPCSTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorPCSTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorPCSTigaBulananTable.draw();
                });

                $('#countexteriorSIVTigaBulanan').text('Total (' + data.data.exteriorSIVTigaBulanans.length + ')');
                exteriorSIVTigaBulananTable.clear().draw();
                data.data.exteriorSIVTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorSIVTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorSIVTigaBulananTable.draw();
                });

                $('#countexteriorLHTTigaBulanan').text('Total (' + data.data.exteriorLHTTigaBulanans.length + ')');
                exteriorLHTTigaBulananTable.clear().draw();
                data.data.exteriorLHTTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorLHTTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorLHTTigaBulananTable.draw();
                });

                $('#countexteriorTMTigaBulanan').text('Total (' + data.data.exteriorTMTigaBulanans.length + ')');
                exteriorTMTigaBulananTable.clear().draw();
                data.data.exteriorTMTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorTMTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorTMTigaBulananTable.draw();
                });

                $('#countexteriorVACTigaBulanan').text('Total (' + data.data.exteriorVACTigaBulanans.length + ')');
                exteriorVACTigaBulananTable.clear().draw();
                data.data.exteriorVACTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorVACTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorVACTigaBulananTable.draw();
                });

                $('#countexteriorEHTigaBulanan').text('Total (' + data.data.exteriorEHTigaBulanans.length + ')');
                exteriorEHTigaBulananTable.clear().draw();
                data.data.exteriorEHTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorEHTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorEHTigaBulananTable.draw();
                });

                $('#countexteriorJPTigaBulanan').text('Total (' + data.data.exteriorJPTigaBulanans.length + ')');
                exteriorJPTigaBulananTable.clear().draw();
                data.data.exteriorJPTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorJPTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorJPTigaBulananTable.draw();
                });

                $('#countexteriorMDSTigaBulanan').text('Total (' + data.data.exteriorMDSTigaBulanans.length + ')');
                exteriorMDSTigaBulananTable.clear().draw();
                data.data.exteriorMDSTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorMDSTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorMDSTigaBulananTable.draw();
                });

                $('#countexteriorVVTigaBulanan').text('Total (' + data.data.exteriorVVTigaBulanans.length + ')');
                exteriorVVTigaBulananTable.clear().draw();
                data.data.exteriorVVTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorVVTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorVVTigaBulananTable.draw();
                });

                $('#countexteriorPCTigaBulanan').text('Total (' + data.data.exteriorPCTigaBulanans.length + ')');
                exteriorPCTigaBulananTable.clear().draw();
                data.data.exteriorPCTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorPCTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorPCTigaBulananTable.draw();
                });

                $('#countinteriorFDSTigaBulanan').text('Total (' + data.data.interiorFDSTigaBulanans.length + ')');
                interiorFDSTigaBulananTable.clear().draw();
                data.data.interiorFDSTigaBulanans.forEach((value, i) => {
                    let newRow = interiorFDSTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    interiorFDSTigaBulananTable.draw();
                });

                $('#countexteriorBATTigaBulanan').text('Total (' + data.data.exteriorBATTigaBulanans.length + ')');
                exteriorBATTigaBulananTable.clear().draw();
                data.data.exteriorBATTigaBulanans.forEach((value, i) => {
                    let newRow = exteriorBATTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    exteriorBATTigaBulananTable.draw();
                });



                $('#loading').addClass('d-none');
            } catch (error) {
                $.alert(error.message);
                console.log(error);
            }



        }
    </script>
@endsection
