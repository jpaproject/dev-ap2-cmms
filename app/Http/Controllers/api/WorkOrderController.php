<?php

namespace App\Http\Controllers\api;

use App\Models\Task;
use App\Models\Asset;
use App\Models\TaskGroup;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ReportTaskWorkOrder;
use App\Http\Controllers\Controller;

class WorkOrderController extends Controller
{
    public function getWorkOrders(Request $request)
    {
        $start_date = $request->get('date') . ' 00:00:00';
        $end_date = $request->get('date') . ' 23:59:59';

        if ($request->get('daterange') == 'month') {
            $start_date = date('Y-m-01 H:i:s', strtotime($request->get('date') . ' 00:00:00'));
            $end_date = date('Y-m-t H:i:s', strtotime($request->get('date') . ' 23:59:59'));
        } elseif ($request->get('daterange') == 'year') {
            $start_date = date('Y-01-01 H:i:s', strtotime($request->get('date') . '-01-01 00:00:00'));
            $end_date = date('Y-12-t H:i:s', strtotime($request->get('date') . '-12-31 23:59:59'));
        }

        $data['work_orders'] = WorkOrder::orderBy('id', 'desc')
            ->where('wo_status', 'manual')
            ->whereBetween('date_generate', [$start_date, $end_date])
            ->with(['asset', 'workOrderStatus', 'maintenanceType', 'scheduleMaintenance'])
            ->get();

        return response()->json(
            [
                'success' => true,
                'message' => 'Show work orders',
                'data' => $data['work_orders'],
            ],
            200,
        );
    }

    public function generateIotWO(Request $request)
    {
        $workOrder = WorkOrder::where('token', $request->token)
            ->whereNotNull('token')
            ->first();
        if ($workOrder) {
            DB::beginTransaction();
            $data['name'] = $workOrder->name;
            $data['asset_id'] = $workOrder->asset_id;
            $data['work_order_status_id'] = $workOrder->work_order_status_id;
            $data['maintenance_type_id'] = $workOrder->maintenance_type_id;
            $data['schedule_maintenance_id'] = $workOrder->schedule_maintenance_id == 0 ? null : $workOrder->schedule_maintenance_id;
            $data['priority'] = $workOrder->priority;
            $data['description'] = $workOrder->description;
            $data['suggested_completion_date'] = $workOrder->suggested_completion_date;
            $data['actual_completion_date'] = $workOrder->actual_completion_date;
            $data['completion_notes'] = $workOrder->completion_notes;
            $data['date_generate'] = date('Y-m-d H:i');
            $data['wo_status'] = 'IOT GENERATED';
            $data['token'] = null;

            $task_id = [];
            if ($workOrder->tasks) {
                foreach ($workOrder->tasks as $task) {
                    if (!in_array($task, $task_id)) {
                        array_push($task_id, $task->id);
                    }
                }
            }

            if ($workOrder->taskGroups) {
                foreach ($workOrder->taskGroups as $id) {
                    $task_group = TaskGroup::where('id', $id->id)->first();
                    foreach ($task_group->tasks as $task) {
                        if (!in_array($task->id, $task_id)) {
                            array_push($task_id, $task->id);
                        }
                    }
                }
            }

            $work_order = WorkOrder::create($data);
            $work_order->userTechnicals()->attach($workOrder->userTechnicals ? $workOrder->userTechnicals->pluck('id') : null);
            $work_order->userGroups()->attach($workOrder->userGroups ? $workOrder->userGroups->pluck('id') : null);
            $work_order->tasks()->attach($workOrder->tasks ? $workOrder->tasks->pluck('id') : null);
            $work_order->taskGroups()->attach($workOrder->taskGroups ? $workOrder->taskGroups->pluck('id') : null);
            $work_order->documents()->attach($workOrder->documents ? $workOrder->documents->pluck('id') : null);

            $tasks = [];

            foreach ($task_id as $id) {
                $task = Task::where('id', $id)->first();
                $tasks[] = [
                    'task_name' => $task->task,
                    'status' => false,
                    'work_order_id' => $work_order->id,
                    'time_estimate' => $task->time_estimate,
                ];
            }

            ReportTaskWorkOrder::insert($tasks);
            DB::commit();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Show work orders',
                    'data' => $workOrder,
                ],
                200,
            );
        } else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Token not available !',
                    'data' => null,
                ],
                200,
            );
        }
    }

    public function getWorkOrderCode(Request $request){
        $start_date = date('Y-01-01 H:i:s', strtotime(now()->year . '-01-01 00:00:00'));
        $end_date = date('Y-12-t H:i:s', strtotime(now()->year . '-12-31 23:59:59'));
        $asset = Asset::findOrFail($request->get('assetId'));
        $firstLetter = substr($asset->name, 0, 1);
        
        $woNumber = WorkOrder::orderBy('id', 'desc')
        ->where('wo_status', 'manual')
        ->whereBetween('date_generate', [$start_date, $end_date])
        ->whereHas('asset', function ($query) use ($asset) {
            $query->where('divisi_id', $asset->divisi_id);
        })
        ->get()
        ->count();
        $code = 'WO.'. $firstLetter . '.' .($woNumber == 0 ? 1 : '').'.'.now()->month.'.'.now()->year;
        return response()->json(
            [
                'success' => true,
                'message' => 'Show work orders',
                'code' => $code
            ],
            200,
        );
    }

}
