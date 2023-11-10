<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPs2GensetPhAoccDuaMingguan extends Model
{
    use HasFactory;

    protected $dateFormat = 'd-m-Y H:i:s';

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
