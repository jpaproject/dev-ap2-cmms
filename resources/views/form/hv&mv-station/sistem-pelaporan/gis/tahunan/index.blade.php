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
        <form method="POST" action="{{ route('form.hmv.sistem-pelaporan.gis.tahunan.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
        id="form">
        @method('patch')
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>EQUIPMENT NUMBER</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('equipment_number') is-invalid @enderror" id="equipment_number"
                                                name="equipment_number" value="{{ old('equipment_number') ?? $formHmvGisTahunans[0]->equipment_number }}"
                                                placeholder="Enter EQUIPMENT NUMBER">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>LOCATION/STATION</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('location_station') is-invalid @enderror" id="location_station"
                                                name="location_station" value="{{ old('location_station') ?? $formHmvGisTahunans[0]->location_station }}"
                                                placeholder="Enter LOCATION/STATION">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>TYPE</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('type') is-invalid @enderror" id="type"
                                                name="type" value="{{ old('type') ?? $formHmvGisTahunans[0]->type }}"
                                                placeholder="Enter TYPE">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>Reference drawing</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('reference_drawing') is-invalid @enderror" id="reference_drawing"
                                                name="reference_drawing" value="{{ old('reference_drawing') ?? $formHmvGisTahunans[0]->reference_drawing }}"
                                                placeholder="Enter Reference drawing">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>INSPECTION DATE</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="date"
                                                class="form-control @error('inspection_date') is-invalid @enderror" id="inspection_date"
                                                name="inspection_date" value="{{ old('inspection_date') ?? $formHmvGisTahunans[0]->inspection_date }}"
                                                placeholder="Enter INSPECTION DATE">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>SERIAL NUMBER</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('serial_number') is-invalid @enderror" id="serial_number"
                                                name="serial_number" value="{{ old('serial_number') ?? $formHmvGisTahunans[0]->serial_number }}"
                                                placeholder="Enter SERIAL NUMBER">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>BRAND/MERK</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('brand_merk') is-invalid @enderror" id="brand_merk"
                                                name="brand_merk" value="{{ old('brand_merk') ?? $formHmvGisTahunans[0]->brand_merk }}"
                                                placeholder="Enter BRAND/MERK">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>NAME PLANT</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('name_plate') is-invalid @enderror" id="name_plate"
                                                name="name_plate" value="{{ old('name_plate') ?? $formHmvGisTahunans[0]->name_plate }}"
                                                placeholder="Enter NAME PLANT">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>STATUS</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="status">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="OPS"
                                                    {{ (old('status') ?? $formHmvGisTahunans[0]->status) == 'OPS' ? 'selected' : '' }}
                                                >OPS</option>
                                                <option value="STBY"
                                                    {{ (old('status') ?? $formHmvGisTahunans[0]->status) == 'STBY' ? 'selected' : '' }}
                                                >STBY</option>
                                                <option value="REPAIR"
                                                    {{ (old('status') ?? $formHmvGisTahunans[0]->status) == 'REPAIR' ? 'selected' : '' }}
                                                >REPAIR</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">1. Pemeriksaan Suhu GIS 150 KV <span class="text-muted">(45.6 &deg; C)</span></label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Awal</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('awal') is-invalid @enderror" id="awal"
                                                name="awal[]" value="{{ $formHmvGisTahunans[0]->awal }}"
                                                placeholder="Enter Kondisi Awal">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Akhir</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('akhir') is-invalid @enderror" id="akhir"
                                                name="akhir[]" value="{{ $formHmvGisTahunans[0]->akhir }}"
                                                placeholder="Enter Kondisi Akhir">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Keterangan</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                name="remarks[]" value="{{ $formHmvGisTahunans[0]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">2. Pemeriksaan Kelembaban <span class="text-muted">(< 3960 ppmv)</span></label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Awal</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('awal') is-invalid @enderror" id="awal"
                                                name="awal[]" value="{{ $formHmvGisTahunans[1]->awal }}"
                                                placeholder="Enter Kondisi Awal">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Akhir</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('akhir') is-invalid @enderror" id="akhir"
                                                name="akhir[]" value="{{ $formHmvGisTahunans[1]->akhir }}"
                                                placeholder="Enter Kondisi Akhir">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Keterangan</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                name="remarks[]" value="{{ $formHmvGisTahunans[1]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">3. Pengukuran Partial Discharge <span class="text-muted">( 118kV to be not more than 5 pC)</span></label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Awal</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('awal') is-invalid @enderror" id="awal"
                                                name="awal[]" value="{{ $formHmvGisTahunans[2]->awal }}"
                                                placeholder="Enter Kondisi Awal">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Akhir</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('akhir') is-invalid @enderror" id="akhir"
                                                name="akhir[]" value="{{ $formHmvGisTahunans[2]->akhir }}"
                                                placeholder="Enter Kondisi Akhir">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Keterangan</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                name="remarks[]" value="{{ $formHmvGisTahunans[2]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                    cols="30" rows="3" placeholder="Enter catatan">{!! $formHmvGisTahunans[0]->catatan ?? '' !!}</textarea>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-footer">Add</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
                </div>
            </div>

        </div>
        </form>
    </section>
@endsection

@section('script')
    {{-- <script>
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

        @if (old('user_technicals'))
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

        @if (old('user_technical_groups'))
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
</script> --}}
@endsection
