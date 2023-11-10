<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLog;
use Illuminate\Http\Request;
use App\Models\FormActivityLog;
use App\Models\FormPs2PanelHarian;
use Illuminate\Support\Facades\DB;
use App\Models\DetailWorkOrderForm;
use App\Models\UserTechnical;
use Illuminate\Support\Facades\Auth;

class FormPs2Controller extends Controller
{
    public function formPs2PanelHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['er2a'] = [['cubicle' => 'MCA', 'keterangan' => 'INCOMING PLN (GH127)'], ['cubicle' => 'MCB', 'keterangan' => 'INCOMING PLN (GH127)'], ['cubicle' => 'MSC', 'keterangan' => 'TRAFO AUXILIARY A'], ['cubicle' => 'MSD', 'keterangan' => 'T1 LOOP 1'], ['cubicle' => 'MSE', 'keterangan' => 'T1 LOOP 2'], ['cubicle' => 'MSF', 'keterangan' => 'T1 LOOP 3'], ['cubicle' => 'MSG', 'keterangan' => 'T2 LOOP 2'], ['cubicle' => 'MSH', 'keterangan' => 'T2 LOOP 1'], ['cubicle' => 'MSI', 'keterangan' => 'T2 LOOP 3 '], ['cubicle' => 'MSS', 'keterangan' => 'TEKNIKAL LOOP 2'], ['cubicle' => 'MST', 'keterangan' => 'TEKNIKAL LOOP 1'], ['cubicle' => 'MSU', 'keterangan' => 'SPARE'], ['cubicle' => 'MSB', 'keterangan' => 'TRAFO  ZIGZAG'], ['cubicle' => 'MSA', 'keterangan' => 'METERING'], ['cubicle' => 'MCC', 'keterangan' => 'COUPLER'], ['cubicle' => 'MCF', 'keterangan' => 'INCOMING GENSET']];

        $data['er2b'] = [['cubicle' => 'MCD', 'keterangan' => 'INCOMING PLN (GH128)'], ['cubicle' => 'MCE', 'keterangan' => 'INCOMING PLN (GH128)'], ['cubicle' => 'MSL', 'keterangan' => 'TRAFO AUXILIARY B'], ['cubicle' => 'MSM', 'keterangan' => 'T1 LOOP 2'], ['cubicle' => 'MSN', 'keterangan' => 'T1 LOOP 1'], ['cubicle' => 'MSO', 'keterangan' => 'T2 LOOP 2'], ['cubicle' => 'MSP', 'keterangan' => 'T2 LOOP 1'], ['cubicle' => 'MSQ', 'keterangan' => 'T2 LOOP 3 '], ['cubicle' => 'MSR', 'keterangan' => 'T1 LOOP 3'], ['cubicle' => 'MSV', 'keterangan' => 'TEKNIKAL LOOP 1'], ['cubicle' => 'MSW', 'keterangan' => 'TEKNIKAL LOOP 2'], ['cubicle' => 'MSX', 'keterangan' => 'APMS'], ['cubicle' => 'MSK', 'keterangan' => 'TRAFO  ZIGZAG'], ['cubicle' => 'MSJ', 'keterangan' => 'METERING'], ['cubicle' => 'MCC', 'keterangan' => 'COUPLER'], ['cubicle' => 'MCG', 'keterangan' => 'INCOMING GENSET']];

        $data['er1a'] = [['cubicle' => 'XSA', 'keterangan' => 'GENSET 1'], ['cubicle' => 'XCA', 'keterangan' => 'OUTGOING GENSET'], ['cubicle' => 'XSB', 'keterangan' => 'GENSET 2'], ['cubicle' => 'XSC', 'keterangan' => 'GENSET 3'], ['cubicle' => 'XSD', 'keterangan' => 'GENSET 4'], ['cubicle' => 'XSE', 'keterangan' => 'GENSET 5'], ['cubicle' => 'XSF', 'keterangan' => 'GENSET 6'], ['cubicle' => 'XSG', 'keterangan' => 'GENSET 7']];

        $data['er1b'] = [['cubicle' => 'XSL', 'keterangan' => 'GENSET 1'], ['cubicle' => 'XCB', 'keterangan' => 'OUTGOING GENSET'], ['cubicle' => 'XSM', 'keterangan' => 'GENSET 2'], ['cubicle' => 'XSN', 'keterangan' => 'GENSET 3'], ['cubicle' => 'XSO', 'keterangan' => 'GENSET 4'], ['cubicle' => 'XSP', 'keterangan' => 'GENSET 5'], ['cubicle' => 'XSQ', 'keterangan' => 'GENSET 6'], ['cubicle' => 'XSR', 'keterangan' => 'GENSET 7']];

        $data['panel_mv_genset'] = [['cubicle' => 'XDA', 'keterangan' => 'PPG GENSET 1'], ['cubicle' => 'XDB', 'keterangan' => 'PPG GENSET 2'], ['cubicle' => 'XDC', 'keterangan' => 'PPG GENSET 3'], ['cubicle' => 'XDD', 'keterangan' => 'PPG GENSET 4'], ['cubicle' => 'XDE', 'keterangan' => 'PPG GENSET 5'], ['cubicle' => 'XDF', 'keterangan' => 'PPG GENSET 6'], ['cubicle' => 'XDG', 'keterangan' => 'PPG GENSET 7']];

        $data['page_title'] = 'Form Checklist Harian Panel';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2a')
                ->first()
        ) {
            foreach ($data['er2a'] as $key => $value) {
                # code...
                $formPs2PanelHarianER2A = new FormPs2PanelHarian();
                $formPs2PanelHarianER2A->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2PanelHarianER2A->form_id = $detailWorkOrderForm->form_id;
                $formPs2PanelHarianER2A->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs2PanelHarianER2A->grup = 'er2a';
                $formPs2PanelHarianER2A->cubicle = $value['cubicle'];
                $formPs2PanelHarianER2A->keterangan = $value['keterangan'];
                $formPs2PanelHarianER2A->save();
            }
        }

        if (
            !FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2b')
                ->first()
        ) {
            foreach ($data['er2b'] as $key => $value) {
                # code...
                $formPs2PanelHarianER2B = new FormPs2PanelHarian();
                $formPs2PanelHarianER2B->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2PanelHarianER2B->form_id = $detailWorkOrderForm->form_id;
                $formPs2PanelHarianER2B->work_order_id = $detailWorkOrderForm->work_order_id;

                $formPs2PanelHarianER2B->grup = 'er2b';
                $formPs2PanelHarianER2B->cubicle = $value['cubicle'];
                $formPs2PanelHarianER2B->keterangan = $value['keterangan'];
                $formPs2PanelHarianER2B->save();
            }
        }

        if (
            !FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1a')
                ->first()
        ) {
            foreach ($data['er1a'] as $key => $value) {
                # code...
                $formPs2PanelHarianER1A = new FormPs2PanelHarian();
                $formPs2PanelHarianER1A->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2PanelHarianER1A->form_id = $detailWorkOrderForm->form_id;
                $formPs2PanelHarianER1A->work_order_id = $detailWorkOrderForm->work_order_id;

                $formPs2PanelHarianER1A->grup = 'er1a';
                $formPs2PanelHarianER1A->cubicle = $value['cubicle'];
                $formPs2PanelHarianER1A->keterangan = $value['keterangan'];
                $formPs2PanelHarianER1A->save();
            }
        }
        if (
            !FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1b')
                ->first()
        ) {
            foreach ($data['er1b'] as $key => $value) {
                # code...
                $formPs2PanelHarianER1B = new FormPs2PanelHarian();
                $formPs2PanelHarianER1B->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2PanelHarianER1B->form_id = $detailWorkOrderForm->form_id;
                $formPs2PanelHarianER1B->work_order_id = $detailWorkOrderForm->work_order_id;

                $formPs2PanelHarianER1B->grup = 'er1b';
                $formPs2PanelHarianER1B->cubicle = $value['cubicle'];
                $formPs2PanelHarianER1B->keterangan = $value['keterangan'];
                $formPs2PanelHarianER1B->save();
            }
        }
        if (
            !FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'panel_mv_genset')
                ->first()
        ) {
            foreach ($data['panel_mv_genset'] as $key => $value) {
                # code...
                $formPs2PanelHarianPanel = new FormPs2PanelHarian();
                $formPs2PanelHarianPanel->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs2PanelHarianPanel->form_id = $detailWorkOrderForm->form_id;
                $formPs2PanelHarianPanel->work_order_id = $detailWorkOrderForm->work_order_id;

                $formPs2PanelHarianPanel->grup = 'panel_mv_genset';
                $formPs2PanelHarianPanel->cubicle = $value['cubicle'];
                $formPs2PanelHarianPanel->keterangan = $value['keterangan'];
                $formPs2PanelHarianPanel->save();
            }
        }
        $data['formPs2PanelHarianER2A'] = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er2a')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs2PanelHarianER2B'] = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er2b')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs2PanelHarianER1A'] = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er1a')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs2PanelHarianER1B'] = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er1b')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs2PanelHarianPanel'] = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.power-station-2.harian-panel.index', $data);
    }

    public function formPs2PanelHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
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
        // dd($request->all());
        // DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            // dd($request->get('local_er2a_'));
            DB::beginTransaction();
            $dataER2As = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2a')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataER2As as $key => $value) {
                $number = $key + 1;

                $value->form_id = $detailWorkOrderForm->form_id;
                $value->local = !$request->local_er2a_ ? null : (in_array($number, $validatedDataER2A['local_er2a_']) ? $number : null);
                $value->remote = !$request->remote_er2a_ ? null : (in_array($number, $validatedDataER2A['remote_er2a_']) ? $number : null);
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
            $dataER2Bs = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2b')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataER2Bs as $key => $value) {
                $number = $key + 1;

                $value->form_id = $detailWorkOrderForm->form_id;
                $value->local = !$request->local_er2b_ ? null : (in_array($number, $validatedDataER2B['local_er2b_']) ? $number : null);
                $value->remote = !$request->remote_er2b_ ? null : (in_array($number, $validatedDataER2B['remote_er2b_']) ? $number : null);
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
            $dataER1As = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1a')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataER1As as $key => $value) {
                $number = $key + 1;

                $value->form_id = $detailWorkOrderForm->form_id;
                $value->local = !$request->local_er1a_ ? null : (in_array($number, $validatedDataER1A['local_er1a_']) ? $number : null);
                $value->remote = !$request->remote_er1a_ ? null : (in_array($number, $validatedDataER1A['remote_er1a_']) ? $number : null);
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
            $dataER1Bs = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1b')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataER1Bs as $key => $value) {
                $number = $key + 1;

                $value->form_id = $detailWorkOrderForm->form_id;
                $value->local = !$request->local_er1b_ ? null : (in_array($number, $validatedDataER1B['local_er1b_']) ? $number : null);
                $value->remote = !$request->remote_er1b_ ? null : (in_array($number, $validatedDataER1B['remote_er1b_']) ? $number : null);
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
            $dataPanelMvGensets = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'panel_mv_genset')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataPanelMvGensets as $key => $value) {
                $number = $key + 1;

                $value->form_id = $detailWorkOrderForm->form_id;
                $value->local = !$request->local_panel_ ? null : (in_array($number, $validatedDataPanel['local_panel_']) ? $number : null);
                $value->remote = !$request->remote_panel_ ? null : (in_array($number, $validatedDataPanel['remote_panel_']) ? $number : null);
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
}
