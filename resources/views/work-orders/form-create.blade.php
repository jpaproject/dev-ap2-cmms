@extends('layouts.app')

@section('breadcumb')
<li class="breadcrumb-item"><a href="{{ route('work-orders.index') }}">Work Order</a></li>
<li class="breadcrumb-item active">Add</li>
@endsection

@section('style')
<style>
    .document {
        width: 100%;
        height: 25rem;
        overflow-y: scroll;
        padding-right: .5rem;
        margin-bottom: 1rem;
    }

    .mycheckbox {
        margin-top: 5px;
        margin-left: 5px;
    }

    .mycheckboxdiv {
        text-align: right;
    }

    head {
        text-align: center;
    }

    input.largerCheckbox {
        width: 20px;
        height: 20px;
    }
    input[type=radio] {
    width: 20px;
        height: 20px;
}
</style>
@endsection

@section('content')
<section class="content">

    <table class="table table-bordered head table-responsive w-100 d-block d-md-table">
        <thead class="thead-light">
            <tr>
                <th class="head" scope="col">WORKING ORDER NUMBER</th>
                <th class="head" scope="col">LOCATION</th>
                <th class="head" scope="col">DATE</th>
                <th class="head" scope="col">MONTH</th>
                <th class="head" scope="col">YEAR</th>
                <th class="head" scope="col">SUPERVISED BY</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="head">WO</th>
                <td class="head">NP</td>
                <td class="head">18</td>
                <td class="head">JAN</td>
                <td class="head">2023</td>
                <td class="head">ALAN</td>
            </tr>
        </tbody>
    </table>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">A. GENERAL PREPARE CHECK</h3>
                    </div>

                    <form method="POST" action="{{ route('work-orders.store') }}" enctype="multipart/form-data"
                        id="form">
                        @csrf

                        <div class="card-body">

                            @include('components.form-message')
                            <div class="row">
                                <div class="col-12 col-lg-3 col-md-6">
                                    <table class="w-100">
                                        <tr>
                                            <td class="w-75">Drawing</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox" name="drawing">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-75">Manual Book</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox" name="manual-book">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-75">Tool Set</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox" name="tool-set">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-75">Cleaning Tools</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox"
                                                    name="cleaning-tools">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6">
                                    <table class="w-100">
                                        <tr>
                                            <td class="w-75">Supporting Cables</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox"
                                                    name="supporting-cables">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-75">Secondary Injector</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox"
                                                    name="seconddary-injector">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-75">Voltage Meter</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox" name="voltage-meter">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-75">Ampere Meter</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox" name="ampere-meter">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6">
                                    <table class="w-100">
                                        <tr>
                                            <td class="w-75">Safety Vest</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox" name="safety-vest">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-75">Safety Helmet</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox" name="safety-helmet">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-75">Safety Shoes</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox" name="safety-shoes">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-75">Electrical Gloves</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox"
                                                    name="electrical-gloves">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6">
                                    <table class="w-100">
                                        <tr>
                                            <td class="w-75">Handy Talkie</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox" name="handy-talkie">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-75">Working Permit</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox"
                                                    name="working-permit">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-75">Operational Procedure</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox"
                                                    name="operational-procedure">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-75">Mask</td>
                                            <td>
                                                <input type="checkbox" class="flat largerCheckbox" name="mask">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">B. VISUAL CHECKLIST</h3>
                    </div>

                    <form method="POST" action="{{ route('work-orders.store') }}" enctype="multipart/form-data"
                        id="form">
                        @csrf

                        <div class="card-body">

                            @include('components.form-message')
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <table class="w-100">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>OK</td>
                                            <td>NOT</td>
                                        </tr>
                                        <tr>
                                            <td>Relay Condition</td>
                                            <td></td>
                                            <td>
                                                <input type="radio" id="ok" name="relay-condition" value="OK">
                                            </td>
                                            <td>
                                                <input type="radio" id="not" name="relay-condition" value="NOT">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Relay Condition</td>
                                            <td></td>
                                            <td>
                                                <input type="radio" id="ok" name="relay-condition" value="OK">
                                            </td>
                                            <td>
                                                <input type="radio" id="ok" name="relay-condition" value="OK">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Wires Condition</td>
                                            <td></td>
                                            <td>
                                                <input type="radio" id="ok" name="wires-condition" value="OK">
                                            </td>
                                            <td>
                                                <input type="radio" id="not" name="wires-condition" value="NOT">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Terminal Condition</td>
                                            <td></td>
                                            <td>
                                                <input type="radio" id="ok" name="terminal-condition" value="OK">
                                            </td>
                                            <td>
                                                <input type="radio" id="not" name="terminal-condition" value="NOT">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Type Of Connection CT:</td>
                                            <td>3 | SUM</td>
                                            <td>
                                                <input type="radio" id="ok" name="3" value="OK">
                                            </td>
                                            <td>
                                                <input type="radio" id="ok" name="3" value="OK">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>| 0</td>
                                            <td>
                                                <input type="radio" id="ok" name="0" value="OK">
                                            </td>
                                            <td>
                                                <input type="radio" id="not" name="0" value="NOT">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Class CT</td>
                                            <td></td>
                                            <td colspan="2">
                                                <input type="text"
                                                    class="form-control @error('class-ct') is-invalid @enderror"
                                                    id="class-ct" name=" class-ct" value="{{ old('class-ct') }}"
                                                    placeholder="Enter Class CT">

                                                @error('class-ct')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Burden CT</td>
                                            <td></td>
                                            <td colspan="2">
                                                <input type="text"
                                                    class=" form-control @error('burden-ct') is-invalid @enderror"
                                                    id="burden-ct" name="Burden-ct" value="{{ old('burden-ct') }}"
                                                    placeholder="Enter Burden CT">

                                                @error('burden-ct')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ratio CT</td>
                                            <td></td>
                                            <td colspan="2">
                                                <input type="text"
                                                    class="form-control @error('ratio-ct') is-invalid @enderror"
                                                    id="ratio-ct" name="ratio-ct" value="{{ old('ratio-ct') }}"
                                                    placeholder="Enter Ratio CT">

                                                @error('ratio-ct')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">C. TRANSFORM WARNING SYSTEM</h3>
                    </div>

                    <form method="POST" action="{{ route('work-orders.store') }}" enctype="multipart/form-data"
                        id="form">
                        @csrf

                        <div class="card-body">

                            @include('components.form-message')

                            <div class="form-group row">
                                <label for="type-protection" class="col-md-3 col-sm-3">Type of Protection</label>
                                <input type="text"
                                    class="col-md-6 col-sm-6 form-control @error('type-protection') is-invalid @enderror"
                                    id="type-protection" name="type-protection" value="{{ old('type-protection') }}"
                                    placeholder="Enter Type Of Protection">

                                @error('type-protection')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <table class="w-100">
                                        <tr>
                                            <td></td>
                                            <td>OK</td>
                                            <td>NOT</td>
                                        </tr>
                                        <tr>
                                            <td>Wires Condition</td>
                                            <td>
                                                <input type="radio" id="ok" name="wires-condition" value="OK">
                                            </td>
                                            <td>
                                                <input type="radio" id="not" name="wires-condition" value="NOT">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Setting Check</td>
                                            <td>
                                                <input type="radio" id="ok" name="setting-check" value="OK">
                                            </td>
                                            <td>
                                                <input type="radio" id="not" name="setting-check" value="NOT">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Temperature</td>
                                            <td>
                                                <input type="radio" id="ok" name="temperature" value="OK">
                                            </td>
                                            <td>
                                                <input type="radio" id="not" name="temperature" value="NOT">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pressure</td>
                                            <td>
                                                <input type="radio" id="ok" name="pressure" value="OK">
                                            </td>
                                            <td>
                                                <input type="radio" id="not" name="pressure" value="NOT">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">D. INPUT OUTPUT LIST TEST</h3>
                    </div>

                    <form method="POST" action="{{ route('work-orders.store') }}" enctype="multipart/form-data"
                        id="form">
                        @csrf

                        <div class="card-body">

                            @include('components.form-message')
                            <div class="form-group row">
                                <label class="col-md-3 col-sm-3 col-lg-2 control-label">Indications RCMS</label>
                                <label class="col-md-3 col-sm-3 col-lg-1 control-label"><small>NOTE:</small></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="checkbox">

                                        <textarea name="indications-rcms"
                                            class="form-control @error('indications-rcms') is-invalid @enderror"
                                            id="indications-rcms" cols="30" rows="3"
                                            placeholder="Enter Indications RCMS">1. &#13;&#10;2.</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-sm-3 col-lg-2 control-label">Scada</label>
                                <label class="col-md-3 col-sm-3 col-lg-1 control-label"><small>NOTE:</small></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="checkbox">

                                        <textarea name="scada" class="form-control @error('scada') is-invalid @enderror"
                                            id="scada" cols="30" rows="3"
                                            placeholder="Enter Scada">1. &#13;&#10;2.</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-sm-3 col-lg-2 control-label">Remote Orders RCMS</label>
                                <label class="col-md-3 col-sm-3 col-lg-1 control-label"><small>NOTE:</small></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="checkbox">

                                        <textarea name="remote-orders-rcms"
                                            class="form-control @error('remote-orders-rcms') is-invalid @enderror"
                                            id="remote-orders-rcms" cols="30" rows="3"
                                            placeholder="Enter Remote Orders RCMS">1. &#13;&#10;2.</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-sm-3 col-lg-2 control-label">Scada</label>
                                <label class="col-md-3 col-sm-3 col-lg-1 control-label"><small>NOTE:</small></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="checkbox">

                                        <textarea name="scada" class="form-control @error('scada') is-invalid @enderror"
                                            id="scada" cols="30" rows="3"
                                            placeholder="Enter Scada">1. &#13;&#10;2.</textarea>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">E. FINALE CHECK</h3>
                    </div>

                    <form method="POST" action="{{ route('work-orders.store') }}" enctype="multipart/form-data"
                        id="form">
                        @csrf

                        <div class="card-body">

                            @include('components.form-message')
                            <table class="w-100">
                                <tr>
                                    <td></td>
                                    <td>OK</td>
                                    <td>Remarks</td>
                                </tr>
                                <tr>
                                    <td>Backup Setting Relay To PC</td>
                                    <td>
                                        <input type="checkbox" data-ng-model="rememberMe" class="pull-right mycheckbox largerCheckbox"
                                            name="backup-box">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control @error('backup') is-invalid @enderror"
                                            id="backup" name="backup" value="{{ old('backup') }}"
                                            placeholder="Enter Backup Setting Relay To PC">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Check CT Inject Condition</td>
                                    <td>
                                        <input type="checkbox" data-ng-model="rememberMe" class="pull-right mycheckbox largerCheckbox"
                                            name="check-box">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control @error('check') is-invalid @enderror"
                                            id="check" name="check" value="{{ old('check') }}"
                                            placeholder="Enter Check CT Inject Condition">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tightening Connection</td>
                                    <td>
                                        <input type="checkbox" data-ng-model="rememberMe" class="pull-right mycheckbox largerCheckbox"
                                            name="tightening-box">
                                    </td>
                                    <td>
                                        <input type="text"
                                            class="form-control @error('tightening') is-invalid @enderror"
                                            id="tightening" name="tightening" value="{{ old('tightening') }}"
                                            placeholder="Enter Tightening Connection">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cleaning Working Area</td>
                                    <td>
                                        <input type="checkbox" data-ng-model="rememberMe" class="pull-right mycheckbox largerCheckbox"
                                            name="cleaning-box">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control @error('cleaning') is-invalid @enderror"
                                            id="cleaning" name="cleaning" value="{{ old('cleaning') }}"
                                            placeholder="Enter Cleaning Working Area">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-footer">Add</button>
                <a href="{{ route('work-orders.index') }}" class="btn btn-secondary btn-footer">Back</a>
            </div>
        </div>

    </div>
</section>
@endsection

@section('script')
<script>
    var user_technical_table;
    var user_technicals;
    var id_user_technicals = [];
    var id_tasks = [];
    var id_task_groups = [];
    var user_technical_group_table;
    var user_technical_groups;
    var id_user_technical_groups = [];
    var reference_document_table;

    $(document).ready(function () {
        user_technical_table = $("#userTechnicalTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "paging": false,
            "info": false,
            "ordering": false
        });

        user_technical_group_table = $("#userTechnicalGroupTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "paging": false,
            "info": false,
            "ordering": false
        });

        reference_document_table = $("#referenceDocumentTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "paging": false,
            "info": false,
            "ordering": false
        });

        oldValueReferenceDocuments();

        @if (old('task_groups'))
            id_task_groups = @json(old('task_groups'));
            taskGroupOption(id_task_groups);
        @else
            taskGroupOption([]);
        @endif

        @if (old('tasks'))
            id_tasks = @json(old('tasks'));
            taskOption(id_tasks);
        @else
            taskOption([]);
        @endif

        @if(old('user_technicals'))
           oldUserTechnicals(@json(old('user_technicals')))
        @else
            $.ajax({
                type: 'GET',
                url: '/api/user-technicals',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {

                },
                success: function (data) {
                    user_technicals = data.data
                    user_technicals.forEach(data => {
                        var option = `<option value="${data.username}">${data.email}</option>`;
                        $( "#user_technical" ).append( option );
                    });
                },
                error: function (data) {
                    $.alert('Failed!');
                    console.log(data);
                }
            });
        @endif

        @if(old('user_technical_groups'))
           oldUserTechnicalGroups(@json(old('user_technical_groups')))
        @else
            $.ajax({
                type: 'GET',
                url: '/api/user-technical-groups',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {

                },
                success: function (data) {
                    user_technical_groups = data.data
                    user_technical_groups.forEach(data => {
                        var option = `<option value="${data.name}">${data.users}</option>`;
                        $( "#user_technical_group" ).append( option );
                    });
                },
                error: function (data) {
                    $.alert('Failed!');
                    console.log(data);
                }
            });
        @endif
    })

    async function oldUserTechnicals(ids) {
        var old_user_technical = ids;
        let myPromise = new Promise(function(myResolve, myReject) {
            old_user_technical.forEach(id => {
                $.ajax({
                    type: 'POST',
                    url: '/api/user-technical',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "id": id,
                    },
                    async: false,
                    success: function (data) {
                        console.log(data);
                        // alert('success')
                        id_user_technicals.push(data.data.id);
                        var img = `<img src="{{asset('img/user-technicals/')}}/${data.data.avatar??'user.png'}"
width="40px" class="img-circle">`;
var action = `<button type="button" onclick="deleteUser('${data.data.id}')" class="btn btn-md btn-danger"><i
        class="fas fa-times"></i></button>`;
user_technical_table.row.add([
img,
data.data.username,
data.data.phone,
action,
]);

user_technical_table.draw();
},
error: function (data) {
$.alert(data.responseJSON.message);
console.log(data);
}
});
})

myResolve('i Love You 3000')
});

console.log(await myPromise);

userTechnicalOption();
}

async function oldUserTechnicalGroups(ids) {
var old_user_technical_group = ids;
let myPromise = new Promise(function(myResolve, myReject) {
old_user_technical_group.forEach(id => {
$.ajax({
type: 'POST',
url: '/api/user-technical-group',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {
"id": id,
},
async: false,
success: function (data) {
console.log(data);
// alert('success')
id_user_technical_groups.push(data.data.id);
var btn = `<button type="button"
    onclick="detailModal('Detail User Technical', '/user-technical-groups/' + ${data.data.id}, 'xl')"
    class="btn btn-md btn-primary"><i class="ion ion-eye"></i> Show</button>`;
var action = `<button type="button" onclick="deleteUserGroup('${data.data.id}')" class="btn btn-md btn-danger"><i
        class="fas fa-times"></i></button>`;
user_technical_group_table.row.add([
data.data.name,
btn,
action,
]);

user_technical_group_table.draw();
},
error: function (data) {
$.alert(data.responseJSON.message);
console.log(data);
}
});
})

myResolve('i Love You 3000')
});

console.log(await myPromise);

userTechnicalGroupOption();
}

async function userTechnicalOption() {
let myPromise2 = new Promise(function(myResolve, myReject) {
var node= document.getElementById("user_technical");
while (node.firstChild) {
console.log('remove');
node.removeChild(node.firstChild);
}
myResolve('i Love You 2000')
});
console.log(await myPromise2);

$.ajax({
type: 'GET',
url: '/api/user-technicals',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {

},
success: function (data) {
user_technicals = data.data
user_technicals.forEach(data => {
if (!id_user_technicals.includes(data.id)) {
console.log('add');
var option = `<option value="${data.username}">${data.email}</option>`;
$( "#user_technical" ).append( option );
}
});

id_user_technicals.forEach((id, i) => {
var tag = `<input type="text" name="user_technicals[${i}]" value="${id}" class="d-none user_technicals" />`
$( "#form" ).append( tag );
});
},
error: function (data) {
$.alert('Failed!');
console.log(data);
}
});
$('#search_user').val('')
}

async function userTechnicalGroupOption() {
let myPromise2 = new Promise(function(myResolve, myReject) {
var node= document.getElementById("user_technical_group");
while (node.firstChild) {
console.log('remove');
node.removeChild(node.firstChild);
}
myResolve('i Love You 2000')
});
console.log(await myPromise2);

$.ajax({
type: 'GET',
url: '/api/user-technical-groups',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {

},
success: function (data) {
user_technical_groups = data.data
user_technical_groups.forEach(data => {
if (!id_user_technical_groups.includes(data.id)) {
console.log('add');
var option = `<option value="${data.name}">${data.users}</option>`;
$( "#user_technical_group" ).append( option );
}
});

id_user_technical_groups.forEach((id, i) => {
var tag = `<input type="text" name="user_technical_groups[${i}]" value="${id}" class="d-none user_technical_groups" />`
$( "#form" ).append( tag );
});
},
error: function (data) {
$.alert('Failed!');
console.log(data);
}
});
$('#search_user_group').val('')
}

function createTask() {
$.confirm({
title: 'Create Task',
content: 'URL:/tasks/create-modal',
columnClass: 'medium',
buttons: {
formSubmit: {
text: 'Submit',
btnClass: 'btn-blue',
action: function () {
let task, time_estimate, description;
task = this.$content.find('#task').val();
time_estimate = this.$content.find('#time_estimate').val();
description = this.$content.find('#description').val();

$.ajax({
type: 'POST',
url: '/tasks',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {
"_token": "{{ csrf_token() }}",
"task": task,
"time_estimate": time_estimate,
"description": description,
"from": 'work_order'
},
success: function (data) {
id_tasks = [];
$.each($(".tasks option:selected"), function(){
id_tasks.push($(this).val());
});
taskOption(id_tasks)
},
error: function (data) {
$.alert(data.responseJSON.message);
console.log(data);
}
});
}
},
cancel: function () {
//close
},
},
onContentReady: function () {
// bind to events
var jc = this;
this.$content.find('form').on('submit', function (e) {
// if the user submits the form by pressing enter in the field.
e.preventDefault();
jc.$$formSubmit.trigger('click'); // reference the button and click it
});
}
});
}

async function taskOption(taskSelected) {
$( 'select[name="tasks[]"]' ).text('');
$.ajax({
type: 'GET',
url: '/api/tasks',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {

},
success: function (data) {
tasks = data.data
tasks.forEach(data => {
var option;
if (taskSelected.includes(data.id.toString())) {
option = `<option value="${data.id}" selected>${data.task}</option>`;
} else {
option = `<option value="${data.id}">${data.task}</option>`;
}
$( 'select[name="tasks[]"]' ).append( option );
});
},
error: function (data) {
$.alert('Failed!');
console.log(data);
}
});
}

function createTaskGroup() {
$.confirm({
title: 'Create Task Group',
content: 'URL:/task-groups/create-modal',
columnClass: 'medium',
buttons: {
formSubmit: {
text: 'Submit',
btnClass: 'btn-blue',
action: function () {
let name, description, tasks;
name = this.$content.find('#name').val();
description = this.$content.find('#description').val();
tasks = this.$content.find('#e1').val();

$.ajax({
type: 'POST',
url: '/task-groups',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {
"_token": "{{ csrf_token() }}",
"name": name,
"description": description,
"tasks": tasks,
"from": 'work_order'
},
success: function (data) {
id_task_groups = [];
$.each($(".task-groups option:selected"), function(){
id_task_groups.push($(this).val());
});
taskGroupOption(id_task_groups);
},
error: function (data) {
$.alert(data.responseJSON.message);
console.log(data);
}
});
}
},
cancel: function () {
//close
},
},
onContentReady: function () {
// bind to events
var jc = this;
this.$content.find('form').on('submit', function (e) {
// if the user submits the form by pressing enter in the field.
e.preventDefault();
jc.$$formSubmit.trigger('click'); // reference the button and click it
});
}
});
}

async function taskGroupOption(taskGroupSelected) {
$( 'select[name="task_groups[]"]' ).text('');
$.ajax({
type: 'GET',
url: '/api/task-groups',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {

},
success: function (data) {
task_groups = data.data
task_groups.forEach(data => {
var option;
if (taskGroupSelected.includes(data.id.toString())) {
option = `<option value="${data.id}" selected>${data.name}</option>`;
} else {
option = `<option value="${data.id}">${data.name}</option>`;
}
$( 'select[name="task_groups[]"]' ).append( option );
});
},
error: function (data) {
$.alert('Failed!');
console.log(data);
}
});
}

function createUser() {
$.confirm({
title: 'Create User',
content: 'URL:/user-technicals/create-modal',
columnClass: 'medium',
buttons: {
formSubmit: {
text: 'Submit',
btnClass: 'btn-blue',
action: function () {
let name, username, phone, whatsapp, address, email, password;
name = this.$content.find('#name').val();
username = this.$content.find('#username').val();
phone = this.$content.find('#phone').val();
whatsapp = this.$content.find('#whatsapp').val();
address = this.$content.find('#address').val();
email = this.$content.find('#email').val();
password = this.$content.find('#password').val();

$.ajax({
type: 'POST',
url: '/user-technicals',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {
"_token": "{{ csrf_token() }}",
"name": name,
"username": username,
"phone": phone,
"whatsapp": whatsapp,
"address": address,
"email": email,
"password": password,
"from": 'work_order'
},
async: false,
success: function (data) {
console.log(data);
if (data.status == 200) {
userTechnicalOption();
} else {
let msg = data.msg;
$.alert(msg);
return false;
}
},
error: function (data) {
$.alert(data.responseJSON.message);
console.log(data);
}
});
}
},
cancel: function () {
//close
},
},
onContentReady: function () {
// bind to events
var jc = this;
this.$content.find('form').on('submit', function (e) {
// if the user submits the form by pressing enter in the field.
e.preventDefault();
jc.$$formSubmit.trigger('click'); // reference the button and click it
});
}
});
}

function createUserGroup() {
$.confirm({
title: 'Create User Group',
content: 'URL:/user-technical-groups/create-modal',
columnClass: 'medium',
buttons: {
formSubmit: {
text: 'Submit',
btnClass: 'btn-blue',
action: function () {
let name, description, tasks;
name = this.$content.find('#name').val();
description = this.$content.find('#description').val();
users_technicals = this.$content.find('#e1').val();

$.ajax({
type: 'POST',
url: '/user-technical-groups',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {
"_token": "{{ csrf_token() }}",
"name": name,
"description": description,
"user_technicals": users_technicals,
"from": 'work_order'
},
success: function (data) {
console.log(data);
if (data.status == 200) {
userTechnicalGroupOption()
} else {
let msg = data.msg;
$.alert(msg);
return false;
}
},
error: function (data) {
$.alert(data.responseJSON.message);
console.log(data);
}
});
}
},
cancel: function () {
//close
},
},
onContentReady: function () {
// bind to events
var jc = this;
this.$content.find('form').on('submit', function (e) {
// if the user submits the form by pressing enter in the field.
e.preventDefault();
jc.$$formSubmit.trigger('click'); // reference the button and click it
});
}
});
}

function addUserTechnical() {
let username = $('#search_user').val();

async function addUserToTable() {
let myPromise = new Promise(function(myResolve, myReject) {

$.ajax({
type: 'POST',
url: '/api/user-technical',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {
"username": username,
},
async: false,
success: function (data) {
console.log(data);
if (data.data != null) {
var index = id_user_technicals.indexOf(parseInt(data.data.id));
if (index !== -1) {
$.alert("User has been added");
} else {
id_user_technicals.push(data.data.id);
var img = `<img src="{{asset('img/user-technicals/')}}/${data.data.avatar??'user.png'}" width="40px"
    class="img-circle">`;
var action = `<button type="button" onclick="deleteUser('${data.data.id}')" class="btn btn-md btn-danger"><i
        class="fas fa-times"></i></button>`;
user_technical_table.row.add([
img,
data.data.username,
data.data.phone,
action,
]);

user_technical_table.draw();
}
} else {
$.confirm({
title: 'User Not Found!',
content: 'Do you want to create a new user?',
buttons: {
yes: function () {
$.confirm({
title: 'Create User',
content: 'URL:/user-technicals/create-modal',
columnClass: 'medium',
buttons: {
formSubmit: {
text: 'Submit',
btnClass: 'btn-blue',
action: function () {
let name, username, phone, whatsapp, address, email, password;
name = this.$content.find('#name').val();
username = this.$content.find('#username').val();
phone = this.$content.find('#phone').val();
whatsapp = this.$content.find('#whatsapp').val();
address = this.$content.find('#address').val();
email = this.$content.find('#email').val();
password = this.$content.find('#password').val();

$.ajax({
type: 'POST',
url: '/user-technicals',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {
"_token": "{{ csrf_token() }}",
"name": name,
"username": username,
"phone": phone,
"whatsapp": whatsapp,
"address": address,
"email": email,
"password": password,
"from": 'work_order'
},
async: false,
success: function (data) {
console.log(data);
if (data.status == 200) {
var index = id_user_technicals.indexOf(parseInt(data.data.id));
if (index !== -1) {
$.alert("User has been added");
} else {
id_user_technicals.push(data.data.id);
var img = `<img src="{{asset('img/user-technicals/')}}/${data.data.avatar??'user.png'}" width="40px"
    class="img-circle">`;
var action = `<button type="button" onclick="deleteUser('${data.data.id}')" class="btn btn-md btn-danger"><i
        class="fas fa-times"></i></button>`;
user_technical_table.row.add([
img,
data.data.username,
data.data.phone,
action,
]);

user_technical_table.draw();
userTechnicalOption();
}
} else {
let msg = data.msg;
$.alert(msg);
return false;
}
},
error: function (data) {
$.alert(data.responseJSON.message);
console.log(data);
}
});
}
},
cancel: function () {
//close
},
},
onContentReady: function () {
// bind to events
var jc = this;
this.$content.find('form').on('submit', function (e) {
// if the user submits the form by pressing enter in the field.
e.preventDefault();
jc.$$formSubmit.trigger('click'); // reference the button and click it
});
}
});
},
no: function () {

},
}
});
}
},
error: function (data) {
$.alert(data.responseJSON.message);
console.log(data);
}
});

myResolve('i Love You 3000')
});

console.log(await myPromise);

userTechnicalOption();
}

addUserToTable();
}

function addUserTechnicalGroup() {
let name = $('#search_user_group').val();

async function addUserGroupToTable() {
let myPromise = new Promise(function(myResolve, myReject) {
$.ajax({
type: 'POST',
url: '/api/user-technical-group',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {
"name": name,
},
async: false,
success: function (data) {
console.log(data);
if (data.data != null) {
var index = id_user_technical_groups.indexOf(parseInt(data.data.id));
if (index !== -1) {
$.alert("User Group has been added");
} else {
id_user_technical_groups.push(data.data.id);
var btn = `<button type="button"
    onclick="detailModal('Detail User Technical', '/user-technical-groups/' + ${data.data.id}, 'xl')"
    class="btn btn-md btn-primary"><i class="ion ion-eye"></i> Show</button>`;
var action = `<button type="button" onclick="deleteUserGroup('${data.data.id}')" class="btn btn-md btn-danger"><i
        class="fas fa-times"></i></button>`;
user_technical_group_table.row.add([
data.data.name,
btn,
action,
]);

user_technical_group_table.draw();
}
} else {
$.confirm({
title: 'User Group Not Found!',
content: 'Do you want to create a new user group?',
buttons: {
yes: function () {
$.confirm({
title: 'Create User Group',
content: 'URL:/user-technical-groups/create-modal',
columnClass: 'medium',
buttons: {
formSubmit: {
text: 'Submit',
btnClass: 'btn-blue',
action: function () {
let name, description, tasks;
name = this.$content.find('#name').val();
description = this.$content.find('#description').val();
users_technicals = this.$content.find('#e1').val();

$.ajax({
type: 'POST',
url: '/user-technical-groups',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {
"_token": "{{ csrf_token() }}",
"name": name,
"description": description,
"user_technicals": users_technicals,
"from": 'work_order'
},
success: function (data) {
console.log(data);
if (data.status == 200) {
var index = id_user_technical_groups.indexOf(parseInt(data.data.id));
if (index !== -1) {
$.alert("User Group has been added");
} else {
id_user_technical_groups.push(data.data.id);
userTechnicalGroupOption();
var btn = `<button onclick="detailModal('Detail User Technical', '/user-technical-groups/' + ${data.data.id}, 'xl')"
    class="btn btn-md btn-primary"><i class="ion ion-eye"></i> Show</button>`;
var action = `<button type="button" onclick="deleteUserGroup('${data.data.id}')" class="btn btn-md btn-danger"><i
        class="fas fa-times"></i></button>`;
user_technical_group_table.row.add([
data.data.name,
btn,
action,
]);

user_technical_group_table.draw();
}
} else {
let msg = data.msg;
$.alert(msg);
return false;
}
},
error: function (data) {
$.alert(data.responseJSON.message);
console.log(data);
}
});
}
},
cancel: function () {
//close
},
},
onContentReady: function () {
// bind to events
var jc = this;
this.$content.find('form').on('submit', function (e) {
// if the user submits the form by pressing enter in the field.
e.preventDefault();
jc.$$formSubmit.trigger('click'); // reference the button and click it
});
}
});
},
no: function () {

},
}
});
}
},
error: function (data) {
$.alert(data.responseJSON.message);
console.log(data);
}
});

myResolve('i Love You 3000')
});

console.log(await myPromise);

userTechnicalGroupOption();
}

addUserGroupToTable();
}

function chooseReferenceDocuments() {
$('.referenceId').remove()
reference_document_table.rows().remove().draw();
const assetId = $('select[name="asset_id"]').val() ?? 0;
console.log(assetId);
$.confirm({
title: 'Choose reference documents',
content: 'URL:/api/reference-documents/' + assetId,
columnClass: 'large',
buttons: {
okay: {
text: 'Okay',
btnClass: 'btn-blue',
action: function () {
var rows_selected = window.table.column(0).checkboxes.selected();
console.log(window.table.column(0));
$.each(rows_selected, function(index, id){
$('#form').append(
$('<input>')
.attr('type', 'hidden')
.attr('class', 'referenceId')
.attr('name', 'referenceId[]')
.val(id)
);

$.ajax({
type: 'POST',
url: '/api/reference-document/'+id,
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {
"id": id,
},
async: false,
success: function (data) {
console.log(data);
// id_user_technical_groups.push(data.data.id);
reference_document_table.row.add([
data.data.filename.slice(0, 45) + (data.data.filename.length > 45 ? "..." : ""),
]);

reference_document_table.draw();
},
error: function (data) {
$.alert(data.responseJSON.message);
console.log(data);
}
});
});
}
},
cancel: function () {
//close
},
},
onContentReady: function () {
// bind to events
table = $('#table1').DataTable({
'columnDefs': [
{
'targets': 0,
'checkboxes': {
'selectRow': true
}
}
],
'select': {
'style': 'multi',
},
'searching': false,
"paging": false,
"ordering": false,
"info": false
});
}
});
}

function oldValueReferenceDocuments() {
let inputs = $('.referenceId');
let referenceIds = [].map.call(inputs, function( input ) {
return input.value;
});

$.each(referenceIds, function(index, id){
$.ajax({
type: 'POST',
url: '/api/reference-document/'+id,
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: {
"id": id,
},
async: false,
success: function (data) {
console.log(data);
reference_document_table.row.add([
data.data.filename.slice(0, 45) + (data.data.filename.length > 45 ? "..." : ""),
]);

reference_document_table.draw();
},
error: function (data) {
$.alert(data.responseJSON.message);
console.log(data);
}
});
});
}

async function deleteUser(id) {
$('.user_technicals').remove()
var index = id_user_technicals.indexOf(parseInt(id));
var ids = [];
console.log(id_user_technicals);
let myPromise = new Promise(function(myResolve, myReject) {
if (index !== -1) {
console.log("delete " + index);
id_user_technicals.splice(index, 1);
ids = id_user_technicals;
console.log(id_user_technicals);
}

user_technical_table.rows().remove().draw();

myResolve('i Love You 3000')
});

console.log(await myPromise);

if (ids.length > 0) {
id_user_technicals = [];
oldUserTechnicals(ids);
} else {
userTechnicalOption()
}
}

async function deleteUserGroup(id) {
$('.user_technical_groups').remove()
var index = id_user_technical_groups.indexOf(parseInt(id));
var ids = [];
let myPromise = new Promise(function(myResolve, myReject) {
if (index !== -1) {
id_user_technical_groups.splice(index, 1);
ids = id_user_technical_groups;
}

user_technical_group_table.rows().remove().draw();

myResolve('i Love You 3000')
});

console.log(await myPromise);

if (ids.length > 0) {
id_user_technical_groups = [];
oldUserTechnicalGroups(ids);
} else {
userTechnicalGroupOption()
}
}
</script>
@endsection
