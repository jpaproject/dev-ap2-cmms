<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormApmElektrikalVehicleExteriorHJBTigaBulanan extends Model
{
    use HasFactory;

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
