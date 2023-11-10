<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\FormSva;
use App\Models\WorkOrder;
use App\Helpers\ActivityLog;
use Illuminate\Http\Request;
use App\Models\AssetMaterial;
use App\Models\FormActivityLog;
use App\Models\FormSvaCcrHarian;
use Illuminate\Support\Facades\DB;
use App\Models\DetailWorkOrderForm;
use App\Models\FormSvaHFCPapiHarian;
use Illuminate\Support\Facades\Auth;
use App\Models\FormSvaChecklist1Harian;
use App\Models\FormSvaChecklist2Harian;
use App\Models\FormSvaHFCPapipetugasHarian;
use App\Models\FormSvaSuratPemeriksaanRutin;
use App\Models\FormSvaUraianPerbaikanHarian;
use App\Models\FormSvaPemeriksaanRutinHarian;
use App\Models\FormSvaSuratPerbaikanGangguan;
use App\Models\FormSvaConstantCurrentRegulation;
// use App\Models\FormSvaSuratPerintahPerbaikanHarian;
use App\Models\FormSvaUraianPerbaikanisianHarian;
use App\Models\FormSvaSuratIzinPelaksanaanPekerjaan;
use App\Models\FormSvaSuratPerintahPemasanganHarian;
use App\Models\UserTechnical;

class FormSvaController extends Controller
{
    public function formSvaSuratPerbaikanGangguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Surat Perbaikan Gangguan - SVA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $data['formSvaSuratPerbaikanGangguan'] = formSvaSuratPerbaikanGangguan::firstOrCreate([
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
        return view('form.sva.perbaikan-gangguan.index', $data);
    }

    public function formSvaSuratPerbaikanGangguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
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
            $formSvaSuratPerbaikanGangguan = FormSvaSuratPerbaikanGangguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formSvaSuratPerbaikanGangguan->tanggal = $validatedData['tanggal'];
            $formSvaSuratPerbaikanGangguan->nama_petugas_atc = $validatedData['nama_petugas_atc'];
            $formSvaSuratPerbaikanGangguan->jam_masuk = $validatedData['jam_masuk'];
            $formSvaSuratPerbaikanGangguan->jam_keluar = $validatedData['jam_keluar'];
            $formSvaSuratPerbaikanGangguan->kendaraan = $validatedData['kendaraan'];
            $formSvaSuratPerbaikanGangguan->nomor_polisi = $validatedData['nomor_polisi'];
            $formSvaSuratPerbaikanGangguan->tujuan_keperluan = $validatedData['tujuan_keperluan'];
            $formSvaSuratPerbaikanGangguan->lokasi_pekerjaan = $validatedData['lokasi_pekerjaan'];
            $formSvaSuratPerbaikanGangguan->catatan = $validatedData['catatan'];
            $formSvaSuratPerbaikanGangguan->save();

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
    public function formSvaSuratPemeriksaanRutin(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Surat Pemeriksaan Rutin - SVA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $data['formSvaSuratPemeriksaanRutin'] = formSvaSuratPemeriksaanRutin::firstOrCreate([
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
        return view('form.sva.pemeriksaan-rutin.index', $data);
    }

    public function formSvaSuratPemeriksaanRutinUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
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
            $formSvaSuratPemeriksaanRutin = FormSvaSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formSvaSuratPemeriksaanRutin->tanggal = $validatedData['tanggal'];
            $formSvaSuratPemeriksaanRutin->nama_petugas_atc = $validatedData['nama_petugas_atc'];
            $formSvaSuratPemeriksaanRutin->jam_masuk = $validatedData['jam_masuk'];
            $formSvaSuratPemeriksaanRutin->jam_keluar = $validatedData['jam_keluar'];
            $formSvaSuratPemeriksaanRutin->kendaraan = $validatedData['kendaraan'];
            $formSvaSuratPemeriksaanRutin->nomor_polisi = $validatedData['nomor_polisi'];
            $formSvaSuratPemeriksaanRutin->tujuan_keperluan = $validatedData['tujuan_keperluan'];
            $formSvaSuratPemeriksaanRutin->lokasi_pekerjaan = $validatedData['lokasi_pekerjaan'];
            $formSvaSuratPemeriksaanRutin->catatan = $validatedData['catatan'];
            $formSvaSuratPemeriksaanRutin->save();

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
    public function formSvaUraianPerbaikanHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form SVA - HASIL FLIGHT CHECK PAPI';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        if (!FormSvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formSvaUraianPerbaikanHarian = new FormSvaUraianPerbaikanHarian();
            $formSvaUraianPerbaikanHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formSvaUraianPerbaikanHarian->form_id = $detailWorkOrderForm->form_id;
            $formSvaUraianPerbaikanHarian->work_order_id = $detailWorkOrderForm->work_order_id;
            $formSvaUraianPerbaikanHarian->kartu_peralatan == '';
            $formSvaUraianPerbaikanHarian->sub_gardu == '';
            $formSvaUraianPerbaikanHarian->merk == '';
            $formSvaUraianPerbaikanHarian->type = '';
            $formSvaUraianPerbaikanHarian->kapasitas = '';
            $formSvaUraianPerbaikanHarian->tahun_pemasangan = '';
            $formSvaUraianPerbaikanHarian->save();
        }

        $data['formSvaUraianPerbaikanHarians'] = FormSvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.sva.uraian.index', $data);
    }

    public function formSvaUraianPerbaikanHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formSvaUraianPerbaikanHarians'] = FormSvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formSvaUraianPerbaikanHarians'] as $key => $formSvaUraianPerbaikanHarian) {
                $formSvaUraianPerbaikanHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSvaUraianPerbaikanHarian->form_id = $detailWorkOrderForm->form_id;
                $formSvaUraianPerbaikanHarian->work_order_id = $detailWorkOrderForm->work_order_id;

                $formSvaUraianPerbaikanHarian->save();
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
    public function formSvaHFCPapiHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form SVA - HASIL FLIGHT CALIBRATION PAPI - SVA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['facility_inspections'] = ['PAPI 25 LEFT', 'PAPI 07 RIGHT'];
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        if (!FormSvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['facility_inspections'] as $key => $facility_inspection) {
                for ($i = 0; $i < 3; $i++) {
                    $formSvaHFCPapiHarian = new FormSvaHFCPapiHarian();
                    $formSvaHFCPapiHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formSvaHFCPapiHarian->form_id = $detailWorkOrderForm->form_id;
                    $formSvaHFCPapiHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formSvaHFCPapiHarian->Fi = $facility_inspection;
                    $formSvaHFCPapiHarian->tanggal = now()->format('Y-m-d');
                    $formSvaHFCPapiHarian->save();
                }
            }
        }
        $data['hari'] = strtoupper(
            Carbon::parse($data['workOrder']->date_generate)
                ->locale('id')
                ->isoFormat('dddd'),
        );
        $data['tanggal'] = Carbon::parse($data['workOrder']->date_generate)
            ->locale('id')
            ->isoFormat('DD-MM-YYYY');
        $data['technicalGroups'] = [];
        $data['userTechnicals'] = [];
        $data['userTechnicals2'] = [];
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
        $data['formSvaHFCPapiHarians'] = FormSvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.sva.hfc-papi.index', $data);
    }

    public function formSvaHFCPapiHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'glide_a_derajat.*' => ['nullable'],
            'glide_b_derajat.*' => ['nullable'],
            'glide_c_derajat.*' => ['nullable'],
            'glide_d_derajat.*' => ['nullable'],
            'glide_a_menit.*' => ['nullable'],
            'glide_b_menit.*' => ['nullable'],
            'glide_c_menit.*' => ['nullable'],
            'glide_d_menit.*' => ['nullable'],
            'current_calibration' => ['nullable'],
            'ccos.*' => ['nullable'],
            'next_calibration' => ['nullable'],
        ]);
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formSvaHFCPapiHarians'] = FormSvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formSvaHFCPapiHarians'] as $key => $formSvaHFCPapiHarian) {
                $formSvaHFCPapiHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSvaHFCPapiHarian->form_id = $detailWorkOrderForm->form_id;
                $formSvaHFCPapiHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSvaHFCPapiHarian->glide_a_derajat = $validatedData['glide_a_derajat'][$key];
                $formSvaHFCPapiHarian->glide_b_derajat = $validatedData['glide_b_derajat'][$key];
                $formSvaHFCPapiHarian->glide_c_derajat = $validatedData['glide_c_derajat'][$key];
                $formSvaHFCPapiHarian->glide_d_derajat = $validatedData['glide_d_derajat'][$key];
                $formSvaHFCPapiHarian->glide_a_menit = $validatedData['glide_a_menit'][$key];
                $formSvaHFCPapiHarian->glide_b_menit = $validatedData['glide_b_menit'][$key];
                $formSvaHFCPapiHarian->glide_c_menit = $validatedData['glide_c_menit'][$key];
                $formSvaHFCPapiHarian->glide_d_menit = $validatedData['glide_d_menit'][$key];
                $formSvaHFCPapiHarian->ccos = $validatedData['ccos'][$key];
                $formSvaHFCPapiHarian->current_calibration = $validatedData['current_calibration'][$key];
                $formSvaHFCPapiHarian->next_calibration = $validatedData['next_calibration'][$key];
                $formSvaHFCPapiHarian->save();
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
    public function formSvaSuratIzinPelaksanaanPekerjaan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Surat Izin Pelaksanaan Pekerjaan - SVA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);
        $data['assetMaterials'] = AssetMaterial::where('asset_id', $data['workOrder']->asset_id)
            ->with(['bom'])
            ->get();
        $data['formSvaSuratIzinPelaksanaanPekerjaan'] = formSvaSuratIzinPelaksanaanPekerjaan::firstOrCreate([
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
        return view('form.sva.surat-izin-pelaksanaan-pekerjaan.index', $data);
    }

    public function formSvaSuratIzinPelaksanaanPekerjaanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
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
            $formSvaSuratIzinPelaksanaanPekerjaan = FormSvaSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formSvaSuratIzinPelaksanaanPekerjaan->tanggal = $validatedData['tanggal'];
            $formSvaSuratIzinPelaksanaanPekerjaan->nama_petugas_atc = $validatedData['nama_petugas_atc'];
            $formSvaSuratIzinPelaksanaanPekerjaan->jam_masuk = $validatedData['jam_masuk'];
            $formSvaSuratIzinPelaksanaanPekerjaan->jam_keluar = $validatedData['jam_keluar'];
            $formSvaSuratIzinPelaksanaanPekerjaan->kendaraan = $validatedData['kendaraan'];
            $formSvaSuratIzinPelaksanaanPekerjaan->nomor_polisi = $validatedData['nomor_polisi'];
            $formSvaSuratIzinPelaksanaanPekerjaan->tujuan_keperluan = $validatedData['tujuan_keperluan'];
            $formSvaSuratIzinPelaksanaanPekerjaan->lokasi_pekerjaan = $validatedData['lokasi_pekerjaan'];
            $formSvaSuratIzinPelaksanaanPekerjaan->catatan = $validatedData['catatan'];
            $formSvaSuratIzinPelaksanaanPekerjaan->save();

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
    public function formSvaChecklist1Harian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Check List 1';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['datas'] = FormSva::formSvaChecklist1Harian();
        if ($detailWorkOrderForm->formSvaChecklist1Harians->isEmpty()) {
            try {
                DB::beginTransaction();
                foreach ($data['datas']->rcms as $rcms) {
                    $formSvaChecklist1Harian = new FormSvaChecklist1Harian();
                    $formSvaChecklist1Harian->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formSvaChecklist1Harian->form_id = $detailWorkOrderForm->form_id;
                    $formSvaChecklist1Harian->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formSvaChecklist1Harian->peralatan = $rcms['peralatan'];
                    $formSvaChecklist1Harian->save();
                }
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
            }
        }
        $data['userTechnical'] = User::where('id', Auth::user()->id)->first()->username ?? null;
        $data['formSvaChecklist1Harians'] = $detailWorkOrderForm->formSvaChecklist1Harians;
        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            $formActivityLog = new FormActivityLog();
            $formActivityLog->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formActivityLog->form_id = $detailWorkOrderForm->form_id;
            $formActivityLog->work_order_id = $detailWorkOrderForm->work_order_id;
            $formActivityLog->status = 'start';
            $formActivityLog->user_technical_id = User::where('id', Auth::user()->id)->first() ? User::where('id', Auth::user()->id)->first()->id : null;
            //$formActivityLog->time_record = now();
            $formActivityLog->save();
        }
        return view('form.sva.checklist1.index', $data);
    }

    public function formSvaChecklist1HarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tanggal' => ['nullable'],
            'jam_pagi' => ['nullable'],
            'rw_in_use_pagi' => ['nullable'],
            'jam_sore' => ['nullable'],
            'rw_in_use_sore' => ['nullable'],
            'hasil_pagi.*' => ['nullable'],
            'hasil_sore.*' => ['nullable'],
            'oleh' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSvaChecklist1Harians = FormSvaChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSvaChecklist1Harians as $key => $formSvaChecklist1Harian) {
                $formSvaChecklist1Harian->tanggal = $validatedData['tanggal'];
                $formSvaChecklist1Harian->jam_pagi = $validatedData['jam_pagi'];
                $formSvaChecklist1Harian->rw_in_use_pagi = $validatedData['rw_in_use_pagi'];
                $formSvaChecklist1Harian->jam_sore = $validatedData['jam_sore'];
                $formSvaChecklist1Harian->rw_in_use_sore = $validatedData['rw_in_use_sore'];
                $formSvaChecklist1Harian->hasil_pagi = $validatedData['hasil_pagi'][$key];
                $formSvaChecklist1Harian->hasil_sore = $validatedData['hasil_sore'][$key];
                $formSvaChecklist1Harian->oleh = $validatedData['oleh'];

                $formSvaChecklist1Harian->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
            $formActivityLog = new FormActivityLog();
            $formActivityLog->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formActivityLog->form_id = $detailWorkOrderForm->form_id;
            $formActivityLog->work_order_id = $detailWorkOrderForm->work_order_id;
            $formActivityLog->status = 'end';
            $formActivityLog->user_technical_id = User::where('id', Auth::user()->id)->first() ? User::where('id', Auth::user()->id)->first()->id : null;
            $formActivityLog->time_record = date('Y-m-d H:i:s');
            $formActivityLog->save();

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
    public function formSvaChecklist2Harian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Check List 2';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $pertanyaan = ['PAPI', 'RUNWAY CENTERLINE LIGHT', 'RUNWAY EDGE LIGHT', 'THRESHOLD/END LIGHT', 'APPROACH LIGHT', 'SQUENCE FLASHING LIGHT', 'TAXIWAY EDGE LIGHT', 'HIGH SPEED TAXIWAY (HST)', 'APRON CENTERLINE LIGHT', 'WDI LIGHT', 'RUNWAY GUARD LIGHT'];

        if (!FormSvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($pertanyaan as $key => $value) {
                $formSvaChecklist2Harian = new FormSvaChecklist2Harian();
                $formSvaChecklist2Harian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSvaChecklist2Harian->form_id = $detailWorkOrderForm->form_id;
                $formSvaChecklist2Harian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSvaChecklist2Harian->pertanyaan = $value;
                $formSvaChecklist2Harian->save();
            }
        }

        $data['formSvaChecklist2Harians'] = FormSvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            $formActivityLog = new FormActivityLog();
            $formActivityLog->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formActivityLog->form_id = $detailWorkOrderForm->form_id;
            $formActivityLog->work_order_id = $detailWorkOrderForm->work_order_id;
            $formActivityLog->status = 'start';
            $formActivityLog->user_technical_id = User::where('id', Auth::user()->id)->first() ? User::where('id', Auth::user()->id)->first()->id : null;
            //$formActivityLog->time_record = now();
            $formActivityLog->save();
        }
        return view('form.sva.checklist2.index', $data);
    }

    public function formSvaChecklist2HarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tanggal' => ['nullable'],
            'jam' => ['nullable'],
            'qfu' => ['nullable'],
            'hasil.*' => ['nullable'],
            'keterangan.*' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSvaChecklist2Harians = FormSvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSvaChecklist2Harians as $key => $formSvaChecklist2Harian) {
                $formSvaChecklist2Harian->tanggal = $validatedData['tanggal'];
                $formSvaChecklist2Harian->jam = $validatedData['jam'];
                $formSvaChecklist2Harian->qfu = $validatedData['qfu'];
                $formSvaChecklist2Harian->hasil = $validatedData['hasil'][$key];
                $formSvaChecklist2Harian->keterangan = $validatedData['keterangan'][$key];

                $formSvaChecklist2Harian->save();
            }

            // menyimpan FormActivityLog untuk status 'end'
            $formActivityLog = new FormActivityLog();
            $formActivityLog->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formActivityLog->form_id = $detailWorkOrderForm->form_id;
            $formActivityLog->work_order_id = $detailWorkOrderForm->work_order_id;
            $formActivityLog->status = 'end';
            $formActivityLog->user_technical_id = User::where('id', Auth::user()->id)->first() ? User::where('id', Auth::user()->id)->first()->id : null;
            $formActivityLog->time_record = date('Y-m-d H:i:s');
            $formActivityLog->save();

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

    public function formSvaConstantCurrentRegulation(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Data dan Kondisi Peralatan Constant Current Regulator (CCR) - SVA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);
        $data['datas'] = FormSva::formSvaChecklist1Harian();

        $tempDatas = [
            // sub T3
            ['substation' => 'Substation T3', 'peralatan' => 'Approach Light R1', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2012',],
            ['substation' => 'Substation T3', 'peralatan' => 'Approach Light R2', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2012',],
            ['substation' => 'Substation T3', 'peralatan' => 'Approach Light R3', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2008',],
            ['substation' => 'Substation T3', 'peralatan' => 'Threshold Wingbar', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '10 KVA/6.6A', 'tahun_pemasangan' => '2013',],
            ['substation' => 'Substation T3', 'peralatan' => 'Threshold/End', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2012',],
            ['substation' => 'Substation T3', 'peralatan' => 'Runway Edge', 'merk' => 'ALSTOM', 'tipe' => 'MCR 400', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2006',],
            ['substation' => 'Substation T3', 'peralatan' => 'Runway Centerline', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '25 KVA/6.6A', 'tahun_pemasangan' => '2009',],
            ['substation' => 'Substation T3', 'peralatan' => 'HST Centerline S1,S2', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2012',],
            ['substation' => 'Substation T3', 'peralatan' => 'PAPI 25L', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2012',],
            ['substation' => 'Substation T3', 'peralatan' => 'East Cross R1', 'merk' => 'ADB', 'tipe' => 'SAFEGATE', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => ''],
            ['substation' => 'Substation T3', 'peralatan' => 'East Cross R2', 'merk' => 'ADB', 'tipe' => 'SAFEGATE', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => ''],
            ['substation' => 'Substation T3', 'peralatan' => 'CCR Standby 1', 'merk' => 'ALSTOM', 'tipe' => 'MCR 400', 'kapasitas' => '25 KVA/6.6A', 'tahun_pemasangan' => '',],
            ['substation' => 'Substation T3', 'peralatan' => 'CCR Standby 2', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '25 KVA/6.6A', 'tahun_pemasangan' => '2009',],
            ['substation' => 'Substation T3', 'peralatan' => 'CCR Standby 3', 'merk' => 'AUGIER', 'tipe' => 'MICRO 100', 'kapasitas' => '25 KVA/6.6A', 'tahun_pemasangan' => '2009',],
            ['substation' => 'Substation T3', 'peralatan' => 'CCR Standby 4', 'merk' => 'AUGIER', 'tipe' => 'MICRO 100', 'kapasitas' => '25 KVA/6.6A', 'tahun_pemasangan' => '2009',],

            // sub T4
            ['substation' => 'Substation T4', 'peralatan' => 'Runway Edge', 'merk' => 'ALSTOM', 'tipe' => 'MCR 400', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2006',],
            ['substation' => 'Substation T4', 'peralatan' => 'HST Centerline S6,S6,S7', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2010',],
            ['substation' => 'Substation T4', 'peralatan' => 'HST Centerline S3,S4', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2012',],
            ['substation' => 'Substation T4', 'peralatan' => 'Taxiway SP1 Timur', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2012'],
            ['substation' => 'Substation T4', 'peralatan' => 'Taxiway SP1 Barat', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2012'],
            ['substation' => 'Substation T4', 'peralatan' => 'Taxiway SP2 Timur', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2015',],
            ['substation' => 'Substation T4', 'peralatan' => 'Taxiway SP2 Barat', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '10 KVA/6.6A', 'tahun_pemasangan' => '2013',],
            ['substation' => 'Substation T4', 'peralatan' => 'Taxiway Apron A', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '10 KVA/6.6A', 'tahun_pemasangan' => '2010',],
            ['substation' => 'Substation T4', 'peralatan' => 'Taxiway Apron B & C', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '10 KVA/6.6A', 'tahun_pemasangan' => '2010',],
            ['substation' => 'Substation T4', 'peralatan' => 'Taxiway Exit S3,S4', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2013'],
            ['substation' => 'Substation T4', 'peralatan' => 'Taxiway Exit S5,S6,S7', 'merk' => 'AUGIER', 'tipe' => 'DIAM 4000', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2008',],
            ['substation' => 'Substation T4', 'peralatan' => 'Apron Centerline A,B,C', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '10 KVA/6.6A', 'tahun_pemasangan' => '2010',],

            // sub T5
            ['substation' => 'Substation T5', 'peralatan' => 'Approach Light R1', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2011',],
            ['substation' => 'Substation T5', 'peralatan' => 'Approach Light R2', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2011',],
            ['substation' => 'Substation T5', 'peralatan' => 'Approach Light R3', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2011',],
            ['substation' => 'Substation T5', 'peralatan' => 'Threshold Wingbar', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2013'],
            ['substation' => 'Substation T5', 'peralatan' => 'Threshold/End', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2013'],
            ['substation' => 'Substation T5', 'peralatan' => 'Runway Edge', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2013',],
            ['substation' => 'Substation T5', 'peralatan' => 'Runway Centerline', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '25 KVA/6.6A', 'tahun_pemasangan' => '2009',],
            ['substation' => 'Substation T5', 'peralatan' => 'HST Centerline S8,S9', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '10 KVA/6.6A', 'tahun_pemasangan' => '2009',],
            ['substation' => 'Substation T5', 'peralatan' => 'PAPI 07R', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2013',],
            ['substation' => 'Substation T5', 'peralatan' => 'Taxiway Edge WC2', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2010',],
            ['substation' => 'Substation T5', 'peralatan' => 'Taxiway Centerline WC1 & WC2', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2015',],
        ];

        if (!FormSvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempDatas as $tempData) {
                $formSvaConstantCurrentRegulation = new FormSvaConstantCurrentRegulation();
                $formSvaConstantCurrentRegulation->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formSvaConstantCurrentRegulation->form_id = $detailWorkOrderForm->form_id;
                $formSvaConstantCurrentRegulation->work_order_id = $detailWorkOrderForm->work_order_id;
                $formSvaConstantCurrentRegulation->substation = $tempData['substation'];
                $formSvaConstantCurrentRegulation->peralatan = $tempData['peralatan'];
                $formSvaConstantCurrentRegulation->merk = $tempData['merk'];
                $formSvaConstantCurrentRegulation->tipe = $tempData['tipe'];
                $formSvaConstantCurrentRegulation->kapasitas = $tempData['kapasitas'];
                $formSvaConstantCurrentRegulation->tahun_pemasangan = $tempData['tahun_pemasangan'];
                $formSvaConstantCurrentRegulation->save();
            }
        }
        $data['technicalGroups'] = [];
        $data['userTechnicals'] = [];
        $data['userTechnicals2'] = [];
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
        $data['formSvaConstantCurrentRegulations'] = FormSvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.sva.ccr.index', $data);
    }

    public function formSvaConstantCurrentRegulationUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'running_hours.*' => ['nullable'],
            'suhu_trafo.*' => ['nullable'],
            'ampere' => ['nullable'],
            'step1' => ['nullable'],
            'step2.*' => ['nullable'],
            'step3.*' => ['nullable'],
            'step4.*' => ['nullable'],
            'step5.*' => ['nullable'],
            'cg.*' => ['nullable'],
            'cc.*' => ['nullable'],
            'supply_voltage.*' => ['nullable'],
            'system_remote.*' => ['nullable'],
            'tanggal' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formSvaConstantCurrentRegulations = FormSvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formSvaConstantCurrentRegulations as $key => $formSvaConstantCurrentRegulation) {
                $formSvaConstantCurrentRegulation->running_hours = $validatedData['running_hours'][$key];
                $formSvaConstantCurrentRegulation->ampere = $validatedData['ampere'][$key];
                $formSvaConstantCurrentRegulation->step1 = $validatedData['step1'][$key];
                $formSvaConstantCurrentRegulation->step2 = $validatedData['step2'][$key];
                $formSvaConstantCurrentRegulation->step3 = $validatedData['step3'][$key];
                $formSvaConstantCurrentRegulation->step4 = $validatedData['step4'][$key];
                $formSvaConstantCurrentRegulation->step5 = $validatedData['step5'][$key];
                $formSvaConstantCurrentRegulation->step2 = $validatedData['step2'][$key];
                $formSvaConstantCurrentRegulation->cg = $validatedData['cg'][$key];
                $formSvaConstantCurrentRegulation->cc = $validatedData['cc'][$key];
                $formSvaConstantCurrentRegulation->suhu_trafo = $validatedData['suhu_trafo'][$key];
                $formSvaConstantCurrentRegulation->tanggal = $validatedData['tanggal'];
                $formSvaConstantCurrentRegulation->supply_voltage = $validatedData['supply_voltage'][$key];
                $formSvaConstantCurrentRegulation->system_remote = $validatedData['system_remote'][$key];

                $formSvaConstantCurrentRegulation->save();
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
