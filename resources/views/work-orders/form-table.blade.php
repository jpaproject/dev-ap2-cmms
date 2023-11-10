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
        .mycheckbox{
            margin-top:5px;
            margin-left:5px;
        }
        .mycheckboxdiv{
            text-align:right;
        }
        table{
            vertical-align : middle;
            text-align:center;
        }
    </style>
@endsection

@section('content')
<section class="content">
    
<table class="table table-bordered table-responsive w-100 d-block d-md-table">
  <thead class="thead-light">
    <tr>
      <th scope="col">PENGAWAS AP 2</th>
      <th scope="col">SUBTATION</th>
      <th scope="col">HARI</th>
      <th scope="col">TANGGAL</th>
      <th scope="col">BULAN</th>
      <th scope="col">TAHUN</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>ALAN</th>
      <td>NP</td>
      <td>RABU</td>
      <th>18</th>
      <td>JAN</td>
      <td>2023</td>
    </tr>
  </tbody>
</table>

<table class="table table-bordered table-responsive w-100 d-block d-md-table">
  <thead class="thead-light">
    <tr>
      <th scope="col" rowspan="2" style="vertical-align : middle;text-align:center;">GARDU</th>
      <th scope="col" rowspan="2" style="vertical-align : middle;text-align:center;">RELAY</th>
      <th scope="col" rowspan="2" style="vertical-align : middle;text-align:center;">ELEMENT</th>
      <th scope="col" rowspan="2" style="vertical-align : middle;text-align:center;"></th>
      <th scope="col" rowspan="2" style="vertical-align : middle;text-align:center;">CALCULATION</th>
      <th scope="col" colspan="2" style="vertical-align : middle;text-align:center;">TEST TRIP</th>
      <th scope="col" rowspan="2" style="vertical-align : middle;text-align:center;">RASIO CT</th>
      <th scope="col" rowspan="2" style="vertical-align : middle;text-align:center;">KETERANGAN</th>
    </tr>
    <tr>
        <th scope="col">RELAY</th>
        <th scope="col">CB</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td rowspan="25" style="vertical-align : middle;text-align:center;">NP 14 MCD</td>
      <td rowspan="25" style="vertical-align : middle;text-align:center;">SEPAM S20</td>
      <th rowspan="6" style="vertical-align : middle;text-align:center;">OC</th>
      <th>Curve Tripping</th>
      <td colspan="4">EIT</td>
      {{-- <td>2023</td>
      <td>2023</td> --}}
      {{-- <td rowspan="6" style="vertical-align : middle;text-align:center;">2023</td> --}}
      {{-- <td rowspan="6" style="vertical-align : middle;text-align:center;">2023</td> --}}
        <td></td>
    </tr>
    <tr>
      <th>Isett (A)</th>
      <td>57,6</td>
      <td>57,6</td>
      <td>57,6</td>
      <td rowspan="5" style="vertical-align : middle;text-align:center;">75/5</td>
      <td rowspan="5" style="vertical-align : middle;text-align:center;"></td>
    </tr>
    <tr>
      <th>Ifault (A)</th>
      <td>92</td>
      <td>92</td>
      <td>92</td>
    </tr>
    <tr>
      <th>10l/ls (s)</th>
      <td>0,1</td>
      <td>0,1</td>
      <td>0,1</td>
    </tr>
    <tr>
      <th>TMS (s)</th>
      <td>0,12</td>
      <td>0,12</td>
      <td>0,12</td>
    </tr>
    <tr>
      <th>t (s)</th>
      <td>6,189</td>
      <td>6,208</td>
      <td>6,275</td>
    </tr>
    <tr>
      <th rowspan="6" style="vertical-align : middle;text-align:center;">SC</th>
      <th>Curve Tripping</th>
      <td colspan="4">DEFTIME</td>
      {{-- <td>2023</td>
      <td>2023</td> --}}
      {{-- <td rowspan="6" style="vertical-align : middle;text-align:center;">2023</td> --}}
      {{-- <td rowspan="6" style="vertical-align : middle;text-align:center;">2023</td> --}}
        <td></td>
    </tr>
    <tr>
      <th>Isset (A)</th>
      <td>160</td>
      <td>160</td>
      <td>160</td>
      <td rowspan="5" style="vertical-align : middle;text-align:center;">75/5</td>
      <td rowspan="5" style="vertical-align : middle;text-align:center;"></td>
    </tr>
    <tr>
      <th>Ifault (A)</th>
      <td>165</td>
      <td>165</td>
      <td>165</td>
    </tr>
    <tr>
      <th>10l/ls</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th>TMS (s)</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th>T (s)</th>
      <td>0</td>
      <td>0,0128</td>
      <td>0,106</td>
    </tr>
    <tr>
      <th rowspan="6" style="vertical-align : middle;text-align:center;">GF</th>
      <th>Curve Tripping</th>
      <td colspan="4">SIT</td>
      {{-- <td>2023</td>
      <td>2023</td> --}}
      {{-- <td rowspan="6" style="vertical-align : middle;text-align:center;">2023</td> --}}
      {{-- <td rowspan="6" style="vertical-align : middle;text-align:center;">2023</td> --}}
        <td></td>
    </tr>
    <tr>
      <th>Isset (A)</th>
      <td>5</td>
      <td>5</td>
      <td>5</td>
      <td rowspan="5" style="vertical-align : middle;text-align:center;">CSH</td>
      <td rowspan="5" style="vertical-align : middle;text-align:center;"></td>
    </tr>
    <tr>
      <th>Ifault (A)</th>
      <td>8,6</td>
      <td>8,6</td>
      <td>8,6</td>
    </tr>
    <tr>
      <th>10l/ls (s)</th>
      <td>0,59</td>
      <td>0,59</td>
      <td>0,59</td>
    </tr>
    <tr>
      <th>TMS (s)</th>
      <td>0,2</td>
      <td>0,2</td>
      <td>0,2</td>
    </tr>
    <tr>
      <th>t (s)</th>
      <td>2,568</td>
      <td>2,570</td>
      <td>2,581</td>
    </tr>
    <tr>
      <th rowspan="6" style="vertical-align : middle;text-align:center;">GF</th>
      <th>Curve Tripping</th>
      <td colspan="4">DEFTIME</td>
      {{-- <td>2023</td>
      <td>2023</td> --}}
      {{-- <td rowspan="6" style="vertical-align : middle;text-align:center;">2023</td> --}}
      {{-- <td rowspan="6" style="vertical-align : middle;text-align:center;">2023</td> --}}
        <td></td>
    </tr>
    <tr>
      <th>Isset (A)</th>
      <td>5</td>
      <td>5</td>
      <td>5</td>
      <td rowspan="5" style="vertical-align : middle;text-align:center;">CSH</td>
      <td rowspan="5" style="vertical-align : middle;text-align:center;"></td>
    </tr>
    <tr>
      <th>Ifault (A)</th>
      <td>8,6</td>
      <td>8,6</td>
      <td>8,6</td>
    </tr>
    <tr>
      <th>10l/ls (s)</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th>TMS (s)</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th>t (s)</th>
      <td>0,05</td>
      <td>0,065</td>
      <td>0,111</td>
    </tr>
  </tbody>
</table>

<div class="col-md-12 col-sm-12 col-lg-12">
	<div class="checkbox">								
        <textarea name="indications-rcms" style="height: 350px;"
        class="form-control @error('indications-rcms') is-invalid @enderror" id="indications-rcms"
        cols="30" rows="3" placeholder="Enter Indications RCMS">Catatan:&#13;&#10; 1. &#13;&#10;2.</textarea>
	</div>
</div>
    
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
                        var img = `<img src="{{asset('img/user-technicals/')}}/${data.data.avatar??'user.png'}" width="40px" class="img-circle">`;
                        var action = `<button type="button" onclick="deleteUser('${data.data.id}')" class="btn btn-md btn-danger"><i class="fas fa-times"></i></button>`;
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
                        var btn = `<button type="button" onclick="detailModal('Detail User Technical', '/user-technical-groups/' + ${data.data.id}, 'xl')" class="btn btn-md btn-primary"><i class="ion ion-eye"></i> Show</button>`;
                        var action = `<button type="button" onclick="deleteUserGroup('${data.data.id}')" class="btn btn-md btn-danger"><i class="fas fa-times"></i></button>`;
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
                    var tag = `<input type="text" name="user_technicals[${i}]" value="${id}" class="d-none user_technicals"/>`
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
                    var tag = `<input type="text" name="user_technical_groups[${i}]" value="${id}" class="d-none user_technical_groups"/>`
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
                                var img = `<img src="{{asset('img/user-technicals/')}}/${data.data.avatar??'user.png'}" width="40px" class="img-circle">`;
                                var action = `<button type="button" onclick="deleteUser('${data.data.id}')" class="btn btn-md btn-danger"><i class="fas fa-times"></i></button>`;
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
                                                                    var img = `<img src="{{asset('img/user-technicals/')}}/${data.data.avatar??'user.png'}" width="40px" class="img-circle">`;
                                                                    var action = `<button type="button" onclick="deleteUser('${data.data.id}')" class="btn btn-md btn-danger"><i class="fas fa-times"></i></button>`;
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
                                var btn = `<button type="button" onclick="detailModal('Detail User Technical', '/user-technical-groups/' + ${data.data.id}, 'xl')" class="btn btn-md btn-primary"><i class="ion ion-eye"></i> Show</button>`;
                                var action = `<button type="button" onclick="deleteUserGroup('${data.data.id}')" class="btn btn-md btn-danger"><i class="fas fa-times"></i></button>`;
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
                                                                        var btn = `<button onclick="detailModal('Detail User Technical', '/user-technical-groups/' + ${data.data.id}, 'xl')" class="btn btn-md btn-primary"><i class="ion ion-eye"></i> Show</button>`;
                                                                        var action = `<button type="button" onclick="deleteUserGroup('${data.data.id}')" class="btn btn-md btn-danger"><i class="fas fa-times"></i></button>`;
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
                    "paging":   false,
                    "ordering": false,
                    "info":     false
                });
            }
        });
    }

    function oldValueReferenceDocuments() {
        let inputs = $('.referenceId');
        let referenceIds  = [].map.call(inputs, function( input ) {
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