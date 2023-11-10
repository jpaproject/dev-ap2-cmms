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
                        </div>

                        <form method="POST"
                            action="{{ route('form.ps1.form-genset-standby-tiga-bulanan.update', $detailWorkOrderForm->id) }}"
                            enctype="multipart/form-data" id="form">
                            @method('patch')
                            @csrf

                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs1GensetStandbyTigaBulanans as $key => $formPs1GensetStandbyTigaBulanan)
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <h5>{{ $tigaBulanans[$key]['dataTeknis'] }}</h5>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Genset 1</label>
                                                        <input type="text"
                                                            class="form-control @error('gensetq1.' . $key) is-invalid @enderror"
                                                            id="gensetq1" name="gensetq1[]"
                                                            value="{{ $formPs1GensetStandbyTigaBulanan->q1 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('gensetq1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Genset 2</label>
                                                        <input type="text"
                                                            class="form-control @error('gensetq2.' . $key) is-invalid @enderror"
                                                            id="gensetq2" name="gensetq2[]"
                                                            value="{{ $formPs1GensetStandbyTigaBulanan->q2 ?? '' }}"
                                                            placeholder="Enter..">
                                                        </select>
                                                        @error('gensetq2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Satuan</label>
                                                        @if (in_array($key, [0,1,2,3,4,7,15,18,19,20,21,22]))
                                                            <input type="text"
                                                                class="form-control @error('satuan.' . $key) is-invalid @enderror"
                                                                id="satuan" name="satuan[]"
                                                                value="{{ old('satuan.' . $key) ?? $tigaBulanans[$key]['satuan'] }}"
                                                                readonly placeholder="Enter..">
                                                        @else
                                                            <select
                                                                class="form-control  @error('satuan') is-invalid @enderror"
                                                                name="satuan[]">
                                                                <option value=" " selected>Choose Selection</option>
                                                                @if (in_array($key, [5,8,9]))
                                                                    <option value="auto"
                                                                        {{ (old('satuan.' . $key) ?? $formPs1GensetStandbyTigaBulanan->q3) == 'auto' ? 'selected' : '' }}>
                                                                        Auto</option>
                                                                    <option value="man"
                                                                        {{ (old('satuan.' . $key) ?? $formPs1GensetStandbyTigaBulanan->q3) == 'man' ? 'selected' : '' }}>
                                                                        Man</option>
                                                                    <option value="off"
                                                                        {{ (old('satuan.' . $key) ?? $formPs1GensetStandbyTigaBulanan->q3) == 'off' ? 'selected' : '' }}>
                                                                        Off</option>
                                                                @endif
                                                                @if (in_array($key, [6]))
                                                                    <option value="good"
                                                                        {{ (old('satuan.' . $key) ?? $formPs1GensetStandbyTigaBulanan->q3) == 'good' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                    <option value="bad"
                                                                        {{ (old('satuan.' . $key) ?? $formPs1GensetStandbyTigaBulanan->q3) == 'bad' ? 'selected' : '' }}>
                                                                        Exhaust</option>
                                                                @endif
                                                                @if (in_array($key, [10,11,12,13,14]))
                                                                    <option value="open"
                                                                        {{ (old('satuan.' . $key) ?? $formPs1GensetStandbyTigaBulanan->q3) == 'open' ? 'selected' : '' }}>
                                                                        Open</option>
                                                                    <option value="close"
                                                                        {{ (old('satuan.' . $key) ?? $formPs1GensetStandbyTigaBulanan->q3) == 'close' ? 'selected' : '' }}>
                                                                        Close</option>
                                                                @endif
                                                                @if (in_array($key, [16,17]))
                                                                    <option value="low"
                                                                        {{ (old('satuan.' . $key) ?? $formPs1GensetStandbyTigaBulanan->q3) == 'low' ? 'selected' : '' }}>
                                                                        Low</option>
                                                                    <option value="medium"
                                                                        {{ (old('satuan.' . $key) ?? $formPs1GensetStandbyTigaBulanan->q3) == 'medium' ? 'selected' : '' }}>
                                                                        Medium</option>
                                                                    <option value="max"
                                                                        {{ (old('satuan.' . $key) ?? $formPs1GensetStandbyTigaBulanan->q3) == 'max' ? 'selected' : '' }}>
                                                                        Max</option>
                                                                @endif
                                                            </select>
                                                        @endif
                                                        @error('satuan.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Ketengangan</label>
                                                        <input type="text"
                                                            class="form-control @error('keterangan.' . $key) is-invalid @enderror"
                                                            id="keterangan" name="keterangan[]"
                                                            value="{{ $formPs1GensetStandbyTigaBulanan->q4 ?? '' }}"
                                                            placeholder="Enter..">
                                                        </select>
                                                        @error('keterangan.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
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
                                                            placeholder="Deskripsi">{!! $formPs1GensetStandbyTigaBulanans[0]->catatan ?? '' !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
@endsection
