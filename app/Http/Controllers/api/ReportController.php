<?php

namespace App\Http\Controllers\Api;

use App\Models\WorkOrder;
use Illuminate\Http\Request;
use App\Models\FormPs1PanelHarian;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function getWorkOrdersByDate($request)
    {
        $start_date = $request->get('date') . ' 00:00:00';
        $end_date = $request->get('date') . ' 23:59:59';

        if ($request->get('daterange') == 'month') {
            $start_date = date('Y-m-01 H:i:s', strtotime($request->get('date') . ' 00:00:00'));
            $end_date = date('Y-m-t H:i:s', strtotime($request->get('date') . ' 23:59:59'));
        } elseif ($request->get('daterange') == 'year') {
            $start_date = date('Y-01-01 H:i:s', strtotime($request->get('date') . '-01-01 00:00:00'));
            $end_date = date('Y-12-t H:i:s', strtotime($request->get('date') . '-12-31 23:59:59'));
        }

        $workOrders = WorkOrder::orderBy('id', 'desc')
            ->where('wo_status', 'manual')
            ->whereBetween('date_generate', [$start_date, $end_date])
            ->with(['asset', 'workOrderStatus', 'maintenanceType', 'scheduleMaintenance'])
            ->get();

        return $workOrders;
    }

    public function getEleWorkOrders(Request $request)
    {
        $workOrders = $this->getWorkOrdersByDate($request);

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
        $data['checklist1s'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formEleChecklist1Harians->isNotEmpty();
            })
            ->values();

        // Filter Checklist2
        $data['checklist2s'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formEleChecklist2Harians->isNotEmpty();
            })
            ->values();

        return response()->json(
            [
                'success' => true,
                'message' => 'Show work orders',
                'data' => $data,
            ],
            200,
        );
    }
    public function getElpWorkOrders(Request $request)
    {
        $workOrders = $this->getWorkOrdersByDate($request);

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

        return response()->json(
            [
                'success' => true,
                'message' => 'Show work orders',
                'data' => $data,
            ],
            200,
        );
    }

    public function getPs1WorkOrders(Request $request)
    {
        $workOrders = $this->getWorkOrdersByDate($request);

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

        $data['formPs1ControlDeskDuaMingguans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1ControlDeskDuaMingguanBelakangs->isNotEmpty();
            })
            ->values();

        $data['formPs1GensetStandbyTahunans'] = $workOrders
            ->filter(function ($workOrder) {
                return $workOrder->formPs1GensetStandbyTahunans->isNotEmpty();
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
           
        return response()->json(
            [
                'success' => true,
                'message' => 'Show work orders',
                'data' => $data,
            ],
            200,
        );
    }

    public function getPs2WorkOrders(Request $request)
    {
        $workOrders = $this->getWorkOrdersByDate($request);
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
            
           
        return response()->json(
            [
                'success' => true,
                'message' => 'Show work orders',
                'data' => $data,
            ],
            200,
        );
    }

    public function getSvaWorkOrders(Request $request)
    {
        $workOrders = $this->getWorkOrdersByDate($request);

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
        return response()->json(
            [
                'success' => true,
                'message' => 'Show work orders',
                'data' => $data,
            ],
            200,
        );
    }

    public function getNvaWorkOrders(Request $request)
    {
        $workOrders = $this->getWorkOrdersByDate($request);

        // Filter By asset code
        $northVisualAidWorkOrders = $workOrders->filter(function ($workOrder) {
            return $workOrder->asset->code == '#NVA';
        })->values();

        // After filterated by asset code, then filter by maintenanceType
        $data['preventives'] = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->maintenanceType->name == 'Preventive';
        })->values();

        // Filter Checklist1
        $data['checklist1s'] = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formNVaChecklist1Harians->isNotEmpty();
        })->values();

        // Filter Checklist2
        $data['checklist2s'] = $northVisualAidWorkOrders->filter(function ($workOrder) {
            return $workOrder->formNVaChecklist2Harians->isNotEmpty();
        })->values();

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
        return response()->json(
            [
                'success' => true,
                'message' => 'Show work orders',
                'data' => $data,
            ],
            200,
        );
    }

    public function getUpsWorkOrders(Request $request)
    {
        $workOrders = $this->getWorkOrdersByDate($request);

        $upsWorkOrders = $workOrders->filter(function ($workOrder) {
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



        return response()->json(
            [
                'success' => true,
                'message' => 'Show work orders',
                'data' => $data,
            ],
            200,
        );
    }

    public function getApmWorkOrders(Request $request)
    {
        $workOrders = $this->getWorkOrdersByDate($request);

        // Filter By asset code
        $apmWorkOrders = $workOrders->filter(function ($workOrder) {
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

        return response()->json(
            [
                'success' => true,
                'message' => 'Show work orders',
                'data' => $data,
            ],
            200,
        );
    }

    public function getSntWorkOrders(Request $request)
    {
        $workOrders = $this->getWorkOrdersByDate($request);

        $sanitationWorkOrders = $workOrders->filter(function ($workOrder) {
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

        return response()->json(
            [
                'success' => true,
                'message' => 'Show work orders',
                'data' => $data,
            ],
            200,
        );
    }
}
