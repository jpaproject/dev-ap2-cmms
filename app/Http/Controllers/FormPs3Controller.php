<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLog;
use Illuminate\Http\Request;
use App\Models\FormActivityLog;
use App\Models\FormPs3PanelHarian;
use Illuminate\Support\Facades\DB;
use App\Models\DetailWorkOrderForm;
use Illuminate\Support\Facades\Auth;
use App\Models\FormPs3EpccDuaMingguan;
use App\Models\FormPs3TrafoTigaBulanan;
use App\Models\FormPs3GensetDuaMingguan;
use App\Models\FormPs3GensetTigaBulanan;
use App\Models\FormPs3PanelSdpDuaMingguan;
use App\Models\FormPs3CraneGensetTigaBulanan;
use App\Models\FormPs3EpccEnamBulananTahunan;
use App\Models\FormPs3MainTankLamaDuaMingguan;
use App\Models\FormPs3TrafoEnamBulananTahunan;
use App\Models\FormPs3GensetEnamBulananTahunan;
use App\Models\FormPs3GroundTankBaruDuaMingguan;
use App\Models\FormPs3PanelMvEnamBulananTahunan;
use App\Models\FormPs3RuangTenagaSuhuDuaMingguan;
use App\Models\FormPs3GensetCheckEnamBulananTahunan;
use App\Models\FormPs3LvmdpACheckEnamBulananTahunan;
use App\Models\FormPs3LvmdpBCheckEnamBulananTahunan;
use App\Models\FormPs3RuangTenagaTeganganDuaMingguan;
use App\Models\FormPs3SumpTankBaruEnamBulananTahunan;
use App\Models\FormPs3EpccSimulatorEnamBulananTahunan;
use App\Models\FormPs3MainTankBaruLamaEnamBulananTahunan;
use App\Models\FormPs3SumpTankBaruLamaEnamBulananTahunan;
use App\Models\FormPs3TrafoGensetCheckEnamBulananTahunan;
use App\Models\FormPs3PanelKontrolPompaEnamBulananTahunan;
use App\Models\FormPs3GroundTankBaruPemeriksaanArusDuaMingguan;
use App\Models\FormPs3PanelPompaBbmBaruEnamBulananTahunan;
use App\Models\FormPs3PanelPompaBbmLamaEnamBulananTahunan;
use App\Models\UserTechnical;

class FormPs3Controller extends Controller
{
    public function formPs3PanelHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['er2a'] = [['cubicle' => 'MCA', 'keterangan' => 'INCOMING FROM GH127'], ['cubicle' => 'MCB', 'keterangan' => 'INCOMING FROM GH127'], ['cubicle' => 'MSI', 'keterangan' => 'WTP / STP'], ['cubicle' => 'MSH', 'keterangan' => 'GSE AS 54'], ['cubicle' => 'MSG', 'keterangan' => 'GSE AS 74 / APRON'], ['cubicle' => 'MSF', 'keterangan' => 'ME 1 (SS8)'], ['cubicle' => 'MSE', 'keterangan' => 'MVMDP C'], ['cubicle' => 'MSD', 'keterangan' => 'MVMDP B'], ['cubicle' => 'MSC', 'keterangan' => 'TRAFO AUX'], ['cubicle' => 'MSB', 'keterangan' => 'TRAFO ZIG-ZAG (NGR)'], ['cubicle' => 'MSA', 'keterangan' => 'METERING'], ['cubicle' => 'MCC', 'keterangan' => 'COUPLER'], ['cubicle' => 'MCF', 'keterangan' => 'INCOMING GENSET'], ['cubicle' => 'MSJ', 'keterangan' => 'PANEL HOTEL T3 ']];

        $data['er2b'] = [['cubicle' => 'MCD', 'keterangan' => 'INCOMING FROM GH126'], ['cubicle' => 'MCE', 'keterangan' => 'INCOMING FROM GH126'], ['cubicle' => 'MST', 'keterangan' => 'WTP / STP'], ['cubicle' => 'MSR', 'keterangan' => 'GSE AS 54'], ['cubicle' => 'MSQ', 'keterangan' => 'GSE AS 74 / APRON'], ['cubicle' => 'MSP', 'keterangan' => 'ME 2 (SS8)'], ['cubicle' => 'MSO', 'keterangan' => 'MVMDP D'], ['cubicle' => 'MSN', 'keterangan' => 'MVMDP A'], ['cubicle' => 'MSM', 'keterangan' => 'TRAFO AUX'], ['cubicle' => 'MSV', 'keterangan' => 'TRAFO ZIG-ZAG (NGR)'], ['cubicle' => 'MSL', 'keterangan' => 'METERING'], ['cubicle' => 'MCC', 'keterangan' => 'COUPLER'], ['cubicle' => 'MCG', 'keterangan' => 'INCOMING GENSET'], ['cubicle' => 'MSW', 'keterangan' => 'PANEL HOTEL T3 ']];

        $data['er1a'] = [['cubicle' => 'XSA', 'keterangan' => ''], ['cubicle' => 'XCA', 'keterangan' => 'OUTGOING GENSET'], ['cubicle' => 'XSB', 'keterangan' => ''], ['cubicle' => 'XSC', 'keterangan' => ''], ['cubicle' => 'XSD', 'keterangan' => ''], ['cubicle' => 'XSE', 'keterangan' => ''], ['cubicle' => 'XSF', 'keterangan' => ''], ['cubicle' => 'XSG', 'keterangan' => ''], ['cubicle' => 'XSH', 'keterangan' => '']];

        $data['er1b'] = [['cubicle' => 'XSL', 'keterangan' => ''], ['cubicle' => 'XCB', 'keterangan' => 'OUTGOING GENSET'], ['cubicle' => 'XSM', 'keterangan' => ''], ['cubicle' => 'XSN', 'keterangan' => ''], ['cubicle' => 'XSO', 'keterangan' => ''], ['cubicle' => 'XSP', 'keterangan' => ''], ['cubicle' => 'XSQ', 'keterangan' => ''], ['cubicle' => 'XSR', 'keterangan' => ''], ['cubicle' => 'XSS', 'keterangan' => '']];

        $data['panel_mv_genset'] = [['cubicle' => 'GENSET 1', 'keterangan' => ''], ['cubicle' => 'GENSET 2', 'keterangan' => ''], ['cubicle' => 'GENSET 3', 'keterangan' => ''], ['cubicle' => 'GENSET 4', 'keterangan' => ''], ['cubicle' => 'GENSET 5', 'keterangan' => ''], ['cubicle' => 'GENSET 6', 'keterangan' => ''], ['cubicle' => 'GENSET 7', 'keterangan' => ''], ['cubicle' => 'GENSET 8', 'keterangan' => '']];

        $data['page_title'] = 'Form Checklist Harian Panel';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2a')
                ->first()
        ) {
            foreach ($data['er2a'] as $key => $value) {
                # code...
                $formPs3PanelHarianER2A = new FormPs3PanelHarian();
                $formPs3PanelHarianER2A->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3PanelHarianER2A->form_id = $detailWorkOrderForm->form_id;
                $formPs3PanelHarianER2A->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3PanelHarianER2A->grup = 'er2a';
                $formPs3PanelHarianER2A->cubicle = $value['cubicle'];
                $formPs3PanelHarianER2A->keterangan = $value['keterangan'];
                $formPs3PanelHarianER2A->save();
            }
        }

        if (
            !FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2b')
                ->first()
        ) {
            foreach ($data['er2b'] as $key => $value) {
                # code...
                $formPs3PanelHarianER2B = new FormPs3PanelHarian();
                $formPs3PanelHarianER2B->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3PanelHarianER2B->form_id = $detailWorkOrderForm->form_id;
                $formPs3PanelHarianER2B->work_order_id = $detailWorkOrderForm->work_order_id;

                $formPs3PanelHarianER2B->grup = 'er2b';
                $formPs3PanelHarianER2B->cubicle = $value['cubicle'];
                $formPs3PanelHarianER2B->keterangan = $value['keterangan'];
                $formPs3PanelHarianER2B->save();
            }
        }

        if (
            !FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1a')
                ->first()
        ) {
            foreach ($data['er1a'] as $key => $value) {
                # code...
                $formPs3PanelHarianER1A = new FormPs3PanelHarian();
                $formPs3PanelHarianER1A->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3PanelHarianER1A->form_id = $detailWorkOrderForm->form_id;
                $formPs3PanelHarianER1A->work_order_id = $detailWorkOrderForm->work_order_id;

                $formPs3PanelHarianER1A->grup = 'er1a';
                $formPs3PanelHarianER1A->cubicle = $value['cubicle'];
                $formPs3PanelHarianER1A->keterangan = $value['keterangan'];
                $formPs3PanelHarianER1A->save();
            }
        }
        if (
            !FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1b')
                ->first()
        ) {
            foreach ($data['er1b'] as $key => $value) {
                # code...
                $formPs3PanelHarianER1B = new FormPs3PanelHarian();
                $formPs3PanelHarianER1B->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3PanelHarianER1B->form_id = $detailWorkOrderForm->form_id;
                $formPs3PanelHarianER1B->work_order_id = $detailWorkOrderForm->work_order_id;

                $formPs3PanelHarianER1B->grup = 'er1b';
                $formPs3PanelHarianER1B->cubicle = $value['cubicle'];
                $formPs3PanelHarianER1B->keterangan = $value['keterangan'];
                $formPs3PanelHarianER1B->save();
            }
        }
        if (
            !FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'panel_mv_genset')
                ->first()
        ) {
            foreach ($data['panel_mv_genset'] as $key => $value) {
                # code...
                $formPs3PanelHarianPanel = new FormPs3PanelHarian();
                $formPs3PanelHarianPanel->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3PanelHarianPanel->form_id = $detailWorkOrderForm->form_id;
                $formPs3PanelHarianPanel->work_order_id = $detailWorkOrderForm->work_order_id;

                $formPs3PanelHarianPanel->grup = 'panel_mv_genset';
                $formPs3PanelHarianPanel->cubicle = $value['cubicle'];
                $formPs3PanelHarianPanel->keterangan = $value['keterangan'];
                $formPs3PanelHarianPanel->save();
            }
        }
        $data['formPs3PanelHarianER2A'] = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er2a')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs3PanelHarianER2B'] = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er2b')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs3PanelHarianER1A'] = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er1a')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs3PanelHarianER1B'] = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er1b')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs3PanelHarianPanel'] = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'panel_mv_genset')
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
        return view('form.power-station-3.harian-panel.index', $data);
    }

    public function formPs3PanelHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataER2A = $request->validate([
            'cubicle_er2a_.*' => ['nullable'],
            'keterangan_er2a_.*' => ['nullable'],
            'local_er2a_.*' => ['nullable'],
            'remote_er2a_.*' => ['nullable'],
            'posisi_ds_er2a_.*' => ['nullable'],
            'posisi_cb_er2a_.*' => ['nullable'],
            'cb_spring_er2a_.*' => ['nullable'],
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
            'tegangan_er2b_.*' => ['nullable'],
            'arus_er2b_.*' => ['nullable'],
            'cos_phi_er2b_.*' => ['nullable'],
            'frekuensi_er2b_.*' => ['nullable'],
            'daya_er2b_.*' => ['nullable'],
        ]);

        $validatedDataER1A = $request->validate([
            'cubicle_er1a_.*' => ['nullable'],
            'keterangan_er1a_.*' => ['nullable'],
            'local_er1a_.*' => ['nullable'],
            'remote_er1a_.*' => ['nullable'],
            'posisi_ds_er1a_.*' => ['nullable'],
            'posisi_cb_er1a_.*' => ['nullable'],
            'cb_spring_er1a_.*' => ['nullable'],
            'tegangan_er1a_.*' => ['nullable'],
            'arus_er1a_.*' => ['nullable'],
            'cos_phi_er1a_.*' => ['nullable'],
            'frekuensi_er1a_.*' => ['nullable'],
            'daya_er1a_.*' => ['nullable'],
        ]);

        $validatedDataER1B = $request->validate([
            'cubicle_er1b_.*' => ['nullable'],
            'keterangan_er1b_.*' => ['nullable'],
            'local_er1b_.*' => ['nullable'],
            'remote_er1b_.*' => ['nullable'],
            'posisi_ds_er1b_.*' => ['nullable'],
            'posisi_cb_er1b_.*' => ['nullable'],
            'cb_spring_er1b_.*' => ['nullable'],
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
            'tegangan_panel_.*' => ['nullable'],
            'arus_panel_.*' => ['nullable'],
            'cos_phi_panel_.*' => ['nullable'],
            'frekuensi_panel_.*' => ['nullable'],
            'daya_panel_.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        // dd($validatedDataPanel);
        // DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            // dd($request->get('local_er2a_'));
            DB::beginTransaction();
            $dataER2As = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2a')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataER2As as $key => $value) {
                $number = $key + 1;

                $value->form_id = $detailWorkOrderForm->form_id;
                if ($request->local_er2a_ == null) {
                    $value->local = null;
                } else {
                    $value->local = in_array($number, $validatedDataER2A['local_er2a_']) ? $number : null;
                }

                if ($request->remote_er2a_ == null) {
                    $value->remote = null;
                } else {
                    $value->remote = in_array($number, $validatedDataER2A['remote_er2a_']) ? $number : null;
                }
                // $value->local = in_array($number, $validatedDataER2A['local_er2a_']) ? $number : null;
                // $value->remote = in_array($number, $validatedDataER2A['remote_er2a_']) ? $number : null;
                $value->posisi_ds = $validatedDataER2A['posisi_ds_er2a_'][$key] ?? null;
                $value->posisi_cb = $validatedDataER2A['posisi_cb_er2a_'][$key] ?? null;
                $value->cb_spring = $validatedDataER2A['cb_spring_er2a_'][$key] ?? null;
                $value->tegangan = $validatedDataER2A['tegangan_er2a_'][$key] ?? null;
                $value->arus = $validatedDataER2A['arus_er2a_'][$key] ?? null;
                $value->cos_phi = $validatedDataER2A['cos_phi_er2a_'][$key] ?? null;
                $value->frekuensi = $validatedDataER2A['frekuensi_er2a_'][$key] ?? null;
                $value->daya = $validatedDataER2A['daya_er2a_'][$key] ?? null;
                $value->save();
            }
            DB::commit();
            DB::beginTransaction();
            $dataER2Bs = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2b')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataER2Bs as $key => $value) {
                $number = $key + 1;

                $value->form_id = $detailWorkOrderForm->form_id;
                if ($request->local_er2b_ == null) {
                    $value->local = null;
                } else {
                    $value->local = in_array($number, $validatedDataER2B['local_er2b_']) ? $number : null;
                }

                if ($request->remote_er2b_ == null) {
                    $value->remote = null;
                } else {
                    $value->remote = in_array($number, $validatedDataER2B['remote_er2b_']) ? $number : null;
                }
                // $value->local = in_array($number, $validatedDataER2B['local_er2b_']) ? $number : null;
                // $value->remote = in_array($number, $validatedDataER2B['remote_er2b_']) ? $number : null;
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
            $dataER1As = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1a')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataER1As as $key => $value) {
                $number = $key + 1;

                $value->keterangan = $validatedDataER1A['keterangan_er1a_'][$key] ?? null;
                $value->form_id = $detailWorkOrderForm->form_id;
                if ($request->local_er1a_ == null) {
                    $value->local = null;
                } else {
                    $value->local = in_array($number, $validatedDataER1A['local_er1a_']) ? $number : null;
                }

                if ($request->remote_er1a_ == null) {
                    $value->remote = null;
                } else {
                    $value->remote = in_array($number, $validatedDataER1A['remote_er1a_']) ? $number : null;
                }
                // $value->local = in_array($number, $validatedDataER1A['local_er1a_']) ? $number : null;
                // $value->remote = in_array($number, $validatedDataER1A['remote_er1a_']) ? $number : null;
                $value->posisi_ds = $validatedDataER1A['posisi_ds_er1a_'][$key] ?? null;
                $value->posisi_cb = $validatedDataER1A['posisi_cb_er1a_'][$key] ?? null;
                $value->cb_spring = $validatedDataER1A['cb_spring_er1a_'][$key] ?? null;
                $value->tegangan = $validatedDataER1A['tegangan_er1a_'][$key] ?? null;
                $value->arus = $validatedDataER1A['arus_er1a_'][$key] ?? null;
                $value->cos_phi = $validatedDataER1A['cos_phi_er1a_'][$key] ?? null;
                $value->frekuensi = $validatedDataER1A['frekuensi_er1a_'][$key] ?? null;
                $value->daya = $validatedDataER1A['daya_er1a_'][$key] ?? null;
                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $dataER1Bs = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1b')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataER1Bs as $key => $value) {
                $number = $key + 1;

                $value->keterangan = $validatedDataER1B['keterangan_er1b_'][$key] ?? null;
                $value->form_id = $detailWorkOrderForm->form_id;
                if ($request->local_er1b_ == null) {
                    $value->local = null;
                } else {
                    $value->local = in_array($number, $validatedDataER1B['local_er1b_']) ? $number : null;
                }

                if ($request->remote_er1b_ == null) {
                    $value->remote = null;
                } else {
                    $value->remote = in_array($number, $validatedDataER1B['remote_er1b_']) ? $number : null;
                }
                // $value->local = in_array($number, $validatedDataER1B['local_er1b_']) ? $number : null;
                // $value->remote = in_array($number, $validatedDataER1B['remote_er1b_']) ? $number : null;
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
            $dataPanelMvGensets = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'panel_mv_genset')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataPanelMvGensets as $key => $value) {
                $number = $key + 1;

                $value->keterangan = $validatedDataPanel['keterangan_panel_'][$key] ?? null;
                $value->form_id = $detailWorkOrderForm->form_id;
                if ($request->local_panel_ == null) {
                    $value->local = null;
                } else {
                    $value->local = in_array($number, $validatedDataPanel['local_panel_']) ? $number : null;
                }

                if ($request->remote_panel_ == null) {
                    $value->remote = null;
                } else {
                    $value->remote = in_array($number, $validatedDataPanel['remote_panel_']) ? $number : null;
                }
                // $value->local = in_array($number, $validatedDataPanel['local_panel_']) ? $number : null;
                // $value->remote = in_array($number, $validatedDataPanel['remote_panel_']) ? $number : null;
                $value->posisi_ds = $validatedDataPanel['posisi_ds_panel_'][$key] ?? null;
                $value->posisi_cb = $validatedDataPanel['posisi_cb_panel_'][$key] ?? null;
                $value->cb_spring = $validatedDataPanel['cb_spring_panel_'][$key] ?? null;
                $value->tegangan = $validatedDataPanel['tegangan_panel_'][$key] ?? null;
                $value->arus = $validatedDataPanel['arus_panel_'][$key] ?? null;
                $value->cos_phi = $validatedDataPanel['cos_phi_panel_'][$key] ?? null;
                $value->frekuensi = $validatedDataPanel['frekuensi_panel_'][$key] ?? null;
                $value->daya = $validatedDataPanel['daya_panel_'][$key] ?? null;
                $value->catatan = $validatedDataPanel['catatan'] ?? null;
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

    public function formPs3GroundTankBaruDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - GROUND TANK BARU';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs3GroundTankBaruDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3GroundTankBaruDuaMingguan = new FormPs3GroundTankBaruDuaMingguan();
            $formPs3GroundTankBaruDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3GroundTankBaruDuaMingguan->form_id = $detailWorkOrderForm->form_id;
            $formPs3GroundTankBaruDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3GroundTankBaruDuaMingguan->save();
        }
        $data['formPs3GroundTankBaruDuaMingguan'] = FormPs3GroundTankBaruDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        if (!FormPs3GroundTankBaruPemeriksaanArusDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan = new FormPs3GroundTankBaruPemeriksaanArusDuaMingguan();
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->form_id = $detailWorkOrderForm->form_id;
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->save();
        }
        $data['formPs3GroundTankBaruPemeriksaanArusDuaMingguan'] = FormPs3GroundTankBaruPemeriksaanArusDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

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
        return view('form.power-station-3.ground-tank-baru-dua-mingguan.index', $data);
    }

    public function formPs3GroundTankBaruDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'transfer_pump_antar_tank1_1' => ['nullable'],
            'transfer_pump_antar_tank1_2' => ['nullable'],
            'transfer_pump_antar_tank1_3' => ['nullable'],

            'transfer_pump_antar_tank2_1' => ['nullable'],
            'transfer_pump_antar_tank2_2' => ['nullable'],
            'transfer_pump_antar_tank2_3' => ['nullable'],

            'transfer_pump1_1' => ['nullable'],
            'transfer_pump1_2' => ['nullable'],
            'transfer_pump1_3' => ['nullable'],

            'transfer_pump2_1' => ['nullable'],
            'transfer_pump2_2' => ['nullable'],
            'transfer_pump2_3' => ['nullable'],

            'drain_pump_1' => ['nullable'],
            'drain_pump_2' => ['nullable'],
            'drain_pump_3' => ['nullable'],

            'p1_1' => ['nullable'],
            'p1_2' => ['nullable'],
            'p1_3' => ['nullable'],

            'p2_1' => ['nullable'],
            'p2_2' => ['nullable'],
            'p2_3' => ['nullable'],

            'main_tank1' => ['nullable'],
            'main_tank2' => ['nullable'],
            'main_tank3' => ['nullable'],
            'sump_tank1' => ['nullable'],

            'panel_monitor_maint_tank' => ['nullable'],
            'panel_kontrol_pompa_transfer' => ['nullable'],
            'panel_sumpit_pump' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan = FormPs3GroundTankBaruPemeriksaanArusDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank1_1 = $validatedData['transfer_pump_antar_tank1_1'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank1_2 = $validatedData['transfer_pump_antar_tank1_2'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank1_3 = $validatedData['transfer_pump_antar_tank1_3'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank2_1 = $validatedData['transfer_pump_antar_tank2_1'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank2_2 = $validatedData['transfer_pump_antar_tank2_2'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank2_3 = $validatedData['transfer_pump_antar_tank2_3'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump1_1 = $validatedData['transfer_pump1_1'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump1_2 = $validatedData['transfer_pump1_2'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump1_3 = $validatedData['transfer_pump1_3'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump2_1 = $validatedData['transfer_pump2_1'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump2_2 = $validatedData['transfer_pump2_2'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump2_3 = $validatedData['transfer_pump2_3'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->drain_pump_1 = $validatedData['drain_pump_1'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->drain_pump_2 = $validatedData['drain_pump_2'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->drain_pump_3 = $validatedData['drain_pump_3'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p1_1 = $validatedData['p1_1'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p1_2 = $validatedData['p1_2'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p1_3 = $validatedData['p1_3'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p2_1 = $validatedData['p2_1'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p2_2 = $validatedData['p2_2'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p2_3 = $validatedData['p2_3'];
            $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->save();

            $formPs3GroundTankBaruDuaMingguan = FormPs3GroundTankBaruDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3GroundTankBaruDuaMingguan->main_tank1 = $validatedData['main_tank1'];
            $formPs3GroundTankBaruDuaMingguan->main_tank2 = $validatedData['main_tank2'];
            $formPs3GroundTankBaruDuaMingguan->main_tank3 = $validatedData['main_tank3'];
            $formPs3GroundTankBaruDuaMingguan->sump_tank1 = $validatedData['sump_tank1'];
            $formPs3GroundTankBaruDuaMingguan->panel_monitor_maint_tank = $validatedData['panel_monitor_maint_tank'];
            $formPs3GroundTankBaruDuaMingguan->panel_kontrol_pompa_transfer = $validatedData['panel_kontrol_pompa_transfer'];
            $formPs3GroundTankBaruDuaMingguan->panel_sumpit_pump = $validatedData['panel_sumpit_pump'];
            $formPs3GroundTankBaruDuaMingguan->catatan = $validatedData['catatan'];
            $formPs3GroundTankBaruDuaMingguan->save();

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

    public function formPs3PanelPompaBbmBaruEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - PANEL POMPA BBM BARU ENAM BULANAN DAN TAHUNAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs3PanelPompaBbmBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3PanelPompaBbmBaruEnamBulananTahunan = new FormPs3PanelPompaBbmBaruEnamBulananTahunan();
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->save();
        }
        $data['formPs3PanelPompaBbmBaruEnamBulananTahunan'] = FormPs3PanelPompaBbmBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

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
        return view('form.power-station-3.panel-pompa-bbm-baru-enam-bulanan-tahunan.index', $data);
    }

    public function formPs3PanelPompaBbmBaruEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'transfer_pump_antar_tank1_1' => ['nullable'],
            'transfer_pump_antar_tank1_2' => ['nullable'],
            'transfer_pump_antar_tank1_3' => ['nullable'],

            'transfer_pump_antar_tank2_1' => ['nullable'],
            'transfer_pump_antar_tank2_2' => ['nullable'],
            'transfer_pump_antar_tank2_3' => ['nullable'],

            'transfer_pump1_1' => ['nullable'],
            'transfer_pump1_2' => ['nullable'],
            'transfer_pump1_3' => ['nullable'],

            'transfer_pump2_1' => ['nullable'],
            'transfer_pump2_2' => ['nullable'],
            'transfer_pump2_3' => ['nullable'],

            'panel_main_tank' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formPs3PanelPompaBbmBaruEnamBulananTahunan = FormPs3PanelPompaBbmBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump_antar_tank1_1 = $validatedData['transfer_pump_antar_tank1_1'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump_antar_tank1_2 = $validatedData['transfer_pump_antar_tank1_2'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump_antar_tank1_3 = $validatedData['transfer_pump_antar_tank1_3'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump_antar_tank2_1 = $validatedData['transfer_pump_antar_tank2_1'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump_antar_tank2_2 = $validatedData['transfer_pump_antar_tank2_2'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump_antar_tank2_3 = $validatedData['transfer_pump_antar_tank2_3'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump1_1 = $validatedData['transfer_pump1_1'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump1_2 = $validatedData['transfer_pump1_2'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump1_3 = $validatedData['transfer_pump1_3'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump2_1 = $validatedData['transfer_pump2_1'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump2_2 = $validatedData['transfer_pump2_2'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump2_3 = $validatedData['transfer_pump2_3'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->panel_main_tank = $validatedData['panel_main_tank'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->catatan = $validatedData['catatan'];
            $formPs3PanelPompaBbmBaruEnamBulananTahunan->save();

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

    public function formPs3PanelPompaBbmLamaEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - PANEL POMPA BBM LAMA ENAM BULANAN DAN TAHUNAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs3PanelPompaBbmLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3PanelPompaBbmLamaEnamBulananTahunan = new FormPs3PanelPompaBbmLamaEnamBulananTahunan();
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->save();
        }
        $data['formPs3PanelPompaBbmLamaEnamBulananTahunan'] = FormPs3PanelPompaBbmLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        $data['formPs3GroundTankBaruPemeriksaanArusDuaMingguan'] = FormPs3GroundTankBaruPemeriksaanArusDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

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
        return view('form.power-station-3.panel-pompa-bbm-lama-enam-bulanan-tahunan.index', $data);
    }

    public function formPs3PanelPompaBbmLamaEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([

            'p1a_1' => ['nullable'],
            'p1a_2' => ['nullable'],
            'p1a_3' => ['nullable'],

            'p1b_1' => ['nullable'],
            'p1b_2' => ['nullable'],
            'p1b_3' => ['nullable'],

            'p2a_1' => ['nullable'],
            'p2a_2' => ['nullable'],
            'p2a_3' => ['nullable'],

            'p2b_1' => ['nullable'],
            'p2b_2' => ['nullable'],
            'p2b_3' => ['nullable'],


            'p4_1' => ['nullable'],
            'p4_2' => ['nullable'],
            'p4_3' => ['nullable'],

            'panel_kontrol_main_tank_1' => ['nullable'],
            'panel_kontrol_main_tank_2' => ['nullable'],
            'panel_kontrol_main_tank_3' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formPs3PanelPompaBbmLamaEnamBulananTahunan = FormPs3PanelPompaBbmLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p1a_1 = $validatedData['p1a_1'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p1a_2 = $validatedData['p1a_2'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p1a_3 = $validatedData['p1a_3'];

            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p1b_1 = $validatedData['p1b_1'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p1b_2 = $validatedData['p1b_2'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p1b_3 = $validatedData['p1b_3'];

            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p2a_1 = $validatedData['p2a_1'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p2a_2 = $validatedData['p2a_2'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p2a_3 = $validatedData['p2a_3'];

            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p2b_1 = $validatedData['p2b_1'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p2b_2 = $validatedData['p2b_2'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p2b_3 = $validatedData['p2b_3'];


            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p4_1 = $validatedData['p4_1'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p4_2 = $validatedData['p4_2'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->p4_3 = $validatedData['p4_3'];

            $formPs3PanelPompaBbmLamaEnamBulananTahunan->panel_kontrol_main_tank_1 = $validatedData['panel_kontrol_main_tank_1'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->panel_kontrol_main_tank_2 = $validatedData['panel_kontrol_main_tank_2'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->panel_kontrol_main_tank_3 = $validatedData['panel_kontrol_main_tank_3'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->catatan = $validatedData['catatan'];
            $formPs3PanelPompaBbmLamaEnamBulananTahunan->save();

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

    public function formPs3PanelSdpDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - PANEL SDP DUA MINGGUAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['panel_sdps'] = ['SDP-001A', 'SDP-001B', 'SDP-001C', 'SDP-002', 'SDP-002B', 'SDP-003', 'SDP-004', 'SDP-06A', 'SDP-006B', 'SDP-006C', 'SDP-006D', 'SDP-07'];

        if (!FormPs3PanelSdpDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['panel_sdps'] as $key => $value) {
                $formPs3PanelSdpDuaMingguan = new FormPs3PanelSdpDuaMingguan();
                $formPs3PanelSdpDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3PanelSdpDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs3PanelSdpDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3PanelSdpDuaMingguan->panel_sdp = $value;
                $formPs3PanelSdpDuaMingguan->save();
            }
        }
        $data['formPs3PanelSdpDuaMingguans'] = FormPs3PanelSdpDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();
        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.panel-sdp-dua-mingguan.index', $data);
    }

    public function formPs3PanelSdpDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'arus_l1.*' => ['nullable'],
            'arus_l2.*' => ['nullable'],
            'arus_l3.*' => ['nullable'],
            'tegangan.*' => ['nullable'],
            'hz.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3PanelSdpDuaMingguans = FormPs3PanelSdpDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs3PanelSdpDuaMingguans as $key => $formPs3PanelSdpDuaMingguan) {
                $formPs3PanelSdpDuaMingguan->arus_l1 = $validatedData['arus_l1'][$key];
                $formPs3PanelSdpDuaMingguan->arus_l2 = $validatedData['arus_l2'][$key];
                $formPs3PanelSdpDuaMingguan->arus_l3 = $validatedData['arus_l3'][$key];
                $formPs3PanelSdpDuaMingguan->tegangan = $validatedData['tegangan'][$key];
                $formPs3PanelSdpDuaMingguan->hz = $validatedData['hz'][$key];
                $formPs3PanelSdpDuaMingguan->keterangan = $validatedData['keterangan'][$key];
                $formPs3PanelSdpDuaMingguan->catatan = $validatedData['catatan'];
                $formPs3PanelSdpDuaMingguan->save();
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

    public function formPs3RuangTenagaDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - RUANG TENAGA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['panels'] = ['MCA', 'MCB', 'MSA', 'MSC', 'MSI', 'MSH', 'MSG', 'MSF', 'MSE', 'MSD', 'MCC-A', 'MCF', 'MCD', 'MCE', 'MSM', 'MSL', 'MST', 'MSR', 'MSQ', 'MSP', 'MSO', 'MSN', 'MCC-B', 'LVMDP-A', 'LVMDP-B'];

        if (!FormPs3RuangTenagaSuhuDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3RuangTenagaSuhuDuaMingguan = new FormPs3RuangTenagaSuhuDuaMingguan();
            $formPs3RuangTenagaSuhuDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3RuangTenagaSuhuDuaMingguan->form_id = $detailWorkOrderForm->form_id;
            $formPs3RuangTenagaSuhuDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3RuangTenagaSuhuDuaMingguan->save();
        }
        if (!FormPs3RuangTenagaTeganganDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['panels'] as $key => $value) {
                $formPs3RuangTenagaTeganganDuaMingguan = new FormPs3RuangTenagaTeganganDuaMingguan();
                $formPs3RuangTenagaTeganganDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3RuangTenagaTeganganDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs3RuangTenagaTeganganDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3RuangTenagaTeganganDuaMingguan->panel = $value;
                $formPs3RuangTenagaTeganganDuaMingguan->save();
            }
        }

        $data['formPs3RuangTenagaSuhuDuaMingguan'] = FormPs3RuangTenagaSuhuDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
        $data['formPs3RuangTenagaTeganganDuaMingguans'] = FormPs3RuangTenagaTeganganDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();
        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.ruang-tenaga-dua-mingguan.index', $data);
    }

    public function formPs3RuangTenagaDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'trafo_a_n1' => ['nullable'],
            'trafo_a_n2' => ['nullable'],
            'trafo_a_n3' => ['nullable'],
            'trafo_b_n1' => ['nullable'],
            'trafo_b_n2' => ['nullable'],
            'trafo_b_n3' => ['nullable'],
            'v_l1.*' => ['nullable'],
            'v_l2.*' => ['nullable'],
            'v_l3.*' => ['nullable'],
            'a_l1.*' => ['nullable'],
            'a_l2.*' => ['nullable'],
            'a_l3.*' => ['nullable'],
            'hz.*' => ['nullable'],
            'pf.*' => ['nullable'],
            'sf_6.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        // dd($validatedData);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3RuangTenagaSuhuDuaMingguan = FormPs3RuangTenagaSuhuDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3RuangTenagaSuhuDuaMingguan->trafo_a_n1 = $validatedData['trafo_a_n1'];
            $formPs3RuangTenagaSuhuDuaMingguan->trafo_a_n2 = $validatedData['trafo_a_n2'];
            $formPs3RuangTenagaSuhuDuaMingguan->trafo_a_n3 = $validatedData['trafo_a_n3'];
            $formPs3RuangTenagaSuhuDuaMingguan->trafo_b_n1 = $validatedData['trafo_b_n1'];
            $formPs3RuangTenagaSuhuDuaMingguan->trafo_b_n2 = $validatedData['trafo_b_n2'];
            $formPs3RuangTenagaSuhuDuaMingguan->trafo_b_n3 = $validatedData['trafo_b_n3'];
            $formPs3RuangTenagaSuhuDuaMingguan->catatan = $validatedData['catatan'];
            $formPs3RuangTenagaSuhuDuaMingguan->save();

            $formPs3RuangTenagaTeganganDuaMingguans = FormPs3RuangTenagaTeganganDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs3RuangTenagaTeganganDuaMingguans as $key => $formPs3RuangTenagaTeganganDuaMingguan) {
                $formPs3RuangTenagaTeganganDuaMingguan->v_l1 = $validatedData['v_l1'][$key];
                $formPs3RuangTenagaTeganganDuaMingguan->v_l2 = $validatedData['v_l2'][$key];
                $formPs3RuangTenagaTeganganDuaMingguan->v_l3 = $validatedData['v_l3'][$key];
                $formPs3RuangTenagaTeganganDuaMingguan->a_l1 = $validatedData['a_l1'][$key];
                $formPs3RuangTenagaTeganganDuaMingguan->a_l2 = $validatedData['a_l2'][$key];
                $formPs3RuangTenagaTeganganDuaMingguan->a_l3 = $validatedData['a_l3'][$key];
                $formPs3RuangTenagaTeganganDuaMingguan->hz = $validatedData['hz'][$key];
                $formPs3RuangTenagaTeganganDuaMingguan->pf = $validatedData['pf'][$key];
                $formPs3RuangTenagaTeganganDuaMingguan->sf_6 = $validatedData['sf_6'][$key];
                $formPs3RuangTenagaTeganganDuaMingguan->save();
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

    public function formPs3EpccDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - EPCC';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs3EpccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3EpccDuaMingguan = new FormPs3EpccDuaMingguan();
            $formPs3EpccDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3EpccDuaMingguan->form_id = $detailWorkOrderForm->form_id;
            $formPs3EpccDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3EpccDuaMingguan->save();
        }
        $data['formPs3EpccDuaMingguan'] = FormPs3EpccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.epcc-dua-mingguan.index', $data);
    }

    public function formPs3EpccDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tegangan_battery_epcc' => ['nullable'],
            'tegangan_hmi' => ['nullable'],
            'tegangan_panel_pompa_bbm' => ['nullable'],
            'tegangan_panel_monitoring' => ['nullable'],
            'tegangan_panel_kontrol_pompa_main_tank_baru' => ['nullable'],
            'tegangan_panel_kontrol_rumah_pompa' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3EpccDuaMingguan = FormPs3EpccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3EpccDuaMingguan->tegangan_battery_epcc = $validatedData['tegangan_battery_epcc'];
            $formPs3EpccDuaMingguan->tegangan_hmi = $validatedData['tegangan_hmi'];
            $formPs3EpccDuaMingguan->tegangan_panel_pompa_bbm = $validatedData['tegangan_panel_pompa_bbm'];
            $formPs3EpccDuaMingguan->tegangan_panel_monitoring = $validatedData['tegangan_panel_monitoring'];
            $formPs3EpccDuaMingguan->tegangan_panel_kontrol_pompa_main_tank_baru = $validatedData['tegangan_panel_kontrol_pompa_main_tank_baru'];
            $formPs3EpccDuaMingguan->tegangan_panel_kontrol_rumah_pompa = $validatedData['tegangan_panel_kontrol_rumah_pompa'];
            $formPs3EpccDuaMingguan->catatan = $validatedData['catatan'];
            $formPs3EpccDuaMingguan->save();

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

    public function formPs3TrafoTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - Trafo Tiga Bulanan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs3TrafoTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 2; $i++) {
                $ormPs3TrafoTigaBulanan = new FormPs3TrafoTigaBulanan();
                $ormPs3TrafoTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $ormPs3TrafoTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $ormPs3TrafoTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $ormPs3TrafoTigaBulanan->type = $i == 0 ? 'AUX A' : 'AUX B';
                $ormPs3TrafoTigaBulanan->save();
            }

            for ($j = 0; $j < 8; $j++) {
                $ormPs3TrafoTigaBulanan = new FormPs3TrafoTigaBulanan();
                $ormPs3TrafoTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $ormPs3TrafoTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $ormPs3TrafoTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $ormPs3TrafoTigaBulanan->type = 'G' . strval($j + 1);
                $ormPs3TrafoTigaBulanan->save();
            }
        }
        $data['formPs3TrafoTigaBulanans'] = FormPs3TrafoTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.power-station-3.trafo-tiga-bulanan.index', $data);
    }

    public function formPs3trafoTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'phase_a.*' => ['nullable'],
            'phase_b.*' => ['nullable'],
            'phase_c.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3TrafoTigaBulanans = FormPs3TrafoTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs3TrafoTigaBulanans as $key => $formPs3TrafoTigaBulanan) {
                $formPs3TrafoTigaBulanan->phase_a = $validatedData['phase_a'][$key];
                $formPs3TrafoTigaBulanan->phase_b = $validatedData['phase_b'][$key];
                $formPs3TrafoTigaBulanan->phase_c = $validatedData['phase_c'][$key];
                $formPs3TrafoTigaBulanan->catatan = $validatedData['catatan'];
                $formPs3TrafoTigaBulanan->save();
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

    public function formPs3CraneGensetTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - Crane Genset Tiga Bulanan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs3CraneGensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3CraneGensetTigaBulanan = new FormPs3CraneGensetTigaBulanan();
            $formPs3CraneGensetTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3CraneGensetTigaBulanan->form_id = $detailWorkOrderForm->form_id;
            $formPs3CraneGensetTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3CraneGensetTigaBulanan->save();
        }
        $data['formPs3CraneGensetTigaBulanan'] = FormPs3CraneGensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.crane-genset-tiga-bulanan.index', $data);
    }

    public function formPs3CraneGensetTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'arus_motor_crane_a' => ['nullable'],
            'arus_motor_crane_b' => ['nullable'],
            'panel_crane_a' => ['nullable'],
            'panel_crane_b' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3CraneGensetTigaBulanan = FormPs3CraneGensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3CraneGensetTigaBulanan->arus_motor_crane_a = $validatedData['arus_motor_crane_a'];
            $formPs3CraneGensetTigaBulanan->arus_motor_crane_b = $validatedData['arus_motor_crane_b'];
            $formPs3CraneGensetTigaBulanan->panel_crane_a = $validatedData['panel_crane_a'];
            $formPs3CraneGensetTigaBulanan->panel_crane_b = $validatedData['panel_crane_b'];
            $formPs3CraneGensetTigaBulanan->catatan = $validatedData['catatan'];
            $formPs3CraneGensetTigaBulanan->save();

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

    public function formPs3GensetTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - Genset Tiga Bulanan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs3GensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($j = 0; $j < 8; $j++) {
                $formPs3GensetTigaBulanan = new FormPs3GensetTigaBulanan();
                $formPs3GensetTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3GensetTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formPs3GensetTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3GensetTigaBulanan->save();
            }
        }

        $data['formPs3GensetTigaBulanans'] = FormPs3GensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.genset-tiga-bulanan.index', $data);
    }

    public function formPs3GensetTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'level_oli_mesin.*' => ['nullable'],
            'level_air_radiator.*' => ['nullable'],
            'level_air_battery.*' => ['nullable'],
            'level_bahan_bakar.*' => ['nullable'],
            'tegangan_battery_starter.*' => ['nullable'],
            'coolant_temperature.*' => ['nullable'],
            'hour_meter.*' => ['nullable'],
            'alternator_heater.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3GensetTigaBulanans = FormPs3GensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs3GensetTigaBulanans as $key => $formPs3GensetTigaBulanan) {
                $formPs3GensetTigaBulanan->level_oli_mesin = $validatedData['level_oli_mesin'][$key];
                $formPs3GensetTigaBulanan->level_air_radiator = $validatedData['level_air_radiator'][$key];
                $formPs3GensetTigaBulanan->level_air_battery = $validatedData['level_air_battery'][$key];
                $formPs3GensetTigaBulanan->level_bahan_bakar = $validatedData['level_bahan_bakar'][$key];
                $formPs3GensetTigaBulanan->tegangan_battery_starter = $validatedData['tegangan_battery_starter'][$key];
                $formPs3GensetTigaBulanan->coolant_temperature = $validatedData['coolant_temperature'][$key];
                $formPs3GensetTigaBulanan->hour_meter = $validatedData['hour_meter'][$key];
                $formPs3GensetTigaBulanan->alternator_heater = $validatedData['alternator_heater'][$key];
                $formPs3GensetTigaBulanan->catatan = $validatedData['catatan'];
                $formPs3GensetTigaBulanan->save();
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

    public function formPs3MainTankLamaDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - Main Tank Lama';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs3MainTankLamaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3MainTankLamaDuaMingguan = new FormPs3MainTankLamaDuaMingguan();
            $formPs3MainTankLamaDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3MainTankLamaDuaMingguan->form_id = $detailWorkOrderForm->form_id;
            $formPs3MainTankLamaDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3MainTankLamaDuaMingguan->save();
        }
        $data['formPs3MainTankLamaDuaMingguan'] = FormPs3MainTankLamaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.main-tank-lama-dua-mingguan.index', $data);
    }

    public function formPs3MainTankLamaDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'main_tank_p1a' => ['nullable'],
            'main_tank_p1b' => ['nullable'],
            'main_tank_p2a' => ['nullable'],
            'main_tank_p2b' => ['nullable'],
            'main_tank_p4' => ['nullable'],

            'sump_tank_p1' => ['nullable'],
            'sump_tank_p2' => ['nullable'],

            'pompa_sumpit_main_tank_p1' => ['nullable'],
            'pompa_sumpit_main_tank_p2' => ['nullable'],
            'pompa_sumpit_sump_tank_p1' => ['nullable'],
            'pompa_sumpit_sump_tank_p2' => ['nullable'],

            'main_tank_p1a_2' => ['nullable'],
            'main_tank_p1b_2' => ['nullable'],
            'main_tank_p2a_2' => ['nullable'],
            'main_tank_p2b_2' => ['nullable'],
            'main_tank_p4_2' => ['nullable'],

            'sump_tank_p1_2' => ['nullable'],
            'sump_tank_p2_2' => ['nullable'],

            'pompa_sumpit_main_tank_p1_2' => ['nullable'],
            'pompa_sumpit_main_tank_p2_2' => ['nullable'],
            'pompa_sumpit_sump_tank_p1_2' => ['nullable'],
            'pompa_sumpit_sump_tank_p2_2' => ['nullable'],

            'main_tank_p1a_3' => ['nullable'],
            'main_tank_p1b_3' => ['nullable'],
            'main_tank_p2a_3' => ['nullable'],
            'main_tank_p2b_3' => ['nullable'],
            'main_tank_p4_3' => ['nullable'],

            'sump_tank_p1_3' => ['nullable'],
            'sump_tank_p2_3' => ['nullable'],

            'pompa_sumpit_main_tank_p1_3' => ['nullable'],
            'pompa_sumpit_main_tank_p2_3' => ['nullable'],
            'pompa_sumpit_sump_tank_p1_3' => ['nullable'],
            'pompa_sumpit_sump_tank_p2_3' => ['nullable'],

            'main_tank1' => ['nullable'],
            'main_tank2' => ['nullable'],
            'main_tank3' => ['nullable'],
            'sump_tank1' => ['nullable'],
            'sump_tank2' => ['nullable'],

            'panel_hmi_main_tank' => ['nullable'],
            'panel_kontrol_main_tank' => ['nullable'],
            'panel_kontrol_sump_tank' => ['nullable'],

            'panel_hmi_main_tank_2' => ['nullable'],
            'panel_kontrol_main_tank_2' => ['nullable'],
            'panel_kontrol_sump_tank_2' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3MainTankLamaDuaMingguan = FormPs3MainTankLamaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3MainTankLamaDuaMingguan->main_tank_p1a = $validatedData['main_tank_p1a'];
            $formPs3MainTankLamaDuaMingguan->main_tank_p1b = $validatedData['main_tank_p1b'];
            $formPs3MainTankLamaDuaMingguan->main_tank_p2a = $validatedData['main_tank_p2a'];
            $formPs3MainTankLamaDuaMingguan->main_tank_p2b = $validatedData['main_tank_p2b'];
            $formPs3MainTankLamaDuaMingguan->main_tank_p4 = $validatedData['main_tank_p4'];
            $formPs3MainTankLamaDuaMingguan->sump_tank_p1 = $validatedData['sump_tank_p1'];
            $formPs3MainTankLamaDuaMingguan->sump_tank_p2 = $validatedData['sump_tank_p2'];
            $formPs3MainTankLamaDuaMingguan->pompa_sumpit_main_tank_p1 = $validatedData['pompa_sumpit_main_tank_p1'];
            $formPs3MainTankLamaDuaMingguan->pompa_sumpit_main_tank_p2 = $validatedData['pompa_sumpit_main_tank_p2'];
            $formPs3MainTankLamaDuaMingguan->pompa_sumpit_sump_tank_p1 = $validatedData['pompa_sumpit_sump_tank_p1'];
            $formPs3MainTankLamaDuaMingguan->pompa_sumpit_sump_tank_p2 = $validatedData['pompa_sumpit_sump_tank_p2'];

            $formPs3MainTankLamaDuaMingguan->main_tank_p1a_2 = $validatedData['main_tank_p1a_2'];
            $formPs3MainTankLamaDuaMingguan->main_tank_p1b_2 = $validatedData['main_tank_p1b_2'];
            $formPs3MainTankLamaDuaMingguan->main_tank_p2a_2 = $validatedData['main_tank_p2a_2'];
            $formPs3MainTankLamaDuaMingguan->main_tank_p2b_2 = $validatedData['main_tank_p2b_2'];
            $formPs3MainTankLamaDuaMingguan->main_tank_p4_2 = $validatedData['main_tank_p4_2'];
            $formPs3MainTankLamaDuaMingguan->sump_tank_p1_2 = $validatedData['sump_tank_p1_2'];
            $formPs3MainTankLamaDuaMingguan->sump_tank_p2_2 = $validatedData['sump_tank_p2_2'];
            $formPs3MainTankLamaDuaMingguan->pompa_sumpit_main_tank_p1_2 = $validatedData['pompa_sumpit_main_tank_p1_2'];
            $formPs3MainTankLamaDuaMingguan->pompa_sumpit_main_tank_p2_2 = $validatedData['pompa_sumpit_main_tank_p2_2'];
            $formPs3MainTankLamaDuaMingguan->pompa_sumpit_sump_tank_p1_2 = $validatedData['pompa_sumpit_sump_tank_p1_2'];
            $formPs3MainTankLamaDuaMingguan->pompa_sumpit_sump_tank_p2_2 = $validatedData['pompa_sumpit_sump_tank_p2_2'];

            $formPs3MainTankLamaDuaMingguan->main_tank_p1a_3 = $validatedData['main_tank_p1a_3'];
            $formPs3MainTankLamaDuaMingguan->main_tank_p1b_3 = $validatedData['main_tank_p1b_3'];
            $formPs3MainTankLamaDuaMingguan->main_tank_p2a_3 = $validatedData['main_tank_p2a_3'];
            $formPs3MainTankLamaDuaMingguan->main_tank_p2b_3 = $validatedData['main_tank_p2b_3'];
            $formPs3MainTankLamaDuaMingguan->main_tank_p4_3 = $validatedData['main_tank_p4_3'];
            $formPs3MainTankLamaDuaMingguan->sump_tank_p1_3 = $validatedData['sump_tank_p1_3'];
            $formPs3MainTankLamaDuaMingguan->sump_tank_p2_3 = $validatedData['sump_tank_p2_3'];
            $formPs3MainTankLamaDuaMingguan->pompa_sumpit_main_tank_p1_3 = $validatedData['pompa_sumpit_main_tank_p1_3'];
            $formPs3MainTankLamaDuaMingguan->pompa_sumpit_main_tank_p2_3 = $validatedData['pompa_sumpit_main_tank_p2_3'];
            $formPs3MainTankLamaDuaMingguan->pompa_sumpit_sump_tank_p1_3 = $validatedData['pompa_sumpit_sump_tank_p1_3'];
            $formPs3MainTankLamaDuaMingguan->pompa_sumpit_sump_tank_p2_3 = $validatedData['pompa_sumpit_sump_tank_p2_3'];

            $formPs3MainTankLamaDuaMingguan->main_tank1 = $validatedData['main_tank1'];
            $formPs3MainTankLamaDuaMingguan->main_tank2 = $validatedData['main_tank2'];
            $formPs3MainTankLamaDuaMingguan->main_tank3 = $validatedData['main_tank3'];
            $formPs3MainTankLamaDuaMingguan->sump_tank1 = $validatedData['sump_tank1'];
            $formPs3MainTankLamaDuaMingguan->sump_tank2 = $validatedData['sump_tank2'];

            $formPs3MainTankLamaDuaMingguan->panel_hmi_main_tank = $validatedData['panel_hmi_main_tank'];
            $formPs3MainTankLamaDuaMingguan->panel_kontrol_main_tank = $validatedData['panel_kontrol_main_tank'];
            $formPs3MainTankLamaDuaMingguan->panel_kontrol_sump_tank = $validatedData['panel_kontrol_sump_tank'];

            $formPs3MainTankLamaDuaMingguan->panel_hmi_main_tank_2 = $validatedData['panel_hmi_main_tank_2'];
            $formPs3MainTankLamaDuaMingguan->panel_kontrol_main_tank_2 = $validatedData['panel_kontrol_main_tank_2'];
            $formPs3MainTankLamaDuaMingguan->panel_kontrol_sump_tank_2 = $validatedData['panel_kontrol_sump_tank_2'];

            $formPs3MainTankLamaDuaMingguan->catatan = $validatedData['catatan'];
            $formPs3MainTankLamaDuaMingguan->save();

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

    public function formPs3GensetDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - Genset Dua Mingguan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs3GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($j = 0; $j < 8; $j++) {
                $formPs3GensetDuaMingguan = new FormPs3GensetDuaMingguan();
                $formPs3GensetDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3GensetDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs3GensetDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3GensetDuaMingguan->save();
            }
        }

        $data['formPs3GensetDuaMingguans'] = FormPs3GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.genset-dua-mingguan.index', $data);
    }

    public function formPs3GensetDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'level_oli_mesin.*' => ['nullable'],
            'level_air_radiator.*' => ['nullable'],
            'level_air_battery.*' => ['nullable'],
            'level_bahan_bakar.*' => ['nullable'],
            'tegangan_battery_starter.*' => ['nullable'],
            'coolant_temperature.*' => ['nullable'],
            'hour_meter.*' => ['nullable'],
            'alternator_heater.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3GensetDuaMingguans = FormPs3GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs3GensetDuaMingguans as $key => $formPs3GensetDuaMingguan) {
                $formPs3GensetDuaMingguan->level_oli_mesin = $validatedData['level_oli_mesin'][$key];
                $formPs3GensetDuaMingguan->level_air_radiator = $validatedData['level_air_radiator'][$key];
                $formPs3GensetDuaMingguan->level_air_battery = $validatedData['level_air_battery'][$key];
                $formPs3GensetDuaMingguan->level_bahan_bakar = $validatedData['level_bahan_bakar'][$key];
                $formPs3GensetDuaMingguan->tegangan_battery_starter = $validatedData['tegangan_battery_starter'][$key];
                $formPs3GensetDuaMingguan->coolant_temperature = $validatedData['coolant_temperature'][$key];
                $formPs3GensetDuaMingguan->hour_meter = $validatedData['hour_meter'][$key];
                $formPs3GensetDuaMingguan->alternator_heater = $validatedData['alternator_heater'][$key];
                $formPs3GensetDuaMingguan->catatan = $validatedData['catatan'];
                $formPs3GensetDuaMingguan->save();
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

    public function formPs3GensetEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - Genset';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs3GensetEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($j = 0; $j < 8; $j++) {
                $formPs3GensetEnamBulananTahunan = new FormPs3GensetEnamBulananTahunan();
                $formPs3GensetEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3GensetEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
                $formPs3GensetEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3GensetEnamBulananTahunan->save();
            }
        }

        $data['formPs3GensetEnamBulananTahunans'] = FormPs3GensetEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.genset-enam-bulanan-tahunan.index', $data);
    }


    public function formPs3EpccSimulatorEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm){
        $data['page_title'] = 'Form PS3 - EPCC SIMULATOR';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs3EpccSimulatorEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3EpccSimulatorEnamBulananTahunan = new FormPs3EpccSimulatorEnamBulananTahunan();
            $formPs3EpccSimulatorEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3EpccSimulatorEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
            $formPs3EpccSimulatorEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3EpccSimulatorEnamBulananTahunan->save();
        }
        $data['formPs3EpccSimulatorEnamBulananTahunan'] = FormPs3EpccSimulatorEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.epcc-simulator-enam-bulanan-tahunan.index', $data);
    }


    public function formPs3GensetEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'level_oli_mesin.*' => ['nullable'],
            'level_air_radiator.*' => ['nullable'],
            'level_air_battery.*' => ['nullable'],
            'level_bahan_bakar.*' => ['nullable'],
            'tegangan_battery_starter.*' => ['nullable'],
            'coolant_temperature.*' => ['nullable'],
            'hour_meter.*' => ['nullable'],
            'alternator_heater.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3GensetEnamBulananTahunans = FormPs3GensetEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs3GensetEnamBulananTahunans as $key => $formPs3GensetEnamBulananTahunan) {
                $formPs3GensetEnamBulananTahunan->level_oli_mesin = $validatedData['level_oli_mesin'][$key];
                $formPs3GensetEnamBulananTahunan->level_air_radiator = $validatedData['level_air_radiator'][$key];
                $formPs3GensetEnamBulananTahunan->level_air_battery = $validatedData['level_air_battery'][$key];
                $formPs3GensetEnamBulananTahunan->level_bahan_bakar = $validatedData['level_bahan_bakar'][$key];
                $formPs3GensetEnamBulananTahunan->tegangan_battery_starter = $validatedData['tegangan_battery_starter'][$key];
                $formPs3GensetEnamBulananTahunan->coolant_temperature = $validatedData['coolant_temperature'][$key];
                $formPs3GensetEnamBulananTahunan->hour_meter = $validatedData['hour_meter'][$key];
                $formPs3GensetEnamBulananTahunan->alternator_heater = $validatedData['alternator_heater'][$key];
                $formPs3GensetEnamBulananTahunan->catatan = $validatedData['catatan'];
                $formPs3GensetEnamBulananTahunan->save();
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

    public function formPs3EpccSimulatorEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm){
        $validatedData = $request->validate([
            'tegangan_input_epcc' => ['nullable'],
            'catatan' => ['nullable']
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3EpccSimulatorEnamBulananTahunan = FormPs3EpccSimulatorEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3EpccSimulatorEnamBulananTahunan->tegangan_input_epcc = $validatedData['tegangan_input_epcc'];
            $formPs3EpccSimulatorEnamBulananTahunan->catatan = $validatedData['catatan'];
            $formPs3EpccSimulatorEnamBulananTahunan->save();

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

    public function formPs3MainTankBaruLamaEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm){
        $data['page_title'] = 'Form PS3 - Main Tank Baru dan Lama Enam Bulanan dan Tahunan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs3MainTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3MainTankBaruLamaEnamBulananTahunan = new FormPs3MainTankBaruLamaEnamBulananTahunan();
            $formPs3MainTankBaruLamaEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3MainTankBaruLamaEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
            $formPs3MainTankBaruLamaEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3MainTankBaruLamaEnamBulananTahunan->save();
        }
        $data['formPs3MainTankBaruLamaEnamBulananTahunan'] = FormPs3MainTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.main-tank-baru-lama-enam-bulanan-tahunan.index', $data);
    }

    public function formPs3MainTankBaruLamaEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm){
        $validatedData = $request->validate([
            'main_tank1' => ['nullable'],
            'main_tank2' => ['nullable'],
            'main_tank3' => ['nullable'],
            'catatan' => ['nullable']
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3MainTankBaruLamaEnamBulananTahunan = FormPs3MainTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3MainTankBaruLamaEnamBulananTahunan->main_tank1 = $validatedData['main_tank1'];
            $formPs3MainTankBaruLamaEnamBulananTahunan->main_tank2 = $validatedData['main_tank2'];
            $formPs3MainTankBaruLamaEnamBulananTahunan->main_tank3 = $validatedData['main_tank3'];
            $formPs3MainTankBaruLamaEnamBulananTahunan->catatan = $validatedData['catatan'];
            $formPs3MainTankBaruLamaEnamBulananTahunan->save();

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

    public function formPs3SumpTankBaruEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm){
        $data['page_title'] = 'Form PS3 - Sump Tank Baru dan Lama Enam Bulanan dan Tahunan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs3SumpTankBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3SumpTankBaruEnamBulananTahunan = new FormPs3SumpTankBaruEnamBulananTahunan();
            $formPs3SumpTankBaruEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3SumpTankBaruEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
            $formPs3SumpTankBaruEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3SumpTankBaruEnamBulananTahunan->save();
        }
        $data['formPs3SumpTankBaruEnamBulananTahunan'] = FormPs3SumpTankBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.sump-tank-baru-enam-bulanan-tahunan.index', $data);
    }

    public function formPs3SumpTankBaruEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm){
        $validatedData = $request->validate([
            'sump_tank1' => ['nullable'],
            'catatan' => ['nullable']
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3SumpTankBaruEnamBulananTahunan = FormPs3SumpTankBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3SumpTankBaruEnamBulananTahunan->sump_tank1 = $validatedData['sump_tank1'];
            $formPs3SumpTankBaruEnamBulananTahunan->catatan = $validatedData['catatan'];
            $formPs3SumpTankBaruEnamBulananTahunan->save();

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

    public function formPs3SumpTankLamaEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm){
        $data['page_title'] = 'Form PS3 - Sump Tank Lama Enam Bulanan dan Tahunan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs3SumpTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3SumpTankLamaEnamBulananTahunan = new FormPs3SumpTankBaruLamaEnamBulananTahunan();
            $formPs3SumpTankLamaEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3SumpTankLamaEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
            $formPs3SumpTankLamaEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3SumpTankLamaEnamBulananTahunan->save();
        }
        $data['formPs3SumpTankLamaEnamBulananTahunan'] = FormPs3SumpTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.sump-tank-lama-enam-bulanan-tahunan.index', $data);
    }

    public function formPs3SumpTankLamaEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm){
        $validatedData = $request->validate([
            'sump_tank1' => ['nullable'],
            'sump_tank2' => ['nullable'],
            'catatan' => ['nullable']
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3SumpTankLamaEnamBulananTahunan = FormPs3SumpTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3SumpTankLamaEnamBulananTahunan->sump_tank1 = $validatedData['sump_tank1'];
            $formPs3SumpTankLamaEnamBulananTahunan->sump_tank2 = $validatedData['sump_tank2'];
            $formPs3SumpTankLamaEnamBulananTahunan->catatan = $validatedData['catatan'];
            $formPs3SumpTankLamaEnamBulananTahunan->save();

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

    public function formPs3LvmdpCheckEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - LVMDP CHECKLIST';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['lvmdpA'] = ['RECTIFIER B', 'VIDEOTRON', 'GENSET 5-6', 'GENSET 7-8', 'UPS 1', 'CONTROL TRAFO I', 'RECTIFIER GH127', 'UPS 006A', 'TRAFO II', 'CCTV POS 1', 'RUMAH POMPA', 'SDP 001B'];
        $data['lvmdpB'] = ['SDP 004', 'SDP 003', 'SDP 001C', 'SDP MAINTANK', 'UPS 006', 'SDP 002', 'DIREKSI KIT WIKA', 'SDP 001A', 'UPS 006B', 'GENSET 3-4', 'GENSET 1', 'GENSET 2'];
        try {
            DB::beginTransaction();
            if (!FormPs3LvmdpACheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3LvmdpACheckEnamBulananTahunan = new FormPs3LvmdpACheckEnamBulananTahunan();
                $formPs3LvmdpACheckEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3LvmdpACheckEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
                $formPs3LvmdpACheckEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3LvmdpACheckEnamBulananTahunan->panel = 'LVMDP A';
                $formPs3LvmdpACheckEnamBulananTahunan->status = 'incoming';
                $formPs3LvmdpACheckEnamBulananTahunan->save();
                foreach ($data['lvmdpA'] as $lvmdpA) {
                    $formPs3LvmdpACheckEnamBulananTahunan = new FormPs3LvmdpACheckEnamBulananTahunan();
                    $formPs3LvmdpACheckEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs3LvmdpACheckEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
                    $formPs3LvmdpACheckEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs3LvmdpACheckEnamBulananTahunan->panel = $lvmdpA;
                    $formPs3LvmdpACheckEnamBulananTahunan->status = 'outgoing';
                    $formPs3LvmdpACheckEnamBulananTahunan->save();
                }
            }
            if (!FormPs3LvmdpBCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3LvmdpBCheckEnamBulananTahunan = new FormPs3LvmdpBCheckEnamBulananTahunan();
                $formPs3LvmdpBCheckEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3LvmdpBCheckEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
                $formPs3LvmdpBCheckEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3LvmdpBCheckEnamBulananTahunan->panel = 'LVMDP B';
                $formPs3LvmdpBCheckEnamBulananTahunan->status = 'incoming';
                $formPs3LvmdpBCheckEnamBulananTahunan->save();
                foreach ($data['lvmdpB'] as $lvmdpB) {
                    $formPs3LvmdpBCheckEnamBulananTahunan = new FormPs3LvmdpBCheckEnamBulananTahunan();
                    $formPs3LvmdpBCheckEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs3LvmdpBCheckEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
                    $formPs3LvmdpBCheckEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs3LvmdpBCheckEnamBulananTahunan->panel = $lvmdpB;
                    $formPs3LvmdpBCheckEnamBulananTahunan->status = 'outgoing';
                    $formPs3LvmdpBCheckEnamBulananTahunan->save();
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

        $data['formPs3LvmdpACheckEnamBulananTahunans'] = FormPs3LvmdpACheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs3LvmdpBCheckEnamBulananTahunans'] = FormPs3LvmdpBCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.lvmdp-a-check-enam-bulanan-tahunan.index', $data);
    }

    public function formPs3LvmdpCheckEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataLvmdpA = $request->validate([
            'arus_l1_a.*' => ['nullable'],
            'arus_l2_a.*' => ['nullable'],
            'arus_l3_a.*' => ['nullable'],
            'tegangan_a.*' => ['nullable'],
            'hz_a.*' => ['nullable'],
            'keterangan_a.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $validatedDataLvmdpB = $request->validate([
            'arus_l1_b.*' => ['nullable'],
            'arus_l2_b.*' => ['nullable'],
            'arus_l3_b.*' => ['nullable'],
            'tegangan_b.*' => ['nullable'],
            'hz_b.*' => ['nullable'],
            'keterangan_b.*' => ['nullable']
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3LvmdpACheckEnamBulananTahunans = FormPs3LvmdpACheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs3LvmdpACheckEnamBulananTahunans as $key => $formPs3LvmdpACheckEnamBulananTahunan) {
                $formPs3LvmdpACheckEnamBulananTahunan->arus_l1 = $validatedDataLvmdpA['arus_l1_a'][$key];
                $formPs3LvmdpACheckEnamBulananTahunan->arus_l2 = $validatedDataLvmdpA['arus_l2_a'][$key];
                $formPs3LvmdpACheckEnamBulananTahunan->arus_l3 = $validatedDataLvmdpA['arus_l3_a'][$key];
                $formPs3LvmdpACheckEnamBulananTahunan->tegangan = $validatedDataLvmdpA['tegangan_a'][$key];
                $formPs3LvmdpACheckEnamBulananTahunan->hz = $validatedDataLvmdpA['hz_a'][$key];
                $formPs3LvmdpACheckEnamBulananTahunan->keterangan = $validatedDataLvmdpA['keterangan_a'][$key];
                $formPs3LvmdpACheckEnamBulananTahunan->catatan = $validatedDataLvmdpA['catatan'];
                $formPs3LvmdpACheckEnamBulananTahunan->save();
            }

            $formPs3LvmdpBCheckEnamBulananTahunans = FormPs3LvmdpBCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs3LvmdpBCheckEnamBulananTahunans as $key => $formPs3LvmdpBCheckEnamBulananTahunan) {
                $formPs3LvmdpBCheckEnamBulananTahunan->arus_l1 = $validatedDataLvmdpB['arus_l1_b'][$key];
                $formPs3LvmdpBCheckEnamBulananTahunan->arus_l2 = $validatedDataLvmdpB['arus_l2_b'][$key];
                $formPs3LvmdpBCheckEnamBulananTahunan->arus_l3 = $validatedDataLvmdpB['arus_l3_b'][$key];
                $formPs3LvmdpBCheckEnamBulananTahunan->tegangan = $validatedDataLvmdpB['tegangan_b'][$key];
                $formPs3LvmdpBCheckEnamBulananTahunan->hz = $validatedDataLvmdpB['hz_b'][$key];
                $formPs3LvmdpBCheckEnamBulananTahunan->keterangan = $validatedDataLvmdpB['keterangan_b'][$key];
                $formPs3LvmdpBCheckEnamBulananTahunan->save();
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

    public function formPs3EpccEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm){
        $data['page_title'] = 'Form PS3 - EPCC';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs3EpccEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3EpccEnamBulananTahunan = new FormPs3EpccEnamBulananTahunan();
            $formPs3EpccEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3EpccEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
            $formPs3EpccEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3EpccEnamBulananTahunan->save();
        }
        $data['formPs3EpccEnamBulananTahunan'] = FormPs3EpccEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.epcc-enam-bulanan-tahunan.index', $data);
    }


    public function formPs3EpccEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm){
        $validatedData = $request->validate([
            'tegangan_battery_epcc' => ['nullable'],
            'tegangan_input_epcc' => ['nullable'],
            'catatan' => ['nullable']
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3EpccEnamBulananTahunan = FormPs3EpccEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3EpccEnamBulananTahunan->tegangan_battery_epcc = $validatedData['tegangan_battery_epcc'];
            $formPs3EpccEnamBulananTahunan->tegangan_input_epcc = $validatedData['tegangan_input_epcc'];
            $formPs3EpccEnamBulananTahunan->catatan = $validatedData['catatan'];
            $formPs3EpccEnamBulananTahunan
            ->save();

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

    public function formPs3GensetCheckEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm){
        $data['page_title'] = 'Form PS3 - Genset Checklist';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs3GensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($j = 0; $j < 8; $j++) {
                $formPs3GensetCheckEnamBulananTahunan = new FormPs3GensetCheckEnamBulananTahunan();
                $formPs3GensetCheckEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3GensetCheckEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
                $formPs3GensetCheckEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3GensetCheckEnamBulananTahunan->save();
            }
        }

        $data['formPs3GensetCheckEnamBulananTahunans'] = FormPs3GensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.genset-check-enam-bulanan-tahunan.index', $data);
    }

    public function formPs3GensetCheckEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm){
        $validatedData = $request->validate([
            // PEMERIKSAAN TAHANAN ISOLASI
            'motor_radiator_belitan_u1_u2.*'=>['nullable'],
            'motor_radiator_belitan_v1_v2.*'=>['nullable'],
            'motor_radiator_belitan_w1_w2.*'=>['nullable'],
            'motor_radiator_belitan_l1_g.*'=>['nullable'],
            'motor_radiator_belitan_l2_g.*'=>['nullable'],
            'motor_radiator_belitan_l3_g.*'=>['nullable'],


            'motor_radiator_isolasi_l1_g_1m.*'=>['nullable'],
            'motor_radiator_isolasi_l1_g_10m.*'=>['nullable'],

            'motor_radiator_isolasi_l2_g_1m.*'=>['nullable'],
            'motor_radiator_isolasi_l2_g_10m.*'=>['nullable'],

            'motor_radiator_isolasi_l3_g_1m.*'=>['nullable'],
            'motor_radiator_isolasi_l3_g_10m.*'=>['nullable'],

            'motor_radiator_isolasi_l1_l2_1m.*'=>['nullable'],
            'motor_radiator_isolasi_l1_l2_10m.*'=>['nullable'],

            'motor_radiator_isolasi_l1_l3_1m.*'=>['nullable'],
            'motor_radiator_isolasi_l1_l3_10m.*'=>['nullable'],

            'motor_radiator_isolasi_l2_l3_1m.*'=>['nullable'],
            'motor_radiator_isolasi_l2_l3_10m.*'=>['nullable'],


            // ALTERNATOR
            'alternator_isolasi_l1_g_1m.*'=>['nullable'],
            'alternator_isolasi_l1_g_10m.*'=>['nullable'],

            'alternator_isolasi_l2_g_1m.*'=>['nullable'],
            'alternator_isolasi_l2_g_10m.*'=>['nullable'],

            'alternator_isolasi_l3_g_1m.*'=>['nullable'],
            'alternator_isolasi_l3_g_10m.*'=>['nullable'],

            'alternator_isolasi_l1_l2_l3_g_1m.*'=>['nullable'],
            'alternator_isolasi_l1_l2_l3_g_10m.*'=>['nullable'],

            'catatan' => ['nullable']
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3GensetCheckEnamBulananTahunans = FormPs3GensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs3GensetCheckEnamBulananTahunans as $key => $formPs3GensetCheckEnamBulananTahunan) {
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_u1_u2 = $validatedData['motor_radiator_belitan_u1_u2'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_v1_v2 = $validatedData['motor_radiator_belitan_v1_v2'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_w1_w2 = $validatedData['motor_radiator_belitan_w1_w2'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_l1_g = $validatedData['motor_radiator_belitan_l1_g'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_l2_g = $validatedData['motor_radiator_belitan_l2_g'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_l3_g = $validatedData['motor_radiator_belitan_l3_g'][$key];

                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_g_1m = $validatedData['motor_radiator_isolasi_l1_g_1m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_g_10m = $validatedData['motor_radiator_isolasi_l1_g_10m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l2_g_1m = $validatedData['motor_radiator_isolasi_l2_g_1m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l2_g_10m = $validatedData['motor_radiator_isolasi_l2_g_10m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l3_g_1m = $validatedData['motor_radiator_isolasi_l3_g_1m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l3_g_10m = $validatedData['motor_radiator_isolasi_l3_g_10m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_l2_1m = $validatedData['motor_radiator_isolasi_l1_l2_1m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_l2_10m = $validatedData['motor_radiator_isolasi_l1_l2_10m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_l3_1m = $validatedData['motor_radiator_isolasi_l1_l3_1m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_l3_10m = $validatedData['motor_radiator_isolasi_l1_l3_10m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l2_l3_1m = $validatedData['motor_radiator_isolasi_l2_l3_1m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l2_l3_10m = $validatedData['motor_radiator_isolasi_l2_l3_10m'][$key];

                $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l1_g_1m = $validatedData['alternator_isolasi_l1_g_1m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l1_g_10m = $validatedData['alternator_isolasi_l1_g_10m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l2_g_1m = $validatedData['alternator_isolasi_l2_g_1m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l2_g_10m = $validatedData['alternator_isolasi_l2_g_10m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l3_g_1m = $validatedData['alternator_isolasi_l3_g_1m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l3_g_10m = $validatedData['alternator_isolasi_l3_g_10m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l1_l2_l3_g_1m = $validatedData['alternator_isolasi_l1_l2_l3_g_1m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l1_l2_l3_g_10m = $validatedData['alternator_isolasi_l1_l2_l3_g_10m'][$key];
                $formPs3GensetCheckEnamBulananTahunan->catatan = $validatedData['catatan'];
                $formPs3GensetCheckEnamBulananTahunan->save();
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

    public function formPs3PanelKontrolPompaEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - Panel Kontrol Pompa';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs3PanelKontrolPompaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3PanelKontrolPompaEnamBulananTahunan = new FormPs3PanelKontrolPompaEnamBulananTahunan();
            $formPs3PanelKontrolPompaEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3PanelKontrolPompaEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
            $formPs3PanelKontrolPompaEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3PanelKontrolPompaEnamBulananTahunan->save();
        }
        $data['formPs3PanelKontrolPompaEnamBulananTahunan'] = FormPs3PanelKontrolPompaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.panel-kontrol-pompa-enam-bulanan-tahunan.index', $data);
    }

    public function formPs3PanelKontrolPompaEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm){
        $validatedData = $request->validate([
            'panel_monitor_main_tank1' => ['nullable'],
            'panel_monitor_main_tank2' => ['nullable'],
            'panel_hmi_main_tank1' => ['nullable'],
            'panel_hmi_main_tank2' => ['nullable'],
            'catatan' => ['nullable']
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3PanelKontrolPompaEnamBulananTahunan = FormPs3PanelKontrolPompaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3PanelKontrolPompaEnamBulananTahunan->panel_monitor_main_tank1 = $validatedData['panel_monitor_main_tank1'];
            $formPs3PanelKontrolPompaEnamBulananTahunan->panel_monitor_main_tank2 = $validatedData['panel_monitor_main_tank2'];
            $formPs3PanelKontrolPompaEnamBulananTahunan->panel_hmi_main_tank1 = $validatedData['panel_hmi_main_tank1'];
            $formPs3PanelKontrolPompaEnamBulananTahunan->panel_hmi_main_tank2 = $validatedData['panel_hmi_main_tank2'];
            $formPs3PanelKontrolPompaEnamBulananTahunan->catatan = $validatedData['catatan'];
            $formPs3PanelKontrolPompaEnamBulananTahunan->save();

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

    public function formPs3TrafoEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - Trafo Enam Bulanan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs3TrafoEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 2; $i++) {
                $formPs3TrafoEnamBulananTahunan = new FormPs3TrafoEnamBulananTahunan();
                $formPs3TrafoEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3TrafoEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
                $formPs3TrafoEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3TrafoEnamBulananTahunan->type = $i == 0 ? 'AUX A' : 'AUX B';
                $formPs3TrafoEnamBulananTahunan->save();
            }

            for ($j = 0; $j < 8; $j++) {
                $formPs3TrafoEnamBulananTahunan = new FormPs3TrafoEnamBulananTahunan();
                $formPs3TrafoEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3TrafoEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
                $formPs3TrafoEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3TrafoEnamBulananTahunan->type = 'G' . strval($j + 1);
                $formPs3TrafoEnamBulananTahunan->save();
            }
        }
        $data['FormPs3TrafoEnamBulananTahunans'] = FormPs3TrafoEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.power-station-3.trafo-enam-bulanan-tahunan.index', $data);
    }

    public function formPs3trafoEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'phase_a.*' => ['nullable'],
            'phase_b.*' => ['nullable'],
            'phase_c.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3TrafoEnamBulananTahunans = FormPs3TrafoEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs3TrafoEnamBulananTahunans as $key => $formPs3TrafoEnamBulananTahunan) {
                $formPs3TrafoEnamBulananTahunan->phase_a = $validatedData['phase_a'][$key];
                $formPs3TrafoEnamBulananTahunan->phase_b = $validatedData['phase_b'][$key];
                $formPs3TrafoEnamBulananTahunan->phase_c = $validatedData['phase_c'][$key];
                $formPs3TrafoEnamBulananTahunan->catatan = $validatedData['catatan'];
                $formPs3TrafoEnamBulananTahunan->save();
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

    public function formPs3PanelMvEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form PS3 - Panel Mv';
        
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['tegangan_panels'] = [
            ['XDA', 'XSA', 'XSL'],
            ['XDB', 'XSB', 'XSM'],
            ['XDC', 'XSC', 'XSN'],
            ['XDD', 'XSD', 'XSO'],
            ['XDE', 'XSE', 'XSP'],
            ['XDF', 'XSF', 'XSQ'],
            ['XDG', 'XSG', 'XSR'],
            ['XDH', 'XSH', 'XSS', 'XCA', 'XCB']
        ];

        if (!FormPs3PanelMvEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['tegangan_panels'] as $key => $value) {
                $formPs3PanelMvEnamBulananTahunans = new FormPs3PanelMvEnamBulananTahunan();
                $formPs3PanelMvEnamBulananTahunans->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs3PanelMvEnamBulananTahunans->form_id = $detailWorkOrderForm->form_id;
                $formPs3PanelMvEnamBulananTahunans->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs3PanelMvEnamBulananTahunans->tegangan_panel = $value;
                $formPs3PanelMvEnamBulananTahunans->save();
            }
        }
        dd("masuk");
        $data['formPs3PanelMvEnamBulananTahunans'] = FormPs3PanelMvEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.power-station-3.panel-mv-enam-bulanan-tahunan.index', $data);
    }

    public function formPs3PanelMvEnamBulananTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'q1.*' => ['nullable'],
            'q2.*' => ['nullable'],
            'q3.*' => ['nullable'],
            'q4.*' => ['nullable'],
            'q5.*' => ['nullable'],
            'catatan' => ['nullable']
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;

        try {
            DB::beginTransaction();
            $formPs3PanelMvEnamBulananTahunans = FormPs3PanelMvEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();

            foreach ($formPs3PanelMvEnamBulananTahunans as $key => $formPs3PanelMvEnamBulananTahunan) {
                $formPs3PanelMvEnamBulananTahunan->q1 = $validatedData['q1'][$key] ?? null;
                $formPs3PanelMvEnamBulananTahunan->q2 = $validatedData['q2'][$key] ?? null;
                $formPs3PanelMvEnamBulananTahunan->q3 = $validatedData['q3'][$key] ?? null;
                $formPs3PanelMvEnamBulananTahunan->q4 = $key == 7 ? $validatedData['q4'][0] : null;
                $formPs3PanelMvEnamBulananTahunan->q5 = $key == 7 ? $validatedData['q5'][0] : null;
                $formPs3PanelMvEnamBulananTahunan->catatan = $validatedData['catatan'] ?? null;
                $formPs3PanelMvEnamBulananTahunan->save();
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

    public function formPs3TrafoGensetEnamBulananTahunan(DetailWorkOrderForm $detailWorkOrderForm){
        $data['page_title'] = 'Form PS3 - Trafo Genset CHECKLIST';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (!FormPs3TrafoGensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs3TrafoGensetCheckEnamBulananTahunan = new FormPs3TrafoGensetCheckEnamBulananTahunan();
            $formPs3TrafoGensetCheckEnamBulananTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs3TrafoGensetCheckEnamBulananTahunan->form_id = $detailWorkOrderForm->form_id;
            $formPs3TrafoGensetCheckEnamBulananTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs3TrafoGensetCheckEnamBulananTahunan->save();
        }
        $data['formPs3TrafoGensetCheckEnamBulananTahunan'] = FormPs3TrafoGensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        // // menyimpan FormActivityLog untuk status 'start'
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
        return view('form.power-station-3.trafo-genset-check-enam-bulanan-tahunan.index', $data);
    }

    public function formPs3TrafoGensetEnamBulananTahunanUpdate(DetailWorkOrderForm $detailWorkOrderForm,Request $request){
        $validatedData = $request->validate([
            'n1' => ['nullable'],
            'n2' => ['nullable'],
            'n3' => ['nullable'],
            'hv_g_1m' => ['nullable'],
            'hv_g_10m' => ['nullable'],
            'lv_g_1m' => ['nullable'],
            'lv_g_10m' => ['nullable'],
            'hv_lv_1m' => ['nullable'],
            'hv_lv_10m' => ['nullable'],
            'l1_g_1m' => ['nullable'],
            'l2_g_1m' => ['nullable'],
            'l3_g_1m' => ['nullable'],
            'l1_l2_1m' => ['nullable'],
            'l2_l3_1m' => ['nullable'],
            'l1_l3_1m' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs3TrafoGensetCheckEnamBulananTahunan = FormPs3TrafoGensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs3TrafoGensetCheckEnamBulananTahunan->n1 = $validatedData['n1'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->n2 = $validatedData['n2'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->n3 = $validatedData['n3'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->hv_g_1m = $validatedData['hv_g_1m'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->hv_g_10m = $validatedData['hv_g_10m'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->lv_g_1m = $validatedData['lv_g_1m'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->lv_g_10m = $validatedData['lv_g_10m'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->hv_lv_1m = $validatedData['hv_lv_1m'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->hv_lv_10m = $validatedData['hv_lv_10m'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->l1_g_1m = $validatedData['l1_g_1m'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->l2_g_1m = $validatedData['l2_g_1m'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->l3_g_1m = $validatedData['l3_g_1m'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->l1_l2_1m = $validatedData['l1_l2_1m'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->l2_l3_1m = $validatedData['l2_l3_1m'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->l1_l3_1m = $validatedData['l1_l3_1m'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->catatan = $validatedData['catatan'];
            $formPs3TrafoGensetCheckEnamBulananTahunan->save();

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

    public function dummy()
    {
        dd(Auth::user());
    }
}