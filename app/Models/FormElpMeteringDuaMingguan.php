<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormElpMeteringDuaMingguan extends Model
{
    use HasFactory;

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
