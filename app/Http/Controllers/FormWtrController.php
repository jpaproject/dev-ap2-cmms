<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLog;
use Illuminate\Http\Request;
use App\Models\FormActivityLog;
use App\Models\DetailWorkOrderForm;
use App\Models\FormWtrPeralatanHarian;

class FormWtrController extends Controller
{
    public function formWtrLaporanHarian(DetailWorkOrderForm $detailWorkOrderForm)
    {
        $data['page_title'] = 'LAPORAN KERUSAKAN UNIT ELECTRICAL PROTECTION';
        $data['detailWorkOrderForm'] = $detailWorkOrderForm;
        $peralatans = [
            'DRINKING WATER',
            'HYDRANT SYSTEM',
            'INSTALASI PIPA',
            'INSTRUMENT
        PENGUKURAN',
            'MOTOR POMPA',
            'TANGKI',
            'LAIN-LAIN',
        ];
        if (!FormWtrPeralatanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            foreach ($peralatans as $peralatan) {
                $formWtrLaporanHarian = new FormWtrPeralatanHarian();
                $formWtrLaporanHarian->detail_work_order_form_id = $detailWorkOrderForm->id;
                $formWtrLaporanHarian->form_id = $detailWorkOrderForm->form_id;
                $formWtrLaporanHarian->work_order_id = $detailWorkOrderForm->work_order_id;
                $formWtrLaporanHarian->peralatan = $peralatan;
                $formWtrLaporanHarian->save();
            }
        }
        $data['formWtrLaporanHarians'] = $detailWorkOrderForm->formWtrPeralatanHarians;

        if (
            !FormActivityLog::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->where('form_id', $detailWorkOrderForm->form_id)
                ->where('status', 'start')
                ->first()
        ) {
            //Form Log Activity
            ActivityLog::startLog($detailWorkOrderForm);
        }

        return view('form.wtr.laporan-harian-pagi.index', $data);
    }

    public function formWtrLaporanHarianUpdate(Request $request, DetailWorkOrderForm $detailWorkOrderForm)
    {
        $validatedData = $request->validate([
            'jumlah_alat_running.*' => ['nullable'],
            'jumlah_alat_standby.*' => ['nullable'],
            'jumlah_alat_off.*' => ['nullable'],
            'jumlah_alat_total.*' => ['nullable'],
            'satuan.*' => ['nullable'],
            'tingkat_service_ability.*' => ['nullable'],
            'peforma.*' => ['nullable'],
            'catatan.*' => ['nullable'],
        ]);
        $formWtrPeralatanHarians = FormWtrPeralatanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
            ->orderBy('id', 'asc')
            ->get();
        foreach ($formWtrPeralatanHarians as $key => $formWtrPeralatanHarian) {
            $formWtrPeralatanHarian->jumlah_alat_running = $validatedData['jumlah_alat_running'][$key];
            $formWtrPeralatanHarian->jumlah_alat_standby = $validatedData['jumlah_alat_standby'][$key];
            $formWtrPeralatanHarian->jumlah_alat_off = $validatedData['jumlah_alat_off'][$key];
            $formWtrPeralatanHarian->jumlah_alat_total = $validatedData['jumlah_alat_total'][$key];
            $formWtrPeralatanHarian->satuan = $validatedData['satuan'][$key];
            $formWtrPeralatanHarian->tingkat_service_ability = $validatedData['tingkat_service_ability'][$key];
            $formWtrPeralatanHarian->peforma = $validatedData['peforma'][$key];
            $formWtrPeralatanHarian->catatan = $validatedData['catatan'][$key];
            $formWtrPeralatanHarian->save();
        }

        //Form Log Activity
        ActivityLog::endLog($detailWorkOrderForm);

        return redirect()
            ->route('work-orders.show', $detailWorkOrderForm->work_order_id)
            ->with([
                'success' => 'New Data
        added successfully!',
            ]);
    }
}
