<?php

namespace App\Http\Controllers;
use FFI;
use App\Models\WorkOrder;
use App\Helpers\ActivityLog;
use Illuminate\Http\Request;
use App\Models\AssetMaterial;
use App\Models\FormActivityLog;

use Illuminate\Support\Facades\DB;
use App\Models\DetailWorkOrderForm;
use Illuminate\Support\Facades\Auth;
use App\Models\FormElePemeliharaanTahunan;
use App\Models\FormEleChecklist1Harian;
use App\Models\FormEleChecklist2Harian;
use App\Models\FormEleSuratPemeriksaanRutin;
use App\Models\FormEleSuratIzinPelaksanaanPekerjaan;
use App\Models\UserTechnical;

class FormEleController extends Controller
{
    public function formEleChecklist1Harian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Check List 1';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['utara'] = ['FLOOD LIGHT APRON D', 'FLOOD LIGHT APRON E', 'FLOOD LIGHT APRON F', 'FLOOD LIGHT REMOTE EAST', 'FLOOD LIGHT APRON G', 'FLOOD LIGHT REMOTE WEST', 'FLOOD LIGHT APRON J', 'OBSTRUCTION LIGHT', 'AVDGS', 'PARKING STAND'];

        $data['selatan'] = ['FLOOD LIGHT APRON A', 'FLOOD LIGHT APRON B', 'FLOOD LIGHT APRON C', 'FLOOD LIGHT NSA', 'FLOOD LIGHT REMOTE B', 'FLOOD LIGHT CARGO', 'OBSTRUCTION LIGHT', 'PARKING STAND'];

        if (
            !FormEleChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('posisi', 'utara')
                ->first()
        ) {
            foreach ($data['utara'] as $key => $value) {
                $formEleChecklist1HarianUtara = new FormEleChecklist1Harian();
                $formEleChecklist1HarianUtara->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formEleChecklist1HarianUtara->form_id = $detailWorkOrderForm->form_id;
                $formEleChecklist1HarianUtara->work_order_id = $detailWorkOrderForm->work_order_id;
                $formEleChecklist1HarianUtara->posisi = 'utara';
                $formEleChecklist1HarianUtara->pertanyaan = $value;
                $formEleChecklist1HarianUtara->save();
            }
        }

        if (
            !FormEleChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('posisi', 'selatan')
                ->first()
        ) {
            foreach ($data['selatan'] as $key => $value) {
                $formEleChecklist1HarianSelatan = new FormEleChecklist1Harian();
                $formEleChecklist1HarianSelatan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formEleChecklist1HarianSelatan->form_id = $detailWorkOrderForm->form_id;
                $formEleChecklist1HarianSelatan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formEleChecklist1HarianSelatan->posisi = 'selatan';
                $formEleChecklist1HarianSelatan->pertanyaan = $value;
                $formEleChecklist1HarianSelatan->save();
            }
        }

        $data['formEleChecklist1HarianUtaras'] = FormEleChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('posisi', 'utara')
            ->orderBy('id', 'asc')
            ->get();

        $data['formEleChecklist1HarianSelatans'] = FormEleChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('posisi', 'selatan')
            ->orderBy('id', 'asc')
            ->get();

        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.ele.checklist1.index', $data);
    }

    public function formEleChecklist1HarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tanggal' => ['nullable'],
            'jam_pagi' => ['nullable'],
            'jam_sore' => ['nullable'],
            'pagi_utara.*' => ['nullable'],
            'pagi_selatan.*' => ['nullable'],
            'sore_utara.*' => ['nullable'],
            'sore_selatan.*' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formEleChecklist1HarianUtaras = FormEleChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('posisi', 'utara')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formEleChecklist1HarianUtaras as $key => $formEleChecklist1Harian) {
                $formEleChecklist1Harian->tanggal = $validatedData['tanggal'];
                $formEleChecklist1Harian->jam_pagi = $validatedData['jam_pagi'];
                $formEleChecklist1Harian->jam_sore = $validatedData['jam_sore'];
                $formEleChecklist1Harian->pagi = $validatedData['pagi_utara'][$key];
                $formEleChecklist1Harian->sore = $validatedData['sore_utara'][$key];

                $formEleChecklist1Harian->save();
            }

            $formEleChecklist1HarianSelatans = FormEleChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('posisi', 'selatan')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formEleChecklist1HarianSelatans as $key => $formEleChecklist1Harian) {
                $formEleChecklist1Harian->tanggal = $validatedData['tanggal'];
                $formEleChecklist1Harian->jam_pagi = $validatedData['jam_pagi'];
                $formEleChecklist1Harian->jam_sore = $validatedData['jam_sore'];
                $formEleChecklist1Harian->pagi = $validatedData['pagi_selatan'][$key];
                $formEleChecklist1Harian->sore = $validatedData['sore_selatan'][$key];

                $formEleChecklist1Harian->save();
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

    public function formElePemeliharaanTahunan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Pemeliharaan Tahunan';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (
            !FormElePemeliharaanTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->first()
        ) {
            for($i = 0; $i < 2; $i++) {
                $formElePemeliharaanTahunan = new FormElePemeliharaanTahunan();
                $formElePemeliharaanTahunan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formElePemeliharaanTahunan->form_id = $detailWorkOrderForm->form_id;
                $formElePemeliharaanTahunan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formElePemeliharaanTahunan->save();
            }
        }


        $data['formElePemeliharaanTahunans'] = FormElePemeliharaanTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.ele.pemeliharaan-tahunan.index', $data);
    }

    public function formElePemeliharaanTahunanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'pengawas.*' => ['nullable'],
            'substation.*' => ['nullable'],
            'tanggal.*' => ['nullable'],
            'sdp.*' => ['nullable'],
            'temp.*' => ['nullable'],
            'rs.*' => ['nullable'],
            'st.*' => ['nullable'],
            'tr.*' => ['nullable'],
            'rn.*' => ['nullable'],
            'sn.*' => ['nullable'],
            'tn.*' => ['nullable'],
            'ng.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formElePemeliharaanTahunans = FormElePemeliharaanTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formElePemeliharaanTahunans as $key => $formElePemeliharaanTahunan) {
                $formElePemeliharaanTahunan->pengawas = $validatedData['pengawas'][$key];
                $formElePemeliharaanTahunan->substation = $validatedData['substation'][$key];
                $formElePemeliharaanTahunan->tanggal = $validatedData['tanggal'][$key];
                $formElePemeliharaanTahunan->sdp = $validatedData['sdp'][$key];
                $formElePemeliharaanTahunan->temp = $validatedData['temp'][$key];
                $formElePemeliharaanTahunan->rs = $validatedData['rs'][$key];
                $formElePemeliharaanTahunan->st = $validatedData['st'][$key];
                $formElePemeliharaanTahunan->tr = $validatedData['tr'][$key];
                $formElePemeliharaanTahunan->rn = $validatedData['rn'][$key];
                $formElePemeliharaanTahunan->sn = $validatedData['sn'][$key];
                $formElePemeliharaanTahunan->tn = $validatedData['tn'][$key];
                $formElePemeliharaanTahunan->ng = $validatedData['ng'][$key];
                $formElePemeliharaanTahunan->catatan = $validatedData['catatan'];

                $formElePemeliharaanTahunan->save();
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
    public function formEleChecklist2Harian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Check List 2';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['utara'] = ['FLOOD LIGHT APRON D', 'FLOOD LIGHT APRON E', 'FLOOD LIGHT APRON F', 'FLOOD LIGHT REMOTE EAST', 'FLOOD LIGHT APRON G', 'FLOOD LIGHT REMOTE WEST', 'FLOOD LIGHT APRON J', 'OBSTRUCTION LIGHT', 'AVDGS', 'PARKING STAND'];

        $data['selatan'] = ['FLOOD LIGHT APRON A', 'FLOOD LIGHT APRON B', 'FLOOD LIGHT APRON C', 'FLOOD LIGHT NSA', 'FLOOD LIGHT REMOTE B', 'FLOOD LIGHT CARGO', 'OBSTRUCTION LIGHT', 'PARKING STAND'];

        if (
            !FormEleChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('posisi', 'utara')
                ->first()
        ) {
            foreach ($data['utara'] as $key => $value) {
                $formEleChecklist2HarianUtara = new FormEleChecklist2Harian();
                $formEleChecklist2HarianUtara->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formEleChecklist2HarianUtara->form_id = $detailWorkOrderForm->form_id;
                $formEleChecklist2HarianUtara->work_order_id = $detailWorkOrderForm->work_order_id;
                $formEleChecklist2HarianUtara->posisi = 'utara';
                $formEleChecklist2HarianUtara->pertanyaan = $value;
                $formEleChecklist2HarianUtara->save();
            }
        }

        if (
            !FormEleChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('posisi', 'selatan')
                ->first()
        ) {
            foreach ($data['selatan'] as $key => $value) {
                $formEleChecklist2HarianSelatan = new FormEleChecklist2Harian();
                $formEleChecklist2HarianSelatan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formEleChecklist2HarianSelatan->form_id = $detailWorkOrderForm->form_id;
                $formEleChecklist2HarianSelatan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formEleChecklist2HarianSelatan->posisi = 'selatan';
                $formEleChecklist2HarianSelatan->pertanyaan = $value;
                $formEleChecklist2HarianSelatan->save();
            }
        }

        $data['formEleChecklist2HarianUtaras'] = FormEleChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('posisi', 'utara')
            ->orderBy('id', 'asc')
            ->get();

        $data['formEleChecklist2HarianSelatans'] = FormEleChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->where('posisi', 'selatan')
            ->orderBy('id', 'asc')
            ->get();

        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            ActivityLog::startLog($detailWorkOrderForm);
        }
        return view('form.ele.checklist2.index', $data);
    }

    public function formEleChecklist2HarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tanggal' => ['nullable'],
            'jam' => ['nullable'],
            'hasil_utara.*' => ['nullable'],
            'hasil_selatan.*' => ['nullable'],
            'keterangan_utara.*' => ['nullable'],
            'keterangan_selatan.*' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formEleChecklist2HarianUtaras = FormEleChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('posisi', 'utara')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formEleChecklist2HarianUtaras as $key => $formEleChecklist2Harian) {
                $formEleChecklist2Harian->tanggal = $validatedData['tanggal'];
                $formEleChecklist2Harian->jam = $validatedData['jam'];
                $formEleChecklist2Harian->hasil = $validatedData['hasil_utara'][$key];
                $formEleChecklist2Harian->keterangan = $validatedData['keterangan_utara'][$key];

                $formEleChecklist2Harian->save();
            }

            $formEleChecklist2HarianSelatans = FormEleChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('posisi', 'selatan')
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formEleChecklist2HarianSelatans as $key => $formEleChecklist2Harian) {
                $formEleChecklist2Harian->tanggal = $validatedData['tanggal'];
                $formEleChecklist2Harian->jam = $validatedData['jam'];
                $formEleChecklist2Harian->hasil = $validatedData['hasil_selatan'][$key];
                $formEleChecklist2Harian->keterangan = $validatedData['keterangan_selatan'][$key];

                $formEleChecklist2Harian->save();
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

    public function formEleSuratIzinPelaksanaanPekerjaan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Surat Izinp Pelaksanaan Pekerjaan - ELE';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);
        $data['assetMaterials'] = AssetMaterial::where('asset_id', $data['workOrder']->asset_id)
            ->with(['bom'])
            ->get();

        $data['formEleSuratIzinPelaksanaanPekerjaan'] = FormEleSuratIzinPelaksanaanPekerjaan::firstOrCreate([
            'detail_work_order_form_id' => $detailWorkOrderForm->id,
            'form_id' => $detailWorkOrderForm->form_id,
            'work_order_id' => $detailWorkOrderForm->work_order_id,
        ]);

        $data['userTechnicals'] = [];
        foreach ($data['workOrder']->userGroups as $userGroup) {
            foreach ($userGroup->customUserTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
        }

        foreach ($data['workOrder']->userTechnicals as $userTechnical) {
            $data['userTechnicals'][] = $userTechnical->name;
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
        return view('form.ele.surat-perintah-pemasangan.index', $data);
    }

    public function formEleSuratIzinPelaksanaanPekerjaanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tanggal' => ['nullable'],
            'nama_petugas_atc' => ['nullable'],
            'jam_masuk' => ['nullable'],
            'jam_keluar' => ['nullable'],
            'kendaraan' => ['nullable'],
            'nomor_polisi' => ['nullable'],
            'tujuan_keperluan' => ['nullable'],
            'lokasi_pekerjaan' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formEleSuratPerintahPemasangan = FormEleSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formEleSuratPerintahPemasangan->tanggal = $validatedData['tanggal'];
            $formEleSuratPerintahPemasangan->nama_petugas_atc = $validatedData['nama_petugas_atc'];
            $formEleSuratPerintahPemasangan->jam_masuk = $validatedData['jam_masuk'];
            $formEleSuratPerintahPemasangan->jam_keluar = $validatedData['jam_keluar'];
            $formEleSuratPerintahPemasangan->kendaraan = $validatedData['kendaraan'];
            $formEleSuratPerintahPemasangan->nomor_polisi = $validatedData['nomor_polisi'];
            $formEleSuratPerintahPemasangan->tujuan_keperluan = $validatedData['tujuan_keperluan'];
            $formEleSuratPerintahPemasangan->lokasi_pekerjaan = $validatedData['lokasi_pekerjaan'];
            $formEleSuratPerintahPemasangan->catatan = $validatedData['catatan'];
            $formEleSuratPerintahPemasangan->save();

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

    public function formElePemeriksaanRutin(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Surat Pemeriksaan Rutin';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $data['formEleSuratPemeriksaanRutin'] = FormEleSuratPemeriksaanRutin::firstOrCreate([
            'detail_work_order_form_id' => $detailWorkOrderForm->id,
            'form_id' => $detailWorkOrderForm->form_id,
            'work_order_id' => $detailWorkOrderForm->work_order_id,
        ]);

        $data['userTechnicals'] = [];
        foreach ($data['workOrder']->userGroups as $userGroup) {
            foreach ($userGroup->customUserTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
        }

        foreach ($data['workOrder']->userTechnicals as $userTechnical) {
            $data['userTechnicals'][] = $userTechnical->name;
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
        // $data['formActivity'] = FormActivityLog::where('work_order_id', $detailWorkOrderForm->work_order_id)->where('form_id', $detailWorkOrderForm->form_id)->first();
        return view('form.ele.pemeriksaan-rutin.index', $data);
    }

    public function formElePemeriksaanRutinUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tanggal' => ['nullable'],
            'nama_petugas_atc' => ['nullable'],
            'jam_masuk' => ['nullable'],
            'jam_keluar' => ['nullable'],
            'kendaraan' => ['nullable'],
            'nomor_polisi' => ['nullable'],
            'tujuan_keperluan' => ['nullable'],
            'lokasi_pekerjaan' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formEleSuratPemeriksaanRutin = FormEleSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formEleSuratPemeriksaanRutin->tanggal = $validatedData['tanggal'];
            $formEleSuratPemeriksaanRutin->nama_petugas_atc = $validatedData['nama_petugas_atc'];
            $formEleSuratPemeriksaanRutin->jam_masuk = $validatedData['jam_masuk'];
            $formEleSuratPemeriksaanRutin->jam_keluar = $validatedData['jam_keluar'];
            $formEleSuratPemeriksaanRutin->kendaraan = $validatedData['kendaraan'];
            $formEleSuratPemeriksaanRutin->nomor_polisi = $validatedData['nomor_polisi'];
            $formEleSuratPemeriksaanRutin->tujuan_keperluan = $validatedData['tujuan_keperluan'];
            $formEleSuratPemeriksaanRutin->lokasi_pekerjaan = $validatedData['lokasi_pekerjaan'];
            $formEleSuratPemeriksaanRutin->catatan = $validatedData['catatan'];
            $formEleSuratPemeriksaanRutin->save();

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
