<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FormPs3ControlRoomHarian;
use App\Models\FormUpsLaporanHasilKerja;
use App\Models\FormPs3PanelMvEnamBulananTahunan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkOrder extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'asset_id', 'work_order_status_id', 'maintenance_type_id', 'schedule_maintenance_id', 'priority', 'description', 'suggested_completion_date', 'actual_completion_date', 'completion_notes', 'date_generate', 'wo_status', 'token', 'approve_user_id'];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    

    public function workOrderStatus()
    {
        return $this->belongsTo(WorkOrderStatus::class);
    }

    public function maintenanceType()
    {
        return $this->belongsTo(MaintenanceType::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function userTechnicals()
    {
        return $this->belongsToMany(UserTechnical::class);
    }

    public function userGroups()
    {
        return $this->belongsToMany(UserGroup::class);
    }

    public function scheduleMaintenance()
    {
        return $this->belongsTo(ScheduleMaintenance::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function taskGroups()
    {
        return $this->belongsToMany(TaskGroup::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function reportTaskWorkOrders()
    {
        return $this->hasMany(ReportTaskWorkOrder::class);
    }

    public function reportAssetMaterials()
    {
        return $this->hasMany(ReportAssetMaterial::class);
    }

    public function detailWorkOrderForms()
    {
        return $this->hasMany(DetailWorkOrderForm::class)->orderBy('id', 'asc');
    }

    public function formActivityLogs()
    {
        return $this->hasMany(FormActivityLog::class)->orderBy('id', 'asc');
    }

    public function getDifByToDate($date_start, $date_end)
    {
        $date1 = new \DateTime($date_start);
        $date2 = new \DateTime($date_end);
        $diff = $date1->diff($date2);
        // get hour diff
        $hourDiff = $diff->h;
        return $diff->days;
    }

    public function updateDetailWorkOrderForm($assetFormId)
    {
        if ($assetFormId) {
            $detailWorkOrderFormDeletes = DetailWorkOrderForm::where('work_order_id', $this->id)->get();

            foreach ($assetFormId as $id) {
                $detailWorkOrderFormDelete = DetailWorkOrderForm::where('work_order_id', $this->id)
                    ->where('form_id', $id)
                    ->first();
                if ($detailWorkOrderFormDelete) {
                    $newDetailWorkOrderForm = $detailWorkOrderFormDelete->replicate();
                    $newDetailWorkOrderForm->save();

                    // ---------- Has One

                    //  ----------------------------
                    //  --- ELP ---
                    if ($laporanKerusakanElectricalProtectionDelete = laporanKerusakanElectricalProtection::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newlaporanKerusakanElectricalProtection = $laporanKerusakanElectricalProtectionDelete->replicate();
                        $newlaporanKerusakanElectricalProtection->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newlaporanKerusakanElectricalProtection->save();
                        $laporanKerusakanElectricalProtectionDelete->delete();
                    }
                    //  ----------------------------
                    //  --- PS2 ---

                    if ($checklistHarianGensetPs2ControlRoomDelete = ChecklistHarianGensetPs2ControlRoom::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newChecklistHarianGensetPs2ControlRoom = $checklistHarianGensetPs2ControlRoomDelete->replicate();
                        $newChecklistHarianGensetPs2ControlRoom->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newChecklistHarianGensetPs2ControlRoom->save();
                        $checklistHarianGensetPs2ControlRoomDelete->delete();
                    }

                    if ($checklistGensetPhAoccDelete = ChecklistGensetPhAocc::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newChecklistGensetPhAocc = $checklistGensetPhAoccDelete->replicate();
                        $newChecklistGensetPhAocc->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newChecklistGensetPhAocc->save();
                        $checklistGensetPhAoccDelete->delete();
                    }

                    if ($formPs2GensetPhAoccHarian = FormPs2GensetPhAoccHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormPs2GensetPhAoccHarian = $formPs2GensetPhAoccHarian->replicate();
                        $newFormPs2GensetPhAoccHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormPs2GensetPhAoccHarian->save();
                        $formPs2GensetPhAoccHarian->delete();
                    }

                    if ($formPs2GensetRunningHarianKeterangan = FormPs2GensetRunningHarianKeterangan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormPs2GensetRunningHarianKeterangan = $formPs2GensetRunningHarianKeterangan->replicate();
                        $newFormPs2GensetRunningHarianKeterangan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormPs2GensetRunningHarianKeterangan->save();
                        $formPs2GensetRunningHarianKeterangan->delete();
                    }

                    //  ----------------------------
                    //  --- PS1 ---

                    if ($formPs1GensetMobile = FormPs1GensetMobile::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormPs1GensetMobile = $formPs1GensetMobile->replicate();
                        $newFormPs1GensetMobile->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormPs1GensetMobile->save();
                        $formPs1GensetMobile->delete();
                    }

                    if ($formPs1TestOnloadGenset = FormPs1TestOnloadGenset::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormPs1TestOnloadGenset = $formPs1TestOnloadGenset->replicate();
                        $newFormPs1TestOnloadGenset->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormPs1TestOnloadGenset->save();
                        $formPs1TestOnloadGenset->delete();
                    }


                    //  ----------------------------
                    //  --- PS3 ---
                    if ($formPs3ControlRoomHarianDelete = FormPs3ControlRoomHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3ControlRoomHarian = $formPs3ControlRoomHarianDelete->replicate();
                        $formPs3ControlRoomHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3ControlRoomHarian->save();
                        $formPs3ControlRoomHarianDelete->delete();
                    }

                    if ($formPs3CraneGensetTigaBulananDelete = FormPs3CraneGensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3CraneGensetTigaBulanan = $formPs3CraneGensetTigaBulananDelete->replicate();
                        $formPs3CraneGensetTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3CraneGensetTigaBulanan->save();
                        $formPs3CraneGensetTigaBulananDelete->delete();
                    }

                    if ($formPs3RuangTenagaSuhuDuaMingguanDelete = FormPs3RuangTenagaSuhuDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3RuangTenagaSuhuDuaMingguan = $formPs3RuangTenagaSuhuDuaMingguanDelete->replicate();
                        $formPs3RuangTenagaSuhuDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3RuangTenagaSuhuDuaMingguan->save();
                        $formPs3RuangTenagaSuhuDuaMingguanDelete->delete();
                    }

                    if ($formPs3MainTankLamaDuaMingguanDelete = FormPs3MainTankLamaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3MainTankLamaDuaMingguan = $formPs3MainTankLamaDuaMingguanDelete->replicate();
                        $formPs3MainTankLamaDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3MainTankLamaDuaMingguan->save();
                        $formPs3MainTankLamaDuaMingguanDelete->delete();
                    }
                    if ($formPs3EpccDuaMingguanDelete = FormPs3EpccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3EpccDuaMingguan = $formPs3EpccDuaMingguanDelete->replicate();
                        $formPs3EpccDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3EpccDuaMingguan->save();
                        $formPs3EpccDuaMingguanDelete->delete();
                    }

                    if ($formPs3GroundTankBaruDuaMingguanDelete = FormPs3GroundTankBaruDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3GroundTankBaruDuaMingguan = $formPs3GroundTankBaruDuaMingguanDelete->replicate();
                        $formPs3GroundTankBaruDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3GroundTankBaruDuaMingguan->save();
                        $formPs3GroundTankBaruDuaMingguanDelete->delete();
                    }

                    if ($formPs3GroundTankBaruPemeriksaanArusDuaMingguanDelete = FormPs3GroundTankBaruPemeriksaanArusDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3GroundTankBaruPemeriksaanArusDuaMingguan = $formPs3GroundTankBaruPemeriksaanArusDuaMingguanDelete->replicate();
                        $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->save();
                        $formPs3GroundTankBaruPemeriksaanArusDuaMingguanDelete->delete();
                    }


                    if ($formPs3EpccSimulatorEnamBulananTahunanDelete = FormPs3EpccSimulatorEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3EpccSimulatorEnamBulananTahunan = $formPs3EpccSimulatorEnamBulananTahunanDelete->replicate();
                        $formPs3EpccSimulatorEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3EpccSimulatorEnamBulananTahunan->save();
                        $formPs3EpccSimulatorEnamBulananTahunanDelete->delete();
                    }

                    if ($formPs3EpccEnamBulananTahunanDelete = FormPs3EpccEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3EpccEnamBulananTahunan = $formPs3EpccEnamBulananTahunanDelete->replicate();
                        $formPs3EpccEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3EpccEnamBulananTahunan->save();
                        $formPs3EpccEnamBulananTahunanDelete->delete();
                    }

                    if ($formPs3PanelPompaBbmBaruEnamBulananTahunanDelete = FormPs3PanelPompaBbmBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3PanelPompaBbmBaruEnamBulananTahunan = $formPs3PanelPompaBbmBaruEnamBulananTahunanDelete->replicate();
                        $formPs3PanelPompaBbmBaruEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3PanelPompaBbmBaruEnamBulananTahunan->save();
                        $formPs3PanelPompaBbmBaruEnamBulananTahunanDelete->delete();
                    }

                    if ($formPs3PanelPompaBbmLamaEnamBulananTahunanDelete = FormPs3PanelPompaBbmLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3PanelPompaBbmLamaEnamBulananTahunan = $formPs3PanelPompaBbmLamaEnamBulananTahunanDelete->replicate();
                        $formPs3PanelPompaBbmLamaEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3PanelPompaBbmLamaEnamBulananTahunan->save();
                        $formPs3PanelPompaBbmLamaEnamBulananTahunanDelete->delete();
                    }

                    if ($formPs3MainTankBaruLamaEnamBulananTahunanDelete = FormPs3MainTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3MainTankBaruLamaEnamBulananTahunan = $formPs3MainTankBaruLamaEnamBulananTahunanDelete->replicate();
                        $formPs3MainTankBaruLamaEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3MainTankBaruLamaEnamBulananTahunan->save();
                        $formPs3MainTankBaruLamaEnamBulananTahunanDelete->delete();
                    }

                    if ($formPs3SumpTankBaruEnamBulananTahunanDelete = FormPs3SumpTankBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3SumpTankBaruEnamBulananTahunan = $formPs3SumpTankBaruEnamBulananTahunanDelete->replicate();
                        $formPs3SumpTankBaruEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3SumpTankBaruEnamBulananTahunan->save();
                        $formPs3SumpTankBaruEnamBulananTahunanDelete->delete();
                    }

                    if ($formPs3SumpTankLamaEnamBulananTahunanDelete = FormPs3SumpTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3SumpTankLamaEnamBulananTahunan = $formPs3SumpTankLamaEnamBulananTahunanDelete->replicate();
                        $formPs3SumpTankLamaEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3SumpTankLamaEnamBulananTahunan->save();
                        $formPs3SumpTankLamaEnamBulananTahunanDelete->delete();
                    }

                    if ($formPs3PanelKontrolPompaEnamBulananTahunanDelete = FormPs3PanelKontrolPompaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3PanelKontrolPompaEnamBulananTahunan = $formPs3PanelKontrolPompaEnamBulananTahunanDelete->replicate();
                        $formPs3PanelKontrolPompaEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3PanelKontrolPompaEnamBulananTahunan->save();
                        $formPs3PanelKontrolPompaEnamBulananTahunanDelete->delete();
                    }

                    if ($formPs3TrafoGensetCheckEnamBulananTahunanDelete = formPs3TrafoGensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3TrafoGensetCheckEnamBulananTahunan = $formPs3TrafoGensetCheckEnamBulananTahunanDelete->replicate();
                        $formPs3TrafoGensetCheckEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formPs3TrafoGensetCheckEnamBulananTahunan->save();
                        $formPs3TrafoGensetCheckEnamBulananTahunanDelete->delete();
                    }


                    // SVA HAS ONE


                    // ------------- If the table has relation tomany
                    //  ----------------------------

                    $ChecklistHarianGensetPs2GensetRooms = ChecklistHarianGensetPs2GensetRoom::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($ChecklistHarianGensetPs2GensetRooms->isNotEmpty()) {
                        foreach ($ChecklistHarianGensetPs2GensetRooms as $ChecklistHarianGensetPs2GensetRoom) {
                            $newChecklistHarianGensetPs2GensetRoom = $ChecklistHarianGensetPs2GensetRoom->replicate();
                            $newChecklistHarianGensetPs2GensetRoom->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newChecklistHarianGensetPs2GensetRoom->save();
                            $ChecklistHarianGensetPs2GensetRoom->delete();
                        }
                    }

                    $formPs2GensetPhAoccDuaMingguans = FormPs2GensetPhAoccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GensetPhAoccDuaMingguans->isNotEmpty()) {
                        foreach ($formPs2GensetPhAoccDuaMingguans as $formPs2GensetPhAoccDuaMingguan) {
                            $newFormPs2GensetPhAoccDuaMingguan = $formPs2GensetPhAoccDuaMingguan->replicate();
                            $newFormPs2GensetPhAoccDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2GensetPhAoccDuaMingguan->save();
                            $formPs2GensetPhAoccDuaMingguan->delete();
                        }
                    }

                    $formPs2GensetDuaMingguans = FormPs2GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GensetDuaMingguans->isNotEmpty()) {
                        foreach ($formPs2GensetDuaMingguans as $formPs2GensetDuaMingguan) {
                            $newFormPs2GensetDuaMingguan = $formPs2GensetDuaMingguan->replicate();
                            $newFormPs2GensetDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2GensetDuaMingguan->save();
                            $formPs2GensetDuaMingguan->delete();
                        }
                    }

                    $formPs2GensetDuaMingguanGensets = FormPs2GensetDuaMingguanGenset::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GensetDuaMingguanGensets->isNotEmpty()) {
                        foreach ($formPs2GensetDuaMingguanGensets as $formPs2GensetDuaMingguanGenset) {
                            $newFormPs2GensetDuaMingguanGenset = $formPs2GensetDuaMingguanGenset->replicate();
                            $newFormPs2GensetDuaMingguanGenset->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2GensetDuaMingguanGenset->save();
                            $formPs2GensetDuaMingguanGenset->delete();
                        }
                    }

                    $formPs2GensetDuaMingguanTrafos = FormPs2GensetDuaMingguanTrafo::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GensetDuaMingguanTrafos->isNotEmpty()) {
                        foreach ($formPs2GensetDuaMingguanTrafos as $formPs2GensetDuaMingguanTrafo) {
                            $newFormPs2GensetDuaMingguanTrafo = $formPs2GensetDuaMingguanTrafo->replicate();
                            $newFormPs2GensetDuaMingguanTrafo->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2GensetDuaMingguanTrafo->save();
                            $formPs2GensetDuaMingguanTrafo->delete();
                        }
                    }

                    $formPs2GensetDuaMingguanTanks = FormPs2GensetDuaMingguanTank::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GensetDuaMingguanTanks->isNotEmpty()) {
                        foreach ($formPs2GensetDuaMingguanTanks as $formPs2GensetDuaMingguanTank) {
                            $newFormPs2GensetDuaMingguanTank = $formPs2GensetDuaMingguanTank->replicate();
                            $newFormPs2GensetDuaMingguanTank->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2GensetDuaMingguanTank->save();
                            $formPs2GensetDuaMingguanTank->delete();
                        }
                    }

                    $formPs2GroundTankDuaMingguans = FormPs2GroundTankDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GroundTankDuaMingguans->isNotEmpty()) {
                        foreach ($formPs2GroundTankDuaMingguans as $formPs2GroundTankDuaMingguan) {
                            $newFormPs2GroundTankDuaMingguan = $formPs2GroundTankDuaMingguan->replicate();
                            $newFormPs2GroundTankDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2GroundTankDuaMingguan->save();
                            $formPs2GroundTankDuaMingguan->delete();
                        }
                    }

                    $formPs2GensetRunningHarians = FormPs2GensetRunningHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GensetRunningHarians->isNotEmpty()) {
                        foreach ($formPs2GensetRunningHarians as $formPs2GensetRunningHarian) {
                            $newFormPs2GensetRunningHarian = $formPs2GensetRunningHarian->replicate();
                            $newFormPs2GensetRunningHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2GensetRunningHarian->save();
                            $formPs2GensetRunningHarian->delete();
                        }
                    }

                    $formPs2PanelHarians = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2PanelHarians->isNotEmpty()) {
                        foreach ($formPs2PanelHarians as $formPs2PanelHarian) {
                            $newFormPs2PanelHarian = $formPs2PanelHarian->replicate();
                            $newFormPs2PanelHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2PanelHarian->save();
                            $formPs2PanelHarian->delete();
                        }
                    }

                    $formPs2PanelPhAoccs = FormPs2PanelPhAocc::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2PanelPhAoccs->isNotEmpty()) {
                        foreach ($formPs2PanelPhAoccs as $formPs2PanelPhAocc) {
                            $newFormPs2PanelPhAocc = $formPs2PanelPhAocc->replicate();
                            $newFormPs2PanelPhAocc->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2PanelPhAocc->save();
                            $formPs2PanelPhAocc->delete();
                        }
                    }

                    $formPs2ChecklistPanelLvHarians = formPs2ChecklistPanelLvHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2ChecklistPanelLvHarians->isNotEmpty()) {
                        foreach ($formPs2ChecklistPanelLvHarians as $formPs2ChecklistPanelLvHarian) {
                            $newformPs2ChecklistPanelLvHarian = $formPs2ChecklistPanelLvHarian->replicate();
                            $newformPs2ChecklistPanelLvHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformPs2ChecklistPanelLvHarian->save();
                            $formPs2ChecklistPanelLvHarian->delete();
                        }
                    }

                    $formPs2PanelDuaMingguans = FormPs2PanelDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2PanelDuaMingguans->isNotEmpty()) {
                        foreach ($formPs2PanelDuaMingguans as $formPs2PanelDuaMingguan) {
                            $newFormPs2PanelDuaMingguan = $formPs2PanelDuaMingguan->replicate();
                            $newFormPs2PanelDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2PanelDuaMingguan->save();
                            $formPs2PanelDuaMingguan->delete();
                        }
                    }

                    $formPs2RuangTenagaDuaMingguans = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2RuangTenagaDuaMingguans->isNotEmpty()) {
                        foreach ($formPs2RuangTenagaDuaMingguans as $formPs2RuangTenagaDuaMingguan) {
                            $newFormPs2RuangTenagaDuaMingguan = $formPs2RuangTenagaDuaMingguan->replicate();
                            $newFormPs2RuangTenagaDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2RuangTenagaDuaMingguan->save();
                            $formPs2RuangTenagaDuaMingguan->delete();
                        }
                    }

                    $formPs2PemeliharaanEnamBulanans = FormPs2PemeliharaanEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2PemeliharaanEnamBulanans->isNotEmpty()) {
                        foreach ($formPs2PemeliharaanEnamBulanans as $formPs2PemeliharaanEnamBulanan) {
                            $newFormPs2PemeliharaanEnamBulanan = $formPs2PemeliharaanEnamBulanan->replicate();
                            $newFormPs2PemeliharaanEnamBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2PemeliharaanEnamBulanan->save();
                            $formPs2PemeliharaanEnamBulanan->delete();
                        }
                    }

                    $formPs2WoDuaMingguans = FormPs2WoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2WoDuaMingguans->isNotEmpty()) {
                        foreach ($formPs2WoDuaMingguans as $formPs2WoDuaMingguan) {
                            $newFormPs2WoDuaMingguans = $formPs2WoDuaMingguan->replicate();
                            $newFormPs2WoDuaMingguans->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs2WoDuaMingguans->save();
                            $formPs2WoDuaMingguan->delete();
                        }
                    }

                    // $formPs2WoTigaBulanans = FormPs2WoTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    // if ($formPs2WoTigaBulanans->isNotEmpty()) {
                    //     foreach ($formPs2WoTigaBulanans as $formPs2WoTigaBulanan) {
                    //         $newFormPs2WoTigaBulanans = $formPs2WoTigaBulanan->replicate();
                    //         $newFormPs2WoTigaBulanans->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                    //         $newFormPs2WoTigaBulanans->save();
                    //         $formPs2WoTigaBulanan->delete();
                    //     }
                    // }

                    //  ----------------------------
                    //  --- PS1 ---

                    $formPs1PanelHarians = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelHarians->isNotEmpty()) {
                        foreach ($formPs1PanelHarians as $formPs1PanelHarian) {
                            $newFormPs1PanelHarian = $formPs1PanelHarian->replicate();
                            $newFormPs1PanelHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1PanelHarian->save();
                            $formPs1PanelHarian->delete();
                        }
                    }

                    $formPs1ControlDeskDuaMingguans = FormPs1ControlDeskDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1ControlDeskDuaMingguans->isNotEmpty()) {
                        foreach ($formPs1ControlDeskDuaMingguans as $formPs1ControlDeskDuaMingguan) {
                            $newFormPs1ControlDeskDuaMingguan = $formPs1ControlDeskDuaMingguan->replicate();
                            $newFormPs1ControlDeskDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1ControlDeskDuaMingguan->save();
                            $formPs1ControlDeskDuaMingguan->delete();
                        }
                    }

                    $formPs1ControlDeskDuaMingguanBelakangs = FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1ControlDeskDuaMingguanBelakangs->isNotEmpty()) {
                        foreach ($formPs1ControlDeskDuaMingguanBelakangs as $formPs1ControlDeskDuaMingguanBelakang) {
                            $newFormPs1ControlDeskDuaMingguanBelakang = $formPs1ControlDeskDuaMingguanBelakang->replicate();
                            $newFormPs1ControlDeskDuaMingguanBelakang->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1ControlDeskDuaMingguanBelakang->save();
                            $formPs1ControlDeskDuaMingguanBelakang->delete();
                        }
                    }

                    $formPs1ControlDeskTahunans = FormPs1ControlDeskTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1ControlDeskTahunans->isNotEmpty()) {
                        foreach ($formPs1ControlDeskTahunans as $formPs1ControlDeskTahunan) {
                            $newFormPs1ControlDeskTahunan = $formPs1ControlDeskTahunan->replicate();
                            $newFormPs1ControlDeskTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1ControlDeskTahunan->save();
                            $formPs1ControlDeskTahunan->delete();
                        }
                    }
                    
                    $formPs1GensetHarians = FormPs1GensetHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetHarians->isNotEmpty()) {
                        foreach ($formPs1GensetHarians as $formPs1GensetHarian) {
                            $newFormPs1GensetHarian = $formPs1GensetHarian->replicate();
                            $newFormPs1GensetHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1GensetHarian->save();
                            $formPs1GensetHarian->delete();
                        }
                    }

                    $formPs1TestOnloadUraianGensets = FormPs1TestOnloadUraianGenset::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1TestOnloadUraianGensets->isNotEmpty()) {
                        foreach ($formPs1TestOnloadUraianGensets as $formPs1TestOnloadUraianGenset) {
                            $newFormPs1TestOnloadUraianGenset = $formPs1TestOnloadUraianGenset->replicate();
                            $newFormPs1TestOnloadUraianGenset->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1TestOnloadUraianGenset->save();
                            $formPs1TestOnloadUraianGenset->delete();
                        }
                    }

                    $formPs1TestOnloadParameterGensets = FormPs1TestOnloadParameterGenset::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1TestOnloadParameterGensets->isNotEmpty()) {
                        foreach ($formPs1TestOnloadParameterGensets as $formPs1TestOnloadParameterGenset) {
                            $newFormPs1TestOnloadParameterGenset = $formPs1TestOnloadParameterGenset->replicate();
                            $newFormPs1TestOnloadParameterGenset->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1TestOnloadParameterGenset->save();
                            $formPs1TestOnloadParameterGenset->delete();
                        }
                    }

                    $formPs1GensetStandbyNo1DuaMingguans = FormPs1GensetStandbyNo1DuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetStandbyNo1DuaMingguans->isNotEmpty()) {
                        foreach ($formPs1GensetStandbyNo1DuaMingguans as $formPs1GensetStandbyNo1DuaMingguan) {
                            $newFormPs1GensetStandbyNo1DuaMingguan = $formPs1GensetStandbyNo1DuaMingguan->replicate();
                            $newFormPs1GensetStandbyNo1DuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1GensetStandbyNo1DuaMingguan->save();
                            $formPs1GensetStandbyNo1DuaMingguan->delete();
                        }
                    }

                    $formPs1GensetStandbyTigaBulanans = FormPs1GensetStandbyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetStandbyTigaBulanans->isNotEmpty()) {
                        foreach ($formPs1GensetStandbyTigaBulanans as $formPs1GensetStandbyTigaBulanan) {
                            $newFormPs1GensetStandbyTigaBulanan = $formPs1GensetStandbyTigaBulanan->replicate();
                            $newFormPs1GensetStandbyTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1GensetStandbyTigaBulanan->save();
                            $formPs1GensetStandbyTigaBulanan->delete();
                        }
                    }
                    $formPs1GensetStandbyEnamBulanans = FormPs1GensetStandbyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetStandbyEnamBulanans->isNotEmpty()) {
                        foreach ($formPs1GensetStandbyEnamBulanans as $formPs1GensetStandbyEnamBulanan) {
                            $newFormPs1GensetStandbyEnamBulanan = $formPs1GensetStandbyEnamBulanan->replicate();
                            $newFormPs1GensetStandbyEnamBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1GensetStandbyEnamBulanan->save();
                            $formPs1GensetStandbyEnamBulanan->delete();
                        }
                    }

                    $formPs1GensetStandbyTahunans = FormPs1GensetStandbyTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetStandbyTahunans->isNotEmpty()) {
                        foreach ($formPs1GensetStandbyTahunans as $formPs1GensetStandbyTahunan) {
                            $newFormPs1GensetStandbyTahunan = $formPs1GensetStandbyTahunan->replicate();
                            $newFormPs1GensetStandbyTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1GensetStandbyTahunan->save();
                            $formPs1GensetStandbyTahunan->delete();
                        }
                    }

                    $formPs1GensetMobileDuaMingguans = FormPs1GensetMobileDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetMobileDuaMingguans->isNotEmpty()) {
                        foreach ($formPs1GensetMobileDuaMingguans as $formPs1GensetMobileDuaMingguan) {
                            $newFormPs1GensetMobileDuaMingguan = $formPs1GensetMobileDuaMingguan->replicate();
                            $newFormPs1GensetMobileDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1GensetMobileDuaMingguan->save();
                            $formPs1GensetMobileDuaMingguan->delete();
                        }
                    }

                    $formPs1GensetMobileTigaBulanans = FormPs1GensetMobileTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetMobileTigaBulanans->isNotEmpty()) {
                        foreach ($formPs1GensetMobileTigaBulanans as $formPs1GensetMobileTigaBulanan) {
                            $newFormPs1GensetMobileTigaBulanan = $formPs1GensetMobileTigaBulanan->replicate();
                            $newFormPs1GensetMobileTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1GensetMobileTigaBulanan->save();
                            $formPs1GensetMobileTigaBulanan->delete();
                        }
                    }

                    $formPs1GensetMobileEnamBulanans = FormPs1GensetMobileEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetMobileEnamBulanans->isNotEmpty()) {
                        foreach ($formPs1GensetMobileEnamBulanans as $formPs1GensetMobileEnamBulanan) {
                            $newFormPs1GensetMobileEnamBulanan = $formPs1GensetMobileEnamBulanan->replicate();
                            $newFormPs1GensetMobileEnamBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1GensetMobileEnamBulanan->save();
                            $formPs1GensetMobileEnamBulanan->delete();
                        }
                    }

                    $formPs1GensetMobileTahunans = FormPs1GensetMobileTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetMobileTahunans->isNotEmpty()) {
                        foreach ($formPs1GensetMobileTahunans as $formPs1GensetMobileTahunan) {
                            $newFormPs1GensetMobileTahunan = $formPs1GensetMobileTahunan->replicate();
                            $newFormPs1GensetMobileTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1GensetMobileTahunan->save();
                            $formPs1GensetMobileTahunan->delete();
                        }
                    }

                    $gensetStandbyGarduTeknikDuaMingguans = GensetStandbyGarduTeknikDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($gensetStandbyGarduTeknikDuaMingguans->isNotEmpty()) {
                        foreach ($gensetStandbyGarduTeknikDuaMingguans as $gensetStandbyGarduTeknikDuaMingguan) {
                            $newGensetStandbyGarduTeknikDuaMingguan = $gensetStandbyGarduTeknikDuaMingguan->replicate();
                            $newGensetStandbyGarduTeknikDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newGensetStandbyGarduTeknikDuaMingguan->save();
                            $gensetStandbyGarduTeknikDuaMingguan->delete();
                        }
                    }

                    $gensetStandbyGarduTeknikTigaBulanans = GensetStandbyGarduTeknikTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($gensetStandbyGarduTeknikTigaBulanans->isNotEmpty()) {
                        foreach ($gensetStandbyGarduTeknikTigaBulanans as $gensetStandbyGarduTeknikTigaBulanan) {
                            $newGensetStandbyGarduTeknikTigaBulanan = $gensetStandbyGarduTeknikTigaBulanan->replicate();
                            $newGensetStandbyGarduTeknikTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newGensetStandbyGarduTeknikTigaBulanan->save();
                            $gensetStandbyGarduTeknikTigaBulanan->delete();
                        }
                    }

                    $gensetStandbyGarduTeknikEnamBulanans = GensetStandbyGarduTeknikEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($gensetStandbyGarduTeknikEnamBulanans->isNotEmpty()) {
                        foreach ($gensetStandbyGarduTeknikEnamBulanans as $gensetStandbyGarduTeknikEnamBulanan) {
                            $newGensetStandbyGarduTeknikEnamBulanan = $gensetStandbyGarduTeknikEnamBulanan->replicate();
                            $newGensetStandbyGarduTeknikEnamBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newGensetStandbyGarduTeknikEnamBulanan->save();
                            $gensetStandbyGarduTeknikEnamBulanan->delete();
                        }
                    }

                    $gensetStandbyGarduTeknikTahunans = GensetStandbyGarduTeknikTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($gensetStandbyGarduTeknikTahunans->isNotEmpty()) {
                        foreach ($gensetStandbyGarduTeknikTahunans as $gensetStandbyGarduTeknikTahunan) {
                            $newGensetStandbyGarduTeknikTahunan = $gensetStandbyGarduTeknikTahunan->replicate();
                            $newGensetStandbyGarduTeknikTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $gensetStandbyGarduTeknikTahunan->save();
                            $gensetStandbyGarduTeknikTahunan->delete();
                        }
                    }

                    $formPs1PanelAutomationDuaMingguans = FormPs1PanelAutomationDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelAutomationDuaMingguans->isNotEmpty()) {
                        foreach ($formPs1PanelAutomationDuaMingguans as $formPs1PanelAutomationDuaMingguan) {
                            $newFormPs1PanelAutomationDuaMingguan = $formPs1PanelAutomationDuaMingguan->replicate();
                            $newFormPs1PanelAutomationDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1PanelAutomationDuaMingguan->save();
                            $formPs1PanelAutomationDuaMingguan->delete();
                        }
                    }

                    $formPs1PanelTrDuaMingguans = FormPs1PanelTrDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTrDuaMingguans->isNotEmpty()) {
                        foreach ($formPs1PanelTrDuaMingguans as $formPs1PanelTrDuaMingguan) {
                            $newFormPs1PanelTrDuaMingguan = $formPs1PanelTrDuaMingguan->replicate();
                            $newFormPs1PanelTrDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1PanelTrDuaMingguan->save();
                            $formPs1PanelTrDuaMingguan->delete();
                        }
                    }

                    $formPs1PanelTrEnamBulanans = FormPs1PanelTrEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTrEnamBulanans->isNotEmpty()) {
                        foreach ($formPs1PanelTrEnamBulanans as $formPs1PanelTrEnamBulanan) {
                            $newFormPs1PanelTrEnamBulanan = $formPs1PanelTrEnamBulanan->replicate();
                            $newFormPs1PanelTrEnamBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1PanelTrEnamBulanan->save();
                            $formPs1PanelTrEnamBulanan->delete();
                        }
                    }

                    $formPs1PanelTrTahunans = FormPs1PanelTrTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTrTahunans->isNotEmpty()) {
                        foreach ($formPs1PanelTrTahunans as $formPs1PanelTrTahunan) {
                            $newFormPs1PanelTrTahunan = $formPs1PanelTrTahunan->replicate();
                            $newFormPs1PanelTrTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1PanelTrTahunan->save();
                            $formPs1PanelTrTahunan->delete();
                        }
                    }

                    $formPs1PanelTrAuxDuaMingguans = FormPs1PanelTrAuxDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTrAuxDuaMingguans->isNotEmpty()) {
                        foreach ($formPs1PanelTrAuxDuaMingguans as $formPs1PanelTrAuxDuaMingguan) {
                            $newFormPs1PanelTrAuxDuaMingguan = $formPs1PanelTrAuxDuaMingguan->replicate();
                            $newFormPs1PanelTrAuxDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1PanelTrAuxDuaMingguan->save();
                            $formPs1PanelTrAuxDuaMingguan->delete();
                        }
                    }

                    $formPs1PanelTrAuxEnamBulanans = FormPs1PanelTrAuxEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTrAuxEnamBulanans->isNotEmpty()) {
                        foreach ($formPs1PanelTrAuxEnamBulanans as $formPs1PanelTrAuxEnamBulanan) {
                            $newFormPs1PanelTrAuxEnamBulanan = $formPs1PanelTrAuxEnamBulanan->replicate();
                            $newFormPs1PanelTrAuxEnamBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1PanelTrAuxEnamBulanan->save();
                            $formPs1PanelTrAuxEnamBulanan->delete();
                        }
                    }

                    $formPs1PanelTrAuxTahunans = FormPs1PanelTrAuxTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTrAuxTahunans->isNotEmpty()) {
                        foreach ($formPs1PanelTrAuxTahunans as $formPs1PanelTrAuxTahunan) {
                            $newFormPs1PanelTrAuxTahunan = $formPs1PanelTrAuxTahunan->replicate();
                            $newFormPs1PanelTrAuxTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1PanelTrAuxTahunan->save();
                            $formPs1PanelTrAuxTahunan->delete();
                        }
                    }

                    $formPs1PanelTmTahunans = FormPs1PanelTmTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTmTahunans->isNotEmpty()) {
                        foreach ($formPs1PanelTmTahunans as $formPs1PanelTmTahunan) {
                            $newFormPs1PanelTmTahunan = $formPs1PanelTmTahunan->replicate();
                            $newFormPs1PanelTmTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1PanelTmTahunan->save();
                            $formPs1PanelTmTahunan->delete();
                        }
                    }

                    $formPs1TrafoDuaMingguans = FormPs1TrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1TrafoDuaMingguans->isNotEmpty()) {
                        foreach ($formPs1TrafoDuaMingguans as $formPs1TrafoDuaMingguan) {
                            $newFormPs1TrafoDuaMingguan = $formPs1TrafoDuaMingguan->replicate();
                            $newFormPs1TrafoDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1TrafoDuaMingguan->save();
                            $formPs1TrafoDuaMingguan->delete();
                        }
                    }

                    $formPs1PanelMvTahunans = FormPs1PanelMvTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelMvTahunans->isNotEmpty()) {
                        foreach ($formPs1PanelMvTahunans as $formPs1PanelMvTahunan) {
                            $newFormPs1PanelMvTahunan = $formPs1PanelMvTahunan->replicate();
                            $newFormPs1PanelMvTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1PanelMvTahunan->save();
                            $formPs1PanelMvTahunan->delete();
                        }
                    }

                    $formPs1PanelTmDuaMingguans = FormPs1PanelTmDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTmDuaMingguans->isNotEmpty()) {
                        foreach ($formPs1PanelTmDuaMingguans as $formPs1PanelTmDuaMingguan) {
                            $newFormPs1PanelTmDuaMingguan = $formPs1PanelTmDuaMingguan->replicate();
                            $newFormPs1PanelTmDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1PanelTmDuaMingguan->save();
                            $formPs1PanelTmDuaMingguan->delete();
                        }
                    }

                    $formPs1PanelTmEnamBulanans = FormPs1PanelTmEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTmEnamBulanans->isNotEmpty()) {
                        foreach ($formPs1PanelTmEnamBulanans as $formPs1PanelTmEnamBulanan) {
                            $newFormPs1PanelTmEnamBulanan = $formPs1PanelTmEnamBulanan->replicate();
                            $newFormPs1PanelTmEnamBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs1PanelTmEnamBulanan->save();
                            $formPs1PanelTmEnamBulanan->delete();
                        }
                    }

                    //  ----------------------------
                    //  --- PS3 ---
                    $formPs3GensetRoomHarians = FormPs3GensetRoomHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs3GensetRoomHarians->isNotEmpty()) {
                        foreach ($formPs3GensetRoomHarians as $formPs3GensetRoomHarian) {
                            $newformPs3GensetRoomHarian = $formPs3GensetRoomHarian->replicate();
                            $newformPs3GensetRoomHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformPs3GensetRoomHarian->save();
                            $formPs3GensetRoomHarian->delete();
                        }
                    }

                    $formPs3PanelHarians = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3PanelHarians->isNotEmpty()) {
                        foreach ($formPs3PanelHarians as $formPs3PanelHarian) {
                            $newFormPs3PanelHarian = $formPs3PanelHarian->replicate();
                            $newFormPs3PanelHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs3PanelHarian->save();
                            $formPs3PanelHarian->delete();
                        }
                    }


                    $formPs3PanelSdpDuaMingguans = FormPs3PanelSdpDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3PanelSdpDuaMingguans->isNotEmpty()) {
                        foreach ($formPs3PanelSdpDuaMingguans as $formPs3PanelSdpDuaMingguan) {
                            $newFormPs3PanelSdpDuaMingguan = $formPs3PanelSdpDuaMingguan->replicate();
                            $newFormPs3PanelSdpDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs3PanelSdpDuaMingguan->save();
                            $formPs3PanelSdpDuaMingguan->delete();
                        }
                    }

                    $formPs3RuangTenagaTeganganDuaMingguans = FormPs3RuangTenagaTeganganDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3RuangTenagaTeganganDuaMingguans->isNotEmpty()) {
                        foreach ($formPs3RuangTenagaTeganganDuaMingguans as $formPs3RuangTenagaTeganganDuaMingguan) {
                            $newFormPs3RuangTenagaTeganganDuaMingguan = $formPs3RuangTenagaTeganganDuaMingguan->replicate();
                            $newFormPs3RuangTenagaTeganganDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs3RuangTenagaTeganganDuaMingguan->save();
                            $formPs3RuangTenagaTeganganDuaMingguan->delete();
                        }
                    }

                    $formPs3GensetDuaMingguans = FormPs3GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3GensetDuaMingguans->isNotEmpty()) {
                        foreach ($formPs3GensetDuaMingguans as $formPs3GensetDuaMingguan) {
                            $newFormPs3GensetDuaMingguan = $formPs3GensetDuaMingguan->replicate();
                            $newFormPs3GensetDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs3GensetDuaMingguan->save();
                            $formPs3GensetDuaMingguan->delete();
                        }
                    }

                    $formPs3GensetTigaBulanans = FormPs3GensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3GensetTigaBulanans->isNotEmpty()) {
                        foreach ($formPs3GensetTigaBulanans as $formPs3GensetTigaBulanan) {
                            $newFormPs3GensetTigaBulanan = $formPs3GensetTigaBulanan->replicate();
                            $newFormPs3GensetTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs3GensetTigaBulanan->save();
                            $formPs3GensetTigaBulanan->delete();
                        }
                    }

                    $formPs3TrafoTigaBulanans = FormPs3TrafoTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3TrafoTigaBulanans->isNotEmpty()) {
                        foreach ($formPs3TrafoTigaBulanans as $formPs3TrafoTigaBulanan) {
                            $newFormPs3TrafoTigaBulanan = $formPs3TrafoTigaBulanan->replicate();
                            $newFormPs3TrafoTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs3TrafoTigaBulanan->save();
                            $formPs3TrafoTigaBulanan->delete();
                        }
                    }

                    $formPs3TrafoEnamBulananTahunans = FormPs3TrafoEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3TrafoEnamBulananTahunans->isNotEmpty()) {
                        foreach ($formPs3TrafoEnamBulananTahunans as $formPs3TrafoEnamBulananTahunan) {
                            $newFormPs3TrafoEnamBulananTahunan = $formPs3TrafoEnamBulananTahunan->replicate();
                            $newFormPs3TrafoEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs3TrafoEnamBulananTahunan->save();
                            $formPs3TrafoEnamBulananTahunan->delete();
                        }
                    }

                    $formPs3GensetEnamBulananTahunans = FormPs3GensetEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3GensetEnamBulananTahunans->isNotEmpty()) {
                        foreach ($formPs3GensetEnamBulananTahunans as $formPs3GensetEnamBulananTahunan) {
                            $newFormPs3GensetEnamBulananTahunan = $formPs3GensetEnamBulananTahunan->replicate();
                            $newFormPs3GensetEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs3GensetEnamBulananTahunan->save();
                            $formPs3GensetEnamBulananTahunan->delete();
                        }
                    }

                    $FormPs3LvmdpACheckEnamBulananTahunans = FormPs3LvmdpACheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($FormPs3LvmdpACheckEnamBulananTahunans->isNotEmpty()) {
                        foreach ($FormPs3LvmdpACheckEnamBulananTahunans as $FormPs3LvmdpACheckEnamBulananTahunan) {
                            $newFormPs3LvmdpACheckEnamBulananTahunan = $FormPs3LvmdpACheckEnamBulananTahunan->replicate();
                            $newFormPs3LvmdpACheckEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs3LvmdpACheckEnamBulananTahunan->save();
                            $FormPs3LvmdpACheckEnamBulananTahunan->delete();
                        }
                    }

                    $formPs3LvmdpBCheckEnamBulananTahunans = FormPs3LvmdpBCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3LvmdpBCheckEnamBulananTahunans->isNotEmpty()) {
                        foreach ($formPs3LvmdpBCheckEnamBulananTahunans as $formPs3LvmdpBCheckEnamBulananTahunan) {
                            $newFormPs3LvmdpBCheckEnamBulananTahunan = $formPs3LvmdpBCheckEnamBulananTahunan->replicate();
                            $newFormPs3LvmdpBCheckEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs3LvmdpBCheckEnamBulananTahunan->save();
                            $formPs3LvmdpBCheckEnamBulananTahunan->delete();
                        }
                    }

                    $formPs3GensetCheckEnamBulananTahunans = FormPs3GensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3GensetCheckEnamBulananTahunans->isNotEmpty()) {
                        foreach ($formPs3GensetCheckEnamBulananTahunans as $formPs3GensetCheckEnamBulananTahunan) {
                            $newFormPs3GensetCheckEnamBulananTahunan = $formPs3GensetCheckEnamBulananTahunan->replicate();
                            $newFormPs3GensetCheckEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs3GensetCheckEnamBulananTahunan->save();
                            $formPs3GensetCheckEnamBulananTahunan->delete();
                        }
                    }

                    $formPs3PanelMvEnamBulananTahunans = FormPs3PanelMvEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3PanelMvEnamBulananTahunans->isNotEmpty()) {
                        foreach ($formPs3PanelMvEnamBulananTahunans as $formPs3PanelMvEnamBulananTahunan) {
                            $newFormPs3PanelMvEnamBulananTahunan = $formPs3PanelMvEnamBulananTahunan->replicate();
                            $newFormPs3PanelMvEnamBulananTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormPs3PanelMvEnamBulananTahunan->save();
                            $formPs3PanelMvEnamBulananTahunan->delete();
                        }
                    }

                    //  ----------------------------
                    //  --- APM ---
                    $formApmVehicleCarBodyHarians = FormApmVehicleCarBodyHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmVehicleCarBodyHarians->isNotEmpty()) {
                        foreach ($formApmVehicleCarBodyHarians as $formApmVehicleCarBodyHarian) {
                            $newFormApmVehicleCarBodyHarian = $formApmVehicleCarBodyHarian->replicate();
                            $newFormApmVehicleCarBodyHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmVehicleCarBodyHarian->save();
                            $formApmVehicleCarBodyHarian->delete();
                        }
                    }

                    $formApmVehicleAirBrakeSystemHarians = FormApmVehicleAirBrakeSystemHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmVehicleAirBrakeSystemHarians->isNotEmpty()) {
                        foreach ($formApmVehicleAirBrakeSystemHarians as $formApmVehicleAirBrakeSystemHarian) {
                            $newFormApmVehicleAirBrakeSystemHarian = $formApmVehicleAirBrakeSystemHarian->replicate();
                            $newFormApmVehicleAirBrakeSystemHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmVehicleAirBrakeSystemHarian->save();
                            $formApmVehicleAirBrakeSystemHarian->delete();
                        }
                    }

                    $formApmMekanikalVehicleBogieHarians = FormApmMekanikalVehicleBogieHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmMekanikalVehicleBogieHarians->isNotEmpty()) {
                        foreach ($formApmMekanikalVehicleBogieHarians as $formApmMekanikalVehicleBogieHarian) {
                            $newFormApmMekanikalVehicleBogieHarian = $formApmMekanikalVehicleBogieHarian->replicate();
                            $newFormApmMekanikalVehicleBogieHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmMekanikalVehicleBogieHarian->save();
                            $formApmMekanikalVehicleBogieHarian->delete();
                        }
                    }

                    $formApmMekanikalVehicleBogieTigaBulanans = FormApmMekanikalVehicleBogieTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmMekanikalVehicleBogieTigaBulanans->isNotEmpty()) {
                        foreach ($formApmMekanikalVehicleBogieTigaBulanans as $formApmMekanikalVehicleBogieTigaBulanan) {
                            $newFormApmMekanikalVehicleBogieTigaBulanan = $formApmMekanikalVehicleBogieTigaBulanan->replicate();
                            $newFormApmMekanikalVehicleBogieTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmMekanikalVehicleBogieTigaBulanan->save();
                            $formApmMekanikalVehicleBogieTigaBulanan->delete();
                        }
                    }
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanans = FormApmMekanikalVehicleAirBrakeSystemTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans->isNotEmpty()) {
                        foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $formApmMekanikalVehicleAirBrakeSystemTigaBulanan) {
                            $newFormApmMekanikalVehicleAirBrakeSystemTigaBulanan = $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->replicate();
                            $newFormApmMekanikalVehicleAirBrakeSystemTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmMekanikalVehicleAirBrakeSystemTigaBulanan->save();
                            $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->delete();
                        }
                    }
                    $formApmMekanikalVehicleCarbodyTigaBulanans = FormApmMekanikalVehicleCarbodyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmMekanikalVehicleCarbodyTigaBulanans->isNotEmpty()) {
                        foreach ($formApmMekanikalVehicleCarbodyTigaBulanans as $formApmMekanikalVehicleCarbodyTigaBulanan) {
                            $newFormApmMekanikalVehicleCarbodyTigaBulanan = $formApmMekanikalVehicleCarbodyTigaBulanan->replicate();
                            $newFormApmMekanikalVehicleCarbodyTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmMekanikalVehicleCarbodyTigaBulanan->save();
                            $formApmMekanikalVehicleCarbodyTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorHarians = FormApmElektrikalVehicleExteriorHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorHarians->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorHarians as $formApmElektrikalVehicleExteriorHarian) {
                            $newFormApmElektrikalVehicleExteriorMingguan = $formApmElektrikalVehicleExteriorHarian->replicate();
                            $newFormApmElektrikalVehicleExteriorMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorMingguan->save();
                            $formApmElektrikalVehicleExteriorHarian->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorMingguans = FormApmElektrikalVehicleExteriorMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorMingguans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorMingguans as $formApmElektrikalVehicleExteriorMingguan) {
                            $newFormApmElektrikalVehicleExteriorMingguan = $formApmElektrikalVehicleExteriorMingguan->replicate();
                            $newFormApmElektrikalVehicleExteriorMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorMingguan->save();
                            $formApmElektrikalVehicleExteriorMingguan->delete();
                        }
                    }
                    $formApmElektrikalVehicleInteriorHarians = FormApmElektrikalVehicleInteriorHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleInteriorHarians->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleInteriorHarians as $formApmElektrikalVehicleInteriorHarian) {
                            $newFormApmElektrikalVehicleInteriorHarian = $formApmElektrikalVehicleInteriorHarian->replicate();
                            $newFormApmElektrikalVehicleInteriorHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleInteriorHarian->save();
                            $formApmElektrikalVehicleInteriorHarian->delete();
                        }
                    }
                    $formApmElektrikalVehicleInteriorGDTigaBulanans = FormApmElektrikalVehicleInteriorGDTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleInteriorGDTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleInteriorGDTigaBulanans as $formApmElektrikalVehicleInteriorGDTigaBulanan) {
                            $newFormApmElektrikalVehicleInteriorGDTigaBulanan = $formApmElektrikalVehicleInteriorGDTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleInteriorGDTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleInteriorGDTigaBulanan->save();
                            $formApmElektrikalVehicleInteriorGDTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleInteriorMCTigaBulanans = FormApmElektrikalVehicleInteriorMCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleInteriorMCTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleInteriorMCTigaBulanans as $formApmElektrikalVehicleInteriorMCTigaBulanan) {
                            $newFormApmElektrikalVehicleInteriorMCTigaBulanan = $formApmElektrikalVehicleInteriorMCTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleInteriorMCTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleInteriorMCTigaBulanan->save();
                            $formApmElektrikalVehicleInteriorMCTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleInteriorTCMSTigaBulanans = FormApmElektrikalVehicleInteriorTCMSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleInteriorTCMSTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleInteriorTCMSTigaBulanans as $formApmElektrikalVehicleInteriorTCMSTigaBulanan) {
                            $newFormApmElektrikalVehicleInteriorTCMSTigaBulanan = $formApmElektrikalVehicleInteriorTCMSTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleInteriorTCMSTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleInteriorTCMSTigaBulanan->save();
                            $formApmElektrikalVehicleInteriorTCMSTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleInteriorLPLTigaBulanans = FormApmElektrikalVehicleInteriorLPLTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleInteriorLPLTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleInteriorLPLTigaBulanans as $formApmElektrikalVehicleInteriorLPLTigaBulanan) {
                            $newFormApmElektrikalVehicleInteriorLPLTigaBulanan = $formApmElektrikalVehicleInteriorLPLTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleInteriorLPLTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleInteriorLPLTigaBulanan->save();
                            $formApmElektrikalVehicleInteriorLPLTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleInteriorFDSTigaBulanans = FormApmElektrikalVehicleInteriorFDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleInteriorFDSTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleInteriorFDSTigaBulanans as $formApmElektrikalVehicleInteriorFDSTigaBulanan) {
                            $newFormApmElektrikalVehicleInteriorFDSTigaBulanan = $formApmElektrikalVehicleInteriorFDSTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleInteriorFDSTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleInteriorFDSTigaBulanan->save();
                            $formApmElektrikalVehicleInteriorFDSTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorBECTigaBulanans = FormApmElektrikalVehicleExteriorBECTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorBECTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorBECTigaBulanans as $formApmElektrikalVehicleExteriorBECTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorBECTigaBulanan = $formApmElektrikalVehicleExteriorBECTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorBECTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorBECTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorBECTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorDCTigaBulanans = FormApmElektrikalVehicleExteriorDCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorDCTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorDCTigaBulanans as $formApmElektrikalVehicleExteriorDCTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorDCTigaBulanan = $formApmElektrikalVehicleExteriorDCTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorDCTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorDCTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorDCTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorBATTigaBulanans = FormApmElektrikalVehicleExteriorBATTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorBATTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorBATTigaBulanans as $formApmElektrikalVehicleExteriorBATTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorBATTigaBulanan = $formApmElektrikalVehicleExteriorBATTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorBATTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorBATTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorBATTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorBAThasilTigaBulanans = FormApmElektrikalVehicleExteriorBAThasilTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorBAThasilTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorBAThasilTigaBulanans as $formApmElektrikalVehicleExteriorBAThasilTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorBAThasilTigaBulanan = $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorBAThasilTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorBAThasilTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorBAThasilTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorESKTigaBulanans = FormApmElektrikalVehicleExteriorESKTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorESKTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorESKTigaBulanans as $formApmElektrikalVehicleExteriorESKTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorESKTigaBulanan = $formApmElektrikalVehicleExteriorESKTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorESKTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorESKTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorESKTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorHSCBTigaBulanans = FormApmElektrikalVehicleExteriorHSCBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorHSCBTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorHSCBTigaBulanans as $formApmElektrikalVehicleExteriorHSCBTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorHSCBTigaBulanan = $formApmElektrikalVehicleExteriorHSCBTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorHSCBTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorHSCBTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorHSCBTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorLJBTigaBulanans = FormApmElektrikalVehicleExteriorLJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorLJBTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorLJBTigaBulanans as $formApmElektrikalVehicleExteriorLJBTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorLJBTigaBulanan = $formApmElektrikalVehicleExteriorLJBTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorLJBTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorLJBTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorLJBTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorHJBTigaBulanans = FormApmElektrikalVehicleExteriorHJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorHJBTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorHJBTigaBulanans as $formApmElektrikalVehicleExteriorHJBTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorHJBTigaBulanan = $formApmElektrikalVehicleExteriorHJBTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorHJBTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorHJBTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorHJBTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorFJBTigaBulanans = FormApmElektrikalVehicleExteriorFJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorFJBTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorFJBTigaBulanans as $formApmElektrikalVehicleExteriorFJBTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorFJBTigaBulanan = $formApmElektrikalVehicleExteriorFJBTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorFJBTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorFJBTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorFJBTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorPCSTigaBulanans = FormApmElektrikalVehicleExteriorPCSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorPCSTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorPCSTigaBulanans as $formApmElektrikalVehicleExteriorPCSTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorPCSTigaBulanan = $formApmElektrikalVehicleExteriorPCSTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorPCSTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorPCSTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorPCSTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorLHTTigaBulanans = FormApmElektrikalVehicleExteriorLHTTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorLHTTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorLHTTigaBulanans as $formApmElektrikalVehicleExteriorLHTTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorLHTTigaBulanan = $formApmElektrikalVehicleExteriorLHTTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorLHTTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorLHTTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorLHTTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorTMTigaBulanans = FormApmElektrikalVehicleExteriorTMTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorTMTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorTMTigaBulanans as $formApmElektrikalVehicleExteriorTMTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorTMTigaBulanan = $formApmElektrikalVehicleExteriorTMTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorTMTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorTMTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorTMTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorEHTigaBulanans = FormApmElektrikalVehicleExteriorEHTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorEHTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorEHTigaBulanans as $formApmElektrikalVehicleExteriorEHTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorEHTigaBulanan = $formApmElektrikalVehicleExteriorEHTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorEHTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorEHTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorEHTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorVACTigaBulanans = FormApmElektrikalVehicleExteriorVACTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorVACTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorVACTigaBulanans as $formApmElektrikalVehicleExteriorVACTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorVACTigaBulanan = $formApmElektrikalVehicleExteriorVACTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorVACTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorVACTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorVACTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorSIVTigaBulanans = FormApmElektrikalVehicleExteriorSIVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorSIVTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorSIVTigaBulanans as $formApmElektrikalVehicleExteriorSIVTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorSIVTigaBulanan = $formApmElektrikalVehicleExteriorSIVTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorSIVTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorSIVTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorSIVTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorJPTigaBulanans = FormApmElektrikalVehicleExteriorJPTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorJPTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorJPTigaBulanans as $formApmElektrikalVehicleExteriorJPTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorJPTigaBulanan = $formApmElektrikalVehicleExteriorJPTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorJPTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorJPTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorJPTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorMDSTigaBulanans = FormApmElektrikalVehicleExteriorMDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorMDSTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorMDSTigaBulanans as $formApmElektrikalVehicleExteriorMDSTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorMDSTigaBulanan = $formApmElektrikalVehicleExteriorMDSTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorMDSTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorMDSTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorMDSTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorVVTigaBulanans = FormApmElektrikalVehicleExteriorVVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorVVTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorVVTigaBulanans as $formApmElektrikalVehicleExteriorVVTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorVVTigaBulanan = $formApmElektrikalVehicleExteriorVVTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorVVTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorVVTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorVVTigaBulanan->delete();
                        }
                    }
                    $formApmElektrikalVehicleExteriorPCTigaBulanans = FormApmElektrikalVehicleExteriorPCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorPCTigaBulanans->isNotEmpty()) {
                        foreach ($formApmElektrikalVehicleExteriorPCTigaBulanans as $formApmElektrikalVehicleExteriorPCTigaBulanan) {
                            $newFormApmElektrikalVehicleExteriorPCTigaBulanan = $formApmElektrikalVehicleExteriorPCTigaBulanan->replicate();
                            $newFormApmElektrikalVehicleExteriorPCTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmElektrikalVehicleExteriorPCTigaBulanan->save();
                            $formApmElektrikalVehicleExteriorPCTigaBulanan->delete();
                        }
                    }


                    $formApmMekanikalVehicleMingguans = FormApmMekanikalVehicleMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmMekanikalVehicleMingguans->isNotEmpty()) {
                        foreach ($formApmMekanikalVehicleMingguans as $formApmMekanikalVehicleMingguan) {
                            $newFormApmMekanikalVehicleMingguan = $formApmMekanikalVehicleMingguan->replicate();
                            $newFormApmMekanikalVehicleMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormApmMekanikalVehicleMingguan->save();
                            $formApmMekanikalVehicleMingguan->delete();
                        }
                    }

                    //  ----------------------------
                    //  --- ELP (Electrical Protection)  ---

                    $formElpDailyEr2as = FormElpDailyEr2a::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpDailyEr2as->isNotEmpty()) {
                        foreach ($formElpDailyEr2as as $formElpDailyEr2a) {
                            $newFormElpDailyEr2a = $formElpDailyEr2a->replicate();
                            $newFormElpDailyEr2a->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormElpDailyEr2a->save();
                            $formElpDailyEr2a->delete();
                        }
                    }

                    $formElpDailyEr2bs = FormElpDailyEr2b::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpDailyEr2bs->isNotEmpty()) {
                        foreach ($formElpDailyEr2bs as $formElpDailyEr2b) {
                            $newFormElpDailyEr2b = $formElpDailyEr2b->replicate();
                            $newFormElpDailyEr2b->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormElpDailyEr2b->save();
                            $formElpDailyEr2b->delete();
                        }
                    }

                    $formElpDailyGhs = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpDailyGhs->isNotEmpty()) {
                        foreach ($formElpDailyGhs as $formElpDailyGh) {
                            $newFormElpDailyGh = $formElpDailyGh->replicate();
                            $newFormElpDailyGh->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormElpDailyGh->save();
                            $formElpDailyGh->delete();
                        }
                    }

                    $formElpNetworkScadaRcmsDailies = FormElpNetworkScadaRcmsDaily::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpNetworkScadaRcmsDailies->isNotEmpty()) {
                        foreach ($formElpNetworkScadaRcmsDailies as $formElpNetworkScadaRcmsDaily) {
                            $newFormElpNetworkScadaRcmsDaily = $formElpNetworkScadaRcmsDaily->replicate();
                            $newFormElpNetworkScadaRcmsDaily->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormElpNetworkScadaRcmsDaily->save();
                            $formElpNetworkScadaRcmsDaily->delete();
                        }
                    }

                    $formElpMeteringDuaMingguans = FormElpMeteringDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpMeteringDuaMingguans->isNotEmpty()) {
                        foreach ($formElpMeteringDuaMingguans as $formElpMeteringDuaMingguan) {
                            $newformElpMeteringDuaMingguan = $formElpMeteringDuaMingguan->replicate();
                            $newformElpMeteringDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformElpMeteringDuaMingguan->save();
                            $formElpMeteringDuaMingguan->delete();
                        }
                    }

                    $formElpTrafoDuaMingguans = FormElpTrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpTrafoDuaMingguans->isNotEmpty()) {
                        foreach ($formElpTrafoDuaMingguans as $formElpTrafoDuaMingguan) {
                            $newformElpTrafoDuaMingguan = $formElpTrafoDuaMingguan->replicate();
                            $newformElpTrafoDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformElpTrafoDuaMingguan->save();
                            $formElpTrafoDuaMingguan->delete();
                        }
                    }

                    $formElpRelayDuaMingguans = FormElpRelayDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpRelayDuaMingguans->isNotEmpty()) {
                        foreach ($formElpRelayDuaMingguans as $formElpRelayDuaMingguan) {
                            $newFormElpRelayDuaMingguan = $formElpRelayDuaMingguan->replicate();
                            $newFormElpRelayDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormElpRelayDuaMingguan->save();
                            $formElpRelayDuaMingguan->delete();
                        }
                    }

                    $formElpPlcDuaMingguans = FormElpPlcDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpPlcDuaMingguans->isNotEmpty()) {
                        foreach ($formElpPlcDuaMingguans as $formElpPlcDuaMingguan) {
                            $newFormElpPlcDuaMingguans = $formElpPlcDuaMingguan->replicate();
                            $newFormElpPlcDuaMingguans->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormElpPlcDuaMingguans->save();
                            $formElpPlcDuaMingguan->delete();
                        }
                    }

                    $formElpFinalCheckTahunans = FormElpFinalCheckTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpFinalCheckTahunans->isNotEmpty()) {
                        foreach ($formElpFinalCheckTahunans as $formElpFinalCheckTahunan) {
                            $newFormElpFinalCheckTahunan = $formElpFinalCheckTahunan->replicate();
                            $newFormElpFinalCheckTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormElpFinalCheckTahunan->save();
                            $formElpFinalCheckTahunan->delete();
                        }
                    }

                    $formElpPartlyEnamBulanans = FormElpPartlyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpPartlyEnamBulanans->isNotEmpty()) {
                        foreach ($formElpPartlyEnamBulanans as $formElpPartlyEnamBulanan) {
                            $newFormElpPartlyEnamBulanan = $formElpPartlyEnamBulanan->replicate();
                            $newFormElpPartlyEnamBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newFormElpPartlyEnamBulanan->save();
                            $formElpPartlyEnamBulanan->delete();
                        }
                    }

                    //(HAS ONE FOR ELP)
                    if ($formElpTahunan = FormElpTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormElpTahunan = $formElpTahunan->replicate();
                        $newFormElpTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormElpTahunan->save();
                        $formElpTahunan->delete();
                    }

                    //  ----------------------------
                    //  --- HMV ---
                    if ($formHmvGisBulanan = FormHmvGisBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormHmvGisBulanan = $formHmvGisBulanan->replicate();
                        $newFormHmvGisBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormHmvGisBulanan->save();
                        $formHmvGisBulanan->delete();
                    }

                    $formHmvGisAHarians = FormHmvGisAHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvGisAHarians->isNotEmpty()) {
                        foreach ($formHmvGisAHarians as $formHmvGisAHarian) {
                            $newformHmvGisAHarian = $formHmvGisAHarian->replicate();
                            $newformHmvGisAHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvGisAHarian->save();
                            $formHmvGisAHarian->delete();
                        }
                    }

                    $formHmvGisBHarians = FormHmvGisBHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvGisBHarians->isNotEmpty()) {
                        foreach ($formHmvGisBHarians as $formHmvGisBHarian) {
                            $newformHmvGisBHarian = $formHmvGisBHarian->replicate();
                            $newformHmvGisBHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvGisBHarian->save();
                            $formHmvGisBHarian->delete();
                        }
                    }

                    $formHmvGisCHarians = FormHmvGisCHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvGisCHarians->isNotEmpty()) {
                        foreach ($formHmvGisCHarians as $formHmvGisCHarian) {
                            $newformHmvGisCHarian = $formHmvGisCHarian->replicate();
                            $newformHmvGisCHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvGisCHarian->save();
                            $formHmvGisCHarian->delete();
                        }
                    }

                    $formHmvGisTigaBulanans = FormHmvGisTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvGisTigaBulanans->isNotEmpty()) {
                        foreach ($formHmvGisTigaBulanans as $formHmvGisTigaBulanan) {
                            $newformHmvGisTigaBulanan = $formHmvGisTigaBulanan->replicate();
                            $newformHmvGisTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvGisTigaBulanan->save();
                            $formHmvGisTigaBulanan->delete();
                        }
                    }

                    $formHmvGisTahunans = FormHmvGisTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvGisTahunans->isNotEmpty()) {
                        foreach ($formHmvGisTahunans as $formHmvGisTahunan) {
                            $newformHmvGisTahunan = $formHmvGisTahunan->replicate();
                            $newformHmvGisTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvGisTahunan->save();
                            $formHmvGisTahunan->delete();
                        }
                    }

                    $formHmvGisDuaTahunans = FormHmvGisDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvGisDuaTahunans->isNotEmpty()) {
                        foreach ($formHmvGisDuaTahunans as $formHmvGisDuaTahunan) {
                            $newformHmvGisDuaTahunan = $formHmvGisDuaTahunan->replicate();
                            $newformHmvGisDuaTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvGisDuaTahunan->save();
                            $formHmvGisDuaTahunan->delete();
                        }
                    }

                    $formHmvGisKondisionals = FormHmvGisKondisional::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvGisKondisionals->isNotEmpty()) {
                        foreach ($formHmvGisKondisionals as $formHmvGisKondisional) {
                            $newformHmvGisKondisional = $formHmvGisKondisional->replicate();
                            $newformHmvGisKondisional->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvGisKondisional->save();
                            $formHmvGisKondisional->delete();
                        }
                    }

                    $formHmvMeteranHarians = FormHmvMeteranHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvMeteranHarians->isNotEmpty()) {
                        foreach ($formHmvMeteranHarians as $formHmvMeteranHarian) {
                            $newformHmvMeteranHarian = $formHmvMeteranHarian->replicate();
                            $newformHmvMeteranHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvMeteranHarian->save();
                            $formHmvMeteranHarian->delete();
                        }
                    }

                    $formHmvMeteran2Harians = FormHmvMeteran2Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvMeteran2Harians->isNotEmpty()) {
                        foreach ($formHmvMeteran2Harians as $formHmvMeteran2Harian) {
                            $newformHmvMeteran2Harian = $formHmvMeteran2Harian->replicate();
                            $newformHmvMeteran2Harian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvMeteran2Harian->save();
                            $formHmvMeteran2Harian->delete();
                        }
                    }

                    $formHmvPanelTmHarians = FormHmvPanelTmHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvPanelTmHarians->isNotEmpty()) {
                        foreach ($formHmvPanelTmHarians as $formHmvPanelTmHarian) {
                            $newformHmvPanelTmHarian = $formHmvPanelTmHarian->replicate();
                            $newformHmvPanelTmHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvPanelTmHarian->save();
                            $formHmvPanelTmHarian->delete();
                        }
                    }

                    $formHmvPanelBulanans = FormHmvPanelBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvPanelBulanans->isNotEmpty()) {
                        foreach ($formHmvPanelBulanans as $formHmvPanelBulanan) {
                            $newformHmvPanelBulanan = $formHmvPanelBulanan->replicate();
                            $newformHmvPanelBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvPanelBulanan->save();
                            $formHmvPanelBulanan->delete();
                        }
                    }

                    $formHmvPanelTigaBulanans = FormHmvPanelTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvPanelTigaBulanans->isNotEmpty()) {
                        foreach ($formHmvPanelTigaBulanans as $formHmvPanelTigaBulanan) {
                            $newformHmvPanelTigaBulanan = $formHmvPanelTigaBulanan->replicate();
                            $newformHmvPanelTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvPanelTigaBulanan->save();
                            $formHmvPanelTigaBulanan->delete();
                        }
                    }

                    $formHmvPowerMingguans = FormHmvPowerMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvPowerMingguans->isNotEmpty()) {
                        foreach ($formHmvPowerMingguans as $formHmvPowerMingguan) {
                            $newformHmvPowerMingguan = $formHmvPowerMingguan->replicate();
                            $newformHmvPowerMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvPowerMingguan->save();
                            $formHmvPowerMingguan->delete();
                        }
                    }

                    $formHmvPowerBulanans = FormHmvPowerBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvPowerBulanans->isNotEmpty()) {
                        foreach ($formHmvPowerBulanans as $formHmvPowerBulanan) {
                            $newformHmvPowerBulanan = $formHmvPowerBulanan->replicate();
                            $newformHmvPowerBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvPowerBulanan->save();
                            $formHmvPowerBulanan->delete();
                        }
                    }

                    $formHmvPowerTigaBulanans = FormHmvPowerTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvPowerTigaBulanans->isNotEmpty()) {
                        foreach ($formHmvPowerTigaBulanans as $formHmvPowerTigaBulanan) {
                            $newformHmvPowerTigaBulanan = $formHmvPowerTigaBulanan->replicate();
                            $newformHmvPowerTigaBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvPowerTigaBulanan->save();
                            $formHmvPowerTigaBulanan->delete();
                        }
                    }


                    $formHmvPowerEnamBulanans = FormHmvPowerEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvPowerEnamBulanans->isNotEmpty()) {
                        foreach ($formHmvPowerEnamBulanans as $formHmvPowerEnamBulanan) {
                            $newformHmvPowerEnamBulanan = $formHmvPowerEnamBulanan->replicate();
                            $newformHmvPowerEnamBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvPowerEnamBulanan->save();
                            $formHmvPowerEnamBulanan->delete();
                        }
                    }

                    $formHmvPowerTahunans = FormHmvPowerTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvPowerTahunans->isNotEmpty()) {
                        foreach ($formHmvPowerTahunans as $formHmvPowerTahunan) {
                            $newformHmvPowerTahunan = $formHmvPowerTahunan->replicate();
                            $newformHmvPowerTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvPowerTahunan->save();
                            $formHmvPowerTahunan->delete();
                        }
                    }

                    $formHmvPowerDuaTahunans = FormHmvPowerDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvPowerDuaTahunans->isNotEmpty()) {
                        foreach ($formHmvPowerDuaTahunans as $formHmvPowerDuaTahunan) {
                            $newformHmvPowerDuaTahunan = $formHmvPowerDuaTahunan->replicate();
                            $newformHmvPowerDuaTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvPowerDuaTahunan->save();
                            $formHmvPowerDuaTahunan->delete();
                        }
                    }

                    $formHmvPowerKondisionals = FormHmvPowerKondisional::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formHmvPowerKondisionals->isNotEmpty()) {
                        foreach ($formHmvPowerKondisionals as $formHmvPowerKondisional) {
                            $newformHmvPowerKondisional = $formHmvPowerKondisional->replicate();
                            $newformHmvPowerKondisional->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformHmvPowerKondisional->save();
                            $formHmvPowerKondisional->delete();
                        }
                    }


                    //  ----------------------------
                    //  --- ELE ---
                    $formElePemeliharaanTahunans = FormElePemeliharaanTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formElePemeliharaanTahunans->isNotEmpty()) {
                        foreach ($formElePemeliharaanTahunans as $formElePemeliharaanTahunan) {
                            $newformElePemeliharaanTahunan = $formElePemeliharaanTahunan->replicate();
                            $newformElePemeliharaanTahunan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformElePemeliharaanTahunan->save();
                            $formElePemeliharaanTahunan->delete();
                        }
                    }

                    $formEleChecklist1Harians = FormEleChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formEleChecklist1Harians->isNotEmpty()) {
                        foreach ($formEleChecklist1Harians as $formEleChecklist1Harian) {
                            $newformEleChecklist1Harian = $formEleChecklist1Harian->replicate();
                            $newformEleChecklist1Harian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformEleChecklist1Harian->save();
                            $formEleChecklist1Harian->delete();
                        }
                    }

                    $formEleChecklist2Harians = FormEleChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formEleChecklist2Harians->isNotEmpty()) {
                        foreach ($formEleChecklist2Harians as $formEleChecklist2Harian) {
                            $newformEleChecklist2Harian = $formEleChecklist2Harian->replicate();
                            $newformEleChecklist2Harian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformEleChecklist2Harian->save();
                            $formEleChecklist2Harian->delete();
                        }
                    }

                    if ($formEleSuratIzinPelaksanaanPekerjaanDelete = FormEleSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormEleSuratIzinPelaksanaanPekerjaan = $formEleSuratIzinPelaksanaanPekerjaanDelete->replicate();
                        $newFormEleSuratIzinPelaksanaanPekerjaan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormEleSuratIzinPelaksanaanPekerjaan->save();
                        $formEleSuratIzinPelaksanaanPekerjaanDelete->delete();
                    }


                    if ($FormEleSuratPemeriksaanRutinDelete = FormEleSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormEleSuratPemeriksaanRutin = $FormEleSuratPemeriksaanRutinDelete->replicate();
                        $newFormEleSuratPemeriksaanRutin->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormEleSuratPemeriksaanRutin->save();
                        $FormEleSuratPemeriksaanRutinDelete->delete();
                    }
                    // -----------------------------
                    // SNT
                    $formSntChecklistSewageTreatmentPlantHarians = FormSntChecklistSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSntChecklistSewageTreatmentPlantHarians->isNotEmpty()) {
                        foreach ($formSntChecklistSewageTreatmentPlantHarians as $formSntChecklistSewageTreatmentPlantHarian) {
                            $newformSntChecklistSewageTreatmentPlantHarian = $formSntChecklistSewageTreatmentPlantHarian->replicate();
                            $newformSntChecklistSewageTreatmentPlantHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSntChecklistSewageTreatmentPlantHarian->save();
                            $formSntChecklistSewageTreatmentPlantHarian->delete();
                        }
                    }

                    $formSntPerawatanSewageTreatmentPlantHarians = FormSntPerawatanSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSntPerawatanSewageTreatmentPlantHarians->isNotEmpty()) {
                        foreach ($formSntPerawatanSewageTreatmentPlantHarians as $formSntPerawatanSewageTreatmentPlantHarian) {
                            $newformSntPerawatanSewageTreatmentPlantHarian = $formSntPerawatanSewageTreatmentPlantHarian->replicate();
                            $newformSntPerawatanSewageTreatmentPlantHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSntPerawatanSewageTreatmentPlantHarian->save();
                            $formSntPerawatanSewageTreatmentPlantHarian->delete();
                        }
                    }

                    $formSntChecklistDelacerationHarians = FormSntChecklistDelacerationHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSntChecklistDelacerationHarians->isNotEmpty()) {
                        foreach ($formSntChecklistDelacerationHarians as $formSntChecklistDelacerationHarian) {
                            $newformSntChecklistDelacerationHarian = $formSntChecklistDelacerationHarian->replicate();
                            $newformSntChecklistDelacerationHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSntChecklistDelacerationHarian->save();
                            $formSntChecklistDelacerationHarian->delete();
                        }
                    }

                    $formSntChecklistLiftingPumps = FormSntChecklistLiftingPump::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSntChecklistLiftingPumps->isNotEmpty()) {
                        foreach ($formSntChecklistLiftingPumps as $formSntChecklistLiftingPump) {
                            $newformSntChecklistLiftingPump = $formSntChecklistLiftingPump->replicate();
                            $newformSntChecklistLiftingPump->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSntChecklistLiftingPump->save();
                            $formSntChecklistLiftingPump->delete();
                        }
                    }

                    $formSntChecklistLiftingPumpHarians = FormSntChecklistLiftingPumpHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSntChecklistLiftingPumpHarians->isNotEmpty()) {
                        foreach ($formSntChecklistLiftingPumpHarians as $formSntChecklistLiftingPumpHarian) {
                            $newformSntChecklistLiftingPumpHarian = $formSntChecklistLiftingPumpHarian->replicate();
                            $newformSntChecklistLiftingPumpHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSntChecklistLiftingPumpHarian->save();
                            $formSntChecklistLiftingPumpHarian->delete();
                        }
                    }

                    $formSntPerawatanT3VIPs = FormSntPerawatanT3VIP::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSntPerawatanT3VIPs->isNotEmpty()) {
                        foreach ($formSntPerawatanT3VIPs as $formSntPerawatanT3VIP) {
                            $newformSntPerawatanT3VIP = $formSntPerawatanT3VIP->replicate();
                            $newformSntPerawatanT3VIP->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSntPerawatanT3VIP->save();
                            $formSntPerawatanT3VIP->delete();
                        }
                    }

                    $formSntChecklistPerawatanIncinerator123Harians = FormSntChecklistPerawatanIncinerator123Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSntChecklistPerawatanIncinerator123Harians->isNotEmpty()) {
                        foreach ($formSntChecklistPerawatanIncinerator123Harians as $formSntChecklistPerawatanIncinerator123Harian) {
                            $newformSntChecklistPerawatanIncinerator123Harian = $formSntChecklistPerawatanIncinerator123Harian->replicate();
                            $newformSntChecklistPerawatanIncinerator123Harian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSntChecklistPerawatanIncinerator123Harian->save();
                            $formSntChecklistPerawatanIncinerator123Harian->delete();
                        }
                    }

                    $formSntChecklistPerawatanIncinerator567Harians = FormSntChecklistPerawatanIncinerator567Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSntChecklistPerawatanIncinerator567Harians->isNotEmpty()) {
                        foreach ($formSntChecklistPerawatanIncinerator567Harians as $formSntChecklistPerawatanIncinerator567Harian) {
                            $newformSntChecklistPerawatanIncinerator567Harian = $formSntChecklistPerawatanIncinerator567Harian->replicate();
                            $newformSntChecklistPerawatanIncinerator567Harian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSntChecklistPerawatanIncinerator567Harian->save();
                            $formSntChecklistPerawatanIncinerator567Harian->delete();
                        }
                    }

                    $formSntChecklistPerawatanIncinerator123Mingguans = FormSntChecklistPerawatanIncinerator123Mingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSntChecklistPerawatanIncinerator123Mingguans->isNotEmpty()) {
                        foreach ($formSntChecklistPerawatanIncinerator123Mingguans as $formSntChecklistPerawatanIncinerator123Mingguan) {
                            $newformSntChecklistPerawatanIncinerator123Mingguan = $formSntChecklistPerawatanIncinerator123Mingguan->replicate();
                            $newformSntChecklistPerawatanIncinerator123Mingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSntChecklistPerawatanIncinerator123Mingguan->save();
                            $formSntChecklistPerawatanIncinerator123Mingguan->delete();
                        }
                    }

                    $formSntChecklistPerawatanIncinerator456Mingguans = FormSntChecklistPerawatanIncinerator456Mingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSntChecklistPerawatanIncinerator456Mingguans->isNotEmpty()) {
                        foreach ($formSntChecklistPerawatanIncinerator456Mingguans as $formSntChecklistPerawatanIncinerator456Mingguan) {
                            $newformSntChecklistPerawatanIncinerator456Mingguan = $formSntChecklistPerawatanIncinerator456Mingguan->replicate();
                            $newformSntChecklistPerawatanIncinerator456Mingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSntChecklistPerawatanIncinerator456Mingguan->save();
                            $formSntChecklistPerawatanIncinerator456Mingguan->delete();
                        }
                    }
                    $formSntChecklistPerawatanIncinerator123Bulanans = FormSntChecklistPerawatanIncinerator123Bulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSntChecklistPerawatanIncinerator123Bulanans->isNotEmpty()) {
                        foreach ($formSntChecklistPerawatanIncinerator123Bulanans as $formSntChecklistPerawatanIncinerator123Bulanan) {
                            $newformSntChecklistPerawatanIncinerator123Bulanan = $formSntChecklistPerawatanIncinerator123Bulanan->replicate();
                            $newformSntChecklistPerawatanIncinerator123Bulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSntChecklistPerawatanIncinerator123Bulanan->save();
                            $formSntChecklistPerawatanIncinerator123Bulanan->delete();
                        }
                    }

                    $formSntChecklistPerawatanIncinerator456Bulanans = FormSntChecklistPerawatanIncinerator456Bulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSntChecklistPerawatanIncinerator456Bulanans->isNotEmpty()) {
                        foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $formSntChecklistPerawatanIncinerator456Bulanan) {
                            $newformSntChecklistPerawatanIncinerator456Bulanan = $formSntChecklistPerawatanIncinerator456Bulanan->replicate();
                            $newformSntChecklistPerawatanIncinerator456Bulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSntChecklistPerawatanIncinerator456Bulanan->save();
                            $formSntChecklistPerawatanIncinerator456Bulanan->delete();
                        }
                    }

                    // -----------------------------
                    // UPS
                    if ($formUpsLaporanHasilKerjaDelete = FormUpsLaporanHasilKerja::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormUpsLaporanHasilKerja = $formUpsLaporanHasilKerjaDelete->replicate();
                        $newFormUpsLaporanHasilKerja->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormUpsLaporanHasilKerja->save();
                        $formUpsLaporanHasilKerjaDelete->delete();
                    }
                    if ($formUpsLaporanHasilKerjaMalamDelete = FormUpsLaporanHasilKerjaMalam::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormUpsLaporanHasilKerjaMalam = $formUpsLaporanHasilKerjaMalamDelete->replicate();
                        $newFormUpsLaporanHasilKerjaMalam->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormUpsLaporanHasilKerjaMalam->save();
                        $formUpsLaporanHasilKerjaMalamDelete->delete();
                    }

                    $formUpsDataUkurLoadBebans = FormUpsDataUkurLoadBeban::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formUpsDataUkurLoadBebans->isNotEmpty()) {
                        foreach ($formUpsDataUkurLoadBebans as $formUpsDataUkurLoadBeban) {
                            $newformUpsDataUkurLoadBeban = $formUpsDataUkurLoadBeban->replicate();
                            $newformUpsDataUkurLoadBeban->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformUpsDataUkurLoadBeban->save();
                            $formUpsDataUkurLoadBeban->delete();
                        }
                    }

                    $formUpsPengukuranTeganganBatterys = FormUpsPengukuranTeganganBattery::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formUpsPengukuranTeganganBatterys->isNotEmpty()) {
                        foreach ($formUpsPengukuranTeganganBatterys as $formUpsPengukuranTeganganBattery) {
                            $newformUpsPengukuranTeganganBattery = $formUpsPengukuranTeganganBattery->replicate();
                            $newformUpsPengukuranTeganganBattery->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformUpsPengukuranTeganganBattery->save();
                            $formUpsPengukuranTeganganBattery->delete();
                        }
                    }
                    $formUpsDokumentasiKegiatanRutins = FormUpsDokumentasiKegiatanRutin::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formUpsDokumentasiKegiatanRutins->isNotEmpty()) {
                        foreach ($formUpsDokumentasiKegiatanRutins as $formUpsDokumentasiKegiatanRutin) {
                            $newformUpsDokumentasiKegiatanRutin = $formUpsDokumentasiKegiatanRutin->replicate();
                            $newformUpsDokumentasiKegiatanRutin->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformUpsDokumentasiKegiatanRutin->save();
                            $formUpsDokumentasiKegiatanRutin->delete();
                        }
                    }
                    $formUpsPengukuranPeralatanDuaMingguans = FormUpsPengukuranPeralatanDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formUpsPengukuranPeralatanDuaMingguans->isNotEmpty()) {
                        foreach ($formUpsPengukuranPeralatanDuaMingguans as $formUpsPengukuranPeralatanDuaMingguan) {
                            $newformUpsPengukuranPeralatanDuaMingguan = $formUpsPengukuranPeralatanDuaMingguan->replicate();
                            $newformUpsPengukuranPeralatanDuaMingguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformUpsPengukuranPeralatanDuaMingguan->save();
                            $formUpsPengukuranPeralatanDuaMingguan->delete();
                        }
                    }
                    $formUpsPengukuranPeralatanEnamBulanans = FormUpsPengukuranPeralatanEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formUpsPengukuranPeralatanEnamBulanans->isNotEmpty()) {
                        foreach ($formUpsPengukuranPeralatanEnamBulanans as $formUpsPengukuranPeralatanEnamBulanan) {
                            $newformUpsPengukuranPeralatanEnamBulanan = $formUpsPengukuranPeralatanEnamBulanan->replicate();
                            $newformUpsPengukuranPeralatanEnamBulanan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformUpsPengukuranPeralatanEnamBulanan->save();
                            $formUpsPengukuranPeralatanEnamBulanan->delete();
                        }
                    }
                    if ($formUpsLaporanKerusakanDanPerbaikanDelete = FormUpsLaporanKerusakanDanPerbaikan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newformUpsLaporanKerusakanDanPerbaikan = $formUpsLaporanKerusakanDanPerbaikanDelete->replicate();
                        $newformUpsLaporanKerusakanDanPerbaikan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newformUpsLaporanKerusakanDanPerbaikan->save();
                        $formUpsLaporanKerusakanDanPerbaikanDelete->delete();
                    }

                    //  ----------------------------
                    // --- NVA ---
                    $formNvaChecklist1Harians = FormNvaChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formNvaChecklist1Harians->isNotEmpty()) {
                        foreach ($formNvaChecklist1Harians as $formNvaChecklist1Harian) {
                            $newformNvaChecklist1Harian = $formNvaChecklist1Harian->replicate();
                            $newformNvaChecklist1Harian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformNvaChecklist1Harian->save();
                            $formNvaChecklist1Harian->delete();
                        }
                    }
                    $formNvaChecklist12arians = FormNvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formNvaChecklist12arians->isNotEmpty()) {
                        foreach ($formNvaChecklist12arians as $formNvaChecklist2Harian) {
                            $newformNvaChecklist2Harian = $formNvaChecklist2Harian->replicate();
                            $newformNvaChecklist2Harian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformNvaChecklist2Harian->save();
                            $formNvaChecklist2Harian->delete();
                        }
                    }
                    if ($formNvaSuratIzinPelaksanaanPekerjaanDelete = FormNvaSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormNvaSuratIzinPelaksanaanPekerjaan = $formNvaSuratIzinPelaksanaanPekerjaanDelete->replicate();
                        $newFormNvaSuratIzinPelaksanaanPekerjaan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormNvaSuratIzinPelaksanaanPekerjaan->save();
                        $formNvaSuratIzinPelaksanaanPekerjaanDelete->delete();
                    }
                    if ($formNvaSuratPemeriksaanRutinDelete = FormNvaSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormNvaSuratPemeriksaanRutin = $formNvaSuratPemeriksaanRutinDelete->replicate();
                        $newFormNvaSuratPemeriksaanRutin->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormNvaSuratPemeriksaanRutin->save();
                        $formNvaSuratPemeriksaanRutinDelete->delete();
                    }
                    if ($formNvaSuratPerbaikanGangguanDelete = FormNvaSuratPerbaikanGangguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormNvaSuratPerbaikanGangguan = $formNvaSuratPerbaikanGangguanDelete->replicate();
                        $newFormNvaSuratPerbaikanGangguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormNvaSuratPerbaikanGangguan->save();
                        $formNvaSuratPerbaikanGangguanDelete->delete();
                    }
                    $formNvaHFCPapiHarians = FormNvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formNvaHFCPapiHarians->isNotEmpty()) {
                        foreach ($formNvaHFCPapiHarians as $formNvaHFCPapiHarian) {
                            $newformNvaHFCPapiHarian = $formNvaHFCPapiHarian->replicate();
                            $newformNvaHFCPapiHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformNvaHFCPapiHarian->save();
                            $formNvaHFCPapiHarian->delete();
                        }
                    }
                    $formNvaConstantCurrentRegulations = FormNvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formNvaConstantCurrentRegulations->isNotEmpty()) {
                        foreach ($formNvaConstantCurrentRegulations as $formNvaConstantCurrentRegulation) {
                            $newformNvaConstantCurrentRegulation = $formNvaConstantCurrentRegulation->replicate();
                            $newformNvaConstantCurrentRegulation->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformNvaConstantCurrentRegulation->save();
                            $formNvaConstantCurrentRegulation->delete();
                        }
                    }
                    $formNvaConstantCurrentRegulationDuas = FormNvaConstantCurrentRegulationDua::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formNvaConstantCurrentRegulationDuas->isNotEmpty()) {
                        foreach ($formNvaConstantCurrentRegulationDuas as $formNvaConstantCurrentRegulationDua) {
                            $newformNvaConstantCurrentRegulationDua = $formNvaConstantCurrentRegulationDua->replicate();
                            $newformNvaConstantCurrentRegulationDua->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformNvaConstantCurrentRegulationDua->save();
                            $formNvaConstantCurrentRegulationDua->delete();
                        }
                    }
                    // if ($formNvaUraianPerbaikanHarianDelete = FormNvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                    //     $formNvaUraianPerbaikanHarian = $formNvaUraianPerbaikanHarianDelete->replicate();
                    //     $formNvaUraianPerbaikanHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                    //     $formNvaUraianPerbaikanHarian->save();
                    //     $formNvaUraianPerbaikanHarianDelete->delete();
                    // }

                    // ----------------------------
                    //  --- SVA ---
                    $formSvaChecklist1Harians = FormSvaChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSvaChecklist1Harians->isNotEmpty()) {
                        foreach ($formSvaChecklist1Harians as $formSvaChecklist1Harian) {
                            $newformSvaChecklist1Harian = $formSvaChecklist1Harian->replicate();
                            $newformSvaChecklist1Harian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSvaChecklist1Harian->save();
                            $formSvaChecklist1Harian->delete();
                        }
                    }

                    $formSvaChecklist2Harians = FormSvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSvaChecklist2Harians->isNotEmpty()) {
                        foreach ($formSvaChecklist2Harians as $formSvaChecklist2Harian) {
                            $newformSvaChecklist2Harian = $formSvaChecklist2Harian->replicate();
                            $newformSvaChecklist2Harian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSvaChecklist2Harian->save();
                            $formSvaChecklist2Harian->delete();
                        }
                    }
                    if ($formSvaSuratIzinPelaksanaanPekerjaanDelete = FormSvaSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormSvaSuratIzinPelaksanaanPekerjaan = $formSvaSuratIzinPelaksanaanPekerjaanDelete->replicate();
                        $newFormSvaSuratIzinPelaksanaanPekerjaan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormSvaSuratIzinPelaksanaanPekerjaan->save();
                        $formSvaSuratIzinPelaksanaanPekerjaanDelete->delete();
                    }
                    if ($formSvaSuratPemeriksaanRutinDelete = FormSvaSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormSvaSuratPemeriksaanRutin = $formSvaSuratPemeriksaanRutinDelete->replicate();
                        $newFormSvaSuratPemeriksaanRutin->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormSvaSuratPemeriksaanRutin->save();
                        $formSvaSuratPemeriksaanRutinDelete->delete();
                    }
                    if ($formSvaSuratPerbaikanGangguanDelete = FormSvaSuratPerbaikanGangguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $newFormSvaSuratPerbaikanGangguan = $formSvaSuratPerbaikanGangguanDelete->replicate();
                        $newFormSvaSuratPerbaikanGangguan->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $newFormSvaSuratPerbaikanGangguan->save();
                        $formSvaSuratPerbaikanGangguanDelete->delete();
                    }
                    $formSvaHFCPapiHarians = FormSvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSvaHFCPapiHarians->isNotEmpty()) {
                        foreach ($formSvaHFCPapiHarians as $formSvaHFCPapiHarian) {
                            $newformSvaHFCPapiHarian = $formSvaHFCPapiHarian->replicate();
                            $newformSvaHFCPapiHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSvaHFCPapiHarian->save();
                            $formSvaHFCPapiHarian->delete();
                        }
                    }
                    $formSvaConstantCurrentRegulations = FormSvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formSvaConstantCurrentRegulations->isNotEmpty()) {
                        foreach ($formSvaConstantCurrentRegulations as $formSvaConstantCurrentRegulation) {
                            $newformSvaConstantCurrentRegulation = $formSvaConstantCurrentRegulation->replicate();
                            $newformSvaConstantCurrentRegulation->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformSvaConstantCurrentRegulation->save();
                            $formSvaConstantCurrentRegulation->delete();
                        }
                    }
                    if ($formSvaUraianPerbaikanHarianDelete = FormSvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formSvaUraianPerbaikanHarian = $formSvaUraianPerbaikanHarianDelete->replicate();
                        $formSvaUraianPerbaikanHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                        $formSvaUraianPerbaikanHarian->save();
                        $formSvaUraianPerbaikanHarianDelete->delete();
                    }


                    //  ----------------------------
                    //  --- AEW ---
                    $formAewPkppkHarians = FormAewPkppkHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formAewPkppkHarians->isNotEmpty()) {
                        foreach ($formAewPkppkHarians as $formAewPkppkHarian) {
                            $newformAewPkppkHarian = $formAewPkppkHarian->replicate();
                            $newformAewPkppkHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformAewPkppkHarian->save();
                            $formAewPkppkHarian->delete();
                        }
                    }

                    $formAewRubberRemoverHarians = FormAewRubberRemoverHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formAewRubberRemoverHarians->isNotEmpty()) {
                        foreach ($formAewRubberRemoverHarians as $formAewRubberRemoverHarian) {
                            $newformAewRubberRemoverHarian = $formAewRubberRemoverHarian->replicate();
                            $newformAewRubberRemoverHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformAewRubberRemoverHarian->save();
                            $formAewRubberRemoverHarian->delete();
                        }
                    }

                    $formAewParCarHarians = FormAewParCarHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formAewParCarHarians->isNotEmpty()) {
                        foreach ($formAewParCarHarians as $formAewParCarHarian) {
                            $newformAewParCarHarian = $formAewParCarHarian->replicate();
                            $newformAewParCarHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformAewParCarHarian->save();
                            $formAewParCarHarian->delete();
                        }
                    }

                    //  ----------------------------
                    //  --- WTR ---
                    $formWtrPeralatanHarians = FormWtrPeralatanHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formWtrPeralatanHarians->isNotEmpty()) {
                        foreach ($formWtrPeralatanHarians as $formWtrPeralatanHarian) {
                            $newformWtrPeralatanHarian = $formWtrPeralatanHarian->replicate();
                            $newformWtrPeralatanHarian->detail_work_order_form_id = $newDetailWorkOrderForm->id;
                            $newformWtrPeralatanHarian->save();
                            $formWtrPeralatanHarian->delete();
                        }
                    }

                    $detailWorkOrderFormDelete->delete();
                } else {
                    $detailWorkOrderForm = new DetailWorkOrderForm();
                    $detailWorkOrderForm->work_order_id = $this->id;
                    $detailWorkOrderForm->form_id = $id;
                    $detailWorkOrderForm->save();
                }
            }
            if ($detailWorkOrderFormDeletes->count() > 0) {
                foreach ($detailWorkOrderFormDeletes as $detailWorkOrderFormDelete) {
                    // ---------- Has One

                    //  ----------------------------
                    //  --- ELP ---
                    if ($laporanKerusakanElectricalProtection = laporanKerusakanElectricalProtection::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $laporanKerusakanElectricalProtection->delete();
                    }
                    //  ----------------------------
                    //  --- PS2 ---
                    if ($checkHarianGensetPs2ControlRoom = ChecklistHarianGensetPs2ControlRoom::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $checkHarianGensetPs2ControlRoom->delete();
                    }

                    if ($checklistGensetPhAocc = ChecklistGensetPhAocc::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $checklistGensetPhAocc->delete();
                    }

                    if ($formPs2GensetRunningHarianKeterangan = FormPs2GensetRunningHarianKeterangan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs2GensetRunningHarianKeterangan->delete();
                    }

                    if ($formPs2GensetPhAoccHarian = FormPs2GensetPhAoccHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs2GensetPhAoccHarian->delete();
                    }

                    //  ----------------------------
                    //  --- PS1 ---
                    if ($formPs1GensetMobile = FormPs1GensetMobile::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs1GensetMobile->delete();
                    }

                    if ($formPs1TestOnloadGenset = FormPs1TestOnloadGenset::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs1TestOnloadGenset->delete();
                    }


                    //  ----------------------------
                    //  --- PS3 ---
                    if ($formPs3ControlRoomHarian = FormPs3ControlRoomHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3ControlRoomHarian->delete();
                    }

                    if ($formPs3CraneGensetTigaBulanan = FormPs3CraneGensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3CraneGensetTigaBulanan->delete();
                    }
                    if ($formPs3RuangTenagaSuhuDuaMingguan = FormPs3RuangTenagaSuhuDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3RuangTenagaSuhuDuaMingguan->delete();
                    }

                    if ($formPs3MainTankLamaDuaMingguan = FormPs3MainTankLamaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3MainTankLamaDuaMingguan->delete();
                    }

                    if ($formPs3EpccDuaMingguan = FormPs3EpccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3EpccDuaMingguan->delete();
                    }

                    if ($formPs3GroundTankBaruDuaMingguan = FormPs3GroundTankBaruDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3GroundTankBaruDuaMingguan->delete();
                    }

                    if ($formPs3GroundTankBaruPemeriksaanArusDuaMingguan = FormPs3GroundTankBaruPemeriksaanArusDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->delete();
                    }


                    if ($formPs3EpccSimulatorEnamBulananTahunan = FormPs3EpccSimulatorEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3EpccSimulatorEnamBulananTahunan->delete();
                    }

                    if ($formPs3EpccEnamBulananTahunan = FormPs3EpccEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3EpccEnamBulananTahunan->delete();
                    }

                    if ($formPs3PanelPompaBbmBaruEnamBulananTahunan = FormPs3PanelPompaBbmBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3PanelPompaBbmBaruEnamBulananTahunan->delete();
                    }

                    if ($formPs3PanelPompaBbmLamaEnamBulananTahunan = FormPs3PanelPompaBbmLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3PanelPompaBbmLamaEnamBulananTahunan->delete();
                    }

                    if ($FormPs3MainTankBaruLamaEnamBulananTahunan = FormPs3MainTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $FormPs3MainTankBaruLamaEnamBulananTahunan->delete();
                    }

                    if ($FormPs3SumpTankBaruEnamBulananTahunan = FormPs3SumpTankBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $FormPs3SumpTankBaruEnamBulananTahunan->delete();
                    }

                    if ($FormPs3SumpTankBaruLamaEnamBulananTahunan = FormPs3SumpTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $FormPs3SumpTankBaruLamaEnamBulananTahunan->delete();
                    }

                    if ($FormPs3PanelKontrolPompaEnamBulananTahunan = FormPs3PanelKontrolPompaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $FormPs3PanelKontrolPompaEnamBulananTahunan->delete();
                    }

                    if ($formPs3TrafoGensetCheckEnamBulananTahunan = FormPs3TrafoGensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formPs3TrafoGensetCheckEnamBulananTahunan->delete();
                    }

                    // --- If the table has relation tomany

                    $ChecklistHarianGensetPs2GensetRooms = ChecklistHarianGensetPs2GensetRoom::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($ChecklistHarianGensetPs2GensetRooms->isNotEmpty()) {
                        $ChecklistHarianGensetPs2GensetRooms->each->delete();
                    }

                    $formPs2GensetPhAoccDuaMingguans = FormPs2GensetPhAoccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GensetPhAoccDuaMingguans->isNotEmpty()) {
                        $formPs2GensetPhAoccDuaMingguans->each->delete();
                    }

                    $formPs2GensetDuaMingguans = FormPs2GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GensetDuaMingguans->isNotEmpty()) {
                        $formPs2GensetDuaMingguans->each->delete();
                    }

                    $formPs2GensetDuaMingguanGensets = FormPs2GensetDuaMingguanGenset::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GensetDuaMingguanGensets->isNotEmpty()) {
                        $formPs2GensetDuaMingguanGensets->each->delete();
                    }

                    $formPs2GensetDuaMingguanTrafos = FormPs2GensetDuaMingguanTrafo::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GensetDuaMingguanTrafos->isNotEmpty()) {
                        $formPs2GensetDuaMingguanTrafos->each->delete();
                    }

                    $formPs2GensetDuaMingguanTanks = FormPs2GensetDuaMingguanTank::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GensetDuaMingguanTanks->isNotEmpty()) {
                        $formPs2GensetDuaMingguanTanks->each->delete();
                    }

                    $formPs2GroundTankDuaMingguans = FormPs2GroundTankDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GroundTankDuaMingguans->isNotEmpty()) {
                        $formPs2GroundTankDuaMingguans->each->delete();
                    }

                    $formPs2GensetRunningHarians = FormPs2GensetRunningHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2GensetRunningHarians->isNotEmpty()) {
                        $formPs2GensetRunningHarians->each->delete();
                    }

                    $formPs2PanelPhAoccs = FormPs2PanelPhAocc::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2PanelPhAoccs->isNotEmpty()) {
                        $formPs2PanelPhAoccs->each->delete();
                    }

                    $formPs2ChecklistPanelLvHarians = formPs2ChecklistPanelLvHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2ChecklistPanelLvHarians->isNotEmpty()) {
                        $formPs2ChecklistPanelLvHarians->each->delete();
                    }

                    $formPs2PanelHarians = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2PanelHarians->isNotEmpty()) {
                        $formPs2PanelHarians->each->delete();
                    }

                    $formPs2PanelDuaMingguans = FormPs2PanelDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2PanelDuaMingguans->isNotEmpty()) {
                        $formPs2PanelDuaMingguans->each->delete();
                    }

                    $formPs2RuangTenagaDuaMingguans = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2RuangTenagaDuaMingguans->isNotEmpty()) {
                        $formPs2RuangTenagaDuaMingguans->each->delete();
                    }

                    $formPs2PemeliharaanEnamBulanans = FormPs2PemeliharaanEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2PemeliharaanEnamBulanans->isNotEmpty()) {
                        $formPs2PemeliharaanEnamBulanans->each->delete();
                    }

                    $formPs2WoDuaMingguans = FormPs2WoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs2WoDuaMingguans->isNotEmpty()) {
                        $formPs2WoDuaMingguans->each->delete();
                    }

                    // $formPs2WoTigaBulanans = FormPs2WoTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    // if ($formPs2WoTigaBulanans->isNotEmpty()) {
                    //     $formPs2WoTigaBulanans->each->delete();
                    // }

                    //  ----------------------------
                    //  --- PS1 ---

                    $formPs1ControlDeskDuaMingguans = FormPs1ControlDeskDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1ControlDeskDuaMingguans->isNotEmpty()) {
                        $formPs1ControlDeskDuaMingguans->each->delete();
                    }

                    $formPs1ControlDeskDuaMingguanBelakangs = FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1ControlDeskDuaMingguanBelakangs->isNotEmpty()) {
                        $formPs1ControlDeskDuaMingguanBelakangs->each->delete();
                    }

                    $formPs1ControlDeskTahunans = FormPs1ControlDeskTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1ControlDeskTahunans->isNotEmpty()) {
                        $formPs1ControlDeskTahunans->each->delete();
                    }

                    $FormPs1GensetHarians = FormPs1GensetHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($FormPs1GensetHarians->isNotEmpty()) {
                        $FormPs1GensetHarians->each->delete();
                    }

                    $formPs1TestOnloadUraianGensets = FormPs1TestOnloadUraianGenset::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1TestOnloadUraianGensets->isNotEmpty()) {
                        $formPs1TestOnloadUraianGensets->each->delete();
                    }

                    $formPs1TestOnloadParameterGensets = FormPs1TestOnloadParameterGenset::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1TestOnloadParameterGensets->isNotEmpty()) {
                        $formPs1TestOnloadParameterGensets->each->delete();
                    }

                    $formPs1GensetStandbyNo1DuaMingguans = FormPs1GensetStandbyNo1DuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetStandbyNo1DuaMingguans->isNotEmpty()) {
                        $formPs1GensetStandbyNo1DuaMingguans->each->delete();
                    }

                    $FormPs1PanelHarians = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($FormPs1PanelHarians->isNotEmpty()) {
                        $FormPs1PanelHarians->each->delete();
                    }

                    $formPs1GensetStandbyTigaBulanans = FormPs1GensetStandbyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetStandbyTigaBulanans->isNotEmpty()) {
                        $formPs1GensetStandbyTigaBulanans->each->delete();
                    }
                    $formPs1GensetStandbyEnamBulanans = FormPs1GensetStandbyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetStandbyEnamBulanans->isNotEmpty()) {
                        $formPs1GensetStandbyEnamBulanans->each->delete();
                    }
                    $formPs1GensetStandbyTahunans = FormPs1GensetStandbyTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetStandbyTahunans->isNotEmpty()) {
                        $formPs1GensetStandbyTahunans->each->delete();
                    }

                    $formPs1GensetMobileDuaMingguans = FormPs1GensetMobileDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetMobileDuaMingguans->isNotEmpty()) {
                        $formPs1GensetMobileDuaMingguans->each->delete();
                    }

                    $formPs1GensetMobileTigaBulanans = FormPs1GensetMobileTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetMobileTigaBulanans->isNotEmpty()) {
                        $formPs1GensetMobileTigaBulanans->each->delete();
                    }

                    $formPs1GensetMobileEnamBulanans = FormPs1GensetMobileEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetMobileEnamBulanans->isNotEmpty()) {
                        $formPs1GensetMobileEnamBulanans->each->delete();
                    }

                    $formPs1GensetMobileTahunans = FormPs1GensetMobileTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1GensetMobileTahunans->isNotEmpty()) {
                        $formPs1GensetMobileTahunans->each->delete();
                    }

                    $gensetStandbyGarduTeknikDuaMingguans = GensetStandbyGarduTeknikDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($gensetStandbyGarduTeknikDuaMingguans->isNotEmpty()) {
                        $gensetStandbyGarduTeknikDuaMingguans->each->delete();
                    }

                    $gensetStandbyGarduTeknikTigaBulanans = GensetStandbyGarduTeknikTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($gensetStandbyGarduTeknikTigaBulanans->isNotEmpty()) {
                        $gensetStandbyGarduTeknikTigaBulanans->each->delete();
                    }

                    $gensetStandbyGarduTeknikEnamBulanans = GensetStandbyGarduTeknikEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($gensetStandbyGarduTeknikEnamBulanans->isNotEmpty()) {
                        $gensetStandbyGarduTeknikEnamBulanans->each->delete();
                    }

                    $gensetStandbyGarduTeknikTahunans = GensetStandbyGarduTeknikTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($gensetStandbyGarduTeknikTahunans->isNotEmpty()) {
                        $gensetStandbyGarduTeknikTahunans->each->delete();
                    }

                    $formPs1PanelAutomationDuaMingguans = FormPs1PanelAutomationDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelAutomationDuaMingguans->isNotEmpty()) {
                        $formPs1PanelAutomationDuaMingguans->each->delete();
                    }

                    $formPs1PanelTrDuaMingguans = FormPs1PanelTrDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTrDuaMingguans->isNotEmpty()) {
                        $formPs1PanelTrDuaMingguans->each->delete();
                    }

                    $formPs1PanelTrEnamBulanans = FormPs1PanelTrEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTrEnamBulanans->isNotEmpty()) {
                        $formPs1PanelTrEnamBulanans->each->delete();
                    }

                    $formPs1PanelTrTahunans = FormPs1PanelTrTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTrTahunans->isNotEmpty()) {
                        $formPs1PanelTrTahunans->each->delete();
                    }

                    $formPs1PanelTrAuxDuaMingguans = FormPs1PanelTrAuxDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTrAuxDuaMingguans->isNotEmpty()) {
                        $formPs1PanelTrAuxDuaMingguans->each->delete();
                    }

                    $formPs1PanelTrAuxEnamBulanans = FormPs1PanelTrAuxEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTrAuxEnamBulanans->isNotEmpty()) {
                        $formPs1PanelTrAuxEnamBulanans->each->delete();
                    }

                    $formPs1PanelTrAuxTahunans = FormPs1PanelTrAuxTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTrAuxTahunans->isNotEmpty()) {
                        $formPs1PanelTrAuxTahunans->each->delete();
                    }

                    $formPs1PanelTmTahunans = FormPs1PanelTmTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTmTahunans->isNotEmpty()) {
                        $formPs1PanelTmTahunans->each->delete();
                    }

                    $formPs1TrafoDuaMingguans = FormPs1TrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1TrafoDuaMingguans->isNotEmpty()) {
                        $formPs1TrafoDuaMingguans->each->delete();
                    }

                    $formPs1PanelMvTahunans = FormPs1PanelMvTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelMvTahunans->isNotEmpty()) {
                        $formPs1PanelMvTahunans->each->delete();
                    }

                    $formPs1PanelTmDuaMingguans = FormPs1PanelTmDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTmDuaMingguans->isNotEmpty()) {
                        $formPs1PanelTmDuaMingguans->each->delete();
                    }

                    $formPs1PanelTmEnamBulanans = FormPs1PanelTmEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs1PanelTmEnamBulanans->isNotEmpty()) {
                        $formPs1PanelTmEnamBulanans->each->delete();
                    }

                    //  ----------------------------
                    //  --- PS3 ---
                    $formPs3GensetRoomHarians = FormPs3GensetRoomHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)
                        ->orderBy('id', 'asc')
                        ->get();
                    if ($formPs3GensetRoomHarians->isNotEmpty()) {
                        $formPs3GensetRoomHarians->each->delete();
                    }

                    $formPs3PanelHarians = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3PanelHarians->isNotEmpty()) {
                        $formPs3PanelHarians->each->delete();
                    }

                    $formPs3PanelSdpDuaMingguans = FormPs3PanelSdpDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3PanelSdpDuaMingguans->isNotEmpty()) {
                        $formPs3PanelSdpDuaMingguans->each->delete();
                    }

                    $formPs3RuangTenagaTeganganDuaMingguans = FormPs3RuangTenagaTeganganDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3RuangTenagaTeganganDuaMingguans->isNotEmpty()) {
                        $formPs3RuangTenagaTeganganDuaMingguans->each->delete();
                    }

                    $formPs3GensetDuaMingguans = FormPs3GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3GensetDuaMingguans->isNotEmpty()) {
                        $formPs3GensetDuaMingguans->each->delete();
                    }


                    $formPs3GensetTigaBulanans = FormPs3GensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3GensetTigaBulanans->isNotEmpty()) {
                        $formPs3GensetTigaBulanans->each->delete();
                    }

                    $formPs3TrafoTigaBulanans = FormPs3TrafoTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3TrafoTigaBulanans->isNotEmpty()) {
                        $formPs3TrafoTigaBulanans->each->delete();
                    }

                    $formPs3TrafoEnamBulananTahunans = FormPs3TrafoEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3TrafoEnamBulananTahunans->isNotEmpty()) {
                        $formPs3TrafoEnamBulananTahunans->each->delete();
                    }

                    $formPs3GensetEnamBulananTahunans = FormPs3GensetEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3GensetEnamBulananTahunans->isNotEmpty()) {
                        $formPs3GensetEnamBulananTahunans->each->delete();
                    }

                    $formPs3LvmdpACheckEnamBulananTahunans = FormPs3LvmdpACheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3LvmdpACheckEnamBulananTahunans->isNotEmpty()) {
                        $formPs3LvmdpACheckEnamBulananTahunans->each->delete();
                    }

                    $formPs3LvmdpBCheckEnamBulananTahunans = FormPs3LvmdpBCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3LvmdpBCheckEnamBulananTahunans->isNotEmpty()) {
                        $formPs3LvmdpBCheckEnamBulananTahunans->each->delete();
                    }

                    $formPs3GensetCheckEnamBulananTahunans = FormPs3GensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3GensetCheckEnamBulananTahunans->isNotEmpty()) {
                        $formPs3GensetCheckEnamBulananTahunans->each->delete();
                    }

                    $formPs3PanelMvEnamBulananTahunans = FormPs3PanelMvEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formPs3PanelMvEnamBulananTahunans->isNotEmpty()) {
                        $formPs3PanelMvEnamBulananTahunans->each->delete();
                    }

                    //  ----------------------------
                    //  --- HMV ---
                    $formHmvGisAHarians = FormHmvGisAHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvGisAHarians->isNotEmpty()) {
                        $formHmvGisAHarians->each->delete();
                    }

                    $formHmvGisBHarians = FormHmvGisBHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvGisBHarians->isNotEmpty()) {
                        $formHmvGisBHarians->each->delete();
                    }

                    $formHmvGisCHarians = FormHmvGisCHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvGisCHarians->isNotEmpty()) {
                        $formHmvGisCHarians->each->delete();
                    }

                    $formHmvGisTigaBulanans = FormHmvGisTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvGisTigaBulanans->isNotEmpty()) {
                        $formHmvGisTigaBulanans->each->delete();
                    }

                    $formHmvGisTahunans = FormHmvGisTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvGisTahunans->isNotEmpty()) {
                        $formHmvGisTahunans->each->delete();
                    }

                    $formHmvGisDuaTahunans = FormHmvGisDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvGisDuaTahunans->isNotEmpty()) {
                        $formHmvGisDuaTahunans->each->delete();
                    }

                    $formHmvGisKondisionals = FormHmvGisKondisional::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvGisKondisionals->isNotEmpty()) {
                        $formHmvGisKondisionals->each->delete();
                    }

                    $formHmvMeteranHarians = FormHmvMeteranHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvMeteranHarians->isNotEmpty()) {
                        $formHmvMeteranHarians->each->delete();
                    }

                    $formHmvMeteran2Harians = FormHmvMeteran2Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvMeteran2Harians->isNotEmpty()) {
                        $formHmvMeteran2Harians->each->delete();
                    }

                    $formHmvPanelTmHarians = FormHmvPanelTmHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvPanelTmHarians->isNotEmpty()) {
                        $formHmvPanelTmHarians->each->delete();
                    }

                    $formHmvPanelBulanans = FormHmvPanelBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvPanelBulanans->isNotEmpty()) {
                        $formHmvPanelBulanans->each->delete();
                    }

                    $formHmvPanelTigaBulanans = FormHmvPanelTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvPanelTigaBulanans->isNotEmpty()) {
                        $formHmvPanelTigaBulanans->each->delete();
                    }

                    $formHmvPowerMingguans = FormHmvPowerMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvPowerMingguans->isNotEmpty()) {
                        $formHmvPowerMingguans->each->delete();
                    }

                    $formHmvPowerBulanans = FormHmvPowerBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvPowerBulanans->isNotEmpty()) {
                        $formHmvPowerBulanans->each->delete();
                    }

                    $formHmvPowerTigaBulanans = FormHmvPowerTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvPowerTigaBulanans->isNotEmpty()) {
                        $formHmvPowerTigaBulanans->each->delete();
                    }

                    $formHmvPowerEnamBulanans = FormHmvPowerEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvPowerEnamBulanans->isNotEmpty()) {
                        $formHmvPowerEnamBulanans->each->delete();
                    }

                    $formHmvPowerTahunans = FormHmvPowerTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvPowerTahunans->isNotEmpty()) {
                        $formHmvPowerTahunans->each->delete();
                    }

                    $formHmvPowerDuaTahunans = FormHmvPowerDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvPowerDuaTahunans->isNotEmpty()) {
                        $formHmvPowerDuaTahunans->each->delete();
                    }

                    $formHmvPowerKondisionals = FormHmvPowerKondisional::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formHmvPowerKondisionals->isNotEmpty()) {
                        $formHmvPowerKondisionals->each->delete();
                    }


                    //  ----------------------------
                    //  --- ELE ---
                    $formElePemeliharaanTahunans = FormElePemeliharaanTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElePemeliharaanTahunans->isNotEmpty()) {
                        $formElePemeliharaanTahunans->each->delete();
                    }

                    $formEleChecklist1Harians = FormEleChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formEleChecklist1Harians->isNotEmpty()) {
                        $formEleChecklist1Harians->each->delete();
                    }

                    $formEleChecklist2Harians = FormEleChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formEleChecklist2Harians->isNotEmpty()) {
                        $formEleChecklist2Harians->each->delete();
                    }

                    if ($formEleSuratIzinPelaksanaanPekerjaan = FormEleSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formEleSuratIzinPelaksanaanPekerjaan->delete();
                    }
                    if ($formEleSuratPemeriksaanRutin = FormEleSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formEleSuratPemeriksaanRutin->delete();
                    }



                    //  ---------------------------
                    // SNT
                    $formSntChecklistSewageTreatmentPlantHarians = FormSntChecklistSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSntChecklistSewageTreatmentPlantHarians->isNotEmpty()) {
                        $formSntChecklistSewageTreatmentPlantHarians->each->delete();
                    }

                    $formSntPerawatanSewageTreatmentPlantHarians = FormSntPerawatanSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSntPerawatanSewageTreatmentPlantHarians->isNotEmpty()) {
                        $formSntPerawatanSewageTreatmentPlantHarians->each->delete();
                    }

                    $formSntChecklistDelacerationHarians = FormSntChecklistDelacerationHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSntChecklistDelacerationHarians->isNotEmpty()) {
                        $formSntChecklistDelacerationHarians->each->delete();
                    }

                    $formSntChecklistLiftingPumps = FormSntChecklistLiftingPump::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSntChecklistLiftingPumps->isNotEmpty()) {
                        $formSntChecklistLiftingPumps->each->delete();
                    }

                    $formSntChecklistLiftingPumpHarians = FormSntChecklistLiftingPumpHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSntChecklistLiftingPumpHarians->isNotEmpty()) {
                        $formSntChecklistLiftingPumpHarians->each->delete();
                    }

                    $formSntPerawatanT3VIPs = FormSntPerawatanT3VIP::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSntPerawatanT3VIPs->isNotEmpty()) {
                        $formSntPerawatanT3VIPs->each->delete();
                    }

                    $formSntChecklistPerawatanIncinerator123Harians = FormSntChecklistPerawatanIncinerator123Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSntChecklistPerawatanIncinerator123Harians->isNotEmpty()) {
                        $formSntChecklistPerawatanIncinerator123Harians->each->delete();
                    }

                    $formSntChecklistPerawatanIncinerator567Harians = FormSntChecklistPerawatanIncinerator567Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSntChecklistPerawatanIncinerator567Harians->isNotEmpty()) {
                        $formSntChecklistPerawatanIncinerator567Harians->each->delete();
                    }

                    $formSntChecklistPerawatanIncinerator123Mingguans = FormSntChecklistPerawatanIncinerator123Mingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSntChecklistPerawatanIncinerator123Mingguans->isNotEmpty()) {
                        $formSntChecklistPerawatanIncinerator123Mingguans->each->delete();
                    }

                    $formSntChecklistPerawatanIncinerator456Mingguans = FormSntChecklistPerawatanIncinerator456Mingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSntChecklistPerawatanIncinerator456Mingguans->isNotEmpty()) {
                        $formSntChecklistPerawatanIncinerator456Mingguans->each->delete();
                    }

                    $formSntChecklistPerawatanIncinerator123Bulanans = FormSntChecklistPerawatanIncinerator123Bulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSntChecklistPerawatanIncinerator123Bulanans->isNotEmpty()) {
                        $formSntChecklistPerawatanIncinerator123Bulanans->each->delete();
                    }

                    $formSntChecklistPerawatanIncinerator456Bulanans = FormSntChecklistPerawatanIncinerator456Bulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSntChecklistPerawatanIncinerator456Bulanans->isNotEmpty()) {
                        $formSntChecklistPerawatanIncinerator456Bulanans->each->delete();
                    }



                    //  ---------------------------
                    // UPS
                    if ($formUpsLaporanHasilKerja = FormUpsLaporanHasilKerja::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formUpsLaporanHasilKerja->delete();
                    }
                    if ($formUpsLaporanHasilKerjaMalam = FormUpsLaporanHasilKerjaMalam::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formUpsLaporanHasilKerjaMalam->delete();
                    }
                    $formUpsPengukuranTeganganBatterys = FormUpsPengukuranTeganganBattery::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formUpsPengukuranTeganganBatterys->isNotEmpty()) {
                        $formUpsPengukuranTeganganBatterys->each->delete();
                    }
                    $formUpsDataUkurLoadBebans = FormUpsDataUkurLoadBeban::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formUpsDataUkurLoadBebans->isNotEmpty()) {
                        $formUpsDataUkurLoadBebans->each->delete();
                    }
                    $formUpsDokumentasiKegiatanRutins = FormUpsDokumentasiKegiatanRutin::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formUpsDokumentasiKegiatanRutins->isNotEmpty()) {
                        $formUpsDokumentasiKegiatanRutins->each->delete();
                    }
                    $formUpsPengukuranPeralatanDuaMingguans = FormUpsPengukuranPeralatanDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formUpsPengukuranPeralatanDuaMingguans->isNotEmpty()) {
                        $formUpsPengukuranPeralatanDuaMingguans->each->delete();
                    }
                    $formUpsPengukuranPeralatanEnamBulanans = FormUpsPengukuranPeralatanEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formUpsPengukuranPeralatanEnamBulanans->isNotEmpty()) {
                        $formUpsPengukuranPeralatanEnamBulanans->each->delete();
                    }
                    if ($formUpsLaporanKerusakanDanPerbaikan = FormUpsLaporanKerusakanDanPerbaikan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formUpsLaporanKerusakanDanPerbaikan->delete();
                    }
                    // ----------------------------
                    // --- NVA ---
                    $formNvaChecklist1Harians = FormNvaChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formNvaChecklist1Harians->isNotEmpty()) {
                        $formNvaChecklist1Harians->each->delete();
                    }
                    $formNvaChecklist2Harians = FormNvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formNvaChecklist2Harians->isNotEmpty()) {
                        $formNvaChecklist2Harians->each->delete();
                    }
                    if ($formNvaSuratIzinPelaksanaanPekerjaan = FormNvaSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formNvaSuratIzinPelaksanaanPekerjaan->delete();
                    }
                    if ($formNvaSuratPemeriksaanRutin = FormNvaSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formNvaSuratPemeriksaanRutin->delete();
                    }
                    if ($formNvaSuratPerbaikanGangguan = FormNvaSuratPerbaikanGangguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formNvaSuratPerbaikanGangguan->delete();
                    }
                    $formNvaHFCPapiHarians = FormNvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formNvaHFCPapiHarians->isNotEmpty()) {
                        $formNvaHFCPapiHarians->each->delete();
                    }
                    $formNvaConstantCurrentRegulations = FormNvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formNvaConstantCurrentRegulations->isNotEmpty()) {
                        $formNvaConstantCurrentRegulations->each->delete();
                    }
                    $formNvaConstantCurrentRegulationDuas = FormNvaConstantCurrentRegulationDua::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formNvaConstantCurrentRegulationDuas->isNotEmpty()) {
                        $formNvaConstantCurrentRegulationDuas->each->delete();
                    }
                    // if ($formNvaUraianPerbaikanHarian = FormNvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                    //     $formNvaUraianPerbaikanHarian->delete();
                    // }

                    //  ----------------------------
                    //  --- SVA ---
                    $formSvaChecklist1Harians = FormSvaChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSvaChecklist1Harians->isNotEmpty()) {
                        $formSvaChecklist1Harians->each->delete();
                    }

                    $formSvaChecklist2Harians = FormSvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSvaChecklist2Harians->isNotEmpty()) {
                        $formSvaChecklist2Harians->each->delete();
                    }
                    $formSvaHFCPapiHarians = FormSvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSvaHFCPapiHarians->isNotEmpty()) {
                        $formSvaHFCPapiHarians->each->delete();
                    }
                    $formSvaConstantCurrentRegulations = FormSvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formSvaConstantCurrentRegulations->isNotEmpty()) {
                        $formSvaConstantCurrentRegulations->each->delete();
                    }
                    if ($formSvaUraianPerbaikanHarian = FormSvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formSvaUraianPerbaikanHarian->delete();
                    }
                    if ($formSvaSuratIzinPelaksanaanPekerjaan = FormSvaSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formSvaSuratIzinPelaksanaanPekerjaan->delete();
                    }
                    if ($formSvaSuratPemeriksaanRutin = FormSvaSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formSvaSuratPemeriksaanRutin->delete();
                    }
                    if ($formSvaSuratPerbaikanGangguan = FormSvaSuratPerbaikanGangguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formSvaSuratPerbaikanGangguan->delete();
                    }


                    //  ----------------------------
                    //  --- AEW ---
                    $formAewPkppkHarians = FormAewPkppkHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formAewPkppkHarians->isNotEmpty()) {
                        $formAewPkppkHarians->each->delete();
                    }

                    $formAewRubberRemoverHarians = FormAewRubberRemoverHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formAewRubberRemoverHarians->isNotEmpty()) {
                        $formAewRubberRemoverHarians->each->delete();
                    }

                    $formAewParCarHarians = FormAewParCarHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formAewParCarHarians->isNotEmpty()) {
                        $formAewParCarHarians->each->delete();
                    }
                    //  --- APM ---
                    $formApmVehicleCarBodyHarians = FormApmVehicleCarBodyHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmVehicleCarBodyHarians->isNotEmpty()) {
                        $formApmVehicleCarBodyHarians->each->delete();
                    }
                    $formApmVehicleAirBrakeSystemHarians = FormApmVehicleAirBrakeSystemHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmVehicleAirBrakeSystemHarians->isNotEmpty()) {
                        $formApmVehicleAirBrakeSystemHarians->each->delete();
                    }
                    $formApmMekanikalVehicleBogieHarians = FormApmMekanikalVehicleBogieHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmMekanikalVehicleBogieHarians->isNotEmpty()) {
                        $formApmMekanikalVehicleBogieHarians->each->delete();
                    }
                    $formApmMekanikalVehicleBogieTigaBulanans = FormApmMekanikalVehicleBogieTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmMekanikalVehicleBogieTigaBulanans->isNotEmpty()) {
                        $formApmMekanikalVehicleBogieTigaBulanans->each->delete();
                    }
                    $formApmMekanikalVehicleAirBrakeSystemTigaBulanans = FormApmMekanikalVehicleAirBrakeSystemTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans->isNotEmpty()) {
                        $formApmMekanikalVehicleAirBrakeSystemTigaBulanans->each->delete();
                    }
                    $formApmMekanikalVehicleCarbodyTigaBulanans = FormApmMekanikalVehicleCarbodyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmMekanikalVehicleCarbodyTigaBulanans->isNotEmpty()) {
                        $formApmMekanikalVehicleCarbodyTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorHarians = FormApmElektrikalVehicleExteriorHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorHarians->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorHarians->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorMingguans = FormApmElektrikalVehicleExteriorMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorMingguans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorMingguans->each->delete();
                    }
                    $formApmElektrikalVehicleInteriorHarians = FormApmElektrikalVehicleInteriorHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleInteriorHarians->isNotEmpty()) {
                        $formApmElektrikalVehicleInteriorHarians->each->delete();
                    }
                    $formApmElektrikalVehicleInteriorGDTigaBulanans = FormApmElektrikalVehicleInteriorGDTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleInteriorGDTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleInteriorGDTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleInteriorMCTigaBulanans = FormApmElektrikalVehicleInteriorMCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleInteriorMCTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleInteriorMCTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleInteriorTCMSTigaBulanans = FormApmElektrikalVehicleInteriorTCMSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleInteriorTCMSTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleInteriorTCMSTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleInteriorLPLTigaBulanans = FormApmElektrikalVehicleInteriorLPLTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleInteriorLPLTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleInteriorLPLTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleInteriorFDSTigaBulanans = FormApmElektrikalVehicleInteriorFDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleInteriorFDSTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleInteriorFDSTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorBECTigaBulanans = FormApmElektrikalVehicleExteriorBECTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorBECTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorBECTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorDCTigaBulanans = FormApmElektrikalVehicleExteriorDCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorDCTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorDCTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorBATTigaBulanans = FormApmElektrikalVehicleExteriorBATTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorBATTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorBATTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorBAThasilTigaBulanans = FormApmElektrikalVehicleExteriorBAThasilTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorBAThasilTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorBAThasilTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorESKTigaBulanans = FormApmElektrikalVehicleExteriorESKTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorESKTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorESKTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorHSCBTigaBulanans = FormApmElektrikalVehicleExteriorHSCBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorHSCBTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorHSCBTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorLJBTigaBulanans = FormApmElektrikalVehicleExteriorLJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorLJBTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorLJBTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorHJBTigaBulanans = FormApmElektrikalVehicleExteriorHJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorHJBTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorHJBTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorFJBTigaBulanans = FormApmElektrikalVehicleExteriorFJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorFJBTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorFJBTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorPCSTigaBulanans = FormApmElektrikalVehicleExteriorPCSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorPCSTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorPCSTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorLHTTigaBulanans = FormApmElektrikalVehicleExteriorLHTTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorLHTTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorLHTTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorTMTigaBulanans = FormApmElektrikalVehicleExteriorTMTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorTMTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorTMTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorEHTigaBulanans = FormApmElektrikalVehicleExteriorEHTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorEHTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorEHTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorVACTigaBulanans = FormApmElektrikalVehicleExteriorVACTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorVACTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorVACTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorSIVTigaBulanans = FormApmElektrikalVehicleExteriorSIVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorSIVTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorSIVTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorJPTigaBulanans = FormApmElektrikalVehicleExteriorJPTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorJPTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorJPTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorMDSTigaBulanans = FormApmElektrikalVehicleExteriorMDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorMDSTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorMDSTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorVVTigaBulanans = FormApmElektrikalVehicleExteriorVVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorVVTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorVVTigaBulanans->each->delete();
                    }
                    $formApmElektrikalVehicleExteriorPCTigaBulanans = FormApmElektrikalVehicleExteriorPCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmElektrikalVehicleExteriorPCTigaBulanans->isNotEmpty()) {
                        $formApmElektrikalVehicleExteriorPCTigaBulanans->each->delete();
                    }
                    $formApmMekanikalVehicleMingguans = FormApmMekanikalVehicleMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formApmMekanikalVehicleMingguans->isNotEmpty()) {
                        $formApmMekanikalVehicleMingguans->each->delete();
                    }

                    //  ----------------------------
                    //  --- ELP (ELECTRICAL PROTECTION) ---
                    $formElpDailyEr2as = FormElpDailyEr2a::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpDailyEr2as->isNotEmpty()) {
                        $formElpDailyEr2as->each->delete();
                    }

                    $formElpDailyEr2bs = FormElpDailyEr2b::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpDailyEr2bs->isNotEmpty()) {
                        $formElpDailyEr2bs->each->delete();
                    }

                    $formElpDailyGhs = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpDailyGhs->isNotEmpty()) {
                        $formElpDailyGhs->each->delete();
                    }

                    $formElpNetworkScadaRcmsDailies = FormElpNetworkScadaRcmsDaily::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpNetworkScadaRcmsDailies->isNotEmpty()) {
                        $formElpNetworkScadaRcmsDailies->each->delete();
                    }

                    $formElpMeteringDuaMingguans = FormElpMeteringDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpMeteringDuaMingguans->isNotEmpty()) {
                        $formElpMeteringDuaMingguans->each->delete();
                    }

                    $formElpTrafoDuaMingguans = FormElpTrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpTrafoDuaMingguans->isNotEmpty()) {
                        $formElpTrafoDuaMingguans->each->delete();
                    }

                    $formElpRelayDuaMingguans = FormElpRelayDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpRelayDuaMingguans->isNotEmpty()) {
                        $formElpRelayDuaMingguans->each->delete();
                    }

                    $formElpPlcDuaMingguans = FormElpPlcDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpPlcDuaMingguans->isNotEmpty()) {
                        $formElpPlcDuaMingguans->each->delete();
                    }

                    $formElpFinalCheckTahunans = FormElpFinalCheckTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpFinalCheckTahunans->isNotEmpty()) {
                        $formElpFinalCheckTahunans->each->delete();
                    }

                    $formElpPartlyEnamBulanans = FormElpPartlyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formElpPartlyEnamBulanans->isNotEmpty()) {
                        $formElpPartlyEnamBulanans->each->delete();
                    }

                    // (HAS ONE FOR ELP)
                    if ($formElpTahunan = FormElpTahunan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formElpTahunan->delete();
                    }
                    // HMV
                    if ($formHmvGisBulanan = FormHmvGisBulanan::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->first()) {
                        $formHmvGisBulanan->delete();
                    }

                    //  ----------------------------
                    //  --- WTR ---
                    $formWtrPeralatanHarians = FormWtrPeralatanHarian::where('detail_work_order_form_id', $detailWorkOrderFormDelete->id)->orderBy('id', 'asc')->get();
                    if ($formWtrPeralatanHarians->isNotEmpty()) {
                        $formWtrPeralatanHarians->each->delete();
                    }
                }
                $detailWorkOrderFormDeletes->each->delete();
            }
        } else {
            $detailWorkOrderForms = DetailWorkOrderForm::where('work_order_id', $this->id)->get();
            foreach ($detailWorkOrderForms as $detailWorkOrderForm) {
                laporanKerusakanElectricalProtection::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                ChecklistHarianGensetPs2ControlRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                ChecklistGensetPhAocc::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                ChecklistHarianGensetPs2GensetRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2GensetPhAoccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2GensetDuaMingguanGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2GensetDuaMingguanTrafo::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2GensetDuaMingguanTank::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2GroundTankDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2GensetPhAoccHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2GensetRunningHarianKeterangan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2GensetRunningHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2PanelDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2PemeliharaanEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2PanelPhAocc::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                formPs2ChecklistPanelLvHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs2WoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                // FormPs2WoTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();

                //  ----------------------------
                //  --- PS1 ---
                FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1GensetMobile::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1TestOnloadGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1TestOnloadUraianGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1TestOnloadParameterGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1GensetStandbyNo1DuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1GensetStandbyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1ControlDeskDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1ControlDeskTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1GensetHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1GensetMobileDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1GensetMobileTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1GensetMobileEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1GensetMobileTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1PanelAutomationDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1PanelTrDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1PanelTrEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1PanelTrTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1PanelTrAuxDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1PanelTrAuxEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1PanelTrAuxTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1GensetStandbyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1GensetStandbyTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                GensetStandbyGarduTeknikDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                GensetStandbyGarduTeknikTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                GensetStandbyGarduTeknikEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                GensetStandbyGarduTeknikTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1PanelTmTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1TrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1PanelMvTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs1PanelTmDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                // FormPs1PanelTmEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();

                //  ----------------------------
                //  --- PS3 ---
                FormPs3ControlRoomHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3CraneGensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3GensetRoomHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3PanelSdpDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3RuangTenagaSuhuDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3MainTankLamaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3EpccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3RuangTenagaTeganganDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3GensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3TrafoTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3TrafoEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3GensetEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3LvmdpACheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3LvmdpBCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3EpccSimulatorEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3EpccEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3PanelPompaBbmBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3PanelPompaBbmLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3MainTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3SumpTankBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3SumpTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3PanelKontrolPompaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3TrafoGensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3GensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormPs3PanelMvEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();

                //  ----------------------------
                //  --- APM ---
                FormApmVehicleCarBodyHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmVehicleAirBrakeSystemHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmMekanikalVehicleBogieHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmMekanikalVehicleBogieTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmMekanikalVehicleAirBrakeSystemTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmMekanikalVehicleCarbodyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmMekanikalVehicleCarBodyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleInteriorHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleInteriorGDTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleInteriorTCMSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleInteriorLPLTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleInteriorFDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorBECTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorDCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorBATTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorBAThasilTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorESKTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorHSCBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorLJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorHJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorFJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorPCSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorLHTTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorVACTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorTMTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorEHTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorSIVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorJPTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorMDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorVVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleExteriorPCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmElektrikalVehicleInteriorMCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormApmMekanikalVehicleMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();

                //  ----------------------------
                //  --- ELP - ELECTRICAL PROTECTION ---
                FormElpDailyEr2a::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormElpDailyEr2b::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormElpNetworkScadaRcmsDaily::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormElpMeteringDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormElpTrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormElpRelayDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormElpPlcDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormElpTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormElpFinalCheckTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormElpPartlyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();

                //  ----------------------------
                //  --- HMV ---
                FormHmvGisBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvGisAHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvGisBHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvGisCHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvGisTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvGisTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvGisDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvGisKondisional::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvMeteranHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvMeteran2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvPanelTmHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvPanelBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvPanelTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvPowerMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvPowerBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvPowerTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvPowerEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvPowerTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvPowerDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormHmvPowerKondisional::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();

                //  ----------------------------
                //  --- ELE ---
                FormElePemeliharaanTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormEleChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormEleChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormEleSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormEleSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();

                // SNT
                FormSntChecklistSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSntPerawatanSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSntChecklistLiftingPump::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSntPerawatanT3VIP::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSntChecklistDelacerationHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSntChecklistLiftingPumpHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSntChecklistPerawatanIncinerator123Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSntChecklistPerawatanIncinerator567Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSntChecklistPerawatanIncinerator123Mingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSntChecklistPerawatanIncinerator456Mingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSntChecklistPerawatanIncinerator123Bulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSntChecklistPerawatanIncinerator456Bulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();

                // UPS
                FormUpsLaporanHasilKerja::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormUpsLaporanHasilKerjaMalam::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormUpsPengukuranTeganganBattery::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormUpsDataUkurLoadBeban::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormUpsDokumentasiKegiatanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormUpsPengukuranPeralatanDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormUpsPengukuranPeralatanEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormUpsLaporanKerusakanDanPerbaikan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();

                // NVA
                FormNvaChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormNvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormNvaSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormNvaSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormNvaSuratPerbaikanGangguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormNvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormNvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormNvaConstantCurrentRegulationDua::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                // FormNvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                //  ----------------------------
                //  --- SVA ---
                FormSvaChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSvaSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSvaSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormSvaSuratPerbaikanGangguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();

                //  ----------------------------
                //  --- AEW ---
                FormAewPkppkHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormAewRubberRemoverHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
                FormAewParCarHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();

                //  ----------------------------
                //  --- WTR ---
                FormWtrPeralatanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->delete();
            }
            DetailWorkOrderForm::where('work_order_id', $this->id)->delete();
        }
    }

    public function deleteDetailWorkOrderForm()
    {
        $detailWorkOrderForms = DetailWorkOrderForm::where('work_order_id', $this->id)->get();
        foreach ($detailWorkOrderForms as $detailWorkOrderForm) {
            // ----- If Relation NOT to Many

            //  ----------------------------
            //  --- ELP ---
            if ($laporanKerusakanElectricalProtection = laporanKerusakanElectricalProtection::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $laporanKerusakanElectricalProtection->delete();
            }
            //  ----------------------------
            //  --- PS2 ---
            if ($checklistHarianGensetPs2ControlRoom = ChecklistHarianGensetPs2ControlRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $checklistHarianGensetPs2ControlRoom->delete();
            }

            if ($checklistGensetPhAocc = ChecklistGensetPhAocc::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $checklistGensetPhAocc->delete();
            }

            if ($formGensetPhAoccHarian = FormPs2GensetPhAoccHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formGensetPhAoccHarian->delete();
            }

            if ($formGensetRunningHarianKeterangan = FormPs2GensetRunningHarianKeterangan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formGensetRunningHarianKeterangan->delete();
            }

            //  ----------------------------
            //  --- PS1 ---

            if ($formPs1GensetMobile = FormPs1GensetMobile::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs1GensetMobile->delete();
            }

            if ($formPs1TestOnloadGenset = FormPs1TestOnloadGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs1TestOnloadGenset->delete();
            }

            //  ----------------------------
            //  --- PS3 ---

            if ($formPs3ControlRoomHarian = FormPs3ControlRoomHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3ControlRoomHarian->delete();
            }

            if ($formPs3CraneGensetTigaBulanan = FormPs3CraneGensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3CraneGensetTigaBulanan->delete();
            }
            if ($formPs3RuangTenagaSuhuDuaMingguan = FormPs3RuangTenagaSuhuDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3RuangTenagaSuhuDuaMingguan->delete();
            }

            if ($formPs3MainTankLamaDuaMingguan = FormPs3MainTankLamaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3MainTankLamaDuaMingguan->delete();
            }

            if ($formPs3EpccDuaMingguan = FormPs3EpccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3EpccDuaMingguan->delete();
            }

            if ($formPs3GroundTankBaruDuaMingguan = FormPs3GroundTankBaruDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3GroundTankBaruDuaMingguan->delete();
            }

            if ($formPs3GroundTankBaruPemeriksaanArusDuaMingguan = FormPs3GroundTankBaruPemeriksaanArusDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->delete();
            }

            if ($formPs3EpccSimulatorEnamBulananTahunan = FormPs3EpccSimulatorEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3EpccSimulatorEnamBulananTahunan->delete();
            }

            if ($formPs3EpccEnamBulananTahunan = FormPs3EpccEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3EpccEnamBulananTahunan->delete();
            }

            if ($formPs3PanelPompaBbmBaruEnamBulananTahunan = FormPs3PanelPompaBbmBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3PanelPompaBbmBaruEnamBulananTahunan->delete();
            }

            if ($formPs3PanelPompaBbmLamaEnamBulananTahunan = FormPs3PanelPompaBbmLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3PanelPompaBbmLamaEnamBulananTahunan->delete();
            }

            if ($formPs3MainTankBaruLamaEnamBulananTahunan = FormPs3MainTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3MainTankBaruLamaEnamBulananTahunan->delete();
            }

            if ($formPs3SumpTankBaruEnamBulananTahunan = FormPs3SumpTankBaruEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3SumpTankBaruEnamBulananTahunan->delete();
            }

            if ($formPs3SumpTankBaruLamaEnamBulananTahunan = FormPs3SumpTankBaruLamaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3SumpTankBaruLamaEnamBulananTahunan->delete();
            }

            if ($formPs3PanelKontrolPompaEnamBulananTahunan = FormPs3PanelKontrolPompaEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3PanelKontrolPompaEnamBulananTahunan->delete();
            }

            if ($formPs3TrafoGensetCheckEnamBulananTahunan = FormPs3TrafoGensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formPs3TrafoGensetCheckEnamBulananTahunan->delete();
            }

            // --- If the table HAS relation toMany

            $checklistHarianGensetPs2GensetRooms = ChecklistHarianGensetPs2GensetRoom::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($checklistHarianGensetPs2GensetRooms->isNotEmpty()) {
                $checklistHarianGensetPs2GensetRooms->each->delete();
            }

            $formPs2GensetPhAoccDuaMingguans = FormPs2GensetPhAoccDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2GensetPhAoccDuaMingguans->isNotEmpty()) {
                $formPs2GensetPhAoccDuaMingguans->each->delete();
            }

            $formPs2GensetDuaMingguans = FormPs2GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2GensetDuaMingguans->isNotEmpty()) {
                $formPs2GensetDuaMingguans->each->delete();
            }

            $formPs2GensetDuaMingguanGensets = FormPs2GensetDuaMingguanGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2GensetDuaMingguanGensets->isNotEmpty()) {
                $formPs2GensetDuaMingguanGensets->each->delete();
            }

            $formPs2GensetDuaMingguanTrafos = FormPs2GensetDuaMingguanTrafo::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2GensetDuaMingguanTrafos->isNotEmpty()) {
                $formPs2GensetDuaMingguanTrafos->each->delete();
            }

            $formPs2GensetDuaMingguanTanks = FormPs2GensetDuaMingguanTank::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2GensetDuaMingguanTanks->isNotEmpty()) {
                $formPs2GensetDuaMingguanTanks->each->delete();
            }

            $formPs2GroundTankDuaMingguans = FormPs2GroundTankDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2GroundTankDuaMingguans->isNotEmpty()) {
                $formPs2GroundTankDuaMingguans->each->delete();
            }

            $formPs2GensetRunningHarians = FormPs2GensetRunningHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2GensetRunningHarians->isNotEmpty()) {
                $formPs2GensetRunningHarians->each->delete();
            }

            $formPs2PanelPhAoccs = FormPs2PanelPhAocc::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2PanelPhAoccs->isNotEmpty()) {
                $formPs2PanelPhAoccs->each->delete();
            }

            $formPs2ChecklistPanelLvHarians = formPs2ChecklistPanelLvHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2ChecklistPanelLvHarians->isNotEmpty()) {
                $formPs2ChecklistPanelLvHarians->each->delete();
            }

            $formPs2PanelHarians = FormPs2PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2PanelHarians->isNotEmpty()) {
                $formPs2PanelHarians->each->delete();
            }

            $formPs2PemeliharaanEnamBulanans = FormPs2PemeliharaanEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2PemeliharaanEnamBulanans->isNotEmpty()) {
                $formPs2PemeliharaanEnamBulanans->each->delete();
            }
            $formPs2RuangTenagaDuaMingguans = FormPs2RuangTenagaDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2RuangTenagaDuaMingguans->isNotEmpty()) {
                $formPs2RuangTenagaDuaMingguans->each->delete();
            }

            $formPs2PanelDuaMingguans = FormPs2PanelDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2PanelDuaMingguans->isNotEmpty()) {
                $formPs2PanelDuaMingguans->each->delete();
            }

            $formPs2WoDuaMingguans = FormPs2WoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs2WoDuaMingguans->isNotEmpty()) {
                $formPs2WoDuaMingguans->each->delete();
            }

            // $formPs2WoTigaBulanans = FormPs2WoTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            // if ($formPs2WoTigaBulanans->isNotEmpty()) {
            //     $formPs2WoTigaBulanans->each->delete();
            // }

            //  ----------------------------
            //  --- PS1 ---

            $formPs1PanelHarians = FormPs1PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1PanelHarians->isNotEmpty()) {
                $formPs1PanelHarians->each->delete();
            }

            $formPs1ControlDeskDuaMingguans = FormPs1ControlDeskDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1ControlDeskDuaMingguans->isNotEmpty()) {
                $formPs1ControlDeskDuaMingguans->each->delete();
            }

            $formPs1ControlDeskDuaMingguanBelakangs = FormPs1ControlDeskDuaMingguanBelakang::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1ControlDeskDuaMingguanBelakangs->isNotEmpty()) {
                $formPs1ControlDeskDuaMingguanBelakangs->each->delete();
            }

            $formPs1ControlDeskTahunans = FormPs1ControlDeskTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1ControlDeskTahunans->isNotEmpty()) {
                $formPs1ControlDeskTahunans->each->delete();
            }

            $formPs1GensetHarians = FormPs1GensetHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1GensetHarians->isNotEmpty()) {
                $formPs1GensetHarians->each->delete();
            }

            $formPs1TestOnloadUraianGensets = FormPs1TestOnloadUraianGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1TestOnloadUraianGensets->isNotEmpty()) {
                $formPs1TestOnloadUraianGensets->each->delete();
            }

            $formPs1TestOnloadParameterGensets = FormPs1TestOnloadParameterGenset::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1TestOnloadParameterGensets->isNotEmpty()) {
                $formPs1TestOnloadParameterGensets->each->delete();
            }

            $formPs1GensetStandbyNo1DuaMingguans = FormPs1GensetStandbyNo1DuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1GensetStandbyNo1DuaMingguans->isNotEmpty()) {
                $formPs1GensetStandbyNo1DuaMingguans->each->delete();
            }

            $formPs1GensetStandbyTigaBulanans = FormPs1GensetStandbyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1GensetStandbyTigaBulanans->isNotEmpty()) {
                $formPs1GensetStandbyTigaBulanans->each->delete();
            }

            $formPs1GensetStandbyEnamBulanans = FormPs1GensetStandbyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1GensetStandbyEnamBulanans->isNotEmpty()) {
                $formPs1GensetStandbyEnamBulanans->each->delete();
            }

            $formPs1GensetStandbyTahunans = FormPs1GensetStandbyTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1GensetStandbyTahunans->isNotEmpty()) {
                $formPs1GensetStandbyTahunans->each->delete();
            }

            $gensetStandbyGarduTeknikDuaMingguans = GensetStandbyGarduTeknikDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($gensetStandbyGarduTeknikDuaMingguans->isNotEmpty()) {
                $gensetStandbyGarduTeknikDuaMingguans->each->delete();
            }

            $gensetStandbyGarduTeknikTigaBulanans = GensetStandbyGarduTeknikTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($gensetStandbyGarduTeknikTigaBulanans->isNotEmpty()) {
                $gensetStandbyGarduTeknikTigaBulanans->each->delete();
            }

            $gensetStandbyGarduTeknikEnamBulanans = GensetStandbyGarduTeknikEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($gensetStandbyGarduTeknikEnamBulanans->isNotEmpty()) {
                $gensetStandbyGarduTeknikEnamBulanans->each->delete();
            }

            $gensetStandbyGarduTeknikTahunans = GensetStandbyGarduTeknikTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($gensetStandbyGarduTeknikTahunans->isNotEmpty()) {
                $gensetStandbyGarduTeknikTahunans->each->delete();
            }

            $formPs1GensetMobileDuaMingguans = FormPs1GensetMobileDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1GensetMobileDuaMingguans->isNotEmpty()) {
                $formPs1GensetMobileDuaMingguans->each->delete();
            }

            $formPs1GensetMobileTigaBulanans = FormPs1GensetMobileTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1GensetMobileTigaBulanans->isNotEmpty()) {
                $formPs1GensetMobileTigaBulanans->each->delete();
            }

            $formPs1GensetMobileEnamBulanans = FormPs1GensetMobileEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1GensetMobileEnamBulanans->isNotEmpty()) {
                $formPs1GensetMobileEnamBulanans->each->delete();
            }

            $formPs1GensetMobileTahunans = FormPs1GensetMobileTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1GensetMobileTahunans->isNotEmpty()) {
                $formPs1GensetMobileTahunans->each->delete();
            }

            $formPs1PanelAutomationDuaMingguans = FormPs1PanelAutomationDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1PanelAutomationDuaMingguans->isNotEmpty()) {
                $formPs1PanelAutomationDuaMingguans->each->delete();
            }

            $formPs1PanelTrDuaMingguans = FormPs1PanelTrDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1PanelTrDuaMingguans->isNotEmpty()) {
                $formPs1PanelTrDuaMingguans->each->delete();
            }

            $formPs1PanelTrEnamBulanans = FormPs1PanelTrEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1PanelTrEnamBulanans->isNotEmpty()) {
                $formPs1PanelTrEnamBulanans->each->delete();
            }

            $formPs1PanelTrTahunans = FormPs1PanelTrTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1PanelTrTahunans->isNotEmpty()) {
                $formPs1PanelTrTahunans->each->delete();
            }

            $formPs1PanelTrAuxDuaMingguans = FormPs1PanelTrAuxDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1PanelTrAuxDuaMingguans->isNotEmpty()) {
                $formPs1PanelTrAuxDuaMingguans->each->delete();
            }

            $formPs1PanelTrAuxEnamBulanans = FormPs1PanelTrAuxEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1PanelTrAuxEnamBulanans->isNotEmpty()) {
                $formPs1PanelTrAuxEnamBulanans->each->delete();
            }

            $formPs1PanelTrAuxTahunans = FormPs1PanelTrAuxTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1PanelTrAuxTahunans->isNotEmpty()) {
                $formPs1PanelTrAuxTahunans->each->delete();
            }

            $formPs1PanelTmTahunans = FormPs1PanelTmTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1PanelTmTahunans->isNotEmpty()) {
                $formPs1PanelTmTahunans->each->delete();
            }

            $formPs1TrafoDuaMingguans = FormPs1TrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1TrafoDuaMingguans->isNotEmpty()) {
                $formPs1TrafoDuaMingguans->each->delete();
            }

            $formPs1PanelMvTahunans = FormPs1PanelMvTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1PanelMvTahunans->isNotEmpty()) {
                $formPs1PanelMvTahunans->each->delete();
            }

            $formPs1PanelTmDuaMingguans = FormPs1PanelTmDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1PanelTmDuaMingguans->isNotEmpty()) {
                $formPs1PanelTmDuaMingguans->each->delete();
            }

            $formPs1PanelTmEnamBulanans = FormPs1PanelTmEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs1PanelTmEnamBulanans->isNotEmpty()) {
                $formPs1PanelTmEnamBulanans->each->delete();
            }

            //  ----------------------------
            //  --- PS3 ---
            $formPs3GensetRoomHarians = FormPs3GensetRoomHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formPs3GensetRoomHarians->isNotEmpty()) {
                $formPs3GensetRoomHarians->each->delete();
            }

            $formPs3PanelHarians = FormPs3PanelHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formPs3PanelHarians->isNotEmpty()) {
                $formPs3PanelHarians->each->delete();
            }

            $formPs3PanelSdpDuaMingguans = FormPs3PanelSdpDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formPs3PanelSdpDuaMingguans->isNotEmpty()) {
                $formPs3PanelSdpDuaMingguans->each->delete();
            }

            $formPs3RuangTenagaTeganganDuaMingguans = FormPs3RuangTenagaTeganganDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formPs3RuangTenagaTeganganDuaMingguans->isNotEmpty()) {
                $formPs3RuangTenagaTeganganDuaMingguans->each->delete();
            }

            // $formPs3GensetDuaMingguans = FormPs3GensetDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            // if ($formPs3GensetDuaMingguans->isNotEmpty()) {
            //     $formPs3GensetDuaMingguans->each->delete();
            // }

            $formPs3GensetTigaBulanans = FormPs3GensetTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formPs3GensetTigaBulanans->isNotEmpty()) {
                $formPs3GensetTigaBulanans->each->delete();
            }

            $formPs3TrafoTigaBulanans = FormPs3TrafoTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formPs3TrafoTigaBulanans->isNotEmpty()) {
                $formPs3TrafoTigaBulanans->each->delete();
            }

            $formPs3TrafoEnamBulananTahunans = FormPs3TrafoEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formPs3TrafoEnamBulananTahunans->isNotEmpty()) {
                $formPs3TrafoEnamBulananTahunans->each->delete();
            }

            $formPs3GensetEnamBulananTahunans = FormPs3GensetEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formPs3GensetEnamBulananTahunans->isNotEmpty()) {
                $formPs3GensetEnamBulananTahunans->each->delete();
            }

            $formPs3LvmdpACheckEnamBulananTahunans = FormPs3LvmdpACheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formPs3LvmdpACheckEnamBulananTahunans->isNotEmpty()) {
                $formPs3LvmdpACheckEnamBulananTahunans->each->delete();
            }

            $formPs3LvmdpBCheckEnamBulananTahunans = FormPs3LvmdpBCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formPs3LvmdpBCheckEnamBulananTahunans->isNotEmpty()) {
                $formPs3LvmdpBCheckEnamBulananTahunans->each->delete();
            }

            $formPs3GensetCheckEnamBulananTahunans = FormPs3GensetCheckEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formPs3GensetCheckEnamBulananTahunans->isNotEmpty()) {
                $formPs3GensetCheckEnamBulananTahunans->each->delete();
            }

            //  ----------------------------
            //  --- ELP (ELECTRICAL PROTECTION) ---
            $formElpDailyEr2as = FormElpDailyEr2a::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formElpDailyEr2as->isNotEmpty()) {
                $formElpDailyEr2as->each->delete();
            }

            $formElpDailyEr2bs = FormElpDailyEr2b::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formElpDailyEr2bs->isNotEmpty()) {
                $formElpDailyEr2bs->each->delete();
            }

            $formElpDailyGhs = FormElpDailyGh::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formElpDailyGhs->isNotEmpty()) {
                $formElpDailyGhs->each->delete();
            }

            $formElpNetworkScadaRcmsDailies = FormElpNetworkScadaRcmsDaily::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formElpNetworkScadaRcmsDailies->isNotEmpty()) {
                $formElpNetworkScadaRcmsDailies->each->delete();
            }

            $formElpMeteringDuaMingguans = FormElpMeteringDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formElpMeteringDuaMingguans->isNotEmpty()) {
                $formElpMeteringDuaMingguans->each->delete();
            }

            $formElpTrafoDuaMingguans = FormElpTrafoDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formElpTrafoDuaMingguans->isNotEmpty()) {
                $formElpTrafoDuaMingguans->each->delete();
            }

            $formElpRelayDuaMingguans = FormElpRelayDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formElpRelayDuaMingguans->isNotEmpty()) {
                $formElpRelayDuaMingguans->each->delete();
            }

            $formElpPlcDuaMingguans = FormElpPlcDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formElpPlcDuaMingguans->isNotEmpty()) {
                $formElpPlcDuaMingguans->each->delete();
            }

            $formElpFinalCheckTahunans = FormElpFinalCheckTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formElpFinalCheckTahunans->isNotEmpty()) {
                $formElpFinalCheckTahunans->each->delete();
            }

            $formElpPartlyEnamBulanans = FormElpPartlyEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formElpPartlyEnamBulanans->isNotEmpty()) {
                $formElpPartlyEnamBulanans->each->delete();
            }

            // (HAS ONE FOR ELP)
            if ($formElpTahunan = FormElpTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formElpTahunan->delete();
            }

            // HMV
            if ($formHmvGisBulanan = FormHmvGisBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formHmvGisBulanan->delete();
            }


            $formPs3PanelMvEnamBulananTahunans = FormPs3PanelMvEnamBulananTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formPs3PanelMvEnamBulananTahunans->isNotEmpty()) {
                $formPs3PanelMvEnamBulananTahunans->each->delete();
            }
            //  ----------------------------
            //  --- APM ---
            $formApmVehicleCarBodyHarians = FormApmVehicleCarBodyHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmVehicleCarBodyHarians->isNotEmpty()) {
                $formApmVehicleCarBodyHarians->each->delete();
            }
            $formApmVehicleAirBrakeSystemHarians = FormApmVehicleAirBrakeSystemHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmVehicleAirBrakeSystemHarians->isNotEmpty()) {
                $formApmVehicleAirBrakeSystemHarians->each->delete();
            }
            $formApmMekanikalVehicleAirBrakeSystemTigaBulanans = FormApmMekanikalVehicleAirBrakeSystemTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans->isNotEmpty()) {
                $formApmMekanikalVehicleAirBrakeSystemTigaBulanans->each->delete();
            }
            $formApmMekanikalVehicleCarbodyTigaBulanans = FormApmMekanikalVehicleCarbodyTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmMekanikalVehicleCarbodyTigaBulanans->isNotEmpty()) {
                $formApmMekanikalVehicleCarbodyTigaBulanans->each->delete();
            }
            $formApmMekanikalVehicleBogieHarians = FormApmMekanikalVehicleBogieHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmMekanikalVehicleBogieHarians->isNotEmpty()) {
                $formApmMekanikalVehicleBogieHarians->each->delete();
            }
            $formApmMekanikalVehicleBogieTigaBulanans = FormApmMekanikalVehicleBogieTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmMekanikalVehicleBogieTigaBulanans->isNotEmpty()) {
                $formApmMekanikalVehicleBogieTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorHarians = FormApmElektrikalVehicleExteriorHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorHarians->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorHarians->each->delete();
            }
            $formApmElektrikalVehicleExteriorMingguans = FormApmElektrikalVehicleExteriorMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorMingguans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorMingguans->each->delete();
            }
            $formApmElektrikalVehicleInteriorHarians = FormApmElektrikalVehicleInteriorHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleInteriorHarians->isNotEmpty()) {
                $formApmElektrikalVehicleInteriorHarians->each->delete();
            }
            $formApmElektrikalVehicleInteriorGDTigaBulanans = FormApmElektrikalVehicleInteriorGDTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleInteriorGDTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleInteriorGDTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleInteriorTCMSTigaBulanans = FormApmElektrikalVehicleInteriorTCMSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleInteriorTCMSTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleInteriorTCMSTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleInteriorLPLTigaBulanans = FormApmElektrikalVehicleInteriorLPLTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleInteriorLPLTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleInteriorLPLTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleInteriorFDSTigaBulanans = FormApmElektrikalVehicleInteriorFDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleInteriorFDSTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleInteriorFDSTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorBECTigaBulanans = FormApmElektrikalVehicleExteriorBECTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorBECTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorBECTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorDCTigaBulanans = FormApmElektrikalVehicleExteriorDCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorDCTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorDCTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorBATTigaBulanans = FormApmElektrikalVehicleExteriorBATTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorBATTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorBATTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorBAThasilTigaBulanans = FormApmElektrikalVehicleExteriorBAThasilTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorBAThasilTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorBAThasilTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorESKTigaBulanans = FormApmElektrikalVehicleExteriorESKTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorESKTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorESKTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorHSCBTigaBulanans = FormApmElektrikalVehicleExteriorHSCBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorHSCBTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorHSCBTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorLJBTigaBulanans = FormApmElektrikalVehicleExteriorLJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorLJBTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorLJBTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorHJBTigaBulanans = FormApmElektrikalVehicleExteriorHJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorHJBTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorHJBTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorFJBTigaBulanans = FormApmElektrikalVehicleExteriorFJBTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorFJBTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorFJBTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorPCSTigaBulanans = FormApmElektrikalVehicleExteriorPCSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorPCSTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorPCSTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorLHTTigaBulanans = FormApmElektrikalVehicleExteriorLHTTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorLHTTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorLHTTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorVACTigaBulanans = FormApmElektrikalVehicleExteriorVACTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorVACTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorVACTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorTMTigaBulanans = FormApmElektrikalVehicleExteriorTMTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorTMTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorTMTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorEHTigaBulanans = FormApmElektrikalVehicleExteriorEHTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorEHTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorEHTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorSIVTigaBulanans = FormApmElektrikalVehicleExteriorSIVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorSIVTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorSIVTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorJPTigaBulanans = FormApmElektrikalVehicleExteriorJPTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorJPTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorJPTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleInteriorMCTigaBulanans = FormApmElektrikalVehicleInteriorMCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleInteriorMCTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleInteriorMCTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorMDSTigaBulanans = FormApmElektrikalVehicleExteriorMDSTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorMDSTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorMDSTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorVVTigaBulanans = FormApmElektrikalVehicleExteriorVVTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorVVTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorVVTigaBulanans->each->delete();
            }
            $formApmElektrikalVehicleExteriorPCTigaBulanans = FormApmElektrikalVehicleExteriorPCTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmElektrikalVehicleExteriorPCTigaBulanans->isNotEmpty()) {
                $formApmElektrikalVehicleExteriorPCTigaBulanans->each->delete();
            }
            $formApmMekanikalVehicleMingguans = FormApmMekanikalVehicleMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->orderBy('id', 'asc')->get();
            if ($formApmMekanikalVehicleMingguans->isNotEmpty()) {
                $formApmMekanikalVehicleMingguans->each->delete();
            }

            //  ----------------------------
            //  --- HMV ---
            $formHmvGisAHarians = FormHmvGisAHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvGisAHarians->isNotEmpty()) {
                $formHmvGisAHarians->each->delete();
            }

            $formHmvGisBHarians = FormHmvGisBHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvGisBHarians->isNotEmpty()) {
                $formHmvGisBHarians->each->delete();
            }


            $formHmvGisCHarians = FormHmvGisCHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvGisCHarians->isNotEmpty()) {
                $formHmvGisCHarians->each->delete();
            }

            $formHmvGisTigaBulanans = FormHmvGisTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvGisTigaBulanans->isNotEmpty()) {
                $formHmvGisTigaBulanans->each->delete();
            }

            $formHmvGisTahunans = FormHmvGisTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvGisTahunans->isNotEmpty()) {
                $formHmvGisTahunans->each->delete();
            }

            $formHmvGisDuaTahunans = FormHmvGisDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvGisDuaTahunans->isNotEmpty()) {
                $formHmvGisDuaTahunans->each->delete();
            }

            $formHmvGisKondisionals = FormHmvGisKondisional::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvGisKondisionals->isNotEmpty()) {
                $formHmvGisKondisionals->each->delete();
            }

            $formHmvMeteranHarians = FormHmvMeteranHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvMeteranHarians->isNotEmpty()) {
                $formHmvMeteranHarians->each->delete();
            }

            $formHmvMeteran2Harians = FormHmvMeteran2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvMeteran2Harians->isNotEmpty()) {
                $formHmvMeteran2Harians->each->delete();
            }

            $formHmvPanelTmHarians = FormHmvPanelTmHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvPanelTmHarians->isNotEmpty()) {
                $formHmvPanelTmHarians->each->delete();
            }

            $formHmvPanelBulanans = FormHmvPanelBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvPanelBulanans->isNotEmpty()) {
                $formHmvPanelBulanans->each->delete();
            }

            $formHmvPanelTigaBulanans = FormHmvPanelTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvPanelTigaBulanans->isNotEmpty()) {
                $formHmvPanelTigaBulanans->each->delete();
            }

            $formHmvPowerMingguans = FormHmvPowerMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvPowerMingguans->isNotEmpty()) {
                $formHmvPowerMingguans->each->delete();
            }

            $formHmvPowerBulanans = FormHmvPowerBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvPowerBulanans->isNotEmpty()) {
                $formHmvPowerBulanans->each->delete();
            }
            $formHmvPowerTigaBulanans = FormHmvPowerTigaBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvPowerTigaBulanans->isNotEmpty()) {
                $formHmvPowerTigaBulanans->each->delete();
            }
            $formHmvPowerEnamBulanans = FormHmvPowerEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvPowerEnamBulanans->isNotEmpty()) {
                $formHmvPowerEnamBulanans->each->delete();
            }

            $formHmvPowerTahunans = FormHmvPowerTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvPowerTahunans->isNotEmpty()) {
                $formHmvPowerTahunans->each->delete();
            }

            $formHmvPowerDuaTahunans = FormHmvPowerDuaTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvPowerDuaTahunans->isNotEmpty()) {
                $formHmvPowerDuaTahunans->each->delete();
            }

            $formHmvPowerKondisionals = FormHmvPowerKondisional::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formHmvPowerKondisionals->isNotEmpty()) {
                $formHmvPowerKondisionals->each->delete();
            }


            //  ----------------------------
            //  --- ELE ---
            $formElePemeliharaanTahunans = FormElePemeliharaanTahunan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formElePemeliharaanTahunans->isNotEmpty()) {
                $formElePemeliharaanTahunans->each->delete();
            }

            $formEleChecklist1Harians = FormEleChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formEleChecklist1Harians->isNotEmpty()) {
                $formEleChecklist1Harians->each->delete();
            }

            $formEleChecklist2Harians = FormEleChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formEleChecklist2Harians->isNotEmpty()) {
                $formEleChecklist2Harians->each->delete();
            }

            if ($formEleSuratIzinPelaksanaanPekerjaan = FormEleSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formEleSuratIzinPelaksanaanPekerjaan->delete();
            }
            if ($formEleSuratPemeriksaanRutin = FormEleSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formEleSuratPemeriksaanRutin->delete();
            }

            // SNT
            $formSntChecklistSewageTreatmentPlantHarians = FormSntChecklistSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSntChecklistSewageTreatmentPlantHarians->isNotEmpty()) {
                $formSntChecklistSewageTreatmentPlantHarians->each->delete();
            }

            $formSntChecklistLiftingPumpHarians = FormSntChecklistLiftingPumpHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSntChecklistLiftingPumpHarians->isNotEmpty()) {
                $formSntChecklistLiftingPumpHarians->each->delete();
            }

            $formSntChecklistLiftingPumps = FormSntChecklistLiftingPump::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSntChecklistLiftingPumps->isNotEmpty()) {
                $formSntChecklistLiftingPumps->each->delete();
            }

            $formSntChecklistDelacerationHarians = FormSntChecklistDelacerationHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSntChecklistDelacerationHarians->isNotEmpty()) {
                $formSntChecklistDelacerationHarians->each->delete();
            }


            $formSntPerawatanT3VIPs = FormSntPerawatanT3VIP::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSntPerawatanT3VIPs->isNotEmpty()) {
                $formSntPerawatanT3VIPs->each->delete();
            }

            $formSntPerawatanSewageTreatmentPlantHarians = FormSntPerawatanSewageTreatmentPlantHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSntPerawatanSewageTreatmentPlantHarians->isNotEmpty()) {
                $formSntPerawatanSewageTreatmentPlantHarians->each->delete();
            }

            $formSntChecklistPerawatanIncinerator123Harians = FormSntChecklistPerawatanIncinerator123Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSntChecklistPerawatanIncinerator123Harians->isNotEmpty()) {
                $formSntChecklistPerawatanIncinerator123Harians->each->delete();
            }

            $formSntChecklistPerawatanIncinerator567Harians = FormSntChecklistPerawatanIncinerator567Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSntChecklistPerawatanIncinerator567Harians->isNotEmpty()) {
                $formSntChecklistPerawatanIncinerator567Harians->each->delete();
            }

            $formSntChecklistPerawatanIncinerator123Mingguans = FormSntChecklistPerawatanIncinerator123Mingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSntChecklistPerawatanIncinerator123Mingguans->isNotEmpty()) {
                $formSntChecklistPerawatanIncinerator123Mingguans->each->delete();
            }

            $formSntChecklistPerawatanIncinerator456Mingguans = FormSntChecklistPerawatanIncinerator456Mingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSntChecklistPerawatanIncinerator456Mingguans->isNotEmpty()) {
                $formSntChecklistPerawatanIncinerator456Mingguans->each->delete();
            }

            $formSntChecklistPerawatanIncinerator123Bulanans = FormSntChecklistPerawatanIncinerator123Bulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSntChecklistPerawatanIncinerator123Bulanans->isNotEmpty()) {
                $formSntChecklistPerawatanIncinerator123Bulanans->each->delete();
            }

            $formSntChecklistPerawatanIncinerator456Bulanans = FormSntChecklistPerawatanIncinerator456Bulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSntChecklistPerawatanIncinerator456Bulanans->isNotEmpty()) {
                $formSntChecklistPerawatanIncinerator456Bulanans->each->delete();
            }


            // UPS
            if ($formUpsLaporanHasilKerja = FormUpsLaporanHasilKerja::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formUpsLaporanHasilKerja->delete();
            }
            if ($formUpsLaporanHasilKerjaMalam = FormUpsLaporanHasilKerjaMalam::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formUpsLaporanHasilKerjaMalam->delete();
            }
            $formUpsPengukuranTeganganBatterys = FormUpsPengukuranTeganganBattery::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formUpsPengukuranTeganganBatterys->isNotEmpty()) {
                $formUpsPengukuranTeganganBatterys->each->delete();
            }
            $formUpsDataUkurLoadBebans = FormUpsDataUkurLoadBeban::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formUpsDataUkurLoadBebans->isNotEmpty()) {
                $formUpsDataUkurLoadBebans->each->delete();
            }
            $formUpsDokumentasiKegiatanRutins = FormUpsDokumentasiKegiatanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formUpsDokumentasiKegiatanRutins->isNotEmpty()) {
                $formUpsDokumentasiKegiatanRutins->each->delete();
            }

            $formUpsPengukuranPeralatanDuaMingguans = FormUpsPengukuranPeralatanDuaMingguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formUpsPengukuranPeralatanDuaMingguans->isNotEmpty()) {
                $formUpsPengukuranPeralatanDuaMingguans->each->delete();
            }
            $formUpsPengukuranPeralatanEnamBulanans = FormUpsPengukuranPeralatanEnamBulanan::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formUpsPengukuranPeralatanEnamBulanans->isNotEmpty()) {
                $formUpsPengukuranPeralatanEnamBulanans->each->delete();
            }


            if ($formUpsLaporanKerusakanDanPerbaikan = FormUpsLaporanKerusakanDanPerbaikan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formUpsLaporanKerusakanDanPerbaikan->delete();
            }

            // NVA
            $formNvaChecklist1Harians = FormNvaChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formNvaChecklist1Harians->isNotEmpty()) {
                $formNvaChecklist1Harians->each->delete();
            }
            if ($formNvaSuratIzinPelaksanaanPekerjaan = FormNvaSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formNvaSuratIzinPelaksanaanPekerjaan->delete();
            }
            if ($formNvaSuratPemeriksaanRutin = FormNvaSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formNvaSuratPemeriksaanRutin->delete();
            }
            if ($formNvaSuratPerbaikanGangguan = FormNvaSuratPerbaikanGangguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formNvaSuratPerbaikanGangguan->delete();
            }

            $formNvaChecklist2Harians = FormNvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formNvaChecklist2Harians->isNotEmpty()) {
                $formNvaChecklist2Harians->each->delete();
            }

            $formNvaHFCPapiHarians = FormNvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formNvaHFCPapiHarians->isNotEmpty()) {
                $formNvaHFCPapiHarians->each->delete();
            }
            $formNvaConstantCurrentRegulations = FormNvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formNvaConstantCurrentRegulations->isNotEmpty()) {
                $formNvaConstantCurrentRegulations->each->delete();
            }
            $formNvaConstantCurrentRegulationDuas = FormNvaConstantCurrentRegulationDua::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formNvaConstantCurrentRegulationDuas->isNotEmpty()) {
                $formNvaConstantCurrentRegulationDuas->each->delete();
            }

            // if ($formNvaUraianPerbaikanHarian = FormNvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
            //     $formNvaUraianPerbaikanHarian->delete();
            // }

            //  ----------------------------
            //  --- SVA ---
            $formSvaChecklist1Harians = FormSvaChecklist1Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSvaChecklist1Harians->isNotEmpty()) {
                $formSvaChecklist1Harians->each->delete();
            }

            $formSvaChecklist2Harians = FormSvaChecklist2Harian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSvaChecklist2Harians->isNotEmpty()) {
                $formSvaChecklist2Harians->each->delete();
            }

            $formSvaHFCPapiHarians = FormSvaHFCPapiHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSvaHFCPapiHarians->isNotEmpty()) {
                $formSvaHFCPapiHarians->each->delete();
            }

            $formSvaConstantCurrentRegulations = FormSvaConstantCurrentRegulation::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formSvaConstantCurrentRegulations->isNotEmpty()) {
                $formSvaConstantCurrentRegulations->each->delete();
            }
            if ($formSvaUraianPerbaikanHarian = FormSvaUraianPerbaikanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formSvaUraianPerbaikanHarian->delete();
            }
            if ($formSvaSuratIzinPelaksanaanPekerjaan = FormSvaSuratIzinPelaksanaanPekerjaan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formSvaSuratIzinPelaksanaanPekerjaan->delete();
            }
            if ($formSvaSuratPemeriksaanRutin = FormSvaSuratPemeriksaanRutin::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formSvaSuratPemeriksaanRutin->delete();
            }
            if ($formSvaSuratPerbaikanGangguan = FormSvaSuratPerbaikanGangguan::where('detail_work_order_form_id', $detailWorkOrderForm->id)->first()) {
                $formSvaSuratPerbaikanGangguan->delete();
            }

            //  ----------------------------
            //  --- AEW ---
            $formAewPkppkHarians = FormAewPkppkHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formAewPkppkHarians->isNotEmpty()) {
                $formAewPkppkHarians->each->delete();
            }

            $formAewRubberRemoverHarians = FormAewRubberRemoverHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formAewRubberRemoverHarians->isNotEmpty()) {
                $formAewRubberRemoverHarians->each->delete();
            }

            $formAewParCarHarians = FormAewParCarHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formAewParCarHarians->isNotEmpty()) {
                $formAewParCarHarians->each->delete();
            }

            //  ----------------------------
            //  --- WTR ---
            $formWtrPeralatanHarians = FormWtrPeralatanHarian::where('detail_work_order_form_id', $detailWorkOrderForm->id)
                ->orderBy('id', 'asc')
                ->get();
            if ($formWtrPeralatanHarians->isNotEmpty()) {
                $formWtrPeralatanHarians->each->delete();
            }
        }
        DetailWorkOrderForm::where('work_order_id', $this->id)->delete();
    }


    // --------------------------------------------------------------------------------------------
    // Getting data for ReportController
    // --------------------------------------------------------------------------------------------
    //  ----------------------------
    //  --- ELP ---
    public function laporanKerusakanElectricalProtection()
    {
        return $this->hasOne(laporanKerusakanElectricalProtection::class);
    }
    //  ----------------------------
    //  --- PS2 ---
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

    public function formPs2GensetPhAoccHarian()
    {
        return $this->hasOne(FormPs2GensetPhAoccHarian::class);
    }

    public function formPs1GensetMobile()
    {
        return $this->hasOne(FormPs1GensetMobile::class);
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

    // public function formPs2WoTigaBulanans()
    // {
    //     return $this->hasMany(FormPs2WoTigaBulanan::class)->orderBy('id', 'asc');
    // }

    //  ----------------------------
    //  --- PS1 ---
    public function formPs1PanelHarians()
    {
        return $this->hasMany(FormPs1PanelHarian::class)->orderBy('id', 'asc');
    }

    public function formPs1ControlDeskDuaMingguans()
    {
        return $this->hasMany(FormPs1ControlDeskDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs1ControlDeskDuaMingguanBelakangs()
    {
        return $this->hasMany(FormPs1ControlDeskDuaMingguanBelakang::class)->orderBy('id', 'asc');
    }

    public function formPs1ControlDeskTahunans()
    {
        return $this->hasMany(FormPs1ControlDeskTahunan::class)->orderBy('id', 'asc');
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

    public function formPs1TestOnloadParameterGensetKeterangan()
    {
        return $this->hasOne(FormPs1TestOnloadParameterGensetKeterangan::class);
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

    public function gensetStandbyGarduTeknikDuaMingguans()
    {
        return $this->hasMany(GensetStandbyGarduTeknikDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function gensetStandbyGarduTeknikTigaBulanans()
    {
        return $this->hasMany(GensetStandbyGarduTeknikTigaBulanan::class)->orderBy('id', 'asc');
    }

    public function gensetStandbyGarduTeknikEnamBulanans()
    {
        return $this->hasMany(GensetStandbyGarduTeknikEnamBulanan::class)->orderBy('id', 'asc');
    }

    public function gensetStandbyGarduTeknikTahunans()
    {
        return $this->hasMany(GensetStandbyGarduTeknikTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs1GensetMobileDuaMingguans()
    {
        return $this->hasMany(FormPs1GensetMobileDuaMingguan::class)->orderBy('id', 'asc');
    }

    public function formPs1GensetMobileTigaBulanans()
    {
        return $this->hasMany(FormPs1GensetMobileTigaBulanan::class)->orderBy('id', 'asc');
    }

    public function formPs1GensetMobileEnamBulanans()
    {
        return $this->hasMany(FormPs1GensetMobileEnamBulanan::class)->orderBy('id', 'asc');
    }

    public function formPs1GensetMobileTahunans()
    {
        return $this->hasMany(FormPs1GensetMobileTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs1PanelAutomationDuaMingguans()
    {
        return $this->hasMany(FormPs1PanelAutomationDuaMingguan::class)->orderBy('id', 'asc');
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

    public function formPs1GensetHarians()
    {
        return $this->hasMany(FormPs1GensetHarian::class)->orderBy('id', 'asc');
    }

    public function formPs1PanelTmTahunans()
    {
        return $this->hasMany(FormPs1PanelTmTahunan::class)->orderBy('id', 'asc');
    }

    public function formPs1TrafoDuaMingguans()
    {
        return $this->hasMany(FormPs1TrafoDuaMingguan::class)->orderBy('id', 'asc');
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

    
    //  ----------------------------
    //  --- PS3 ---
    public function formPs3ControlRoomHarian()
    {
        return $this->hasOne(FormPs3ControlRoomHarian::class);
    }

    public function formPs3CraneGensetTigaBulanan()
    {
        return $this->hasOne(FormPs3CraneGensetTigaBulanan::class);
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
        return $this->hasMany(FormPs3GensetRoomHarian::class)->orderBy('id', 'asc')->orderBy('id', 'asc');
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

    public function formPs3GroundTankBaruPemeriksaanArusDuaMingguan()
    {
        return $this->hasOne(FormPs3GroundTankBaruPemeriksaanArusDuaMingguan::class);
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

    public function formPs3PanelKontrolPompaEnamBulananTahunan()
    {
        return $this->hasOne(FormPs3PanelKontrolPompaEnamBulananTahunan::class);
    }

    public function formPs3TrafoGensetCheckEnamBulananTahunan()
    {
        return $this->hasOne(FormPs3TrafoGensetCheckEnamBulananTahunan::class);
    }



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
    public function formApmMekanikalVehicleAirBrakeSystemTigaBulanans()
    {
        return $this->hasMany(FormApmMekanikalVehicleAirBrakeSystemTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmMekanikalVehicleCarbodyTigaBulanans()
    {
        return $this->hasMany(FormApmMekanikalVehicleCarbodyTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmMekanikalVehicleBogieHarians()
    {
        return $this->hasMany(FormApmMekanikalVehicleBogieHarian::class)->orderBy('id', 'asc');
    }

    public function formApmMekanikalVehicleBogieTigaBulanans()
    {
        return $this->hasMany(FormApmMekanikalVehicleBogieTigaBulanan::class)->orderBy('id', 'asc');
    }

    public function formApmElEktrikalVehicleExteriorHarians()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorHarian::class)->orderBy('id', 'asc');
    }
    public function formApmElEktrikalVehicleExteriorMingguans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorMingguan::class)->orderBy('id', 'asc');
    }
    public function formApmElEktrikalVehicleInteriorHarians()
    {
        return $this->hasMany(FormApmElektrikalVehicleInteriorHarian::class)->orderBy('id', 'asc');
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
    public function formApmElektrikalVehicleExteriorBATTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorBATTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorBAThasilTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorBAThasilTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorESKTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorESKTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorHSCBTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorHSCBTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorLJBTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorLJBTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorHJBTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorHJBTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorFJBTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorFJBTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorPCSTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorPCSTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorLHTTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorLHTTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorVACTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorVACTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorTMTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorTMTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorEHTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorEHTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorSIVTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorSIVTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleExteriorJPTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleExteriorJPTigaBulanan::class)->orderBy('id', 'asc');
    }
    public function formApmElektrikalVehicleInteriorMCTigaBulanans()
    {
        return $this->hasMany(FormApmElektrikalVehicleInteriorMCTigaBulanan::class)->orderBy('id', 'asc');
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

    public function formApmMekanikalVehicleMingguans()
    {
        return $this->hasMany(FormApmMekanikalVehicleMingguan::class)->orderBy('id', 'asc');
    }



    //  ----------------------------
    //  --- ELP (Electrical Protection)  ---
    public function formElpDailyEr2as()
    {
        return $this->hasMany(FormElpDailyEr2a::class);
    }

    public function formElpDailyEr2bs()
    {
        return $this->hasMany(FormElpDailyEr2b::class);
    }

    public function formElpDailyGhs()
    {
        return $this->hasMany(FormElpDailyGh::class);
    }

    public function formElpNetworkScadaRcmsDailies()
    {
        return $this->hasMany(FormElpNetworkScadaRcmsDaily::class);
    }

    public function formElpMeteringDuaMingguans()
    {
        return $this->hasMany(FormElpMeteringDuaMingguan::class);
    }

    public function formElpTrafoDuaMingguans()
    {
        return $this->hasMany(FormElpTrafoDuaMingguan::class);
    }

    public function formElpRelayDuaMingguans()
    {
        return $this->hasMany(FormElpRelayDuaMingguan::class);
    }

    public function formElpPlcDuaMingguans()
    {
        return $this->hasMany(FormElpPlcDuaMingguan::class);
    }

    public function formElpFinalCheckTahunans()
    {
        return $this->hasMany(FormElpFinalCheckTahunan::class);
    }

    public function formElpPartlyEnamBulanans()
    {
        return $this->hasMany(FormElpPartlyEnamBulanan::class);
    }

    public function formElpTahunan()
    {
        return $this->hasOne(FormElpTahunan::class);
    }


    //  ----------------------------
    //  --- HMV ---
    public function formHmvGisBulanan()
    {
        return $this->hasOne(FormHmvGisBulanan::class);
    }

    public function formHmvGisAHarians()
    {
        return $this->hasMany(FormHmvGisAHarian::class)->orderBy('id', 'asc');
    }

    public function formHmvGisBHarians()
    {
        return $this->hasMany(FormHmvGisBHarian::class)->orderBy('id', 'asc');
    }

    public function formHmvGisCHarians()
    {
        return $this->hasMany(FormHmvGisCHarian::class)->orderBy('id', 'asc');
    }

    public function formHmvGisTigaBulanans()
    {
        return $this->hasMany(FormHmvGisTigaBulanan::class)->orderBy('id', 'asc');
    }

    public function formHmvGisTahunans()
    {
        return $this->hasMany(FormHmvGisTahunan::class)->orderBy('id', 'asc');
    }

    public function formHmvGisDuaTahunans()
    {
        return $this->hasMany(FormHmvGisDuaTahunan::class)->orderBy('id', 'asc');
    }

    public function formHmvGisKondisionals()
    {
        return $this->hasMany(FormHmvGisKondisional::class)->orderBy('id', 'asc');
    }

    public function formHmvMeteranHarians()
    {
        return $this->hasMany(FormHmvMeteranHarian::class)->orderBy('id', 'asc');
    }

    public function formHmvMeteran2Harians()
    {
        return $this->hasMany(FormHmvMeteran2Harian::class)->orderBy('id', 'asc');
    }

    public function formHmvPanelTmHarians()
    {
        return $this->hasMany(FormHmvPanelTmHarian::class)->orderBy('id', 'asc');
    }

    public function formHmvPanelBulanans()
    {
        return $this->hasMany(FormHmvPanelBulanan::class)->orderBy('id', 'asc');
    }

    public function formHmvPanelTigaBulanans()
    {
        return $this->hasMany(FormHmvPanelTigaBulanan::class)->orderBy('id', 'asc');
    }

    public function formHmvPowerMingguans()
    {
        return $this->hasMany(FormHmvPowerMingguan::class)->orderBy('id', 'asc');
    }

    public function formHmvPowerBulanans()
    {
        return $this->hasMany(FormHmvPowerBulanan::class)->orderBy('id', 'asc');
    }

    public function formHmvPowerTigaBulanans()
    {
        return $this->hasMany(FormHmvPowerTigaBulanan::class)->orderBy('id', 'asc');
    }

    public function formHmvPowerEnamBulanans()
    {
        return $this->hasMany(FormHmvPowerEnamBulanan::class)->orderBy('id', 'asc');
    }

    public function formHmvPowerTahunans()
    {
        return $this->hasMany(FormHmvPowerTahunan::class)->orderBy('id', 'asc');
    }

    public function formHmvPowerDuaTahunans()
    {
        return $this->hasMany(FormHmvPowerDuaTahunan::class)->orderBy('id', 'asc');
    }

    public function formHmvPowerKondisionals()
    {
        return $this->hasMany(FormHmvPowerKondisional::class)->orderBy('id', 'asc');
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
    public function formEleSuratPemeriksaanRutin()
    {
        return $this->hasOne(FormEleSuratPemeriksaanRutin::class)->orderBy('id', 'asc');
    }

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

    public function formUpsDokumentasiKegiatanRutins()
    {
        return $this->hasMany(FormUpsDokumentasiKegiatanRutin::class)->orderBy('id', 'asc');
    }
    public function formUpsPengukuranPeralatanDuaMingguans()
    {
        return $this->hasMany(FormUpsPengukuranPeralatanDuaMingguan::class)->orderBy('id', 'asc');
    }
    public function formUpsPengukuranPeralatanEnamBulanans()
    {
        return $this->hasMany(FormUpsPengukuranPeralatanEnamBulanan::class)->orderBy('id', 'asc');
    }


    // NVA
    public function formNvaChecklist1Harians()
    {
        return $this->hasMany(FormNvaChecklist1Harian::class)->orderBy('id', 'asc');
    }

    public function formNvaChecklist2Harians()
    {
        return $this->hasMany(FormNvaChecklist2Harian::class)->orderBy('id', 'asc');
    }
    public function formNvaSuratIzinPelaksanaanPekerjaan()
    {
        return $this->hasOne(FormNvaSuratIzinPelaksanaanPekerjaan::class);
    }
    public function formNvaSuratPemeriksaanRutin()
    {
        return $this->hasOne(FormNvaSuratPemeriksaanRutin::class);
    }
    public function formNvaSuratPerbaikanGangguan()
    {
        return $this->hasOne(FormNvaSuratPerbaikanGangguan::class);
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
    // public function formNvaUraianPerbaikanHarian()
    // {
    //     return $this->hasOne(FormNvaUraianPerbaikanHarian::class);
    // }


    //  ----------------------------
    //  --- SVA ---

    public function formSvaChecklist1Harians()
    {
        return $this->hasMany(FormSvaChecklist1Harian::class)->orderBy('id', 'asc');
    }

    public function formSvaChecklist2Harians()
    {
        return $this->hasMany(FormSvaChecklist2Harian::class)->orderBy('id', 'asc');
    }
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
    public function formSvaSuratIzinPelaksanaanPekerjaan()
    {
        return $this->hasOne(FormSvaSuratIzinPelaksanaanPekerjaan::class);
    }
    public function formSvaSuratPemeriksaanRutin()
    {
        return $this->hasOne(FormSvaSuratPemeriksaanRutin::class);
    }
    public function formSvaSuratPerbaikanGangguan()
    {
        return $this->hasOne(FormSvaSuratPerbaikanGangguan::class);
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
    //  --- WTR ---
    public function formWtrPeralatanHarians()
    {
        return $this->hasMany(FormWtrPeralatanHarian::class)->orderBy('id', 'asc');
    }
}
