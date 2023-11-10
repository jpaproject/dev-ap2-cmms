<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailWorkOrderForm extends Model
{
    use HasFactory;

    protected $fillable = ['work_order_id', 'form_id'];

    public $timestamps = true;

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function checklistHarianGensetPs2ControlRoom()
    {
        return $this->hasOne(ChecklistHarianGensetPs2ControlRoom::class);
    }

    public function checklistHarianGensetPs2GensetRooms()
    {
        return $this->hasMany(ChecklistHarianGensetPs2GensetRoom::class)->orderBy('id', 'asc');
    }

    public function checklistGensetPhAocc()
    {
        return $this->hasOne(ChecklistGensetPhAocc::class);
    }

    public function laporanKerusakanElectricalProtection()
    {
        return $this->hasOne(laporanKerusakanElectricalProtection::class);
    }

    public function formPs2GensetPhAoccHarian()
    {
        return $this->hasOne(FormPs2GensetPhAoccHarian::class);
    }

    public function formPs2GensetPhAoccDuaMingguans()
    {
        return $this->hasMany(FormPs2GensetPhAoccDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs2GensetDuaMingguans()
    {
        return $this->hasMany(FormPs2GensetDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs2GensetDuaMingguanGensets()
    {
        return $this->hasMany(FormPs2GensetDuaMingguanGenset::class)->orderBy('id', 'asc');
    }

    public function formPs2GensetDuaMingguanTrafos()
    {
        return $this->hasMany(FormPs2GensetDuaMingguanTrafo::class)->orderBy('id', 'asc');
    }

    public function formPs2GensetDuaMingguanTanks()
    {
        return $this->hasMany(FormPs2GensetDuaMingguanTank::class)->orderBy('id', 'asc');
    }

    public function formPs2GensetRunningHarians()
    {
        return $this->hasMany(FormPs2GensetRunningHarian::class)->orderBy('id', 'asc');
    }

    public function formPs2GensetRunningHarianKeterangan()
    {
        return $this->hasOne(FormPs2GensetRunningHarianKeterangan::class);
    }

    public function formPs2GroundTankDuaMingguans()
    {
        return $this->hasMany(FormPs2GroundTankDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs2PanelPhAoccs()
    {
        return $this->hasMany(FormPs2PanelPhAocc::class)->orderBy('id', 'asc');
    }

    public function formPs2ChecklistPanelLvHarians()
    {
        return $this->hasMany(formPs2ChecklistPanelLvHarian::class)->orderBy('id', 'asc');
    }

    public function formPs2PanelHarians()
    {
        return $this->hasMany(FormPs2PanelHarian::class)->orderBy('id', 'asc');
    }

    public function formPs2PanelDuaMingguans()
    {
        return $this->hasMany(FormPs2PanelDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs2RuangTenagaDuaMingguans()
    {
        return $this->hasMany(FormPs2RuangTenagaDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs2PemeliharaanEnamBulanans()
    {
        return $this->hasMany(FormPs2PemeliharaanEnamBulanan::class)->orderBy('id', 'asc');
    }

    public function formPs2WoDuaMingguans()
    {
        return $this->hasMany(FormPs2WoDuaMingguan::class)->orderBy('id', 'asc');
    }

    //  ----------------------------
    //  --- PS1 ---
    public function formPs1PanelHarians()
    {
        return $this->hasMany(FormPs1PanelHarian::class)->orderBy('id', 'asc');
    }

    public function formPs1GensetHarian()
    {
        return $this->hasOne(FormPs1GensetHarian::class);
    }

    public function formPs1GensetMobile()
    {
        return $this->hasOne(FormPs1GensetMobile::class);
    }

    public function formPs1TestOnloadGenset()
    {
        return $this->hasOne(FormPs1TestOnloadGenset::class);
    }

    public function formPs1TestOnloadUraianGensets()
    {
        return $this->hasMany(FormPs1TestOnloadUraianGenset::class)->orderBy('id', 'asc');
    }

    public function formPs1TestOnloadParameterGensets()
    {
        return $this->hasMany(FormPs1TestOnloadParameterGenset::class)->orderBy('id', 'asc');
    }


    public function formPs1ControlDeskDuaMingguanBelakangs()
    {
        return $this->hasMany(FormPs1ControlDeskDuaMingguanBelakang::class)->orderBy('id', 'asc');
    }

    public function formPs1ControlDeskTahunans()
    {
        return $this->hasMany(FormPs1ControlDeskTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs1GensetHarians()
    {
        return $this->hasMany(FormPs1GensetHarian::class)->orderBy('id', 'asc');
    }

    public function formPs1GensetStandbyNo1DuaMingguans()
    {
        return $this->hasMany(FormPs1GensetStandbyNo1DuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs1GensetStandbyTigaBulanans()
    {
        return $this->hasMany(FormPs1GensetStandbyTigaBulanan::class)->orderBy('id', 'asc');
    }

    public function formPs1GensetStandbyEnamBulanans()
    {
        return $this->hasMany(FormPs1GensetStandbyEnamBulanan::class)->orderBy('id', 'asc');
    }

    public function formPs1GensetStandbyTahunans()
    {
        return $this->hasMany(FormPs1GensetStandbyTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs1GensetMobileDuaMingguan()
    {
        return $this->hasOne(FormPs1GensetMobileDuaMingguan::class);
    }

    public function formPs1GensetMobileTigaBulanan()
    {
        return $this->hasOne(FormPs1GensetMobileTigaBulanan::class);
    }

    public function formPs1GensetMobileEnamBulanan()
    {
        return $this->hasOne(FormPs1GensetMobileEnamBulanan::class);
    }

    public function formPs1GensetMobileTahunan()
    {
        return $this->hasOne(FormPs1GensetMobileTahunan::class);
    }

    public function GensetStandbyGarduTeknikDuaMingguans()
    {
        return $this->hasMany(GensetStandbyGarduTeknikDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function GensetStandbyGarduTeknikEnamBulanans()
    {
        return $this->hasMany(GensetStandbyGarduTeknikEnamBulanan::class)->orderBy('id', 'asc');
    }

    public function GensetStandbyGarduTeknikTahunans()
    {
        return $this->hasMany(GensetStandbyGarduTeknikTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs1TrafoDuaMingguans()
    {
        return $this->hasMany(FormPs1TrafoDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs1PanelTmTahunans()
    {
        return $this->hasMany(FormPs1PanelTmTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs1PanelMvTahunans()
    {
        return $this->hasMany(FormPs1PanelMvTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs1PanelTmDuaMingguans()
    {
        return $this->hasMany(FormPs1PanelTmDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs1PanelTmEnamBulanans()
    {
        return $this->hasMany(FormPs1PanelTmEnamBulanan::class)->orderBy('id', 'asc');
    }

    public function formPs1PanelTrDuaMingguans()
    {
        return $this->hasMany(FormPs1PanelTrDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs1PanelTrEnamBulanans()
    {
        return $this->hasMany(FormPs1PanelTrEnamBulanan::class)->orderBy('id', 'asc');
    }

    public function formPs1PanelTrTahunans()
    {
        return $this->hasMany(FormPs1PanelTrTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs1PanelTrAuxDuaMingguans()
    {
        return $this->hasMany(FormPs1PanelTrAuxDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs1PanelTrAuxEnamBulanans()
    {
        return $this->hasMany(FormPs1PanelTrAuxEnamBulanan::class)->orderBy('id', 'asc');
    }

    public function formPs1PanelTrAuxTahunans()
    {
        return $this->hasMany(FormPs1PanelTrAuxTahunan::class)->orderBy('id', 'asc');
    }

    //  ----------------------------
    //  --- PS3 ---
    public function formPs3ControlRoomHarian()
    {
        return $this->hasOne(FormPs3ControlRoomHarian::class);
    }

    public function formPs3RuangTenagaSuhuDuaMingguan()
    {
        return $this->hasOne(FormPs3RuangTenagaSuhuDuaMingguan::class);
    }

    public function formPs3MainTankLamaDuaMingguan()
    {
        return $this->hasOne(FormPs3MainTankLamaDuaMingguan::class);
    }

    public function formPs3EpccDuaMingguan()
    {
        return $this->hasOne(FormPs3EpccDuaMingguan::class);
    }

    public function formPs3GensetRoomHarians()
    {
        return $this->hasMany(FormPs3GensetRoomHarian::class)->orderBy('id', 'asc');
    }

    public function formPs3PanelHarians()
    {
        return $this->hasMany(FormPs3PanelHarian::class)->orderBy('id', 'asc');
    }

    public function formPs3PanelSdpDuaMingguans()
    {
        return $this->hasMany(FormPs3PanelSdpDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs3GroundTankBaruDuaMingguan()
    {
        return $this->hasOne(FormPs3GroundTankBaruDuaMingguan::class);
    }

    public function formPs3RuangTenagaTeganganDuaMingguans()
    {
        return $this->hasMany(FormPs3RuangTenagaTeganganDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs3GensetDuaMingguans()
    {
        return $this->hasMany(FormPs3GensetDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs3GensetTigaBulanans()
    {
        return $this->hasMany(FormPs3GensetTigaBulanan::class)->orderBy('id', 'asc');
    }

    public function formPs3TrafoTigaBulanans()
    {
        return $this->hasMany(FormPs3TrafoTigaBulanan::class)->orderBy('id', 'asc');
    }

    public function formPs3TrafoEnamBulananTahunans()
    {
        return $this->hasMany(FormPs3TrafoEnamBulananTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs3GensetEnamBulananTahunans()
    {
        return $this->hasMany(FormPs3GensetEnamBulananTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs3EpccSimulatorEnamBulananTahunan()
    {
        return $this->hasOne(FormPs3EpccSimulatorEnamBulananTahunan::class);
    }

    public function formPs3EpccEnamBulananTahunan()
    {
        return $this->hasOne(FormPs3EpccEnamBulananTahunan::class);
    }

    public function formPs3PanelPompaBbmBaruEnamBulananTahunan()
    {
        return $this->hasOne(FormPs3PanelPompaBbmBaruEnamBulananTahunan::class);
    }

    public function formPs3PanelPompaBbmLamaEnamBulananTahunan()
    {
        return $this->hasOne(FormPs3PanelPompaBbmLamaEnamBulananTahunan::class);
    }

    public function formPs3LvmdpACheckEnamBulananTahunans()
    {
        return $this->hasMany(FormPs3LvmdpACheckEnamBulananTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs3LvmdpBCheckEnamBulananTahunans()
    {
        return $this->hasMany(FormPs3LvmdpBCheckEnamBulananTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs3GensetCheckEnamBulananTahunans()
    {
        return $this->hasMany(FormPs3GensetCheckEnamBulananTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs3MainTankBaruLamaEnamBulananTahunan()
    {
        return $this->hasOne(FormPs3MainTankBaruLamaEnamBulananTahunan::class);
    }

    public function formPs3SumpTankBaruEnamBulananTahunan()
    {
        return $this->hasOne(FormPs3SumpTankBaruEnamBulananTahunan::class);
    }

    public function formPs3SumpTankBaruLamaEnamBulananTahunan()
    {
        return $this->hasOne(FormPs3SumpTankBaruLamaEnamBulananTahunan::class);
    }

    public function formPs3SumpTankLamaEnamBulananTahunan()
    {
        return $this->hasOne(FormPs3SumpTankLamaEnamBulananTahunan::class);
    }

    public function formPs3PanelKontrolPompaEnamBulananTahunan()
    {
        return $this->hasOne(FormPs3PanelKontrolPompaEnamBulananTahunan::class);
    }

    // public function formPs3TrafoGensetCheckEnamBulananTahunan()
    // {
    //     return $this->hasOne(FormPs3TrafoGensetCheckEnamBulananTahunan::class);
    // }


    public function formPs3PanelMvEnamBulananTahunans()
    {
        return $this->hasMany(FormPs3PanelMvEnamBulananTahunan::class)->orderBy('id', 'asc');
    }

    //  ----------------------------
    //  --- APM ---
    public function formApmVehicleCarBodyHarians()
    {
        return $this->hasMany(FormApmVehicleCarBodyHarian::class)->orderBy('id', 'asc');
    }

    public function formApmVehicleAirBrakeSystemHarians()
    {
        return $this->hasMany(FormApmVehicleAirBrakeSystemHarian::class)->orderBy('id', 'asc');
    }

    public function formApmMekanikalVehicleBogieHarians()
    {
        return $this->hasMany(FormApmMekanikalVehicleBogieHarian::class)->orderBy('id', 'asc');
    }
    public function formApmMekanikalVehicleBogieTigaBulanans()
    {
        return $this->hasMany(FormApmMekanikalVehicleBogieTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmMekanikalVehicleAirBrakeSystemTigaBulanans()
    {
        return $this->hasMany(FormApmMekanikalVehicleAirBrakeSystemTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmMekanikalVehicleCarbodyTigaBulanans()
    {
        return $this->hasMany(FormApmMekanikalVehicleCarbodyTigaBulanan::class)->orderBy('id', 'asc');
    }

    public function formApmElektrikalVehicleExteriorHarians()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorHarian::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorMingguans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorMingguan::class)->orderBy('id', 'asc');
    }

    public function formApmElektrikalVehicleInteriorHarians()
    {
        return $this->hasMany(FormApmElektrikalVehicleInteriorHarian::class)->orderBy('id', 'asc');
    }
    public function formApmMekanikalVehicleMingguans()
    {
        return $this->hasMany(FormApmMekanikalVehicleMingguan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleInteriorGDTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleInteriorGDTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleInteriorTCMSTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleInteriorTCMSTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleInteriorLPLTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleInteriorLPLTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleInteriorFDSTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleInteriorFDSTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorBECTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorBECTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorDCTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorDCTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorESKTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorESKTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorHJBTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorHJBTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorFJBTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorFJBTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorHSCBTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorHSCBTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorLJBTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorLJBTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorPCSTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorPCSTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorSIVTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorSIVTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorLHTTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorLHTTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorTMTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorTMTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorVACTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorVACTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorEHTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorEHTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorJPTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorJPTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorMDSTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorMDSTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorVVTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorVVTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorPCTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorPCTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorBATTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorBATTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorBAThasilTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorBAThasilTigaBulanan::class)->orderBy('id', 'asc');
    }

    public function formApmElektrikalVehicleInteriorMCTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleInteriorMCTigaBulanan::class)->orderBy('id', 'asc');
    }



    //  ----------------------------
    //  --- ELP - ELECTRICAL PROTECTION ---
    public function formElpLaporanKerusakan()
    {
        return $this->hasOne(laporanKerusakanElectricalProtection::class);
    }
    public function formElpDailyEr2as()
    {
        return $this->hasMany(FormElpDailyEr2a::class)->orderBy('id', 'asc');
    }

    public function formElpDailyEr2bs()
    {
        return $this->hasMany(FormElpDailyEr2b::class)->orderBy('id', 'asc');
    }

    public function formElpDailyGhs()
    {
        return $this->hasMany(FormElpDailyGh::class)->orderBy('id', 'asc');
    }

    public function formElpNetworkScadaRcmsDailies()
    {
        return $this->hasMany(FormElpNetworkScadaRcmsDaily::class)->orderBy('id', 'asc');
    }

    public function formElpMeteringDuaMingguans()
    {
        return $this->hasMany(FormElpMeteringDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formElpTrafoDuaMingguans()
    {
        return $this->hasMany(FormElpTrafoDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formElpRelayDuaMingguans()
    {
        return $this->hasMany(FormElpTrafoDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formElpPlcDuaMingguans()
    {
        return $this->hasMany(FormElpPlcDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formElpFinalCheckTahunans()
    {
        return $this->hasMany(FormElpFinalCheckTahunan::class)->orderBy('id', 'asc');
    }

    public function formElpPartlyEnamBulanans()
    {
        return $this->hasMany(FormElpPartlyEnamBulanan::class)->orderBy('id', 'asc');
    }

    public function formElpTahunan()
    {
        return $this->hasOne(FormElpTahunan::class);
    }


    //  ----------------------------
    //  --- HMV ---
    public function formHmvGisAHarian()
    {
        return $this->hasMany(FormHmvGisAHarian::class);
    }

    public function formHmvGisBHarian()
    {
        return $this->hasMany(FormHmvGisBHarian::class);
    }

    public function formHmvGisCHarian()
    {
        return $this->hasMany(FormHmvGisCHarian::class);
    }

    public function formHmvGisBulanan()
    {
        return $this->hasOne(FormHmvGisBulanan::class);
    }

    public function formHmvGisTigaBulanans()
    {
        return $this->hasMany(FormHmvGisTigaBulanan::class);
    }

    public function formHmvGisTahunans()
    {
        return $this->hasMany(FormHmvGisTahunan::class);
    }

    public function formHmvGisDuaTahunans()
    {
        return $this->hasMany(FormHmvGisDuaTahunan::class);
    }

    public function formHmvGisKondisionals()
    {
        return $this->hasMany(FormHmvGisKondisional::class);
    }

    public function formHmvPanelBulanans()
    {
        return $this->hasMany(FormHmvPanelBulanan::class);
    }

    public function formHmvMeteranHarians()
    {
        return $this->hasMany(FormHmvMeteranHarian::class);
    }

    public function formHmvMeteran2Harians()
    {
        return $this->hasMany(FormHmvMeteran2Harian::class);
    }

    public function formHmvPanelTmHarians()
    {
        return $this->hasMany(FormHmvPanelTmHarian::class);
    }

    public function formHmvPanelTigaBulanans()
    {
        return $this->hasMany(FormHmvPanelTigaBulanan::class);
    }

    public function formHmvPowerMingguans()
    {
        return $this->hasMany(FormHmvPowerMingguan::class);
    }

    public function formHmvPowerBulanans()
    {
        return $this->hasMany(FormHmvPowerBulanan::class);
    }

    public function formHmvPowerTigaBulanans()
    {
        return $this->hasMany(FormHmvPowerTigaBulanan::class);
    }

    public function formHmvPowerEnamBulanans()
    {
        return $this->hasMany(FormHmvPowerEnamBulanan::class);
    }

    public function formHmvPowerTahunans()
    {
        return $this->hasMany(FormHmvPowerTahunan::class);
    }

    public function formHmvPowerDuaTahunans()
    {
        return $this->hasMany(FormHmvPowerDuaTahunan::class);
    }

    public function formHmvPowerKondisionals()
    {
        return $this->hasMany(FormHmvPowerKondisional::class);
    }

    //  ----------------------------
    //  --- ELE ---
    public function formElePemeliharaanTahunans()
    {
        return $this->hasMany(FormElePemeliharaanTahunan::class)->orderBy('id', 'asc');
    }

    public function formEleChecklist1Harians()
    {
        return $this->hasMany(FormEleChecklist1Harian::class)->orderBy('id', 'asc');
    }

    public function formEleChecklist2Harians()
    {
        return $this->hasMany(FormEleChecklist2Harian::class)->orderBy('id', 'asc');
    }

    public function formEleSuratIzinPelaksanaanPekerjaan()
    {
        return $this->hasOne(FormEleSuratIzinPelaksanaanPekerjaan::class);
    }
    public function formEleSuratPemeriksaanRutin()
    {
        return $this->hasOne(FormEleSuratPemeriksaanRutin::class);
    }

    // ----------------------------
    // SNT
    public function formSntChecklistSewageTreatmentPlantHarians()
    {
        return $this->hasMany(FormSntChecklistSewageTreatmentPlantHarian::class)->orderBy('id', 'asc');
    }

    public function formSntChecklistLiftingPumps()
    {
        return $this->hasMany(FormSntChecklistLiftingPump::class)->orderBy('id', 'asc');
    }

    public function formSntChecklistLiftingPumpHarians()
    {
        return $this->hasMany(FormSntChecklistLiftingPumpHarian::class)->orderBy('id', 'asc');
    }

    public function formSntChecklistDelacerationHarians()
    {
        return $this->hasMany(FormSntChecklistDelacerationHarian::class)->orderBy('id', 'asc');
    }

    public function formSntPerawatanT3VIPs()
    {
        return $this->hasMany(FormSntPerawatanT3VIP::class)->orderBy('id', 'asc');
    }

    public function formSntPerawatanSewageTreatmentPlantHarians()
    {
        return $this->hasMany(FormSntPerawatanSewageTreatmentPlantHarian::class)->orderBy('id', 'asc');
    }

    public function formSntChecklistPerawatanIncinerator123Harians()
    {
        return $this->hasMany(FormSntChecklistPerawatanIncinerator123Harian::class)->orderBy('id', 'asc');
    }

    public function formSntChecklistPerawatanIncinerator567Harians()
    {
        return $this->hasMany(FormSntChecklistPerawatanIncinerator567Harian::class)->orderBy('id', 'asc');
        ;
    }

    public function formSntChecklistPerawatanIncinerator123Mingguans()
    {
        return $this->hasMany(FormSntChecklistPerawatanIncinerator123Mingguan::class)->orderBy('id', 'asc');
    }

    public function formSntChecklistPerawatanIncinerator456Mingguans()
    {
        return $this->hasMany(FormSntChecklistPerawatanIncinerator456Mingguan::class)->orderBy('id', 'asc');
        
    }

    public function formSntChecklistPerawatanIncinerator123Bulanans()
    {
        return $this->hasMany(FormSntChecklistPerawatanIncinerator123Bulanan::class)->orderBy('id', 'asc');
    }

    public function formSntChecklistPerawatanIncinerator456Bulanans()
    {
        return $this->hasMany(FormSntChecklistPerawatanIncinerator456Bulanan::class)->orderBy('id', 'asc');
        
    }



    // ----------------------------
    // UPS
    public function formUpsLaporanHasilKerja()
    {
        return $this->hasOne(FormUpsLaporanHasilKerja::class);
    }
    public function formUpsLaporanHasilKerjaMalam()
    {
        return $this->hasOne(FormUpsLaporanHasilKerjaMalam::class);
    }
    public function formUpsLaporanKerusakanDanPerbaikan()
    {
        return $this->hasOne(FormUpsLaporanKerusakanDanPerbaikan::class);
    }
    public function formUpsPengukuranTeganganBatterys()
    {
        return $this->hasMany(FormUpsPengukuranTeganganBattery::class)->orderBy('id', 'asc');
    }
    public function formUpsDataUkurLoadBebans()
    {
        return $this->hasMany(FormUpsDataUkurLoadBeban::class)->orderBy('id', 'asc');
    }
    public function formUpsPengukuranPeralatanDuaMingguans()
    {
        return $this->hasMany(FormUpsPengukuranPeralatanDuaMingguan::class)->orderBy('id', 'asc');
    }
    public function formUpsPengukuranPeralatanEnamBulanans()
    {
        return $this->hasMany(FormUpsPengukuranPeralatanEnamBulanan::class)->orderBy('id', 'asc');
    }

    public function formUpsDokumentasiKegiatanRutins()
    {
        return $this->hasMany(FormUpsDokumentasiKegiatanRutin::class)->orderBy('id', 'asc');
    }

    // ----------------------------
    // NVA
    public function formNvaChecklist1Harians()
    {
        return $this->hasMany(FormNvaChecklist1Harian::class)->orderBy('id', 'asc');
    }

    public function formNvaChecklist2Harians()
    {
        return $this->hasMany(FormNvaChecklist2Harian::class)->orderBy('id', 'asc');
    }
    public function formNvaSuratPemeriksaanRutin()
    {
        return $this->hasOne(FormNvaSuratPemeriksaanRutin::class);
    }
    public function formNvaSuratPerbaikanGangguan()
    {
        return $this->hasOne(FormNvaSuratPerbaikanGangguan::class);
    }
    public function formNvaSuratIzinPelaksanaanPekerjaan()
    {
        return $this->hasOne(FormNvaSuratIzinPelaksanaanPekerjaan::class);
    }
    public function formNvaHFCPapiHarians()
    {
        return $this->hasMany(FormNvaHFCPapiHarian::class)->orderBy('id', 'asc');
    }
    public function formNvaConstantCurrentRegulations()
    {
        return $this->hasMany(FormNvaConstantCurrentRegulation::class)->orderBy('id', 'asc');
    }
    public function formNvaConstantCurrentRegulationDuas()
    {
        return $this->hasMany(FormNvaConstantCurrentRegulationDua::class)->orderBy('id', 'asc');
    }
    public function formNvaUraianPerbaikanHarian()
    {
        return $this->hasOne(FormNvaUraianPerbaikanHarian::class);
    }

    //  ----------------------------
    //  --- SVA ---
    public function formSvaSuratPemeriksaanRutin()
    {
        return $this->hasOne(FormSvaSuratPemeriksaanRutin::class);
    }
    public function formSvaSuratPerbaikanGangguan()
    {
        return $this->hasOne(FormSvaSuratPerbaikanGangguan::class);
    }
    public function formSvaSuratIzinPelaksanaanPekerjaan()
    {
        return $this->hasOne(FormSvaSuratIzinPelaksanaanPekerjaan::class);
    }
    public function formSvaChecklist1Harians()
    {
        return $this->hasMany(FormSvaChecklist1Harian::class)->orderBy('id', 'asc');
    }

    public function formSvaChecklist2Harians()
    {
        return $this->hasMany(FormSvaChecklist2Harian::class)->orderBy('id', 'asc');
    }
    // public function formSvaSuratPerintahPerbaikanHarians()
    // {
    //     return $this->hasMany(FormSvaSuratPerintahPerbaikanHarian::class)->orderBy('id', 'asc');
    // }
    // public function formSvaPemeriksaanRutinHarians()
    // {
    //     return $this->hasMany(FormSvaPemeriksaanRutinHarian::class)->orderBy('id', 'asc');
    // }
    public function formSvaHFCPapiHarians()
    {
        return $this->hasMany(FormSvaHFCPapiHarian::class)->orderBy('id', 'asc');
    }
    public function formSvaConstantCurrentRegulations()
    {
        return $this->hasMany(FormSvaConstantCurrentRegulation::class)->orderBy('id', 'asc');
    }
    public function formSvaUraianPerbaikanHarian()
    {
        return $this->hasOne(FormSvaUraianPerbaikanHarian::class);
    }

    //  ----------------------------
    //  --- AEW ---
    public function formAewPkppkHarians()
    {
        return $this->hasMany(FormAewPkppkHarian::class)->orderBy('id', 'asc');
    }

    public function formAewRubberRemoverHarians()
    {
        return $this->hasMany(FormAewRubberRemoverHarian::class)->orderBy('id', 'asc');
    }

    public function formAewParCarHarians()
    {
        return $this->hasMany(FormAewParCarHarian::class)->orderBy('id', 'asc');
    }

    //  ----------------------------
    //  --- AEW ---
    public function formWtrPeralatanHarians()
    {
        return $this->hasMany(FormWtrPeralatanHarian::class)->orderBy('id', 'asc');
    }

    public function deleteNullDetailWorkOrderForm()
    {
        if ($this->laporanKerusakanElectricalProtection) {
            $this->laporanKerusakanElectricalProtection->delete();
        }

        // tambahkan if untuk form yang berbeda :
        if ($this->checklistHarianGensetPs2ControlRoom) {
            $this->checklistHarianGensetPs2ControlRoom->delete();
        }
        if ($this->checklistGensetPhAocc) {
            $this->checklistGensetPhAocc->delete();
        }
        if ($this->formPs2WoDuaMingguans->isNotEmpty()) {
            $this->formPs2WoDuaMingguans->each->delete();
        }
        if ($this->formPs2GensetPhAoccHarian) {
            $this->formPs2GensetPhAoccHarian->delete();
        }
        if ($this->formPs2GensetPhAoccDuaMingguans->isNotEmpty()) {
            $this->formPs2GensetPhAoccDuaMingguans->each->delete();
        }
        if ($this->formPs2GensetDuaMingguans->isNotEmpty()) {
            $this->formPs2GensetDuaMingguans->each->delete();
        }
        if ($this->formPs2GensetDuaMingguanGensets->isNotEmpty()) {
            $this->formPs2GensetDuaMingguanGensets->each->delete();
        }
        if ($this->formPs2GensetDuaMingguanTrafos->isNotEmpty()) {
            $this->formPs2GensetDuaMingguanTrafos->each->delete();
        }
        if ($this->formPs2GensetDuaMingguanTanks->isNotEmpty()) {
            $this->formPs2GensetDuaMingguanTanks->each->delete();
        }
        if ($this->formPs2GensetRunningHarians->isNotEmpty()) {
            $this->formPs2GensetRunningHarians->each->delete();
        }
        if ($this->formPs2GensetRunningHarianKeterangan) {
            $this->formPs2GensetRunningHarianKeterangan->delete();
        }
        if ($this->formPs2PanelHarians->isNotEmpty()) {
            $this->formPs2PanelHarians->each->delete();
        }
        if ($this->formPs2GroundTankDuaMingguans->isNotEmpty()) {
            $this->formPs2GroundTankDuaMingguans->each->delete();
        }
        if ($this->formPs2PanelPhAoccs->isNotEmpty()) {
            $this->formPs2PanelPhAoccs->each->delete();
        }
        if ($this->formPs2ChecklistPanelLvHarians->isNotEmpty()) {
            $this->formPs2ChecklistPanelLvHarians->each->delete();
        }
        if ($this->formPs2PanelDuaMingguans->isNotEmpty()) {
            $this->formPs2PanelDuaMingguans->each->delete();
        }
        if ($this->formPs2RuangTenagaDuaMingguans->isNotEmpty()) {
            $this->formPs2RuangTenagaDuaMingguans->each->delete();
        }
        if ($this->formPs2PemeliharaanEnamBulanans->isNotEmpty()) {
            $this->formPs2PemeliharaanEnamBulanans->each->delete();
        }

        if ($this->checklistHarianGensetPs2GensetRooms->isNotEmpty()) {
            $this->checklistHarianGensetPs2GensetRooms->each->delete();
        }

        //  ----------------------------
        //  --- PS1 ---

        if ($this->formPs1PanelHarians->isNotEmpty()) {
            $this->formPs1PanelHarians->each->delete();
        }
        if ($this->formPs1GensetHarian) {
            $this->formPs1GensetHarian->delete();
        }
        if ($this->formPs1GensetMobile) {
            $this->formPs1GensetMobile->delete();
        }

        // if ($this->formPs1ControlDeskDuaMingguan) {
        //     $this->formPs1ControlDeskDuaMingguan->delete();
        // }

        if ($this->formPs1ControlDeskDuaMingguanBelakangs->isNotEmpty()) {
            $this->formPs1ControlDeskDuaMingguanBelakangs->each->delete();
        }

        if ($this->formPs1GensetHarians->isNotEmpty()) {
            $this->formPs1GensetHarians->each->delete();
        }

        if ($this->formPs1TestOnloadGenset) {
            $this->formPs1TestOnloadGenset->delete();
        }

        if ($this->formPs1TestOnloadUraianGensets->isNotEmpty()) {
            $this->formPs1TestOnloadUraianGensets->each->delete();
        }

        if ($this->formPs1TestOnloadParameterGensets->isNotEmpty()) {
            $this->formPs1TestOnloadParameterGensets->each->delete();
        }

        if ($this->formPs1GensetStandbyNo1DuaMingguans->isNotEmpty()) {
            $this->formPs1GensetStandbyNo1DuaMingguans->each->delete();
        }

        if ($this->formPs1GensetStandbyTigaBulanans->isNotEmpty()) {
            $this->formPs1GensetStandbyTigaBulanans->each->delete();
        }

        if ($this->formPs1GensetStandbyEnamBulanans->isNotEmpty()) {
            $this->formPs1GensetStandbyEnamBulanans->each->delete();
        }

        if ($this->formPs1GensetStandbyTahunans->isNotEmpty()) {
            $this->formPs1GensetStandbyTahunans->each->delete();
        }

        if ($this->formPs1GensetMobileDuaMingguan) {
            $this->formPs1GensetMobileDuaMingguan->delete();
        }

        if ($this->formPs1GensetMobileTigaBulanan) {
            $this->formPs1GensetMobileTigaBulanan->delete();
        }

        if ($this->formPs1GensetMobileEnamBulanan) {
            $this->formPs1GensetMobileEnamBulanan->delete();
        }

        if ($this->formPs1GensetMobileTahunan) {
            $this->formPs1GensetMobileTahunan->delete();
        }

        if ($this->gensetStandbyGarduTeknikDuaMingguans->isNotEmpty()) {
            $this->gensetStandbyGarduTeknikDuaMingguans->each->delete();
        }

        if ($this->gensetStandbyGarduTeknikEnamBulanans->isNotEmpty()) {
            $this->gensetStandbyGarduTeknikEnamBulanans->each->delete();
        }

        if ($this->gensetStandbyGarduTeknikTahunans->isNotEmpty()) {
            $this->gensetStandbyGarduTeknikTahunans->each->delete();
        }

        if ($this->formPs1TrafoDuaMingguans->isNotEmpty()) {
            $this->formPs1TrafoDuaMingguans->each->delete();
        }

        if ($this->formPs1PanelTmTahunans->isNotEmpty()) {
            $this->formPs1PanelTmTahunans->each->delete();
        }

        if ($this->formPs1PanelMvTahunans->isNotEmpty()) {
            $this->formPs1PanelMvTahunans->each->delete();
        }

        if ($this->formPs1PanelTmDuaMingguans->isNotEmpty()) {
            $this->formPs1PanelTmDuaMingguans->each->delete();
        }

        if ($this->formPs1PanelTmEnamBulanans->isNotEmpty()) {
            $this->formPs1PanelTmEnamBulanans->each->delete();
        }

        if ($this->formPs1PanelTrDuaMingguans->isNotEmpty()) {
            $this->formPs1PanelTrDuaMingguans->each->delete();
        }

        if ($this->formPs1PanelTrEnamBulanans->isNotEmpty()) {
            $this->formPs1PanelTrEnamBulanans->each->delete();
        }

        if ($this->formPs1PanelTrTahunans->isNotEmpty()) {
            $this->formPs1PanelTrTahunans->each->delete();
        }

        if ($this->formPs1PanelTrAuxDuaMingguans->isNotEmpty()) {
            $this->formPs1PanelTrAuxDuaMingguans->each->delete();
        }

        if ($this->formPs1PanelTrAuxEnamBulanans->isNotEmpty()) {
            $this->formPs1PanelTrAuxEnamBulanans->each->delete();
        }

        if ($this->formPs1PanelTrAuxTahunans->isNotEmpty()) {
            $this->formPs1PanelTrAuxTahunans->each->delete();
        }
        

        //  ----------------------------
        //  --- PS3 ---
        if ($this->formPs3ControlRoomHarian) {
            $this->formPs3ControlRoomHarian->delete();
        }

        if ($this->formPs3RuangTenagaSuhuDuaMingguan) {
            $this->formPs3RuangTenagaSuhuDuaMingguan->delete();
        }

        if ($this->formPs3MainTankLamaDuaMingguan) {
            $this->formPs3MainTankLamaDuaMingguan->delete();
        }

        if ($this->formPs3EpccDuaMingguan) {
            $this->formPs3EpccDuaMingguan->delete();
        }

        if ($this->formPs3GensetRoomHarians->isNotEmpty()) {
            $this->formPs3GensetRoomHarians->each->delete();
        }

        if ($this->formPs3PanelHarians->isNotEmpty()) {
            $this->formPs3PanelHarians->each->delete();
        }

        if ($this->formPs3PanelSdpDuaMingguans->isNotEmpty()) {
            $this->formPs3PanelSdpDuaMingguans->each->delete();
        }

        if ($this->formPs3TrafoGensetTigaBulanan) {
            $this->formPs3TrafoGensetTigaBulanan->delete();
        }

        if ($this->formPs3GroundTankBaruDuaMingguan) {
            $this->formPs3GroundTankBaruDuaMingguan->delete();
        }

        if ($this->formPs3GroundTankBaruPemeriksaanArusDuaMingguan) {
            $this->formPs3GroundTankBaruPemeriksaanArusDuaMingguan->delete();
        }

        if ($this->formPs3RuangTenagaTeganganDuaMingguans->isNotEmpty()) {
            $this->formPs3RuangTenagaTeganganDuaMingguans->each->delete();
        }

        if ($this->formPs3GensetDuaMingguans->isNotEmpty()) {
            $this->formPs3GensetDuaMingguans->each->delete();
        }

        if ($this->formPs3GensetTigaBulanans->isNotEmpty()) {
            $this->formPs3GensetTigaBulanans->each->delete();
        }

        if ($this->formPs3TrafoTigaBulanans->isNotEmpty()) {
            $this->formPs3TrafoTigaBulanans->each->delete();
        }

        if ($this->formPs3TrafoEnamBulananTahunans->isNotEmpty()) {
            $this->formPs3TrafoEnamBulananTahunans->each->delete();
        }

        if ($this->formPs3GensetEnamBulananTahunans->isNotEmpty()) {
            $this->formPs3GensetEnamBulananTahunans->each->delete();
        }

        if ($this->formPs3EpccSimulatorEnamBulananTahunan) {
            $this->formPs3EpccSimulatorEnamBulananTahunan->delete();
        }

        if ($this->formPs3EpccEnamBulananTahunan) {
            $this->formPs3EpccEnamBulananTahunan->delete();
        }

        if ($this->formPs3PanelPompaBbmBaruEnamBulananTahunan) {
            $this->formPs3PanelPompaBbmBaruEnamBulananTahunan->delete();
        }

        if ($this->formPs3PanelPompaBbmLamaEnamBulananTahunan) {
            $this->formPs3PanelPompaBbmLamaEnamBulananTahunan->delete();
        }

        if ($this->formPs3MainTankBaruLamaEnamBulananTahunan) {
            $this->formPs3MainTankBaruLamaEnamBulananTahunan->delete();
        }

        if ($this->formPs3SumpTankBaruEnamBulananTahunan) {
            $this->formPs3SumpTankBaruEnamBulananTahunan->delete();
        }

        if ($this->formPs3SumpTankBaruLamaEnamBulananTahunan) {
            $this->formPs3SumpTankBaruLamaEnamBulananTahunan->delete();
        }
        
        if ($this->formPs3SumpTankLamaEnamBulananTahunan) {
            $this->formPs3SumpTankLamaEnamBulananTahunan->delete();
        }

        if ($this->formPs3PanelKontrolPompaEnamBulananTahunan) {
            $this->formPs3PanelKontrolPompaEnamBulananTahunan->delete();
        }

        // if ($this->formPs3TrafoGensetCheckEnamBulananTahunan) {
        //     $this->formPs3TrafoGensetCheckEnamBulananTahunan->delete();
        // }


        if ($this->formPs3LvmdpACheckEnamBulananTahunans->isNotEmpty()) {
            $this->formPs3LvmdpACheckEnamBulananTahunans->each->delete();
        }

        if ($this->formPs3LvmdpBCheckEnamBulananTahunans->isNotEmpty()) {
            $this->formPs3LvmdpBCheckEnamBulananTahunans->each->delete();
        }

        if ($this->formPs3GensetCheckEnamBulananTahunans->isNotEmpty()) {
            $this->formPs3GensetCheckEnamBulananTahunans->each->delete();
        }

        if ($this->formPs3PanelMvEnamBulananTahunans->isNotEmpty()) {
            $this->formPs3PanelMvEnamBulananTahunans->each->delete();
        }

        //  ----------------------------
        //  --- APM ---
        if ($this->formApmVehicleCarBodyHarians->isNotEmpty()) {
            $this->formApmVehicleCarBodyHarians->each->delete();
        }

        if ($this->formApmVehicleAirBrakeSystemHarians->isNotEmpty()) {
            $this->formApmVehicleAirBrakeSystemHarians->each->delete();
        }

        if ($this->formApmMekanikalVehicleBogieHarians->isNotEmpty()) {
            $this->formApmMekanikalVehicleBogieHarians->each->delete();
        }
        if ($this->formApmMekanikalVehicleBogieTigaBulanans->isNotEmpty()) {
            $this->formApmMekanikalVehicleBogieTigaBulanans->each->delete();
        }
        if ($this->formApmMekanikalVehicleAirBrakeSystemTigaBulanans->isNotEmpty()) {
            $this->formApmMekanikalVehicleAirBrakeSystemTigaBulanans->each->delete();
        }
        if ($this->formApmMekanikalVehicleCarbodyTigaBulanans->isNotEmpty()) {
            $this->formApmMekanikalVehicleCarbodyTigaBulanans->each->delete();
        }

        if ($this->formApmElektrikalVehicleExteriorHarians->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorHarians->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorMingguans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorMingguans->each->delete();
        }
        if ($this->formApmElektrikalVehicleInteriorHarians->isNotEmpty()) {
            $this->formApmElektrikalVehicleInteriorHarians->each->delete();
        }
        if ($this->formApmMekanikalVehicleMingguans->isNotEmpty()) {
            $this->formApmMekanikalVehicleMingguans->each->delete();
        }
        if ($this->formApmElektrikalVehicleInteriorGDTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleInteriorGDTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleInteriorTCMSTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleInteriorTCMSTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleInteriorLPLTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleInteriorLPLTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleInteriorFDSTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleInteriorFDSTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorBECTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorBECTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorDCTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorDCTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorESKTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorESKTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorHJBTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorHJBTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorFJBTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorFJBTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorHSCBTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorHSCBTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorLJBTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorLJBTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorPCSTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorPCSTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorSIVTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorSIVTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorLHTTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorLHTTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorTMTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorTMTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorVACTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorVACTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorEHTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorEHTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorJPTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorJPTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorMDSTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorMDSTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorVVTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorVVTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorPCTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorPCTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorBATTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorBATTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleExteriorBAThasilTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleExteriorBAThasilTigaBulanans->each->delete();
        }
        if ($this->formApmElektrikalVehicleInteriorMCTigaBulanans->isNotEmpty()) {
            $this->formApmElektrikalVehicleInteriorMCTigaBulanans->each->delete();
        }



        //  ----------------------------
        //  --- ELP - ELECTRICAL PROTECTIOIN ---
        if ($this->formElpLaporanKerusakan) {
            $this->formElpLaporanKerusakan->delete();
        }

        if ($this->formElpDailyEr2as->isNotEmpty()) {
            $this->formElpDailyEr2as->each->delete();
        }

        if ($this->formElpDailyEr2bs->isNotEmpty()) {
            $this->formElpDailyEr2bs->each->delete();
        }

        if ($this->formElpDailyGhs->isNotEmpty()) {
            $this->formElpDailyGhs->each->delete();
        }

        if ($this->formElpNetworkScadaRcmsDailies->isNotEmpty()) {
            $this->formElpNetworkScadaRcmsDailies->each->delete();
        }

        if ($this->formElpMeteringDuaMingguans->isNotEmpty()) {
            $this->formElpMeteringDuaMingguans->each->delete();
        }

        if ($this->formElpTrafoDuaMingguans->isNotEmpty()) {
            $this->formElpTrafoDuaMingguans->each->delete();
        }

        if ($this->formElpRelayDuaMingguans->isNotEmpty()) {
            $this->formElpRelayDuaMingguans->each->delete();
        }

        if ($this->formElpPlcDuaMingguans->isNotEmpty()) {
            $this->formElpPlcDuaMingguans->each->delete();
        }

        if ($this->formElpFinalCheckTahunans->isNotEmpty()) {
            $this->formElpFinalCheckTahunans->each->delete();
        }

        if ($this->formElpPartlyEnamBulanans->isNotEmpty()) {
            $this->formElpPartlyEnamBulanans->each->delete();
        }

        if ($this->formElpTahunan) {
            $this->formElpTahunan->delete();
        }

        //  ----------------------------
        //  --- HMV ---
        if ($this->formHmvGisAHarian) {
            $this->formHmvGisAHarian->each->delete();
        }

        if ($this->formHmvGisBHarian) {
            $this->formHmvGisBHarian->each->delete();
        }

        if ($this->formHmvGisCHarian) {
            $this->formHmvGisCHarian->each->delete();
        }

        if ($this->formHmvGisBulanan) {
            $this->formHmvGisBulanan->delete();
        }

        if ($this->formHmvGisTigaBulanans->isNotEmpty()) {
            $this->formHmvGisTigaBulanans->each->delete();
        }

        if ($this->formHmvGisTahunans->isNotEmpty()) {
            $this->formHmvGisTahunans->each->delete();
        }

        if ($this->formHmvGisDuaTahunans->isNotEmpty()) {
            $this->formHmvGisDuaTahunans->each->delete();
        }

        if ($this->formHmvGisKondisionals->isNotEmpty()) {
            $this->formHmvGisKondisionals->each->delete();
        }

        if ($this->formHmvMeteranHarians->isNotEmpty()) {
            $this->formHmvMeteranHarians->each->delete();
        }

        if ($this->formHmvMeteran2Harians->isNotEmpty()) {
            $this->formHmvMeteran2Harians->each->delete();
        }

        if ($this->formHmvPanelTmHarians->isNotEmpty()) {
            $this->formHmvPanelTmHarians->each->delete();
        }

        if ($this->formHmvPanelBulanans->isNotEmpty()) {
            $this->formHmvPanelBulanans->each->delete();
        }

        if ($this->formHmvPanelTigaBulanans->isNotEmpty()) {
            $this->formHmvPanelTigaBulanans->each->delete();
        }

        if ($this->formHmvPowerMingguans->isNotEmpty()) {
            $this->formHmvPowerMingguans->each->delete();
        }

        if ($this->formHmvPowerBulanans->isNotEmpty()) {
            $this->formHmvPowerBulanans->each->delete();
        }

        if ($this->formHmvPowerTigaBulanans->isNotEmpty()) {
            $this->formHmvPowerTigaBulanans->each->delete();
        }


        if ($this->formHmvPowerEnamBulanans->isNotEmpty()) {
            $this->formHmvPowerEnamBulanans->each->delete();
        }

        if ($this->formHmvPowerTahunans->isNotEmpty()) {
            $this->formHmvPowerTahunans->each->delete();
        }

        if ($this->formHmvPowerDuaTahunans->isNotEmpty()) {
            $this->formHmvPowerDuaTahunans->each->delete();
        }

        if ($this->formHmvPowerKondisionals->isNotEmpty()) {
            $this->formHmvPowerKondisionals->each->delete();
        }

        //  ----------------------------
        //  --- ELE ---

        if ($this->formElePemeliharaanTahunans->isNotEmpty()) {
            $this->formElePemeliharaanTahunans->each->delete();
        }

        if ($this->formEleChecklist1Harians->isNotEmpty()) {
            $this->formEleChecklist1Harians->each->delete();
        }

        if ($this->formEleChecklist2Harians->isNotEmpty()) {
            $this->formEleChecklist2Harians->each->delete();
        }

        if ($this->formEleSuratIzinPelaksanaanPekerjaan) {
            $this->formEleSuratIzinPelaksanaanPekerjaan->delete();
        }
        if ($this->formEleSuratPemeriksaanRutin) {
            $this->formEleSuratPemeriksaanRutin->delete();
        }
        // ----------------------------
        // SNT
        if ($this->formSntChecklistSewageTreatmentPlantHarians->isNotEmpty()) {
            $this->formSntChecklistSewageTreatmentPlantHarians->each->delete();
        }
        if ($this->formSntPerawatanSewageTreatmentPlantHarians->isNotEmpty()) {
            $this->formSntPerawatanSewageTreatmentPlantHarians->each->delete();
        }
        if ($this->formSntChecklistLiftingPumps->isNotEmpty()) {
            $this->formSntChecklistLiftingPumps->each->delete();
        }
        if ($this->formSntChecklistLiftingPumpHarians->isNotEmpty()) {
            $this->formSntChecklistLiftingPumpHarians->each->delete();
        }
        if ($this->formSntChecklistDelacerationHarians->isNotEmpty()) {
            $this->formSntChecklistDelacerationHarians->each->delete();
        }
        if ($this->formSntPerawatanT3VIPs->isNotEmpty()) {
            $this->formSntPerawatanT3VIPs->each->delete();
        }
        if ($this->formSntChecklistPerawatanIncinerator123Harians->isNotEmpty()) {
            $this->formSntChecklistPerawatanIncinerator123Harians->each->delete();
        }
        if ($this->formSntChecklistPerawatanIncinerator567Harians->isNotEmpty()) {
            $this->formSntChecklistPerawatanIncinerator567Harians->each->delete();
        }
        if ($this->formSntChecklistPerawatanIncinerator123Mingguans->isNotEmpty()) {
            $this->formSntChecklistPerawatanIncinerator123Mingguans->each->delete();
        }
        if ($this->formSntChecklistPerawatanIncinerator456Mingguans->isNotEmpty()) {
            $this->formSntChecklistPerawatanIncinerator456Mingguans->each->delete();
        }
        if ($this->formSntChecklistPerawatanIncinerator123Bulanans->isNotEmpty()) {
            $this->formSntChecklistPerawatanIncinerator123Bulanans->each->delete();
        }
        if ($this->formSntChecklistPerawatanIncinerator456Bulanans->isNotEmpty()) {
            $this->formSntChecklistPerawatanIncinerator456Bulanans->each->delete();
        }


        // ----------------------------
        // UPS
        if ($this->formUpsLaporanHasilKerja) {
            $this->formUpsLaporanHasilKerja->delete();
        }
        if ($this->formUpsLaporanHasilKerjaMalam) {
            $this->formUpsLaporanHasilKerjaMalam->delete();
        }
        if ($this->formUpsLaporanKerusakanDanPerbaikan) {
            $this->formUpsLaporanKerusakanDanPerbaikan->delete();
        }
        if ($this->formUpsPengukuranTeganganBatterys->isNotEmpty()) {
            $this->formUpsPengukuranTeganganBatterys->each->delete();
        }
        if ($this->formUpsDataUkurLoadBebans->isNotEmpty()) {
            $this->formUpsDataUkurLoadBebans->each->delete();
        }
        if ($this->formUpsPengukuranPeralatanDuaMingguans->isNotEmpty()) {
            $this->formUpsPengukuranPeralatanDuaMingguans->each->delete();
        }
        if ($this->formUpsPengukuranPeralatanEnamBulanans->isNotEmpty()) {
            $this->formUpsPengukuranPeralatanEnamBulanans->each->delete();
        }
        if ($this->formUpsDokumentasiKegiatanRutins->isNotEmpty()) {
            $this->formUpsDokumentasiKegiatanRutins->each->delete();
        }
        // ----------------------------
        // NVA
        if ($this->formNvaChecklist1Harians->isNotEmpty()) {
            $this->formNvaChecklist1Harians->each->delete();
        }

        if ($this->formNvaChecklist2Harians->isNotEmpty()) {
            $this->formNvaChecklist2Harians->each->delete();
        }

        if ($this->formNvaSuratIzinPelaksanaanPekerjaan) {
            $this->formNvaSuratIzinPelaksanaanPekerjaan->delete();
        }
        if ($this->formNvaSuratPemeriksaanRutin) {
            $this->formNvaSuratPemeriksaanRutin->delete();
        }
        if ($this->formNvaSuratPerbaikanGangguan) {
            $this->formNvaSuratPerbaikanGangguan->delete();
        }
        if ($this->formNvaHFCPapiHarians->isNotEmpty()) {
            $this->formNvaHFCPapiHarians->each->delete();
        }
        if ($this->formNvaConstantCurrentRegulations->isNotEmpty()) {
            $this->formNvaConstantCurrentRegulations->each->delete();
        }
        if ($this->formNvaConstantCurrentRegulationDuas->isNotEmpty()) {
            $this->formNvaConstantCurrentRegulationDuas->each->delete();
        }
        if ($this->formNvaUraianPerbaikanHarian) {
            $this->formNvaUraianPerbaikanHarian->delete();
        }
        //  ----------------------------
        //  --- SVA ---
        if ($this->formSvaSuratIzinPelaksanaanPekerjaan) {
            $this->formSvaSuratIzinPelaksanaanPekerjaan->delete();
        }
        if ($this->formSvaSuratPemeriksaanRutin) {
            $this->formSvaSuratPemeriksaanRutin->delete();
        }
        if ($this->formSvaSuratPerbaikanGangguan) {
            $this->formSvaSuratPerbaikanGangguan->delete();
        }
        if ($this->formSvaChecklist1Harians->isNotEmpty()) {
            $this->formSvaChecklist1Harians->each->delete();
        }

        if ($this->formSvaChecklist2Harians->isNotEmpty()) {
            $this->formSvaChecklist2Harians->each->delete();
        }
        // if ($this->formSvaSuratPerintahPerbaikanHarians->isNotEmpty()) {
        //     $this->formSvaSuratPerintahPerbaikanHarians->each->delete();
        // }
        // if ($this->formSvaPemeriksaanRutinHarians->isNotEmpty()) {
        //     $this->formSvaPemeriksaanRutinHarians->each->delete();
        // }
        if ($this->formSvaHFCPapiHarians->isNotEmpty()) {
            $this->formSvaHFCPapiHarians->each->delete();
        }
        if ($this->formSvaConstantCurrentRegulations->isNotEmpty()) {
            $this->formSvaConstantCurrentRegulations->each->delete();
        }
        if ($this->formSvaUraianPerbaikanHarian) {
            $this->formSvaUraianPerbaikanHarian->delete();
        }

        //  ----------------------------
        //  --- AEW ---

        if ($this->formAewPkppkHarians->isNotEmpty()) {
            $this->formAewPkppkHarians->each->delete();
        }

        if ($this->formAewRubberRemoverHarians->isNotEmpty()) {
            $this->formAewRubberRemoverHarians->each->delete();
        }

        if ($this->formAewParCarHarians->isNotEmpty()) {
            $this->formAewParCarHarians->each->delete();
        }

        //  ----------------------------
        //  --- WTR ---

        if ($this->formWtrPeralatanHarians->isNotEmpty()) {
            $this->formWtrPeralatanHarians->each->delete();
        }



        $this->delete();
    }
}
