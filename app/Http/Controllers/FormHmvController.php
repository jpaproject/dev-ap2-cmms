<?php

namespace App\Http\Controllers;
use App\Helpers\ActivityLog;
use App\Models\FormActivityLog;
use App\Models\FormHmvGisAHarian;
use App\Models\FormHmvGisBHarian;
use App\Models\FormHmvGisCHarian;
use App\Models\FormHmvGisBulanan;
use App\Models\FormHmvGisTigaBulanan;
use App\Models\FormHmvGisTahunan;
use App\Models\FormHmvGisDuaTahunan;
use App\Models\FormHmvGisKondisional;
use App\Models\FormHmvMeteranHarian;
use App\Models\FormHmvMeteran2Harian;
use App\Models\FormHmvPanelTmHarian;
use App\Models\FormHmvPanelBulanan;
use App\Models\FormHmvPanelTigaBulanan;
use App\Models\FormHmvPowerMingguan;
use App\Models\FormHmvPowerBulanan;
use App\Models\FormHmvPowerTigaBulanan;
use App\Models\FormHmvPowerEnamBulanan;
use App\Models\FormHmvPowerTahunan;
use App\Models\FormHmvPowerDuaTahunan;
use App\Models\FormHmvPowerKondisional;
use Illuminate\Support\Facades\DB;
use App\Models\DetailWorkOrderForm;
use App\Models\UserTechnical;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FormHmvController extends Controller
{

    public function formHmvGisHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Gis Tiga Bulanan';

        $pertanyaan = [
            'Pemeriksaan lampu indicator tekanan gas SF6 pada PMT/CB',

            'Pemeriksaan lampu indicator tekanan gas SF6 pada PMS/DS',

            'Pemeriksaan indikasi pengisian pegas pada PMT/CB',

            'Pemeriksaan lampu indicator tekanan gas SF6 pada CVT/PT',

            'Pemeriksaan lampu indicator tekanan gas SF6 pada CT',

            'Pemeriksaan lampu indicator tekanan gas SF6 pada sealing',

            'Pemeriksaan lampu indicator tekanan gas SF6 pada LA',

            'Pemeriksaan lampu indicator tekanan gas SF6 pada busbar',

            'Pemeriksaan lampu-lampu indicator',

            'Pemeriksaan lubang kabel control',

            'Pemeriksaan kondisi heater',
        ];

        $pertanyaanA = [
            [
                'lokasi'=>'indoor',
                'status'=>'ac',
                'earthing_busbar'=>'q15',
            ],
            [
                'lokasi'=>'outdoor',
                'status'=>'dc',
                'earthing_busbar'=>'q25',
            ],
        ];
        // name
        $pertanyaanB = [
            'PHT 1',
            'PHT 2',
            'OUT 1',
            'OUT 2',
            'OUT 3',
            'COUPLER',
            'BUS VT',
        ];
        // name
        $pertanyaanC = [
            'TRAFO 1',
            'OLTC 1',
            'TRAFO 2',
            'OLTC 2',
            'TRAFO PS',
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvGisAHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaanA as $value) {
                $formHmvGisAHarian = new FormHmvGisAHarian();
                $formHmvGisAHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvGisAHarian->form_id = $detailWorkOrderForm->form_id;
                $formHmvGisAHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvGisAHarian->lokasi = $value['lokasi'];
                $formHmvGisAHarian->status = $value['status'];
                $formHmvGisAHarian->earthing_busbar = $value['earthing_busbar'];
                $formHmvGisAHarian->save();
            }
        }


        $data['formHmvGisAHarians'] = FormHmvGisAHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        if (
            !FormHmvGisBHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaanB as $value) {
                $formHmvGisBHarian = new FormHmvGisBHarian();
                $formHmvGisBHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvGisBHarian->form_id = $detailWorkOrderForm->form_id;
                $formHmvGisBHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvGisBHarian->name = $value;
                $formHmvGisBHarian->save();
            }
        }


        $data['formHmvGisBHarians'] = FormHmvGisBHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        if (
            !FormHmvGisCHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaanC as $value) {
                $formHmvGisCHarian = new FormHmvGisCHarian();
                $formHmvGisCHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvGisCHarian->form_id = $detailWorkOrderForm->form_id;
                $formHmvGisCHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvGisCHarian->name = $value;
                $formHmvGisCHarian->save();
            }
        }


        $data['formHmvGisCHarians'] = FormHmvGisCHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.checklist-gis.index', $data);
    }

    public function formHmvGisHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([

            'pms_bus_q1.*' => ['nullable'],
            'pms_bus_q2.*' => ['nullable'],
            'pmt.*' => ['nullable'],
            'ceiling_end.*' => ['nullable'],
            'vt_line.*' => ['nullable'],
            'abnormal' => ['nullable'],
            'posisi_pms_bus.*' => ['nullable'],
            'posisi_pmt.*' => ['nullable'],
            'counter_r.*' => ['nullable'],
            'counter_s.*' => ['nullable'],
            'counter_t.*' => ['nullable'],
            'posisi_pms_line.*' => ['nullable'],
            'earhing_pmt.*' => ['nullable'],
            'earhing_line.*' => ['nullable'],


            'level.*' => ['nullable'],
            'suhu.*' => ['nullable'],
            'oil.*' => ['nullable'],
            'hv.*' => ['nullable'],
            'lv.*' => ['nullable'],
            'posisi.*' => ['nullable'],
            'counter.*' => ['nullable'],
            'bucholz.*' => ['nullable'],
            'jansen.*' => ['nullable'],
            'termal.*' => ['nullable'],
            'sudden.*' => ['nullable'],
            'fire.*' => ['nullable'],
            'ngr.*' => ['nullable'],
            'dc.*' => ['nullable'],

            'suhu_a.*' => ['nullable'],
            'kelembaban.*' => ['nullable'],
            'benda_asing.*' => ['nullable'],

            'status_110.*' => ['nullable'],
            'status_48.*' => ['nullable'],
            'local_remote.*' => ['nullable'],

            'posisi_a.*' => ['nullable'],

            'keterangan.*' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvGisAHarians = FormHmvGisAHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvGisAHarians as $key => $formHmvGisAHarian) {

                $formHmvGisAHarian->form_id = $detailWorkOrderForm->form_id;

                $formHmvGisAHarian->suhu = $validatedData['suhu_a'][$key] ?? null;
                $formHmvGisAHarian->kelembaban = $validatedData['kelembaban'][$key] ?? null;
                $formHmvGisAHarian->benda_asing = $validatedData['benda_asing'][$key] ?? null;
                $formHmvGisAHarian->status_110 = $validatedData['status_110'][$key] ?? null;
                $formHmvGisAHarian->status_48 = $validatedData['status_48'][$key] ?? null;
                $formHmvGisAHarian->local_remote = $validatedData['local_remote'][$key] ?? null;
                $formHmvGisAHarian->posisi = $validatedData['posisi_a'][$key] ?? null;
                $formHmvGisAHarian->keterangan = $validatedData['keterangan'][$key] ?? null;

                $formHmvGisAHarian->save();
            }
            DB::commit();

            DB::beginTransaction();

            $formHmvGisBHarians = FormHmvGisBHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvGisBHarians as $key => $formHmvGisBHarian) {

                $formHmvGisBHarian->form_id = $detailWorkOrderForm->form_id;

                $formHmvGisBHarian->pms_bus_q1 = $validatedData['pms_bus_q1'][$key] ?? null;
                $formHmvGisBHarian->pms_bus_q2 = $validatedData['pms_bus_q2'][$key] ?? null;
                $formHmvGisBHarian->pmt = $validatedData['pmt'][$key] ?? null;
                $formHmvGisBHarian->ceiling_end = $validatedData['ceiling_end'][$key] ?? null;
                $formHmvGisBHarian->vt_line = $validatedData['vt_line'][$key] ?? null;
                $formHmvGisBHarian->abnormal = $validatedData['abnormal'] ?? null;
                $formHmvGisBHarian->posisi_pms_bus = $validatedData['posisi_pms_bus'][$key] ?? null;
                $formHmvGisBHarian->posisi_pmt = $validatedData['posisi_pmt'][$key] ?? null;
                $formHmvGisBHarian->counter_r = $validatedData['counter_r'][$key] ?? null;
                $formHmvGisBHarian->counter_s = $validatedData['counter_s'][$key] ?? null;
                $formHmvGisBHarian->counter_t = $validatedData['counter_t'][$key] ?? null;
                $formHmvGisBHarian->posisi_pms_line = $validatedData['posisi_pms_line'][$key] ?? null;
                $formHmvGisBHarian->earhing_pmt = $validatedData['earhing_pmt'][$key] ?? null;
                $formHmvGisBHarian->earhing_line = $validatedData['earhing_line'][$key] ?? null;

                $formHmvGisBHarian->save();
            }
            DB::commit();

            DB::beginTransaction();

            $formHmvGisCHarians = FormHmvGisCHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvGisCHarians as $key => $formHmvGisCHarian) {

                $formHmvGisCHarian->form_id = $detailWorkOrderForm->form_id;

                $formHmvGisCHarian->level = $validatedData['level'][$key] ?? null;
                $formHmvGisCHarian->suhu = $validatedData['suhu'][$key] ?? null;
                $formHmvGisCHarian->oil = $validatedData['oil'][$key] ?? null;
                $formHmvGisCHarian->hv = $validatedData['hv'][$key] ?? null;
                $formHmvGisCHarian->lv = $validatedData['lv'][$key] ?? null;
                $formHmvGisCHarian->posisi = $validatedData['posisi'][$key] ?? null;
                $formHmvGisCHarian->counter = $validatedData['counter'][$key] ?? null;
                $formHmvGisCHarian->bucholz = $validatedData['bucholz'][$key] ?? null;
                $formHmvGisCHarian->jansen = $validatedData['jansen'][$key] ?? null;
                $formHmvGisCHarian->termal = $validatedData['termal'][$key] ?? null;
                $formHmvGisCHarian->sudden = $validatedData['sudden'][$key] ?? null;
                $formHmvGisCHarian->fire = $validatedData['fire'][$key] ?? null;
                $formHmvGisCHarian->ngr = $validatedData['ngr'][$key] ?? null;
                $formHmvGisCHarian->dc = $validatedData['dc'][$key] ?? null;

                $formHmvGisCHarian->save();
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
    public function formHmvGisBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Gis Bulanan';

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvGisBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
                $formHmvGisBulanan = new FormHmvGisBulanan();
                $formHmvGisBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvGisBulanan->form_id = $detailWorkOrderForm->form_id;
                $formHmvGisBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvGisBulanan->save();
        }


        $data['formHmvGisBulanan'] = FormHmvGisBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->first();

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

        return view('form.hv&mv-station.sistem-pelaporan.gis.bulanan.index', $data);
    }

    public function formHmvGisBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'type' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'q1_awal' => ['nullable'],
            'q1_akhir' => ['nullable'],
            'q1_remarks' => ['nullable'],

            'q2_awal' => ['nullable'],
            'q2_akhir' => ['nullable'],
            'q2_remarks' => ['nullable'],

            'q3_awal' => ['nullable'],
            'q3_akhir' => ['nullable'],
            'q3_remarks' => ['nullable'],

            'q4_awal' => ['nullable'],
            'q4_akhir' => ['nullable'],
            'q4_remarks' => ['nullable'],

            'q5_awal' => ['nullable'],
            'q5_akhir' => ['nullable'],
            'q5_remarks' => ['nullable'],

            'q6_awal' => ['nullable'],
            'q6_akhir' => ['nullable'],
            'q6_remarks' => ['nullable'],

            'q7_awal' => ['nullable'],
            'q7_akhir' => ['nullable'],
            'q7_remarks' => ['nullable'],

            'q8_awal' => ['nullable'],
            'q8_akhir' => ['nullable'],
            'q8_remarks' => ['nullable'],

            'q9_awal' => ['nullable'],
            'q9_akhir' => ['nullable'],
            'q9_remarks' => ['nullable'],

            'q10_awal' => ['nullable'],
            'q10_akhir' => ['nullable'],
            'q10_remarks' => ['nullable'],

            'q11_awal' => ['nullable'],
            'q11_akhir' => ['nullable'],
            'q11_remarks' => ['nullable'],

            'q12_awal' => ['nullable'],
            'q12_akhir' => ['nullable'],
            'q12_remarks' => ['nullable'],

            'q13_awal' => ['nullable'],
            'q13_akhir' => ['nullable'],
            'q13_remarks' => ['nullable'],

            'remarks' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
                $dataHmvGisBulanan = FormHmvGisBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->first();;
                $dataHmvGisBulanan->form_id = $detailWorkOrderForm->form_id;

                $dataHmvGisBulanan->equipment_number = $validatedData['equipment_number'] ?? null;
                $dataHmvGisBulanan->location_station = $validatedData['location_station'] ?? null;
                $dataHmvGisBulanan->type = $validatedData['type'] ?? null;
                $dataHmvGisBulanan->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $dataHmvGisBulanan->inspection_date = $validatedData['inspection_date'] ?? null;
                $dataHmvGisBulanan->serial_number = $validatedData['serial_number'] ?? null;
                $dataHmvGisBulanan->brand_merk = $validatedData['brand_merk'] ?? null;
                $dataHmvGisBulanan->name_plate = $validatedData['name_plate'] ?? null;
                $dataHmvGisBulanan->status = $validatedData['status'] ?? null;

                $dataHmvGisBulanan->q1_awal = $validatedData['q1_awal'] ?? null;
                $dataHmvGisBulanan->q1_akhir = $validatedData['q1_akhir'] ?? null;
                $dataHmvGisBulanan->q1_remarks = $validatedData['q1_remarks'] ?? null;

                $dataHmvGisBulanan->q2_awal = $validatedData['q2_awal'] ?? null;
                $dataHmvGisBulanan->q2_akhir = $validatedData['q2_akhir'] ?? null;
                $dataHmvGisBulanan->q2_remarks = $validatedData['q2_remarks'] ?? null;

                $dataHmvGisBulanan->q3_awal = $validatedData['q3_awal'] ?? null;
                $dataHmvGisBulanan->q3_akhir = $validatedData['q3_akhir'] ?? null;
                $dataHmvGisBulanan->q3_remarks = $validatedData['q3_remarks'] ?? null;

                $dataHmvGisBulanan->q4_awal = $validatedData['q4_awal'] ?? null;
                $dataHmvGisBulanan->q4_akhir = $validatedData['q4_akhir'] ?? null;
                $dataHmvGisBulanan->q4_remarks = $validatedData['q4_remarks'] ?? null;

                $dataHmvGisBulanan->q5_awal = $validatedData['q5_awal'] ?? null;
                $dataHmvGisBulanan->q5_akhir = $validatedData['q5_akhir'] ?? null;
                $dataHmvGisBulanan->q5_remarks = $validatedData['q5_remarks'] ?? null;

                $dataHmvGisBulanan->q6_awal = $validatedData['q6_awal'] ?? null;
                $dataHmvGisBulanan->q6_akhir = $validatedData['q6_akhir'] ?? null;
                $dataHmvGisBulanan->q6_remarks = $validatedData['q6_remarks'] ?? null;

                $dataHmvGisBulanan->q7_awal = $validatedData['q7_awal'] ?? null;
                $dataHmvGisBulanan->q7_akhir = $validatedData['q7_akhir'] ?? null;
                $dataHmvGisBulanan->q7_remarks = $validatedData['q7_remarks'] ?? null;

                $dataHmvGisBulanan->q8_awal = $validatedData['q8_awal'] ?? null;
                $dataHmvGisBulanan->q8_akhir = $validatedData['q8_akhir'] ?? null;
                $dataHmvGisBulanan->q8_remarks = $validatedData['q8_remarks'] ?? null;

                $dataHmvGisBulanan->q9_awal = $validatedData['q9_awal'] ?? null;
                $dataHmvGisBulanan->q9_akhir = $validatedData['q9_akhir'] ?? null;
                $dataHmvGisBulanan->q9_remarks = $validatedData['q9_remarks'] ?? null;

                $dataHmvGisBulanan->q10_awal = $validatedData['q10_awal'] ?? null;
                $dataHmvGisBulanan->q10_akhir = $validatedData['q10_akhir'] ?? null;
                $dataHmvGisBulanan->q10_remarks = $validatedData['q10_remarks'] ?? null;

                $dataHmvGisBulanan->q11_awal = $validatedData['q11_awal'] ?? null;
                $dataHmvGisBulanan->q11_akhir = $validatedData['q11_akhir'] ?? null;
                $dataHmvGisBulanan->q11_remarks = $validatedData['q11_remarks'] ?? null;

                $dataHmvGisBulanan->q12_awal = $validatedData['q12_awal'] ?? null;
                $dataHmvGisBulanan->q12_akhir = $validatedData['q12_akhir'] ?? null;
                $dataHmvGisBulanan->q12_remarks = $validatedData['q12_remarks'] ?? null;

                $dataHmvGisBulanan->q13_awal = $validatedData['q13_awal'] ?? null;
                $dataHmvGisBulanan->q13_akhir = $validatedData['q13_akhir'] ?? null;
                $dataHmvGisBulanan->q13_remarks = $validatedData['q13_remarks'] ?? null;
                $dataHmvGisBulanan->remarks = $validatedData['remarks'] ?? null;
                $dataHmvGisBulanan->save();

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

    public function formHmvGisTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Gis Tiga Bulanan';

        $pertanyaan = [
            'Pemeriksaan lampu indicator tekanan gas SF6 pada PMT/CB',

            'Pemeriksaan lampu indicator tekanan gas SF6 pada PMS/DS',

            'Pemeriksaan indikasi pengisian pegas pada PMT/CB',

            'Pemeriksaan lampu indicator tekanan gas SF6 pada CVT/PT',

            'Pemeriksaan lampu indicator tekanan gas SF6 pada CT',

            'Pemeriksaan lampu indicator tekanan gas SF6 pada sealing',

            'Pemeriksaan lampu indicator tekanan gas SF6 pada LA',

            'Pemeriksaan lampu indicator tekanan gas SF6 pada busbar',

            'Pemeriksaan lampu-lampu indicator',

            'Pemeriksaan lubang kabel control',

            'Pemeriksaan kondisi heater',
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvGisTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $value) {
                $formHmvGisTigaBulanan = new FormHmvGisTigaBulanan();
                $formHmvGisTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvGisTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formHmvGisTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvGisTigaBulanan->pertanyaan = $value;
                $formHmvGisTigaBulanan->save();
            }
        }


        $data['formHmvGisTigaBulanans'] = FormHmvGisTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.gis.tiga-bulanan.index', $data);
    }

    public function formHmvGisTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'type' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvGisTigaBulanans = FormHmvGisTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvGisTigaBulanans as $key => $formHmvGisTigaBulanan) {

                $formHmvGisTigaBulanan->form_id = $detailWorkOrderForm->form_id;

                $formHmvGisTigaBulanan->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvGisTigaBulanan->location_station = $validatedData['location_station'] ?? null;
                $formHmvGisTigaBulanan->type = $validatedData['type'] ?? null;
                $formHmvGisTigaBulanan->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvGisTigaBulanan->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvGisTigaBulanan->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvGisTigaBulanan->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvGisTigaBulanan->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvGisTigaBulanan->status = $validatedData['status'] ?? null;

                $formHmvGisTigaBulanan->awal = $validatedData['awal'][$key] ?? null;
                $formHmvGisTigaBulanan->akhir = $validatedData['akhir'][$key] ?? null;
                $formHmvGisTigaBulanan->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvGisTigaBulanan->catatan = $validatedData['catatan'] ?? null;

                $formHmvGisTigaBulanan->save();
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

    public function formHmvGisTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Gis Tahunan';

        $pertanyaan = [
            'Pemeriksaan Suhu GIS 150KV',
            'Pemeriksaan Kelembaban',
            'Pemeriksaan Partial Discharge',
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvGisTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $value) {
                $formHmvGisTahunan = new FormHmvGisTahunan();
                $formHmvGisTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvGisTahunan->form_id = $detailWorkOrderForm->form_id;
                $formHmvGisTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvGisTahunan->pertanyaan = $value;
                $formHmvGisTahunan->save();
            }
        }


        $data['formHmvGisTahunans'] = FormHmvGisTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.gis.tahunan.index', $data);
    }

    public function formHmvGisTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'type' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvGisTahunans = FormHmvGisTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvGisTahunans as $key => $formHmvGisTahunan) {

                $formHmvGisTahunan->form_id = $detailWorkOrderForm->form_id;

                $formHmvGisTahunan->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvGisTahunan->location_station = $validatedData['location_station'] ?? null;
                $formHmvGisTahunan->type = $validatedData['type'] ?? null;
                $formHmvGisTahunan->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvGisTahunan->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvGisTahunan->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvGisTahunan->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvGisTahunan->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvGisTahunan->status = $validatedData['status'] ?? null;

                $formHmvGisTahunan->awal = $validatedData['awal'][$key] ?? null;
                $formHmvGisTahunan->akhir = $validatedData['akhir'][$key] ?? null;
                $formHmvGisTahunan->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvGisTahunan->catatan = $validatedData['catatan'] ?? null;

                $formHmvGisTahunan->save();
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

    public function formHmvGisDuaTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Gis Dua Tahunan';

        $pertanyaan = [
            // LEVEL 1 CEK VISUAL (IN SERVICE INSPECTION)

            'Pemeriksaan ketidak serempakan keria kontak PMT/CB',

            'Pemeriksaan fungsi kerja kontak PMS/DS',

            'Pemeriksaan kondisi motor listrik PMS/DS',

            'Inspeksi visual dari system kontak dan torgue limiter',

            'Pemeriksaan fungsi penggerak, signal switch module dan torgue',

            'Pemeriksaan sambungan electrical dan Kencangkan terminal',

            // LEVEL 2 (IN SERVICE MEASUREMENT)

            'Pengukuran tahanan pentanahan',

            'Pengujian kemumian (purity) gas SF6',

            'Pengujian dekomposisi produk gas SF6',

            'Pengujian moisture content gas SF6',

            'Pengujian dew point gas SF6',

            'Pemeriksaan tekanan gas',

            'Melakukan deteksi kebocoran ketika pemasangan sudah siap',

            // LEVEL 3 (SHUTDOWN MEASUREMENT)

            'Pengukuran tahanan isolasi',

            'Pengujian tahanan kontak',

            'Pengujian keserempakan PMT/CB',

            'pemberian pelumas gear PMS/DS',

            'Pemberian pelumas gear PMS/DS tanah',

            'Pemeriksaan system interlock mekanik dan elektrik pada auxiliary',

            'Pengujian fungsi SF6 density detector pada shutdown function',

            'Pengujian fungsi signal trip/blok pada shutdown function test',

            'Pengujian annunciator pada shutdown function test',

            'Pengujian electric interlock pada shutdown function test',

            'Pengujian trip circuit faulty pada shutdown function test',

            'Pengecekan fungsi dari trigger circuits',

            'Pengecekan fungsi dari closing lockout',

            'Pengecekan fungsi dari general lockout SF6',

            'Pengecekan fungsi dari pump lockout',
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvGisDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $value) {
                $formHmvGisDuaTahunan = new FormHmvGisDuaTahunan();
                $formHmvGisDuaTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvGisDuaTahunan->form_id = $detailWorkOrderForm->form_id;
                $formHmvGisDuaTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvGisDuaTahunan->pertanyaan = $value;
                $formHmvGisDuaTahunan->save();
            }
        }


        $data['formHmvGisDuaTahunans'] = FormHmvGisDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.gis.dua-tahunan.index', $data);
    }

    public function formHmvGisDuaTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'type' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvGisDuaTahunans = FormHmvGisDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvGisDuaTahunans as $key => $formHmvGisDuaTahunan) {

                $formHmvGisDuaTahunan->form_id = $detailWorkOrderForm->form_id;

                $formHmvGisDuaTahunan->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvGisDuaTahunan->location_station = $validatedData['location_station'] ?? null;
                $formHmvGisDuaTahunan->type = $validatedData['type'] ?? null;
                $formHmvGisDuaTahunan->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvGisDuaTahunan->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvGisDuaTahunan->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvGisDuaTahunan->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvGisDuaTahunan->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvGisDuaTahunan->status = $validatedData['status'] ?? null;

                $formHmvGisDuaTahunan->awal = $validatedData['awal'][$key] ?? null;
                $formHmvGisDuaTahunan->akhir = $validatedData['akhir'][$key] ?? null;
                $formHmvGisDuaTahunan->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvGisDuaTahunan->catatan = $validatedData['catatan'] ?? null;

                $formHmvGisDuaTahunan->save();
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

    public function formHmvGisKondisional(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Gis Kondisional';

        $pertanyaan = [

            // LEVEL 2 (IN SERVICE MEASUREMENT)

            'Pemeriksaan tekanan gas SF6 muncul alarm pada PMT/CB',

            'Pemeriksaan tekanan gas SPS sesudah alarm off saat trip/block',

            'Pemeriksaan pendeteksi kebocoran S75 pada PMT/CB',

            'Pemeriksaan tekanan gas SF6 muncul alarm pada PMS/DS',

            'Pemeriksaan pendeteksi kebocoran $75 pada PMS/DS',

            'Pemeriksaan tekanan gas SF6 sesudah alarm off saat trip/block',

            'Pemeriksaan tekanan gas SF6 muncul alarm pada CT',

            'Pemeriksaan tekanan gas SF6 sesudah alarm off saat trip/block',

            'Pemeriksaan pendeteksi kebocoran SF8 pada CT',

            'Pemeriksaan tekanan gas SF6 muncul alarm pada CVT/PT',

            'Pemeriksaan tekanan gas SF6 sesudah alarm off saat trip/block',

            'Pemeriksaan pendeteksi kebocoran 76 pada CVT/PT',

            'Pemeriksaan tekanan gas SF6 muncul alarm pada Sealing',

            'Pemeriksaan tekanan gas SF6 sesudah alarm off saat trip/block pada Sealing End/Sealing Box ',

            'Pemeriksaan pendeteksi kebocoran 575 pada Sealing ',

            'Pemeriksaan tekanan gas SF6 muncul alarm pada Busbar ',

            'Pemeriksaan tekanan gas SF6 sesudah alarm off saat trip/block pada Busbar',

            'Pemeriksaan pendeteksi kebocoran SF6 pada Busbar',

            'Pemeriksaan suhu',

            'Pemeriksaan pengaturan sembungan batang Kencangkan sekrup seperti yang ditentukan',

            'Pemeriksaan sambungan electrical dan Kencangkan terminal',
        ];

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvGisKondisional::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $value) {
                $formHmvGisKondisional = new FormHmvGisKondisional();
                $formHmvGisKondisional->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvGisKondisional->form_id = $detailWorkOrderForm->form_id;
                $formHmvGisKondisional->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvGisKondisional->pertanyaan = $value;
                $formHmvGisKondisional->save();
            }
        }


        $data['formHmvGisKondisionals'] = FormHmvGisKondisional::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.gis.kondisional.index', $data);
    }

    public function formHmvGisKondisionalUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'type' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvGisKondisionals = FormHmvGisKondisional::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvGisKondisionals as $key => $formHmvGisKondisional) {

                $formHmvGisKondisional->form_id = $detailWorkOrderForm->form_id;

                $formHmvGisKondisional->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvGisKondisional->location_station = $validatedData['location_station'] ?? null;
                $formHmvGisKondisional->type = $validatedData['type'] ?? null;
                $formHmvGisKondisional->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvGisKondisional->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvGisKondisional->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvGisKondisional->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvGisKondisional->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvGisKondisional->status = $validatedData['status'] ?? null;

                $formHmvGisKondisional->awal = $validatedData['awal'][$key] ?? null;
                $formHmvGisKondisional->akhir = $validatedData['akhir'][$key] ?? null;
                $formHmvGisKondisional->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvGisKondisional->catatan = $validatedData['catatan'] ?? null;

                $formHmvGisKondisional->save();
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

    public function formHmvMeteranHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Checklist Harian Metering';

        $meteran = [
            'PENGHANTAR 1 GI CENGKARENG 1',
            'PENGHANTAR 2 GI CENGKARENG 2',
            'OUTGOING 1 TRAFO 1',
            'OUTGOING 2 TRAFO 2',

        ];

        $meteran2 = [

            'XCA INCOMING TRAFO 1',
            'XCB INCOMING TRAFO 2',
            'MSA TRAFO PS',
            'MSB GH 127A',
            'MSJ GH 127B',
            'MSM GH 128',
        ];

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvMeteranHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($meteran as $value) {
                $formHmvMeteranHarian = new FormHmvMeteranHarian();
                $formHmvMeteranHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvMeteranHarian->form_id = $detailWorkOrderForm->form_id;
                $formHmvMeteranHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvMeteranHarian->name = $value;
                $formHmvMeteranHarian->save();
            }
        }


        $data['formHmvMeteranHarians'] = FormHmvMeteranHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

            if (
            !FormHmvMeteran2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($meteran2 as $value) {
                $formHmvMeteran2Harian = new FormHmvMeteran2Harian();
                $formHmvMeteran2Harian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvMeteran2Harian->form_id = $detailWorkOrderForm->form_id;
                $formHmvMeteran2Harian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvMeteran2Harian->name = $value;
                $formHmvMeteran2Harian->save();
            }
        }


        $data['formHmvMeteran2Harians'] = FormHmvMeteran2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.metering.index', $data);
    }

    public function formHmvMeteranHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([

            'tengangan_l1.*' => ['nullable'],
            'tengangan_l2.*' => ['nullable'],
            'tengangan_l3.*' => ['nullable'],
            'arus_l1.*' => ['nullable'],
            'arus_l2.*' => ['nullable'],
            'arus_l3.*' => ['nullable'],
            'daya_mwh_del.*' => ['nullable'],
            'daya_mwh_rec.*' => ['nullable'],
            'daya_mvarh_del.*' => ['nullable'],
            'daya_mvarh_rec.*' => ['nullable'],
            'frekuensi.*' => ['nullable'],
            'cos.*' => ['nullable'],

            'm2_tengangan_l1.*' => ['nullable'],
            'm2_tengangan_l2.*' => ['nullable'],
            'm2_tengangan_l3.*' => ['nullable'],
            'm2_arus_l1.*' => ['nullable'],
            'm2_arus_l2.*' => ['nullable'],
            'm2_arus_l3.*' => ['nullable'],
            'm2_daya_aktif.*' => ['nullable'],
            'm2_daya_semu.*' => ['nullable'],
            'm2_daya_reaktif.*' => ['nullable'],
            'm2_frekuensi.*' => ['nullable'],
            'm2_cos.*' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvMeteranHarians = FormHmvMeteranHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvMeteranHarians as $key => $formHmvMeteranHarian) {

                $formHmvMeteranHarian->form_id = $detailWorkOrderForm->form_id;

                $formHmvMeteranHarian->tengangan_l1 = $validatedData['tengangan_l1'][$key] ?? null;
                $formHmvMeteranHarian->tengangan_l2 = $validatedData['tengangan_l2'][$key] ?? null;
                $formHmvMeteranHarian->tengangan_l3 = $validatedData['tengangan_l3'][$key] ?? null;
                $formHmvMeteranHarian->arus_l1 = $validatedData['arus_l1'][$key] ?? null;
                $formHmvMeteranHarian->arus_l2 = $validatedData['arus_l2'][$key] ?? null;
                $formHmvMeteranHarian->arus_l3 = $validatedData['arus_l3'][$key] ?? null;
                $formHmvMeteranHarian->daya_mwh_del = $validatedData['daya_mwh_del'][$key] ?? null;
                $formHmvMeteranHarian->daya_mwh_rec = $validatedData['daya_mwh_rec'][$key] ?? null;
                $formHmvMeteranHarian->daya_mvarh_del = $validatedData['daya_mvarh_del'][$key] ?? null;
                $formHmvMeteranHarian->daya_mvarh_rec = $validatedData['daya_mvarh_rec'][$key] ?? null;
                $formHmvMeteranHarian->frekuensi = $validatedData['frekuensi'][$key] ?? null;
                $formHmvMeteranHarian->cos = $validatedData['cos'][$key] ?? null;

                $formHmvMeteranHarian->save();
            }
            DB::commit();

            DB::beginTransaction();

            $formHmvMeteran2Harians = FormHmvMeteran2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvMeteran2Harians as $key => $formHmvMeteran2Harian) {

                $formHmvMeteran2Harian->form_id = $detailWorkOrderForm->form_id;

                $formHmvMeteran2Harian->tengangan_l1 = $validatedData['m2_tengangan_l1'][$key] ?? null;
                $formHmvMeteran2Harian->tengangan_l2 = $validatedData['m2_tengangan_l2'][$key] ?? null;
                $formHmvMeteran2Harian->tengangan_l3 = $validatedData['m2_tengangan_l3'][$key] ?? null;
                $formHmvMeteran2Harian->arus_l1 = $validatedData['m2_arus_l1'][$key] ?? null;
                $formHmvMeteran2Harian->arus_l2 = $validatedData['m2_arus_l2'][$key] ?? null;
                $formHmvMeteran2Harian->arus_l3 = $validatedData['m2_arus_l3'][$key] ?? null;
                $formHmvMeteran2Harian->daya_aktif = $validatedData['m2_daya_aktif'][$key] ?? null;
                $formHmvMeteran2Harian->daya_semu = $validatedData['m2_daya_semu'][$key] ?? null;
                $formHmvMeteran2Harian->daya_reaktif = $validatedData['m2_daya_reaktif'][$key] ?? null;
                $formHmvMeteran2Harian->frekuensi = $validatedData['m2_frekuensi'][$key] ?? null;
                $formHmvMeteran2Harian->cos = $validatedData['m2_cos'][$key] ?? null;

                $formHmvMeteran2Harian->save();
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

    public function formHmvPanelTmHarian(DetailWorkOrderForm $detailWorkOrderForm)
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

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvPanelTmHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($data['assets'] as $value) {
                $formHmvPanelTmHarian = new FormHmvPanelTmHarian();
                $formHmvPanelTmHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvPanelTmHarian->form_id = $detailWorkOrderForm->form_id;
                $formHmvPanelTmHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvPanelTmHarian->name = $value['name'];
                $formHmvPanelTmHarian->q8 = $value['keterangan'];
                $formHmvPanelTmHarian->save();
            }
        }


        $data['formHmvPanelTmHarians'] = FormHmvPanelTmHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.checklist-tm.index', $data);
    }

    public function formHmvPanelTmHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([

            'q1.*' => ['nullable'],
            'q2.*' => ['nullable'],
            'q3.*' => ['nullable'],
            'q4.*' => ['nullable'],
            'q5.*' => ['nullable'],
            'q6a.*' => ['nullable'],
            'q6b.*' => ['nullable'],
            'q6c.*' => ['nullable'],
            'q6d.*' => ['nullable'],
            'q7.*' => ['nullable'],

            'b1_110_status' => ['nullable'],
            'b1_110_metering' => ['nullable'],
            'b1_48_status' => ['nullable'],
            'b1_48_metering' => ['nullable'],

            'b3_110_status' => ['nullable'],
            'b3_110_metering' => ['nullable'],
            'b3_48_status' => ['nullable'],
            'b3_48_metering' => ['nullable'],

            'catatan' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvPanelTmHarians = FormHmvPanelTmHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvPanelTmHarians as $key => $formHmvPanelTmHarian) {

                $formHmvPanelTmHarian->form_id = $detailWorkOrderForm->form_id;

                $formHmvPanelTmHarian->q1 = $validatedData['q1'][$key] ?? null;
                $formHmvPanelTmHarian->q2 = $validatedData['q2'][$key] ?? null;
                $formHmvPanelTmHarian->q3 = $validatedData['q3'][$key] ?? null;
                $formHmvPanelTmHarian->q4 = $validatedData['q4'][$key] ?? null;
                $formHmvPanelTmHarian->q5 = $validatedData['q5'][$key] ?? null;
                $formHmvPanelTmHarian->q6a = $validatedData['q6a'][$key] ?? null;
                $formHmvPanelTmHarian->q6b = $validatedData['q6b'][$key] ?? null;
                $formHmvPanelTmHarian->q6c = $validatedData['q6c'][$key] ?? null;
                $formHmvPanelTmHarian->q6d = $validatedData['q6d'][$key] ?? null;
                $formHmvPanelTmHarian->q7 = $validatedData['q7'][$key] ?? null;

                $formHmvPanelTmHarian->b1_110_status = $validatedData['b1_110_status'] ?? null;
                $formHmvPanelTmHarian->b1_110_metering = $validatedData['b1_110_metering'] ?? null;
                $formHmvPanelTmHarian->b1_48_status = $validatedData['b1_48_status'] ?? null;
                $formHmvPanelTmHarian->b1_48_metering = $validatedData['b1_48_metering'] ?? null;

                $formHmvPanelTmHarian->b3_110_status = $validatedData['b3_110_status'] ?? null;
                $formHmvPanelTmHarian->b3_110_metering = $validatedData['b3_110_metering'] ?? null;
                $formHmvPanelTmHarian->b3_48_status = $validatedData['b3_48_status'] ?? null;
                $formHmvPanelTmHarian->b3_48_metering = $validatedData['b3_48_metering'] ?? null;

                $formHmvPanelTmHarian->catatan = $validatedData['catatan'] ?? null;

                $formHmvPanelTmHarian->save();
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

    public function formHmvPanelBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Pnanel Bulanann';

        $pertanyaan = [
            // LEVEL 1 (IN SERVICE INSPECTION)

            // 1  Pemeriksaan Visual

            'a. Benda asing',
            'b. Bunyi-bunyian',

            'c. Bau-bauan',

            'd. Alat ukur dan rele',

            // 2 Pemeriksaan Lemari Kontrol

            'Pemanas',
            'Lampu Penerangan',
            'KeBersihan Kubikel',

            'Pemeriksaan struktur mekanik kubikel',

            'Pemeriksaan visual alat ukur dan rele',

            // LEVEL 2 (IN SERVICE MEASUREMENT)

            'Pengukuran suplai tegangan AC kubikel',

            'Pengukuran suhu kubikel',

            'Pengukuran suhu terminal dan sambungan rel, CT, PT, kabel dalam',
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvPanelBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $value) {
                $formHmvPanelBulanan = new FormHmvPanelBulanan();
                $formHmvPanelBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvPanelBulanan->form_id = $detailWorkOrderForm->form_id;
                $formHmvPanelBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvPanelBulanan->pertanyaan = $value;
                $formHmvPanelBulanan->save();
            }
        }


        $data['formHmvPanelBulanans'] = FormHmvPanelBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.panel.bulanan.index', $data);
    }

    public function formHmvPanelBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'type' => ['nullable'],
            'number_of_panel' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvPanelBulanans = FormHmvPanelBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvPanelBulanans as $key => $formHmvPanelBulanan) {

                $formHmvPanelBulanan->form_id = $detailWorkOrderForm->form_id;

                $formHmvPanelBulanan->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvPanelBulanan->location_station = $validatedData['location_station'] ?? null;
                $formHmvPanelBulanan->type = $validatedData['type'] ?? null;
                $formHmvPanelBulanan->number_of_panel = $validatedData['number_of_panel'] ?? null;
                $formHmvPanelBulanan->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvPanelBulanan->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvPanelBulanan->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvPanelBulanan->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvPanelBulanan->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvPanelBulanan->status = $validatedData['status'] ?? null;

                $formHmvPanelBulanan->awal = $validatedData['awal'][$key] ?? null;
                $formHmvPanelBulanan->akhir = $validatedData['akhir'][$key] ?? null;
                $formHmvPanelBulanan->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvPanelBulanan->catatan = $validatedData['catatan'] ?? null;

                $formHmvPanelBulanan->save();
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

    public function formHmvPanelTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Panel Tiga Bulanan';

        $pertanyaan = [
            // LEVEL 1 (IN SERVICE INSPECTION)

            'Pemeriksaan indikator posisi CB',
            'Pemeriksaan counter kerja CB',
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvPanelTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $value) {
                $formHmvPanelTigaBulanan = new FormHmvPanelTigaBulanan();
                $formHmvPanelTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvPanelTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formHmvPanelTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvPanelTigaBulanan->pertanyaan = $value;
                $formHmvPanelTigaBulanan->save();
            }
        }


        $data['formHmvPanelTigaBulanans'] = FormHmvPanelTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.panel.tiga-bulanan.index', $data);
    }

    public function formHmvPanelTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'type' => ['nullable'],
            'number_of_panel' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvPanelTigaBulanans = FormHmvPanelTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvPanelTigaBulanans as $key => $formHmvPanelTigaBulanan) {

                $formHmvPanelTigaBulanan->form_id = $detailWorkOrderForm->form_id;

                $formHmvPanelTigaBulanan->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvPanelTigaBulanan->location_station = $validatedData['location_station'] ?? null;
                $formHmvPanelTigaBulanan->type = $validatedData['type'] ?? null;
                $formHmvPanelTigaBulanan->number_of_panel = $validatedData['number_of_panel'] ?? null;
                $formHmvPanelTigaBulanan->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvPanelTigaBulanan->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvPanelTigaBulanan->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvPanelTigaBulanan->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvPanelTigaBulanan->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvPanelTigaBulanan->status = $validatedData['status'] ?? null;

                $formHmvPanelTigaBulanan->awal = $validatedData['awal'][$key] ?? null;
                $formHmvPanelTigaBulanan->akhir = $validatedData['akhir'][$key] ?? null;
                $formHmvPanelTigaBulanan->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvPanelTigaBulanan->catatan = $validatedData['catatan'] ?? null;

                $formHmvPanelTigaBulanan->save();
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

    public function formHmvPowerMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Power Transformer Mingguan';

        $pertanyaan = [
            // INSPEKSI LEVEL 1 (IN SERVICE INSPECTION)

            'Pemeriksaan level oil trafo',
            'Pemeriksaan suhu oil trafo',
            'Pemeriksaan pressure',
            'Pemeriksaan kebocoran oil trafo',
        ];
        $remarks = [
            'Baik: Min 3/4 dari silicage | berwarna biru',
            'Baik: Min 3/4 dari silicage | berwarna biru',
            '',
            '',
        ];
        $data['pilihan2'] = [
            ['nilai1' => 'kurang','nilai2' => 'Kurang'],
            ['nilai1' => 'ada-hostpot','nilai2' => 'ada hotspot'],
            ['nilai1' => 'tidak-baik','nilai2' => 'Tidak Baik'],
            ['nilai1' => 'rembes','nilai2' => 'rembes'],
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvPowerMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $key => $value) {
                $formHmvPowerMingguan = new FormHmvPowerMingguan();
                $formHmvPowerMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvPowerMingguan->form_id = $detailWorkOrderForm->form_id;
                $formHmvPowerMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvPowerMingguan->pertanyaan = $value;
                $formHmvPowerMingguan->remarks = $remarks[$key];
                $formHmvPowerMingguan->save();
            }
        }


        $data['formHmvPowerMingguans'] = FormHmvPowerMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.power.mingguan.index', $data);
    }

    public function formHmvPowerMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'number_of_cable' => ['nullable'],
            'number_of_circuits' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvPowerMingguans = FormHmvPowerMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvPowerMingguans as $key => $formHmvPowerMingguan) {

                $formHmvPowerMingguan->form_id = $detailWorkOrderForm->form_id;

                $formHmvPowerMingguan->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvPowerMingguan->location_station = $validatedData['location_station'] ?? null;
                $formHmvPowerMingguan->number_of_cable = $validatedData['number_of_cable'] ?? null;
                $formHmvPowerMingguan->number_of_circuits = $validatedData['number_of_circuits'] ?? null;
                $formHmvPowerMingguan->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvPowerMingguan->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvPowerMingguan->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvPowerMingguan->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvPowerMingguan->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvPowerMingguan->status = $validatedData['status'] ?? null;

                $formHmvPowerMingguan->awal = $validatedData['awal'][$key] ?? null;
                $formHmvPowerMingguan->akhir = $validatedData['akhir'][$key] ?? null;
                $formHmvPowerMingguan->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvPowerMingguan->catatan = $validatedData['catatan'] ?? null;

                $formHmvPowerMingguan->save();
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

    public function formHmvPowerBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Power Transformer Bulanan';

        $pertanyaan = [
            // LEVEL 1 (IN SERVICE INSPECTION)
            'Pemeriksaan level oil trafo',
            'Pemeriksaan suhu oil trafo',
            'Pemeriksaan pressure',
            'Pemeriksaan kebocoran oil trafo',
            'pemeriksaan silica gel',
        ];

        $data['pilihan1'] = [
            ['nilai1' => 'dalam-level','nilai2' => 'Dalam level'],
            ['nilai1' => 'baik','nilai2' => 'Baik'],
            ['nilai1' => 'cek','nilai2' => 'cek'],
            ['nilai1' => 'baik','nilai2' => 'Baik'],
            ['nilai1' => 'baik','nilai2' => 'Baik'],
        ];

        $data['pilihan2'] = [
            ['nilai1' => 'tidak-dalam-level','nilai2' => 'Tidak dalam Level'],
            ['nilai1' => 'ada-hostpot','nilai2' => 'Ada Hotspot'],
            ['nilai1' => 'none','nilai2' => 'none'],
            ['nilai1' => 'rembes','nilai2' => 'Rembes'],
            ['nilai1' => 'tidak-baik','nilai2' => 'Tidak Baik'],
        ];

        $remarks = [
            '',
            '',
            '',
            '',
            'Baik: Min 3/4 dari silicage | berwarna biru',
        ];

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvPowerBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $key => $value) {
                $formHmvPowerBulanan = new FormHmvPowerBulanan();
                $formHmvPowerBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvPowerBulanan->form_id = $detailWorkOrderForm->form_id;
                $formHmvPowerBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvPowerBulanan->pertanyaan = $value;
                $formHmvPowerBulanan->remarks = $remarks[$key];
                $formHmvPowerBulanan->save();
            }
        }


        $data['formHmvPowerBulanans'] = FormHmvPowerBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.power.bulanan.index', $data);
    }

    public function formHmvPowerBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'number_of_cable' => ['nullable'],
            'number_of_circuits' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvPowerBulanans = FormHmvPowerBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvPowerBulanans as $key => $formHmvPowerBulanan) {

                $formHmvPowerBulanan->form_id = $detailWorkOrderForm->form_id;

                $formHmvPowerBulanan->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvPowerBulanan->location_station = $validatedData['location_station'] ?? null;
                $formHmvPowerBulanan->number_of_cable = $validatedData['number_of_cable'] ?? null;
                $formHmvPowerBulanan->number_of_circuits = $validatedData['number_of_circuits'] ?? null;
                $formHmvPowerBulanan->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvPowerBulanan->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvPowerBulanan->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvPowerBulanan->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvPowerBulanan->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvPowerBulanan->status = $validatedData['status'] ?? null;

                $formHmvPowerBulanan->awal = $validatedData['awal'][$key] ?? null;
                $formHmvPowerBulanan->akhir = $validatedData['akhir'][$key] ?? null;
                $formHmvPowerBulanan->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvPowerBulanan->catatan = $validatedData['catatan'] ?? null;

                $formHmvPowerBulanan->save();
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

    public function formHmvPowerTigaBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Power Transformer Tiga Bulanan';

        $pertanyaan = [
            // LEVEL 1 (IN SERVICE INSPECTION)

            'Pemeriksaan kondisi kebocoran maintank',
            'Pemeriksaan kondisi motor kipas system pendingin',
            'Pemeriksaan tegangan suplai motor kipas dan sirkulasi',
            'Pemeriksaan level oil trafo',
            'Pemeriksaan suhu oil trafo',
            'Pemeriksaan pressure',
            'Pemeriksaan kebocoran oil trafo',
            'pemeriksaan silica gel'
        ];

        $data['pilihan1'] = [
            ['nilai1' => 'bocor','nilai2' => 'Bocor'],
            ['nilai1' => 'berfungsi','nilai2' => 'Berfungsi'],
            ['nilai1' => 'normal','nilai2' => 'Normal'],
            ['nilai1' => 'dalam-level-normal','nilai2' => 'Dalam level Normal'],
            ['nilai1' => 'normal','nilai2' => 'Normal'],
            ['nilai1' => 'berfungsi','nilai2' => 'Berfungsi'],
            ['nilai1' => 'baik','nilai2' => 'Baik'],
            ['nilai1' => 'baik','nilai2' => 'Baik'],
        ];

        $data['pilihan2'] = [
            ['nilai1' => 'tidak-bocor','nilai2' => 'Tidak Bocor'],
            ['nilai1' => 'tidak-berfungsi','nilai2' => 'Tidak Berfungsi'],
            ['nilai1' => 'tidak-normal','nilai2' => 'Tidak Normal'],
            ['nilai1' => 'tidak-dalam-level-normal','nilai2' => 'Tidak dalam level normal'],
            ['nilai1' => 'ada-hotspot','nilai2' => 'Ada hotspot'],
            ['nilai1' => 'tidak-berfungsi','nilai2' => 'Tidak Berfungsi'],
            ['nilai1' => 'tidak-rusak','nilai2' => 'Tidak Rusak'],
            ['nilai1' => 'tidak-rusak','nilai2' => 'Tidak Rusak'],
        ];

        $remarks = [
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            'Baik: Min 3/4 dari silicage | berwarna biru',
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvPowerTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $key => $value) {
                $formHmvPowerTigaBulanan = new FormHmvPowerTigaBulanan();
                $formHmvPowerTigaBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvPowerTigaBulanan->form_id = $detailWorkOrderForm->form_id;
                $formHmvPowerTigaBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvPowerTigaBulanan->pertanyaan = $value;
                $formHmvPowerTigaBulanan->remarks = $remarks[$key];
                $formHmvPowerTigaBulanan->save();
            }
        }


        $data['formHmvPowerTigaBulanans'] = FormHmvPowerTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.power.tiga-bulanan.index', $data);
    }

    public function formHmvPowerTigaBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'number_of_cable' => ['nullable'],
            'number_of_circuits' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvPowerTigaBulanans = FormHmvPowerTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvPowerTigaBulanans as $key => $formHmvPowerTigaBulanan) {

                $formHmvPowerTigaBulanan->form_id = $detailWorkOrderForm->form_id;

                $formHmvPowerTigaBulanan->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvPowerTigaBulanan->location_station = $validatedData['location_station'] ?? null;
                $formHmvPowerTigaBulanan->number_of_cable = $validatedData['number_of_cable'] ?? null;
                $formHmvPowerTigaBulanan->number_of_circuits = $validatedData['number_of_circuits'] ?? null;
                $formHmvPowerTigaBulanan->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvPowerTigaBulanan->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvPowerTigaBulanan->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvPowerTigaBulanan->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvPowerTigaBulanan->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvPowerTigaBulanan->status = $validatedData['status'] ?? null;

                $formHmvPowerTigaBulanan->awal = $validatedData['awal'][$key] ?? null;
                $formHmvPowerTigaBulanan->akhir = $validatedData['akhir'][$key] ?? null;
                $formHmvPowerTigaBulanan->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvPowerTigaBulanan->catatan = $validatedData['catatan'] ?? null;

                $formHmvPowerTigaBulanan->save();
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

    public function formHmvPowerEnamBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Panel Enam Bulanan';

        $pertanyaan = [
            // LEVEL 1 (IN SERVICE INSPECTION)

            'Pengujian Break Down Voltage',
            'Dissolved Gas Anallysis',
        ];
        $data['table'] = [
            ['gases_generated' => 'Hydrogen (H2)', 'normal' => '100', 'caution' => '101-700', 'warning' => '>700'],
            ['gases_generated' => 'Aentylene (C2H2)', 'normal' => '35', 'caution' => '36-45', 'warning' => '>45'],
            ['gases_generated' => 'Ethylene (C2H4)', 'normal' => '50', 'caution' => '51-100', 'warning' => '>100'],
            ['gases_generated' => 'Ethane (C2H6)', 'normal' => '65', 'caution' => '66-100', 'warning' => '>100'],
            ['gases_generated' => 'Methane (CH4)', 'normal' => '120', 'caution' => '121-400', 'warning' => '>400'],
            ['gases_generated' => 'Carbon Monoxide (CO)', 'normal' => '350', 'caution' => '351-570', 'warning' => '>570'],
            ['gases_generated' => 'Carbon Dioxide (CO2)', 'normal' => '5000', 'caution' => '5000-10000', 'warning' => '>10000'],
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvPowerEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $value) {
                $formHmvPowerEnamBulanan = new FormHmvPowerEnamBulanan();
                $formHmvPowerEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvPowerEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formHmvPowerEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvPowerEnamBulanan->pertanyaan = $value;
                $formHmvPowerEnamBulanan->save();
            }
        }


        $data['formHmvPowerEnamBulanans'] = FormHmvPowerEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.power.enam-bulanan.index', $data);
    }

    public function formHmvPowerEnamBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'number_of_cable' => ['nullable'],
            'number_of_circuits' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvPowerEnamBulanans = FormHmvPowerEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvPowerEnamBulanans as $key => $formHmvPowerEnamBulanan) {

                $formHmvPowerEnamBulanan->form_id = $detailWorkOrderForm->form_id;

                $formHmvPowerEnamBulanan->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvPowerEnamBulanan->location_station = $validatedData['location_station'] ?? null;
                $formHmvPowerEnamBulanan->number_of_cable = $validatedData['number_of_cable'] ?? null;
                $formHmvPowerEnamBulanan->number_of_circuits = $validatedData['number_of_circuits'] ?? null;
                $formHmvPowerEnamBulanan->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvPowerEnamBulanan->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvPowerEnamBulanan->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvPowerEnamBulanan->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvPowerEnamBulanan->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvPowerEnamBulanan->status = $validatedData['status'] ?? null;

                $formHmvPowerEnamBulanan->awal = $validatedData['awal'][$key] ?? null;
                $formHmvPowerEnamBulanan->akhir = $validatedData['akhir'][$key] ?? null;
                $formHmvPowerEnamBulanan->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvPowerEnamBulanan->catatan = $validatedData['catatan'] ?? null;

                $formHmvPowerEnamBulanan->save();
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

    public function formHmvPowerTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Power Transformer Tahunan';

        $pertanyaan = [
            // LEVEL 1 (IN SERVICE INSPECTION)

            'Pemeriksaan Grounding panel utama',
            'Pemeriksaan Grounding panel OLTC',
        ];
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvPowerTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $value) {
                $formHmvPowerTahunan = new FormHmvPowerTahunan();
                $formHmvPowerTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvPowerTahunan->form_id = $detailWorkOrderForm->form_id;
                $formHmvPowerTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvPowerTahunan->pertanyaan = $value;
                $formHmvPowerTahunan->save();
            }
        }


        $data['formHmvPowerTahunans'] = FormHmvPowerTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.power.tahunan.index', $data);
    }

    public function formHmvPowerTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'number_of_cable' => ['nullable'],
            'number_of_circuits' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvPowerTahunans = FormHmvPowerTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvPowerTahunans as $key => $formHmvPowerTahunan) {

                $formHmvPowerTahunan->form_id = $detailWorkOrderForm->form_id;

                $formHmvPowerTahunan->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvPowerTahunan->location_station = $validatedData['location_station'] ?? null;
                $formHmvPowerTahunan->number_of_cable = $validatedData['number_of_cable'] ?? null;
                $formHmvPowerTahunan->number_of_circuits = $validatedData['number_of_circuits'] ?? null;
                $formHmvPowerTahunan->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvPowerTahunan->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvPowerTahunan->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvPowerTahunan->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvPowerTahunan->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvPowerTahunan->status = $validatedData['status'] ?? null;

                $formHmvPowerTahunan->awal = $validatedData['awal'][$key] ?? null;
                $formHmvPowerTahunan->akhir = $validatedData['akhir'][$key] ?? null;
                $formHmvPowerTahunan->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvPowerTahunan->catatan = $validatedData['catatan'] ?? null;

                $formHmvPowerTahunan->save();
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

    public function formHmvPowerDuaTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Power Transformer Dua Tahunan';

        $pertanyaan = [
            // LEVEL 1 (IN SERVICE INSPECTION)

            'Pengujian kualitas minyak isolasi',
            'Pengujian corrosive sulfur',
            'Pengujian partial discharge',
            'Pengujian noise',
            'Pengujian sound pressure level',
        ];

        $data['pilihan1'] = [
            ['nilai1' => 'ada-kerusakan','nilai2' => 'Ada Kerusakan'],
            ['nilai1' => 'ada-karat','nilai2' => 'Ada Karat'],
            ['nilai1' => 'input','nilai2' => 'input'],
            ['nilai1' => 'bising','nilai2' => 'bising'],
            ['nilai1' => 'dalam-batas-aman','nilai2' => 'Dalam Batas Aman'],
        ];

        $data['pilihan2'] = [
            ['nilai1' => 'tidak-ada-kerusakan','nilai2' => 'Tidak Ada Kerusakan'],
            ['nilai1' => 'tidak-ada-karat','nilai2' => 'Tidak Ada Karat'],
            ['nilai1' => 'input','nilai2' => 'input'],
            ['nilai1' => 'tidak-bising','nilai2' => 'Tidak Bising'],
            ['nilai1' => 'diluar-batas-aman','nilai2' => 'Di luar Batas Aman'],
        ];

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvPowerDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $value) {
                $formHmvPowerDuaTahunan = new FormHmvPowerDuaTahunan();
                $formHmvPowerDuaTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvPowerDuaTahunan->form_id = $detailWorkOrderForm->form_id;
                $formHmvPowerDuaTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvPowerDuaTahunan->pertanyaan = $value;
                $formHmvPowerDuaTahunan->save();
            }
        }


        $data['formHmvPowerDuaTahunans'] = FormHmvPowerDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.power.dua-tahunan.index', $data);
    }

    public function formHmvPowerDuaTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'number_of_cable' => ['nullable'],
            'number_of_circuits' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);


        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvPowerDuaTahunans = FormHmvPowerDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvPowerDuaTahunans as $key => $formHmvPowerDuaTahunan) {

                $formHmvPowerDuaTahunan->form_id = $detailWorkOrderForm->form_id;

                $formHmvPowerDuaTahunan->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvPowerDuaTahunan->location_station = $validatedData['location_station'] ?? null;
                $formHmvPowerDuaTahunan->number_of_cable = $validatedData['number_of_cable'] ?? null;
                $formHmvPowerDuaTahunan->number_of_circuits = $validatedData['number_of_circuits'] ?? null;
                $formHmvPowerDuaTahunan->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvPowerDuaTahunan->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvPowerDuaTahunan->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvPowerDuaTahunan->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvPowerDuaTahunan->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvPowerDuaTahunan->status = $validatedData['status'] ?? null;

                $formHmvPowerDuaTahunan->awal = $validatedData['awal'][$key] ?? null;
                $formHmvPowerDuaTahunan->akhir = $validatedData['akhir'][$key] ?? null;
                $formHmvPowerDuaTahunan->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvPowerDuaTahunan->catatan = $validatedData['catatan'] ?? null;

                $formHmvPowerDuaTahunan->save();
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

    public function formHmvPowerKondisional(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form HVM Power Transformer Kondisional';

        $pertanyaan = [
            // 'Inspeksi Level 2 (In Sevice Measurement)',

            'Pemeriksaan Jumlah gangguan penyulang per satuan waktu (Trafo Dist)',

            'Pemeriksaan jumlah partikel minyak pada maintank',

            'Pemeriksaan Kadar air minyak tubular sisi 150kV (Trafo Dist GIS)',

            'pemeriksaan arus gangguann',

            'Tes oil trafo setelah terjadi gangguann',

            // 'Level 3 (Shutdown Measurement)',

            'Pembersihan dan perbaikan isolator bushing',

            'Perbaikan belitan motor',

            'Perbaikan / penggantian indikator level minyak konservator',
        ];

        $data['input'] = [
            'nilai', 'ceklist', 'nilai', 'nilai1', 'ceklist', 'none', 'none', 'none',
        ];

        $data['satuan'] = ['Jumlah gangguan/waktu', '', '< 5 ppm (1)', 'A', '', '', '', ''];

        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        if (
            !FormHmvPowerKondisional::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            foreach ($pertanyaan as $value) {
                $formHmvPowerKondisional = new FormHmvPowerKondisional();
                $formHmvPowerKondisional->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formHmvPowerKondisional->form_id = $detailWorkOrderForm->form_id;
                $formHmvPowerKondisional->work_order_id = $detailWorkOrderForm->work_order_id;
                $formHmvPowerKondisional->pertanyaan = $value;
                $formHmvPowerKondisional->save();
            }
        }


        $data['formHmvPowerKondisionals'] = FormHmvPowerKondisional::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        return view('form.hv&mv-station.sistem-pelaporan.power.kondisional.index', $data);
    }

    public function formHmvPowerKondisionalUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $awal = [
            $request->get('awal')[0],
            '',
            $request->get('awal')[1],
            $request->get('awal')[2],
            '',
            '',
            '',
            '',
        ];
        $akhir = [
            $request->get('akhir')[0],
            '',
            $request->get('akhir')[1],
            '',
            '',
            '',
            '',
            '',
        ];
        $validatedData = $request->validate([
            'equipment_number' => ['nullable'],
            'location_station' => ['nullable'],
            'number_of_cable' => ['nullable'],
            'number_of_circuits' => ['nullable'],
            'reference_drawing' => ['nullable'],
            'inspection_date' => ['nullable'],
            'serial_number' => ['nullable'],
            'brand_merk' => ['nullable'],
            'name_plate' => ['nullable'],
            'status' => ['nullable'],

            'awal.*' => ['nullable'],
            'akhir.*' => ['nullable'],
            'remarks.*' => ['nullable'],
            'checklist.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formHmvPowerKondisionals = FormHmvPowerKondisional::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formHmvPowerKondisionals as $key => $formHmvPowerKondisional) {

                $formHmvPowerKondisional->form_id = $detailWorkOrderForm->form_id;

                $formHmvPowerKondisional->equipment_number = $validatedData['equipment_number'] ?? null;
                $formHmvPowerKondisional->location_station = $validatedData['location_station'] ?? null;
                $formHmvPowerKondisional->number_of_cable = $validatedData['number_of_cable'] ?? null;
                $formHmvPowerKondisional->number_of_circuits = $validatedData['number_of_circuits'] ?? null;
                $formHmvPowerKondisional->reference_drawing = $validatedData['reference_drawing'] ?? null;
                $formHmvPowerKondisional->inspection_date = $validatedData['inspection_date'] ?? null;
                $formHmvPowerKondisional->serial_number = $validatedData['serial_number'] ?? null;
                $formHmvPowerKondisional->brand_merk = $validatedData['brand_merk'] ?? null;
                $formHmvPowerKondisional->name_plate = $validatedData['name_plate'] ?? null;
                $formHmvPowerKondisional->status = $validatedData['status'] ?? null;

                $formHmvPowerKondisional->awal = $awal[$key] ?? null;
                $formHmvPowerKondisional->akhir = $akhir[$key] ?? null;
                $formHmvPowerKondisional->checklist = !$request->checklist ? null : (in_array($key, $validatedData['checklist']) ? $key : null);
                $formHmvPowerKondisional->remarks = $validatedData['remarks'][$key] ?? null;
                $formHmvPowerKondisional->catatan = $validatedData['catatan'] ?? null;

                $formHmvPowerKondisional->save();
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