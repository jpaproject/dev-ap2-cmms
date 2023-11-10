<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\UserTechnical;
use App\Models\FormActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityLog
{
    static function startLog($detailWorkOrderForm)
    {
        $formActivityLog = new FormActivityLog();
        $formActivityLog->detail_work_order_form_id = $detailWorkOrderForm->id;
        $formActivityLog->form_id = $detailWorkOrderForm->form_id;
        $formActivityLog->work_order_id = $detailWorkOrderForm->work_order_id;
        $formActivityLog->status = 'start';
        $formActivityLog->user_technical_id = User::where('id', Auth::user()->id)->first()->id ?? null;
        $formActivityLog->time_record = now();
        $formActivityLog->save();
    }

    static function endLog($detailWorkOrderForm)
    {
        $formActivityLog = new FormActivityLog();
        $formActivityLog->detail_work_order_form_id = $detailWorkOrderForm->id;
        $formActivityLog->form_id = $detailWorkOrderForm->form_id;
        $formActivityLog->work_order_id = $detailWorkOrderForm->work_order_id;
        $formActivityLog->status = 'end';
        $formActivityLog->user_technical_id = User::where('id', Auth::user()->id)->first()->id ?? null;
        $formActivityLog->time_record = now();
        $formActivityLog->save();
    }
}
