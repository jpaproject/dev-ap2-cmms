<?php

namespace App\Http\Controllers;
use App\Helpers\ActivityLog;
use Illuminate\Http\Request;
use App\Models\FormActivityLog;
use App\Models\FormAewPkppkHarian;
use App\Models\FormAewRubberRemoverHarian;
use App\Models\FormAewParCarHarian;
use Illuminate\Support\Facades\DB;
use App\Models\DetailWorkOrderForm;
use App\Models\UserTechnical;
use Illuminate\Support\Facades\Auth;
class FormAewController extends Controller
{
    public function formAewParCarHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Checklist Harian Par Car';
        $data['name'] = [
            'PAR CAR 03 DOMESTIC T3'
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormAewParCarHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($data['name'] as $value) {
                $formAewParCarHarian = new FormAewParCarHarian();
                $formAewParCarHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formAewParCarHarian->form_id = $detailWorkOrderForm->form_id;
                $formAewParCarHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formAewParCarHarian->name = $value;
                $formAewParCarHarian->save();
            }
        }


        $data['formAewParCarHarians'] = FormAewParCarHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // menyimpan FormActivityLog untuk status 'start'
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            // FORM LOG ACTIVITY
            ActivityLog::startLog($detailWorkOrderForm);
        }

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }

        return view('form.aew.par-car-harian.index', $data);
    }

    public function formAewParCarHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'q1.*' => ['nullable'],
            'q2.*' => ['nullable'],
            'q3.*' => ['nullable'],
            'q4.*' => ['nullable'],
            'q5.*' => ['nullable'],
            'q6.*' => ['nullable'],
            'q7.*' => ['nullable'],
            'q8.*' => ['nullable'],
            'q9.*' => ['nullable'],
            'q10.*' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataParCars = FormAewParCarHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataParCars as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->q1 = $validatedData['q1'][$key] ?? null;
                $value->q2 = $validatedData['q2'][$key] ?? null;
                $value->q3 = $validatedData['q3'][$key] ?? null;
                $value->q4 = $validatedData['q4'][$key] ?? null;
                $value->q5 = $validatedData['q5'][$key] ?? null;
                $value->q6 = $validatedData['q6'][$key] ?? null;
                $value->q7 = $validatedData['q7'][$key] ?? null;
                $value->q8 = $validatedData['q8'][$key] ?? null;
                $value->q9 = $validatedData['q9'][$key] ?? null;
                $value->q10 = $validatedData['q10'][$key] ?? null;
                $value->save();
            }
            DB::commit();

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

            DB::commit();
            if ($userTechnical) {
                return redirect()
                    ->route('user-technical.work-order-edit', $detailWorkOrderForm->work_order_id)
                    ->with(['success' => 'Data form has been updated successfully!']);
            } else {
                return redirect()
                    ->route('work-orders.show', $detailWorkOrderForm->work_order_id)
                    ->with(['success' => 'Data form has been updated successfully!']);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            if ($userTechnical) {
                return redirect()
                    ->route('user-technical.work-order-edit', $detailWorkOrderForm->work_order_id)
                    ->with(['failed' => $th->getMessage()]);
            } else {
                return redirect()
                    ->route('work-orders.show', $detailWorkOrderForm->work_order_id)
                    ->with(['failed' => $th->getMessage()]);
            }
        }
    }

    public function formAewPkppkHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Checklist Harian PKPPK';
        $data['name'] = [
            'Oshkosh Striker FT03',
            'Oshkosh Striker FT08',
            'Oshkosh Striker FT09',
            'Oshkosh Striker FT10',
            'Oshkosh Striker FT11',
            'Oshkosh Striker FT12',
            'Hino Matra P01',
            'Hino Matra P02',
            'Isuzu P03',
            'Isuzu P04',
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormAewPkppkHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($data['name'] as $value) {
                $formAewPkppkHarian = new FormAewPkppkHarian();
                $formAewPkppkHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formAewPkppkHarian->form_id = $detailWorkOrderForm->form_id;
                $formAewPkppkHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formAewPkppkHarian->name = $value;
                $formAewPkppkHarian->save();
            }
        }


        $data['formAewPkppkHarians'] = FormAewPkppkHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // menyimpan FormActivityLog untuk status 'start'
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            // FORM LOG ACTIVITY
            ActivityLog::startLog($detailWorkOrderForm);
        }

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }

        return view('form.aew.pkppk-harian.index', $data);
    }

    public function formAewPkppkHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'q1.*' => ['nullable'],
            'q2.*' => ['nullable'],
            'q3.*' => ['nullable'],
            'q4.*' => ['nullable'],
            'q5.*' => ['nullable'],
            'q6.*' => ['nullable'],
            'q7.*' => ['nullable'],
            'q8.*' => ['nullable'],
            'q9.*' => ['nullable'],
            'q10.*' => ['nullable'],
            'q11.*' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataParCars = FormAewPkppkHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataParCars as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->q1 = $validatedData['q1'][$key] ?? null;
                $value->q2 = $validatedData['q2'][$key] ?? null;
                $value->q3 = $validatedData['q3'][$key] ?? null;
                $value->q4 = $validatedData['q4'][$key] ?? null;
                $value->q5 = $validatedData['q5'][$key] ?? null;
                $value->q6 = $validatedData['q6'][$key] ?? null;
                $value->q7 = $validatedData['q7'][$key] ?? null;
                $value->q8 = $validatedData['q8'][$key] ?? null;
                $value->q9 = $validatedData['q9'][$key] ?? null;
                $value->q10 = $validatedData['q10'][$key] ?? null;
                $value->q11 = $validatedData['q11'][$key] ?? null;
                $value->save();
            }
            DB::commit();

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

            DB::commit();
            if ($userTechnical) {
                return redirect()
                    ->route('user-technical.work-order-edit', $detailWorkOrderForm->work_order_id)
                    ->with(['success' => 'Data form has been updated successfully!']);
            } else {
                return redirect()
                    ->route('work-orders.show', $detailWorkOrderForm->work_order_id)
                    ->with(['success' => 'Data form has been updated successfully!']);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            if ($userTechnical) {
                return redirect()
                    ->route('user-technical.work-order-edit', $detailWorkOrderForm->work_order_id)
                    ->with(['failed' => $th->getMessage()]);
            } else {
                return redirect()
                    ->route('work-orders.show', $detailWorkOrderForm->work_order_id)
                    ->with(['failed' => $th->getMessage()]);
            }
        }
    }

    public function formAewRubberRemoverHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Checklist Harian Rubber Remover';
        $data['name'] = [
            'RUBBER REMOVER OSPREY',
            'RUBBER REMOVER CYCLONE 02',
            'RUBBER REMOVER CYCLONE 03',
            'RUBBER REMOVER CYCLONE 04',
            'RUNWAY SWEEPER BEAM 13',
            'RUNWAY SWEEPER BEAM 14',
            'RUNWAY SWEEPER SCARAB 03',
            'RUNWAY SWEEPER SCARAB 04',
            'SKIDDOMETER BV11',
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormAewRubberRemoverHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($data['name'] as $value) {
                $formAewRubberRemoverHarian = new FormAewRubberRemoverHarian();
                $formAewRubberRemoverHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formAewRubberRemoverHarian->form_id = $detailWorkOrderForm->form_id;
                $formAewRubberRemoverHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formAewRubberRemoverHarian->name = $value;
                $formAewRubberRemoverHarian->save();
            }
        }


        $data['formAewRubberRemoverHarians'] = FormAewRubberRemoverHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // menyimpan FormActivityLog untuk status 'start'
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            // FORM LOG ACTIVITY
            ActivityLog::startLog($detailWorkOrderForm);
        }

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }

        return view('form.aew.rubber-remover-harian.index', $data);
    }

    public function formAewRubberRemoverHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'q1.*' => ['nullable'],
            'q2.*' => ['nullable'],
            'q3.*' => ['nullable'],
            'q4.*' => ['nullable'],
            'q5.*' => ['nullable'],
            'q6.*' => ['nullable'],
            'q7.*' => ['nullable'],
            'q8.*' => ['nullable'],
            'q9.*' => ['nullable'],
            'q10.*' => ['nullable'],
            'q11.*' => ['nullable'],
            'q12.*' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataParCars = FormAewRubberRemoverHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataParCars as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->q1 = $validatedData['q1'][$key] ?? null;
                $value->q2 = $validatedData['q2'][$key] ?? null;
                $value->q3 = $validatedData['q3'][$key] ?? null;
                $value->q4 = $validatedData['q4'][$key] ?? null;
                $value->q5 = $validatedData['q5'][$key] ?? null;
                $value->q6 = $validatedData['q6'][$key] ?? null;
                $value->q7 = $validatedData['q7'][$key] ?? null;
                $value->q8 = $validatedData['q8'][$key] ?? null;
                $value->q9 = $validatedData['q9'][$key] ?? null;
                $value->q10 = $validatedData['q10'][$key] ?? null;
                $value->q11 = $validatedData['q11'][$key] ?? null;
                $value->q12 = $validatedData['q12'][$key] ?? null;
                $value->save();
            }
            DB::commit();

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

            DB::commit();
            if ($userTechnical) {
                return redirect()
                    ->route('user-technical.work-order-edit', $detailWorkOrderForm->work_order_id)
                    ->with(['success' => 'Data form has been updated successfully!']);
            } else {
                return redirect()
                    ->route('work-orders.show', $detailWorkOrderForm->work_order_id)
                    ->with(['success' => 'Data form has been updated successfully!']);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            if ($userTechnical) {
                return redirect()
                    ->route('user-technical.work-order-edit', $detailWorkOrderForm->work_order_id)
                    ->with(['failed' => $th->getMessage()]);
            } else {
                return redirect()
                    ->route('work-orders.show', $detailWorkOrderForm->work_order_id)
                    ->with(['failed' => $th->getMessage()]);
            }
        }
    }
}