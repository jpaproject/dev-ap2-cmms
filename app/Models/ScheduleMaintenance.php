<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleMaintenance extends Model
{
    use HasFactory;

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

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function taskGroups()
    {
        return $this->belongsToMany(TaskGroup::class);
    }

    public function userTechnicals()
    {
        return $this->belongsToMany(User::class);
    }

    public function userGroups()
    {
        return $this->belongsToMany(UserGroup::class);
    }

    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class);
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function detailScheduleMaintenanceForms()
    {
        return $this->hasMany(DetailScheduleMaintenanceForm::class);
    }
    

    // public function updateDetailMaintenanceForm($assetFormId)
    // {
    //     if ($assetFormId) {
    //         $detailScheduleMaintenanceFormDeletes = DetailScheduleMaintenanceForm::where('schedule_maintenance_id', $this->id)->get();

    //         foreach ($assetFormId as $id) {
    //             $detailScheduleMaintenanceFormDelete = DetailScheduleMaintenanceForm::where('schedule_maintenance_id', $this->id)->where('form_id', $id)->first();
    //             if ($detailScheduleMaintenanceFormDelete) {
    //                 $newdetailScheduleMaintenanceForm = $detailScheduleMaintenanceFormDelete->replicate();
    //                 $newdetailScheduleMaintenanceForm->save();

    //                 // Tambahkan if baru untuk form yang berbeda
    //                 if ($checklistHarianGensetPs2ControlRoomDelete = ChecklistHarianGensetPs2ControlRoom::where('detail_schedule_maintenance_form_id', $detailScheduleMaintenanceFormDelete->id)->first()) {
    //                     $newChecklistHarianGensetPs2ControlRoom = $checklistHarianGensetPs2ControlRoomDelete->replicate();
    //                     $newChecklistHarianGensetPs2ControlRoom->detail_schedule_maintenance_form_id = $newdetailScheduleMaintenanceForm->id;
    //                     $newChecklistHarianGensetPs2ControlRoom->save();
    //                     $checklistHarianGensetPs2ControlRoomDelete->delete();
    //                 }

    //                 if ($checklistGensetPhAoccDelete = ChecklistGensetPhAocc::where('detail_schedule_maintenance_form_id', $detailScheduleMaintenanceFormDelete->id)->first()) {
    //                     $newChecklistGensetPhAocc = $checklistGensetPhAoccDelete->replicate();
    //                     $newChecklistGensetPhAocc->detail_schedule_maintenance_form_id = $newdetailScheduleMaintenanceForm->id;
    //                     $newChecklistGensetPhAocc->save();
    //                     $checklistGensetPhAoccDelete->delete();
    //                 }

    //                 $detailScheduleMaintenanceFormDelete->delete();
    //             } else {
    //                 $detailScheduleMaintenanceForm = new DetailScheduleMaintenanceForm();
    //                 $detailScheduleMaintenanceForm->schedule_maintenance_id = $this->id;
    //                 $detailScheduleMaintenanceForm->form_id = $id;
    //                 $detailScheduleMaintenanceForm->save();

    //             }

    //         }
    //         if ($detailScheduleMaintenanceFormDeletes->count() > 0) {
    //             foreach ($detailScheduleMaintenanceFormDeletes as $detailScheduleMaintenanceFormDelete) {
    //                 if ($checkHarianGensetPs2ControlRoom = ChecklistHarianGensetPs2ControlRoom::where('detail_schedule_maintenance_form_id', $detailScheduleMaintenanceFormDelete->id)->first()) {
    //                     $checkHarianGensetPs2ControlRoom->delete();
    //                 }
    //                 if ($checklistGensetPhAocc = ChecklistGensetPhAocc::where('detail_schedule_maintenance_form_id', $detailScheduleMaintenanceFormDelete->id)->first()) {
    //                     $checklistGensetPhAocc->delete();
    //                 }

    //             }
    //             $detailScheduleMaintenanceFormDeletes->each->delete();
    //         }
    //     } else {
    //         $detailScheduleMaintenanceForms = DetailScheduleMaintenanceForm::where('schedule_maintenance_id', $this->id)->get();
    //         foreach ($detailScheduleMaintenanceForms as $detailScheduleMaintenanceForm) {

    //             //Tambahin didalaem sini
    //             ChecklistHarianGensetPs2ControlRoom::where('detail_schedule_maintenance_form_id', $detailScheduleMaintenanceForm->id)->delete();
    //             ChecklistGensetPhAocc::where('detail_schedule_maintenance_form_id', $detailScheduleMaintenanceForm->id)->delete();

    //         }
    //         DetailScheduleMaintenanceForm::where('schedule_maintenance_id', $this->id)->delete();
    //     }

    // }
}
