<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLog;
use Illuminate\Http\Request;
use App\Models\FormElpDailyGh;
use App\Models\FormElpTahunan;
use App\Models\FormActivityLog;
use App\Models\formElpDailyEr2a;
use App\Models\formElpDailyEr2b;
use Illuminate\Support\Facades\DB;
use App\Models\DetailWorkOrderForm;
use Illuminate\Support\Facades\Auth;
use App\Models\FormElpPlcDuaMingguan;
use App\Models\FormElpRelayDuaMingguan;
use App\Models\FormElpTrafoDuaMingguan;
use App\Models\FormElpFinalCheckTahunan;
use App\Models\FormElpPartlyEnamBulanan;
use App\Models\FormElpMeteringDuaMingguan;
use App\Models\FormElpNetworkScadaRcmsDaily;
use App\Models\FormElpPartlyEnamBulananDetail;
use App\Models\LaporanKerusakanElectricalProtection;
use App\Models\UserTechnical;

class FormElpController extends Controller
{
    public function formElpLaporanKerusakan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'LAPORAN KERUSAKAN UNIT ELECTRICAL PROTECTION';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        // Lama
        if (!LaporanKerusakanElectricalProtection::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $laporanKerusakanElectricalProtection = new LaporanKerusakanElectricalProtection();
            $laporanKerusakanElectricalProtection->detail_work_order_form_id = $detailWorkOrderForm->id;
            $laporanKerusakanElectricalProtection->form_id = $detailWorkOrderForm->form_id;
            $laporanKerusakanElectricalProtection->work_order_id = $detailWorkOrderForm->work_order_id;
            $laporanKerusakanElectricalProtection->save();
        }

        // Baru - Refactored
        $data['laporanKerusakanElectricalProtection'] = LaporanKerusakanElectricalProtection::firstOrCreate([
            'detail_work_order_form_id' => $detailWorkOrderForm->id,
            'form_id' => $detailWorkOrderForm->form_id,
            'work_order_id' => $detailWorkOrderForm->work_order_id,
        ]);

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

    public function formElpLaporanKerusakanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'date' => ['required', 'date_format:Y-m-d'],
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

        $data = LaporanKerusakanElectricalProtection::findOrFail($detailWorkOrderForm->laporanKerusakanElectricalProtection->id);
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

    // DAILY CHECKLIST PS2
    public function formElpDaily(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM ELP - Daily';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['er2as'] = ['MCA' => [true, true, false, false], 'MCB' => [true, true, false, false], 'MCF' => [false, true, false, false], 'MSA' => [false, false, true, false], 'MSB' => [false, true, false, false], 'MSC' => [false, true, false, false], 'MSD' => [false, true, false, false], 'MSE' => [false, true, false, false], 'MSF' => [false, true, false, false], 'MSG' => [false, true, false, false], 'MSH' => [false, true, false, false], 'MSI' => [true, true, false, false], 'MST' => [false, true, false, false], 'MSS' => [false, true, false, true], 'MSU' => [false, true, false, true], 'MCC' => [false, false, false, false]];

        $data['er2bs'] = ['MCD' => [true, true, false, false], 'MCE' => [true, true, false, false], 'MCG' => [false, true, false, false], 'MCC' => [false, true, false, false], 'MSJ' => [false, false, true, false], 'MSK' => [false, false, false, false], 'MSL' => [false, true, false, false], 'MSM' => [false, true, false, false], 'MSN' => [false, true, false, false], 'MSO' => [false, true, false, false], 'MSP' => [false, true, false, false], 'MSQ' => [false, true, false, false], 'MSR' => [false, true, false, false], 'MSV' => [false, true, false, false], 'MSW' => [false, true, false, false], 'MSX' => [false, true, false, false]];

        $data['gardus'] = [
            'MPS' => [false, true],
            'PS1' => [true, false],
            'PS2' => [true, false],
            'PS3' => [true, false],
            'T2' => [true, true],
            'T3' => [true, true],
            'T4' => [true, true],
            'T5' => [true, true],
            'T6' => [true, true],
            'T7/P7' => [true, true],
            'T8' => [true, true],
            'T9' => [true, true],
            'T10' => [true, true],
            'T11' => [false, true],
            'T12' => [false, true],
            'TAC' => [false, true],
            'MSSR' => [false, true],
            'P 12, NP 12, NP 11' => [true, true],
            'NP 14, NP 13, P 14' => [true, true],
            'P/NP 15' => [true, true],
            'NP 21' => [true, true],
            'NP 22' => [true, true],
            'P 22' => [true, true],
            'NP 23' => [true, true],
            'P 23' => [true, true],
            'NP 24' => [true, true],
            'P 24' => [true, true],
            'P 50' => [true, true],
            'NP 51' => [true, true],
            'NP 52' => [true, true],
            'NP 53' => [true, true],
            'NP 54' => [true, true],
            'NP 55' => [true, true],
            'P 55' => [true, true],
            'PMU' => [true, true],
            'ALA' => [true, true],
            'AME' => [true, true],
            'KARANTINA' => [true, true],
            'G03' => [true, true],
            'LANDSCAPE' => [true, true],
            'SST 1.1' => [false, true],
            'POLRES' => [true, true],
        ];
        // dd($data['gardu']);
        if (!FormElpDailyEr2a::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['er2as'] as $key => $er2a) {
                $formElpDailyEr2a = new FormElpDailyEr2a();
                $formElpDailyEr2a->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formElpDailyEr2a->form_id = $detailWorkOrderForm->form_id;
                $formElpDailyEr2a->work_order_id = $detailWorkOrderForm->work_order_id;
                $formElpDailyEr2a->panel = $key;
                $formElpDailyEr2a->save();
            }
        }

        if (!FormElpDailyEr2b::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['er2bs'] as $key => $er2b) {
                $formElpDailyEr2b = new FormElpDailyEr2b();
                $formElpDailyEr2b->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formElpDailyEr2b->form_id = $detailWorkOrderForm->form_id;
                $formElpDailyEr2b->work_order_id = $detailWorkOrderForm->work_order_id;
                $formElpDailyEr2b->panel = $key;
                $formElpDailyEr2b->save();
            }
        }

        if (!FormElpNetworkScadaRcmsDaily::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['gardus'] as $key => $gardu) {
                $formElpNetworkScadaRcmsDaily = new FormElpNetworkScadaRcmsDaily();
                $formElpNetworkScadaRcmsDaily->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formElpNetworkScadaRcmsDaily->form_id = $detailWorkOrderForm->form_id;
                $formElpNetworkScadaRcmsDaily->work_order_id = $detailWorkOrderForm->work_order_id;
                $formElpNetworkScadaRcmsDaily->gardu = $key;
                $formElpNetworkScadaRcmsDaily->save();
            }
        }

        $data['formElpDailyEr2as'] = formElpDailyEr2a::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();
        $data['formElpDailyEr2bs'] = formElpDailyEr2b::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();
        $data['formElpNetworkScadaRcmsDailies'] = FormElpNetworkScadaRcmsDaily::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        if (UserTechnical::where('id', Auth::user()->id)->first()->username ?? false) {
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.electrical-protection.daily.index', $data);
    }

    public function formElpDailyUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'q1_a.*' => ['nullable'],
            'q2_a.*' => ['nullable'],
            'q3_a.*' => ['nullable'],
            'q4_a.*' => ['nullable'],
            'q1_b.*' => ['nullable'],
            'q2_b.*' => ['nullable'],
            'q3_b.*' => ['nullable'],
            'q4_b.*' => ['nullable'],
            'kondisi_scada.*' => ['nullable'],
            'kondisi_rcms.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formElpDailyEr2as = FormElpDailyEr2a::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formElpDailyEr2as as $key => $formElpDailyEr2a) {
                $formElpDailyEr2a->q1 = $validatedData['q1_a'][$key];
                $formElpDailyEr2a->q2 = $validatedData['q2_a'][$key];
                $formElpDailyEr2a->q3 = $validatedData['q3_a'][$key];
                $formElpDailyEr2a->q4 = $validatedData['q4_a'][$key];
                $formElpDailyEr2a->catatan = $validatedData['catatan'];
                $formElpDailyEr2a->save();
            }

            $formElpDailyEr2bs = FormElpDailyEr2b::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formElpDailyEr2bs as $key => $formElpDailyEr2b) {
                $formElpDailyEr2b->q1 = $validatedData['q1_b'][$key];
                $formElpDailyEr2b->q2 = $validatedData['q2_b'][$key];
                $formElpDailyEr2b->q3 = $validatedData['q3_b'][$key];
                $formElpDailyEr2b->q4 = $validatedData['q4_b'][$key];
                $formElpDailyEr2b->save();
            }

            $formElpNetworkScadaRcmsDailies = FormElpNetworkScadaRcmsDaily::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formElpNetworkScadaRcmsDailies as $key => $formElpNetworkScadaRcmsDaily) {
                $formElpNetworkScadaRcmsDaily->kondisi_scada = $validatedData['kondisi_scada'][$key];
                $formElpNetworkScadaRcmsDaily->kondisi_rcms = $validatedData['kondisi_rcms'][$key];
                $formElpNetworkScadaRcmsDaily->save();
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

    // DAILY CHECKLIST GH
    public function formElpDailyGh(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM ELP - Daily';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['gh_123_exts'] = [
            'MSA' => [true, true, false, true],
            'MSB' => [true, true, false, true],
            'INCOMING JIAC IV' => [false, true, false, false],
        ];

        $data['gh_127_er1s'] = [
            'MCC' => [false, false, false, true],
            'MSA' => [true, true, false, true],
            'MSF' => [false, false, true, true],
            'MSB' => [true, true, false, true],
            'MSE' => [false, true, false, true],
            'MSD' => [false, true, false, true],
            'MCB' => [true, true, true, false],
            'MCA' => [true, true, true, false],
        ];

        $data['gh_127_er2s'] = [
            'MCC' => [false, true, false, true],
            'MSD' => [true, true, false, true],
            'MCE' => [true, true, false, true],
            'MSI' => [false, true, false, true],
            'MSH' => [false, true, false, true],
            'MSG' => [false, false, true, true],
            'MSL' => [true, true, false, true],
            'MSK' => [true, true, false, true],
            'MSM' => [true, true, false, true],
        ];

        $data['gh_128_er1s'] = [
            'MCC' => [false, false, false, true],
            'MSA' => [true, true, false, true],
            'MSC' => [false, false, true, true],
            'MSB' => [true, true, false, true],
            'MSE' => [true, true, false, true],
            'MSD' => [true, true, false, true],
            'MCB' => [true, true, false, true],
            'MCA' => [true, true, false, true],
        ];

        $data['gh_128_er2s'] = [
            'MCC' => [false, true, false, true],
            'MSI' => [true, true, false, true],
            'MSJ' => [true, true, false, true],
            'MSG' => [false, false, true, true],
            'MSK' => [true, true, false, true],
            'MCE' => [true, true, false, true],
            'MCD' => [true, true, false, true],
        ];
        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            if (!FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                foreach ($data['gh_123_exts'] as $key => $gh_123_ext) {
                    $formElpDailyGh = new FormElpDailyGh();
                    $formElpDailyGh->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formElpDailyGh->form_id = $detailWorkOrderForm->form_id;
                    $formElpDailyGh->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formElpDailyGh->group = 'gh_123_ext';
                    $formElpDailyGh->panel = $key;
                    $formElpDailyGh->save();
                }

                foreach ($data['gh_127_er1s'] as $key => $gh_127_er1) {
                    $formElpDailyGh = new FormElpDailyGh();
                    $formElpDailyGh->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formElpDailyGh->form_id = $detailWorkOrderForm->form_id;
                    $formElpDailyGh->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formElpDailyGh->group = 'gh_127_er1';
                    $formElpDailyGh->panel = $key;
                    $formElpDailyGh->save();
                }

                foreach ($data['gh_127_er2s'] as $key => $gh_127_er2) {
                    $formElpDailyGh = new FormElpDailyGh();
                    $formElpDailyGh->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formElpDailyGh->form_id = $detailWorkOrderForm->form_id;
                    $formElpDailyGh->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formElpDailyGh->group = 'gh_127_er2';
                    $formElpDailyGh->panel = $key;
                    $formElpDailyGh->save();
                }

                foreach ($data['gh_128_er1s'] as $key => $gh_128_er1) {
                    $formElpDailyGh = new FormElpDailyGh();
                    $formElpDailyGh->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formElpDailyGh->form_id = $detailWorkOrderForm->form_id;
                    $formElpDailyGh->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formElpDailyGh->group = 'gh_128_er1';
                    $formElpDailyGh->panel = $key;
                    $formElpDailyGh->save();
                }

                foreach ($data['gh_128_er2s'] as $key => $gh_128_er2) {
                    $formElpDailyGh = new FormElpDailyGh();
                    $formElpDailyGh->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formElpDailyGh->form_id = $detailWorkOrderForm->form_id;
                    $formElpDailyGh->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formElpDailyGh->group = 'gh_128_er2';
                    $formElpDailyGh->panel = $key;
                    $formElpDailyGh->save();
                }
            }
            DB::commit();
            
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

        $data['formElpDailyGh123Exts'] = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('group', 'gh_123_ext')
            ->orderBy('id', 'asc')
            ->get();
        $data['formElpDailyGh127Er1s'] = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('group', 'gh_127_er1')
            ->orderBy('id', 'asc')
            ->get();
        $data['formElpDailyGh127Er2s'] = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('group', 'gh_127_er2')
            ->orderBy('id', 'asc')
            ->get();
        $data['formElpDailyGh128Er1s'] = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('group', 'gh_128_er1')
            ->orderBy('id', 'asc')
            ->get();
        $data['formElpDailyGh128Er2s'] = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('group', 'gh_128_er2')
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

        if ($userTechnical) {
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.electrical-protection.daily.index-gh', $data);
    }

    public function formElpDailyGhUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'q1_a.*' => ['nullable'],
            'q2_a.*' => ['nullable'],
            'q3_a.*' => ['nullable'],
            'q4_a.*' => ['nullable'],
            'q1_b.*' => ['nullable'],
            'q2_b.*' => ['nullable'],
            'q3_b.*' => ['nullable'],
            'q4_b.*' => ['nullable'],
            'q1_c.*' => ['nullable'],
            'q2_c.*' => ['nullable'],
            'q3_c.*' => ['nullable'],
            'q4_c.*' => ['nullable'],
            'q1_d.*' => ['nullable'],
            'q2_d.*' => ['nullable'],
            'q3_d.*' => ['nullable'],
            'q4_d.*' => ['nullable'],
            'q1_e.*' => ['nullable'],
            'q2_e.*' => ['nullable'],
            'q3_e.*' => ['nullable'],
            'q4_e.*' => ['nullable'],
            'catatan' => ['nullable']
        ]);
        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();

            $formElpDailyGhs = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('group', 'gh_123_ext')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formElpDailyGhs as $key => $formElpDailyGh) {
                $formElpDailyGh->q1 = $validatedData['q1_a'][$key];
                $formElpDailyGh->q2 = $validatedData['q2_a'][$key];
                $formElpDailyGh->q3 = $validatedData['q3_a'][$key];
                $formElpDailyGh->q4 = $validatedData['q4_a'][$key];
                $formElpDailyGh->catatan = $validatedData['catatan'];
                $formElpDailyGh->save();
            }

            $formElpDailyGhs = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('group', 'gh_127_er1')
                ->orderBy('id', 'asc')
                ->get();
                foreach ($formElpDailyGhs as $key => $formElpDailyGh) {
                    $formElpDailyGh->q1 = $validatedData['q1_b'][$key];
                    $formElpDailyGh->q2 = $validatedData['q2_b'][$key];
                    $formElpDailyGh->q3 = $validatedData['q3_b'][$key];
                    $formElpDailyGh->q4 = $validatedData['q4_b'][$key];
                    $formElpDailyGh->save();
            }

            $formElpDailyGhs = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('group', 'gh_127_er2')
                ->orderBy('id', 'asc')
                ->get();
                foreach ($formElpDailyGhs as $key => $formElpDailyGh) {
                    $formElpDailyGh->q1 = $validatedData['q1_c'][$key];
                    $formElpDailyGh->q2 = $validatedData['q2_c'][$key];
                    $formElpDailyGh->q3 = $validatedData['q3_c'][$key];
                    $formElpDailyGh->q4 = $validatedData['q4_c'][$key];
                    $formElpDailyGh->save();
            }

            $formElpDailyGhs = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('group', 'gh_128_er1')
                ->orderBy('id', 'asc')
                ->get();
                foreach ($formElpDailyGhs as $key => $formElpDailyGh) {
                    $formElpDailyGh->q1 = $validatedData['q1_d'][$key];
                    $formElpDailyGh->q2 = $validatedData['q2_d'][$key];
                    $formElpDailyGh->q3 = $validatedData['q3_d'][$key];
                    $formElpDailyGh->q4 = $validatedData['q4_d'][$key];
                    $formElpDailyGh->save();
            }

            $formElpDailyGhs = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('group', 'gh_128_er2')
                ->orderBy('id', 'asc')
                ->get();
                foreach ($formElpDailyGhs as $key => $formElpDailyGh) {
                    $formElpDailyGh->q1 = $validatedData['q1_e'][$key];
                    $formElpDailyGh->q2 = $validatedData['q2_e'][$key];
                    $formElpDailyGh->q3 = $validatedData['q3_e'][$key];
                    $formElpDailyGh->q4 = $validatedData['q4_e'][$key];
                    $formElpDailyGh->save();
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

    public function formElpMeteringDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM ELP - Metering DUA MINGGUAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['formElpMeteringDuaMingguans'] = FormElpMeteringDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        if (UserTechnical::where('id', Auth::user()->id)->first()->username ?? false) {
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.electrical-protection.metering-dua-mingguan.index', $data);
    }

    public function formElpMeteringDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        // dd($detailWorkOrderForm->id);
        $validatedData = $request->validate([
            'substation.*' => ['required'],
            'panel.*' => ['required'],
            'incoming_gwh.*' => ['nullable'],
            'incoming_gvarh.*' => ['nullable'],
            'outgoing_gwh.*' => ['nullable'],
            'outgoing_gvarh.*' => ['nullable'],
            'total_gwh.*' => ['nullable'],
            'total_gvarh.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        // dd($validatedData);
        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formElpMeteringDuaMingguans = FormElpMeteringDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            $formElpMeteringDuaMingguans->each->delete();

            foreach ($validatedData['substation'] as $key => $value) {
                $formElpMeteringDuaMingguan = new FormElpMeteringDuaMingguan();
                $formElpMeteringDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formElpMeteringDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formElpMeteringDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formElpMeteringDuaMingguan->substation = $validatedData['substation'][$key];
                $formElpMeteringDuaMingguan->panel = $validatedData['panel'][$key];
                $formElpMeteringDuaMingguan->incoming_gwh = $validatedData['incoming_gwh'][$key];
                $formElpMeteringDuaMingguan->incoming_gvarh = $validatedData['incoming_gvarh'][$key];
                $formElpMeteringDuaMingguan->outgoing_gwh = $validatedData['outgoing_gwh'][$key];
                $formElpMeteringDuaMingguan->outgoing_gvarh = $validatedData['outgoing_gvarh'][$key];
                $formElpMeteringDuaMingguan->total_gwh = $validatedData['total_gwh'][$key];
                $formElpMeteringDuaMingguan->total_gvarh = $validatedData['total_gvarh'][$key];
                $formElpMeteringDuaMingguan->catatan = $validatedData['catatan'];
                $formElpMeteringDuaMingguan->save();
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

    public function formElpTrafoDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM ELP - TRAFO DUA MINGGUAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['formElpTrafoDuaMingguans'] = FormElpTrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        if (UserTechnical::where('id', Auth::user()->id)->first()->username ?? false) {
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.electrical-protection.trafo-dua-mingguan.index', $data);
    }

    public function formElpTrafoDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'substation.*' => ['required'],
            'panel.*' => ['nullable'],
            'jenis_trafo.*' => ['nullable'],
            'kapasitas_trafo.*' => ['nullable'],

            'indikasi_trafo_suhu.*' => ['nullable'],
            'indikasi_trafo_level_oli.*' => ['nullable'],
            'indikasi_trafo_pressure.*' => ['nullable'],

            'suhu_trafo_r.*' => ['nullable'],
            'suhu_trafo_s.*' => ['nullable'],
            'suhu_trafo_t.*' => ['nullable'],
            'suhu_ruang.*' => ['nullable'],

            'proteksi_trafo_kontrol_v.*' => ['nullable'],
            'proteksi_trafo_suhu1.*' => ['nullable'],
            'proteksi_trafo_suhu2.*' => ['nullable'],
            'proteksi_trafo_kondisi_rele_trafo.*' => ['nullable'],
            'proteksi_trafo_kondisi_kabel_kontrol.*' => ['nullable'],

            'tegangan_tm_vl_l.*' => ['nullable'],
            'tegangan_tm_vl_n.*' => ['nullable'],

            'arus_tm_r.*' => ['nullable'],
            'arus_tm_s.*' => ['nullable'],
            'arus_tm_t.*' => ['nullable'],

            'daya_tm_p.*' => ['nullable'],
            'daya_tm_q.*' => ['nullable'],
            'daya_tm_s.*' => ['nullable'],
            'daya_tm_pf.*' => ['nullable'],

            'daya_trafo_efisiensi_p.*' => ['nullable'],
            'daya_trafo_efisiensi_q.*' => ['nullable'],
            'daya_trafo_efisiensi_s.*' => ['nullable'],

            'tahanan_n_g_trafo.*' => ['nullable'],
            'tahanan_gardu_1.*' => ['nullable'],
            'tahanan_gardu_2.*' => ['nullable'],
            'tahanan_gardu_3.*' => ['nullable'],
            'tahanan_gardu_4.*' => ['nullable'],
            'keterangan.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);

        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formElpTrafoDuaMingguans = FormElpTrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            $formElpTrafoDuaMingguans->each->delete();

            foreach ($validatedData['substation'] as $key => $value) {
                $formElpTrafoDuaMingguan = new FormElpTrafoDuaMingguan();
                $formElpTrafoDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formElpTrafoDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formElpTrafoDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formElpTrafoDuaMingguan->substation = $validatedData['substation'][$key] ?? null;
                $formElpTrafoDuaMingguan->panel = $validatedData['panel'][$key] ?? null;
                $formElpTrafoDuaMingguan->jenis_trafo = $validatedData['jenis_trafo'][$key] ?? null;
                $formElpTrafoDuaMingguan->kapasitas_trafo = $validatedData['kapasitas_trafo'][$key] ?? null;

                $formElpTrafoDuaMingguan->indikasi_trafo_suhu = $validatedData['indikasi_trafo_suhu'][$key] ?? null;
                $formElpTrafoDuaMingguan->indikasi_trafo_level_oli = $validatedData['indikasi_trafo_level_oli'][$key] ?? null;
                $formElpTrafoDuaMingguan->indikasi_trafo_pressure = $validatedData['indikasi_trafo_pressure'][$key] ?? null;

                $formElpTrafoDuaMingguan->suhu_trafo_r = $validatedData['suhu_trafo_r'][$key] ?? null;
                $formElpTrafoDuaMingguan->suhu_trafo_s = $validatedData['suhu_trafo_s'][$key] ?? null;
                $formElpTrafoDuaMingguan->suhu_trafo_t = $validatedData['suhu_trafo_t'][$key] ?? null;
                $formElpTrafoDuaMingguan->suhu_ruang = $validatedData['suhu_ruang'][$key] ?? null;

                $formElpTrafoDuaMingguan->proteksi_trafo_kontrol_v = $validatedData['proteksi_trafo_kontrol_v'][$key] ?? null;
                $formElpTrafoDuaMingguan->proteksi_trafo_suhu1 = $validatedData['proteksi_trafo_suhu1'][$key] ?? null;
                $formElpTrafoDuaMingguan->proteksi_trafo_suhu2 = $validatedData['proteksi_trafo_suhu2'][$key] ?? null;
                $formElpTrafoDuaMingguan->proteksi_trafo_kondisi_rele_trafo = $validatedData['proteksi_trafo_kondisi_rele_trafo'][$key] ?? null;
                $formElpTrafoDuaMingguan->proteksi_trafo_kondisi_kabel_kontrol = $validatedData['proteksi_trafo_kondisi_kabel_kontrol'][$key] ?? null;

                $formElpTrafoDuaMingguan->tegangan_tm_vl_l = $validatedData['tegangan_tm_vl_l'][$key] ?? null;
                $formElpTrafoDuaMingguan->tegangan_tm_vl_n = $validatedData['tegangan_tm_vl_n'][$key] ?? null;

                $formElpTrafoDuaMingguan->arus_tm_r = $validatedData['arus_tm_r'][$key] ?? null;
                $formElpTrafoDuaMingguan->arus_tm_s = $validatedData['arus_tm_s'][$key] ?? null;
                $formElpTrafoDuaMingguan->arus_tm_t = $validatedData['arus_tm_t'][$key] ?? null;

                $formElpTrafoDuaMingguan->daya_tm_p = $validatedData['daya_tm_p'][$key] ?? null;
                $formElpTrafoDuaMingguan->daya_tm_q = $validatedData['daya_tm_q'][$key] ?? null;
                $formElpTrafoDuaMingguan->daya_tm_s = $validatedData['daya_tm_s'][$key] ?? null;
                $formElpTrafoDuaMingguan->daya_tm_pf = $validatedData['daya_tm_pf'][$key] ?? null;

                $formElpTrafoDuaMingguan->daya_trafo_efisiensi_p = $validatedData['daya_trafo_efisiensi_p'][$key] ?? null;
                $formElpTrafoDuaMingguan->daya_trafo_efisiensi_q = $validatedData['daya_trafo_efisiensi_q'][$key] ?? null;
                $formElpTrafoDuaMingguan->daya_trafo_efisiensi_s = $validatedData['daya_trafo_efisiensi_s'][$key] ?? null;

                $formElpTrafoDuaMingguan->tahanan_n_g_trafo = $validatedData['tahanan_n_g_trafo'][$key] ?? null;
                $formElpTrafoDuaMingguan->tahanan_gardu_1 = $validatedData['tahanan_gardu_1'][$key] ?? null;
                $formElpTrafoDuaMingguan->tahanan_gardu_2 = $validatedData['tahanan_gardu_2'][$key] ?? null;
                $formElpTrafoDuaMingguan->tahanan_gardu_3 = $validatedData['tahanan_gardu_3'][$key] ?? null;
                $formElpTrafoDuaMingguan->tahanan_gardu_4 = $validatedData['tahanan_gardu_4'][$key] ?? null;
                $formElpTrafoDuaMingguan->keterangan = $validatedData['keterangan'][$key] ?? null;

                $formElpTrafoDuaMingguan->catatan = $validatedData['catatan'];
                $formElpTrafoDuaMingguan->save();
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

    public function formElpRelayDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM ELP - RELAY DUA MINGGUAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['formElpRelayDuaMingguans'] = FormElpRelayDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        if (UserTechnical::where('id', Auth::user()->id)->first()->username ?? false) {
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.electrical-protection.relay-dua-mingguan.index', $data);
    }

    public function formElpRelayDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'substation.*' => ['required'],
            'panel.*' => ['nullable'],
            'merek_type_relay.*' => ['nullable'],
            'tegangan_power_suplay.*' => ['nullable'],
            'arus_i.*' => ['nullable'],
            'arus_ir.*' => ['nullable'],
            'vdc_plus_to_ground.*' => ['nullable'],
            'vdc_min_to_ground.*' => ['nullable'],
            'body_to_ground.*' => ['nullable'],
            'sudut.*' => ['nullable'],
            'komunikasi.*' => ['nullable'],
            'i_diff.*' => ['nullable'],
            'i_bias.*' => ['nullable'],
            'tegangan_kompensasi.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formElpRelayDuaMingguans = FormElpRelayDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            $formElpRelayDuaMingguans->each->delete();

            foreach ($validatedData['substation'] as $key => $value) {
                $formElpRelayDuaMingguan = new FormElpRelayDuaMingguan();
                $formElpRelayDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formElpRelayDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formElpRelayDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formElpRelayDuaMingguan->substation = $validatedData['substation'][$key];
                $formElpRelayDuaMingguan->panel = $validatedData['panel'][$key];
                $formElpRelayDuaMingguan->merek_type_relay = $validatedData['merek_type_relay'][$key];
                $formElpRelayDuaMingguan->tegangan_power_suplay = $validatedData['tegangan_power_suplay'][$key];
                $formElpRelayDuaMingguan->arus_i = $validatedData['arus_i'][$key];
                $formElpRelayDuaMingguan->arus_ir = $validatedData['arus_ir'][$key];
                $formElpRelayDuaMingguan->vdc_plus_to_ground = $validatedData['vdc_plus_to_ground'][$key];
                $formElpRelayDuaMingguan->vdc_min_to_ground = $validatedData['vdc_min_to_ground'][$key];
                $formElpRelayDuaMingguan->body_to_ground = $validatedData['body_to_ground'][$key];
                $formElpRelayDuaMingguan->sudut = $validatedData['sudut'][$key];
                $formElpRelayDuaMingguan->komunikasi = $validatedData['komunikasi'][$key];
                $formElpRelayDuaMingguan->i_diff = $validatedData['i_diff'][$key];
                $formElpRelayDuaMingguan->i_bias = $validatedData['i_bias'][$key];
                $formElpRelayDuaMingguan->tegangan_kompensasi = $validatedData['tegangan_kompensasi'][$key];
                $formElpRelayDuaMingguan->keterangan = $validatedData['keterangan'][$key];

                $formElpRelayDuaMingguan->catatan = $validatedData['catatan'];
                $formElpRelayDuaMingguan->save();
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

    public function formElpPlcDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM ELP - PLC DUA MINGGUAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['formElpPlcDuaMingguans'] = FormElpPlcDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        if (UserTechnical::where('id', Auth::user()->id)->first()->username ?? false) {
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.electrical-protection.plc-dua-mingguan.index', $data);
    }

    public function formElpPlcDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'substation.*' => ['required'],
            'tegangan_power_supply_ac.*' => ['nullable'],
            'tegangan_power_supply_dc.*' => ['nullable'],
            'modul_power_supply_power_ok.*' => ['nullable'],
            'cpu_run.*' => ['nullable'],
            'cpu_lcd.*' => ['nullable'],
            'ptq_active.*' => ['nullable'],
            'ptq_e_data.*' => ['nullable'],
            'ptq_e_link.*' => ['nullable'],
            'ddi_active.*' => ['nullable'],
            'dra_active.*' => ['nullable'],
            'noe_active.*' => ['nullable'],
            'egx_tx.*' => ['nullable'],
            'egx_rx.*' => ['nullable'],
            'conex_active.*' => ['nullable'],
            'suhu_plc.*' => ['nullable'],
            'lampu.*' => ['nullable'],
            'fan.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
            'catatan.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formElpPlcDuaMingguans = FormElpPlcDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            $formElpPlcDuaMingguans->each->delete();

            foreach ($validatedData['substation'] as $key => $value) {
                $formElpPlcDuaMingguan = new FormElpPlcDuaMingguan();
                $formElpPlcDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formElpPlcDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formElpPlcDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formElpPlcDuaMingguan->substation = $validatedData['substation'][$key];
                $formElpPlcDuaMingguan->tegangan_power_supply_ac = $validatedData['tegangan_power_supply_ac'][$key];
                $formElpPlcDuaMingguan->tegangan_power_supply_dc = $validatedData['tegangan_power_supply_dc'][$key];
                $formElpPlcDuaMingguan->modul_power_supply_power_ok = $validatedData['modul_power_supply_power_ok'][$key];
                $formElpPlcDuaMingguan->cpu_run = $validatedData['cpu_run'][$key];
                $formElpPlcDuaMingguan->cpu_lcd = $validatedData['cpu_lcd'][$key];
                $formElpPlcDuaMingguan->ptq_active = $validatedData['ptq_active'][$key];
                $formElpPlcDuaMingguan->ptq_e_data = $validatedData['ptq_e_data'][$key];
                $formElpPlcDuaMingguan->ptq_e_link = $validatedData['ptq_e_link'][$key];
                $formElpPlcDuaMingguan->ddi_active = $validatedData['ddi_active'][$key];
                $formElpPlcDuaMingguan->dra_active = $validatedData['dra_active'][$key];
                $formElpPlcDuaMingguan->noe_active = $validatedData['noe_active'][$key];
                $formElpPlcDuaMingguan->egx_tx = $validatedData['egx_tx'][$key];
                $formElpPlcDuaMingguan->egx_rx = $validatedData['egx_rx'][$key];
                $formElpPlcDuaMingguan->conex_active = $validatedData['conex_active'][$key];
                $formElpPlcDuaMingguan->suhu_plc = $validatedData['suhu_plc'][$key];
                $formElpPlcDuaMingguan->lampu = $validatedData['lampu'][$key];
                $formElpPlcDuaMingguan->fan = $validatedData['fan'][$key];
                $formElpPlcDuaMingguan->keterangan = $validatedData['keterangan'][$key];

                $formElpPlcDuaMingguan->catatan = $validatedData['catatan'];
                $formElpPlcDuaMingguan->save();
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

    public function formElpTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM ELP - YEARLY';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['checklists'] = ['drawing', 'manual_book', 'tool_set', 'cleaning_tools', 'supporting_cables', 'secondary_injector', 'voltage_meter', 'ampere_meter', 'safety_vest', 'safety_helmet', 'safety_shoes', 'electrical_gloves', 'handy_talkie', 'working_permit', 'operational_procedure', 'mask'];
        $data['finalChecklists'] = ['backup_setting_relay_to_pc', 'check_ct_terminal_inject_condition', 'tightening_connection', 'cleaning_working_area'];
        if (
            !FormElpTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->first()
        ) {
            $formElpTahunan = new FormElpTahunan();
            $formElpTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formElpTahunan->form_id = $detailWorkOrderForm->form_id;
            $formElpTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
            $formElpTahunan->save();
        }
        $data['formElpTahunan'] = FormElpTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->first();

        if (
            !FormElpFinalCheckTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->first()
        ) {
            foreach ($data['finalChecklists'] as $finalChecklist) {
                $formElpFinalCheckTahunan = new FormElpFinalCheckTahunan();
                $formElpFinalCheckTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formElpFinalCheckTahunan->form_id = $detailWorkOrderForm->form_id;
                $formElpFinalCheckTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formElpFinalCheckTahunan->q1 = $finalChecklist;
                $formElpFinalCheckTahunan->save();
            }
        }
        $data['formElpFinalCheckTahunans'] = FormElpFinalCheckTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        if (UserTechnical::where('id', Auth::user()->id)->first()->username ?? false) {
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.electrical-protection.tahunan.index', $data);
    }

    public function formElpTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'drawing' => ['nullable'],
            'manual_book' => ['nullable'],
            'tool_set' => ['nullable'],
            'cleaning_tools' => ['nullable'],
            'supporting_cables' => ['nullable'],
            'secondary_injector' => ['nullable'],
            'voltage_meter' => ['nullable'],
            'ampere_meter' => ['nullable'],
            'safety_vest' => ['nullable'],
            'safety_helmet' => ['nullable'],
            'safety_shoes' => ['nullable'],
            'electrical_gloves' => ['nullable'],
            'handy_talkie' => ['nullable'],
            'working_permit' => ['nullable'],
            'operational_procedure' => ['nullable'],
            'mask' => ['nullable'],
            'relay_condition' => ['nullable'],
            'terminals_condition' => ['nullable'],
            'type_of_connect_ct_1' => ['nullable'],
            'type_of_connect_ct_2' => ['nullable'],
            'class_ct' => ['nullable'],
            'burden_ct' => ['nullable'],
            'ratio_ct' => ['nullable'],
            'wires_condition' => ['nullable'],
            'type_of_protection' => ['nullable'],
            'setting_check' => ['nullable'],
            'temperature' => ['nullable'],
            'pressure' => ['nullable'],
            'indication_rcms_note' => ['nullable'],
            'indication_scada_note' => ['nullable'],
            'order_rcms_note' => ['nullable'],
            'order_scada_note' => ['nullable'],
            'catatan' => ['nullable'],
            'status.*' => ['nullable'],
            'remarks.*' => ['nullable'],
        ]);

        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formElpTahunan = FormElpTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->first();
            $formElpTahunan->drawing = $validatedData['drawing'] ?? null;
            $formElpTahunan->manual_book = $validatedData['manual_book'] ?? null;
            $formElpTahunan->tool_set = $validatedData['tool_set'] ?? null;
            $formElpTahunan->cleaning_tools = $validatedData['cleaning_tools'] ?? null;
            $formElpTahunan->supporting_cables = $validatedData['supporting_cables'] ?? null;
            $formElpTahunan->secondary_injector = $validatedData['secondary_injector'] ?? null;
            $formElpTahunan->voltage_meter = $validatedData['voltage_meter'] ?? null;
            $formElpTahunan->ampere_meter = $validatedData['ampere_meter'] ?? null;
            $formElpTahunan->safety_vest = $validatedData['safety_vest'] ?? null;
            $formElpTahunan->safety_helmet = $validatedData['safety_helmet'] ?? null;
            $formElpTahunan->safety_shoes = $validatedData['safety_shoes'] ?? null;
            $formElpTahunan->electrical_gloves = $validatedData['electrical_gloves'] ?? null;
            $formElpTahunan->handy_talkie = $validatedData['handy_talkie'] ?? null;
            $formElpTahunan->working_permit = $validatedData['working_permit'] ?? null;
            $formElpTahunan->operational_procedure = $validatedData['operational_procedure'] ?? null;
            $formElpTahunan->mask = $validatedData['mask'] ?? null;
            $formElpTahunan->relay_condition = $validatedData['relay_condition'] ?? null;
            $formElpTahunan->terminals_condition = $validatedData['terminals_condition'] ?? null;
            $formElpTahunan->type_of_connect_ct_1 = $validatedData['type_of_connect_ct_1'] ?? null;
            $formElpTahunan->type_of_connect_ct_2 = $validatedData['type_of_connect_ct_2'] ?? null;
            $formElpTahunan->class_ct = $validatedData['class_ct'] ?? null;
            $formElpTahunan->burden_ct = $validatedData['burden_ct'] ?? null;
            $formElpTahunan->ratio_ct = $validatedData['ratio_ct'] ?? null;
            $formElpTahunan->wires_condition = $validatedData['wires_condition'] ?? null;
            $formElpTahunan->type_of_protection = $validatedData['type_of_protection'] ?? null;
            $formElpTahunan->setting_check = $validatedData['setting_check'] ?? null;
            $formElpTahunan->temperature = $validatedData['temperature'] ?? null;
            $formElpTahunan->pressure = $validatedData['pressure'] ?? null;
            $formElpTahunan->indication_rcms_note = $validatedData['indication_rcms_note'] ?? null;
            $formElpTahunan->indication_scada_note = $validatedData['indication_scada_note'] ?? null;
            $formElpTahunan->order_rcms_note = $validatedData['order_rcms_note'] ?? null;
            $formElpTahunan->order_scada_note = $validatedData['order_scada_note'] ?? null;
            $formElpTahunan->catatan = $validatedData['catatan'] ?? null;
            $formElpTahunan->save();

            $formElpFinalCheckTahunans = FormElpFinalCheckTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formElpFinalCheckTahunans as $key => $formElpFinalCheckTahunan) {
                $formElpFinalCheckTahunan->status = $validatedData['status'][$key];
                $formElpFinalCheckTahunan->remarks = $validatedData['remarks'][$key];
                $formElpFinalCheckTahunan->save();
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

    public function formElpPartlyEnamBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM ELP - PARTLY ENAM BULANAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['elements'] = ['oc', 'sf', 'gf', 'gf'];
        $data['properties'] = [['title' => 'Isett (A)', 'name' => 'isset_a'], ['title' => 'Ifault (A)', 'name' => 'ifault_a'], ['title' => '10I/Is (s)', 'name' => 'ten_i'], ['title' => 'TMS (s)', 'name' => 'tms'], ['title' => 't (s)', 'name' => 't']];

        if (
            !FormElpPartlyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->first()
        ) {
            foreach ($data['elements'] as $element) {
                $formElpPartlyEnamBulanan = new FormElpPartlyEnamBulanan();
                $formElpPartlyEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formElpPartlyEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formElpPartlyEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formElpPartlyEnamBulanan->element = strtoupper($element);
                $formElpPartlyEnamBulanan->save();
            }
        }

        $data['formElpPartlyEnamBulanans'] = FormElpPartlyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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

        if (UserTechnical::where('id', Auth::user()->id)->first()->username ?? false) {
            // untuk mengubah tampilan jika user technical
            $data['extends'] = 'user-technicals.layouts.app';
        } else {
            $data['extends'] = 'layouts.app';
        }
        return view('form.electrical-protection.partly-enam-bulanan.index', $data);
    }

    public function formElpPartlyEnamBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'substation' => ['nullable'],
            'gardu' => ['nullable'],
            'relay' => ['nullable'],
            'curve_tripping.*' => ['nullable'],

            'isset_a_calculation.*' => ['nullable'],
            'isset_a_test_trip_relay.*' => ['nullable'],
            'isset_a_test_trip_cb.*' => ['nullable'],

            'ifault_a_calculation.*' => ['nullable'],
            'ifault_a_test_trip_relay.*' => ['nullable'],
            'ifault_a_test_trip_cb.*' => ['nullable'],

            'ten_i_calculation.*' => ['nullable'],
            'ten_i_test_trip_relay.*' => ['nullable'],
            'ten_i_test_trip_cb.*' => ['nullable'],

            'tms_calculation.*' => ['nullable'],
            'tms_test_trip_relay.*' => ['nullable'],
            'tms_test_trip_cb.*' => ['nullable'],

            't_calculation.*' => ['nullable'],
            't_test_trip_relay.*' => ['nullable'],
            't_test_trip_cb.*' => ['nullable'],

            'rasio_ct.*' => ['nullable'],
            'keterangan.*' => ['nullable'],

            'catatan' => ['nullable'],
        ]);
        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        $data['elements'] = ['OC', 'SF', 'GF', 'GF'];
        try {
            DB::beginTransaction();
            $formElpPartlyEnamBulanans = FormElpPartlyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formElpPartlyEnamBulanans as $key => $formElpPartlyEnamBulanan) {
                $formElpPartlyEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formElpPartlyEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formElpPartlyEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formElpPartlyEnamBulanan->substation = $validatedData['substation'];
                $formElpPartlyEnamBulanan->gardu = $validatedData['gardu'];
                $formElpPartlyEnamBulanan->relay = $validatedData['relay'];
                $formElpPartlyEnamBulanan->element = $data['elements'][$key];
                $formElpPartlyEnamBulanan->curve_tripping = $validatedData['curve_tripping'][$key];
                $formElpPartlyEnamBulanan->rasio_ct = $validatedData['rasio_ct'][$key];
                $formElpPartlyEnamBulanan->keterangan = $validatedData['keterangan'][$key];

                $formElpPartlyEnamBulanan->isset_a_calculation = $validatedData['isset_a_calculation'][$key];
                $formElpPartlyEnamBulanan->isset_a_test_trip_relay = $validatedData['isset_a_test_trip_relay'][$key];
                $formElpPartlyEnamBulanan->isset_a_test_trip_cb = $validatedData['isset_a_test_trip_cb'][$key];

                $formElpPartlyEnamBulanan->ifault_a_calculation = $validatedData['ifault_a_calculation'][$key];
                $formElpPartlyEnamBulanan->ifault_a_test_trip_relay = $validatedData['ifault_a_test_trip_relay'][$key];
                $formElpPartlyEnamBulanan->ifault_a_test_trip_cb = $validatedData['ifault_a_test_trip_cb'][$key];

                $formElpPartlyEnamBulanan->ten_i_calculation = $validatedData['ten_i_calculation'][$key];
                $formElpPartlyEnamBulanan->ten_i_test_trip_relay = $validatedData['ten_i_test_trip_relay'][$key];
                $formElpPartlyEnamBulanan->ten_i_test_trip_cb = $validatedData['ten_i_test_trip_cb'][$key];

                $formElpPartlyEnamBulanan->tms_calculation = $validatedData['tms_calculation'][$key];
                $formElpPartlyEnamBulanan->tms_test_trip_relay = $validatedData['tms_test_trip_relay'][$key];
                $formElpPartlyEnamBulanan->tms_test_trip_cb = $validatedData['tms_test_trip_cb'][$key];

                $formElpPartlyEnamBulanan->t_calculation = $validatedData['t_calculation'][$key];
                $formElpPartlyEnamBulanan->t_test_trip_relay = $validatedData['t_test_trip_relay'][$key];
                $formElpPartlyEnamBulanan->t_test_trip_cb = $validatedData['t_test_trip_cb'][$key];

                $formElpPartlyEnamBulanan->catatan = $validatedData['catatan'];
                $formElpPartlyEnamBulanan->save();
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