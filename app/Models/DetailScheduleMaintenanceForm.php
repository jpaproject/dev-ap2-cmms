<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailScheduleMaintenanceForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_maintenance_id',
        'form_id',
    ];

    public $timestamps = true;

    public function scheduleMaintenance()
    {
        return $this->belongsTo(ScheduleMaintenance::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
