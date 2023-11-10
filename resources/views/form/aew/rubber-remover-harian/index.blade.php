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

        .select2-container--default .select2-selection--single {
            height: 40px;
            /* adjust the height value as needed */
            line-height: 40px;
            /* ensure the text is vertically centered */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }
    </style>
@endsection

@section('content')
    <section class="content">

        {{-- <table class="table table-bordered head table-responsive w-100 d-block d-md-table">
            <thead class="thead-light">
                <tr>

                    <th class="head" scope="col">Tanggal</th>
                    <th class="head" scope="col">Pukul</th>
                    <th class="head" scope="col">Shift</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="head">06 Februari 2023</td>
                    <td class="head">18:18:28</td>
                    <td class="head">PS</td>
                </tr>
            </tbody>
        </table> --}}
        <form method="POST" action="{{ route('form.aew.rubber-remover.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf
            <div class="container-fluid">
                <div class="accordion" id="accordionExample1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: right;">
                                        <button class="btn btn-link btn-block text-left text-white" type="button"
                                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne" onclick="showHide(this)">
                                            <i class="fas fa-chevron-up" id="accordion"></i> DAILY CHECK PAR CAR
                                        </button>
                                        {{-- ER 2A --}}
                                    </h3>
                                </div>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample1">
                                <div class="card card-body">
                                    @foreach ($formAewRubberRemoverHarians as $key => $item)
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="w-100">
                                                    <tr>
                                                        <td><label class="d-flex justify-content-center">Name</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                id="name" name="name" value="{{$item->name}}" disabled
                                                                placeholder="Enter Name">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">ENGINE STARTS</label>
                                        </div>
                                        <div class="row">

                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">Battery Volt <span class="text-muted">(V)</span></label>
                                                    <input type="text" class="form-control @error('q1.' . $key) is-invalid @enderror"
                                                        id="q1" name="q1[]" value="{{ old('q1.' . $key) ?? $item->q1 }}"
                                                        placeholder="Volt">

                                                    @error('q1.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">Ignition time  <span class="text-muted">(seconds)</span></label>

                                                    <input type="text" class="form-control @error('q2.' . $key) is-invalid @enderror"
                                                        id="q2" name="q2[]" value="{{ old('q2.' . $key) ?? $item->q2 }}"
                                                        placeholder="Volt">

                                                    @error('q2.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">Operating RPM</label>
                                                    <input type="text" class="form-control @error('q3.' . $key) is-invalid @enderror"
                                                        id="q3" name="q3[]" value="{{ old('q3.' . $key) ?? $item->q3 }}"
                                                        placeholder="Volt">

                                                    @error('q3.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">Oil Level Check</label>
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">Engine Oil</label>

                                                                <select
                                                                    class="form-control select2 @error('q4.' . $key) is-invalid @enderror"
                                                                    style="width: 100%; height:50px;" name="q4[]">
                                                                    <option value="">Choose Or Type Selection</option>
                                                                    <option value=&check;
                                                                        {{ old('q4.' . $key) ?? $item->q4 == '&check;' ? 'selected' : '' }}
                                                                        >
                                                                        &check;
                                                                    </option>
                                                                    <option value=&#10007;
                                                                        {{ old('q4.' . $key) ?? $item->q4 == '&#10007;' ? 'selected' : '' }}
                                                                        >
                                                                        &#10007;
                                                                    </option>
                                                                    <option value=&minus;
                                                                        {{ old('q4.' . $key) ?? $item->q4 == '&minus;' ? 'selected' : '' }}
                                                                        >
                                                                        &minus;
                                                                    </option>
                                                                    @if ($item->q4 != '&check;' && $item->q4 != '&#10007;' && $item->q4 != '&minus;' && $item->q4 != null)
                                                                        <option
                                                                            value="{{ $item->q4 }}"
                                                                            selected>
                                                                            {{ $item->q4 }}
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                                @error('q4.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">Transmission oil</label>

                                                                <select
                                                                    class="form-control select2 @error('q5.' . $key) is-invalid @enderror"
                                                                    style="width: 100%; height:50px;" name="q5[]">
                                                                    <option value="">Choose Or Type Selection</option>
                                                                    <option value=&check;
                                                                        {{ old('q5.' . $key)?? $item->q5 == '&check;' ? 'selected' : '' }}
                                                                        >
                                                                        &check;
                                                                    </option>
                                                                    <option value=&#10007;
                                                                        {{ old('q5.' . $key)?? $item->q5 == '&#10007;' ? 'selected' : '' }}
                                                                        >
                                                                        &#10007;
                                                                    </option>
                                                                    <option value=&minus;
                                                                        {{ old('q5.' . $key) ?? $item->q5 == '&minus;' ? 'selected' : '' }}
                                                                        >
                                                                        &minus;
                                                                    </option>
                                                                    @if ($item->q5 != '&check;' && $item->q5 != '&#10007;' && $item->q5 != '&minus;' && $item->q5 != null)
                                                                        <option
                                                                            value="{{ $item->q5 }}"
                                                                            selected>
                                                                            {{ $item->q5 }}
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                                @error('q5.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">CLEANING HEAD</label>
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">Nozzles Blocked?</label>
                                                                <input type="text" class="form-control @error('q6.' . $key) is-invalid @enderror"
                                                                    id="q6" name="q6[]" value="{{ old('q6.' . $key) ?? $item->q6 }}"
                                                                    placeholder="Volt">

                                                                @error('q6.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">Any Leaks?</label>
                                                                <select
                                                                    class="form-control select2 @error('q7.' . $key) is-invalid @enderror"
                                                                    style="width: 100%; height:50px;" name="q7[]">
                                                                    <option value="">Choose Or Type Selection</option>
                                                                    <option value=&check;
                                                                        {{ old('q7.' . $key)?? $item->q7 == '&check;' ? 'selected' : '' }}
                                                                        >
                                                                        &check;
                                                                    </option>
                                                                    <option value=&#10007;
                                                                        {{ old('q7.' . $key)?? $item->q7 == '&#10007;' ? 'selected' : '' }}
                                                                        >
                                                                        &#10007;
                                                                    </option>
                                                                    <option value=&minus;
                                                                        {{ old('q7.' . $key) ?? $item->q7 == '&minus;' ? 'selected' : '' }}
                                                                        >
                                                                        &minus;
                                                                    </option>
                                                                    @if ($item->q7 != '&check;' && $item->q7 != '&#10007;' && $item->q7 != '&minus;' && $item->q7 != null)
                                                                        <option
                                                                            value="{{ $item->q7 }}"
                                                                            selected>
                                                                            {{ $item->q7 }}
                                                                        </option>
                                                                    @endif
                                                                </select>

                                                                @error('q7.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('lt3')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">BRUSH</label>
                                        </div>
                                        <div class="row">

                                            <div class="col-12 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">Side brush <span class="text-muted">(%)</span></label>
                                                    <input type="text" class="form-control @error('q9.' . $key) is-invalid @enderror"
                                                        id="q9" name="q9[]" value="{{ old('q9.' . $key) ?? $item->q9 }}"
                                                        placeholder="Volt">

                                                    @error('q9.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">Middle brush  <span class="text-muted">(%)</span></label>

                                                    <input type="text" class="form-control @error('q10.' . $key) is-invalid @enderror"
                                                        id="q10" name="q10[]" value="{{ old('q10.' . $key) ?? $item->q10 }}"
                                                        placeholder="Volt">

                                                    @error('q10.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-12 col-md-4 col-lg-4">
                                                <table class="w-100">
                                                    <tr>
                                                        <td><label class="d-flex justify-content-center">Error Codes</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text"
                                                                class="form-control @error('q8.' . $key) is-invalid @enderror"
                                                                id="q8" name="q8[]" value="{{ old('q8') ?? $item->q8 }}"
                                                                placeholder="Enter Remarks">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-12 col-md-4 col-lg-4">
                                                <table class="w-100">
                                                    <tr>
                                                        <td><label class="d-flex justify-content-center">Ready</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select
                                                                class="form-control select2 @error('q11.' . $key) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="q11[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value=&check;
                                                                    {{ old('q11.' . $key)  ?? $item->q11 == '&check;' ? 'selected' : '' }}
                                                                    >
                                                                    &check;
                                                                </option>
                                                                <option value=&#10007;
                                                                    {{ old('q11.' . $key)  ?? $item->q11 == '&#10007;' ? 'selected' : '' }}
                                                                    >
                                                                    &#10007;
                                                                </option>
                                                                <option value=&minus;
                                                                    {{ old('q11.' . $key)  ?? $item->q11 == '&minus;' ? 'selected' : '' }}
                                                                    >
                                                                    &minus;
                                                                </option>
                                                                @if ($item->q11 != '&check;' && $item->q11 != '&#10007;' && $item->q11 != '&minus;' && $item->q11 != null)
                                                                    <option
                                                                        value="{{ $item->q11 }}"
                                                                        selected>
                                                                        {{ $item->q11 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-12 col-md-4 col-lg-4">
                                                <table class="w-100">
                                                    <tr>
                                                        <td><label class="d-flex justify-content-center">Remarks</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text"
                                                                class="form-control @error('q12.' . $key) is-invalid @enderror"
                                                                id="q12" name="q12[]" value="{{ old('q12') ?? $item->q12 }}"
                                                                placeholder="Enter Remarks">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <hr class="border-primary">
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
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
    <script>
        function showHide(button) {
            const child = $(button).parent().find("#accordion"); // get child element
            if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up'); // logs "This is the child element"
            }
        }

        $(document).ready(function() {
            $('.select2').select2({
                tags: true
            });
        });
    </script>
@endsection
