<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPs3SumpTankBaruLamaEnamBulananTahunan extends Model
{
    use HasFactory;

    protected $table = 'form_ps3_sump_tank_lama_enam_bulanan_tahunans';

    protected $guarded = ['id'];

    public function detailWorkOrderForm()
    {
        return $this->belongsTo(DetailWorkOrderForm::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class);
    }
}