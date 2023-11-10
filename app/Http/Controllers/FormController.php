<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Asset;
use App\Helpers\FormPs2;
use App\Helpers\ActivityLog;
use Illuminate\Http\Request;
use App\Models\FormActivityLog;
use App\Models\FormPs2PanelHarian;
use App\Models\FormPs2PanelPhAocc;
use Illuminate\Support\Facades\DB;
use App\Models\DetailWorkOrderForm;
use Illuminate\Support\Facades\Auth;
use App\Models\ChecklistGensetPhAocc;
use App\Models\FormPs2PanelPhAoccMain;
use App\Models\FormPs2PanelDuaMingguan;
use App\Models\FormPs2PanelPhAoccPanel;
use App\Models\FormPs3GensetRoomHarian;
use Illuminate\Support\Facades\Session;
use App\Models\FormPs2GensetDuaMingguan;
use App\Models\FormPs3ControlRoomHarian;
use App\Models\FormPs2GensetPhAoccHarian;
use App\Models\FormPs2GensetRunningHarian;
use App\Models\formPs2ChecklistPanelLvHarian;
use App\Models\FormPs2GensetDuaMingguanTank;
use App\Models\FormPs2GroundTankDuaMingguan;
use App\Models\FormPs2GensetDuaMingguanTrafo;
use App\Models\FormPs2RuangTenagaDuaMingguan;
use App\Models\FormPs2GensetDuaMingguanGenset;
use App\Models\FormPs2GensetPhAoccDuaMingguan;
use App\Models\FormPs2PemeliharaanEnamBulanan;
use App\Models\ChecklistHarianGensetPs2GensetRoom;
use App\Models\ChecklistHarianGensetPs2ControlRoom;
use App\Models\FormPs2GensetRunningHarianKeterangan;
use App\Models\LaporanKerusakanElectricalProtection;
use App\Models\UserTechnical;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:work-order-list', ['only' => 'index']);
        $this->middleware('permission:work-order-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:work-order-detail', ['only' => 'show']);
        $this->middleware('permission:work-order-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:work-order-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data['page_title'] = 'Form List';
        $data['forms'] = Form::orderBy('id', 'desc')->get();

        return view('form.index', $data);
    }

    public function create()
    {
        $data['page_title'] = 'Form List';

        return view('form.create', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:forms,name'],
            'route' => ['required'],
        ]);

        $form = new Form();
        $form->name = $validatedData['name'];
        $form->route = $validatedData['route'];
        $form->save();

        return redirect()
            ->route('form.index')
            ->with(['success' => 'New Form added successfully!']);
    }

    public function edit(Form $form)
    {
        $data['page_title'] = 'Form List';
        $data['form'] = $form;

        return view('form.edit', $data);
    }

    public function update(Request $request, Form $form)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:forms,name,' . $form->id],
            'route' => ['required'],
        ]);

        $form->name = $validatedData['name'];
        $form->route = $validatedData['route'];
        $form->save();

        return redirect()
            ->route('form.index')
            ->with(['success' => 'Form editted successfully!']);
    }

    public function destroy(Form $form)
    {
        try {
            $form->delete();

            Session::flash('success', 'Form Deleted successfully!');

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Form successfully deleted',
                ],
                200,
            );
        } catch (\Throwable $th) {
            Session::flash('failed', $th->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => $th->getMessage(),
                ],
                200,
            );
        }
    }

    public function indexEP(Request $request)
    {
        $data['page_title'] = 'Form Electrical Protection';

        return view('form.electrical-protection.index', $data);
    }

    public function indexPS(Request $request)
    {
        $data['page_title'] = 'Form Power Station';

        return view('form.power-station-2.index', $data);
    }

    public function indexHVMV(Request $request)
    {
        $data['page_title'] = 'Form HV & MV Station';

        return view('form.hv&mv-station.index', $data);
    }

    public function indexEU(Request $request)
    {
        $data['page_title'] = 'Form Electrical Utility';

        return view('form.eu.index', $data);
    }

    // public function indexSistemPelaporan(Request $request)
    // {
    // $data['page_title'] = 'Form Sistem Pelaporan HV & MV';

    // return view('form.hv&mv-station.sistem-pelaporan.index', $data);
    // }

    /* --- Power Station 2 --- */

    // public function gensetPhAocc(Request $request)
    // {
    //     $data['page_title'] = 'Form Checklist Genset Ph Aocc';

    //     return view('form.power-station-2.genset-ph-aocc.index-2', $data);
    // }

    // public function harianPanelLv(Request $request)
    // {
    //     $data['page_title'] = 'Form Checklist Harian Panel Lv';

    //     return view('form.power-station-2.harian-panel-lv.index', $data);
    // }

    // public function harianPanel(Request $request)
    // {
    //     $data['page_title'] = 'Form Checklist Harian Panel';
    //     $data['er2a'] = [
    //         ['cubicle' => 'MCA', 'keterangan' => 'INCOMING PLN (GH127)'],
    //         ['cubicle' => 'MCB', 'keterangan' => 'INCOMING PLN (GH127)'],
    //         ['cubicle' => 'MSC', 'keterangan' => 'TRAFO AUXILIARY A'],
    //         ['cubicle' => 'MSD', 'keterangan' => 'T1 LOOP 1'],
    //         ['cubicle' => 'MSE', 'keterangan' => 'T1 LOOP 2'],
    //         ['cubicle' => 'MSF', 'keterangan' => 'T1 LOOP 3'],
    //         ['cubicle' => 'MSG', 'keterangan' => 'T2 LOOP 2'],
    //         ['cubicle' => 'MSH', 'keterangan' => 'T2 LOOP 1'],
    //         ['cubicle' => 'MSI', 'keterangan' => 'T2 LOOP 3 '],
    //         ['cubicle' => 'MSS', 'keterangan' => 'TEKNIKAL LOOP 2'],
    //         ['cubicle' => 'MST', 'keterangan' => 'TEKNIKAL LOOP 1'],
    //         ['cubicle' => 'MSU', 'keterangan' => 'SPARE'],
    //         ['cubicle' => 'MSB', 'keterangan' => 'TRAFO  ZIGZAG'],
    //         ['cubicle' => 'MSA', 'keterangan' => 'METERING'],
    //         ['cubicle' => 'MCC', 'keterangan' => 'COUPLER'],
    //         ['cubicle' => 'MCF', 'keterangan' => 'INCOMING GENSET'],
    //     ];

    //     $data['er2b'] = [
    //         ['cublicle' => 'MCD', 'keterangan' => 'INCOMING PLN (GH128)'],
    //         ['cublicle' => 'MCE', 'keterangan' => 'INCOMING PLN (GH128)'],
    //         ['cublicle' => 'MSL', 'keterangan' => 'TRAFO AUXILIARY B'],
    //         ['cublicle' => 'MSM', 'keterangan' => 'T1 LOOP 2'],
    //         ['cublicle' => 'MSN', 'keterangan' => 'T1 LOOP 1'],
    //         ['cublicle' => 'MSO', 'keterangan' => 'T2 LOOP 2'],
    //         ['cublicle' => 'MSP', 'keterangan' => 'T2 LOOP 1'],
    //         ['cublicle' => 'MSQ', 'keterangan' => 'T2 LOOP 3 '],
    //         ['cublicle' => 'MSR', 'keterangan' => 'T1 LOOP 3'],
    //         ['cublicle' => 'MSV', 'keterangan' => 'TEKNIKAL LOOP 1'],
    //         ['cublicle' => 'MSW', 'keterangan' => 'TEKNIKAL LOOP 2'],
    //         ['cublicle' => 'MSX', 'keterangan' => 'APMS'],
    //         ['cublicle' => 'MSK', 'keterangan' => 'TRAFO  ZIGZAG'],
    //         ['cublicle' => 'MSJ', 'keterangan' => 'METERING'],
    //         ['cublicle' => 'MCC', 'keterangan' => 'COUPLER'],
    //         ['cublicle' => 'MCG', 'keterangan' => 'INCOMING GENSET'],
    //     ];

    //     $data['er1a'] = [
    //         ['cublicle' => 'XSA', 'keterangan' => 'GENSET 1'],
    //         ['cublicle' => 'XCA', 'keterangan' => 'OUTGOING GENSET'],
    //         ['cublicle' => 'XSB', 'keterangan' => 'GENSET 2'],
    //         ['cublicle' => 'XSC', 'keterangan' => 'GENSET 3'],
    //         ['cublicle' => 'XSD', 'keterangan' => 'GENSET 4'],
    //         ['cublicle' => 'XSE', 'keterangan' => 'GENSET 5'],
    //         ['cublicle' => 'XSF', 'keterangan' => 'GENSET 6'],
    //         ['cublicle' => 'XSG', 'keterangan' => 'GENSET 7'],
    //     ];

    //     $data['er1b'] = [
    //         ['cublicle' => 'XSL', 'keterangan' => 'GENSET 1'],
    //         ['cublicle' => 'XCB', 'keterangan' => 'OUTGOING GENSET'],
    //         ['cublicle' => 'XSM', 'keterangan' => 'GENSET 2'],
    //         ['cublicle' => 'XSN', 'keterangan' => 'GENSET 3'],
    //         ['cublicle' => 'XSO', 'keterangan' => 'GENSET 4'],
    //         ['cublicle' => 'XSP', 'keterangan' => 'GENSET 5'],
    //         ['cublicle' => 'XSQ', 'keterangan' => 'GENSET 6'],
    //         ['cublicle' => 'XSR', 'keterangan' => 'GENSET 7'],
    //     ];

    //     $data['panel_mv_genset'] = [
    //         ['cublicle' => 'XDA', 'keterangan' => 'PPG GENSET 1'],
    //         ['cublicle' => 'XDB', 'keterangan' => 'PPG GENSET 2'],
    //         ['cublicle' => 'XDC', 'keterangan' => 'PPG GENSET 3'],
    //         ['cublicle' => 'XDD', 'keterangan' => 'PPG GENSET 4'],
    //         ['cublicle' => 'XDE', 'keterangan' => 'PPG GENSET 5'],
    //         ['cublicle' => 'XDF', 'keterangan' => 'PPG GENSET 6'],
    //         ['cublicle' => 'XDG', 'keterangan' => 'PPG GENSET 7'],
    //     ];

    //     return view('form.power-station-2.harian-panel.index', $data);
    // }

    // -- Start Checklist Harian Genset Ps2 Control Room --
    public function formPs2ChecklistGensetHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM CHECKLIST HARIAN GENSET / CONTROL ROOMS';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!ChecklistHarianGensetPs2ControlRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $checklistHarianGensetPs2ControlRoom = new ChecklistHarianGensetPs2ControlRoom();
            $checklistHarianGensetPs2ControlRoom->detail_work_order_form_id = $detailWorkOrderForm->id;
            $checklistHarianGensetPs2ControlRoom->form_id = $detailWorkOrderForm->form_id;
            $checklistHarianGensetPs2ControlRoom->work_order_id = $detailWorkOrderForm->work_order_id;
            $checklistHarianGensetPs2ControlRoom->save();
        }
        $data['checklistHarianGensetPs2ControlRoom'] = $detailWorkOrderForm->checklistHarianGensetPs2ControlRoom;

        if (!ChecklistHarianGensetPs2GensetRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 7; $i++) {
                $checklistHarianGensetPs2GensetRoom = new ChecklistHarianGensetPs2GensetRoom();
                $checklistHarianGensetPs2GensetRoom->detail_work_order_form_id = $detailWorkOrderForm->id;
                $checklistHarianGensetPs2GensetRoom->form_id = $detailWorkOrderForm->form_id;
                $checklistHarianGensetPs2GensetRoom->work_order_id = $detailWorkOrderForm->work_order_id;
                $checklistHarianGensetPs2GensetRoom->save();
            }
        }
        $data['checklistHarianGensetPs2GensetRooms'] = ChecklistHarianGensetPs2GensetRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.power-station-2.checklist-harian-genset.index', $data);
    }

    public function formPs2ChecklistGensetHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataControlRoom = $request->validate([
            'er2a_mca' => ['nullable'],
            'er2a_mcb' => ['nullable'],
            'er2b_mcd' => ['nullable'],
            'er2b_mce' => ['nullable'],
            'keterangan_pln_incoming' => ['nullable'],
            'er2a_mcf' => ['nullable'],
            'er2b_mcg' => ['nullable'],
            'keterangan_genset_incoming' => ['nullable'],
            'genset1' => ['nullable'],
            'genset2' => ['nullable'],
            'genset3' => ['nullable'],
            'genset4' => ['nullable'],
            'genset5' => ['nullable'],
            'genset6' => ['nullable'],
            'genset7' => ['nullable'],
            'keterangan_hmi' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $validatedDataGenset = $request->validate(
            [
                'q1_.*' => ['nullable'],
                'q2_.*' => ['nullable'],
                'q3_.*' => ['nullable'],
                'q4_.*' => ['nullable'],
                'q5_.*' => ['nullable'],
                'q6_.*' => ['nullable'],
                'q7_.*' => ['nullable'],
                'q8_.*' => ['nullable'],
                'q9_.*' => ['nullable'],
                'q10_.*' => ['nullable'],
                'q11_.*' => ['nullable'],
                'q12_.*' => ['nullable'],
                'q13_.*' => ['nullable'],
                'q14_.*' => ['nullable'],
                'q15_.*' => ['nullable'],
                'q16_gt1' => ['nullable'],
                'q16_gt2' => ['nullable'],
                'q16_gt3' => ['nullable'],
                'q17' => ['nullable'],
                'catatan' => ['nullable'],
            ],
            [
                'q1_.*.required' => 'The :attribute field is required.',
                'q2_.*.required' => 'The :attribute field is required.',
                'q3_.*.required' => 'The :attribute field is required.',
                'q4_.*.required' => 'The :attribute field is required.',
                'q5_.*.required' => 'The :attribute field is required.',
                'q6_.*.required' => 'The :attribute field is required.',
                'q7_.*.required' => 'The :attribute field is required.',
                'q8_.*.required' => 'The :attribute field is required.',
                'q9_.*.required' => 'The :attribute field is required.',
                'q10_.*.required' => 'The :attribute field is required.',
                'q11_.*.required' => 'The :attribute field is required.',
                'q12_.*.required' => 'The :attribute field is required.',
                'q13_.*.required' => 'The :attribute field is required.',
                'q14_.*.required' => 'The :attribute field is required.',
                'q15_.*.required' => 'The :attribute field is required.',
                'q16_gt1.required' => 'The :attribute field is required.',
                'q16_gt2.required' => 'The :attribute field is required.',
                'q16_gt3.required' => 'The :attribute field is required.',
                'q17.required' => 'The :attribute field is required.',
                'catatan.required' => 'The :attribute field is required.',
            ],
        );
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $controlRoom = $detailWorkOrderForm->checklistHarianGensetPs2ControlRoom;
            $controlRoom->er2a_mca = $validatedDataControlRoom['er2a_mca'] ?? null;
            $controlRoom->er2a_mcb = $validatedDataControlRoom['er2a_mcb'] ?? null;
            $controlRoom->er2b_mcd = $validatedDataControlRoom['er2b_mcd'] ?? null;
            $controlRoom->er2b_mce = $validatedDataControlRoom['er2b_mce'] ?? null;
            $controlRoom->keterangan_pln_incoming = $validatedDataControlRoom['keterangan_pln_incoming'] ?? null;
            $controlRoom->er2a_mcf = $validatedDataControlRoom['er2a_mcf'] ?? null;
            $controlRoom->er2b_mcg = $validatedDataControlRoom['er2b_mcg'] ?? null;
            $controlRoom->keterangan_genset_incoming = $validatedDataControlRoom['keterangan_genset_incoming'] ?? null;
            $controlRoom->genset1 = $validatedDataControlRoom['genset1'] ?? null;
            $controlRoom->genset2 = $validatedDataControlRoom['genset2'] ?? null;
            $controlRoom->genset3 = $validatedDataControlRoom['genset3'] ?? null;
            $controlRoom->genset4 = $validatedDataControlRoom['genset4'] ?? null;
            $controlRoom->genset5 = $validatedDataControlRoom['genset5'] ?? null;
            $controlRoom->genset6 = $validatedDataControlRoom['genset6'] ?? null;
            $controlRoom->genset7 = $validatedDataControlRoom['genset7'] ?? null;
            $controlRoom->keterangan_hmi = $validatedDataControlRoom['keterangan_hmi'] ?? null;
            if ($request->filled('busbar_a')) {
                $controlRoom->busbar_a = true;
            }
            if ($request->filled('busbar_b')) {
                $controlRoom->busbar_b = true;
            }
            $controlRoom->catatan = $validatedData['catatan'] ?? null;
            $controlRoom->save();

            $gensets = $detailWorkOrderForm->ChecklistHarianGensetPs2GensetRooms;
            foreach ($gensets as $gensetKey => $genset) {
                $genset->q1 = $validatedDataGenset['q1_'][$gensetKey] ?? null;
                $genset->q2 = $validatedDataGenset['q2_'][$gensetKey] ?? null;
                $genset->q3 = $validatedDataGenset['q3_'][$gensetKey] ?? null;
                $genset->q4 = $validatedDataGenset['q4_'][$gensetKey] ?? null;
                $genset->q5 = $validatedDataGenset['q5_'][$gensetKey] ?? null;
                $genset->q6 = $validatedDataGenset['q6_'][$gensetKey] ?? null;
                $genset->q7 = $validatedDataGenset['q7_'][$gensetKey] ?? null;
                $genset->q8 = $validatedDataGenset['q8_'][$gensetKey] ?? null;
                $genset->q9 = $validatedDataGenset['q9_'][$gensetKey] ?? null;
                $genset->q10 = $validatedDataGenset['q10_'][$gensetKey] ?? null;
                $genset->q11 = $validatedDataGenset['q11_'][$gensetKey] ?? null;
                $genset->q12 = $validatedDataGenset['q12_'][$gensetKey] ?? null;
                $genset->q13 = $validatedDataGenset['q13_'][$gensetKey] ?? null;
                $genset->q14 = $validatedDataGenset['q14_'][$gensetKey] ?? null;
                $genset->q15 = $validatedDataGenset['q15_'][$gensetKey] ?? null;
                $genset->q16_gt1 = $validatedDataGenset['q16_gt1'] ?? null;
                $genset->q16_gt2 = $validatedDataGenset['q16_gt2'] ?? null;
                $genset->q16_gt3 = $validatedDataGenset['q16_gt3'] ?? null;
                $genset->q17 = $validatedDataGenset['q17'] ?? null;
                $genset->catatan = $validatedDataGenset['catatan'] ?? null;
                $genset->save();
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

    public function checklistHarianGensetPs2ControlRoom(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM CHECKLIST HARIAN GENSET / CONTROL ROOMS';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!ChecklistHarianGensetPs2ControlRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $checklistHarianGensetPs2ControlRoom = new ChecklistHarianGensetPs2ControlRoom();
            $checklistHarianGensetPs2ControlRoom->detail_work_order_form_id = $detailWorkOrderForm->id;
            $checklistHarianGensetPs2ControlRoom->form_id = $detailWorkOrderForm->form_id;
            $checklistHarianGensetPs2ControlRoom->work_order_id = $detailWorkOrderForm->work_order_id;
            $checklistHarianGensetPs2ControlRoom->save();
        }
        $data['checklistHarianGensetPs2ControlRoom'] = $detailWorkOrderForm->checklistHarianGensetPs2ControlRoom;

        if (!ChecklistHarianGensetPs2GensetRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 7; $i++) {
                $checklistHarianGensetPs2GensetRoom = new ChecklistHarianGensetPs2GensetRoom();
                $checklistHarianGensetPs2GensetRoom->detail_work_order_form_id = $detailWorkOrderForm->id;
                $checklistHarianGensetPs2GensetRoom->form_id = $detailWorkOrderForm->form_id;
                $checklistHarianGensetPs2GensetRoom->work_order_id = $detailWorkOrderForm->work_order_id;
                $checklistHarianGensetPs2GensetRoom->save();
            }
        }
        $data['checklistHarianGensetPs2GensetRooms'] = ChecklistHarianGensetPs2GensetRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.power-station-2.checklist-harian-genset.control-room', $data);
    }

    public function checklistHarianGensetPs2ControlRoomUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'er2a_mca' => ['nullable'],
            'er2a_mcb' => ['nullable'],
            'er2b_mcd' => ['nullable'],
            'er2b_mce' => ['nullable'],
            'keterangan_pln_incoming' => ['nullable'],
            'er2a_mcf' => ['nullable'],
            'er2b_mcg' => ['nullable'],
            'keterangan_genset_incoming' => ['nullable'],
            'genset1' => ['nullable'],
            'genset2' => ['nullable'],
            'genset3' => ['nullable'],
            'genset4' => ['nullable'],
            'genset5' => ['nullable'],
            'genset6' => ['nullable'],
            'genset7' => ['nullable'],
            'keterangan_hmi' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $data = ChecklistHarianGensetPs2ControlRoom::findOrFail($detailWorkOrderForm->checklistHarianGensetPs2ControlRoom->id);
            $data->form_id = $detailWorkOrderForm->form_id;
            $data->er2a_mca = $validatedData['er2a_mca'] ?? null;
            $data->er2a_mcb = $validatedData['er2a_mcb'] ?? null;
            $data->er2b_mcd = $validatedData['er2b_mcd'] ?? null;
            $data->er2b_mce = $validatedData['er2b_mce'] ?? null;
            $data->keterangan_pln_incoming = $validatedData['keterangan_pln_incoming'] ?? null;
            $data->er2a_mcf = $validatedData['er2a_mcf'] ?? null;
            $data->er2b_mcg = $validatedData['er2b_mcg'] ?? null;
            $data->keterangan_genset_incoming = $validatedData['keterangan_genset_incoming'] ?? null;
            $data->genset1 = $validatedData['genset1'] ?? null;
            $data->genset2 = $validatedData['genset2'] ?? null;
            $data->genset3 = $validatedData['genset3'] ?? null;
            $data->genset4 = $validatedData['genset4'] ?? null;
            $data->genset5 = $validatedData['genset5'] ?? null;
            $data->genset6 = $validatedData['genset6'] ?? null;
            $data->genset7 = $validatedData['genset7'] ?? null;
            $data->keterangan_hmi = $validatedData['keterangan_hmi'] ?? null;
            if ($request->filled('busbar_a')) {
                $data->busbar_a = true;
            }
            if ($request->filled('busbar_b')) {
                $data->busbar_b = true;
            }
            $data->catatan = $validatedData['catatan'] ?? null;
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

    public function checklistHarianGensetPs2GensetRoom(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM CHECKLIST HARIAN GENSET / Genset ROOMS';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!ChecklistHarianGensetPs2GensetRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 7; $i++) {
                $checklistHarianGensetPs2GensetRoom = new ChecklistHarianGensetPs2GensetRoom();
                $checklistHarianGensetPs2GensetRoom->detail_work_order_form_id = $detailWorkOrderForm->id;
                $checklistHarianGensetPs2GensetRoom->form_id = $detailWorkOrderForm->form_id;
                $checklistHarianGensetPs2GensetRoom->work_order_id = $detailWorkOrderForm->work_order_id;
                $checklistHarianGensetPs2GensetRoom->save();
            }
        }
        $data['checklistHarianGensetPs2GensetRooms'] = ChecklistHarianGensetPs2GensetRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.power-station-2.checklist-harian-genset.genset-room', $data);
    }

    public function checklistHarianGensetPs2GensetRoomUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate(
            [
                'q1_.*' => ['nullable'],
                'q2_.*' => ['nullable'],
                'q3_.*' => ['nullable'],
                'q4_.*' => ['nullable'],
                'q5_.*' => ['nullable'],
                'q6_.*' => ['nullable'],
                'q7_.*' => ['nullable'],
                'q8_.*' => ['nullable'],
                'q9_.*' => ['nullable'],
                'q10_.*' => ['nullable'],
                'q11_.*' => ['nullable'],
                'q12_.*' => ['nullable'],
                'q13_.*' => ['nullable'],
                'q14_.*' => ['nullable'],
                'q15_.*' => ['nullable'],
                'q16_gt1' => ['nullable'],
                'q16_gt2' => ['nullable'],
                'q16_gt3' => ['nullable'],
                'q17' => ['nullable'],
                'catatan' => ['nullable'],
            ],
            [
                'q1_.*.required' => 'The :attribute field is required.',
                'q2_.*.required' => 'The :attribute field is required.',
                'q3_.*.required' => 'The :attribute field is required.',
                'q4_.*.required' => 'The :attribute field is required.',
                'q5_.*.required' => 'The :attribute field is required.',
                'q6_.*.required' => 'The :attribute field is required.',
                'q7_.*.required' => 'The :attribute field is required.',
                'q8_.*.required' => 'The :attribute field is required.',
                'q9_.*.required' => 'The :attribute field is required.',
                'q10_.*.required' => 'The :attribute field is required.',
                'q11_.*.required' => 'The :attribute field is required.',
                'q12_.*.required' => 'The :attribute field is required.',
                'q13_.*.required' => 'The :attribute field is required.',
                'q14_.*.required' => 'The :attribute field is required.',
                'q15_.*.required' => 'The :attribute field is required.',
                'q16_gt1.required' => 'The :attribute field is required.',
                'q16_gt2.required' => 'The :attribute field is required.',
                'q16_gt3.required' => 'The :attribute field is required.',
                'q17.required' => 'The :attribute field is required.',
                'catatan.required' => 'The :attribute field is required.',
            ],
        );
        DB::beginTransaction();
        try {
            $datas = ChecklistHarianGensetPs2GensetRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($datas as $key => $value) {
                $value->q1 = $validatedData['q1_'][$key] ?? null;
                $value->q2 = $validatedData['q2_'][$key] ?? null;
                $value->q3 = $validatedData['q3_'][$key] ?? null;
                $value->q4 = $validatedData['q4_'][$key] ?? null;
                $value->q5 = $validatedData['q5_'][$key] ?? null;
                $value->q6 = $validatedData['q6_'][$key] ?? null;
                $value->q7 = $validatedData['q7_'][$key] ?? null;
                $value->q8 = $validatedData['q8_'][$key] ?? null;
                $value->q9 = $validatedData['q9_'][$key] ?? null;
                $value->q10 = $validatedData['q10_'][$key] ?? null;
                $value->q11 = $validatedData['q11_'][$key] ?? null;
                $value->q12 = $validatedData['q12_'][$key] ?? null;
                $value->q13 = $validatedData['q13_'][$key] ?? null;
                $value->q14 = $validatedData['q14_'][$key] ?? null;
                $value->q15 = $validatedData['q15_'][$key] ?? null;
                $value->q16_gt1 = $validatedData['q16_gt1'] ?? null;
                $value->q16_gt2 = $validatedData['q16_gt2'] ?? null;
                $value->q16_gt3 = $validatedData['q16_gt3'] ?? null;
                $value->q17 = $validatedData['q17'] ?? null;
                $value->catatan = $validatedData['catatan'] ?? null;
                $value->save();
            }

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

            DB::commit();
            $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
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
    // -- End Checklist Harian Genset Ps2 Genset Room --

    // -- Start Checklist Genset PH AOCC --

    public function checklistGensetPhAocc(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM CHECKLIST GENSET PH AOCC';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!checklistGensetPhAocc::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $checklistGensetPhAocc = new checklistGensetPhAocc();
            $checklistGensetPhAocc->detail_work_order_form_id = $detailWorkOrderForm->id;
            $checklistGensetPhAocc->form_id = $detailWorkOrderForm->form_id;
            $checklistGensetPhAocc->work_order_id = $detailWorkOrderForm->work_order_id;
            $checklistGensetPhAocc->save();
        }
        $data['checklistGensetPhAocc'] = $detailWorkOrderForm->checklistGensetPhAocc;

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
        return view('form.power-station-2.genset-ph-aocc.index', $data);
    }

    public function checklistGensetPhAoccUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'mode_operasi_kontrol_genset' => ['required'],
            'tegangan_battery_starter' => ['required'],
            'kondisi_battery_charger' => ['required'],
            'lampu_indikator_ecu' => ['required'],
            'level_oli_mesin' => ['required'],
            'level_air_radiator' => ['required'],
            'level_bbm_tangki' => ['required'],
            'indikator_filter_udara_intake' => ['required'],
            'water_heater_pump' => ['required'],
            'oil_engine_temperature' => ['required'],
            'valve_bbm_genset' => ['required'],
            'kondisi_switch_battery' => ['required'],
            'valve_bbm_monthly_tank' => ['required'],
            'level_bbm_monthly_tank' => ['required'],
            'kondisi_pintu_ruang_genset' => ['required'],
            'catatan' => ['nullable'],
        ]);

        $data = checklistGensetPhAocc::findOrFail($detailWorkOrderForm->checklistGensetPhAocc->id);
        $data->form_id = $detailWorkOrderForm->form_id;
        $data->mode_operasi_kontrol_genset = $validatedData['mode_operasi_kontrol_genset'];
        $data->tegangan_battery_starter = $validatedData['tegangan_battery_starter'];
        $data->kondisi_battery_charger = $validatedData['kondisi_battery_charger'];
        $data->lampu_indikator_ecu = $validatedData['lampu_indikator_ecu'];
        $data->level_oli_mesin = $validatedData['level_oli_mesin'];
        $data->level_air_radiator = $validatedData['level_air_radiator'];
        $data->level_bbm_tangki = $validatedData['level_bbm_tangki'];
        $data->indikator_filter_udara_intake = $validatedData['indikator_filter_udara_intake'];
        $data->water_heater_pump = $validatedData['water_heater_pump'];
        $data->oil_engine_temperature = $validatedData['oil_engine_temperature'];
        $data->valve_bbm_genset = $validatedData['valve_bbm_genset'];
        $data->kondisi_switch_battery = $validatedData['kondisi_switch_battery'];
        $data->valve_bbm_monthly_tank = $validatedData['valve_bbm_monthly_tank'];
        $data->level_bbm_monthly_tank = $validatedData['level_bbm_monthly_tank'];
        $data->kondisi_pintu_ruang_genset = $validatedData['kondisi_pintu_ruang_genset'];
        $data->catatan = $validatedData['catatan'] ?? null;
        $data->save();

        //Form Log Activity
        ActivityLog::endLog($detailWorkOrderForm);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        if ($userTechnical) {
            return redirect()
                ->route('user-technical.work-order-edit', $detailWorkOrderForm->work_order_id)
                ->with(['success' => 'Data form has been updated successfully!']);
        } else {
            return redirect()
                ->route('work-orders.show', $detailWorkOrderForm->work_order_id)
                ->with(['success' => 'Data form has been updated successfully!']);
        }
    }

    // -- End Checklist Harian Genset Ps2 Control Room --

    public function formPs2ChecklistPanelLvHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Checklist Harian Panel Lv';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $formPs2ChecklistPanelLvHarians = FormPs2::formPs2ChecklistPanelLvHarian();
        $cubicles = ['incoming1', 'rak1', 'rak2', 'coupler', 'incoming2', 'rak3', 'rak4', 'panelOutGoingAocc'];
        try {
            DB::beginTransaction();
            if ($detailWorkOrderForm->formPs2ChecklistPanelLvHarians->isEmpty()) {
                foreach ($cubicles as $cubicle) {
                    foreach ($formPs2ChecklistPanelLvHarians->$cubicle as $value) {
                        $formPs2ChecklistPanelLvHarian = new FormPs2ChecklistPanelLvHarian();
                        $formPs2ChecklistPanelLvHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                        $formPs2ChecklistPanelLvHarian->form_id = $detailWorkOrderForm->form_id;
                        $formPs2ChecklistPanelLvHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                        $formPs2ChecklistPanelLvHarian->cubicle = $value['cubicle'] ?? null;
                        $formPs2ChecklistPanelLvHarian->peralatan = $value['peralatan'] ?? null;
                        $formPs2ChecklistPanelLvHarian->merek = $value['merek'] ?? null;
                        $formPs2ChecklistPanelLvHarian->tipe = $value['tipe'] ?? null;
                        $formPs2ChecklistPanelLvHarian->keterangan = $value['keterangan'] ?? null;
                        $formPs2ChecklistPanelLvHarian->save();
                    }
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
        $dbFormPs2ChecklistPanelLvHarians = $detailWorkOrderForm->formPs2ChecklistPanelLvHarians;
        $data['incoming1s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'INCOMING I';
            })
            ->values();
        $data['rak1s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'RAK I';
            })
            ->values();
        $data['rak2s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'RAK II';
            })
            ->values();
        $data['couplers'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'COUPLER';
            })
            ->values();
        $data['incoming2s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'INCOMING II';
            })
            ->values();
        $data['rak3s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'RAK III';
            })
            ->values();
        $data['rak4s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'RAK IV';
            })
            ->values();
        $data['panelOutGoingAoccs'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'Panel Outgoing AOCC';
            })
            ->values();
        $data['formPs2GensetPhAoccHarian'] = $detailWorkOrderForm->formPs2GensetPhAoccHarian;

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
        return view('form.power-station-2.harian-panel-lv.index', $data);
    }

    // public function formPs2GensetPhAoccHarian(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    // {
    //     $data['page_title'] = 'Form Checklist Harian Panel Lv';
    //     $data['detailWorkOrderForm'] = $detailWorkOrderForm;
    //     if (!FormPs2GensetPhAoccHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
    //         $formPs2GensetPhAoccHarian = new FormPs2GensetPhAoccHarian();
    //         $formPs2GensetPhAoccHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
    //         $formPs2GensetPhAoccHarian->form_id = $detailWorkOrderForm->form_id;
    //         $formPs2GensetPhAoccHarian->work_order_id = $detailWorkOrderForm->work_order_id;
    //         $formPs2GensetPhAoccHarian->save();
    //     }
    //     $data['formPs2GensetPhAoccHarian'] = $detailWorkOrderForm->formPs2GensetPhAoccHarian;

    //     // menyimpan FormActivityLog untuk status 'start'
    //     if (
    //         !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
    //             ->where('form_id', $detailWorkOrderForm->form_id)
    //             ->where('status', 'start')
    //             ->first()
    //     ) {
    //         //Form Log Activity
    //         ActivityLog::startLog($detailWorkOrderForm);
    //     }

    //     if (User::where('id', Auth::user()->id)->first()->username ?? false) {
    //         $data['extends'] = 'user-technicals.layouts.app';
    //     } else {
    //         $data['extends'] = 'layouts.app';
    //     }
    //     return view('form.power-station-2.harian-panel-lv.index', $data);
    // }

    public function formPs2ChecklistPanelLvHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'posisi_breaker_incoming1.*' => ['nullable'],
            'posisi_breaker_rak1.*' => ['nullable'],
            'posisi_breaker_rak2.*' => ['nullable'],
            'posisi_breaker_coupler.*' => ['nullable'],
            'posisi_breaker_incoming.*' => ['nullable'],
            'posisi_breaker_rak3.*' => ['nullable'],
            'posisi_breaker_rak4.*' => ['nullable'],
            'posisi_breaker_panelOutGoingAocc.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $cubicles = ['incoming1', 'rak1', 'rak2', 'coupler', 'incoming2', 'rak3', 'rak4', 'panelOutGoingAocc'];
        $dbFormPs2ChecklistPanelLvHarians = $detailWorkOrderForm->formPs2ChecklistPanelLvHarians;
        $data['incoming1s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'INCOMING I';
            })
            ->values();
        $data['rak1s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'RAK I';
            })
            ->values();
        $data['rak2s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'RAK II';
            })
            ->values();
        $data['couplers'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'COUPLER';
            })
            ->values();
        $data['incoming2s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'INCOMING II';
            })
            ->values();
        $data['rak3s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'RAK III';
            })
            ->values();
        $data['rak4s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'RAK IV';
            })
            ->values();
        $data['panelOutGoingAoccs'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'Panel Outgoing AOCC';
            })
            ->values();
        $data['formPs2GensetPhAoccHarian'] = $detailWorkOrderForm->formPs2GensetPhAoccHarian;
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            foreach ($cubicles as $cubicle) {
                foreach ($data[$cubicle . 's'] as $key => $formPs2ChecklistPanelLvHarian) {
                    $formPs2ChecklistPanelLvHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs2ChecklistPanelLvHarian->form_id = $detailWorkOrderForm->form_id;
                    $formPs2ChecklistPanelLvHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs2ChecklistPanelLvHarian->posisi_breaker = $validatedData['posisi_breaker_' . $cubicle][$key] ?? null;
                    $formPs2ChecklistPanelLvHarian->catatan = $validatedData['catatan'] ?? null;
                    $formPs2ChecklistPanelLvHarian->save();
                }
            }
            DB::commit();
            ///Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

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

    public function formPs2GensetRunningHarian(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM ONLOAD / NOLOAD GENSET';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs2GensetRunningHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 7; $i++) {
                $formPs2GensetRunningHarian = new FormPs2GensetRunningHarian();
                $formPs2GensetRunningHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2GensetRunningHarian->form_id = $detailWorkOrderForm->form_id;
                $formPs2GensetRunningHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2GensetRunningHarian->save();
            }
        }
        if (!FormPs2GensetRunningHarianKeterangan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs2GensetRunningHarianKeterangan = new FormPs2GensetRunningHarianKeterangan();
            $formPs2GensetRunningHarianKeterangan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs2GensetRunningHarianKeterangan->form_id = $detailWorkOrderForm->form_id;
            $formPs2GensetRunningHarianKeterangan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs2GensetRunningHarianKeterangan->save();
        }
        $data['formPs2GensetRunningHarians'] = FormPs2GensetRunningHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs2GensetRunningHarianKeterangan'] = $detailWorkOrderForm->formPs2GensetRunningHarianKeterangan;

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
        return view('form.power-station-2.genset-running.index', $data);
    }

    public function formPs2GensetRunningHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM ONLOAD / NOLOAD GENSET';
        $validatedData = $request->validate([
            'mode_operasi_.*' => ['nullable'],
            'waktu_.*' => ['nullable'],

            'tegangan1_.*' => ['nullable'],
            'tegangan2_.*' => ['nullable'],
            'tegangan3_.*' => ['nullable'],
            'beban_arus1_.*' => ['nullable'],
            'beban_arus2_.*' => ['nullable'],
            'beban_arus3_.*' => ['nullable'],
            'daya_.*' => ['nullable'],
            'frekuensi_.*' => ['nullable'],
            'speed_.*' => ['nullable'],
            'tekanan_oli_mesin_.*' => ['nullable'],
            'temperature_oli_mesin_.*' => ['nullable'],
            'temperature_coolant_.*' => ['nullable'],
            'engine_hours_counter_.*' => ['nullable'],
            'pembebanan_.*' => ['nullable'],

            'pln_off' => ['nullable'],
            'cb_close' => ['nullable'],
            'pln_normal' => ['nullable'],
            'cb_open' => ['nullable'],
            'genset_off' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $dataKet = FormPs2GensetRunningHarianKeterangan::findOrFail($detailWorkOrderForm->formPs2GensetRunningHarianKeterangan->id);
        $dataKet->pln_off = $validatedData['pln_off'];
        $dataKet->cb_close = $validatedData['cb_close'];
        $dataKet->pln_normal = $validatedData['pln_normal'];
        $dataKet->cb_open = $validatedData['cb_open'];
        $dataKet->genset_off = $validatedData['genset_off'];
        $dataKet->catatan = $validatedData['catatan'];
        $dataKet->save();

        try {
            DB::beginTransaction();
            $datas = FormPs2GensetRunningHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($datas as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;

                $value->mode_operasi = $validatedData['mode_operasi_'][$key] ?? null;
                $value->waktu = $validatedData['waktu_'][$key] ?? null;

                $value->tegangan1 = $validatedData['tegangan1_'][$key] ?? null;
                $value->tegangan2 = $validatedData['tegangan2_'][$key] ?? null;
                $value->tegangan3 = $validatedData['tegangan3_'][$key] ?? null;
                $value->beban_arus1 = $validatedData['beban_arus1_'][$key] ?? null;
                $value->beban_arus2 = $validatedData['beban_arus2_'][$key] ?? null;
                $value->beban_arus3 = $validatedData['beban_arus3_'][$key] ?? null;

                $value->daya = $validatedData['daya_'][$key] ?? null;
                $value->frekuensi = $validatedData['frekuensi_'][$key] ?? null;
                $value->speed = $validatedData['speed_'][$key] ?? null;
                $value->tekanan_oli_mesin = $validatedData['tekanan_oli_mesin_'][$key] ?? null;
                $value->temperature_oli_mesin = $validatedData['temperature_oli_mesin_'][$key] ?? null;
                $value->temperature_coolant = $validatedData['temperature_coolant_'][$key] ?? null;

                $value->engine_hours_counter = $validatedData['engine_hours_counter_'][$key] ?? null;
                $value->pembebanan = $validatedData['pembebanan_'][$key] ?? null;

                // $data->catatan = $validatedData['catatan'] ?? null;
                $value->save();
            }

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

            DB::commit();
            $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
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
        // return view('form.power-station-2.genset-running.index', $data);
    }

    public function laporanHarianDinasOperasionalTeknis(Request $request)
    {
        $data['page_title'] = 'Laporan Harian Dinas Operasional Teknis';

        return view('form.power-station-2.laporan-harian-dinas-operasional-teknis.index', $data);
    }

    public function formPs2PanelPhAocc(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM CHECKLIST PH AOCC';

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['datas'] = FormPs2::formPs2PanelPhAocc();

        try {
            DB::beginTransaction();
            if ($detailWorkOrderForm->formPs2PanelPhAoccs->isEmpty()) {
                foreach ($data['datas']->panelLvmdps as $key => $panelLvmdp) {
                    $formPs2PanelPhAoccPanelLvmdp = new FormPs2PanelPhAocc();
                    $formPs2PanelPhAoccPanelLvmdp->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs2PanelPhAoccPanelLvmdp->form_id = $detailWorkOrderForm->form_id;
                    $formPs2PanelPhAoccPanelLvmdp->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs2PanelPhAoccPanelLvmdp->group = $panelLvmdp['group'];
                    $formPs2PanelPhAoccPanelLvmdp->modul = $panelLvmdp['modul'];
                    $formPs2PanelPhAoccPanelLvmdp->keterangan = $panelLvmdp['keterangan'];
                    $formPs2PanelPhAoccPanelLvmdp->save();
                }

                foreach ($data['datas']->panelActsGensets as $key => $panelActsGenset) {
                    $formPs2PanelPhAoccPanelActsGenset = new FormPs2PanelPhAocc();
                    $formPs2PanelPhAoccPanelActsGenset->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs2PanelPhAoccPanelActsGenset->form_id = $detailWorkOrderForm->form_id;
                    $formPs2PanelPhAoccPanelActsGenset->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs2PanelPhAoccPanelActsGenset->group = $panelActsGenset['group'];
                    $formPs2PanelPhAoccPanelActsGenset->modul = $panelActsGenset['modul'];
                    $formPs2PanelPhAoccPanelActsGenset->keterangan = $panelActsGenset['keterangan'];
                    $formPs2PanelPhAoccPanelActsGenset->save();
                }

                foreach ($data['datas']->acts as $key => $act) {
                    $formPs2PanelPhAocc = new FormPs2PanelPhAocc();
                    $formPs2PanelPhAocc->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs2PanelPhAocc->form_id = $detailWorkOrderForm->form_id;
                    $formPs2PanelPhAocc->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs2PanelPhAocc->group = $act['group'];
                    $formPs2PanelPhAocc->modul = $act['modul'];
                    $formPs2PanelPhAocc->keterangan = $act['keterangan'];
                    $formPs2PanelPhAocc->save();
                }

                foreach ($data['datas']->mainDistributionPanels as $key => $mainDistributionPanel) {
                    $formPs2PanelPhAocc = new FormPs2PanelPhAocc();
                    $formPs2PanelPhAocc->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs2PanelPhAocc->form_id = $detailWorkOrderForm->form_id;
                    $formPs2PanelPhAocc->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs2PanelPhAocc->group = $mainDistributionPanel['group'];
                    $formPs2PanelPhAocc->modul = $mainDistributionPanel['modul'];
                    $formPs2PanelPhAocc->keterangan = $mainDistributionPanel['keterangan'];
                    $formPs2PanelPhAocc->save();
                }
            }
            if (
                !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                    ->where('form_id', $detailWorkOrderForm->form_id)
                    ->where('status', 'start')
                    ->first()
            ) {
                //Form Log Activity
                ActivityLog::startLog($detailWorkOrderForm);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

        $formPs2PanelPhAoccs = $detailWorkOrderForm->formPs2PanelPhAoccs;
        $data['dbPanelLvmdps'] = $formPs2PanelPhAoccs
            ->filter(function ($workOrder) {
                return $workOrder->group == 'panel_lvmdp';
            })
            ->values();
        $data['dbPanelActsGensets'] = $formPs2PanelPhAoccs
            ->filter(function ($workOrder) {
                return $workOrder->group == 'panel_acts_genset';
            })
            ->values();

        $data['dbActs'] = $formPs2PanelPhAoccs
            ->filter(function ($workOrder) {
                return $workOrder->group == 'acts';
            })
            ->values();

        $data['dbMainDistributionPanels'] = $formPs2PanelPhAoccs
            ->filter(function ($workOrder) {
                return $workOrder->group == 'main_distribution_panel';
            })
            ->values();

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }

        return view('form.power-station-2.check-ph-aocc.index', $data);
    }

    public function formPs2PanelPhAoccUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedbPanelLvmdps = $request->validate([
            'posisi_cb_panel_lvmdp.*' => 'nullable',
            'cb_spring_panel_lvmdp.*' => 'nullable',
            'local_remote_panel_lvmdp.*' => 'nullable',
            'mode_kontrol_modul_panel_lvmdp.*' => 'nullable',
            'mode_kontrol_scada_panel_lvmdp.*' => 'nullable',
            'tegangan_v_1_panel_lvmdp.*' => 'nullable',
            'tegangan_v_2_panel_lvmdp.*' => 'nullable',
            'tegangan_v_3_panel_lvmdp.*' => 'nullable',
            'arus_1_panel_lvmdp.*' => 'nullable',
            'arus_2_panel_lvmdp.*' => 'nullable',
            'arus_3_panel_lvmdp.*' => 'nullable',
            'daya_1_panel_lvmdp.*' => 'nullable',
            'daya_2_panel_lvmdp.*' => 'nullable',
            'daya_3_panel_lvmdp.*' => 'nullable',
            'catatan' => 'nullable',
        ]);

        $validatedPanelActsGensets = $request->validate([
            'posisi_cb_panel_acts_genset.*' => 'nullable',
            'cb_spring_panel_acts_genset.*' => 'nullable',
            'local_remote_panel_acts_genset.*' => 'nullable',
            'mode_kontrol_modul_panel_acts_genset.*' => 'nullable',
            'mode_kontrol_scada_panel_acts_genset.*' => 'nullable',
            'tegangan_v_1_panel_acts_genset.*' => 'nullable',
            'tegangan_v_2_panel_acts_genset.*' => 'nullable',
            'tegangan_v_3_panel_acts_genset.*' => 'nullable',
            'arus_1_panel_acts_genset.*' => 'nullable',
            'arus_2_panel_acts_genset.*' => 'nullable',
            'arus_3_panel_acts_genset.*' => 'nullable',
            'daya_1_panel_acts_genset.*' => 'nullable',
            'daya_2_panel_acts_genset.*' => 'nullable',
            'daya_3_panel_acts_genset.*' => 'nullable',
            'catatan' => 'nullable',
        ]);

        $validatedActs = $request->validate([
            'normal_source_acts.*' => 'nullable',
            'tegangan_acts.*' => 'nullable',
            'transfer_switch_acts.*' => 'nullable',
        ]);

        $validatedmainDistributionPanels = $request->validate([
            'posisi_mccb_main_distribution_panel.*' => 'nullable',
        ]);
        // DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;

        $formPs2PanelPhAoccs = $detailWorkOrderForm->formPs2PanelPhAoccs;
        $dbPanelLvmdps = $formPs2PanelPhAoccs
            ->filter(function ($workOrder) {
                return $workOrder->group == 'panel_lvmdp';
            })
            ->values();

        $dbPanelActsGensets = $formPs2PanelPhAoccs
            ->filter(function ($workOrder) {
                return $workOrder->group == 'panel_acts_genset';
            })
            ->values();

        $dbActs = $formPs2PanelPhAoccs
            ->filter(function ($workOrder) {
                return $workOrder->group == 'acts';
            })
            ->values();

        $dbMainDistributionPanels = $formPs2PanelPhAoccs
            ->filter(function ($workOrder) {
                return $workOrder->group == 'main_distribution_panel';
            })
            ->values();

        try {
            //ACTS
            DB::beginTransaction();

            foreach ($dbPanelLvmdps as $panelLvmdpKey => $panelLvmdp) {
                $panelLvmdp->posisi_cb = $validatedbPanelLvmdps['posisi_cb_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->cb_spring = $validatedbPanelLvmdps['cb_spring_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->local_remote = $validatedbPanelLvmdps['local_remote_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->mode_kontrol_modul = $validatedbPanelLvmdps['mode_kontrol_modul_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->mode_kontrol_scada = $validatedbPanelLvmdps['mode_kontrol_scada_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->tegangan_v_1 = $validatedbPanelLvmdps['tegangan_v_1_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->tegangan_v_2 = $validatedbPanelLvmdps['tegangan_v_2_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->tegangan_v_3 = $validatedbPanelLvmdps['tegangan_v_3_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->arus_1 = $validatedbPanelLvmdps['arus_1_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->arus_2 = $validatedbPanelLvmdps['arus_2_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->arus_3 = $validatedbPanelLvmdps['arus_3_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->daya_1 = $validatedbPanelLvmdps['daya_1_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->daya_2 = $validatedbPanelLvmdps['daya_2_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->daya_3 = $validatedbPanelLvmdps['daya_3_panel_lvmdp'][$panelLvmdpKey];
                $panelLvmdp->catatan = $validatedbPanelLvmdps['catatan'][$panelLvmdpKey];
                $panelLvmdp->save();
            }

            foreach ($dbPanelActsGensets as $panelActsGensetKey => $panelActsGenset) {
                $panelActsGenset->detail_work_order_form_id = $detailWorkOrderForm->id;
                $panelActsGenset->form_id = $detailWorkOrderForm->form_id;
                $panelActsGenset->work_order_id = $detailWorkOrderForm->work_order_id;
                $panelActsGenset->posisi_cb = $validatedPanelActsGensets['posisi_cb_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->cb_spring = $validatedPanelActsGensets['cb_spring_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->local_remote = $validatedPanelActsGensets['local_remote_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->mode_kontrol_modul = $validatedPanelActsGensets['mode_kontrol_modul_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->mode_kontrol_scada = $validatedPanelActsGensets['mode_kontrol_scada_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->tegangan_v_1 = $validatedPanelActsGensets['tegangan_v_1_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->tegangan_v_2 = $validatedPanelActsGensets['tegangan_v_2_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->tegangan_v_3 = $validatedPanelActsGensets['tegangan_v_3_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->arus_1 = $validatedPanelActsGensets['arus_1_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->arus_2 = $validatedPanelActsGensets['arus_2_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->arus_3 = $validatedPanelActsGensets['arus_3_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->daya_1 = $validatedPanelActsGensets['daya_1_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->daya_2 = $validatedPanelActsGensets['daya_2_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->daya_3 = $validatedPanelActsGensets['daya_3_panel_acts_genset'][$panelActsGensetKey];
                $panelActsGenset->catatan = $validatedPanelActsGensets['catatan'][$panelActsGensetKey];
                $panelActsGenset->save();
            }

            foreach ($dbActs as $actKey => $act) {
                $act->detail_work_order_form_id = $detailWorkOrderForm->id;
                $act->form_id = $detailWorkOrderForm->form_id;
                $act->work_order_id = $detailWorkOrderForm->work_order_id;
                $act->normal_source = $validatedActs['normal_source_acts'][$actKey];
                $act->tegangan = $validatedActs['tegangan_acts'][$actKey];
                $act->transfer_switch = $validatedActs['transfer_switch_acts'][$actKey];
                $act->save();
            }

            foreach ($dbMainDistributionPanels as $mainDistributionPanelKey => $mainDistributionPanel) {
                $mainDistributionPanel->detail_work_order_form_id = $detailWorkOrderForm->id;
                $mainDistributionPanel->form_id = $detailWorkOrderForm->form_id;
                $mainDistributionPanel->work_order_id = $detailWorkOrderForm->work_order_id;
                $mainDistributionPanel->posisi_mccb = $validatedmainDistributionPanels['posisi_mccb_main_distribution_panel'][$mainDistributionPanelKey];
                $mainDistributionPanel->save();
            }

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

        // return view('form.power-station-2.check-ph-aocc.index', $data);
    }

    public function formPs2GensetPhAoccDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM DATA PARAMETER 2 MINGGUAN GENSET PH AOCC';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['formPs2GensetPhAoccDuaMingguans'] = FormPs2GensetPhAoccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

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

        return view('form.power-station-2.data-parameter-dua-mingguan-genset-ph-aocc.index', $data);
    }

    public function formPs2GensetPhAoccDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'waktu' => ['required'],
            'waktu.*' => ['nullable'],
            'tegangan_r.*' => ['nullable'],
            'tegangan_s.*' => ['nullable'],
            'tegangan_t.*' => ['nullable'],
            'arus_r.*' => ['nullable'],
            'arus_s.*' => ['nullable'],
            'arus_t.*' => ['nullable'],
            'daya.*' => ['nullable'],
            'oil_pres.*' => ['nullable'],
            'oil_temp.*' => ['nullable'],
            'coolant_temp.*' => ['nullable'],
            'batt.*' => ['nullable'],
            'hc.*' => ['nullable'],
            'frequency.*' => ['nullable'],
            'cos_phi.*' => ['nullable'],
            'durasi.*' => ['nullable'],
            'bbm.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            // Delete Existing Data
            FormPs2GensetPhAoccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->delete();

            // Create New Data
            foreach ($request->get('waktu') as $key => $value) {
                $data = new FormPs2GensetPhAoccDuaMingguan();
                $data->detail_work_order_form_id = $detailWorkOrderForm->id;
                $data->work_order_id = $detailWorkOrderForm->work_order_id;
                $data->waktu = $value ?? null;
                $data->tegangan_r = $validatedData['tegangan_r'][$key] ?? null;
                $data->tegangan_s = $validatedData['tegangan_s'][$key] ?? null;
                $data->tegangan_t = $validatedData['tegangan_t'][$key] ?? null;
                $data->arus_r = $validatedData['arus_r'][$key] ?? null;
                $data->arus_s = $validatedData['arus_s'][$key] ?? null;
                $data->arus_t = $validatedData['arus_t'][$key] ?? null;
                $data->daya = $validatedData['daya'][$key] ?? null;
                $data->oil_pres = $validatedData['oil_pres'][$key] ?? null;
                $data->oil_temp = $validatedData['oil_temp'][$key] ?? null;
                $data->coolant_temp = $validatedData['coolant_temp'][$key] ?? null;
                $data->batt = $validatedData['batt'][$key] ?? null;
                $data->hc = $validatedData['hc'][$key] ?? null;
                $data->frequency = $validatedData['frequency'][$key] ?? null;
                $data->cos_phi = $validatedData['cos_phi'][$key] ?? null;
                $data->durasi = $validatedData['durasi'][$key] ?? null;
                $data->bbm = $validatedData['bbm'][$key] ?? null;
                $data->catatan = $validatedData['catatan'] ?? null;
                $data->save();
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

    public function formPs2GensetDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM 2 MINGGUAN GENSET PS 2';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs2GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 7; $i++) {
                $formPs2GensetDuaMingguan = new FormPs2GensetDuaMingguan();
                $formPs2GensetDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2GensetDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs2GensetDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2GensetDuaMingguan->save();
            }
        }
        $data['formPs2GensetDuaMingguans'] = FormPs2GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

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

        return view('form.power-station-2.data-parameter-dua-mingguan-genset-ps-dua.index', $data);
    }

    public function formPs2GensetDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'genset.*' => ['required'],
            'tegangan_r.*' => ['nullable'],
            'tegangan_s.*' => ['nullable'],
            'tegangan_t.*' => ['nullable'],
            'arus_r.*' => ['nullable'],
            'arus_s.*' => ['nullable'],
            'arus_t.*' => ['nullable'],
            'daya.*' => ['nullable'],
            'oil_pres.*' => ['nullable'],
            'oil_temp.*' => ['nullable'],
            'coolant_temp.*' => ['nullable'],
            'batt.*' => ['nullable'],
            'hour_meter.*' => ['nullable'],
            'frequency.*' => ['nullable'],
            'cos_phi.*' => ['nullable'],
            'durasi.*' => ['nullable'],
            'bbm.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            // Delete Existing Data
            $formPs2GensetDuaMingguans = FormPs2GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();

            // Create New Data
            foreach ($formPs2GensetDuaMingguans as $key => $formPs2GensetDuaMingguan) {
                $formPs2GensetDuaMingguan->tegangan_r = $validatedData['tegangan_r'][$key] ?? null;
                $formPs2GensetDuaMingguan->tegangan_s = $validatedData['tegangan_s'][$key] ?? null;
                $formPs2GensetDuaMingguan->tegangan_t = $validatedData['tegangan_t'][$key] ?? null;
                $formPs2GensetDuaMingguan->arus_r = $validatedData['arus_r'][$key] ?? null;
                $formPs2GensetDuaMingguan->arus_s = $validatedData['arus_s'][$key] ?? null;
                $formPs2GensetDuaMingguan->arus_t = $validatedData['arus_t'][$key] ?? null;
                $formPs2GensetDuaMingguan->daya = $validatedData['daya'][$key] ?? null;
                $formPs2GensetDuaMingguan->oil_pres = $validatedData['oil_pres'][$key] ?? null;
                $formPs2GensetDuaMingguan->oil_temp = $validatedData['oil_temp'][$key] ?? null;
                $formPs2GensetDuaMingguan->coolant_temp = $validatedData['coolant_temp'][$key] ?? null;
                $formPs2GensetDuaMingguan->batt = $validatedData['batt'][$key] ?? null;
                $formPs2GensetDuaMingguan->hour_meter = $validatedData['hour_meter'][$key] ?? null;
                $formPs2GensetDuaMingguan->frequency = $validatedData['frequency'][$key] ?? null;
                $formPs2GensetDuaMingguan->cos_phi = $validatedData['cos_phi'][$key] ?? null;
                $formPs2GensetDuaMingguan->durasi = $validatedData['durasi'][$key] ?? null;
                $formPs2GensetDuaMingguan->bbm = $validatedData['bbm'][$key] ?? null;
                $formPs2GensetDuaMingguan->catatan = $validatedData['catatan'] ?? null;
                $formPs2GensetDuaMingguan->save();
            }

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

            DB::commit();
            $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
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

    public function dataParameterDuaMingguanGenset(Request $request)
    {
        $data['page_title'] = 'FORM DATA PARAMETER 2 MINGGUAN GENSET MPS2';

        return view('form.power-station-2.data-parameter-dua-mingguan-genset.index', $data);
    }

    public function dataParameterDuaMingguanGensetIndex(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM DATA PARAMETER 2 MINGGUAN GENSET MPS2';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs2GensetDuaMingguanGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 7; $i++) {
                $formPs2GensetDuaMingguanGenset = new FormPs2GensetDuaMingguanGenset();
                $formPs2GensetDuaMingguanGenset->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2GensetDuaMingguanGenset->nama_peralatan = $i + 1;
                $formPs2GensetDuaMingguanGenset->form_id = $detailWorkOrderForm->form_id;
                $formPs2GensetDuaMingguanGenset->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2GensetDuaMingguanGenset->save();
            }
        }
        $data['formPs2GensetDuaMingguanGensets'] = FormPs2GensetDuaMingguanGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        if (!FormPs2GensetDuaMingguanTrafo::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 7; $i++) {
                $formPs2GensetDuaMingguanTrafo = new FormPs2GensetDuaMingguanTrafo();
                $formPs2GensetDuaMingguanTrafo->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2GensetDuaMingguanTrafo->nama_peralatan = $i + 1;
                $formPs2GensetDuaMingguanTrafo->form_id = $detailWorkOrderForm->form_id;
                $formPs2GensetDuaMingguanTrafo->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2GensetDuaMingguanTrafo->save();
            }
        }
        $data['formPs2GensetDuaMingguanTrafos'] = FormPs2GensetDuaMingguanTrafo::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        if (!FormPs2GensetDuaMingguanTank::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 7; $i++) {
                $formPs2GensetDuaMingguanTank = new FormPs2GensetDuaMingguanTank();
                $formPs2GensetDuaMingguanTank->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2GensetDuaMingguanTank->nama_peralatan = $i + 1;
                $formPs2GensetDuaMingguanTank->form_id = $detailWorkOrderForm->form_id;
                $formPs2GensetDuaMingguanTank->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2GensetDuaMingguanTank->save();
            }
        }
        $data['formPs2GensetDuaMingguanTanks'] = FormPs2GensetDuaMingguanTank::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        if (!FormPs2GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 7; $i++) {
                $formPs2GensetDuaMingguan = new FormPs2GensetDuaMingguan();
                $formPs2GensetDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2GensetDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs2GensetDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2GensetDuaMingguan->save();
            }
        }
        $data['formPs2GensetDuaMingguans'] = FormPs2GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

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
        return view('form.power-station-2.data-parameter-dua-mingguan-genset.index', $data);
    }

    public function dataParameterDuaMingguanGensetUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM DATA PARAMETER 2 MINGGUAN GENSET MPS2';

        $validatedData = $request->validate([
            'genset.*' => ['required'],
            'tegangan_r.*' => ['nullable'],
            'tegangan_s.*' => ['nullable'],
            'tegangan_t.*' => ['nullable'],
            'arus_r.*' => ['nullable'],
            'arus_s.*' => ['nullable'],
            'arus_t.*' => ['nullable'],
            'daya.*' => ['nullable'],
            'oil_pres.*' => ['nullable'],
            'oil_temp.*' => ['nullable'],
            'coolant_temp.*' => ['nullable'],
            'batt.*' => ['nullable'],
            'hour_meter.*' => ['nullable'],
            'frequency.*' => ['nullable'],
            'cos_phi.*' => ['nullable'],
            'durasi.*' => ['nullable'],
            'bbm.*' => ['nullable'],

            'nama_peralatan_genset.*' => ['nullable'],
            'level_oil.*' => ['nullable'],
            'level_air_radiator.*' => ['nullable'],
            'water_heater.*' => ['nullable'],
            'generator_heater.*' => ['nullable'],
            'batt_genset.*' => ['nullable'],
            'valve_bbm.*' => ['nullable'],
            'keterangan_genset.*' => ['nullable'],

            'nama_peralatan_trafo.*' => ['nullable'],
            'temperatur1.*' => ['nullable'],
            'temperatur2.*' => ['nullable'],
            'temperatur3.*' => ['nullable'],
            'fan.*' => ['nullable'],
            'keterangan_trafo.*' => ['nullable'],

            'nama_peralatan_tank.*' => ['nullable'],
            'volume_bbm.*' => ['nullable'],
            'level_alarm.*' => ['nullable'],
            'valve_in.*' => ['nullable'],
            'valve_out.*' => ['nullable'],
            'keterangan_tank.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            // Delete Existing Data
            $datas = FormPs2GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();

            // Create New Data
            foreach ($datas as $key => $value) {
                // $data = new FormPs2GensetDuaMingguan();
                $value->detail_work_order_form_id = $detailWorkOrderForm->id;
                $value->tegangan_r = $validatedData['tegangan_r'][$key] ?? null;
                $value->tegangan_s = $validatedData['tegangan_s'][$key] ?? null;
                $value->tegangan_t = $validatedData['tegangan_t'][$key] ?? null;
                $value->arus_r = $validatedData['arus_r'][$key] ?? null;
                $value->arus_s = $validatedData['arus_s'][$key] ?? null;
                $value->arus_t = $validatedData['arus_t'][$key] ?? null;
                $value->daya = $validatedData['daya'][$key] ?? null;
                $value->oil_pres = $validatedData['oil_pres'][$key] ?? null;
                $value->oil_temp = $validatedData['oil_temp'][$key] ?? null;
                $value->coolant_temp = $validatedData['coolant_temp'][$key] ?? null;
                $value->batt = $validatedData['batt'][$key] ?? null;
                $value->hour_meter = $validatedData['hour_meter'][$key] ?? null;
                $value->frequency = $validatedData['frequency'][$key] ?? null;
                $value->cos_phi = $validatedData['cos_phi'][$key] ?? null;
                $value->durasi = $validatedData['durasi'][$key] ?? null;
                $value->bbm = $validatedData['bbm'][$key] ?? null;
                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            // Delete Existing Data
            $dataGensets = FormPs2GensetDuaMingguanGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();

            // Create New Data
            foreach ($dataGensets as $key => $value) {
                // $value = new FormPs2GensetDuaMingguanGenset();
                $value->detail_work_order_form_id = $detailWorkOrderForm->id;
                $value->nama_peralatan = $validatedData['nama_peralatan_genset'][$key] ?? null;
                $value->level_oil = $validatedData['level_oil'][$key] ?? null;
                $value->level_air_radiator = $validatedData['level_air_radiator'][$key] ?? null;
                $value->water_heater = $validatedData['water_heater'][$key] ?? null;
                $value->generator_heater = $validatedData['generator_heater'][$key] ?? null;
                $value->batt = $validatedData['batt_genset'][$key] ?? null;
                $value->valve_bbm = $validatedData['valve_bbm'][$key] ?? null;
                $value->keterangan = $validatedData['keterangan_genset'][$key] ?? null;
                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            // Delete Existing Data
            $dataTrafos = FormPs2GensetDuaMingguanTrafo::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();

            // Create New Data
            foreach ($dataTrafos as $key => $value) {
                // $value = new FormPs2GensetDuaMingguanTrafo();
                $value->detail_work_order_form_id = $detailWorkOrderForm->id;
                $value->nama_peralatan = $validatedData['nama_peralatan_trafo'][$key] ?? null;
                $value->temperatur1 = $validatedData['temperatur1'][$key] ?? null;
                $value->temperatur2 = $validatedData['temperatur2'][$key] ?? null;
                $value->temperatur3 = $validatedData['temperatur3'][$key] ?? null;
                $value->fan = $validatedData['fan'][$key] ?? null;
                $value->keterangan = $validatedData['keterangan_trafo'][$key] ?? null;
                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            // Delete Existing Data
            $dataTanks = FormPs2GensetDuaMingguanTank::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();

            // Create New Data
            foreach ($dataTanks as $key => $value) {
                // $value = new FormPs2GensetDuaMingguanTank();
                $value->detail_work_order_form_id = $detailWorkOrderForm->id;
                $value->nama_peralatan = $validatedData['nama_peralatan_tank'][$key] ?? null;
                $value->volume_bbm = $validatedData['volume_bbm'][$key] ?? null;
                $value->level_alarm = $validatedData['level_alarm'][$key] ?? null;
                $value->valve_in = $validatedData['valve_in'][$key] ?? null;
                $value->valve_out = $validatedData['valve_out'][$key] ?? null;
                $value->keterangan = $validatedData['keterangan_tank'][$key] ?? null;
                $value->catatan = $validatedData['catatan'] ?? null;
                $value->save();
            }
            DB::commit();

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

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

    public function formPs2GroundTankDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM DATA PARAMETER 2 MINGGUAN GROUND TANK';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $namaPeralatans = ['MASTER SELEKTOR POMPA', 'MASTER SELEKTOR SELENOID', 'MCB', 'MAIN TANK 1 (PANEL FCP 2)', 'MAIN TANK 2 (PANEL FCP 2)', 'MAIN TANK 3 (PANEL FCP 2)', 'DAILY TANK 1', 'DAILY TANK 2', 'DAILY TANK 3', 'DAILY TANK 4', 'DAILY TANK 5', 'DAILY TANK 6', 'DAILY TANK 7', 'POMPA P1A', 'POMPA P1B', 'POMPA P2A', 'POMPA P2B', 'POMPA P4', 'VALVE OUT MAIN TANK 1', 'VALVE OUT MAIN TANK 2', 'VALVE OUT MAIN TANK 3', 'VALVE MAIN TANK-D TANK', '1A', '1B', '2A', '2B', '3A', '3B', 'VALVE RETURN ENGINE-M TANK', 'MAIN TANK 1', 'MAIN TANK 2', 'MAIN TANK 3', 'LAMPU PENERANGAN'];

        if (!FormPs2GroundTankDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($namaPeralatans as $namaPeralatan) {
                $formPs2GroundTankDuaMingguan = new FormPs2GroundTankDuaMingguan();
                $formPs2GroundTankDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2GroundTankDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs2GroundTankDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2GroundTankDuaMingguan->nama_peralatan = $namaPeralatan;

                $formPs2GroundTankDuaMingguan->save();
            }
        }
        $data['formPs2GroundTankDuaMingguans'] = FormPs2GroundTankDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

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

        return view('form.power-station-2.data-parameter-dua-mingguan-ground-tank.index', $data);
    }

    public function formPs2GroundTankDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'nama_peralatan' => 'nullable',
            'q1.*' => 'nullable',
            'q2.*' => 'nullable',
            'q3.*' => 'nullable',
            'q4.*' => 'nullable',
            'catatan' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            // Delete Old Data
            FormPs2GroundTankDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->delete();

            // Create New Data
            foreach ($validatedData['nama_peralatan'] as $key => $value) {
                $data = new FormPs2GroundTankDuaMingguan();
                $data->detail_work_order_form_id = $detailWorkOrderForm->id;
                $data->form_id = $detailWorkOrderForm->form_id;
                $data->work_order_id = $detailWorkOrderForm->work_order_id;
                $data->nama_peralatan = $value;
                $data->q1 = $validatedData['q1'][$key] ?? null;
                $data->q2 = $validatedData['q2'][$key] ?? null;
                $data->q3 = $validatedData['q3'][$key] ?? null;
                $data->q4 = $validatedData['q4'][$key] ?? null;
                $data->catatan = $validatedData['catatan'] ?? null;
                $data->save();
            }

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

            DB::commit();
            $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
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

    public function dataParameterDuaMingguanPanelSdpEpccExhaustFan(Request $request)
    {
        $data['page_title'] = 'FORM DATA PARAMETER 2 MINGGUAN PANEL SDP/EPCC/EXHAUST FAN';

        return view('form.power-station-2.data-parameter-dua-mingguan-panel-sdp-epcc-exhaust-fan.index', $data);
    }

    public function dataParameterDuaMingguanPanelSdpEpccExhaustFanIndex(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM DATA PARAMETER 2 MINGGUAN PANEL SDP/EPCC/EXHAUST FAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['panel'] = [
            ['nama_peralatan' => 'PS2 SDP 007', 'posisi' => 'R.GENSET', 'keterangan' => ['NORMAL']],
            ['nama_peralatan' => 'PS2 SDP 001C', 'posisi' => 'R.GENSET', 'keterangan' => ['NORMAL']],
            ['nama_peralatan' => 'PS2 SDP 008', 'posisi' => 'R.GENSET', 'keterangan' => ['NORMAL']],
            ['nama_peralatan' => 'PS2 SDP 006', 'posisi' => 'R.GENSET', 'keterangan' => ['NORMAL']],
            ['nama_peralatan' => 'PS2 SDP 003', 'posisi' => 'GH 128', 'keterangan' => ['NORMAL']],
            ['nama_peralatan' => 'PS2 SDP 001A', 'posisi' => 'R.TENAGA', 'keterangan' => ['NORMAL']],
            ['nama_peralatan' => 'PS2 SDP 004', 'posisi' => 'GROUND TANK', 'keterangan' => ['NORMAL']],
            ['nama_peralatan' => 'PS2 SDP 001B', 'posisi' => 'L.2', 'keterangan' => ['NORMAL']],
            ['nama_peralatan' => 'PS2 SDP 002', 'posisi' => 'L.2', 'keterangan' => ['NORMAL']],
            ['nama_peralatan' => 'PS2 SDP UPS 05 D', 'posisi' => 'R.SERVER', 'keterangan' => ['AUTO', 'NORMAL']],
            ['nama_peralatan' => 'PS2 SDP UPS 05 C', 'posisi' => 'R.SERVER', 'keterangan' => ['AUTO', 'NORMAL']],
            ['nama_peralatan' => 'PS2 SDP 05A', 'posisi' => 'R.SERVER', 'keterangan' => ['AUTO', 'NORMAL']],
            ['nama_peralatan' => 'PS2 SDP 05B', 'posisi' => 'R.SERVER', 'keterangan' => ['AUTO', 'NORMAL']],
            ['nama_peralatan' => 'PS2 SDP 02B', 'posisi' => 'R.SERVER', 'keterangan' => ['AUTO', 'NORMAL']],
            ['nama_peralatan' => 'PS2 SDP AC LT 2', 'posisi' => 'L.2', 'keterangan' => ['NORMAL']],
            ['nama_peralatan' => 'MCA', 'posisi' => 'R.CONTROL', 'keterangan' => ['MAINS FAIL', 'AUTO']],
            ['nama_peralatan' => 'MCB', 'posisi' => 'R.CONTROL', 'keterangan' => ['MAINS FAIL', 'AUTO']],
            ['nama_peralatan' => 'MCD', 'posisi' => 'R.CONTROL', 'keterangan' => ['SEMI']],
            ['nama_peralatan' => 'MCE', 'posisi' => 'R.CONTROL', 'keterangan' => ['SEMI']],
            ['nama_peralatan' => 'MCF', 'posisi' => 'R.CONTROL', 'keterangan' => ['AUTO']],
            ['nama_peralatan' => 'MCG', 'posisi' => 'R.CONTROL', 'keterangan' => ['SEMI', 'ALARM IN TEST POS']],
            ['nama_peralatan' => 'FAN 1', 'posisi' => 'R.GENSET', 'keterangan' => ['REMOTE', 'NORMAL']],
            ['nama_peralatan' => 'FAN 2', 'posisi' => 'R.GENSET', 'keterangan' => ['REMOTE', 'NORMAL']],
            ['nama_peralatan' => 'FAN 3', 'posisi' => 'R.GENSET', 'keterangan' => ['REMOTE', 'NORMAL']],
            ['nama_peralatan' => 'FAN 4', 'posisi' => 'R.GENSET', 'keterangan' => ['OFF', 'PERBAIKAN FAN']],
            ['nama_peralatan' => 'FAN 5', 'posisi' => 'R.GENSET', 'keterangan' => ['REMOTE', 'NORMAL']],
            ['nama_peralatan' => 'FAN 6', 'posisi' => 'R.GENSET', 'keterangan' => ['REMOTE', 'NORMAL']],
            ['nama_peralatan' => 'FAN 7', 'posisi' => 'R.GENSET', 'keterangan' => ['REMOTE', 'NORMAL']],
            ['nama_peralatan' => 'PANEL CHARGING', 'posisi' => 'PARKIRAN', 'keterangan' => ['NORMAL']],
            ['nama_peralatan' => 'PANEL RTU', 'posisi' => 'RUANG KABEL', 'keterangan' => ['NORMAL']],
        ];

        if (!FormPs2PanelDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['panel'] as $panel) {
                $formPs2PanelDuaMingguan = new FormPs2PanelDuaMingguan();
                $formPs2PanelDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2PanelDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs2PanelDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2PanelDuaMingguan->nama_peralatan = $panel['nama_peralatan'];
                $formPs2PanelDuaMingguan->posisi = $panel['posisi'];

                $formPs2PanelDuaMingguan->save();
            }
        }
        $data['formPs2PanelDuaMingguans'] = $detailWorkOrderForm->formPs2PanelDuaMingguan;
        $data['formPs2PanelDuaMingguans'] = FormPs2PanelDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.power-station-2.data-parameter-dua-mingguan-panel-sdp-epcc-exhaust-fan.index', $data);
    }

    public function dataParameterDuaMingguanPanelSdpEpccExhaustFanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM DATA PARAMETER 2 MINGGUAN PANEL SDP/EPCC/EXHAUST FAN';
        $validatedData = $request->validate([
            // 'nama_peralatan' => 'nullable',
            'tegangan_r.*' => 'nullable',
            'tegangan_s.*' => 'nullable',
            'tegangan_t.*' => 'nullable',
            'tegangan_rn.*' => 'nullable',
            'tegangan_sn.*' => 'nullable',
            'tegangan_tn.*' => 'nullable',
            'tegangan_rg.*' => 'nullable',
            'tegangan_sg.*' => 'nullable',
            'tegangan_tg.*' => 'nullable',
            'tegangan_gn.*' => 'nullable',
            'arus_r.*' => 'nullable',
            'arus_s.*' => 'nullable',
            'arus_t.*' => 'nullable',
            'arus_n.*' => 'nullable',
            'arus_g.*' => 'nullable',
            'daya.*' => 'nullable',
            'frekuensi.*' => 'nullable',
            // 'posisi.*' => 'nullable',
            'batt.*' => 'nullable',
            'keterangan.*' => 'nullable',
            'catatan' => 'nullable',
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        DB::beginTransaction();
        try {
            // Delete Old Data
            $dataER2Bs = FormPs2PanelDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();

            // Create New Data
            foreach ($dataER2Bs as $key => $value) {
                $value->detail_work_order_form_id = $detailWorkOrderForm->id;
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->work_order_id = $detailWorkOrderForm->work_order_id;
                $value->tegangan_r = $validatedData['tegangan_r'][$key] ?? null;
                $value->tegangan_s = $validatedData['tegangan_s'][$key] ?? null;
                $value->tegangan_t = $validatedData['tegangan_t'][$key] ?? null;
                $value->tegangan_rn = $validatedData['tegangan_rn'][$key] ?? null;
                $value->tegangan_sn = $validatedData['tegangan_sn'][$key] ?? null;
                $value->tegangan_tn = $validatedData['tegangan_tn'][$key] ?? null;
                $value->tegangan_rg = $validatedData['tegangan_rg'][$key] ?? null;
                $value->tegangan_sg = $validatedData['tegangan_sg'][$key] ?? null;
                $value->tegangan_tg = $validatedData['tegangan_tg'][$key] ?? null;
                $value->tegangan_gn = $validatedData['tegangan_gn'][$key] ?? null;
                $value->arus_r = $validatedData['arus_r'][$key] ?? null;
                $value->arus_s = $validatedData['arus_s'][$key] ?? null;
                $value->arus_t = $validatedData['arus_t'][$key] ?? null;
                $value->arus_n = $validatedData['arus_n'][$key] ?? null;
                $value->arus_g = $validatedData['arus_g'][$key] ?? null;
                $value->daya = $validatedData['daya'][$key] ?? null;
                $value->frekuensi = $validatedData['frekuensi'][$key] ?? null;
                // $value->posisi = $validatedData['posisi'][$key] ?? null;
                $value->batt = $validatedData['batt'][$key] ?? null;
                $value->keterangan = $validatedData['keterangan'][$key] ?? null;
                $value->catatan = $validatedData['catatan'] ?? null;

                $value->save();
            }

            DB::commit();

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

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

    public function formPs2PemeliharaanEnamBulanan(Request $request, DetailWorkOrderForm $detailWorkOrderForm){

        $data['page_title'] = 'FORM LAPORAN PEMELIHARAAN 6 BULANAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['datas'] = FormPs2::formPs2PemeliharaanEnamBulanan();

        DB::beginTransaction();
        try {
            if ($detailWorkOrderForm->formPs2PemeliharaanEnamBulanans->isEmpty()) {
            foreach($data['datas']->panelMv20Kvs as $item){
                $formPs2PemeliharaanEnamBulanan = new FormPs2PemeliharaanEnamBulanan();
                $formPs2PemeliharaanEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2PemeliharaanEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formPs2PemeliharaanEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2PemeliharaanEnamBulanan->group_spesifikasi_pemeliharaan = $item['group_spesifikasi_pemeliharaan'];
                $formPs2PemeliharaanEnamBulanan->spesifikasi_pemeliharaan = $item['spesifikasi_pemeliharaan'];
                $formPs2PemeliharaanEnamBulanan->save();
            }

            foreach($data['datas']->kabel20Kvs as $item){
                $formPs2PemeliharaanEnamBulanan = new FormPs2PemeliharaanEnamBulanan();
                $formPs2PemeliharaanEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2PemeliharaanEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formPs2PemeliharaanEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2PemeliharaanEnamBulanan->group_spesifikasi_pemeliharaan = $item['group_spesifikasi_pemeliharaan'];
                $formPs2PemeliharaanEnamBulanan->spesifikasi_pemeliharaan = $item['spesifikasi_pemeliharaan'];
                $formPs2PemeliharaanEnamBulanan->save();
            }
        }
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

        DB::commit();
    } catch (\Throwable $th) {
        DB::rollback();
    }
        $formPs2PemeliharaanEnamBulanans = $detailWorkOrderForm->formPs2PemeliharaanEnamBulanans;
        $data['panelMv20Kvs'] = $data['rak1s'] = $formPs2PemeliharaanEnamBulanans
        ->filter(function ($item) {
            return $item->group_spesifikasi_pemeliharaan == 'PANEL MV 20 KV';
        });
        $data['kabel20Kvs'] = $data['rak1s'] = $formPs2PemeliharaanEnamBulanans
        ->filter(function ($item) {
            return $item->group_spesifikasi_pemeliharaan == 'PANEL 20 KV';
        });

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }

        return view('form.power-station-2.laporan-pemeliharaan-enam-bulanan.index', $data);
    }

    public function formPs2PemeliharaanEnamBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            // 'panel.0' => 'required',
            'panel_1.*' => 'nullable',
            'panel_2.*' => 'nullable',
            'panel_3.*' => 'nullable',
            'giga_ohm.*' => 'nullable',
            'catetan' => 'nullable'
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        DB::beginTransaction();
        try {
            $formPs2PemeliharaanEnamBulanans = $detailWorkOrderForm->formPs2PemeliharaanEnamBulanans;
            
            // Query Filter PANEL MV 20 KV
            $panelMv20Kvs = $formPs2PemeliharaanEnamBulanans
            ->filter(function ($item) {
                return $item->group_spesifikasi_pemeliharaan == 'PANEL MV 20 KV';
            })
            ->values();

        foreach ($panelMv20Kvs as $panelMv20KvKey => $panelMv20Kv) {
            $panelMv20Kv->panel_1 = $validatedData['panel_1'][$panelMv20KvKey] ?? null;
            $panelMv20Kv->panel_2 = $validatedData['panel_2'][$panelMv20KvKey] ?? null;
            $panelMv20Kv->panel_3 = $validatedData['panel_3'][$panelMv20KvKey] ?? null;
            $panelMv20Kv->giga_ohm = $validatedData['giga_ohm'][$panelMv20KvKey] ?? null;
            $panelMv20Kv->catatan = $validatedData['catatan'] ?? null;
            $panelMv20Kv->save();
        }

        // Query Filter PANEL 20 KV
            $kabel20Kvs = $formPs2PemeliharaanEnamBulanans
            ->filter(function ($item) {
                return $item->group_spesifikasi_pemeliharaan == 'KABEL 20 KV';
            })
            ->values();
        foreach ($kabel20Kvs as $kabel20KvKey => $kabel20Kv) {
            $kabel20Kv->panel_1 = $validatedData['panel_1'][$kabel20KvKey] ?? null;
            $kabel20Kv->panel_2 = $validatedData['panel_2'][$kabel20KvKey] ?? null;
            $kabel20Kv->panel_3 = $validatedData['panel_3'][$kabel20KvKey] ?? null;
            $kabel20Kv->giga_ohm = $validatedData['giga_ohm'][$kabel20KvKey] ?? null;
            $kabel20Kv->catatan = $validatedData['catatan'] ?? null;
            $kabel20Kv->save();
        }
            DB::commit();

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

            DB::commit();

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

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

    public function treesUnitMpsDua(Request $request)
    {
        $data['page_title'] = 'FORM TREES UNIT MPS 2';

        return view('form.power-station-2.trees-unit-mps-dua.index', $data);
    }

    public function dataParameterDuaMingguanRuangTenaga(Request $request)
    {
        $data['page_title'] = 'FORM DATA PARAMETER 2 MINGGUAN RUANG TENAGA';

        return view('form.power-station-2.data-parameter-dua-mingguan-ruang-tenaga.index', $data);
    }

    public function dataParameterDuaMingguanRuangTenagaIndex(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM DATA PARAMETER 2 MINGGUAN RUANG TENAGA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['er1a'] = [['nama_peralatan' => 'XSA (INCOMING G1)', 'status' => ['REMOTE', 'OPEN'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XCA (OUT GOING BUS A)', 'status' => ['DS', 'CLOSE'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XSB (INCOMING G2)', 'status' => ['REMOTE', 'OPEN'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XSC (INCOMING G3)', 'status' => ['REMOTE', 'OPEN'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XSD (INCOMING G4)', 'status' => ['REMOTE', 'OPEN'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XSE (INCOMING G5)', 'status' => ['REMOTE', 'OPEN'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XSF (INCOMING G6)', 'status' => ['REMOTE', 'OPEN'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XSG (INCOMING G7)', 'status' => ['REMOTE', 'OPEN'], 'keterangan' => 'NORMAL']];

        $data['er1b'] = [['nama_peralatan' => 'XSL (INCOMING G1)', 'status' => ['REMOTE', 'CLOSE'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XCB (OUT GOING BUS B)', 'status' => ['DS', 'CLOSE'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XSM (INCOMING G2)', 'status' => ['REMOTE', 'CLOSE'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XSN (INCOMING G3)', 'status' => ['REMOTE', 'CLOSE'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XSO (INCOMING G4)', 'status' => ['REMOTE', 'CLOSE'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XSP (INCOMING G5)', 'status' => ['REMOTE', 'CLOSE'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XSQ (INCOMING G6)', 'status' => ['REMOTE', 'CLOSE'], 'keterangan' => 'NORMAL'], ['nama_peralatan' => 'XSR (INCOMING G7)', 'status' => ['REMOTE', 'CLOSE'], 'keterangan' => 'NORMAL']];

        $data['er2b'] = [
            ['nama_peralatan' => 'MCD (INCOMING GH127)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']],
            ['nama_peralatan' => 'MCE (INCOMING GH127)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']],
            ['nama_peralatan' => 'MSL', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSM (P10)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSN (NP15)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSO (NP22)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSP (NP24)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSQ (P24)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSR (P7)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSV (T6)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSW (T7)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSX (APMS)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSK (', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']],
            ['nama_peralatan' => 'MSJ (VT)', 'keterangan' => 'NORMAL', 'status' => ['DS', 'CLOSE']],
            ['nama_peralatan' => 'MCC (COUPLER)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MCG (IN GENSET BUS B)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
        ];

        $data['er2a'] = [
            ['nama_peralatan' => 'MCA (INCOMING GH127)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']],
            ['nama_peralatan' => 'MCB (INCOMING GH127)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']],
            ['nama_peralatan' => 'MSC (AUX A)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSD (NP 11)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSE (P12)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSF (P55)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSG (NP21)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSH (NP23)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSI (P50)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSS (T10)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MST (T1)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSU (', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MSB (TRAFO ZIG ZAG)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']],
            ['nama_peralatan' => 'MSA (VT)', 'keterangan' => 'NORMAL', 'status' => ['DS', 'CLOSE']],
            ['nama_peralatan' => 'MCC (COUPLER)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
            ['nama_peralatan' => 'MCF (IN GENSET BUS A)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'CLOSE']],
        ];

        $data['mv'] = [['nama_peralatan' => 'XDA (PPG 1)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']], ['nama_peralatan' => 'XDB (PGG 2)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']], ['nama_peralatan' => 'XDC (PPG 3)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']], ['nama_peralatan' => 'XDD (PPG 4)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']], ['nama_peralatan' => 'XDE (PPG 5)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']], ['nama_peralatan' => 'XDF (PPG 6)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']], ['nama_peralatan' => 'XDG (PPG 7)', 'keterangan' => 'NORMAL', 'status' => ['REMOTE', 'OPEN']]];

        $data['lv'] = [['nama_peralatan' => 'AUX B MDP 1', 'keterangan' => 'NORMAL', 'status' => ['LOCAL', 'CLOSE']], ['nama_peralatan' => 'AUX B MDP 2', 'keterangan' => 'NORMAL', 'status' => ['LOCAL', 'CLOSE']], ['nama_peralatan' => 'AUX B COUPLER', 'keterangan' => 'NORMAL', 'status' => ['AUTO', 'OPEN']], ['nama_peralatan' => 'OUT GOING AOCC A', 'keterangan' => 'NORMAL', 'status' => ['LOCAL', 'CLOSE']], ['nama_peralatan' => 'OUT GOING AOCC B', 'keterangan' => 'NORMAL', 'status' => ['LOCAL', 'CLOSE']], ['nama_peralatan' => 'TRAFO A', 'keterangan' => 'NORMAL', 'status' => ['TEMPERATUR']], ['nama_peralatan' => 'TRAFO B', 'keterangan' => 'NORMAL', 'status' => ['TEMPERATUR']]];

        // FormPs2RuangTenagaDuaMingguan
        if (
            !FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1a')
                ->first()
        ) {
            foreach ($data['er1a'] as $key => $value) {
                # code...
                $formPs2RuangTenagaDuaMingguanER1A = new FormPs2RuangTenagaDuaMingguan();
                $formPs2RuangTenagaDuaMingguanER1A->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2RuangTenagaDuaMingguanER1A->form_id = $detailWorkOrderForm->form_id;
                $formPs2RuangTenagaDuaMingguanER1A->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2RuangTenagaDuaMingguanER1A->grup = 'er1a';
                $formPs2RuangTenagaDuaMingguanER1A->nama_peralatan = $value['nama_peralatan'];
                $formPs2RuangTenagaDuaMingguanER1A->keterangan = $value['keterangan'];
                $formPs2RuangTenagaDuaMingguanER1A->save();
            }
        }

        if (
            !FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1b')
                ->first()
        ) {
            foreach ($data['er1b'] as $key => $value) {
                # code...
                $formPs2RuangTenagaDuaMingguanER1B = new FormPs2RuangTenagaDuaMingguan();
                $formPs2RuangTenagaDuaMingguanER1B->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2RuangTenagaDuaMingguanER1B->form_id = $detailWorkOrderForm->form_id;
                $formPs2RuangTenagaDuaMingguanER1B->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2RuangTenagaDuaMingguanER1B->grup = 'er1b';
                $formPs2RuangTenagaDuaMingguanER1B->nama_peralatan = $value['nama_peralatan'];
                $formPs2RuangTenagaDuaMingguanER1B->keterangan = $value['keterangan'];
                $formPs2RuangTenagaDuaMingguanER1B->save();
            }
        }

        if (
            !FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2a')
                ->first()
        ) {
            foreach ($data['er2a'] as $key => $value) {
                # code...
                $formPs2RuangTenagaDuaMingguanER2A = new FormPs2RuangTenagaDuaMingguan();
                $formPs2RuangTenagaDuaMingguanER2A->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2RuangTenagaDuaMingguanER2A->form_id = $detailWorkOrderForm->form_id;
                $formPs2RuangTenagaDuaMingguanER2A->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2RuangTenagaDuaMingguanER2A->grup = 'er2a';
                $formPs2RuangTenagaDuaMingguanER2A->nama_peralatan = $value['nama_peralatan'];
                $formPs2RuangTenagaDuaMingguanER2A->keterangan = $value['keterangan'];
                $formPs2RuangTenagaDuaMingguanER2A->save();
            }
        }

        if (
            !FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2b')
                ->first()
        ) {
            foreach ($data['er2b'] as $key => $value) {
                # code...
                $formPs2RuangTenagaDuaMingguanER2B = new FormPs2RuangTenagaDuaMingguan();
                $formPs2RuangTenagaDuaMingguanER2B->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2RuangTenagaDuaMingguanER2B->form_id = $detailWorkOrderForm->form_id;
                $formPs2RuangTenagaDuaMingguanER2B->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2RuangTenagaDuaMingguanER2B->grup = 'er2b';
                $formPs2RuangTenagaDuaMingguanER2B->nama_peralatan = $value['nama_peralatan'];
                $formPs2RuangTenagaDuaMingguanER2B->keterangan = $value['keterangan'];
                $formPs2RuangTenagaDuaMingguanER2B->save();
            }
        }

        if (
            !FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'lv')
                ->first()
        ) {
            foreach ($data['lv'] as $key => $value) {
                # code...
                $formPs2RuangTenagaDuaMingguanLV = new FormPs2RuangTenagaDuaMingguan();
                $formPs2RuangTenagaDuaMingguanLV->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2RuangTenagaDuaMingguanLV->form_id = $detailWorkOrderForm->form_id;
                $formPs2RuangTenagaDuaMingguanLV->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2RuangTenagaDuaMingguanLV->grup = 'lv';
                $formPs2RuangTenagaDuaMingguanLV->nama_peralatan = $value['nama_peralatan'];
                $formPs2RuangTenagaDuaMingguanLV->keterangan = $value['keterangan'];
                $formPs2RuangTenagaDuaMingguanLV->save();
            }
        }

        if (
            !FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'mv')
                ->first()
        ) {
            foreach ($data['mv'] as $key => $value) {
                # code...
                $formPs2RuangTenagaDuaMingguanMV = new FormPs2RuangTenagaDuaMingguan();
                $formPs2RuangTenagaDuaMingguanMV->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2RuangTenagaDuaMingguanMV->form_id = $detailWorkOrderForm->form_id;
                $formPs2RuangTenagaDuaMingguanMV->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2RuangTenagaDuaMingguanMV->grup = 'mv';
                $formPs2RuangTenagaDuaMingguanMV->nama_peralatan = $value['nama_peralatan'];
                $formPs2RuangTenagaDuaMingguanMV->keterangan = $value['keterangan'];
                $formPs2RuangTenagaDuaMingguanMV->save();
            }
        }
        $data['formPs2RuangTenagaDuaMingguanER1A'] = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er1a')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs2RuangTenagaDuaMingguanER1B'] = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er1b')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs2RuangTenagaDuaMingguanER2A'] = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er2a')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs2RuangTenagaDuaMingguanER2B'] = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er2b')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs2RuangTenagaDuaMingguanLV'] = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'lv')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs2RuangTenagaDuaMingguanMV'] = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'mv')
            ->orderBy('id', 'asc')
            ->get();

        // menyimpan FormActivityLog untuk status 'start'
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            $formActivityLog = new FormActivityLog();
            $formActivityLog->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formActivityLog->form_id = $detailWorkOrderForm->form_id;
            $formActivityLog->work_order_id = $detailWorkOrderForm->work_order_id;
            $formActivityLog->status = 'start';
            $formActivityLog->time_record = now();
            $formActivityLog->save();
        }

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }

        return view('form.power-station-2.data-parameter-dua-mingguan-ruang-tenaga.index', $data);
    }

    public function dataParameterDuaMingguanRuangTenagaUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM DATA PARAMETER 2 MINGGUAN RUANG TENAGA';

        $validatedDataER1A = $request->validate([
            // 'nama_peralatan' => 'nullable',
            'tegangan_r_er1a.*' => 'nullable',
            'tegangan_s_er1a.*' => 'nullable',
            'tegangan_t_er1a.*' => 'nullable',
            'arus_r_er1a.*' => 'nullable',
            'arus_s_er1a.*' => 'nullable',
            'arus_t_er1a.*' => 'nullable',
            'daya_er1a.*' => 'nullable',
            'frekuensi_er1a.*' => 'nullable',
            'cos_phi_er1a.*' => 'nullable',
            'status_er1a.*' => 'nullable',
            'keterangan_er1a.*' => 'nullable',
        ]);

        $validatedDataER1B = $request->validate([
            // 'nama_peralatan' => 'nullable',
            'tegangan_r_er1b.*' => 'nullable',
            'tegangan_s_er1b.*' => 'nullable',
            'tegangan_t_er1b.*' => 'nullable',
            'arus_r_er1b.*' => 'nullable',
            'arus_s_er1b.*' => 'nullable',
            'arus_t_er1b.*' => 'nullable',
            'daya_er1b.*' => 'nullable',
            'frekuensi_er1b.*' => 'nullable',
            'cos_phi_er1b.*' => 'nullable',
            'status_er1b.*' => 'nullable',
            'keterangan_er1b.*' => 'nullable',
        ]);

        $validatedDataER2A = $request->validate([
            // 'nama_peralatan' => 'nullable',
            'tegangan_r_er2a.*' => 'nullable',
            'tegangan_s_er2a.*' => 'nullable',
            'tegangan_t_er2a.*' => 'nullable',
            'arus_r_er2a.*' => 'nullable',
            'arus_s_er2a.*' => 'nullable',
            'arus_t_er2a.*' => 'nullable',
            'daya_er2a.*' => 'nullable',
            'frekuensi_er2a.*' => 'nullable',
            'cos_phi_er2a.*' => 'nullable',
            'status_er2a.*' => 'nullable',
            'keterangan_er2a.*' => 'nullable',
        ]);

        $validatedDataER2B = $request->validate([
            // 'nama_peralatan' => 'nullable',
            'tegangan_r_er2b.*' => 'nullable',
            'tegangan_s_er2b.*' => 'nullable',
            'tegangan_t_er2b.*' => 'nullable',
            'arus_r_er2b.*' => 'nullable',
            'arus_s_er2b.*' => 'nullable',
            'arus_t_er2b.*' => 'nullable',
            'daya_er2b.*' => 'nullable',
            'frekuensi_er2b.*' => 'nullable',
            'cos_phi_er2b.*' => 'nullable',
            'status_er2b.*' => 'nullable',
            'keterangan_er2b.*' => 'nullable',
        ]);

        $validatedDataLV = $request->validate([
            // 'nama_peralatan' => 'nullable',
            'tegangan_r_lv.*' => 'nullable',
            'tegangan_s_lv.*' => 'nullable',
            'tegangan_t_lv.*' => 'nullable',
            'arus_r_lv.*' => 'nullable',
            'arus_s_lv.*' => 'nullable',
            'arus_t_lv.*' => 'nullable',
            'daya_lv.*' => 'nullable',
            'frekuensi_lv.*' => 'nullable',
            'cos_phi_lv.*' => 'nullable',
            'status_lv.*' => 'nullable',
            'keterangan_lv.*' => 'nullable',
            'catatan' => 'nullable',
        ]);

        $validatedDataMV = $request->validate([
            // 'nama_peralatan' => 'nullable',
            'tegangan_r_mv.*' => 'nullable',
            'tegangan_s_mv.*' => 'nullable',
            'tegangan_t_mv.*' => 'nullable',
            'arus_r_mv.*' => 'nullable',
            'arus_s_mv.*' => 'nullable',
            'arus_t_mv.*' => 'nullable',
            'daya_mv.*' => 'nullable',
            'frekuensi_mv.*' => 'nullable',
            'cos_phi_mv.*' => 'nullable',
            'status_mv.*' => 'nullable',
            'keterangan_mv.*' => 'nullable',
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataER1As = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1a')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataER1As as $key => $value) {
                $value->detail_work_order_form_id = $detailWorkOrderForm->id;
                $value->work_order_id = $detailWorkOrderForm->work_order_id;
                // $value->nama_peralatan = $value;
                $value->tegangan_r = $validatedDataER1A['tegangan_r_er1a'][$key] ?? null;
                $value->tegangan_s = $validatedDataER1A['tegangan_s_er1a'][$key] ?? null;
                $value->tegangan_t = $validatedDataER1A['tegangan_t_er1a'][$key] ?? null;
                $value->arus_r = $validatedDataER1A['arus_r_er1a'][$key] ?? null;
                $value->arus_s = $validatedDataER1A['arus_s_er1a'][$key] ?? null;
                $value->arus_t = $validatedDataER1A['arus_t_er1a'][$key] ?? null;
                $value->daya = $validatedDataER1A['daya_er1a'][$key] ?? null;
                $value->frekuensi = $validatedDataER1A['frekuensi_er1a'][$key] ?? null;
                $value->cos_phi = $validatedDataER1A['cos_phi_er1a'][$key] ?? null;
                $value->status = $validatedDataER1A['status_er1a'][$key] ?? null;
                $value->keterangan = $validatedDataER1A['keterangan_er1a'][$key] ?? null;

                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $dataER1Bs = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1b')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataER1Bs as $key => $value) {
                $value->detail_work_order_form_id = $detailWorkOrderForm->id;
                $value->work_order_id = $detailWorkOrderForm->work_order_id;

                // $value->nama_peralatan = $value;
                $value->tegangan_r = $validatedDataER1B['tegangan_r_er1b'][$key] ?? null;
                $value->tegangan_s = $validatedDataER1B['tegangan_s_er1b'][$key] ?? null;
                $value->tegangan_t = $validatedDataER1B['tegangan_t_er1b'][$key] ?? null;
                $value->arus_r = $validatedDataER1B['arus_r_er1b'][$key] ?? null;
                $value->arus_s = $validatedDataER1B['arus_s_er1b'][$key] ?? null;
                $value->arus_t = $validatedDataER1B['arus_t_er1b'][$key] ?? null;
                $value->daya = $validatedDataER1B['daya_er1b'][$key] ?? null;
                $value->frekuensi = $validatedDataER1B['frekuensi_er1b'][$key] ?? null;
                $value->cos_phi = $validatedDataER1B['cos_phi_er1b'][$key] ?? null;
                $value->status = $validatedDataER1B['status_er1b'][$key] ?? null;
                $value->keterangan = $validatedDataER1B['keterangan_er1b'][$key] ?? null;

                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $dataER2As = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2a')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataER2As as $key => $value) {
                $value->detail_work_order_form_id = $detailWorkOrderForm->id;
                $value->work_order_id = $detailWorkOrderForm->work_order_id;
                // $value->nama_peralatan = $value;
                $value->tegangan_r = $validatedDataER2A['tegangan_r_er2a'][$key] ?? null;
                $value->tegangan_s = $validatedDataER2A['tegangan_s_er2a'][$key] ?? null;
                $value->tegangan_t = $validatedDataER2A['tegangan_t_er2a'][$key] ?? null;
                $value->arus_r = $validatedDataER2A['arus_r_er2a'][$key] ?? null;
                $value->arus_s = $validatedDataER2A['arus_s_er2a'][$key] ?? null;
                $value->arus_t = $validatedDataER2A['arus_t_er2a'][$key] ?? null;
                $value->daya = $validatedDataER2A['daya_er2a'][$key] ?? null;
                $value->frekuensi = $validatedDataER2A['frekuensi_er2a'][$key] ?? null;
                $value->cos_phi = $validatedDataER2A['cos_phi_er2a'][$key] ?? null;
                $value->status = $validatedDataER2A['status_er2a'][$key] ?? null;
                $value->keterangan = $validatedDataER2A['keterangan_er2a'][$key] ?? null;

                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $dataER2Bs = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2b')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataER2Bs as $key => $value) {
                $value->detail_work_order_form_id = $detailWorkOrderForm->id;
                $value->work_order_id = $detailWorkOrderForm->work_order_id;
                // $value->nama_peralatan = $value;
                $value->tegangan_r = $validatedDataER2B['tegangan_r_er2b'][$key] ?? null;
                $value->tegangan_s = $validatedDataER2B['tegangan_s_er2b'][$key] ?? null;
                $value->tegangan_t = $validatedDataER2B['tegangan_t_er2b'][$key] ?? null;
                $value->arus_r = $validatedDataER2B['arus_r_er2b'][$key] ?? null;
                $value->arus_s = $validatedDataER2B['arus_s_er2b'][$key] ?? null;
                $value->arus_t = $validatedDataER2B['arus_t_er2b'][$key] ?? null;
                $value->daya = $validatedDataER2B['daya_er2b'][$key] ?? null;
                $value->frekuensi = $validatedDataER2B['frekuensi_er2b'][$key] ?? null;
                $value->cos_phi = $validatedDataER2B['cos_phi_er2b'][$key] ?? null;
                $value->status = $validatedDataER2B['status_er2b'][$key] ?? null;
                $value->keterangan = $validatedDataER2B['keterangan_er2b'][$key] ?? null;

                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $dataLVs = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'lv')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataLVs as $key => $value) {
                $value->detail_work_order_form_id = $detailWorkOrderForm->id;
                $value->work_order_id = $detailWorkOrderForm->work_order_id;
                // $value->nama_peralatan = $value;
                $value->tegangan_r = $validatedDataLV['tegangan_r_lv'][$key] ?? null;
                $value->tegangan_s = $validatedDataLV['tegangan_s_lv'][$key] ?? null;
                $value->tegangan_t = $validatedDataLV['tegangan_t_lv'][$key] ?? null;
                $value->arus_r = $validatedDataLV['arus_r_lv'][$key] ?? null;
                $value->arus_s = $validatedDataLV['arus_s_lv'][$key] ?? null;
                $value->arus_t = $validatedDataLV['arus_t_lv'][$key] ?? null;
                $value->daya = $validatedDataLV['daya_lv'][$key] ?? null;
                $value->frekuensi = $validatedDataLV['frekuensi_lv'][$key] ?? null;
                $value->cos_phi = $validatedDataLV['cos_phi_lv'][$key] ?? null;
                $value->status = $validatedDataLV['status_lv'][$key] ?? null;
                $value->keterangan = $validatedDataLV['keterangan_lv'][$key] ?? null;
                $value->catatan = $validatedDataLV['catatan'] ?? null;

                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $dataMVs = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'mv')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataMVs as $key => $value) {
                $value->detail_work_order_form_id = $detailWorkOrderForm->id;
                $value->work_order_id = $detailWorkOrderForm->work_order_id;
                // $value->nama_peralatan = $value;
                $value->tegangan_r = $validatedDataMV['tegangan_r_mv'][$key] ?? null;
                $value->tegangan_s = $validatedDataMV['tegangan_s_mv'][$key] ?? null;
                $value->tegangan_t = $validatedDataMV['tegangan_t_mv'][$key] ?? null;
                $value->arus_r = $validatedDataMV['arus_r_mv'][$key] ?? null;
                $value->arus_s = $validatedDataMV['arus_s_mv'][$key] ?? null;
                $value->arus_t = $validatedDataMV['arus_t_mv'][$key] ?? null;
                $value->daya = $validatedDataMV['daya_mv'][$key] ?? null;
                $value->frekuensi = $validatedDataMV['frekuensi_mv'][$key] ?? null;
                $value->cos_phi = $validatedDataMV['cos_phi_mv'][$key] ?? null;
                $value->status = $validatedDataMV['status_mv'][$key] ?? null;
                $value->keterangan = $validatedDataMV['keterangan_mv'][$key] ?? null;

                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $formActivityLog = new FormActivityLog();
            $formActivityLog->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formActivityLog->form_id = $detailWorkOrderForm->form_id;
            $formActivityLog->work_order_id = $detailWorkOrderForm->work_order_id;
            $formActivityLog->status = 'end';
            $formActivityLog->user_technical_id = Auth::user()->id;
            $formActivityLog->time_record = now();
            $formActivityLog->save();
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

    // ----------------------------------
    /* --- Power Station 3 --- */
    public function checklistHarianGensetPs3ControlRoom(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM CHECKLIST HARIAN GENSET / CONTROL ROOM MPS 3';

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs3ControlRoomHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3ControlRoomHarian = new FormPs3ControlRoomHarian();
            $formPs3ControlRoomHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3ControlRoomHarian->form_id = $detailWorkOrderForm->form_id;
            $formPs3ControlRoomHarian->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3ControlRoomHarian->save();
        }
        $data['formPs3ControlRoomHarian'] = $detailWorkOrderForm->formPs3ControlRoomHarian;

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

        return view('form.power-station-3.checklist-harian-genset.control-room', $data);
    }

    public function checklistHarianGensetPs3ControlRoomUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'er2a_mca' => ['nullable'],
            'er2a_mcb' => ['nullable'],
            'er2b_mcd' => ['nullable'],
            'er2b_mce' => ['nullable'],
            'keterangan_pln_incoming' => ['nullable'],
            'er2a_mcf' => ['nullable'],
            'er2b_mcg' => ['nullable'],
            'keterangan_genset_incoming' => ['nullable'],
            'genset1' => ['nullable'],
            'genset2' => ['nullable'],
            'genset3' => ['nullable'],
            'genset4' => ['nullable'],
            'genset5' => ['nullable'],
            'genset6' => ['nullable'],
            'genset7' => ['nullable'],
            'genset8' => ['nullable'],
            'keterangan_hmi' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $data = FormPs3ControlRoomHarian::findOrFail($detailWorkOrderForm->formPs3ControlRoomHarian->id);
            $data->form_id = $detailWorkOrderForm->form_id;
            $data->er2a_mca = $validatedData['er2a_mca'] ?? null;
            $data->er2a_mcb = $validatedData['er2a_mcb'] ?? null;
            $data->er2b_mcd = $validatedData['er2b_mcd'] ?? null;
            $data->er2b_mce = $validatedData['er2b_mce'] ?? null;
            $data->keterangan_pln_incoming = $validatedData['keterangan_pln_incoming'] ?? null;
            $data->er2a_mcf = $validatedData['er2a_mcf'] ?? null;
            $data->er2b_mcg = $validatedData['er2b_mcg'] ?? null;
            $data->keterangan_genset_incoming = $validatedData['keterangan_genset_incoming'] ?? null;
            $data->genset1 = $validatedData['genset1'] ?? null;
            $data->genset2 = $validatedData['genset2'] ?? null;
            $data->genset3 = $validatedData['genset3'] ?? null;
            $data->genset4 = $validatedData['genset4'] ?? null;
            $data->genset5 = $validatedData['genset5'] ?? null;
            $data->genset6 = $validatedData['genset6'] ?? null;
            $data->genset7 = $validatedData['genset7'] ?? null;
            $data->genset8 = $validatedData['genset8'] ?? null;
            $data->keterangan_hmi = $validatedData['keterangan_hmi'] ?? null;
            if ($request->filled('busbar_a')) {
                $data->busbar_a = true;
            }
            if ($request->filled('busbar_b')) {
                $data->busbar_b = true;
            }
            $data->catatan = $validatedData['catatan'] ?? null;
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

    public function checklistHarianGensetPs3GensetRoom(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM CHECKLIST HARIAN GENSET / Genset ROOMS';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs3GensetRoomHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 8; $i++) {
                $formPs3GensetRoomHarian = new FormPs3GensetRoomHarian();
                $formPs3GensetRoomHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3GensetRoomHarian->form_id = $detailWorkOrderForm->form_id;
                $formPs3GensetRoomHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3GensetRoomHarian->save();
            }
        }
        $data['formPs3GensetRoomHarians'] = FormPs3GensetRoomHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.power-station-3.checklist-harian-genset.genset-room', $data);
    }

    public function checklistHarianGensetPs3GensetRoomUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate(
            [
                'q1_.*' => ['nullable'],
                'q2_.*' => ['nullable'],
                'q3_.*' => ['nullable'],
                'q4_.*' => ['nullable'],
                'q5_.*' => ['nullable'],
                'q6_.*' => ['nullable'],
                'q7_.*' => ['nullable'],
                'q8_.*' => ['nullable'],
                'q9_.*' => ['nullable'],
                'q10_.*' => ['nullable'],
                'q11_.*' => ['nullable'],
                'q12_.*' => ['nullable'],
                'q13_.*' => ['nullable'],
                'q14_.*' => ['nullable'],
                'q15_.*' => ['nullable'],
                'q16_gt1' => ['nullable'],
                'q16_gt2' => ['nullable'],
                'q16_gt3' => ['nullable'],
                'q17' => ['nullable'],
                'catatan' => ['nullable'],
            ],
            [
                'q1_.*.required' => 'The :attribute field is required.',
                'q2_.*.required' => 'The :attribute field is required.',
                'q3_.*.required' => 'The :attribute field is required.',
                'q4_.*.required' => 'The :attribute field is required.',
                'q5_.*.required' => 'The :attribute field is required.',
                'q6_.*.required' => 'The :attribute field is required.',
                'q7_.*.required' => 'The :attribute field is required.',
                'q8_.*.required' => 'The :attribute field is required.',
                'q9_.*.required' => 'The :attribute field is required.',
                'q10_.*.required' => 'The :attribute field is required.',
                'q11_.*.required' => 'The :attribute field is required.',
                'q12_.*.required' => 'The :attribute field is required.',
                'q13_.*.required' => 'The :attribute field is required.',
                'q14_.*.required' => 'The :attribute field is required.',
                'q15_.*.required' => 'The :attribute field is required.',
                'q16_gt1.required' => 'The :attribute field is required.',
                'q16_gt2.required' => 'The :attribute field is required.',
                'q16_gt3.required' => 'The :attribute field is required.',
                'q17.required' => 'The :attribute field is required.',
                'catatan.required' => 'The :attribute field is required.',
            ],
        );
        DB::beginTransaction();
        try {
            $datas = formPs3GensetRoomHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($datas as $key => $value) {
                $value->q1 = $validatedData['q1_'][$key] ?? null;
                $value->q2 = $validatedData['q2_'][$key] ?? null;
                $value->q3 = $validatedData['q3_'][$key] ?? null;
                $value->q4 = $validatedData['q4_'][$key] ?? null;
                $value->q5 = $validatedData['q5_'][$key] ?? null;
                $value->q6 = $validatedData['q6_'][$key] ?? null;
                $value->q7 = $validatedData['q7_'][$key] ?? null;
                $value->q8 = $validatedData['q8_'][$key] ?? null;
                $value->q9 = $validatedData['q9_'][$key] ?? null;
                $value->q10 = $validatedData['q10_'][$key] ?? null;
                $value->q11 = $validatedData['q11_'][$key] ?? null;
                $value->q12 = $validatedData['q12_'][$key] ?? null;
                $value->q13 = $validatedData['q13_'][$key] ?? null;
                $value->q14 = $validatedData['q14_'][$key] ?? null;
                $value->q15 = $validatedData['q15_'][$key] ?? null;
                $value->q16_gt1 = $validatedData['q16_gt1'] ?? null;
                $value->q16_gt2 = $validatedData['q16_gt2'] ?? null;
                $value->q16_gt3 = $validatedData['q16_gt3'] ?? null;
                $value->q17 = $validatedData['q17'] ?? null;
                $value->catatan = $validatedData['catatan'] ?? null;
                $value->save();
            }

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

            DB::commit();
            $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
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

    public function formPs2WoDuaMingguan()
    {
        $data['page_title'] = 'Tasklist Pengerjaan WO Dua Mingguan';
        $data['task_list'] = [
            ['nama_sop' => 'Perawatan 2 Mingguan GENSET 3000KVA', 'langkah_perbaikan' => 'KOORDINASI PEKERJAAN DENGAN PETUGAS APS', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 2 Mingguan GENSET 3000KVA', 'langkah_perbaikan' => 'PERSIAPAN PERALATAN KERJA & K3', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan GENSET 3000KVA', 'langkah_perbaikan' => 'VISUAL CEK KONDISI PERALATAN', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan GENSET 3000KVA', 'langkah_perbaikan' => 'PEMERIKSAAN LEVEL OLI, BBM DAN AIR RADIATOR', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan GENSET 3000KVA', 'langkah_perbaikan' => 'PEMERIKSAAN KEBOCORAN OLI, BBM DAN AIR RADIATOR', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan GENSET 3000KVA', 'langkah_perbaikan' => 'PEMERIKSAAN KONDISI BATTERY STATER', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan GENSET 3000KVA', 'langkah_perbaikan' => 'PEMERIKSAAN LAMPU INDIKATOR, DEIF DAN ECU', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan GENSET 3000KVA', 'langkah_perbaikan' => 'MEMBERSIHKAN BAGIAN - BAGIAN GENSET, AIR FLOW RADIATOR, SOUND ATTENUATOR, TRAFO, DAN DAILY TANK', 'estimasi' => '45'],
            ['nama_sop' => 'Perawatan 2 Mingguan GENSET 3000KVA', 'langkah_perbaikan' => 'MEMEBERSIHKAN AREA SEKITAR', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 2 Mingguan GENSET 3000KVA', 'langkah_perbaikan' => 'WARMING UP GENSET NO LOAD', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan GENSET 3000KVA', 'langkah_perbaikan' => 'PERAWATAN SELESAI PERALATAN', 'estimasi' => '5'],

            ['nama_sop' => 'Perawatan 2 Mingguan RUANG TENAGA PANEL TM', 'langkah_perbaikan' => 'KOORDINASI PEKERJAAN DENGAN PETUGAS APS', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 2 Mingguan RUANG TENAGA PANEL TM', 'langkah_perbaikan' => 'PERSIAPAN PERALATAN KERJA & K3', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan RUANG TENAGA PANEL TM', 'langkah_perbaikan' => 'VISUAL CEK KONDISI PERALATAN', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan RUANG TENAGA PANEL TM', 'langkah_perbaikan' => 'PEMERIKSAAN DAN PENCATATAN PARAMETER DARI PANEL', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan RUANG TENAGA PANEL TM', 'langkah_perbaikan' => 'MEMBERSIHKAN SISI BAGIAN LUAR PANEL', 'estimasi' => '30'],
            ['nama_sop' => 'Perawatan 2 Mingguan RUANG TENAGA PANEL TM', 'langkah_perbaikan' => 'MEMBERSIHKAN AREA SEKITAR', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 2 Mingguan RUANG TENAGA PANEL TM', 'langkah_perbaikan' => 'PERAWATAN SELESAI PERALATAN NORMAL', 'estimasi' => '5'],

            ['nama_sop' => 'Perawatan 2 Mingguan PANEL LVMDP', 'langkah_perbaikan' => 'KOORDINASI PEKERJAAN DENGAN PETUGAS APS', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL LVMDP', 'langkah_perbaikan' => 'PERSIAPAN PERALATAN KERJA & K3', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL LVMDP', 'langkah_perbaikan' => 'VISUAL CEK KONDISI PERALATAN', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL LVMDP', 'langkah_perbaikan' => 'PEMERIKSAAN DAN PENCATATAN PARAMETER DARI PANEL', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL LVMDP', 'langkah_perbaikan' => 'MEMBERSIHKAN SISI LUAR PANEL, TRAFO AUXILIARY DAN TRAFO ZIG-ZAG', 'estimasi' => '45'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL LVMDP', 'langkah_perbaikan' => 'MEMBERSIHKAN AREA SEKITAR', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL LVMDP', 'langkah_perbaikan' => 'PERAWATAN SELESAI PERALATAN NORMAL', 'estimasi' => '5'],

            ['nama_sop' => 'Perawatan 2 Mingguan GROUND TANK', 'langkah_perbaikan' => 'KOORDINASI PEKERJAAN DENGAN PETUGAS APS', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 2 Mingguan GROUND TANK', 'langkah_perbaikan' => 'PERSIAPAN PERALATAN KERJA & K3', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan GROUND TANK', 'langkah_perbaikan' => 'VISUAL CEK AREA SEKITAR GROUND TANK', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan GROUND TANK', 'langkah_perbaikan' => 'PEMERIKSAAN KEBOCORAN PADA JALUR BBM', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan GROUND TANK', 'langkah_perbaikan' => 'MEMBERSIHKAN SISI BAGIAN LUAR TANKI 20000 Lt', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan GROUND TANK', 'langkah_perbaikan' => 'MEMBERSIHKAN BAGIAN LUAR PIPA - PIPA SALURAN BBM', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan GROUND TANK', 'langkah_perbaikan' => 'MEMBERSIKAN PANEL CONTROL POMPA', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan GROUND TANK', 'langkah_perbaikan' => 'MEMBERSIHKAN BAGIAN LUAR POMPA BBM', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan GROUND TANK', 'langkah_perbaikan' => 'MEMBERSIHKAN AREA SEKITAR', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan GROUND TANK', 'langkah_perbaikan' => 'PERAWATAN SELESAI, PERALATAN NORMAL', 'estimasi' => '5'],

            ['nama_sop' => 'Perawatan 2 Mingguan PH AOCC', 'langkah_perbaikan' => 'KOORDINASI PEKERJAAN DENGAN PETUGAS APS', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 2 Mingguan PH AOCC', 'langkah_perbaikan' => 'PERSIAPAN PERALATAN KERJA & K3', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan PH AOCC', 'langkah_perbaikan' => 'VISUAL CEK KONDISI PERALATAN', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan PH AOCC', 'langkah_perbaikan' => 'PEMERIKSAAN LEVEL OLI, BBM  DAN AIR RADIATOR', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan PH AOCC', 'langkah_perbaikan' => 'PEMERIKSAAN KEBOCORAN OLI, BBM DAN AIR RADIATOR', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan PH AOCC', 'langkah_perbaikan' => 'PEMERIKSAAN KONDISI BATTERY STATER DEIF DAN ECU', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan PH AOCC', 'langkah_perbaikan' => 'PENGECEKAN DAN PENCATATAN PARAMETER PANEL ACTS,LVMDP,MDP', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan PH AOCC', 'langkah_perbaikan' => 'PEMBERSIHAN BAGIAN-BAGIAN GENSET, PANEL,DAILY TANK, MONLY TANK DAN PANEL', 'estimasi' => '30'],
            ['nama_sop' => 'Perawatan 2 Mingguan PH AOCC', 'langkah_perbaikan' => 'MEMBERSIHKAN AREA SEKITAR', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan PH AOCC', 'langkah_perbaikan' => 'WARMING UP GENSET NO LOAD', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan PH AOCC', 'langkah_perbaikan' => 'PERAWATAN SELESAI PERALATAN NORMAL', 'estimasi' => '5'],

            ['nama_sop' => 'Perawatan 2 Mingguan PANEL SDP, EPCC', 'langkah_perbaikan' => 'KOORDINASI PEKERJAAN DENGAN PETUGAS APS', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL SDP, EPCC', 'langkah_perbaikan' => 'PERSIAPAN PERALATAN KERJA & K3', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL SDP, EPCC', 'langkah_perbaikan' => 'VISUAL CEK KONDISI PERALATAN', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL SDP, EPCC', 'langkah_perbaikan' => 'PENGECEKAN DAN PENCATATAN PARAMETER', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL SDP, EPCC', 'langkah_perbaikan' => 'PEMERIKSAAN KEKENCANGAN BAUT KONEKTOR', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL SDP, EPCC', 'langkah_perbaikan' => 'PEMERIKSAAN LAMPU INDIKATOR', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL SDP, EPCC', 'langkah_perbaikan' => 'MEMBERSIHKAN SISI BAGIAN DALAM DAN LUAR PANEL', 'estimasi' => '30'],
            ['nama_sop' => 'Perawatan 2 Mingguan PANEL SDP, EPCC', 'langkah_perbaikan' => 'PERAWATAN SELESAI PERALATAN NORMAL', 'estimasi' => '5'],
        ];

        return view('form.power-station-2.wo-tasklist.dua-mingguan', $data);
    }

    public function formPs2WoTigaBulanan()
    {
        //new comment
        $data['page_title'] = 'Form Ps2 Work Order Tiga Bulanan';
        $data['task_list'] = [
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 3000KVA', 'langkah_perbaikan' => 'KOORDINASI DENGAN PETUGAS APS', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 3000KVA', 'langkah_perbaikan' => 'SIAPKAN PERALATAN KERJA & K3', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 3000KVA', 'langkah_perbaikan' => 'BLOK MESIN GENSET', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 3000KVA', 'langkah_perbaikan' => 'PERIKSA LEVEL OLI, BBM DAN AIR RADIATOR', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 3000KVA', 'langkah_perbaikan' => 'PERIKSA KONDISI DEIF,BATTERY STARTER DAN PANEL GENSET', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 3000KVA', 'langkah_perbaikan' => 'MEMBERSIHKAN FILTER UDARA, ELEMENT FILTER WATER SEPARATOR', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 3000KVA', 'langkah_perbaikan' => 'CHECK KONDISI DAILY TANK', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 3000KVA', 'langkah_perbaikan' => 'PEMBERSIHKAN SISI BAGIAN DAILY TANK', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 3000KVA', 'langkah_perbaikan' => 'PENGETESAN SISTEM OTOMATIS BBM,DRAIN BBM KE GROUND TANK', 'estimasi' => '20'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 3000KVA', 'langkah_perbaikan' => 'MEMBERSIHKAN BAGIAN-BAGIAN GENSET DAN AREA SEKITAR', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 3000KVA', 'langkah_perbaikan' => 'PERAWATAN SELESAI PERALATAN NORMAL', 'estimasi' => '5'],

            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 750KVA', 'langkah_perbaikan' => 'KOORDINASI DENGAN PETUGAS APS', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 750KVA', 'langkah_perbaikan' => 'SIAPKAN PERALATAN KERJA & K3', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 750KVA', 'langkah_perbaikan' => 'BLOK MESIN GENSET', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 750KVA', 'langkah_perbaikan' => 'PERIKSA LEVEL OLI,BBM DAN AIR RADIATOR', 'estimasi' => '5'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 750KVA', 'langkah_perbaikan' => 'PERIKSA KONDISI DEIF,BATTERY STARTER DAN PANEL GENSET', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 750KVA', 'langkah_perbaikan' => 'MEMBERSIHKAN FILTER UDARA, ELEMENT FILTER WATER SEPARATOR', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 750KVA', 'langkah_perbaikan' => 'CHECK KONDISI DAILY TANK', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 750KVA', 'langkah_perbaikan' => 'PEMBERSIHKAN SISI BAGIAN DAILY TANK', 'estimasi' => '10'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 750KVA', 'langkah_perbaikan' => 'PENGETESAN MOTOR POMPA PENGISI DAILY TANK', 'estimasi' => '20'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 750KVA', 'langkah_perbaikan' => 'MEMBERSIHKAN BAGIAN-BAGIAN GENSET DAN AREA SEKITAR', 'estimasi' => '15'],
            ['nama_sop' => 'Perawatan 3 Bulanan GENSET 750KVA', 'langkah_perbaikan' => 'PERAWATAN SELESAI PERALATAN NORMAL', 'estimasi' => '5'],
        ];
        // return view('form.power-station-2.wo-tasklist.tiga-bulanan', compact('data'));
        return view('form.power-station-2.wo-tasklist.tiga-bulanan', $data);
    }

    /* --- HV & MV Station --- */
    public function harianGIS(Request $request)
    {
        $data['page_title'] = 'Form Checklist Harian GIS 150Kv BSH';

        return view('form.hv&mv-station.checklist-gis.index', $data);
    }

    public function harianTM(Request $request)
    {
        $data['page_title'] = 'Form Checklist Harian TM 150Kv BSH';

        $data['assets'] = [
            [
                'name' => 'XCA',
                'keterangan' => 'INCOMING 1',
            ],
            [
                'name' => 'XCB',
                'keterangan' => 'INCOMING 2',
            ],
            [
                'name' => 'XCC',
                'keterangan' => 'INCOMING 1',
            ],
            [
                'name' => 'XCA',
                'keterangan' => 'INCOMING 3',
            ],
            [
                'name' => 'MSA',
                'keterangan' => 'AUX TRAFO',
            ],
            [
                'name' => 'MSB',
                'keterangan' => 'GH 127 A',
            ],
            [
                'name' => 'MSC',
                'keterangan' => 'OUT 1',
            ],
            [
                'name' => 'MSD',
                'keterangan' => 'VT 1',
            ],
            [
                'name' => 'MSE',
                'keterangan' => 'COUPLER A1',
            ],
            [
                'name' => 'MSF',
                'keterangan' => 'COUPLER B2',
            ],
            [
                'name' => 'MSG',
                'keterangan' => 'COUPLER A2',
            ],
            [
                'name' => 'MSH',
                'keterangan' => 'COUPLER B2',
            ],
            [
                'name' => 'MSI',
                'keterangan' => 'VT 2',
            ],
            [
                'name' => 'MSJ',
                'keterangan' => 'GH 127B',
            ],
            [
                'name' => 'MSK',
                'keterangan' => 'OUT 2',
            ],
            [
                'name' => 'MSL',
                'keterangan' => 'COUPLER A3',
            ],
            [
                'name' => 'MSM',
                'keterangan' => 'OUT 2',
            ],
            [
                'name' => 'MSN',
                'keterangan' => 'GH 128',
            ],
            [
                'name' => 'MSO',
                'keterangan' => 'VT 3',
            ],
            [
                'name' => 'MSP',
                'keterangan' => 'COUPLER B3',
            ],
        ];

        return view('form.hv&mv-station.checklist-tm.index', $data);
    }

    public function logBook(Request $request)
    {
        $data['page_title'] = 'Form Checklist Log Book';

        return view('form.hv&mv-station.log-book.index', $data);
    }

    public function metering(Request $request)
    {
        $data['page_title'] = 'Form Checklist Metering';

        return view('form.hv&mv-station.metering.index', $data);
    }

    /* --- HV & MV Station Sistem Pelaporan --- */

    public function sistemPelaporan(Request $request)
    {
        $data['page_title'] = 'Form Checklist Sistem Pelaporan';

        return view('form.hv&mv-station.sistem-pelaporan.index', $data);
    }

    /* --- HV & MV Station Sistem Pelaporan GIS --- */

    public function sistemPelaporanGIS(Request $request)
    {
        $data['page_title'] = 'Form Checklist Sistem Pelaporan GIS';

        return view('form.hv&mv-station.sistem-pelaporan.gis.index', $data);
    }

    public function bulananGIS(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan Bulanan GIS 150 KV';

        return view('form.hv&mv-station.sistem-pelaporan.gis.bulanan.index', $data);
    }

    public function tigaBulananGIS(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan 3 Bulanan GIS 150 KV';

        return view('form.hv&mv-station.sistem-pelaporan.gis.tiga-bulanan.index', $data);
    }

    public function tahunanGIS(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan Tahunan GIS 150 KV';

        return view('form.hv&mv-station.sistem-pelaporan.gis.tahunan.index', $data);
    }

    public function duaTahunanGIS(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan 2 Tahunan GIS 150 KV';

        return view('form.hv&mv-station.sistem-pelaporan.gis.dua-tahunan.index', $data);
    }

    public function kondisionalGIS(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan Kondisional GIS 150 KV';

        return view('form.hv&mv-station.sistem-pelaporan.gis.kondisional.index', $data);
    }

    /* --- HV & MV Station Sistem Pelaporan Panel --- */

    public function sistemPelaporanPanel(Request $request)
    {
        $data['page_title'] = 'Form Checklist Sistem Pelaporan Panel';

        return view('form.hv&mv-station.sistem-pelaporan.panel.index', $data);
    }

    public function tigaBulananPanel(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan 3 Bulanan Panel 20 KV';

        return view('form.hv&mv-station.sistem-pelaporan.panel.tiga-bulanan.index', $data);
    }

    public function bulananPanel(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan Bulanan Panel 20 KV';

        return view('form.hv&mv-station.sistem-pelaporan.panel.bulanan.index', $data);
    }

    /* --- HV & MV Station Sistem Pelaporan Transformer --- */

    public function sistemPelaporanTransformer(Request $request)
    {
        $data['page_title'] = 'Form Checklist Sistem Pelaporan Power Transformer';

        return view('form.hv&mv-station.sistem-pelaporan.transformer.index', $data);
    }

    public function mingguanTransformer(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan Mingguan Power Transformer';

        return view('form.hv&mv-station.sistem-pelaporan.transformer.mingguan.index', $data);
    }

    public function bulananTransformer(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan Bulanan Power Transformer';

        return view('form.hv&mv-station.sistem-pelaporan.transformer.bulanan.index', $data);
    }

    public function triwulanTransformer(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan Triwulan Power Transformer';

        return view('form.hv&mv-station.sistem-pelaporan.transformer.triwulan.index', $data);
    }

    public function semesteranTransformer(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan Semesteran Power Transformer';

        return view('form.hv&mv-station.sistem-pelaporan.transformer.semesteran.index', $data);
    }

    public function tahunanTransformer(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan Tahunan Power Transformer';

        return view('form.hv&mv-station.sistem-pelaporan.transformer.tahunan.index', $data);
    }

    public function duaTahunanTransformer(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan Dua Tahunan Power Transformer';

        return view('form.hv&mv-station.sistem-pelaporan.transformer.dua-tahunan.index', $data);
    }

    public function kondisionalTransformer(Request $request)
    {
        $data['page_title'] = 'Pemelihaaraan Kondisional Power Transformer';

        return view('form.hv&mv-station.sistem-pelaporan.transformer.kondisional.index', $data);
    }

    public function wo(Request $request)
    {
        $data['page_title'] = 'Form WO';

        return view('form.hv&mv-station.wo.index', $data);
    }

    /* --- Electrical Protection --- */
    public function checklistPeralatanHarian()
    {
        $data['page_title'] = 'CHECKLIST PERALATAN HARIAN | ELECTRICAL PROTECTION';

        return view('form.electrical-protection.checklist-peralatan-harian.index', $data);
    }

    public function dataTeknisKwhMeterUnitElectricalProtection(Request $request)
    {
        $data['page_title'] = 'DATA TEKNIS KWH METER UNIT ELECTRICAL PROTECTION';
        $data['assets'] = Asset::whereNull('parent_id')->get();

        return view('form.electrical-protection.data_teknis_kwh_meter_unit_electrical_protection.index', $data);
    }

    public function dataTeknisPerawatanPlcUnitElectricalProtection()
    {
        $data['page_title'] = 'DATA TEKNIS PERAWATAN PLC UNIT ELECTRICAL PROTECTION';

        return view('form.electrical-protection.data_teknis_perawatan_plc_unit_electrical_protection.index');
    }

    public function dataTeknisPerawatanRelayProteksiUnitElectricalProtection()
    {
        $data['page_title'] = 'DATA TEKNIS PERAWATAN RELAY PROTEKSI UNIT ELECTRICAL PROTECTION';

        return view('form.electrical-protection.data_teknis_perawatan_relay_proteksi_unit_electrical_protection.index');
    }

    public function dataTeknisPerawatanTrafoUnitElectricalProtection()
    {
        $data['page_title'] = 'DATA TEKNIS PERAWATAN TRAFO UNIT ELECTRICAL PROTECTION';

        return view('form.electrical-protection.data_teknis_perawatan_trafo_unit_electrical_protection.index');
    }

    public function laporanKerusakanUnitElectricalProtection()
    {
        $data['page_title'] = 'LAPORAN KERUSAKAN UNIT ELECTRICAL PROTECTION';

        return view('form.electrical-protection.laporan_kerusakan_unit_electeical_protection.index');
    }

    // -- Start Laporan Kerusakan Electrical Protection --

    public function laporanKerusakanUnitElectricalProtectionIndex(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'LAPORAN KERUSAKAN UNIT ELECTRICAL PROTECTION';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!laporanKerusakanElectricalProtection::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $laporanKerusakanElectricalProtection = new laporanKerusakanElectricalProtection();
            $laporanKerusakanElectricalProtection->detail_work_order_form_id = $detailWorkOrderForm->id;
            $laporanKerusakanElectricalProtection->form_id = $detailWorkOrderForm->form_id;
            $laporanKerusakanElectricalProtection->work_order_id = $detailWorkOrderForm->work_order_id;
            $laporanKerusakanElectricalProtection->save();
        }
        $data['laporanKerusakanElectricalProtection'] = $detailWorkOrderForm->laporanKerusakanElectricalProtection;

        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            //Form Log Activity
            ActivityLog::startLog($detailWorkOrderForm);
        }

        return view('form.electrical-protection.laporan_kerusakan_unit_electeical_protection.index', $data);
    }

    public function laporanKerusakanUnitElectricalProtectionUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'date' => ['required'],
            'fasilitas' => ['required'],
            'peralatan' => ['required'],
            'bagian_peralatan' => ['required'],
            'kategori_kerusakan' => ['required'],
            'uraian_kerusakan' => ['required'],
            'tindakan_perbaikan' => ['required'],
            'penyebab_perbaikan' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'jumlah_jam_operasi_terputus' => ['required'],
            'kode_hambatan' => ['required'],
            'catatan' => ['nullable'],
        ]);

        $data = laporanKerusakanElectricalProtection::findOrFail($detailWorkOrderForm->laporanKerusakanElectricalProtection->id);
        $data->form_id = $detailWorkOrderForm->form_id;
        $data->date = $validatedData['date'];
        $data->fasilitas = $validatedData['fasilitas'];
        $data->peralatan = $validatedData['peralatan'];
        $data->bagian_peralatan = $validatedData['bagian_peralatan'];
        $data->kategori_kerusakan = $validatedData['kategori_kerusakan'];
        $data->uraian_kerusakan = $validatedData['uraian_kerusakan'];
        $data->tindakan_perbaikan = $validatedData['tindakan_perbaikan'];
        $data->penyebab_perbaikan = $validatedData['penyebab_perbaikan'];
        $data->start_date = $validatedData['start_date'];
        $data->end_date = $validatedData['end_date'];
        $data->jumlah_jam_operasi_terputus = $validatedData['jumlah_jam_operasi_terputus'];
        $data->kode_hambatan = $validatedData['kode_hambatan'];

        $data->catatan = $validatedData['catatan'] ?? null;
        $data->save();

        //Form Log Activity
        ActivityLog::endLog($detailWorkOrderForm);

        return redirect()
            ->route('work-orders.show', $detailWorkOrderForm->work_order_id)
            ->with([
                'success' => 'New Data
        added successfully!',
            ]);
    }

    // -- End Laporan Kerusakan Electrical Protection --

    public function electricalProtectionMaintenanceReport()
    {
        $data['page_title'] = 'ELECTRICAL PROTECTION MAINTENANCE REPORT';

        return view('form.electrical-protection.electrical_protection_maintenance_report.index');
    }

    // public function harianTM(Request $request)
    // {
    //     $data['page_title'] = 'Form Checklist Harian TM 20Kv';

    //     return view('form.hv&mv-station.checklist-TM.index', $data);
    // }

    /* --- Electrical Utility --- */
    public function checklist1(Request $request)
    {
        $data['page_title'] = 'Form Check List 1';

        return view('form.eu.checklist1.index', $data);
    }

    public function checklist2(Request $request)
    {
        $data['page_title'] = 'Form Check List 2';

        return view('form.eu.checklist2.index', $data);
    }

    public function perintahKerja(Request $request)
    {
        $data['page_title'] = 'Form Perintah Kerja';

        return view('form.eu.perintah-kerja.index', $data);
    }

    public function perintahPemasangan(Request $request)
    {
        $data['page_title'] = 'Form Perintah Pemasangan';

        return view('form.eu.perintah-pemasangan.index', $data);
    }

    public function pemeriksaanRutin(Request $request)
    {
        $data['page_title'] = 'Form Pemeriksaan Rutin';

        return view('form.eu.pemeriksaan-rutin.index', $data);
    }
}
