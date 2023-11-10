<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    public function detailAssetForms()
    {
        return $this->hasMany(DetailAssetForm::class);
    }

    public function detailWorkOrderForms()
    {
        return $this->hasMany(DetailWorkOrderForm::class);
    }

    public function detailScheduleMaintenanceForms()
    {
        return $this->hasMany(DetailScheduleMaintenanceForm::class);
    }

    public function checklistHarianGensetPs2ControlRoom()
    {
        return $this->hasOne(ChecklistHarianGensetPs2ControlRoom::class);
    }

    public function checklistHarianGensetPs2GensetRooms()
    {
        return $this->hasMany(ChecklistHarianGensetPs2GensetRoom::class);
    }

    public function formPs2GensetPhAoccHarian()
    {
        return $this->hasOne(FormPs2GensetPhAoccHarian::class);
    }

    public function formPs2GensetDuaMingguans()
    {
        return $this->hasMany(FormPs2GensetDuaMingguan::class);
    }

    public function formPs2GensetPhAoccDuaMingguans()
    {
        return $this->hasMany(FormPs2GensetPhAoccDuaMingguan::class);
    }

    public function formPs2GensetPhAocc()
    {
        return $this->hasOne(FormPs2GensetPhAocc::class);
    }

    public function formPs2GensetDuaMingguan()
    {
        return $this->hasOne(FormPs2GensetDuaMingguan::class);
    }
    
    public function formPs2WoDuaMingguan()
    {
        return $this->hasOne(FormPs2WoDuaMingguan::class);
    }
}
