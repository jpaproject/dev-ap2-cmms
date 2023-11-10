<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use App\Helpers\ActivityLog;
use Illuminate\Http\Request;
use App\Models\AssetMaterial;
use App\Models\FormActivityLog;
use Illuminate\Support\Facades\DB;
use App\Models\DetailWorkOrderForm;
use Illuminate\Support\Facades\Auth;
use App\Models\FormSntPerawatanT3VIP;
use App\Models\FormSntChecklistLiftingPump;
use App\Models\FormSntChecklistLiftingPumpHarian;
use App\Models\FormSntChecklistDelacerationHarian;
use App\Models\FormSntChecklistSewageTreatmentPlantHarian;
use App\Models\FormSntPerawatanSewageTreatmentPlantHarian;
use App\Models\FormSntChecklistPerawatanIncinerator123Harian;
use App\Models\FormSntChecklistPerawatanIncinerator567Harian;
use App\Models\FormSntChecklistPerawatanIncinerator123Bulanan;
use App\Models\FormSntChecklistPerawatanIncinerator456Bulanan;
use App\Models\FormSntChecklistPerawatanIncinerator123Mingguan;
use App\Models\FormSntChecklistPerawatanIncinerator456Mingguan;
use App\Models\UserTechnical;

class FormSntController extends Controller
{
    public function formSntChecklistPerawatanIncinerator456Bulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form CHECKLIST PERAWATAN INCINERATOR 456 BULANAN - SNT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempData1s = [
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PRIMARY CHAMBER', 'nama_peralatan' => 'Pengeluaran Abu'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PRIMARY CHAMBER', 'nama_peralatan' => 'Periksa Refractory'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PRIMARY CHAMBER', 'nama_peralatan' => 'Periksa Dan Membersihkan Lubang Masuk Udara'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PRIMARY CHAMBER', 'nama_peralatan' => 'Melumasi Seal Pintu'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PRIMARY CHAMBER', 'nama_peralatan' => 'Melumasi Engsel Pintu'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PRIMARY CHAMBER', 'nama_peralatan' => 'Periksa Thermocople'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BLOWER', 'nama_peralatan' => 'Periksa Pipa Masukan Udara'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BLOWER', 'nama_peralatan' => 'Periksa Pipa Penghubung'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'BURNER 1'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'BURNER 2'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'BURNER 3'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'BURNER 4'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'Cek Operasi'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'Cek Lidah Api Dan Safety Penyalaan'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'Periksa Masukan Udara'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'Cek Bahan Bakar Dan Pengaturan Udara'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'Bersihkan Nozzel Burner'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'Cek Dan Bersihkan Burner'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'SCRUBBER PUMP', 'nama_peralatan' => 'Bersihkan Cek Valve'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'SCRUBBER PUMP', 'nama_peralatan' => 'Bersihkan Nozzel Scrubber'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'SCRUBBER PUMP', 'nama_peralatan' => 'Cek Jalur Pipa Air'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR GEARBOX ROTARY', 'nama_peralatan' => 'Ganti Oli'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR GEARBOX ROTARY', 'nama_peralatan' => 'Cek Gearbox'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR GEARBOX ROTARY', 'nama_peralatan' => 'Cek Gear Besar Dan Gear Kecil'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR GEARBOX ROTARY', 'nama_peralatan' => 'Pemakaian Greas Di Gear Besar Dan Gear Kecil'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR GEARBOX ROTARY', 'nama_peralatan' => 'Pembersihan Gearbox'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR CONVEYOR', 'nama_peralatan' => 'Ganti Oli'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR CONVEYOR', 'nama_peralatan' => 'Cek Motor'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR CONVEYOR', 'nama_peralatan' => 'Cek Roda Roller'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR CONVEYOR', 'nama_peralatan' => 'Cek Bel Motor'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR SCRUW', 'nama_peralatan' => 'Ganti Oli'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR SCRUW', 'nama_peralatan' => 'Cek Motor'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR SCRUW', 'nama_peralatan' => 'Cek Lingkaran Scruw'],
        ];

        $tempData2s = [
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Pintu Utama'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Hidrolik'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Sistem Operasi Kelistrikan'],
        ];

        $tempData3s = [
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Pintu Utama'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Hidrolik'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Sistem Operasi Kelistrikan'],
        ];

        if (!FormSntChecklistPerawatanIncinerator456Bulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempData1s as $tempData) {
                $formSntChecklistPerawatanIncinerator456Bulanan = new FormSntChecklistPerawatanIncinerator456Bulanan();
                $formSntChecklistPerawatanIncinerator456Bulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator456Bulanan->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator456Bulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator456Bulanan->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator456Bulanan->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator456Bulanan->save();
            }

            foreach ($tempData2s as $tempData) {
                $formSntChecklistPerawatanIncinerator456Bulanan = new FormSntChecklistPerawatanIncinerator456Bulanan();
                $formSntChecklistPerawatanIncinerator456Bulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator456Bulanan->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator456Bulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator456Bulanan->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator456Bulanan->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator456Bulanan->save();
            }

            foreach ($tempData3s as $tempData) {
                $formSntChecklistPerawatanIncinerator456Bulanan = new FormSntChecklistPerawatanIncinerator456Bulanan();
                $formSntChecklistPerawatanIncinerator456Bulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator456Bulanan->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator456Bulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator456Bulanan->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator456Bulanan->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator456Bulanan->save();
            }

        }
        $data['technicalGroups'] = [];
        $data['userTechnicals'] = [];
        foreach ($data['workOrder']->userGroups as $userGroup) {
            $data['technicalGroups'][] = $userGroup->name;
        }
        foreach ($data['workOrder']->userGroups as $key => $userGroup) {
            if ($key == 0) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            } else {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals2'][] = $userTechnical->name;
                }
            }
        }

        foreach ($data['workOrder']->userTechnicals as $userTechnical) {
            $data['userTechnicals'][] = $userTechnical->name;
        }
        $data['formSntChecklistPerawatanIncinerator456Bulanans'] = FormSntChecklistPerawatanIncinerator456Bulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.snt.checklist-perawatan-incinerator-456-bulanan.index', $data);
    }

    public function formSntChecklistPerawatanIncinerator456BulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'kondisi' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSntChecklistPerawatanIncinerator456Bulanans = FormSntChecklistPerawatanIncinerator456Bulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan) {
                $formSntChecklistPerawatanIncinerator456Bulanan->kondisi = $validatedData['kondisi'][$key];
                $formSntChecklistPerawatanIncinerator456Bulanan->catatan = $validatedData['catatan'];

                $formSntChecklistPerawatanIncinerator456Bulanan->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
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

    public function formSntChecklistPerawatanIncinerator123Bulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form CHECKLIST PERAWATAN INCINERATOR 123 BULANAN - SNT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempData1s = [

            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Pintu Utama'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Pipa Blower'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Tangga Ke Cerobong'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kondisi Lampu Plafon'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Manual'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Auto'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Kondisi HMI'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Thermocontrol'],
        ];

        $tempData2s = [

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Tangga Ke Cerobong'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Manual'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Auto'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Kondisi HMI'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Thermocontrol'],
        ];

        $tempData3s = [

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'BELT CONVEYOR', 'nama_peralatan' => 'Motor Konveyor 1'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'BELT CONVEYOR', 'nama_peralatan' => 'Motor Konveyor 2'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'BELT CONVEYOR', 'nama_peralatan' => 'Motor Konveyor 3'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'BELT CONVEYOR', 'nama_peralatan' => 'Motor Konveyor 4'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Pintu Abu'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Motor Screw'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Burner 4'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Manual'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Auto'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Kondisi HMI'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Thermocontrol'],
        ];

        if (!FormSntChecklistPerawatanIncinerator123Bulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempData1s as $tempData) {
                $formSntChecklistPerawatanIncinerator123Bulanan = new FormSntChecklistPerawatanIncinerator123Bulanan();
                $formSntChecklistPerawatanIncinerator123Bulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator123Bulanan->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator123Bulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator123Bulanan->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator123Bulanan->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator123Bulanan->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator123Bulanan->save();
            }

            foreach ($tempData2s as $tempData) {
                $formSntChecklistPerawatanIncinerator123Bulanan = new FormSntChecklistPerawatanIncinerator123Bulanan();
                $formSntChecklistPerawatanIncinerator123Bulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator123Bulanan->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator123Bulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator123Bulanan->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator123Bulanan->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator123Bulanan->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator123Bulanan->save();
            }

            foreach ($tempData3s as $tempData) {
                $formSntChecklistPerawatanIncinerator123Bulanan = new FormSntChecklistPerawatanIncinerator123Bulanan();
                $formSntChecklistPerawatanIncinerator123Bulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator123Bulanan->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator123Bulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator123Bulanan->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator123Bulanan->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator123Bulanan->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator123Bulanan->save();
            }

        }
        $data['technicalGroups'] = [];
        $data['userTechnicals'] = [];
        foreach ($data['workOrder']->userGroups as $userGroup) {
            $data['technicalGroups'][] = $userGroup->name;
        }
        foreach ($data['workOrder']->userGroups as $key => $userGroup) {
            if ($key == 0) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            } else {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals2'][] = $userTechnical->name;
                }
            }
        }

        foreach ($data['workOrder']->userTechnicals as $userTechnical) {
            $data['userTechnicals'][] = $userTechnical->name;
        }
        $data['formSntChecklistPerawatanIncinerator123Bulanans'] = FormSntChecklistPerawatanIncinerator123Bulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.snt.checklist-perawatan-incinerator-123-bulanan.index', $data);
    }

    public function formSntChecklistPerawatanIncinerator123BulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'kondisi' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSntChecklistPerawatanIncinerator123Bulanans = FormSntChecklistPerawatanIncinerator123Bulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSntChecklistPerawatanIncinerator123Bulanans as $key => $formSntChecklistPerawatanIncinerator123Bulanan) {
                $formSntChecklistPerawatanIncinerator123Bulanan->kondisi = $validatedData['kondisi'][$key];
                $formSntChecklistPerawatanIncinerator123Bulanan->catatan = $validatedData['catatan'];

                $formSntChecklistPerawatanIncinerator123Bulanan->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
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
    public function formSntChecklistPerawatanIncinerator456Mingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form CHECKLIST PERAWATAN INCINERATOR 456 MINGGUAN - SNT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempData1s = [
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PRIMARY CHAMBER', 'nama_peralatan' => 'Pengeluaran Abu'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PRIMARY CHAMBER', 'nama_peralatan' => 'Periksa Refractory'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PRIMARY CHAMBER', 'nama_peralatan' => 'Periksa Dan Membersihkan Lubang Masuk Udara'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PRIMARY CHAMBER', 'nama_peralatan' => 'Melumasi Seal Pintu'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PRIMARY CHAMBER', 'nama_peralatan' => 'Melumasi Engsel Pintu'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PRIMARY CHAMBER', 'nama_peralatan' => 'Periksa Thermocople'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BLOWER', 'nama_peralatan' => 'Periksa Pipa Masukan Udara'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BLOWER', 'nama_peralatan' => 'Periksa Pipa Penghubung'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'BURNER 1'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'BURNER 2'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'BURNER 3'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'BURNER 4'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'Cek Operasi'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'Cek Lidah Api Dan Safety Penyalaan'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'Periksa Masukan Udara'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'Cek Bahan Bakar Dan Pengaturan Udara'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'Bersihkan Nozzel Burner'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BURNER', 'nama_peralatan' => 'Cek Dan Bersihkan Burner'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'SCRUBBER PUMP', 'nama_peralatan' => 'Bersihkan Cek Valve'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'SCRUBBER PUMP', 'nama_peralatan' => 'Bersihkan Nozzel Scrubber'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'SCRUBBER PUMP', 'nama_peralatan' => 'Cek Jalur Pipa Air'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR GEARBOX ROTARY', 'nama_peralatan' => 'Ganti Oli'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR GEARBOX ROTARY', 'nama_peralatan' => 'Cek Gearbox'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR GEARBOX ROTARY', 'nama_peralatan' => 'Cek Gear Besar Dan Gear Kecil'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR GEARBOX ROTARY', 'nama_peralatan' => 'Pemakaian Greas Di Gear Besar Dan Gear Kecil'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR GEARBOX ROTARY', 'nama_peralatan' => 'Pembersihan Gearbox'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR CONVEYOR', 'nama_peralatan' => 'Ganti Oli'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR CONVEYOR', 'nama_peralatan' => 'Cek Motor'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR CONVEYOR', 'nama_peralatan' => 'Cek Roda Roller'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR CONVEYOR', 'nama_peralatan' => 'Cek Bel Motor'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR SCRUW', 'nama_peralatan' => 'Ganti Oli'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR SCRUW', 'nama_peralatan' => 'Cek Motor'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'MOTOR SCRUW', 'nama_peralatan' => 'Cek Lingkaran Scruw'],
        ];

        $tempData2s = [
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Pintu Utama'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Hidrolik'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Sistem Operasi Kelistrikan'],
        ];

        $tempData3s = [
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Pintu Utama'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Hidrolik'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Sistem Operasi Kelistrikan'],
        ];

        if (!FormSntChecklistPerawatanIncinerator456Mingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempData1s as $tempData) {
                $formSntChecklistPerawatanIncinerator456Mingguan = new FormSntChecklistPerawatanIncinerator456Mingguan();
                $formSntChecklistPerawatanIncinerator456Mingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator456Mingguan->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator456Mingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator456Mingguan->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator456Mingguan->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator456Mingguan->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator456Mingguan->save();
            }

            foreach ($tempData2s as $tempData) {
                $formSntChecklistPerawatanIncinerator456Mingguan = new FormSntChecklistPerawatanIncinerator456Mingguan();
                $formSntChecklistPerawatanIncinerator456Mingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator456Mingguan->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator456Mingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator456Mingguan->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator456Mingguan->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator456Mingguan->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator456Mingguan->save();
            }

            foreach ($tempData3s as $tempData) {
                $formSntChecklistPerawatanIncinerator456Mingguan = new FormSntChecklistPerawatanIncinerator456Mingguan();
                $formSntChecklistPerawatanIncinerator456Mingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator456Mingguan->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator456Mingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator456Mingguan->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator456Mingguan->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator456Mingguan->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator456Mingguan->save();
            }

        }
        $data['technicalGroups'] = [];
        $data['userTechnicals'] = [];
        foreach ($data['workOrder']->userGroups as $userGroup) {
            $data['technicalGroups'][] = $userGroup->name;
        }
        foreach ($data['workOrder']->userGroups as $key => $userGroup) {
            if ($key == 0) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            } else {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals2'][] = $userTechnical->name;
                }
            }
        }

        foreach ($data['workOrder']->userTechnicals as $userTechnical) {
            $data['userTechnicals'][] = $userTechnical->name;
        }
        $data['formSntChecklistPerawatanIncinerator456Mingguans'] = FormSntChecklistPerawatanIncinerator456Mingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.snt.checklist-perawatan-incinerator-456-mingguan.index', $data);
    }

    public function formSntChecklistPerawatanIncinerator456MingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'kondisi' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSntChecklistPerawatanIncinerator456Mingguans = FormSntChecklistPerawatanIncinerator456Mingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSntChecklistPerawatanIncinerator456Mingguans as $key => $formSntChecklistPerawatanIncinerator456Mingguan) {
                $formSntChecklistPerawatanIncinerator456Mingguan->kondisi = $validatedData['kondisi'][$key];
                $formSntChecklistPerawatanIncinerator456Mingguan->catatan = $validatedData['catatan'];

                $formSntChecklistPerawatanIncinerator456Mingguan->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
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
    public function formSntChecklistPerawatanIncinerator123Mingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form CHECKLIST PERAWATAN INCINERATOR 123 MINGGUAN - SNT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempData1s = [

            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Pintu Utama'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Pipa Blower'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Tangga Ke Cerobong'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kondisi Lampu Plafon'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Manual'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Auto'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Kondisi HMI'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Thermocontrol'],
        ];

        $tempData2s = [

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Tangga Ke Cerobong'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Manual'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Auto'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Kondisi HMI'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Thermocontrol'],
        ];

        $tempData3s = [

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'BELT CONVEYOR', 'nama_peralatan' => 'Motor Konveyor 1'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'BELT CONVEYOR', 'nama_peralatan' => 'Motor Konveyor 2'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'BELT CONVEYOR', 'nama_peralatan' => 'Motor Konveyor 3'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'BELT CONVEYOR', 'nama_peralatan' => 'Motor Konveyor 4'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Pintu Abu'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Motor Screw'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Burner 4'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Manual'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Auto'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Kondisi HMI'],
            ['incinerator' => 'INCINERATOR NOMER 3', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Thermocontrol'],
        ];

        if (!FormSntChecklistPerawatanIncinerator123Mingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempData1s as $tempData) {
                $formSntChecklistPerawatanIncinerator123Mingguan = new FormSntChecklistPerawatanIncinerator123Mingguan();
                $formSntChecklistPerawatanIncinerator123Mingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator123Mingguan->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator123Mingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator123Mingguan->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator123Mingguan->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator123Mingguan->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator123Mingguan->save();
            }

            foreach ($tempData2s as $tempData) {
                $formSntChecklistPerawatanIncinerator123Mingguan = new FormSntChecklistPerawatanIncinerator123Mingguan();
                $formSntChecklistPerawatanIncinerator123Mingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator123Mingguan->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator123Mingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator123Mingguan->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator123Mingguan->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator123Mingguan->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator123Mingguan->save();
            }

            foreach ($tempData3s as $tempData) {
                $formSntChecklistPerawatanIncinerator123Mingguan = new FormSntChecklistPerawatanIncinerator123Mingguan();
                $formSntChecklistPerawatanIncinerator123Mingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator123Mingguan->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator123Mingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator123Mingguan->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator123Mingguan->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator123Mingguan->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator123Mingguan->save();
            }

        }
        $data['technicalGroups'] = [];
        $data['userTechnicals'] = [];
        foreach ($data['workOrder']->userGroups as $userGroup) {
            $data['technicalGroups'][] = $userGroup->name;
        }
        foreach ($data['workOrder']->userGroups as $key => $userGroup) {
            if ($key == 0) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            } else {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals2'][] = $userTechnical->name;
                }
            }
        }

        foreach ($data['workOrder']->userTechnicals as $userTechnical) {
            $data['userTechnicals'][] = $userTechnical->name;
        }
        $data['formSntChecklistPerawatanIncinerator123Mingguans'] = FormSntChecklistPerawatanIncinerator123Mingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.snt.checklist-perawatan-incinerator-123-mingguan.index', $data);
    }

    public function formSntChecklistPerawatanIncinerator123MingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'kondisi' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSntChecklistPerawatanIncinerator123Mingguans = FormSntChecklistPerawatanIncinerator123Mingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSntChecklistPerawatanIncinerator123Mingguans as $key => $formSntChecklistPerawatanIncinerator123Mingguan) {
                $formSntChecklistPerawatanIncinerator123Mingguan->kondisi = $validatedData['kondisi'][$key];
                $formSntChecklistPerawatanIncinerator123Mingguan->catatan = $validatedData['catatan'];

                $formSntChecklistPerawatanIncinerator123Mingguan->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
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
    public function formSntChecklistPerawatanIncinerator567Harian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form CHECKLIST PERAWATAN INCINERATOR 567 HARIAN - SNT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempData1s = [
            ['incinerator' => 'INCINERATOR NOMER 5','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 5','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 5','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 5','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 5','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 5','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 5','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 5','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 5','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 5','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 5','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 5','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Pintu Utama'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Hidrolik'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 5', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Sistem Operasi Kelistrikan'],
        ];

        $tempData2s = [
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Pintu Utama'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Hidrolik'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 6', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Sistem Operasi Kelistrikan'],
        ];

        $tempData3s = [
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Pintu Utama'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Hidrolik'],

            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 7', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Sistem Operasi Kelistrikan'],
        ];

        if (!FormSntChecklistPerawatanIncinerator567Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempData1s as $tempData) {
                $formSntChecklistPerawatanIncinerator567Harian = new FormSntChecklistPerawatanIncinerator567Harian();
                $formSntChecklistPerawatanIncinerator567Harian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator567Harian->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator567Harian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator567Harian->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator567Harian->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator567Harian->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator567Harian->save();
            }

            foreach ($tempData2s as $tempData) {
                $formSntChecklistPerawatanIncinerator567Harian = new FormSntChecklistPerawatanIncinerator567Harian();
                $formSntChecklistPerawatanIncinerator567Harian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator567Harian->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator567Harian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator567Harian->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator567Harian->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator567Harian->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator567Harian->save();
            }

            foreach ($tempData3s as $tempData) {
                $formSntChecklistPerawatanIncinerator567Harian = new FormSntChecklistPerawatanIncinerator567Harian();
                $formSntChecklistPerawatanIncinerator567Harian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator567Harian->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator567Harian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator567Harian->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator567Harian->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator567Harian->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator567Harian->save();
            }

        }
        $data['technicalGroups'] = [];
        $data['userTechnicals'] = [];
        foreach ($data['workOrder']->userGroups as $userGroup) {
            $data['technicalGroups'][] = $userGroup->name;
        }
        foreach ($data['workOrder']->userGroups as $key => $userGroup) {
            if ($key == 0) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            } else {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals2'][] = $userTechnical->name;
                }
            }
        }

        foreach ($data['workOrder']->userTechnicals as $userTechnical) {
            $data['userTechnicals'][] = $userTechnical->name;
        }
        $data['formSntChecklistPerawatanIncinerator567Harians'] = FormSntChecklistPerawatanIncinerator567Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.snt.checklist-perawatan-incinerator-567-harian.index', $data);
    }

    public function formSntChecklistPerawatanIncinerator567HarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'kondisi' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSntChecklistPerawatanIncinerator567Harians = FormSntChecklistPerawatanIncinerator567Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSntChecklistPerawatanIncinerator567Harians as $key => $formSntChecklistPerawatanIncinerator567Harian) {
                $formSntChecklistPerawatanIncinerator567Harian->kondisi = $validatedData['kondisi'][$key];
                $formSntChecklistPerawatanIncinerator567Harian->catatan = $validatedData['catatan'];

                $formSntChecklistPerawatanIncinerator567Harian->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
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
    public function formSntChecklistPerawatanIncinerator123Harian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form CHECKLIST PERAWATAN INCINERATOR 123 HARIAN - SNT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempData1s = [

            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'MECHANICAL LIFTER','nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 1','group' => 'RUANG BAKAR I','nama_peralatan' => 'Kondisi Pintu Utama'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Pipa Blower'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Tangga Ke Cerobong'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kondisi Lampu Plafon'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Manual'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Auto'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Kondisi HMI'],
            ['incinerator' => 'INCINERATOR NOMER 1', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Thermocontrol'],
        ];

        $tempData2s = [

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Trolly'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Seling'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Roller'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Kondisi Gear Box'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'MECHANICAL LIFTER', 'nama_peralatan' => 'Posisi landing Trolly'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR I', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'RUANG BAKAR II', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Tangga Ke Cerobong'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Ground Tank'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Manual'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Auto'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Kondisi HMI'],
            ['incinerator' => 'INCINERATOR NOMER 2', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Thermocontrol'],
        ];

        $tempData3s = [

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BELT CONVEYOR', 'nama_peralatan' => 'Motor Konveyor 1'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BELT CONVEYOR', 'nama_peralatan' => 'Motor Konveyor 2'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BELT CONVEYOR', 'nama_peralatan' => 'Motor Konveyor 3'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'BELT CONVEYOR', 'nama_peralatan' => 'Motor Konveyor 4'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Burner 1'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Burner 2'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Penutup Feeding'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Pintu Abu'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'FIRST ROTARY CHAMBER', 'nama_peralatan' => 'Kondisi Motor Screw'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Refraktory'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Burner 3'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Burner 4'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Thermocouple'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'SECOND CHAMBER', 'nama_peralatan' => 'Kondisi Pintu'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa 1 "& valve'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pipa & jet sprinkle'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Pompa Sirkulasi'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi Supply air bersih'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'WET SCRUBBER', 'nama_peralatan' => 'Kondisi bak Scrubber'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'CEROBONG', 'nama_peralatan' => 'Kondisi Blower'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'CEROBONG', 'nama_peralatan' => 'Sling Penahan'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'LAMPU PENERANGAN', 'nama_peralatan' => 'Kelistrikan'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Pompa Solar'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'POMPA SOLAR', 'nama_peralatan' => 'Kondisi Tangki Atas'],

            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Manual'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Operasi Auto'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Kondisi HMI'],
            ['incinerator' => 'INCINERATOR NOMER 4', 'group' => 'PANEL KONTROL', 'nama_peralatan' => 'Thermocontrol'],
        ];

        if (!FormSntChecklistPerawatanIncinerator123Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempData1s as $tempData) {
                $formSntChecklistPerawatanIncinerator123Harian = new FormSntChecklistPerawatanIncinerator123Harian();
                $formSntChecklistPerawatanIncinerator123Harian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator123Harian->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator123Harian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator123Harian->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator123Harian->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator123Harian->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator123Harian->save();
            }

            foreach ($tempData2s as $tempData) {
                $formSntChecklistPerawatanIncinerator123Harian = new FormSntChecklistPerawatanIncinerator123Harian();
                $formSntChecklistPerawatanIncinerator123Harian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator123Harian->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator123Harian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator123Harian->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator123Harian->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator123Harian->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator123Harian->save();
            }

            foreach ($tempData3s as $tempData) {
                $formSntChecklistPerawatanIncinerator123Harian = new FormSntChecklistPerawatanIncinerator123Harian();
                $formSntChecklistPerawatanIncinerator123Harian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistPerawatanIncinerator123Harian->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistPerawatanIncinerator123Harian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistPerawatanIncinerator123Harian->incinerator = $tempData['incinerator'];
                $formSntChecklistPerawatanIncinerator123Harian->group = $tempData['group'];
                $formSntChecklistPerawatanIncinerator123Harian->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistPerawatanIncinerator123Harian->save();
            }

        }
        $data['technicalGroups'] = [];
        $data['userTechnicals'] = [];
        foreach ($data['workOrder']->userGroups as $userGroup) {
            $data['technicalGroups'][] = $userGroup->name;
        }
        foreach ($data['workOrder']->userGroups as $key => $userGroup) {
            if ($key == 0) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            } else {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals2'][] = $userTechnical->name;
                }
            }
        }

        foreach ($data['workOrder']->userTechnicals as $userTechnical) {
            $data['userTechnicals'][] = $userTechnical->name;
        }
        $data['formSntChecklistPerawatanIncinerator123Harians'] = FormSntChecklistPerawatanIncinerator123Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.snt.checklist-perawatan-incinerator-123-harian.index', $data);
    }

    public function formSntChecklistPerawatanIncinerator123HarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'kondisi' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSntChecklistPerawatanIncinerator123Harians = FormSntChecklistPerawatanIncinerator123Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSntChecklistPerawatanIncinerator123Harians as $key => $formSntChecklistPerawatanIncinerator123Harian) {
                $formSntChecklistPerawatanIncinerator123Harian->kondisi = $validatedData['kondisi'][$key];
                $formSntChecklistPerawatanIncinerator123Harian->catatan = $validatedData['catatan'];

                $formSntChecklistPerawatanIncinerator123Harian->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
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
    public function formSntChecklistLiftingPumpHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Checklist Sewage Treatment Plant Harian - SNT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempDatas = [

            ['nama_peralatan' => 'SUBMERSIBLE PUMP P1 No. 1', 'lokasi' => 'Depan Gd. ACS' ,'merk' => 'KSB 12 KW', 'tipe' => 'KRTU 150-315/164 W'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P1 No. 2', 'lokasi' => 'Depan Gd. ACS' ,'merk' => 'KSB 12 KW', 'tipe' => 'KRTU 150-315/164 W'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP P1)', 'lokasi' => 'Depan Gd. ACS', 'merk' => '-', 'tipe' => '-'],

            ['nama_peralatan' => 'SUBMERSIBLE PUMP P5 No. 1', 'lokasi' => 'Area Cargo' ,'merk' => 'KSB 12,5 KW', 'tipe' => 'KRTU 150-315/164 W'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P5 No. 2', 'lokasi' => 'Area Cargo' ,'merk' => 'KSB 12,5 KW', 'tipe' => 'KRTU 150-315/164 W'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP P5)', 'lokasi' => 'Area Cargo', 'merk' => '-', 'tipe' => '-'],

            ['nama_peralatan' => 'SUBMERSIBLE PUMP P6 No. 1', 'lokasi' => 'Gedung Pertamina' ,'merk' => 'KSB 0,6 KW', 'tipe' => 'KRTUP100-DN65'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P6 No. 2', 'lokasi' => 'Gedung Pertamina' ,'merk' => 'KSB 0,6 KW', 'tipe' => 'KRTUP100-DN65'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP P6)', 'lokasi' => 'Gedung Pertamina', 'merk' => '-', 'tipe' => '-'],

            ['nama_peralatan' => 'SUBMERSIBLE PUMP P7 No. 1', 'lokasi' => 'Jalan Raya ke Term.1', 'merk' => 'KSB 24 KW', 'tipe' => 'KRTUE200-370/186'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P7 No. 2', 'lokasi' => 'Jalan Raya ke Term.1', 'merk' => 'KSB 24 KW', 'tipe' => 'KRTUE200-370/186'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP P7)', 'lokasi' => 'Jalan Raya ke Term.1', 'merk' => '-', 'tipe' => '-'],

            ['nama_peralatan' => 'SUBMERSIBLE PUMP P11 No. 1', 'lokasi' => 'KKP / Kantor Kesehatan Pelabuhan BSH', 'merk' => 'KSB 11,8 KW', 'tipe' => 'KRTF 150-315/164W'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P11 No. 2', 'lokasi' => 'KKP / Kantor Kesehatan Pelabuhan BSH', 'merk' => 'KSB 11,8 KW', 'tipe' => 'KRTF 150-315/164W'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP P11)', 'lokasi' => 'KKP / Kantor Kesehatan Pelabuhan BSH', 'merk' => '-', 'tipe' => '-'],

            ['nama_peralatan' => 'SUBMERSIBLE PUMP P254 No. 1', 'lokasi' => 'Terminal 2', 'merk' => '7,3 KW', 'tipe' => 'KRTU100-260/74'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P254 No. 2', 'lokasi' => 'Terminal 2', 'merk' => '7,3 KW', 'tipe' => 'KRTU100-260/74'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP P254)', 'lokasi' => 'Terminal 2', 'merk' => '-', 'tipe' => '-'],

            ['nama_peralatan' => 'SUBMERSIBLE PUMP PCP No. 1', 'lokasi' => 'Terminal 2', 'merk' => 'KSB 12,8 KW', 'tipe' => 'KRTF'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP PCP No. 2', 'lokasi' => 'Terminal 2', 'merk' => 'KSB 12,8 KW', 'tipe' => 'KRTF 150-315/126 UGS'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP PCP)', 'lokasi' => 'Terminal 2', 'merk' => '-', 'tipe' => '-'],

            ['nama_peralatan' => 'SUBMERSIBLE PUMP PA No. 1', 'lokasi' => 'Terminal 1A', 'merk' => 'KSB 10,8 KW', 'tipe' => 'KRTF'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP PA No. 2', 'lokasi' => 'Terminal 1A', 'merk' => 'KSB 10,8 KW', 'tipe' => 'KRTF'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP PA)', 'lokasi' => 'Terminal 1A', 'merk' => '-', 'tipe' => '-'],

            ['nama_peralatan' => 'SUBMERSIBLE PUMP PB No. 1', 'lokasi' => 'Terminal 1B', 'merk' => 'KSB 10,8 KW', 'tipe' => 'KRTF'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP PB No. 2', 'lokasi' => 'Terminal 1B', 'merk' => 'KSB 10,8 KW', 'tipe' => 'KRTF'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP PB)', 'lokasi' => 'Terminal 1B', 'merk' => '-', 'tipe' => '-'],

            ['nama_peralatan' => 'SUBMERSIBLE PUMP PC No. 1', 'lokasi' => 'Terminal 1C', 'merk' => 'KSB 10,8 KW', 'tipe' => 'KRTF'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP PC No. 2', 'lokasi' => 'Terminal 1C', 'merk' => 'KSB 10,8 KW', 'tipe' => 'KRTF'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP PC)', 'lokasi' => 'Terminal 1C', 'merk' => '-', 'tipe' => '-']
        ];

        if (!FormSntChecklistLiftingPumpHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempDatas as $tempData) {
                $formSntChecklistLiftingPumpHarian = new FormSntChecklistLiftingPumpHarian();
                $formSntChecklistLiftingPumpHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistLiftingPumpHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistLiftingPumpHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistLiftingPumpHarian->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistLiftingPumpHarian->lokasi = $tempData['lokasi'];
                $formSntChecklistLiftingPumpHarian->merk = $tempData['merk'];
                $formSntChecklistLiftingPumpHarian->tipe = $tempData['tipe'];
                $formSntChecklistLiftingPumpHarian->save();
            }

        }
        $data['technicalGroups'] = [];
        $data['userTechnicals'] = [];
        foreach ($data['workOrder']->userGroups as $userGroup) {
            $data['technicalGroups'][] = $userGroup->name;
        }
        foreach ($data['workOrder']->userGroups as $key => $userGroup) {
            if ($key == 0) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            } else {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals2'][] = $userTechnical->name;
                }
            }
        }

        foreach ($data['workOrder']->userTechnicals as $userTechnical) {
            $data['userTechnicals'][] = $userTechnical->name;
        }
        $data['formSntChecklistLiftingPumpHarians'] = FormSntChecklistLiftingPumpHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.snt.checklist-lifting-pump-harian.index', $data);
    }

    public function formSntChecklistLiftingPumpHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'kondisi' => ['nullable'],
            'keterangan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSntChecklistLiftingPumpHarians = FormSntChecklistLiftingPumpHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSntChecklistLiftingPumpHarians as $key => $formSntChecklistLiftingPumpHarian) {
                $formSntChecklistLiftingPumpHarian->kondisi = $validatedData['kondisi'][$key];
                $formSntChecklistLiftingPumpHarian->keterangan = $validatedData['keterangan'][$key];

                $formSntChecklistLiftingPumpHarian->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
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
    public function formSntChecklistDelacerationHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Checklist Lifting Pump - SNT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempDatas = [
            ['nama_peralatan' => 'DIS INTEGRATOR MOTOR (DC) No. 1'],
            ['nama_peralatan' => 'DIS INTEGRATOR MOTOR (DC) No. 2'],
            ['nama_peralatan' => 'LIFTING PUMP MOTOR (PL) No. 1'],
            ['nama_peralatan' => 'LIFTING PUMP MOTOR (PL) No. 2'],
            ['nama_peralatan' => 'SUMPIT PUMP MOTOR (PU) No. 1'],
            ['nama_peralatan' => 'SUMPIT PUMP MOTOR (PU) No. 2'],
            ['nama_peralatan' => 'DESK KONTROL UTAMA'],
            ['nama_peralatan' => 'MIMIC DIAGRAM'],
            ['nama_peralatan' => 'PANEL KONTROL PLC'],
            ['nama_peralatan' => 'FRESH WATER TANK 1500L'],
            ['nama_peralatan' => 'TREATMENT TANK WATER 5000L'],
            ['nama_peralatan' => 'MACERATOR PUMP'],
            ['nama_peralatan' => 'MACERATOR PUMP'],
            ['nama_peralatan' => 'PANEL KONTROL MACERATOR NO.1'],
            ['nama_peralatan' => 'PANEL KONTROL MACERATOR NO.2'],
            ['nama_peralatan' => 'SELENOID VALVE'],
            ['nama_peralatan' => 'MOTORIZE VALVE'],
            ['nama_peralatan' => 'PANEL KONTROL MOTORIZE'],
            ['nama_peralatan' => 'TRAFFICT LIGHT'],
            ['nama_peralatan' => 'PUSH BUTTON ON OFF'],
            ['nama_peralatan' => 'INFARED SENSOR'],
        ];

        if (!FormSntChecklistDelacerationHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempDatas as $tempData) {
                $formSntChecklistDelacerationHarian = new FormSntChecklistDelacerationHarian();
                $formSntChecklistDelacerationHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistDelacerationHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistDelacerationHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistDelacerationHarian->group = 'DELACERATION PLANT 1';
                $formSntChecklistDelacerationHarian->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistDelacerationHarian->save();
            }

            foreach ($tempDatas as $tempData2) {
                $formSntChecklistDelacerationHarian = new FormSntChecklistDelacerationHarian();
                $formSntChecklistDelacerationHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistDelacerationHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistDelacerationHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistDelacerationHarian->group = 'DELACERATION PLANT 2';
                $formSntChecklistDelacerationHarian->nama_peralatan = $tempData2['nama_peralatan'];
                $formSntChecklistDelacerationHarian->save();
            }

        }
        $data['formSntChecklistDelacerationHarians'] = FormSntChecklistDelacerationHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.snt.checklist-delaceration-harian.index', $data);
    }

    public function formSntChecklistDelacerationHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'periode' => ['nullable'],
            'operasi' => ['nullable'],
            'tegangan' => ['nullable'],
            'tegangan_24' => ['nullable'],
            'arus' => ['nullable'],
            'relay' => ['nullable'],
            'kontaktor' => ['nullable'],
            'plc' => ['nullable'],
            'pelampung' => ['nullable'],
            'pemipaan' => ['nullable'],
            'sampah' => ['nullable'],
            'keterangan' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSntChecklistDelacerationHarians = FormSntChecklistDelacerationHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSntChecklistDelacerationHarians as $key => $formSntChecklistDelacerationHarian) {
                $formSntChecklistDelacerationHarian->periode = $validatedData['periode'];
                $formSntChecklistDelacerationHarian->operasi = $validatedData['operasi'][$key];
                $formSntChecklistDelacerationHarian->tegangan = $validatedData['tegangan'][$key];
                $formSntChecklistDelacerationHarian->tegangan_24 = $validatedData['tegangan_24'][$key];
                $formSntChecklistDelacerationHarian->arus = $validatedData['arus'][$key];
                $formSntChecklistDelacerationHarian->relay = $validatedData['relay'][$key];
                $formSntChecklistDelacerationHarian->kontaktor = $validatedData['kontaktor'][$key];
                $formSntChecklistDelacerationHarian->plc = $validatedData['plc'][$key];
                $formSntChecklistDelacerationHarian->pelampung = $validatedData['pelampung'][$key];
                $formSntChecklistDelacerationHarian->pemipaan = $validatedData['pemipaan'][$key];
                $formSntChecklistDelacerationHarian->sampah = $validatedData['sampah'][$key];
                $formSntChecklistDelacerationHarian->keterangan = $validatedData['keterangan'][$key];
                $formSntChecklistDelacerationHarian->catatan = $validatedData['catatan'];

                $formSntChecklistDelacerationHarian->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
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
    public function formSntPerawatanT3VIP(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Checklist Perawatan T3 VIP - SNT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempDatas = [
            // 1
            ['nama_peralatan' => 'POMPA PARIT TANGGA'],
            ['nama_peralatan' => 'SOURCE TEGANGAN'],
            // 2
            ['nama_peralatan' => 'POMPA PARIT MUSHOLA'],
            ['nama_peralatan' => 'SOURCE TEGANGAN'],
            // 3
            ['nama_peralatan' => 'POMPA PARIT TEMPAT WUDHU'],
            ['nama_peralatan' => 'SOURCE TEGANGAN'],
            // 4
            ['nama_peralatan' => 'POMPA PARIT SEBELUM PANTRI UTARA'],
            ['nama_peralatan' => 'SOURCE TEGANGAN'],
            // 5
            ['nama_peralatan' => 'POMPA PARIT RUANG RAPAT UTARA'],
            ['nama_peralatan' => 'SOURCE TEGANGAN'],
            // 6
            ['nama_peralatan' => 'POMPA PARIT SEBELUM PANTRI UTARA'],
            ['nama_peralatan' => 'SOURCE TEGANGAN'],
            // 7
            ['nama_peralatan' => 'POMPA PARIT TEMPAT WUDHU'],
            ['nama_peralatan' => 'SOURCE TEGANGAN'],
            // 8
            ['nama_peralatan' => 'POMPA PARIT RUANG RAPAT SELATAN'],
            ['nama_peralatan' => 'SOURCE TEGANGAN'],
            // 9
            ['nama_peralatan' => 'POMPA PARIT RUANG RAPAT SELATAN'],
            ['nama_peralatan' => 'SOURCE TEGANGAN'],
        ];
        $tempData2s = [
            // POMPA PANTRY
            ['nama_peralatan' => 'POMPA PANTRY UTARA No. 1'],
            ['nama_peralatan' => 'POMPA PANTRY UTARA No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL'],
            // 2
            ['nama_peralatan' => 'POMPA PANTRY SELATAN No. 1'],
            ['nama_peralatan' => 'POMPA PANTRY SELATAN No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL'],
        ];
            $tempData3s = [
            // POMPA VVIP
            ['nama_peralatan' => 'POMPA No. 1'],
            ['nama_peralatan' => 'POMPA No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL'],
        ];
        $tempData4s = [
            // UNDERPASS T3
            ['nama_peralatan' => 'POMPA No. 1'],
            ['nama_peralatan' => 'POMPA No. 2'],
            ['nama_peralatan' => 'POMPA No. 3'],
            ['nama_peralatan' => 'PANEL KONTROL'],
            
        ];

        if (!FormSntPerawatanT3VIP::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempDatas as $tempData) {
                $formSntPerawatanT3VIP = new FormSntPerawatanT3VIP();
                $formSntPerawatanT3VIP->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanT3VIP->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanT3VIP->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanT3VIP->group = 'POMPA PARIT GD.VVIP';
                $formSntPerawatanT3VIP->nama_peralatan = $tempData['nama_peralatan'];
                $formSntPerawatanT3VIP->save();
            }

            foreach ($tempData2s as $tempData2) {
                $formSntPerawatanT3VIP = new FormSntPerawatanT3VIP();
                $formSntPerawatanT3VIP->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanT3VIP->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanT3VIP->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanT3VIP->group = 'POMPA PANTRY';
                $formSntPerawatanT3VIP->nama_peralatan = $tempData2['nama_peralatan'];
                $formSntPerawatanT3VIP->save();
            }

            foreach ($tempData3s as $tempData3) {
                $formSntPerawatanT3VIP = new FormSntPerawatanT3VIP();
                $formSntPerawatanT3VIP->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanT3VIP->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanT3VIP->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanT3VIP->group = 'POMPA UTAMA GEDUNG VVIP';
                $formSntPerawatanT3VIP->nama_peralatan = $tempData3['nama_peralatan'];
                $formSntPerawatanT3VIP->save();
            }

            foreach ($tempData4s as $tempData4) {
                $formSntPerawatanT3VIP = new FormSntPerawatanT3VIP();
                $formSntPerawatanT3VIP->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanT3VIP->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanT3VIP->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanT3VIP->group = 'UNDERPASS T3';
                $formSntPerawatanT3VIP->nama_peralatan = $tempData4['nama_peralatan'];
                $formSntPerawatanT3VIP->save();
            }

        }
        $data['formSntPerawatanT3VIPs'] = FormSntPerawatanT3VIP::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.snt.perawatan-t3.index', $data);
    }

    public function formSntPerawatanT3VIPUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'periode' => ['nullable'],
            'operasi' => ['nullable'],
            'tegangan' => ['nullable'],
            'arus' => ['nullable'],
            'pelampung' => ['nullable'],
            'pemipaan' => ['nullable'],
            'sampah' => ['nullable'],
            'keterangan' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSntPerawatanT3VIPs = FormSntPerawatanT3VIP::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSntPerawatanT3VIPs as $key => $formSntPerawatanT3VIP) {
                $formSntPerawatanT3VIP->periode = $validatedData['periode'];
                $formSntPerawatanT3VIP->operasi = $validatedData['operasi'][$key];
                $formSntPerawatanT3VIP->tegangan = $validatedData['tegangan'][$key];
                $formSntPerawatanT3VIP->arus = $validatedData['arus'][$key];
                $formSntPerawatanT3VIP->pelampung = $validatedData['pelampung'][$key];
                $formSntPerawatanT3VIP->pemipaan = $validatedData['pemipaan'][$key];
                $formSntPerawatanT3VIP->sampah = $validatedData['sampah'][$key];
                $formSntPerawatanT3VIP->keterangan = $validatedData['keterangan'][$key];
                $formSntPerawatanT3VIP->catatan = $validatedData['catatan'];

                $formSntPerawatanT3VIP->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
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
    
    public function formSntChecklistLiftingPump(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Checklist Lifting Pump - SNT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempDatas = [
            // 1
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P1 No. 1'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P1 No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP P1)'],
            // 2
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P5 No. 1'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P5 No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP P5)'],
            // 3
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P6 No. 1'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P6 No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP P6)'],
            // 4
            ['nama_peralatan' => 'SUBMERSIBLE PUMP LP16 No. 1'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP LP16 No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP LP16)'],
            // 5
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P11 No. 1'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P11 No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP P11)'],
            // 6
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P254 No. 1'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP P254 No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL'],
            // 7
            ['nama_peralatan' => 'SUBMERSIBLE PUMP PCP No. 1'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP PCP No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP P254)'],
            // 8
            ['nama_peralatan' => 'SUBMERSIBLE PUMP PA No. 1'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP PA No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP PA)'],
            // 9
            ['nama_peralatan' => 'SUBMERSIBLE PUMP PB No. 1'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP PB No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP PB)'],
            // 10
            ['nama_peralatan' => 'SUBMERSIBLE PUMP PC No. 1'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP PC No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUBMERSIBLE PUMP PC)'],
            // 11
            ['nama_peralatan' => 'LP GRESETRAP KARGO No. 1'],
            ['nama_peralatan' => 'LP GRESETRAP KARGO No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (LP GRESETRAP KARGO)'],
            // 12
            ['nama_peralatan' => 'LIFTINGPUMP KARANTINA'],
            ['nama_peralatan' => 'LIFTINGPUMP POOLTAXI'],
            ['nama_peralatan' => 'PANEL KONTROL'],
            // 13
            ['nama_peralatan' => 'SUMBERSIBLE PUMP LP 9 No. 1'],
            ['nama_peralatan' => 'SUMBERSIBLE PUMP LP 9 No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUMBERSIBLE PUMP LP 9)'],
            // 14
            ['nama_peralatan' => 'SUMBERSIBLE PUMP LP 10 No. 1'],
            ['nama_peralatan' => 'SUMBERSIBLE PUMP LP 10 No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUMBERSIBLE PUMP LP 10)'],
            // 15
            ['nama_peralatan' => 'SUMBERSIBLE PUMP LP 11 No. 1'],
            ['nama_peralatan' => 'SUMBERSIBLE PUMP LP 11 No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUMBERSIBLE PUMP LP 11)'],
            // 16
            ['nama_peralatan' => 'SUMBERSIBLE PUMP LP 12 No. 1'],
            ['nama_peralatan' => 'SUMBERSIBLE PUMP LP 12 No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUMBERSIBLE PUMP LP 12)'],
            // 17
            ['nama_peralatan' => 'SUMBERSIBLE PUMP LP 15 No. 1'],
            ['nama_peralatan' => 'SUMBERSIBLE PUMP LP 15 No. 2'],
            ['nama_peralatan' => 'PANEL KONTROL (SUMBERSIBLE PUMP LP 15)'],
        ];

        if (!FormSntChecklistLiftingPump::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempDatas as $tempData) {
                $formSntChecklistLiftingPump = new FormSntChecklistLiftingPump();
                $formSntChecklistLiftingPump->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistLiftingPump->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistLiftingPump->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistLiftingPump->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistLiftingPump->save();
            }

        }
        $data['formSntChecklistLiftingPumps'] = FormSntChecklistLiftingPump::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.snt.checklist-lifting-pump.index', $data);
    }

    public function formSntChecklistLiftingPumpUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'periode' => ['nullable'],
            'operasi' => ['nullable'],
            'tegangan' => ['nullable'],
            'tegangan_24' => ['nullable'],
            'arus' => ['nullable'],
            'relay' => ['nullable'],
            'kontaktor' => ['nullable'],
            'plc' => ['nullable'],
            'pelampung' => ['nullable'],
            'pemipaan' => ['nullable'],
            'sampah' => ['nullable'],
            'keterangan' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSntChecklistLiftingPumps = FormSntChecklistLiftingPump::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSntChecklistLiftingPumps as $key => $formSntChecklistLiftingPump) {
                $formSntChecklistLiftingPump->periode = $validatedData['periode'];
                $formSntChecklistLiftingPump->operasi = $validatedData['operasi'][$key];
                $formSntChecklistLiftingPump->tegangan = $validatedData['tegangan'][$key];
                $formSntChecklistLiftingPump->tegangan_24 = $validatedData['tegangan_24'][$key];
                $formSntChecklistLiftingPump->arus = $validatedData['arus'][$key];
                $formSntChecklistLiftingPump->relay = $validatedData['relay'][$key];
                $formSntChecklistLiftingPump->kontaktor = $validatedData['kontaktor'][$key];
                $formSntChecklistLiftingPump->plc = $validatedData['plc'][$key];
                $formSntChecklistLiftingPump->pelampung = $validatedData['pelampung'][$key];
                $formSntChecklistLiftingPump->pemipaan = $validatedData['pemipaan'][$key];
                $formSntChecklistLiftingPump->sampah = $validatedData['sampah'][$key];
                $formSntChecklistLiftingPump->keterangan = $validatedData['keterangan'][$key];
                $formSntChecklistLiftingPump->catatan = $validatedData['catatan'];

                $formSntChecklistLiftingPump->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
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
    public function formSntPerawatanSewageTreatmentPlantHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM PERAWATAN SEWAGE TREATMENT PLANT HARIAN - SNT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['screws'] = ['Screw Pump 1', 'Screw Pump 2', 'Screw Pump 3', 'Screw Pump 4','Olie Gear Box','Pelampung'];
        $data['clarifiers'] = ['Operasional Unit', 'Motor Drive', 'Pipa Capiler', 'Bersihkan Kotoran','Main Bearing','MCB'];
        $data['panel_sdbs'] = ['Pompa 1', 'Pompa 2', 'Check Valve', 'Panel Kontrol', 'MCB'];
        $data['screenings'] = ['Operasional Unit', 'Motor Drive', 'Olie Gear Box'];
        $data['panel_srps'] = ['Pompa 1', 'Pompa 2', 'Check Valve', 'Panel Kontrol', 'Floater Switch', 'Manhole'];
        $data['stabilizions'] = ['Stabilization 1', 'Stabilization 2', 'Stabilization 3', 'Motor Drive','Olie Gear Box'];
        $data['air_blowers'] = ['Compressor 1', 'Compressor 2', 'Olie Compressor', 'Air Filter', 'MCB'];
        $data['panel_sgps'] = ['Operasional Unit', 'Panel Kontrol', 'Cek Arus & Tegangan'];
        $data['controls'] = ['Operasional PLC/DCP', 'Layar Monitoring', 'Touchscreen PLC', 'Buzzer Peralatan', 'Setting Timer','Lampu Indicator'];
        $data['aerations'] = ['Aeration 1', 'Aeration 2', 'Aeration 3', 'Motor Drive', 'Olie Gear Box'];
        $data['mds_rooms'] = ['Tegangan 220/380', 'Lampu Penerangan', 'Lampu Indicator', 'Modul Peralatan'];
        $data['grits'] = ['Motor Drive', 'Olie Gear Box', 'Olie Vacum'];
        $data['pemeliharaan2s'] = ['Pekerjaan pembersihan kotoran lemak, sampah dan penyikatan lumut-lumut pada dinding beton instalasi STP 745', 'Pekerjaan pembersihan,pembalikan split, pencabutan rumput dan pembuangan sisa kotoran sludge drying bed', 'Pemotongan/pembabatan rumput di discharge channel dan matering','Pembersihan ruang kontrol dan ruang peralatan','Pembersihan barrier/pagar motor-motor turbin'];

        if (!FormSntPerawatanSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['screws'] as $key => $screw) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'SCREW PUMP';
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $screw;
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }
            foreach ($data['clarifiers'] as $key => $clarifier) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'CLARIFIER UNIT';
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $clarifier;
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }

            foreach ($data['panel_sdbs'] as $key => $panel_sdb) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'PANEL POMPA SDB';
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $panel_sdb;
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }

            foreach ($data['screenings'] as $key => $screening) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'SCREENING UNIT';
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $screening;
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }

            foreach ($data['panel_srps'] as $key => $panel_srp) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'PANEL POMPA SRP';
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $panel_srp;
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }

            foreach ($data['stabilizions'] as $key => $stabilizion) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'STABILIZATION TURBINE UNIT';
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $stabilizion;
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }

            foreach ($data['air_blowers'] as $key => $air_blower) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'AIR BLOWER COMPRESSOR';
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $air_blower;
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }

            foreach ($data['panel_sgps'] as $key => $panel_sgp) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'PANEL POMPA SGP';
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $panel_sgp;
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }

            foreach ($data['controls'] as $key => $control) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'CONTROL DESK & MONITORING PLC';
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $control;
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }

            foreach ($data['aerations'] as $key => $aeration) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'AERATION TURBINE UNIT';
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $aeration;
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }

            foreach ($data['mds_rooms'] as $key => $mds_room) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'MDS ROOM CONTROL';
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $mds_room;
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }

            foreach ($data['grits'] as $key => $grit) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'GRIT GREASE & VACUM';
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $grit;
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }

            foreach ($data['pemeliharaan2s'] as $key => $pemeliharaan2) {
                $formSntPerawatanSewageTreatmentPlantHarian = new FormSntPerawatanSewageTreatmentPlantHarian();
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan = $pemeliharaan2;
                if($formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan == 'Pekerjaan pembersihan kotoran lemak, sampah dan penyikatan lumut-lumut pada dinding beton instalasi STP 745'){
                    $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'PEMBERSIHAN LUMUT';
                }elseif($formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan == 'Pekerjaan pembersihan,pembalikan split, pencabutan rumput dan pembuangan sisa kotoran sludge drying bed'){
                    $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'PENCABUTAN RUMPUT PADA DRYING BED';
                } elseif ($formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan == 'Pemotongan/pembabatan rumput di discharge channel dan matering') {
                    $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'PEMOTONGAN RUMPUT DI DISCHARGE CHANNEL';
                }else {
                    $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan = 'PEMBERSIHAN RUANG INSTALASI KONTROL PANEL';
                }
                $formSntPerawatanSewageTreatmentPlantHarian->save();
            }
        }
        $data['formSntPerawatanSewageTreatmentPlantHarians'] = FormSntPerawatanSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.snt.perawatan-sewage-treatment-plant-harian.index', $data);
    }

    public function formSntPerawatanSewageTreatmentPlantHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'kondisi.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formSntPerawatanSewageTreatmentPlantHarians'] = FormSntPerawatanSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formSntPerawatanSewageTreatmentPlantHarians'] as $key => $formSntPerawatanSewageTreatmentPlantHarian) {
                $formSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntPerawatanSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntPerawatanSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntPerawatanSewageTreatmentPlantHarian->kondisi = $validatedData['kondisi'][$key];
                $formSntPerawatanSewageTreatmentPlantHarian->keterangan = $validatedData['keterangan'][$key];
                $formSntPerawatanSewageTreatmentPlantHarian->catatan = $validatedData['catatan'];
                $formSntPerawatanSewageTreatmentPlantHarian->save();
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
    public function formSntChecklistSewageTreatmentPlantHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Checklist Sewage Treatment Plant Harian - SNT';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempDatas = [

            ['nama_peralatan' => 'SCREW PUMP 1', 'merk' => 'BROOKS HANSEN', 'tipe' => '2-SPIRE/LONGITUDINAL'],
            ['nama_peralatan' => 'SCREW PUMP 2', 'merk' => 'BROOKS HANSEN', 'tipe' => '2-SPIRE/LONGITUDINAL'],
            ['nama_peralatan' => 'SCREW PUMP 3', 'merk' => 'TECO ELECTRIC O.K', 'tipe' => '2-SPIRE/LONGITUDINAL'],
            ['nama_peralatan' => 'SCREW PUMP 4', 'merk' => 'BROOKS HANSEN/FLOTAX', 'tipe' => '2-SPIRE/LONGITUDINAL'],
            ['nama_peralatan' => 'DRIVE MOTOR SCREW PUMP 1', 'merk' => 'SEW', 'tipe' => 'FA 522/SA70R40DT80N4C'],
            ['nama_peralatan' => 'DRIVE MOTOR SCREW PUMP 2', 'merk' => 'SEW',  'tipe' => 'FA 522/SA70R40DT80N4C'],
            ['nama_peralatan' => 'DRIVE MOTOR SCREW PUMP 3', 'merk' => 'TYCO', 'tipe' => 'FLOTAX FA'],
            ['nama_peralatan' => 'DRIVE MOTOR SCREW PUMP 4', 'merk' => 'EMM', 'tipe' => 'FLOTAX FA'],
            ['nama_peralatan' => 'GEAR BOX SCREW PUMP 1, RPM 1500 : 50', 'merk' => 'HANSEN FLOTAX', 'tipe' => 'FA 522'],
            ['nama_peralatan' => 'GEAR BOX SCREW PUMP 2, RPM 1500 : 50', 'merk' => 'HANSEN FLOTAX', 'tipe' => 'FA 522'],
            ['nama_peralatan' => 'GEAR BOX SCREW PUMP 3, RPM 1500 : 50', 'merk' => '-', 'tipe' => '-'],
            ['nama_peralatan' => 'GEAR BOX SCREW PUMP 4, RPM 1500 : 50', 'merk' => 'HANSEN FLOTAX', 'tipe' => 'FA 522/SA70R40DT80N4C'],
            ['nama_peralatan' => 'SCREENING UNIT REDUCTION GEAR', 'merk' => 'SEW', 'tipe' => '1N20M13F'],
            ['nama_peralatan' => 'SCREENING UNIT REDUCTION GEAR', 'merk' => 'SEW', 'tipe' => '1N20M13F'],
            ['nama_peralatan' => 'BELT CONVEYOR UNIT', 'merk' => 'FRANCE', 'tipe' => 'CVB 60'],
            ['nama_peralatan' => 'GRIT GREASE REMOVABLE UNIT', 'merk' => 'FRANCE', 'tipe' => 'LONGITUDINAL'],
            ['nama_peralatan' => 'DRIVE MOTOR TRAV. BRIDGE REMOVALBLE', 'merk' => 'SEW', 'tipe' => 'SA70R40DT80N4C'],
            ['nama_peralatan' => 'AIR BLOWER MOTOR GRIT GREASE R.', 'merk' => 'AERZER', 'tipe' => 'MEUL 132 M4'],
            ['nama_peralatan' => 'AIR BLOWER MOTOR GRIT GREASE R.', 'merk' => 'SHOUWFU', 'tipe' => ''],
            ['nama_peralatan' => 'VACUM PUMP GR', 'merk' => 'RIETSCHE', 'tipe' => 'DCIF-60D (11)'],
            ['nama_peralatan' => 'VACUM PUMP GR', 'merk' => 'RIETSCHE', 'tipe' => 'DCIF-60D (01)'],
            ['nama_peralatan' => 'DRIVE MOTOR AERATION TANK 1', 'merk' => 'BROOKS HANSEN', 'tipe' => 'W-DF225 SN-H'],
            ['nama_peralatan' => 'DRIVE MOTOR AERATION TANK 2', 'merk' => 'BROOKS HANSEN', 'tipe' => 'W-DF225 SN-D'],
            ['nama_peralatan' => 'DRIVE MOTOR AERATION TANK 3', 'merk' => 'BROOKS HANSEN', 'tipe' => 'FDF-225 S-D'],
            ['nama_peralatan' => 'GEAR BOX AT 1, RPM 1500 : 50', 'merk' => 'HANSEN TANSMISION', 'tipe' => 'ORI 006743 QVPC3UDN28'],
            ['nama_peralatan' => 'GEAR BOX AT 2, RPM 1500 : 50', 'merk' => 'HANSEN TANSMISION', 'tipe' => 'ORI 006743 QVPC3UDN28'],
            ['nama_peralatan' => 'GEAR BOX AT 3, RPM 1500 : 50', 'merk' => 'HANSEN TANSMISION', 'tipe' => 'ORI 006743 QVPC3UDN28'],
            ['nama_peralatan' => 'MIXER TURBIN AERATION 1', 'merk' => '-', 'tipe' => 'RNP 6010'],
            ['nama_peralatan' => 'MIXER TURBIN AERATION 2', 'merk' => '-', 'tipe' => 'RNP 6010'],
            ['nama_peralatan' => 'MIXER TURBIN AERATION 3', 'merk' => '-', 'tipe' => 'RNP 6010'],
            ['nama_peralatan' => 'CLARIFIER BRIDGE UNIT', 'merk' => 'USOCOME', 'tipe' => 'SA80R60DT71D4C'],
            ['nama_peralatan' => 'CLARIFIER  DRIVE MOTOR', 'merk' => 'SKG 180 2V 02', 'tipe' => 'E 3.9'],
            ['nama_peralatan' => 'RODA CLARIFIER', 'merk' => '-', 'tipe' => '-'],
            ['nama_peralatan' => 'VACUM PUMP CLARIFIER', 'merk' => 'RIETSCHE', 'tipe' => '-'],
            ['nama_peralatan' => 'BOX BEJANA CLARIFIER ', 'merk' => '-', 'tipe' => 'STANDARD'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP SLUDGE REC.', 'merk' => 'KSB', 'tipe' => 'KRTU 150 285/46'],
            ['nama_peralatan' => 'SUBMERSIBLE PUMP SLUDGE REC.', 'merk' => 'KSB', 'tipe' => 'KRTE 315/126 UG-S'],
            ['nama_peralatan' => 'DRIVE MOTOR STABILZATION T 1', 'merk' => 'BROOKS HANSEN', 'tipe' => 'VEUL J 225 S4'],
            ['nama_peralatan' => 'DRIVE MOTOR STABILZATION T 2', 'merk' => 'BROOKS HANSEN', 'tipe' => 'TU-DF22554-D'],
            ['nama_peralatan' => 'DRIVE MOTOR STABILZATION T 3', 'merk' => 'BROOKS HANSEN', 'tipe' => 'VEUL J 225 S1'],
            ['nama_peralatan' => 'GEAR BOX AT 1, RPM 1500 : 50', 'merk' => 'HANSEN TANSMISION', 'tipe' => 'RNC-36 AN'],
            ['nama_peralatan' => 'GEAR BOX AT 2, RPM 1500 : 50', 'merk' => 'HANSEN TANSMISION', 'tipe' => 'QVPC3 UDN-28'],
            ['nama_peralatan' => 'GEAR BOX AT 3, RPM 1500 : 50', 'merk' => 'HANSEN TANSMISION', 'tipe' => 'QVPC3 UDN-28'],
            ['nama_peralatan' => 'MIXER TURBIN STABILIZATION 1', 'merk' => '-', 'tipe' => 'RNP 6010'],
            ['nama_peralatan' => 'MIXER TURBIN STABILIZATION 2', 'merk' => '-', 'tipe' => 'RNP 6010'],
            ['nama_peralatan' => 'MIXER TURBIN STABILIZATION 3', 'merk' => '-', 'tipe' => 'RNP 6010'],
            ['nama_peralatan' => 'MIXER TURBIN STABILIZATION T1', 'merk' => '-', 'tipe' => 'KRT 100/185/14'],
            ['nama_peralatan' => 'MIXER TURBIN STABILIZATION T2', 'merk' => '-', 'tipe' => 'KRT 100/185/14'],
            ['nama_peralatan' => 'CRANE / HOIST SLUDGE PUMP', 'merk' => '-', 'tipe' => ' STANDARD'],
            ['nama_peralatan' => 'CRANE / HOIST SLUDGE PUMP', 'merk' => '-', 'tipe' => ' STANDARD'],
            ['nama_peralatan' => 'PANEL KONTROL EXTENSION', 'merk' => '-', 'tipe' => ' STANDARD'],
            ['nama_peralatan' => 'DRYING BED', 'merk' => '-', 'tipe' => ' STANDARD'],
            ['nama_peralatan' => 'PANEL DISTRIBUSI UTAMA', 'merk' => 'ETS B PETILOT', 'tipe' => ' STANDARD'],
            ['nama_peralatan' => 'PANEL KONTROL DESK/REMOTE CONTROL', 'merk' => 'ETS B PETILOT', 'tipe' => ' STANDARD'],
            ['nama_peralatan' => 'PANEL KONTROL PLC', 'merk' => 'SIEMENS', 'tipe' => ' STANDARD']
        ];

        if (!FormSntChecklistSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempDatas as $tempData) {
                $formSntChecklistSewageTreatmentPlantHarian = new FormSntChecklistSewageTreatmentPlantHarian();
                $formSntChecklistSewageTreatmentPlantHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSntChecklistSewageTreatmentPlantHarian->form_id = $detailWorkOrderForm->form_id;
                $formSntChecklistSewageTreatmentPlantHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSntChecklistSewageTreatmentPlantHarian->nama_peralatan = $tempData['nama_peralatan'];
                $formSntChecklistSewageTreatmentPlantHarian->merk = $tempData['merk'];
                $formSntChecklistSewageTreatmentPlantHarian->tipe = $tempData['tipe'];
                $formSntChecklistSewageTreatmentPlantHarian->save();
            }

        }
        $data['technicalGroups'] = [];
        $data['userTechnicals'] = [];
        foreach ($data['workOrder']->userGroups as $userGroup) {
            $data['technicalGroups'][] = $userGroup->name;
        }
        foreach ($data['workOrder']->userGroups as $key => $userGroup) {
            if ($key == 0) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            } else {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals2'][] = $userTechnical->name;
                }
            }
        }

        foreach ($data['workOrder']->userTechnicals as $userTechnical) {
            $data['userTechnicals'][] = $userTechnical->name;
        }
        $data['formSntChecklistSewageTreatmentPlantHarians'] = FormSntChecklistSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.snt.checklist-sewage-treatment-plant-harian.index', $data);
    }

    public function formSntChecklistSewageTreatmentPlantHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'kondisi' => ['nullable'],
            'keterangan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSntChecklistSewageTreatmentPlantHarians = FormSntChecklistSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSntChecklistSewageTreatmentPlantHarians as $key => $formSntChecklistSewageTreatmentPlantHarian) {
                $formSntChecklistSewageTreatmentPlantHarian->kondisi = $validatedData['kondisi'][$key];
                $formSntChecklistSewageTreatmentPlantHarian->keterangan = $validatedData['keterangan'][$key];

                $formSntChecklistSewageTreatmentPlantHarian->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
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
