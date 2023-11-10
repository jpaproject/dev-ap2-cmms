@extends($extends)

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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;">Hari / Tanggal: {{ $detailWorkOrderForm->created_at->format('l, j F Y') ?? ''  }}</h3>
                        </div>

                        <form method="POST" action="{{ route('form.ps2.checklist-genset-ph-aocc.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
                            id="form">
                            @method('patch')
                            @csrf

                            <div class="card-body">

                                @include('components.form-message')
                                {{-- <table class="w-100"> --}}
                                {{-- <div class="form-group row">
                                    <label class="col-12 col-lg-3 hidden-lg hidden-md hidden-sm hidden-xs">Genset</label>
                                    <label class="col-lg-6 col-10 hidden-lg hidden-md hidden-sm hidden-xs">GS AOCC</label>
                                    <label class="col-2 col-lg-3"></label>
                                </div> --}}
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Mode operasi kontrol genset(Deif)</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control" aria-label="Default select example" name="mode_operasi_kontrol_genset">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="auto"
                                            {{ old('mode_operasi_kontrol_genset') ?? $checklistGensetPhAocc->mode_operasi_kontrol_genset == 'auto' ? 'selected' : '' }}
                                            >Auto</option>
                                            <option value="semi"
                                            {{ old('mode_operasi_kontrol_genset') ?? $checklistGensetPhAocc->mode_operasi_kontrol_genset == 'semi' ? 'selected' : '' }}
                                            >Semi</option>
                                            <option value="man"
                                            {{ old('mode_operasi_kontrol_genset') ?? $checklistGensetPhAocc->mode_operasi_kontrol_genset == 'man' ? 'selected' : '' }}
                                            >Man</option>
                                            <option value="off"
                                            {{ old('mode_operasi_kontrol_genset') ?? $checklistGensetPhAocc->mode_operasi_kontrol_genset == 'off' ? 'selected' : '' }}
                                            >Off</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Tegangan battery starter</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text" class="form-control @error('tegangan_battery_starter') is-invalid @enderror"
                                            id="tegangan_battery_starter" name="tegangan_battery_starter" value="{{ $checklistGensetPhAocc->tegangan_battery_starter }}"
                                            placeholder="Enter Tegangan Battery Charger">
                                    </div>
                                    <label class="col-2 col-lg-3">Vdc</label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Kondisi Battery charger</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control" aria-label="Default select example" name="kondisi_battery_charger">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="on"
                                            {{ old('kondisi_battery_charger') ?? $checklistGensetPhAocc->kondisi_battery_charger == 'on' ? 'selected' : '' }}
                                            >On</option>
                                            <option value="off"
                                            {{ old('kondisi_battery_charger') ?? $checklistGensetPhAocc->kondisi_battery_charger == 'off' ? 'selected' : '' }}
                                            >Off</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Lampu Indikator ECU</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control" aria-label="Default select example" name="lampu_indikator_ecu">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="on"
                                            {{ old('lampu_indikator_ecu') ?? $checklistGensetPhAocc->lampu_indikator_ecu == 'on' ? 'selected' : '' }}
                                            >On</option>
                                            <option value="blinking"
                                            {{ old('lampu_indikator_ecu') ?? $checklistGensetPhAocc->lampu_indikator_ecu == 'blinking' ? 'selected' : '' }}
                                            >Blinking</option>
                                            <option value="off"
                                            {{ old('lampu_indikator_ecu') ?? $checklistGensetPhAocc->lampu_indikator_ecu == 'off' ? 'selected' : '' }}
                                            >Off</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>

                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Level Oli mesin</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control" aria-label="Default select example" name="level_oli_mesin">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="low"
                                            {{ old('level_oli_mesin') ?? $checklistGensetPhAocc->level_oli_mesin == 'low' ? 'selected' : '' }}
                                            >Low</option>
                                            <option value="med"
                                            {{ old('level_oli_mesin') ?? $checklistGensetPhAocc->level_oli_mesin == 'med' ? 'selected' : '' }}
                                            >Med</option>
                                            <option value="max"
                                            {{ old('level_oli_mesin') ?? $checklistGensetPhAocc->level_oli_mesin == 'max' ? 'selected' : '' }}
                                            >Max</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>

                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Level air radiator</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control" aria-label="Default select example" name="level_air_radiator">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="low"
                                            {{ old('level_air_radiator') ?? $checklistGensetPhAocc->level_air_radiator == 'low' ? 'selected' : '' }}
                                            >Low</option>
                                            <option value="med"
                                            {{ old('level_air_radiator') ?? $checklistGensetPhAocc->level_air_radiator == 'med' ? 'selected' : '' }}
                                            >Med</option>
                                            <option value="max"
                                            {{ old('level_air_radiator') ?? $checklistGensetPhAocc->level_air_radiator == 'max' ? 'selected' : '' }}
                                            >Max</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>

                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">level bbm tangki harian</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text" class="form-control @error('level_bbm_tangki') is-invalid @enderror"
                                            id="level_bbm_tangki" name="level_bbm_tangki" value="{{ $checklistGensetPhAocc->level_bbm_tangki }}"
                                            placeholder="Enter level bbm tangki harian">
                                    </div>
                                    <label class="col-2 col-lg-3">(%) Liter </label>

                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Indikator filter udara intake</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control" aria-label="Default select example" name="indikator_filter_udara_intake">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="normal"
                                            {{ old('indikator_filter_udara_intake') ?? $checklistGensetPhAocc->indikator_filter_udara_intake == 'normal' ? 'selected' : '' }}
                                            >normal</option>
                                            <option value="service"
                                            {{ old('indikator_filter_udara_intake') ?? $checklistGensetPhAocc->indikator_filter_udara_intake == 'service' ? 'selected' : '' }}
                                            >service</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>

                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Water heater pump</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control" aria-label="Default select example" name="water_heater_pump">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="on"
                                            {{ old('water_heater_pump') ?? $checklistGensetPhAocc->water_heater_pump == 'on' ? 'selected' : '' }}
                                            >On</option>
                                            <option value="off"
                                            {{ old('water_heater_pump') ?? $checklistGensetPhAocc->water_heater_pump == 'off' ? 'selected' : '' }}
                                            >Off</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>

                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Oil / engine temperature </label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text" class="form-control @error('oil_engine_temperature') is-invalid @enderror"
                                            id="oil_engine_temperature" name="oil_engine_temperature" value="{{ $checklistGensetPhAocc->oil_engine_temperature }}"
                                            placeholder="Enter Oil / engine temperature">
                                    </div>
                                    <label class="col-2 col-lg-3">°C</label>

                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">valve bbm genset</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control" aria-label="Default select example" name="valve_bbm_genset">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="open"
                                            {{ old('valve_bbm_genset') ?? $checklistGensetPhAocc->valve_bbm_genset == 'open' ? 'selected' : '' }}
                                            >Open</option>
                                            <option value="close"
                                            {{ old('valve_bbm_genset') ?? $checklistGensetPhAocc->valve_bbm_genset == 'close' ? 'selected' : '' }}
                                            >Close</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Kondisi Switch Battery</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control" aria-label="Default select example" name="kondisi_switch_battery">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="open"
                                            {{ old('kondisi_switch_battery') ?? $checklistGensetPhAocc->kondisi_switch_battery == 'open' ? 'selected' : '' }}
                                            >Open</option>
                                            <option value="close"
                                            {{ old('kondisi_switch_battery') ?? $checklistGensetPhAocc->kondisi_switch_battery == 'close' ? 'selected' : '' }}
                                            >Close</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Valve Bbm monthly Tank</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control" aria-label="Default select example" name="valve_bbm_monthly_tank">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="open"
                                            {{ old('valve_bbm_monthly_tank') ?? $checklistGensetPhAocc->valve_bbm_monthly_tank == 'open' ? 'selected' : '' }}
                                            >Open</option>
                                            <option value="close"
                                            {{ old('valve_bbm_monthly_tank') ?? $checklistGensetPhAocc->valve_bbm_monthly_tank == 'close' ? 'selected' : '' }}
                                            >Close</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">level Bbm Monthly Tank</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text" class="form-control @error('level_bbm_monthly_tank') is-invalid @enderror"
                                            id="level_bbm_monthly_tank" name="level_bbm_monthly_tank" value="{{ $checklistGensetPhAocc->level_bbm_monthly_tank }}"
                                            placeholder="Enter level Bbm Monthly Tank">
                                    </div>
                                    <label class="col-2 col-lg-3">Liter</label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Kondisi Pintu Ruang Genset</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control" aria-label="Default select example" name="kondisi_pintu_ruang_genset">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="tertutup&terkunci"
                                            {{ old('kondisi_pintu_ruang_genset') ?? $checklistGensetPhAocc->kondisi_pintu_ruang_genset == 'tertutup&terkunci' ? 'selected' : '' }}
                                            >Tertutup & Terkunci</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan" cols="30"
                                            rows="3" placeholder="Enter Catatan"><?php echo htmlspecialchars($checklistGensetPhAocc->catatan); ?></textarea>
                                    </div>
                                </div>
                                {{-- </table> --}}
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-footer">Simpan</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection

@section('script')
    <script>
        function showHide(button) {
            const child = $(button).parent().find("#accordion"); // get child element
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }
    </script>
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
e.prevenlabelefault();
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
e.prevenlabelefault();
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
e.prevenlabelefault();
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
e.prevenlabelefault();
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
e.prevenlabelefault();
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
e.prevenlabelefault();
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
