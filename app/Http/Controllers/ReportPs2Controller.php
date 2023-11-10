<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use iio\libmergepdf\Merger;
use Illuminate\Http\Request;
use App\Models\UserTechnical;
use App\Models\FormActivityLog;
use App\Http\Controllers\ReportController;

class ReportPs2Controller extends Controller
{
    protected $reportController;

    public function __construct(ReportController $reportController)
    {
        $this->middleware('permission:report-ps2-list', ['only' => 'index']);
        $this->middleware('permission:report-ps2-print', ['only' => ['create', 'store']]);
        $this->reportController = $reportController;
    }

    // REPORT - ELP
    public function index()
    {
        $data['page_title'] = 'Report Power Station 2';
        $workOrders = WorkOrder::orderBy('id', 'desc')
            ->whereBetween('date_generate', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->where('wo_status', '!=', 'IOT')
            ->with(['asset', 'workOrderStatus', 'maintenanceType', 'scheduleMaintenance'])
            ->get();
        $data['date'] = date('Y-m-d');
        $data['month'] = date('Y-m');
        $data['year'] = date('Y');
        // Filter By asset code
        $ps2WorkOrders = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->asset->code == '#PS2';
            })
            ->values();

        // After filterated by asset code, then filter by maintenanceType
        $data['preventives'] = $ps2WorkOrders
            ->filter(function ($workOrder) {
                return $workOrder->maintenanceType->name == 'Preventive';
            })
            ->values();
        $data['formPs2PanelDuaMingguans'] = $ps2WorkOrders
            ->filter(function ($workOrder) {
                return $workOrder->FormPs2PanelDuaMingguans->isNotEmpty();
            })
            ->values();

        return view('report.ps2.index', $data);
    }

    public function reportPs2Preventive(Request $request)
    {
        $m = new Merger();

        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $ps1WorkOrders = $workOrders->filter(function ($workOrder) {
            return $workOrder->asset->code == '#PS2';
        });

        $preventives = $ps1WorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        });

        if ($preventives->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-2.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($preventives as $preventive) {
            $m->addRaw($this->reportController->workOrderPdf($preventive->id)->output());
            if ($preventive->tasks->isNotEmpty() || $preventive->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $preventive]);
                $m->addRaw($pdf->output());
            }
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs2PanelDuaMingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs2PanelDuaMingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->FormPs2PanelDuaMingguans->isNotEmpty();
        });

        if ($woFormPs2PanelDuaMingguans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-2.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs2PanelDuaMingguans as $woFormPs2PanelDuaMingguan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs2PanelDuaMingguan->id)->output());
            if ($woFormPs2PanelDuaMingguan->tasks->isNotEmpty() || $woFormPs2PanelDuaMingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs2PanelDuaMingguan]);
                $m->addRaw($pdf->output());
            }
            $data['formPs2PanelDuaMingguans'] = $woFormPs2PanelDuaMingguan;
            $data['panel'] = [
                ['nama_peralatan' => 'PS2 SDP 007', 'posisi' => 'R.GENSET', 'keterangan' => 'NORMAL'],
                ['nama_peralatan' => 'PS2 SDP 001C', 'posisi' => 'R.GENSET', 'keterangan' => 'NORMAL'],
                ['nama_peralatan' => 'PS2 SDP 008', 'posisi' => 'R.GENSET', 'keterangan' => 'NORMAL'],
                ['nama_peralatan' => 'PS2 SDP 006', 'posisi' => 'R.GENSET', 'keterangan' => 'NORMAL'],
                ['nama_peralatan' => 'PS2 SDP 003', 'posisi' => 'GH 128', 'keterangan' => 'NORMAL'],
                ['nama_peralatan' => 'PS2 SDP 001A', 'posisi' => 'R.TENAGA', 'keterangan' => 'NORMAL'],
                ['nama_peralatan' => 'PS2 SDP 004', 'posisi' => 'GROUND TANK', 'keterangan' => 'NORMAL'],
                ['nama_peralatan' => 'PS2 SDP 001B', 'posisi' => 'L.2', 'keterangan' => 'NORMAL'],
                ['nama_peralatan' => 'PS2 SDP 002', 'posisi' => 'L.2', 'keterangan' => 'NORMAL'],
                ['nama_peralatan' => 'PS2 SDP UPS 05 D', 'posisi' => 'R.SERVER', 'keterangan' => 'AUTO, NORMAL'],
                ['nama_peralatan' => 'PS2 SDP UPS 05 C', 'posisi' => 'R.SERVER', 'keterangan' => 'AUTO, NORMAL'],
                ['nama_peralatan' => 'PS2 SDP 05A', 'posisi' => 'R.SERVER', 'keterangan' => 'AUTO, NORMAL'],
                ['nama_peralatan' => 'PS2 SDP 05B', 'posisi' => 'R.SERVER', 'keterangan' => 'AUTO, NORMAL'],
                ['nama_peralatan' => 'PS2 SDP 02B', 'posisi' => 'R.SERVER', 'keterangan' => 'AUTO, NORMAL'],
                ['nama_peralatan' => 'PS2 SDP AC LT 2', 'posisi' => 'L.2', 'keterangan' => 'NORMAL'],
                ['nama_peralatan' => 'MCA', 'posisi' => 'R.CONTROL', 'keterangan' => 'MAINS FAIL, AUTO'],
                ['nama_peralatan' => 'MCB', 'posisi' => 'R.CONTROL', 'keterangan' => 'MAINS FAIL, AUTO'],
                ['nama_peralatan' => 'MCD', 'posisi' => 'R.CONTROL', 'keterangan' => 'SEMI'],
                ['nama_peralatan' => 'MCE', 'posisi' => 'R.CONTROL', 'keterangan' => 'SEMI'],
                ['nama_peralatan' => 'MCF', 'posisi' => 'R.CONTROL', 'keterangan' => 'AUTO'],
                ['nama_peralatan' => 'MCG', 'posisi' => 'R.CONTROL', 'keterangan' => 'SEMI, ALARM IN TEST POS'],
                ['nama_peralatan' => 'FAN 1', 'posisi' => 'R.GENSET', 'keterangan' => 'REMOTE, NORMAL'],
                ['nama_peralatan' => 'FAN 2', 'posisi' => 'R.GENSET', 'keterangan' => 'REMOTE, NORMAL'],
                ['nama_peralatan' => 'FAN 3', 'posisi' => 'R.GENSET', 'keterangan' => 'REMOTE, NORMAL'],
                ['nama_peralatan' => 'FAN 4', 'posisi' => 'R.GENSET', 'keterangan' => 'OFF, PERBAIKAN FAN'],
                ['nama_peralatan' => 'FAN 5', 'posisi' => 'R.GENSET', 'keterangan' => 'REMOTE, NORMAL'],
                ['nama_peralatan' => 'FAN 6', 'posisi' => 'R.GENSET', 'keterangan' => 'REMOTE, NORMAL'],
                ['nama_peralatan' => 'FAN 7', 'posisi' => 'R.GENSET', 'keterangan' => 'REMOTE, NORMAL'],
                ['nama_peralatan' => 'PANEL CHARGING', 'posisi' => 'PARKIRAN', 'keterangan' => 'NORMAL'],
                ['nama_peralatan' => 'PANEL RTU', 'posisi' => 'RUANG KABEL', 'keterangan' => 'NORMAL'],
            ];
            $pdf = $this->reportController->createPdf('report.form-report.form-ps2-panel-dua-mingguan', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }
}
