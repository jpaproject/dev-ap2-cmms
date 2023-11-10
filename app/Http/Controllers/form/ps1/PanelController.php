<?php

namespace App\Http\Controllers\form\ps1;

use App\Models\Asset;
use App\Models\DetailWorkOrderForm;
use App\Models\FormActivityLog;
use App\Models\FormPs1PanelHarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\UserTechnical;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:work-order-list', ['only' => 'index']);
        $this->middleware('permission:work-order-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:work-order-detail', ['only' => 'show']);
        $this->middleware('permission:work-order-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:work-order-delete', ['only' => ['destroy']]);
    }


public function formPs1PanelHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['ext'] = [
            ['cubicle' => 'MCB', 'keterangan' => 'INCOMING FROM GH128'],
            ['cubicle' => 'MCC', 'keterangan' => 'INCOMING FROM GH126'],
            ['cubicle' => 'MSD', 'keterangan' => 'OUTGOING TO MCA ER2A'],
            ['cubicle' => 'MSE', 'keterangan' => 'OUTGOING TO MCB ER2A'],
        ];

        $data['er2a'] = [
            ['cubicle' => 'MCA', 'keterangan' => 'INCOMING FROM '],
            ['cubicle' => 'MCB', 'keterangan' => 'INCOMING FROM '],
            ['cubicle' => 'MSC', 'keterangan' => 'COUPLER'],
            ['cubicle' => 'MSD', 'keterangan' => 'VT METERING'],
            ['cubicle' => 'MSE', 'keterangan' => 'NGR'],
            ['cubicle' => 'MSF', 'keterangan' => 'TRAFO AUX A'],
            ['cubicle' => 'MSG', 'keterangan' => 'APMS'],
            ['cubicle' => 'MSH', 'keterangan' => 'ER 6 (XCA)'],
            ['cubicle' => 'MSI', 'keterangan' => ''],
            ['cubicle' => 'MSS', 'keterangan' => 'NP 51'],
            ['cubicle' => 'MST', 'keterangan' => ''],
            ['cubicle' => 'MSU', 'keterangan' => ''],
            ['cubicle' => 'MSB', 'keterangan' => ''],
            ['cubicle' => 'MSA', 'keterangan' => ''],
            ['cubicle' => 'MCC', 'keterangan' => ''],
            ['cubicle' => 'MCF', 'keterangan' => 'INCOMING GENSET'],
        ];

        $data['er2b'] = [
            ['cubicle' => 'MCD', 'keterangan' => 'INCOMING FROM '],
            ['cubicle' => 'MCE', 'keterangan' => 'INCOMING FROM '],
            ['cubicle' => 'MSL', 'keterangan' => 'COUPLER'],
            ['cubicle' => 'MSM', 'keterangan' => 'VT METERING'],
            ['cubicle' => 'MSN', 'keterangan' => 'NGR'],
            ['cubicle' => 'MSO', 'keterangan' => 'TRAFO AUX B'],
            ['cubicle' => 'MSP', 'keterangan' => 'APMS'],
            ['cubicle' => 'MSQ', 'keterangan' => 'ER 6 (XCB)'],
            ['cubicle' => 'MSR', 'keterangan' => ''],
            ['cubicle' => 'MSV', 'keterangan' => 'NP 55'],
            ['cubicle' => 'MSW', 'keterangan' => ''],
            ['cubicle' => 'MSX', 'keterangan' => ''],
            ['cubicle' => 'MSK', 'keterangan' => ''],
            ['cubicle' => 'MSJ', 'keterangan' => ''],
            ['cubicle' => 'MCC', 'keterangan' => ''],
            ['cubicle' => 'MCG', 'keterangan' => 'INCOMING GENSET'],
        ];

        $data['er1b'] = [
            ['cubicle' => 'XSA', 'keterangan' => 'INCOMING GS 1'],
            ['cubicle' => 'XSB', 'keterangan' => 'INCOMING GS 2'],
            ['cubicle' => 'XCA', 'keterangan' => 'OUTGOING GENSET'],
            ['cubicle' => 'MSA', 'keterangan' => 'VT METERING'],
        ];


        $data['panel_mv_genset'] = [
            ['cubicle' => 'XDA', 'keterangan' => 'GS 1'],
            ['cubicle' => 'XDB', 'keterangan' => 'GS 2'],
        ];

        $data['page_title'] = 'Form Checklist Harian Panel';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'er2a')->first()) {

            foreach ($data['er2a'] as $key => $value) {
                # code...
                $formPs1PanelHarianER2A = new FormPs1PanelHarian();
                $formPs1PanelHarianER2A->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelHarianER2A->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelHarianER2A->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelHarianER2A->grup = 'er2a';
                $formPs1PanelHarianER2A->cubicle = $value['cubicle'];
                $formPs1PanelHarianER2A->keterangan = $value['keterangan'];
                $formPs1PanelHarianER2A->save();
            }
        }

        if (!FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'er2b')->first()) {
            foreach ($data['er2b'] as $key => $value) {
                # code...
                $formPs1PanelHarianER2B = new FormPs1PanelHarian();
                $formPs1PanelHarianER2B->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelHarianER2B->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelHarianER2B->work_order_id = $detailWorkOrderForm->work_order_id;

                $formPs1PanelHarianER2B->grup = 'er2b';
                $formPs1PanelHarianER2B->cubicle = $value['cubicle'];
                $formPs1PanelHarianER2B->keterangan = $value['keterangan'];
                $formPs1PanelHarianER2B->save();
            }
        }

        if (!FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'ext')->first()) {
            foreach ($data['ext'] as $key => $value) {
                # code...
                $formPs1PanelHarianEXT = new FormPs1PanelHarian();
                $formPs1PanelHarianEXT->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelHarianEXT->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelHarianEXT->work_order_id = $detailWorkOrderForm->work_order_id;

                $formPs1PanelHarianEXT->grup = 'ext';
                $formPs1PanelHarianEXT->cubicle = $value['cubicle'];
                $formPs1PanelHarianEXT->keterangan = $value['keterangan'];
                $formPs1PanelHarianEXT->save();
            }
        }
        if (!FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'er1b')->first()) {
            foreach ($data['er1b'] as $key => $value) {
                # code...
                $formPs1PanelHarianER1B = new FormPs1PanelHarian();
                $formPs1PanelHarianER1B->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelHarianER1B->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelHarianER1B->work_order_id = $detailWorkOrderForm->work_order_id;

                $formPs1PanelHarianER1B->grup = 'er1b';
                $formPs1PanelHarianER1B->cubicle = $value['cubicle'];
                $formPs1PanelHarianER1B->keterangan = $value['keterangan'];
                $formPs1PanelHarianER1B->save();
            }
        }
        if (!FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'panel_mv_genset')->first()) {
            foreach ($data['panel_mv_genset'] as $key => $value) {
                # code...
                $formPs1PanelHarianPanel = new FormPs1PanelHarian();
                $formPs1PanelHarianPanel->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelHarianPanel->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelHarianPanel->work_order_id = $detailWorkOrderForm->work_order_id;

                $formPs1PanelHarianPanel->grup = 'panel_mv_genset';
                $formPs1PanelHarianPanel->cubicle = $value['cubicle'];
                $formPs1PanelHarianPanel->keterangan = $value['keterangan'];
                $formPs1PanelHarianPanel->save();
            }
        }
        $data['formPs1PanelHarianEXT'] = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'ext')->orderBy('id', 'asc')->get();
        $data['formPs1PanelHarianER2A'] = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'er2a')->orderBy('id', 'asc')->get();
        $data['formPs1PanelHarianER2B'] = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'er2b')->orderBy('id', 'asc')->get();
        $data['formPs1PanelHarianER1B'] = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'er1b')->orderBy('id', 'asc')->get();
        $data['formPs1PanelHarianPanel'] = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'panel_mv_genset')->orderBy('id', 'asc')->get();

        // menyimpan FormActivityLog untuk status 'start'
        if (!FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('form_id', $detailWorkOrderForm->form_id)->where('status', 'start')->first()) {
            //Form Log Activity
            ActivityLog::startLog($detailWorkOrderForm);
        }

        if (User::where('id', Auth::user()->id)->first()->username ?? false) {
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.ps1.harian-panel.index', $data);
    }

    public function formPs1PanelHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataEXT = $request->validate([
            'cubicle_ext_.*' => ['nullable'],
            'keterangan_ext_.*' => ['nullable'],
            'local_ext_.*' => ['nullable'],
            'remote_ext_.*' => ['nullable'],
            'posisi_ds_ext_.*' => ['nullable'],
            'posisi_cb_ext_.*' => ['nullable'],
            'cb_spring_ext_.*' => ['nullable'],
            'sf6_lev_ext_.*' => ['nullable'],
            'tegangan_ext_.*' => ['nullable'],
            'arus_ext_.*' => ['nullable'],
            'cos_phi_ext_.*' => ['nullable'],
            'frekuensi_ext_.*' => ['nullable'],
            'daya_ext_.*' => ['nullable'],
        ]);

        $validatedDataER2A = $request->validate([
            'cubicle_er2a_.*' => ['nullable'],
            'keterangan_er2a_.*' => ['nullable'],
            'local_er2a_.*' => ['nullable'],
            'remote_er2a_.*' => ['nullable'],
            'posisi_ds_er2a_.*' => ['nullable'],
            'posisi_cb_er2a_.*' => ['nullable'],
            'cb_spring_er2a_.*' => ['nullable'],
            'sf6_lev_er2a_.*' => ['nullable'],
            'tegangan_er2a_.*' => ['nullable'],
            'arus_er2a_.*' => ['nullable'],
            'cos_phi_er2a_.*' => ['nullable'],
            'frekuensi_er2a_.*' => ['nullable'],
            'daya_er2a_.*' => ['nullable'],
        ]);

        $validatedDataER2B = $request->validate([
            'cubicle_er2b_.*' => ['nullable'],
            'keterangan_er2b_.*' => ['nullable'],
            'local_er2b_.*' => ['nullable'],
            'remote_er2b_.*' => ['nullable'],
            'posisi_ds_er2b_.*' => ['nullable'],
            'posisi_cb_er2b_.*' => ['nullable'],
            'cb_spring_er2b_.*' => ['nullable'],
            'sf6_lev_er2a_.*' => ['nullable'],
            'tegangan_er2b_.*' => ['nullable'],
            'arus_er2b_.*' => ['nullable'],
            'cos_phi_er2b_.*' => ['nullable'],
            'frekuensi_er2b_.*' => ['nullable'],
            'daya_er2b_.*' => ['nullable'],
        ]);

        $validatedDataER1B = $request->validate([
            'cubicle_er1b_.*' => ['nullable'],
            'keterangan_er1b_.*' => ['nullable'],
            'local_er1b_.*' => ['nullable'],
            'remote_er1b_.*' => ['nullable'],
            'posisi_ds_er1b_.*' => ['nullable'],
            'posisi_cb_er1b_.*' => ['nullable'],
            'cb_spring_er1b_.*' => ['nullable'],
            'sf6_lev_er1b_.*' => ['nullable'],
            'tegangan_er1b_.*' => ['nullable'],
            'arus_er1b_.*' => ['nullable'],
            'cos_phi_er1b_.*' => ['nullable'],
            'frekuensi_er1b_.*' => ['nullable'],
            'daya_er1b_.*' => ['nullable'],
        ]);

        $validatedDataPanel = $request->validate([
            'cubicle_panel_.*' => ['nullable'],
            'keterangan_panel_.*' => ['nullable'],
            'local_panel_.*' => ['nullable'],
            'remote_panel_.*' => ['nullable'],
            'posisi_ds_panel_.*' => ['nullable'],
            'posisi_cb_panel_.*' => ['nullable'],
            'cb_spring_panel_.*' => ['nullable'],
            'sf6_lev_panel_.*' => ['nullable'],
            'tegangan_panel_.*' => ['nullable'],
            'arus_panel_.*' => ['nullable'],
            'cos_phi_panel_.*' => ['nullable'],
            'frekuensi_panel_.*' => ['nullable'],
            'daya_panel_.*' => ['nullable'],
        ]);

        // DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataEXTs = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'ext')->orderBy('id', 'asc')->get();
            foreach ($dataEXTs as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                // $value->grup = 'ext';
                // $value->cubicle = $validatedDataEXT['cubicle_ext_'][$key] ?? null;
                // $value->keterangan = $validatedDataEXT['keterangan_ext_'][$key] ?? null;
                $value->local = $validatedDataEXT['local_ext_'][$key] ?? null;
                $value->remote = $validatedDataEXT['remote_ext_'][$key] ?? null;
                $value->posisi_ds = $validatedDataEXT['posisi_ds_ext_'][$key] ?? null;
                $value->posisi_cb = $validatedDataEXT['posisi_cb_ext_'][$key] ?? null;
                $value->cb_spring = $validatedDataEXT['cb_spring_ext_'][$key] ?? null;
                $value->tegangan = $validatedDataEXT['tegangan_ext_'][$key] ?? null;
                $value->arus = $validatedDataEXT['arus_ext_'][$key] ?? null;
                $value->cos_phi = $validatedDataEXT['cos_phi_ext_'][$key] ?? null;
                $value->frekuensi = $validatedDataEXT['frekuensi_ext_'][$key] ?? null;
                $value->daya = $validatedDataEXT['daya_ext_'][$key] ?? null;
                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $dataER2As = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'er2a')->orderBy('id', 'asc')->get();
            foreach ($dataER2As as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                // $value->grup = 'er2a';
                // $value->cubicle = $validatedDataER2A['cubicle_er2a_'][$key] ?? null;
                // $value->keterangan = $validatedDataER2A['keterangan_er2a_'][$key] ?? null;
                $value->local = $validatedDataER2A['local_er2a_'][$key] ?? null;
                $value->remote = $validatedDataER2A['remote_er2a_'][$key] ?? null;
                $value->posisi_ds = $validatedDataER2A['posisi_ds_er2a_'][$key] ?? null;
                $value->posisi_cb = $validatedDataER2A['posisi_cb_er2a_'][$key] ?? null;
                $value->cb_spring = $validatedDataER2A['cb_spring_er2a_'][$key] ?? null;
                $value->sf6_lev = $validatedDataER2A['sf6_lev_er2a_'][$key] ?? null;
                $value->tegangan = $validatedDataER2A['tegangan_er2a_'][$key] ?? null;
                $value->arus = $validatedDataER2A['arus_er2a_'][$key] ?? null;
                $value->cos_phi = $validatedDataER2A['cos_phi_er2a_'][$key] ?? null;
                $value->frekuensi = $validatedDataER2A['frekuensi_er2a_'][$key] ?? null;
                $value->daya = $validatedDataER2A['daya_er2a_'][$key] ?? null;
                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $dataER2Bs = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'er2b')->orderBy('id', 'asc')->get();
            foreach ($dataER2Bs as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                // $value->grup = 'er2a';
                // $value->cubicle = $validatedDataER2B['cubicle_er2b_'][$key] ?? null;
                // $value->keterangan = $validatedDataER2B['keterangan_er2b_'][$key] ?? null;
                $value->local = $validatedDataER2B['local_er2b_'][$key] ?? null;
                $value->remote = $validatedDataER2B['remote_er2b_'][$key] ?? null;
                $value->posisi_ds = $validatedDataER2B['posisi_ds_er2b_'][$key] ?? null;
                $value->posisi_cb = $validatedDataER2B['posisi_cb_er2b_'][$key] ?? null;
                $value->cb_spring = $validatedDataER2B['cb_spring_er2b_'][$key] ?? null;
                $value->tegangan = $validatedDataER2B['tegangan_er2b_'][$key] ?? null;
                $value->arus = $validatedDataER2B['arus_er2b_'][$key] ?? null;
                $value->cos_phi = $validatedDataER2B['cos_phi_er2b_'][$key] ?? null;
                $value->frekuensi = $validatedDataER2B['frekuensi_er2b_'][$key] ?? null;
                $value->daya = $validatedDataER2B['daya_er2b_'][$key] ?? null;
                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $dataER1Bs = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'er1b')->orderBy('id', 'asc')->get();
            foreach ($dataER1Bs as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                // $value->grup = 'er1b';
                // $value->cubicle = $validatedDataER1B['cubicle_er1b_'][$key] ?? null;
                // $value->keterangan = $validatedDataER1B['keterangan_er1b_'][$key] ?? null;
                $value->local = $validatedDataER1B['local_er1b_'][$key] ?? null;
                $value->remote = $validatedDataER1B['remote_er1b_'][$key] ?? null;
                $value->posisi_ds = $validatedDataER1B['posisi_ds_er1b_'][$key] ?? null;
                $value->posisi_cb = $validatedDataER1B['posisi_cb_er1b_'][$key] ?? null;
                $value->cb_spring = $validatedDataER1B['cb_spring_er1b_'][$key] ?? null;
                $value->tegangan = $validatedDataER1B['tegangan_er1b_'][$key] ?? null;
                $value->arus = $validatedDataER1B['arus_er1b_'][$key] ?? null;
                $value->cos_phi = $validatedDataER1B['cos_phi_er1b_'][$key] ?? null;
                $value->frekuensi = $validatedDataER1B['frekuensi_er1b_'][$key] ?? null;
                $value->daya = $validatedDataER1B['daya_er1b_'][$key] ?? null;
                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $dataPanelMvGensets = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'panel_mv_genset')->orderBy('id', 'asc')->get();
            foreach ($dataPanelMvGensets as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                // $value->grup = 'panel_mv_genset';
                // $value->cubicle = $validatedDataPanel['cubicle_panel_'][$key] ?? null;
                // $value->keterangan = $validatedDataPanel['keterangan_panel_'][$key] ?? null;
                $value->local = $validatedDataPanel['local_panel_'][$key] ?? null;
                $value->remote = $validatedDataPanel['remote_panel_'][$key] ?? null;
                $value->posisi_ds = $validatedDataPanel['posisi_ds_panel_'][$key] ?? null;
                $value->posisi_cb = $validatedDataPanel['posisi_cb_panel_'][$key] ?? null;
                $value->cb_spring = $validatedDataPanel['cb_spring_panel_'][$key] ?? null;
                $value->tegangan = $validatedDataPanel['tegangan_panel_'][$key] ?? null;
                $value->arus = $validatedDataPanel['arus_panel_'][$key] ?? null;
                $value->cos_phi = $validatedDataPanel['cos_phi_panel_'][$key] ?? null;
                $value->frekuensi = $validatedDataPanel['frekuensi_panel_'][$key] ?? null;
                $value->daya = $validatedDataPanel['daya_panel_'][$key] ?? null;
                $value->save();
            }

            //Form Log Activity
            ActivityLog::endLog($detailWorkOrderForm);

            DB::commit();
            if ($userTechnical) {
                return redirect()->route('user-technical.work-order-edit', $detailWorkOrderForm->work_order_id)->with(['success' => 'Data form has been updated successfully!']);
            } else {
                return redirect()->route('work-orders.show', $detailWorkOrderForm->work_order_id)->with(['success' => 'Data form has been updated successfully!']);
            }
        } catch (\Throwable$th) {
            DB::rollback();
            if ($userTechnical) {
                return redirect()->route('user-technical.work-order-edit', $detailWorkOrderForm->work_order_id)->with(['failed' => $th->getMessage()]);
            } else {
                return redirect()->route('work-orders.show', $detailWorkOrderForm->work_order_id)->with(['failed' => $th->getMessage()]);
            }
        }
    }
}