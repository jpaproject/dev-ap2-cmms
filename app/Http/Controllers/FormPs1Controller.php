<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Helpers\FormPs1;
use App\Helpers\ActivityLog;
use Illuminate\Http\Request;
use App\Models\FormActivityLog;
use App\Models\FormPs1PanelHarian;
use Illuminate\Support\Facades\DB;
use App\Models\DetailWorkOrderForm;
use App\Models\FormPs1GensetHarian;
use App\Models\FormPs1GensetMobile;
use Illuminate\Support\Facades\Auth;
use App\Models\FormPs1PanelMvTahunan;
use App\Models\FormPs1PanelTmTahunan;
use App\Models\FormPs1PanelTrTahunan;
use App\Models\FormPs1TestOnloadGenset;
use App\Models\FormPs1TrafoDuaMingguan;
use App\Models\FormPs1GensetHarianPower;
use App\Models\FormPs1ControlDeskTahunan;
use App\Models\FormPs1PanelTmDuaMingguan;
use App\Models\FormPs1PanelTmEnamBulanan;
use App\Models\FormPs1PanelTrDuaMingguan;
use App\Models\FormPs1PanelTrEnamBulanan;
use App\Models\FormPs1GensetMobileTahunan;
use App\Models\FormPs1GensetStandbyTahunan;
use App\Models\FormPs1PanelTmEnamBulananEr6;
use App\Models\FormPs1PanelTmEnamBulananEr7;
use App\Models\FormPs1PanelTmEr6DuaMingguan;
use App\Models\FormPs1ControlDeskDuaMingguan;
use App\Models\FormPs1PanelTmEnamBulananEr1b;
use App\Models\FormPs1PanelTmEnamBulananEr2a;
use App\Models\FormPs1PanelTmEnamBulananEr2b;
use App\Models\FormPs1PanelTmEr2aDuaMingguan;
use App\Models\FormPs1PanelTmEr2bDuaMingguan;
use App\Models\FormPs1TestOnloadUraianGenset;
use App\Models\FormPs1GensetMobileDuaMingguan;
use App\Models\FormPs1GensetMobileEnamBulanan;
use App\Models\FormPs1GensetMobileTigaBulanan;
use App\Models\FormPs1GensetStandbyEnamBulanan;
use App\Models\FormPs1GensetStandbyTigaBulanan;
use App\Models\GensetStandbyGarduTeknikTahunan;
use Illuminate\Contracts\Support\ValidatedData;
use App\Models\FormPs1TestOnloadParameterGenset;
use App\Models\FormPs1PanelAutomationDuaMingguan;
use App\Models\FormPs1GensetStandbyNo1DuaMingguan;
use App\Models\GensetStandbyGarduTeknikDuaMingguan;
use App\Models\GensetStandbyGarduTeknikEnamBulanan;
use App\Models\GensetStandbyGarduTeknikTigaBulanan;
use App\Models\FormPs1ControlDeskDuaMingguanBelakang;
use App\Models\FormPs1PanelTrAuxDuaMingguan;
use App\Models\FormPs1PanelTrAuxEnamBulanan;
use App\Models\FormPs1PanelTrAuxTahunan;
use App\Models\FormPs1PanelTmEnamBulananPanelSynchronGenset;
use App\Models\UserTechnical;

class FormPs1Controller extends Controller
{
    public function FormPs1TestOnloadGenset(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM TEST ONLOAD GENSET';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['uraianGensets'] = [['name' => 'Beban awal (PLN ONLOAD)'], ['name' => 'Beban Genset (PLN Off / Genset Onload)'], ['name' => 'Beban Akhir (PLN Onload / Recovery)']];
        $data['parameterGensets'] = [['name' => 'TEGANGAN'], ['name' => 'ARUS'], ['name' => 'FREQUENCY'], ['name' => 'BBM'], ['name' => 'JACKET WATER OUTLET TEMP'], ['name' => 'JACKET WATER PRESSURE'], ['name' => 'TURBO BLOWER AIR PRESSURE'], ['name' => 'LOW TEMP. WATER PRESSURE'], ['name' => 'ENGINE OIL TEMPERATURE'], ['name' => 'OIL PRESSURE AFTER FILTER'], ['name' => 'TURBO BLOWER II AIR PRESSURE']];

        //Uraian
        if (!FormPs1TestOnloadUraianGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 3; $i++) {
                $formPs1TestOnloadUraianHarian = new FormPs1TestOnloadUraianGenset();
                $formPs1TestOnloadUraianHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1TestOnloadUraianHarian->form_id = $detailWorkOrderForm->form_id;
                $formPs1TestOnloadUraianHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1TestOnloadUraianHarian->save();
            }
        }
        $data['formPs1TestOnloadUraianHarians'] = FormPs1TestOnloadUraianGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        if (!FormPs1TestOnloadGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs1TestOnloadGenset = new FormPs1TestOnloadGenset();
            $formPs1TestOnloadGenset->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs1TestOnloadGenset->form_id = $detailWorkOrderForm->form_id;
            $formPs1TestOnloadGenset->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs1TestOnloadGenset->save();
        }
        $data['formPs1TestOnloadGenset'] = FormPs1TestOnloadGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        //Parameter
        if (!FormPs1TestOnloadParameterGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 11; $i++) {
                $formPs1TestOnloadParameterGenset = new FormPs1TestOnloadParameterGenset();
                $formPs1TestOnloadParameterGenset->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1TestOnloadParameterGenset->form_id = $detailWorkOrderForm->form_id;
                $formPs1TestOnloadParameterGenset->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1TestOnloadParameterGenset->save();
            }
        }
        $data['formPs1TestOnloadParameterGensets'] = FormPs1TestOnloadParameterGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.power-station-1.test-onload-genset.index', $data);
    }

    public function FormPs1TestOnloadGensetUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tegangan.*' => ['nullable'],
            'arus.*' => ['nullable'],
            'freq.*' => ['nullable'],
            'waktu' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'q1' => ['nullable'],
            'q2' => ['nullable'],
            'q3' => ['nullable'],
            'q4' => ['nullable'],
            'waktu10.*' => ['nullable'],
            'waktu20.*' => ['nullable'],
            'waktu30.*' => ['nullable'],
            'waktu40.*' => ['nullable'],
            'waktu50.*' => ['nullable'],
            'waktu60.*' => ['nullable'],
            'waktu70.*' => ['nullable'],
            'waktu80.*' => ['nullable'],
            'waktu90.*' => ['nullable'],
            'waktu100.*' => ['nullable'],
            'waktu110.*' => ['nullable'],
            'waktu120.*' => ['nullable'],
            'waktuDST.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formPs1TestOnloadUraianGensets = FormPs1TestOnloadUraianGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs1TestOnloadUraianGensets as $key => $formPs1TestOnloadUraianGenset) {
                $formPs1TestOnloadUraianGenset->tegangan = $validatedData['tegangan'][$key];
                $formPs1TestOnloadUraianGenset->arus = $validatedData['arus'][$key];
                $formPs1TestOnloadUraianGenset->freq = $validatedData['freq'][$key];
                $formPs1TestOnloadUraianGenset->waktu = $validatedData['waktu'][$key];
                $formPs1TestOnloadUraianGenset->keterangan = $validatedData['keterangan'][$key];

                $formPs1TestOnloadUraianGenset->save();
            }

            $formPs1TestOnloadGenset = FormPs1TestOnloadGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formPs1TestOnloadGenset->q1 = $validatedData['q1'];
            $formPs1TestOnloadGenset->q2 = $validatedData['q2'];
            $formPs1TestOnloadGenset->q3 = $validatedData['q3'];
            $formPs1TestOnloadGenset->q4 = $validatedData['q4'];
            $formPs1TestOnloadGenset->catatan = $validatedData['catatan'];
            $formPs1TestOnloadGenset->save();

            $formPs1TestOnloadParameterGensets = FormPs1TestOnloadParameterGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs1TestOnloadParameterGensets as $key => $formPs1TestOnloadParameterGenset) {
                $formPs1TestOnloadParameterGenset->waktu10 = $validatedData['waktu10'][$key];
                $formPs1TestOnloadParameterGenset->waktu20 = $validatedData['waktu20'][$key];
                $formPs1TestOnloadParameterGenset->waktu30 = $validatedData['waktu30'][$key];
                $formPs1TestOnloadParameterGenset->waktu40 = $validatedData['waktu40'][$key];
                $formPs1TestOnloadParameterGenset->waktu50 = $validatedData['waktu50'][$key];
                $formPs1TestOnloadParameterGenset->waktu60 = $validatedData['waktu60'][$key];
                $formPs1TestOnloadParameterGenset->waktu70 = $validatedData['waktu70'][$key];
                $formPs1TestOnloadParameterGenset->waktu80 = $validatedData['waktu80'][$key];
                $formPs1TestOnloadParameterGenset->waktu90 = $validatedData['waktu90'][$key];
                $formPs1TestOnloadParameterGenset->waktu100 = $validatedData['waktu100'][$key];
                $formPs1TestOnloadParameterGenset->waktu110 = $validatedData['waktu110'][$key];
                $formPs1TestOnloadParameterGenset->waktu120 = $validatedData['waktu120'][$key];
                $formPs1TestOnloadParameterGenset->waktudst = $validatedData['waktuDST'][$key];
                $formPs1TestOnloadParameterGenset->save();
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

    // form Ps1 Genset Standby Perkins 2000Kva No1 Duamingguan
    public function formPs1GensetStandbyNo1DuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Gs Standby Perkins 2000Kva No 1 - Dua Mingguan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['duaMingguans'] = ['Ampere Meter','Volt Meter','Frequency','Tegangan Batt. Starter','T.BBM harian','Mode Operasi Pompa BBM','Power Factor','Engine Speed','Level air radiator','Level Oli Mesin','eng.Oil Press','eng. Coolant temp','eng.Run Time','Mode operasi water pump','Mode operasi smart battery charger'];
        $data['satuan'] = ['A','V','Hz','Vdc','Liter','Off / Auto / Man','pf','rpm','Min / Med / Max','Min / Med / Max','barr','°c','hours', 'Auto / Man / Off','Auto / Man / Off'];

        if (!FormPs1GensetStandbyNo1DuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['duaMingguans'] as $duaMingguan) {
                $FormPs1GensetStandbyNo1DuaMingguans = new FormPs1GensetStandbyNo1DuaMingguan();
                $FormPs1GensetStandbyNo1DuaMingguans->detail_work_order_form_id = $detailWorkOrderForm->id;
                $FormPs1GensetStandbyNo1DuaMingguans->form_id = $detailWorkOrderForm->form_id;
                $FormPs1GensetStandbyNo1DuaMingguans->work_order_id = $detailWorkOrderForm->work_order_id;
                $FormPs1GensetStandbyNo1DuaMingguans->save();
            }
        }
        $data['formPs1GensetStandbyNo1DuaMingguans'] = FormPs1GensetStandbyNo1DuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.power-station-1.genset-standby-no1-dua-mingguan.index', $data);
    }

    public function formPs1GensetStandbyNo1DuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'gensetq1.*' => ['nullable'],
            'gensetq2.*' => ['nullable'],
            'satuan.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formPs1GensetStandbyNo1DuaMingguans = FormPs1GensetStandbyNo1DuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs1GensetStandbyNo1DuaMingguans as $key => $formPs1GensetStandbyNo1DuaMingguan) {
                $formPs1GensetStandbyNo1DuaMingguan->q1 = $validatedData['gensetq1'][$key];
                $formPs1GensetStandbyNo1DuaMingguan->q2 = $validatedData['gensetq2'][$key];
                $formPs1GensetStandbyNo1DuaMingguan->q3 = $validatedData['satuan'][$key];
                $formPs1GensetStandbyNo1DuaMingguan->q4 = $validatedData['keterangan'][$key];
                $formPs1GensetStandbyNo1DuaMingguan->catatan = $validatedData['catatan'];
                $formPs1GensetStandbyNo1DuaMingguan->save();
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

    public function formPs1GensetStandbyTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Gs Standby Perkins 2000Kva No 1 & No 2 - Tiga Bulanan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['tigaBulanans'] = [
            ['dataTeknis' => 'Ampere Meter', 'satuan' => 'A'],
            ['dataTeknis' => 'Volt Meter', 'satuan' => 'V'],
            ['dataTeknis' => 'Frequency', 'satuan' => 'Hz'],
            ['dataTeknis' => 'Power Factor', 'satuan' => 'pf'],
            ['dataTeknis' => 'Tegangan Batt. Starter', 'satuan' => 'Vdc'],
            ['dataTeknis' => 'Mode operasi Batt. Charger', 'satuan' => 'Auto / Man / off'],
            ['dataTeknis' => 'Batt. Analyser', 'satuan' => 'Normal / Exhaust'],
            ['dataTeknis' => 'T.BBM harian', 'satuan' => 'Liter'],
            ['dataTeknis' => 'Mode Operasi Pompa', 'satuan' => 'Auto / Man / off'],
            ['dataTeknis' => 'Mode Operasi Genset (power wizard)', 'satuan' => 'Auto / Man / off'],
            ['dataTeknis' => 'Air Shut Off Valve', 'satuan' => 'Open / Close'],
            ['dataTeknis' => 'Kran BBM Input', 'satuan' => 'Open / Close'],
            ['dataTeknis' => 'Kran drain Oli', 'satuan' => 'Open / Close'],
            ['dataTeknis' => 'Kran drain Air', 'satuan' => 'Open / Close'],
            ['dataTeknis' => 'Posisi CB Panel PG', 'satuan' => 'Open / Close'],
            ['dataTeknis' => 'Enggine Speed', 'satuan' => 'rpm'],
            ['dataTeknis' => 'Level air radiator', 'satuan' => 'Low/ Medium/ max'],
            ['dataTeknis' => 'Level Oli Mesin', 'satuan' => 'Low/ Medium/ max'],
            ['dataTeknis' => 'engg.Oil Press.', 'satuan' => 'barr'],
            ['dataTeknis' => 'engg. Coolant temp', 'satuan' => '°c'],
            ['dataTeknis' => 'engg.Run Time', 'satuan' => 'hours'],
            ['dataTeknis' => 'engg.Inlet temp', 'satuan' => '°c'],
            ['dataTeknis' => 'Posisi Pintu Ruang Genset', 'satuan' => 'Tertutup / Terkunci'],
        ];

        if (!FormPs1GensetStandbyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['tigaBulanans'] as $tigaBulanan) {
                $formPs1GensetStandbyTigaBulanans = new FormPs1GensetStandbyTigaBulanan();
                $formPs1GensetStandbyTigaBulanans->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1GensetStandbyTigaBulanans->form_id = $detailWorkOrderForm->form_id;
                $formPs1GensetStandbyTigaBulanans->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1GensetStandbyTigaBulanans->save();
            }
        }
        $data['formPs1GensetStandbyTigaBulanans'] = FormPs1GensetStandbyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.power-station-1.genset-standby-tiga-bulanan.index', $data);
    }

    public function formPs1GensetStandbyTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'gensetq1.*' => ['nullable'],
            'gensetq2.*' => ['nullable'],
            'satuan.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $FormPs1GensetStandbyTigaBulanan = FormPs1GensetStandbyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($FormPs1GensetStandbyTigaBulanan as $key => $FormPs1GensetStandbyTigaBulanan) {
                $FormPs1GensetStandbyTigaBulanan->q1 = $validatedData['gensetq1'][$key];
                $FormPs1GensetStandbyTigaBulanan->q2 = $validatedData['gensetq2'][$key];
                $FormPs1GensetStandbyTigaBulanan->q3 = $validatedData['satuan'][$key];
                $FormPs1GensetStandbyTigaBulanan->q4 = $validatedData['keterangan'][$key];
                $FormPs1GensetStandbyTigaBulanan->catatan = $validatedData['catatan'];
                $FormPs1GensetStandbyTigaBulanan->save();
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

    // Data teknis perawatan 2 Mingguan - Panel TR, Panel SDP dan Lighting Ged.PS1 New
    public function formPs1PanelTRDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'WORK ORDER PANEL TR 2 Mingguan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['forms'] = FormPs1::formPs1PanelTRDuaMingguan();
        if ($detailWorkOrderForm->formPs1PanelTrDuaMingguans->isEmpty()) {
            try {
                DB::beginTransaction();
                foreach ($data['forms']->panelNp0s as $value) {
                    $formPs1PanelTrDuaMingguanNP0 = new FormPs1PanelTrDuaMingguan();
                    $formPs1PanelTrDuaMingguanNP0->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs1PanelTrDuaMingguanNP0->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrDuaMingguanNP0->tipe = 'np0';
                    $formPs1PanelTrDuaMingguanNP0->pertanyaan = $value['pertanyaan'];
                    if(is_array($value['satuan'])){
                        $formPs1PanelTrDuaMingguanNP0->satuan = implode('/', $value['satuan']);
                    } else {
                        $formPs1PanelTrDuaMingguanNP0->satuan = $value['satuan'];
                    }
                    $formPs1PanelTrDuaMingguanNP0->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrDuaMingguanNP0->work_order_id = $detailWorkOrderForm->work_order_id;
                    
                    $formPs1PanelTrDuaMingguanNP0->save();
                }

                foreach ($data['forms']->panelT0s as $value) {
                    $formPs1PanelTrDuaMingguant0 = new FormPs1PanelTrDuaMingguan();
                    $formPs1PanelTrDuaMingguant0->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs1PanelTrDuaMingguant0->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrDuaMingguant0->tipe = 't0';
                    $formPs1PanelTrDuaMingguant0->pertanyaan = $value['pertanyaan'];
                    if(is_array($value['satuan'])){
                        $formPs1PanelTrDuaMingguant0->satuan = implode('/', $value['satuan']);
                    } else {
                        $formPs1PanelTrDuaMingguant0->satuan = $value['satuan'];
                    }
                    $formPs1PanelTrDuaMingguant0->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrDuaMingguant0->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs1PanelTrDuaMingguant0->save();
                }
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
            }
        }

        $formPs1PanelTrDuaMingguans = $detailWorkOrderForm->formPs1PanelTrDuaMingguans;
        $data['formPs1PanelTrDuaMingguanNp0s'] = $formPs1PanelTrDuaMingguans
            ->filter(function ($formPs1PanelTrDuaMingguan) {
                return $formPs1PanelTrDuaMingguan->tipe == 'np0';
            })->values();
            
        $data['formPs1PanelTrDuaMingguanT0s'] = $formPs1PanelTrDuaMingguans
            ->filter(function ($formPs1PanelTrDuaMingguan) {
                return $formPs1PanelTrDuaMingguan->tipe == 't0';
            })->values();

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
        return view('form.ps1.panel-tr-dua-mingguan.index', $data);
    }

    public function formPs1PanelTRDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {   
        $validatedDataNP0 = $request->validate([
            'panel_np0_q1.*' => ['nullable'],
            'panel_np0_q2.*' => ['nullable'],
            'panel_np0_q3.*' => ['nullable'],
            'panel_np0_keterangan.*' => ['nullable'],
        ]);

        $validatedDataT0 = $request->validate([
            'panel_t0_q1.*' => ['nullable'],
            'panel_t0_q2.*' => ['nullable'],
            'panel_t0_q3.*' => ['nullable'],
            'panel_t0_keterangan.*' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $panelNP0s = FormPs1PanelTrDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('tipe', 'np0')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($panelNP0s as $key => $panelNP0) {
                $panelNP0->form_id = $detailWorkOrderForm->form_id;
                $panelNP0->q1 = $validatedDataNP0['panel_np0_q1'][$key] ?? null;
                $panelNP0->q2 = $validatedDataNP0['panel_np0_q2'][$key] ?? null;
                $panelNP0->q3 = $validatedDataNP0['panel_np0_q3'][$key] ?? null;
                $panelNP0->keterangan = $validatedDataNP0['panel_np0_keterangan'][$key] ?? null;
                $panelNP0->save();
            }

            $panelT0s = FormPs1PanelTrDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('tipe', 't0')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($panelT0s as $key => $panelT0) {
                $panelT0->form_id = $detailWorkOrderForm->form_id;
                $panelT0->q1 = $validatedDataT0['panel_t0_q1'][$key] ?? null;
                $panelT0->q2 = $validatedDataT0['panel_t0_q2'][$key] ?? null;
                $panelT0->q3 = $validatedDataT0['panel_t0_q3'][$key] ?? null;
                $panelT0->keterangan = $validatedDataT0['panel_t0_keterangan'][$key] ?? null;
                $panelT0->save();
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

    // Data teknis perawatan 6 Bulanan - Panel TR Ged.PS1 New
    public function formPs1PanelTREnamBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'WORK ORDER PANEL TR 6 Bulanan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['columns'] = [
            ['title' => 'R', 'name' => 'q1'],
            ['title' => 'S', 'name' => 'q2'],
            ['title' => 'T', 'name' => 'q3'],
        ];
        $data['panelNp0s'] = [
            ['pertanyaan' => 'Lampu Indikator', 'satuan' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'Tegangan', 'satuan' => 'Volt'],
            ['pertanyaan' => 'Arus', 'satuan' => 'A'],
            ['pertanyaan' => 'Frekwensi', 'satuan' => 'Hz'],
            ['pertanyaan' => 'Power Factor', 'satuan' => 'pf'],
            ['pertanyaan' => 'Posisi CB incoming', 'satuan' => ['Open', 'Close']],
            ['pertanyaan' => 'Kondisi Power Meter', 'satuan' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'Tegangan Kontrol', 'satuan' => 'VDC']
        ];

        $data['panelT0s'] = [
            ['pertanyaan' => 'Lampu Indikator', 'satuan' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'Tegangan', 'satuan' => 'Volt'],
            ['pertanyaan' => 'Arus', 'satuan' => 'A'],
            ['pertanyaan' => 'Frekwensi', 'satuan' => 'Hz'],
            ['pertanyaan' => 'Power Factor', 'satuan' => 'pf'],
            ['pertanyaan' => 'Posisi CB Incoming A', 'satuan' => ['Open', 'Close']],
            ['pertanyaan' => 'Posisi CB Incoming B', 'satuan' => ['Open', 'Close']],
            ['pertanyaan' => 'Kondisi Power Meter', 'satuan' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'Tegangan Kontrol', 'satuan' => 'VDC'],
            ['pertanyaan' => 'MCB/Fuse kontrol', 'satuan' => ['Normal', 'Abnormal']]
        ];
        if ($detailWorkOrderForm->formPs1PanelTrEnamBulanans->isEmpty()) {
            try {
                DB::beginTransaction();
                foreach ($data['panelNp0s'] as $value) {
                    $formPs1PanelTrEnamBulananNp0 = new FormPs1PanelTrEnamBulanan();
                    $formPs1PanelTrEnamBulananNp0->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs1PanelTrEnamBulananNp0->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrEnamBulananNp0->tipe = 'np0';
                    $formPs1PanelTrEnamBulananNp0->pertanyaan = $value['pertanyaan'];
                    if(is_array($value['satuan'])){
                        $formPs1PanelTrEnamBulananNp0->satuan = implode('/', $value['satuan']);
                    } else {
                        $formPs1PanelTrEnamBulananNp0->satuan = $value['satuan'];
                    }
                    $formPs1PanelTrEnamBulananNp0->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrEnamBulananNp0->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs1PanelTrEnamBulananNp0->save();
                }

                foreach ($data['panelT0s'] as $value) {
                    $formPs1PanelTrEnamBulananT0 = new FormPs1PanelTrEnamBulanan();
                    $formPs1PanelTrEnamBulananT0->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs1PanelTrEnamBulananT0->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrEnamBulananT0->tipe = 't0';
                    $formPs1PanelTrEnamBulananT0->pertanyaan = $value['pertanyaan'];
                    if(is_array($value['satuan'])){
                        $formPs1PanelTrEnamBulananT0->satuan = implode('/', $value['satuan']);
                    } else {
                        $formPs1PanelTrEnamBulananT0->satuan = $value['satuan'];
                    }
                    $formPs1PanelTrEnamBulananT0->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrEnamBulananT0->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs1PanelTrEnamBulananT0->save();
                }
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
            }
        }
        
        $formPs1PanelTrEnamBulanans = $detailWorkOrderForm->formPs1PanelTrEnamBulanans;
        $data['formPs1PanelTrEnamBulananNp0s'] = $formPs1PanelTrEnamBulanans
        ->filter(function ($formPs1PanelTrEnamBulanan) {
            return $formPs1PanelTrEnamBulanan->tipe == 'np0';
        })->values();
        $data['formPs1PanelTrEnamBulananT0s'] = $formPs1PanelTrEnamBulanans
            ->filter(function ($formPs1PanelTrEnamBulanan) {
                return $formPs1PanelTrEnamBulanan->tipe == 't0';
            })->values();

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
        return view('form.ps1.panel-tr-enam-bulanan.index', $data);
    }

    public function formPs1PanelTREnamBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataNp0 = $request->validate([
            'panel_np0_q1.*' => ['nullable'],
            'panel_np0_q2.*' => ['nullable'],
            'panel_np0_q3.*' => ['nullable'],
            'panel_np0_q3.*' => ['nullable'],
            'panel_np0_q4.*' => ['nullable'],
            'panel_np0_keterangan.*' => ['nullable']
        ]);

        $validatedDataTO = $request->validate([
            'panel_t0_q1.*' => ['nullable'],
            'panel_t0_q2.*' => ['nullable'],
            'panel_t0_q3.*' => ['nullable'],
            'panel_t0_q3.*' => ['nullable'],
            'panel_t0_q4.*' => ['nullable'],
            'panel_t0_keterangan.*' => ['nullable']
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs1PanelTrEnamBulanans = $detailWorkOrderForm->formPs1PanelTrEnamBulanans;

            $panelNp0 = $formPs1PanelTrEnamBulanans
            ->filter(function ($formPs1PanelTrEnamBulanan) {
                return $formPs1PanelTrEnamBulanan->tipe == 'np0';
            })->values();

            $panelT0 = $formPs1PanelTrEnamBulanans
            ->filter(function ($formPs1PanelTrEnamBulanan) {
                return $formPs1PanelTrEnamBulanan->tipe == 't0';
            })->values();

            foreach ($panelNp0 as $keyNp0 => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->q1 = $validatedDataNp0['panel_np0_q1'][$keyNp0] ?? null;
                $value->q2 = $validatedDataNp0['panel_np0_q2'][$keyNp0] ?? null;
                $value->q3 = $validatedDataNp0['panel_np0_q3'][$keyNp0] ?? null;
                if($keyNp0 > 2){
                    $value->q4 = $validatedDataNp0['panel_np0_q4'][$keyNp0-3] ?? null;
                }
                $value->keterangan = $validatedDataNp0['panel_np0_keterangan'][$keyNp0] ?? null;
                $value->save();
            }
            
            foreach ($panelT0 as $keyT0 => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->q1 = $validatedDataTO['panel_t0_q1'][$keyT0] ?? null;
                $value->q2 = $validatedDataTO['panel_t0_q2'][$keyT0] ?? null;
                $value->q3 = $validatedDataTO['panel_t0_q3'][$keyT0] ?? null;
                if($keyT0 > 2){
                    $value->q4 = $validatedDataTO['panel_t0_q4'][$keyT0-3] ?? null;
                }
                $value->keterangan = $validatedDataTO['panel_t0_keterangan'][$keyT0] ?? null;
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

        // menyimpan FormActivityLog untuk status 'end'
        $formActivityLog = new FormActivityLog();
        $formActivityLog->detail_work_order_form_id = $detailWorkOrderForm->id;
        $formActivityLog->form_id = $detailWorkOrderForm->form_id;
        $formActivityLog->work_order_id = $detailWorkOrderForm->work_order_id;
        $formActivityLog->status = 'end';
        $formActivityLog->user_technical_id = Auth::user()->id;
        $formActivityLog->time_record = now();
        $formActivityLog->save();

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

    // Data teknis perawatan Tahunan Panel TR Ged.PS1 New
    public function formPs1PanelTRTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'WORK ORDER PANEL TR Tahunan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['columns'] = [
            ['title' => 'R', 'name' => 'q1'],
            ['title' => 'S', 'name' => 'q2'],
            ['title' => 'T', 'name' => 'q3'],
        ];
        $data['panelNp0s'] = [
            ['pertanyaan' => 'Lampu Indikator', 'satuan' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'Tegangan', 'satuan' => 'Volt'],
            ['pertanyaan' => 'Arus', 'satuan' => 'A'],
            ['pertanyaan' => 'Frekwensi', 'satuan' => 'Hz'],
            ['pertanyaan' => 'Power Factor', 'satuan' => 'pf'],
            ['pertanyaan' => 'Posisi CB incoming', 'satuan' => ['Open', 'Close']],
            ['pertanyaan' => 'Kondisi Power Meter', 'satuan' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'Tegangan Kontrol', 'satuan' => 'VDC'],
            ['pertanyaan' => 'MCB/Fuse kontrol', 'satuan' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'Sett.CB Incoming 1', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Incoming 2', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 1', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 2', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 3', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 4', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 5', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 6', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 7', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 8', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 9', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 10', 'satuan' => 'Imax']
        ];

        $data['panelT0s'] = [
            ['pertanyaan' => 'Lampu Indikator', 'satuan' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'Tegangan', 'satuan' => 'Volt'],
            ['pertanyaan' => 'Arus', 'satuan' => 'A'],
            ['pertanyaan' => 'Frekwensi', 'satuan' => 'Hz'],
            ['pertanyaan' => 'Power Factor', 'satuan' => 'pf'],
            ['pertanyaan' => 'Posisi CB Incoming A', 'satuan' => ['Open', 'Close']],
            ['pertanyaan' => 'Posisi CB Incoming B', 'satuan' => ['Open', 'Close']],
            ['pertanyaan' => 'Kondisi Power Meter', 'satuan' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'Tegangan Kontrol', 'satuan' => 'VDC'],
            ['pertanyaan' => 'MCB/Fuse kontrol', 'satuan' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'Sett.CB Incoming 1', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Incoming 2', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB coupler', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 1', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 2', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 3', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 4', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 5', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 6', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 7', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 8', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 9', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 10', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 11', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 12', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 13', 'satuan' => 'Imax'],
            ['pertanyaan' => 'Sett.CB Outgoing 14', 'satuan' => 'Imax']
        ];

        if ($detailWorkOrderForm->formPs1PanelTrTahunans->isEmpty()) {
            try {
                DB::beginTransaction();
                foreach ($data['panelNp0s'] as $value) {
                    $formPs1PanelTrTahunanNp0 = new FormPs1PanelTrTahunan();
                    $formPs1PanelTrTahunanNp0->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs1PanelTrTahunanNp0->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrTahunanNp0->tipe = 'np0';
                    $formPs1PanelTrTahunanNp0->pertanyaan = $value['pertanyaan'];
                    if(is_array($value['satuan'])){
                        $formPs1PanelTrTahunanNp0->satuan = implode('/', $value['satuan']);
                    } else {
                        $formPs1PanelTrTahunanNp0->satuan = $value['satuan'];
                    }
                    $formPs1PanelTrTahunanNp0->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrTahunanNp0->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs1PanelTrTahunanNp0->save();
                }

                foreach ($data['panelT0s'] as $value) {
                    $formPs1PanelTrTahunanT0 = new FormPs1PanelTrTahunan();
                    $formPs1PanelTrTahunanT0->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs1PanelTrTahunanT0->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrTahunanT0->tipe = 't0';
                    $formPs1PanelTrTahunanT0->pertanyaan = $value['pertanyaan'];
                    if(is_array($value['satuan'])){
                        $formPs1PanelTrTahunanT0->satuan = implode('/', $value['satuan']);
                    } else {
                        $formPs1PanelTrTahunanT0->satuan = $value['satuan'];
                    }
                    $formPs1PanelTrTahunanT0->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrTahunanT0->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs1PanelTrTahunanT0->save();
                }
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
            }
        }
        
        $formPs1PanelTrTahunans = $detailWorkOrderForm->formPs1PanelTrTahunans;
        $data['formPs1PanelTrTahunanNp0s'] = $formPs1PanelTrTahunans
        ->filter(function ($formPs1PanelTrTahunan) {
            return $formPs1PanelTrTahunan->tipe == 'np0';
        })->values();
        $data['formPs1PanelTrTahunanT0s'] = $formPs1PanelTrTahunans
            ->filter(function ($formPs1PanelTrTahunan) {
                return $formPs1PanelTrTahunan->tipe == 't0';
            })->values();

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
        return view('form.ps1.panel-tr-tahunan.index', $data);
    }

    public function formPs1PanelTRTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataNp0 = $request->validate([
            'panel_np0_q1.*' => ['nullable'],
            'panel_np0_q2.*' => ['nullable'],
            'panel_np0_q3.*' => ['nullable'],
            'panel_np0_q3.*' => ['nullable'],
            'panel_np0_q4.*' => ['nullable'],
            'panel_np0_keterangan.*' => ['nullable']
        ]);

        $validatedDataTO = $request->validate([
            'panel_t0_q1.*' => ['nullable'],
            'panel_t0_q2.*' => ['nullable'],
            'panel_t0_q3.*' => ['nullable'],
            'panel_t0_q3.*' => ['nullable'],
            'panel_t0_q4.*' => ['nullable'],
            'panel_t0_keterangan.*' => ['nullable']
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs1PanelTrTahunans = $detailWorkOrderForm->formPs1PanelTrTahunans;

            $panelNp0 = $formPs1PanelTrTahunans
            ->filter(function ($formPs1PanelTrTahunan) {
                return $formPs1PanelTrTahunan->tipe == 'np0';
            })->values();

            $panelT0 = $formPs1PanelTrTahunans
            ->filter(function ($formPs1PanelTrTahunan) {
                return $formPs1PanelTrTahunan->tipe == 't0';
            })->values();

            foreach ($panelNp0 as $keyNp0 => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->q1 = $validatedDataNp0['panel_np0_q1'][$keyNp0] ?? null;
                $value->q2 = $validatedDataNp0['panel_np0_q2'][$keyNp0] ?? null;
                $value->q3 = $validatedDataNp0['panel_np0_q3'][$keyNp0] ?? null;
                if($keyNp0 > 2){
                    $value->q4 = $validatedDataNp0['panel_np0_q4'][$keyNp0-3] ?? null;
                }
                $value->keterangan = $validatedDataNp0['panel_np0_keterangan'][$keyNp0] ?? null;
                $value->save();
            }
            
            foreach ($panelT0 as $keyT0 => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->q1 = $validatedDataTO['panel_t0_q1'][$keyT0] ?? null;
                $value->q2 = $validatedDataTO['panel_t0_q2'][$keyT0] ?? null;
                $value->q3 = $validatedDataTO['panel_t0_q3'][$keyT0] ?? null;
                if($keyT0 > 2){
                    $value->q4 = $validatedDataTO['panel_t0_q4'][$keyT0-3] ?? null;
                }
                $value->keterangan = $validatedDataTO['panel_t0_keterangan'][$keyT0] ?? null;
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

        // menyimpan FormActivityLog untuk status 'end'
        $formActivityLog = new FormActivityLog();
        $formActivityLog->detail_work_order_form_id = $detailWorkOrderForm->id;
        $formActivityLog->form_id = $detailWorkOrderForm->form_id;
        $formActivityLog->work_order_id = $detailWorkOrderForm->work_order_id;
        $formActivityLog->status = 'end';
        $formActivityLog->user_technical_id = Auth::user()->id;
        $formActivityLog->time_record = now();
        $formActivityLog->save();

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

    // Data teknis perawatan 2 Mingguan - Panel TR, Panel SDP dan Lighting Ged.PS1 New
    public function formPs1PanelTrAuxDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'WORK ORDER PANEL TR Aux A Aux B 2 Mingguan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['forms'] = FormPs1::formPs1PanelTrAuxDuaMingguan();
        if ($detailWorkOrderForm->formPs1PanelTrAuxDuaMingguans->isEmpty()) {
            try {
                DB::beginTransaction();
                foreach ($data['forms']->panelADanBs as $value) {
                    $formPs1PanelTrAuxDuaMingguanPanelADanB = new FormPs1PanelTrAuxDuaMingguan();
                    $formPs1PanelTrAuxDuaMingguanPanelADanB->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs1PanelTrAuxDuaMingguanPanelADanB->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrAuxDuaMingguanPanelADanB->tipe = 'panelADanB';
                    $formPs1PanelTrAuxDuaMingguanPanelADanB->pertanyaan = $value['pertanyaan'];
                    if(is_array($value['satuan'])){
                        $formPs1PanelTrAuxDuaMingguanPanelADanB->satuan = implode('/', $value['satuan']);
                    } else {
                        $formPs1PanelTrAuxDuaMingguanPanelADanB->satuan = $value['satuan'];
                    }
                    $formPs1PanelTrAuxDuaMingguanPanelADanB->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrAuxDuaMingguanPanelADanB->work_order_id = $detailWorkOrderForm->work_order_id;
                    
                    $formPs1PanelTrAuxDuaMingguanPanelADanB->save();
                }

                foreach ($data['forms']->panelSdps as $value) {
                    $formPs1PanelTrAuxDuaMingguanSdp = new FormPs1PanelTrAuxDuaMingguan();
                    $formPs1PanelTrAuxDuaMingguanSdp->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs1PanelTrAuxDuaMingguanSdp->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrAuxDuaMingguanSdp->tipe = 'panelSdp';
                    $formPs1PanelTrAuxDuaMingguanSdp->pertanyaan = $value['pertanyaan'];
                    if(is_array($value['satuan'])){
                        $formPs1PanelTrAuxDuaMingguanSdp->satuan = implode('/', $value['satuan']);
                    } else {
                        $formPs1PanelTrAuxDuaMingguanSdp->satuan = $value['satuan'];
                    }
                    $formPs1PanelTrAuxDuaMingguanSdp->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrAuxDuaMingguanSdp->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs1PanelTrAuxDuaMingguanSdp->save();
                }
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
            }
        }

        $formPs1PanelTrAuxDuaMingguans = $detailWorkOrderForm->formPs1PanelTrAuxDuaMingguans;
        $data['formPs1PanelTrAuxDuaMingguanPanelADanBs'] = $formPs1PanelTrAuxDuaMingguans
            ->filter(function ($formPs1PanelTrAuxDuaMingguan) {
                return $formPs1PanelTrAuxDuaMingguan->tipe == 'panelADanB';
            })->values();
            
        $data['formPs1PanelTrAuxDuaMingguanPanelSdps'] = $formPs1PanelTrAuxDuaMingguans
            ->filter(function ($formPs1PanelTrAuxDuaMingguan) {
                return $formPs1PanelTrAuxDuaMingguan->tipe == 'panelSdp';
            })->values();

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
        return view('form.ps1.panel-tr-aux-dua-mingguan.index', $data);
    }

    public function formPs1PanelTrAuxDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataPanelADanB = $request->validate([
            'panel_a_dan_b_q1.*' => ['nullable'],
            'panel_a_dan_b_q2.*' => ['nullable'],
            'panel_a_dan_b_q3.*' => ['nullable'],
            'panel_a_dan_b_keterangan.*' => ['nullable'],
        ]);

        $validatedDataPanelSdp = $request->validate([
            'panel_sdp_q4.*' => ['nullable'],
            'panel_sdp_q5.*' => ['nullable'],
            'panel_sdp_q6.*' => ['nullable'],
            'panel_sdp_q7.*' => ['nullable'],
            'panel_sdp_keterangan.*' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $panelADanBs = FormPs1PanelTrAuxDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('tipe', 'panelADanB')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($panelADanBs as $key => $panelADanB) {
                $panelADanB->form_id = $detailWorkOrderForm->form_id;
                $panelADanB->q1 = $validatedDataPanelADanB['panel_a_dan_b_q1'][$key] ?? null;
                $panelADanB->q2 = $validatedDataPanelADanB['panel_a_dan_b_q2'][$key] ?? null;
                $panelADanB->q3 = $validatedDataPanelADanB['panel_a_dan_b_q3'][$key] ?? null;
                $panelADanB->keterangan = $validatedDataPanelADanB['panel_a_dan_b_keterangan'][$key] ?? null;
                $panelADanB->save();
            }

            $panelSdps = FormPs1PanelTrAuxDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('tipe', 'panelSdp')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($panelSdps as $key => $panelSdp) {
                $panelSdp->form_id = $detailWorkOrderForm->form_id;
                $panelSdp->q4 = $validatedDataPanelSdp['panel_sdp_q4'][$key] ?? null;
                $panelSdp->q5 = $validatedDataPanelSdp['panel_sdp_q5'][$key] ?? null;
                $panelSdp->q6 = $validatedDataPanelSdp['panel_sdp_q6'][$key] ?? null;
                $panelSdp->q7 = $validatedDataPanelSdp['panel_sdp_q7'][$key] ?? null;
                $panelSdp->keterangan = $validatedDataPanelSdp['panel_sdp_keterangan'][$key] ?? null;
                $panelSdp->save();
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

    // Data teknis perawatan 6 Bulanan - Panel TR Ged.PS1 New
    public function formPs1PanelTrAuxEnamBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'WORK ORDER PANEL TR Aux A Aux B 6 Bulanan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['forms'] = FormPs1::formPs1PanelTrAuxEnamBulanan();
        if ($detailWorkOrderForm->formPs1PanelTrAuxEnamBulanans->isEmpty()) {
            try {
                DB::beginTransaction();
                foreach ($data['forms']->panelADanBs as $value) {
                    $formPs1PanelTrAuxEnamBulananPanelADanB = new FormPs1PanelTrAuxEnamBulanan();
                    $formPs1PanelTrAuxEnamBulananPanelADanB->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs1PanelTrAuxEnamBulananPanelADanB->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrAuxEnamBulananPanelADanB->tipe = 'panelADanB';
                    $formPs1PanelTrAuxEnamBulananPanelADanB->pertanyaan = $value['pertanyaan'];
                    if(is_array($value['satuan'])){
                        $formPs1PanelTrAuxEnamBulananPanelADanB->satuan = implode('/', $value['satuan']);
                    } else {
                        $formPs1PanelTrAuxEnamBulananPanelADanB->satuan = $value['satuan'];
                    }
                    $formPs1PanelTrAuxEnamBulananPanelADanB->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrAuxEnamBulananPanelADanB->work_order_id = $detailWorkOrderForm->work_order_id;
                    
                    $formPs1PanelTrAuxEnamBulananPanelADanB->save();
                }

                foreach ($data['forms']->panelSdps as $value) {
                    $formPs1PanelTrAuxEnamBulananSdp = new FormPs1PanelTrAuxEnamBulanan();
                    $formPs1PanelTrAuxEnamBulananSdp->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs1PanelTrAuxEnamBulananSdp->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrAuxEnamBulananSdp->tipe = 'panelSdp';
                    $formPs1PanelTrAuxEnamBulananSdp->pertanyaan = $value['pertanyaan'];
                    if(is_array($value['satuan'])){
                        $formPs1PanelTrAuxEnamBulananSdp->satuan = implode('/', $value['satuan']);
                    } else {
                        $formPs1PanelTrAuxEnamBulananSdp->satuan = $value['satuan'];
                    }
                    $formPs1PanelTrAuxEnamBulananSdp->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrAuxEnamBulananSdp->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs1PanelTrAuxEnamBulananSdp->save();
                }
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
            }
        }

        $formPs1PanelTrAuxEnamBulanans = $detailWorkOrderForm->formPs1PanelTrAuxEnamBulanans;
        $data['formPs1PanelTrAuxEnamBulananPanelADanBs'] = $formPs1PanelTrAuxEnamBulanans
            ->filter(function ($formPs1PanelTrAuxEnamBulanan) {
                return $formPs1PanelTrAuxEnamBulanan->tipe == 'panelADanB';
            })->values();
            
        $data['formPs1PanelTrAuxEnamBulananPanelSdps'] = $formPs1PanelTrAuxEnamBulanans
            ->filter(function ($formPs1PanelTrAuxEnamBulanan) {
                return $formPs1PanelTrAuxEnamBulanan->tipe == 'panelSdp';
            })->values();

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
        return view('form.ps1.panel-tr-aux-enam-bulanan.index', $data);
    }

    public function formPs1PanelTrAuxEnamBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataPanelADanB = $request->validate([
            'panel_a_dan_b_q1.*' => ['nullable'],
            'panel_a_dan_b_q2.*' => ['nullable'],
            'panel_a_dan_b_q3.*' => ['nullable'],
            'panel_a_dan_b_keterangan.*' => ['nullable'],
        ]);

        $validatedDataPanelSdp = $request->validate([
            'panel_sdp_q4.*' => ['nullable'],
            'panel_sdp_q5.*' => ['nullable'],
            'panel_sdp_q6.*' => ['nullable'],
            'panel_sdp_q7.*' => ['nullable'],
            'panel_sdp_keterangan.*' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $panelADanBs = FormPs1PanelTrAuxEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('tipe', 'panelADanB')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($panelADanBs as $key => $panelADanB) {
                $panelADanB->form_id = $detailWorkOrderForm->form_id;
                $panelADanB->q1 = $validatedDataPanelADanB['panel_a_dan_b_q1'][$key] ?? null;
                $panelADanB->q2 = $validatedDataPanelADanB['panel_a_dan_b_q2'][$key] ?? null;
                $panelADanB->q3 = $validatedDataPanelADanB['panel_a_dan_b_q3'][$key] ?? null;
                $panelADanB->keterangan = $validatedDataPanelADanB['panel_a_dan_b_keterangan'][$key] ?? null;
                $panelADanB->save();
            }

            $panelSdps = FormPs1PanelTrAuxEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('tipe', 'panelSdp')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($panelSdps as $key => $panelSdp) {
                $panelSdp->form_id = $detailWorkOrderForm->form_id;
                $panelSdp->q4 = $validatedDataPanelSdp['panel_sdp_q4'][$key] ?? null;
                $panelSdp->q5 = $validatedDataPanelSdp['panel_sdp_q5'][$key] ?? null;
                $panelSdp->q6 = $validatedDataPanelSdp['panel_sdp_q6'][$key] ?? null;
                $panelSdp->q7 = $validatedDataPanelSdp['panel_sdp_q7'][$key] ?? null;
                $panelSdp->keterangan = $validatedDataPanelSdp['panel_sdp_keterangan'][$key] ?? null;
                $panelSdp->save();
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

    // Data teknis perawatan Tahunan - Panel TR Ged.PS1 New
    public function formPs1PanelTrAuxTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'WORK ORDER PANEL TR Aux A Aux B Tahunan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['forms'] = FormPs1::formPs1PanelTrAuxTahunan();
        if ($detailWorkOrderForm->formPs1PanelTrAuxTahunans->isEmpty()) {
            try {
                DB::beginTransaction();
                foreach ($data['forms']->panelADanBs as $value) {
                    $formPs1PanelTrAuxTahunanPanelADanB = new FormPs1PanelTrAuxTahunan();
                    $formPs1PanelTrAuxTahunanPanelADanB->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs1PanelTrAuxTahunanPanelADanB->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrAuxTahunanPanelADanB->tipe = 'panelADanB';
                    $formPs1PanelTrAuxTahunanPanelADanB->pertanyaan = $value['pertanyaan'];
                    if(is_array($value['satuan'])){
                        $formPs1PanelTrAuxTahunanPanelADanB->satuan = implode('/', $value['satuan']);
                    } else {
                        $formPs1PanelTrAuxTahunanPanelADanB->satuan = $value['satuan'];
                    }
                    $formPs1PanelTrAuxTahunanPanelADanB->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrAuxTahunanPanelADanB->work_order_id = $detailWorkOrderForm->work_order_id;
                    
                    $formPs1PanelTrAuxTahunanPanelADanB->save();
                    dd($value);
                }

                foreach ($data['forms']->panelSdps as $value) {
                    $formPs1PanelTrAuxTahunanSdp = new FormPs1PanelTrAuxTahunan();
                    $formPs1PanelTrAuxTahunanSdp->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formPs1PanelTrAuxTahunanSdp->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrAuxTahunanSdp->tipe = 'panelSdp';
                    $formPs1PanelTrAuxTahunanSdp->pertanyaan = $value['pertanyaan'];
                    if(is_array($value['satuan'])){
                        $formPs1PanelTrAuxTahunanSdp->satuan = implode('/', $value['satuan']);
                    } else {
                        $formPs1PanelTrAuxTahunanSdp->satuan = $value['satuan'];
                    }
                    $formPs1PanelTrAuxTahunanSdp->form_id = $detailWorkOrderForm->form_id;
                    $formPs1PanelTrAuxTahunanSdp->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formPs1PanelTrAuxTahunanSdp->save();
                    dd($value);
                }
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
            }
        }

        $formPs1PanelTrAuxTahunans = $detailWorkOrderForm->formPs1PanelTrAuxTahunans;
        $data['formPs1PanelTrAuxTahunanPanelADanBs'] = $formPs1PanelTrAuxTahunans
            ->filter(function ($formPs1PanelTrAuxTahunan) {
                return $formPs1PanelTrAuxTahunan->tipe == 'panelADanB';
            })->values();
            
        $data['formPs1PanelTrAuxTahunanPanelSdps'] = $formPs1PanelTrAuxTahunans
            ->filter(function ($formPs1PanelTrAuxTahunan) {
                return $formPs1PanelTrAuxTahunan->tipe == 'panelSdp';
            })->values();

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
        return view('form.ps1.panel-tr-aux-Tahunan.index', $data);
    }

    public function formPs1PanelTrAuxTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataPanelADanB = $request->validate([
            'panel_a_dan_b_q1.*' => ['nullable'],
            'panel_a_dan_b_q2.*' => ['nullable'],
            'panel_a_dan_b_q3.*' => ['nullable'],
            'panel_a_dan_b_keterangan.*' => ['nullable'],
        ]);

        $validatedDataPanelSdp = $request->validate([
            'panel_sdp_q4.*' => ['nullable'],
            'panel_sdp_q5.*' => ['nullable'],
            'panel_sdp_q6.*' => ['nullable'],
            'panel_sdp_q7.*' => ['nullable'],
            'panel_sdp_keterangan.*' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $panelADanBs = FormPs1PanelTrAuxTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('tipe', 'panelADanB')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($panelADanBs as $key => $panelADanB) {
                $panelADanB->form_id = $detailWorkOrderForm->form_id;
                $panelADanB->q1 = $validatedDataPanelADanB['panel_a_dan_b_q1'][$key] ?? null;
                $panelADanB->q2 = $validatedDataPanelADanB['panel_a_dan_b_q2'][$key] ?? null;
                $panelADanB->q3 = $validatedDataPanelADanB['panel_a_dan_b_q3'][$key] ?? null;
                $panelADanB->keterangan = $validatedDataPanelADanB['panel_a_dan_b_keterangan'][$key] ?? null;
                $panelADanB->save();
            }

            $panelSdps = FormPs1PanelTrAuxTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('tipe', 'panelSdp')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($panelSdps as $key => $panelSdp) {
                $panelSdp->form_id = $detailWorkOrderForm->form_id;
                $panelSdp->q4 = $validatedDataPanelSdp['panel_sdp_q4'][$key] ?? null;
                $panelSdp->q5 = $validatedDataPanelSdp['panel_sdp_q5'][$key] ?? null;
                $panelSdp->q6 = $validatedDataPanelSdp['panel_sdp_q6'][$key] ?? null;
                $panelSdp->q7 = $validatedDataPanelSdp['panel_sdp_q7'][$key] ?? null;
                $panelSdp->keterangan = $validatedDataPanelSdp['panel_sdp_keterangan'][$key] ?? null;
                $panelSdp->save();
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

    // Panel Automation PLC & Panel Marshalling & Charger Gs.Perkins 2x2000 kVA
    public function FormPs1PanelAutomationDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Data teknis perawatan 2 Mingguan Panel Automation PLC & Panel Marshalling & Charger Gs.Perkins 2x2000 kVA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $panelAutomation = [['pertanyaan' => 'Lampu Indikator PLC', 'satuan' => 'Run / Err / Off'], ['pertanyaan' => 'Lampu Indikator Power Logic', 'satuan' => 'Run / Err'], ['pertanyaan' => 'lampu indikator Switch Hub', 'satuan' => 'Run / Err'], ['pertanyaan' => 'lampu indikator Remote IO 1', 'satuan' => 'Run / Err'], ['pertanyaan' => 'lampu indikator Remote IO 2', 'satuan' => 'Run / Err'], ['pertanyaan' => 'Tegangan Kontrol', 'satuan' => 'Vdc'], ['pertanyaan' => 'Exhaust Fan', 'satuan' => 'On / Off'], ['pertanyaan' => 'Lampu Penerangan panel', 'satuan' => 'Normal / Rusak'], ['pertanyaan' => 'MCB/Fuse kontrol', 'satuan' => 'Normal']];

        $panelMarshalling = [['pertanyaan' => 'Lampu Indikator PLC', 'satuan' => 'Run / Err / Off'], ['pertanyaan' => 'Lampu Indikator Power Logic', 'satuan' => 'Run / Err'], ['pertanyaan' => 'lampu indikator Switch Hub', 'satuan' => 'Run / Err'], ['pertanyaan' => 'lampu indikator Remote IO 1', 'satuan' => 'Run / Err'], ['pertanyaan' => 'lampu indikator Remote IO 2', 'satuan' => 'Run / Err'], ['pertanyaan' => 'Tegangan Kontrol', 'satuan' => 'Vdc'], ['pertanyaan' => 'Exhaust Fan', 'satuan' => 'On / Off'], ['pertanyaan' => 'Lampu Penerangan panel', 'satuan' => 'Normal / Rusak'], ['pertanyaan' => 'MCB/Fuse kontrol', 'satuan' => 'Normal']];

        if (
            !FormPs1PanelAutomationDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('tipe', 'Automation')
                ->first()
        ) {
            foreach ($panelAutomation as $value) {
                $formPs1PanelAutomationDuaMingguanAutomation = new FormPs1PanelAutomationDuaMingguan();
                $formPs1PanelAutomationDuaMingguanAutomation->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelAutomationDuaMingguanAutomation->tipe = 'Automation';
                $formPs1PanelAutomationDuaMingguanAutomation->pertanyaan = $value['pertanyaan'];
                $formPs1PanelAutomationDuaMingguanAutomation->satuan = $value['satuan'];
                $formPs1PanelAutomationDuaMingguanAutomation->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelAutomationDuaMingguanAutomation->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelAutomationDuaMingguanAutomation->save();
            }
        }
        $data['formPs1PanelAutomationDuaMingguanAutomations'] = FormPs1PanelAutomationDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('tipe', 'Automation')
            ->orderBy('id', 'asc')
            ->get();

        if (
            !FormPs1PanelAutomationDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('tipe', 'Marshalling')
                ->first()
        ) {
            foreach ($panelMarshalling as $value) {
                $formPs1PanelAutomationDuaMingguanMarshalling = new FormPs1PanelAutomationDuaMingguan();
                $formPs1PanelAutomationDuaMingguanMarshalling->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelAutomationDuaMingguanMarshalling->tipe = 'Marshalling';
                $formPs1PanelAutomationDuaMingguanMarshalling->pertanyaan = $value['pertanyaan'];
                $formPs1PanelAutomationDuaMingguanMarshalling->satuan = $value['satuan'];
                $formPs1PanelAutomationDuaMingguanMarshalling->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelAutomationDuaMingguanMarshalling->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelAutomationDuaMingguanMarshalling->save();
            }
        }
        $data['formPs1PanelAutomationDuaMingguanMarshallings'] = FormPs1PanelAutomationDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('tipe', 'Marshalling')
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
        return view('form.ps1.panel-automation-dua-mingguan.index', $data);
    }

    public function FormPs1PanelAutomationDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataAutomation = $request->validate([
            'q1_automation.*' => ['nullable'],
            'q2_automation.*' => ['nullable'],
            'keterangan_automation.*' => ['nullable'],
        ]);

        $validatedDataMarshalling = $request->validate([
            'q1_marshalling.*' => ['nullable'],
            'q2_marshalling.*' => ['nullable'],
            'keterangan_marshalling.*' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $panelAutomation = FormPs1PanelAutomationDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('tipe', 'Automation')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($panelAutomation as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->q1 = $validatedDataAutomation['q1_automation'][$key] ?? null;
                $value->q2 = $validatedDataAutomation['q2_automation'][$key] ?? null;
                $value->keterangan = $validatedDataAutomation['keterangan_automation'][$key] ?? null;
                $value->save();
            }
            DB::commit();
            DB::beginTransaction();
            $panelMarshalling = FormPs1PanelAutomationDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('tipe', 'Marshalling')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($panelMarshalling as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->q1 = $validatedDataMarshalling['q1_marshalling'][$key] ?? null;
                $value->q2 = $validatedDataMarshalling['q2_marshalling'][$key] ?? null;
                $value->keterangan = $validatedDataMarshalling['keterangan_marshalling'][$key] ?? null;
                $value->save();
            }
            DB::commit();
            DB::beginTransaction();

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

        // menyimpan FormActivityLog untuk status 'end'
        $formActivityLog = new FormActivityLog();
        $formActivityLog->detail_work_order_form_id = $detailWorkOrderForm->id;
        $formActivityLog->form_id = $detailWorkOrderForm->form_id;
        $formActivityLog->work_order_id = $detailWorkOrderForm->work_order_id;
        $formActivityLog->status = 'end';
        $formActivityLog->user_technical_id = Auth::user()->id;
        $formActivityLog->time_record = now();
        $formActivityLog->save();

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

    public function formPs1GensetStandbyEnamBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Gs Standby Perkins 2000Kva No 1 & No 2 - Enam Bulanan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['enamBulanans'] = [
            ['dataTeknis' => 'Ampere Meter', 'satuan' => 'A'],
            ['dataTeknis' => 'Volt Meter', 'satuan' => 'V'],
            ['dataTeknis' => 'Frequency', 'satuan' => 'Hz'],
            ['dataTeknis' => 'Power Factor', 'satuan' => 'pf'],
            ['dataTeknis' => 'Tegangan Batt. Starter', 'satuan' => 'Vdc'],
            ['dataTeknis' => 'Mode operasi Batt. Charger', 'satuan' => 'Auto / Max / off'],
            ['dataTeknis' => 'Batt. Analyser', 'satuan' => 'Normal / Exhaust'],
            ['dataTeknis' => 'T.BBM harian', 'satuan' => 'Liter'],
            ['dataTeknis' => 'Level BBM Pompa Off', 'satuan' => 'Liter'],
            ['dataTeknis' => 'Level BBM Pompa ON', 'satuan' => 'Liter'],
            ['dataTeknis' => 'Mode Operasi Pompa', 'satuan' => 'Auto / Man / off'],
            ['dataTeknis' => 'Mode Operasi Genset (power wizard)', 'satuan' => 'Auto / Man / off'],
            ['dataTeknis' => 'Air Shut Off Valve', 'satuan' => 'Open / Close'],
            ['dataTeknis' => 'Kran BBM Input', 'satuan' => 'Open / Close'],
            ['dataTeknis' => 'Kran drain Oli', 'satuan' => 'Open / Close'],
            ['dataTeknis' => 'Kran drain Air', 'satuan' => 'Open / Close'],
            ['dataTeknis' => 'Posisi CB Panel PG', 'satuan' => 'Open / Close'],
            ['dataTeknis' => 'Enggine Speed', 'satuan' => 'rpm'],
            ['dataTeknis' => 'Level air radiator', 'satuan' => 'Low/ Medium/ max'],
            ['dataTeknis' => 'Level Oli Mesin', 'satuan' => 'Low/ Medium/ max'],
            ['dataTeknis' => 'engg.Oil Press.', 'satuan' => 'barr'],
            ['dataTeknis' => 'engg. Coolant temp', 'satuan' => '°c'],
            ['dataTeknis' => 'engg.Run Time', 'satuan' => 'hours'],
            ['dataTeknis' => 'engg.Inlet temp', 'satuan' => '°c'],
        ];

        if (!FormPs1GensetStandbyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['enamBulanans'] as $enamBulanan) {
                $formPs1GensetStandbyEnamBulanans = new FormPs1GensetStandbyEnamBulanan();
                $formPs1GensetStandbyEnamBulanans->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1GensetStandbyEnamBulanans->form_id = $detailWorkOrderForm->form_id;
                $formPs1GensetStandbyEnamBulanans->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1GensetStandbyEnamBulanans->save();
            }
        }
        $data['formPs1GensetStandbyEnamBulanans'] = FormPs1GensetStandbyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.power-station-1.genset-standby-enam-bulanan.index', $data);
    }

    public function formPs1GensetStandbyEnamBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'gensetq1.*' => ['nullable'],
            'gensetq2.*' => ['nullable'],
            'satuan.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formPs1GensetStandbyEnamBulanans = FormPs1GensetStandbyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs1GensetStandbyEnamBulanans as $key => $formPs1GensetStandbyEnamBulanan) {
                $formPs1GensetStandbyEnamBulanan->q1 = $validatedData['gensetq1'][$key];
                $formPs1GensetStandbyEnamBulanan->q2 = $validatedData['gensetq2'][$key];
                $formPs1GensetStandbyEnamBulanan->q3 = $validatedData['satuan'][$key];
                $formPs1GensetStandbyEnamBulanan->q4 = $validatedData['keterangan'][$key];
                $formPs1GensetStandbyEnamBulanan->catatan = $validatedData['catatan'];
                $formPs1GensetStandbyEnamBulanan->save();
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

    public function formPs1GensetStandbyTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Gs Standby Perkins 2000Kva - Tahunan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['tahunans'] = [
            ['dataTeknis' => 'Ampere Meter', 'satuan' => 'A', 'select' => null],
            ['dataTeknis' => 'Volt Meter', 'satuan' => 'V', 'select' => null],
            ['dataTeknis' => 'Frequency', 'satuan' => 'Hz', 'select' => null],
            ['dataTeknis' => 'Power Factor', 'satuan' => 'pf', 'select' => null],
            ['dataTeknis' => 'tegangan Batt. Starter', 'satuan' => 'Vdc', 'select' => null],
            ['dataTeknis' => 'Mode operasi Batt. Charger', 'satuan' => 'Auto/Man/Off', 'select' => ['Auto', 'Man', 'Off']],
            ['dataTeknis' => 'Batt. Analyser', 'satuan' => 'Normal/Exhaust', 'select' => ['Normal', 'Exhaust']],
            ['dataTeknis' => 'T.BBM harian', 'satuan' => 'Liter', 'select' => null],
            ['dataTeknis' => 'Level BBM Pompa OFF', 'satuan' => 'Liter', 'select' => null],
            ['dataTeknis' => 'Level BBM Pompa ON', 'satuan' => 'Liter', 'select' => null],
            ['dataTeknis' => 'Mode Operasi Pompa', 'satuan' => 'Auto/Man/Off', 'select' => ['Auto', 'Man', 'Off']],
            ['dataTeknis' => 'Mode Operasi Genset (power wizard)', 'satuan' => 'Auto/Man/Off', 'select' => ['Auto', 'Man', 'Off']],
            ['dataTeknis' => 'Air Shut Off Valve', 'satuan' => 'Open/Close', 'select' => ['Open', 'Close']],
            ['dataTeknis' => 'Kran BBM Input', 'satuan' => 'Open/Close', 'select' => ['Open', 'Close']],
            ['dataTeknis' => 'Kran drain Oli', 'satuan' => 'Open/Close', 'select' => ['Open', 'Close']],
            ['dataTeknis' => 'Kran drain Air', 'satuan' => 'Open/Close', 'select' => ['Open', 'Close']],
            ['dataTeknis' => 'Posisi CB Panel PG', 'satuan' => 'Open/Close', 'select' => ['Open', 'Close']],
            ['dataTeknis' => 'Enggine Speed', 'satuan' => 'rpm', 'select' => null],
            ['dataTeknis' => 'Level air radiator', 'satuan' => 'Low/Medium/Max', 'select' => ['Low', 'Medium', 'Max']],
            ['dataTeknis' => 'Level Oli Mesin', 'satuan' => 'Low/Medium/Max', 'select' => ['Low', 'Medium', 'Max']],
            ['dataTeknis' => 'engg.Oil Press.', 'satuan' => 'barr', 'select' => null],
            ['dataTeknis' => 'engg. Coolant temp', 'satuan' => '°c', 'select' => null],
            ['dataTeknis' => 'engg.Run Time', 'satuan' => 'hours', 'select' => null],
            ['dataTeknis' => 'engg.Inlet temp', 'satuan' => '°c', 'select' => null],
        ];

        if (!FormPs1GensetStandbyTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['tahunans'] as $tahunan) {
                $formPs1GensetStandbyTahunan = new FormPs1GensetStandbyTahunan();
                $formPs1GensetStandbyTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1GensetStandbyTahunan->form_id = $detailWorkOrderForm->form_id;
                $formPs1GensetStandbyTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1GensetStandbyTahunan->q1 = $tahunan['dataTeknis'];
                $formPs1GensetStandbyTahunan->q3 = $tahunan['satuan'];
                $formPs1GensetStandbyTahunan->save();
            }
        }
        $data['formPs1GensetStandbyTahunans'] = FormPs1GensetStandbyTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.power-station-1.genset-standby-tahunan.index', $data);
    }

    public function formPs1GensetStandbyTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'gensetq1.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formPs1GensetStandbyTahunans = FormPs1GensetStandbyTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs1GensetStandbyTahunans as $key => $formPs1GensetStandbyTahunan) {
                $formPs1GensetStandbyTahunan->q2 = $validatedData['gensetq1'][$key];
                $formPs1GensetStandbyTahunan->q4 = $validatedData['keterangan'][$key];
                $formPs1GensetStandbyTahunan->catatan = $validatedData['catatan'];
                $formPs1GensetStandbyTahunan->save();
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

    public function formPs1GensetStandbyGarduDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Gs Standby Gardu Teknik Dua Mingguan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['datas'] = [
            ['dataTeknis' => 'Tegangan Batt. Starter', 'satuan' => 'Vdc',], 
            ['dataTeknis' => 'Tegangan Batt. Kontrol', 'satuan' => 'Vdc',], 
            ['dataTeknis' => 'T.BBM genset', 'satuan' => 'Liter',], 
            ['dataTeknis' => 'T.BBM harian', 'satuan' => 'Liter',], 
            ['dataTeknis' => 'Mode Operasi Pompa', 'satuan' => ['Auto', 'Manual', 'Off'],], 
            ['dataTeknis' => 'Ampere Meter', 'satuan' => 'A',], 
            ['dataTeknis' => 'Volt Meter', 'satuan' => 'V',], 
            ['dataTeknis' => 'Frequency', 'satuan' => 'Hz',], 
            ['dataTeknis' => 'Watt Meter', 'satuan' => 'Kw',], 
            ['dataTeknis' => 'Power Factor', 'satuan' => 'pf',], 
            ['dataTeknis' => 'Enggine Speed', 'satuan' => 'rpm',], 
            ['dataTeknis' => 'Level air radiator', 'satuan' => ['Max', 'Med', 'Min'],], 
            ['dataTeknis' => 'Level Oli Mesin', 'satuan' => ['Max', 'Med', 'Min'],], 
            ['dataTeknis' => 'engg.Oil Press.', 'satuan' => 'bar',], 
            ['dataTeknis' => 'engg. Coolant temp', 'satuan' => '°C',], 
            ['dataTeknis' => 'engg.Run Time', 'satuan' => 'hours',], 
            ['dataTeknis' => 'engg.Inlet temp', 'satuan' => '°C',]];
        
        if (!GensetStandbyGarduTeknikDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['datas'] as $result) {
                $gensetStandbyGarduTeknikDuaMingguan = new GensetStandbyGarduTeknikDuaMingguan();
                $gensetStandbyGarduTeknikDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $gensetStandbyGarduTeknikDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $gensetStandbyGarduTeknikDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $gensetStandbyGarduTeknikDuaMingguan->data_teknis = $result['dataTeknis'];
                $gensetStandbyGarduTeknikDuaMingguan->save();
            }
        }
        
        $data['gensetStandbyGarduTeknikDuaMingguans'] = $detailWorkOrderForm->gensetStandbyGarduTeknikDuaMingguans;

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
        return view('form.power-station-1.genset-standby-gardu-teknik-dua-mingguan.index', $data);
    }

    public function formPs1GensetStandbyGarduDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'satuan.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $gensetStandbyGarduTeknikDuaMingguans = GensetStandbyGarduTeknikDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($gensetStandbyGarduTeknikDuaMingguans as $key => $gensetStandbyGarduTeknikDuaMingguan) {
                $gensetStandbyGarduTeknikDuaMingguan->satuan = $validatedData['satuan'][$key];
                $gensetStandbyGarduTeknikDuaMingguan->keterangan = $validatedData['keterangan'][$key];
                $gensetStandbyGarduTeknikDuaMingguan->catatan = $validatedData['catatan'];
                $gensetStandbyGarduTeknikDuaMingguan->save();
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

    public function formPs1TrafoDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Trafo Dua Mingguan - PS1';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['trafoDatas'] = [
            [
                'dataTeknis' => 'Level Oli Trafo',
                'satuan' => 'Max/Med/Low',
                'select' => ['Max', 'Med', 'Low'],
            ],
            [
                'dataTeknis' => 'Pressure Trafo',
                'satuan' => 'Normal',
            ],
            [
                'dataTeknis' => 'Temperature Trafo',
                'satuan' => 'C',
            ],
            [
                'dataTeknis' => 'Terminasi Sekunder Trafo',
                'satuan' => 'Normal',
            ],
            [
                'dataTeknis' => 'Terminasi Primer Trafo',
                'satuan' => 'Normal',
            ],
            [
                'dataTeknis' => 'Kondisi Valve drain Trafo',
                'satuan' => 'Open / Close',
                'select' => ['Open', 'Close'],
            ],
            [
                'dataTeknis' => 'Tap Changer Trafo',
                'satuan' => 'Position',
            ],
            [
                'dataTeknis' => 'Visual Cek sisi Luar Trafo',
                'satuan' => 'Normal',
            ],
        ];
        $data['panelDatas'] = [
            [
                'dataTeknis' => 'Selector Switc',
                'satuan' => 'Lokal /Remote',
                'select' => ['Lokal', 'Remote'],
            ],
            [
                'dataTeknis' => 'Power Mete',
                'satuan' => 'Normal / Error',
                'select' => ['Normal', 'Error'],
            ],
            [
                'dataTeknis' => 'Lampu Indikato',
                'satuan' => 'Normal / Error',
                'select' => ['Normal', 'Error'],
            ],
            [
                'dataTeknis' => 'Posisi CB PP',
                'satuan' => 'Open / Close',
                'select' => ['Open', 'Close'],
            ],
            [
                'dataTeknis' => 'Lampu Penerangan Pane',
                'satuan' => 'Normal / Off',
                'select' => ['Normal', 'Off'],
            ],
            [
                'dataTeknis' => 'MCB Control Smart Charge',
                'satuan' => 'On / Off',
                'select' => ['On', 'Off'],
            ],
            [
                'dataTeknis' => 'Fuse Control Pane',
                'satuan' => 'Normal / error',
                'select' => ['Normal', 'error'],
            ],
        ];

        if (
            !FormPs1TrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'panel')
                ->first()
        ) {
            foreach ($data['panelDatas'] as $result) {
                $TrafoDuaMingguan = new FormPs1TrafoDuaMingguan();
                $TrafoDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $TrafoDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $TrafoDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $TrafoDuaMingguan->grup = 'panel';
                $TrafoDuaMingguan->data_teknis = $result['dataTeknis'];
                $TrafoDuaMingguan->satuan = $result['satuan'];
                $TrafoDuaMingguan->save();
            }
        }
        if (
            !FormPs1TrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'trafo')
                ->first()
        ) {
            foreach ($data['trafoDatas'] as $result) {
                $TrafoDuaMingguan = new FormPs1TrafoDuaMingguan();
                $TrafoDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $TrafoDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $TrafoDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $TrafoDuaMingguan->grup = 'trafo';
                $TrafoDuaMingguan->data_teknis = $result['dataTeknis'];
                $TrafoDuaMingguan->satuan = $result['satuan'];
                $TrafoDuaMingguan->save();
            }
        }
        $data['formPs1TrafoDuaMingguanPanels'] = FormPs1TrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'panel')
            ->orderBy('id', 'asc')
            ->get();

        $data['formPs1TrafoDuaMingguanTrafos'] = FormPs1TrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'trafo')
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
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.ps1.trafo-dua-mingguan.index', $data);
    }

    public function formPs1TrafoDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'q1.*' => ['nullable'],
            'q2.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'q1_panel.*' => ['nullable'],
            'q2_panel.*' => ['nullable'],
            'keterangan_panel.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $TrafoDuaMingguans = FormPs1TrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'trafo')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($TrafoDuaMingguans as $key => $TrafoDuaMingguan) {
                $TrafoDuaMingguan->q1 = $validatedData['q1'][$key];
                $TrafoDuaMingguan->q2 = $validatedData['q2'][$key];
                $TrafoDuaMingguan->keterangan = $validatedData['keterangan'][$key];
                $TrafoDuaMingguan->catatan = $validatedData['catatan'];
                $TrafoDuaMingguan->save();
            }

            $TrafoDuaMingguanPanels = FormPs1TrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'panel')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($TrafoDuaMingguanPanels as $key => $TrafoDuaMingguan) {
                $TrafoDuaMingguan->q1 = $validatedData['q1_panel'][$key];
                $TrafoDuaMingguan->q2 = $validatedData['q2_panel'][$key];
                $TrafoDuaMingguan->keterangan = $validatedData['keterangan_panel'][$key];
                $TrafoDuaMingguan->catatan = $validatedData['catatan'];
                $TrafoDuaMingguan->save();
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

    public function formPs1GensetStandbyGarduTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Gs Standby Gardu Teknik Tiga Bulanan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['datas'] = [
            ['dataTeknis' => 'Tegangan Batt. Starter', 'satuan' => 'Vdc'], 
            ['dataTeknis' => 'Tegangan Batt. Kontrol', 'satuan' => 'Vdc'], 
            ['dataTeknis' => 'T.BBM genset', 'satuan' => 'Liter'], 
            ['dataTeknis' => 'T.BBM harian', 'satuan' => 'Liter'], 
            ['dataTeknis' => 'Level Off Pompa BBM', 'satuan' => 'Liter'], 
            ['dataTeknis' => 'Level On Pompa BBM', 'satuan' => 'Liter'], 
            ['dataTeknis' => 'Mode Operasi Pompa', 'satuan' => ['Off', 'Auto', 'Man']], 
            ['dataTeknis' => 'Ampere Meter', 'satuan' => 'A'], 
            ['dataTeknis' => 'Volt Meter', 'satuan' => 'V'], 
            ['dataTeknis' => 'Frequency', 'satuan' => 'Hz'], 
            ['dataTeknis' => 'Watt Meter', 'satuan' => 'Kw'], 
            ['dataTeknis' => 'Power Factor', 'satuan' => 'pf'], 
            ['dataTeknis' => 'Enggine Speed', 'satuan' => 'rpm'], 
            ['dataTeknis' => 'Level air radiator', 'satuan' => ['Min', 'Med', 'Max']], 
            ['dataTeknis' => 'Level Oli Mesin', 'satuan' => ['Min', 'Med', 'Max']], 
            ['dataTeknis' => 'engg.Oil Press.', 'satuan' => 'bar'], 
            ['dataTeknis' => 'engg. Coolant temp', 'satuan' => '°c'], 
            ['dataTeknis' => 'engg.Run Time', 'satuan' => 'hours'], 
            ['dataTeknis' => 'engg.Inlet temp', 'satuan' => '°c'], 
        ];
        
        if (!GensetStandbyGarduTeknikTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['datas'] as $result) {
                $gensetStandbyGarduTeknikTigaBulanan = new GensetStandbyGarduTeknikTigaBulanan();
                $gensetStandbyGarduTeknikTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $gensetStandbyGarduTeknikTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $gensetStandbyGarduTeknikTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $gensetStandbyGarduTeknikTigaBulanan->data_teknis = $result['dataTeknis'];
                $gensetStandbyGarduTeknikTigaBulanan->save();
            }
        }

        $data['gensetStandbyGarduTeknikTigaBulanans'] = GensetStandbyGarduTeknikTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.power-station-1.genset-standby-gardu-teknik-tiga-bulanan.index', $data);
    }

    public function formPs1GensetStandbyGarduTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'satuan.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $gensetStandbyGarduTeknikTigaBulanans = GensetStandbyGarduTeknikTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($gensetStandbyGarduTeknikTigaBulanans as $key => $gensetStandbyGarduTeknikTigaBulanan) {
                $gensetStandbyGarduTeknikTigaBulanan->satuan = $validatedData['satuan'][$key];
                $gensetStandbyGarduTeknikTigaBulanan->keterangan = $validatedData['keterangan'][$key];
                $gensetStandbyGarduTeknikTigaBulanan->catatan = $validatedData['catatan'];
                $gensetStandbyGarduTeknikTigaBulanan->save();
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

    public function formPs1GensetStandbyGarduEnamBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Gs Standby Gardu Teknik Enam Bulanan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['datas'] = [
            ['dataTeknis' => 'Tegangan Batt. Starter', 'satuan' => 'Vdc'],
            ['dataTeknis' => 'Tegangan Batt. Kontrol', 'satuan' => 'Vdc'],
            ['dataTeknis' => 'T.BBM genset', 'satuan' => 'Liter'],
            ['dataTeknis' => 'T.BBM harian', 'satuan' => 'Liter'],
            ['dataTeknis' => 'T.BBM Ground tank', 'satuan' => 'Liter'],
            ['dataTeknis' => 'Arus Gf pada modul TR (maximal)', 'satuan' => 'A'],
            ['dataTeknis' => 'Ampere Meter', 'satuan' => 'A'],
            ['dataTeknis' => 'Volt Meter', 'satuan' => 'V'],
            ['dataTeknis' => 'Frequency', 'satuan' => 'Hz'],
            ['dataTeknis' => 'Watt Meter', 'satuan' => 'Kw'],
            ['dataTeknis' => 'Power Factor', 'satuan' => 'pf'],
            ['dataTeknis' => 'Enggine Speed', 'satuan' => 'rpm'],
            ['dataTeknis' => 'Level air radiator', 'satuan' => ['Min', 'Med', 'Max']],
            ['dataTeknis' => 'Level Oli Mesin', 'satuan' => ['Min', 'Med', 'Max']],
            ['dataTeknis' => 'engg.Oil Press.', 'satuan' => 'bar'],
            ['dataTeknis' => 'engg. Coolant temp', 'satuan' => '°c'],
            ['dataTeknis' => 'engg.Run Time', 'satuan' => 'hours'],
            ['dataTeknis' => 'engg.Inlet temp', 'satuan' => '°c'],
            ['dataTeknis' => 'signal Gs Standby Auto', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Onload', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Fail to start', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Fail To stop', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs High coolant temp.', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Low Oil Press', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Alternator Voltage fault', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs General alarm', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Blocked', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Available', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Comm Alarm', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Hi Temp shutdown', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Overspeed Shutdown', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Daily tank high alarm', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Daily tank low alarm', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal fuel pump 1 alarm', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal fuel pump 2 alarm', 'satuan' => ['Normal', 'Abnormal']],
        ];

        if (!GensetStandbyGarduTeknikEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['datas'] as $result) {
                $gensetStandbyGarduTeknikEnamBulanan = new GensetStandbyGarduTeknikEnamBulanan();
                $gensetStandbyGarduTeknikEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $gensetStandbyGarduTeknikEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $gensetStandbyGarduTeknikEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $gensetStandbyGarduTeknikEnamBulanan->data_teknis = $result['dataTeknis'];
                $gensetStandbyGarduTeknikEnamBulanan->save();
            }
        }
        
        $data['gensetStandbyGarduTeknikEnamBulanans'] = GensetStandbyGarduTeknikEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.power-station-1.genset-standby-gardu-teknik-enam-bulanan.index', $data);
    }

    public function formPs1GensetStandbyGarduEnamBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'satuan.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $gensetStandbyGarduTeknikEnamBulanans = GensetStandbyGarduTeknikEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($gensetStandbyGarduTeknikEnamBulanans as $key => $gensetStandbyGarduTeknikEnamBulanan) {
                $gensetStandbyGarduTeknikEnamBulanan->satuan = $validatedData['satuan'][$key];
                $gensetStandbyGarduTeknikEnamBulanan->keterangan = $validatedData['keterangan'][$key];
                $gensetStandbyGarduTeknikEnamBulanan->catatan = $validatedData['catatan'];
                $gensetStandbyGarduTeknikEnamBulanan->save();
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

    public function formPs1GensetStandbyGarduTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Gs Standby Gardu Teknik Tahunan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['datas'] = [
            ['dataTeknis' => 'Tegangan Batt. Starter', 'satuan' => 'Vdc'],
            ['dataTeknis' => 'Tegangan Batt. Kontrol', 'satuan' => 'Vdc'],
            ['dataTeknis' => 'T.BBM genset', 'satuan' => 'Liter'],
            ['dataTeknis' => 'T.BBM harian', 'satuan' => 'Liter'],
            ['dataTeknis' => 'T.BBM Ground tank', 'satuan' => 'Liter'],
            ['dataTeknis' => 'Ampere Meter', 'satuan' => 'A'],
            ['dataTeknis' => 'Volt Meter', 'satuan' => 'V'],
            ['dataTeknis' => 'Frequency', 'satuan' => 'Hz'],
            ['dataTeknis' => 'Watt Meter', 'satuan' => 'Kw'],
            ['dataTeknis' => 'Power Factor', 'satuan' => 'pf'],
            ['dataTeknis' => 'Enggine Speed', 'satuan' => 'rpm'],
            ['dataTeknis' => 'Level air radiator', 'satuan' => ['Min', 'Med', 'Max']],
            ['dataTeknis' => 'Level Oli Mesin', 'satuan' => ['Min', 'Med', 'Max']],
            ['dataTeknis' => 'engg.Oil Press.', 'satuan' => 'bar'],
            ['dataTeknis' => 'engg. Coolant temp', 'satuan' => '°c'],
            ['dataTeknis' => 'engg.Run Time', 'satuan' => 'hours'],
            ['dataTeknis' => 'engg.Inlet temp', 'satuan' => '°c'],
            ['dataTeknis' => 'signal Gs Standby Auto', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Onload', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Fail to start', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Fail To stop', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs High coolant temp.', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Low Oil Press', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Alternator Voltage fault', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs General alarm', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Blocked', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Available', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Comm Alarm', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Hi Temp shutdown', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Gs Overspeed Shutdown', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Daily tank high alarm', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal Daily tank low alarm', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal fuel pump 1 alarm', 'satuan' => ['Normal', 'Abnormal']],
            ['dataTeknis' => 'Signal fuel pump 2 alarm', 'satuan' => ['Normal', 'Abnormal']],
        ];

        if (!GensetStandbyGarduTeknikTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['datas'] as $result) {
                $gensetStandbyGarduTeknikTahunan = new GensetStandbyGarduTeknikTahunan();
                $gensetStandbyGarduTeknikTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $gensetStandbyGarduTeknikTahunan->form_id = $detailWorkOrderForm->form_id;
                $gensetStandbyGarduTeknikTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $gensetStandbyGarduTeknikTahunan->data_teknis = $result['dataTeknis'];
                $gensetStandbyGarduTeknikTahunan->save();
            }
        }
        $data['gensetStandbyGarduTeknikTahunans'] = GensetStandbyGarduTeknikTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.power-station-1.genset-standby-gardu-teknik-tahunan.index', $data);
    }

    public function formPs1GensetStandbyGarduTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'satuan.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $gensetStandbyGarduTeknikTahunans = GensetStandbyGarduTeknikTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($gensetStandbyGarduTeknikTahunans as $key => $gensetStandbyGarduTeknikTahunan) {
                $gensetStandbyGarduTeknikTahunan->satuan = $validatedData['satuan'][$key];
                $gensetStandbyGarduTeknikTahunan->keterangan = $validatedData['keterangan'][$key];
                $gensetStandbyGarduTeknikTahunan->catatan = $validatedData['catatan'];
                $gensetStandbyGarduTeknikTahunan->save();
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

    // FORM CHECKLIST PANEL MV MPS 1
    public function formPs1PanelHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['exts'] = [
            [
                'cublicle' => 'MBC',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MCC',
                'local_remote' => null,
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => null,
                'cb_spring' => null,
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSD',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSE',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
        ];

        $data['er2as'] = [
            [
                'cublicle' => 'MCA',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MCB',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MCC',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSA',
                'local_remote' => null,
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => null,
                'cb_spring' => null,
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSB',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => null,
                'cb_spring' => null,
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSC',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSD',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSE',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSF',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSG',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSH',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSI',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSJ',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSK',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSL',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MCF',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
        ];

        $data['er2bs'] = [
            [
                'cublicle' => 'MCD',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MCE',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MCC',
                'local_remote' => null,
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => null,
                'cb_spring' => null,
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSX',
                'local_remote' => null,
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => null,
                'cb_spring' => null,
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSW',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSV',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSU',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MST',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSS',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSR',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSQ',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSP',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSO',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSN',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSM',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MCG',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
        ];

        $data['er1bs'] = [
            [
                'cublicle' => 'XSA',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XSB',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XCA',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'MSA',
                'local_remote' => null,
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => null,
                'cb_spring' => null,
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
        ];

        $data['panel_mv_gensets'] = [
            [
                'cublicle' => 'XDA',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XDB',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ]
        ];

        $data['panel_mv_gensets'] = [
            [
                'cublicle' => 'XDA',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XDB',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ]
        ];

        $data['er1as'] = [
            [
                'cublicle' => 'XSK',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XCM',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XCN',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ]
        ];

        $data['er6s'] = [
            [
                'cublicle' => 'XCA',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XCB',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XCD',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XCE',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XCM',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XCN',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XSP',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XSQ',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XCR',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
            [
                'cublicle' => 'XCS',
                'local_remote' => ['LOCAL', 'REMOTE'],
                'posisi_ds' => ['OPEN', 'CLOSE'],
                'posisi_grounding' => ['OPEN', 'CLOSE'],
                'posisi_cb' => ['OPEN', 'CLOSE'],
                'cb_spring' => ['CHARGE', 'DISCHARGE'],
                'sf6_lev' => ['R', 'G'],
                'tegangan' => null,
                'arus' => null,
                'cos_phi' => null,
                'freq' => null,
                'daya' => null,
                'keterangan' => null
            ],
        ];

        $data['page_title'] = 'Form Checklist Harian Panel';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['forms'] = \App\Helpers\FormPs1::formPs1PanelHarian();
        if (
            !FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2a')
                ->first()
        ) {
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

        if (
            !FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2b')
                ->first()
        ) {
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

        if (
            !FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'ext')
                ->first()
        ) {
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
        if (
            !FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1b')
                ->first()
        ) {
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
        if (
            !FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'panel_mv_genset')
                ->first()
        ) {
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
        $data['formPs1PanelHarianEXT'] = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'ext')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs1PanelHarianER2A'] = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er2a')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs1PanelHarianER2B'] = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er2b')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs1PanelHarianER1B'] = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'er1b')
            ->orderBy('id', 'asc')
            ->get();
        $data['formPs1PanelHarianPanel'] = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
            $dataEXTs = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'ext')
                ->orderBy('id', 'asc')
                ->get();
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
            $dataER2As = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2a')
                ->orderBy('id', 'asc')
                ->get();
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
            $dataER2Bs = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er2b')
                ->orderBy('id', 'asc')
                ->get();
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
            $dataER1Bs = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'er1b')
                ->orderBy('id', 'asc')
                ->get();
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
            $dataPanelMvGensets = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'panel_mv_genset')
                ->orderBy('id', 'asc')
                ->get();
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

    public function formPs1GensetMobileDuaMingguan(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'WORK ORDER GENSET MOBILE 8, 60,100,430,500,1000 KVA 2 Mingguan';

        $pertanyaan = [
            ['data_teknis' => 'Batt. Starter', 'satuan' => 'Vdc'], ['data_teknis' => 'T.BBM genset', 'satuan' => 'Liter'], ['data_teknis' => 'Ampere Meter', 'satuan' => 'A'], ['data_teknis' => 'Volt Meter', 'satuan' => 'V'], ['data_teknis' => 'Frequency', 'satuan' => 'Hz'], ['data_teknis' => 'Watt Meter', 'satuan' => 'Kw'], ['data_teknis' => 'Power Factor', 'satuan' => 'pf'], ['data_teknis' => 'Engine Speed', 'satuan' => 'rpm'], ['data_teknis' => 'Level air radiator', 'satuan' => 'max'], ['data_teknis' => 'Level Oli Mesin', 'satuan' => 'max'], ['data_teknis' => 'Eng.Oil Press.', 'satuan' => 'barr'], ['data_teknis' => 'Eng. Coolant temp', 'satuan' => 'c°'], ['data_teknis' => 'Eng. Run Time', 'satuan' => 'hours'], ['data_teknis' => 'Eng. Inlet temp', 'satuan' => 'c°']];

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

        $data['pertanyaan'] = [
            ['data_teknis' => 'Batt. Starter', 'satuan' => 'Vdc'], 
            ['data_teknis' => 'Batt. Kontrol', 'satuan' => 'Vdc'], 
            ['data_teknis' => 'T.BBM genset', 'satuan' => 'Liter'], 
            ['data_teknis' => 'T.BBM harian', 'satuan' => 'Liter'], 
            ['data_teknis' => 'T.BBM Ground tank', 'satuan' => 'Liter'], 
            ['data_teknis' => 'Arus Gf pada modul TR (maximal)', 'satuan' => 'A'], 
            ['data_teknis' => 'Ampere Meter', 'satuan' => 'A'], 
            ['data_teknis' => 'Volt Meter', 'satuan' => 'V'], 
            ['data_teknis' => 'Frequency', 'satuan' => 'Hz'], 
            ['data_teknis' => 'Watt Meter', 'satuan' => 'Kw'], 
            ['data_teknis' => 'Power Factor', 'satuan' => 'pf'], 
            ['data_teknis' => 'Enggine Speed', 'satuan' => 'rpm'], 
            ['data_teknis' => 'Level air radiator', 'satuan' => 'max'], 
            ['data_teknis' => 'Level Oli Mesin', 'satuan' => 'max'], 
            ['data_teknis' => 'engg.Oil Press.', 'satuan' => 'barr'], 
            ['data_teknis' => 'engg. Coolant temp', 'satuan' => 'c°'], 
            ['data_teknis' => 'engg.Run Time', 'satuan' => 'Hours'], 
            ['data_teknis' => 'engg.Inlet temp', 'satuan' => 'c°'], 
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

        if (!FormPs1GensetMobileEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['pertanyaan'] as $value) {
                $formPs1GensetMobileEnamBulanan = new FormPs1GensetMobileEnamBulanan();
                $formPs1GensetMobileEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1GensetMobileEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formPs1GensetMobileEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1GensetMobileEnamBulanan->pertanyaan = $value['data_teknis'];
                $formPs1GensetMobileEnamBulanan->satuan = $value['satuan'];
                $formPs1GensetMobileEnamBulanan->save();
            }
        }

        $data['formPs1GensetMobileEnamBulanans'] = FormPs1GensetMobileEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        // dd($data['formPs1GensetMobileEnamBulanans']);

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

        $pertanyaan = [
            ['data_teknis' => 'Batt. Starter', 'satuan' => 'Vdc'], 
            ['data_teknis' => 'T.BBM genset', 'satuan' => 'Liter'], 
            ['data_teknis' => 'T.BBM harian', 'satuan' => 'Liter'], 
            ['data_teknis' => 'Ampere Meter', 'satuan' => 'A'], 
            ['data_teknis' => 'Volt Meter', 'satuan' => 'V'], 
            ['data_teknis' => 'Frequency', 'satuan' => 'Hz'], 
            ['data_teknis' => 'Watt Meter', 'satuan' => 'Kw'], 
            ['data_teknis' => 'Power Factor', 'satuan' => 'pf'], 
            ['data_teknis' => 'Enggine Speed', 'satuan' => 'rpm'], 
            ['data_teknis' => 'Level air radiator', 'satuan' => 'max'], 
            ['data_teknis' => 'Level Oli Mesin', 'satuan' => 'max'], 
            ['data_teknis' => 'engg.Oil Press.', 'satuan' => 'barr'], 
            ['data_teknis' => 'engg. Coolant temp', 'satuan' => 'c°'], 
            ['data_teknis' => 'engg.Run Time', 'satuan' => 'hours'], 
            ['data_teknis' => 'engg.Inlet temp', 'satuan' => 'c°']];

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

        $data['peralatans'] = [
            ['group' => 'CONTROL DESK', 'namaPeralatan' => 'Easy Gen (Woodward)', 'gs1' => ['Auto', 'Manual', 'Off'], 'gs2' => ['Auto', 'Manual', 'Off']],
            ['group' => 'CONTROL DESK', 'namaPeralatan' => 'Mode Operasi Genset', 'gs1' => ['Auto', 'Manual', 'Off'], 'gs2' => ['Auto', 'Manual', 'Off']],
            ['group' => 'CONTROL DESK', 'namaPeralatan' => 'Posisi Voltage Adjustment', 'gs1' => null, 'gs2' => null],
            ['group' => 'CONTROL DESK', 'namaPeralatan' => 'HMI Monitoring (Magelis)', 'gs1' => ['Normal', 'Abnormal'], 'gs2' => ['Normal', 'Abnormal']],
            ['group' => 'CONTROL DESK', 'namaPeralatan' => 'PC Control Monitoring', 'gs1' => ['Normal', 'Abnormal'], 'gs2' => ['Normal', 'Abnormal']],
            ['group' => 'GENSET', 'namaPeralatan' => 'Power Wizard Genset', 'gs1' => ['Auto', 'Manual', 'Off'], 'gs2' => ['Auto', 'Manual', 'Off']],
            ['group' => 'GENSET', 'namaPeralatan' => 'Panel PG ( Low Voltage )', 'gs1' => ['Must Be Close and Remote'], 'gs2' => ['Must Be Close and Remote']],
            ['group' => 'GENSET', 'namaPeralatan' => 'Tegangan Battery Starter', 'gs1' => null, 'gs2' => null],
            ['group' => 'GENSET', 'namaPeralatan' => 'Level BBM tangki harian', 'gs1' => null, 'gs2' => null],
            ['group' => 'GENSET', 'namaPeralatan' => 'Posisi Air Shut off Valve', 'gs1' => ['Open', 'Close'], 'gs2' => ['Open', 'Close']],
            ['group' => 'GENSET', 'namaPeralatan' => 'Kondisi Engine Breather System', 'gs1' => ['Clean', 'Not Clean'], 'gs2' => ['Clean', 'Not Clean']],
            ['group' => 'GENSET', 'namaPeralatan' => 'Level oli pelumas mesin', 'gs1' => ['Low', 'Med', 'Max'], 'gs2' => ['Low', 'Med', 'Max']],
            ['group' => 'GENSET', 'namaPeralatan' => 'Kondisi temperatur Engine', 'gs1' => null, 'gs2' => null],
            ['group' => 'GENSET', 'namaPeralatan' => 'Level Air Radiator', 'gs1' => ['Low', 'Med', 'Max'], 'gs2' => ['Low', 'Med', 'Max']],
            ['group' => 'GENSET', 'namaPeralatan' => 'Kondisi Battery Charger', 'gs1' => ['Auto', 'Manual', 'Off'], 'gs2' => ['Auto', 'Manual', 'Off']],
            ['group' => 'GENSET', 'namaPeralatan' => 'Posisi Valve BBM genset', 'gs1' => ['Open', 'Close'], 'gs2' => ['Open', 'Close']],
            ['group' => 'GENSET', 'namaPeralatan' => 'Mode Operasi BBM Genset', 'gs1' => ['Auto', 'Manual', 'Off'], 'gs2' => ['Auto', 'Manual', 'Off']],
            ['group' => 'GENSET', 'namaPeralatan' => 'Posisi Pintu Ruang Genset', 'gs1' => ['Tertutup dan Terkunci'], 'gs2' => ['Tertutup dan Terkunci']],
            ['group' => 'GROUND TANK', 'namaPeralatan' => 'Ground tank no 1', 'gs1' => null , 'gs2' => null ],
            ['group' => 'GROUND TANK', 'namaPeralatan' => 'Ground tank no 2', 'gs1' => null , 'gs2' => null ],
            ['group' => 'GROUND TANK', 'namaPeralatan' => 'Ground tank no 3', 'gs1' => null , 'gs2' => null ],
        ];

        if (
            !FormPs1GensetHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($data['peralatans'] as $value) {
                $formPs1GensetHarianPower = new FormPs1GensetHarian();
                $formPs1GensetHarianPower->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1GensetHarianPower->form_id = $detailWorkOrderForm->form_id;
                $formPs1GensetHarianPower->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1GensetHarianPower->group = $value['group'];
                $formPs1GensetHarianPower->nama_peralatan = $value['namaPeralatan'];
                $formPs1GensetHarianPower->save();
            }
        }
        $formPs1GensetHarians = $detailWorkOrderForm->formPs1GensetHarians;
        $data['conrtolDesks'] = $formPs1GensetHarians->filter(function ($formPs1GensetHarian) {
            return $formPs1GensetHarian->group == 'CONTROL DESK';
        })->values();
        $data['gensets'] = $formPs1GensetHarians->filter(function ($formPs1GensetHarian) {
            return $formPs1GensetHarian->group == 'GENSET';
        })->values();
        $data['groundTanks'] = $formPs1GensetHarians->filter(function ($formPs1GensetHarian) {
            return $formPs1GensetHarian->group == 'GROUND TANK';
        })->values();

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
        return view('form.power-station-1.genset.index', $data);
    }

    public function formPs1GensetHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'control_desk_gs1.*' => ['nullable'],
            'control_desk_gs2.*' => ['nullable'],
            'control_desk_keterangan.*' => ['nullable'],
            'genset_gs1.*' => ['nullable'],
            'genset_gs2.*' => ['nullable'],
            'genset_keterangan.*' => ['nullable'],
            'kapasitas_liter.*' => ['nullable'],
            'catatan' => ['nullable']
        ]);
        

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs1GensetHarians = $detailWorkOrderForm->formPs1GensetHarians;
            $conrtolDesks = $formPs1GensetHarians->filter(function ($formPs1GensetHarian) {
                return $formPs1GensetHarian->group == 'CONTROL DESK';
            })->values();
            foreach($conrtolDesks as $controlDeskKey => $conrtolDesk){
                $conrtolDesk->gs1 = $validatedData['control_desk_gs1'][$controlDeskKey];
                $conrtolDesk->gs2 = $validatedData['control_desk_gs2'][$controlDeskKey];
                $conrtolDesk->keterangan =$validatedData['control_desk_keterangan'][$controlDeskKey];
                $conrtolDesk->catatan = $validatedData['catatan'];
                $conrtolDesk->save();
            }
            
            $gensets = $formPs1GensetHarians->filter(function ($formPs1GensetHarian) {
                return $formPs1GensetHarian->group == 'GENSET';
            })->values();
            foreach($gensets as $gensetKey => $genset){
                $genset->gs1 = $validatedData['genset_gs1'][$gensetKey];
                $genset->gs2 = $validatedData['genset_gs2'][$gensetKey];
                $genset->keterangan = $validatedData['genset_keterangan'][$gensetKey];
                $genset->catatan = $validatedData['catatan'];
                $genset->save();
            }

            $groundTanks = $formPs1GensetHarians->filter(function ($formPs1GensetHarian) {
                return $formPs1GensetHarian->group == 'GROUND TANK';
            })->values();
            foreach($groundTanks as $groundTankKey => $groundTank){
                $groundTank->kapasitas_liter =$validatedData['kapasitas_liter'][$groundTankKey];
                $groundTank->catatan = $validatedData['catatan'];
                $groundTank->save();
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

    // Control desk, Pc Control Monitoring & Panel Automation
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
        $data['control'] = [
            [
                'pertanyaan' => 'Lampu Indikator',
                'satuan' => 'Normal/Abnormal',
                'select' => ['Normal', 'Abnormal'],
            ],
            [
                'pertanyaan' => 'Operation Mode',
                'satuan' => 'Auto / Off / Manual',
                'select' => ['Auto', 'Off', 'Manual'],
            ],
            [
                'pertanyaan' => 'Volt Adjuster',
                'satuan' => 'Lock/Unlock',
                'select' => ['Lock', 'Unlock'],
            ],
            ['pertanyaan' => 'Power Meter', 'satuan' => 'Normal/Abnormal', 'select' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'Modul Synchron', 'satuan' => 'Auto/Man/Semi', 'select' => ['Auto', 'Man', 'Semi']],
            ['pertanyaan' => 'HMI Monitoring', 'satuan' => 'Normal/Abnormal', 'select' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'Tegangan Kontrol', 'satuan' => 'Vdc'],
            ['pertanyaan' => 'Horn / Buzzer test', 'satuan' => 'Normal/Abnormal', 'select' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'PC Control Monitoring', 'satuan' => 'Normal/Abnormal', 'select' => ['Normal', 'Abnormal']],
            ['pertanyaan' => 'MCB/Fuse kontrol', 'satuan' => 'Normal/Abnormal', 'select' => ['Normal', 'Abnormal']],
        ];

        $data['panel'] = [
            ['pertanyaan' => 'Lampu Indikator PLC', 'satuan' => 'Run / Err / Off', 'select' => ['Run', 'Err', 'Off']], 
            ['pertanyaan' => 'Lampu Indikator Power Logic', 'satuan' => 'Run / Err / Off', 'select' => ['Run', 'Err', 'Off']], 
            ['pertanyaan' => 'lampu indikator Switch Hub', 'satuan' => 'Run / Err / Off', 'select' => ['Run', 'Err', 'Off']], 
            ['pertanyaan' => 'lampu indikator Remote IO 1', 'satuan' => 'Run / Err / Off', 'select' => ['Run', 'Err', 'Off']], 
            ['pertanyaan' => 'lampu indikator Remote IO 2', 'satuan' => 'Run / Err / Off', 'select' => ['Run', 'Err', 'Off']], 
            ['pertanyaan' => 'Tegangan Kontrol', 'satuan' => 'Vdc'], 
            ['pertanyaan' => 'Exhaust Fan', 'satuan' => 'On/Off', 'select' => ['On', 'Off']], 
            ['pertanyaan' => 'Lampu Penerangan panel', 'satuan' => 'Normal/Abnormal', 'select' => ['Normal', 'Abnormal']], 
            ['pertanyaan' => 'MCB/Fuse kontrol', 'satuan' => 'Normal/Abnormal', 'select' => ['Normal', 'Abnormal']]];

        if (
            !FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'control')
                ->first()
        ) {
            foreach ($data['control'] as $value) {
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
        $data['formPs1ControlDeskDuaMingguanBelakangControls'] = FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'control')
            ->orderBy('id', 'asc')
            ->get();

        if (
            !FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'panel')
                ->first()
        ) {
            foreach ($data['panel'] as $value) {
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
        $data['formPs1ControlDeskDuaMingguanBelakangPanels'] = FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('grup', 'panel')
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
        return view('form.power-station-1.control-desk-dua-mingguan.index', $data);
    }

    public function formPs1ControlDeskDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'CHECK LIST HARIAN PERALATAN MPS 1';

        $validatedData = $request->validate([
            'q1.*' => ['nullable'],
            'q2.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $validatedDataPanel = $request->validate([
            'q1_panel.*' => ['nullable'],
            'q2_panel.*' => ['nullable'],
            'keterangan_panel.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataControls = FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'control')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataControls as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                // $value->grup = 'ext';
                // $value->cubicle = $validatedDataEXT['cubicle_ext_'][$key] ?? null;
                // $value->keterangan = $validatedDataEXT['keterangan_ext_'][$key] ?? null;
                $value->q1 = $validatedData['q1'][$key] ?? null;
                $value->q2 = $validatedData['q2'][$key] ?? null;
                $value->keterangan = $validatedData['keterangan'][$key] ?? null;
                $value->catatan = $validatedData['catatan'] ?? null;
                $value->save();
            }
            DB::commit();

            DB::beginTransaction();
            $dataPanels = FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('grup', 'panel')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataPanels as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                // $value->grup = 'ext';
                // $value->cubicle = $validatedDataEXT['cubicle_ext_'][$key] ?? null;
                // $value->keterangan = $validatedDataEXT['keterangan_ext_'][$key] ?? null;
                $value->q1 = $validatedDataPanel['q1_panel'][$key] ?? null;
                $value->q2 = $validatedDataPanel['q2_panel'][$key] ?? null;
                $value->keterangan = $validatedDataPanel['keterangan_panel'][$key] ?? null;
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

    public function formPs1ControlDeskTahunan(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Check List Control Desk Tahunan PS 1';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $pertanyaan = ['Ampere Meter', 'Watt Meter', 'Volt Meter', 'Frequency', 'D.H.C.', 'R.P.M.', 'Oil Pressure', 'Oil Temperature', 'Battery Starter', 'Tangki BBM/Harian', 'Level Oli Mesin', 'Level Air Radiator'];

        $data['satuan'] = ['A', '', 'V', 'Hz', 'hrs', 'rpm', 'Bar', 'c', 'Vdc', '', '', ''];

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
        $data['formPs1ControlDeskTahunans'] = FormPs1ControlDeskTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.power-station-1.control-desk-tahunan.index', $data);
    }

    public function formPs1ControlDeskTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'q1.*' => ['nullable'],
            'q2.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $dataControls = FormPs1ControlDeskTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($dataControls as $key => $value) {
                $value->form_id = $detailWorkOrderForm->form_id;
                $value->q1 = $validatedData['q1'][$key] ?? null;
                $value->q2 = $validatedData['q2'][$key] ?? null;
                $value->catatan = $validatedData['catatan'] ?? null;
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

    public function formPs1PanelTmTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Panel TM Tahunan PS 1';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['datas'] = [
            ['data_teknis' => 'Lampu Indikator', 'satuan' => 'Normal/Rusak'],
            ['data_teknis' => 'Arus', 'satuan' => 'A'],
            ['data_teknis' => 'Tegangan', 'satuan' => 'Kv'],
            ['data_teknis' => 'Frekwensi', 'satuan' => 'Hz'],
            ['data_teknis' => 'Power Factor', 'satuan' => 'pf'],
            ['data_teknis' => 'Indikator Gas SF6', 'satuan' => 'Hijau/Merah'],
            ['data_teknis' => 'Posisi CB', 'satuan' => 'Open/close'],
            ['data_teknis' => 'Indikator Spring CB', 'satuan' => 'Charge/Discharge'],
            ['data_teknis' => 'Indikator Relay Proteksi', 'satuan' => 'Normal/Error'],
            ['data_teknis' => 'Tegangan Kontrol', 'satuan' => 'Vdc'],
            ['data_teknis' => 'MCB/Fuse kontrol', 'satuan' => 'Normal'],
            ['data_teknis' => 'Kondisi Curent Trafo', 'satuan' => 'Normal'],
            ['data_teknis' => 'Kondisi Voltage Trafo', 'satuan' => 'Normal'],
            ['data_teknis' => 'Kondisi Heater Panel', 'satuan' => 'Normal'],
            ['data_teknis' => 'Kecepatan Close CB', 'satuan' => 'Second'],
            ['data_teknis' => 'Setting Arus Max', 'satuan' => 'A'],
            ['data_teknis' => 'Setting Arus Bocor', 'satuan' => 'A'],
            ['data_teknis' => 'Setting Tegangan Short', 'satuan' => 'Kv'],
            ['data_teknis' => 'Open Close CB Via SAS', 'satuan' => 'Normal / Error'],
            ['data_teknis' => 'Tes signaling Panel', 'satuan' => 'Normal / Error'],
            ['data_teknis' => 'Peng.tahanan isolasi kabel', 'satuan' => 'mega / Giga Ohm'],
            ['data_teknis' => 'Counter Open close CB', 'satuan' => 'x'],
        ];
        if (!FormPs1PanelTmTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['datas'] as $key => $value) {
                $formPs1ControlDeskTahunan = new FormPs1PanelTmTahunan();
                $formPs1ControlDeskTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1ControlDeskTahunan->data_teknis = $value['data_teknis'];
                $formPs1ControlDeskTahunan->form_id = $detailWorkOrderForm->form_id;
                $formPs1ControlDeskTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1ControlDeskTahunan->save();
            }
        }
        $data['formPs1PanelTmTahunans'] = FormPs1PanelTmTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.power-station-1.panel-tm-tahunan.index', $data);
    }

    public function formPs1PanelTmTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'q1.*' => ['nullable'],
            'r.*' => ['nullable'],
            's.*' => ['nullable'],
            't.*' => ['nullable'],
            'satuan.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs1PanelTmTahunans = FormPs1PanelTmTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs1PanelTmTahunans as $key => $formPs1PanelTmTahunan) {
                $formPs1PanelTmTahunan->q1 = $validatedData['q1'][$key];
                $formPs1PanelTmTahunan->r = $validatedData['r'][$key];
                $formPs1PanelTmTahunan->s = $validatedData['s'][$key];
                $formPs1PanelTmTahunan->t = $validatedData['t'][$key];
                $formPs1PanelTmTahunan->satuan = $validatedData['satuan'][$key];
                $formPs1PanelTmTahunan->keterangan = $validatedData['keterangan'][$key];
                $formPs1PanelTmTahunan->catatan = $validatedData['catatan'];
                $formPs1PanelTmTahunan->save();
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

    public function formPs1PanelMvTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Panel MV Tahunan PS 1';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['datas'] = [
            ['data_teknis' => 'Lampu Indikator', 'satuan' => 'Normal/Rusak'],
            ['data_teknis' => 'Arus', 'satuan' => 'A'],
            ['data_teknis' => 'Tegangan', 'satuan' => 'Kv'],
            ['data_teknis' => 'Frekwensi', 'satuan' => 'Hz'],
            ['data_teknis' => 'Power Factor', 'satuan' => 'pf'],
            ['data_teknis' => 'Indikator Gas SF6', 'satuan' => 'Hijau/Merah'],
            ['data_teknis' => 'Posisi CB', 'satuan' => 'Open/close'],
            ['data_teknis' => 'Indikator Spring CB', 'satuan' => 'Charge/Discharge'],
            ['data_teknis' => 'Indikator Relay Proteksi', 'satuan' => 'Normal/Error'],
            ['data_teknis' => 'Tegangan Kontrol', 'satuan' => 'Vdc'],
            ['data_teknis' => 'MCB/Fuse kontrol', 'satuan' => 'Normal'],
            ['data_teknis' => 'Kondisi Curent Trafo', 'satuan' => 'Normal'],
            ['data_teknis' => 'Kondisi Voltage Trafo', 'satuan' => 'Normal'],
            ['data_teknis' => 'Kondisi Heater Panel', 'satuan' => 'Normal'],
            ['data_teknis' => 'Kecepatan Close CB', 'satuan' => 'Second'],
            ['data_teknis' => 'Setting Arus Max', 'satuan' => 'A'],
            ['data_teknis' => 'Setting Arus Bocor', 'satuan' => 'A'],
            ['data_teknis' => 'Setting Tegangan Short', 'satuan' => 'Kv'],
            ['data_teknis' => 'Open Close CB Via SAS', 'satuan' => 'Normal / Error'],
            ['data_teknis' => 'Tes signaling Panel', 'satuan' => 'Normal / Error'],
            ['data_teknis' => 'Peng.tahanan isolasi kabel', 'satuan' => 'mega / Giga Ohm'],
            ['data_teknis' => 'Counter Open close CB', 'satuan' => 'x'],
        ];
        if (!FormPs1PanelMvTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['datas'] as $key => $value) {
                $formPs1ControlDeskTahunan = new FormPs1PanelMvTahunan();
                $formPs1ControlDeskTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1ControlDeskTahunan->data_teknis = $value['data_teknis'];
                $formPs1ControlDeskTahunan->form_id = $detailWorkOrderForm->form_id;
                $formPs1ControlDeskTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1ControlDeskTahunan->save();
            }
        }
        $data['formPs1PanelMvTahunans'] = FormPs1PanelMvTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.power-station-1.panel-mv-tahunan.index', $data);
    }

    public function formPs1PanelMvTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'q1.*' => ['nullable'],
            'r.*' => ['nullable'],
            's.*' => ['nullable'],
            't.*' => ['nullable'],
            'satuan.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formPs1PanelMvTahunans = FormPs1PanelMvTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formPs1PanelMvTahunans as $key => $formPs1PanelMvTahunan) {
                $formPs1PanelMvTahunan->q1 = $validatedData['q1'][$key];
                $formPs1PanelMvTahunan->r = $validatedData['r'][$key];
                $formPs1PanelMvTahunan->s = $validatedData['s'][$key];
                $formPs1PanelMvTahunan->t = $validatedData['t'][$key];
                $formPs1PanelMvTahunan->satuan = $validatedData['satuan'][$key];
                $formPs1PanelMvTahunan->keterangan = $validatedData['keterangan'][$key];
                $formPs1PanelMvTahunan->catatan = $validatedData['catatan'];
                $formPs1PanelMvTahunan->save();
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
    public function formPs1PanelTmDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Panel TM Dua Mingguan PS 1';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['datas'] = [
            ['name' => 'lampu_indikator','data_teknis' => 'Lampu Indikator', 'satuan' => ['Normal', 'Rusak']],
            ['name' => 'gas_sf6','data_teknis' => 'Gas SF6', 'satuan' => ['Hijau', 'Merah']], 
            ['name' => 'posisi_cb','data_teknis' => 'Posisi CB', 'satuan' => ['Open', 'Close']], 
            ['name' => 'indikator_spring_cb','data_teknis' => 'Indikator Spring CB', 'satuan' => ['Charge', 'Discharge']], 
            ['name' => 'tegangan','data_teknis' => 'Tegangan', 'satuan' => 'Kv'], 
            ['name' => 'frequency','data_teknis' => 'Frekwensi', 'satuan' => 'Hz'], 
            ['name' => 'arus','data_teknis' => 'Arus', 'satuan' => 'A'], 
            ['name' => 'power_factor','data_teknis' => 'Power Factor', 'satuan' => 'pf'], 
            ['name' => 'relay_proteksi','data_teknis' => 'Relay Proteksi', 'satuan' => ['Normal', 'Error']], 
            ['name' => 'tegangan_kontrol','data_teknis' => 'Tegangan Kontrol', 'satuan' => 'VDC'], 
            ['name' => 'mcb_fuse_kontrol','data_teknis' => 'MCB/Fuse kontrol', 'satuan' => ['Normal', 'Abnormal']]];

        $data['panelSynchrons'] = $detailWorkOrderForm->formPs1PanelTmDuaMingguans->filter(function ($workOrder) {
            return $workOrder->group_name == 'panel_synchron';
        })->values();

        $data['er1bs'] = $detailWorkOrderForm->formPs1PanelTmDuaMingguans->filter(function ($workOrder) {
            return $workOrder->group_name == 'er1b';
        })->values();

        $data['er7s'] = $detailWorkOrderForm->formPs1PanelTmDuaMingguans->filter(function ($workOrder) {
            return $workOrder->group_name == 'er7';
        })->values();

        $data['er6s'] = $detailWorkOrderForm->formPs1PanelTmDuaMingguans->filter(function ($workOrder) {
            return $workOrder->group_name == 'er6';
        })->values();

        $data['er2as'] = $detailWorkOrderForm->formPs1PanelTmDuaMingguans->filter(function ($workOrder) {
            return $workOrder->group_name == 'er2a';
        })->values();

        $data['er2bs'] = $detailWorkOrderForm->formPs1PanelTmDuaMingguans->filter(function ($workOrder) {
            return $workOrder->group_name == 'er2b';
        })->values();

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
        return view('form.power-station-1.panel-tm-dua-mingguan.index', $data);
    }

    public function formPs1PanelTmDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataPanelSynchron = $request->validate([
            'panel_synchron_asset_name.*' => ['nullable'],
            'panel_synchron_lampu_indikator.*' => ['nullable'],
            'panel_synchron_gas_sf6.*' => ['nullable'],
            'panel_synchron_posisi_cb.*' => ['nullable'],
            'panel_synchron_indikator_spring_cb.*' => ['nullable'],
            'panel_synchron_tegangan.*' => ['nullable'],
            'panel_synchron_frequency.*' => ['nullable'],
            'panel_synchron_arus.*' => ['nullable'],
            'panel_synchron_power_factor.*' => ['nullable'],
            'panel_synchron_relay_proteksi.*' => ['nullable'],
            'panel_synchron_tegangan_kontrol.*' => ['nullable'],
            'panel_synchron_mcb_fuse_kontrol.*' => ['nullable'],
            'panel_synchron_keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        
        $validatedEr1b = $request->validate([
            'er1b_asset_name.*' => ['nullable'],
            'er1b_lampu_indikator.*' => ['nullable'],
            'er1b_gas_sf6.*' => ['nullable'],
            'er1b_posisi_cb.*' => ['nullable'],
            'er1b_indikator_spring_cb.*' => ['nullable'],
            'er1b_tegangan.*' => ['nullable'],
            'er1b_frequency.*' => ['nullable'],
            'er1b_arus.*' => ['nullable'],
            'er1b_power_factor.*' => ['nullable'],
            'er1b_relay_proteksi.*' => ['nullable'],
            'er1b_tegangan_kontrol.*' => ['nullable'],
            'er1b_mcb_fuse_kontrol.*' => ['nullable'],
            'er1b_keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        
        $validatedEr7 = $request->validate([
            'er7_asset_name.*' => ['nullable'],
            'er7_lampu_indikator.*' => ['nullable'],
            'er7_gas_sf6.*' => ['nullable'],
            'er7_posisi_cb.*' => ['nullable'],
            'er7_indikator_spring_cb.*' => ['nullable'],
            'er7_tegangan.*' => ['nullable'],
            'er7_frequency.*' => ['nullable'],
            'er7_arus.*' => ['nullable'],
            'er7_power_factor.*' => ['nullable'],
            'er7_relay_proteksi.*' => ['nullable'],
            'er7_tegangan_kontrol.*' => ['nullable'],
            'er7_mcb_fuse_kontrol.*' => ['nullable'],
            'er7_keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        
        $validatedEr6 = $request->validate([
            'er6_asset_name.*' => ['nullable'],
            'er6_lampu_indikator.*' => ['nullable'],
            'er6_gas_sf6.*' => ['nullable'],
            'er6_posisi_cb.*' => ['nullable'],
            'er6_indikator_spring_cb.*' => ['nullable'],
            'er6_tegangan.*' => ['nullable'],
            'er6_frequency.*' => ['nullable'],
            'er6_arus.*' => ['nullable'],
            'er6_power_factor.*' => ['nullable'],
            'er6_relay_proteksi.*' => ['nullable'],
            'er6_tegangan_kontrol.*' => ['nullable'],
            'er6_mcb_fuse_kontrol.*' => ['nullable'],
            'er6_keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        
        $validatedEr2a = $request->validate([
            'er2a_asset_name.*' => ['nullable'],
            'er2a_lampu_indikator.*' => ['nullable'],
            'er2a_gas_sf6.*' => ['nullable'],
            'er2a_posisi_cb.*' => ['nullable'],
            'er2a_indikator_spring_cb.*' => ['nullable'],
            'er2a_tegangan.*' => ['nullable'],
            'er2a_frequency.*' => ['nullable'],
            'er2a_arus.*' => ['nullable'],
            'er2a_power_factor.*' => ['nullable'],
            'er2a_relay_proteksi.*' => ['nullable'],
            'er2a_tegangan_kontrol.*' => ['nullable'],
            'er2a_mcb_fuse_kontrol.*' => ['nullable'],
            'er2a_keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        
        $validatedEr2b = $request->validate([
            'er2b_asset_name.*' => ['nullable'],
            'er2b_lampu_indikator.*' => ['nullable'],
            'er2b_gas_sf6.*' => ['nullable'],
            'er2b_posisi_cb.*' => ['nullable'],
            'er2b_indikator_spring_cb.*' => ['nullable'],
            'er2b_tegangan.*' => ['nullable'],
            'er2b_frequency.*' => ['nullable'],
            'er2b_arus.*' => ['nullable'],
            'er2b_power_factor.*' => ['nullable'],
            'er2b_relay_proteksi.*' => ['nullable'],
            'er2b_tegangan_kontrol.*' => ['nullable'],
            'er2b_mcb_fuse_kontrol.*' => ['nullable'],
            'er2b_keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            FormPs1PanelTmDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->delete();
            foreach ($validatedDataPanelSynchron['panel_synchron_asset_name'] as $key => $value) {
                $formPs1PanelTmDuaMingguan = new FormPs1PanelTmDuaMingguan();
                $formPs1PanelTmDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelTmDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelTmDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelTmDuaMingguan->asset_name = $value;
                $formPs1PanelTmDuaMingguan->group_name = 'panel_synchron';
                $formPs1PanelTmDuaMingguan->lampu_indikator = $validatedDataPanelSynchron['panel_synchron_lampu_indikator'][$key];
                $formPs1PanelTmDuaMingguan->gas_sf6 = $validatedDataPanelSynchron['panel_synchron_gas_sf6'][$key];
                $formPs1PanelTmDuaMingguan->posisi_cb = $validatedDataPanelSynchron['panel_synchron_posisi_cb'][$key];
                $formPs1PanelTmDuaMingguan->indikator_spring_cb = $validatedDataPanelSynchron['panel_synchron_indikator_spring_cb'][$key];
                $formPs1PanelTmDuaMingguan->tegangan = $validatedDataPanelSynchron['panel_synchron_tegangan'][$key];
                $formPs1PanelTmDuaMingguan->frequency = $validatedDataPanelSynchron['panel_synchron_frequency'][$key];
                $formPs1PanelTmDuaMingguan->arus = $validatedDataPanelSynchron['panel_synchron_arus'][$key];
                $formPs1PanelTmDuaMingguan->power_factor = $validatedDataPanelSynchron['panel_synchron_power_factor'][$key];
                $formPs1PanelTmDuaMingguan->relay_proteksi = $validatedDataPanelSynchron['panel_synchron_relay_proteksi'][$key];
                $formPs1PanelTmDuaMingguan->tegangan_kontrol = $validatedDataPanelSynchron['panel_synchron_tegangan_kontrol'][$key];
                $formPs1PanelTmDuaMingguan->mcb_fuse_kontrol = $validatedDataPanelSynchron['panel_synchron_mcb_fuse_kontrol'][$key];
                $formPs1PanelTmDuaMingguan->keterangan = $validatedDataPanelSynchron['panel_synchron_keterangan'][$key];
                $formPs1PanelTmDuaMingguan->catatan = $validatedDataPanelSynchron['catatan'];
                $formPs1PanelTmDuaMingguan->save();
            }

            foreach ($validatedEr1b['er1b_asset_name'] as $key => $value) {
                $formPs1PanelTmDuaMingguan = new FormPs1PanelTmDuaMingguan();
                $formPs1PanelTmDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelTmDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelTmDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelTmDuaMingguan->asset_name = $value;
                $formPs1PanelTmDuaMingguan->group_name = 'er1b';
                $formPs1PanelTmDuaMingguan->lampu_indikator = $validatedEr1b['er1b_lampu_indikator'][$key];
                $formPs1PanelTmDuaMingguan->gas_sf6 = $validatedEr1b['er1b_gas_sf6'][$key];
                $formPs1PanelTmDuaMingguan->posisi_cb = $validatedEr1b['er1b_posisi_cb'][$key];
                $formPs1PanelTmDuaMingguan->indikator_spring_cb = $validatedEr1b['er1b_indikator_spring_cb'][$key];
                $formPs1PanelTmDuaMingguan->tegangan = $validatedEr1b['er1b_tegangan'][$key];
                $formPs1PanelTmDuaMingguan->frequency = $validatedEr1b['er1b_frequency'][$key];
                $formPs1PanelTmDuaMingguan->arus = $validatedEr1b['er1b_arus'][$key];
                $formPs1PanelTmDuaMingguan->power_factor = $validatedEr1b['er1b_power_factor'][$key];
                $formPs1PanelTmDuaMingguan->relay_proteksi = $validatedEr1b['er1b_relay_proteksi'][$key];
                $formPs1PanelTmDuaMingguan->tegangan_kontrol = $validatedEr1b['er1b_tegangan_kontrol'][$key];
                $formPs1PanelTmDuaMingguan->mcb_fuse_kontrol = $validatedEr1b['er1b_mcb_fuse_kontrol'][$key];
                $formPs1PanelTmDuaMingguan->keterangan = $validatedEr1b['er1b_keterangan'][$key];
                $formPs1PanelTmDuaMingguan->catatan = $validatedEr1b['catatan'];
                $formPs1PanelTmDuaMingguan->save();
            }

            foreach ($validatedEr7['er7_asset_name'] as $key => $value) {
                $formPs1PanelTmDuaMingguan = new FormPs1PanelTmDuaMingguan();
                $formPs1PanelTmDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelTmDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelTmDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelTmDuaMingguan->asset_name = $value;
                $formPs1PanelTmDuaMingguan->group_name = 'er7';
                $formPs1PanelTmDuaMingguan->lampu_indikator = $validatedEr7['er7_lampu_indikator'][$key];
                $formPs1PanelTmDuaMingguan->gas_sf6 = $validatedEr7['er7_gas_sf6'][$key];
                $formPs1PanelTmDuaMingguan->posisi_cb = $validatedEr7['er7_posisi_cb'][$key];
                $formPs1PanelTmDuaMingguan->indikator_spring_cb = $validatedEr7['er7_indikator_spring_cb'][$key];
                $formPs1PanelTmDuaMingguan->tegangan = $validatedEr7['er7_tegangan'][$key];
                $formPs1PanelTmDuaMingguan->frequency = $validatedEr7['er7_frequency'][$key];
                $formPs1PanelTmDuaMingguan->arus = $validatedEr7['er7_arus'][$key];
                $formPs1PanelTmDuaMingguan->power_factor = $validatedEr7['er7_power_factor'][$key];
                $formPs1PanelTmDuaMingguan->relay_proteksi = $validatedEr7['er7_relay_proteksi'][$key];
                $formPs1PanelTmDuaMingguan->tegangan_kontrol = $validatedEr7['er7_tegangan_kontrol'][$key];
                $formPs1PanelTmDuaMingguan->mcb_fuse_kontrol = $validatedEr7['er7_mcb_fuse_kontrol'][$key];
                $formPs1PanelTmDuaMingguan->keterangan = $validatedEr7['er7_keterangan'][$key];
                $formPs1PanelTmDuaMingguan->catatan = $validatedEr7['catatan'];
                $formPs1PanelTmDuaMingguan->save();
            }

            foreach ($validatedEr6['er6_asset_name'] as $key => $value) {
                $formPs1PanelTmDuaMingguan = new FormPs1PanelTmDuaMingguan();
                $formPs1PanelTmDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelTmDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelTmDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelTmDuaMingguan->asset_name = $value;
                $formPs1PanelTmDuaMingguan->group_name = 'er6';
                $formPs1PanelTmDuaMingguan->lampu_indikator = $validatedEr6['er6_lampu_indikator'][$key];
                $formPs1PanelTmDuaMingguan->gas_sf6 = $validatedEr6['er6_gas_sf6'][$key];
                $formPs1PanelTmDuaMingguan->posisi_cb = $validatedEr6['er6_posisi_cb'][$key];
                $formPs1PanelTmDuaMingguan->indikator_spring_cb = $validatedEr6['er6_indikator_spring_cb'][$key];
                $formPs1PanelTmDuaMingguan->tegangan = $validatedEr6['er6_tegangan'][$key];
                $formPs1PanelTmDuaMingguan->frequency = $validatedEr6['er6_frequency'][$key];
                $formPs1PanelTmDuaMingguan->arus = $validatedEr6['er6_arus'][$key];
                $formPs1PanelTmDuaMingguan->power_factor = $validatedEr6['er6_power_factor'][$key];
                $formPs1PanelTmDuaMingguan->relay_proteksi = $validatedEr6['er6_relay_proteksi'][$key];
                $formPs1PanelTmDuaMingguan->tegangan_kontrol = $validatedEr6['er6_tegangan_kontrol'][$key];
                $formPs1PanelTmDuaMingguan->mcb_fuse_kontrol = $validatedEr6['er6_mcb_fuse_kontrol'][$key];
                $formPs1PanelTmDuaMingguan->keterangan = $validatedEr6['er6_keterangan'][$key];
                $formPs1PanelTmDuaMingguan->catatan = $validatedEr6['catatan'];
                $formPs1PanelTmDuaMingguan->save();
            }

            foreach ($validatedEr2a['er2a_asset_name'] as $key => $value) {
                $formPs1PanelTmDuaMingguan = new FormPs1PanelTmDuaMingguan();
                $formPs1PanelTmDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelTmDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelTmDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelTmDuaMingguan->asset_name = $value;
                $formPs1PanelTmDuaMingguan->group_name = 'er2a';
                $formPs1PanelTmDuaMingguan->lampu_indikator = $validatedEr2a['er2a_lampu_indikator'][$key];
                $formPs1PanelTmDuaMingguan->gas_sf6 = $validatedEr2a['er2a_gas_sf6'][$key];
                $formPs1PanelTmDuaMingguan->posisi_cb = $validatedEr2a['er2a_posisi_cb'][$key];
                $formPs1PanelTmDuaMingguan->indikator_spring_cb = $validatedEr2a['er2a_indikator_spring_cb'][$key];
                $formPs1PanelTmDuaMingguan->tegangan = $validatedEr2a['er2a_tegangan'][$key];
                $formPs1PanelTmDuaMingguan->frequency = $validatedEr2a['er2a_frequency'][$key];
                $formPs1PanelTmDuaMingguan->arus = $validatedEr2a['er2a_arus'][$key];
                $formPs1PanelTmDuaMingguan->power_factor = $validatedEr2a['er2a_power_factor'][$key];
                $formPs1PanelTmDuaMingguan->relay_proteksi = $validatedEr2a['er2a_relay_proteksi'][$key];
                $formPs1PanelTmDuaMingguan->tegangan_kontrol = $validatedEr2a['er2a_tegangan_kontrol'][$key];
                $formPs1PanelTmDuaMingguan->mcb_fuse_kontrol = $validatedEr2a['er2a_mcb_fuse_kontrol'][$key];
                $formPs1PanelTmDuaMingguan->keterangan = $validatedEr2a['er2a_keterangan'][$key];
                $formPs1PanelTmDuaMingguan->catatan = $validatedEr2a['catatan'];
                $formPs1PanelTmDuaMingguan->save();
            }

            foreach ($validatedEr2b['er2b_asset_name'] as $key => $value) {
                $formPs1PanelTmDuaMingguan = new FormPs1PanelTmDuaMingguan();
                $formPs1PanelTmDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelTmDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelTmDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelTmDuaMingguan->asset_name = $value;
                $formPs1PanelTmDuaMingguan->group_name = 'er2b';
                $formPs1PanelTmDuaMingguan->lampu_indikator = $validatedEr2b['er2b_lampu_indikator'][$key];
                $formPs1PanelTmDuaMingguan->gas_sf6 = $validatedEr2b['er2b_gas_sf6'][$key];
                $formPs1PanelTmDuaMingguan->posisi_cb = $validatedEr2b['er2b_posisi_cb'][$key];
                $formPs1PanelTmDuaMingguan->indikator_spring_cb = $validatedEr2b['er2b_indikator_spring_cb'][$key];
                $formPs1PanelTmDuaMingguan->tegangan = $validatedEr2b['er2b_tegangan'][$key];
                $formPs1PanelTmDuaMingguan->frequency = $validatedEr2b['er2b_frequency'][$key];
                $formPs1PanelTmDuaMingguan->arus = $validatedEr2b['er2b_arus'][$key];
                $formPs1PanelTmDuaMingguan->power_factor = $validatedEr2b['er2b_power_factor'][$key];
                $formPs1PanelTmDuaMingguan->relay_proteksi = $validatedEr2b['er2b_relay_proteksi'][$key];
                $formPs1PanelTmDuaMingguan->tegangan_kontrol = $validatedEr2b['er2b_tegangan_kontrol'][$key];
                $formPs1PanelTmDuaMingguan->mcb_fuse_kontrol = $validatedEr2b['er2b_mcb_fuse_kontrol'][$key];
                $formPs1PanelTmDuaMingguan->keterangan = $validatedEr2b['er2b_keterangan'][$key];
                $formPs1PanelTmDuaMingguan->catatan = $validatedEr2b['catatan'];
                $formPs1PanelTmDuaMingguan->save();
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

    public function formPs1PanelTmEnamBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Panel TM Enam Bulanan PS 1';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['datas'] = [
            ['name' => 'lampu_indikator','data_teknis' => 'Lampu Indikator', 'satuan' => ['Normal', 'Abnormal']],
            ['name' => 'gas_sf6','data_teknis' => 'Gas SF6', 'satuan' => ['Hijau', 'Merah']],
            ['name' => 'posisi_cb','data_teknis' => 'Posisi CB', 'satuan' => ['Open', 'Close']],
            ['name' => 'indikator_spring_cb','data_teknis' => 'Indikator Spring CB', 'satuan' => ['Charge', 'Discharge']],
            ['name' => 'tegangan','data_teknis' => 'Tegangan', 'satuan' => 'Kv'],
            ['name' => 'frequency','data_teknis' => 'Frekwensi', 'satuan' => 'Hz'],
            ['name' => 'arus','data_teknis' => 'Arus', 'satuan' => 'A'],
            ['name' => 'power_factor','data_teknis' => 'Power Factor', 'satuan' => 'pf'],
            ['name' => 'relay_proteksi','data_teknis' => 'Relay Proteksi', 'satuan' => ['Normal', 'Abnormal']],
            ['name' => 'tegangan_kontrol','data_teknis' => 'Tegangan Kontrol', 'satuan' => 'max'],
            ['name' => 'mcb_fuse_kontrol','data_teknis' => 'MCB/Fuse kontrol', 'satuan' => 'Normal'],
            ['name' => 'setting_arus_max','data_teknis' => 'Setting Arus Max', 'satuan' => 'A'],
            ['name' => 'setting_arus_bocor','data_teknis' => 'Setting Arus Bocor', 'satuan' => 'Kv'],
            ['name' => 'setting_tegangan_short','data_teknis' => 'Setting Tegangan Short', 'satuan' => ''],
            ['name' => 'counter_cb','data_teknis' => 'Counter CB', 'satuan' => '-']
        ];

        $data['panelSynchrons'] = $detailWorkOrderForm->formPs1PanelTmEnamBulanans->filter(function ($workOrder) {
            return $workOrder->group_name == 'panel_synchron';
        })->values();

        $data['er1bs'] = $detailWorkOrderForm->formPs1PanelTmEnamBulanans->filter(function ($workOrder) {
            return $workOrder->group_name == 'er1b';
        })->values();

        $data['er7s'] = $detailWorkOrderForm->formPs1PanelTmEnamBulanans->filter(function ($workOrder) {
            return $workOrder->group_name == 'er7';
        })->values();

        $data['er6s'] = $detailWorkOrderForm->formPs1PanelTmEnamBulanans->filter(function ($workOrder) {
            return $workOrder->group_name == 'er6';
        })->values();

        $data['er2as'] = $detailWorkOrderForm->formPs1PanelTmEnamBulanans->filter(function ($workOrder) {
            return $workOrder->group_name == 'er2a';
        })->values();

        $data['er2bs'] = $detailWorkOrderForm->formPs1PanelTmEnamBulanans->filter(function ($workOrder) {
            return $workOrder->group_name == 'er2b';
        })->values();

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
        return view('form.power-station-1.panel-tm-enam-bulanan.index', $data);
    }

    public function formPs1PanelTmEnamBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataPanelSynchron = $request->validate([
            'panel_synchron_asset_name.*' => ['nullable'],
            'panel_synchron_lampu_indikator.*' => ['nullable'],
            'panel_synchron_gas_sf6.*' => ['nullable'],
            'panel_synchron_posisi_cb.*' => ['nullable'],
            'panel_synchron_indikator_spring_cb.*' => ['nullable'],
            'panel_synchron_tegangan.*' => ['nullable'],
            'panel_synchron_frequency.*' => ['nullable'],
            'panel_synchron_arus.*' => ['nullable'],
            'panel_synchron_power_factor.*' => ['nullable'],
            'panel_synchron_relay_proteksi.*' => ['nullable'],
            'panel_synchron_tegangan_kontrol.*' => ['nullable'],
            'panel_synchron_mcb_fuse_kontrol.*' => ['nullable'],
            'panel_synchron_setting_arus_max.*' => ['nullable'],
            'panel_synchron_setting_arus_bocor.*' => ['nullable'],
            'panel_synchron_setting_tegangan_short.*' => ['nullable'],
            'panel_synchron_counter_cb.*' => ['nullable'],
            'panel_synchron_keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        
        $validatedEr1b = $request->validate([
            'er1b_asset_name.*' => ['nullable'],
            'er1b_lampu_indikator.*' => ['nullable'],
            'er1b_gas_sf6.*' => ['nullable'],
            'er1b_posisi_cb.*' => ['nullable'],
            'er1b_indikator_spring_cb.*' => ['nullable'],
            'er1b_tegangan.*' => ['nullable'],
            'er1b_frequency.*' => ['nullable'],
            'er1b_arus.*' => ['nullable'],
            'er1b_power_factor.*' => ['nullable'],
            'er1b_relay_proteksi.*' => ['nullable'],
            'er1b_tegangan_kontrol.*' => ['nullable'],
            'er1b_mcb_fuse_kontrol.*' => ['nullable'],
            'er1b_setting_arus_max.*' => ['nullable'],
            'er1b_setting_arus_bocor.*' => ['nullable'],
            'er1b_setting_tegangan_short.*' => ['nullable'],
            'er1b_counter_cb.*' => ['nullable'],
            'er1b_keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        
        $validatedEr7 = $request->validate([
            'er7_asset_name.*' => ['nullable'],
            'er7_lampu_indikator.*' => ['nullable'],
            'er7_gas_sf6.*' => ['nullable'],
            'er7_posisi_cb.*' => ['nullable'],
            'er7_indikator_spring_cb.*' => ['nullable'],
            'er7_tegangan.*' => ['nullable'],
            'er7_frequency.*' => ['nullable'],
            'er7_arus.*' => ['nullable'],
            'er7_power_factor.*' => ['nullable'],
            'er7_relay_proteksi.*' => ['nullable'],
            'er7_tegangan_kontrol.*' => ['nullable'],
            'er7_mcb_fuse_kontrol.*' => ['nullable'],
            'er7_setting_arus_max.*' => ['nullable'],
            'er7_setting_arus_bocor.*' => ['nullable'],
            'er7_setting_tegangan_short.*' => ['nullable'],
            'er7_counter_cb.*' => ['nullable'],
            'er7_keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        
        $validatedEr6 = $request->validate([
            'er6_asset_name.*' => ['nullable'],
            'er6_lampu_indikator.*' => ['nullable'],
            'er6_gas_sf6.*' => ['nullable'],
            'er6_posisi_cb.*' => ['nullable'],
            'er6_indikator_spring_cb.*' => ['nullable'],
            'er6_tegangan.*' => ['nullable'],
            'er6_frequency.*' => ['nullable'],
            'er6_arus.*' => ['nullable'],
            'er6_power_factor.*' => ['nullable'],
            'er6_relay_proteksi.*' => ['nullable'],
            'er6_tegangan_kontrol.*' => ['nullable'],
            'er6_mcb_fuse_kontrol.*' => ['nullable'],
            'er6_setting_arus_max.*' => ['nullable'],
            'er6_setting_arus_bocor.*' => ['nullable'],
            'er6_setting_tegangan_short.*' => ['nullable'],
            'er6_counter_cb.*' => ['nullable'],
            'er6_keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        
        $validatedEr2a = $request->validate([
            'er2a_asset_name.*' => ['nullable'],
            'er2a_lampu_indikator.*' => ['nullable'],
            'er2a_gas_sf6.*' => ['nullable'],
            'er2a_posisi_cb.*' => ['nullable'],
            'er2a_indikator_spring_cb.*' => ['nullable'],
            'er2a_tegangan.*' => ['nullable'],
            'er2a_frequency.*' => ['nullable'],
            'er2a_arus.*' => ['nullable'],
            'er2a_power_factor.*' => ['nullable'],
            'er2a_relay_proteksi.*' => ['nullable'],
            'er2a_tegangan_kontrol.*' => ['nullable'],
            'er2a_mcb_fuse_kontrol.*' => ['nullable'],
            'er2a_setting_arus_max.*' => ['nullable'],
            'er2a_setting_arus_bocor.*' => ['nullable'],
            'er2a_setting_tegangan_short.*' => ['nullable'],
            'er2a_counter_cb.*' => ['nullable'],
            'er2a_keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        
        $validatedEr2b = $request->validate([
            'er2b_asset_name.*' => ['nullable'],
            'er2b_lampu_indikator.*' => ['nullable'],
            'er2b_gas_sf6.*' => ['nullable'],
            'er2b_posisi_cb.*' => ['nullable'],
            'er2b_indikator_spring_cb.*' => ['nullable'],
            'er2b_tegangan.*' => ['nullable'],
            'er2b_frequency.*' => ['nullable'],
            'er2b_arus.*' => ['nullable'],
            'er2b_power_factor.*' => ['nullable'],
            'er2b_relay_proteksi.*' => ['nullable'],
            'er2b_tegangan_kontrol.*' => ['nullable'],
            'er2b_mcb_fuse_kontrol.*' => ['nullable'],
            'er2b_setting_arus_max.*' => ['nullable'],
            'er2b_setting_arus_bocor.*' => ['nullable'],
            'er2b_setting_tegangan_short.*' => ['nullable'],
            'er2b_counter_cb.*' => ['nullable'],
            'er2b_keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            FormPs1PanelTmEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->delete();
            foreach ($validatedDataPanelSynchron['panel_synchron_asset_name'] as $key => $value) {
                $formPs1PanelTmEnamBulanan = new FormPs1PanelTmEnamBulanan();
                $formPs1PanelTmEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelTmEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelTmEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelTmEnamBulanan->asset_name = $value;
                $formPs1PanelTmEnamBulanan->group_name = 'panel_synchron';
                $formPs1PanelTmEnamBulanan->lampu_indikator = $validatedDataPanelSynchron['panel_synchron_lampu_indikator'][$key];
                $formPs1PanelTmEnamBulanan->gas_sf6 = $validatedDataPanelSynchron['panel_synchron_gas_sf6'][$key];
                $formPs1PanelTmEnamBulanan->posisi_cb = $validatedDataPanelSynchron['panel_synchron_posisi_cb'][$key];
                $formPs1PanelTmEnamBulanan->indikator_spring_cb = $validatedDataPanelSynchron['panel_synchron_indikator_spring_cb'][$key];
                $formPs1PanelTmEnamBulanan->tegangan = $validatedDataPanelSynchron['panel_synchron_tegangan'][$key];
                $formPs1PanelTmEnamBulanan->frequency = $validatedDataPanelSynchron['panel_synchron_frequency'][$key];
                $formPs1PanelTmEnamBulanan->arus = $validatedDataPanelSynchron['panel_synchron_arus'][$key];
                $formPs1PanelTmEnamBulanan->power_factor = $validatedDataPanelSynchron['panel_synchron_power_factor'][$key];
                $formPs1PanelTmEnamBulanan->relay_proteksi = $validatedDataPanelSynchron['panel_synchron_relay_proteksi'][$key];
                $formPs1PanelTmEnamBulanan->tegangan_kontrol = $validatedDataPanelSynchron['panel_synchron_tegangan_kontrol'][$key];
                $formPs1PanelTmEnamBulanan->mcb_fuse_kontrol = $validatedDataPanelSynchron['panel_synchron_mcb_fuse_kontrol'][$key];
                $formPs1PanelTmEnamBulanan->setting_arus_max = $validatedDataPanelSynchron['panel_synchron_setting_arus_max'][$key];
                $formPs1PanelTmEnamBulanan->setting_arus_bocor = $validatedDataPanelSynchron['panel_synchron_setting_arus_bocor'][$key];
                $formPs1PanelTmEnamBulanan->setting_tegangan_short = $validatedDataPanelSynchron['panel_synchron_setting_tegangan_short'][$key];
                $formPs1PanelTmEnamBulanan->counter_cb = $validatedDataPanelSynchron['panel_synchron_counter_cb'][$key];
                $formPs1PanelTmEnamBulanan->keterangan = $validatedDataPanelSynchron['panel_synchron_keterangan'][$key];
                $formPs1PanelTmEnamBulanan->catatan = $validatedDataPanelSynchron['catatan'];
                $formPs1PanelTmEnamBulanan->save();
            }

            foreach ($validatedEr1b['er1b_asset_name'] as $key => $value) {
                $formPs1PanelTmEnamBulanan = new FormPs1PanelTmEnamBulanan();
                $formPs1PanelTmEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelTmEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelTmEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelTmEnamBulanan->asset_name = $value;
                $formPs1PanelTmEnamBulanan->group_name = 'er1b';
                $formPs1PanelTmEnamBulanan->lampu_indikator = $validatedEr1b['er1b_lampu_indikator'][$key];
                $formPs1PanelTmEnamBulanan->gas_sf6 = $validatedEr1b['er1b_gas_sf6'][$key];
                $formPs1PanelTmEnamBulanan->posisi_cb = $validatedEr1b['er1b_posisi_cb'][$key];
                $formPs1PanelTmEnamBulanan->indikator_spring_cb = $validatedEr1b['er1b_indikator_spring_cb'][$key];
                $formPs1PanelTmEnamBulanan->tegangan = $validatedEr1b['er1b_tegangan'][$key];
                $formPs1PanelTmEnamBulanan->frequency = $validatedEr1b['er1b_frequency'][$key];
                $formPs1PanelTmEnamBulanan->arus = $validatedEr1b['er1b_arus'][$key];
                $formPs1PanelTmEnamBulanan->power_factor = $validatedEr1b['er1b_power_factor'][$key];
                $formPs1PanelTmEnamBulanan->relay_proteksi = $validatedEr1b['er1b_relay_proteksi'][$key];
                $formPs1PanelTmEnamBulanan->tegangan_kontrol = $validatedEr1b['er1b_tegangan_kontrol'][$key];
                $formPs1PanelTmEnamBulanan->mcb_fuse_kontrol = $validatedEr1b['er1b_mcb_fuse_kontrol'][$key];
                $formPs1PanelTmEnamBulanan->setting_arus_max = $validatedEr1b['er1b_setting_arus_max'][$key];
                $formPs1PanelTmEnamBulanan->setting_arus_bocor = $validatedEr1b['er1b_setting_arus_bocor'][$key];
                $formPs1PanelTmEnamBulanan->setting_tegangan_short = $validatedEr1b['er1b_setting_tegangan_short'][$key];
                $formPs1PanelTmEnamBulanan->counter_cb = $validatedEr1b['er1b_counter_cb'][$key];
                $formPs1PanelTmEnamBulanan->keterangan = $validatedEr1b['er1b_keterangan'][$key];
                $formPs1PanelTmEnamBulanan->catatan = $validatedEr1b['catatan'];
                $formPs1PanelTmEnamBulanan->save();
            }

            foreach ($validatedEr7['er7_asset_name'] as $key => $value) {
                $formPs1PanelTmEnamBulanan = new FormPs1PanelTmEnamBulanan();
                $formPs1PanelTmEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelTmEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelTmEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelTmEnamBulanan->asset_name = $value;
                $formPs1PanelTmEnamBulanan->group_name = 'er7';
                $formPs1PanelTmEnamBulanan->lampu_indikator = $validatedEr7['er7_lampu_indikator'][$key];
                $formPs1PanelTmEnamBulanan->gas_sf6 = $validatedEr7['er7_gas_sf6'][$key];
                $formPs1PanelTmEnamBulanan->posisi_cb = $validatedEr7['er7_posisi_cb'][$key];
                $formPs1PanelTmEnamBulanan->indikator_spring_cb = $validatedEr7['er7_indikator_spring_cb'][$key];
                $formPs1PanelTmEnamBulanan->tegangan = $validatedEr7['er7_tegangan'][$key];
                $formPs1PanelTmEnamBulanan->frequency = $validatedEr7['er7_frequency'][$key];
                $formPs1PanelTmEnamBulanan->arus = $validatedEr7['er7_arus'][$key];
                $formPs1PanelTmEnamBulanan->power_factor = $validatedEr7['er7_power_factor'][$key];
                $formPs1PanelTmEnamBulanan->relay_proteksi = $validatedEr7['er7_relay_proteksi'][$key];
                $formPs1PanelTmEnamBulanan->tegangan_kontrol = $validatedEr7['er7_tegangan_kontrol'][$key];
                $formPs1PanelTmEnamBulanan->mcb_fuse_kontrol = $validatedEr7['er7_mcb_fuse_kontrol'][$key];
                $formPs1PanelTmEnamBulanan->setting_arus_max = $validatedEr7['er7_setting_arus_max'][$key];
                $formPs1PanelTmEnamBulanan->setting_arus_bocor = $validatedEr7['er7_setting_arus_bocor'][$key];
                $formPs1PanelTmEnamBulanan->setting_tegangan_short = $validatedEr7['er7_setting_tegangan_short'][$key];
                $formPs1PanelTmEnamBulanan->counter_cb = $validatedEr7['er7_counter_cb'][$key];
                $formPs1PanelTmEnamBulanan->keterangan = $validatedEr7['er7_keterangan'][$key];
                $formPs1PanelTmEnamBulanan->catatan = $validatedEr7['catatan'];
                $formPs1PanelTmEnamBulanan->save();
            }

            foreach ($validatedEr6['er6_asset_name'] as $key => $value) {
                $formPs1PanelTmEnamBulanan = new FormPs1PanelTmEnamBulanan();
                $formPs1PanelTmEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelTmEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelTmEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelTmEnamBulanan->asset_name = $value;
                $formPs1PanelTmEnamBulanan->group_name = 'er6';
                $formPs1PanelTmEnamBulanan->lampu_indikator = $validatedEr6['er6_lampu_indikator'][$key];
                $formPs1PanelTmEnamBulanan->gas_sf6 = $validatedEr6['er6_gas_sf6'][$key];
                $formPs1PanelTmEnamBulanan->posisi_cb = $validatedEr6['er6_posisi_cb'][$key];
                $formPs1PanelTmEnamBulanan->indikator_spring_cb = $validatedEr6['er6_indikator_spring_cb'][$key];
                $formPs1PanelTmEnamBulanan->tegangan = $validatedEr6['er6_tegangan'][$key];
                $formPs1PanelTmEnamBulanan->frequency = $validatedEr6['er6_frequency'][$key];
                $formPs1PanelTmEnamBulanan->arus = $validatedEr6['er6_arus'][$key];
                $formPs1PanelTmEnamBulanan->power_factor = $validatedEr6['er6_power_factor'][$key];
                $formPs1PanelTmEnamBulanan->relay_proteksi = $validatedEr6['er6_relay_proteksi'][$key];
                $formPs1PanelTmEnamBulanan->tegangan_kontrol = $validatedEr6['er6_tegangan_kontrol'][$key];
                $formPs1PanelTmEnamBulanan->mcb_fuse_kontrol = $validatedEr6['er6_mcb_fuse_kontrol'][$key];
                $formPs1PanelTmEnamBulanan->setting_arus_max = $validatedEr6['er6_setting_arus_max'][$key];
                $formPs1PanelTmEnamBulanan->setting_arus_bocor = $validatedEr6['er6_setting_arus_bocor'][$key];
                $formPs1PanelTmEnamBulanan->setting_tegangan_short = $validatedEr6['er6_setting_tegangan_short'][$key];
                $formPs1PanelTmEnamBulanan->counter_cb = $validatedEr6['er6_counter_cb'][$key];
                $formPs1PanelTmEnamBulanan->keterangan = $validatedEr6['er6_keterangan'][$key];
                $formPs1PanelTmEnamBulanan->catatan = $validatedEr6['catatan'];
                $formPs1PanelTmEnamBulanan->save();
            }

            foreach ($validatedEr2a['er2a_asset_name'] as $key => $value) {
                $formPs1PanelTmEnamBulanan = new FormPs1PanelTmEnamBulanan();
                $formPs1PanelTmEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelTmEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelTmEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelTmEnamBulanan->asset_name = $value;
                $formPs1PanelTmEnamBulanan->group_name = 'er2a';
                $formPs1PanelTmEnamBulanan->lampu_indikator = $validatedEr2a['er2a_lampu_indikator'][$key];
                $formPs1PanelTmEnamBulanan->gas_sf6 = $validatedEr2a['er2a_gas_sf6'][$key];
                $formPs1PanelTmEnamBulanan->posisi_cb = $validatedEr2a['er2a_posisi_cb'][$key];
                $formPs1PanelTmEnamBulanan->indikator_spring_cb = $validatedEr2a['er2a_indikator_spring_cb'][$key];
                $formPs1PanelTmEnamBulanan->tegangan = $validatedEr2a['er2a_tegangan'][$key];
                $formPs1PanelTmEnamBulanan->frequency = $validatedEr2a['er2a_frequency'][$key];
                $formPs1PanelTmEnamBulanan->arus = $validatedEr2a['er2a_arus'][$key];
                $formPs1PanelTmEnamBulanan->power_factor = $validatedEr2a['er2a_power_factor'][$key];
                $formPs1PanelTmEnamBulanan->relay_proteksi = $validatedEr2a['er2a_relay_proteksi'][$key];
                $formPs1PanelTmEnamBulanan->tegangan_kontrol = $validatedEr2a['er2a_tegangan_kontrol'][$key];
                $formPs1PanelTmEnamBulanan->mcb_fuse_kontrol = $validatedEr2a['er2a_mcb_fuse_kontrol'][$key];
                $formPs1PanelTmEnamBulanan->setting_arus_max = $validatedEr2a['er2a_setting_arus_max'][$key];
                $formPs1PanelTmEnamBulanan->setting_arus_bocor = $validatedEr2a['er2a_setting_arus_bocor'][$key];
                $formPs1PanelTmEnamBulanan->setting_tegangan_short = $validatedEr2a['er2a_setting_tegangan_short'][$key];
                $formPs1PanelTmEnamBulanan->counter_cb = $validatedEr2a['er2a_counter_cb'][$key];
                $formPs1PanelTmEnamBulanan->keterangan = $validatedEr2a['er2a_keterangan'][$key];
                $formPs1PanelTmEnamBulanan->catatan = $validatedEr2a['catatan'];
                $formPs1PanelTmEnamBulanan->save();
            }

            foreach ($validatedEr2b['er2b_asset_name'] as $key => $value) {
                $formPs1PanelTmEnamBulanan = new FormPs1PanelTmEnamBulanan();
                $formPs1PanelTmEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1PanelTmEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1PanelTmEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formPs1PanelTmEnamBulanan->asset_name = $value;
                $formPs1PanelTmEnamBulanan->group_name = 'er2b';
                $formPs1PanelTmEnamBulanan->lampu_indikator = $validatedEr2b['er2b_lampu_indikator'][$key];
                $formPs1PanelTmEnamBulanan->gas_sf6 = $validatedEr2b['er2b_gas_sf6'][$key];
                $formPs1PanelTmEnamBulanan->posisi_cb = $validatedEr2b['er2b_posisi_cb'][$key];
                $formPs1PanelTmEnamBulanan->indikator_spring_cb = $validatedEr2b['er2b_indikator_spring_cb'][$key];
                $formPs1PanelTmEnamBulanan->tegangan = $validatedEr2b['er2b_tegangan'][$key];
                $formPs1PanelTmEnamBulanan->frequency = $validatedEr2b['er2b_frequency'][$key];
                $formPs1PanelTmEnamBulanan->arus = $validatedEr2b['er2b_arus'][$key];
                $formPs1PanelTmEnamBulanan->power_factor = $validatedEr2b['er2b_power_factor'][$key];
                $formPs1PanelTmEnamBulanan->relay_proteksi = $validatedEr2b['er2b_relay_proteksi'][$key];
                $formPs1PanelTmEnamBulanan->tegangan_kontrol = $validatedEr2b['er2b_tegangan_kontrol'][$key];
                $formPs1PanelTmEnamBulanan->mcb_fuse_kontrol = $validatedEr2b['er2b_mcb_fuse_kontrol'][$key];
                $formPs1PanelTmEnamBulanan->setting_arus_max = $validatedEr2b['er2b_setting_arus_max'][$key];
                $formPs1PanelTmEnamBulanan->setting_arus_bocor = $validatedEr2b['er2b_setting_arus_bocor'][$key];
                $formPs1PanelTmEnamBulanan->setting_tegangan_short = $validatedEr2b['er2b_setting_tegangan_short'][$key];
                $formPs1PanelTmEnamBulanan->counter_cb = $validatedEr2b['er2b_counter_cb'][$key];
                $formPs1PanelTmEnamBulanan->keterangan = $validatedEr2b['er2b_keterangan'][$key];
                $formPs1PanelTmEnamBulanan->catatan = $validatedEr2b['catatan'];
                $formPs1PanelTmEnamBulanan->save();
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

    public function formPs1TrafoPanelTrDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM DATA TEKNIS PERAWATAN 2 MINGGUAN - PANEL TR';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['uraianGensets'] = [
            ['name' => 'Beban awal (PLN ONLOAD)'], ['name' => 'Beban Genset (PLN Off / Genset Onload)'], ['name' => 'Beban Akhir (PLN Onload / Recovery)']];
        $data['parameterGensets'] = [['name' => 'TEGANGAN'], ['name' => 'ARUS'], ['name' => 'FREQUENCY'], ['name' => 'BBM'], ['name' => 'JACKET WATER OUTLET TEMP'], ['name' => 'JACKET WATER PRESSURE'], ['name' => 'TURBO BLOWER AIR PRESSURE'], ['name' => 'LOW TEMP. WATER PRESSURE'], ['name' => 'ENGINE OIL TEMPERATURE'], ['name' => 'OIL PRESSURE AFTER FILTER'], ['name' => 'TURBO BLOWER II AIR PRESSURE']];
        //Uraian
        if (!FormPs1TestOnloadUraianGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 3; $i++) {
                $formPs1TestOnloadUraianHarian = new FormPs1TestOnloadUraianGenset();
                $formPs1TestOnloadUraianHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1TestOnloadUraianHarian->form_id = $detailWorkOrderForm->form_id;
                $formPs1TestOnloadUraianHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1TestOnloadUraianHarian->save();
            }
        }
        $data['formPs1TestOnloadUraianHarians'] = FormPs1TestOnloadUraianGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        if (!FormPs1TestOnloadGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formPs1TestOnloadGenset = new FormPs1TestOnloadGenset();
            $formPs1TestOnloadGenset->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formPs1TestOnloadGenset->form_id = $detailWorkOrderForm->form_id;
            $formPs1TestOnloadGenset->work_order_id = $detailWorkOrderForm->work_order_id;
            $formPs1TestOnloadGenset->save();
        }
        $data['formPs1TestOnloadGenset'] = FormPs1TestOnloadGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();

        //Parameter
        if (!FormPs1TestOnloadParameterGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i = 0; $i < 11; $i++) {
                $formPs1TestOnloadParameterGenset = new FormPs1TestOnloadParameterGenset();
                $formPs1TestOnloadParameterGenset->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formPs1TestOnloadParameterGenset->form_id = $detailWorkOrderForm->form_id;
                $formPs1TestOnloadParameterGenset->work_order_id = $detailWorkOrderForm->work_order_id;
                $formPs1TestOnloadParameterGenset->save();
            }
        }
        $data['formPs1TestOnloadParameterGensets'] = FormPs1TestOnloadParameterGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.power-station-1.test-onload-genset.index', $data);
    }
}
