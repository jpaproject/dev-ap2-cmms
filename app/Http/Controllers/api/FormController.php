<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailWorkOrderForm;
use App\Models\FormActivityLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function dashboardAdmin(Request $request)
    {
        $start_date = $request->get('date').' 00:00:00';
        $end_date = $request->get('date').' 23:59:59';

        if ($request->get('daterange') == 'month') {
            $start_date = date("Y-m-01 H:i:s", strtotime($request->get('date').' 00:00:00'));
            $end_date = date("Y-m-t H:i:s", strtotime($request->get('date').' 23:59:59'));
        } elseif ($request->get('daterange') == 'year') {
            $start_date = date("Y-01-01 H:i:s", strtotime($request->get('date').'-01-01 00:00:00'));
            $end_date = date("Y-12-t H:i:s", strtotime($request->get('date').'-12-31 23:59:59'));
        }

        $data['totalForm'] = DB::table('detail_work_order_forms')
            ->whereBetween('date_generate', [$start_date, $end_date])
            ->join('work_orders','work_orders.id','=','detail_work_order_forms.work_order_id')
            ->select('detail_work_order_forms.form_id')
            ->count();

        $data['completeForm'] = DB::table('form_activity_logs')
            ->join('detail_work_order_forms','detail_work_order_forms.id','=','form_activity_logs.detail_work_order_form_id')
            ->join('work_orders','work_orders.id','=','form_activity_logs.work_order_id')
            ->whereBetween('date_generate', [$start_date, $end_date])
            ->select('detail_work_order_forms.form_id', 'time_record', 'form_activity_logs.status')
            ->where('status','end')
            ->count();

        return response()->json([
            'success' => true,
            'message' => 'Show All Assets',
            'data' => $data,
        ], 200);
    }

    public function dashboardTech(Request $request)
    {
        $wo = $request->get('wo');

        $start_date = $request->get('date').' 00:00:00';
        $end_date = $request->get('date').' 23:59:59';

        if ($request->get('daterange') == 'month') {
            $start_date = date("Y-m-01 H:i:s", strtotime($request->get('date').' 00:00:00'));
            $end_date = date("Y-m-t H:i:s", strtotime($request->get('date').' 23:59:59'));
        } elseif ($request->get('daterange') == 'year') {
            $start_date = date("Y-01-01 H:i:s", strtotime($request->get('date').'-01-01 00:00:00'));
            $end_date = date("Y-12-t H:i:s", strtotime($request->get('date').'-12-31 23:59:59'));
        }

        $data['totalForm'] = DB::table('detail_work_order_forms')
            ->whereIn('work_orders.id', $wo)
            ->whereBetween('date_generate', [$start_date, $end_date])
            ->join('work_orders','work_orders.id','=','detail_work_order_forms.work_order_id')
            ->select('detail_work_order_forms.form_id')
            ->count();

        $data['completeForm'] = DB::table('form_activity_logs')
            ->join('detail_work_order_forms','detail_work_order_forms.id','=','form_activity_logs.detail_work_order_form_id')
            ->join('work_orders','work_orders.id','=','form_activity_logs.work_order_id')
            ->whereIn('work_orders.id', $wo)
            ->whereBetween('date_generate', [$start_date, $end_date])
            ->select('detail_work_order_forms.form_id', 'time_record', 'form_activity_logs.status')
            ->where('status','end')
            ->count();

        return response()->json([
            'success' => true,
            'message' => 'Show All Assets',
            'data' => $data,
        ], 200);
    }
}