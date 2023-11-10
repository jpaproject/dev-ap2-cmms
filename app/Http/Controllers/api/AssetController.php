<?php

namespace App\Http\Controllers\api;

use App\Models\Asset;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssetController extends Controller
{
    public function getAssets()
    {
        $assets = Asset::orderBy('id', 'desc')->get();
        $tree = array();

        foreach ($assets as $asset) {
            if (isset($asset->parent->id)) {
                $parent = $asset->parent->id;
            } else {
                $parent = "#";
            }

            $selected = false;
            $opened = false;
            // if($asset->id == 2){
            //     $selected = true;
            //     $opened = true;
            // }

            $tree[] = array(
                "id" => $asset->id,
                "parent" => $parent,
                "code" => $asset->code,
                "name" => $asset->name,
                "text" => $asset->name . " (" . (isset($asset->type->name) ? $asset->type->name : '') . " - " . (isset($asset->category->name) ? $asset->category->name : '') . ")",
                "icon" => asset($asset->image ? 'img/assets/' . $asset->image : 'img/types/noimage.jpg'),
                'a_attr' => array(
                    'name' => $asset->name,
                    'add_child' => "assets/create?parent=" . $asset->id,
                    'show' => "assets/" . $asset->id,
                    'edit' => "assets/" . $asset->id . '/edit',
                    'maintenance_history' => "assets/maintenance-history/" . $asset->id,
                    // 'maintenance_history' => route('assets.maintenance-history', $asset->id),
                    // Route::get('assets/maintenance-history/{$id}', [AssetController::class, 'assetsMaintenanceHistory'])->name('assets.maintenance-history');
                ),
                "state" => array("selected" => $selected, "opened" => $opened),
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'Show All Assets',
            'data' => $tree,
        ], 200);
    }

    public function getAsset(Request $request)
    {
        if ($request->get('name')) {
            $asset = Asset::where('name', $request->get('name'))->first();
        } elseif ($request->get('id')) {
            $asset = Asset::where('id', $request->get('id'))->first();
        } else {
            $asset = null;
        }

        return response()->json(['status' => '200', 'data' => $asset]);
    }

    public function getWorkOrderAsset(Request $request)
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
            ->where('asset_id', $request->get('asset'))
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
}
