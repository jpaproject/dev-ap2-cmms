<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Bom;
use App\Models\ScheduleMaintenance;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:dashbord-overview', ['only' => 'overview']);
        $this->middleware('permission:dashbord-maps', ['only' => 'maps']);
    }

    public function overview()
    {
        $data['page_title'] = 'Overview';
        $data['asset_count'] = Asset::all()->count();
        $data['schedule_maintenance_count'] = ScheduleMaintenance::all()->count();
        $data['bom_count'] = Bom::all()->count();

        $data['date'] = date('Y-m-d');
        $data['month'] = date('Y-m');
        $data['year'] = date('Y');

        $data['work_orders'] = DB::table('work_orders')
            ->select(DB::raw("date_trunc('day', date_generate) as date, count(*) as total_wo"))
            ->whereBetween('date_generate', [
                Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d 00:00:00'))->subDays(7),
                Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d 23:59:59'))
            ])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
        $data['work_order_count']['date'] = [];
        $data['work_order_count']['value'] = [];

        $data['totalForm'] = DB::table('detail_work_order_forms')
            ->whereBetween('date_generate', [
                Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d 00:00:00')),
                Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d 23:59:59'))
            ])
            ->join('work_orders','work_orders.id','=','detail_work_order_forms.work_order_id')
            ->select('detail_work_order_forms.form_id')
            ->count();

        $data['completeForm'] = DB::table('form_activity_logs')
            ->join('detail_work_order_forms','detail_work_order_forms.id','=','form_activity_logs.detail_work_order_form_id')
            ->join('work_orders','work_orders.id','=','form_activity_logs.work_order_id')
            ->whereBetween('date_generate', [
                Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d 00:00:00')),
                Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d 23:59:59'))
                ])
            ->select('detail_work_order_forms.form_id', 'time_record', 'form_activity_logs.status')
            ->where('status','end')
            ->count();

        foreach ($data['work_orders'] as $work_order) {
            array_push( $data['work_order_count']['date'], date('d-m-Y', strtotime($work_order->date)));
            array_push($data['work_order_count']['value'], $work_order->total_wo);
        }

        return view('dashboard.overview', $data);
    }

    public function maps()
    {
        $data['page_title'] = 'Maps';

        return view('dashboard.maps', $data);
    }
}
