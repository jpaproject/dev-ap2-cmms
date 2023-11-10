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

            {{-- FORM PANEL AUTOMATION DUA MINGGUAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1PanelAutomationDuaMingguanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1PanelAutomationDuaMingguan">Total ({{ $formPs1PanelAutomationDuaMingguans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1PanelAutomationDuaMingguan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>PANEL AUTOMATION DUA MINGGUAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1PanelAutomationDuaMingguanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1PanelAutomationDuaMingguanTable"
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
                                            @foreach ($formPs1PanelAutomationDuaMingguans as $formPs1PanelAutomationDuaMingguan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1PanelAutomationDuaMingguan->name }}</td>
                                                    <td>{{ $formPs1PanelAutomationDuaMingguan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1PanelAutomationDuaMingguan->priority }}</td>
                                                    <td>{{ $formPs1PanelAutomationDuaMingguan->date_generate }}</td>
                                                    <td>{{ $formPs1PanelAutomationDuaMingguan->id }}</td>
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
            
            {{-- FORM PANEL TR DUA MINGGUAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1PanelTrDuaMingguanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1PanelTrDuaMingguan">Total ({{ $formPs1PanelTrDuaMingguans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1PanelTrDuaMingguan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>PANEL TR DUA MINGGUAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1PanelTrDuaMingguanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1PanelTrDuaMingguanTable"
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
                                            @foreach ($formPs1PanelTrDuaMingguans as $formPs1PanelTrDuaMingguan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1PanelTrDuaMingguan->name }}</td>
                                                    <td>{{ $formPs1PanelTrDuaMingguan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1PanelTrDuaMingguan->priority }}</td>
                                                    <td>{{ $formPs1PanelTrDuaMingguan->date_generate }}</td>
                                                    <td>{{ $formPs1PanelTrDuaMingguan->id }}</td>
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

            {{-- FORM PANEL TR ENAM BULANAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1PanelTrEnamBulananAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1PanelTrEnamBulanan">Total ({{ $formPs1PanelTrEnamBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1PanelTrEnamBulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>PANEL TR ENAM BULANAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1PanelTrEnamBulananAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1PanelTrEnamBulananTable"
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
                                            @foreach ($formPs1PanelTrEnamBulanans as $formPs1PanelTrEnamBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1PanelTrEnamBulanan->name }}</td>
                                                    <td>{{ $formPs1PanelTrEnamBulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1PanelTrEnamBulanan->priority }}</td>
                                                    <td>{{ $formPs1PanelTrEnamBulanan->date_generate }}</td>
                                                    <td>{{ $formPs1PanelTrEnamBulanan->id }}</td>
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

            {{-- FORM PANEL TR TAHUNAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1PanelTrTahunanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1PanelTrTahunan">Total ({{ $formPs1PanelTrTahunans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1PanelTrTahunan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>PANEL TR TAHUNAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1PanelTrTahunanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1PanelTrTahunanTable"
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
                                            @foreach ($formPs1PanelTrTahunans as $formPs1PanelTrTahunan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1PanelTrTahunan->name }}</td>
                                                    <td>{{ $formPs1PanelTrTahunan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1PanelTrTahunan->priority }}</td>
                                                    <td>{{ $formPs1PanelTrTahunan->date_generate }}</td>
                                                    <td>{{ $formPs1PanelTrTahunan->id }}</td>
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

            {{-- FORM PANEL TM DUA MINGGUAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1PanelTmDuaMingguanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1PanelTmDuaMingguan">Total ({{ $formPs1PanelTmDuaMingguans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1PanelTmDuaMingguan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>PANEL TM DUA MINGGUAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1PanelTmDuaMingguanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1PanelTmDuaMingguanTable"
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
                                            @foreach ($formPs1PanelTmDuaMingguans as $formPs1PanelTmDuaMingguan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1PanelTmDuaMingguan->name }}</td>
                                                    <td>{{ $formPs1PanelTmDuaMingguan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1PanelTmDuaMingguan->priority }}</td>
                                                    <td>{{ $formPs1PanelTmDuaMingguan->date_generate }}</td>
                                                    <td>{{ $formPs1PanelTmDuaMingguan->id }}</td>
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

            {{-- FORM PANEL TM ENAM BULANAN PS 1 --}}
            {{-- <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1PanelTmEnamBulananAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1PanelTmEnamBulanan">Total ({{ $formPs1PanelTmEnamBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1PanelTmEnamBulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>PANEL TM ENAM BULANAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1PanelTmEnamBulananAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1PanelTmEnamBulananTable"
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
                                            @foreach ($formPs1PanelTmEnamBulanans as $formPs1PanelTmEnamBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1PanelTmEnamBulanan->name }}</td>
                                                    <td>{{ $formPs1PanelTmEnamBulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1PanelTmEnamBulanan->priority }}</td>
                                                    <td>{{ $formPs1PanelTmEnamBulanan->date_generate }}</td>
                                                    <td>{{ $formPs1PanelTmEnamBulanan->id }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- FORM PANEL TM TAHUNAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1PanelTmTahunanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1PanelTmTahunan">Total ({{ $formPs1PanelTmTahunans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1PanelTmTahunan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>PANEL TM TAHUNAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1PanelTmTahunanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1PanelTmTahunanTable"
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
                                            @foreach ($formPs1PanelTmTahunans as $formPs1PanelTmTahunan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1PanelTmTahunan->name }}</td>
                                                    <td>{{ $formPs1PanelTmTahunan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1PanelTmTahunan->priority }}</td>
                                                    <td>{{ $formPs1PanelTmTahunan->date_generate }}</td>
                                                    <td>{{ $formPs1PanelTmTahunan->id }}</td>
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

            {{-- FORM MOBILISASI GENSET MOBILE DUA MINGGUAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetMobileDuaMingguanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetMobileDuaMingguan">Total ({{ $formPs1GensetMobileDuaMingguans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetMobileDuaMingguan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>MOBILISASI GENSET MOBILE DUA MINGGUAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetMobileDuaMingguanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetMobileDuaMingguanTable"
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
                                            @foreach ($formPs1GensetMobileDuaMingguans as $formPs1GensetMobileDuaMingguan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1GensetMobileDuaMingguan->name }}</td>
                                                    <td>{{ $formPs1GensetMobileDuaMingguan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1GensetMobileDuaMingguan->priority }}</td>
                                                    <td>{{ $formPs1GensetMobileDuaMingguan->date_generate }}</td>
                                                    <td>{{ $formPs1GensetMobileDuaMingguan->id }}</td>
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

            {{-- FORM  MOBILISASI GENSET MOBILE TIGA BULANAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetMobileTigaBulananAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetMobileTigaBulanan">Total ({{ $formPs1GensetMobileTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetMobileTigaBulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>MOBILISASI GENSET MOBILE TIGA BULANAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetMobileTigaBulananAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetMobileTigaBulananTable"
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
                                            @foreach ($formPs1GensetMobileTigaBulanans as $formPs1GensetMobileTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1GensetMobileTigaBulanan->name }}</td>
                                                    <td>{{ $formPs1GensetMobileTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1GensetMobileTigaBulanan->priority }}</td>
                                                    <td>{{ $formPs1GensetMobileTigaBulanan->date_generate }}</td>
                                                    <td>{{ $formPs1GensetMobileTigaBulanan->id }}</td>
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

            {{-- FORM MOBILISASI GENSET MOBILE ENAM BULANAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetMobileEnamBulananAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetMobileEnamBulanan">Total ({{ $formPs1GensetMobileEnamBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetMobileEnamBulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>MOBILISASI GENSET MOBILE ENAM BULANAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetMobileEnamBulananAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetMobileEnamBulananTable"
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
                                            @foreach ($formPs1GensetMobileEnamBulanans as $formPs1GensetMobileEnamBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1GensetMobileEnamBulanan->name }}</td>
                                                    <td>{{ $formPs1GensetMobileEnamBulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1GensetMobileEnamBulanan->priority }}</td>
                                                    <td>{{ $formPs1GensetMobileEnamBulanan->date_generate }}</td>
                                                    <td>{{ $formPs1GensetMobileEnamBulanan->id }}</td>
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

            {{-- FORM MOBILISASI GENSET MOBILE TAHUNAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetMobileTahunanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetMobileTahunan">Total ({{ $formPs1GensetMobileTahunans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetMobileTahunan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>MOBILISASI GENSET MOBILE TAHUNAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetMobileTahunanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetMobileTahunanTable"
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
                                            @foreach ($formPs1GensetMobileTahunans as $formPs1GensetMobileTahunan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1GensetMobileTahunan->name }}</td>
                                                    <td>{{ $formPs1GensetMobileTahunan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1GensetMobileTahunan->priority }}</td>
                                                    <td>{{ $formPs1GensetMobileTahunan->date_generate }}</td>
                                                    <td>{{ $formPs1GensetMobileTahunan->id }}</td>
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

            {{-- FORM GENSET STANDBY GARDU TEKNIK DUA MINGGUAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetStandbyGarduDuaMingguanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetStandbyGarduTeknikDuaMingguan">Total ({{ $gensetStandbyGarduTeknikDuaMingguans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetStandbyGarduTeknikDuaMingguan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>GENSET STANDBY GARDU TEKNIK DUA MINGGUAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetStandbyGarduDuaMingguanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetStandbyGarduTeknikDuaMingguanTable"
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
                                            @foreach ($gensetStandbyGarduTeknikDuaMingguans as $gensetStandbyGarduTeknikDuaMingguan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikDuaMingguan->name }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikDuaMingguan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikDuaMingguan->priority }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikDuaMingguan->date_generate }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikDuaMingguan->id }}</td>
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

            {{-- FORM GENSET STANDBY GARDU TEKNIK TIGA BULANAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetStandbyGarduTigaBulananAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetStandbyGarduTeknikTigaBulanan">Total ({{ $gensetStandbyGarduTeknikTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetStandbyGarduTeknikTigaBulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>GENSET STANDBY GARDU TEKNIK TIGA BULANAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetStandbyGarduTigaBulananAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetStandbyGarduTeknikTigaBulananTable"
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
                                            @foreach ($gensetStandbyGarduTeknikTigaBulanans as $gensetStandbyGarduTeknikTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikTigaBulanan->name }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikTigaBulanan->priority }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikTigaBulanan->date_generate }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikTigaBulanan->id }}</td>
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

            {{-- FORM GENSET STANDBY GARDU TEKNIK ENAM BULANAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetStandbyGarduEnamBulananAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetStandbyGarduTeknikEnamBulanan">Total ({{ $gensetStandbyGarduTeknikEnamBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetStandbyGarduTeknikEnamBulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>GENSET STANDBY GARDU TEKNIK ENAM BULANAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetStandbyGarduEnamBulananAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetStandbyGarduTeknikEnamBulananTable"
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
                                            @foreach ($gensetStandbyGarduTeknikEnamBulanans as $gensetStandbyGarduTeknikEnamBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikEnamBulanan->name }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikEnamBulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikEnamBulanan->priority }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikEnamBulanan->date_generate }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikEnamBulanan->id }}</td>
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

            {{-- FORM GENSET STANDBY GARDU TEKNIK TAHUNAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetStandbyGarduTahunanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetStandbyGarduTeknikTahunan">Total ({{ $gensetStandbyGarduTeknikTahunans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetStandbyGarduTeknikTahunan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>GENSET STANDBY GARDU TEKNIK TAHUNAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetStandbyGarduTahunanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetStandbyGarduTeknikTahunanTable"
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
                                            @foreach ($gensetStandbyGarduTeknikTahunans as $gensetStandbyGarduTeknikTahunan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikTahunan->name }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikTahunan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikTahunan->priority }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikTahunan->date_generate }}</td>
                                                    <td>{{ $gensetStandbyGarduTeknikTahunan->id }}</td>
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

            {{-- FORM GENSET STANDBY PERKINS 2000KVA NO1 DUA MINGGUAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetStandbyNo1DuaMingguanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetStandbyNo1DuaMingguan">Total ({{ $formPs1GensetStandbyNo1DuaMingguans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetStandbyNo1DuaMingguan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>GENSET STANDBY PERKINS 2000KVA NO1 DUA MINGGUAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetStandbyNo1DuaMingguanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetStandbyNo1DuaMingguanTable"
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
                                            @foreach ($formPs1GensetStandbyNo1DuaMingguans as $formPs1GensetStandbyNo1DuaMingguan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1GensetStandbyNo1DuaMingguan->name }}</td>
                                                    <td>{{ $formPs1GensetStandbyNo1DuaMingguan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1GensetStandbyNo1DuaMingguan->priority }}</td>
                                                    <td>{{ $formPs1GensetStandbyNo1DuaMingguan->date_generate }}</td>
                                                    <td>{{ $formPs1GensetStandbyNo1DuaMingguan->id }}</td>
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

            {{-- FORM GENSET STANDBY PERKINS 2000KVA NO1 & 2 TIGA BULANAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetStandbyTigaBulananAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetStandbyTigaBulanan">Total ({{ $formPs1GensetStandbyTigaBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetStandbyTigaBulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>GENSET STANDBY PERKINS 2000KVA NO1 & 2 TIGA BULANAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetStandbyTigaBulananAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetStandbyTigaBulananTable"
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
                                            @foreach ($formPs1GensetStandbyTigaBulanans as $formPs1GensetStandbyTigaBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1GensetStandbyTigaBulanan->name }}</td>
                                                    <td>{{ $formPs1GensetStandbyTigaBulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1GensetStandbyTigaBulanan->priority }}</td>
                                                    <td>{{ $formPs1GensetStandbyTigaBulanan->date_generate }}</td>
                                                    <td>{{ $formPs1GensetStandbyTigaBulanan->id }}</td>
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

            {{-- FORM GENSET STANDBY PERKINS 2000KVA NO1 & 2 ENAM BULANAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetStandbyEnamBulananAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetStandbyEnamBulanan">Total ({{ $formPs1GensetStandbyEnamBulanans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetStandbyEnamBulanan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>GENSET STANDBY PERKINS 2000KVA NO1 & 2 ENAM BULANAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetStandbyEnamBulananAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetStandbyEnamBulananTable"
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
                                            @foreach ($formPs1GensetStandbyEnamBulanans as $formPs1GensetStandbyEnamBulanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1GensetStandbyEnamBulanan->name }}</td>
                                                    <td>{{ $formPs1GensetStandbyEnamBulanan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1GensetStandbyEnamBulanan->priority }}</td>
                                                    <td>{{ $formPs1GensetStandbyEnamBulanan->date_generate }}</td>
                                                    <td>{{ $formPs1GensetStandbyEnamBulanan->id }}</td>
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

            {{-- FORM GENSET STANDBY PERKINS 2000KVA TAHUNAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetStandbyTahunanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetStandbyTahunan">Total ({{ $formPs1GensetStandbyTahunans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetStandbyTahunan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>GENSET STANDBY PERKINS 2000KVA TAHUNAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetStandbyTahunanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetStandbyTahunanTable"
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
                                            @foreach ($formPs1GensetStandbyTahunans as $formPs1GensetStandbyTahunan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1GensetStandbyTahunan->name }}</td>
                                                    <td>{{ $formPs1GensetStandbyTahunan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1GensetStandbyTahunan->priority }}</td>
                                                    <td>{{ $formPs1GensetStandbyTahunan->date_generate }}</td>
                                                    <td>{{ $formPs1GensetStandbyTahunan->id }}</td>
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

            {{-- FORM CONTROL DESK DUA MINGGUAN PS1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1ControlDeskDuaMingguanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1ControlDeskDuaMingguan">Total ({{ $formPs1ControlDeskDuaMingguans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1ControlDeskDuaMingguan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CONTROL DESK DUA MINGGUAN PS1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1ControlDeskDuaMingguanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1ControlDeskDuaMingguanTable"
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
                                            @foreach ($formPs1ControlDeskDuaMingguans as $formPs1ControlDeskDuaMingguan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1ControlDeskDuaMingguan->name }}</td>
                                                    <td>{{ $formPs1ControlDeskDuaMingguan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1ControlDeskDuaMingguan->priority }}</td>
                                                    <td>{{ $formPs1ControlDeskDuaMingguan->date_generate }}</td>
                                                    <td>{{ $formPs1ControlDeskDuaMingguan->id }}</td>
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

            {{-- FORM CONTROL DESK TAHUNAN PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1ControlDeskTahunanAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1ControlDeskTahunan">Total ({{ $formPs1ControlDeskTahunans->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1ControlDeskTahunan"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CONTROL DESK TAHUNAN PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1ControlDeskTahunanAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1ControlDeskTahunanTable"
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
                                            @foreach ($formPs1ControlDeskTahunans as $formPs1ControlDeskTahunan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1ControlDeskTahunan->name }}</td>
                                                    <td>{{ $formPs1ControlDeskTahunan->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1ControlDeskTahunan->priority }}</td>
                                                    <td>{{ $formPs1ControlDeskTahunan->date_generate }}</td>
                                                    <td>{{ $formPs1ControlDeskTahunan->id }}</td>
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

            {{-- FORM CHECKLIST GENSET MPS1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetHarianAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1ChecklistGenset">Total ({{ $formPs1ChecklistGensets->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1ChecklistGenset"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>CHECKLIST GENSET MPS1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetHarianAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1ChecklistGensetTable"
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
                                            @foreach ($formPs1ChecklistGensets as $formPs1ChecklistGenset)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1ChecklistGenset->name }}</td>
                                                    <td>{{ $formPs1ChecklistGenset->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1ChecklistGenset->priority }}</td>
                                                    <td>{{ $formPs1ChecklistGenset->date_generate }}</td>
                                                    <td>{{ $formPs1ChecklistGenset->id }}</td>
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

            {{-- FORM MOBILISASI GENSET MOBILE PS 1 --}}
            {{-- <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1GensetMobileAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1GensetMobile">Total ({{ $formPs1GensetMobile->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1GensetMobile"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>MOBILISASI GENSET MOBILE PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1GensetMobileAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1GensetMobileTable"
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
                                            @foreach ($formPs1GensetMobiles as $formPs1GensetMobile)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1GensetMobile->name }}</td>
                                                    <td>{{ $formPs1GensetMobile->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1GensetMobile->priority }}</td>
                                                    <td>{{ $formPs1GensetMobile->date_generate }}</td>
                                                    <td>{{ $formPs1GensetMobile->id }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- FORM CHECKLIST HARIAN PANEL PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1PanelHarianAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1PanelHarian">Total ({{ $formPs1PanelHarians->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1PanelHarian"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>FORM CHECKLIST PANEL MV MPS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1PanelHarianAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1PanelHarianTable"
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
                                            @foreach ($formPs1PanelHarians as $formPs1PanelHarian)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1PanelHarian->name }}</td>
                                                    <td>{{ $formPs1PanelHarian->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1PanelHarian->priority }}</td>
                                                    <td>{{ $formPs1PanelHarian->date_generate }}</td>
                                                    <td>{{ $formPs1PanelHarian->id }}</td>
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
            
            {{-- FORM CHECKLIST HARIAN PANEL PS 1 --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#formPs1TestOnloadGensetAccordion"
                                            class="btn btn-md btn-danger float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                            <span id="countFormPs1TestOnloadGenset">Total ({{ $formPs1TestOnloadGensets->count() }})</span>
                                        </a>
                                        <button class="btn btn-md btn-info float-right mr-2" id="printFormPs1TestOnloadGenset"
                                            type="button"><i class="fas fa-eye"></i>
                                            Print Report</button>
                                        <h3>FORM CHECKLIST RUNTEST ONLOAD GENSET PS 1</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="formPs1TestOnloadGensetAccordion" class="panel-collapse collapse">
                                <div class="card-body">
                                    <table style="width: 100%" id="formPs1TestOnloadGensetTable"
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
                                            @foreach ($formPs1TestOnloadGensets as $formPs1TestOnloadGenset)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $formPs1TestOnloadGenset->name }}</td>
                                                    <td>{{ $formPs1TestOnloadGenset->scheduleMaintenance->name ?? 'N/A' }}</td>
                                                    <td>{{ $formPs1TestOnloadGenset->priority }}</td>
                                                    <td>{{ $formPs1TestOnloadGenset->date_generate }}</td>
                                                    <td>{{ $formPs1TestOnloadGenset->id }}</td>
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
        const formPs1PanelAutomationDuaMingguanTable = $('#formPs1PanelAutomationDuaMingguanTable').DataTable(tableConfig);
        const formPs1PanelTrDuaMingguanTable = $('#formPs1PanelTrDuaMingguanTable').DataTable(tableConfig);
        const formPs1PanelTrEnamBulananTable = $('#formPs1PanelTrEnamBulananTable').DataTable(tableConfig);
        const formPs1PanelTrTahunanTable = $('#formPs1PanelTrTahunanTable').DataTable(tableConfig);
        const formPs1PanelTmDuaMingguanTable = $('#formPs1PanelTmDuaMingguanTable').DataTable(tableConfig);
        const formPs1PanelTmEnamBulananTable = $('#formPs1PanelTmEnamBulananTable').DataTable(tableConfig);
        const formPs1PanelTmTahunanTable = $('#formPs1PanelTmTahzunanTable').DataTable(tableConfig);
        const formPs1GensetMobileDuaMingguanTable = $('#formPs1GensetMobileDuaMingguanTable').DataTable(tableConfig);
        const formPs1GensetMobileTigaBulananTable = $('#formPs1GensetMobileTigaBulananTable').DataTable(tableConfig);
        const formPs1GensetMobileEnamBulananTable = $('#formPs1GensetMobileEnamBulananTable').DataTable(tableConfig);
        const formPs1GensetMobileTahunanTable = $('#formPs1GensetMobileTahunanTable').DataTable(tableConfig);
        const formPs1GensetStandbyGarduTeknikDuaMingguanTable = $('#formPs1GensetStandbyGarduTeknikDuaMingguanTable').DataTable(tableConfig);
        const formPs1GensetStandbyGarduTeknikTigaBulananTable = $('#formPs1GensetStandbyGarduTeknikTigaBulananTable').DataTable(tableConfig);
        const formPs1GensetStandbyGarduTeknikEnamBulananTable = $('#formPs1GensetStandbyGarduTeknikEnamBulananTable').DataTable(tableConfig);
        const formPs1GensetStandbyGarduTeknikTahunanTable = $('#formPs1GensetStandbyGarduTeknikTahunanTable').DataTable(tableConfig);
        const formPs1GensetStandbyNo1DuaMingguanTable = $('#formPs1GensetStandbyNo1DuaMingguanTable').DataTable(tableConfig);
        const formPs1GensetStandbyTigaBulananTable = $('#formPs1GensetStandbyTigaBulananTable').DataTable(tableConfig);
        const formPs1GensetStandbyEnamBulananTable = $('#formPs1GensetStandbyEnamBulananTable').DataTable(tableConfig);
        const formPs1GensetStandbyTahunanTable = $('#formPs1GensetStandbyTahunanTable').DataTable(tableConfig);
        const formPs1ControlDeskDuaMingguanTable = $('#formPs1ControlDeskDuaMingguanTable').DataTable(tableConfig);
        const formPs1ControlDeskTahunanTable = $('#formPs1ControlDeskTahunanTable').DataTable(tableConfig);
        const formPs1ChecklistGensetTable = $('#formPs1ChecklistGensetTable').DataTable(tableConfig);
        // const formPs1GensetMobileTable = $('#formPs1GensetMobileTable').DataTable(tableConfig);
        const formPs1PanelHarianTable = $('#formPs1PanelHarianTable').DataTable(tableConfig);
        const formPs1TestOnloadGensetTable = $('#formPs1TestOnloadGensetTable').DataTable(tableConfig);


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
        setupTableRowClickHandler(formPs1PanelAutomationDuaMingguanTable);
        setupTableRowClickHandler(formPs1PanelTrDuaMingguanTable);
        setupTableRowClickHandler(formPs1PanelTrEnamBulananTable );
        setupTableRowClickHandler(formPs1PanelTrTahunanTable );
        setupTableRowClickHandler(formPs1PanelTmDuaMingguanTable); 
        setupTableRowClickHandler(formPs1PanelTmEnamBulananTable); 
        setupTableRowClickHandler(formPs1PanelTmTahunanTable); 
        setupTableRowClickHandler(formPs1GensetMobileDuaMingguanTable); 
        setupTableRowClickHandler(formPs1GensetMobileTigaBulananTable); 
        setupTableRowClickHandler(formPs1GensetMobileEnamBulananTable); 
        setupTableRowClickHandler(formPs1GensetMobileTahunanTable); 
        setupTableRowClickHandler(formPs1GensetStandbyGarduTeknikDuaMingguanTable); 
        setupTableRowClickHandler(formPs1GensetStandbyGarduTeknikTigaBulananTable); 
        setupTableRowClickHandler(formPs1GensetStandbyGarduTeknikEnamBulananTable); 
        setupTableRowClickHandler(formPs1GensetStandbyGarduTeknikTahunanTable); 
        setupTableRowClickHandler(formPs1GensetStandbyNo1DuaMingguanTable); 
        setupTableRowClickHandler(formPs1GensetStandbyTigaBulananTable); 
        setupTableRowClickHandler(formPs1GensetStandbyEnamBulananTable); 
        setupTableRowClickHandler(formPs1GensetStandbyTahunanTable); 
        setupTableRowClickHandler(formPs1ControlDeskDuaMingguanTable); 
        setupTableRowClickHandler(formPs1ControlDeskTahunanTable); 
        setupTableRowClickHandler(formPs1ChecklistGensetTable); 
        // setupTableRowClickHandler(formPs1GensetMobileTable); 
        setupTableRowClickHandler(formPs1PanelHarianTable); 
        setupTableRowClickHandler(formPs1TestOnloadGensetTable); 

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
            printReport("{{ route('report.energy-power-supply.power-station-1.preventive') }}");
        });

        $('#printFormPs1PanelAutomationDuaMingguan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.panel-automation-dua-mingguan') }}");
        });

        $('#printFormPs1PanelTrDuaMingguan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.panel-tr-dua-mingguan') }}");
        });

        $('#printFormPs1PanelTrEnamBulanan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.panel-tr-enam-bulanan') }}");
        });
        
        $('#printFormPs1PanelTrTahunan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.panel-tr-tahunan') }}");
        });

        $('#printFormPs1PanelTmDuaMingguan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.panel-tm-dua-mingguan') }}");
        });

        $('#printFormPs1PanelTmEnamBulanan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.panel-tm-enam-bulanan') }}");
        });

        $('#printFormPs1PanelTmTahunan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.panel-tm-tahunan') }}");
        });

        $('#printFormPs1GensetMobileDuaMingguan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.genset-mobile-dua-mingguan') }}");
        });

        $('#printFormPs1GensetMobileTigaBulanan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.genset-mobile-tiga-bulanan') }}");
        });

        $('#printFormPs1GensetMobileEnamBulanan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.genset-mobile-enam-bulanan') }}");
        });

        $('#printFormPs1GensetMobileTahunan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.genset-mobile-tahunan') }}");
        });

        $('#printFormPs1GensetStandbyGarduTeknikDuaMingguan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.genset-standby-gardu-teknik-dua-mingguan') }}");
        });

        $('#printFormPs1GensetStandbyGarduTeknikTigaBulanan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.genset-standby-gardu-teknik-tiga-bulanan') }}");
        });

        $('#printFormPs1GensetStandbyGarduTeknikEnamBulanan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.genset-standby-gardu-teknik-enam-bulanan') }}");
        });

        $('#printFormPs1GensetStandbyGarduTeknikTahunan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.genset-standby-gardu-teknik-tahunan') }}");
        });

        $('#printFormPs1GensetStandbyNo1DuaMingguan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.genset-standby-no1-dua-mingguan') }}");
        });

        $('#printFormPs1GensetStandbyTigaBulanan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.genset-standby-tiga-bulanan') }}");
        });

        $('#printFormPs1GensetStandbyEnamBulanan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.genset-standby-enam-bulanan') }}");
        });

        $('#printFormPs1GensetStandbyTahunan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.genset-standby-tahunan') }}");
        });

        $('#printFormPs1ControlDeskDuaMingguan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.control-desk-dua-mingguan') }}");
        });

        $('#printFormPs1ControlDeskTahunan').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.control-desk-tahunan') }}");
        });

        $('#printFormPs1ChecklistGenset').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.checklist-genset') }}");
        });

        // $('#formPs1GensetMobileTable').click(function() {
        //     printReport("{{ route('report.energy-power-supply.power-station-1.genset-mobile') }}");
        // });

        $('#printFormPs1PanelHarian').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.panel-harian') }}");
        });

        $('#printFormPs1TestOnloadGenset').click(function() {
            printReport("{{ route('report.energy-power-supply.power-station-1.test-onload-genset') }}");
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
                const url = "{{ route('ps1-work-orders') }}";
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

                //  formPs1PanelAutomationDuaMingguanTable
                $('#countFormPs1PanelAutomationDuaMingguan').text('Total (' + data.data.formPs1PanelAutomationDuaMingguans.length + ')');
                formPs1PanelAutomationDuaMingguanTable.clear().draw();
                data.data.formPs1PanelAutomationDuaMingguans.forEach((value, i) => {
                    let newRow = formPs1PanelAutomationDuaMingguanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1PanelAutomationDuaMingguanTable.draw();
                });

                //  formPs1PanelTrDuaMingguanTable 
                $('#countFormPs1PanelTrDuaMingguan').text('Total (' + data.data.formPs1PanelTrDuaMingguans.length + ')');
                formPs1PanelTrDuaMingguanTable.clear().draw();
                data.data.formPs1PanelTrDuaMingguans.forEach((value, i) => {
                    let newRow = formPs1PanelTrDuaMingguanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1PanelTrDuaMingguanTable.draw();
                });

                //  formPs1PanelTrEnamBulananTable 
                $('#countFormPs1PanelTrEnamBulanan').text('Total (' + data.data.formPs1PanelTrEnamBulanans.length + ')');
                formPs1PanelTrEnamBulananTable.clear().draw();
                data.data.formPs1PanelTrEnamBulanans.forEach((value, i) => {
                    let newRow = formPs1PanelTrEnamBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1PanelTrEnamBulananTable.draw();
                });

                //  formPs1PanelTrTahunanTable 
                $('#countFormPs1PanelTrTahunan').text('Total (' + data.data.formPs1PanelTrTahunans.length + ')');
                formPs1PanelTrTahunanTable.clear().draw();
                data.data.formPs1PanelTrTahunans.forEach((value, i) => {
                    let newRow = formPs1PanelTrTahunanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1PanelTrTahunanTable.draw();
                });
                
                //  formPs1PanelTmDuaMingguanTable 
                $('#countFormPs1PanelTmDuaMingguan').text('Total (' + data.data.formPs1PanelTmDuaMingguans.length + ')');
                formPs1PanelTmDuaMingguanTable.clear().draw();
                data.data.formPs1PanelTmDuaMingguans.forEach((value, i) => {
                    let newRow = formPs1PanelTmDuaMingguanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1PanelTmDuaMingguanTable.draw();
                });

                //  formPs1PanelTmEnamBulananTable 
                // $('#countFormPs1PanelTmEnamBulanan').text('Total (' + data.data.formPs1PanelTmEnamBulanans.length + ')');
                // formPs1PanelTmEnamBulananTable.clear().draw();
                // data.data.formPs1PanelTmEnamBulanans.forEach((value, i) => {
                //     let newRow = formPs1PanelTmEnamBulananTable.row.add([
                //         i + 1,
                //         value.name,
                //         (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                //         value.priority,
                //         value.date_generate,
                //         value.id,
                //     ]);
                //     // Apply the appropriate status class to the row
                //     $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                //     formPs1PanelTmEnamBulananTable.draw();
                // });

                //  formPs1PanelTmTahunanTable 
                $('#countFormPs1PanelTmTahunan').text('Total (' + data.data.formPs1PanelTmTahunans.length + ')');
                formPs1PanelTmTahunanTable.clear().draw();
                data.data.formPs1PanelTmTahunans.forEach((value, i) => {
                    let newRow = formPs1PanelTmTahunanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1PanelTmTahunanTable.draw();
                });

                //  formPs1GensetMobileDuaMingguanTable 
                $('#countFormPs1GensetMobileDuaMingguan').text('Total (' + data.data.formPs1GensetMobileDuaMingguans.length + ')');
                formPs1GensetMobileDuaMingguanTable.clear().draw();
                data.data.formPs1GensetMobileDuaMingguans.forEach((value, i) => {
                    let newRow = formPs1GensetMobileDuaMingguanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1GensetMobileDuaMingguanTable.draw();
                });

                //  formPs1GensetMobileTigaBulananTable 
                $('#countFormPs1GensetMobileTigaBulanan').text('Total (' + data.data.formPs1GensetMobileTigaBulanans.length + ')');
                formPs1GensetMobileTigaBulananTable.clear().draw();
                data.data.formPs1GensetMobileTigaBulanans.forEach((value, i) => {
                    let newRow = formPs1GensetMobileTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1GensetMobileTigaBulananTable.draw();
                });

                //  formPs1GensetMobileEnamBulananTable 
                $('#countFormPs1GensetMobileEnamBulanan').text('Total (' + data.data.formPs1GensetMobileEnamBulanans.length + ')');
                formPs1GensetMobileEnamBulananTable.clear().draw();
                data.data.formPs1GensetMobileEnamBulanans.forEach((value, i) => {
                    let newRow = formPs1GensetMobileEnamBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1GensetMobileEnamBulananTable.draw();
                });

                //  formPs1GensetMobileTahunanTable 
                $('#countFormPs1GensetMobileTahunan').text('Total (' + data.data.formPs1GensetMobileTahunans.length + ')');
                formPs1GensetMobileTahunanTable.clear().draw();
                data.data.formPs1GensetMobileTahunans.forEach((value, i) => {
                    let newRow = formPs1GensetMobileTahunanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1GensetMobileTahunanTable.draw();
                });

                //  formPs1GensetStandbyGarduTeknikDuaMingguanTable 
                $('#countFormPs1GensetStandbyGarduTeknikDuaMingguan').text('Total (' + data.data.gensetStandbyGarduTeknikDuaMingguans.length + ')');
                formPs1GensetStandbyGarduTeknikDuaMingguanTable.clear().draw();
                data.data.gensetStandbyGarduTeknikDuaMingguans.forEach((value, i) => {
                    let newRow = formPs1GensetStandbyGarduTeknikDuaMingguanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1GensetStandbyGarduTeknikDuaMingguanTable.draw();
                });

                //  formPs1GensetStandbyGarduTeknikTahunanTable 
                $('#countFormPs1GensetStandbyGarduTeknikTigaBulanan').text('Total (' + data.data.gensetStandbyGarduTeknikTigaBulanans.length + ')');
                formPs1GensetStandbyGarduTeknikTahunanTable.clear().draw();
                data.data.gensetStandbyGarduTeknikTigaBulanans.forEach((value, i) => {
                    let newRow = formPs1GensetStandbyGarduTeknikTahunanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1GensetStandbyGarduTeknikTahunanTable.draw();
                });

                //  formPs1GensetStandbyGarduTeknikEnamBulananTable 
                $('#countFormPs1GensetStandbyGarduTeknikEnamBulanan').text('Total (' + data.data.gensetStandbyGarduTeknikEnamBulanans.length + ')');
                formPs1GensetStandbyGarduTeknikEnamBulananTable.clear().draw();
                data.data.gensetStandbyGarduTeknikEnamBulanans.forEach((value, i) => {
                    let newRow = formPs1GensetStandbyGarduTeknikEnamBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1GensetStandbyGarduTeknikEnamBulananTable.draw();
                });

                //  formPs1GensetStandbyGarduTeknikTahunanTable 
                $('#countFormPs1GensetStandbyGarduTeknikTahunan').text('Total (' + data.data.gensetStandbyGarduTeknikTahunans.length + ')');
                formPs1GensetStandbyGarduTeknikTahunanTable.clear().draw();
                data.data.gensetStandbyGarduTeknikTahunans.forEach((value, i) => {
                    let newRow = formPs1GensetStandbyGarduTeknikTahunanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1GensetStandbyGarduTeknikTahunanTable.draw();
                });

                //  formPs1GensetStandbyNo1DuaMingguanTable 
                $('#countFormPs1GensetStandbyNo1DuaMingguan').text('Total (' + data.data.formPs1GensetStandbyNo1DuaMingguans.length + ')');
                formPs1GensetStandbyNo1DuaMingguanTable.clear().draw();
                data.data.formPs1GensetStandbyNo1DuaMingguans.forEach((value, i) => {
                    let newRow = formPs1GensetStandbyNo1DuaMingguanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1GensetStandbyNo1DuaMingguanTable.draw();
                });

                //  formPs1GensetStandbyTigaBulananTable 
                $('#countFormPs1GensetStandbyTigaBulanan').text('Total (' + data.data.formPs1GensetStandbyTigaBulanans.length + ')');
                formPs1GensetStandbyTigaBulananTable.clear().draw();
                data.data.formPs1GensetStandbyTigaBulanans.forEach((value, i) => {
                    let newRow = formPs1GensetStandbyTigaBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1GensetStandbyTigaBulananTable.draw();
                });

                //  formPs1GensetStandbyEnamBulananTable 
                $('#countFormPs1GensetStandbyEnamBulanan').text('Total (' + data.data.formPs1GensetStandbyEnamBulanans.length + ')');
                formPs1GensetStandbyEnamBulananTable.clear().draw();
                data.data.formPs1GensetStandbyEnamBulanans.forEach((value, i) => {
                    let newRow = formPs1GensetStandbyEnamBulananTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1GensetStandbyEnamBulananTable.draw();
                });

                //  formPs1GensetStandbyTahunanTable 
                $('#countFormPs1GensetStandbyTahunan').text('Total (' + data.data.formPs1GensetStandbyTahunans.length + ')');
                formPs1GensetStandbyTahunanTable.clear().draw();
                data.data.formPs1GensetStandbyTahunans.forEach((value, i) => {
                    let newRow = formPs1GensetStandbyTahunanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1GensetStandbyTahunanTable.draw();
                });

                //  formPs1ControlDeskTahunanTable 
                $('#countFormPs1ControlDeskDuaMingguan').text('Total (' + data.data.formPs1ControlDeskDuaMingguans.length + ')');
                formPs1ControlDeskDuaMingguanTable.clear().draw();
                data.data.formPs1ControlDeskDuaMingguans.forEach((value, i) => {
                    let newRow = formPs1ControlDeskDuaMingguanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1ControlDeskDuaMingguanTable.draw();
                });

                //  formPs1ControlDeskTahunanTable 
                $('#countFormPs1ControlDeskTahunan').text('Total (' + data.data.formPs1ControlDeskTahunans.length + ')');
                formPs1ControlDeskTahunanTable.clear().draw();
                data.data.formPs1ControlDeskTahunans.forEach((value, i) => {
                    let newRow = formPs1ControlDeskTahunanTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1ControlDeskTahunanTable.draw();
                });

                //  Form Checklist Genset MPS1 
                $('#countFormPs1ChecklistGenset').text('Total (' + data.data.formPs1ChecklistGensets.length + ')');
                formPs1ChecklistGensetTable.clear().draw();
                data.data.formPs1ChecklistGensets.forEach((value, i) => {
                    let newRow = formPs1ChecklistGensetTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1ChecklistGensetTable.draw();
                });

                //  formPs1PanelHarianTable 
                $('#countFormPs1PanelHarian').text('Total (' + data.data.formPs1PanelHarians.length + ')');
                formPs1PanelHarianTable.clear().draw();
                data.data.formPs1PanelHarians.forEach((value, i) => {
                    let newRow = formPs1PanelHarianTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1PanelHarianTable.draw();
                });

                //  formPs1TestOnloadGensetTable 
                $('#countFormPs1TestOnloadGenset').text('Total (' + data.data.formPs1TestOnloadGensets.length + ')');
                formPs1TestOnloadGensetTable.clear().draw();
                data.data.formPs1TestOnloadGensets.forEach((value, i) => {
                    let newRow = formPs1TestOnloadGensetTable.row.add([
                        i + 1,
                        value.name,
                        (value.schedule_maintenance) ? value.schedule_maintenance.name : 'N/A',
                        value.priority,
                        value.date_generate,
                        value.id,
                    ]);
                    // Apply the appropriate status class to the row
                    $(newRow.node()).addClass(getStatus(value.work_order_status.name));
                    formPs1TestOnloadGensetTable.draw();
                });

                $('#loading').addClass('d-none');
            } catch (error) {
                $('#loading').addClass('d-none');
                $.alert(error.message);
                console.log(error);
            }

        }
    </script>
@endsection
