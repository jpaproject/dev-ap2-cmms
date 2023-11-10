<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormActivityLog extends Model
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

    // ---------- LOG ACTIVITY ----------
    public function logActivity($detailWorkOrderForm, $status){
        $formActivityLog = new FormActivityLog();
        $formActivityLog->detail_work_order_form_id = $detailWorkOrderForm->id;
        $formActivityLog->form_id = $detailWorkOrderForm->form_id;
        $formActivityLog->work_order_id = $detailWorkOrderForm->work_order_id;
        $formActivityLog->status = $status;
        $formActivityLog->user_technical_id = User::where('id', Auth::user()->id)->first() ? User::where('id', Auth::user()->id)->first()->id : null;
        $formActivityLog->time_record = now();
        $formActivityLog->save();
    }    
}
