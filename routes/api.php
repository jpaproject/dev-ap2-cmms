<?php

use App\Http\Controllers\api\AssetController;
use App\Http\Controllers\api\MapController;
use App\Http\Controllers\api\WorkOrderController;
use App\Http\Controllers\api\FormController;
use App\Http\Controllers\api\ReportController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskGroupController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserTechnicalController;
use App\Models\AssetMaterial;
use App\Models\DetailAssetForm;
use App\Models\Document;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Map
Route::get('assets', [MapController::class, 'getAssets']);
Route::get('legends', [MapController::class, 'getLegends']);

// Assets
Route::get('assets', [AssetController::class, 'getAssets']);
Route::post('asset-history', [AssetController::class, 'getWorkOrderAsset']);

// Dashboard
Route::post('dashboard/admin', [FormController::class, 'dashboardAdmin']);
Route::post('dashboard/tech', [FormController::class, 'dashboardTech']);

// Work Orders
Route::post('work-orders', [WorkOrderController::class, 'getWorkOrders']);
Route::get('work-order-code', [WorkOrderController::class, 'getWorkOrderCode'])->name('work-order-code');

// Get Work Order for Reports
Route::post('sva-work-orders', [ReportController::class, 'getSvaWorkOrders'])->name('sva-work-orders'); //SVA
Route::post('nva-work-orders', [ReportController::class, 'getNvaWorkOrders'])->name('nva-work-orders'); //NVA
Route::post('ups-work-orders', [ReportController::class, 'getUpsWorkOrders'])->name('ups-work-orders'); //UPS
Route::post('apm-work-orders', [ReportController::class, 'getApmWorkOrders'])->name('apm-work-orders'); //APM
Route::post('snt-work-orders', [ReportController::class, 'getSntWorkOrders'])->name('snt-work-orders'); //SNT
Route::post('ele-work-orders', [ReportController::class, 'getEleWorkOrders'])->name('ele-work-orders'); //ELE
Route::post('elp-work-orders', [ReportController::class, 'getElpWorkOrders'])->name('elp-work-orders'); //ELP
Route::post('ps1-work-orders', [ReportController::class, 'getPs1WorkOrders'])->name('ps1-work-orders'); //PS1
Route::post('ps2-work-orders', [ReportController::class, 'getPs2WorkOrders'])->name('ps2-work-orders'); //PS1


Route::get('user-technicals', [UserTechnicalController::class, 'getUserTechnicals']);
Route::get('tasks', [TaskController::class, 'getTasks']);
Route::get('task-groups', [TaskGroupController::class, 'getTaskGroups']);
Route::post('user-technical', [UserTechnicalController::class, 'getUserTechnical']);
Route::get('user-technical-groups', [UserGroupController::class, 'getUserTechnicalGroups']);
Route::post('user-technical-group', [UserGroupController::class, 'getUserTechnicalGroup']);
Route::post('user-technicals/work-orders', [UserTechnicalController::class, 'getWorkOrders']);
Route::get('asset-forms/{assetId}', function ($assetId) {
    $data['assetForms'] = DetailAssetForm::where('asset_id', $assetId)->get();
    return view('modal.asset-forms', $data);
});
Route::post('asset-form/{id}', function ($id) {
    $data['assetForm'] = DetailAssetForm::where('form_id', $id)->first()->form;
    return response()->json(['status' => '200', 'data' => $data['assetForm']]);
});

Route::get('reference-documents/{assetId}', function ($assetId) {
    $data['documents'] = Document::where('asset_id', $assetId)->get();
    return view('modal.reference-documents', $data);
});
Route::post('reference-document/{id}', function ($id) {
    $data['document'] = Document::where('id', $id)->first();
    return response()->json(['status' => '200', 'data' => $data['document']]);
});
Route::get('asset-materials/{assetId}', function ($assetId) {
    $data['assetMaterials'] = AssetMaterial::where('asset_id', $assetId)->with(['bom'])->get();
    return response()->json(['status' => '200', 'data' => $data['assetMaterials']]);
});
Route::get('materials/{id}', function ($id) {
    $data['material'] = Material::where('id', $id)->first();
    return response()->json(['status' => '200', 'data' => $data['material']]);
});
Route::post('change-material', [MaterialController::class, 'changeMaterial']);
// Route::post('generate-work-order', [ScheduleMaintenanceController::class, 'generateWorkOrder'])->name('test-generate');

Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::post('/iot/generate-work-order', [WorkOrderController::class, 'generateIotWO']);
});