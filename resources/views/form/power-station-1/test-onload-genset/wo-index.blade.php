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
