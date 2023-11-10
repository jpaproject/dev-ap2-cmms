<?php

namespace App\Http\Controllers\form\ps1;

use App\Models\Asset;
use App\Models\DetailWorkOrderForm;
use App\Models\FormActivityLog;
use App\Models\FormPs1ControlDeskDuaMingguanBelakang;
use App\Models\FormPs1ControlDeskDuaMingguan;
use App\Models\FormPs1ControlDeskTahunan;
use App\Models\FormPs1GensetHarianPower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\UserTechnical;

class ControlDeskController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:work-order-list', ['only' => 'index']);
        $this->middleware('permission:work-order-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:work-order-detail', ['only' => 'show']);
        $this->middleware('permission:work-order-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:work-order-delete', ['only' => ['destroy']]);
    }


    public function formPs1ControlDeskDuaMingguan(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Check List Control Desk Dua Mingguan PS 1';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormPs1ControlDeskDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs1ControlDeskDuaMingguan = new FormPs1ControlDeskDuaMingguan();
            $formPs1ControlDeskDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs1ControlDeskDuaMingguan->form_id = $detailWorkOrderForm->form_id;
            $formPs1ControlDeskDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs1ControlDeskDuaMingguan->save();
        }
        $data['formPs1ControlDeskDuaMingguan'] = $detailWorkOrderForm->formPs1ControlDeskDuaMingguan;


        $data['pertanyaan'] = [
            ['pertanyaan' =>'- Siapkan Peralatan kerja dan gunakan perlengkapan K3','field'=> 'q1'],
            ['pertanyaan' =>'- Pemeriksaan Parameter dan Lampu Indikator','field'=> 'q2'],
            ['pertanyaan' =>'- Pemeriksaan Bagian Dalam Control Desk','field'=> 'q3'],
            ['pertanyaan' =>'- Pemeriksaan Tegangan 24 Vdc','field'=> 'q4'],
            ['pertanyaan' =>'- Pemeriksaan Test Lamp dan Horn Test/Test Buzzer','field'=> 'q5'],
            ['pertanyaan' =>'- Pemeriksaan Relay - Relay Control Desk','field'=> 'q6'],
            ['pertanyaan' =>'- Membersihkan Bagian Dalam dan Luar Control Desk','field'=> 'q7'],
            ['pertanyaan' =>'- Pemeriksaan operasi kerja PC control Monitoring','field'=> 'q8'],
            ['pertanyaan' =>'- Membersihkan Bagian bagian PC control Monitoring','field'=> 'q9'],
            ['pertanyaan' =>'- Pemeriksaan Keseluruhan Control Desk','field'=> 'q10'],
        ];

        $pertanyaanControl = [
            ['pertanyaan' => 'Lampu Indikator', 'satuan' => 'Normal/Rusak', 'select' => ['Normal', 'rusak']],
            ['pertanyaan' => 'Operation Mode', 'satuan' => 'Auto / Off / Manual', 'select' => ['Auto', 'Off', 'Manual']],
            ['pertanyaan' => 'Volt Adjuster', 'satuan' => 'Lock'],
            ['pertanyaan' => 'Power Meter', 'satuan' => 'Normal/Error', 'select' => ['Normal', 'Error']],
            ['pertanyaan' => 'Modul Synchron', 'satuan' => 'Auto /Semi', 'select' => ['Auto', 'Semi']],
            ['pertanyaan' => 'HMI Monitoring', 'satuan' => 'Normal/Error', 'select' => ['Normal', 'Error']],
            ['pertanyaan' => 'Tegangan Kontrol', 'satuan' => 'Vdc'],
            ['pertanyaan' => 'Horn / Buzzer test', 'satuan' => 'Normal / Error', 'select' => ['Normal', 'Error']],
            ['pertanyaan' => 'PC Control Monitoring', 'satuan' => 'Normal/Error', 'select' => ['Normal', 'Error']],
            ['pertanyaan' => 'MCB/Fuse kontrol', 'satuan' => 'Normal'],
        ];

        $pertanyaanPanel = [
            ['pertanyaan'=>'Lampu Indikator PLC','satuan'=>'Run / Err / Off', 'select' => ['Run', 'Err', 'Off']],
            ['pertanyaan'=>'Lampu Indikator Power Logic','satuan'=>'Run / Err', 'select' => ['Run', 'Err']],
            ['pertanyaan'=>'lampu indikator Switch Hub','satuan'=>'Run / Err', 'select' => ['Run', 'Err']],
            ['pertanyaan'=>'lampu indikator Remote IO 1','satuan'=>'Run / Err', 'select' => ['Run', 'Err']],
            ['pertanyaan'=>'lampu indikator Remote IO 2','satuan'=>'Run / Err', 'select' => ['Run', 'Err']],
            ['pertanyaan'=>'Tegangan Kontrol','satuan'=>'Vdc'],
            ['pertanyaan'=>'Exhaust Fan','satuan'=>'On / Off', 'select' => ['On', 'Off']],
            ['pertanyaan'=>'Lampu Penerangan panel','satuan'=>'Normal / rusak', 'select' => ['Normal', 'Rusak']],
            ['pertanyaan'=>'MCB/Fuse kontrol','satuan'=>'Normal'],
        ];

        $data['control'] = $pertanyaanControl;
        $data['panel'] = $pertanyaanPanel;


        if (!FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'control')->first()) {

            foreach ($pertanyaanControl as $value) {
                $formPs1ControlDeskDuaMingguanBelakang = new FormPs1ControlDeskDuaMingguanBelakang();
                $formPs1ControlDeskDuaMingguanBelakang->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1ControlDeskDuaMingguanBelakang->grup = 'control';
                $formPs1ControlDeskDuaMingguanBelakang->pertanyaan = $value['pertanyaan'];
                $formPs1ControlDeskDuaMingguanBelakang->satuan = $value['satuan'];
                $formPs1ControlDeskDuaMingguanBelakang->form_id = $detailWorkOrderForm->form_id;
                $formPs1ControlDeskDuaMingguanBelakang->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1ControlDeskDuaMingguanBelakang->save();
            }
        }
        $data['formPs1ControlDeskDuaMingguanBelakangControl'] = FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'control')->orderBy('id', 'asc')->get();

        if (!FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'panel')->first()) {

            foreach ($pertanyaanPanel as $value) {
                $formPs1ControlDeskDuaMingguanBelakang = new FormPs1ControlDeskDuaMingguanBelakang();
                $formPs1ControlDeskDuaMingguanBelakang->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1ControlDeskDuaMingguanBelakang->grup = 'panel';
                $formPs1ControlDeskDuaMingguanBelakang->pertanyaan = $value['pertanyaan'];
                $formPs1ControlDeskDuaMingguanBelakang->satuan = $value['satuan'];
                $formPs1ControlDeskDuaMingguanBelakang->form_id = $detailWorkOrderForm->form_id;
                $formPs1ControlDeskDuaMingguanBelakang->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1ControlDeskDuaMingguanBelakang->save();
            }
        }
        $data['formPs1ControlDeskDuaMingguanBelakangPanel'] = FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'panel')->orderBy('id', 'asc')->get();

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
        return view('form.ps1.control-desk.index', $data);
    }

    public function formPs1ControlDeskDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'CHECK LIST HARIAN PERALATAN MPS 1';

        $validatedData = $request->validate([
            'q1.*' => ['nullable'],
            'q2.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
        ]);

        $validatedDataPanel = $request->validate([
            'q1_panel.*' => ['nullable'],
            'q2_panel.*' => ['nullable'],
            'keterangan_panel.*' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataControls = FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'control')->orderBy('id', 'asc')->get();
            foreach ($dataControls as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                // $value->grup = 'ext';
                // $value->cubicle = $validatedDataEXT['cubicle_ext_'][$key] ?? null;
                // $value->keterangan = $validatedDataEXT['keterangan_ext_'][$key] ?? null;
                $value->q1 = $validatedData['q1'][$key] ?? null;
                $value->q2 = $validatedData['q2'][$key] ?? null;
                $value->keterangan = $validatedData['keterangan'][$key] ?? null;
                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $dataPanels = FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)->where('grup', 'panel')->orderBy('id', 'asc')->get();
            foreach ($dataPanels as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                // $value->grup = 'ext';
                // $value->cubicle = $validatedDataEXT['cubicle_ext_'][$key] ?? null;
                // $value->keterangan = $validatedDataEXT['keterangan_ext_'][$key] ?? null;
                $value->q1 = $validatedDataPanel['q1_panel'][$key] ?? null;
                $value->q2 = $validatedDataPanel['q2_panel'][$key] ?? null;
                $value->keterangan = $validatedDataPanel['keterangan_panel'][$key] ?? null;
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

    public function formPs1ControlDeskTahunan(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Check List Control Desk Tahunan PS 1';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $pertanyaan = [
            'Ampere Meter',
            'Watt Meter',
            'Volt Meter',
            'Frequency',
            'D.H.C.',
            'R.P.M.',
            'Oil Pressure',
            'Oil Temperature',
            'Battery Starter',
            'Tangki BBM/Harian',
            'Level Oli Mesin',
            'Level Air Radiator',
        ];

        $data['satuan']=[
            'A',
            '',
            'V',
            'Hz',
            'hrs',
            'rpm',
            'Bar',
            'c',
            'Vdc',
            '',
            '',
            '',
        ];

        if (!FormPs1ControlDeskTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {

            foreach ($pertanyaan as $value) {
                $formPs1ControlDeskTahunan = new FormPs1ControlDeskTahunan();
                $formPs1ControlDeskTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1ControlDeskTahunan->pertanyaan = $value;
                $formPs1ControlDeskTahunan->form_id = $detailWorkOrderForm->form_id;
                $formPs1ControlDeskTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1ControlDeskTahunan->save();
            }
        }
        $data['formPs1ControlDeskTahunan'] = FormPs1ControlDeskTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();

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
        return view('form.ps1.control-desk-tahunan.index', $data);
    }

    public function formPs1ControlDeskTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'q1.*' => ['nullable'],
            'q2.*' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataControls = FormPs1ControlDeskTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            foreach ($dataControls as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->q1 = $validatedData['q1'][$key] ?? null;
                $value->q2 = $validatedData['q2'][$key] ?? null;
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