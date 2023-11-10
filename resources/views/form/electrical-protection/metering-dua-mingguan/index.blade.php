@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item">
        <a href="{{ route('work-orders.index') }}">Work Order</a>
    </li>
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

        {{-- <table class="table-bordered head table-responsive w-100 d-block d-md-table table">
            <thead class="thead-light">
                <tr>
                    <th class="head" scope="col">WORKING ORDER NUMBER</th>
                    <th class="head" scope="col">LOCATION</th>
                    <th class="head" scope="col">DATE</th>
                    <th class="head" scope="col">MONTH</th>
                    <th class="head" scope="col">YEAR</th>
                    <th class="head" scope="col">SUPERVISED BY</th>
                    <th class="head" scope="col">DINAS</th>
                    <th class="head" scope="col">HARI/TANGGAL</th>
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
                    <td class="head">DIMAS ARYASATYA</td>
                    <td class="head">23-02-2023</td>
                </tr>
            </tbody>
        </table> --}}
        {{-- <div class="row">
            <div class="col-12 col-lg-5 col-md-4">
                <table class="table-bordered head table-responsive d-md-table table">
                    <thead class="thead-light">
                        <tr>
                            <th class="head" scope="col">No.</th>
                            <th class="head" scope="col">Personil Yang Ditugaskan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="head">1.</th>
                            <td class="head">Dimas Aryasatya</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-lg-7 col-md-8">
                <table class="table-bordered head table-responsive d-md-table table">
                    <thead class="thead-light">
                        <tr>
                            <th class="head" scope="col">HARI/TANGGAL</th>
                            <th class="head" scope="col">DINAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="head">Friday, 25/02/2023 09:15</th>
                            <td class="head">DINAS</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div> --}}
        <form method="POST" id="myForm" action="{{ route('form.elp.metering-dua-mingguan.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form">
            @csrf
            @method('patch')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Data Baru</h3>
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-lg-8 col-md-8">
                                        <div class="row mb-2">
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <span>SUBSTATION</span>
                                            </div>
                                            <div class="col-8"><input type="text" class="form-control" id="substation"
                                                    name="" placeholder="Enter..">

                                                @error('pick-time')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <span>PANEL</span>
                                            </div>
                                            <div class="col-8"><input type="text" class="form-control" id="panel"
                                                    name="" placeholder="Enter..">

                                                @error('pick-time')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4"><button type="button"
                                            class="btn btn-outline-primary w-100" id="btn-add-document"
                                            onclick="addField(this)">
                                            <i class="fas fa-plus-square"> <span
                                                    style="font-family: Poppins, sans-serif !important;"> Add New</span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-substation-area">
                @if ($formElpMeteringDuaMingguans->isNotEmpty())
                    @foreach ($formElpMeteringDuaMingguans as $key => $formElpMeteringDuaMingguan)
                        <div class="container-fluid">
                            <div class="accordion" id="accordion{{ $loop->iteration }}">
                                <div class="card">
                                    <div class="card-header" id="{{ $loop->iteration }}">
                                        <h2 class="row mb-0">
                                            <div class="col-6">
                                                <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}"
                                                    aria-expanded="true" aria-controls="collapse{{ $loop->iteration }}"
                                                    onclick="showHide(this)">
                                                    <i class="fas {{ $loop->iteration === 1 ? 'fa-minus' : 'fa-plus' }}" id="accordion"></i>
                                                    {{ $formElpMeteringDuaMingguan->substation ?? '' }}
                                                </button>
                                            </div>
                                            <div class="col-6 d-flex justify-content-end">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="deleteAccordion(this)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </h2>
                                    </div>

                                    <div id="collapse{{ $loop->iteration }}"
                                        class="{{ $loop->iteration === 1 ? 'show' : '' }} collapse"
                                        aria-labelledby="{{ $loop->iteration }}" data-parent="#accordion{{ $loop->iteration }}">
                                        <div class="card-body">
                                            @include('components.form-message')
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                                    <h5>{{ $formElpMeteringDuaMingguan->panel }}</h5>
                                                    <input type="hidden" name="substation[]"
                                                        value="{{ $formElpMeteringDuaMingguan->substation }}">
                                                    <input type="hidden" name="panel[]"
                                                        value="{{ $formElpMeteringDuaMingguan->panel }}">
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="row">
                                                                <span
                                                                    class="col-12 d-flex justify-content-center fw-bolder">INCOMING</span>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="d-flex justify-content-center">GWH</label>
                                                                        <input type="number"
                                                                            class="form-control @error('incoming_gwh.' . $key) is-invalid @enderror"
                                                                            id="incoming_gwh" onchange="sumGwhIncoming(this)"
                                                                            name="incoming_gwh[]"
                                                                            value="{{ old('incoming_gwh.' . $key) ?? $formElpMeteringDuaMingguan->incoming_gwh }}"
                                                                            step="0.01" min="0" placeholder="Vdc">

                                                                        @error('incoming_gwh.' . $key)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="d-flex justify-content-center">GVARh</label>
                                                                        <input type="number"
                                                                            class="form-control @error('incoming_gvarh.' . $key) is-invalid @enderror"
                                                                            id="incoming_gvarh" onchange="sumGvarhIncoming(this)"
                                                                            name="incoming_gvarh[]"
                                                                            value="{{ old('incoming_gvarh.' . $key) ?? $formElpMeteringDuaMingguan->incoming_gvarh }}"
                                                                            step="0.01" min="0"
                                                                            placeholder="Vdc">

                                                                        @error('incoming_gvarh.' . $key)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="row">
                                                                <span
                                                                    class="col-12 d-flex justify-content-center fw-bolder">OUTGOING</span>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="d-flex justify-content-center">GWH</label>
                                                                        <input type="number"
                                                                            class="form-control @error('outgoing_gwh.' . $key) is-invalid @enderror"
                                                                            id="outgoing_gwh" onchange="sumGwhOutgoing(this)"
                                                                            name="outgoing_gwh[]"
                                                                            value="{{ old('outgoing_gwh.' . $key) ?? $formElpMeteringDuaMingguan->outgoing_gwh }}"
                                                                            step="0.01" min="0"
                                                                            placeholder="Vdc">

                                                                        @error('outgoing_gwh.' . $key)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="d-flex justify-content-center">GVARh</label>
                                                                        <input type="number"
                                                                            class="form-control @error('outgoing_gvarh.' . $key) is-invalid @enderror"
                                                                            id="outgoing_gvarh" onchange="sumGvarhOutgoing(this)"
                                                                            name="outgoing_gvarh[]"
                                                                            value="{{ old('outgoing_gvarh.' . $key) ?? $formElpMeteringDuaMingguan->outgoing_gvarh }}"
                                                                            step="0.01" min="0"
                                                                            placeholder="Vdc">

                                                                        @error('outgoing_gvarh.' . $key)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <span class="col-12 d-flex justify-content-center">TOTAL</span>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex justify-content-center">GWH
                                                                        </label> <input type="number"
                                                                            class="form-control @error('total_gwh.' . $key) is-invalid @enderror"
                                                                            id="total_gwh" name="total_gwh[]"
                                                                            value="{{ old('total_gwh.' . $key) ?? $formElpMeteringDuaMingguan->total_gwh }}"
                                                                            step="0.01" min="0"
                                                                            placeholder="Vdc" readonly>

                                                                        @error('total_gwh.' . $key)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex justify-content-center">GVARh
                                                                        </label> <input type="number"
                                                                            class="form-control @error('total_gvarh.' . $key) is-invalid @enderror"
                                                                            id="total_gvarh" name="total_gvarh[]"
                                                                            value="{{ old('total_gvarh.' . $key) ?? $formElpMeteringDuaMingguan->total_gvarh }}"
                                                                            step="0.01" min="0"
                                                                            placeholder="Vdc" value="0" readonly>

                                                                        @error('total_gvarh.' . $key)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="time">Time</label>
                                                                <input type="datetime-local"
                                                                    class="form-control @error('time') is-invalid @enderror"
                                                                    id="time" name="time"
                                                                    value="{{ old('time') }}"
                                                                    placeholder="Enter sugested completion">

                                                                @error('time')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12 col-lg-9">

                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi">{!! $formElpMeteringDuaMingguans[0]->catatan ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-footer">Add</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('script')
    <script>
        function sumGwhIncoming(element) {
            let incomings = $('[name="incoming_gwh[]"]');
            let indexIncoming = Array.prototype.indexOf.call(incomings, element)
            let outgoings = $('[name="outgoing_gwh[]"]');
            let total_gwh = $('[name="total_gwh[]').eq(indexIncoming)

            incomingValue = incomings.eq(indexIncoming).val()
            if (incomingValue == '' || incomingValue == null) {
                incomingValue = 0
            }

            outgoingValue = outgoings.eq(indexIncoming).val()
            if (outgoingValue == '' || outgoingValue == null) {
                outgoingValue = 0
            }
            
            let sumResult = parseInt(incomingValue) + parseInt(outgoingValue)

            total_gwh.val(sumResult)
        }

        function sumGwhOutgoing(element) {
            let incomings = $('[name="incoming_gwh[]"]');
            let outgoings = $('[name="outgoing_gwh[]"]');
            let indexOutgoing = Array.prototype.indexOf.call(outgoings, element)
            let total_gwh = $('[name="total_gwh[]').eq(indexOutgoing)

            incomingValue = incomings.eq(indexOutgoing).val()
            if (incomingValue == '' || incomingValue == null) {
                incomingValue = 0
            }

            outgoingValue = outgoings.eq(indexOutgoing).val()
            if (outgoingValue == '' || outgoingValue == null) {
                outgoingValue = 0
            }
            
            let sumResult = parseInt(incomingValue) + parseInt(outgoingValue)

            total_gwh.val(sumResult)
        }

        

        function showHide(button) {
            const child = $(button).parent().find("#accordion"); // get child element
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }

        // Sum Incoming & Outgoing Gvarh
        function sumGvarhIncoming(element) {
            let incomings = $('[name="incoming_gvarh[]"]');
            let indexIncoming = Array.prototype.indexOf.call(incomings, element)
            let outgoings = $('[name="outgoing_gvarh[]"]');
            let total_gvarh = $('[name="total_gvarh[]').eq(indexIncoming)

            incomingValue = incomings.eq(indexIncoming).val()
            if (incomingValue == '' || incomingValue == null) {
                incomingValue = 0
            }

            outgoingValue = outgoings.eq(indexIncoming).val()
            if (outgoingValue == '' || outgoingValue == null) {
                outgoingValue = 0
            }
            
            let sumResult = parseInt(incomingValue) + parseInt(outgoingValue)

            total_gvarh.val(sumResult)
        
        }
        function sumGvarhOutgoing(element) {
            let incomings = $('[name="incoming_gvarh[]"]');
            let outgoings = $('[name="outgoing_gvarh[]"]');
            let indexOutgoing = Array.prototype.indexOf.call(outgoings, element)
            let total_gvarh = $('[name="total_gvarh[]').eq(indexOutgoing)

            incomingValue = incomings.eq(indexOutgoing).val()
            if (incomingValue == '' || incomingValue == null) {
                incomingValue = 0
            }

            outgoingValue = outgoings.eq(indexOutgoing).val()
            if (outgoingValue == '' || outgoingValue == null) {
                outgoingValue = 0
            }
            
            let sumResult = parseInt(incomingValue) + parseInt(outgoingValue)

            total_gvarh.val(sumResult)
        }

        function addField() {
            const getSubstation = $('#substation').val();
            const getPanel = $('#panel').val();
            let countAccordionRow = $('.accordion').length;
            if (getSubstation == false || getPanel == false) {
                $.alert({
                    icon: 'fas fa-exclamation-triangle',
                    title: 'Perhatian!',
                    type: 'warning',
                    content: 'SUBSTATION dan PANEL harus diisi!',
                });
            } else {
                $('.add-substation-area').append(`
                <div class="container-fluid">
                    <div class="accordion" id="accordion${countAccordionRow+1}">
                    <div class="card">
                        <div class="card-header" id="${countAccordionRow+1}">
                            <h2 class="row mb-0">
                                            <div class="col-6">
                                                <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapse${countAccordionRow+1}"
                                                    aria-expanded="true" aria-controls="collapse${countAccordionRow+1}"
                                                    onclick="showHide(this)">
                                                    <i class="fas ${countAccordionRow+1 === 1 ? 'fa-minus' : 'fa-plus'}" id="accordion"></i>
                                                    ${getSubstation}
                                                </button>
                                            </div>
                                            <div class="col-6 d-flex justify-content-end">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="deleteAccordion(this)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </h2>
                        </div>

                        <div id="collapse${countAccordionRow+1}" class="collapse ${countAccordionRow+1 === 1 ? 'show' : ''}" aria-labelledby="${countAccordionRow+1}"
                            data-parent="#accordion${countAccordionRow+1}">
                                    <div class="card-body">
                                        @include('components.form-message')
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                                    <h5>${getPanel}</h5>
                                                    <input type="hidden" name="substation[]" value="${getSubstation}">
                                                    <input type="hidden" name="panel[]" value="${getPanel}">
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="row">
                                                                <span
                                                                    class="col-12 d-flex justify-content-center fw-bolder">INCOMING</span>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="d-flex justify-content-center">GWH</label>
                                                                        <input type="number"
                                                                            class="form-control @error('incoming_gwh.${countAccordionRow-1}') is-invalid @enderror"
                                                                            id="incoming_gwh" onchange="sumGwhIncoming(this)" name="incoming_gwh[]"
                                                                            value="{{ old('incoming_gwh.${countAccordionRow-1}') }}" step="0.01"
                                                                            min="0" placeholder="Vdc">

                                                                        @error('incoming_gwh.${countAccordionRow-1}')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="d-flex justify-content-center">GVARh</label>
                                                                        <input type="number"
                                                                            class="form-control @error('incoming_gvarh.${countAccordionRow-1}') is-invalid @enderror"
                                                                            id="incoming_gvarh" onchange="sumGvarhIncoming(this)" name="incoming_gvarh[]"
                                                                            value="" step="0.01"
                                                                            min="0" placeholder="Vdc">

                                                                        @error('incoming_gvarh.${countAccordionRow-1}')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="row">
                                                                <span
                                                                    class="col-12 d-flex justify-content-center fw-bolder">OUTGOING</span>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="d-flex justify-content-center">GWH</label>
                                                                        <input type="number"
                                                                            class="form-control @error('outgoing_gwh.${countAccordionRow-1}') is-invalid @enderror"
                                                                            id="outgoing_gwh" onchange="sumGwhOutgoing(this)" name="outgoing_gwh[]"
                                                                            value="" step="0.01"
                                                                            min="0" placeholder="Vdc">

                                                                        @error('outgoing_gwh.${countAccordionRow-1}')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="d-flex justify-content-center">GVARh</label>
                                                                        <input type="number"
                                                                            class="form-control @error('outgoing_gvarh.${countAccordionRow-1}') is-invalid @enderror"
                                                                            id="outgoing_gvarh" onchange="sumGvarhOutgoing(this)" name="outgoing_gvarh[]"
                                                                            value="{{ old('outgoing_gvarh.${countAccordionRow-1}') }}" step="0.01"
                                                                            min="0" placeholder="Vdc">

                                                                        @error('outgoing_gvarh.${countAccordionRow-1}')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <span class="col-12 d-flex justify-content-center">TOTAL</span>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex justify-content-center">GWH
                                                                        </label> <input type="number"
                                                                            class="form-control @error('total_gwh.${countAccordionRow-1}') is-invalid @enderror"
                                                                            id="total_gwh" name="total_gwh[]"
                                                                            value="{{ old('total_gwh.${countAccordionRow-1}') ?? 0 }}" step="0.01"
                                                                            min="0" placeholder="Vdc" readonly>

                                                                        @error('total_gwh.${countAccordionRow-1}')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex justify-content-center">GVARh
                                                                        </label> <input type="number"
                                                                            class="form-control @error('total_gvarh.${countAccordionRow-1}') is-invalid @enderror"
                                                                            id="total_gvarh" name="total_gvarh[]"
                                                                            value="{{ old('total_gvarh.${countAccordionRow-1}') ?? 0 }}" step="0.01"
                                                                            min="0" placeholder="Vdc" value="0" readonly>

                                                                        @error('total_gvarh.${countAccordionRow-1}')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="time">Time</label>
                                                                <input type="datetime-local"
                                                                    class="form-control @error('time.${countAccordionRow-1}') is-invalid @enderror"
                                                                    id="time" name="[]time"
                                                                    value="{{ old('time.${countAccordionRow-1}') }}"
                                                                    placeholder="Enter sugested completion">
            
                                                                @error('time.${countAccordionRow-1}')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            `);
            }

            $('#substation').val('');
            $('#panel').val('');
        }


        function deleteAccordion(e) {
            var parent = $(event.target).parent().parent().parent().parent().parent().parent();
            parent.remove();
        }

        $(document).ready(function() {

            $("#myForm").submit(function(event) {
                const countAccordionRow = $('.accordion').length;
                if (countAccordionRow == 0) {
                    event.preventDefault(); // Prevents the form from being submitted

                    // Perform additional actions or validations if needed

                    // Example: Display an alert
                    $.alert({
                        icon: 'fas fa-exclamation-triangle',
                        title: 'Perhatian!',
                        type: 'warning',
                        content: 'SUBSTATION dan PANEL harus diisi!',
                    });
                }
                console.log("berhenti count :" + countAccordionRow)
            });

        });
    </script>
@endsection
