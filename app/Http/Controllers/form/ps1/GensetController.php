<?php

namespace App\Http\Controllers\form\ps1;

use App\Models\Asset;
use App\Models\DetailWorkOrderForm;
use App\Models\FormActivityLog;
use App\Models\FormPs1GensetMobile;
use App\Models\FormPs1GensetMobileDuaMingguan;
use App\Models\FormPs1GensetMobileTigaBulanan;
use App\Models\FormPs1GensetMobileEnamBulanan;
use App\Models\FormPs1GensetMobileTahunan;
use App\Models\FormPs1GensetHarian;
use App\Models\FormPs1GensetHarianPower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\UserTechnical;

class GensetController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:work-order-list', ['only' => 'index']);
        $this->middleware('permission:work-order-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:work-order-detail', ['only' => 'show']);
        $this->middleware('permission:work-order-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:work-order-delete', ['only' => ['destroy']]);
    }

    public function formPs1GensetMobile(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM MOBILISASI GENSET MOBILE';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs1GensetMobile::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs1GensetMobile = new FormPs1GensetMobile();
            $formPs1GensetMobile->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs1GensetMobile->form_id = $detailWorkOrderForm->form_id;
            $formPs1GensetMobile->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs1GensetMobile->save();
        }
        $data['formPs1GensetMobile'] = $detailWorkOrderForm->formPs1GensetMobile;

        // menyimpan FormActivityLog untuk status 'start'
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            //Form Log Activity
            ActivityLog::startLog($detailWorkOrderForm);
        }

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.ps1.genset-mobile.index', $data);
    }

    public function formPs1GensetMobileUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Checklist Harian Panel Lv';
        $validatedData = $request->validate([
            'q1' => ['nullable'],
            'q2' => ['nullable'],
            'q3' => ['nullable'],
            'q4' => ['nullable'],
            'q5' => ['nullable'],
            'q6' => ['nullable'],
            'q7' => ['nullable'],
            'q1b' => ['nullable'],
            'q2b' => ['nullable'],
            'q3b' => ['nullable'],
            'q4b' => ['nullable'],
            'q5b' => ['nullable'],
            'q6b' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $data = FormPs1GensetMobile::findOrFail($detailWorkOrderForm->formPs1GensetMobile->id);
            $data->form_id = $detailWorkOrderForm->form_id;

            $data->q1 = $validatedData['q1'] ?? null;
            $data->q2 = $validatedData['q2'] ?? null;
            $data->q3 = $validatedData['q3'] ?? null;
            $data->q4 = $validatedData['q4'] ?? null;
            $data->q5 = $validatedData['q5'] ?? null;
            $data->q6 = $validatedData['q6'] ?? null;
            $data->q7 = $validatedData['q7'] ?? null;

            $data->q1b = $validatedData['q1b'] ?? null;
            $data->q2b = $validatedData['q2b'] ?? null;
            $data->q3b = $validatedData['q3b'] ?? null;
            $data->q4b = $validatedData['q4b'] ?? null;
            $data->q5b = $validatedData['q5b'] ?? null;
            $data->q6b = $validatedData['q6b'] ?? null;
            $data->save();

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

    public function formPs1GensetMobileDuaMingguan(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'WORK ORDER GENSET MOBILE 8, 60,100,430,500,1000 KVA 2 Mingguan';

        $pertanyaan = [['data_teknis' => 'Batt. Starter', 'satuan' => 'Vdc'], ['data_teknis' => 'T.BBM genset', 'satuan' => 'Liter'], ['data_teknis' => 'Ampere Meter', 'satuan' => 'A'], ['data_teknis' => 'Volt Meter', 'satuan' => 'V'], ['data_teknis' => 'Frequency', 'satuan' => 'Hz'], ['data_teknis' => 'Watt Meter', 'satuan' => 'Kw'], ['data_teknis' => 'Power Factor', 'satuan' => 'pf'], ['data_teknis' => 'Engine Speed', 'satuan' => 'rpm'], ['data_teknis' => 'Level air radiator', 'satuan' => 'max'], ['data_teknis' => 'Level Oli Mesin', 'satuan' => 'max'], ['data_teknis' => 'Eng.Oil Press.', 'satuan' => 'barr'], ['data_teknis' => 'Eng. Coolant temp', 'satuan' => 'c°'], ['data_teknis' => 'Eng. Run Time', 'satuan' => 'hours'], ['data_teknis' => 'Eng. Inlet temp', 'satuan' => 'c°']];

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        // if (!FormPs1GensetMobileDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
        //     $formPs1GensetMobileDuaMingguan = new FormPs1GensetMobileDuaMingguan();
        //     $formPs1GensetMobileDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
        //     $formPs1GensetMobileDuaMingguan->form_id = $detailWorkOrderForm->form_id;
        //     $formPs1GensetMobileDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
        //     $formPs1GensetMobileDuaMingguan->save();
        // }
        // $data['formPs1GensetMobileDuaMingguan'] = $detailWorkOrderForm->formPs1GensetMobileDuaMingguan;

        if (!FormPs1GensetMobileDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($pertanyaan as $value) {
                $formPs1GensetMobileDuaMingguan = new FormPs1GensetMobileDuaMingguan();
                $formPs1GensetMobileDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1GensetMobileDuaMingguan->pertanyaan = $value['data_teknis'];
                $formPs1GensetMobileDuaMingguan->satuan = $value['satuan'];
                $formPs1GensetMobileDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs1GensetMobileDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1GensetMobileDuaMingguan->save();
            }
        }
        $data['formPs1GensetMobileDuaMingguans'] = FormPs1GensetMobileDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // menyimpan FormActivityLog untuk status 'start'
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            //Form Log Activity
            ActivityLog::startLog($detailWorkOrderForm);
        }

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.ps1.genset-mobile-dua-mingguan.index', $data);
    }

    public function formPs1GensetMobileDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tipe' => ['nullable'],
            'value.*' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataControls = FormPs1GensetMobileDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataControls as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->tipe = $validatedData['tipe'] ?? null;
                $value->value = $validatedData['value'][$key] ?? null;
                $value->save();
            }
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

    public function formPs1GensetMobileTigaBulanan(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'WORK ORDER GENSET MOBILE 8, 60,100,430,500,1000 KVA 6 Bulanan';

        $pertanyaan = [['data_teknis' => 'Batt. Starter', 'satuan' => 'Vdc'], ['data_teknis' => 'T.BBM genset', 'satuan' => 'Liter'], ['data_teknis' => 'Ampere Meter', 'satuan' => 'A'], ['data_teknis' => 'Volt Meter', 'satuan' => 'V'], ['data_teknis' => 'Frequency', 'satuan' => 'Hz'], ['data_teknis' => 'Watt Meter', 'satuan' => 'Kw'], ['data_teknis' => 'Power Factor', 'satuan' => 'pf'], ['data_teknis' => 'Engine Speed', 'satuan' => 'rpm'], ['data_teknis' => 'Level air radiator', 'satuan' => 'max'], ['data_teknis' => 'Level Oli Mesin', 'satuan' => 'max'], ['data_teknis' => 'Eng.Oil Press.', 'satuan' => 'barr'], ['data_teknis' => 'Eng. Coolant temp', 'satuan' => 'c°'], ['data_teknis' => 'Eng. Run Time', 'satuan' => 'hours'], ['data_teknis' => 'Eng. Inlet temp', 'satuan' => 'c°']];

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        // if (!FormPs1GensetMobileDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
        //     $formPs1GensetMobileDuaMingguan = new FormPs1GensetMobileDuaMingguan();
        //     $formPs1GensetMobileDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
        //     $formPs1GensetMobileDuaMingguan->form_id = $detailWorkOrderForm->form_id;
        //     $formPs1GensetMobileDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
        //     $formPs1GensetMobileDuaMingguan->save();
        // }
        // $data['formPs1GensetMobileDuaMingguan'] = $detailWorkOrderForm->formPs1GensetMobileDuaMingguan;

        if (!FormPs1GensetMobileTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($pertanyaan as $value) {
                $formPs1GensetMobileTigaBulanan = new FormPs1GensetMobileTigaBulanan();
                $formPs1GensetMobileTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1GensetMobileTigaBulanan->pertanyaan = $value['data_teknis'];
                $formPs1GensetMobileTigaBulanan->satuan = $value['satuan'];
                $formPs1GensetMobileTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formPs1GensetMobileTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1GensetMobileTigaBulanan->save();
            }
        }
        $data['formPs1GensetMobileTigaBulanans'] = FormPs1GensetMobileTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // menyimpan FormActivityLog untuk status 'start'
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            //Form Log Activity
            ActivityLog::startLog($detailWorkOrderForm);
        }

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.ps1.genset-mobile-tiga-bulanan.index', $data);
    }

    public function formPs1GensetMobileTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tipe' => ['nullable'],
            'value.*' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataControls = FormPs1GensetMobileTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataControls as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->tipe = $validatedData['tipe'] ?? null;
                $value->value = $validatedData['value'][$key] ?? null;
                $value->save();
            }
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
    public function formPs1GensetMobileEnamBulanan(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'WORK ORDER GENSET MOBILE 8, 60,100,430,500,1000 KVA 6 Bulanan';

        $pertanyaan = [
            ['data_teknis' => 'Batt. Starter', 'satuan' => 'Vdc'],
            ['data_teknis' => 'T.BBM genset', 'satuan' => 'Liter'],
            ['data_teknis' => 'Ampere Meter', 'satuan' => 'A'],
            ['data_teknis' => 'Volt Meter', 'satuan' => 'V'],
            ['data_teknis' => 'Frequency', 'satuan' => 'Hz'],
            ['data_teknis' => 'Watt Meter', 'satuan' => 'Kw'],
            ['data_teknis' => 'Power Factor', 'satuan' => 'pf'],
            ['data_teknis' => 'Engine Speed', 'satuan' => 'rpm'],
            ['data_teknis' => 'Level air radiator', 'satuan' => 'max'],
            ['data_teknis' => 'Level Oli Mesin', 'satuan' => 'max'],
            ['data_teknis' => 'Eng.Oil Press.', 'satuan' => 'barr'],
            ['data_teknis' => 'Eng. Coolant temp', 'satuan' => 'c°'],
            ['data_teknis' => 'Eng. Run Time', 'satuan' => 'hours'],
            ['data_teknis' => 'Eng. Inlet temp', 'satuan' => 'c°'],
            ['data_teknis' => 'signal Gs Standby Auto', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Gs Onload', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Gs Fail to start', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Gs Fail To stop', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Gs High coolant temp.', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Gs Low Oil Press', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Gs Alternator Voltage fault', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Gs General alarm', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Gs Blocked', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Gs Available', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Gs Comm Alarm', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Gs Hi Temp shutdown', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Gs Overspeed Shutdown', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Daily tank high alarm', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal Daily tank low alarm', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal fuel pump 1 alarm', 'satuan' => 'Normal'],
            ['data_teknis' => 'Signal fuel pump 2 alarm', 'satuan' => 'Normal'],
        ];

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        // if (!FormPs1GensetMobileDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
        //     $formPs1GensetMobileDuaMingguan = new FormPs1GensetMobileDuaMingguan();
        //     $formPs1GensetMobileDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
        //     $formPs1GensetMobileDuaMingguan->form_id = $detailWorkOrderForm->form_id;
        //     $formPs1GensetMobileDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
        //     $formPs1GensetMobileDuaMingguan->save();
        // }
        // $data['formPs1GensetMobileDuaMingguan'] = $detailWorkOrderForm->formPs1GensetMobileDuaMingguan;

        if (!FormPs1GensetMobileEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($pertanyaan as $value) {
                $formPs1GensetMobileEnamBulanan = new FormPs1GensetMobileEnamBulanan();
                $formPs1GensetMobileEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1GensetMobileEnamBulanan->pertanyaan = $value['data_teknis'];
                $formPs1GensetMobileEnamBulanan->satuan = $value['satuan'];
                $formPs1GensetMobileEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formPs1GensetMobileEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1GensetMobileEnamBulanan->save();
            }
        }
        $data['formPs1GensetMobileEnamBulanans'] = FormPs1GensetMobileEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // menyimpan FormActivityLog untuk status 'start'
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            //Form Log Activity
            ActivityLog::startLog($detailWorkOrderForm);
        }

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.ps1.genset-mobile-enam-bulanan.index', $data);
    }

    public function formPs1GensetMobileEnamBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tipe' => ['nullable'],
            'value.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataControls = FormPs1GensetMobileEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataControls as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->tipe = $validatedData['tipe'] ?? null;
                $value->value = $validatedData['value'][$key] ?? null;
                $value->keterangan = $validatedData['keterangan'][$key] ?? null;
                $value->save();
            }
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
    public function formPs1GensetMobileTahunan(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'WORK ORDER GENSET MOBILE 8, 60,100,430,500,1000 KVA Tahunan';

        $pertanyaan = [['data_teknis' => 'Batt. Starter', 'satuan' => 'Vdc'], ['data_teknis' => 'T.BBM genset', 'satuan' => 'Liter'], ['data_teknis' => 'Ampere Meter', 'satuan' => 'A'], ['data_teknis' => 'Volt Meter', 'satuan' => 'V'], ['data_teknis' => 'Frequency', 'satuan' => 'Hz'], ['data_teknis' => 'Watt Meter', 'satuan' => 'Kw'], ['data_teknis' => 'Power Factor', 'satuan' => 'pf'], ['data_teknis' => 'Engine Speed', 'satuan' => 'rpm'], ['data_teknis' => 'Level air radiator', 'satuan' => 'max'], ['data_teknis' => 'Level Oli Mesin', 'satuan' => 'max'], ['data_teknis' => 'Eng.Oil Press.', 'satuan' => 'barr'], ['data_teknis' => 'Eng. Coolant temp', 'satuan' => 'c°'], ['data_teknis' => 'Eng. Run Time', 'satuan' => 'hours'], ['data_teknis' => 'Eng. Inlet temp', 'satuan' => 'c°']];

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        // if (!FormPs1GensetMobileDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
        //     $formPs1GensetMobileDuaMingguan = new FormPs1GensetMobileDuaMingguan();
        //     $formPs1GensetMobileDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
        //     $formPs1GensetMobileDuaMingguan->form_id = $detailWorkOrderForm->form_id;
        //     $formPs1GensetMobileDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
        //     $formPs1GensetMobileDuaMingguan->save();
        // }
        // $data['formPs1GensetMobileDuaMingguan'] = $detailWorkOrderForm->formPs1GensetMobileDuaMingguan;

        if (!FormPs1GensetMobileTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($pertanyaan as $value) {
                $formPs1GensetMobileTahunan = new FormPs1GensetMobileTahunan();
                $formPs1GensetMobileTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1GensetMobileTahunan->pertanyaan = $value['data_teknis'];
                $formPs1GensetMobileTahunan->satuan = $value['satuan'];
                $formPs1GensetMobileTahunan->form_id = $detailWorkOrderForm->form_id;
                $formPs1GensetMobileTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1GensetMobileTahunan->save();
            }
        }
        $data['formPs1GensetMobileTahunans'] = FormPs1GensetMobileTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // menyimpan FormActivityLog untuk status 'start'
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            //Form Log Activity
            ActivityLog::startLog($detailWorkOrderForm);
        }

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.ps1.genset-mobile-tahunan.index', $data);
    }

    public function formPs1GensetMobileTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tipe' => ['nullable'],
            'value.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataControls = FormPs1GensetMobileTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataControls as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->tipe = $validatedData['tipe'] ?? null;
                $value->value = $validatedData['value'][$key] ?? null;
                $value->keterangan = $validatedData['keterangan'][$key] ?? null;
                $value->save();
            }
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
    public function formPs1GensetHarian(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'CHECK LIST HARIAN PERALATAN MPS 1';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs1GensetHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs1GensetHarian = new FormPs1GensetHarian();
            $formPs1GensetHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs1GensetHarian->form_id = $detailWorkOrderForm->form_id;
            $formPs1GensetHarian->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs1GensetHarian->save();
        }
        $data['formPs1GensetHarian'] = $detailWorkOrderForm->formPs1GensetHarian;

        $powerER6 = ['XCa', 'XCb', 'XCd', 'XCe', 'XCm', 'XCn', 'XSp', 'XSq', 'XCr', 'XCs,'];

        $powerER7 = ['XSk', 'XCm', 'XCn'];
        if (
            !FormPs1GensetHarianPower::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er6')
                ->first()
        ) {
            foreach ($powerER6 as $value) {
                $formPs1GensetHarianPower = new FormPs1GensetHarianPower();
                $formPs1GensetHarianPower->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1GensetHarianPower->grup = 'er6';
                $formPs1GensetHarianPower->nama = $value;
                $formPs1GensetHarianPower->form_id = $detailWorkOrderForm->form_id;
                $formPs1GensetHarianPower->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1GensetHarianPower->save();
            }
        }
        $data['formPs1GensetHarianPowerER6'] = FormPs1GensetHarianPower::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er6')
            ->orderBy('id', 'asc')
            ->get();

        if (
            !FormPs1GensetHarianPower::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er7')
                ->first()
        ) {
            foreach ($powerER7 as $value) {
                $formPs1GensetHarianPower = new FormPs1GensetHarianPower();
                $formPs1GensetHarianPower->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1GensetHarianPower->grup = 'er7';
                $formPs1GensetHarianPower->nama = $value;
                $formPs1GensetHarianPower->form_id = $detailWorkOrderForm->form_id;
                $formPs1GensetHarianPower->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1GensetHarianPower->save();
            }
        }
        $data['formPs1GensetHarianPowerER7'] = FormPs1GensetHarianPower::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er7')
            ->orderBy('id', 'asc')
            ->get();

        // menyimpan FormActivityLog untuk status 'start'
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            //Form Log Activity
            ActivityLog::startLog($detailWorkOrderForm);
        }

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.ps1.genset.index', $data);
    }

    public function formPs1GensetHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'CHECK LIST HARIAN PERALATAN MPS 1';
        $validatedData = $request->validate([
            'q1a_cd' => ['nullable'],
            'q1b_cd' => ['nullable'],
            'q2a_cd' => ['nullable'],
            'q2b_cd' => ['nullable'],
            'q3a_cd' => ['nullable'],
            'q3b_cd' => ['nullable'],
            'q3_keterangan_cd' => ['nullable'],
            'q4a_cd' => ['nullable'],
            'q4b_cd' => ['nullable'],
            'q4_keterangan_cd' => ['nullable'],
            'q5a_cd' => ['nullable'],
            'q5b_cd' => ['nullable'],
            'q5_keterangan_cd' => ['nullable'],

            'q1a' => ['nullable'],
            'q1b' => ['nullable'],
            'q2a' => ['nullable'],
            'q2b' => ['nullable'],
            'q3a' => ['nullable'],
            'q3b' => ['nullable'],
            'q4a' => ['nullable'],
            'q4b' => ['nullable'],
            'q5a' => ['nullable'],
            'q5b' => ['nullable'],
            'q6a' => ['nullable'],
            'q6b' => ['nullable'],
            'q7a' => ['nullable'],
            'q7b' => ['nullable'],
            'q8a' => ['nullable'],
            'q8b' => ['nullable'],
            'q9a' => ['nullable'],
            'q9b' => ['nullable'],
            'q10a' => ['nullable'],
            'q10b' => ['nullable'],
            'q10_keterangan' => ['nullable'],
            'q11a' => ['nullable'],
            'q11b' => ['nullable'],
            'q12a' => ['nullable'],
            'q12b' => ['nullable'],
            'q13a' => ['nullable'],
            'q13b' => ['nullable'],
            'q14a' => ['nullable'],
            'q14b' => ['nullable'],
            'q14_keterangan' => ['nullable'],
            'tank1' => ['nullable'],
            'tank2' => ['nullable'],
            'tank3' => ['nullable'],
        ]);

        $validatedDataPower = $request->validate([
            'posisi_.*' => ['nullable'],
            'local_.*' => ['nullable'],
            'remote_.*' => ['nullable'],
            'parameter_.*' => ['nullable'],
            'keterangan_.*' => ['nullable'],
        ]);

        $data = FormPs1GensetHarian::findOrFail($detailWorkOrderForm->formPs1GensetHarian->id);
        $data->form_id = $detailWorkOrderForm->form_id;

        $data->q1a_cd = $validatedData['q1a_cd'] ?? null;
        $data->q1b_cd = $validatedData['q1b_cd'] ?? null;
        $data->q2a_cd = $validatedData['q2a_cd'] ?? null;
        $data->q2b_cd = $validatedData['q2b_cd'] ?? null;
        $data->q3a_cd = $validatedData['q3a_cd'] ?? null;
        $data->q3b_cd = $validatedData['q3b_cd'] ?? null;
        $data->q3_keterangan_cd = $validatedData['q3_keterangan_cd'] ?? null;
        $data->q4a_cd = $validatedData['q4a_cd'] ?? null;
        $data->q4b_cd = $validatedData['q4b_cd'] ?? null;
        $data->q4_keterangan_cd = $validatedData['q4_keterangan_cd'] ?? null;
        $data->q5a_cd = $validatedData['q5a_cd'] ?? null;
        $data->q5b_cd = $validatedData['q5b_cd'] ?? null;
        $data->q5_keterangan_cd = $validatedData['q5_keterangan_cd'] ?? null;

        $data->q1a = $validatedData['q1a'] ?? null;
        $data->q2a = $validatedData['q2a'] ?? null;
        $data->q3a = $validatedData['q3a'] ?? null;
        $data->q4a = $validatedData['q4a'] ?? null;
        $data->q5a = $validatedData['q5a'] ?? null;
        $data->q6a = $validatedData['q6a'] ?? null;
        $data->q7a = $validatedData['q7a'] ?? null;
        $data->q8a = $validatedData['q8a'] ?? null;
        $data->q9a = $validatedData['q9a'] ?? null;
        $data->q10a = $validatedData['q10a'] ?? null;
        $data->q11a = $validatedData['q11a'] ?? null;
        $data->q12a = $validatedData['q12a'] ?? null;
        $data->q13a = $validatedData['q13a'] ?? null;
        $data->q14a = $validatedData['q14a'] ?? null;

        $data->q1b = $validatedData['q1b'] ?? null;
        $data->q2b = $validatedData['q2b'] ?? null;
        $data->q3b = $validatedData['q3b'] ?? null;
        $data->q4b = $validatedData['q4b'] ?? null;
        $data->q5b = $validatedData['q5b'] ?? null;
        $data->q6b = $validatedData['q6b'] ?? null;
        $data->q7b = $validatedData['q7b'] ?? null;
        $data->q8b = $validatedData['q8b'] ?? null;
        $data->q9b = $validatedData['q9b'] ?? null;
        $data->q10b = $validatedData['q10b'] ?? null;
        $data->q11b = $validatedData['q11b'] ?? null;
        $data->q12b = $validatedData['q12b'] ?? null;
        $data->q13b = $validatedData['q13b'] ?? null;
        $data->q14b = $validatedData['q14b'] ?? null;

        $data->q10_keterangan = $validatedData['q10_keterangan'] ?? null;
        $data->q14_keterangan = $validatedData['q14_keterangan'] ?? null;

        $data->tank1 = $validatedData['tank1'] ?? null;
        $data->tank2 = $validatedData['tank2'] ?? null;
        $data->tank3 = $validatedData['tank3'] ?? null;

        $data->save();

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataEXTs = FormPs1GensetHarianPower::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'ext')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataEXTs as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                // $value->grup = 'ext';
                // $value->cubicle = $validatedDataEXT['cubicle_ext_'][$key] ?? null;
                // $value->keterangan = $validatedDataEXT['keterangan_ext_'][$key] ?? null;
                $value->posisi = $validatedDataPower['posisi_'][$key] ?? null;
                $value->local = $validatedDataPower['local_'][$key] ?? null;
                $value->remote = $validatedDataPower['remote_'][$key] ?? null;
                $value->parameter = $validatedDataPower['parameter_'][$key] ?? null;
                $value->keterangan = $validatedDataPower['keterangan_'][$key] ?? null;
                $value->save();
            }

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
