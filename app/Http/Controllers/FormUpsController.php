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
use Illuminate\Support\Facades\Crypt;
use App\Models\FormUpsDataUkurLoadBeban;
use App\Models\FormUpsLaporanHasilKerja;
use App\Models\FormUpsLaporanHasilKerjaMalam;
use App\Models\FormUpsDokumentasiKegiatanRutin;
use App\Models\FormUpsPengukuranTeganganBattery;
use App\Models\FormUpsLaporanKerusakanDanPerbaikan;
use App\Models\FormUpsPengukuranPeralatanDuaMingguan;
use App\Models\FormUpsPengukuranPeralatanEnamBulanan;
use App\Models\UserTechnical;

class FormUpsController extends Controller
{
    public function formUpsPengukuranPeralatanEnamBulanan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM PENGUKURAN PERALATAN ENAM BULANAN - UPS & CONVERTER';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['formUpsPengukuranPeralatanEnamBulanans'] = FormUpsPengukuranPeralatanEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.ups.pengukuran-peralatan-enam-bulanan.index', $data);
    }

    public function formUpsPengukuranPeralatanEnamBulananUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tanggal.*' => ['nullable'],
            'shift.*' => ['nullable'],
            'nama_gardu.*' => ['nullable'],
            'merk_ups.*' => ['nullable'],
            'input_v_l1_n.*' => ['nullable'],
            'input_v_l2_n.*' => ['nullable'],
            'input_v_l3_n.*' => ['nullable'],
            'input_i_l1.*' => ['nullable'],
            'input_i_l2.*' => ['nullable'],
            'input_i_l3.*' => ['nullable'],
            'freq_input.*' => ['nullable'],
            'teg_floating.*' => ['nullable'],
            'teg_rata2_percell.*' => ['nullable'],
            'teg_tot_batt.*' => ['nullable'],
            'teg_otonomi.*' => ['nullable'],
            'arus_discharge.*' => ['nullable'],
            'arus_bhoscarge.*' => ['nullable'],
            'output_v_l1_n.*' => ['nullable'],
            'output_v_l2_n.*' => ['nullable'],
            'output_v_l3_n.*' => ['nullable'],
            'v_l1.*' => ['nullable'],
            'v_l2.*' => ['nullable'],
            'v_l3.*' => ['nullable'],
            'output_i_l1.*' => ['nullable'],
            'output_i_l2.*' => ['nullable'],
            'output_i_l3.*' => ['nullable'],
            'load_persen.*' => ['nullable'],
            'load_perphase.*' => ['nullable'],
            'total_load.*' => ['nullable'],
            'freq_output.*' => ['nullable'],
            'temp_ruang.*' => ['nullable'],
            'temp_unit.*' => ['nullable'],
            'temp_battery.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formUpsPengukuranPeralatanEnamBulanans = FormUpsPengukuranPeralatanEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            $formUpsPengukuranPeralatanEnamBulanans->each->delete();

            foreach ($validatedData['nama_gardu'] as $key => $value) {
                $formUpsPengukuranPeralatanEnamBulanan = new FormUpsPengukuranPeralatanEnamBulanan();
                $formUpsPengukuranPeralatanEnamBulanan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formUpsPengukuranPeralatanEnamBulanan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formUpsPengukuranPeralatanEnamBulanan->form_id = $detailWorkOrderForm->form_id;
                $formUpsPengukuranPeralatanEnamBulanan->tanggal = now();
                $formUpsPengukuranPeralatanEnamBulanan->shift = $validatedData['shift'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->nama_gardu = $validatedData['nama_gardu'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->merk_ups = $validatedData['merk_ups'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->input_v_l1_n = $validatedData['input_v_l1_n'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->input_v_l2_n = $validatedData['input_v_l2_n'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->input_v_l3_n = $validatedData['input_v_l3_n'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->input_i_l1 = $validatedData['input_i_l1'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->input_i_l2 = $validatedData['input_i_l2'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->input_i_l3 = $validatedData['input_i_l3'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->freq_input = $validatedData['freq_input'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->teg_floating = $validatedData['teg_floating'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->teg_rata2_percell = $validatedData['teg_rata2_percell'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->teg_tot_batt = $validatedData['teg_tot_batt'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->teg_otonomi = $validatedData['teg_otonomi'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->arus_discharge = $validatedData['arus_discharge'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->arus_bhoscarge = $validatedData['arus_bhoscarge'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->output_v_l1_n = $validatedData['output_v_l1_n'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->output_v_l2_n = $validatedData['output_v_l2_n'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->output_v_l3_n = $validatedData['output_v_l3_n'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->v_l1 = $validatedData['v_l1'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->v_l2 = $validatedData['v_l2'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->v_l3 = $validatedData['v_l3'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->output_i_l1 = $validatedData['output_i_l1'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->output_i_l2 = $validatedData['output_i_l2'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->output_i_l3 = $validatedData['output_i_l3'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->load_persen = $validatedData['load_persen'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->load_perphase = $validatedData['load_perphase'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->total_load = $validatedData['total_load'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->freq_output = $validatedData['freq_output'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->temp_ruang = $validatedData['temp_ruang'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->temp_unit = $validatedData['temp_unit'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->temp_battery = $validatedData['temp_battery'][$key];
                $formUpsPengukuranPeralatanEnamBulanan->catatan = $validatedData['catatan'];
                $formUpsPengukuranPeralatanEnamBulanan->save();
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

    public function formUpsPengukuranPeralatanDuaMingguan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM PENGUKURAN PERALATAN DUA MINGGUAN - UPS & CONVERTER';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['formUpsPengukuranPeralatanDuaMingguans'] = FormUpsPengukuranPeralatanDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.ups.pengukuran-peraltan-dua-mingguan.index', $data);
    }

    public function formUpsPengukuranPeralatanDuaMingguanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tanggal.*' => ['nullable'],
            'shift.*' => ['nullable'],
            'nama_gardu.*' => ['nullable'],
            'merk_ups.*' => ['nullable'],
            'input_v_l1_n.*' => ['nullable'],
            'input_v_l2_n.*' => ['nullable'],
            'input_v_l3_n.*' => ['nullable'],
            'input_i_l1.*' => ['nullable'],
            'input_i_l2.*' => ['nullable'],
            'input_i_l3.*' => ['nullable'],
            'freq_input.*' => ['nullable'],
            'teg_floating.*' => ['nullable'],
            'teg_rata2_percell.*' => ['nullable'],
            'teg_tot_batt.*' => ['nullable'],
            'teg_otonomi.*' => ['nullable'],
            'arus_discharge.*' => ['nullable'],
            'arus_bhoscarge.*' => ['nullable'],
            'output_v_l1_n.*' => ['nullable'],
            'output_v_l2_n.*' => ['nullable'],
            'output_v_l3_n.*' => ['nullable'],
            'v_l1.*' => ['nullable'],
            'v_l2.*' => ['nullable'],
            'v_l3.*' => ['nullable'],
            'output_i_l1.*' => ['nullable'],
            'output_i_l2.*' => ['nullable'],
            'output_i_l3.*' => ['nullable'],
            'load_persen.*' => ['nullable'],
            'load_perphase.*' => ['nullable'],
            'total_load.*' => ['nullable'],
            'freq_output.*' => ['nullable'],
            'temp_ruang.*' => ['nullable'],
            'temp_unit.*' => ['nullable'],
            'temp_battery.*' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formUpsPengukuranPeralatanDuaMingguans = FormUpsPengukuranPeralatanDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            $formUpsPengukuranPeralatanDuaMingguans->each->delete();

            foreach ($validatedData['nama_gardu'] as $key => $value) {
                $formUpsPengukuranPeralatanDuaMingguan = new FormUpsPengukuranPeralatanDuaMingguan();
                $formUpsPengukuranPeralatanDuaMingguan->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formUpsPengukuranPeralatanDuaMingguan->work_order_id = $detailWorkOrderForm->work_order_id;
                $formUpsPengukuranPeralatanDuaMingguan->form_id = $detailWorkOrderForm->form_id;
                $formUpsPengukuranPeralatanDuaMingguan->tanggal = now();
                $formUpsPengukuranPeralatanDuaMingguan->shift = $validatedData['shift'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->nama_gardu = $validatedData['nama_gardu'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->merk_ups = $validatedData['merk_ups'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->input_v_l1_n = $validatedData['input_v_l1_n'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->input_v_l2_n = $validatedData['input_v_l2_n'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->input_v_l3_n = $validatedData['input_v_l3_n'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->input_i_l1 = $validatedData['input_i_l1'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->input_i_l2 = $validatedData['input_i_l2'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->input_i_l3 = $validatedData['input_i_l3'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->freq_input = $validatedData['freq_input'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->teg_floating = $validatedData['teg_floating'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->teg_rata2_percell = $validatedData['teg_rata2_percell'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->teg_tot_batt = $validatedData['teg_tot_batt'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->teg_otonomi = $validatedData['teg_otonomi'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->arus_discharge = $validatedData['arus_discharge'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->arus_bhoscarge = $validatedData['arus_bhoscarge'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->output_v_l1_n = $validatedData['output_v_l1_n'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->output_v_l2_n = $validatedData['output_v_l2_n'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->output_v_l3_n = $validatedData['output_v_l3_n'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->v_l1 = $validatedData['v_l1'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->v_l2 = $validatedData['v_l2'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->v_l3 = $validatedData['v_l3'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->output_i_l1 = $validatedData['output_i_l1'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->output_i_l2 = $validatedData['output_i_l2'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->output_i_l3 = $validatedData['output_i_l3'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->load_persen = $validatedData['load_persen'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->load_perphase = $validatedData['load_perphase'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->total_load = $validatedData['total_load'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->freq_output = $validatedData['freq_output'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->temp_ruang = $validatedData['temp_ruang'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->temp_unit = $validatedData['temp_unit'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->temp_battery = $validatedData['temp_battery'][$key];
                $formUpsPengukuranPeralatanDuaMingguan->catatan = $validatedData['catatan'];
                $formUpsPengukuranPeralatanDuaMingguan->save();
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

    public function formUpsDokumentasiKegiatanRutin(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM DOKUMENTASI KEGIATAN RUTIN - UPS & CONVERTER';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        if (!FormUpsDokumentasiKegiatanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            $formUpsDokumentasiKegiatanRutin = new FormUpsDokumentasiKegiatanRutin();
            $formUpsDokumentasiKegiatanRutin->detail_work_order_form_id = $detailWorkOrderForm->id;
            $formUpsDokumentasiKegiatanRutin->form_id = $detailWorkOrderForm->form_id;
            $formUpsDokumentasiKegiatanRutin->work_order_id = $detailWorkOrderForm->work_order_id;
            $formUpsDokumentasiKegiatanRutin->save();
        }

        $data['formUpsDokumentasiKegiatanRutins'] = FormUpsDokumentasiKegiatanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)->get();

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
        return view('form.ups.dokumentasi-kegiatan-rutin.index', $data);
    }

    public function formUpsDokumentasiKegiatanRutinUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $request->validate([
            'image_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'image_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'image_3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'image_4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $validatedData = $request->validate([
            'nama_peralatan.*' => ['nullable'],
            'jenis_kegiatan.*' => ['nullable'],
        ]);

        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formUpsDokumentasiKegiatanRutins = FormUpsDokumentasiKegiatanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            $formUpsDokumentasiKegiatanRutins->each->delete();

            foreach ($validatedData['nama_peralatan'] as $key => $value) {
                $formUpsDokumentasiKegiatanRutin = new FormUpsDokumentasiKegiatanRutin();
                $formUpsDokumentasiKegiatanRutin->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formUpsDokumentasiKegiatanRutin->work_order_id = $detailWorkOrderForm->work_order_id;
                $formUpsDokumentasiKegiatanRutin->form_id = $detailWorkOrderForm->form_id;
                $formUpsDokumentasiKegiatanRutin->nama_peralatan = $validatedData['nama_peralatan'][$key];
                $formUpsDokumentasiKegiatanRutin->jenis_kegiatan = $validatedData['jenis_kegiatan'][$key];
                $formUpsDokumentasiKegiatanRutin->image_1 = $request->file('image_1')->storeAs('image-ups', Crypt::encryptString($request->file('image_1')->getClientOriginalName()));
                $formUpsDokumentasiKegiatanRutin->image_2 = $request->file('image_2')->storeAs('image-ups', Crypt::encryptString($request->file('image_2')->getClientOriginalName()));
                $formUpsDokumentasiKegiatanRutin->image_3 = $request->file('image_3')->storeAs('image-ups', Crypt::encryptString($request->file('image_3')->getClientOriginalName()));
                $formUpsDokumentasiKegiatanRutin->image_4 = $request->file('image_4')->storeAs('image-ups', Crypt::encryptString($request->file('image_4')->getClientOriginalName()));
                $formUpsDokumentasiKegiatanRutin->save();
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
    public function formUpsLaporanKerusakanDanPerbaikan(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'LAPORAN KERUSAKAN DAN PERBAIKAN - UPS';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);
        $data['assetMaterials'] = AssetMaterial::where('asset_id', $data['workOrder']->asset_id)
            ->with(['bom'])
            ->get();
        $data['formUpsLaporanKerusakanDanPerbaikan'] = FormUpsLaporanKerusakanDanPerbaikan::firstOrCreate([
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
        return view('form.ups.laporan-kerusakan-dan-perbaikan.index', $data);
    }

    public function formUpsLaporanKerusakanDanPerbaikanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'tanggal' => ['nullable'],
            'lokasi_pekerjaan' => ['nullable'],
            'fasilitas' => ['nullable'],
            'bagian_peralatan' => ['nullable'],
            'kategori_kerusakan' => ['nullable'],
            'uraian' => ['nullable'],
            'tindakan' => ['nullable'],
            'penyebab' => ['nullable'],
            'tanggal_kerusakan' => ['nullable'],
            'tanggal_perbaikan' => ['nullable'],
            'jumlah_jam' => ['nullable'],
            'kode_hambatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formUpsLaporanKerusakanDanPerbaikan = FormUpsLaporanKerusakanDanPerbaikan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formUpsLaporanKerusakanDanPerbaikan->tanggal = $validatedData['tanggal'];
            $formUpsLaporanKerusakanDanPerbaikan->lokasi_pekerjaan = $validatedData['lokasi_pekerjaan'];
            $formUpsLaporanKerusakanDanPerbaikan->fasilitas = $validatedData['fasilitas'];
            $formUpsLaporanKerusakanDanPerbaikan->bagian_peralatan = $validatedData['bagian_peralatan'];
            $formUpsLaporanKerusakanDanPerbaikan->kategori_kerusakan = $validatedData['kategori_kerusakan'];
            $formUpsLaporanKerusakanDanPerbaikan->uraian = $validatedData['uraian'];
            $formUpsLaporanKerusakanDanPerbaikan->tindakan = $validatedData['tindakan'];
            $formUpsLaporanKerusakanDanPerbaikan->penyebab = $validatedData['penyebab'];
            $formUpsLaporanKerusakanDanPerbaikan->tanggal_kerusakan = $validatedData['tanggal_kerusakan'];
            $formUpsLaporanKerusakanDanPerbaikan->tanggal_perbaikan = $validatedData['tanggal_perbaikan'];
            $formUpsLaporanKerusakanDanPerbaikan->jumlah_jam = $validatedData['jumlah_jam'];
            $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan = $validatedData['kode_hambatan'];
            $formUpsLaporanKerusakanDanPerbaikan->save();

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
    public function formUpsDataUkurLoadBeban(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM DATA PENGUKURAN LOAD BEBAN - UPS & CONVERTER';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['formUpsDataUkurLoadBebans'] = FormUpsDataUkurLoadBeban::where('detail_work_order_form_id', $detailWorkOrderForm->id)
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
        return view('form.ups.data-ukur-load-beban.index', $data);
    }

    public function formUpsDataUkurLoadBebanUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'kapasitas.*' => ['nullable'],
            'distribusi.*' => ['nullable'],
            'r.*' => ['nullable'],
            's.*' => ['nullable'],
            't.*' => ['nullable'],
            'n.*' => ['nullable'],
            'besaran.*' => ['nullable'],
            'pengukuran.*' => ['nullable'],
            'satuan.*' => ['nullable'],
            'catatan' => ['nullable'],
            'dokumentasi' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'dokumentasi2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formUpsDataUkurLoadBebans = FormUpsDataUkurLoadBeban::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            $formUpsDataUkurLoadBebans->each->delete();

            foreach ($validatedData['kapasitas'] as $key => $value) {
                $formUpsDataUkurLoadBeban = new FormUpsDataUkurLoadBeban();
                $formUpsDataUkurLoadBeban->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formUpsDataUkurLoadBeban->work_order_id = $detailWorkOrderForm->work_order_id;
                $formUpsDataUkurLoadBeban->form_id = $detailWorkOrderForm->form_id;
                $formUpsDataUkurLoadBeban->kapasitas = $validatedData['kapasitas'][$key];
                $formUpsDataUkurLoadBeban->distribusi = $validatedData['distribusi'][$key];
                $formUpsDataUkurLoadBeban->r = $validatedData['r'][$key];
                $formUpsDataUkurLoadBeban->s = $validatedData['s'][$key];
                $formUpsDataUkurLoadBeban->t = $validatedData['t'][$key];
                $formUpsDataUkurLoadBeban->n = $validatedData['n'][$key];
                $formUpsDataUkurLoadBeban->besaran = $validatedData['besaran'][$key];
                $formUpsDataUkurLoadBeban->pengukuran = $validatedData['pengukuran'][$key];
                $formUpsDataUkurLoadBeban->satuan = $validatedData['satuan'][$key];
                if ($key == 0) {
                    $formUpsDataUkurLoadBeban->dokumentasi = $request->file('dokumentasi')->storeAs('public/dokumentasiLoad-ups', Crypt::encryptString($request->file('dokumentasi')->getClientOriginalName()));
                    $formUpsDataUkurLoadBeban->dokumentasi2 = $request->file('dokumentasi2')->storeAs('public/dokumentasiLoad-ups', Crypt::encryptString($request->file('dokumentasi2')->getClientOriginalName()));
                }
                $formUpsDataUkurLoadBeban->catatan = $validatedData['catatan'];
                $formUpsDataUkurLoadBeban->save();
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
    public function formUpsPengukuranTeganganBattery(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'FORM CHEKLIST PENGUKURAN TEGANGAN BATTERY BANK - UPS & CONVERTER';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;

        $data['formUpsPengukuranTeganganBatterys'] = FormUpsPengukuranTeganganBattery::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();

            
        $data['bank_1'] = $data['formUpsPengukuranTeganganBatterys']
        ->filter(function ($workOrder) {
            return $workOrder->nama_bank == 'BANK 1';
        })
        ->values();
    $data['bank_2'] = $data['formUpsPengukuranTeganganBatterys']
        ->filter(function ($workOrder) {
            return $workOrder->nama_bank == 'BANK 2';
        })
        ->values();
    $data['bank_3'] = $data['formUpsPengukuranTeganganBatterys']
        ->filter(function ($workOrder) {
            return $workOrder->nama_bank == 'BANK 3';
        })
        ->values();
    $data['bank_4'] = $data['formUpsPengukuranTeganganBatterys']
        ->filter(function ($workOrder) {
            return $workOrder->nama_bank == 'BANK 4';
        })
        ->values();

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
        return view('form.ups.pengukuran-tegangan-battery.index', $data);
    }

    public function formUpsPengukuranTeganganBatteryUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'nama_bank.*' => ['nullable'],
            'hasil_bank_1.*' => ['nullable'],
            'hasil_bank_2.*' => ['nullable'],
            'hasil_bank_3.*' => ['nullable'],
            'hasil_bank_4.*' => ['nullable'],
            'dokumentasi1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'dokumentasi2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'dokumentasi3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'dokumentasi4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'catatan' => ['nullable'],
        ]);
        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            DB::beginTransaction();
            $formUpsPengukuranTeganganBatterys = FormUpsPengukuranTeganganBattery::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            $formUpsPengukuranTeganganBatterys->each->delete();

            if (!empty($validatedData['hasil_bank_1'])) {
                foreach ($validatedData['hasil_bank_1'] as $key => $value) {
                    $formUpsPengukuranTeganganBattery = new FormUpsPengukuranTeganganBattery();
                    $formUpsPengukuranTeganganBattery->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formUpsPengukuranTeganganBattery->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formUpsPengukuranTeganganBattery->form_id = $detailWorkOrderForm->form_id;
                    $formUpsPengukuranTeganganBattery->nama_bank = 'BANK 1';
                    $formUpsPengukuranTeganganBattery->hasil = $value;
                    // if ( $key == 0){
                    // $formUpsPengukuranTeganganBattery->dokumentasi1 = $request->file('dokumentasi1')->storeAs('public/dokumentasibatt-ups', Crypt::encryptString($request->file('dokumentasi1')->getClientOriginalName()));
                    // $formUpsPengukuranTeganganBattery->dokumentasi2 = $request->file('dokumentasi2')->storeAs('public/dokumentasibatt-ups', Crypt::encryptString($request->file('dokumentasi2')->getClientOriginalName()));
                    // $formUpsPengukuranTeganganBattery->dokumentasi3 = $request->file('dokumentasi3')->storeAs('public/dokumentasibatt-ups', Crypt::encryptString($request->file('dokumentasi3')->getClientOriginalName()));
                    // $formUpsPengukuranTeganganBattery->dokumentasi4 = $request->file('dokumentasi4')->storeAs('public/dokumentasibatt-ups', Crypt::encryptString($request->file('dokumentasi4')->getClientOriginalName()));
                    // }
                    $formUpsPengukuranTeganganBattery->catatan = $validatedData['catatan'];
                    $formUpsPengukuranTeganganBattery->save();
                }
            }

            if (!empty($validatedData['hasil_bank_2'])) {
                foreach ($validatedData['hasil_bank_2'] as $key => $value) {
                    $formUpsPengukuranTeganganBattery = new FormUpsPengukuranTeganganBattery();
                    $formUpsPengukuranTeganganBattery->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formUpsPengukuranTeganganBattery->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formUpsPengukuranTeganganBattery->form_id = $detailWorkOrderForm->form_id;
                    $formUpsPengukuranTeganganBattery->nama_bank = 'BANK 2';
                    $formUpsPengukuranTeganganBattery->hasil = $value;
                    $formUpsPengukuranTeganganBattery->catatan = $validatedData['catatan'];
                    $formUpsPengukuranTeganganBattery->save();
                }
            }

            if (!empty($validatedData['hasil_bank_3'])) {
                foreach ($validatedData['hasil_bank_3'] as $key => $value) {
                    $formUpsPengukuranTeganganBattery = new FormUpsPengukuranTeganganBattery();
                    $formUpsPengukuranTeganganBattery->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formUpsPengukuranTeganganBattery->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formUpsPengukuranTeganganBattery->form_id = $detailWorkOrderForm->form_id;
                    $formUpsPengukuranTeganganBattery->nama_bank = 'BANK 3';
                    $formUpsPengukuranTeganganBattery->hasil = $value;
                    $formUpsPengukuranTeganganBattery->catatan = $validatedData['catatan'];
                    $formUpsPengukuranTeganganBattery->save();
                }
            }

            if (!empty($validatedData['hasil_bank_4'])) {
                foreach ($validatedData['hasil_bank_4'] as $key => $value) {
                    $formUpsPengukuranTeganganBattery = new FormUpsPengukuranTeganganBattery();
                    $formUpsPengukuranTeganganBattery->detail_work_order_form_id = $detailWorkOrderForm->id;
                    $formUpsPengukuranTeganganBattery->work_order_id = $detailWorkOrderForm->work_order_id;
                    $formUpsPengukuranTeganganBattery->form_id = $detailWorkOrderForm->form_id;
                    $formUpsPengukuranTeganganBattery->nama_bank = 'BANK 4';
                    $formUpsPengukuranTeganganBattery->hasil = $value;
                    $formUpsPengukuranTeganganBattery->catatan = $validatedData['catatan'];
                    $formUpsPengukuranTeganganBattery->save();
                }
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
    public function formUpsLaporanHasilKerja(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'LAPORAN HASIL KERJA OPERASIONAL PAGI SIANG - UPS';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $data['formUpsLaporanHasilKerja'] = FormUpsLaporanHasilKerja::firstOrCreate([
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
        return view('form.ups.laporan-hasil-kerja.index', $data);
    }

    public function formUpsLaporanHasilKerjaUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'koordinasi' => ['nullable'],
            'hasil_visual' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formUpsLaporanHasilKerja = FormUpsLaporanHasilKerja::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formUpsLaporanHasilKerja->koordinasi = $validatedData['koordinasi'];
            $formUpsLaporanHasilKerja->hasil_visual = $validatedData['hasil_visual'];
            $formUpsLaporanHasilKerja->toolkit = $request->get('toolkit') ?? false;
            $formUpsLaporanHasilKerja->avometer = $request->get('avometer') ?? false;
            $formUpsLaporanHasilKerja->kendaraan = $request->get('kendaraan') ?? false;
            $formUpsLaporanHasilKerja->apd = $request->get('apd') ?? false;
            $formUpsLaporanHasilKerja->reytex = $request->get('reytex') ?? false;
            $formUpsLaporanHasilKerja->alat_cleaning = $request->get('alat_cleaning') ?? false;
            $formUpsLaporanHasilKerja->pengukuran = $request->get('pengukuran') ?? false;
            $formUpsLaporanHasilKerja->temperatur = $request->get('temperatur') ?? false;
            $formUpsLaporanHasilKerja->membersihkan = $request->get('membersihkan') ?? false;
            $formUpsLaporanHasilKerja->dokumentasi = $request->get('dokumentasi') ?? false;
            $formUpsLaporanHasilKerja->serahterima = $request->get('serahterima') ?? false;
            $formUpsLaporanHasilKerja->catatan = $validatedData['catatan'];
            $formUpsLaporanHasilKerja->save();

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

    public function formUpsLaporanHasilKerjaMalam(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'LAPORAN HASIL KERJA OPERASIONAL MALAM - UPS';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $data['workOrder'] = WorkOrder::findOrFail($detailWorkOrderForm->work_order_id);

        $data['formUpsLaporanHasilKerjaMalam'] = FormUpsLaporanHasilKerjaMalam::firstOrCreate([
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
        return view('form.ups.laporan-hasil-kerja-malam.index', $data);
    }

    public function formUpsLaporanHasilKerjaMalamUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'koordinasi' => ['nullable'],
            'hasil_visual' => ['nullable'],
            'catatan' => ['nullable'],
        ]);
        DB::beginTransaction();
        $userTechnical = UserTechnical::where('id', Auth::user()->id)->first()->username ?? false;
        try {
            $formUpsLaporanHasilKerjaMalam = FormUpsLaporanHasilKerjaMalam::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first();
            $formUpsLaporanHasilKerjaMalam->koordinasi = $validatedData['koordinasi'];
            $formUpsLaporanHasilKerjaMalam->hasil_visual = $validatedData['hasil_visual'];
            $formUpsLaporanHasilKerjaMalam->toolkit = $request->get('toolkit') ?? false;
            $formUpsLaporanHasilKerjaMalam->avometer = $request->get('avometer') ?? false;
            $formUpsLaporanHasilKerjaMalam->kendaraan = $request->get('kendaraan') ?? false;
            $formUpsLaporanHasilKerjaMalam->apd = $request->get('apd') ?? false;
            $formUpsLaporanHasilKerjaMalam->reytex = $request->get('reytex') ?? false;
            $formUpsLaporanHasilKerjaMalam->alat_cleaning = $request->get('alat_cleaning') ?? false;
            $formUpsLaporanHasilKerjaMalam->pengukuran = $request->get('pengukuran') ?? false;
            $formUpsLaporanHasilKerjaMalam->temperatur = $request->get('temperatur') ?? false;
            $formUpsLaporanHasilKerjaMalam->membersihkan = $request->get('membersihkan') ?? false;
            $formUpsLaporanHasilKerjaMalam->dokumentasi = $request->get('dokumentasi') ?? false;
            $formUpsLaporanHasilKerjaMalam->serahterima = $request->get('serahterima') ?? false;
            $formUpsLaporanHasilKerjaMalam->catatan = $validatedData['catatan'];
            $formUpsLaporanHasilKerjaMalam->save();

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
