<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Helpers\FormNva;
use App\Models\WorkOrder;
use App\Helpers\ActivityLog;
use Illuminate\Http\Request;
use App\Models\AssetMaterial;
use App\Models\FormActivityLog;
use Illuminate\Support\Facades\DB;
use App\Models\DetailWorkOrderForm;
use App\Models\FormNvaHFCPapiHarian;
use Illuminate\Support\Facades\Auth;
use App\Models\FormNvaChecklist1Harian;
use App\Models\FormNvaChecklist2Harian;
use App\Models\FormNvaSuratPemeriksaanRutin;
use App\Models\FormNvaUraianPerbaikanHarian;
use App\Models\FormNvaSuratPerbaikanGangguan;
use App\Models\FormNvaConstantCurrentRegulation;
use App\Models\FormNvaConstantCurrentRegulationDua;
use App\Models\FormNvaSuratIzinPelaksanaanPekerjaan;
use App\Models\UserTechnical;

class FormNvaController extends Controller
{
    public function formNvaChecklist2Harian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Check List 2 NVA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['norts'] = ['PAPI', 'RUNWAY CENTERLINE LIGHT', 'RUNWAY EDGE LIGHT', 'THRESHOLD/END LIGHT', 'APPROACH LIGHT', 'SQUENCE FLASHING LIGHT', 'TAXIWAY EDGE LIGHT', 'HIGH SPEED TAXIWAY (HST)', 'APRON CENTERLINE LIGHT', 'WDI LIGHT', 'RUNWAY GUARD LIGHT', 'STOP BAR LIGHT'];
        $data['nort2s'] = ['PAPI', 'RUNWAY CENTERLINE LIGHT', 'RUNWAY EDGE LIGHT', 'THRESHOLD/END LIGHT', 'APPROACH LIGHT', 'SQUENCE FLASHING LIGHT', 'TAXIWAY EDGE LIGHT', 'HIGH SPEED TAXIWAY (HST)', 'APRON CENTERLINE LIGHT', 'WDI LIGHT', 'RUNWAY GUARD LIGHT', 'STOP BAR LIGHT'];

        if (!FormNvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['norts'] as $key => $nort) {
                $formNvaChecklist2Harian = new FormNvaChecklist2Harian();
                $formNvaChecklist2Harian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formNvaChecklist2Harian->form_id = $detailWorkOrderForm->form_id;
                $formNvaChecklist2Harian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formNvaChecklist2Harian->jenis = 'NORTH RUNWAY II 25 R - 70L';
                $formNvaChecklist2Harian->pertanyaan = $nort;
                $formNvaChecklist2Harian->save();
            }
            foreach ($data['nort2s'] as $key => $nort2) {
                $formNvaChecklist2Harian = new FormNvaChecklist2Harian();
                $formNvaChecklist2Harian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formNvaChecklist2Harian->form_id = $detailWorkOrderForm->form_id;
                $formNvaChecklist2Harian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formNvaChecklist2Harian->jenis = 'NORTH RUNWAY III 24 - 06';
                $formNvaChecklist2Harian->pertanyaan = $nort2;
                $formNvaChecklist2Harian->save();
            }
        }

        $data['formNvaChecklist2Harians'] = FormNvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.nva.checklist2.index', $data);
    }

    public function formNvaChecklist2HarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
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
            $formNvaChecklist2Harians = FormNvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formNvaChecklist2Harians as $key => $formNvaChecklist2Harian) {
                $formNvaChecklist2Harian->tanggal = $validatedData['tanggal'];
                $formNvaChecklist2Harian->jam = $validatedData['jam'];
                $formNvaChecklist2Harian->qfu = $validatedData['qfu'];
                $formNvaChecklist2Harian->hasil = $validatedData['hasil'][$key];
                $formNvaChecklist2Harian->keterangan = $validatedData['keterangan'][$key];

                $formNvaChecklist2Harian->save();
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
    public function formNvaChecklist1Harian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Check List 1 NVA Harian';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['datas'] = FormNva::formNvaChecklist1Harian();
        if ($detailWorkOrderForm->formNvaChecklist1Harians->isEmpty()) {
            try {
                DB::beginTransaction();

                foreach ($data['datas']->listRw as $listRw) {
                    foreach ($data['datas']->rcms as $rcms) {
                        $formNvaChecklist1Harian = new FormNvaChecklist1Harian();
                        $formNvaChecklist1Harian->detail_work_order_form_id = $detailWorkOrderForm->id;
                        $formNvaChecklist1Harian->form_id = $detailWorkOrderForm->form_id;
                        $formNvaChecklist1Harian->work_order_id = $detailWorkOrderForm->work_order_id;
                        $formNvaChecklist1Harian->runway = $listRw['title'];
                        $formNvaChecklist1Harian->peralatan = $rcms['peralatan'];
                        $formNvaChecklist1Harian->save();
                    }
                }

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
                dd($th);
            }
        }

        $data['formNvaChecklist1Harians'] = $detailWorkOrderForm->formNvaChecklist1Harians;
        $data['rw2s'] = $data['formNvaChecklist1Harians']
            ->filter(function ($formNvaChecklist1Harian) {
                return $formNvaChecklist1Harian->runway == 'RUNWAY 07L - 25R';
            })
            ->values();
        $data['rw3s'] = $data['formNvaChecklist1Harians']
            ->filter(function ($formNvaChecklist1Harian) {
                return $formNvaChecklist1Harian->runway == 'RUNWAY 06 - 24';
            })
            ->values();
        $data['userTechnical'] = User::where('id', Auth::user()->id)->first()->username ?? null;
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
        return view('form.nva.checklist1.index', $data);
    }

    public function formNvaChecklist1HarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tanggal' => ['nullable'],
            'jam_pagi' => ['nullable'],
            'runway2_pagi' => ['nullable'],
            'runway3_pagi' => ['nullable'],
            'jam_sore' => ['nullable'],
            'runway2_sore' => ['nullable'],
            'runway3_sore' => ['nullable'],
            'hasil_pagi.*' => ['nullable'],
            'hasil_sore.*' => ['nullable'],
            'oleh' => ['nullable'],
        ]);

        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formNvaChecklist1Harians = FormNvaChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formNvaChecklist1Harians as $key => $formNvaChecklist1Harian) {
                $formNvaChecklist1Harian->tanggal = $validatedData['tanggal'];
                $formNvaChecklist1Harian->jam_pagi = $validatedData['jam_pagi'];
                $formNvaChecklist1Harian->runway2_pagi = $validatedData['runway2_pagi'];
                $formNvaChecklist1Harian->runway3_pagi = $validatedData['runway3_pagi'];
                $formNvaChecklist1Harian->jam_sore = $validatedData['jam_sore'];
                $formNvaChecklist1Harian->runway2_sore = $validatedData['runway2_sore'];
                $formNvaChecklist1Harian->runway3_sore = $validatedData['runway3_sore'];
                $formNvaChecklist1Harian->hasil_pagi = $validatedData['hasil_pagi'][$key];
                $formNvaChecklist1Harian->hasil_sore = $validatedData['hasil_sore'][$key];
                $formNvaChecklist1Harian->oleh = $validatedData['oleh'];

                $formNvaChecklist1Harian->save();
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

    public function formNvaSuratPerbaikanGangguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Surat Perbaikan Gangguan - NVA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $data['formNvaSuratPerbaikanGangguan'] = FormNvaSuratPerbaikanGangguan::firstOrCreate([
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
        return view('form.nva.perbaikan-gangguan.index', $data);
    }

    public function formNvaSuratPerbaikanGangguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
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
            $formNvaSuratPerbaikanGangguan = FormNvaSuratPerbaikanGangguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formNvaSuratPerbaikanGangguan->tanggal = $validatedData['tanggal'];
            $formNvaSuratPerbaikanGangguan->nama_petugas_atc = $validatedData['nama_petugas_atc'];
            $formNvaSuratPerbaikanGangguan->jam_masuk = $validatedData['jam_masuk'];
            $formNvaSuratPerbaikanGangguan->jam_keluar = $validatedData['jam_keluar'];
            $formNvaSuratPerbaikanGangguan->kendaraan = $validatedData['kendaraan'];
            $formNvaSuratPerbaikanGangguan->nomor_polisi = $validatedData['nomor_polisi'];
            $formNvaSuratPerbaikanGangguan->tujuan_keperluan = $validatedData['tujuan_keperluan'];
            $formNvaSuratPerbaikanGangguan->lokasi_pekerjaan = $validatedData['lokasi_pekerjaan'];
            $formNvaSuratPerbaikanGangguan->catatan = $validatedData['catatan'];
            $formNvaSuratPerbaikanGangguan->save();

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
    public function formNvaSuratPemeriksaanRutin(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Surat Pemeriksaan Rutin - NVA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $data['formNvaSuratPemeriksaanRutin'] = FormNvaSuratPemeriksaanRutin::firstOrCreate([
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
        return view('form.nva.pemeriksaan-rutin.index', $data);
    }

    public function formNvaSuratPemeriksaanRutinUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
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
            $formNvaSuratPemeriksaanRutin = FormNvaSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formNvaSuratPemeriksaanRutin->tanggal = $validatedData['tanggal'];
            $formNvaSuratPemeriksaanRutin->nama_petugas_atc = $validatedData['nama_petugas_atc'];
            $formNvaSuratPemeriksaanRutin->jam_masuk = $validatedData['jam_masuk'];
            $formNvaSuratPemeriksaanRutin->jam_keluar = $validatedData['jam_keluar'];
            $formNvaSuratPemeriksaanRutin->kendaraan = $validatedData['kendaraan'];
            $formNvaSuratPemeriksaanRutin->nomor_polisi = $validatedData['nomor_polisi'];
            $formNvaSuratPemeriksaanRutin->tujuan_keperluan = $validatedData['tujuan_keperluan'];
            $formNvaSuratPemeriksaanRutin->lokasi_pekerjaan = $validatedData['lokasi_pekerjaan'];
            $formNvaSuratPemeriksaanRutin->catatan = $validatedData['catatan'];
            $formNvaSuratPemeriksaanRutin->save();

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

    public function formNvaSuratIzinPelaksanaanPekerjaan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Surat Izin Pelaksanaan Pekerjaan - NVA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);
        $data['assetMaterials'] = AssetMaterial::where('asset_id', $data['workOrder']->asset_id)
            ->with(['bom'])
            ->get();
        $data['formNvaSuratIzinPelaksanaanPekerjaan'] = FormNvaSuratIzinPelaksanaanPekerjaan::firstOrCreate([
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
        return view('form.nva.surat-izin-pelaksanaan-pekerjaan.index', $data);
    }

    public function formNvaSuratIzinPelaksanaanPekerjaanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
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
            $formNvaSuratIzinPelaksanaanPekerjaan = FormNvaSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formNvaSuratIzinPelaksanaanPekerjaan->tanggal = $validatedData['tanggal'];
            $formNvaSuratIzinPelaksanaanPekerjaan->nama_petugas_atc = $validatedData['nama_petugas_atc'];
            $formNvaSuratIzinPelaksanaanPekerjaan->jam_masuk = $validatedData['jam_masuk'];
            $formNvaSuratIzinPelaksanaanPekerjaan->jam_keluar = $validatedData['jam_keluar'];
            $formNvaSuratIzinPelaksanaanPekerjaan->kendaraan = $validatedData['kendaraan'];
            $formNvaSuratIzinPelaksanaanPekerjaan->nomor_polisi = $validatedData['nomor_polisi'];
            $formNvaSuratIzinPelaksanaanPekerjaan->tujuan_keperluan = $validatedData['tujuan_keperluan'];
            $formNvaSuratIzinPelaksanaanPekerjaan->lokasi_pekerjaan = $validatedData['lokasi_pekerjaan'];
            $formNvaSuratIzinPelaksanaanPekerjaan->catatan = $validatedData['catatan'];
            $formNvaSuratIzinPelaksanaanPekerjaan->save();

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

    public function formNvaHFCPapiHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form NVA - HASIL FLIGHT CHECK PAPI';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['facility_inspections1'] = ['PAPI 25 RIGHT', 'PAPI 07 LEFT'];
        $data['facility_inspections2'] = ['PAPI 24', 'PAPI 06'];
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        if (!FormNvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($data['facility_inspections1'] as $key => $facility_inspection) {
                for ($i = 0; $i < 3; $i++) {
                    $formNvaHFCPapiHarian = new FormNvaHFCPapiHarian();
                    $formNvaHFCPapiHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formNvaHFCPapiHarian->form_id = $detailWorkOrderForm->form_id;
                    $formNvaHFCPapiHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formNvaHFCPapiHarian->judul = 'RUNWAY 07R - 25L (UTARA)';
                    $formNvaHFCPapiHarian->Fi = $facility_inspection;
                    $formNvaHFCPapiHarian->save();
                }
            }
            foreach ($data['facility_inspections2'] as $key => $facility_inspection) {
                for ($i = 0; $i < 3; $i++) {
                    $formNvaHFCPapiHarian = new FormNvaHFCPapiHarian();
                    $formNvaHFCPapiHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formNvaHFCPapiHarian->form_id = $detailWorkOrderForm->form_id;
                    $formNvaHFCPapiHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formNvaHFCPapiHarian->judul = 'RUNWAY 06 - 24 (UTARA)';
                    $formNvaHFCPapiHarian->Fi = $facility_inspection;
                    $formNvaHFCPapiHarian->save();
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
        $data['formNvaHFCPapiHarians'] = FormNvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.nva.hfc-papi.index', $data);
    }

    public function formNvaHFCPapiHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
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
            $data['formNvaHFCPapiHarians'] = FormNvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formNvaHFCPapiHarians'] as $key => $formNvaHFCPapiHarian) {
                $formNvaHFCPapiHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formNvaHFCPapiHarian->form_id = $detailWorkOrderForm->form_id;
                $formNvaHFCPapiHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formNvaHFCPapiHarian->glide_a_derajat = $validatedData['glide_a_derajat'][$key];
                $formNvaHFCPapiHarian->glide_b_derajat = $validatedData['glide_b_derajat'][$key];
                $formNvaHFCPapiHarian->glide_c_derajat = $validatedData['glide_c_derajat'][$key];
                $formNvaHFCPapiHarian->glide_d_derajat = $validatedData['glide_d_derajat'][$key];
                $formNvaHFCPapiHarian->glide_a_menit = $validatedData['glide_a_menit'][$key];
                $formNvaHFCPapiHarian->glide_b_menit = $validatedData['glide_b_menit'][$key];
                $formNvaHFCPapiHarian->glide_c_menit = $validatedData['glide_c_menit'][$key];
                $formNvaHFCPapiHarian->glide_d_menit = $validatedData['glide_d_menit'][$key];
                $formNvaHFCPapiHarian->ccos = $validatedData['ccos'][$key];
                $formNvaHFCPapiHarian->current_calibration = $validatedData['current_calibration'][$key];
                $formNvaHFCPapiHarian->next_calibration = $validatedData['next_calibration'][$key];
                $formNvaHFCPapiHarian->save();
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

    public function formNvaConstantCurrentRegulation(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Data dan Kondisi Peralatan Constant Current Regulator (CCR) - NVA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempDatas = [
            // sub T8
            ['substation' => 'Substation T8', 'peralatan' => 'Approach Light R1', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'Approach Light R2', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'Approach Light R3', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'Threshold Wingbar', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'Threshold/End', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'Runway Edge', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'Runway Centerline', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'Apron Centerline Terminal 3', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'Apron Edge Terminal 3', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'PAPI 25R', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'East Cross R1', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'East Cross R2', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'CCR Standby 1', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T8', 'peralatan' => 'CCR Standby 2', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],

            // sub T9
            ['substation' => 'Substation T9', 'peralatan' => 'Runway Edge', 'merk' => 'ALSTOM', 'tipe' => 'MCR 400', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2006', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T9', 'peralatan' => 'Taxiway NP1 Timur', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2012', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T9', 'peralatan' => 'Taxiway NP1 Barat', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2008', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T9', 'peralatan' => 'Taxiway NP2 Timur', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2012', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T9', 'peralatan' => 'Taxiway NP2 Barat', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2012', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T9', 'peralatan' => 'Apron Centerline D,E', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2012', 'supply_voltage' => '400 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T9', 'peralatan' => 'Apron Centerline F', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2012', 'supply_voltage' => '400 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T9', 'peralatan' => 'HST N1 - N4', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2008', 'supply_voltage' => '400 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T9', 'peralatan' => 'HST N5 - N9', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T9', 'peralatan' => 'CCR Standby 1', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '25 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T9', 'peralatan' => 'CCR Standby 2', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],

            // sub T10
            ['substation' => 'Substation T10', 'peralatan' => 'Approach Light R1', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2008', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'Approach Light R2', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2008', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'Approach Light R3', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2008', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'Threshold Wingbar', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2012', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'Threshold/End', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2014', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'Runway Edge', 'merk' => 'ALSTOM', 'tipe' => 'MCR 400', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2005', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'PAPI 07L', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2012', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'Taxiway Edge WC1', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'Taxiway Centerline WC1 & 2', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2015', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'Runway Centerline', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '25 KVA/6.6A', 'tahun_pemasangan' => '2009', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'Apron Centerline J1', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '4 KVA/6.6A', 'tahun_pemasangan' => '2017', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'Apron Centerline J2', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '4 KVA/6.6A', 'tahun_pemasangan' => '2017', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'Taxiway Edge Light Apron J1', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '4 KVA/6.6A', 'tahun_pemasangan' => '2017', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'Taxiway Edge Light Apron J2', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '4 KVA/6.6A', 'tahun_pemasangan' => '2017', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'CCR Standby 1', 'merk' => 'ATG', 'tipe' => 'MICRO 100', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2008', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
            ['substation' => 'Substation T10', 'peralatan' => 'CCR Standby 2', 'merk' => 'ADB', 'tipe' => 'MCR 3', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2012', 'supply_voltage' => '380 VDC', 'system_remote' => '48 VDC'],
        ];

        if (!FormNvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempDatas as $key => $tempData) {
                $formNvaConstantCurrentRegulation = new FormNvaConstantCurrentRegulation();
                $formNvaConstantCurrentRegulation->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formNvaConstantCurrentRegulation->form_id = $detailWorkOrderForm->form_id;
                $formNvaConstantCurrentRegulation->work_order_id = $detailWorkOrderForm->work_order_id;
                $formNvaConstantCurrentRegulation->substation = $tempData['substation'];
                $formNvaConstantCurrentRegulation->peralatan = $tempData['peralatan'];
                $formNvaConstantCurrentRegulation->merk = $tempData['merk'];
                $formNvaConstantCurrentRegulation->tipe = $tempData['tipe'];
                $formNvaConstantCurrentRegulation->kapasitas = $tempData['kapasitas'];
                $formNvaConstantCurrentRegulation->tahun_pemasangan = $tempData['tahun_pemasangan'];
                $formNvaConstantCurrentRegulation->supply_voltage = $tempData['supply_voltage'];
                $formNvaConstantCurrentRegulation->system_remote = $tempData['system_remote'];
                $formNvaConstantCurrentRegulation->save();
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
        $data['formNvaConstantCurrentRegulations'] = FormNvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.nva.ccr.index', $data);
    }

    public function formNvaConstantCurrentRegulationUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'running_hours' => ['nullable'],
            'ampere' => ['nullable'],
            'step1' => ['nullable'],
            'step2.*' => ['nullable'],
            'step3.*' => ['nullable'],
            'step4.*' => ['nullable'],
            'step5.*' => ['nullable'],
            'cg.*' => ['nullable'],
            'cc.*' => ['nullable'],
            'tanggal.*' => ['nullable'],
            'suhu.*' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formNvaConstantCurrentRegulations = FormNvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formNvaConstantCurrentRegulations as $key => $formNvaConstantCurrentRegulation) {
                $formNvaConstantCurrentRegulation->running_hours = $validatedData['running_hours'][$key];
                $formNvaConstantCurrentRegulation->ampere = $validatedData['ampere'][$key];
                $formNvaConstantCurrentRegulation->step1 = $validatedData['step1'][$key];
                $formNvaConstantCurrentRegulation->step2 = $validatedData['step2'][$key];
                $formNvaConstantCurrentRegulation->step3 = $validatedData['step3'][$key];
                $formNvaConstantCurrentRegulation->step4 = $validatedData['step4'][$key];
                $formNvaConstantCurrentRegulation->step5 = $validatedData['step5'][$key];
                $formNvaConstantCurrentRegulation->step2 = $validatedData['step2'][$key];
                $formNvaConstantCurrentRegulation->cg = $validatedData['cg'][$key];
                $formNvaConstantCurrentRegulation->cc = $validatedData['cc'][$key];
                $formNvaConstantCurrentRegulation->tanggal = $validatedData['tanggal'][$key];
                $formNvaConstantCurrentRegulation->suhu = $validatedData['suhu'][$key];
                $formNvaConstantCurrentRegulation->save();
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

    public function formNvaConstantCurrentRegulationDua(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form Data dan Kondisi Peralatan Constant Current Regulator (CCR) T11 - T12 - NVA';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $tempDatas = [
            // sub T11
            ['substation' => 'Substation T11', 'peralatan' => 'CCR APPROACH CCT1', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T11', 'peralatan' => 'CCR APPROACH CCT2', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T11', 'peralatan' => 'CCR APPROACH CCT3', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T11', 'peralatan' => 'CCR RUNWAY EDGE CCT1', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T11', 'peralatan' => 'CCR RUNWAY CENTERLINE CCT1', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T11', 'peralatan' => 'CCR PAPI 06 CCT1', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T11', 'peralatan' => 'CCR PAPI 06 CCT2', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T11', 'peralatan' => 'CCR THRESHOLD/END', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T11', 'peralatan' => 'CCR TAXIWAY CENTERLINE CCT1', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T11', 'peralatan' => 'CCR RAPID EXIT M7 - M8', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T11', 'peralatan' => 'CCR TAXIWAY EDGE NP3 CCT1', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T11', 'peralatan' => 'CCR STOPBAR CCT 1 CROSS RW2', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T11', 'peralatan' => 'CCR STOPBAR CCT1 ENTRY M1,M8', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],

            // sub T12
            ['substation' => 'Substation T12', 'peralatan' => 'CCR APPROACH CCT1', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T12', 'peralatan' => 'CCR APPROACH CCT2', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T12', 'peralatan' => 'CCR APPROACH CCT3', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T12', 'peralatan' => 'CCR RUNWAY EDGE CCT2', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T12', 'peralatan' => 'CCR RUNWAY CENTERLINE CCT2', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T12', 'peralatan' => 'CCR PAPI 24 CCT1', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T12', 'peralatan' => 'CCR PAPI 24 CCT2', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T12', 'peralatan' => 'CCR THRESHOLD/END', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T12', 'peralatan' => 'CCR TAXIWAY CENTERLINE CCT2', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T12', 'peralatan' => 'CCR RAPID EXIT M1 - M2', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T12', 'peralatan' => 'CCR TAXIWAY EDGE NP3 CCT2', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '15 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T12', 'peralatan' => 'CCR STOPBAR CCT 2 CROSS RW2', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
            ['substation' => 'Substation T12', 'peralatan' => 'CCR STOPBAR CCT2 ENTRY M1,M8', 'merk' => 'ADB/safetage', 'tipe' => 'IDM 8000', 'kapasitas' => '7.5 KVA/6.6A', 'tahun_pemasangan' => '2018'],
        ];

        if (!FormNvaConstantCurrentRegulationDua::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($tempDatas as $key => $tempData) {
                $formNvaConstantCurrentRegulationDua = new FormNvaConstantCurrentRegulationDua();
                $formNvaConstantCurrentRegulationDua->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formNvaConstantCurrentRegulationDua->form_id = $detailWorkOrderForm->form_id;
                $formNvaConstantCurrentRegulationDua->work_order_id = $detailWorkOrderForm->work_order_id;
                $formNvaConstantCurrentRegulationDua->substation = $tempData['substation'];
                $formNvaConstantCurrentRegulationDua->peralatan = $tempData['peralatan'];
                $formNvaConstantCurrentRegulationDua->merk = $tempData['merk'];
                $formNvaConstantCurrentRegulationDua->tipe = $tempData['tipe'];
                $formNvaConstantCurrentRegulationDua->kapasitas = $tempData['kapasitas'];
                $formNvaConstantCurrentRegulationDua->tahun_pemasangan = $tempData['tahun_pemasangan'];
                $formNvaConstantCurrentRegulationDua->save();
            }
        }
        $data['formNvaConstantCurrentRegulationDuas'] = FormNvaConstantCurrentRegulationDua::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.nva.ccrdua.index', $data);
    }

    public function formNvaConstantCurrentRegulationDuaUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'running_hours' => ['nullable'],
            'ampere' => ['nullable'],
            'step1' => ['nullable'],
            'step2.*' => ['nullable'],
            'step3.*' => ['nullable'],
            'step4.*' => ['nullable'],
            'step5.*' => ['nullable'],
            'cg.*' => ['nullable'],
            'cc.*' => ['nullable'],
            'tanggal.*' => ['nullable'],
            'supply_voltage.*' => ['nullable'],
            'system_remote.*' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formNvaConstantCurrentRegulationDuas = FormNvaConstantCurrentRegulationDua::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($formNvaConstantCurrentRegulationDuas as $key => $formNvaConstantCurrentRegulationDua) {
                $formNvaConstantCurrentRegulationDua->running_hours = $validatedData['running_hours'][$key];
                $formNvaConstantCurrentRegulationDua->ampere = $validatedData['ampere'][$key];
                $formNvaConstantCurrentRegulationDua->step1 = $validatedData['step1'][$key];
                $formNvaConstantCurrentRegulationDua->step2 = $validatedData['step2'][$key];
                $formNvaConstantCurrentRegulationDua->step3 = $validatedData['step3'][$key];
                $formNvaConstantCurrentRegulationDua->step4 = $validatedData['step4'][$key];
                $formNvaConstantCurrentRegulationDua->step5 = $validatedData['step5'][$key];
                $formNvaConstantCurrentRegulationDua->step2 = $validatedData['step2'][$key];
                $formNvaConstantCurrentRegulationDua->cg = $validatedData['cg'][$key];
                $formNvaConstantCurrentRegulationDua->cc = $validatedData['cc'][$key];
                $formNvaConstantCurrentRegulationDua->tanggal = $validatedData['tanggal'][$key];
                $formNvaConstantCurrentRegulationDua->supply_voltage = $validatedData['supply_voltage'][$key];
                $formNvaConstantCurrentRegulationDua->system_remote = $validatedData['system_remote'][$key];
                $formNvaConstantCurrentRegulationDua->save();
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

    public function formNvaUraianPerbaikanHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'Form NVA - URAIAN PERBAIKAN';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        if (!FormNvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formNvaUraianPerbaikanHarian = new FormNvaUraianPerbaikanHarian();
            $formNvaUraianPerbaikanHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formNvaUraianPerbaikanHarian->form_id = $detailWorkOrderForm->form_id;
            $formNvaUraianPerbaikanHarian->work_order_id = $detailWorkOrderForm->work_order_id;
            $formNvaUraianPerbaikanHarian->save();
        }

        $data['formNvaUraianPerbaikanHarians'] = FormNvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();
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
        return view('form.nva.uraian.index', $data);
    }

    public function formNvaUraianPerbaikanHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $userTechnical = User::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $data['formNvaUraianPerbaikanHarians'] = FormNvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            foreach ($data['formNvaUraianPerbaikanHarians'] as $key => $formNvaUraianPerbaikanHarian) {
                $formNvaUraianPerbaikanHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formNvaUraianPerbaikanHarian->form_id = $detailWorkOrderForm->form_id;
                $formNvaUraianPerbaikanHarian->work_order_id = $detailWorkOrderForm->work_order_id;

                $formNvaUraianPerbaikanHarian->save();
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
