<?php

namespace App\Http\Controllers;

use DateTime;
use PDF;
use Carbon\Carbon;
use App\Helpers\FormPs2;
use App\Models\User;
use App\Models\Asset;
use App\Models\WorkOrder;
use iio\libmergepdf\Merger;
use App\Helpers\ActivityLog;
use App\Models\AssetMaterial;
use App\Models\UserTechnical;
use App\Models\FormElpDailyGh;
use App\Models\FormActivityLog;
use App\Models\FormPs1PanelHarian;
use App\Models\FormPs3PanelHarian;
use App\Models\DetailWorkOrderForm;
use App\Models\FormPs1GensetHarian;
use App\Models\ReportTaskWorkOrder;
use App\Models\ScheduleMaintenance;
use Illuminate\Support\Facades\App;
use App\Models\ChecklistGensetPhAocc;
use Illuminate\Support\Facades\Crypt;
use App\Models\FormEleChecklist1Harian;
use App\Models\FormEleChecklist2Harian;
use App\Models\FormPs1TestOnloadGenset;
use Illuminate\Http\Request;
use App\Models\FormPs1GensetHarianPower;
use App\Models\FormPs1ControlDeskTahunan;
use App\Models\FormPs1PanelTrDuaMingguan;
use App\Models\FormPs1PanelTrEnamBulanan;
use App\Models\FormPs1GensetMobileTahunan;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\FormPs1TestOnloadUraianGenset;
use App\Models\FormPs1GensetMobileDuaMingguan;
use App\Models\FormPs1GensetMobileEnamBulanan;
use App\Models\FormPs1GensetMobileTigaBulanan;
use App\Models\FormPs1TestOnloadParameterGenset;
use App\Models\FormUpsPengukuranTeganganBattery;
use App\Models\FormPs1PanelAutomationDuaMingguan;
use App\Models\FormApmMekanikalVehicleBogieHarian;
use App\Models\FormApmVehicleAirBrakeSystemHarian;
use App\Models\ChecklistHarianGensetPs2ControlRoom;
use App\Models\FormPs1ControlDeskDuaMingguanBelakang;
use App\Models\FormPs1TrafoDuaMingguan;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:report-maintenance', ['only' => 'index']);
    }

    public function index()
    {
        $data['page_title'] = 'Reports';
        $data['schedule_maintenances'] = ScheduleMaintenance::orderBy('id', 'desc')->get();

        return view('report.index', $data);
    }

    public function viewWorkOrderReport($id)
    {
        $workOrder = WorkOrder::findOrFail($id);
        $data['work_order'] = $workOrder;
        $data['approve'] = $workOrder->approve_user_id !== null && $workOrder->approve_user_id !== 0 ? User::findOrFail($workOrder->approve_user_id) : null;
        // $task_count = ReportTaskWorkOrder::where('work_order_id', $id)->where('status', true)->count();
        // $task_done_count = $data['work_order']->reportTaskWorkOrders->count();
        // $data['task_complete'] = $task_count != 0 ? round(($task_count / $task_done_count) * 100) . '%' : '0%';
        // $pdf = PDF::loadview('report.work-order-report', $data);
        // $pdf->setPaper([0, 0, 609.4488, 935.433], 'potrait');
        // $pdf->output();

        $m = new Merger();

        // Mengecek apakah form yang dipilih membutuhkan work order pdf atau tidak? jika tidak, maka nilai akan lebih dari 1
        $indicator = 0;

        // FORM ELECTRICAL UTILITY
        if ($data['formEleSuratIzinPelaksanaanPekerjaan'] = $workOrder->formEleSuratIzinPelaksanaanPekerjaan) {
            $formId = $data['formEleSuratIzinPelaksanaanPekerjaan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['assetMaterials'] = AssetMaterial::where('asset_id', $data['work_order']->asset_id)
                ->with(['bom'])
                ->get();
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formEleSuratIzinPelaksanaanPekerjaan']->tanggal));
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }

            $pdf = $this->createPdf('report.form-report.form-ele-surat-izin-pelaksanaan-pekerjaan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }

        if ($data['formEleSuratPemeriksaanRutin'] = $workOrder->formEleSuratPemeriksaanRutin) {
            $formId = $data['formEleSuratPemeriksaanRutin']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formEleSuratPemeriksaanRutin']->tanggal));
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }

            $pdf = $this->createPdf('report.form-report.form-ele-surat-pemeriksaan-rutin', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }

        if ($indicator == 0) {
            $data['userTechnicals'] = [];

            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $pdf = $this->createPdf('report.new-work-order-report', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
            if ($workOrder->tasks->isNotEmpty() || $workOrder->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', $data);
                $m->addRaw($pdf->output());
            }
        }
        // NVA (Nort Visual Aid)
        if ($workOrder->formNvaChecklist1Harians->isNotEmpty()) {
            $data['formNvaChecklist1Harians'] = $workOrder->formNvaChecklist1Harians;

            $formId = $data['formNvaChecklist1Harians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-nva-checklist1-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formNvaChecklist2Harians->isNotEmpty()) {
            $data['formNvaChecklist2Harians'] = $workOrder->formNvaChecklist2Harians;

            $formId = $data['formNvaChecklist2Harians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-nva-checklist2-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        
        if ($data['formNvaSuratIzinPelaksanaanPekerjaan'] = $workOrder->formNvaSuratIzinPelaksanaanPekerjaan) {
            $formId = $data['formNvaSuratIzinPelaksanaanPekerjaan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['assetMaterials'] = AssetMaterial::where('asset_id', $data['work_order']->asset_id)
                ->with(['bom'])
                ->get();
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formNvaSuratIzinPelaksanaanPekerjaan']->tanggal));
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }

            $pdf = $this->createPdf('report.form-report.form-nva-surat-izin-pelaksanaan-pekerjaan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }
        if ($data['formNvaSuratPemeriksaanRutin'] = $workOrder->formNvaSuratPemeriksaanRutin) {
            $formId = $data['formNvaSuratPemeriksaanRutin']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formNvaSuratPemeriksaanRutin']->tanggal));
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }

            $pdf = $this->createPdf('report.form-report.form-nva-surat-pemeriksaan-rutin', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }

        if ($data['formNvaSuratPerbaikanGangguan'] = $workOrder->formNvaSuratPerbaikanGangguan) {
            $formId = $data['formNvaSuratPerbaikanGangguan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formNvaSuratPerbaikanGangguan']->tanggal));
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }

            $pdf = $this->createPdf('report.form-report.form-nva-surat-perbaikan-gangguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }
        
        if ($workOrder->formNvaHFCPapiHarians->isNotEmpty()) {
            $data['formNvaHFCPapiHarians'] = $workOrder->formNvaHFCPapiHarians;
            $formId = $data['formNvaHFCPapiHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['hari'] = strtoupper(
                Carbon::parse($data['work_order']->date_generate)
                    ->locale('id')
                    ->isoFormat('dddd'),
            );
            $data['tanggal'] = Carbon::parse($data['work_order']->date_generate)
                ->locale('id')
                ->isoFormat('DD-MM-YYYY');
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['technicalGroups'] = [];
            $data['userTechnicals'] = [];
            $data['userTechnicals2'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                $data['technicalGroups'][] = $userGroup->name;
            }
            foreach ($data['work_order']->userGroups as $key => $userGroup) {
                if ($key == 0) {
                    foreach ($userGroup->customUserTechnicals as $userTechnical) {
                        $data['userTechnicals'][] = $userTechnical->name;
                    }
                }
            }
            foreach ($data['work_order']->userGroups as $key => $userGroup) {
                if ($key != 0) {
                    foreach ($userGroup->customUserTechnicals as $userTechnical) {
                        $data['userTechnicals2'][] = $userTechnical->name;
                    }
                }    
            }
            $pdf = $this->createPdf('report.form-report.form-nva-hfc-papi-harian', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }

        if ($workOrder->formNvaConstantCurrentRegulations->isNotEmpty()) {
            $data['formNvaConstantCurrentRegulations'] = $workOrder->formNvaConstantCurrentRegulations;
            $formId = $data['formNvaConstantCurrentRegulations'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['technicalGroups'] = [];
            $data['userTechnicals'] = [];
            $data['userTechnicals2'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                $data['technicalGroups'][] = $userGroup->name;
            }
            foreach ($data['work_order']->userGroups as $key => $userGroup) {
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
            $pdf = $this->createPdf('report.form-report.form-nva-ccr-harian', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }
        
        if ($workOrder->formNvaConstantCurrentRegulationDuas->isNotEmpty()) {
            $data['formNvaConstantCurrentRegulationDuas'] = $workOrder->formNvaConstantCurrentRegulationDuas;
            $formId = $data['formNvaConstantCurrentRegulationDuas'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['tanggal'] = Carbon::parse($data['work_order']->date_generate)
                ->locale('id')
                ->isoFormat('DD-MM-YYYY');
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['technicalGroups'] = [];
            $data['userTechnicals'] = [];
            $data['userTechnicals2'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                $data['technicalGroups'][] = $userGroup->name;
            }
            foreach ($data['work_order']->userGroups as $key => $userGroup) {
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
            $pdf = $this->createPdf('report.form-report.form-nva-ccrdua-harian', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }
        // if ($workOrder->formNvaUraianPerbaikanHarian) {
        //     $data['formNvaUraianPerbaikanHarian'] = $workOrder->formNvaUraianPerbaikanHarian;
        //     $formId = $data['formNvaUraianPerbaikanHarian']->form_id;
        //     $getUserId = FormActivityLog::where('work_order_id', $id)
        //         ->where('status', 'end')
        //         ->where('form_id', $formId)
        //         ->orderBy('id', 'desc')
        //         ->first();
        //     $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
        //     $data['userTechnicals'] = [];
        //     foreach ($data['work_order']->userGroups as $userGroup) {
        //         foreach ($userGroup->customUserTechnicals as $userTechnical) {
        //             $data['userTechnicals'][] = $userTechnical->name;
        //         }
        //     }

        //     foreach ($data['work_order']->userTechnicals as $userTechnical) {
        //         $data['userTechnicals'][] = $userTechnical->name;
        //     }
        //     $pdf = $this->createPdf('report.form-report.form-nva-uraian-perbaikan', [0, 0, 609.4488, 935.433], 'portrait', $data);
        //     $m->addRaw($pdf->output());
        // }

        //Soulth Visual Aid (SVA)
        if ($workOrder->formSvaChecklist1Harians->isNotEmpty()) {
            $data['formSvaChecklist1Harians'] = $workOrder->formSvaChecklist1Harians;

            $formId = $data['formSvaChecklist1Harians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-sva-cheklist1-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formSvaChecklist2Harians->isNotEmpty()) {
            $data['formSvaChecklist2Harians'] = $workOrder->formSvaChecklist2Harians;

            $formId = $data['formSvaChecklist2Harians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-sva-cheklist2-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($data['formSvaSuratIzinPelaksanaanPekerjaan'] = $workOrder->formSvaSuratIzinPelaksanaanPekerjaan) {
            $formId = $data['formSvaSuratIzinPelaksanaanPekerjaan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['assetMaterials'] = AssetMaterial::where('asset_id', $data['work_order']->asset_id)
                ->with(['bom'])
                ->get();
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSvaSuratIzinPelaksanaanPekerjaan']->tanggal));
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }

            $pdf = $this->createPdf('report.form-report.form-sva-surat-izin-pelaksanaan-pekerjaan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }
        if ($data['formSvaSuratPemeriksaanRutin'] = $workOrder->formSvaSuratPemeriksaanRutin) {
            $formId = $data['formSvaSuratPemeriksaanRutin']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSvaSuratPemeriksaanRutin']->tanggal));
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }

            $pdf = $this->createPdf('report.form-report.form-sva-surat-pemeriksaan-rutin', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }

        if ($data['formSvaSuratPerbaikanGangguan'] = $workOrder->formSvaSuratPerbaikanGangguan) {
            $formId = $data['formSvaSuratPerbaikanGangguan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSvaSuratPerbaikanGangguan']->tanggal));
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }

            $pdf = $this->createPdf('report.form-report.form-sva-surat-perbaikan-gangguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }
        if ($workOrder->formSvaHFCPapiHarians->isNotEmpty()) {
            $data['formSvaHFCPapiHarians'] = $workOrder->formSvaHFCPapiHarians;
            $formId = $data['formSvaHFCPapiHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['hari'] = strtoupper(
                Carbon::parse($data['work_order']->date_generate)
                    ->locale('id')
                    ->isoFormat('dddd'),
            );
            $data['tanggal'] = Carbon::parse($data['work_order']->date_generate)
                ->locale('id')
                ->isoFormat('DD-MM-YYYY');
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['technicalGroups'] = [];
            $data['userTechnicals'] = [];
            $data['userTechnicals2'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                $data['technicalGroups'][] = $userGroup->name;
            }
            foreach ($data['work_order']->userGroups as $key => $userGroup) {
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
            $pdf = $this->createPdf('report.form-report.form-sva-hfc-papi-harian', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formSvaConstantCurrentRegulations->isNotEmpty()) {
            $data['formSvaConstantCurrentRegulations'] = $workOrder->formSvaConstantCurrentRegulations;
            $formId = $data['formSvaConstantCurrentRegulations'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['technicalGroups'] = [];
            $data['userTechnicals'] = [];
            $data['userTechnicals2'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                $data['technicalGroups'][] = $userGroup->name; 
            }
            foreach ($data['work_order']->userGroups as $key => $userGroup) {
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
            $pdf = $this->createPdf('report.form-report.form-sva-ccr-harian', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formSvaUraianPerbaikanHarian) {
            $data['formSvaUraianPerbaikanHarian'] = $workOrder->formSvaUraianPerbaikanHarian;
            $formId = $data['formSvaUraianPerbaikanHarian']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $pdf = $this->createPdf('report.form-report.form-sva-uraian-perbaikan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        //HV & MV STATION (HMV)

        if ($workOrder->formHmvGisBulanan) {
            $data['formHmvGisBulanan'] = $workOrder->formHmvGisBulanan;

            $formId = $data['formHmvGisBulanan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-gis-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvGisTigaBulanans->isNotEmpty()) {
            $data['formHmvGisTigaBulanans'] = $workOrder->formHmvGisTigaBulanans;

            $formId = $data['formHmvGisTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-gis-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvGisTahunans->isNotEmpty()) {
            $data['formHmvGisTahunans'] = $workOrder->formHmvGisTahunans;

            $formId = $data['formHmvGisTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-gis-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvGisDuaTahunans->isNotEmpty()) {
            $data['formHmvGisDuaTahunans'] = $workOrder->formHmvGisDuaTahunans;

            $formId = $data['formHmvGisDuaTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-gis-dua-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvGisKondisionals->isNotEmpty()) {
            $data['formHmvGisKondisionals'] = $workOrder->formHmvGisKondisionals;

            $formId = $data['formHmvGisKondisionals'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-gis-kondisional', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvMeteranHarians->isNotEmpty() || $workOrder->formHmvMeteran2Harians->isNotEmpty()) {
            $data['formHmvMeteranHarians'] = $workOrder->formHmvMeteranHarians;
            $data['formHmvMeteran2Harians'] = $workOrder->formHmvMeteran2Harians;

            $formId = $data['formHmvMeteranHarians'][0]->form_id;
            $data['act'] = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();

            if ($getUserId->user_technical_id != null) {
                $userId = $getUserId->user_technical_id;
                $dataUser = User::where('id', $userId)->first();
                $userName = $dataUser->name;
                $data['userName'] = $dataUser->name;
                $data['qrCode'] = QrCode::generate($userId . ' - ' . $userName);
            } else {
                $data['qrCode'] = 'kosong';
            }

            if ($workOrder->approve_user_id != null) {
                $userId = $workOrder->approve_user_id;
                $dataUser = User::where('id', $userId)->first();
                $userName = $dataUser->name;
                $data['userNameAdmin'] = $dataUser->name;
                $data['qrCodeAdmin'] = QrCode::generate($userId . ' - ' . $userName);
            } else {
                $data['qrCodeAdmin'] = 'kosong';
            }

            $time_record_date = new DateTime($getUserId['time_record']); // Convert the string to a DateTime object
            $data['tanggal'] = $time_record_date->format('Y-m-d');
            $data['jam'] = $time_record_date->format('H:i:s');

            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-meteran-harian', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        // log book harian hmv
        // if($workOrder->formHmvMeteranHarians->isNotEmpty() || $workOrder->formHmvMeteran2Harians->isNotEmpty()){
        //     $data['formHmvMeteranHarians'] = $workOrder->formHmvMeteranHarians;
        //     $data['formHmvMeteran2Harians'] = $workOrder->formHmvMeteran2Harians;

        //     $formId = $data['formHmvMeteranHarians'][0]->form_id;
        //     $data['act'] = FormActivityLog::where('work_order_id', $id)->where('status', 'end')->where('form_id', $formId)->orderBy('id', 'desc')->first();
        //     $getUserId = FormActivityLog::where('work_order_id', $id)->where('status', 'end')->where('form_id', $formId)->orderBy('id', 'desc')->first();
        //     $time_record_date = new DateTime($getUserId['time_record']); // Convert the string to a DateTime object
        //     $data['tanggal'] = $time_record_date->format('Y-m-d');
        //     $data['jam'] = $time_record_date->format('H:i:s');

        //     $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first(): null;
        // $data['tanggal'] = '06 Febrari 2023';
        // $data['hari'] = 'Senin';
        // $data['shift'] = 'PS';
        // $data['formHmvLogHarians'] = [
        //     [
        //         'jam' => '07:00',
        //         'uraian_kejadian' => 'Aplus dinas M ke PS',
        //         'tindak_lanjut' => 'Pergantian Shif jaga operator SGI BSH',
        //         'selesai' => '07:15',
        //         'hasil' => 'Normal',
        //         'ket' => 'Normal'
        //     ],
        //     [
        //         'jam' => '07:00',
        //         'uraian_kejadian' => 'Aplus dinas M ke PS',
        //         'tindak_lanjut' => 'Pergantian Shif jaga operator SGI BSH',
        //         'selesai' => '07:15',
        //         'hasil' => 'Normal',
        //         'ket' => 'Normal'
        //     ],
        // ];
        // $pdf = $this->createPdf('report.form-report.form-hmv-log-harian', [0, 0, 609.4488, 935.433], 'landscape', $data);
        // $m->addRaw($pdf->output());
        // }
        

        if ($workOrder->formHmvGisAHarians->isNotEmpty() || $workOrder->formHmvGisBHarians->isNotEmpty() || $workOrder->formHmvGisCHarians->isNotEmpty()) {
            $data['formHmvGisAHarians'] = $workOrder->formHmvGisAHarians;
            $data['formHmvGisBHarians'] = $workOrder->formHmvGisBHarians;
            $data['formHmvGisCHarians'] = $workOrder->formHmvGisCHarians;

            $formId = $data['formHmvGisAHarians'][0]->form_id;
            $data['act'] = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $time_record_date = new DateTime($getUserId['time_record']); // Convert the string to a DateTime object
            $data['tanggal'] = $time_record_date->format('Y-m-d');
            $data['jam'] = $time_record_date->format('H:i:s');

            if ($getUserId->user_technical_id != null) {
                $userId = $getUserId->user_technical_id;
                $dataUser = User::where('id', $userId)->first();
                $userName = $dataUser->name;
                $data['userName'] = $dataUser->name;
                $data['qrCode'] = QrCode::generate($userId . ' - ' . $userName);
            } else {
                $data['qrCode'] = 'kosong';
            }

            if ($workOrder->approve_user_id != null) {
                $userId = $workOrder->approve_user_id;
                $dataUser = User::where('id', $userId)->first();
                $userName = $dataUser->name;
                $data['userNameAdmin'] = $dataUser->name;
                $data['qrCodeAdmin'] = QrCode::generate($userId . ' - ' . $userName);
            } else {
                $data['qrCodeAdmin'] = 'kosong';
            }

            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-gis-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvPanelTmHarians->isNotEmpty()) {
            $data['formHmvPanelTmHarians'] = $workOrder->formHmvPanelTmHarians;

            $formId = $data['formHmvPanelTmHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $time_record_date = new DateTime($getUserId['time_record']); // Convert the string to a DateTime object
            $data['tanggal'] = $time_record_date->format('Y-m-d');
            $data['jam'] = $time_record_date->format('H:i:s');

            if ($getUserId->user_technical_id != null) {
                $userId = $getUserId->user_technical_id;
                $dataUser = User::where('id', $userId)->first();
                $userName = $dataUser->name;
                $data['userName'] = $dataUser->name;
                $data['qrCode'] = QrCode::generate($userId . ' - ' . $userName);
            } else {
                $data['qrCode'] = 'kosong';
            }

            if ($workOrder->approve_user_id != null) {
                $userId = $workOrder->approve_user_id;
                $dataUser = User::where('id', $userId)->first();
                $userName = $dataUser->name;
                $data['userNameAdmin'] = $dataUser->name;
                $data['qrCodeAdmin'] = QrCode::generate($userId . ' - ' . $userName);
            } else {
                $data['qrCodeAdmin'] = 'kosong';
            }

            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-panel-tm-harian', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvPanelBulanans->isNotEmpty()) {
            $data['formHmvPanelBulanans'] = $workOrder->formHmvPanelBulanans;

            $formId = $data['formHmvPanelBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-panel-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvPanelTigaBulanans->isNotEmpty()) {
            $data['formHmvPanelTigaBulanans'] = $workOrder->formHmvPanelTigaBulanans;

            $formId = $data['formHmvPanelTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-panel-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvPowerMingguans->isNotEmpty()) {
            $data['formHmvPowerMingguans'] = $workOrder->formHmvPowerMingguans;
            $data['judul'] = 'PEMELIHARAAN MINGGUAN POWER TRANSFORMER';
            $data['pilihan2'] = [['nilai1' => 'kurang', 'nilai2' => 'Kurang'], ['nilai1' => 'ada-hostpot', 'nilai2' => 'ada hotspot'], ['nilai1' => 'tidak-baik', 'nilai2' => 'Tidak Baik'], ['nilai1' => 'rembes', 'nilai2' => 'rembes']];
            $formId = $data['formHmvPowerMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-power-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvPowerBulanans->isNotEmpty()) {
            $data['formHmvPowerBulanans'] = $workOrder->formHmvPowerBulanans;
            $data['judul'] = 'PEMELIHARAAN BULANAN POWER TRANSFORMER';

            $data['pilihan1'] = [['nilai1' => 'dalam-level', 'nilai2' => 'Dalam level'], ['nilai1' => 'baik', 'nilai2' => 'Baik'], ['nilai1' => 'cek', 'nilai2' => 'cek'], ['nilai1' => 'baik', 'nilai2' => 'Baik'], ['nilai1' => 'baik', 'nilai2' => 'Baik']];

            $data['pilihan2'] = [['nilai1' => 'tidak-dalam-level', 'nilai2' => 'Tidak dalam Level'], ['nilai1' => 'ada-hostpot', 'nilai2' => 'Ada Hotspot'], ['nilai1' => 'none', 'nilai2' => 'none'], ['nilai1' => 'rembes', 'nilai2' => 'Rembes'], ['nilai1' => 'tidak-baik', 'nilai2' => 'Tidak Baik']];

            $formId = $data['formHmvPowerBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-power-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvPowerTigaBulanans->isNotEmpty()) {
            $data['formHmvPowerTigaBulanans'] = $workOrder->formHmvPowerTigaBulanans;
            $data['judul'] = 'PEMELIHARAAN TIGA BULANAN POWER TRANSFORMER';

            $data['pilihan1'] = [['nilai1' => 'bocor', 'nilai2' => 'Bocor'], ['nilai1' => 'berfungsi', 'nilai2' => 'Berfungsi'], ['nilai1' => 'normal', 'nilai2' => 'Normal'], ['nilai1' => 'dalam-level-normal', 'nilai2' => 'Dalam level Normal'], ['nilai1' => 'normal', 'nilai2' => 'Normal'], ['nilai1' => 'berfungsi', 'nilai2' => 'Berfungsi'], ['nilai1' => 'baik', 'nilai2' => 'Baik'], ['nilai1' => 'baik', 'nilai2' => 'Baik']];

            $data['pilihan2'] = [['nilai1' => 'tidak-bocor', 'nilai2' => 'Tidak Bocor'], ['nilai1' => 'tidak-berfungsi', 'nilai2' => 'Tidak Berfungsi'], ['nilai1' => 'tidak-normal', 'nilai2' => 'Tidak Normal'], ['nilai1' => 'tidak-dalam-level-normal', 'nilai2' => 'Tidak dalam level normal'], ['nilai1' => 'ada-hotspot', 'nilai2' => 'Ada hotspot'], ['nilai1' => 'tidak-berfungsi', 'nilai2' => 'Tidak Berfungsi'], ['nilai1' => 'tidak-rusak', 'nilai2' => 'Tidak Rusak'], ['nilai1' => 'tidak-rusak', 'nilai2' => 'Tidak Rusak']];

            $formId = $data['formHmvPowerTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-power-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvPowerEnamBulanans->isNotEmpty()) {
            $data['formHmvPowerEnamBulanans'] = $workOrder->formHmvPowerEnamBulanans;
            $data['judul'] = 'PEMELIHARAAN ENAM BULANAN POWER TRANSFORMER';

            $data['pilihan1'] = [['nilai1' => '', 'nilai2' => ''], ['nilai1' => 'normal', 'nilai2' => 'Normal']];

            $data['pilihan2'] = [['nilai1' => '', 'nilai2' => ''], ['nilai1' => 'caution', 'nilai2' => 'Caution']];

            $data['pilihan3'] = [['nilai1' => '', 'nilai2' => ''], ['nilai1' => 'warning', 'nilai2' => 'Warning']];

            $data['table'] = [['gases_generated' => 'Hydrogen (H2)', 'normal' => '100', 'caution' => '101-700', 'warning' => '>700'], ['gases_generated' => 'Aentylene (C2H2)', 'normal' => '35', 'caution' => '36-45', 'warning' => '>45'], ['gases_generated' => 'Ethylene (C2H4)', 'normal' => '50', 'caution' => '51-100', 'warning' => '>100'], ['gases_generated' => 'Ethane (C2H6)', 'normal' => '65', 'caution' => '66-100', 'warning' => '>100'], ['gases_generated' => 'Methane (CH4)', 'normal' => '120', 'caution' => '121-400', 'warning' => '>400'], ['gases_generated' => 'Carbon Monoxide (CO)', 'normal' => '350', 'caution' => '351-570', 'warning' => '>570'], ['gases_generated' => 'Carbon Dioxide (CO2)', 'normal' => '5000', 'caution' => '5000-10000', 'warning' => '>10000']];

            $formId = $data['formHmvPowerEnamBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-power-Enam-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvPowerTahunans->isNotEmpty()) {
            $data['formHmvPowerTahunans'] = $workOrder->formHmvPowerTahunans;

            $formId = $data['formHmvPowerTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-power-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvPowerDuaTahunans->isNotEmpty()) {
            $data['formHmvPowerDuaTahunans'] = $workOrder->formHmvPowerDuaTahunans;
            $data['judul'] = 'PEMELIHARAAN DUA TAHUNAN POWER TRANSFORMER';

            $data['pilihan1'] = [['nilai1' => 'ada-kerusakan', 'nilai2' => 'Ada Kerusakan'], ['nilai1' => 'ada-karat', 'nilai2' => 'Ada Karat'], ['nilai1' => 'input', 'nilai2' => 'input'], ['nilai1' => 'bising', 'nilai2' => 'bising'], ['nilai1' => 'dalam-batas-aman', 'nilai2' => 'Dalam Batas Aman']];

            $data['pilihan2'] = [['nilai1' => 'tidak-ada-kerusakan', 'nilai2' => 'Tidak Ada Kerusakan'], ['nilai1' => 'tidak-ada-karat', 'nilai2' => 'Tidak Ada Karat'], ['nilai1' => 'input', 'nilai2' => 'input'], ['nilai1' => 'tidak-bising', 'nilai2' => 'Tidak Bising'], ['nilai1' => 'diluar-batas-aman', 'nilai2' => 'Di luar Batas Aman']];

            $formId = $data['formHmvPowerDuaTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-power-dua-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formHmvPowerKondisionals->isNotEmpty()) {
            $data['formHmvPowerKondisionals'] = $workOrder->formHmvPowerKondisionals;
            $data['judul'] = 'PEMELIHARAAN KONDISIONAL POWER TRANSFORMER';

            $data['pilihan1'] = [['nilai1' => 'ada-kerusakan', 'nilai2' => 'Ada Kerusakan'], ['nilai1' => 'ada-karat', 'nilai2' => 'Ada Karat'], ['nilai1' => 'input', 'nilai2' => 'input'], ['nilai1' => 'bising', 'nilai2' => 'bising'], ['nilai1' => 'dalam-batas-aman', 'nilai2' => 'Dalam Batas Aman'], ['nilai1' => 'dalam-batas-aman', 'nilai2' => 'Dalam Batas Aman'], ['nilai1' => 'dalam-batas-aman', 'nilai2' => 'Dalam Batas Aman'], ['nilai1' => 'dalam-batas-aman', 'nilai2' => 'Dalam Batas Aman']];

            $data['pilihan2'] = [['nilai1' => 'tidak-ada-kerusakan', 'nilai2' => 'Tidak Ada Kerusakan'], ['nilai1' => 'tidak-ada-karat', 'nilai2' => 'Tidak Ada Karat'], ['nilai1' => 'input', 'nilai2' => 'input'], ['nilai1' => 'tidak-bising', 'nilai2' => 'Tidak Bising'], ['nilai1' => 'diluar-batas-aman', 'nilai2' => 'Di luar Batas Aman'], ['nilai1' => 'diluar-batas-aman', 'nilai2' => 'Di luar Batas Aman'], ['nilai1' => 'diluar-batas-aman', 'nilai2' => 'Di luar Batas Aman'], ['nilai1' => 'diluar-batsas-aman', 'nilai2' => 'Di luar Batas Aman']];

            $data['input'] = ['nilai', 'ceklist', 'nilai', 'nilai1', 'ceklist', 'none', 'none', 'none'];

            $data['satuan'] = ['Jumlah gangguan/waktu', '', '< 5 ppm (1)', 'A', '', '', '', ''];

            $formId = $data['formHmvPowerKondisionals'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-hmv-power-kondisional', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        //Electrical Utility (ELE)
        if ($workOrder->formEleChecklist1Harians->isNotEmpty()) {
            $data['formEleChecklist1Harians'] = $workOrder->formEleChecklist1Harians;
            $data['formEleChecklist1HarianUtaras'] = FormEleChecklist1Harian::where('work_order_id', $workOrder->id)
                ->where('posisi', 'utara')
                ->orderBy('id', 'asc')
                ->get();

            $data['formEleChecklist1HarianSelatans'] = FormEleChecklist1Harian::where('work_order_id', $workOrder->id)
                ->where('posisi', 'selatan')
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formEleChecklist1Harians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ele-cheklist1-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // if ($workOrder->formElePemeliharaanTahunans->isNotEmpty()) {
        //     $data['formElePemeliharaanTahunans'] = $workOrder->formElePemeliharaanTahunans;

        //     $formId = $data['formElePemeliharaanTahunans'][0]->form_id;
        //     $getUserId = FormActivityLog::where('work_order_id', $id)
        //         ->where('status', 'end')
        //         ->where('form_id', $formId)
        //         ->orderBy('id', 'desc')
        //         ->first();
        //     $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
        //     $pdf = $this->createPdf('report.form-report.form-ele-pemeliharaan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
        //     $m->addRaw($pdf->output());
        // }

        if ($workOrder->formEleChecklist2Harians->isNotEmpty()) {
            $data['formEleChecklist2Harians'] = $workOrder->formEleChecklist2Harians;
            $data['formEleChecklist2HarianUtaras'] = FormEleChecklist2Harian::where('work_order_id', $workOrder->id)
                ->where('posisi', 'utara')
                ->orderBy('id', 'asc')
                ->get();

            $data['formEleChecklist2HarianSelatans'] = FormEleChecklist2Harian::where('work_order_id', $workOrder->id)
                ->where('posisi', 'selatan')
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formEleChecklist2Harians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ele-cheklist2-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // historical ELE
        // if($workOrder->formEleChecklist2Harians->isNotEmpty()){
        // $data['historical'] = [
        //     [
        //         'tanggal' => '20/07/2023',
        //         'uraian' => 'Completed',
        //         'teknisi' => 'Agung',
        //     ],
        //     [
        //         'tanggal' => '21/07/2023',
        //         'uraian' => 'Pemeriksaan Harian',
        //         'teknisi' => 'Dimas',
        //     ],
        //     [
        //         'tanggal' => '22/07/2023',
        //         'uraian' => 'Pemeriksaan Dua Mingguan',
        //         'teknisi' => 'Yuda',
        //     ],
        // ];
        // $pdf = $this->createPdf('report.form-report.form-ele-historical', [0, 0, 609.4488, 935.433], 'portrait', $data);
        // $m->addRaw($pdf->output());
        // }

        // AEW
        if ($workOrder->formAewParCarHarians->isNotEmpty()) {
            $data['formAewParCarHarians'] = $workOrder->formAewParCarHarians;
            $formId = $data['formAewParCarHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-aew-par-car-harian', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formAewPkppkHarians->isNotEmpty()) {
            $data['formAewPkppkHarians'] = $workOrder->formAewPkppkHarians;
            $formId = $data['formAewPkppkHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-aew-pkppk-harian', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formAewRubberRemoverHarians->isNotEmpty()) {
            $data['formAewRubberRemoverHarians'] = $workOrder->formAewRubberRemoverHarians;
            $formId = $data['formAewRubberRemoverHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-aew-rubber-remover-harian', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->checklistGensetPhAocc) {
            $data['checklistGensetPhAocc'] = $workOrder->checklistGensetPhAocc;
            $formId = $data['checklistGensetPhAocc']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-genset-ph-aocc-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if($workOrder->formPs2PanelPhAoccs->isNotEmpty()){
            $data['datas'] = FormPs2::formPs2PanelPhAocc();
            $formPs2PanelPhAoccs = $workOrder->formPs2PanelPhAoccs;
        $data['panelLvmdps'] = $formPs2PanelPhAoccs
            ->filter(function ($workOrder) {
                return $workOrder->group == 'panel_lvmdp';
            })
            ->values();
        $data['panelActsGensets'] = $formPs2PanelPhAoccs
            ->filter(function ($workOrder) {
                return $workOrder->group == 'panel_acts_genset';
            })
            ->values();

        $data['acts'] = $formPs2PanelPhAoccs
            ->filter(function ($workOrder) {
                return $workOrder->group == 'acts';
            })
            ->values();

        $data['mainDistributionPanels'] = $formPs2PanelPhAoccs
            ->filter(function ($workOrder) {
                return $workOrder->group == 'main_distribution_panel';
            })
            ->values();
            $formId = $formPs2PanelPhAoccs[0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-panel-ph-aocc', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->checklistHarianGensetPs2ControlRoom && $workOrder->checklistHarianGensetPs2GensetRooms->isNotEmpty()) {
            $data['gensetRoomLists'] = [
                [
                    'title' => 'Mode operasi kontrol genset(Deif)',
                    'keterangan' => 'Auto / Semi / Man / Off',
                ],
                [
                    'title' => 'Tegangan battery starter ( ≥24 Vdc )',
                    'keterangan' => 'Vdc',
                ],
                [
                    'title' => 'Kondisi Battery charger',
                    'keterangan' => 'On / Off',
                ],
                [
                    'title' => 'Kondisi indikator Battery Starter',
                    'keterangan' => 'Hijau / Clear',
                ],
                [
                    'title' => 'Lampu indikator ECU',
                    'keterangan' => 'On / Blinking / Off',
                ],
                [
                    'title' => 'Panel Motor fan radiator',
                    'keterangan' => 'Man / Off / Auto',
                ],
                [
                    'title' => 'Panel Exhaust fan',
                    'keterangan' => 'Man / Off / Auto',
                ],
                [
                    'title' => 'Level Oli mesin',
                    'keterangan' => 'low / med / max',
                ],
                [
                    'title' => 'Level air radiator',
                    'keterangan' => 'low / med / max',
                ],
                [
                    'title' => 'Level bbm tangki harian',
                    'keterangan' => '(%) Liter ',
                ],
                [
                    'title' => 'Indikator filter udara intake',
                    'keterangan' => 'green / yellow / red',
                ],
                [
                    'title' => 'Water heater pump',
                    'keterangan' => 'On / Off',
                ],
                [
                    'title' => 'Oil / engine temperature ( 27 - 98 °C )',
                    'keterangan' => '°C',
                ],
                [
                    'title' => 'Valve bbm genset',
                    'keterangan' => 'Open / Close',
                ],
                [
                    'title' => 'Kondisi Switch Battery',
                    'keterangan' => 'Open / Close',
                ],
            ];
            $data['checklistHarianGensetPs2ControlRoom'] = $workOrder->checklistHarianGensetPs2ControlRoom;
            $data['checklistHarianGensetPs2GensetRooms'] = $workOrder->checklistHarianGensetPs2GensetRooms;
            $formId = $data['checklistHarianGensetPs2GensetRooms'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-genset-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs2GensetPhAoccDuaMingguans->isNotEmpty()) {
            $data['formPs2GensetPhAoccDuaMingguans'] = $workOrder->formPs2GensetPhAoccDuaMingguans;
            $formId = $data['formPs2GensetPhAoccDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-genset-ph-aocc-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs2GroundTankDuaMingguans->isNotEmpty()) {
            $data['formPs2GroundTankDuaMingguans'] = $workOrder->formPs2GroundTankDuaMingguans;
            $formId = $data['formPs2GroundTankDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-ground-tank-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs2GensetDuaMingguans->isNotEmpty()) {
            $data['formPs2GensetDuaMingguans'] = $workOrder->formPs2GensetDuaMingguans;
            $formId = $data['formPs2GensetDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-genset-dua-mingguan-ps2', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs2GensetDuaMingguanGensets->isNotEmpty() && $workOrder->formPs2GensetDuaMingguanTrafos->isNotEmpty() && $workOrder->formPs2GensetDuaMingguanTanks->isNotEmpty()) {
            $data['formPs2GensetDuaMingguanGensets'] = $workOrder->formPs2GensetDuaMingguanGensets;
            $data['formPs2GensetDuaMingguanTrafos'] = $workOrder->formPs2GensetDuaMingguanTrafos;
            $data['formPs2GensetDuaMingguanTanks'] = $workOrder->formPs2GensetDuaMingguanTanks;

            $formId = $data['formPs2GensetDuaMingguanTanks'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-genset-dua-mingguan-mps2', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs2PanelDuaMingguans->isNotEmpty()) {
            $data['formPs2PanelDuaMingguans'] = $workOrder->formPs2PanelDuaMingguans;
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
            $formId = $data['formPs2PanelDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-panel-dua-mingguan', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs2PanelHarians->isNotEmpty()) {
            $data['formPs2PanelHarians'] = $workOrder->formPs2PanelHarians;
            $formId = $data['formPs2PanelHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-panel-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs2ChecklistPanelLvHarians->isNotEmpty()) {
            $dbFormPs2ChecklistPanelLvHarians = $workOrder->formPs2ChecklistPanelLvHarians;
            $data['cubicles'] = ['incoming1', 'rak1', 'rak2', 'coupler', 'incoming2', 'rak3', 'rak4', 'panelOutGoingAocc'];
            $data['incoming1s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'INCOMING I';
            })
            ->values();
        $data['rak1s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'RAK I';
            })
            ->values();
        $data['rak2s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'RAK II';
            })
            ->values();
        $data['couplers'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'COUPLER';
            })
            ->values();
        $data['incoming2s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'INCOMING II';
            })
            ->values();
        $data['rak3s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'RAK III';
            })
            ->values();
        $data['rak4s'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'RAK IV';
            })
            ->values();
        $data['panelOutGoingAoccs'] = $dbFormPs2ChecklistPanelLvHarians
            ->filter(function ($item) {
                return $item->cubicle == 'Panel Outgoing AOCC';
            })
            ->values();
            $formId = $dbFormPs2ChecklistPanelLvHarians[0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-checklist-panel-lv-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // if ($workOrder->formPs2GensetPhAoccHarian) {
        //     $data['formPs2GensetPhAoccHarian'] = $workOrder->formPs2GensetPhAoccHarian;
        //     $formId = $data['formPs2GensetPhAoccHarian']->form_id;
        //     $getUserId = FormActivityLog::where('work_order_id', $id)
        //         ->where('status', 'end')
        //         ->where('form_id', $formId)
        //         ->orderBy('id', 'desc')
        //         ->first();
        //     $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
        //     $pdf = $this->createPdf('report.form-report.form-ps2-panel-lv-harian-backup', [0, 0, 609.4488, 935.433], 'portrait', $data);
        //     $m->addRaw($pdf->output());
        // }

        if ($workOrder->FormPs2GensetRunningHarianKeterangan && $workOrder->FormPs2GensetRunningHarians->isNotEmpty()) {
            $data['FormPs2GensetRunningHarianKeterangan'] = $workOrder->FormPs2GensetRunningHarianKeterangan;
            $data['FormPs2GensetRunningHarians'] = $workOrder->FormPs2GensetRunningHarians;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', 31)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-genset-running', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs2RuangTenagaDuaMingguans->isNotEmpty()) {
            $data['er1a'] = $workOrder->formPs2RuangTenagaDuaMingguans->where('grup', 'er1a');
            $data['er1b'] = $workOrder->formPs2RuangTenagaDuaMingguans->where('grup', 'er1b');
            $data['er2a'] = $workOrder->formPs2RuangTenagaDuaMingguans->where('grup', 'er2a');
            $data['er2b'] = $workOrder->formPs2RuangTenagaDuaMingguans->where('grup', 'er2b');
            $data['lv'] = $workOrder->formPs2RuangTenagaDuaMingguans->where('grup', 'lv');
            $data['mv'] = $workOrder->formPs2RuangTenagaDuaMingguans->where('grup', 'mv');
            $formId = $workOrder->formPs2RuangTenagaDuaMingguans[0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-ruang-tenaga-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs2PemeliharaanEnamBulanans->isNotEmpty()) {
            $formPs2PemeliharaanEnamBulanans = $workOrder->formPs2PemeliharaanEnamBulanans;

            $data['panelMv20Kvs'] = $formPs2PemeliharaanEnamBulanans
            ->filter(function ($item) {
                return $item->group_spesifikasi_pemeliharaan == 'PANEL MV 20 KV';
            })
            ->values();

            $data['kabel20Kvs'] = $formPs2PemeliharaanEnamBulanans
            ->filter(function ($item) {
                return $item->group_spesifikasi_pemeliharaan == 'KABEL 20 KV';
            })
            ->values();

            $formId = $formPs2PemeliharaanEnamBulanans[0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps2-pemeliharaan-enam-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // -------------------------
        // SNT
        if ($workOrder->formSntChecklistSewageTreatmentPlantHarians->isNotEmpty()) {
            $data['formSntChecklistSewageTreatmentPlantHarians'] = $workOrder->formSntChecklistSewageTreatmentPlantHarians;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSntChecklistSewageTreatmentPlantHarians'][0]->created_at));
            $data['tanggalWo1'] = date('H:i', strtotime($data['formSntChecklistSewageTreatmentPlantHarians'][0]->created_at));
            $data['tanggalWo2'] = date('H:i', strtotime($data['formSntChecklistSewageTreatmentPlantHarians'][0]->updated_at));
            $formId = $data['formSntChecklistSewageTreatmentPlantHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-sewage-treatment-plant-harian', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formSntPerawatanSewageTreatmentPlantHarians->isNotEmpty()) {
            $data['formSntPerawatanSewageTreatmentPlantHarians'] = $workOrder->formSntPerawatanSewageTreatmentPlantHarians;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSntPerawatanSewageTreatmentPlantHarians'][0]->updated_at));
            $data['tanggalWo1'] = date('H:i', strtotime($data['formSntPerawatanSewageTreatmentPlantHarians'][0]->created_at));
            $data['tanggalWo2'] = date('H:i', strtotime($data['formSntPerawatanSewageTreatmentPlantHarians'][0]->updated_at));
            $formId = $data['formSntPerawatanSewageTreatmentPlantHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-perawatan-sewage-treatment-plant-harian', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formSntChecklistLiftingPumps->isNotEmpty()) {
            $data['formSntChecklistLiftingPumps'] = $workOrder->formSntChecklistLiftingPumps;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSntChecklistLiftingPumps'][0]->created_at));
            $formId = $data['formSntChecklistLiftingPumps'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-lifting-pump', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formSntChecklistLiftingPumpHarians->isNotEmpty()) {
            $data['formSntChecklistLiftingPumpHarians'] = $workOrder->formSntChecklistLiftingPumpHarians;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSntChecklistLiftingPumpHarians'][0]->created_at));
            $data['tanggalWo1'] = date('H:i', strtotime($data['formSntChecklistLiftingPumpHarians'][0]->created_at));
            $data['tanggalWo2'] = date('H:i', strtotime($data['formSntChecklistLiftingPumpHarians'][0]->updated_at));
            $formId = $data['formSntChecklistLiftingPumpHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-lifting-pump-harian', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formSntChecklistDelacerationHarians->isNotEmpty()) {
            $data['formSntChecklistDelacerationHarians'] = $workOrder->formSntChecklistDelacerationHarians;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSntChecklistDelacerationHarians'][0]->created_at));
            $formId = $data['formSntChecklistDelacerationHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-delaceration-harian', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formSntPerawatanT3VIPs->isNotEmpty()) {
            $data['formSntPerawatanT3VIPs'] = $workOrder->formSntPerawatanT3VIPs;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSntPerawatanT3VIPs'][0]->created_at));
            $formId = $data['formSntPerawatanT3VIPs'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-perawatan-t3', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formSntChecklistPerawatanIncinerator123Harians->isNotEmpty()) {
            $data['formSntChecklistPerawatanIncinerator123Harians'] = $workOrder->formSntChecklistPerawatanIncinerator123Harians;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSntChecklistPerawatanIncinerator123Harians'][0]->created_at));
            $formId = $data['formSntChecklistPerawatanIncinerator123Harians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-perawatan-incinerator-123-harian', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formSntChecklistPerawatanIncinerator567Harians->isNotEmpty()) {
            $data['formSntChecklistPerawatanIncinerator567Harians'] = $workOrder->formSntChecklistPerawatanIncinerator567Harians;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSntChecklistPerawatanIncinerator567Harians'][0]->created_at));
            $formId = $data['formSntChecklistPerawatanIncinerator567Harians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-perawatan-incinerator-567-harian', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formSntChecklistPerawatanIncinerator123Mingguans->isNotEmpty()) {
            $data['formSntChecklistPerawatanIncinerator123Mingguans'] = $workOrder->formSntChecklistPerawatanIncinerator123Mingguans;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSntChecklistPerawatanIncinerator123Mingguans'][0]->created_at));
            $formId = $data['formSntChecklistPerawatanIncinerator123Mingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-perawatan-incinerator-123-mingguan', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formSntChecklistPerawatanIncinerator456Mingguans->isNotEmpty()) {
            $data['formSntChecklistPerawatanIncinerator456Mingguans'] = $workOrder->formSntChecklistPerawatanIncinerator456Mingguans;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSntChecklistPerawatanIncinerator456Mingguans'][0]->created_at));
            $formId = $data['formSntChecklistPerawatanIncinerator456Mingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-perawatan-incinerator-456-mingguan', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formSntChecklistPerawatanIncinerator123Bulanans->isNotEmpty()) {
            $data['formSntChecklistPerawatanIncinerator123Bulanans'] = $workOrder->formSntChecklistPerawatanIncinerator123Bulanans;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSntChecklistPerawatanIncinerator123Bulanans'][0]->created_at));
            $formId = $data['formSntChecklistPerawatanIncinerator123Bulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-perawatan-incinerator-123-bulanan', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formSntChecklistPerawatanIncinerator456Bulanans->isNotEmpty()) {
            $data['formSntChecklistPerawatanIncinerator456Bulanans'] = $workOrder->formSntChecklistPerawatanIncinerator456Bulanans;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formSntChecklistPerawatanIncinerator456Bulanans'][0]->created_at));
            $formId = $data['formSntChecklistPerawatanIncinerator456Bulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-perawatan-incinerator-456-bulanan', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        // -------------------------
        // UPS
        if ($data['formUpsLaporanHasilKerja'] = $workOrder->formUpsLaporanHasilKerja) {
            $formId = $data['formUpsLaporanHasilKerja']->form_id;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($workOrder->date_generate));
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;

            $pdf = $this->createPdf('report.form-report.form-ups-laporan-hasil-kerja', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }
        if ($data['formUpsLaporanHasilKerjaMalam'] = $workOrder->formUpsLaporanHasilKerjaMalam) {
            $formId = $data['formUpsLaporanHasilKerjaMalam']->form_id;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($workOrder->date_generate));
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;

            $pdf = $this->createPdf('report.form-report.form-ups-laporan-hasil-kerja-malam', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }
        if ($data['formUpsLaporanKerusakanDanPerbaikan'] = $workOrder->formUpsLaporanKerusakanDanPerbaikan) {
            $formId = $data['formUpsLaporanKerusakanDanPerbaikan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['assetMaterials'] = AssetMaterial::where('asset_id', $data['work_order']->asset_id);
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formUpsLaporanKerusakanDanPerbaikan']->tanggal));
            $data['tanggalWo1'] = date('Y-m-d', strtotime($data['formUpsLaporanKerusakanDanPerbaikan']->tanggal_kerusakan));
            $data['tanggalWo2'] = date('Y-m-d', strtotime($data['formUpsLaporanKerusakanDanPerbaikan']->tanggal_perbaikan));
            $data['jamWo'] = date('H:i:s', strtotime($data['formUpsLaporanKerusakanDanPerbaikan']->tanggal_kerusakan));
            $data['jamWo2'] = date('H:i:s', strtotime($data['formUpsLaporanKerusakanDanPerbaikan']->tanggal_perbaikan));
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }

            $pdf = $this->createPdf('report.form-report.form-ups-laporan-kerusakan-dan-perbaikan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
            $indicator++;
        }

        if ($workOrder->formUpsPengukuranPeralatanDuaMingguans->isNotEmpty()) {
            $data['formUpsPengukuranPeralatanDuaMingguans'] = $workOrder->formUpsPengukuranPeralatanDuaMingguans;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formUpsPengukuranPeralatanDuaMingguans'][0]->tanggal));
            $formId = $data['formUpsPengukuranPeralatanDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ups-pengukuran-peraltan-dua-mingguan', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formUpsPengukuranPeralatanEnamBulanans->isNotEmpty()) {
            $data['formUpsPengukuranPeralatanEnamBulanans'] = $workOrder->formUpsPengukuranPeralatanEnamBulanans;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formUpsPengukuranPeralatanEnamBulanans'][0]->tanggal));
            $formId = $data['formUpsPengukuranPeralatanEnamBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ups-pengukuran-peraltan-enam-bulanan', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formUpsDataUkurLoadBebans->isNotEmpty()) {
            $data['formUpsDataUkurLoadBebans'] = $workOrder->formUpsDataUkurLoadBebans;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($data['formUpsDataUkurLoadBebans'][0]->tanggal));
            $data['lokasi'] = $workOrder->asset->location->name ?? "";
            $data['fotoPath'] = substr($data['formUpsDataUkurLoadBebans'][0]->dokumentasi, 27);
            $data['fotoPath2'] = substr($data['formUpsDataUkurLoadBebans'][0]->dokumentasi2, 27);
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            // $decryptedDok = Crypt::decryptString($encryptedData);

            // $data['dok'] = $decryptedDok;
            $formId = $data['formUpsDataUkurLoadBebans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();

            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ups-data-ukur-load-beban', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formUpsPengukuranTeganganBatterys->isNotEmpty()) {
            $data['formUpsPengukuranTeganganBatterys'] = $workOrder->formUpsPengukuranTeganganBatterys;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($workOrder->date_generate));
            $data['lokasi'] = $workOrder->asset->location->name ?? "";
            $data['assetMaterials'] = AssetMaterial::where('asset_id', $data['work_order']->asset_id);
            $data['fotoPath1'] = substr($data['formUpsPengukuranTeganganBatterys'][0]->dokumentasi1, 27);
            $data['fotoPath2'] = substr($data['formUpsPengukuranTeganganBatterys'][0]->dokumentasi2, 27);
            $data['fotoPath3'] = substr($data['formUpsPengukuranTeganganBatterys'][0]->dokumentasi3, 27);
            $data['fotoPath4'] = substr($data['formUpsPengukuranTeganganBatterys'][0]->dokumentasi4, 27);
            
            $formId = $data['formUpsPengukuranTeganganBatterys'][0]->form_id;
            $bankGroups = ['BANK 1', 'BANK 2', 'BANK 3', 'BANK 4'];
            $data['tempCount1'] = 0;
            $data['tempCount2'] = 0;
            $data['tempCount3'] = 0;
            $data['tempCount4'] = 0;
                    foreach ($bankGroups as $key => $group) {
                $data[$group] = FormUpsPengukuranTeganganBattery::where('work_order_id', $id)
                    ->where('nama_bank', $group)
                    ->orderBy('id', 'asc')
                    ->get();
                if ($key == 0) {
                    $data['tempCount1'] = $data[$group]->count();
                } elseif ($key == 1) {
                    $data['tempCount2'] = $data[$group]->count();
                } elseif ($key == 2) {
                    $data['tempCount3'] = $data[$group]->count();
                } else {
                    $data['tempCount4'] = $data[$group]->count();
                }
                $tempbankCount1 = max($data['tempCount1'], $data['tempCount2']);
                $tempbankCount2 = max($data['tempCount3'], $data['tempCount4']);
                $data['tempCount'] = max($tempbankCount1, $tempbankCount2);
            }
            // $decryptedDok = Crypt::decryptString($encryptedData);

            // $data['dok'] = $decryptedDok;
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ups-pengukuran-tegangan-battery', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formUpsDokumentasiKegiatanRutins->isNotEmpty()) {
            $data['formUpsDokumentasiKegiatanRutins'] = $workOrder->formUpsDokumentasiKegiatanRutins;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($workOrder->date_generate));
            $formId = $data['formUpsDokumentasiKegiatanRutins'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();

            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ups-dokumentasi-kegiatan-rutin', [0, 0, 609.4488, 935.433], 'potrait', $data);
            $m->addRaw($pdf->output());
        }

        // -------------------------
        // --- Power Station 1 ---
        if ($workOrder->formPs1GensetHarians->isNotEmpty()) {
            $data['page_title'] = 'CHECK LIST HARIAN PERALATAN MPS 1';
            $formPs1GensetHarians = $workOrder->formPs1GensetHarians;
            $data['conrtolDesks'] = $formPs1GensetHarians->filter(function ($formPs1GensetHarian) {
                return $formPs1GensetHarian->group == 'CONTROL DESK';
            });
            $data['gensets'] = $formPs1GensetHarians->filter(function ($formPs1GensetHarian) {
                return $formPs1GensetHarian->group == 'GENSET';
            });
            $data['groundTanks'] = $formPs1GensetHarians->filter(function ($formPs1GensetHarian) {
                return $formPs1GensetHarian->group == 'GROUND TANK';
            });
            $formId = $formPs1GensetHarians[0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1PanelHarians->isNotEmpty()) {
            $data['formPs1GensetHarianPowerER6'] = FormPs1GensetHarianPower::where('work_order_id', $workOrder->id)
                ->where('grup', 'er6')
                ->orderBy('id', 'asc')
                ->get();

            $data['formPs1PanelHarianEXT'] = FormPs1PanelHarian::where('work_order_id', $workOrder->id)
                ->where('grup', 'ext')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1PanelHarianER2A'] = FormPs1PanelHarian::where('work_order_id', $workOrder->id)
                ->where('grup', 'er2a')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1PanelHarianER2B'] = FormPs1PanelHarian::where('work_order_id', $workOrder->id)
                ->where('grup', 'er2b')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1PanelHarianER1B'] = FormPs1PanelHarian::where('work_order_id', $workOrder->id)
                ->where('grup', 'er1b')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1PanelHarianPanel'] = FormPs1PanelHarian::where('work_order_id', $workOrder->id)
                ->where('grup', 'panel_mv_genset')
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formPs1PanelHarianPanel'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-panel-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1ControlDeskDuaMingguanBelakangs->isNotEmpty()) {
            $data['formPs1ControlDeskDuaMingguanBelakangControl'] = FormPs1ControlDeskDuaMingguanBelakang::where('work_order_id', $workOrder->id)
                ->where('grup', 'control')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1ControlDeskDuaMingguanBelakangPanel'] = FormPs1ControlDeskDuaMingguanBelakang::where('work_order_id', $workOrder->id)
                ->where('grup', 'panel')
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formPs1ControlDeskDuaMingguanBelakangPanel'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-control-desk-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1TrafoDuaMingguans->isNotEmpty()) {
            $data['formPs1TrafoDuaMingguanTrafo'] = FormPs1TrafoDuaMingguan::where('work_order_id', $workOrder->id)
                ->where('grup', 'trafo')
                ->orderBy('id', 'asc')
                ->get();

            $data['formPs1TrafoDuaMingguanPanel'] = FormPs1TrafoDuaMingguan::where('work_order_id', $workOrder->id)
                ->where('grup', 'panel')
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formPs1TrafoDuaMingguanPanel'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-trafo-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1ControlDeskTahunans->isNotEmpty()) {
            $data['satuan'] = ['A', '', 'V', 'Hz', 'hrs', 'rpm', 'Bar', 'c', 'Vdc', '', '', ''];

            $data['formPs1ControlDeskTahunans'] = FormPs1ControlDeskTahunan::where('work_order_id', $workOrder->id)
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formPs1ControlDeskTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-control-desk-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1GensetMobileDuaMingguans->isNotEmpty()) {
            $data['formPs1GensetMobileDuaMingguans'] = FormPs1GensetMobileDuaMingguan::where('work_order_id', $workOrder->id)
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formPs1GensetMobileDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-mobile-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1GensetMobileTigaBulanans->isNotEmpty()) {
            $data['formPs1GensetMobileTigaBulanans'] = FormPs1GensetMobileTigaBulanan::where('work_order_id', $workOrder->id)
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formPs1GensetMobileTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-mobile-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1GensetMobileEnamBulanans->isNotEmpty()) {
            $data['formPs1GensetMobileEnamBulanans'] = FormPs1GensetMobileEnamBulanan::where('work_order_id', $workOrder->id)
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formPs1GensetMobileEnamBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-mobile-enam-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1GensetMobileTahunans->isNotEmpty()) {
            $data['formPs1GensetMobileTahunans'] = FormPs1GensetMobileTahunan::where('work_order_id', $workOrder->id)
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formPs1GensetMobileTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-mobile-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1PanelAutomationDuaMingguans->isNotEmpty()) {
            $data['formPs1PanelAutomationDuaMingguanAutomations'] = FormPs1PanelAutomationDuaMingguan::where('work_order_id', $workOrder->id)
                ->where('tipe', 'Automation')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1PanelAutomationDuaMingguanMarshallings'] = FormPs1PanelAutomationDuaMingguan::where('work_order_id', $workOrder->id)
                ->where('tipe', 'Marshalling')
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formPs1PanelAutomationDuaMingguanMarshallings'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-panel-automation-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1PanelTrDuaMingguans->isNotEmpty()) {
            $formPs1PanelTrDuaMingguans = $workOrder->formPs1PanelTrDuaMingguans;
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

            $formId = $formPs1PanelTrDuaMingguans[0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-panel-tr-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1PanelTrEnamBulanans->isNotEmpty()) {
            $formPs1PanelTrEnamBulanans = $workOrder->formPs1PanelTrEnamBulanans;
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

            $formId = $formPs1PanelTrEnamBulanans[0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-panel-tr-enam-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1PanelTrTahunans->isNotEmpty()) {
            $formPs1PanelTrTahunans = $workOrder->formPs1PanelTrTahunans;
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

            $formId = $formPs1PanelTrTahunans[0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-panel-tr-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1TestOnloadGenset && $workOrder->formPs1TestOnloadParameterGensets->isNotEmpty() && $workOrder->formPs1TestOnloadUraianGensets->isNotEmpty()) {
            $data['uraianGensets'] = [['name' => 'Beban awal (PLN ONLOAD)'], ['name' => 'Beban Genset (PLN Off / Genset Onload)'], ['name' => 'Beban Akhir (PLN Onload / Recovery)']];

            $data['parameterGensets'] = [['name' => 'TEGANGAN'], ['name' => 'ARUS'], ['name' => 'FREQUENCY'], ['name' => 'BBM'], ['name' => 'JACKET WATER OUTLET TEMP'], ['name' => 'JACKET WATER PRESSURE'], ['name' => 'TURBO BLOWER AIR PRESSURE'], ['name' => 'LOW TEMP. WATER PRESSURE'], ['name' => 'ENGINE OIL TEMPERATURE'], ['name' => 'OIL PRESSURE AFTER FILTER'], ['name' => 'TURBO BLOWER II AIR PRESSURE']];

            $data['formPs1TestOnloadGenset'] = $workOrder->formPs1TestOnloadGenset;
            $data['formPs1TestOnloadParameterGensets'] = FormPs1TestOnloadParameterGenset::where('work_order_id', $workOrder->id)
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs1TestOnloadUraianGensets'] = FormPs1TestOnloadUraianGenset::where('work_order_id', $workOrder->id)
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formPs1TestOnloadUraianGensets'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-onload', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // -------------------------
        // --- Power Station 3 ---
        if ($workOrder->formPs3ControlRoomHarian && $workOrder->formPs3GensetRoomHarians->isNotEmpty()) {
            $data['gensetRoomLists'] = [
                [
                    'title' => 'Mode operasi kontrol genset(Deif)',
                    'keterangan' => 'Auto / Semi / Man / Off',
                ],
                [
                    'title' => 'Tegangan battery starter ( ≥24 Vdc )',
                    'keterangan' => 'Vdc',
                ],
                [
                    'title' => 'Kondisi Battery charger',
                    'keterangan' => 'On / Off',
                ],
                [
                    'title' => 'Kondisi indikator Battery Starter',
                    'keterangan' => 'Hijau / Clear',
                ],
                [
                    'title' => 'Lampu indikator ECU',
                    'keterangan' => 'On / Blinking / Off',
                ],
                [
                    'title' => 'Panel Motor fan radiator',
                    'keterangan' => 'Man / Off / Auto',
                ],
                [
                    'title' => 'Panel Exhaust fan',
                    'keterangan' => 'Man / Off / Auto',
                ],
                [
                    'title' => 'Level Oli mesin',
                    'keterangan' => 'low / med / max',
                ],
                [
                    'title' => 'Level air radiator',
                    'keterangan' => 'low / med / max',
                ],
                [
                    'title' => 'Level bbm tangki harian',
                    'keterangan' => '(%) Liter ',
                ],
                [
                    'title' => 'Indikator filter udara intake',
                    'keterangan' => 'green / yellow / red',
                ],
                [
                    'title' => 'Water heater pump',
                    'keterangan' => 'On / Off',
                ],
                [
                    'title' => 'Oil / engine temperature ( 27 - 98 °C )',
                    'keterangan' => '°C',
                ],
                [
                    'title' => 'Valve bbm genset',
                    'keterangan' => 'Open / Close',
                ],
                [
                    'title' => 'Kondisi Switch Battery',
                    'keterangan' => 'Open / Close',
                ],
            ];
            $data['formPs3ControlRoomHarian'] = $workOrder->formPs3ControlRoomHarian;
            $data['formPs3GensetRoomHarians'] = $workOrder->formPs3GensetRoomHarians;
            $formId = $data['formPs3GensetRoomHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-genset-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3PanelHarians->isNotEmpty()) {
            $data['formPs3PanelHarianER1A'] = FormPs3PanelHarian::where('work_order_id', $workOrder->id)
                ->where('grup', 'er1a')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs3PanelHarianER2A'] = FormPs3PanelHarian::where('work_order_id', $workOrder->id)
                ->where('grup', 'er2a')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs3PanelHarianER2B'] = FormPs3PanelHarian::where('work_order_id', $workOrder->id)
                ->where('grup', 'er2b')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs3PanelHarianER1B'] = FormPs3PanelHarian::where('work_order_id', $workOrder->id)
                ->where('grup', 'er1b')
                ->orderBy('id', 'asc')
                ->get();
            $data['formPs3PanelHarianPanel'] = FormPs3PanelHarian::where('work_order_id', $workOrder->id)
                ->where('grup', 'panel_mv_genset')
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['formPs3PanelHarianPanel'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-panel-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->gensetStandbyGarduTeknikDuaMingguans->isNotEmpty()) {
            $data['gensetStandbyGarduTeknikDuaMingguans'] = $workOrder->gensetStandbyGarduTeknikDuaMingguans;
            $formId = $data['gensetStandbyGarduTeknikDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-standby-gardu-teknik-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->gensetStandbyGarduTeknikTigaBulanans->isNotEmpty()) {
            $data['gensetStandbyGarduTeknikTigaBulanans'] = $workOrder->gensetStandbyGarduTeknikTigaBulanans;
            $formId = $data['gensetStandbyGarduTeknikTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-standby-gardu-teknik-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->gensetStandbyGarduTeknikEnamBulanans->isNotEmpty()) {
            $data['gensetStandbyGarduTeknikEnamBulanans'] = $workOrder->gensetStandbyGarduTeknikEnamBulanans;
            $formId = $data['gensetStandbyGarduTeknikEnamBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-standby-gardu-teknik-enam-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->gensetStandbyGarduTeknikTahunans->isNotEmpty()) {
            $data['gensetStandbyGarduTeknikTahunans'] = $workOrder->gensetStandbyGarduTeknikTahunans;
            $formId = $data['gensetStandbyGarduTeknikTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-standby-gardu-teknik-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1GensetStandbyNo1DuaMingguans->isNotEmpty()) {
            $data['duaMingguans'] = ['Ampere Meter', 'Volt Meter', 'Frequency', 'Batt. Starter', 'T.BBM harian', 'Mode Operasi Pompa BBM', 'Power Factor', 'Engine Speed', 'Level air radiator', 'Level Oli Mesin', 'eng.Oil Press', 'eng. Coolant temp', 'eng.Run Time', 'Mode operasi water pump', 'Mode operasi smart battery charger'];
            $data['formPs1GensetStandbyNo1DuaMingguans'] = $workOrder->formPs1GensetStandbyNo1DuaMingguans;
            $formId = $data['formPs1GensetStandbyNo1DuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-standby-no-1-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1GensetStandbyTigaBulanans->isNotEmpty()) {
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
            $data['formPs1GensetStandbyTigaBulanans'] = $workOrder->formPs1GensetStandbyTigaBulanans;
            $formId = $data['formPs1GensetStandbyTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-standby-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1GensetStandbyEnamBulanans->isNotEmpty()) {
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
            $data['formPs1GensetStandbyEnamBulanans'] = $workOrder->formPs1GensetStandbyEnamBulanans;
            $formId = $data['formPs1GensetStandbyEnamBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-standby-enam-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1GensetStandbyTahunans->isNotEmpty()) {
            $data['formPs1GensetStandbyTahunans'] = $workOrder->formPs1GensetStandbyTahunans;
            $formId = $data['formPs1GensetStandbyTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-genset-standby-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1PanelTmDuaMingguans->isNotEmpty()) {
            $formPs1PanelTmDuaMingguans = $workOrder->formPs1PanelTmDuaMingguans;
            $data['panelSynchrons'] = $formPs1PanelTmDuaMingguans
                ->filter(function ($formPs1PanelTmDuaMingguan) {
                    return $formPs1PanelTmDuaMingguan->group_name == 'panel_synchron';
                })
                ->values();

            $data['er1bs'] = $formPs1PanelTmDuaMingguans
                ->filter(function ($formPs1PanelTmDuaMingguan) {
                    return $formPs1PanelTmDuaMingguan->group_name == 'er1b';
                })
                ->values();

            $data['er7s'] = $formPs1PanelTmDuaMingguans
                ->filter(function ($formPs1PanelTmDuaMingguan) {
                    return $formPs1PanelTmDuaMingguan->group_name == 'er7';
                })
                ->values();

            $data['er6s'] = $formPs1PanelTmDuaMingguans
                ->filter(function ($formPs1PanelTmDuaMingguan) {
                    return $formPs1PanelTmDuaMingguan->group_name == 'er6';
                })
                ->values();

            $data['er2as'] = $formPs1PanelTmDuaMingguans
                ->filter(function ($formPs1PanelTmDuaMingguan) {
                    return $formPs1PanelTmDuaMingguan->group_name == 'er2a';
                })
                ->values();

            $data['er2bs'] = $formPs1PanelTmDuaMingguans
                ->filter(function ($formPs1PanelTmDuaMingguan) {
                    return $formPs1PanelTmDuaMingguan->group_name == 'er2b';
                })
                ->values();
            $formId = $data['panelSynchrons'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-panel-tm-dua-mingguan', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1PanelTmEnamBulanans->isNotEmpty()) {
            $formPs1PanelTmEnamBulanans = $workOrder->formPs1PanelTmEnamBulanans;
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
            $formId = $formPs1PanelTmEnamBulanans[0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-panel-tm-enam-bulanan', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1PanelTmTahunans->isNotEmpty()) {
            $data['formPs1PanelTmTahunans'] = $workOrder->formPs1PanelTmTahunans;
            $formId = $data['formPs1PanelTmTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-panel-tm-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs1PanelMvTahunans->isNotEmpty()) {
            $data['formPs1PanelMvTahunans'] = $workOrder->formPs1PanelMvTahunans;
            $formId = $data['formPs1PanelMvTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps1-panel-mv-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3PanelSdpDuaMingguans->isNotEmpty()) {
            $data['formPs3PanelSdpDuaMingguans'] = $workOrder->formPs3PanelSdpDuaMingguans;
            $formId = $data['formPs3PanelSdpDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-panel-sdp-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3RuangTenagaSuhuDuaMingguan && $workOrder->formPs3RuangTenagaTeganganDuaMingguans->isNotEmpty()) {
            $data['formPs3RuangTenagaSuhuDuaMingguan'] = $workOrder->formPs3RuangTenagaSuhuDuaMingguan;
            $data['formPs3RuangTenagaTeganganDuaMingguans'] = $workOrder->formPs3RuangTenagaTeganganDuaMingguans;
            $formId = $data['formPs3RuangTenagaSuhuDuaMingguan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-ruang-tenaga-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3MainTankLamaDuaMingguan) {
            $data['formPs3MainTankLamaDuaMingguan'] = $workOrder->formPs3MainTankLamaDuaMingguan;
            $formId = $data['formPs3MainTankLamaDuaMingguan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-main-tank-lama-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3EpccDuaMingguan) {
            $data['formPs3EpccDuaMingguan'] = $workOrder->formPs3EpccDuaMingguan;
            $formId = $data['formPs3EpccDuaMingguan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-epcc-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3GensetDuaMingguans->isNotEmpty()) {
            $data['formPs3GensetDuaMingguans'] = $workOrder->formPs3GensetDuaMingguans;
            $formId = $data['formPs3GensetDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-genset-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3MainTankBaruLamaEnamBulananTahunan) {
            $data['formPs3MainTankBaruLamaEnamBulananTahunan'] = $workOrder->formPs3MainTankBaruLamaEnamBulananTahunan;
            $formId = $data['formPs3MainTankBaruLamaEnamBulananTahunan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-main-tank-baru-lama-enam-bulanan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3SumpTankBaruEnamBulananTahunan) {
            $data['formPs3SumpTankBaruEnamBulananTahunan'] = $workOrder->formPs3SumpTankBaruEnamBulananTahunan;
            $formId = $data['formPs3SumpTankBaruEnamBulananTahunan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-sump-tank-baru-enam-bulanan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3SumpTankLamaEnamBulananTahunan) {
            $data['formPs3SumpTankLamaEnamBulananTahunan'] = $workOrder->formPs3SumpTankLamaEnamBulananTahunan;
            $formId = $data['formPs3SumpTankLamaEnamBulananTahunan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-sump-tank-lama-enam-bulanan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3GroundTankBaruDuaMingguan) {
            $data['formPs3GroundTankBaruDuaMingguan'] = $workOrder->formPs3GroundTankBaruDuaMingguan;
            $data['formPs3GroundTankBaruPemeriksaanArusDuaMingguan'] = $workOrder->formPs3GroundTankBaruPemeriksaanArusDuaMingguan;
            $formId = $data['formPs3GroundTankBaruDuaMingguan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-ground-tank-baru-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // if($workOrder->formPs3MainTankLamaDuaMingguan){
        //     $data['formPs3MainTankLamaDuaMingguan'] = $workOrder->formPs3MainTankLamaDuaMingguan;
        //     $formId = $data['formPs3MainTankLamaDuaMingguan']->form_id;
        //     $getUserId = FormActivityLog::where('work_order_id', $id)->where('status', 'end')->where('form_id', $formId)->orderBy('id', 'desc')->first();
        //     $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first(): null;
        //     $pdf = $this->createPdf('report.form-report.form-ps3-main-tank-lama-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
        //     $m->addRaw($pdf->output());
        // }asd

        if ($workOrder->formPs3CraneGensetTigaBulanan) {
            $data['formPs3CraneGensetTigaBulanan'] = $workOrder->formPs3CraneGensetTigaBulanan;
            $formId = $data['formPs3CraneGensetTigaBulanan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-crane-genset-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3GensetTigaBulanans->isNotEmpty()) {
            $data['formPs3GensetTigaBulanans'] = $workOrder->formPs3GensetTigaBulanans;
            $formId = $data['formPs3GensetTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-genset-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3TrafoTigaBulanans->isNotEmpty()) {
            $data['formPs3TrafoTigaBulanans'] = $workOrder->formPs3TrafoTigaBulanans;
            $formId = $data['formPs3TrafoTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-trafo-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3GensetEnamBulananTahunans->isNotEmpty()) {
            $data['formPs3GensetEnamBulananTahunans'] = $workOrder->formPs3GensetEnamBulananTahunans;
            $formId = $data['formPs3GensetEnamBulananTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-genset-enam-bulanan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3TrafoEnamBulananTahunans->isNotEmpty()) {
            $data['formPs3TrafoEnamBulananTahunans'] = $workOrder->formPs3TrafoEnamBulananTahunans;
            $formId = $data['formPs3TrafoEnamBulananTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-trafo-enam-bulanan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3LvmdpACheckEnamBulananTahunans->isNotEmpty() && $workOrder->formPs3LvmdpBCheckEnamBulananTahunans->isNotEmpty()) {
            $data['formPs3LvmdpACheckEnamBulananTahunans'] = $workOrder->formPs3LvmdpACheckEnamBulananTahunans;
            $data['formPs3LvmdpBCheckEnamBulananTahunans'] = $workOrder->formPs3LvmdpBCheckEnamBulananTahunans;
            $formId = $data['formPs3LvmdpACheckEnamBulananTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-lvmdp-check-enam-bulanan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3PanelPompaBbmBaruEnamBulananTahunan) {
            $data['formPs3PanelPompaBbmBaruEnamBulananTahunan'] = $workOrder->formPs3PanelPompaBbmBaruEnamBulananTahunan;
            $formId = $data['formPs3PanelPompaBbmBaruEnamBulananTahunan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-panel-pompa-bbm-baru-enam-bulanan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3PanelPompaBbmLamaEnamBulananTahunan) {
            $data['formPs3PanelPompaBbmLamaEnamBulananTahunan'] = $workOrder->formPs3PanelPompaBbmLamaEnamBulananTahunan;
            $formId = $data['formPs3PanelPompaBbmLamaEnamBulananTahunan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-panel-pompa-bbm-lama-enam-bulanan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3GensetCheckEnamBulananTahunan) {
            $data['formPs3GensetCheckEnamBulananTahunan'] = $workOrder->formPs3GensetCheckEnamBulananTahunan;
            $formId = $data['formPs3GensetCheckEnamBulananTahunan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-genset-check-enam-bulanan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3PanelMvEnamBulananTahunans->isNotEmpty()) {
            $data['formPs3PanelMvEnamBulananTahunans'] = $workOrder->formPs3PanelMvEnamBulananTahunans;
            $formId = $data['formPs3PanelMvEnamBulananTahunans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-panel-mv-enam-bulanan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }


        if ($workOrder->formPs3EpccEnamBulananTahunan) {
            $data['formPs3EpccEnamBulananTahunan'] = $workOrder->formPs3EpccEnamBulananTahunan;
            $formId = $data['formPs3EpccEnamBulananTahunan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-epcc-enam-bulanan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formPs3TrafoGensetCheckEnamBulananTahunan) {
            $data['formPs3TrafoGensetCheckEnamBulananTahunan'] = $workOrder->formPs3TrafoGensetCheckEnamBulananTahunan;
            $formId = $data['formPs3TrafoGensetCheckEnamBulananTahunan']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ps3-trafo-genset-check-enam-bulanan-tahunan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->laporanKerusakanElectricalProtection) {
            $data['laporanKerusakanElectricalProtection'] = $workOrder->laporanKerusakanElectricalProtection;
            $data['date'] = date('d', strtotime($data['laporanKerusakanElectricalProtection']->date));
            $data['month'] = date('m', strtotime($data['laporanKerusakanElectricalProtection']->date));
            $data['year'] = date('Y', strtotime($data['laporanKerusakanElectricalProtection']->date));

            $formId = $data['laporanKerusakanElectricalProtection']->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-elp-laporan-kerusakan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formElpDailyEr2as->isNotEmpty() && $workOrder->formElpDailyEr2bs->isNotEmpty() && $workOrder->formElpNetworkScadaRcmsDailies->isNotEmpty()) {
            $data['formElpDailyEr2as'] = $workOrder->formElpDailyEr2as;
            $data['formElpDailyEr2bs'] = $workOrder->formElpDailyEr2bs;
            $data['formElpNetworkScadaRcmsDailies'] = $workOrder->formElpNetworkScadaRcmsDailies;

            $data['er2as'] = ['MCA' => [true, true, false, false], 'MCB' => [true, true, false, false], 'MCF' => [false, true, false, false], 'MSA' => [false, false, true, false], 'MSB' => [false, true, false, false], 'MSC' => [false, true, false, false], 'MSD' => [false, true, false, false], 'MSE' => [false, true, false, false], 'MSF' => [false, true, false, false], 'MSG' => [false, true, false, false], 'MSH' => [false, true, false, false], 'MSI' => [true, true, false, false], 'MST' => [false, true, false, false], 'MSS' => [false, true, false, true], 'MSU' => [false, true, false, true], 'MCC' => [false, false, false, false]];

            $data['er2bs'] = ['MCD' => [true, true, false, false], 'MCE' => [true, true, false, false], 'MCG' => [false, true, false, false], 'MCC' => [false, true, false, false], 'MSJ' => [false, false, true, false], 'MSK' => [false, false, false, false], 'MSL' => [false, true, false, false], 'MSM' => [false, true, false, false], 'MSN' => [false, true, false, false], 'MSO' => [false, true, false, false], 'MSP' => [false, true, false, false], 'MSQ' => [false, true, false, false], 'MSR' => [false, true, false, false], 'MSV' => [false, true, false, false], 'MSW' => [false, true, false, false], 'MSX' => [false, true, false, false]];

            $gardus = [
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

            // Get the form ID from the first record
            $formId = $data['formElpDailyEr2as'][0]->form_id;

            // Fetch the latest user activity log
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();

            $data['gardu'] = '';
            $firstLoop = [];
            $secondLoop = [];
            $thirdLoop = [];
            $elseLoop = '<td></td><td></td><td></td><td></td>';

            // Loop through network SCADA RCMS dailies data
            foreach ($data['formElpNetworkScadaRcmsDailies'] as $key => $formElpNetworkScadaRcmsDaily) {
                $loopArray = &$firstLoop;

                if ($key >= 15 && $key < 30) {
                    $loopArray = &$secondLoop;
                } elseif ($key >= 30) {
                    $loopArray = &$thirdLoop;
                }

                // Generate HTML table cells for each row
                $tempGardu = $formElpNetworkScadaRcmsDaily->gardu;

                $loopArray[] = '<td>' . ($key + 1) . '</td>' . '<td>' . $tempGardu . '</td>' . '<td style="font-family: DejaVu Sans, sans-serif; ' . ($gardus[$tempGardu][0] == true ? '' : 'background-color:#9ea0a3') . '">' . ($formElpNetworkScadaRcmsDaily->kondisi_scada == 'normal' ? '✔' : ($formElpNetworkScadaRcmsDaily->kondisi_scada == 'alarm' ? '✗' : '')) . '</td>' . '<td style="font-family: DejaVu Sans, sans-serif; ' . ($gardus[$tempGardu][1] == true ? '' : 'background-color:#9ea0a3') . '">' . ($formElpNetworkScadaRcmsDaily->kondisi_rcms == 'normal' ? '✔' : ($formElpNetworkScadaRcmsDaily->kondisi_rcms == 'alarm' ? '✗' : '')) . '</td>';
            }

            // Construct the HTML rows for the gardu table
            for ($i = 0; $i < 15; $i++) {
                $data['gardu'] .= '<tr>' . ($firstLoop[$i] ?? $elseLoop) . ($secondLoop[$i] ?? $elseLoop) . ($thirdLoop[$i] ?? $elseLoop) . '</tr>';
            }

            // Fetch user technical data based on the obtained user ID
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;

            // Generate and add the PDF
            $pdf = $this->createPdf('report.form-report.form-elp-daily-ps2', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // HAS MANY
        if ($workOrder->formApmVehicleCarBodyHarians->isNotEmpty()) {
            $data['formApmVehicleCarBodyHarians'] = $workOrder->formApmVehicleCarBodyHarians;
            $formId = $data['formApmVehicleCarBodyHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-mekanikal-vehicle-carbody-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // APM
        // ELEKTRIKAL
        if ($workOrder->formApmElektrikalVehicleExteriorMingguans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorMingguans'] = $workOrder->formApmElektrikalVehicleExteriorMingguans;
            $formId = $data['formApmElektrikalVehicleExteriorMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-exterior-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorHarians->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorHarians'] = $workOrder->formApmElektrikalVehicleExteriorHarians;
            $formId = $data['formApmElektrikalVehicleExteriorHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-exterior-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleInteriorHarians->isNotEmpty()) {
            $data['formApmElektrikalVehicleInteriorHarians'] = $workOrder->formApmElektrikalVehicleInteriorHarians;
            $formId = $data['formApmElektrikalVehicleInteriorHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-interior-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleInteriorGDTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleInteriorGDTigaBulanans'] = $workOrder->formApmElektrikalVehicleInteriorGDTigaBulanans;
            $formId = $data['formApmElektrikalVehicleInteriorGDTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-gd-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleInteriorFDSTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleInteriorFDSTigaBulanans'] = $workOrder->formApmElektrikalVehicleInteriorFDSTigaBulanans;
            $formId = $data['formApmElektrikalVehicleInteriorFDSTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-fds-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleInteriorMCTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleInteriorMCTigaBulanans'] = $workOrder->formApmElektrikalVehicleInteriorMCTigaBulanans;
            $formId = $data['formApmElektrikalVehicleInteriorMCTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-mc-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleInteriorTCMSTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleInteriorTCMSTigaBulanans'] = $workOrder->formApmElektrikalVehicleInteriorTCMSTigaBulanans;
            $formId = $data['formApmElektrikalVehicleInteriorTCMSTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-tcms-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleInteriorLPLTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleInteriorLPLTigaBulanans'] = $workOrder->formApmElektrikalVehicleInteriorLPLTigaBulanans;
            $formId = $data['formApmElektrikalVehicleInteriorLPLTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-lpl-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorBECTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorBECTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorBECTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorBECTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-bec-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorDCTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorDCTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorDCTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorDCTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-dc-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorESKTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorESKTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorESKTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorESKTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-esk-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorHJBTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorHJBTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorHJBTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorHJBTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-hjb-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorFJBTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorFJBTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorFJBTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorFJBTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-fjb-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorLJBTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorLJBTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorLJBTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorLJBTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-ljb-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorHSCBTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorHSCBTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorHSCBTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorHSCBTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-hscb-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorPCSTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorPCSTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorPCSTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorPCSTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-pcs-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorSIVTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorSIVTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorSIVTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorSIVTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-siv-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorLHTTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorLHTTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorLHTTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorLHTTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-lht-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorTMTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorTMTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorTMTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorTMTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-tm-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorVACTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorVACTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorVACTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorVACTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-vac-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorEHTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorEHTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorEHTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorEHTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-eh-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorJPTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorJPTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorJPTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorJPTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-jp-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorMDSTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorMDSTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorMDSTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorMDSTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-mds-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorVVTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorVVTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorVVTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorVVTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-vv-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorPCTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorPCTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorPCTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorPCTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-pc-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmElektrikalVehicleExteriorBATTigaBulanans->isNotEmpty()) {
            $data['formApmElektrikalVehicleExteriorBATTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorBATTigaBulanans;
            $data['formApmElektrikalVehicleExteriorBAThasilTigaBulanans'] = $workOrder->formApmElektrikalVehicleExteriorBAThasilTigaBulanans;
            $formId = $data['formApmElektrikalVehicleExteriorBATTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-bat-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // MEKANIKAL
        if ($workOrder->formApmMekanikalVehicleCarbodyTigaBulanans->isNotEmpty()) {
            $data['formApmMekanikalVehicleCarbodyTigaBulanans'] = $workOrder->formApmMekanikalVehicleCarbodyTigaBulanans;
            $formId = $data['formApmMekanikalVehicleCarbodyTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-mekanikal-vehicle-carbody-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        
        if ($workOrder->formApmMekanikalVehicleAirBrakeSystemTigaBulanans->isNotEmpty()) {
            $data['formApmMekanikalVehicleAirBrakeSystemTigaBulanans'] = $workOrder->formApmMekanikalVehicleAirBrakeSystemTigaBulanans;
            $formId = $data['formApmMekanikalVehicleAirBrakeSystemTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-mekanikal-vehicle-air-brake-system-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmMekanikalVehicleBogieTigaBulanans->isNotEmpty()) {
            $data['formApmMekanikalVehicleBogieTigaBulanans'] = $workOrder->formApmMekanikalVehicleBogieTigaBulanans;
            $formId = $data['formApmMekanikalVehicleBogieTigaBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-mekanikal-vehicle-bogie-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmMekanikalVehicleMingguans->isNotEmpty()) {
            $data['formApmMekanikalVehicleMingguans'] = $workOrder->formApmMekanikalVehicleMingguans;
            $formId = $data['formApmMekanikalVehicleMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-mekanikal-vehicle-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        if ($workOrder->formApmVehicleAirBrakeSystemHarians->isNotEmpty()) {
            $data['formApmVehicleAirBrakeSystemHarians'] = $workOrder->formApmVehicleAirBrakeSystemHarians;
            $formId = $data['formApmVehicleAirBrakeSystemHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-air-brake-system-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formApmMekanikalVehicleBogieHarians->isNotEmpty()) {
            $data['formApmMekanikalVehicleBogieHarians'] = $workOrder->formApmMekanikalVehicleBogieHarians;
            $formId = $data['formApmMekanikalVehicleBogieHarians'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-mekanikal-vehicle-bogie-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // ----- FORM PDF - ELP
        if ($workOrder->formElpMeteringDuaMingguans->isNotEmpty()) {
            $data['formElpMeteringDuaMingguans'] = $workOrder->formElpMeteringDuaMingguans;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $formId = $data['formElpMeteringDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-elp-metering-dua-mingguan', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formElpTrafoDuaMingguans->isNotEmpty()) {
            $data['formElpTrafoDuaMingguans'] = $workOrder->formElpTrafoDuaMingguans;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $formId = $data['formElpTrafoDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-elp-trafo-dua-mingguan', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formElpRelayDuaMingguans->isNotEmpty()) {
            $data['formElpRelayDuaMingguans'] = $workOrder->formElpRelayDuaMingguans;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $formId = $data['formElpRelayDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-elp-relay-dua-mingguan', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formElpPlcDuaMingguans->isNotEmpty()) {
            $data['formElpPlcDuaMingguans'] = $workOrder->formElpPlcDuaMingguans;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $formId = $data['formElpPlcDuaMingguans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-elp-plc-dua-mingguan', [0, 0, 609.4488, 935.433], 'landscape', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formElpPartlyEnamBulanans->isNotEmpty()) {
            $data['formElpPartlyEnamBulanans'] = $workOrder->formElpPartlyEnamBulanans;
            $data['tanggal_hari'] = Carbon::parse($workOrder->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $formId = $data['formElpPartlyEnamBulanans'][0]->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->select('user_technical_id', 'time_record')
                ->first();
            $timeRecord = $getUserId->time_record;
            $data['properties'] = [['title' => 'Ifault (A)', 'name' => 'ifault_a'], ['title' => '10I/Is (s)', 'name' => 'ten_i'], ['title' => 'TMS (s)', 'name' => 'tms'], ['title' => 't (s)', 'name' => 't']];
            $data['hari'] = strtoupper(
                Carbon::parse($timeRecord)
                    ->locale('id')
                    ->isoFormat('dddd'),
            );
            $data['bulan'] = strtoupper(
                Carbon::parse($timeRecord)
                    ->locale('id')
                    ->isoFormat('MMMM'),
            );
            $data['tanggal'] = Carbon::parse($timeRecord)
                ->locale('id')
                ->isoFormat('DD-MM-YYYY');
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-elp-partly-enam-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        if ($workOrder->formWtrPeralatanHarians->isNotEmpty()) {
            $data['hariTanggal'] = Carbon::parse($workOrder->date_generate)
                ->locale('id_ID')
                ->isoFormat('dddd, DD MMMM YYYY');
            $data['formWtrPeralatanHarians'] = $workOrder->formWtrPeralatanHarians;
            $formId = $data['formWtrPeralatanHarians'][0]->form_id;
            $data['qrCode'] = QrCode::generate($workOrder->date_generate . '_PAGI');
            $data['userTechnicals'] = [];
            foreach ($data['work_order']->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($data['work_order']->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $pdf = $this->createPdf('report.form-report.form-wtr-laporan-pagi-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        
        if ($workOrder->formElpDailyGhs->isNotEmpty()) {
            $data['hariTanggal'] = Carbon::parse($workOrder->date_generate)
                ->locale('id_ID')
                ->isoFormat('dddd, DD MMMM YYYY');
            $data['gh_126_exts'] = [
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

            $data['gh126Exts'] = FormElpDailyGh::where('work_order_id', $workOrder->id)
                ->where('group', 'gh_123_ext')
                ->orderBy('id', 'asc')
                ->get();

            $data['gh127Er1s'] = FormElpDailyGh::where('work_order_id', $workOrder->id)
                ->where('group', 'gh_127_er1')
                ->orderBy('id', 'asc')
                ->get();

            $data['gh127Er2s'] = FormElpDailyGh::where('work_order_id', $workOrder->id)
                ->where('group', 'gh_127_er2')
                ->orderBy('id', 'asc')
                ->get();

            $data['gh128Er1s'] = FormElpDailyGh::where('work_order_id', $workOrder->id)
                ->where('group', 'gh_128_er1')
                ->orderBy('id', 'asc')
                ->get();

            $data['gh128Er2s'] = FormElpDailyGh::where('work_order_id', $workOrder->id)
                ->where('group', 'gh_128_er2')
                ->orderBy('id', 'asc')
                ->get();
            $formId = $data['gh126Exts'][0]->form_id;

            $pdf = $this->createPdf('report.form-report.form-elp-daily-gh', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function createPdf($view, $paperSize, $paperOrientation, $data)
    {
        $viewPdf = \View::make($view, $data)->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($viewPdf)->setPaper($paperSize, $paperOrientation);
        return $pdf;
    }

    public function viewMaintenanceReport($id)
    {
        $data['schedule_maintenance'] = ScheduleMaintenance::findOrFail($id);
        $data['work_orders'] = WorkOrder::where('schedule_maintenance_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $pdf = PDF::loadview('report.maintenance-report', $data);
        return $pdf->stream();
    }

    public function viewAssetReport($id)
    {
        $data['asset'] = Asset::findOrFail($id);
        $data['boms'] = Asset::findOrFail($id)->boms;
        $data['material'] = [];
        foreach ($data['boms'] as $bom) {
            foreach ($bom->materials as $material) {
                if (!in_array($material->name, $data['material'])) {
                    array_push($data['material'], $material->name);
                }
            }
        }

        $pdf = PDF::loadview('report.asset-report', $data);

        //merger pdf using libmergepdf
        $merger = new Merger();
        $merger->addRaw($pdf->output());
        $merger->addFile('https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png');
        $merger->merge();
        $merger->save('merged.pdf');

        return $pdf->stream();
    }

    public function dailyWorkOrderReport()
    {
        $data['page_title'] = 'Daily Work Order Report';
        $data['workOrders'] = WorkOrder::orderBy('id', 'desc')
            ->whereBetween('date_generate', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->where('wo_status', '!=', 'IOT')
            ->get();

        return view('report.daily-work-order-report', $data);
    }

    public function viewDailyWorkOrderReport()
    {
        $data['work_orders'] = WorkOrder::orderBy('id', 'desc')
            ->whereBetween('date_generate', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->where('wo_status', '!=', 'IOT')
            ->get();

        $pdf = PDF::loadview('report.view-daily-work-order-report', $data);
        $pdf->setPaper([0, 0, 609.4488, 935.433], 'landscape');
        return $pdf->stream();
    }

    public function workOrderPdf($id)
    {
        $workOrder = WorkOrder::findOrFail($id);
        $data['work_order'] = $workOrder;
        $data['approve'] = $workOrder->approve_user_id !== null && $workOrder->approve_user_id !== 0 ? User::findOrFail($workOrder->approve_user_id) : null;
        $data['userTechnicals'] = [];

        foreach ($data['work_order']->userGroups as $userGroup) {
            foreach ($userGroup->customUserTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
        }

        foreach ($data['work_order']->userTechnicals as $userTechnical) {
            $data['userTechnicals'][] = $userTechnical->name;
        }
        $pdf = $this->createPdf('report.new-work-order-report', [0, 0, 609.4488, 935.433], 'portrait', $data);
        return $pdf;
    }


    public function getWorkOrder($date, $dateRange){
        $start_date = $date . ' 00:00:00';
        $end_date = $date . ' 23:59:59';

        if ($dateRange == 'month') {
            $start_date = date('Y-m-01 H:i:s', strtotime($date . ' 00:00:00'));
            $end_date = date('Y-m-t H:i:s', strtotime($date . ' 23:59:59'));
        } elseif ($dateRange == 'year') {
            $start_date = date('Y-01-01 H:i:s', strtotime($date . '-01-01 00:00:00'));
            $end_date = date('Y-12-t H:i:s', strtotime($date . '-12-31 23:59:59'));
        }

        $workOrders = WorkOrder::orderBy('id', 'desc')
            ->where('wo_status', 'manual')
            ->whereBetween('date_generate', [$start_date, $end_date])
            ->with(['asset', 'workOrderStatus', 'maintenanceType', 'scheduleMaintenance'])
            ->get();

        return $workOrders;
    }

    // REPORT - ELE
    public function reportEle()
    {
        $data['page_title'] = 'Report Elctrical Utility';
        $workOrders = WorkOrder::orderBy('id', 'desc')
            ->whereBetween('date_generate', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->where('wo_status', '!=', 'IOT')
            ->with(['asset', 'workOrderStatus', 'maintenanceType', 'scheduleMaintenance'])
            ->get();
        $data['date'] = date('Y-m-d');
        $data['month'] = date('Y-m');
        $data['year'] = date('Y');

        // Filter By asset code
        $electricalUtilityWorkOrders = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->asset->code == '#ELE';
            })
            ->values();

        // After filterated by asset code, then filter by maintenanceType
        $data['preventives'] = $electricalUtilityWorkOrders
            ->filter(function ($workOrder) {
                return $workOrder->maintenanceType->name == 'Preventive';
            })
            ->values();

        // Filter Checklist1
        $data['checklist1s'] = $electricalUtilityWorkOrders
            ->filter(function ($workOrder) {
                return $workOrder->formEleChecklist1Harians->isNotEmpty();
            })
            ->values();

        // Filter Checklist2
        $data['checklist2s'] = $electricalUtilityWorkOrders
            ->filter(function ($workOrder) {
                return $workOrder->formEleChecklist2Harians->isNotEmpty();
            })
            ->values();

        return view('report.ele.index', $data);
    }

    public function reportElePreventive(Request $request)
    {
        $m = new Merger();

        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $electricalUtilityWorkOrders = $workOrders->filter(function ($workOrder) {
            return $workOrder->asset->code == '#ELE';
        });

        $preventives = $electricalUtilityWorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        });

        if ($electricalUtilityWorkOrders->isEmpty()) {
            return redirect()
                ->route('report.electrical-utility.electrical-utility.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($preventives as $preventive) {
            $m->addRaw($this->workOrderPdf($preventive->id)->output());
            if ($preventive->tasks->isNotEmpty() || $preventive->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $preventive]);
                $m->addRaw($pdf->output());
            }
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportEleChecklist1(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormEleChecklist1Harians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formEleChecklist1Harians->isNotEmpty();
        });

        if ($woFormEleChecklist1Harians->isEmpty()) {
            return redirect()
                ->route('report.electrical-utility.electrical-utility.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormEleChecklist1Harians as $woFormEleChecklist1Harian) {
            $m->addRaw($this->workOrderPdf($woFormEleChecklist1Harian->id)->output());
            if ($woFormEleChecklist1Harian->tasks->isNotEmpty() || $woFormEleChecklist1Harian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormEleChecklist1Harian]);
                $m->addRaw($pdf->output());
            }
            $data['formEleChecklist1Harians'] = $woFormEleChecklist1Harian->formEleChecklist1Harians;
            $data['formEleChecklist1HarianUtaras'] = FormEleChecklist1Harian::where('work_order_id', $woFormEleChecklist1Harian->id)
                ->where('posisi', 'utara')
                ->orderBy('id', 'asc')
                ->get();

            $data['formEleChecklist1HarianSelatans'] = FormEleChecklist1Harian::where('work_order_id', $woFormEleChecklist1Harian->id)
                ->where('posisi', 'selatan')
                ->orderBy('id', 'asc')
                ->get();
            $formId = $woFormEleChecklist1Harian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormEleChecklist1Harian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ele-cheklist1-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function reportEleChecklist2(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormEleChecklist2Harians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formEleChecklist2Harians->isNotEmpty();
        });

        if ($woFormEleChecklist2Harians->isEmpty()) {
            return redirect()
                ->route('report.electrical-utility.electrical-utility.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($woFormEleChecklist2Harians as $woFormEleChecklist2Harian) {
            $m->addRaw($this->workOrderPdf($woFormEleChecklist2Harian->id)->output());
            if ($woFormEleChecklist2Harian->tasks->isNotEmpty() || $woFormEleChecklist2Harian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormEleChecklist2Harian]);
                $m->addRaw($pdf->output());
            }

            $data['formEleChecklist2Harians'] = $woFormEleChecklist2Harian->formEleChecklist2Harians;
            $data['formEleChecklist2HarianUtaras'] = FormEleChecklist2Harian::where('work_order_id', $woFormEleChecklist2Harian->id)
                ->where('posisi', 'utara')
                ->orderBy('id', 'asc')
                ->get();

            $data['formEleChecklist2HarianSelatans'] = FormEleChecklist2Harian::where('work_order_id', $woFormEleChecklist2Harian->id)
                ->where('posisi', 'selatan')
                ->orderBy('id', 'asc')
                ->get();
            $formId = $woFormEleChecklist2Harian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormEleChecklist2Harian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;

            $pdf = $this->createPdf('report.form-report.form-ele-cheklist2-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    // SVA
    public function ReportSva()
    {
        $data['page_title'] = 'Report South Visual Aid';
        $workOrders = WorkOrder::orderBy('id', 'desc')
            ->whereBetween('date_generate', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->where('wo_status', '!=', 'IOT')
            ->with(['asset', 'workOrderStatus', 'maintenanceType', 'scheduleMaintenance'])
            ->get();
        $data['date'] = date('Y-m-d');
        $data['month'] = date('Y-m');
        $data['year'] = date('Y');

        // Filter By asset code
        $southVisualAidWorkOrders = $workOrders->filter(function ($workOrder) {
            return $workOrder->asset->code == '#SVA';
        })->values();

        // After filterated by asset code, then filter by maintenanceType
        $data['preventives'] = $southVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        })->values();

        // Filter Checklist1
        $data['checklist1s'] = $southVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSvaChecklist1Harians->isNotEmpty();
        })->values();

        // Filter Checklist2
        $data['checklist2s'] = $southVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSvaChecklist2Harians->isNotEmpty();
        })->values();
        $data['suratIzins'] = $southVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSvaSuratIzinPelaksanaanPekerjaan;
        })->values();

        $data['suratPerbaikans'] = $southVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSvaSuratPerbaikanGangguan;
        })->values();

        $data['suratPemeriksaans'] = $southVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSvaSuratPemeriksaanRutin;
        })->values();

        $data['flightCalibrations'] = $southVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSvaHFCPapiHarians->isNotEmpty();
        })->values();

        $data['currentRegulators'] = $southVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSvaConstantCurrentRegulations->isNotEmpty();
        })->values();
        return view('report.sva.index', $data);
    }
    public function ReportSvaPreventive(Request $request)
    {
        $m = new Merger();

        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $southVisualAidWorkOrders = $workOrders->filter(function ($workOrder) {
            return $workOrder->asset->code == '#SVA';
        });

        $preventives = $southVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        });

        if($southVisualAidWorkOrders->isEmpty()){
            return redirect()
                    ->route('report.south-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($preventives as $preventive) {
            $m->addRaw($this->workOrderPdf($preventive->id)->output());
            if ($preventive->tasks->isNotEmpty() || $preventive->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $preventive]);
                $m->addRaw($pdf->output());
            }
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSvaChecklist1(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormSvaChecklist1Harians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSvaChecklist1Harians->isNotEmpty();
        });

        if($woFormSvaChecklist1Harians->isEmpty()){
            return redirect()
                    ->route('report.south-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormSvaChecklist1Harians as $woFormSvaChecklist1Harian) {
            $m->addRaw($this->workOrderPdf($woFormSvaChecklist1Harian->id)->output());
            if ($woFormSvaChecklist1Harian->tasks->isNotEmpty() || $woFormSvaChecklist1Harian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormSvaChecklist1Harian]);
                $m->addRaw($pdf->output());
            }
            $data['formSvaChecklist1Harians'] = $woFormSvaChecklist1Harian->formSvaChecklist1Harians;

            $formId = $woFormSvaChecklist1Harian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormSvaChecklist1Harian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-sva-cheklist1-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSvaChecklist2(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormSvaChecklist2Harians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSvaChecklist2Harians->isNotEmpty();
        });

        if($woFormSvaChecklist2Harians->isEmpty()){
            return redirect()
                    ->route('report.south-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormSvaChecklist2Harians as $woFormSvaChecklist2Harian) {
            $m->addRaw($this->workOrderPdf($woFormSvaChecklist2Harian->id)->output());
            if ($woFormSvaChecklist2Harian->tasks->isNotEmpty() || $woFormSvaChecklist2Harian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormSvaChecklist2Harian]);
                $m->addRaw($pdf->output());
            }
            $data['formSvaChecklist2Harians'] = $woFormSvaChecklist2Harian->formSvaChecklist2Harians;

            $formId = $woFormSvaChecklist2Harian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormSvaChecklist2Harian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-sva-cheklist2-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSvaSuratIzin(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormSvaSuratIzins = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSvaSuratIzinPelaksanaanPekerjaan;
        });

        if($woFormSvaSuratIzins->isEmpty()){
            return redirect()
                    ->route('report.south-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormSvaSuratIzins as $woFormSvaSuratIzin) {
            $m->addRaw($this->workOrderPdf($woFormSvaSuratIzin->id)->output());
            if ($woFormSvaSuratIzin->tasks->isNotEmpty() || $woFormSvaSuratIzin->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormSvaSuratIzin]);
                $m->addRaw($pdf->output());
            }
            $data['formSvaSuratIzinPelaksanaanPekerjaan'] = $woFormSvaSuratIzin->formSvaSuratIzinPelaksanaanPekerjaan;
            $formId = $woFormSvaSuratIzin->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormSvaSuratIzin->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['assetMaterials'] = AssetMaterial::where('asset_id', $woFormSvaSuratIzin->asset_id)
                ->with(['bom'])
                ->get();
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormSvaSuratIzin->tanggal));
            $data['userTechnicals'] = [];
            foreach ($woFormSvaSuratIzin->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($woFormSvaSuratIzin->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $pdf = $this->createPdf('report.form-report.form-sva-surat-izin-pelaksanaan-pekerjaan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSvaSuratPerbaikan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormSvaSuratPerbaikans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSvaSuratPerbaikanGangguan;
        });

        if($woFormSvaSuratPerbaikans->isEmpty()){
            return redirect()
                    ->route('report.south-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormSvaSuratPerbaikans as $woFormSvaSuratPerbaikan) {
            $m->addRaw($this->workOrderPdf($woFormSvaSuratPerbaikan->id)->output());
            if ($woFormSvaSuratPerbaikan->tasks->isNotEmpty() || $woFormSvaSuratPerbaikan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormSvaSuratPerbaikan]);
                $m->addRaw($pdf->output());
            }
            $data['formSvaSuratPerbaikanGangguan'] = $woFormSvaSuratPerbaikan->formSvaSuratPerbaikanGangguan;
            $formId = $woFormSvaSuratPerbaikan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormSvaSuratPerbaikan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormSvaSuratPerbaikan->tanggal));
            $data['userTechnicals'] = [];
            foreach ($woFormSvaSuratPerbaikan->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($woFormSvaSuratPerbaikan->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $pdf = $this->createPdf('report.form-report.form-sva-surat-perbaikan-gangguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSvaSuratPemeriksaan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormSvaSuratPemeriksaans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSvaSuratPemeriksaanRutin;
        });

        if($woFormSvaSuratPemeriksaans->isEmpty()){
            return redirect()
                    ->route('report.south-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormSvaSuratPemeriksaans as $woFormSvaSuratPemeriksaan) {
            $m->addRaw($this->workOrderPdf($woFormSvaSuratPemeriksaan->id)->output());
            if ($woFormSvaSuratPemeriksaan->tasks->isNotEmpty() || $woFormSvaSuratPemeriksaan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormSvaSuratPemeriksaan]);
                $m->addRaw($pdf->output());
            }
            $data['formSvaSuratPemeriksaanRutin'] = $woFormSvaSuratPemeriksaan->formSvaSuratPemeriksaanRutin;
            $formId = $woFormSvaSuratPemeriksaan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormSvaSuratPemeriksaan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormSvaSuratPemeriksaan->tanggal));
            $data['userTechnicals'] = [];
            foreach ($woFormSvaSuratPemeriksaan->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($woFormSvaSuratPemeriksaan->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $pdf = $this->createPdf('report.form-report.form-sva-surat-pemeriksaan-rutin', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSvaFlightCalibration(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormSvaHFCPapis = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSvaHFCPapiHarians->isNotEmpty();
        });

        if($woFormSvaHFCPapis->isEmpty()){
            return redirect()
                    ->route('report.south-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormSvaHFCPapis as $woFormSvaHFCPapi) {
            $m->addRaw($this->workOrderPdf($woFormSvaHFCPapi->id)->output());
            if ($woFormSvaHFCPapi->tasks->isNotEmpty() || $woFormSvaHFCPapi->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormSvaHFCPapi]);
                $m->addRaw($pdf->output());
            }
            $data['formSvaHFCPapiHarians'] = $woFormSvaHFCPapi->formSvaHFCPapiHarians;
            $formId = $woFormSvaHFCPapi->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormSvaHFCPapi->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['hari'] = strtoupper(
                Carbon::parse($woFormSvaHFCPapi->date_generate)
                    ->locale('id')
                    ->isoFormat('dddd'),
            );
            $data['tanggal'] = Carbon::parse($woFormSvaHFCPapi->date_generate)
                ->locale('id')
                ->isoFormat('DD-MM-YYYY');
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['technicalGroups'] = [];
            $data['userTechnicals'] = [];
            foreach ($woFormSvaHFCPapi->userGroups as $userGroup) {
                $data['technicalGroups'][] = $userGroup->name;
            }
            foreach ($woFormSvaHFCPapi->userGroups as $key => $userGroup) {
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
            $pdf = $this->createPdf('report.form-report.form-sva-hfc-papi-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSvaCurrentRegulator(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormccrHarians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSvaConstantCurrentRegulations->isNotEmpty();
        });

        if($woFormccrHarians->isEmpty()){
            return redirect()
                    ->route('report.south-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormccrHarians as $woFormccrHarian) {
            $m->addRaw($this->workOrderPdf($woFormccrHarian->id)->output());
            if ($woFormccrHarian->tasks->isNotEmpty() || $woFormccrHarian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormccrHarian]);
                $m->addRaw($pdf->output());
            }
            $data['formSvaConstantCurrentRegulations'] = $woFormccrHarian->formSvaConstantCurrentRegulations;
            $formId = $woFormccrHarian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormccrHarian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['technicalGroups'] = [];
            $data['userTechnicals'] = [];
            foreach ($woFormccrHarian->userGroups as $userGroup) {
                $data['technicalGroups'][] = $userGroup->name;
            }
            foreach ($woFormccrHarian->userGroups as $key => $userGroup) {
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
            $pdf = $this->createPdf('report.form-report.form-sva-ccr-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    

    // NVA
    public function ReportNva()
    {
        $data['page_title'] = 'Report North Visual Aid';
        $workOrders = WorkOrder::orderBy('id', 'desc')
            ->whereBetween('date_generate', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->where('wo_status', '!=', 'IOT')
            ->with(['asset', 'workOrderStatus', 'maintenanceType', 'scheduleMaintenance'])
            ->get();
        $data['date'] = date('Y-m-d');
        $data['month'] = date('Y-m');
        $data['year'] = date('Y');

        $northVisualAidWorkOrders = $workOrders->filter(function ($workOrder) {
            return $workOrder->asset->code == '#NVA';
        })->values();

        $data['preventives'] = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        });
        $data['checklist1s'] = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formNvaChecklist1Harians;
        });
        $data['checklist2s'] = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formNvaChecklist2Harians;
        });
        $data['suratIzins'] = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formNvaSuratIzinPelaksanaanPekerjaan;
        })->values();

        $data['suratPerbaikans'] = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formNvaSuratPerbaikanGangguan;
        })->values();

        $data['suratPemeriksaans'] = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formNvaSuratPemeriksaanRutin;
        })->values();

        $data['flightCalibrations'] = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formNvaHFCPapiHarians->isNotEmpty();
        })->values();

        $data['currentRegulators'] = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formNvaConstantCurrentRegulations->isNotEmpty();
        })->values();

        $data['currentRegulatorduas'] = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formNvaConstantCurrentRegulationDuas->isNotEmpty();
        })->values();
        return view('report.nva.index', $data);
    }
    public function ReportNvaPreventive(Request $request)
    {

        $m = new Merger();

        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $northVisualAidWorkOrders = $workOrders->filter(function ($workOrder) {
            return $workOrder->asset->name == 'North Visual Aid';
        });

        $preventives = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        });

        if ($northVisualAidWorkOrders->isEmpty()) {
            return redirect()
                ->route('report.electrical-utility.index')
                ->with(['failed' => "No Data!"]);
        }
        foreach ($preventives as $preventive) {
            $m->addRaw($this->workOrderPdf($preventive->id)->output());
            if ($preventive->tasks->isNotEmpty() || $preventive->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $preventive]);
                $m->addRaw($pdf->output());
            }
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }
        public function ReportNvaChecklist1(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormNvaChecklist1Harians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formNvaChecklist1Harians->isNotEmpty();
        });

        if($woFormNvaChecklist1Harians->isEmpty()){
            return redirect()
                    ->route('report.north-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormNvaChecklist1Harians as $woFormNvaChecklist1Harian) {
            $m->addRaw($this->workOrderPdf($woFormNvaChecklist1Harian->id)->output());
            if ($woFormNvaChecklist1Harian->tasks->isNotEmpty() || $woFormNvaChecklist1Harian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormNvaChecklist1Harian]);
                $m->addRaw($pdf->output());
            }
            $data['formSvaChecklist1Harians'] = $woFormNvaChecklist1Harian->formSvaChecklist1Harians;

            $formId = $woFormNvaChecklist1Harian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormNvaChecklist1Harian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-nva-cheklist1-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportNvaChecklist2(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormNvaChecklist2Harians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formNvaChecklist2Harians->isNotEmpty();
        });

        if($woFormNvaChecklist2Harians->isEmpty()){
            return redirect()
                    ->route('report.north-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormNvaChecklist2Harians as $woFormNvaChecklist2Harian) {
            $m->addRaw($this->workOrderPdf($woFormNvaChecklist2Harian->id)->output());
            if ($woFormNvaChecklist2Harian->tasks->isNotEmpty() || $woFormNvaChecklist2Harian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormNvaChecklist2Harian]);
                $m->addRaw($pdf->output());
            }
            $data['formSvaChecklist2Harians'] = $woFormNvaChecklist2Harian->formSvaChecklist2Harians;

            $formId = $woFormNvaChecklist2Harian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormNvaChecklist2Harian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-nva-cheklist2-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportNvaSuratIzin(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormNvaSuratIzins = $workOrders->filter(function ($workOrder) {
            return $workOrder->formNvaSuratIzinPelaksanaanPekerjaan;
        });

        if($woFormNvaSuratIzins->isEmpty()){
            return redirect()
                    ->route('report.north-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormNvaSuratIzins as $woFormNvaSuratIzin) {
            $m->addRaw($this->workOrderPdf($woFormNvaSuratIzin->id)->output());
            if ($woFormNvaSuratIzin->tasks->isNotEmpty() || $woFormNvaSuratIzin->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormNvaSuratIzin]);
                $m->addRaw($pdf->output());
            }
            $data['formNvaSuratIzinPelaksanaanPekerjaan'] = $woFormNvaSuratIzin->formNvaSuratIzinPelaksanaanPekerjaan;
            $formId = $woFormNvaSuratIzin->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormNvaSuratIzin->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['assetMaterials'] = AssetMaterial::where('asset_id', $woFormNvaSuratIzin->asset_id)
                ->with(['bom'])
                ->get();
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormNvaSuratIzin->tanggal));
            $data['userTechnicals'] = [];
            foreach ($woFormNvaSuratIzin->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($woFormNvaSuratIzin->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $pdf = $this->createPdf('report.form-report.form-nva-surat-izin-pelaksanaan-pekerjaan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportNvaSuratPerbaikan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormNvaSuratPerbaikans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formNvaSuratPerbaikanGangguan;
        });

        if($woFormNvaSuratPerbaikans->isEmpty()){
            return redirect()
                    ->route('report.north-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormNvaSuratPerbaikans as $woFormNvaSuratPerbaikan) {
            $m->addRaw($this->workOrderPdf($woFormNvaSuratPerbaikan->id)->output());
            if ($woFormNvaSuratPerbaikan->tasks->isNotEmpty() || $woFormNvaSuratPerbaikan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormNvaSuratPerbaikan]);
                $m->addRaw($pdf->output());
            }
            $data['formNvaSuratPerbaikanGangguan'] = $woFormNvaSuratPerbaikan->formNvaSuratPerbaikanGangguan;
            $formId = $woFormNvaSuratPerbaikan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormNvaSuratPerbaikan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormNvaSuratPerbaikan->tanggal));
            $data['userTechnicals'] = [];
            foreach ($woFormNvaSuratPerbaikan->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($woFormNvaSuratPerbaikan->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $pdf = $this->createPdf('report.form-report.form-nva-surat-perbaikan-gangguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportNvaSuratPemeriksaan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormNvaSuratPemeriksaans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formNvaSuratPemeriksaanRutin;
        });

        if($woFormNvaSuratPemeriksaans->isEmpty()){
            return redirect()
                    ->route('report.north-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormNvaSuratPemeriksaans as $woFormNvaSuratPemeriksaan) {
            $m->addRaw($this->workOrderPdf($woFormNvaSuratPemeriksaan->id)->output());
            if ($woFormNvaSuratPemeriksaan->tasks->isNotEmpty() || $woFormNvaSuratPemeriksaan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormNvaSuratPemeriksaan]);
                $m->addRaw($pdf->output());
            }
            $data['formNvaSuratPemeriksaanRutin'] = $woFormNvaSuratPemeriksaan->formNvaSuratPemeriksaanRutin;
            $formId = $woFormNvaSuratPemeriksaan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormNvaSuratPemeriksaan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormNvaSuratPemeriksaan->tanggal));
            $data['userTechnicals'] = [];
            foreach ($woFormNvaSuratPemeriksaan->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($woFormNvaSuratPemeriksaan->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $pdf = $this->createPdf('report.form-report.form-nva-surat-pemeriksaan-rutin', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportNvaFlightCalibration(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormNvaHFCPapis = $workOrders->filter(function ($workOrder) {
            return $workOrder->formNvaHFCPapiHarians->isNotEmpty();
        });

        if($woFormNvaHFCPapis->isEmpty()){
            return redirect()
                    ->route('report.north-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormNvaHFCPapis as $woFormNvaHFCPapi) {
            $m->addRaw($this->workOrderPdf($woFormNvaHFCPapi->id)->output());
            if ($woFormNvaHFCPapi->tasks->isNotEmpty() || $woFormNvaHFCPapi->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormNvaHFCPapi]);
                $m->addRaw($pdf->output());
            }
            $data['formNvaHFCPapiHarians'] = $woFormNvaHFCPapi->formNvaHFCPapiHarians;
            $formId = $woFormNvaHFCPapi->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormNvaHFCPapi->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['hari'] = strtoupper(
                Carbon::parse($woFormNvaHFCPapi->date_generate)
                    ->locale('id')
                    ->isoFormat('dddd'),
            );
            $data['tanggal'] = Carbon::parse($woFormNvaHFCPapi->date_generate)
                ->locale('id')
                ->isoFormat('DD-MM-YYYY');
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['technicalGroups'] = [];
            $data['userTechnicals'] = [];
            foreach ($woFormNvaHFCPapi->userGroups as $userGroup) {
                $data['technicalGroups'][] = $userGroup->name;
            }
            foreach ($woFormNvaHFCPapi->userGroups as $key => $userGroup) {
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
            $pdf = $this->createPdf('report.form-report.form-nva-hfc-papi-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportNvaCurrentRegulator(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormNvaccrHarians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formNvaConstantCurrentRegulations->isNotEmpty();
        });

        if($woFormNvaccrHarians->isEmpty()){
            return redirect()
                    ->route('report.north-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormNvaccrHarians as $woFormNvaccrHarian) {
            $m->addRaw($this->workOrderPdf($woFormNvaccrHarian->id)->output());
            if ($woFormNvaccrHarian->tasks->isNotEmpty() || $woFormNvaccrHarian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormNvaccrHarian]);
                $m->addRaw($pdf->output());
            }
            $data['formNvaConstantCurrentRegulations'] = $woFormNvaccrHarian->formNvaConstantCurrentRegulations;
            $formId = $woFormNvaccrHarian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormNvaccrHarian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['technicalGroups'] = [];
            $data['userTechnicals'] = [];
            foreach ($woFormNvaccrHarian->userGroups as $userGroup) {
                $data['technicalGroups'][] = $userGroup->name;
            }
            foreach ($woFormNvaccrHarian->userGroups as $key => $userGroup) {
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
            $pdf = $this->createPdf('report.form-report.form-nva-ccr-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportNvaCurrentRegulatorDua(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormNvaccrHarianduas = $workOrders->filter(function ($workOrder) {
            return $workOrder->formNvaConstantCurrentRegulationDuas->isNotEmpty();
        });

        if($woFormNvaccrHarianduas->isEmpty()){
            return redirect()
                    ->route('report.north-visual-aid.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormNvaccrHarianduas as $woFormNvaccrHariandua) {
            $m->addRaw($this->workOrderPdf($woFormNvaccrHariandua->id)->output());
            if ($woFormNvaccrHariandua->tasks->isNotEmpty() || $woFormNvaccrHariandua->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormNvaccrHariandua]);
                $m->addRaw($pdf->output());
            }
            $data['formNvaConstantCurrentRegulationDuas'] = $woFormNvaccrHariandua->formNvaConstantCurrentRegulationDuas;
            $formId = $woFormNvaccrHariandua->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormNvaccrHariandua->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['tanggal'] = Carbon::parse($woFormNvaccrHariandua->date_generate)
                ->locale('id')
                ->isoFormat('DD-MM-YYYY');
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $data['technicalGroups'] = [];
            $data['userTechnicals'] = [];
            foreach ($woFormNvaccrHariandua->userGroups as $userGroup) {
                $data['technicalGroups'][] = $userGroup->name;
            }
            foreach ($woFormNvaccrHariandua->userGroups as $key => $userGroup) {
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
            $pdf = $this->createPdf('report.form-report.form-nva-ccrdua-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    // UPS
    public function ReportUps()
    {
        $data['page_title'] = 'Report UPS & Converter';
        $data['workOrders'] = WorkOrder::orderBy('id', 'desc')
            ->whereBetween('date_generate', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->where('wo_status', '!=', 'IOT')
            ->get();
        $data['date'] = date('Y-m-d');
        $data['month'] = date('Y-m');
        $data['year'] = date('Y');

        $upsWorkOrders = $data['workOrders']->filter(function ($workOrder) {
            return $workOrder->asset->code == '#UPS';
        })->values();

        // After filterated by asset code, then filter by maintenanceType
        $data['preventives'] = $upsWorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        })->values();

        $data['kerjaPagis'] = $upsWorkOrders->filter(function ($workOrder) {
            return $workOrder->formUpsLaporanHasilKerja;
        })->values();

        $data['kerjaMalams'] = $upsWorkOrders->filter(function ($workOrder) {
            return $workOrder->formUpsLaporanHasilKerjaMalam;
        })->values();

        $data['laporanKerusakans'] = $upsWorkOrders->filter(function ($workOrder) {
            return $workOrder->formUpsLaporanKerusakanDanPerbaikan;
        })->values();

        $data['pengukuranPeralatanMingguans'] = $upsWorkOrders->filter(function ($workOrder) {
            return $workOrder->formUpsPengukuranPeralatanDuaMingguans->isNotEmpty();
        })->values();

        $data['pengukuranPeralatanBulanans'] = $upsWorkOrders->filter(function ($workOrder) {
            return $workOrder->formUpsPengukuranPeralatanEnamBulanans->isNotEmpty();
        })->values();

        $data['dataUkurs'] = $upsWorkOrders->filter(function ($workOrder) {
            return $workOrder->formUpsDataUkurLoadBebans->isNotEmpty();
        })->values();

        $data['pengukuranBatterys'] = $upsWorkOrders->filter(function ($workOrder) {
            return $workOrder->formUpsPengukuranTeganganBatterys->isNotEmpty();
        })->values();
        return view('report.ups.index', $data);
    }
    public function ReportUpsPreventive(Request $request)
    {
        $m = new Merger();

        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $upsWorkOrders = $workOrders->filter(function ($workOrder) {
            return $workOrder->asset->code == '#UPS';
        })->values();

        $preventives = $upsWorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        })->values();

        if ($upsWorkOrders->isEmpty()) {
            return redirect()
                ->route('report.ups.index')
                ->with(['failed' => "No Data!"]);
        }

        $pdf = $this->createPdf('report.dokumentasi-report', [0, 0, 609.4488, 935.433], 'portrait', [
            'workOrders' => $preventives,
            'tanggal_hari' => Carbon::parse($preventives[0]->date_generate)
                ->locale('id')
                ->isoFormat('dddd'),
            'tanggalWo' => $data['tanggalWo'] = date('Y-m-d', strtotime($preventives[0]->date_generate)),
        ]);
        $m->addRaw($pdf->output());

        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportUpsKerjaPagi(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormUpsKerjaPagis = $workOrders->filter(function ($workOrder) {
            return $workOrder->formUpsLaporanHasilKerja;
        });

        if ($woFormUpsKerjaPagis->isEmpty()) {
            return redirect()
                ->route('report.ups.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormUpsKerjaPagis as $woFormUpsKerjaPagi) {
            $m->addRaw($this->workOrderPdf($woFormUpsKerjaPagi->id)->output());
            if ($woFormUpsKerjaPagi->tasks->isNotEmpty() || $woFormUpsKerjaPagi->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormUpsKerjaPagi]);
                $m->addRaw($pdf->output());
            }
            $data['formUpsLaporanHasilKerja'] = $woFormUpsKerjaPagi->formUpsLaporanHasilKerja;
            $formId = $woFormUpsKerjaPagi->form_id;
            $data['tanggal_hari'] = Carbon::parse($woFormUpsKerjaPagi->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormUpsKerjaPagi->date_generate));
            $getUserId = FormActivityLog::where('work_order_id', $woFormUpsKerjaPagi->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ups-laporan-hasil-kerja', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportUpsKerjaMalam(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormUpsKerjaMalams = $workOrders->filter(function ($workOrder) {
            return $workOrder->formUpsLaporanHasilKerjaMalam;
        });

        if ($woFormUpsKerjaMalams->isEmpty()) {
            return redirect()
                ->route('report.ups.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormUpsKerjaMalams as $woFormUpsKerjaMalam) {
            $m->addRaw($this->workOrderPdf($woFormUpsKerjaMalam->id)->output());
            if ($woFormUpsKerjaMalam->tasks->isNotEmpty() || $woFormUpsKerjaMalam->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormUpsKerjaMalam]);
                $m->addRaw($pdf->output());
            }
            $data['formUpsLaporanHasilKerjaMalam'] = $woFormUpsKerjaMalam->formUpsLaporanHasilKerjaMalam;
            $formId = $woFormUpsKerjaMalam->form_id;
            $data['tanggal_hari'] = Carbon::parse($woFormUpsKerjaMalam->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormUpsKerjaMalam->date_generate));
            $getUserId = FormActivityLog::where('work_order_id', $woFormUpsKerjaMalam->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ups-laporan-hasil-kerja-malam', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportUpsLaporanKerusakan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormUpsLaporanKerusakans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formUpsLaporanKerusakanDanPerbaikan;
        });

        if ($woFormUpsLaporanKerusakans->isEmpty()) {
            return redirect()
                ->route('report.ups.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormUpsLaporanKerusakans as $woFormUpsLaporanKerusakan) {
            $m->addRaw($this->workOrderPdf($woFormUpsLaporanKerusakan->id)->output());
            if ($woFormUpsLaporanKerusakan->tasks->isNotEmpty() || $woFormUpsLaporanKerusakan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormUpsLaporanKerusakan]);
                $m->addRaw($pdf->output());
            }
            $data['formUpsLaporanKerusakanDanPerbaikan'] = $woFormUpsLaporanKerusakan->formUpsLaporanKerusakanDanPerbaikan;
            $formId = $woFormUpsLaporanKerusakan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormUpsLaporanKerusakan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['assetMaterials'] = AssetMaterial::where('asset_id', $woFormUpsLaporanKerusakan->asset_id);
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormUpsLaporanKerusakan->tanggal));
            $data['tanggalWo1'] = date('Y-m-d', strtotime($woFormUpsLaporanKerusakan->tanggal_kerusakan));
            $data['tanggalWo2'] = date('Y-m-d', strtotime($woFormUpsLaporanKerusakan->tanggal_perbaikan));
            $data['jamWo'] = date('H:i:s', strtotime($woFormUpsLaporanKerusakan->tanggal_kerusakan));
            $data['jamWo2'] = date('H:i:s', strtotime($woFormUpsLaporanKerusakan->tanggal_perbaikan));
            $data['userTechnicals'] = [];
            foreach ($woFormUpsLaporanKerusakan->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($woFormUpsLaporanKerusakan->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ups-laporan-kerusakan-dan-perbaikan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportUpsPengukuranPeralatanMingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormUpsPengukuranPeralatanMingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formUpsPengukuranPeralatanDuaMingguans->isNotEmpty();
        });

        if ($woFormUpsPengukuranPeralatanMingguans->isEmpty()) {
            return redirect()
                ->route('report.ups.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormUpsPengukuranPeralatanMingguans as $woFormUpsPengukuranPeralatanMingguan) {
            $m->addRaw($this->workOrderPdf($woFormUpsPengukuranPeralatanMingguan->id)->output());
            if ($woFormUpsPengukuranPeralatanMingguan->tasks->isNotEmpty() || $woFormUpsPengukuranPeralatanMingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormUpsPengukuranPeralatanMingguan]);
                $m->addRaw($pdf->output());
            }
            $data['formUpsPengukuranPeralatanDuaMingguans'] = $woFormUpsPengukuranPeralatanMingguan->formUpsPengukuranPeralatanDuaMingguans;
            $data['tanggal_hari'] = Carbon::parse($woFormUpsPengukuranPeralatanMingguan->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormUpsPengukuranPeralatanMingguan->tanggal));
            $formId = $woFormUpsPengukuranPeralatanMingguan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormUpsPengukuranPeralatanMingguan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ups-pengukuran-peraltan-dua-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportUpsPengukuranPeralatanBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormpsPengukuranPeralatanBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formUpsPengukuranPeralatanEnamBulanans->isNotEmpty();
        });

        if ($woFormpsPengukuranPeralatanBulanans->isEmpty()) {
            return redirect()
                ->route('report.ups.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormpsPengukuranPeralatanBulanans as $woFormpsPengukuranPeralatanBulanan) {
            $m->addRaw($this->workOrderPdf($woFormpsPengukuranPeralatanBulanan->id)->output());
            if ($woFormpsPengukuranPeralatanBulanan->tasks->isNotEmpty() || $woFormpsPengukuranPeralatanBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormpsPengukuranPeralatanBulanan]);
                $m->addRaw($pdf->output());
            }
            $data['formUpsPengukuranPeralatanEnamBulanans'] = $woFormpsPengukuranPeralatanBulanan->formUpsPengukuranPeralatanEnamBulanans;
            $data['tanggal_hari'] = Carbon::parse($woFormpsPengukuranPeralatanBulanan->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormpsPengukuranPeralatanBulanan->tanggal));
            $formId = $woFormpsPengukuranPeralatanBulanan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormpsPengukuranPeralatanBulanan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ups-pengukuran-peraltan-enam-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportUpsDataUkur(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormUpsDataUkurs = $workOrders->filter(function ($workOrder) {
            return $workOrder->formUpsDataUkurLoadBebans->isNotEmpty();
        });

        if ($woFormUpsDataUkurs->isEmpty()) {
            return redirect()
                ->route('report.ups.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormUpsDataUkurs as $woFormUpsDataUkur) {
            $m->addRaw($this->workOrderPdf($woFormUpsDataUkur->id)->output());
            if ($woFormUpsDataUkur->tasks->isNotEmpty() || $woFormUpsDataUkur->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormUpsDataUkur]);
                $m->addRaw($pdf->output());
            }
            $data['formUpsDataUkurLoadBebans'] = $woFormUpsDataUkur->formUpsDataUkurLoadBebans;
            $data['tanggal_hari'] = Carbon::parse($woFormUpsDataUkur->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormUpsDataUkur->tanggal));
            $data['lokasi'] = $woFormUpsDataUkur->asset->location->name;
            $data['fotoPath'] = substr($data['formUpsDataUkurLoadBebans'][0]->dokumentasi, 27);
            $data['fotoPath2'] = substr($data['formUpsDataUkurLoadBebans'][0]->dokumentasi2, 27);
            $data['userTechnicals'] = [];
            foreach ($woFormUpsDataUkur->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($woFormUpsDataUkur->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            // $decryptedDok = Crypt::decryptString($encryptedData);

            // $data['dok'] = $decryptedDok;
            $formId = $woFormUpsDataUkur->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormUpsDataUkur->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();

            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ups-data-ukur-load-beban', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportUpsPengukuranBattery(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormUpsPengukuranBatterys = $workOrders->filter(function ($workOrder) {
            return $workOrder->formUpsPengukuranTeganganBatterys->isNotEmpty();
        });

        if ($woFormUpsPengukuranBatterys->isEmpty()) {
            return redirect()
                ->route('report.ups.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormUpsPengukuranBatterys as $woFormUpsPengukuranBattery) {
            
            $m->addRaw($this->workOrderPdf($woFormUpsPengukuranBattery->id)->output());
            if ($woFormUpsPengukuranBattery->tasks->isNotEmpty() || $woFormUpsPengukuranBattery->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormUpsPengukuranBattery]);
                $m->addRaw($pdf->output());
            }
            $data['formUpsPengukuranTeganganBatterys'] = $woFormUpsPengukuranBattery->formUpsPengukuranTeganganBatterys;
            $data['tanggal_hari'] = Carbon::parse($woFormUpsPengukuranBattery->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormUpsPengukuranBattery->date_generate));
            $data['lokasi'] = $woFormUpsPengukuranBattery->asset->location->name;
            $data['assetMaterials'] = AssetMaterial::where('asset_id', $woFormUpsPengukuranBattery->asset_id);
            $data['fotoPath1'] = substr($data['formUpsPengukuranTeganganBatterys'][0]->dokumentasi1, 27);
            $data['fotoPath2'] = substr($data['formUpsPengukuranTeganganBatterys'][0]->dokumentasi2, 27);
            $data['fotoPath3'] = substr($data['formUpsPengukuranTeganganBatterys'][0]->dokumentasi3, 27);
            $data['fotoPath4'] = substr($data['formUpsPengukuranTeganganBatterys'][0]->dokumentasi4, 27);
            
            $formId = $woFormUpsPengukuranBattery->form_id;
            $bankGroups = ['BANK 1', 'BANK 2', 'BANK 3', 'BANK 4'];
            $data['tempCount1'] = 0;
            $data['tempCount2'] = 0;
            $data['tempCount3'] = 0;
            $data['tempCount4'] = 0;
                    foreach ($bankGroups as $key => $group) {
                $data[$group] = FormUpsPengukuranTeganganBattery::where('work_order_id', $woFormUpsPengukuranBattery->id)
                    ->where('nama_bank', $group)
                    ->orderBy('id', 'asc')
                    ->get();
                if ($key == 0) {
                    $data['tempCount1'] = $data[$group]->count();
                } elseif ($key == 1) {
                    $data['tempCount2'] = $data[$group]->count();
                } elseif ($key == 2) {
                    $data['tempCount3'] = $data[$group]->count();
                } else {
                    $data['tempCount4'] = $data[$group]->count();
                }
                $tempbankCount1 = max($data['tempCount1'], $data['tempCount2']);
                $tempbankCount2 = max($data['tempCount3'], $data['tempCount4']);
                $data['tempCount'] = max($tempbankCount1, $tempbankCount2);
            }
            // $decryptedDok = Crypt::decryptString($encryptedData);

            // $data['dok'] = $decryptedDok;
            $data['userTechnicals'] = [];
            foreach ($woFormUpsPengukuranBattery->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($woFormUpsPengukuranBattery->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $getUserId = FormActivityLog::where('work_order_id', $woFormUpsPengukuranBattery->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-ups-pengukuran-tegangan-battery', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    // APM
    public function ReportApm()
    {
        $data['page_title'] = 'Report APMS Facility';
        $data['workOrders'] = WorkOrder::orderBy('id', 'desc')
            ->whereBetween('date_generate', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->where('wo_status', '!=', 'IOT')
            ->get();
        $data['date'] = date('Y-m-d');
        $data['month'] = date('Y-m');
        $data['year'] = date('Y');

        $apmWorkOrders = $data['workOrders']->filter(function ($workOrder) {
            return $workOrder->asset->code == '#APM';
        })->values();

        // After filterated by asset code, then filter by maintenanceType
        $data['preventives'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        })->values();

        $data['carBodyHarians'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmVehicleCarBodyHarians->isNotEmpty();
        })->values();

        $data['carBodyTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmMekanikalVehicleCarbodyTigaBulanans->isNotEmpty();
        })->values();

        $data['airBrakeSystemHarians'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmVehicleAirBrakeSystemHarians->isNotEmpty();
        })->values();

        $data['bogieHarians'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmMekanikalVehicleBogieHarians->isNotEmpty();
        })->values();

        $data['vehicleMingguans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmMekanikalVehicleMingguans->isNotEmpty();
        })->values();

        $data['bogieTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmMekanikalVehicleBogieTigaBulanans->isNotEmpty();
        })->values();

        $data['airBrakeSystemTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmMekanikalVehicleAirBrakeSystemTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorHarians'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorHarians->isNotEmpty();
        })->values();

        $data['interiorHarians'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleInteriorHarians->isNotEmpty();
        })->values();

        $data['exteriorMingguans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorMingguans->isNotEmpty();
        })->values();

        $data['interiorGDTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleInteriorGDTigaBulanans->isNotEmpty();
        })->values();

        $data['interiorMCTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleInteriorMCTigaBulanans->isNotEmpty();
        })->values();

        $data['interiorTCMSTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleInteriorTCMSTigaBulanans->isNotEmpty();
        })->values();

        $data['interiorLPLTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleInteriorLPLTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorBECTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorBECTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorDCTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorDCTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorESKTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorESKTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorHJBTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorHJBTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorFJBTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorFJBTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorHSCBTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorHSCBTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorLJBTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorLJBTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorPCSTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorPCSTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorSIVTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorSIVTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorLHTTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorLHTTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorTMTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorTMTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorVACTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorVACTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorEHTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorEHTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorJPTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorJPTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorMDSTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorMDSTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorVVTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorVVTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorPCTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorPCTigaBulanans->isNotEmpty();
        })->values();

        $data['interiorFDSTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleInteriorFDSTigaBulanans->isNotEmpty();
        })->values();

        $data['exteriorBATTigaBulanans'] = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorBATTigaBulanans->isNotEmpty();
        })->values();
        return view('report.apm.index', $data);
    }
    public function ReportApmPreventive(Request $request)
    {
        $m = new Merger();

        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $apmWorkOrders = $workOrders->filter(function ($workOrder) {
            return $workOrder->asset->name == 'APMS Facility';
        });

        $preventives = $apmWorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        });

        if ($apmWorkOrders->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($preventives as $preventive) {
            $m->addRaw($this->workOrderPdf($preventive->id)->output());
            if ($preventive->tasks->isNotEmpty() || $preventive->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $preventive]);
                $m->addRaw($pdf->output());
            }
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmCarBodyHarian(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApmCarBodyHarians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmVehicleCarBodyHarians->isNotEmpty();
        });

        if($woFormApmCarBodyHarians->isEmpty()){
            return redirect()
                    ->route('report.apm.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApmCarBodyHarians as $woFormApmCarBodyHarian) {
            $m->addRaw($this->workOrderPdf($woFormApmCarBodyHarian->id)->output());
            if ($woFormApmCarBodyHarian->tasks->isNotEmpty() || $woFormApmCarBodyHarian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApmCarBodyHarian]);
                $m->addRaw($pdf->output());
            }
            $data['formApmVehicleCarBodyHarians'] = $woFormApmCarBodyHarian->formApmVehicleCarBodyHarians;
            $formId = $woFormApmCarBodyHarian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApmCarBodyHarian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-mekanikal-vehicle-carbody-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmCarBodyTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApmCarBodyTigaBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmMekanikalVehicleCarbodyTigaBulanans->isNotEmpty();
        });

        if($woFormApmCarBodyTigaBulanans->isEmpty()){
            return redirect()
                    ->route('report.apm.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApmCarBodyTigaBulanans as $woFormApmCarBodyTigaBulanan) {
            $m->addRaw($this->workOrderPdf($woFormApmCarBodyTigaBulanan->id)->output());
            if ($woFormApmCarBodyTigaBulanan->tasks->isNotEmpty() || $woFormApmCarBodyTigaBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApmCarBodyTigaBulanan]);
                $m->addRaw($pdf->output());
            }
            $data['formApmMekanikalVehicleCarbodyTigaBulanans'] = $woFormApmCarBodyTigaBulanan->formApmMekanikalVehicleCarbodyTigaBulanans;
            $formId = $woFormApmCarBodyTigaBulanan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApmCarBodyTigaBulanan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-mekanikal-vehicle-carbody-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }
    public function ReportApmcAirBrakeSystemHarian(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApmAirBrakeSystemHarians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmVehicleAirBrakeSystemHarians->isNotEmpty();
        });

        if($woFormApmAirBrakeSystemHarians->isEmpty()){
            return redirect()
                    ->route('report.apm.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApmAirBrakeSystemHarians as $woFormApmAirBrakeSystemHarian) {
            $m->addRaw($this->workOrderPdf($woFormApmAirBrakeSystemHarian->id)->output());
            if ($woFormApmAirBrakeSystemHarian->tasks->isNotEmpty() || $woFormApmAirBrakeSystemHarian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApmAirBrakeSystemHarian]);
                $m->addRaw($pdf->output());
            }
            $data['formApmVehicleAirBrakeSystemHarians'] = $woFormApmAirBrakeSystemHarian->formApmVehicleAirBrakeSystemHarians;
            $formId = $woFormApmAirBrakeSystemHarian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApmAirBrakeSystemHarian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-air-brake-system-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmBogieHarian(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApmBogieHarians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmMekanikalVehicleBogieHarians->isNotEmpty();
        });

        if($woFormApmBogieHarians->isEmpty()){
            return redirect()
                    ->route('report.apm.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApmBogieHarians as $woFormApmBogieHarian) {
            $m->addRaw($this->workOrderPdf($woFormApmBogieHarian->id)->output());
            if ($woFormApmBogieHarian->tasks->isNotEmpty() || $woFormApmBogieHarian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApmBogieHarian]);
                $m->addRaw($pdf->output());
            }
            $data['formApmMekanikalVehicleBogieHarians'] = $woFormApmBogieHarian->formApmMekanikalVehicleBogieHarians;
            $formId = $woFormApmBogieHarian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApmBogieHarian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-mekanikal-vehicle-bogie-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }
    public function ReportApmVehicleMingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApmVehicleMingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmMekanikalVehicleMingguans->isNotEmpty();
        });

        if($woFormApmVehicleMingguans->isEmpty()){
            return redirect()
                    ->route('report.apm.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApmVehicleMingguans as $woFormApmVehicleMingguan) {
            $m->addRaw($this->workOrderPdf($woFormApmVehicleMingguan->id)->output());
            if ($woFormApmVehicleMingguan->tasks->isNotEmpty() || $woFormApmVehicleMingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApmVehicleMingguan]);
                $m->addRaw($pdf->output());
            }
            $data['formApmMekanikalVehicleMingguans'] = $woFormApmVehicleMingguan->formApmMekanikalVehicleMingguans;
            $formId = $woFormApmVehicleMingguan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApmVehicleMingguan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-mekanikal-vehicle-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmBogieTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApmBogieTigaBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmMekanikalVehicleBogieTigaBulanans->isNotEmpty();
        });

        if($woFormApmBogieTigaBulanans->isEmpty()){
            return redirect()
                    ->route('report.apm.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApmBogieTigaBulanans as $woFormApmBogieTigaBulanan) {
            $m->addRaw($this->workOrderPdf($woFormApmBogieTigaBulanan->id)->output());
            if ($woFormApmBogieTigaBulanan->tasks->isNotEmpty() || $woFormApmBogieTigaBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApmBogieTigaBulanan]);
                $m->addRaw($pdf->output());
            }
            $data['formApmMekanikalVehicleBogieTigaBulanans'] = $woFormApmBogieTigaBulanan->formApmMekanikalVehicleBogieTigaBulanans;
            $formId = $woFormApmBogieTigaBulanan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApmBogieTigaBulanan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-mekanikal-vehicle-bogie-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmAirBrakeSystemTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApmAirBrakeSystemTigaBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmMekanikalVehicleAirBrakeSystemTigaBulanans->isNotEmpty();
        });

        if($woFormApmAirBrakeSystemTigaBulanans->isEmpty()){
            return redirect()
                    ->route('report.apm.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApmAirBrakeSystemTigaBulanans as $woFormApmAirBrakeSystemTigaBulanan) {
            $m->addRaw($this->workOrderPdf($woFormApmAirBrakeSystemTigaBulanan->id)->output());
            if ($woFormApmAirBrakeSystemTigaBulanan->tasks->isNotEmpty() || $woFormApmAirBrakeSystemTigaBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApmAirBrakeSystemTigaBulanan]);
                $m->addRaw($pdf->output());
            }
            $data['formApmMekanikalVehicleAirBrakeSystemTigaBulanans'] = $woFormApmAirBrakeSystemTigaBulanan->formApmMekanikalVehicleAirBrakeSystemTigaBulanans;
            $formId = $woFormApmAirBrakeSystemTigaBulanan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApmAirBrakeSystemTigaBulanan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-mekanikal-vehicle-air-brake-system-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorHarian(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApmExteriorHarians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorHarians->isNotEmpty();
        });

        if($woFormApmExteriorHarians->isEmpty()){
            return redirect()
                    ->route('report.apm.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApmExteriorHarians as $woFormApmExteriorHarian) {
            $m->addRaw($this->workOrderPdf($woFormApmExteriorHarian->id)->output());
            if ($woFormApmExteriorHarian->tasks->isNotEmpty() || $woFormApmExteriorHarian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApmExteriorHarian]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorHarians'] = $woFormApmExteriorHarian->formApmElektrikalVehicleExteriorHarians;
            $formId = $woFormApmExteriorHarian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApmExteriorHarian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-exterior-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmInteriorHarian(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApmInteriorHarians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleInteriorHarians->isNotEmpty();
        });

        if($woFormApmInteriorHarians->isEmpty()){
            return redirect()
                    ->route('report.apm.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApmInteriorHarians as $woFormApmInteriorHarian) {
            $m->addRaw($this->workOrderPdf($woFormApmInteriorHarian->id)->output());
            if ($woFormApmInteriorHarian->tasks->isNotEmpty() || $woFormApmInteriorHarian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApmInteriorHarian]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleInteriorHarians'] = $woFormApmInteriorHarian->formApmElektrikalVehicleInteriorHarians;
            $formId = $woFormApmInteriorHarian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApmInteriorHarian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-interior-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorMingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApmExteriorMingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorMingguans->isNotEmpty();
        });

        if($woFormApmExteriorMingguans->isEmpty()){
            return redirect()
                    ->route('report.apm.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApmExteriorMingguans as $woFormApmExteriorMingguan) {
            $m->addRaw($this->workOrderPdf($woFormApmExteriorMingguan->id)->output());
            if ($woFormApmExteriorMingguan->tasks->isNotEmpty() || $woFormApmExteriorMingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApmExteriorMingguan]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorMingguans'] = $woFormApmExteriorMingguan->formApmElektrikalVehicleExteriorMingguans;
            $formId = $woFormApmExteriorMingguan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApmExteriorMingguan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-exterior-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmInteriorGDTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApmInteriorGDTigaBulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleInteriorGDTigaBulanans->isNotEmpty();
        });

        if($woFormApmInteriorGDTigaBulanans->isEmpty()){
            return redirect()
                    ->route('report.apm.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApmInteriorGDTigaBulanans as $woFormApmInteriorGDTigaBulanan) {
            $m->addRaw($this->workOrderPdf($woFormApmInteriorGDTigaBulanan->id)->output());
            if ($woFormApmInteriorGDTigaBulanan->tasks->isNotEmpty() || $woFormApmInteriorGDTigaBulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApmInteriorGDTigaBulanan]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleInteriorGDTigaBulanans'] = $woFormApmInteriorGDTigaBulanan->formApmElektrikalVehicleInteriorGDTigaBulanans;
            $formId = $woFormApmInteriorGDTigaBulanan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApmInteriorGDTigaBulanan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-gd-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmInteriorMCTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApmMCs = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleInteriorMCTigaBulanans->isNotEmpty();
        });

        if ($woFormApmMCs->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApmMCs as $woFormApmMC) {
            $m->addRaw($this->workOrderPdf($woFormApmMC->id)->output());
            if ($woFormApmMC->tasks->isNotEmpty() || $woFormApmMC->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApmMC]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleInteriorMCTigaBulanans'] = $woFormApmMC->formApmElektrikalVehicleInteriorMCTigaBulanans;
            $formId = $woFormApmMC->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApmMC->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-mc-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmInteriorTCMSTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleInteriorTCMSTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleInteriorTCMSTigaBulanans'] = $woFormApm->formApmElektrikalVehicleInteriorTCMSTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-tcms-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }
    
    public function ReportApmInteriorLPLTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleInteriorLPLTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleInteriorLPLTigaBulanans'] = $woFormApm->formApmElektrikalVehicleInteriorLPLTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-lpl-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorBECTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorBECTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorBECTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorBECTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-bec-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorDCTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorDCTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorDCTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorDCTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-dc-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorESKTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorESKTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorESKTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorESKTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-esk-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorHJBTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorHJBTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorHJBTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorHJBTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-hjb-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorFJBTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorFJBTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorFJBTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorFJBTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-fjb-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorHSCBTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorHSCBTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorHSCBTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorHSCBTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-hscb-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }
    public function ReportApmExteriorLJBTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorLJBTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorLJBTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorLJBTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-ljb-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorPCSTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorPCSTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorPCSTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorPCSTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-pcs-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }
    public function ReportApmExteriorSIVTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorSIVTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorSIVTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorSIVTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-siv-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorLHTTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorLHTTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorLHTTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorLHTTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-lht-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorTMTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorTMTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorTMTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorTMTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-tm-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorVACTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorVACTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorVACTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorVACTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-vac-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorEHTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorEHTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorEHTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorEHTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-eh-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorJPTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorJPTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorJPTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorJPTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-jp-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }
    public function ReportApmExteriorMDSTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorMDSTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorMDSTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorMDSTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-mds-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorVVTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorVVTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorVVTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorVVTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-vv-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmExteriorPCTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorPCTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorPCTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorPCTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-pc-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportApmInteriorFDSTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleInteriorFDSTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleInteriorFDSTigaBulanans'] = $woFormApm->formApmElektrikalVehicleInteriorFDSTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-fds-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }
    public function ReportApmExteriorBATTigaBulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormApms = $workOrders->filter(function ($workOrder) {
            return $workOrder->formApmElektrikalVehicleExteriorBATTigaBulanans->isNotEmpty();
        });

        if ($woFormApms->isEmpty()) {
            return redirect()
                ->route('report.apm.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormApms as $woFormApm) {
            $m->addRaw($this->workOrderPdf($woFormApm->id)->output());
            if ($woFormApm->tasks->isNotEmpty() || $woFormApm->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormApm]);
                $m->addRaw($pdf->output());
            }
            $data['formApmElektrikalVehicleExteriorBATTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorBATTigaBulanans;
            $data['formApmElektrikalVehicleExteriorBAThasilTigaBulanans'] = $woFormApm->formApmElektrikalVehicleExteriorBAThasilTigaBulanans;
            $formId = $woFormApm->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormApm->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-apm-elektrikal-vehicle-bat-tiga-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    // -----------------------------------------------------------------------------------------
    // SNT
    public function ReportSnt()
    {
        $data['page_title'] = 'Report Sanitation Facility';
        $data['workOrders'] = WorkOrder::orderBy('id', 'desc')
            ->whereBetween('date_generate', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->where('wo_status', '!=', 'IOT')
            ->get();
        $data['date'] = date('Y-m-d');
        $data['month'] = date('Y-m');
        $data['year'] = date('Y');

        $sanitationWorkOrders = $data['workOrders']->filter(function ($workOrder) {
            return $workOrder->asset->code == '#SNT';
        })->values();

        // After filterated by asset code, then filter by maintenanceType
        $data['preventives'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        })->values();

        // Filter Checklist1
        $data['checklistSewages'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistSewageTreatmentPlantHarians->isNotEmpty();
        })->values();

        // Filter Checklist2
        $data['perawatanSewages'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSntPerawatanSewageTreatmentPlantHarians->isNotEmpty();
        })->values();

        $data['checklistLps'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistLiftingPumps->isNotEmpty();
        })->values();

        $data['checklistLpHarians'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistLiftingPumpHarians->isNotEmpty();
        })->values();

        $data['checklistDelacerations'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistDelacerationHarians->isNotEmpty();
        })->values();

        $data['perawatanT3s'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSntPerawatanT3VIPs->isNotEmpty();
        })->values();

        $data['incinerator123Harians'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistPerawatanIncinerator123Harians->isNotEmpty();
        })->values();

        $data['incinerator567Harians'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistPerawatanIncinerator567Harians->isNotEmpty();
        })->values();

        $data['incinerator123Mingguans'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistPerawatanIncinerator123Mingguans->isNotEmpty();
        })->values();

        $data['incinerator456Mingguans'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistPerawatanIncinerator456Mingguans->isNotEmpty();
        })->values();

        $data['incinerator123Bulanans'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistPerawatanIncinerator123Bulanans->isNotEmpty();
        })->values();

        $data['incinerator456Bulanans'] = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistPerawatanIncinerator456Bulanans->isNotEmpty();
        })->values();
        return view('report.snt.index', $data);
    }
    public function ReportSntPreventive(Request $request)
    {
        $m = new Merger();

        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $sanitationWorkOrders = $workOrders->filter(function ($workOrder) {
            return $workOrder->asset->name == 'Sanitation Facility';
        });

        $preventives = $sanitationWorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        });

        if ($sanitationWorkOrders->isEmpty()) {
            return redirect()
                ->route('report.sanitation-facility.index')
                ->with(['failed' => "No Data!"]);
        }

        foreach ($preventives as $preventive) {
            $m->addRaw($this->workOrderPdf($preventive->id)->output());
            if ($preventive->tasks->isNotEmpty() || $preventive->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $preventive]);
                $m->addRaw($pdf->output());
            }
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSntChecklistSewage(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormSntChecklistSewages = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistSewageTreatmentPlantHarians->isNotEmpty();
        });

        if($woFormSntChecklistSewages->isEmpty()){
            return redirect()
                    ->route('report.sanitation-facility.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormSntChecklistSewages as $woFormSntChecklistSewage) {
            $m->addRaw($this->workOrderPdf($woFormSntChecklistSewage->id)->output());
            if ($woFormSntChecklistSewage->tasks->isNotEmpty() || $woFormSntChecklistSewage->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormSntChecklistSewage]);
                $m->addRaw($pdf->output());
            }
            $data['formSntChecklistSewageTreatmentPlantHarians'] = $woFormSntChecklistSewage->formSntChecklistSewageTreatmentPlantHarians;
            $data['tanggal_hari'] = Carbon::parse($woFormSntChecklistSewage->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormSntChecklistSewage->created_at));
            $data['tanggalWo1'] = date('H:i', strtotime($woFormSntChecklistSewage->created_at));
            $data['tanggalWo2'] = date('H:i', strtotime($woFormSntChecklistSewage->updated_at));
            $formId = $woFormSntChecklistSewage->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormSntChecklistSewage->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-sewage-treatment-plant-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSntPerawatanSewage(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormSntPerawatanSewages = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSntPerawatanSewageTreatmentPlantHarians->isNotEmpty();
        });

        if($woFormSntPerawatanSewages->isEmpty()){
            return redirect()
                    ->route('report.sanitation-facility.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormSntPerawatanSewages as $woFormSntPerawatanSewage) {
            $m->addRaw($this->workOrderPdf($woFormSntPerawatanSewage->id)->output());
            if ($woFormSntPerawatanSewage->tasks->isNotEmpty() || $woFormSntPerawatanSewage->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormSntPerawatanSewage]);
                $m->addRaw($pdf->output());
            }
            $data['formSntPerawatanSewageTreatmentPlantHarians'] = $woFormSntPerawatanSewage->formSntPerawatanSewageTreatmentPlantHarians;
            $data['tanggal_hari'] = Carbon::parse($woFormSntPerawatanSewage->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormSntPerawatanSewage->created_at));
            $data['tanggalWo1'] = date('H:i', strtotime($woFormSntPerawatanSewage->created_at));
            $data['tanggalWo2'] = date('H:i', strtotime($woFormSntPerawatanSewage->updated_at));
            $formId = $woFormSntPerawatanSewage->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormSntPerawatanSewage->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-perawatan-sewage-treatment-plant-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSntChecklistLP(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormSntChecklistLPs = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistLiftingPumps->isNotEmpty();
        });

        if($woFormSntChecklistLPs->isEmpty()){
            return redirect()
                    ->route('report.sanitation-facility.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormSntChecklistLPs as $woFormSntChecklistLP) {
            $m->addRaw($this->workOrderPdf($woFormSntChecklistLP->id)->output());
            if ($woFormSntChecklistLP->tasks->isNotEmpty() || $woFormSntChecklistLP->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormSntChecklistLP]);
                $m->addRaw($pdf->output());
            }
            $data['formSntChecklistLiftingPumps'] = $woFormSntChecklistLP->formSntChecklistLiftingPumps;
            $data['tanggal_hari'] = Carbon::parse($woFormSntChecklistLP->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormSntChecklistLP->created_at));
            $formId = $woFormSntChecklistLP->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormSntChecklistLP->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-lifting-pump', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSntChecklistLPHarian(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormSntChecklistLPHarians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistLiftingPumpHarians->isNotEmpty();
        });

        if($woFormSntChecklistLPHarians->isEmpty()){
            return redirect()
                    ->route('report.sanitation-facility.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormSntChecklistLPHarians as $woFormSntChecklistLPHarian) {
            $m->addRaw($this->workOrderPdf($woFormSntChecklistLPHarian->id)->output());
            if ($woFormSntChecklistLPHarian->tasks->isNotEmpty() || $woFormSntChecklistLPHarian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormSntChecklistLPHarian]);
                $m->addRaw($pdf->output());
            }
            $data['formSntChecklistLiftingPumpHarians'] = $woFormSntChecklistLPHarian->formSntChecklistLiftingPumpHarians;
            $data['tanggal_hari'] = Carbon::parse($woFormSntChecklistLPHarian->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormSntChecklistLPHarian->created_at));
            $data['tanggalWo1'] = date('H:i', strtotime($woFormSntChecklistLPHarian->created_at));
            $data['tanggalWo2'] = date('H:i', strtotime($woFormSntChecklistLPHarian->updated_at));
            $formId = $woFormSntChecklistLPHarian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormSntChecklistLPHarian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-lifting-pump-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSntChecklistDelaceration(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormSntChecklistDelacerations = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistDelacerationHarians->isNotEmpty();
        });

        if($woFormSntChecklistDelacerations->isEmpty()){
            return redirect()
                    ->route('report.sanitation-facility.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormSntChecklistDelacerations as $woFormSntChecklistDelaceration) {
            $m->addRaw($this->workOrderPdf($woFormSntChecklistDelaceration->id)->output());
            if ($woFormSntChecklistDelaceration->tasks->isNotEmpty() || $woFormSntChecklistDelaceration->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormSntChecklistDelaceration]);
                $m->addRaw($pdf->output());
            }
            $data['formSntChecklistDelacerationHarians'] = $woFormSntChecklistDelaceration->formSntChecklistDelacerationHarians;
            $data['tanggal_hari'] = Carbon::parse($woFormSntChecklistDelaceration->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormSntChecklistDelaceration->created_at));
            $formId = $woFormSntChecklistDelaceration->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormSntChecklistDelaceration->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-delaceration-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSntPerawatanT3(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormSntPerawatanT3s = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSntPerawatanT3VIPs->isNotEmpty();
        });

        if($woFormSntPerawatanT3s->isEmpty()){
            return redirect()
                    ->route('report.sanitation-facility.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormSntPerawatanT3s as $woFormSntPerawatanT3) {
            $m->addRaw($this->workOrderPdf($woFormSntPerawatanT3->id)->output());
            if ($woFormSntPerawatanT3->tasks->isNotEmpty() || $woFormSntPerawatanT3->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormSntPerawatanT3]);
                $m->addRaw($pdf->output());
            }
            $data['formSntPerawatanT3VIPs'] = $woFormSntPerawatanT3->formSntPerawatanT3VIPs;
            $data['tanggal_hari'] = Carbon::parse($woFormSntPerawatanT3->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormSntPerawatanT3->created_at));
            $formId = $woFormSntPerawatanT3->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormSntPerawatanT3->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['userTechnicals'] = [];
            foreach ($woFormSntPerawatanT3->userGroups as $userGroup) {
                foreach ($userGroup->customUserTechnicals as $userTechnical) {
                    $data['userTechnicals'][] = $userTechnical->name;
                }
            }

            foreach ($woFormSntPerawatanT3->userTechnicals as $userTechnical) {
                $data['userTechnicals'][] = $userTechnical->name;
            }
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-perawatan-t3', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }
    public function ReportSntIncinerator123Harian(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormIncinerator123Harians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistPerawatanIncinerator123Harians->isNotEmpty();
        });

        if($woFormIncinerator123Harians->isEmpty()){
            return redirect()
                    ->route('report.sanitation-facility.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormIncinerator123Harians as $woFormIncinerator123Harian) {
            $m->addRaw($this->workOrderPdf($woFormIncinerator123Harian->id)->output());
            if ($woFormIncinerator123Harian->tasks->isNotEmpty() || $woFormIncinerator123Harian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormIncinerator123Harian]);
                $m->addRaw($pdf->output());
            }
            $data['formSntChecklistPerawatanIncinerator123Harians'] = $woFormIncinerator123Harian->formSntChecklistPerawatanIncinerator123Harians;
            $data['tanggal_hari'] = Carbon::parse($woFormIncinerator123Harian->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormIncinerator123Harian->created_at));
            $formId = $woFormIncinerator123Harian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormIncinerator123Harian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-perawatan-incinerator-123-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSntIncinerator567Harian(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormIncinerator567Harians = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistPerawatanIncinerator567Harians->isNotEmpty();
        });

        if($woFormIncinerator567Harians->isEmpty()){
            return redirect()
                    ->route('report.sanitation-facility.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormIncinerator567Harians as $woFormIncinerator567Harian) {
            $m->addRaw($this->workOrderPdf($woFormIncinerator567Harian->id)->output());
            if ($woFormIncinerator567Harian->tasks->isNotEmpty() || $woFormIncinerator567Harian->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormIncinerator567Harian]);
                $m->addRaw($pdf->output());
            }
            $data['formSntChecklistPerawatanIncinerator567Harians'] = $woFormIncinerator567Harian->formSntChecklistPerawatanIncinerator567Harians;
            $data['tanggal_hari'] = Carbon::parse($woFormIncinerator567Harian->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormIncinerator567Harian->created_at));
            $formId = $woFormIncinerator567Harian->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormIncinerator567Harian->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-perawatan-incinerator-567-harian', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSntIncinerator123Mingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormIncinerator123Mingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistPerawatanIncinerator123Mingguans->isNotEmpty();
        });

        if($woFormIncinerator123Mingguans->isEmpty()){
            return redirect()
                    ->route('report.sanitation-facility.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormIncinerator123Mingguans as $woFormIncinerator123Mingguan) {
            $m->addRaw($this->workOrderPdf($woFormIncinerator123Mingguan->id)->output());
            if ($woFormIncinerator123Mingguan->tasks->isNotEmpty() || $woFormIncinerator123Mingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormIncinerator123Mingguan]);
                $m->addRaw($pdf->output());
            }
            $data['formSntChecklistPerawatanIncinerator123Mingguans'] = $woFormIncinerator123Mingguan->formSntChecklistPerawatanIncinerator123Mingguans;
            $data['tanggal_hari'] = Carbon::parse($woFormIncinerator123Mingguan->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormIncinerator123Mingguan->created_at));
            $formId = $woFormIncinerator123Mingguan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormIncinerator123Mingguan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-perawatan-incinerator-123-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSntIncinerator456Mingguan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormIncinerator456Mingguans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistPerawatanIncinerator456Mingguans->isNotEmpty();
        });

        if($woFormIncinerator456Mingguans->isEmpty()){
            return redirect()
                    ->route('report.sanitation-facility.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormIncinerator456Mingguans as $woFormIncinerator456Mingguan) {
            $m->addRaw($this->workOrderPdf($woFormIncinerator456Mingguan->id)->output());
            if ($woFormIncinerator456Mingguan->tasks->isNotEmpty() || $woFormIncinerator456Mingguan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormIncinerator456Mingguan]);
                $m->addRaw($pdf->output());
            }
            $data['formSntChecklistPerawatanIncinerator456Mingguans'] = $woFormIncinerator456Mingguan->formSntChecklistPerawatanIncinerator456Mingguans;
            $data['tanggal_hari'] = Carbon::parse($woFormIncinerator456Mingguan->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormIncinerator456Mingguan->created_at));
            $formId = $woFormIncinerator456Mingguan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormIncinerator456Mingguan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-perawatan-incinerator-456-mingguan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSntIncinerator123Bulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormIncinerator123Bulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistPerawatanIncinerator123Bulanans->isNotEmpty();
        });

        if($woFormIncinerator123Bulanans->isEmpty()){
            return redirect()
                    ->route('report.sanitation-facility.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormIncinerator123Bulanans as $woFormIncinerator123Bulanan) {
            $m->addRaw($this->workOrderPdf($woFormIncinerator123Bulanan->id)->output());
            if ($woFormIncinerator123Bulanan->tasks->isNotEmpty() || $woFormIncinerator123Bulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormIncinerator123Bulanan]);
                $m->addRaw($pdf->output());
            }
            $data['formSntChecklistPerawatanIncinerator123Bulanans'] = $woFormIncinerator123Bulanan->formSntChecklistPerawatanIncinerator123Bulanans;
            $data['tanggal_hari'] = Carbon::parse($woFormIncinerator123Bulanan->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormIncinerator123Bulanan->created_at));
            $formId = $woFormIncinerator123Bulanan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormIncinerator123Bulanan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-perawatan-incinerator-123-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    public function ReportSntIncinerator456Bulanan(Request $request)
    {
        $m = new Merger();
        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $woFormIncinerator456Bulanans = $workOrders->filter(function ($workOrder) {
            return $workOrder->formSntChecklistPerawatanIncinerator456Bulanans->isNotEmpty();
        });

        if($woFormIncinerator456Bulanans->isEmpty()){
            return redirect()
                    ->route('report.sanitation-facility.index')
                    ->with(['failed' => "No Data!"]);
        }

        foreach ($woFormIncinerator456Bulanans as $woFormIncinerator456Bulanan) {
            $m->addRaw($this->workOrderPdf($woFormIncinerator456Bulanan->id)->output());
            if ($woFormIncinerator456Bulanan->tasks->isNotEmpty() || $woFormIncinerator456Bulanan->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $woFormIncinerator456Bulanan]);
                $m->addRaw($pdf->output());
            }
            $data['formSntChecklistPerawatanIncinerator456Bulanans'] = $woFormIncinerator456Bulanan->formSntChecklistPerawatanIncinerator456Bulanans;
            $data['tanggal_hari'] = Carbon::parse($woFormIncinerator456Bulanan->date_generate)
                ->locale('id')
                ->isoFormat('dddd');
            $data['tanggalWo'] = date('Y-m-d', strtotime($woFormIncinerator456Bulanan->created_at));
            $formId = $woFormIncinerator456Bulanan->form_id;
            $getUserId = FormActivityLog::where('work_order_id', $woFormIncinerator456Bulanan->id)
                ->where('status', 'end')
                ->where('form_id', $formId)
                ->orderBy('id', 'desc')
                ->first();
            $data['user_technicals'] = $getUserId !== null ? User::where('id', $getUserId->user_technical_id)->first() : null;
            $pdf = $this->createPdf('report.form-report.form-snt-checklist-perawatan-incinerator-456-bulanan', [0, 0, 609.4488, 935.433], 'portrait', $data);
            $m->addRaw($pdf->output());
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }

    // REPORT - ELP
    public function reportElp()
    {
        $data['page_title'] = 'Report Elctrical Protection';
        $workOrders = WorkOrder::orderBy('id', 'desc')
            ->whereBetween('date_generate', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->where('wo_status', '!=', 'IOT')
            ->with(['asset', 'workOrderStatus', 'maintenanceType', 'scheduleMaintenance'])
            ->get();
        $data['date'] = date('Y-m-d');
        $data['month'] = date('Y-m');
        $data['year'] = date('Y');

        // Filter By asset code
        $elpWorkOrders = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->asset->code == '#ELP';
            })
            ->values();
        // After filterated by asset code, then filter by maintenanceType
        $data['preventives'] = $elpWorkOrders
            ->filter(function ($workOrder) {
                return $workOrder->maintenanceType->name == 'Preventive';
            })
            ->values();

        return view('report.elp.index', $data);
    }

    public function reportElpPreventive(Request $request)
    {
        $m = new Merger();

        $workOrders = $this->getWorkOrder($request->get('date'), $request->get('daterange'));

        $elpWorkOrders = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->asset->code == '#ELP';
            })
            ->values();

        $preventives = $elpWorkOrders
            ->filter(function ($workOrder) {
                return $workOrder->maintenanceType->name == 'Preventive';
            })
            ->values();

        if ($elpWorkOrders->isEmpty()) {
            return redirect()
                ->route('report.electrical-utility.electrical-utility.index')
                ->with(['failed' => 'No Data!']);
        }

        foreach ($preventives as $preventive) {
            $m->addRaw($this->workOrderPdf($preventive->id)->output());
            if ($preventive->tasks->isNotEmpty() || $preventive->taskGroups->isNotEmpty()) {
                $pdf = $this->createPdf('report.task-report', [0, 0, 609.4488, 935.433], 'portrait', ['work_order' => $preventive]);
                $m->addRaw($pdf->output());
            }
        }
        // retun as pdf from base64
        return response()->make($m->merge(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="my_file.pdf"',
        ]);
    }
}