<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use iio\libmergepdf\Merger;
use Illuminate\Http\Request;
use App\Models\FormPs1PanelHarian;
use App\Models\FormPs1GensetHarianPower;
use App\Models\FormPs1PanelTrDuaMingguan;
use App\Models\FormPs1PanelTrEnamBulanan;
use App\Http\Controllers\ReportController;
use App\Models\FormPs1TestOnloadUraianGenset;
use App\Models\FormPs1GensetMobileEnamBulanan;
use App\Models\FormPs1TestOnloadParameterGenset;
use App\Models\FormPs1PanelAutomationDuaMingguan;
use App\Models\FormPs1ControlDeskDuaMingguanBelakang;
use App\Models\FormPs1GensetHarian;

class ReportPs1Controller extends Controller
{
    protected $reportController;

    public function __construct(ReportController $reportController)
    {
        $this->middleware('permission:report-ps1-list', ['only' => 'index']);
        $this->middleware('permission:report-ps1-print', ['only' => ['create', 'store']]);
        $this->reportController = $reportController;
    }

    // REPORT - ELP
    public function index()
    {
        $data['page_title'] = 'Report Power Station 1';
        $workOrders = WorkOrder::orderBy('id', 'desc')
            ->whereBetween('date_generate', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->where('wo_status', '!=', 'IOT')
            ->with(['asset', 'workOrderStatus', 'maintenanceType', 'scheduleMaintenance'])
            ->get();
        $data['date'] = date('Y-m-d');
        $data['month'] = date('Y-m');
        $data['year'] = date('Y');
        // Filter By asset code
        $ps1WorkOrders = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->asset->code == '#PS1';
            })
            ->values();

        // After filterated by asset code, then filter by maintenanceType
        $data['preventives'] = $ps1WorkOrders
            ->filter(function ($workOrder) {
                return $workOrder->maintenanceType->name == 'Preventive';
            })
            ->values();
        $data['formPs1PanelAutomationDuaMingguans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1PanelAutomationDuaMingguans->isNotEmpty();
            })
            ->values();
        $data['formPs1PanelTrDuaMingguans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1PanelTrDuaMingguans->isNotEmpty();
            })
            ->values();
        $data['formPs1PanelTrEnamBulanans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1PanelTrEnamBulanans->isNotEmpty();
            })
            ->values();
        $data['formPs1PanelTrTahunans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1PanelTrTahunans->isNotEmpty();
            })
            ->values();
        $data['formPs1PanelTmDuaMingguans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1PanelTmDuaMingguans->isNotEmpty();
            })
            ->values();
        $data['formPs1PanelTmEnamBulanans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1PanelTmEnamBulanans->isNotEmpty();
            })
            ->values();

        $data['formPs1PanelTmTahunans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1PanelTmTahunans->isNotEmpty();
            })
            ->values();

        $data['formPs1GensetMobileDuaMingguans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1GensetMobileDuaMingguans->isNotEmpty();
            })
            ->values();

        $data['formPs1GensetMobileTigaBulanans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1GensetMobileTigaBulanans->isNotEmpty();
            })
            ->values();

        $data['formPs1GensetMobileEnamBulanans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1GensetMobileEnamBulanans->isNotEmpty();
            })
            ->values();

        $data['formPs1GensetMobileTahunans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1GensetMobileTahunans->isNotEmpty();
            })
            ->values();

        $data['gensetStandbyGarduTeknikDuaMingguans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->gensetStandbyGarduTeknikDuaMingguans->isNotEmpty();
            })
            ->values();

        $data['gensetStandbyGarduTeknikTigaBulanans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->gensetStandbyGarduTeknikTigaBulanans->isNotEmpty();
            })
            ->values();

        $data['gensetStandbyGarduTeknikEnamBulanans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->gensetStandbyGarduTeknikEnamBulanans->isNotEmpty();
            })
            ->values();

        $data['gensetStandbyGarduTeknikTahunans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->gensetStandbyGarduTeknikTahunans->isNotEmpty();
            })
            ->values();

        $data['formPs1GensetStandbyNo1DuaMingguans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1GensetStandbyNo1DuaMingguans->isNotEmpty();
            })
            ->values();

        $data['formPs1GensetStandbyTigaBulanans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1GensetStandbyTigaBulanans->isNotEmpty();
            })
            ->values();

        $data['formPs1GensetStandbyEnamBulanans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1GensetStandbyEnamBulanans->isNotEmpty();
            })
            ->values();

        $data['formPs1GensetStandbyTahunans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1GensetStandbyTahunans->isNotEmpty();
            })
            ->values();

        $data['formPs1ControlDeskDuaMingguans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1ControlDeskDuaMingguanBelakangs->isNotEmpty();
            })
            ->values();

        $data['formPs1ControlDeskTahunans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1ControlDeskTahunans->isNotEmpty();
            })
            ->values();

        $data['formPs1ChecklistGensets'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1GensetHarians->isNotEmpty();
            })
            ->values();

        $data['formPs1PanelHarians'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1PanelHarians->isNotEmpty();
            })
            ->values();

        $data['formPs1TestOnloadGensets'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1TestOnloadGenset;
            })
            ->values();

        return view('report.ps1.index', $data);
    }

    public function reportPs1Preventive(Request $request)
    {
        $m = new Merger();

        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $ps1WorkOrders = $workOrders->filter(function ($workOrder) {
            return $workOrder->asset->code == '#PS1';
        });

        $preventives = $ps1WorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        });

        if ($preventives->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
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

    public function reportPs1PanelAutomationDuaMingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1PanelAutomationDuaMingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1PanelAutomationDuaMingguans->isNotEmpty();
        });

        if ($woFormPs1PanelAutomationDuaMingguans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1PanelAutomationDuaMingguans as $woFormPs1PanelAutomationDuaMingguan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1PanelAutomationDuaMingguan->id)->output());
            if ($woFormPs1PanelAutomationDuaMingguan->tasks->isNotEmpty() || $woFormPs1PanelAutomationDuaMingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1PanelAutomationDuaMingguan]);
                $m->addRaw($pdf->output());
            }

            $data['formPs1PanelAutomationDuaMingguanAutomations'] = FormPs1PanelAutomationDuaMingguan::where('work_order_id', $woFormPs1PanelAutomationDuaMingguan->id)
                ->where('tipe', 'Automation')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1PanelAutomationDuaMingguanMarshallings'] = FormPs1PanelAutomationDuaMingguan::where('work_order_id', $woFormPs1PanelAutomationDuaMingguan->id)
                ->where('tipe', 'Marshalling')
                ->orderBy('id', 'asc')
                ->get();

            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-panel-automation-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1PanelTrDuaMingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woformPs1PanelTrDuaMingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1PanelTrDuaMingguans->isNotEmpty();
        });

        if ($woformPs1PanelTrDuaMingguans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }
        foreach ($woformPs1PanelTrDuaMingguans as $woformPs1PanelTrDuaMingguan) {
            $m->addRaw($this->reportController->workOrderPdf($woformPs1PanelTrDuaMingguan->id)->output());
            if ($woformPs1PanelTrDuaMingguan->tasks->isNotEmpty() || $woformPs1PanelTrDuaMingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woformPs1PanelTrDuaMingguan]);
                $m->addRaw($pdf->output());
            }

            $formPs1PanelTrDuaMingguans = $woformPs1PanelTrDuaMingguan->formPs1PanelTrDuaMingguans;
            $data['formPs1PanelTrDuaMingguanNp0s'] = $formPs1PanelTrDuaMingguans
                ->filter(function ($formPs1PanelTrDuaMingguan) {
                    return $formPs1PanelTrDuaMingguan->tipe == 'np0';
                })
                ->values();
            $data['formPs1PanelTrDuaMingguanT0s'] = $formPs1PanelTrDuaMingguans
                ->filter(function ($formPs1PanelTrDuaMingguan) {
                    return $formPs1PanelTrDuaMingguan->tipe == 't0';
                })
                ->values();
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-panel-tr-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1PanelTrEnamBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1PanelTrEnamBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1PanelTrEnamBulanans->isNotEmpty();
        });

        if ($woFormPs1PanelTrEnamBulanans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1PanelTrEnamBulanans as $woFormPs1PanelTrEnamBulanan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1PanelTrEnamBulanan->id)->output());
            if ($woFormPs1PanelTrEnamBulanan->tasks->isNotEmpty() || $woFormPs1PanelTrEnamBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1PanelTrEnamBulanan]);
                $m->addRaw($pdf->output());
            }

            $formPs1PanelTrEnamBulanans = $woFormPs1PanelTrEnamBulanan->formPs1PanelTrEnamBulanans;
            $data['formPs1PanelTrEnamBulananNp0s'] = $formPs1PanelTrEnamBulanans
                ->filter(function ($formPs1PanelTrEnamBulanan) {
                    return $formPs1PanelTrEnamBulanan->tipe == 'np0';
                })
                ->values();
            $data['formPs1PanelTrEnamBulananT0s'] = $formPs1PanelTrEnamBulanans
                ->filter(function ($formPs1PanelTrEnamBulanan) {
                    return $formPs1PanelTrEnamBulanan->tipe == 't0';
                })
                ->values();

            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-panel-tr-enam-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1PanelTrTahunan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1PanelTrTahunans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1PanelTrTahunans->isNotEmpty();
        });

        if ($woFormPs1PanelTrTahunans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1PanelTrTahunans as $woFormPs1PanelTrTahunan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1PanelTrTahunan->id)->output());
            if ($woFormPs1PanelTrTahunan->tasks->isNotEmpty() || $woFormPs1PanelTrTahunan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1PanelTrTahunan]);
                $m->addRaw($pdf->output());
            }

            $formPs1PanelTrTahunans = $woFormPs1PanelTrTahunan->formPs1PanelTrTahunans;
            $data['formPs1PanelTrTahunanNp0s'] = $formPs1PanelTrTahunans
                ->filter(function ($formPs1PanelTrTahunan) {
                    return $formPs1PanelTrTahunan->tipe == 'np0';
                })
                ->values();
            $data['formPs1PanelTrTahunanT0s'] = $formPs1PanelTrTahunans
                ->filter(function ($formPs1PanelTrTahunan) {
                    return $formPs1PanelTrTahunan->tipe == 't0';
                })
                ->values();

            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-panel-tr-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1PanelTmDuaMingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1PanelTmDuaMingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1PanelTrEnamBulanans->isNotEmpty();
        });

        if ($woFormPs1PanelTmDuaMingguans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1PanelTmDuaMingguans as $woFormPs1PanelTmDuaMingguan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1PanelTmDuaMingguan->id)->output());
            if ($woFormPs1PanelTmDuaMingguan->tasks->isNotEmpty() || $woFormPs1PanelTmDuaMingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1PanelTmDuaMingguan]);
                $m->addRaw($pdf->output());
            }

            $data['formPs1PanelTmDuaMingguans'] = $woFormPs1PanelTmDuaMingguan->formPs1PanelTmDuaMingguans;
            $data['formPs1PanelTmEr6DuaMingguans'] = $woFormPs1PanelTmDuaMingguan->formPs1PanelTmEr6DuaMingguans;
            $data['formPs1PanelTmEr2aDuaMingguans'] = $woFormPs1PanelTmDuaMingguan->formPs1PanelTmEr2aDuaMingguans;
            $data['formPs1PanelTmEr2bDuaMingguans'] = $woFormPs1PanelTmDuaMingguan->formPs1PanelTmEr2bDuaMingguans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-panel-tm-dua-mingguan', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1PanelTmEnamBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1PanelTmEnamBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1PanelTmEnamBulanans->isNotEmpty();
        });

        if ($woFormPs1PanelTmEnamBulanans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1PanelTmEnamBulanans as $woFormPs1PanelTmEnamBulanan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1PanelTmEnamBulanan->id)->output());
            if ($woFormPs1PanelTmEnamBulanan->tasks->isNotEmpty() || $woFormPs1PanelTmEnamBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1PanelTmEnamBulanan]);
                $m->addRaw($pdf->output());
            }

            $formPs1PanelTmEnamBulanans = $woFormPs1PanelTmEnamBulanan->formPs1PanelTmEnamBulanans;
            $data['panelSynchrons'] = $formPs1PanelTmEnamBulanans
                ->filter(function ($formPs1PanelTmEnamBulanan) {
                    return $formPs1PanelTmEnamBulanan->group_name == 'panel_synchron';
                })
                ->values();

            $data['er1bs'] = $formPs1PanelTmEnamBulanans
                ->filter(function ($formPs1PanelTmEnamBulanan) {
                    return $formPs1PanelTmEnamBulanan->group_name == 'er1b';
                })
                ->values();

            $data['er7s'] = $formPs1PanelTmEnamBulanans
                ->filter(function ($formPs1PanelTmEnamBulanan) {
                    return $formPs1PanelTmEnamBulanan->group_name == 'er7';
                })
                ->values();

            $data['er6s'] = $formPs1PanelTmEnamBulanans
                ->filter(function ($formPs1PanelTmEnamBulanan) {
                    return $formPs1PanelTmEnamBulanan->group_name == 'er6';
                })
                ->values();

            $data['er2as'] = $formPs1PanelTmEnamBulanans
                ->filter(function ($formPs1PanelTmEnamBulanan) {
                    return $formPs1PanelTmEnamBulanan->group_name == 'er2a';
                })
                ->values();

            $data['er2bs'] = $formPs1PanelTmEnamBulanans
                ->filter(function ($formPs1PanelTmEnamBulanan) {
                    return $formPs1PanelTmEnamBulanan->group_name == 'er2b';
                })
                ->values();
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-panel-tm-enam-bulanan', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1PanelTmTahunan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1PanelTmTahunans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1PanelTmTahunans->isNotEmpty();
        });

        if ($woFormPs1PanelTmTahunans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1PanelTmTahunans as $woFormPs1PanelTmTahunan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1PanelTmTahunan->id)->output());
            if ($woFormPs1PanelTmTahunan->tasks->isNotEmpty() || $woFormPs1PanelTmTahunan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1PanelTmTahunan]);
                $m->addRaw($pdf->output());
            }

            $data['formPs1PanelTmTahunans'] = $woFormPs1PanelTmTahunan->formPs1PanelTmTahunans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-panel-tm-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1GensetMobileDuaMingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1GensetMobileDuaMingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1GensetMobileDuaMingguans->isNotEmpty();
        });

        if ($woFormPs1GensetMobileDuaMingguans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1GensetMobileDuaMingguans as $woFormPs1GensetMobileDuaMingguan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1GensetMobileDuaMingguan->id)->output());
            if ($woFormPs1GensetMobileDuaMingguan->tasks->isNotEmpty() || $woFormPs1GensetMobileDuaMingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1GensetMobileDuaMingguan]);
                $m->addRaw($pdf->output());
            }

            $data['formPs1GensetMobileDuaMingguans'] = $woFormPs1GensetMobileDuaMingguan->formPs1GensetMobileDuaMingguans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-mobile-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1GensetMobileTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1GensetMobileTigaBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1GensetMobileTigaBulanans->isNotEmpty();
        });

        if ($woFormPs1GensetMobileTigaBulanans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1GensetMobileTigaBulanans as $woFormPs1GensetMobileTigaBulanan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1GensetMobileTigaBulanan->id)->output());
            if ($woFormPs1GensetMobileTigaBulanan->tasks->isNotEmpty() || $woFormPs1GensetMobileTigaBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1GensetMobileTigaBulanan]);
                $m->addRaw($pdf->output());
            }

            $data['formPs1GensetMobileTigaBulanans'] = $woFormPs1GensetMobileTigaBulanan->formPs1GensetMobileTigaBulanans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-mobile-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1GensetMobileEnamBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1GensetMobileEnamBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1GensetMobileEnamBulanans->isNotEmpty();
        });

        if ($woFormPs1GensetMobileEnamBulanans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1GensetMobileEnamBulanans as $woFormPs1GensetMobileEnamBulanan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1GensetMobileEnamBulanan->id)->output());
            if ($woFormPs1GensetMobileEnamBulanan->tasks->isNotEmpty() || $woFormPs1GensetMobileEnamBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1GensetMobileEnamBulanan]);
                $m->addRaw($pdf->output());
            }

            $data['formPs1GensetMobileEnamBulanans'] = $woFormPs1GensetMobileEnamBulanan->formPs1GensetMobileEnamBulanans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-mobile-enam-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1GensetMobileTahunan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1GensetMobileTahunans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1GensetMobileTahunans->isNotEmpty();
        });

        if ($woFormPs1GensetMobileTahunans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1GensetMobileTahunans as $woFormPs1GensetMobileTahunan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1GensetMobileTahunan->id)->output());
            if ($woFormPs1GensetMobileTahunan->tasks->isNotEmpty() || $woFormPs1GensetMobileTahunan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1GensetMobileTahunan]);
                $m->addRaw($pdf->output());
            }

            $data['formPs1GensetMobileTahunans'] = $woFormPs1GensetMobileTahunan->formPs1GensetMobileTahunans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-mobile-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1GensetStandbyGarduTeknikDuaMingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woGensetStandbyGarduTeknikDuaMingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->gensetStandbyGarduTeknikDuaMingguans->isNotEmpty();
        });

        if ($woGensetStandbyGarduTeknikDuaMingguans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woGensetStandbyGarduTeknikDuaMingguans as $woGensetStandbyGarduTeknikDuaMingguan) {
            $m->addRaw($this->reportController->workOrderPdf($woGensetStandbyGarduTeknikDuaMingguan->id)->output());
            if ($woGensetStandbyGarduTeknikDuaMingguan->tasks->isNotEmpty() || $woGensetStandbyGarduTeknikDuaMingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woGensetStandbyGarduTeknikDuaMingguan]);
                $m->addRaw($pdf->output());
            }

            $data['gensetStandbyGarduTeknikDuaMingguans'] = $woGensetStandbyGarduTeknikDuaMingguan->gensetStandbyGarduTeknikDuaMingguans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-standby-gardu-teknik-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1GensetStandbyGarduTeknikTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woGensetStandbyGarduTeknikTigaBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->gensetStandbyGarduTeknikTigaBulanans->isNotEmpty();
        });

        if ($woGensetStandbyGarduTeknikTigaBulanans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woGensetStandbyGarduTeknikTigaBulanans as $woGensetStandbyGarduTeknikTigaBulanan) {
            $m->addRaw($this->reportController->workOrderPdf($woGensetStandbyGarduTeknikTigaBulanan->id)->output());
            if ($woGensetStandbyGarduTeknikTigaBulanan->tasks->isNotEmpty() || $woGensetStandbyGarduTeknikTigaBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woGensetStandbyGarduTeknikTigaBulanan]);
                $m->addRaw($pdf->output());
            }

            $data['gensetStandbyGarduTeknikTigaBulanans'] = $woGensetStandbyGarduTeknikTigaBulanan->gensetStandbyGarduTeknikTigaBulanans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-standby-gardu-teknik-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1GensetStandbyGarduTeknikEnamBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woGensetStandbyGarduTeknikEnamBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->gensetStandbyGarduTeknikEnamBulanans->isNotEmpty();
        });

        if ($woGensetStandbyGarduTeknikEnamBulanans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woGensetStandbyGarduTeknikEnamBulanans as $woGensetStandbyGarduTeknikEnamBulanan) {
            $m->addRaw($this->reportController->workOrderPdf($woGensetStandbyGarduTeknikEnamBulanan->id)->output());
            if ($woGensetStandbyGarduTeknikEnamBulanan->tasks->isNotEmpty() || $woGensetStandbyGarduTeknikEnamBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woGensetStandbyGarduTeknikEnamBulanan]);
                $m->addRaw($pdf->output());
            }

            $data['gensetStandbyGarduTeknikEnamBulanans'] = $woGensetStandbyGarduTeknikEnamBulanan->gensetStandbyGarduTeknikEnamBulanans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-standby-gardu-teknik-enam-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1GensetStandbyGarduTeknikTahunan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woGensetStandbyGarduTeknikTahunans = $workOrders->filter(function ($workOrder) {
            return $workOrder->gensetStandbyGarduTeknikTahunans->isNotEmpty();
        });

        if ($woGensetStandbyGarduTeknikTahunans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woGensetStandbyGarduTeknikTahunans as $woGensetStandbyGarduTeknikTahunan) {
            $m->addRaw($this->reportController->workOrderPdf($woGensetStandbyGarduTeknikTahunan->id)->output());
            if ($woGensetStandbyGarduTeknikTahunan->tasks->isNotEmpty() || $woGensetStandbyGarduTeknikTahunan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woGensetStandbyGarduTeknikTahunan]);
                $m->addRaw($pdf->output());
            }

            $data['gensetStandbyGarduTeknikTahunans'] = $woGensetStandbyGarduTeknikTahunan->gensetStandbyGarduTeknikTahunans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-standby-gardu-teknik-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1GensetStandbyNo1DuaMingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1GensetStandbyNo1DuaMingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1GensetStandbyNo1DuaMingguans->isNotEmpty();
        });

        if ($woFormPs1GensetStandbyNo1DuaMingguans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1GensetStandbyNo1DuaMingguans as $woFormPs1GensetStandbyNo1DuaMingguan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1GensetStandbyNo1DuaMingguan->id)->output());
            if ($woFormPs1GensetStandbyNo1DuaMingguan->tasks->isNotEmpty() || $woFormPs1GensetStandbyNo1DuaMingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1GensetStandbyNo1DuaMingguan]);
                $m->addRaw($pdf->output());
            }

            $data['duaMingguans'] = ['Ampere Meter', 'Volt Meter', 'Frequency', 'Batt. Starter', 'T.BBM harian', 'Mode Operasi Pompa BBM', 'Power Factor', 'Engine Speed', 'Level air radiator', 'Level Oli Mesin', 'eng.Oil Press', 'eng. Coolant temp', 'eng.Run Time', 'Mode operasi water pump', 'Mode operasi smart battery charger'];
            $data['formPs1GensetStandbyNo1DuaMingguans'] = $woFormPs1GensetStandbyNo1DuaMingguan->formPs1GensetStandbyNo1DuaMingguans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-standby-no-1-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1GensetStandbyTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1GensetStandbyTigaBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1GensetStandbyNo1DuaMingguans->isNotEmpty();
        });

        if ($woFormPs1GensetStandbyTigaBulanans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1GensetStandbyTigaBulanans as $woFormPs1GensetStandbyTigaBulanan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1GensetStandbyTigaBulanan->id)->output());
            if ($woFormPs1GensetStandbyTigaBulanan->tasks->isNotEmpty() || $woFormPs1GensetStandbyTigaBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1GensetStandbyTigaBulanan]);
                $m->addRaw($pdf->output());
            }

            $data['tigaBulanans'] = [
                ['dataTeknis' => 'Ampere Meter', 'satuan' => 'A'],
                ['dataTeknis' => 'Volt Meter', 'satuan' => 'V'],
                ['dataTeknis' => 'Frequency', 'satuan' => 'Hz'],
                ['dataTeknis' => 'Power Factor', 'satuan' => 'pf'],
                ['dataTeknis' => 'Batt. Starter', 'satuan' => 'Vdc'],
                ['dataTeknis' => 'Kondisi Batt. Charger', 'satuan' => 'Auto / Man / off'],
                ['dataTeknis' => 'Batt. Analyser', 'satuan' => 'Good / Bad'],
                ['dataTeknis' => 'T.BBM harian', 'satuan' => 'Liter'],
                ['dataTeknis' => 'Mode Operasi Pompa', 'satuan' => 'Auto / Man / off'],
                ['dataTeknis' => 'Mode Operasi Genset (power wizard)', 'satuan' => 'Auto / Man / off'],
                ['dataTeknis' => 'Air Shut Off Valve', 'satuan' => 'Open / Close'],
                ['dataTeknis' => 'Kran BBM Input', 'satuan' => 'Open / Close'],
                ['dataTeknis' => 'Kran drain Oli', 'satuan' => 'Open / Close'],
                ['dataTeknis' => 'Kran drain Air', 'satuan' => 'Open / Close'],
                ['dataTeknis' => 'Posisi CB Panel PG', 'satuan' => 'Open / Close'],
                ['dataTeknis' => 'Enggine Speed', 'satuan' => 'rpm'],
                ['dataTeknis' => 'Level air radiator', 'satuan' => 'Low/ Medium/ max'],
                ['dataTeknis' => 'Level Oli Mesin', 'satuan' => 'Low/ Medium/ max'],
                ['dataTeknis' => 'engg.Oil Press.', 'satuan' => 'barr'],
                ['dataTeknis' => 'engg. Coolant temp', 'satuan' => 'c'],
                ['dataTeknis' => 'engg.Run Time', 'satuan' => 'hours'],
                ['dataTeknis' => 'engg.Inlet temp', 'satuan' => 'c'],
                ['dataTeknis' => 'Posisi Pintu Ruang Genset', 'satuan' => 'Tertutup / Terkunci'],
            ];
            $data['formPs1GensetStandbyTigaBulanans'] = $woFormPs1GensetStandbyTigaBulanan->formPs1GensetStandbyTigaBulanans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-standby-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1GensetStandbyEnamBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1GensetStandbyEnamBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1GensetStandbyNo1DuaMingguans->isNotEmpty();
        });

        if ($woFormPs1GensetStandbyEnamBulanans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1GensetStandbyEnamBulanans as $woFormPs1GensetStandbyEnamBulanan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1GensetStandbyEnamBulanan->id)->output());
            if ($woFormPs1GensetStandbyEnamBulanan->tasks->isNotEmpty() || $woFormPs1GensetStandbyEnamBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1GensetStandbyEnamBulanan]);
                $m->addRaw($pdf->output());
            }

            $data['enamBulanans'] = [
                ['dataTeknis' => 'Ampere Meter', 'satuan' => 'A'],
                ['dataTeknis' => 'Volt Meter', 'satuan' => 'V'],
                ['dataTeknis' => 'Frequency', 'satuan' => 'Hz'],
                ['dataTeknis' => 'Power Factor', 'satuan' => 'pf'],
                ['dataTeknis' => 'Batt. Starter', 'satuan' => 'Vdc'],
                ['dataTeknis' => 'Kondisi Batt. Charger', 'satuan' => 'Auto / Man / off'],
                ['dataTeknis' => 'Batt. Analyser', 'satuan' => 'Good / Bad'],
                ['dataTeknis' => 'T.BBM harian', 'satuan' => 'Liter'],
                ['dataTeknis' => 'Level Off Pompa BBM', 'satuan' => 'Liter'],
                ['dataTeknis' => 'Level On Pompa BBM', 'satuan' => 'Liter'],
                ['dataTeknis' => 'Mode Operasi Pompa', 'satuan' => 'Auto / Man / off'],
                ['dataTeknis' => 'Mode Operasi Genset (power wizard)', 'satuan' => 'Auto / Man / off'],
                ['dataTeknis' => 'Air Shut Off Valve', 'satuan' => 'Open / Close'],
                ['dataTeknis' => 'Kran BBM Input', 'satuan' => 'Open / Close'],
                ['dataTeknis' => 'Kran drain Oli', 'satuan' => 'Open / Close'],
                ['dataTeknis' => 'Kran drain Air', 'satuan' => 'Open / Close'],
                ['dataTeknis' => 'Posisi CB Panel PG', 'satuan' => 'Open / Close'],
                ['dataTeknis' => 'Enggine Speed', 'satuan' => 'rpm'],
                ['dataTeknis' => 'Level air radiator', 'satuan' => 'Low/ Medium/ max'],
                ['dataTeknis' => 'Level Oli Mesin', 'satuan' => 'Low/ Medium/ max'],
                ['dataTeknis' => 'engg.Oil Press.', 'satuan' => 'barr'],
                ['dataTeknis' => 'engg. Coolant temp', 'satuan' => 'c'],
                ['dataTeknis' => 'engg.Run Time', 'satuan' => 'hours'],
                ['dataTeknis' => 'engg.Inlet temp', 'satuan' => 'c'],
                ['dataTeknis' => 'Posisi Pintu Ruang Genset', 'satuan' => 'Tertutup / Terkunci'],
            ];
            $data['formPs1GensetStandbyEnamBulanans'] = $woFormPs1GensetStandbyEnamBulanan->formPs1GensetStandbyEnamBulanans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-standby-enam-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1GensetStandbyTahunan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1GensetStandbyTahunans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1GensetStandbyNo1DuaMingguans->isNotEmpty();
        });

        if ($woFormPs1GensetStandbyTahunans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1GensetStandbyTahunans as $woFormPs1GensetStandbyTahunan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1GensetStandbyTahunan->id)->output());
            if ($woFormPs1GensetStandbyTahunan->tasks->isNotEmpty() || $woFormPs1GensetStandbyTahunan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1GensetStandbyTahunan]);
                $m->addRaw($pdf->output());
            }

            $data['tahunans'] = [
                ['dataTeknis' => 'Batt. Starter', 'satuan' => 'Vdc'],
                ['dataTeknis' => 'T.BBM harian Genset', 'satuan' => 'Liter'],
                ['dataTeknis' => 'T.BBM harian', 'satuan' => 'Liter'],
                ['dataTeknis' => 'T.BBM Ground tank 1', 'satuan' => 'Liter'],
                ['dataTeknis' => 'T.BBM Ground tank 2', 'satuan' => 'Liter'],
                ['dataTeknis' => 'T.BBM Ground tank 3', 'satuan' => 'Liter'],
                ['dataTeknis' => 'Ampere Meter', 'satuan' => 'A'],
                ['dataTeknis' => 'Volt Meter', 'satuan' => 'V'],
                ['dataTeknis' => 'Frequency', 'satuan' => 'Hz'],
                ['dataTeknis' => 'Watt Meter', 'satuan' => 'Kw'],
                ['dataTeknis' => 'Power Factor', 'satuan' => 'pf'],
                ['dataTeknis' => 'Enggine Speed', 'satuan' => 'rpm'],
                ['dataTeknis' => 'Level air radiator', 'satuan' => 'Low/ Medium/ max'],
                ['dataTeknis' => 'Level Oli Mesin', 'satuan' => 'Low/ Medium/ max'],
                ['dataTeknis' => 'engg.Oil Press.', 'satuan' => 'barr'],
                ['dataTeknis' => 'engg. Coolant temp', 'satuan' => 'c'],
                ['dataTeknis' => 'engg.Run Time', 'satuan' => 'hours'],
                ['dataTeknis' => 'engg.Inlet temp', 'satuan' => 'c'],
            ];
            $data['formPs1GensetStandbyTahunans'] = $woFormPs1GensetStandbyTahunan->formPs1GensetStandbyTahunans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-standby-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1ControlDeskTahunan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1ControlDeskTahunans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1ControlDeskTahunans->isNotEmpty();
        });

        if ($woFormPs1ControlDeskTahunans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1ControlDeskTahunans as $woFormPs1ControlDeskTahunan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1ControlDeskTahunan->id)->output());
            if ($woFormPs1ControlDeskTahunan->tasks->isNotEmpty() || $woFormPs1ControlDeskTahunan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1ControlDeskTahunan]);
                $m->addRaw($pdf->output());
            }

            $data['satuan'] = ['A', '', 'V', 'Hz', 'hrs', 'rpm', 'Bar', 'c', 'Vdc', '', '', ''];

            $data['formPs1ControlDeskTahunans'] = $woFormPs1ControlDeskTahunan->formPs1ControlDeskTahunans;
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-control-desk-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1ControlDeskDuaMingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1ControlDeskDuaMingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1ControlDeskDuaMingguans->isNotEmpty();
        });

        if ($woFormPs1ControlDeskDuaMingguans->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1ControlDeskDuaMingguans as $woFormPs1ControlDeskDuaMingguan) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1ControlDeskDuaMingguan->id)->output());
            if ($woFormPs1ControlDeskDuaMingguan->tasks->isNotEmpty() || $woFormPs1ControlDeskDuaMingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1ControlDeskDuaMingguan]);
                $m->addRaw($pdf->output());
            }

            $data['formPs1ControlDeskDuaMingguanBelakangControl'] = FormPs1ControlDeskDuaMingguanBelakang::where('work_order_id', $woFormPs1ControlDeskDuaMingguan->id)
                ->where('grup', 'control')
                ->orderBy('id', 'asc')
                ->get();

            $data['formPs1ControlDeskDuaMingguanBelakangPanel'] = FormPs1ControlDeskDuaMingguanBelakang::where('work_order_id', $woFormPs1ControlDeskDuaMingguan->id)
                ->where('grup', 'panel')
                ->orderBy('id', 'asc')
                ->get();
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-control-desk-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1ChecklistGenset(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1GensetHarians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1GensetHarians->isNotEmpty();
        });

        if ($woFormPs1GensetHarians->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1GensetHarians as $woFormPs1GensetHarian) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1GensetHarian->id)->output());
            if ($woFormPs1GensetHarian->tasks->isNotEmpty() || $woFormPs1GensetHarian->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1GensetHarian]);
                $m->addRaw($pdf->output());
            }

            $formPs1GensetHarians = $woFormPs1GensetHarian->formPs1GensetHarians;
            $data['conrtolDesks'] = $formPs1GensetHarians->filter(function ($formPs1GensetHarian) {
                return $formPs1GensetHarian->group == 'CONTROL DESK';
            });
            $data['gensets'] = $formPs1GensetHarians->filter(function ($formPs1GensetHarian) {
                return $formPs1GensetHarian->group == 'GENSET';
            });
            $data['groundTanks'] = $formPs1GensetHarians->filter(function ($formPs1GensetHarian) {
                return $formPs1GensetHarian->group == 'GROUND TANK';
            });
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-genset-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1PanelHarian(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPPs1PanelHarians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1PanelHarians->isNotEmpty();
        });

        if ($woFormPPs1PanelHarians->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPPs1PanelHarians as $woFormPPs1PanelHarian) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPPs1PanelHarian->id)->output());
            if ($woFormPPs1PanelHarian->tasks->isNotEmpty() || $woFormPPs1PanelHarian->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPPs1PanelHarian]);
                $m->addRaw($pdf->output());
            }

            $data['formPs1GensetHarianPowerER6'] = FormPs1GensetHarianPower::where('work_order_id', $woFormPPs1PanelHarian->id)
                ->where('grup', 'er6')
                ->orderBy('id', 'asc')
                ->get();

            $data['formPs1PanelHarianEXT'] = FormPs1PanelHarian::where('work_order_id', $woFormPPs1PanelHarian->id)
                ->where('grup', 'ext')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1PanelHarianER2A'] = FormPs1PanelHarian::where('work_order_id', $woFormPPs1PanelHarian->id)
                ->where('grup', 'er2a')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1PanelHarianER2B'] = FormPs1PanelHarian::where('work_order_id', $woFormPPs1PanelHarian->id)
                ->where('grup', 'er2b')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1PanelHarianER1B'] = FormPs1PanelHarian::where('work_order_id', $woFormPPs1PanelHarian->id)
                ->where('grup', 'er1b')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1PanelHarianPanel'] = FormPs1PanelHarian::where('work_order_id', $woFormPPs1PanelHarian->id)
                ->where('grup', 'panel_mv_genset')
                ->orderBy('id', 'asc')
                ->get();
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-panel-harian', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportPs1TestOnloadGenset(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->reportController->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormPs1TestOnloadGensets = $workOrders->filter(function ($workOrder) {
            return $workOrder->formPs1TestOnloadGenset;
        });

        if ($woFormPs1TestOnloadGensets->isEmpty()) {
            return redirect()
                ->route('report.energy-power-supply.power-station-1.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormPs1TestOnloadGensets as $woFormPs1TestOnloadGenset) {
            $m->addRaw($this->reportController->workOrderPdf($woFormPs1TestOnloadGenset->id)->output());
            if ($woFormPs1TestOnloadGenset->tasks->isNotEmpty() || $woFormPs1TestOnloadGenset->taskGroups->isNotEmpty()) {
                $pdf = $this->reportController->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormPs1TestOnloadGenset]);
                $m->addRaw($pdf->output());
            }

            $data['uraianGensets'] = [['name' => 'Beban awal (PLN ONLOAD)'], ['name' => 'Beban Genset (PLN Off / Genset Onload)'], ['name' => 'Beban Akhir (PLN Onload / Recovery)']];

            $data['parameterGensets'] = [['name' => 'TEGANGAN'], ['name' => 'ARUS'], ['name' => 'FREQUENCY'], ['name' => 'BBM'], ['name' => 'JACKET WATER OUTLET TEMP'], ['name' => 'JACKET WATER PRESSURE'], ['name' => 'TURBO BLOWER AIR PRESSURE'], ['name' => 'LOW TEMP. WATER PRESSURE'], ['name' => 'ENGINE OIL TEMPERATURE'], ['name' => 'OIL PRESSURE AFTER FILTER'], ['name' => 'TURBO BLOWER II AIR PRESSURE']];

            $data['formPs1TestOnloadGenset'] = $woFormPs1TestOnloadGenset->formPs1TestOnloadGenset;
            $data['formPs1TestOnloadParameterGensets'] = FormPs1TestOnloadParameterGenset::where('work_order_id', $woFormPs1TestOnloadGenset->id)
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1TestOnloadUraianGensets'] = FormPs1TestOnloadUraianGenset::where('work_order_id', $woFormPs1TestOnloadGenset->id)
                ->orderBy('id', 'asc')
                ->get();
            $pdf = $this->reportController->createPdf('report.form-report.form-ps1-onload', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }
}
