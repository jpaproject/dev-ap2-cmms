<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLog;
use Illuminate\Http\Request;
use App\Models\FormActivityLog;
use Illuminate\Support\Facades\DB;
use App\Models\DetailWorkOrderForm;
use Illuminate\Support\Facades\Auth;
use App\Models\FormApmVehicleCarBodyHarian;
use App\Models\FormApmMekanikalVehicleMingguan;
use Illuminate\Contracts\Support\ValidatedData;
use App\Models\FormApmMekanikalVehicleBogieHarian;
use App\Models\FormApmVehicleAirBrakeSystemHarian;
use App\Models\FormApmElektrikalVehicleExteriorHarian;
use App\Models\FormApmElektrikalVehicleInteriorHarian;
use App\Models\FormApmMekanikalVehicleBogieTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorMingguan;
use App\Models\FormApmMekanikalVehicleCarbodyTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorDCTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorEHTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorJPTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorPCTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorTMTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorVVTigaBulanan;
use App\Models\FormApmElektrikalVehicleInteriorGDTigaBulanan;
use App\Models\FormApmElektrikalVehicleInteriorMCTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorBATTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorBECTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorESKTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorFJBTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorHJBTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorLHTTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorLJBTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorMDSTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorPCSTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorSIVTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorVACTigaBulanan;
use App\Models\FormApmElektrikalVehicleInteriorFDSTigaBulanan;
use App\Models\FormApmElektrikalVehicleInteriorLPLTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorHSCBTigaBulanan;
use App\Models\FormApmElektrikalVehicleInteriorTCMSTigaBulanan;
use App\Models\FormApmMekanikalVehicleAirBrakeSystemTigaBulanan;
use App\Models\FormApmElektrikalVehicleExteriorBAThasilTigaBulanan;
use App\Models\UserTechnical;

class FormApmController extends Controller
{
    public function formApmElektrikalVehicleExteriorBATTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal 3 Bulanan Battery Box & Battery';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['mc1s'] = ['Kondisi fisik Box/Panel', 'Kondisi kebersihan luar Box/Panel', 'Kondisi kebersihan dalam Box/Panel', 'Kondisi karet spon cover'];
        $data['mc2s'] = ['Check Kondisi Cairan Battery', 'Kondisi Kebersihan Battery', 'Terminasi kabel, kekencangan baut dan Labelling'];
        $data['bats'] = ['batt 1','batt 2','batt 3','batt 4','batt 5','batt 6','batt 7'];

        if (!FormApmElektrikalVehicleExteriorBATTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['mc1s'] as $key => $mc1) {
                $formApmElektrikalVehicleExteriorBATTigaBulanan = new FormApmElektrikalVehicleExteriorBATTigaBulanan();
                $formApmElektrikalVehicleExteriorBATTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorBATTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorBATTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorBATTigaBulanan->pemeriksaan_bat = $mc1;
                $formApmElektrikalVehicleExteriorBATTigaBulanan->pemeriksaan_bat_group = 'BATTERY BOX';
                if ($formApmElektrikalVehicleExteriorBATTigaBulanan->pemeriksaan_bat == 'Kondisi fisik Box/Panel') {
                    $formApmElektrikalVehicleExteriorBATTigaBulanan->referensi = 'Panel tidak penyok, tidak rusak dan tidak berkarat';
                } elseif ($formApmElektrikalVehicleExteriorBATTigaBulanan->pemeriksaan_bat == 'Kondisi kebersihan luar Box/Panel') {
                    $formApmElektrikalVehicleExteriorBATTigaBulanan->referensi = 'Panel tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorBATTigaBulanan->pemeriksaan_bat == 'Kondisi kebersihan dalam Box/Panel') {
                    $formApmElektrikalVehicleExteriorBATTigaBulanan->referensi = 'Panel tidak kotor dan bersih dari debu';
                } else {
                    $formApmElektrikalVehicleExteriorBATTigaBulanan->referensi = 'Pastikan karet spon cover tidak rusak dan tidak lepas dari Box';
                }
                $formApmElektrikalVehicleExteriorBATTigaBulanan->save();
            }
            foreach ($data['mc2s'] as $key => $mc2) {
                $formApmElektrikalVehicleExteriorBATTigaBulanan = new FormApmElektrikalVehicleExteriorBATTigaBulanan();
                $formApmElektrikalVehicleExteriorBATTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorBATTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorBATTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorBATTigaBulanan->pemeriksaan_bat = $mc2;
                $formApmElektrikalVehicleExteriorBATTigaBulanan->pemeriksaan_bat_group = 'BATTERY';
                if ($formApmElektrikalVehicleExteriorBATTigaBulanan->pemeriksaan_bat == 'Check Kondisi Cairan Battery') {
                    $formApmElektrikalVehicleExteriorBATTigaBulanan->referensi = 'Pastikan kondisi cairan Battery masih melebihi batas minimal';
                } elseif ($formApmElektrikalVehicleExteriorBATTigaBulanan->pemeriksaan_bat == 'Kondisi Kebersihan Battery') {
                    $formApmElektrikalVehicleExteriorBATTigaBulanan->referensi = 'Battery tidak kotor dan bersih dari debu';
                } else {
                    $formApmElektrikalVehicleExteriorBATTigaBulanan->referensi = 'Terminasi kabel jumper rapi, baut yang terpasang kencang. Labelling harus jelas dan dapat dibaca';
                }
                $formApmElektrikalVehicleExteriorBATTigaBulanan->save();
            }
        }
        if (!FormApmElektrikalVehicleExteriorBAThasilTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            for ($i=0; $i <10 ; $i++) { 
                foreach ($data['bats'] as $key => $bat) {
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan = new FormApmElektrikalVehicleExteriorBAThasilTigaBulanan();
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->pemeriksaan_bat = $bat;
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->pemeriksaan_bat_group = 'NILAI BATTERY';
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->referensi = '1,2 Vdc ± 5%';
                
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->save();
            }
            }
        }
        $data['formApmElektrikalVehicleExteriorBATTigaBulanans'] = FormApmElektrikalVehicleExteriorBATTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
        $data['formApmElektrikalVehicleExteriorBAThasilTigaBulanans'] = FormApmElektrikalVehicleExteriorBAThasilTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-bat-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorBATTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedDataBAT = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $validatedDataBAThasil = $request->validate([
            'hasil_pengukuran.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorBATTigaBulanans'] = FormApmElektrikalVehicleExteriorBATTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorBATTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorBATTigaBulanan) {
                $formApmElektrikalVehicleExteriorBATTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorBATTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorBATTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorBATTigaBulanan->hasil_mc1 = $validatedDataBAT['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorBATTigaBulanan->referensi = $validatedDataBAT['referensi'][$key];
                $formApmElektrikalVehicleExteriorBATTigaBulanan->catatan = $validatedDataBAT['catatan'];
                $formApmElektrikalVehicleExteriorBATTigaBulanan->save();
            }

            $data['formApmElektrikalVehicleExteriorBAThasilTigaBulanans'] = FormApmElektrikalVehicleExteriorBAThasilTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorBAThasilTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorBAThasilTigaBulanan) {
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->hasil_pengukuran = $validatedDataBAThasil['hasil_pengukuran'][$key];
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->referensi = $validatedDataBAThasil['referensi'][$key];
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->catatan = $validatedDataBAThasil['catatan'];
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->save();
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
    public function formApmElektrikalVehicleInteriorFDSTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal 3 Bulanan Fire Detection System';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['mc1s'] = ['Kondisi fisik keseluruhan Fire Detection System', 'Kondisi status operasi Fire Transmitter', 'Terminasi kabel, kekencangan baut dan Labelling', 'a. sensor 00', 'b. sensor 01', 'c. sensor 02', 'a. Input DC converter', 'b. Output converter'];
        $data['mc2s'] = ['Kondisi fisik keseluruhan Fire Detection System', 'Kondisi status operasi Fire Transmitter', 'Terminasi kabel, kekencangan baut dan Labelling', 'a. sensor 00', 'b. sensor 01', 'c. sensor 02', 'a. Input DC converter', 'b. Output converter'];

        if (!FormApmElektrikalVehicleInteriorFDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['mc1s'] as $key => $mc1) {
                $formApmElektrikalVehicleInteriorFDSTigaBulanan = new FormApmElektrikalVehicleInteriorFDSTigaBulanan();
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds = $mc1;
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds_group = 'FIRE DETECTION SYSTEM MC 1';
                if ($formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'Kondisi fisik keseluruhan Fire Detection System') {
                    $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = 'Pastikan Fire Detection System tidak rusak';
                } elseif ($formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'Kondisi status operasi Fire Transmitter') {
                    $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = 'Pastikan keadaan status operasi dalam keadaan normal';
                } elseif ($formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } elseif ($formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'a. sensor 00' || $formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'b. sensor 01' || $formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'c. sensor 02') {
                    $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = 'Pastikan kondisi kerbersihan sensor fire dalam keadaan bersih dari debu';
                } elseif ($formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'a. Input DC converter') {
                    $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = '100 Vdc ± 5%';
                } else {
                    $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = '24 Vdc ± 5%';
                }
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->save();
            }
            foreach ($data['mc2s'] as $key => $mc2) {
                $formApmElektrikalVehicleInteriorFDSTigaBulanan = new FormApmElektrikalVehicleInteriorFDSTigaBulanan();
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds = $mc2;
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds_group = 'FIRE DETECTION SYSTEM MC 2';
                if ($formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'Kondisi fisik keseluruhan Fire Detection System') {
                    $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = 'Pastikan Fire Detection System tidak rusak';
                } elseif ($formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'Kondisi status operasi Fire Transmitter') {
                    $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = 'Pastikan keadaan status operasi dalam keadaan normal';
                } elseif ($formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } elseif ($formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'a. sensor 00' || $formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'b. sensor 01' || $formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'c. sensor 02') {
                    $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = 'Pastikan kondisi kerbersihan sensor fire dalam keadaan bersih dari debu';
                } elseif ($formApmElektrikalVehicleInteriorFDSTigaBulanan->pemeriksaan_fds == 'a. Input DC converter') {
                    $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = '100 Vdc ± 5%';
                } else {
                    $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = '24 Vdc ± 5%';
                }
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleInteriorFDSTigaBulanans'] = FormApmElektrikalVehicleInteriorFDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-interior-fds-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleInteriorFDSTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleInteriorFDSTigaBulanans'] = FormApmElektrikalVehicleInteriorFDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleInteriorFDSTigaBulanans'] as $key => $formApmElektrikalVehicleInteriorFDSTigaBulanan) {
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleInteriorFDSTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorPCTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle 3 Bulanan Power Collector';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['PC_MC_1s'] = ['Kondisi fisik Power Collector Shoe', 'Kondisi fisik Power Collector', 'Kondisi kebersihan Power Collector', 'Kondisi Kebersihan Braided Wire','Posisi Braided Wire','Terminasi kabel, kekencangan baut dan labelling','Kondisi ketebalan Power Collector Shoe'];
        $data['PC_MC_2s'] = ['Kondisi fisik Power Collector Shoe', 'Kondisi fisik Power Collector', 'Kondisi kebersihan Power Collector', 'Kondisi Kebersihan Braided Wire','Posisi Braided Wire','Terminasi kabel, kekencangan baut dan labelling','Kondisi ketebalan Power Collector Shoe'];

        if (!FormApmElektrikalVehicleExteriorPCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['PC_MC_1s'] as $key => $PC_MC_1) {
                $formApmElektrikalVehicleExteriorPCTigaBulanan = new FormApmElektrikalVehicleExteriorPCTigaBulanan();
                $formApmElektrikalVehicleExteriorPCTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorPCTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorPCTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc = $PC_MC_1;
                $formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc_group = 'POWER COLLECTOR (MC 1)';
                if ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Kondisi fisik Power Collector Shoe') {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Power Collector shoe tidak rusak, apabila rusak Power Collector Shoe harus diganti';
                } elseif ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Kondisi fisik Power Collector') {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Pastikan Power Collector tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Kondisi kebersihan Power Collector') {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Kompenen - komponen Power Collector bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Kondisi Kebersihan Braided Wire') {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Pastikan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Posisi Braided Wire') {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Pastikan posisi Braided Wire sejajar';
                } elseif ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Terminasi kabel, kekencangan baut dan labelling') {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } else {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Ketebalan Maksimal 42 mm Ketebalan Minimal 34 mm';
                }
                $formApmElektrikalVehicleExteriorPCTigaBulanan->save();
            }
            foreach ($data['PC_MC_2s'] as $key => $PC_MC_2) {
                $formApmElektrikalVehicleExteriorPCTigaBulanan = new FormApmElektrikalVehicleExteriorPCTigaBulanan();
                $formApmElektrikalVehicleExteriorPCTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorPCTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorPCTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc = $PC_MC_2;
                $formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc_group = 'POWER COLLECTOR (MC 2)';
                if ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Kondisi fisik Power Collector Shoe') {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Power Collector shoe tidak rusak, apabila rusak Power Collector Shoe harus diganti';
                } elseif ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Kondisi fisik Power Collector') {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Pastikan Power Collector tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Kondisi kebersihan Power Collector') {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Kompenen - komponen Power Collector bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Kondisi Kebersihan Braided Wire') {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Pastikan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Posisi Braided Wire') {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Pastikan posisi Braided Wire sejajar';
                } elseif ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Terminasi kabel, kekencangan baut dan labelling') {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } else {
                    $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = 'Ketebalan Maksimal 42 mm Ketebalan Minimal 34 mm';
                }
                $formApmElektrikalVehicleExteriorPCTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorPCTigaBulanans'] = FormApmElektrikalVehicleExteriorPCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-pc-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorPCTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'hasil_pc1_plus.*' => ['nullable'],
            'hasil_pc2_plus.*' => ['nullable'],
            'hasil_pc3_plus.*' => ['nullable'],
            'hasil_pc4_plus.*' => ['nullable'],
            'hasil_pc1_min.*' => ['nullable'],
            'hasil_pc2_min.*' => ['nullable'],
            'hasil_pc3_min.*' => ['nullable'],
            'hasil_pc4_min.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorPCTigaBulanans'] = FormApmElektrikalVehicleExteriorPCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorPCTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorPCTigaBulanan) {
                $formApmElektrikalVehicleExteriorPCTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorPCTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorPCTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;

                $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc1_plus = $validatedData['hasil_pc1_plus'][$key];
                $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc2_plus = $validatedData['hasil_pc2_plus'][$key];
                $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc3_plus = $validatedData['hasil_pc3_plus'][$key];
                $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc4_plus = $validatedData['hasil_pc4_plus'][$key];
                $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc1_min = $validatedData['hasil_pc1_min'][$key];
                $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc2_min = $validatedData['hasil_pc2_min'][$key];
                $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc3_min = $validatedData['hasil_pc3_min'][$key];
                $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc4_min = $validatedData['hasil_pc4_min'][$key];
                $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorPCTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorPCTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorVVTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle VVVF INVERTER';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['sivs'] = ['Kondisi fisik BOX', 'Kondisi kebersihan luar BOX', 'Kondisi kebersihan didalam BOX', 'Kondisi karet spon cover dan karet spon blower', 'Kondisi filter cover', 'Kondisi fisik setiap komponen yang ada di VVVF', 'Terminasi kabel, kekencangan baut dan Labelling', 'a. Kondisi Line Switch (LS 1)','a. Kondisi Line Switch (LS 2)','a. Kondisi Line Switch (LS 3)', 'b. Kondisi Connector Line Switch (LS 1)','b. Kondisi Connector Line Switch (LS 2)','b. Kondisi Connector Line Switch (LS 3)'];

        if (!FormApmElektrikalVehicleExteriorVVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['sivs'] as $key => $siv) {
                $formApmElektrikalVehicleExteriorVVTigaBulanan = new FormApmElektrikalVehicleExteriorVVTigaBulanan();
                $formApmElektrikalVehicleExteriorVVTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorVVTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorVVTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv = $siv;
                $formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv_group = 'VVVF INVERTER';
                if ($formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv == 'Kondisi fisik BOX') {
                    $formApmElektrikalVehicleExteriorVVTigaBulanan->referensi = 'BOX tidak penyok, tidak rusak dan tidak berkarat';
                } elseif ($formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv == 'Kondisi kebersihan luar BOX') {
                    $formApmElektrikalVehicleExteriorVVTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv == 'Kondisi kebersihan didalam BOX') {
                    $formApmElektrikalVehicleExteriorVVTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv == 'Kondisi karet spon cover dan karet spon blower') {
                    $formApmElektrikalVehicleExteriorVVTigaBulanan->referensi = 'Pastikan karet spon cover tidak rusak dan tidak lepas dari Box';
                } elseif ($formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv == 'Kondisi filter cover') {
                    $formApmElektrikalVehicleExteriorVVTigaBulanan->referensi = 'Filter cover tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv == 'Kondisi fisik setiap komponen yang ada di VVVF') {
                    $formApmElektrikalVehicleExteriorVVTigaBulanan->referensi = 'Pastikan tidak ada kerusakan pada setiap komponen yang ada di VVVF';
                } elseif ($formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv == 'a. Kondisi Line Switch (LS 1)' || $formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv == 'a. Kondisi Line Switch (LS 2)' || $formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv == 'a. Kondisi Line Switch (LS 3)') {
                        $formApmElektrikalVehicleExteriorVVTigaBulanan->referensi = 'Pastikan tidak ada kerusakan atau adanya indikasi terbakarnya line switch';
                } elseif ($formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv == 'b. Kondisi Connector Line Switch (LS 1)'|| $formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv == 'b. Kondisi Connector Line Switch (LS 2)' || $formApmElektrikalVehicleExteriorVVTigaBulanan->pemeriksaan_vv == 'b. Kondisi Connector Line Switch (LS 3)') {
                        $formApmElektrikalVehicleExteriorVVTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih';
            } else {
                    $formApmElektrikalVehicleExteriorVVTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labellingharus rapi dan jelas di baca';
                } 
                $formApmElektrikalVehicleExteriorVVTigaBulanan->save(); 
            }
        }
        $data['formApmElektrikalVehicleExteriorVVTigaBulanans'] = FormApmElektrikalVehicleExteriorVVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-vv-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorVVTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorVVTigaBulanans'] = FormApmElektrikalVehicleExteriorVVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorVVTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorVVTigaBulanan) {
                $formApmElektrikalVehicleExteriorVVTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorVVTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorVVTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorVVTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorVVTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorVVTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorVVTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorMDSTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle MDS & Fuse Box';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['mc1s'] = ['Kondisi fisik BOX', 'Kondisi kebersihan luar BOX', 'Kondisi kebersihan dalam BOX', 'Kondisi karet spon cover', 'a. MS (Main Switch)','b. DS ( Disconecting Switch )','c. GS ( Grounding Switch )','Terminasi kabel, kekencangan baut dan Labelling'];
        $data['mc2s'] = ['Kondisi fisik BOX', 'Kondisi kebersihan luar BOX', 'Kondisi kebersihan dalam BOX', 'Kondisi karet spon cover', 'Kondisi Fuse', 'Terminasi kabel, kekencangan baut dan Labelling'];

        if (!FormApmElektrikalVehicleExteriorMDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['mc1s'] as $key => $mc1) {
                $formApmElektrikalVehicleExteriorMDSTigaBulanan = new FormApmElektrikalVehicleExteriorMDSTigaBulanan();
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds = $mc1;
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds_group = 'MDS BOX';
                if ($formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds == 'Kondisi fisik BOX') {
                    $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = 'BOX tidak penyok, tidak rusak dan tidak berkarat';
                } elseif ($formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds == 'Kondisi kebersihan luar BOX') {
                    $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = 'Box tidak kotor dan bersih dari debu.';
                } elseif ($formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds == 'Kondisi kebersihan dalam BOX') {
                    $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = 'Box tidak kotor dan bersih dari debu.';
                } elseif ($formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } elseif ($formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds == 'Kondisi karet spon cover') {
                    $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = 'Pastikan karet spon cover tidak rusak dan tidak lepas dari Box';
                }
                else {
                    $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = 'Knife Switch dalam keadaan tidak rusak, tidak kotor/bersih dari debu, dan terlumasi oleh grease. Pastikan Perpindahan posisi Knife switch dari MS ke DS bisa dilakukan';
                    
                }
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->save();
            }
            foreach ($data['mc2s'] as $key => $mc2) {
                $formApmElektrikalVehicleExteriorMDSTigaBulanan = new FormApmElektrikalVehicleExteriorMDSTigaBulanan();
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds = $mc2;
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds_group = 'FUSE BOX';
                if ($formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds == 'Kondisi fisik BOX') {
                    $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = 'BOX tidak penyok, tidak rusak dan tidak berkarat';
                } elseif ($formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds == 'Kondisi kebersihan luar BOX') {
                    $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = 'Box tidak kotor dan bersih dari debu.';
                } elseif ($formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds == 'Kondisi kebersihan dalam BOX') {
                    $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = 'Box tidak kotor dan bersih dari debu.';
                } elseif ($formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } elseif ($formApmElektrikalVehicleExteriorMDSTigaBulanan->pemeriksaan_mds == 'Kondisi karet spon cover') {
                    $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = 'Pastikan karet spon cover tidak rusak dan tidak lepas dari Box';
                } else {
                    $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = 'Pastikan Fuse masih layak digunakan dan tidak ada indikasi merah yang menonjol keluar';
                }
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorMDSTigaBulanans'] = FormApmElektrikalVehicleExteriorMDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-mds-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorMDSTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorMDSTigaBulanans'] = FormApmElektrikalVehicleExteriorMDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorMDSTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorMDSTigaBulanan) {
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorMDSTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorJPTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal JUMPER PLUG';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['mc1s'] = ['Kondisi fisik Jumper Plug', 'Kondisi kebersihan luar', 'Kondisi fisik permukaan Contact', 'Kondisi fisik Isolasi Jumper Plug', 'Kondisi kekencangan Jumper Plug'];
        $data['mc2s'] = ['Kondisi fisik Jumper Plug', 'Kondisi kebersihan luar', 'Kondisi fisik permukaan Contact', 'Kondisi fisik Isolasi Jumper Plug', 'Kondisi kekencangan Jumper Plug'];

        if (!FormApmElektrikalVehicleExteriorJPTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['mc1s'] as $key => $mc1) {
                $formApmElektrikalVehicleExteriorJPTigaBulanan = new FormApmElektrikalVehicleExteriorJPTigaBulanan();
                $formApmElektrikalVehicleExteriorJPTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorJPTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorJPTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp = $mc1;
                $formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp_group = 'JUMPER PLUG HJB MC 1 to HJB MC 2';
                if ($formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp == 'Kondisi fisik Jumper Plug') {
                    $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi = 'Jumper Plug tidak tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp == 'Kondisi kebersihan luar') {
                    $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp == 'Kondisi fisik permukaan Contact') {
                    $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi = 'Pastikan pada fisik Contact tidak terjadi tidak retak dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp == 'Kondisi fisik Isolasi Jumper Plug') {
                    $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi = 'Pastikan isolasi Jumper Plug masih bagus dan tidak rusak';
                } else {
                    $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi = 'Pastikan kekencangan Jumper Plug ke Connector Receptacle tidak oblak';
                }
                $formApmElektrikalVehicleExteriorJPTigaBulanan->save();
            }
            foreach ($data['mc2s'] as $key => $mc2) {
                $formApmElektrikalVehicleExteriorJPTigaBulanan = new FormApmElektrikalVehicleExteriorJPTigaBulanan();
                $formApmElektrikalVehicleExteriorJPTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorJPTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorJPTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp = $mc2;
                $formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp_group = 'JUMPER PLUG LJB MC 1 to LJB MC 2';
                if ($formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp == 'Kondisi fisik Jumper Plug') {
                    $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi = 'Jumper Plug tidak tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp == 'Kondisi kebersihan luar') {
                    $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp == 'Kondisi fisik permukaan Contact') {
                    $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi = 'Pastikan pada fisik Contact tidak terjadi tidak retak dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp == 'Kondisi fisik Isolasi Jumper Plug') {
                    $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi = 'Pastikan isolasi Jumper Plug masih bagus dan tidak rusak';
                } else {
                    $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi = 'Pastikan kekencangan Jumper Plug ke Connector Receptacle tidak oblak';
                }
                $formApmElektrikalVehicleExteriorJPTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorJPTigaBulanans'] = FormApmElektrikalVehicleExteriorJPTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-jp-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorJPTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorJPTigaBulanans'] = FormApmElektrikalVehicleExteriorJPTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorJPTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorJPTigaBulanan) {
                $formApmElektrikalVehicleExteriorJPTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorJPTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorJPTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorJPTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorJPTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorEHTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal ELECTRIC HORN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['mc1s'] = ['Kondisi fisik Electric Horn', 'Kondisi kebersihan Electric Horn', 'Terminasi kabel, kekencangan baut dan Labelling', 'Check fungsi kerja Electric Horn', 'Lakukan pengukuran tegangan input'];
        $data['mc2s'] = ['Kondisi fisik Electric Horn', 'Kondisi kebersihan Electric Horn', 'Terminasi kabel, kekencangan baut dan Labelling', 'Check fungsi kerja Electric Horn', 'Lakukan pengukuran tegangan input'];

        if (!FormApmElektrikalVehicleExteriorEHTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['mc1s'] as $key => $mc1) {
                $formApmElektrikalVehicleExteriorEHTigaBulanan = new FormApmElektrikalVehicleExteriorEHTigaBulanan();
                $formApmElektrikalVehicleExteriorEHTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorEHTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorEHTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorEHTigaBulanan->pemeriksaan_eh = $mc1;
                $formApmElektrikalVehicleExteriorEHTigaBulanan->pemeriksaan_eh_group = 'ELECTRIC HORN MC 1';
                if ($formApmElektrikalVehicleExteriorEHTigaBulanan->pemeriksaan_eh == 'Kondisi fisik Electric Horn') {
                    $formApmElektrikalVehicleExteriorEHTigaBulanan->referensi = 'Electric Horn tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorEHTigaBulanan->pemeriksaan_eh == 'Kondisi kebersihan Electric Horn') {
                    $formApmElektrikalVehicleExteriorEHTigaBulanan->referensi = 'Pastikan kondisi kerbersihan sensor fire dalam keadaan bersih dari debu.';
                } elseif ($formApmElektrikalVehicleExteriorEHTigaBulanan->pemeriksaan_eh == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleExteriorEHTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } elseif ($formApmElektrikalVehicleExteriorEHTigaBulanan->pemeriksaan_eh == 'Check fungsi kerja Electric Horn') {
                    $formApmElektrikalVehicleExteriorEHTigaBulanan->referensi = 'Pastikan berfungsi dengan baik';
                } else {
                    $formApmElektrikalVehicleExteriorEHTigaBulanan->referensi = '24 Vdc ± 5%';
                }
                $formApmElektrikalVehicleExteriorEHTigaBulanan->save();
            }
            foreach ($data['mc2s'] as $key => $mc2) {
                $formApmElektrikalVehicleExteriorEHTigaBulanan = new FormApmElektrikalVehicleExteriorEHTigaBulanan();
                $formApmElektrikalVehicleExteriorEHTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorEHTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorEHTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorEHTigaBulanan->pemeriksaan_eh = $mc2;
                $formApmElektrikalVehicleExteriorEHTigaBulanan->pemeriksaan_eh_group = 'ELECTRIC HORN MC 2';
                if ($formApmElektrikalVehicleExteriorEHTigaBulanan->pemeriksaan_eh == 'Kondisi fisik Electric Horn') {
                    $formApmElektrikalVehicleExteriorEHTigaBulanan->referensi = 'Electric Horn tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorEHTigaBulanan->pemeriksaan_eh == 'Kondisi kebersihan Electric Horn') {
                    $formApmElektrikalVehicleExteriorEHTigaBulanan->referensi = 'Pastikan kondisi kerbersihan sensor fire dalam keadaan bersih dari debu.';
                } elseif ($formApmElektrikalVehicleExteriorEHTigaBulanan->pemeriksaan_eh == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleExteriorEHTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } elseif ($formApmElektrikalVehicleExteriorEHTigaBulanan->pemeriksaan_eh == 'Check fungsi kerja Electric Horn') {
                    $formApmElektrikalVehicleExteriorEHTigaBulanan->referensi = 'Pastikan berfungsi dengan baik';
                } else {
                    $formApmElektrikalVehicleExteriorEHTigaBulanan->referensi = '24 Vdc ± 5%';
                }
                $formApmElektrikalVehicleExteriorEHTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorEHTigaBulanans'] = FormApmElektrikalVehicleExteriorEHTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-eh-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorEHTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorEHTigaBulanans'] = FormApmElektrikalVehicleExteriorEHTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorEHTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorEHTigaBulanan) {
                $formApmElektrikalVehicleExteriorEHTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorEHTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorEHTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorEHTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorEHTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleExteriorEHTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorEHTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorEHTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorVACTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal VENTILATION AND AIR CONDITION';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['mc1s'] = ['Kondisi fisik VAC Unit', 'Kondisi kebersihan VAC Unit', 'Kebersihan fiter udara VAC Unit', 'Terminasi kabel, kekencangan baut dan Labelling', 'Fungsi VAC Unit'];
        $data['mc2s'] = ['Kondisi fisik VAC Unit', 'Kondisi kebersihan VAC Unit', 'Kebersihan fiter udara VAC Unit', 'Terminasi kabel, kekencangan baut dan Labelling', 'Fungsi VAC Unit'];

        if (!FormApmElektrikalVehicleExteriorVACTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['mc1s'] as $key => $mc1) {
                $formApmElektrikalVehicleExteriorVACTigaBulanan = new FormApmElektrikalVehicleExteriorVACTigaBulanan();
                $formApmElektrikalVehicleExteriorVACTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorVACTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorVACTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorVACTigaBulanan->pemeriksaan_vac = $mc1;
                $formApmElektrikalVehicleExteriorVACTigaBulanan->pemeriksaan_vac_group = 'VENTILATION AND AIR CONDITION (VAC) UNIT MC 1';
                if ($formApmElektrikalVehicleExteriorVACTigaBulanan->pemeriksaan_vac == 'Kondisi fisik VAC Unit') {
                    $formApmElektrikalVehicleExteriorVACTigaBulanan->referensi = 'VAC Unit penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorVACTigaBulanan->pemeriksaan_vac == 'Kondisi kebersihan VAC Unit') {
                    $formApmElektrikalVehicleExteriorVACTigaBulanan->referensi = 'Pastikan VAC Unit tidak kotor dan bersih dari debu.';
                } elseif ($formApmElektrikalVehicleExteriorVACTigaBulanan->pemeriksaan_vac == 'Kebersihan fiter udara VAC Unit') {
                    $formApmElektrikalVehicleExteriorVACTigaBulanan->referensi = 'Filter udara VAC dalam keadaan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorVACTigaBulanan->pemeriksaan_vac == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleExteriorVACTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } else {
                    $formApmElektrikalVehicleExteriorVACTigaBulanan->referensi = 'Pastikan VAC unit berfungsi secara normal';
                }
                $formApmElektrikalVehicleExteriorVACTigaBulanan->save();
            }
            foreach ($data['mc2s'] as $key => $mc2) {
                $formApmElektrikalVehicleExteriorVACTigaBulanan = new FormApmElektrikalVehicleExteriorVACTigaBulanan();
                $formApmElektrikalVehicleExteriorVACTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorVACTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorVACTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorVACTigaBulanan->pemeriksaan_vac = $mc2;
                $formApmElektrikalVehicleExteriorVACTigaBulanan->pemeriksaan_vac_group = 'VENTILATION AND AIR CONDITION (VAC) UNIT MC 2';
                if ($formApmElektrikalVehicleExteriorVACTigaBulanan->pemeriksaan_vac == 'Kondisi fisik VAC Unit') {
                    $formApmElektrikalVehicleExteriorVACTigaBulanan->referensi = 'VAC Unit penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorVACTigaBulanan->pemeriksaan_vac == 'Kondisi kebersihan VAC Unit') {
                    $formApmElektrikalVehicleExteriorVACTigaBulanan->referensi = 'Pastikan VAC Unit tidak kotor dan bersih dari debu.';
                } elseif ($formApmElektrikalVehicleExteriorVACTigaBulanan->pemeriksaan_vac == 'Kebersihan fiter udara VAC Unit') {
                    $formApmElektrikalVehicleExteriorVACTigaBulanan->referensi = 'Filter udara VAC dalam keadaan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorVACTigaBulanan->pemeriksaan_vac == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleExteriorVACTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                }  else {
                    $formApmElektrikalVehicleExteriorVACTigaBulanan->referensi = 'Pastikan VAC unit berfungsi secara normal';
                }
                $formApmElektrikalVehicleExteriorVACTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorVACTigaBulanans'] = FormApmElektrikalVehicleExteriorVACTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-vac-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorVACTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorVACTigaBulanans'] = FormApmElektrikalVehicleExteriorVACTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorVACTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorVACTigaBulanan) {
                $formApmElektrikalVehicleExteriorVACTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorVACTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorVACTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorVACTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorVACTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleExteriorVACTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorVACTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorVACTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorTMTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle Traction Motor';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['mc1s'] = ['Kondisi fisik Traction Motor', 'Kondisi kebersihan Traction Motor', 'Check kondisi Filter Traction Motor','Terminasi kabel, kekencangan baut dan Labelling, Terminasi kabel dan kekencangan baut', 'Cek kondisi grease pada bearing Traction Motor', 'Cek konektor kabel, kekencangan baut pada Speed Sensor'];
        $data['mc2s'] = ['Kondisi fisik Traction Motor', 'Kondisi kebersihan Traction Motor', 'Check kondisi Filter Traction Motor','Terminasi kabel, kekencangan baut dan Labelling, Terminasi kabel dan kekencangan baut', 'Cek kondisi grease pada bearing Traction Motor', 'Cek konektor kabel, kekencangan baut pada Speed Sensor'];

        if (!FormApmElektrikalVehicleExteriorTMTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['mc1s'] as $key => $mc1) {
                $formApmElektrikalVehicleExteriorTMTigaBulanan = new FormApmElektrikalVehicleExteriorTMTigaBulanan();
                $formApmElektrikalVehicleExteriorTMTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorTMTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorTMTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm = $mc1;
                $formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm_group = 'TRACTION MOTOR MC 1';
                if ($formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm == 'Kondisi fisik Traction Motor') {
                    $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = 'Traction Motor tidak rusak dan tidak berkarat';
                } elseif ($formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm == 'Kondisi kebersihan Traction Motor') {
                    $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = 'Traction Motor tidak kotor dan bersih dari debu serta pastikan tidak ada rembesan grease.';
                } elseif ($formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm == 'Check kondisi Filter Traction Motor') {
                    $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = 'Pastikan filter Traction Motor tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm == 'Cek kondisi grease pada bearing Traction Motor') {
                    $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = 'Pastikan bearing Traction Motor terlumasi grease';
                } elseif ($formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm == 'Terminasi kabel, kekencangan baut dan Labelling, Terminasi kabel dan kekencangan baut') {
                    $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } else {
                    $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = 'Pastikan konenktor kabel tidak longgar atau rusak dan pastikan baut yang terpasang kencang';
                }
                $formApmElektrikalVehicleExteriorTMTigaBulanan->save();
            }
            foreach ($data['mc2s'] as $key => $mc2) {
                $formApmElektrikalVehicleExteriorTMTigaBulanan = new FormApmElektrikalVehicleExteriorTMTigaBulanan();
                $formApmElektrikalVehicleExteriorTMTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorTMTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorTMTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm = $mc2;
                $formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm_group = 'TRACTION MOTOR MC 2';
                if ($formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm == 'Kondisi fisik Traction Motor') {
                    $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = 'Traction Motor tidak rusak dan tidak berkarat';
                } elseif ($formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm == 'Kondisi kebersihan Traction Motor') {
                    $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = 'Traction Motor tidak kotor dan bersih dari debu serta pastikan tidak ada rembesan grease.';
                } elseif ($formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm == 'Check kondisi Filter Traction Motor') {
                    $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = 'Pastikan filter Traction Motor tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm == 'Cek kondisi grease pada bearing Traction Motor') {
                    $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = 'Pastikan bearing Traction Motor terlumasi grease';
                } elseif ($formApmElektrikalVehicleExteriorTMTigaBulanan->pemeriksaan_tm == 'Terminasi kabel, kekencangan baut dan Labelling, Terminasi kabel dan kekencangan baut') {
                    $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } else {
                    $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = 'Pastikan konenktor kabel tidak longgar atau rusak dan pastikan baut yang terpasang kencang';
                }
                $formApmElektrikalVehicleExteriorTMTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorTMTigaBulanans'] = FormApmElektrikalVehicleExteriorTMTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-tm-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorTMTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorTMTigaBulanans'] = FormApmElektrikalVehicleExteriorTMTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorTMTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorTMTigaBulanan) {
                $formApmElektrikalVehicleExteriorTMTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorTMTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorTMTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorTMTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorTMTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleExteriorTMTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorTMTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorTMTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorLHTTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle LED HEAD TAIL LIGHT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['mc1s'] = ['Kondisi fisik body dan cover secara keseluruhan', 'Kondisi kebersihan PCB Led Head Tail Light', 'Kondisi kebersihan dalam cover', 'Kondisi fisik Converter', 'Kondisi Connector, Terminasi kabel dan kekencangan baut', 'Kondisi pencahayaan Led Head Tail Light'];
        $data['mc2s'] = ['Kondisi fisik body dan cover secara keseluruhan', 'Kondisi kebersihan PCB Led Head Tail Light', 'Kondisi kebersihan dalam cover', 'Kondisi fisik Converter', 'Kondisi Connector, Terminasi kabel dan kekencangan baut', 'Kondisi pencahayaan Led Head Tail Light'];

        if (!FormApmElektrikalVehicleExteriorLHTTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['mc1s'] as $key => $mc1) {
                $formApmElektrikalVehicleExteriorLHTTigaBulanan = new FormApmElektrikalVehicleExteriorLHTTigaBulanan();
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht = $mc1;
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht_group = 'LED HEAD TAIL LIGHT MC 1';
                if ($formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht == 'Kondisi fisik body dan cover secara keseluruhan') {
                    $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = 'BOX tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht == 'Kondisi kebersihan PCB Led Head Tail Light') {
                    $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = 'Pastikan PCB Led Head Tail Light tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht == 'Kondisi kebersihan dalam cover') {
                    $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht == 'Kondisi fisik Converter') {
                    $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = 'Pastikan Converter tidak ada karat atau kerusakan';
                }  elseif ($formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht == 'Kondisi Connector, Terminasi kabel dan kekencangan baut') {
                    $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = 'Pastikan connector tidak rusak serta berkarat, terminasi rapi dan baut yang terpasang kencang';
                } else {
                    $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = 'Pastikan Pencahayaan Led Head Tail Light masih layak untuk';
                }
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->save();
            }
            foreach ($data['mc2s'] as $key => $mc2) {
                $formApmElektrikalVehicleExteriorLHTTigaBulanan = new FormApmElektrikalVehicleExteriorLHTTigaBulanan();
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht = $mc2;
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht_group = 'LED HEAD TAIL LIGHT MC 2';
                if ($formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht == 'Kondisi fisik body dan cover secara keseluruhan') {
                    $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = 'BOX tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht == 'Kondisi kebersihan PCB Led Head Tail Light') {
                    $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = 'Pastikan PCB Led Head Tail Light tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht == 'Kondisi kebersihan dalam cover') {
                    $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht == 'Kondisi fisik Converter') {
                    $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = 'Pastikan Converter tidak ada karat atau kerusakan';
                }  elseif ($formApmElektrikalVehicleExteriorLHTTigaBulanan->pemeriksaan_lht == 'Kondisi Connector, Terminasi kabel dan kekencangan baut') {
                    $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = 'Pastikan connector tidak rusak serta berkarat, terminasi rapi dan baut yang terpasang kencang';
                } else {
                    $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = 'Pastikan Pencahayaan Led Head Tail Light masih layak untuk';
                }
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorLHTTigaBulanans'] = FormApmElektrikalVehicleExteriorLHTTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-lht-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorLHTTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorLHTTigaBulanans'] = FormApmElektrikalVehicleExteriorLHTTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorLHTTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorLHTTigaBulanan) {
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorLHTTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorSIVTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle STATIC INVERTER (SIV)';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['sivs'] = ['Kondisi fisik BOX', 'Kondisi kebersihan luar BOX', 'Kondisi kebersihan didalam BOX', 'Kondisi karet spon cover', 'Kondisi Fuse IVS (Inverter Input Knife Switch) / IVF (Inverter Input Fuse)', 'Kondisi Selector pada Switch Unit', 'Posisi MCCB Inverter Unit','Posisi MCCB Rectifier Unit','Terminasi kabel, kekencangan baut dan Labelling'];

        if (!FormApmElektrikalVehicleExteriorSIVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['sivs'] as $key => $siv) {
                $formApmElektrikalVehicleExteriorSIVTigaBulanan = new FormApmElektrikalVehicleExteriorSIVTigaBulanan();
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->pemeriksaan_siv = $siv;
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->pemeriksaan_siv_group = 'STATIC INVERTER (SIV)';
                if ($formApmElektrikalVehicleExteriorSIVTigaBulanan->pemeriksaan_siv == 'Kondisi fisik BOX') {
                    $formApmElektrikalVehicleExteriorSIVTigaBulanan->referensi = 'BOX tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorSIVTigaBulanan->pemeriksaan_siv == 'Kondisi kebersihan luar BOX') {
                    $formApmElektrikalVehicleExteriorSIVTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorSIVTigaBulanan->pemeriksaan_siv == 'Kondisi kebersihan didalam BOX') {
                    $formApmElektrikalVehicleExteriorSIVTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorSIVTigaBulanan->pemeriksaan_siv == 'Kondisi karet spon cover') {
                    $formApmElektrikalVehicleExteriorSIVTigaBulanan->referensi = 'Pastikan karet spon cover tidak rusak dan tidak lepas dari Box';
                } elseif ($formApmElektrikalVehicleExteriorSIVTigaBulanan->pemeriksaan_siv == 'Kondisi Fuse IVS (Inverter Input Knife Switch) / IVF (Inverter Input Fuse)') {
                    $formApmElektrikalVehicleExteriorSIVTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } elseif ($formApmElektrikalVehicleExteriorSIVTigaBulanan->pemeriksaan_siv == 'Kondisi Selector pada Switch Unit') {
                    $formApmElektrikalVehicleExteriorSIVTigaBulanan->referensi = 'Pastikan dalam kondisi Run, serta kondisi selector bisa di pindah kan dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorSIVTigaBulanan->pemeriksaan_siv == 'Posisi MCCB Inverter Unit' || $formApmElektrikalVehicleExteriorSIVTigaBulanan->pemeriksaan_siv == 'Posisi MCCB Rectifier Unit') {
                    $formApmElektrikalVehicleExteriorSIVTigaBulanan->referensi = 'Pastikan dalam kondisi ON';
                } else {
                    $formApmElektrikalVehicleExteriorSIVTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                }
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorSIVTigaBulanans'] = FormApmElektrikalVehicleExteriorSIVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-siv-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorSIVTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorSIVTigaBulanans'] = FormApmElektrikalVehicleExteriorSIVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorSIVTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorSIVTigaBulanan) {
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorSIVTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorPCSTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle POWER CHANGEOVER SWITCH (PCS) BOX';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['pcss'] = ['Kondisi fisik BOX', 'Kondisi kebersihan luar BOX', 'Kondisi kebersihan dalam BOX', 'Kondisi karet spon cover', 'Terminasi kabel, kekencangan baut dan Labelling', 'Kondisi fisik Selector CAM S/W', 'Check perpindahan power collector ke Stinger Coupler'];

        if (!FormApmElektrikalVehicleExteriorPCSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['pcss'] as $key => $pcs) {
                $formApmElektrikalVehicleExteriorPCSTigaBulanan = new FormApmElektrikalVehicleExteriorPCSTigaBulanan();
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->pemeriksaan_pcs = $pcs;
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->pemeriksaan_pcs_group = 'POWER CHANGEOVER SWITCH (PCS) BOX';
                if ($formApmElektrikalVehicleExteriorPCSTigaBulanan->pemeriksaan_pcs == 'Kondisi fisik BOX') {
                    $formApmElektrikalVehicleExteriorPCSTigaBulanan->referensi = 'BOX tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorPCSTigaBulanan->pemeriksaan_pcs == 'Kondisi kebersihan luar BOX') {
                    $formApmElektrikalVehicleExteriorPCSTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorPCSTigaBulanan->pemeriksaan_pcs == 'Kondisi kebersihan dalam BOX') {
                    $formApmElektrikalVehicleExteriorPCSTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorPCSTigaBulanan->pemeriksaan_pcs == 'Kondisi karet spon cover') {
                    $formApmElektrikalVehicleExteriorPCSTigaBulanan->referensi = 'Pastikan karet spon cover tidak rusak dan tidak lepas dari Box';
                } elseif ($formApmElektrikalVehicleExteriorPCSTigaBulanan->pemeriksaan_pcs == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleExteriorPCSTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labeling harus rapi dan jelas di baca';
                } elseif ($formApmElektrikalVehicleExteriorPCSTigaBulanan->pemeriksaan_pcs == 'Kondisi fisik Selector CAM S/W') {
                    $formApmElektrikalVehicleExteriorPCSTigaBulanan->referensi = 'Selector CAM S/W tidak patah atau tidak rusak';
                } else {
                    $formApmElektrikalVehicleExteriorPCSTigaBulanan->referensi = 'Pastikan kondisi perpindahan selector dari power collector ke stinger coupler ter koneksi';
                }
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorPCSTigaBulanans'] = FormApmElektrikalVehicleExteriorPCSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-pcs-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorPCSTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorPCSTigaBulanans'] = FormApmElektrikalVehicleExteriorPCSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorPCSTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorPCSTigaBulanan) {
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorPCSTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorLJBTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle LOW TENSION JUNCTION BOX (LJB)';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['ljbs'] = ['Kondisi fisik BOX', 'Kondisi kebersihan luar BOX', 'Kondisi kebersihan didalam BOX', 'Kondisi karet spon cover', 'Terminasi kabel, kekencangan baut dan Labelling', 'Kondisi terminal Block', 'Kondisi Kekencangan Receptacle dan terminal Block'];

        if (!FormApmElektrikalVehicleExteriorLJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['ljbs'] as $key => $ljb) {
                $formApmElektrikalVehicleExteriorLJBTigaBulanan = new FormApmElektrikalVehicleExteriorLJBTigaBulanan();
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->pemeriksaan_ljb = $ljb;
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->pemeriksaan_ljb_group = 'LOW TENSION JUNCTION BOX (LJB)';
                if ($formApmElektrikalVehicleExteriorLJBTigaBulanan->pemeriksaan_ljb == 'Kondisi fisik BOX') {
                    $formApmElektrikalVehicleExteriorLJBTigaBulanan->referensi = 'BOX tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorLJBTigaBulanan->pemeriksaan_ljb == 'Kondisi kebersihan luar BOX') {
                    $formApmElektrikalVehicleExteriorLJBTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorLJBTigaBulanan->pemeriksaan_ljb == 'Kondisi kebersihan didalam BOX') {
                    $formApmElektrikalVehicleExteriorLJBTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorLJBTigaBulanan->pemeriksaan_ljb == 'Kondisi karet spon cover') {
                    $formApmElektrikalVehicleExteriorLJBTigaBulanan->referensi = 'Pastikan karet spon cover tidak rusak dan tidak lepas dari Box';
                } elseif ($formApmElektrikalVehicleExteriorLJBTigaBulanan->pemeriksaan_ljb == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleExteriorLJBTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } elseif ($formApmElektrikalVehicleExteriorLJBTigaBulanan->pemeriksaan_ljb == 'Kondisi terminal Block') {
                    $formApmElektrikalVehicleExteriorLJBTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada indikasi perubahan warna';
                } else {
                    $formApmElektrikalVehicleExteriorLJBTigaBulanan->referensi = 'Pastikan marking Receptacle dan marking Terminal Block sejajar';
                }
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorLJBTigaBulanans'] = FormApmElektrikalVehicleExteriorLJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-ljb-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorLJBTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorLJBTigaBulanans'] = FormApmElektrikalVehicleExteriorLJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorLJBTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorLJBTigaBulanan) {
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorLJBTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorHSCBTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle HIGH SPEED CIRCUIT BRAKE (HSCB)';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['hscbs'] = ['Kondisi fisik BOX', 'Kondisi kebersihan luar BOX', 'Kondisi kebersihan didalam BOX', 'Kondisi tampilan GRID', 'Kondisi ARC CHUTE', 'Kondisi tampilan ARC HORN', 'Kondisi Main contact','Kondisi koneksi auxiliary contact','Kondisi Braided wire','Terminasi kabel, kekencangan baut dan Labelling','Kondisi grease permukaan sliding'];

        if (!FormApmElektrikalVehicleExteriorHSCBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['hscbs'] as $key => $hscb) {
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan = new FormApmElektrikalVehicleExteriorHSCBTigaBulanan();
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->pemeriksaan_hscb = $hscb;
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->pemeriksaan_hscb_group = 'HIGH SPEED CIRCUIT BRAKE (HSCB)';
                if ($formApmElektrikalVehicleExteriorHSCBTigaBulanan->pemeriksaan_hscb == 'Kondisi fisik BOX') {
                    $formApmElektrikalVehicleExteriorHSCBTigaBulanan->referensi = 'BOX tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorHSCBTigaBulanan->pemeriksaan_hscb == 'Kondisi kebersihan luar BOX') {
                    $formApmElektrikalVehicleExteriorHSCBTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorHSCBTigaBulanan->pemeriksaan_hscb == 'Kondisi kebersihan didalam BOX') {
                    $formApmElektrikalVehicleExteriorHSCBTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorHSCBTigaBulanan->pemeriksaan_hscb == 'Kondisi tampilan GRID') {
                    $formApmElektrikalVehicleExteriorHSCBTigaBulanan->referensi = 'GRID tidak rusak, tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorHSCBTigaBulanan->pemeriksaan_hscb == 'Kondisi ARC CHUTE') {
                    $formApmElektrikalVehicleExteriorHSCBTigaBulanan->referensi = 'ARC CHUTE tidak rusak, tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorHSCBTigaBulanan->pemeriksaan_hscb == 'Kondisi tampilan ARC HORN') {
                    $formApmElektrikalVehicleExteriorHSCBTigaBulanan->referensi = 'ARC HORN tidak rusak, tidak kotor dan bersih dari debu';
                }elseif ($formApmElektrikalVehicleExteriorHSCBTigaBulanan->pemeriksaan_hscb == 'Kondisi Main contact') {
                    $formApmElektrikalVehicleExteriorHSCBTigaBulanan->referensi = 'Pastikan main contact tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorHSCBTigaBulanan->pemeriksaan_hscb == 'Kondisi koneksi auxiliary contact') {
                    $formApmElektrikalVehicleExteriorHSCBTigaBulanan->referensi = 'Pastikan koneksi auxiliary kontak tidak longgar atau rusak';
                } elseif ($formApmElektrikalVehicleExteriorHSCBTigaBulanan->pemeriksaan_hscb == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleExteriorHSCBTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                }else {
                    $formApmElektrikalVehicleExteriorHSCBTigaBulanan->referensi = 'Pastikan permukaan sliding terlumasi grease';
                }
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorHSCBTigaBulanans'] = FormApmElektrikalVehicleExteriorHSCBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-hscb-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorHSCBTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorHSCBTigaBulanans'] = FormApmElektrikalVehicleExteriorHSCBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorHSCBTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorHSCBTigaBulanan) {
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorHSCBTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorFJBTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle FLEET TENSION JUNCTION BOX (FJB)';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['fjbs'] = ['Kondisi fisik BOX', 'Kondisi kebersihan luar BOX', 'Kondisi kebersihan didalam BOX', 'Kondisi karet spon cover', 'Terminasi kabel, kekencangan baut dan Labelling', 'Kondisi terminal Block'];

        if (!FormApmElektrikalVehicleExteriorFJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['fjbs'] as $key => $fjb) {
                $formApmElektrikalVehicleExteriorFJBTigaBulanan = new FormApmElektrikalVehicleExteriorFJBTigaBulanan();
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->pemeriksaan_fjb = $fjb;
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->pemeriksaan_fjb_group = 'FLEET TENSION JUNCTION BOX (FJB)';
                if ($formApmElektrikalVehicleExteriorFJBTigaBulanan->pemeriksaan_fjb == 'Kondisi fisik BOX') {
                    $formApmElektrikalVehicleExteriorFJBTigaBulanan->referensi = 'BOX tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorFJBTigaBulanan->pemeriksaan_fjb == 'Kondisi kebersihan luar BOX') {
                    $formApmElektrikalVehicleExteriorFJBTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorFJBTigaBulanan->pemeriksaan_fjb == 'Kondisi kebersihan didalam BOX') {
                    $formApmElektrikalVehicleExteriorFJBTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorFJBTigaBulanan->pemeriksaan_fjb == 'Kondisi karet spon cover') {
                    $formApmElektrikalVehicleExteriorFJBTigaBulanan->referensi = 'Pastikan karet spon cover tidak rusak dan tidak lepas dari Box';
                } elseif ($formApmElektrikalVehicleExteriorFJBTigaBulanan->pemeriksaan_fjb == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleExteriorFJBTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } else {
                    $formApmElektrikalVehicleExteriorFJBTigaBulanan->referensi = 'Pastikan tidak ada kerusakan dan tidak adanya indikasi perubahan warna';
                }
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorFJBTigaBulanans'] = FormApmElektrikalVehicleExteriorFJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-fjb-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorFJBTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorFJBTigaBulanans'] = FormApmElektrikalVehicleExteriorFJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorFJBTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorFJBTigaBulanan) {
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorFJBTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorHJBTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle HIGH TENSION JUNCTION BOX (HJB)';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['hjbs'] = ['Kondisi fisik BOX', 'Kondisi kebersihan luar BOX', 'Kondisi kebersihan didalam BOX', 'Kondisi karet spon cover', 'Terminasi kabel, kekencangan baut dan Labelling', 'Kondisi terminal Block', 'Kondisi Kekencangan Receptacle dan terminal Block'];

        if (!FormApmElektrikalVehicleExteriorHJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['hjbs'] as $key => $hjb) {
                $formApmElektrikalVehicleExteriorHJBTigaBulanan = new FormApmElektrikalVehicleExteriorHJBTigaBulanan();
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->pemeriksaan_hjb = $hjb;
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->pemeriksaan_hjb_group = 'HIGH TENSION JUNCTION BOX (HJB)';
                if ($formApmElektrikalVehicleExteriorHJBTigaBulanan->pemeriksaan_hjb == 'Kondisi fisik BOX') {
                    $formApmElektrikalVehicleExteriorHJBTigaBulanan->referensi = 'BOX tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorHJBTigaBulanan->pemeriksaan_hjb == 'Kondisi kebersihan luar BOX') {
                    $formApmElektrikalVehicleExteriorHJBTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorHJBTigaBulanan->pemeriksaan_hjb == 'Kondisi kebersihan didalam BOX') {
                    $formApmElektrikalVehicleExteriorHJBTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorHJBTigaBulanan->pemeriksaan_hjb == 'Kondisi karet spon cover') {
                    $formApmElektrikalVehicleExteriorHJBTigaBulanan->referensi = 'Pastikan karet spon cover tidak rusak dan tidak lepas dari Box';
                } elseif ($formApmElektrikalVehicleExteriorHJBTigaBulanan->pemeriksaan_hjb == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleExteriorHJBTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } elseif ($formApmElektrikalVehicleExteriorHJBTigaBulanan->pemeriksaan_hjb == 'Kondisi terminal Block') {
                    $formApmElektrikalVehicleExteriorHJBTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada indikasi perubahan warna';
                } else {
                    $formApmElektrikalVehicleExteriorHJBTigaBulanan->referensi = 'Pastikan marking Receptacle dan marking Terminal Block sejajar';
                }
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorHJBTigaBulanans'] = FormApmElektrikalVehicleExteriorHJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-hjb-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorHJBTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorHJBTigaBulanans'] = FormApmElektrikalVehicleExteriorHJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorHJBTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorHJBTigaBulanan) {
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorHJBTigaBulanan->save();
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

    public function formApmElektrikalVehicleExteriorESKTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle Extention System Contactor (ESK)';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['esks'] = ['Kondisi fisik BOX', 'Kondisi kebersihan luar BOX', 'Kondisi kebersihan didalam BOX', 'Kondisi karet spon cover', 'Kondisi fisik Kontaktor dan Relay', 'Kondisi terminal Block', 'Terminasi kabel, kekencangan baut dan Labelling'];

        if (!FormApmElektrikalVehicleExteriorESKTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['esks'] as $key => $esk) {
                $formApmElektrikalVehicleExteriorESKTigaBulanan = new FormApmElektrikalVehicleExteriorESKTigaBulanan();
                $formApmElektrikalVehicleExteriorESKTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorESKTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorESKTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorESKTigaBulanan->pemeriksaan_esk = $esk;
                $formApmElektrikalVehicleExteriorESKTigaBulanan->pemeriksaan_esk_group = 'Extention System Contactor (ESK)';
                if ($formApmElektrikalVehicleExteriorESKTigaBulanan->pemeriksaan_esk == 'Kondisi fisik BOX') {
                    $formApmElektrikalVehicleExteriorESKTigaBulanan->referensi = 'BOX tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorESKTigaBulanan->pemeriksaan_esk == 'Kondisi kebersihan luar BOX') {
                    $formApmElektrikalVehicleExteriorESKTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorESKTigaBulanan->pemeriksaan_esk == 'Kondisi kebersihan didalam BOX') {
                    $formApmElektrikalVehicleExteriorESKTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorESKTigaBulanan->pemeriksaan_esk == 'Kondisi karet spon cover') {
                    $formApmElektrikalVehicleExteriorESKTigaBulanan->referensi = 'Pastikan karet spon cover tidak rusak dan tidak lepas dari Box';
                } elseif ($formApmElektrikalVehicleExteriorESKTigaBulanan->pemeriksaan_esk == 'Kondisi fisik Kontaktor dan Relay') {
                    $formApmElektrikalVehicleExteriorESKTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada indikasi perubahan warna';
                } elseif ($formApmElektrikalVehicleExteriorESKTigaBulanan->pemeriksaan_esk == 'Kondisi terminal Block') {
                    $formApmElektrikalVehicleExteriorESKTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada indikasi perubahan warna';
                } else {
                    $formApmElektrikalVehicleExteriorESKTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                }
                $formApmElektrikalVehicleExteriorESKTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorESKTigaBulanans'] = FormApmElektrikalVehicleExteriorESKTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-esk-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorESKTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorESKTigaBulanans'] = FormApmElektrikalVehicleExteriorESKTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorESKTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorESKTigaBulanan) {
                $formApmElektrikalVehicleExteriorESKTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorESKTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorESKTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorESKTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorESKTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorESKTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorESKTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorDCTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle DC ARRESTER';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['dcs'] = ['Kondisi fisik BOX', 'Kondisi kebersihan luar BOX', 'Kondisi kebersihan didalam BOX', 'Kondisi permukaan DC Arrester', 'Terminasi kabel, kekencangan baut dan Labelling'];

        if (!FormApmElektrikalVehicleExteriorDCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['dcs'] as $key => $dc) {
                $formApmElektrikalVehicleExteriorDCTigaBulanan = new FormApmElektrikalVehicleExteriorDCTigaBulanan();
                $formApmElektrikalVehicleExteriorDCTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorDCTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorDCTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorDCTigaBulanan->pemeriksaan_dc = $dc;
                $formApmElektrikalVehicleExteriorDCTigaBulanan->pemeriksaan_dc_group = 'DC ARRESTER';
                if ($formApmElektrikalVehicleExteriorDCTigaBulanan->pemeriksaan_dc == 'Kondisi fisik BOX') {
                    $formApmElektrikalVehicleExteriorDCTigaBulanan->referensi = 'BOX tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorDCTigaBulanan->pemeriksaan_dc == 'Kondisi kebersihan luar BOX') {
                    $formApmElektrikalVehicleExteriorDCTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorDCTigaBulanan->pemeriksaan_dc == 'Kondisi kebersihan didalam BOX') {
                    $formApmElektrikalVehicleExteriorDCTigaBulanan->referensi = 'BOX tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorDCTigaBulanan->pemeriksaan_dc == 'Kondisi permukaan DC Arrester') {
                    $formApmElektrikalVehicleExteriorDCTigaBulanan->referensi = 'pastikan tidak ada retakan, karat dan kerusakan';
                } else {
                    $formApmElektrikalVehicleExteriorDCTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                }
                $formApmElektrikalVehicleExteriorDCTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorDCTigaBulanans'] = FormApmElektrikalVehicleExteriorDCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-dc-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorDCTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorDCTigaBulanans'] = FormApmElektrikalVehicleExteriorDCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorDCTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorDCTigaBulanan) {
                $formApmElektrikalVehicleExteriorDCTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorDCTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorDCTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorDCTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorDCTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorDCTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorDCTigaBulanan->save();
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
    public function formApmElektrikalVehicleExteriorBECTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle Brake Electronic Control Unit';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['becs'] = ['Kondisi fisik Box BECU', 'Kondisi kebersihan luar Box BECU', 'Kondisi kebersihan dalam Box BECU', 'Kondisi fisik Part BECU', 'Terminasi kabel, kekencangan baut dan Labelling'];

        if (!FormApmElektrikalVehicleExteriorBECTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['becs'] as $key => $bec) {
                $formApmElektrikalVehicleExteriorBECTigaBulanan = new FormApmElektrikalVehicleExteriorBECTigaBulanan();
                $formApmElektrikalVehicleExteriorBECTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorBECTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorBECTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorBECTigaBulanan->pemeriksaan_brake = $bec;
                $formApmElektrikalVehicleExteriorBECTigaBulanan->pemeriksaan_brake_group = 'BRAKE ELECTRONIC CONTROL UNIT';
                if ($formApmElektrikalVehicleExteriorBECTigaBulanan->pemeriksaan_brake == 'Kondisi fisik Box BECU') {
                    $formApmElektrikalVehicleExteriorBECTigaBulanan->referensi = 'Pastikan Panel tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorBECTigaBulanan->pemeriksaan_brake == 'Kondisi kebersihan luar Box BECU') {
                    $formApmElektrikalVehicleExteriorBECTigaBulanan->referensi = 'Panel tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorBECTigaBulanan->pemeriksaan_brake == 'Kondisi kebersihan dalam Box BECU') {
                    $formApmElektrikalVehicleExteriorBECTigaBulanan->referensi = 'Panel tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleExteriorBECTigaBulanan->pemeriksaan_brake == 'Kondisi fisik Part BECU') {
                    $formApmElektrikalVehicleExteriorBECTigaBulanan->referensi = 'Pastikan part BECU tidak rusak';
                } else {
                    $formApmElektrikalVehicleExteriorBECTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                }
                $formApmElektrikalVehicleExteriorBECTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorBECTigaBulanans'] = FormApmElektrikalVehicleExteriorBECTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-bec-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorBECTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorBECTigaBulanans'] = FormApmElektrikalVehicleExteriorBECTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorBECTigaBulanans'] as $key => $formApmElektrikalVehicleExteriorBECTigaBulanan) {
                $formApmElektrikalVehicleExteriorBECTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorBECTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorBECTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorBECTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorBECTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleExteriorBECTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorBECTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorBECTigaBulanan->save();
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
    public function formApmElektrikalVehicleInteriorLPLTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle LED PASSENGER LIGHT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['led1s'] = ['KonKondisi fisik body dan cover secara keseluruhan', 'Kondisi kebersihan eksterior Led Passenger Light', 'Kondisi fisik Converter', 'Kondisi Connector, Terminasi kabel, kekencangan baut dan labelling', 'Kondisi pencahayaan Led Passenger Light'];
        $data['led2s'] = ['KonKondisi fisik body dan cover secara keseluruhan', 'Kondisi kebersihan eksterior Led Passenger Light', 'Kondisi fisik Converter', 'Kondisi Connector, Terminasi kabel, kekencangan baut dan labelling', 'Kondisi pencahayaan Led Passenger Light'];

        if (!FormApmElektrikalVehicleInteriorLPLTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['led1s'] as $key => $led1) {
                $formApmElektrikalVehicleInteriorLPLTigaBulanan = new FormApmElektrikalVehicleInteriorLPLTigaBulanan();
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->pemeriksaan_led = $led1;
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->pemeriksaan_led_group = 'LED PASSENGER LIGHT MC 1';
                if ($formApmElektrikalVehicleInteriorLPLTigaBulanan->pemeriksaan_led == 'KonKondisi fisik body dan cover secara keseluruhan') {
                    $formApmElektrikalVehicleInteriorLPLTigaBulanan->referensi = 'Pastikan Led Passenger Light tidak rusak';
                } elseif ($formApmElektrikalVehicleInteriorLPLTigaBulanan->pemeriksaan_led == 'Kondisi kebersihan eksterior Led Passenger Light') {
                    $formApmElektrikalVehicleInteriorLPLTigaBulanan->referensi = 'Pastikan Led Passenger tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleInteriorLPLTigaBulanan->pemeriksaan_led == 'Kondisi fisik Converter') {
                    $formApmElektrikalVehicleInteriorLPLTigaBulanan->referensi = 'Pastikan Converter tidak ada karat atau kerusakan';
                } elseif ($formApmElektrikalVehicleInteriorLPLTigaBulanan->pemeriksaan_led == 'Kondisi pencahayaan Led Passenger Light') {
                    $formApmElektrikalVehicleInteriorLPLTigaBulanan->referensi = 'Pastikan Pencahayaan Led Head Tail Light masih layak untuk digunakan';
                } else {
                    $formApmElektrikalVehicleInteriorLPLTigaBulanan->referensi = 'Pastikan connector tidak rusak serta berkarat, terminasi rapi baut yang terpasang kencang, labelling harus rapih dan jelas dibaca';
                }
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->save();
            }
            foreach ($data['led2s'] as $key => $led2) {
                $formApmElektrikalVehicleInteriorLPLTigaBulanan = new FormApmElektrikalVehicleInteriorLPLTigaBulanan();
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->pemeriksaan_led = $led2;
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->pemeriksaan_led_group = 'LED PASSENGER LIGHT MC 2';
                if ($formApmElektrikalVehicleInteriorLPLTigaBulanan->pemeriksaan_led == 'KonKondisi fisik body dan cover secara keseluruhan') {
                    $formApmElektrikalVehicleInteriorLPLTigaBulanan->referensi = 'Pastikan Led Passenger Light tidak rusak';
                } elseif ($formApmElektrikalVehicleInteriorLPLTigaBulanan->pemeriksaan_led == 'Kondisi kebersihan eksterior Led Passenger Light') {
                    $formApmElektrikalVehicleInteriorLPLTigaBulanan->referensi = 'Pastikan Led Passenger tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleInteriorLPLTigaBulanan->pemeriksaan_led == 'Kondisi fisik Converter') {
                    $formApmElektrikalVehicleInteriorLPLTigaBulanan->referensi = 'Pastikan Converter tidak ada karat atau kerusakan';
                } elseif ($formApmElektrikalVehicleInteriorLPLTigaBulanan->pemeriksaan_led == 'Kondisi pencahayaan Led Passenger Light') {
                    $formApmElektrikalVehicleInteriorLPLTigaBulanan->referensi = 'Pastikan Pencahayaan Led Head Tail Light masih layak untuk digunakan';
                } else {
                    $formApmElektrikalVehicleInteriorLPLTigaBulanan->referensi = 'Pastikan connector tidak rusak serta berkarat, terminasi rapi baut yang terpasang kencang, labelling harus rapih dan jelas dibaca';
                }
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleInteriorLPLTigaBulanans'] = FormApmElektrikalVehicleInteriorLPLTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-interior-lpl-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleInteriorLPLTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleInteriorLPLTigaBulanans'] = FormApmElektrikalVehicleInteriorLPLTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleInteriorLPLTigaBulanans'] as $key => $formApmElektrikalVehicleInteriorLPLTigaBulanan) {
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleInteriorLPLTigaBulanan->save();
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
    public function formApmElektrikalVehicleInteriorTCMSTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle TRAIN CONTROL MONITORING SYSTEM';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['tcmss'] = ['Kondisi fisik panel Train Control Monitoring System (TCMS)', 'Kondisi kebersihan Panel Train Control Monitoring System (TCMS)', 'Kondisi terminal Block', 'Terminasi kabel, kekencangan baut dan Labelling', 'Kondisi display Unit'];

        if (!FormApmElektrikalVehicleInteriorTCMSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['tcmss'] as $key => $tcms) {
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan = new FormApmElektrikalVehicleInteriorTCMSTigaBulanan();
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->pemeriksaan_train = $tcms;
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->pemeriksaan_train_group = 'TRAIN CONTROL MONITORING SYSTEM (TCMS)';
                if ($formApmElektrikalVehicleInteriorTCMSTigaBulanan->pemeriksaan_train == 'Kondisi fisik panel Train Control Monitoring System (TCMS)') {
                    $formApmElektrikalVehicleInteriorTCMSTigaBulanan->referensi = 'Pastikan Panel tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleInteriorTCMSTigaBulanan->pemeriksaan_train == 'Kondisi kebersihan Panel Train Control Monitoring System (TCMS)') {
                    $formApmElektrikalVehicleInteriorTCMSTigaBulanan->referensi = 'Pastikan Panel tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleInteriorTCMSTigaBulanan->pemeriksaan_train == 'Kondisi terminal Block') {
                    $formApmElektrikalVehicleInteriorTCMSTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada indikasi perubahan warna';
                } elseif ($formApmElektrikalVehicleInteriorTCMSTigaBulanan->pemeriksaan_train == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleInteriorTCMSTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca';
                } else {
                    $formApmElektrikalVehicleInteriorTCMSTigaBulanan->referensi = 'Pastikan berfungsi secara normal';
                }
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleInteriorTCMSTigaBulanans'] = FormApmElektrikalVehicleInteriorTCMSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-interior-tcms-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleInteriorTCMSTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleInteriorTCMSTigaBulanans'] = FormApmElektrikalVehicleInteriorTCMSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleInteriorTCMSTigaBulanans'] as $key => $formApmElektrikalVehicleInteriorTCMSTigaBulanan) {
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleInteriorTCMSTigaBulanan->save();
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
    public function formApmElektrikalVehicleInteriorMCTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle MASTER CONTROL';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['mcs'] = ['Kondisi fisik Frame', 'Kondisi fisik Master Handle', 'Kondisi fisik Direction Handle', 'Kondisi fisik Push Bottom Start', 'Fungsi Master Handle', 'Fungsi Direction Handle'];

        if (!FormApmElektrikalVehicleInteriorMCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['mcs'] as $key => $mc) {
                $formApmElektrikalVehicleInteriorMCTigaBulanan = new FormApmElektrikalVehicleInteriorMCTigaBulanan();
                $formApmElektrikalVehicleInteriorMCTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorMCTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorMCTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorMCTigaBulanan->pemeriksaan_master = $mc;
                $formApmElektrikalVehicleInteriorMCTigaBulanan->pemeriksaan_master_group = 'MASTER CONTROL';
                if ($formApmElektrikalVehicleInteriorMCTigaBulanan->pemeriksaan_master == 'Kondisi fisik Frame') {
                    $formApmElektrikalVehicleInteriorMCTigaBulanan->referensi = 'Pastikan Frame tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleInteriorMCTigaBulanan->pemeriksaan_master == 'Kondisi fisik Master Handle') {
                    $formApmElektrikalVehicleInteriorMCTigaBulanan->referensi = 'Master Handle tidak rusak atau tidak patah';
                } elseif ($formApmElektrikalVehicleInteriorMCTigaBulanan->pemeriksaan_master == 'Kondisi fisik Direction Handle') {
                    $formApmElektrikalVehicleInteriorMCTigaBulanan->referensi = 'Direction Handle tidak rusak atau tidak patah';
                } elseif ($formApmElektrikalVehicleInteriorMCTigaBulanan->pemeriksaan_master == 'Kondisi fisik Push Bottom Start') {
                    $formApmElektrikalVehicleInteriorMCTigaBulanan->referensi = 'Push Bottom tidak rusak';
                } elseif ($formApmElektrikalVehicleInteriorMCTigaBulanan->pemeriksaan_master == 'Fungsi Master Handle') {
                    $formApmElektrikalVehicleInteriorMCTigaBulanan->referensi = 'Pastikan Master Handle berfungsi dengan baik';
                } else {
                    $formApmElektrikalVehicleInteriorMCTigaBulanan->referensi = 'Pastikan Direction Handle Handle berfungsi dengan baik';
                }
                $formApmElektrikalVehicleInteriorMCTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleInteriorMCTigaBulanans'] = FormApmElektrikalVehicleInteriorMCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-interior-mc-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleInteriorMCTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleInteriorMCTigaBulanans'] = FormApmElektrikalVehicleInteriorMCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleInteriorMCTigaBulanans'] as $key => $formApmElektrikalVehicleInteriorMCTigaBulanan) {
                $formApmElektrikalVehicleInteriorMCTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorMCTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorMCTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorMCTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleInteriorMCTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleInteriorMCTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleInteriorMCTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleInteriorMCTigaBulanan->save();
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

    public function formApmElektrikalVehicleInteriorGDTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle GENERAL DISTIBUTION BOARD';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['gdbs'] = ['Kondisi fisik Panel', 'Kondisi kebersihan luar Panel', 'Kondisi kebersihan dalam Panel', 'Kondisi terminal Block', 'Terminasi kabel, kekencangan baut dan Labelling', 'Kondisi keseluruhan peralatan Switching (CB, Kontaktor dan Relay) pada General Distribution Board'];

        if (!FormApmElektrikalVehicleInteriorGDTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['gdbs'] as $key => $gdb) {
                $formApmElektrikalVehicleInteriorGDTigaBulanan = new FormApmElektrikalVehicleInteriorGDTigaBulanan();
                $formApmElektrikalVehicleInteriorGDTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorGDTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorGDTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorGDTigaBulanan->pemeriksaan_general = $gdb;
                $formApmElektrikalVehicleInteriorGDTigaBulanan->pemeriksaan_general_group = 'GENERAL DISTIBUTION BOARD (GDB)';
                if ($formApmElektrikalVehicleInteriorGDTigaBulanan->pemeriksaan_general == 'Kondisi fisik Panel') {
                    $formApmElektrikalVehicleInteriorGDTigaBulanan->referensi = 'Pastikan Panel tidak penyok dan tidak rusak';
                } elseif ($formApmElektrikalVehicleInteriorGDTigaBulanan->pemeriksaan_general == 'Kondisi kebersihan luar Panel') {
                    $formApmElektrikalVehicleInteriorGDTigaBulanan->referensi = 'Pastikan Panel tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleInteriorGDTigaBulanan->pemeriksaan_general == 'Kondisi kebersihan dalam Panel') {
                    $formApmElektrikalVehicleInteriorGDTigaBulanan->referensi = 'Panel tidak kotor dan bersih dari debu';
                } elseif ($formApmElektrikalVehicleInteriorGDTigaBulanan->pemeriksaan_general == 'Kondisi terminal Block') {
                    $formApmElektrikalVehicleInteriorGDTigaBulanan->referensi = 'Pastikan terminal block tidak rusak dan tidak ada indikasi perubahan warna';
                } elseif ($formApmElektrikalVehicleInteriorGDTigaBulanan->pemeriksaan_general == 'Terminasi kabel, kekencangan baut dan Labelling') {
                    $formApmElektrikalVehicleInteriorGDTigaBulanan->referensi = 'Terminasi rapi dan baut yang terpasang kencang, labelling harus rapi dan jelas di baca warna';
                } else {
                    $formApmElektrikalVehicleInteriorGDTigaBulanan->referensi = 'Pastikan kondisi peralatan Switching dalam keadaan tidak rusak';
                }
                $formApmElektrikalVehicleInteriorGDTigaBulanan->save();
            }
        }
        $data['formApmElektrikalVehicleInteriorGDTigaBulanans'] = FormApmElektrikalVehicleInteriorGDTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-interior-gd-tiga-bulanan.index', $data);
    }

    public function formApmElektrikalVehicleInteriorGDTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleInteriorGDTigaBulanans'] = FormApmElektrikalVehicleInteriorGDTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleInteriorGDTigaBulanans'] as $key => $formApmElektrikalVehicleInteriorGDTigaBulanan) {
                $formApmElektrikalVehicleInteriorGDTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorGDTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorGDTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorGDTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleInteriorGDTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmElektrikalVehicleInteriorGDTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleInteriorGDTigaBulanan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleInteriorGDTigaBulanan->save();
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

    public function formApmElektrikalVehicleExteriorMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle Exterior Mingguan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['vs'] = ['Kondisi fisik filter VVVF', 'Kondisi kebersihan Filter VVVF'];
        $data['vas'] = ['Kondisi fisik filter VVVF', 'Kondisi kebersihan Filter VAC'];

        if (!FormApmElektrikalVehicleExteriorMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['vs'] as $key => $v) {
                $formApmElektrikalVehicleExteriorMingguan = new FormApmElektrikalVehicleExteriorMingguan();
                $formApmElektrikalVehicleExteriorMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorMingguan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorMingguan->pemeriksaan_exterior = $v;
                $formApmElektrikalVehicleExteriorMingguan->pemeriksaan_exterior_group = 'Filter VVVF';
                if ($formApmElektrikalVehicleExteriorMingguan->pemeriksaan_exterior == 'Kondisi fisik filter VVVF') {
                    $formApmElektrikalVehicleExteriorMingguan->referensi = 'Pastikan tidak rusak';
                } else {
                    $formApmElektrikalVehicleExteriorMingguan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmElektrikalVehicleExteriorMingguan->save();
            }
            foreach ($data['vas'] as $key => $va) {
                $formApmElektrikalVehicleExteriorMingguan = new FormApmElektrikalVehicleExteriorMingguan();
                $formApmElektrikalVehicleExteriorMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorMingguan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorMingguan->pemeriksaan_exterior = $va;
                $formApmElektrikalVehicleExteriorMingguan->pemeriksaan_exterior_group = 'Filter VAC';
                if ($formApmElektrikalVehicleExteriorMingguan->pemeriksaan_exterior == 'Kondisi fisik filter VVVF') {
                    $formApmElektrikalVehicleExteriorMingguan->referensi = 'Pastikan tidak rusak';
                } else {
                    $formApmElektrikalVehicleExteriorMingguan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmElektrikalVehicleExteriorMingguan->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorMingguans'] = FormApmElektrikalVehicleExteriorMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-mingguan.index', $data);
    }

    public function formApmElektrikalVehicleExteriorMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorMingguans'] = FormApmElektrikalVehicleExteriorMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorMingguans'] as $key => $formApmElektrikalVehicleExteriorMingguan) {
                $formApmElektrikalVehicleExteriorMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorMingguan->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                if (!$formApmElektrikalVehicleExteriorMingguan->pemeriksaan_exterior_group == 'Filter VVVF') {
                    $formApmElektrikalVehicleExteriorMingguan->hasil_mc2 = $validatedData['hasil_mc2'][$key] ?? null;
                }
                $formApmElektrikalVehicleExteriorMingguan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmElektrikalVehicleExteriorMingguan->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorMingguan->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorMingguan->save();
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

    public function formApmElektrikalVehicleInteriorHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle Exterior Harian';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['leds'] = ['Visual check kondisi fisik body, cover secara keseluruhan', 'Visual check pada pencahayaan LED'];
        $data['fdss'] = ['Visual check Kondisi fisik keseluruhan Fire detection System', 'Visual Check Kondisi sensor Fire Detection System'];
        $data['boxs'] = ['Visual check kondisi fisik panel'];
        $data['mcs'] = ['Visual check kondisi fisik'];
        $data['door_mc1s'] = ['Visual check kondisi fisik dari Door System', 'Fungsi keseluruhan system Door System'];
        $data['door_mc2s'] = ['Visual check kondisi fisik dari Door System', 'Fungsi keseluruhan system Door System'];

        if (!FormApmElektrikalVehicleInteriorHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['leds'] as $key => $led) {
                $formApmElektrikalVehicleInteriorHarian = new FormApmElektrikalVehicleInteriorHarian();
                $formApmElektrikalVehicleInteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior = $led;
                $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group = 'LED PASSANGER LIGHT';
                if ($formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior == 'Visual check kondisi fisik body, cover secara keseluruhan') {
                    $formApmElektrikalVehicleInteriorHarian->referensi = 'Pastikan Led Passenger Light tidak rusak';
                } else {
                    $formApmElektrikalVehicleInteriorHarian->referensi = 'LED tidak redup atau mati';
                }
                $formApmElektrikalVehicleInteriorHarian->save();
            }
            foreach ($data['fdss'] as $key => $fds) {
                $formApmElektrikalVehicleInteriorHarian = new FormApmElektrikalVehicleInteriorHarian();
                $formApmElektrikalVehicleInteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior = $fds;
                $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group = 'FIRE DETECTION SYSTEM';
                if ($formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior == 'Visual check Kondisi fisik keseluruhan Fire detection System') {
                    $formApmElektrikalVehicleInteriorHarian->referensi = 'Fire Detection System tidak rusak';
                } elseif ($formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior == 'Visual Check Kondisi sensor Fire Detection System') {
                    for ($i = 0; $i < 3; $i++) {
                        $formApmElektrikalVehicleInteriorHarian = new FormApmElektrikalVehicleInteriorHarian();
                        $formApmElektrikalVehicleInteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                        $formApmElektrikalVehicleInteriorHarian->form_id = $detailWorkOrderForm->form_id;
                        $formApmElektrikalVehicleInteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                        $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior = $fds;
                        $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group = 'FIRE DETECTION SYSTEM';
                        $formApmElektrikalVehicleInteriorHarian->referensi = 'Pastikan Kondisi sensor tidak rusak';
                        $formApmElektrikalVehicleInteriorHarian->save();
                    }
                }
                $formApmElektrikalVehicleInteriorHarian->save();
            }
            foreach ($data['boxs'] as $key => $box) {
                $formApmElektrikalVehicleInteriorHarian = new FormApmElektrikalVehicleInteriorHarian();
                $formApmElektrikalVehicleInteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior = $box;
                $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group = 'KONDISI SEMUA PANEL/BOX';
                $formApmElektrikalVehicleInteriorHarian->referensi = 'Panel tidak penyok,tidak rusak dan terkunci dengan rapat';

                $formApmElektrikalVehicleInteriorHarian->save();
            }
            foreach ($data['mcs'] as $key => $mc) {
                $formApmElektrikalVehicleInteriorHarian = new FormApmElektrikalVehicleInteriorHarian();
                $formApmElektrikalVehicleInteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior = $mc;
                $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group = 'MASTER CONTROL';
                $formApmElektrikalVehicleInteriorHarian->referensi = 'Pastikan tidak rusak dan semua master handle tidak patah';

                $formApmElektrikalVehicleInteriorHarian->save();
            }
            foreach ($data['door_mc1s'] as $key => $door_mc1) {
                $formApmElektrikalVehicleInteriorHarian = new FormApmElektrikalVehicleInteriorHarian();
                $formApmElektrikalVehicleInteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior = $door_mc1;
                $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group = 'DOOR SYSTEM (MC 1)';
                if ($formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior == 'Visual check kondisi fisik dari Door System') {
                    $formApmElektrikalVehicleInteriorHarian->referensi = 'Door System tidak terdapat kerusakan';
                } else {
                    $formApmElektrikalVehicleInteriorHarian->referensi = 'Door System beefungsi dengan normal';
                }
                $formApmElektrikalVehicleInteriorHarian->save();
            }
            foreach ($data['door_mc2s'] as $key => $door_mc2) {
                $formApmElektrikalVehicleInteriorHarian = new FormApmElektrikalVehicleInteriorHarian();
                $formApmElektrikalVehicleInteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior = $door_mc2;
                $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group = 'DOOR SYSTEM (MC 2)';
                if ($formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior == 'Visual check kondisi fisik dari Door System') {
                    $formApmElektrikalVehicleInteriorHarian->referensi = 'Door System tidak terdapat kerusakan';
                } else {
                    $formApmElektrikalVehicleInteriorHarian->referensi = 'Door System beefungsi dengan normal';
                }
                $formApmElektrikalVehicleInteriorHarian->save();
            }
        }
        $data['formApmElektrikalVehicleInteriorHarians'] = FormApmElektrikalVehicleInteriorHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-interior-harian.index', $data);
    }

    public function formApmElektrikalVehicleInteriorHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'hasil_door1.*' => ['nullable'],
            'hasil_door2.*' => ['nullable'],
            'hasil_door3.*' => ['nullable'],
            'hasil_door4.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleInteriorHarians'] = FormApmElektrikalVehicleInteriorHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleInteriorHarians'] as $key => $formApmElektrikalVehicleInteriorHarian) {
                $formApmElektrikalVehicleInteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleInteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleInteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                
                    $formApmElektrikalVehicleInteriorHarian->hasil_door1 = $validatedData['hasil_door1'][$key];
                    $formApmElektrikalVehicleInteriorHarian->hasil_door2 = $validatedData['hasil_door2'][$key];
                    $formApmElektrikalVehicleInteriorHarian->hasil_door3 = $validatedData['hasil_door3'][$key];
                    $formApmElektrikalVehicleInteriorHarian->hasil_door4 = $validatedData['hasil_door4'][$key];
                
                    $formApmElektrikalVehicleInteriorHarian->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                    $formApmElektrikalVehicleInteriorHarian->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                
                $formApmElektrikalVehicleInteriorHarian->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleInteriorHarian->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleInteriorHarian->save();
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

    public function formApmElektrikalVehicleExteriorHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - Elektrikal Vehicle Exterior Harian';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['PC_MC_1s'] = ['Visual check kondisi fisik Power Collector', 'Visual check kondisi Braided Wire', 'Visual check terminasi kabel dan kekencangan baut yang terpasang', 'Kondisi ketebalan Power Collector Shoe'];
        $data['PC_MC_2s'] = ['Visual check kondisi fisik Power Collector', 'Visual check kondisi Braided Wire', 'Visual check terminasi kabel dan kekencangan baut yang terpasang', 'Kondisi ketebalan Power Collector Shoe'];
        $data['lhtls'] = ['Visual check kondisi fisik body, cover secara keseluruhan', 'Visual check terminasi kabel dan kekencangan baut yang terpasang', 'Check fungsi pencahayaan LED'];
        $data['electric_horns'] = ['Visual check Kondisi fisik Electric Horn', 'Visual check terminasi kabel, kekencangan baut yang terpasang', 'Check fungsi suara Horn'];
        $data['keseluruhan_boxs'] = ['Visual check kondisi fisik BOX'];
        $data['TM_MC1S'] = ['Visual check kondisi fisik Traction Motor'];
        $data['TM_MC2S'] = ['Visual check kondisi fisik Traction Motor'];
        $data['jps'] = ['Visual check kondisi fisik Jumper Plug'];
        $data['wws'] = ['Visual check kondisi fisik Windshield Wiper'];

        if (!FormApmElektrikalVehicleExteriorHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['PC_MC_1s'] as $key => $PC_MC_1) {
                $formApmElektrikalVehicleExteriorHarian = new FormApmElektrikalVehicleExteriorHarian();
                $formApmElektrikalVehicleExteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior = $PC_MC_1;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group = 'POWER COLLECTOR (MC 1)';
                if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior == 'Visual check kondisi fisik Power Collector') {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Pastikan Power Collector tidak ada kerusakan';
                } elseif ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior == 'Visual check kondisi Braided Wire') {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Pastikan Braided Wire terpasang tidak terbalik, dan pastikan juga Braided Wire tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior == 'Visual check terminasi kabel dan kekencangan baut yang terpasang') {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Terminasi rapi dan baut yang terpasang kencang';
                } else {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Ketebalan Maksimal 42 mm Ketebalan Minimal 36 mm';
                }
                $formApmElektrikalVehicleExteriorHarian->save();
            }
            foreach ($data['PC_MC_2s'] as $key => $PC_MC_2) {
                $formApmElektrikalVehicleExteriorHarian = new FormApmElektrikalVehicleExteriorHarian();
                $formApmElektrikalVehicleExteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior = $PC_MC_2;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group = 'POWER COLLECTOR (MC 2)';
                if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior == 'Visual check kondisi fisik Power Collector') {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Pastikan Power Collector tidak ada kerusakan';
                } elseif ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior == 'Visual check kondisi Braided Wire') {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Pastikan Braided Wire terpasang tidak terbalik, dan pastikan juga Braided Wire tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior == 'Visual check terminasi kabel dan kekencangan baut yang terpasang') {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Terminasi rapi dan baut yang terpasang kencang';
                } else {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Ketebalan Maksimal 42 mm Ketebalan Minimal 36 mm';
                }
                $formApmElektrikalVehicleExteriorHarian->save();
            }
            foreach ($data['lhtls'] as $key => $lhtl) {
                $formApmElektrikalVehicleExteriorHarian = new FormApmElektrikalVehicleExteriorHarian();
                $formApmElektrikalVehicleExteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior = $lhtl;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group = 'LED HEAD TAIL LIGHT';
                if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior == 'Visual check kondisi fisik body, cover secara keseluruhan') {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Pastikan Led Head Tail Light tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior == 'Visual check terminasi kabel dan kekencangan baut yang terpasang') {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Terminasi rapi dan baut yang terpasang kencang';
                } else {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'LED tidak redup atau mati';
                }
                $formApmElektrikalVehicleExteriorHarian->save();
            }
            foreach ($data['electric_horns'] as $key => $electric_horn) {
                $formApmElektrikalVehicleExteriorHarian = new FormApmElektrikalVehicleExteriorHarian();
                $formApmElektrikalVehicleExteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior = $electric_horn;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group = 'ELECTRIC HORN';
                if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior == 'Visual check Kondisi fisik Electric Horn') {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Electric Horn tidak rusak';
                } elseif ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior == 'Visual check terminasi kabel, kekencangan baut yang terpasang') {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Terminasi rapi dan baut yang terpasang kencang';
                } else {
                    $formApmElektrikalVehicleExteriorHarian->referensi = 'Pastikan suaranya tidak sember';
                }
                $formApmElektrikalVehicleExteriorHarian->save();
            }
            foreach ($data['keseluruhan_boxs'] as $key => $keseluruhan_box) {
                $formApmElektrikalVehicleExteriorHarian = new FormApmElektrikalVehicleExteriorHarian();
                $formApmElektrikalVehicleExteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior = $keseluruhan_box;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group = 'KESELURUHAN BOX';
                $formApmElektrikalVehicleExteriorHarian->referensi = 'BOX tidak penyok, tidak rusak tidak berkarat dan terkunci dengan rapat.';
                $formApmElektrikalVehicleExteriorHarian->save();
            }
            foreach ($data['TM_MC1S'] as $key => $TM_MC1) {
                $formApmElektrikalVehicleExteriorHarian = new FormApmElektrikalVehicleExteriorHarian();
                $formApmElektrikalVehicleExteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior = $TM_MC1;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group = 'TRACTION MOTOR (MC 1)';
                $formApmElektrikalVehicleExteriorHarian->referensi = 'Traction Motor tidak rusak dan tidak berkarat.';
                $formApmElektrikalVehicleExteriorHarian->save();
            }
            foreach ($data['TM_MC2S'] as $key => $TM_MC2) {
                $formApmElektrikalVehicleExteriorHarian = new FormApmElektrikalVehicleExteriorHarian();
                $formApmElektrikalVehicleExteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior = $TM_MC2;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group = 'TRACTION MOTOR (MC 2)';
                $formApmElektrikalVehicleExteriorHarian->referensi = 'Traction Motor tidak rusak dan tidak berkarat.';
                $formApmElektrikalVehicleExteriorHarian->save();
            }
            foreach ($data['jps'] as $key => $jp) {
                $formApmElektrikalVehicleExteriorHarian = new FormApmElektrikalVehicleExteriorHarian();
                $formApmElektrikalVehicleExteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior = $jp;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group = 'JUMPER PLUG';
                $formApmElektrikalVehicleExteriorHarian->referensi = 'Pastikan Jumper Plug terpasang dengan baik dan tidak longgar.';
                $formApmElektrikalVehicleExteriorHarian->save();
            }
            foreach ($data['wws'] as $key => $ww) {
                $formApmElektrikalVehicleExteriorHarian = new FormApmElektrikalVehicleExteriorHarian();
                $formApmElektrikalVehicleExteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior = $ww;
                $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group = 'WINSHIELD WIPER';
                $formApmElektrikalVehicleExteriorHarian->referensi = 'Pastikan Windshiel Wiper tidak rusak.';
                $formApmElektrikalVehicleExteriorHarian->save();
            }
        }
        $data['formApmElektrikalVehicleExteriorHarians'] = FormApmElektrikalVehicleExteriorHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.elektrikal-vehicle-exterior-harian.index', $data);
    }

    public function formApmElektrikalVehicleExteriorHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'hasil_pc1_plus.*' => ['nullable'],
            'hasil_pc2_plus.*' => ['nullable'],
            'hasil_pc3_plus.*' => ['nullable'],
            'hasil_pc4_plus.*' => ['nullable'],
            'hasil_pc1_min.*' => ['nullable'],
            'hasil_pc2_min.*' => ['nullable'],
            'hasil_pc3_min.*' => ['nullable'],
            'hasil_pc4_min.*' => ['nullable'],
            'hasil_tm1.*' => ['nullable'],
            'hasil_tm2.*' => ['nullable'],
            'hasil_tm3.*' => ['nullable'],
            'hasil_tm4.*' => ['nullable'],
            'hasil_1_led1.*' => ['nullable'],
            'hasil_1_led2.*' => ['nullable'],
            'hasil_2_led1.*' => ['nullable'],
            'hasil_2_led2.*' => ['nullable'],
            'hasil_jp_hjb.*' => ['nullable'],
            'hasil_jp_ljb.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmElektrikalVehicleExteriorHarians'] = FormApmElektrikalVehicleExteriorHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmElektrikalVehicleExteriorHarians'] as $key => $formApmElektrikalVehicleExteriorHarian) {
                $formApmElektrikalVehicleExteriorHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmElektrikalVehicleExteriorHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmElektrikalVehicleExteriorHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                
                    $formApmElektrikalVehicleExteriorHarian->hasil_pc1_plus = $validatedData['hasil_pc1_plus'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_pc2_plus = $validatedData['hasil_pc2_plus'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_pc3_plus = $validatedData['hasil_pc3_plus'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_pc4_plus = $validatedData['hasil_pc4_plus'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_pc1_min = $validatedData['hasil_pc1_min'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_pc2_min = $validatedData['hasil_pc2_min'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_pc3_min = $validatedData['hasil_pc3_min'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_pc4_min = $validatedData['hasil_pc4_min'][$key];
                
                    $formApmElektrikalVehicleExteriorHarian->hasil_1_led1 = $validatedData['hasil_1_led1'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_1_led2 = $validatedData['hasil_1_led2'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_2_led1 = $validatedData['hasil_2_led1'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_2_led2 = $validatedData['hasil_2_led2'][$key];
                
                    $formApmElektrikalVehicleExteriorHarian->hasil_tm1 = $validatedData['hasil_tm1'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_tm2 = $validatedData['hasil_tm2'][$key];
                
                    $formApmElektrikalVehicleExteriorHarian->hasil_tm3 = $validatedData['hasil_tm3'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_tm4 = $validatedData['hasil_tm4'][$key];
                
                    $formApmElektrikalVehicleExteriorHarian->hasil_jp_hjb = $validatedData['hasil_jp_hjb'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_jp_ljb = $validatedData['hasil_jp_ljb'][$key];
            
                    $formApmElektrikalVehicleExteriorHarian->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                    $formApmElektrikalVehicleExteriorHarian->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                
                $formApmElektrikalVehicleExteriorHarian->referensi = $validatedData['referensi'][$key];
                $formApmElektrikalVehicleExteriorHarian->catatan = $validatedData['catatan'];
                $formApmElektrikalVehicleExteriorHarian->save();
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

    public function formApmMekanikalVehicleAirBrakeSystemTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - VEHICLE AIR BRAKE SYSTEM TIGA BULANAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['air_compressors'] = ['kondisi fisik Air cooler', 'Kondisi fisik air filter', 'Kondisi kebersihan daman Air Compresor'];
        $data['safety_valves'] = ['Kondisi fisik safety valve', 'Kondisi kebersihan Safty valve'];
        $data['twin_tower_air_dryers'] = ['Kondisi fisik tower air dryer', 'Kondisi kebersihan twin tower air dryer'];
        $data['mikro_filters'] = ['Kondisi fisik micro filter', 'Kondisi kebersihan micro filter'];
        $data['pressure_switchs'] = ['Kondisi fisik Pressure Switch', 'Kondisi kebersihan Pressure Switch'];
        $data['cocws'] = ['Visual check kondisi fisik Cut Out Cock with S - V& E-S', 'Kondisi kebersihan Pressure Switch'];
        $data['air_filters'] = ['Kondisi fisik air filter', 'Kondisi kebersihan air filter', 'Kondisi kekencangan mur dan baut'];
        $data['MS15_air_filters'] = ['Kondisi fisik air filter', 'Kondisi kebersihan air filter'];
        $data['cocs'] = ['Kondisi Fisik Cut Out Cock', 'Kondisi kebersihan Cut out cock', 'Kondisi kekencangan mur dan baut'];
        $data['coc_wsvs'] = ['Kondisi fisik Cut Out Cock with Side vent', 'Kondisi kebersihan Cut out cock', 'Kondisi kekencangan mur dan baut'];
        $data['ep_brake_valves'] = ['Kondisi fisik EP Brake Valve', 'Kondisi kebersihan EP Brake Valve'];
        $data['parking_brake_units'] = ['Kondisi fisik Parking Brake Unit', 'Kondisi kebersihan Parking Brake Unit', 'Kondisi ketebalan pad'];
        $data['check_valves'] = ['Kondisi fisik check valave', 'Kondisi kebersihan check valve', 'Kondisi kekencangan mur dan baut'];
        $data['test_fittings'] = ['Kondisi fisik Test Fitting', 'Kondisi kebersihan Test Fitting'];

        if (!FormApmMekanikalVehicleAirBrakeSystemTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['air_compressors'] as $key => $air_compressor) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $air_compressor;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'Air Compressor';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'kondisi fisik Air cooler') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan dalam kondisi bersih, jika terdapat air maka segera bersihkan';
                } elseif ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi kebersihan daman Air Compresor') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan air filter dalam kondisi bersih dan tidak terdapat debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['safety_valves'] as $key => $safety_valve) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $safety_valve;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'Safety Valve';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi fisik safety valve') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak rusakn dan tidak ada kebocoran';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'PaStikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['twin_tower_air_dryers'] as $key => $twin_tower_air_dryer) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $twin_tower_air_dryer;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'Twin Tower Air Dryer';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi fisik tower air dryer') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak rusakn dan tidak ada kebocoran';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['mikro_filters'] as $key => $mikro_filter) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $mikro_filter;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'Micro Filter';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi fisik micro filter') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak rusakn dan tidak ada kebocoran';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['pressure_switchs'] as $key => $pressure_switch) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $pressure_switch;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'Pressure Switch';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi fisik Pressure Switch') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada kebocoran';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['cocws'] as $key => $cocw) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $cocw;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'Cut Out Cock woth S-V&E-S';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Visual check kondisi fisik Cut Out Cock with S - V& E-S') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada kebocoran';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['air_filters'] as $key => $air_filter) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $air_filter;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'Air Filter';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi fisik air filter') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada kebocoran';
                } elseif ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi kekencangan mur dan baut') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['MS15_air_filters'] as $key => $MS15_air_filter) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $MS15_air_filter;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'MS15 Air Filter';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi fisik air filter') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada kebocoran';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['cocs'] as $key => $coc) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $coc;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'Cut Out Cock';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi Fisik Cut Out Cock') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada kebocoran';
                } elseif ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi kekencangan mur dan baut') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['coc_wsvs'] as $key => $coc_wsv) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $coc_wsv;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'Cut Out Cock with Side vent';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi fisik Cut Out Cock with Side vent') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada kebocoran';
                } elseif ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi kekencangan mur dan baut') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['ep_brake_valves'] as $key => $ep_brake_valve) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $ep_brake_valve;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'EP Brake Valve';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi fisik EP Brake Valve') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada kebocoran';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['parking_brake_units'] as $key => $parking_brake_unit) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $parking_brake_unit;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'Parking Brake Unit';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi fisik Parking Brake Unit') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak rusak dan pemasangan tidak longgar';
                } elseif ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi ketebalan pad') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Jika pad mengalami keausan, segera lakukan penggantian';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['check_valves'] as $key => $check_valve) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $check_valve;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'Check Valve';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi fisik check valave') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak terdapat kerusakan, retakan, komponen tepasang kencang';
                } elseif ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi kekencangan mur dan baut') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
            foreach ($data['test_fittings'] as $key => $test_fitting) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan = new FormApmMekanikalVehicleAirBrakeSystemTigaBulanan();
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system = $test_fitting;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group = 'Test Fitting';
                if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system == 'Kondisi fisik Test Fitting') {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak ada kebocoran';
                } else {
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
            }
        }
        $data['formApmMekanikalVehicleAirBrakeSystemTigaBulanans'] = FormApmMekanikalVehicleAirBrakeSystemTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.vehicle-air-brake-system-tiga-bulanan.index', $data);
    }
    public function formApmMekanikalVehicleAirBrakeSystemTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]); 
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmMekanikalVehicleAirBrakeSystemTigaBulanans'] = FormApmMekanikalVehicleAirBrakeSystemTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmMekanikalVehicleAirBrakeSystemTigaBulanans'] as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->catatan = $validatedData['catatan'];
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
                // coba sebentar mas
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
    public function formApmMekanikalVehicleBogieTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - VEHICLE BOGIE TIGA BULANAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['axles'] = ['Kondisi fisik Axle', 'Kondisi kebersihan luar Axle', 'Kondisi Gear Oli'];
        $data['slewing_rings'] = ['Kondisi fisik keseluruhan', 'Kondisi kebersihan luar Slewing Ring', 'Kondisi Grease', 'Kondisi kekencangan mur dan baut'];
        $data['leveling_valves'] = ['Kondisi fisik Keseluruhan', 'Kondisi kebersihan luar Leveling Valve'];
        $data['differential_valves'] = ['Kondisi fisik Keseluruhan', 'Kondisi kebersihan luar Differential Valve', 'Kondisi kekencangan mur dan baut'];
        $data['mean_pressure_valves'] = ['Kondisi fisik', 'Kondisi kebersihan luar Mean Presure Valve', 'Kondisi kekencangan mur dan baut'];
        $data['air_springs'] = ['Kondisi fisik Air Spring', 'Kondisi kebersihan luar Air Spring', 'Kondisi fisik logam dan karet'];
        $data['vertical_dampers'] = ['Kondisi fisik Vertical Damper', 'Kondisi kebersihan Vertical Damper'];
        $data['lateral_dampers'] = ['Kondisi fisik Lateral Damper', 'Kondisi kebersihan'];
        $data['brake_calipers'] = ['Kondisi fisik Brake Caliper', 'Kondisi kebersihan', 'Kondisi kekencangan mur dan baut', 'Pemeriksan Keausan Pad', 'Pengukuran Keausan Brake disc'];
        $data['chamber_cylinders'] = ['Kondisi fisik Chamber & Cylinder', 'Kondisi oli rem', 'Kondisi kebersihan Chamber & Cylinder', 'Kondisi kekencangan mur dan baut'];
        $data['proppeler_shafs'] = ['Kondisi fisik keseluruhan', 'Kondisi kebersihan Propperler Shaft', 'Kondisi kekencangan mur dan baut', 'Kondisi pelumas/grease'];
        $data['bogie_frames'] = ['Kondisi fisik keseluruhan', 'Kondisi kebersihan'];
        $data['running_wheels'] = ['Kondisi fisik keseluruhan', 'Kondisi kekencangan mur dan baut', 'Kondisi ring lock, flange ring', 'Mengukur nilai tekanan ban', 'Mengukur nilai pengikisan ban'];
        $data['lateral_stoppers'] = ['Kondisi fisik keseluruhan', 'Kondisi kebersihan Lateral stopper', 'Kondisi kekencangan mur dan baut'];
        $data['pipe_bogies'] = ['Kondisi fisik Keseluruhan', 'Kondisi kebersihan luar Pipe Bogie', 'Kondisi kekencangan clamp, mur dan baut pendukung'];
        $data['traction_link_devices'] = ['Kondisi fisik Keseluruhan', 'Kondisi fisik cushion', 'Kondisi kebersihan Lateral stopper', 'Kondisi kekencangan mur dan baut'];
        $data['anti_roll_bar_devices'] = ['Kondisi fisik Anti-roll bar device', 'Kondisi kebersihan Lateral stopper', 'Kondisi Grease', 'Kondisi karet cushion', 'Kondisi kekencangan mur dan baut'];
        $data['guide_systems'] = ['kondisi fisik guide wheel dan turnout wheel', 'Kondisi pelumas/grease', 'Kondisi rotasi guide wheel dan turnout wheel', 'Pengukuran nilai diameter guide wheel', 'Pengukuran nilai diameter turnout wheel'];
        $data['burst_detectors'] = ['Kondisi fisik Burst detector', 'Kondisi kebersihan luar Burst detector', 'Kondisi fisik spring atau roller', 'Kondisi fisik limit switch', 'Kondisi tire wear dan mengatur ulang posisi ketinggian burst detector'];
        $data['return_springs'] = ['Kondisi fisik keseluruhan', 'Kondisi kebersihan luar Burst detector', 'Kondisi ROD END BEARING'];
        $data['tekanan_bans'] = ['Tekanan ban 1', 'Tekanan ban 2', 'Tekanan ban 3', 'Tekanan ban 4'];

        if (!FormApmMekanikalVehicleBogieTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['axles'] as $key => $axle) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $axle;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Axle';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik Axle') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak tidak terdapat retakan atau rusak';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan luar Axle') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan oli tidak kurang dari 16,5 liter pada housing; dan tidak kurang dari 2 liter pada pusat';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['slewing_rings'] as $key => $slewing_ring) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $slewing_ring;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Slewing Ring';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik keseluruhan') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak terdpapat kebocoran';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan luar Slewing Ring') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi Grease') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan grease tidak kering';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['leveling_valves'] as $key => $leveling_valve) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $leveling_valve;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Leveling Valve';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik Keseluruhan') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan kondisi komponen tidak rusak dan tidak terjadi kebocoran';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['differential_valves'] as $key => $differential_valve) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $differential_valve;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Differential Valve';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kekencangan mur dan baut') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking ';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan luar Differential Valve') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan kondisi komponen tidak rusak, tidak retak dan tidak ada kebocoran';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['mean_pressure_valves'] as $key => $mean_pressure_valve) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $mean_pressure_valve;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Mean Pressure Valve';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan seluruh komponen bersih, tidak bocor dan tidak rusak';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan luar Mean Presure Valve') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['air_springs'] as $key => $air_spring) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $air_spring;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Air Spring';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik Air Spring') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak terdapat kerusakan dan keretakan';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan luar Air Spring') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan logam dan karet masih terpasang dengan baik dan tidak lepas';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['vertical_dampers'] as $key => $vertical_damper) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $vertical_damper;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Vertical Damper';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik Vertical Damper') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan seluruh komponen tidak rusak';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['lateral_dampers'] as $key => $lateral_damper) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $lateral_damper;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Lateral Damper';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik Lateral Damper') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan seluruh komponen bersih dan tidak rusak';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['brake_calipers'] as $key => $brake_caliper) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $brake_caliper;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Brake caliper';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik Brake Caliper') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak ada kerusakan fisik dan komponen';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kekencangan mur dan baut') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Pemeriksan Keausan Pad') {
                    for ($i = 0; $i < 8; $i++) {
                        $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                        $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                        $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                        $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                        $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $brake_caliper;
                        $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Brake caliper';
                        $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Ketebalan Maksimal 22 mm
                                                                            Ketebalan Minimal 2 mm';
                        $formApmMekanikalVehicleBogieTigaBulanan->save();
                    }
                } else {
                    for ($i = 0; $i < 4; $i++) {
                        $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                        $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                        $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                        $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                        $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $brake_caliper;
                        $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Brake caliper';
                        $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Ketebalan Maksimal 30 mm
                                                                            Ketebalan Minimal 26 mm';
                        $formApmMekanikalVehicleBogieTigaBulanan->save();
                    }
                    $formApmMekanikalVehicleBogieTigaBulanan->save();
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['chamber_cylinders'] as $key => $chamber_cylinder) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $chamber_cylinder;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Chamber & Cylinder';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik Chamber & Cylinder') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan seluruh komponen bersih dan tidak rusak';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi oli rem') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan oli terisi penuh dalam tabung dan tidak bocor';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan Chamber & Cylinder') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['proppeler_shafs'] as $key => $proppeler_shaf) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $proppeler_shaf;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Proppeler shaft';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik keseluruhan') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak terdapat karat, retak, dan kerusakan berbahaya';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan Propperler Shaft') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kekencangan mur dan baut') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan grease tidak kering';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['bogie_frames'] as $key => $bogie_frame) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $bogie_frame;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Bogie frame';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik keseluruhan') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak ada kerusakan pada bogie dan komponen yang terdapat pada bogie';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['running_wheels'] as $key => $running_wheel) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $running_wheel;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Running wheel';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik keseluruhan') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak ada kerusakan fisik dan komponen';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kekencangan mur dan baut') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi ring lock, flange ring') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak terdapat retakan';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Mengukur nilai tekanan ban') {
                    foreach ($data['tekanan_bans'] as $key => $tekanan_ban) {
                        $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                        $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                        $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                        $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                        $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $running_wheel;
                        $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Running wheel';
                        $formApmMekanikalVehicleBogieTigaBulanan->referensi = '± 10 bar';
                        $formApmMekanikalVehicleBogieTigaBulanan->save();
                    }
                } else {
                    foreach ($data['tekanan_bans'] as $key => $tekanan_ban) {
                        $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                        $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                        $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                        $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                        $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $running_wheel;
                        $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Running wheel';
                        $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Tebal Pengikisan untuk Ban baru =
15,4 mm ; sedangkan untuk ban lama
maksimal 13.8 dengan limit 1.6 mm';
                        $formApmMekanikalVehicleBogieTigaBulanan->save();
                    }
                    $formApmMekanikalVehicleBogieTigaBulanan->save();
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['lateral_stoppers'] as $key => $lateral_stopper) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $lateral_stopper;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Lateral stopper';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik keseluruhan') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang
kencang, dan terdapat marking';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan Lateral stopper') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['pipe_bogies'] as $key => $pipe_bogie) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $pipe_bogie;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Pipe Bogie';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Pastikan pipa dan seluruh komponen bersih dan tidak rusak') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak tidak terdapat retakan atau rusak';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan luar Pipe Bogie') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan komponen terpasang kencang dan tidak karat';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['traction_link_devices'] as $key => $traction_link_device) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $traction_link_device;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Traction Link device';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kekencangan mur dan baut') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik cushion') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan karet cushion tidak rusak, apabila rusak sebaiknya di ganti';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan Lateral stopper') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak ada kerusakan fisik dan komponen';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['anti_roll_bar_devices'] as $key => $anti_roll_bar_device) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $anti_roll_bar_device;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Anti-roll bar device';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik Anti-roll bar device') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak ada kerusakan fisik dan komponen';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan Lateral stopper') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi Grease') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan grease tidak kering';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi karet cushion') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan rubber cushion diganti yang baru';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Mur baut tidak hilang, terpasang kencang, dan terdapat marking';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['guide_systems'] as $key => $guide_system) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $guide_system;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Guide System';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'kondisi fisik guide wheel dan turnout wheel') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak rusak dan tidak adanya keretakan';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi pelumas/grease') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan grease tidak kering';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi rotasi guide wheel dan turnout wheel') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan rotas guide wheel dan turnout wheel bisa berputar dengan lancar';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Pengukuran nilai diameter guide wheel') {
                    for ($i = 0; $i < 8; $i++) {
                        $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                        $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                        $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                        $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                        $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $guide_system;
                        $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Guide System';
                        $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Ketebalan Maksimal 250 mm
                                                                            Ketebalan Minimal 232 mm';
                        $formApmMekanikalVehicleBogieTigaBulanan->save();
                    }
                } else {
                    for ($i = 0; $i < 8; $i++) {
                        $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                        $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                        $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                        $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                        $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $guide_system;
                        $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Guide System';
                        $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Ketebalan Maksimal 150 mm
                                                                            Ketebalan Minimal 141 mm';
                        $formApmMekanikalVehicleBogieTigaBulanan->save();
                    }
                    $formApmMekanikalVehicleBogieTigaBulanan->save();
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['burst_detectors'] as $key => $burst_detector) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $burst_detector;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Burst detector';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik Burst detector') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak ada kerusakan fisik dan komponen';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan luar Burst detector') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik spring atau roller') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Jika terdapat kerusakan segera lakukan penggantian';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik limit switch') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Jika limit switch beroperasi tidak normal, harap lakukan pergantian';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pasikan burst detector berada di posisi yang seperti awal pemasangan';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }

            foreach ($data['return_springs'] as $key => $return_spring) {
                $formApmMekanikalVehicleBogieTigaBulanan = new FormApmMekanikalVehicleBogieTigaBulanan();
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie = $return_spring;
                $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group = 'Return Spring';
                if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi fisik keseluruhan') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Pastikan tidak ada kerusakan pada fisik dan pemasangan';
                } elseif ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi kebersihan luar Burst detector') {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Patikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleBogieTigaBulanan->referensi = 'Jika ditemukan kerusakan, segera lagukan penggantian';
                }
                $formApmMekanikalVehicleBogieTigaBulanan->save();
            }
        }

        $data['formApmMekanikalVehicleBogieTigaBulanans'] = FormApmMekanikalVehicleBogieTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.vehicle-bogie-tiga-bulanan.index', $data);
    }

    public function formApmMekanikalVehicleBogieTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmMekanikalVehicleBogieTigaBulanans'] = FormApmMekanikalVehicleBogieTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmMekanikalVehicleBogieTigaBulanans'] as $key => $formApmMekanikalVehicleBogieTigaBulanan) {
                $formApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmMekanikalVehicleBogieTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmMekanikalVehicleBogieTigaBulanan->catatan = $validatedData['catatan'];
                $formApmMekanikalVehicleBogieTigaBulanan->save();
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
    public function formApmMekanikalVehicleMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - VEHICLE MINGGUAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormApmMekanikalVehicleMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                for ($i = 0; $i < 4; $i++) {
                    $formApmMekanikalVehicleMingguan = new FormApmMekanikalVehicleMingguan();
                    $formApmMekanikalVehicleMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formApmMekanikalVehicleMingguan->form_id = $detailWorkOrderForm->form_id;
                    $formApmMekanikalVehicleMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formApmMekanikalVehicleMingguan->pemeriksaan_mingguan = 'Pengukuran Tekanan udara Running Wheel';
                    $formApmMekanikalVehicleMingguan->pemeriksaan_mingguan_group = 'Running Wheel';
                    $formApmMekanikalVehicleMingguan->referensi = 'Patikan Tekanan ban ± 10 bar';
                    $formApmMekanikalVehicleMingguan->save();
            }
        }
            $data['formApmMekanikalVehicleMingguans'] = FormApmMekanikalVehicleMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
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
            
            return view('form.apm.vehicle-mingguan.index', $data);
    }

    public function formApmMekanikalVehicleMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmMekanikalVehicleMingguans'] = FormApmMekanikalVehicleMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmMekanikalVehicleMingguans'] as $key => $formApmMekanikalVehicleMingguan) {
                $formApmMekanikalVehicleMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleMingguan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleMingguan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmMekanikalVehicleMingguan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmMekanikalVehicleMingguan->referensi = $validatedData['referensi'][$key];
                $formApmMekanikalVehicleMingguan->catatan = $validatedData['catatan'];
                $formApmMekanikalVehicleMingguan->save();
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

    public function formApmMekanikalVehicleBogieHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - VEHICLE BOGIE';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['guide_wheels'] = ['Visual Check Guide Wheel', 'Rolling Check Guide Wheel'];
        $data['turnout_wheels'] = ['Visual Check Turnout Wheel', 'Rolling Check Turnout Wheel'];
        $data['axles'] = ['Visual check kondisi fisik axle', 'Visual check kondisi level Oli'];
        $data['bogie_frames'] = ['Visual check kondisi fisik bogie frame'];
        $data['chamber_chylinders'] = ['Visual check kondisi fisik chamber & chylinder', 'Visual check kondisi level Oli chamber & chylinder'];
        $data['running_wheels'] = ['Visal Check Kondisi fisik Running Wheel'];

        if (!FormApmMekanikalVehicleBogieHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['guide_wheels'] as $key => $guide_wheel) {
                for ($i = 0; $i < 8; $i++) {
                    $formApmMekanikalVehicleBogieHarian = new FormApmMekanikalVehicleBogieHarian();
                    $formApmMekanikalVehicleBogieHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formApmMekanikalVehicleBogieHarian->form_id = $detailWorkOrderForm->form_id;
                    $formApmMekanikalVehicleBogieHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie = $guide_wheel;
                    $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie_group = 'Guide Wheel';
                    if ($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Visual Check Guide Wheel') {
                        $formApmMekanikalVehicleBogieHarian->referensi = 'Pastikan tidak ada yang retak ataupun rusak';
                    } else {
                        $formApmMekanikalVehicleBogieHarian->referensi = 'Pastikan perputaran Guide Wheel normal';
                    }
                    $formApmMekanikalVehicleBogieHarian->save();
                }
            }
            foreach ($data['turnout_wheels'] as $key => $turnout_wheel) {
                for ($i = 0; $i < 8; $i++) {
                    $formApmMekanikalVehicleBogieHarian = new FormApmMekanikalVehicleBogieHarian();
                    $formApmMekanikalVehicleBogieHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formApmMekanikalVehicleBogieHarian->form_id = $detailWorkOrderForm->form_id;
                    $formApmMekanikalVehicleBogieHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie = $turnout_wheel;
                    $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie_group = 'Turnout Wheel';
                    if ($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Visual Check Turnout Wheel') {
                        $formApmMekanikalVehicleBogieHarian->referensi = 'Pastikan tidak ada yang retak ataupun rusak';
                    } else {
                        $formApmMekanikalVehicleBogieHarian->referensi = 'Pastikan perputaran Guide Wheel normal';
                    }
                    $formApmMekanikalVehicleBogieHarian->save();
                }
            }
            foreach ($data['axles'] as $key => $axle) {
                for ($i = 0; $i < 2; $i++) {
                    $formApmMekanikalVehicleBogieHarian = new FormApmMekanikalVehicleBogieHarian();
                    $formApmMekanikalVehicleBogieHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formApmMekanikalVehicleBogieHarian->form_id = $detailWorkOrderForm->form_id;
                    $formApmMekanikalVehicleBogieHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie = $axle;
                    $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie_group = 'Axle';
                    if ($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Visual check kondisi fisik axle') {
                        $formApmMekanikalVehicleBogieHarian->referensi = 'Tidak retak, berkarat dan tidak ada kerusakan';
                    } else {
                        $formApmMekanikalVehicleBogieHarian->referensi = 'Pastikan oli tidak kurang dari batas minimal';
                    }
                    $formApmMekanikalVehicleBogieHarian->save();
                }
            }
            foreach ($data['bogie_frames'] as $key => $bogie_frame) {
                for ($i = 0; $i < 2; $i++) {
                    $formApmMekanikalVehicleBogieHarian = new FormApmMekanikalVehicleBogieHarian();
                    $formApmMekanikalVehicleBogieHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formApmMekanikalVehicleBogieHarian->form_id = $detailWorkOrderForm->form_id;
                    $formApmMekanikalVehicleBogieHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie = $bogie_frame;
                    $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie_group = 'Bogie Frame';
                    $formApmMekanikalVehicleBogieHarian->referensi = 'Pastikan kondisi baik, tidak ada kerusakan, keretakan, dan karat';
                    $formApmMekanikalVehicleBogieHarian->save();
                }
            }
            foreach ($data['chamber_chylinders'] as $key => $chamber_chylinder) {
                for ($i = 0; $i < 4; $i++) {
                    $formApmMekanikalVehicleBogieHarian = new FormApmMekanikalVehicleBogieHarian();
                    $formApmMekanikalVehicleBogieHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formApmMekanikalVehicleBogieHarian->form_id = $detailWorkOrderForm->form_id;
                    $formApmMekanikalVehicleBogieHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie = $chamber_chylinder;
                    $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie_group = 'Chamber & Chylinder';
                    if ($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Visual Check kondisi fisik Guide Wheel') {
                        $formApmMekanikalVehicleBogieHarian->referensi = 'Pastikan kondisi baik, tidak ada kerusakan dan keretakan';
                    } else {
                        $formApmMekanikalVehicleBogieHarian->referensi = 'Pastikan oli tidak kurang dari batas minimal';
                    }
                    $formApmMekanikalVehicleBogieHarian->save();
                }
            }
            foreach ($data['running_wheels'] as $key => $running_wheel) {
                for ($i = 0; $i < 4; $i++) {
                    $formApmMekanikalVehicleBogieHarian = new FormApmMekanikalVehicleBogieHarian();
                    $formApmMekanikalVehicleBogieHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formApmMekanikalVehicleBogieHarian->form_id = $detailWorkOrderForm->form_id;
                    $formApmMekanikalVehicleBogieHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie = $running_wheel;
                    $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie_group = 'Running Wheel';
                    $formApmMekanikalVehicleBogieHarian->referensi = 'Pastikan tidak ada kerusakan pada karet Running Wheel';
                    $formApmMekanikalVehicleBogieHarian->save();
                }
            }
        }
        $data['formApmMekanikalVehicleBogieHarians'] = FormApmMekanikalVehicleBogieHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.vehicle-bogie-harian.index', $data);
    }

    public function formApmMekanikalVehicleBogieHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmMekanikalVehicleBogieHarians'] = FormApmMekanikalVehicleBogieHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmMekanikalVehicleBogieHarians'] as $key => $formApmMekanikalVehicleBogieHarian) {
                $formApmMekanikalVehicleBogieHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleBogieHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleBogieHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleBogieHarian->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmMekanikalVehicleBogieHarian->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmMekanikalVehicleBogieHarian->referensi = $validatedData['referensi'][$key];
                $formApmMekanikalVehicleBogieHarian->catatan = $validatedData['catatan'];
                $formApmMekanikalVehicleBogieHarian->save();
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

    public function formApmVehicleAirBrakeSystemHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - VEHICLE AIR BRAKE SYSTEM';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['air_compressors'] = ['Kondisi fisik box'];
        $data['twin_tower_air_dryers'] = ['Kondisi fisik tower air dryer'];
        $data['mikro_filters'] = ['Visual Check kondisi fisik mikro filter'];
        $data['pressure_switchs'] = ['Visual Check kondisi fisik Pressure Switch'];
        $data['air_filters'] = ['Visual Check kondisi fisik Air Filter'];
        $data['ep_brake_valves'] = ['Visual Check kondisi fisik EP Brake Valve'];

        if (!FormApmVehicleAirBrakeSystemHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['air_compressors'] as $key => $air_compressor) {
                $formApmVehicleAirBrakeSystemHarian = new FormApmVehicleAirBrakeSystemHarian();
                $formApmVehicleAirBrakeSystemHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmVehicleAirBrakeSystemHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmVehicleAirBrakeSystemHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system = $air_compressor;
                $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system_group = 'AIR COMPRESSOR';
                $formApmVehicleAirBrakeSystemHarian->referensi = 'pastikan tidak rusak dan tidak berkarat';
                $formApmVehicleAirBrakeSystemHarian->save();
            }
            foreach ($data['twin_tower_air_dryers'] as $key => $twin_tower_air_dryer) {
                $formApmVehicleAirBrakeSystemHarian = new FormApmVehicleAirBrakeSystemHarian();
                $formApmVehicleAirBrakeSystemHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmVehicleAirBrakeSystemHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmVehicleAirBrakeSystemHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system = $twin_tower_air_dryer;
                $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system_group = 'TWIN TOWER AIR DRYER';
                $formApmVehicleAirBrakeSystemHarian->referensi = 'Pastikan tidak rusak dan tidak berkarat';
                $formApmVehicleAirBrakeSystemHarian->save();
            }
            foreach ($data['mikro_filters'] as $key => $mikro_filter) {
                $formApmVehicleAirBrakeSystemHarian = new FormApmVehicleAirBrakeSystemHarian();
                $formApmVehicleAirBrakeSystemHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmVehicleAirBrakeSystemHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmVehicleAirBrakeSystemHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system = $mikro_filter;
                $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system_group = 'MIKRO FILTER';
                $formApmVehicleAirBrakeSystemHarian->referensi = 'Pastikan tidak rusak dan tidak berkarat';
                $formApmVehicleAirBrakeSystemHarian->save();
            }
            foreach ($data['pressure_switchs'] as $key => $pressure_switch) {
                $formApmVehicleAirBrakeSystemHarian = new FormApmVehicleAirBrakeSystemHarian();
                $formApmVehicleAirBrakeSystemHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmVehicleAirBrakeSystemHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmVehicleAirBrakeSystemHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system = $pressure_switch;
                $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system_group = 'PRESSURE SWITCH';
                $formApmVehicleAirBrakeSystemHarian->referensi = 'Pastikan tidak rusak dan tidak berkarat';
                $formApmVehicleAirBrakeSystemHarian->save();
            }
            foreach ($data['air_filters'] as $key => $air_filter) {
                $formApmVehicleAirBrakeSystemHarian = new FormApmVehicleAirBrakeSystemHarian();
                $formApmVehicleAirBrakeSystemHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmVehicleAirBrakeSystemHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmVehicleAirBrakeSystemHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system = $air_filter;
                $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system_group = 'AIR FILTER';
                $formApmVehicleAirBrakeSystemHarian->referensi = 'Pastikan tidak rusak dan tidak berkarat';
                $formApmVehicleAirBrakeSystemHarian->save();
            }
            foreach ($data['ep_brake_valves'] as $key => $ep_brake_valve) {
                $formApmVehicleAirBrakeSystemHarian = new FormApmVehicleAirBrakeSystemHarian();
                $formApmVehicleAirBrakeSystemHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmVehicleAirBrakeSystemHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmVehicleAirBrakeSystemHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system = $ep_brake_valve;
                $formApmVehicleAirBrakeSystemHarian->pemeriksaan_air_brake_system_group = 'EP BRAKE VALVE';
                $formApmVehicleAirBrakeSystemHarian->referensi = 'Pastikan tidak rusak dan tidak berkarat';
                $formApmVehicleAirBrakeSystemHarian->save();
            }
        }
        $data['formApmVehicleAirBrakeSystemHarians'] = FormApmVehicleAirBrakeSystemHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.apm.vehicle-air-brake-system-harian.index', $data);
    }

    public function formApmVehicleAirBrakeSystemHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmVehicleAirBrakeSystemHarians'] = FormApmVehicleAirBrakeSystemHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmVehicleAirBrakeSystemHarians'] as $key => $formApmVehicleAirBrakeSystemHarian) {
                $formApmVehicleAirBrakeSystemHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmVehicleAirBrakeSystemHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmVehicleAirBrakeSystemHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmVehicleAirBrakeSystemHarian->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                if ($formApmVehicleAirBrakeSystemHarian->index == 0) {
                } else {
                    $formApmVehicleAirBrakeSystemHarian->hasil_mc2 = $validatedData['hasil_mc2'][$key] ?? null;
                }
                $formApmVehicleAirBrakeSystemHarian->referensi = $validatedData['referensi'][$key];
                $formApmVehicleAirBrakeSystemHarian->catatan = $validatedData['catatan'];
                $formApmVehicleAirBrakeSystemHarian->save();
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

    public function formApmMekanikalVehicleCarBodyTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - VEHICLE CAR BODY';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['seats'] = ['Kondisi fisik kursi', 'Kondisi kebersihan kursi', 'Kondisi kekencangan baut dan mut'];
        $data['lantai_indoors'] = ['Kondisi fisik lantai', 'Kondisi kebersihan lantai'];
        $data['body_exteriors'] = ['Kondisi fisik Body Exterior', 'Kondisi Kebersihan', 'Kondisi warna cat'];
        $data['couplers'] = ['Visual check kondisi pipa udara', 'Kondisi fisik bantalan Karet', 'Kondisi fisik lengan coupler', 'Kondisi fisik Kepala Coupler', 'Kondisi fisik Muff Coupling', 'kondisi sistem grounding', 'Kondisi kebersihan Coupler'];
        $data['semi_couplers'] = ['Visual check kondisi pipa udara', 'Kondisi kebersihan Semi Coupler', 'Kondisi fisik Muff Coupling'];
        $data['gangways'] = ['Kondisi fisik Gangway', 'Kondisi fisik Gangway dan joint plat', 'Kondisi kebersihan Gangway'];

        if (!FormApmMekanikalVehicleCarbodyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['seats'] as $key => $seat) {
                $formApmMekanikalVehicleCarBodyTigaBulanan = new FormApmMekanikalVehicleCarBodyTigaBulanan();
                $formApmMekanikalVehicleCarBodyTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody = $seat;
                $formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody_group = 'Kursi/Seat';
                if ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Kondisi fisik kursi') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan tidak terdapat pengelupasan dan warna yang pudar';
                } elseif ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Kondisi kebersihan kursi') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan tidak longgar';
                }
                $formApmMekanikalVehicleCarBodyTigaBulanan->save();
            }
            foreach ($data['lantai_indoors'] as $key => $lantai_indoor) {
                $formApmMekanikalVehicleCarBodyTigaBulanan = new FormApmMekanikalVehicleCarBodyTigaBulanan();
                $formApmMekanikalVehicleCarBodyTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody = $lantai_indoor;
                $formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody_group = 'lantai Indoor';
                if ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Kondisi fisik lantai') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan tidak terdapat pengelupasan, kerusakan, dan ketakan';
                } else {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleCarBodyTigaBulanan->save();
            }
            foreach ($data['body_exteriors'] as $key => $body_exterior) {
                $formApmMekanikalVehicleCarBodyTigaBulanan = new FormApmMekanikalVehicleCarBodyTigaBulanan();
                $formApmMekanikalVehicleCarBodyTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody = $body_exterior;
                $formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody_group = 'Body Exterior';
                if ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Kondisi fisik Body Exterior') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan tidak terdapat kerusakan pada panel';
                } elseif ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Kondisi Kebersihan') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan tidak terdapat perubahan warna, pengelupasan, atau pudar.';
                }
                $formApmMekanikalVehicleCarBodyTigaBulanan->save();
            }
            foreach ($data['couplers'] as $key => $coupler) {
                $formApmMekanikalVehicleCarBodyTigaBulanan = new FormApmMekanikalVehicleCarBodyTigaBulanan();
                $formApmMekanikalVehicleCarBodyTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody = $coupler;
                $formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody_group = 'Coupler';
                if ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Visual check kondisi pipa udara') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan pipa udara bersih dan tidak tersumbat debu atau kotoran';
                } elseif ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Kondisi fisik bantalan Karet') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan bantalan karet dalam keadaan bersih, tidak aus, dan rusak';
                } elseif ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Kondisi fisik lengan coupler') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan kondisi bersih, tidak penyok, dan tidak rusak.';
                } elseif ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Kondisi fisik Kepala Coupler') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan permukaan kepala coupler dalam keadaan bersih, tidak penyok, dan pengunci dapat berfungsi.';
                } elseif ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Kondisi fisik Muff Coupling') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan baut tidak longgar';
                } elseif ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'kondisi sistem grounding') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan kabel tidak terputus';
                } else {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                }
                $formApmMekanikalVehicleCarBodyTigaBulanan->save();
            }
            foreach ($data['semi_couplers'] as $key => $semi_coupler) {
                $formApmMekanikalVehicleCarBodyTigaBulanan = new FormApmMekanikalVehicleCarBodyTigaBulanan();
                $formApmMekanikalVehicleCarBodyTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody = $semi_coupler;
                $formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody_group = 'Semi Coupler';
                if ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Visual check kondisi pipa udara') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan pipa udara bersih dan tidak tersumbat debu atau kotoran';
                } elseif ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Kondisi kebersihan Semi Coupler') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan baut tidak longgar.';
                }
                $formApmMekanikalVehicleCarBodyTigaBulanan->save();
            }
            foreach ($data['gangways'] as $key => $gangway) {
                $formApmMekanikalVehicleCarBodyTigaBulanan = new FormApmMekanikalVehicleCarBodyTigaBulanan();
                $formApmMekanikalVehicleCarBodyTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody = $gangway;
                $formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody_group = 'Gangway';
                if ($formApmMekanikalVehicleCarBodyTigaBulanan->pemeriksaan_carbody == 'Kondisi kebersihan Gangway') {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Pastikan tidak kotor dan bersih dari debu';
                } else {
                    $formApmMekanikalVehicleCarBodyTigaBulanan->referensi = 'Patikan tidak rusak.';
                }
                $formApmMekanikalVehicleCarBodyTigaBulanan->save();
            }
        }
        $data['formApmMekanikalVehicleCarBodyTigaBulanans'] = FormApmMekanikalVehicleCarBodyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.apm.vehicle-carbody-tiga-bulanan.index', $data);
    }

    public function formApmMekanikalVehicleCarbodyTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmMekanikalVehicleCarbodyTigaBulanans'] = FormApmMekanikalVehicleCarbodyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmMekanikalVehicleCarbodyTigaBulanans'] as $key => $formApmMekanikalVehicleCarbodyTigaBulanan) {
                $formApmMekanikalVehicleCarbodyTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmMekanikalVehicleCarbodyTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formApmMekanikalVehicleCarbodyTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmMekanikalVehicleCarbodyTigaBulanan->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmMekanikalVehicleCarbodyTigaBulanan->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmMekanikalVehicleCarbodyTigaBulanan->referensi = $validatedData['referensi'][$key];
                $formApmMekanikalVehicleCarbodyTigaBulanan->catatan = $validatedData['catatan'];
                $formApmMekanikalVehicleCarbodyTigaBulanan->save();
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

    


    public function formApmVehicleCarBodyHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form APM - VEHICLE CAR BODY';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['seats'] = ['Kondisi fisik kursi'];
        $data['gangways'] = ['Kondisi fisik Gangway dan joint plat'];

        if (!FormApmVehicleCarBodyHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['seats'] as $key => $seat) {
                $formApmVehicleCarBodyHarian = new FormApmVehicleCarBodyHarian();
                $formApmVehicleCarBodyHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmVehicleCarBodyHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmVehicleCarBodyHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmVehicleCarBodyHarian->pemeriksaan_carbody = $seat;
                $formApmVehicleCarBodyHarian->pemeriksaan_carbody_group = 'Kursi / Seat';
                $formApmVehicleCarBodyHarian->referensi = 'Pastikan tidak terdapat pengelupasan dan warna yang pudar';
                $formApmVehicleCarBodyHarian->save();
            }
            foreach ($data['gangways'] as $key => $gangway) {
                $formApmVehicleCarBodyHarian = new FormApmVehicleCarBodyHarian();
                $formApmVehicleCarBodyHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmVehicleCarBodyHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmVehicleCarBodyHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmVehicleCarBodyHarian->pemeriksaan_carbody = $gangway;
                $formApmVehicleCarBodyHarian->pemeriksaan_carbody_group = 'Gangway';
                $formApmVehicleCarBodyHarian->referensi = 'Pastikan tidak rusak';
                $formApmVehicleCarBodyHarian->save();
            }
        }
        $data['formApmVehicleCarBodyHarians'] = FormApmVehicleCarBodyHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.apm.vehicle-carbody-harian.index', $data);
    }

    public function formApmVehicleCarBodyHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'hasil_mc1.*' => ['nullable'],
            'hasil_mc2.*' => ['nullable'],
            'referensi.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formApmVehicleCarBodyHarians'] = FormApmVehicleCarBodyHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formApmVehicleCarBodyHarians'] as $key => $formApmVehicleCarBodyHarian) {
                $formApmVehicleCarBodyHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formApmVehicleCarBodyHarian->form_id = $detailWorkOrderForm->form_id;
                $formApmVehicleCarBodyHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formApmVehicleCarBodyHarian->hasil_mc1 = $validatedData['hasil_mc1'][$key];
                $formApmVehicleCarBodyHarian->hasil_mc2 = $validatedData['hasil_mc2'][$key];
                $formApmVehicleCarBodyHarian->referensi = $validatedData['referensi'][$key];
                $formApmVehicleCarBodyHarian->catatan = $validatedData['catatan'];
                $formApmVehicleCarBodyHarian->save();
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
