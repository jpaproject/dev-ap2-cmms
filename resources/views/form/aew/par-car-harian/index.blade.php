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
        <form method="POST" action="{{ route('form.aew.par-car.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data" id="form">
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
                                    @foreach ($formAewParCarHarians as $key => $item)
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
                                            <label class="d-flex justify-content-center">Battery</label>
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
                                                    <label class="d-flex justify-content-center">Battery Liquid Level</label>

                                                    <select
                                                        class="form-control select2 @error('q2.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="q2[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('q2.' . $key) ?? $item->q2 == '&check;' ? 'selected' : '' }}
                                                            >
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('q2.' . $key) ?? $item->q2 == '&#10007;' ? 'selected' : '' }}
                                                            >
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('q2.' . $key) ?? $item->q2 == '&minus;' ? 'selected' : '' }}
                                                            >
                                                            &minus;
                                                        </option>

                                                        @if ($item->q2 != '&check;' && $item->q2 != '&#10007;' && $item->q2 != '&minus;' && $item->q2 != null)
                                                            <option
                                                                value="{{ $item->q2 }}"
                                                                selected>
                                                                {{ $item->q2 }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('q2.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">Battery Visual Check</label>

                                                    <select
                                                        class="form-control select2 @error('q3.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="q3[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('q3.' . $key) ?? $item->q3 == '&check;' ? 'selected' : '' }}
                                                            >
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('q3.' . $key) ?? $item->q3 == '&#10007;' ? 'selected' : '' }}
                                                            >
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('q3.' . $key) ?? $item->q3 == '&minus;' ? 'selected' : '' }}
                                                            >
                                                            &minus;
                                                        </option>
                                                        @if ($item->q3 != '&check;' && $item->q3 != '&#10007;' && $item->q3 !=  '&minus;' && $item->q3 != null)
                                                            <option
                                                                value="{{ $item->q3 }}"
                                                                selected>
                                                                {{ $item->q3 }}
                                                            </option>
                                                        @endif
                                                    </select>
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
                                                    <label class="d-flex justify-content-center">Steering</label>
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">Any Noises?</label>

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
                                                                <label class="d-flex justify-content-center">Bolts and Nuts Check</label>

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
                                                    <label class="d-flex justify-content-center">Tires</label>
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">Groove</label>
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
                                                                <label class="d-flex justify-content-center">Presuure</label>
                                                                <input type="text" class="form-control @error('q7.' . $key) is-invalid @enderror"
                                                                    id="q7" name="q7[]" value="{{ old('q7.' . $key) ?? $item->q7 }}"
                                                                    placeholder="Volt">

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
                                        <div class="row">

                                            <div class="col-12 col-md-4 col-lg-4">
                                                <table class="w-100">
                                                    <tr>
                                                        <td><label class="d-flex justify-content-center">Connecting Cables</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select
                                                                class="form-control select2 @error('q8.' . $key) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="q8[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value=&check;
                                                                    {{ old('q8.' . $key) ?? $item->q8 == '&check;' ? 'selected' : '' }}
                                                                    >
                                                                    &check;
                                                                </option>
                                                                <option value=&#10007;
                                                                    {{ old('q8.' . $key) ?? $item->q8 == '&#10007;' ? 'selected' : '' }}
                                                                    >
                                                                    &#10007;
                                                                </option>
                                                                <option value=&minus;
                                                                    {{ old('q8.' . $key) ?? $item->q8 == '&minus;' ? 'selected' : '' }}
                                                                    >
                                                                    &minus;
                                                                </option>
                                                                @if ($item->q8 != '&check;' && $item->q8 != '&#10007;' && $item->q8 != '&minus;' && $item->q8 != null)
                                                                    <option
                                                                        value="{{ $item->q8 }}"
                                                                        selected>
                                                                        {{ $item->q8 }}
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
                                                        <td><label class="d-flex justify-content-center">Ready</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select
                                                                class="form-control select2 @error('q9.' . $key) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="q9[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value=&check;
                                                                    {{ old('q9.' . $key)  ?? $item->q9 == '&check;' ? 'selected' : '' }}
                                                                    >
                                                                    &check;
                                                                </option>
                                                                <option value=&#10007;
                                                                    {{ old('q9.' . $key)  ?? $item->q9 == '&#10007;' ? 'selected' : '' }}
                                                                    >
                                                                    &#10007;
                                                                </option>
                                                                <option value=&minus;
                                                                    {{ old('q9.' . $key)  ?? $item->q9 == '&minus;' ? 'selected' : '' }}
                                                                    >
                                                                    &minus;
                                                                </option>
                                                                @if ($item->q9 != '&check;' && $item->q9 != '&#10007;' && $item->q9 != '&minus;' && $item->q9 != null)
                                                                    <option
                                                                        value="{{ $item->q9 }}"
                                                                        selected>
                                                                        {{ $item->q9 }}
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
                                                                class="form-control @error('q10.' . $key) is-invalid @enderror"
                                                                id="q10" name="q10[]" value="{{ old('q10') ?? $item->q10 }}"
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
