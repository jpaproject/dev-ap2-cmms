<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BomController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FormAewController;
use App\Http\Controllers\FormApmController;
use App\Http\Controllers\FormEleController;
use App\Http\Controllers\FormElpController;
use App\Http\Controllers\FormHmvController;
use App\Http\Controllers\FormNvaController;
use App\Http\Controllers\FormPs1Controller;
use App\Http\Controllers\FormPs2Controller;
use App\Http\Controllers\FormPs3Controller;
use App\Http\Controllers\FormSntController;
use App\Http\Controllers\FormSvaController;
use App\Http\Controllers\FormUpsController;
use App\Http\Controllers\FormWtrController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportPs1Controller;
use App\Http\Controllers\ReportPs2Controller;
use App\Http\Controllers\TaskGroupController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\UserTechnicalController;
use App\Http\Controllers\LocationCategoryController;
use App\Http\Controllers\ScheduleMaintenanceController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// Authentication
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('modal-change-material/{id}', [MaterialController::class, 'changeModal'])->name('materials.change-modal');
    // Dashboard
    Route::get('overview', [DashboardController::class, 'overview'])->name('dashboard.overview');
    Route::get('maps', [DashboardController::class, 'maps'])->name('dashboard.maps');

    // Asset
    Route::get('assets/maintenance-history/{asset}', [AssetController::class, 'assetsMaintenanceHistory'])->name('assets.maintenance-history');
    Route::resource('assets', AssetController::class);
    // Set Asset
    Route::get('asset-show/setAsset', [AssetController::class, 'setAsset'])->name('assets.setAsset');

    // Schedule Maintenance
    Route::resource('schedule-maintenances', ScheduleMaintenanceController::class);

    // Work Order
    Route::get('work-orders/form-table', [WorkOrderController::class, 'tableForm'])->name('work-orders.table');
    Route::get('work-orders/form', [WorkOrderController::class, 'indexForm'])->name('work-orders.form');
    Route::get('work-orders/iot', [WorkOrderController::class, 'indexIot'])->name('work-orders.iot');
    Route::get('work-orders/iot/create', [WorkOrderController::class, 'createIot'])->name('work-orders.create.iot');
    Route::post('work-orders/iot/store', [WorkOrderController::class, 'storeIot'])->name('work-orders.store.iot');
    Route::get('work-orders/iot/{work_order}/show', [WorkOrderController::class, 'showIot'])->name('work-orders.show');
    Route::get('work-orders/iot/{id}/show', [WorkOrderController::class, 'showIot'])->name('work-orders.show.iot');
    Route::get('work-orders/iot/{id}/generate-token', [WorkOrderController::class, 'generateToken'])->name('work-orders.generate-token.iot');
    Route::resource('work-orders', WorkOrderController::class);

    // Location
    Route::resource('locations', LocationController::class);

    // Location Categories
    Route::resource('location-categories', LocationCategoryController::class)->except([
        'show',
    ]);

    //Form
    Route::get('master-data/form/', [FormController::class, 'index'])->name('form.index');
    Route::get('master-data/form/create', [FormController::class, 'create'])->name('form.create');
    Route::post('master-data/form/store', [FormController::class, 'store'])->name('form.store');
    Route::get('master-data/form/{form}', [FormController::class, 'edit'])->name('form.edit');
    Route::patch('master-data/form/{form}', [FormController::class, 'update'])->name('form.update');
    Route::delete('master-data/form/{form}', [FormController::class, 'destroy'])->name('form.destroy');

    // Form
    Route::prefix('form')->name('form.')->group(function () {
        // Route::get('edit', [FormController::class, 'index'])->name('edit');

        Route::prefix('ps1')->name('ps1.')->group(function () {
            //panel harian
            Route::get('harian-panel/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelHarian'])->name('harian-panel.index');
            Route::patch('harian-panel/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelHarianUpdate'])->name('harian-panel.update');

            //genset mobile
            Route::get('genset-mobile/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetMobile'])->name('genset-mobile.index');
            Route::patch('genset-mobile/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetMobileUpdate'])->name('genset-mobile.update');

            //genset mobile dua mingguan
            Route::get('genset-mobile-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetMobileDuaMingguan'])->name('genset-mobile-dua-mingguan.index');
            Route::patch('genset-mobile-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetMobileDuaMingguanUpdate'])->name('genset-mobile-dua-mingguan.update');

            //genset mobile tiga bulanan
            Route::get('genset-mobile-tiga-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetMobileTigaBulanan'])->name('genset-mobile-tiga-bulanan.index');
            Route::patch('genset-mobile-tiga-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetMobileTigaBulananUpdate'])->name('genset-mobile-tiga-bulanan.update');

            //genset mobile enam bulanan
            Route::get('genset-mobile-enam-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetMobileEnamBulanan'])->name('genset-mobile-enam-bulanan.index');
            Route::patch('genset-mobile-enam-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetMobileEnamBulananUpdate'])->name('genset-mobile-enam-bulanan.update');

            //genset mobile tahunan
            Route::get('genset-mobile-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetMobileTahunan'])->name('genset-mobile-tahunan.index');
            Route::patch('genset-mobile-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetMobileTahunanUpdate'])->name('genset-mobile-tahunan.update');

            //genset harian
            Route::get('genset-harian/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetHarian'])->name('genset-harian.index');
            Route::patch('genset-harian/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetHarianUpdate'])->name('genset-harian.update');

            //Control Desk Dua Mingguan
            Route::get('control-desk-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1ControlDeskDuaMingguan'])->name('control-desk-dua-mingguan.index');
            Route::patch('control-desk-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1ControlDeskDuaMingguanUpdate'])->name('control-desk-dua-mingguan.update');

            //Trafo Dua Mingguan
            Route::get('trafo-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1TrafoDuaMingguan'])->name('trafo-dua-mingguan.index');
            Route::patch('trafo-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1TrafoDuaMingguanUpdate'])->name('trafo-dua-mingguan.update');

            //Control Desk Tahunan
            Route::get('control-desk-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1ControlDeskTahunan'])->name('control-desk-tahunan.index');
            Route::patch('control-desk-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1ControlDeskTahunanUpdate'])->name('control-desk-tahunan.update');

            // FORM CEKLIST RUNTEST ONLOAD GENSET
            Route::get('test-onload-genset/{detailWorkOrderForm}', [FormPs1Controller::class, 'FormPs1TestOnloadGenset'])->name('test-onload-genset.index');
            Route::patch('test-onload-genset/{detailWorkOrderForm}', [FormPs1Controller::class, 'FormPs1TestOnloadGensetUpdate'])->name('test-onload-genset.update');

            // Form Genset Standby Perkins 2000Kva
            Route::get('form-genset-standby-no1-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyNo1DuaMingguan'])->name('form-genset-standby-no1-dua-mingguan.index');
            Route::patch('form-genset-standby-no1-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyNo1DuaMingguanUpdate'])->name('form-genset-standby-no1-dua-mingguan.update');
            Route::get('form-genset-standby-tiga-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyTigaBulanan'])->name('form-genset-standby-tiga-bulanan.index');
            Route::patch('form-genset-standby-tiga-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyTigaBulananUpdate'])->name('form-genset-standby-tiga-bulanan.update');
            Route::get('form-genset-standby-enam-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyEnamBulanan'])->name('form-genset-standby-enam-bulanan.index');
            Route::patch('form-genset-standby-enam-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyEnamBulananUpdate'])->name('form-genset-standby-enam-bulanan.update');
            Route::get('form-genset-standby-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyTahunan'])->name('form-genset-standby-tahunan.index');
            Route::patch('form-genset-standby-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyTahunanUpdate'])->name('form-genset-standby-tahunan.update');

            // Form Genset Standby Gardu Teknik
            Route::get('form-genset-standby-gardu-teknik-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyGarduDuaMingguan'])->name('form-genset-standby-gardu-teknik-dua-mingguan.index');
            Route::patch('form-genset-standby-gardu-teknik-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyGarduDuaMingguanUpdate'])->name('form-genset-standby-gardu-teknik-dua-mingguan.update');

            Route::get('form-genset-standby-gardu-teknik-tiga-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyGarduTigaBulanan'])->name('form-genset-standby-gardu-teknik-tiga-bulanan.index');
            Route::patch('form-genset-standby-gardu-teknik-tiga-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyGarduTigaBulananUpdate'])->name('form-genset-standby-gardu-teknik-tiga-bulanan.update');

            Route::get('form-genset-standby-gardu-teknik-enam-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyGarduEnamBulanan'])->name('form-genset-standby-gardu-teknik-enam-bulanan.index');
            Route::patch('form-genset-standby-gardu-teknik-enam-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyGarduEnamBulananUpdate'])->name('form-genset-standby-gardu-teknik-enam-bulanan.update');

            Route::get('form-genset-standby-gardu-teknik-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyGarduTahunan'])->name('form-genset-standby-gardu-teknik-tahunan.index');
            Route::patch('form-genset-standby-gardu-teknik-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1GensetStandbyGarduTahunanUpdate'])->name('form-genset-standby-gardu-teknik-tahunan.update');

            // FORM CEKLIST PANEL TR DUA MINGGUAN
            Route::get('panel-tr-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTRDuaMingguan'])->name('panel-tr-dua-mingguan.index');
            Route::patch('panel-tr-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTRDuaMingguanUpdate'])->name('panel-tr-dua-mingguan.update');

            // FORM CEKLIST PANEL TR ENAM BULANAN
            Route::get('panel-tr-enam-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTREnamBulanan'])->name('panel-tr-enam-bulanan.index');
            Route::patch('panel-tr-enam-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTREnamBulananUpdate'])->name('panel-tr-enam-bulanan.update');

            // FORM CEKLIST PANEL TR TAHUNAN
            Route::get('panel-tr-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTRTahunan'])->name('panel-tr-tahunan.index');
            Route::patch('panel-tr-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTRTahunanUpdate'])->name('panel-tr-tahunan.update');

            // FORM CEKLIST PANEL AUTOMATION DUA MINGGUAN
            Route::get('panel-automation-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'FormPs1PanelAutomationDuaMingguan'])->name('panel-automation-dua-mingguan.index');
            Route::patch('panel-automation-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'FormPs1PanelAutomationDuaMingguanUpdate'])->name('panel-automation-dua-mingguan.update');

            // FORM PANEL TM
            Route::get('panel-tm-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTmTahunan'])->name('panel-tm-tahunan.index');
            Route::patch('panel-tm-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTmTahunanUpdate'])->name('panel-tm-tahunan.update');
            Route::get('panel-mv-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelMvTahunan'])->name('panel-mv-tahunan.index');
            Route::patch('panel-mv-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelMvTahunanUpdate'])->name('panel-mv-tahunan.update');
            Route::get('panel-tm-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTmDuaMingguan'])->name('panel-tm-dua-mingguan.index');
            Route::patch('panel-tm-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTmDuaMingguanUpdate'])->name('panel-tm-dua-mingguan.update');
            Route::get('panel-tm-enam-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTmEnamBulanan'])->name('panel-tm-enam-bulanan.index');
            Route::patch('panel-tm-enam-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTmEnamBulananUpdate'])->name('panel-tm-enam-bulanan.update');

            // FORM PANEL TR AUX DUA MINGGUAN
            Route::get('panel-tr-aux-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTrAuxDuaMingguan'])->name('panel-tr-aux-dua-mingguan.index');
            Route::patch('panel-tr-aux-dua-mingguan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTrAuxDuaMingguanUpdate'])->name('panel-tr-aux-dua-mingguan.update');

            // FORM PANEL TR AUX ENAM BULANAN
            Route::get('panel-tr-aux-enam-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTrAuxEnamBulanan'])->name('panel-tr-aux-enam-bulanan.index');
            Route::patch('panel-tr-aux-enam-bulanan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTrAuxEnamBulananUpdate'])->name('panel-tr-aux-enam-bulanan.update');

            // FORM PANEL TR AUX TAHUNAN
            Route::get('panel-tr-aux-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTrAuxTahunan'])->name('panel-tr-aux-tahunan.index');
            Route::patch('panel-tr-aux-tahunan/{detailWorkOrderForm}', [FormPs1Controller::class, 'formPs1PanelTrAuxTahunanUpdate'])->name('panel-tr-aux-tahunan.update');
        });
        Route::prefix('ps3')->name('ps3.')->group(function () {
            //panel harian
            Route::get('harian-panel/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3PanelHarian'])->name('harian-panel.index');
            Route::patch('harian-panel/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3PanelHarianUpdate'])->name('harian-panel.update');
            Route::get('panel-sdp-dua-mingguan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3PanelSdpDuaMingguan'])->name('panel-sdp-dua-mingguan.index');
            Route::patch('panel-sdp-dua-mingguan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3PanelSdpDuaMingguanUpdate'])->name('panel-sdp-dua-mingguan.update');
            Route::get('ruang-tenaga-dua-mingguan/{detailWorkOrderForm}', [FormPs3Controller::class, 'dummy'])->name('ruang-tenaga-dua-mingguan.index');
            Route::patch('ruang-tenaga-dua-mingguan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3RuangTenagaDuaMingguanUpdate'])->name('ruang-tenaga-dua-mingguan.update');
            Route::get('main-tank-lama-dua-mingguan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3MainTankLamaDuaMingguan'])->name('main-tank-lama-dua-mingguan.index');
            Route::get('epcc-dua-mingguan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3EpccDuaMingguan'])->name('epcc-dua-mingguan.index');
            Route::patch('main-tank-lama-dua-mingguan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3MainTankLamaDuaMingguanUpdate'])->name('main-tank-lama-dua-mingguan.update');
            Route::patch('epcc-dua-mingguan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3EpccDuaMingguanUpdate'])->name('epcc-dua-mingguan.update');
            Route::get('crane-genset-tiga-bulanan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3CraneGensetTigaBulanan'])->name('crane-genset-tiga-bulanan.index');
            Route::patch('crane-genset-tiga-bulanan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3CraneGensetTigaBulananUpdate'])->name('crane-genset-tiga-bulanan.update');
            Route::get('genset-tiga-bulanan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3GensetTigaBulanan'])->name('genset-tiga-bulanan.index');
            Route::patch('genset-tiga-bulanan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3GensetTigaBulananUpdate'])->name('genset-tiga-bulanan.update');
            Route::get('genset-dua-mingguan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3GensetDuaMingguan'])->name('genset-dua-mingguan.index');
            Route::patch('genset-dua-mingguan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3GensetDuaMingguanUpdate'])->name('genset-dua-mingguan.update');
            Route::get('ground-tank-baru-dua-mingguan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3GroundTankBaruDuaMingguan'])->name('ground-tank-baru-dua-mingguan.index');
            Route::patch('ground-tank-baru-dua-mingguan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3GroundTankBaruDuaMingguanUpdate'])->name('ground-tank-baru-dua-mingguan.update');
            Route::get('genset-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3GensetEnamBulananTahunan'])->name('genset-enam-bulanan-tahunan.index');
            Route::patch('genset-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3GensetEnamBulananTahunanUpdate'])->name('genset-enam-bulanan-tahunan.update');

            Route::get('panel-pompa-bbm-baru-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3PanelPompaBbmBaruEnamBulananTahunan'])->name('panel-pompa-bbm-baru-enam-bulanan-tahunan.index');
            Route::patch('panel-pompa-bbm-baru-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3PanelPompaBbmBaruEnamBulananTahunanUpdate'])->name('panel-pompa-bbm-baru-enam-bulanan-tahunan.update');

            Route::get('panel-pompa-bbm-lama-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3PanelPompaBbmLamaEnamBulananTahunan'])->name('panel-pompa-bbm-lama-enam-bulanan-tahunan.index');
            Route::patch('panel-pompa-bbm-lama-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3PanelPompaBbmLamaEnamBulananTahunanUpdate'])->name('panel-pompa-bbm-lama-enam-bulanan-tahunan.update');

            Route::get('lvmdp-check-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3LvmdpCheckEnamBulananTahunan'])->name('lvmdp-check-enam-bulanan-tahunan.index');
            Route::patch('lvmdp-check-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3LvmdpCheckEnamBulananTahunanUpdate'])->name('lvmdp-check-enam-bulanan-tahunan.update');
            Route::get('trafo-tiga-bulanan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3TrafoTigaBulanan'])->name('trafo-tiga-bulanan.index');
            Route::patch('trafo-tiga-bulanan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3TrafoTigaBulananUpdate'])->name('trafo-tiga-bulanan.update');
            Route::get('epcc-simulator-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3EpccSimulatorEnamBulananTahunan'])->name('epcc-simulator-enam-bulanan-tahunan.index');
            Route::patch('epcc-simulator-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3EpccSimulatorEnamBulananTahunanUpdate'])->name('epcc-simulator-enam-bulanan-tahunan.update');
            Route::get('epcc-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3EpccEnamBulananTahunan'])->name('epcc-enam-bulanan-tahunan.index');
            Route::patch('epcc-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3EpccEnamBulananTahunanUpdate'])->name('epcc-enam-bulanan-tahunan.update');
            Route::get('genset-check-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3GensetCheckEnamBulananTahunan'])->name('genset-check-enam-bulanan-tahunan.index');
            Route::patch('genset-check-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3GensetCheckEnamBulananTahunanUpdate'])->name('genset-check-enam-bulanan-tahunan.update');
            Route::get('panel-kontrol-pompa-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3PanelKontrolPompaEnamBulananTahunan'])->name('panel-kontrol-pompa-enam-bulanan-tahunan.index');
            Route::patch('panel-kontrol-pompa-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3PanelKontrolPompaEnamBulananTahunanUpdate'])->name('panel-kontrol-pompa-enam-bulanan-tahunan.update');
            Route::get('main-tank-baru-lama-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3MainTankBaruLamaEnamBulananTahunan'])->name('main-tank-baru-lama-enam-bulanan-tahunan.index');
            Route::patch('main-tank-baru-lama-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3MainTankBaruLamaEnamBulananTahunanUpdate'])->name('main-tank-baru-lama-enam-bulanan-tahunan.update');
            Route::get('sump-tank-baru-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3SumpTankBaruEnamBulananTahunan'])->name('sump-tank-baru-enam-bulanan-tahunan.index');
            Route::patch('sump-tank-baru-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3SumpTankBaruEnamBulananTahunanUpdate'])->name('sump-tank-baru-enam-bulanan-tahunan.update');
            Route::get('sump-tank-lama-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3SumpTankLamaEnamBulananTahunan'])->name('sump-tank-lama-enam-bulanan-tahunan.index');
            Route::patch('sump-tank-lama-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3SumpTankLamaEnamBulananTahunanUpdate'])->name('sump-tank-lama-enam-bulanan-tahunan.update');
            Route::get('trafo-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3TrafoEnamBulananTahunan'])->name('trafo-enam-bulanan-tahunan.index');
            Route::patch('trafo-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3TrafoEnamBulananTahunanUpdate'])->name('trafo-enam-bulanan-tahunan.update');
            Route::get('panel-mv-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3PanelMvEnamBulananTahunan'])->name('panel-mv-enam-bulanan-tahunan.index');
            Route::patch('panel-mv-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3PanelMvEnamBulananTahunanUpdate'])->name('panel-mv-enam-bulanan-tahunan.update');
            Route::get('trafo-genset-check-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3TrafoGensetEnamBulananTahunan'])->name('trafo-genset-check-enam-bulanan-tahunan.index');
            Route::patch('trafo-genset-check-enam-bulanan-tahunan/{detailWorkOrderForm}', [FormPs3Controller::class, 'formPs3TrafoGensetEnamBulananTahunanUpdate'])->name('trafo-genset-check-enam-bulanan-tahunan.update');

        });

        Route::prefix('ps2')->name('ps2.')->group(function () {

            Route::get('/', [FormController::class, 'indexPS'])->name('index');
            Route::get('genset-ph-aocc', [FormController::class, 'gensetPhAocc'])->name('genset-ph-aocc');
            Route::get('harian-panel-lv', [FormController::class, 'harianPanelLv'])->name('harian-panel-lv');
            Route::get('harian-panel', [FormController::class, 'harianPanel'])->name('harian-panel');
            Route::get('control-room', [FormController::class, 'harianPanel'])->name('harian-panel');

            Route::get('check-ph-aocc', [FormController::class, 'phAoccForm'])->name('check-ph-aocc');
            // Route::get('data-parameter-dua-mingguan-genset-ph-aocc', [FormController::class, 'dataParameterDuaMingguanGensetPhAocc'])->name('data-parameter-dua-mingguan-genset-ph-aocc');
            // Route::get('data-parameter-dua-mingguan-genset-ps-dua', [FormController::class, 'dataParameterDuaMingguanGensetPsDua'])->name('data-parameter-dua-mingguan-genset-ps-dua');
            Route::get('data-parameter-dua-mingguan-genset-mps-dua', [FormController::class, 'dataParameterDuaMingguanGenset'])->name('data-parameter-dua-mingguan-genset-mps-dua');
            Route::get('data-parameter-dua-mingguan-ground-tank', [FormController::class, 'dataParameterDuaMingguanGroundTank'])->name('data-parameter-dua-mingguan-ground-tank');
            Route::get('data-parameter-dua-mingguan-panel-sdp-epcc-exhaust-fan', [FormController::class, 'dataParameterDuaMingguanPanelSdpEpccExhaustFan'])->name('data-parameter-dua-mingguan-panel-sdp-epcc-exhaust-fan');
            // Route::get('laporan-pemeliharaan-enam-bulanan', [FormController::class, 'formPs2PemeliharaanEnamBulanan'])->name('laporan-pemeliharaan-enam-bulanan');
            Route::get('trees-unit-mps-dua', [FormController::class, 'treesUnitMpsDua'])->name('trees-unit-mps-dua');
            Route::get('genset-running', [FormController::class, 'gensetRunning'])->name('genset-running');
            Route::get('laporan-harian-dinas-operasional-teknis', [FormController::class, 'laporanHarianDinasOperasionalTeknis'])->name('laporan-harian-dinas-operasional-teknis');
            Route::get('data-parameter-dua-mingguan-ruang-tenaga', [FormController::class, 'dataParameterDuaMingguanRuangTenaga'])->name('data-parameter-dua-mingguan-ruang-tenaga');

            // Power Station 2 Checklist Harian Genset PS2
            Route::get('checklist-genset-harian/{detailWorkOrderForm}', [FormController::class, 'formPs2ChecklistGensetHarian'])->name('checklist-genset-harian.index');
            Route::patch('checklist-genset-harian/{detailWorkOrderForm}', [FormController::class, 'formPs2ChecklistGensetHarianUpdate'])->name('checklist-genset-harian.update');

            // Power Station 2 Checklist Harian Genset PS2 Control Room
            Route::get('checklist-harian-genset-ps2/control-room/{detailWorkOrderForm}', [FormController::class, 'checklistHarianGensetPs2ControlRoom'])->name('checklist-harian-genset-ps2.control-room.index');
            Route::patch('checklist-harian-genset-ps2/control-room/{detailWorkOrderForm}', [FormController::class, 'checklistHarianGensetPs2ControlRoomUpdate'])->name('checklist-harian-genset-ps2.control-room.update');

            // Power Station 2 Checklist Harian Genset PS2 Genset Room
            Route::get('checklist-harian-genset-ps2/genset-room/{detailWorkOrderForm}', [FormController::class, 'checklistHarianGensetPs2GensetRoom'])->name('checklist-harian-genset-ps2.genset-room.index');
            Route::patch('checklist-harian-genset-ps2/genset-room/{detailWorkOrderForm}', [FormController::class, 'checklistHarianGensetPs2GensetRoomUpdate'])->name('checklist-harian-genset-ps2.genset-room.update');

            // Power Station 2 Checklist Genset PH AOCC
            Route::get('checklist-genset-ph-aocc/{detailWorkOrderForm}', [FormController::class, 'checklistGensetPhAocc'])->name('checklist-genset-ph-aocc.index');
            Route::patch('checklist-genset-ph-aocc/{detailWorkOrderForm}', [FormController::class, 'checklistGensetPhAoccUpdate'])->name('checklist-genset-ph-aocc.update');

            // Power Station 2 FORM CHECKLIST HARIAN PANEL LV MPS 2
            Route::get('checklist-harian-panel-lv/{detailWorkOrderForm}', [FormController::class, 'formPs2ChecklistPanelLvHarian'])->name('harian-panel-lv.index');
            Route::patch('checklist-harian-panel-lv/{detailWorkOrderForm}', [FormController::class, 'formPs2ChecklistPanelLvHarianUpdate'])->name('harian-panel-lv.update');

            // Power Station 2 FORM GENSET RUNNING
            Route::get('harian-panel/{detailWorkOrderForm}', [FormPs2Controller::class, 'formPs2PanelHarian'])->name('harian-panel.index');
            Route::patch('harian-panel/{detailWorkOrderForm}', [FormPs2Controller::class, 'formPs2PanelHarianUpdate'])->name('harian-panel.update');

            // Power Station 2 FORM PANEL
            Route::get('genset-running/{detailWorkOrderForm}', [FormController::class, 'formPs2gensetRunningHarian'])->name('genset-running.index');
            Route::patch('genset-running/{detailWorkOrderForm}', [FormController::class, 'formPs2gensetRunningHarianUpdate'])->name('genset-running.update');

            // Power Station 2 Form Data Parameter 2 Mingguan Genset PH AOCC
            Route::get('genset-ph-aocc-dua-mingguan/{detailWorkOrderForm}', [FormController::class, 'formPs2GensetPhAoccDuaMingguan'])->name('genset-ph-aocc-dua-mingguan.index');
            Route::patch('genset-ph-aocc-dua-mingguan/{detailWorkOrderForm}', [FormController::class, 'formPs2GensetPhAoccDuaMingguanUpdate'])->name('genset-ph-aocc-dua-mingguan.update');

            // Power Station 2 Form Data Parameter 2 Mingguan Genset
            Route::get('genset-dua-mingguan/{detailWorkOrderForm}', [FormController::class, 'formPs2GensetDuaMingguan'])->name('genset-dua-mingguan.index');
            Route::patch('genset-dua-mingguan/{detailWorkOrderForm}', [FormController::class, 'formPs2GensetDuaMingguanUpdate'])->name('genset-dua-mingguan.update');

            // Power Station 2 Form Data Parameter 2 Mingguan Ground Tank
            Route::get('ground-tank-dua-mingguan/{detailWorkOrderForm}', [FormController::class, 'formPs2GroundTankDuaMingguan'])->name('ground-tank-dua-mingguan.index');
            Route::patch('ground-tank-dua-mingguan/{detailWorkOrderForm}', [FormController::class, 'formPs2GroundTankDuaMingguanUpdate'])->name('ground-tank-dua-mingguan.update');

            // Power Station 2 Form Panel Ph Aocc
            Route::get('panel-ph-aocc/{detailWorkOrderForm}', [FormController::class, 'formPs2PanelPhAocc'])->name('panel-ph-aocc.index');
            Route::patch('panel-ph-aocc/{detailWorkOrderForm}', [FormController::class, 'formPs2PanelPhAoccUpdate'])->name('panel-ph-aocc.update');

            // Power Station 2 Form Genset 2 Mingguan
            Route::get('data-parameter-dua-mingguan-genset-mps-dua/{detailWorkOrderForm}', [FormController::class, 'dataParameterDuaMingguanGensetIndex'])->name('data-parameter-dua-mingguan-genset-mps-dua.index');
            Route::patch('data-parameter-dua-mingguan-genset-mps-dua/{detailWorkOrderForm}', [FormController::class, 'dataParameterDuaMingguanGensetUpdate'])->name('data-parameter-dua-mingguan-genset-mps-dua.update');

            // Power Station 2 Form Panel 2 Mingguan
            Route::get('data-parameter-dua-mingguan-panel-sdp-epcc-exhaust-fan/{detailWorkOrderForm}', [FormController::class, 'dataParameterDuaMingguanPanelSdpEpccExhaustFanIndex'])->name('data-parameter-dua-mingguan-panel-sdp-epcc-exhaust-fan.index');
            Route::patch('data-parameter-dua-mingguan-panel-sdp-epcc-exhaust-fan/{detailWorkOrderForm}', [FormController::class, 'dataParameterDuaMingguanPanelSdpEpccExhaustFanUpdate'])->name('data-parameter-dua-mingguan-panel-sdp-epcc-exhaust-fan.update');

            // Power Station 2 Form Ruang Tenaga 2 Mingguan
            Route::get('data-parameter-dua-mingguan-ruang-tenaga/{detailWorkOrderForm}', [FormController::class, 'dataParameterDuaMingguanRuangTenagaIndex'])->name('data-parameter-dua-mingguan-ruang-tenaga.index');
            Route::patch('data-parameter-dua-mingguan-ruang-tenaga/{detailWorkOrderForm}', [FormController::class, 'dataParameterDuaMingguanRuangTenagaUpdate'])->name('data-parameter-dua-mingguan-ruang-tenaga.update');

            // Power Station 2 Form Pemeliharaan Enam Bulanan
            Route::get('laporan-pemeliharaan-enam-bulanan/{detailWorkOrderForm}', [FormController::class, 'formPs2PemeliharaanEnamBulanan'])->name('laporan-pemeliharaan-enam-bulanan.index');
            Route::patch('laporan-pemeliharaan-enam-bulanan/{detailWorkOrderForm}', [FormController::class, 'formPs2PemeliharaanEnamBulananUpdate'])->name('laporan-pemeliharaan-enam-bulanan.update');

            // Power Station 2 WO Dua Mingguan
            Route::get('tasklist-wo-dua-mingguan', [FormController::class, 'formPs2WoDuaMingguan'])->name('tasklist-wo-dua-mingguan.index');

            // Power Station 2 WO Tiga Bulanan
            Route::get('tasklist-wo-tiga-bulanan', [FormController::class, 'formPs2WoTigaBulanan'])->name('tasklist-wo-tiga-bulanan.index');

            // --------------------------------
            // -------Power Station 3

            // Power Station 3 Checklist Harian Genset PS3 Control Room
            Route::get('checklist-harian-genset-ps3/control-room/{detailWorkOrderForm}', [FormController::class, 'checklistHarianGensetPs3ControlRoom'])->name('checklist-harian-genset-ps3.control-room.index');
            Route::patch('checklist-harian-genset-ps3/control-room/{detailWorkOrderForm}', [FormController::class, 'checklistHarianGensetPs3ControlRoomUpdate'])->name('checklist-harian-genset-ps3.control-room.update');

            // Power Station 3 Checklist Harian Genset PS3 Genset Room
            Route::get('checklist-harian-genset-ps3/genset-room/{detailWorkOrderForm}', [FormController::class, 'checklistHarianGensetPs3GensetRoom'])->name('checklist-harian-genset-ps3.genset-room.index');
            Route::patch('checklist-harian-genset-ps3/genset-room/{detailWorkOrderForm}', [FormController::class, 'checklistHarianGensetPs3GensetRoomUpdate'])->name('checklist-harian-genset-ps3.genset-room.update');

            //panel harian

        });

    // HV & MV Station
        Route::prefix('hmv')->name('hmv.')->group(function () {
            Route::get('/', [FormController::class, 'indexHVMV'])->name('index');
            Route::get('checklist-gis', [FormController::class, 'harianGIS'])->name('harian-gis');
            Route::get('checklist-ts', [FormController::class, 'harianTM'])->name('harian-tm');
            Route::get('log-book', [FormController::class, 'logBook'])->name('log-book');
            // Route::get('metering', [FormController::class, 'metering'])->name('metering');
            Route::get('log.harian/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvLogharian'])->name('log.harian.index');
            Route::patch('log.harian/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvLogharianUpdate'])->name('log.harian.update');

            Route::get('metering.harian/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvMeteranharian'])->name('metering.harian.index');
            Route::patch('metering.harian/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvMeteranharianUpdate'])->name('metering.harian.update');

            Route::prefix('sistem-pelaporan')->name('sistem-pelaporan.')->group(function () {
                Route::get('/', [FormController::class, 'sistemPelaporan'])->name('index');

                Route::prefix('gis')->name('gis.')->group(function () {
                    Route::get('/', [FormController::class, 'sistemPelaporanGIS'])->name('index');
                    Route::get('harian/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvGisHarian'])->name('harian.index');
                    Route::patch('harian/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvGisHarianUpdate'])->name('harian.update');
                    Route::get('bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvGisBulanan'])->name('bulanan.index');
                    Route::patch('bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvGisBulananUpdate'])->name('bulanan.update');
                    Route::get('tiga-bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvGisTigaBulanan'])->name('tiga-bulanan.index');
                    Route::patch('tiga-bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvGisTigaBulananUpdate'])->name('tiga-bulanan.update');
                    Route::get('tahunan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvGisTahunan'])->name('tahunan.index');
                    Route::patch('tahunan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvGisTahunanUpdate'])->name('tahunan.update');
                    Route::get('dua-tahunan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvGisDuaTahunan'])->name('dua-tahunan.index');
                    Route::patch('dua-tahunan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvGisDuaTahunanUpdate'])->name('dua-tahunan.update');
                    Route::get('kondisional/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvGisKondisional'])->name('kondisional.index');
                    Route::patch('kondisional/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvGisKondisionalUpdate'])->name('kondisional.update');
                });

                Route::prefix('panel')->name('panel.')->group(function () {
                    Route::get('/', [FormController::class, 'sistemPelaporanPanel'])->name('index');
                    // Route::get('bulanan', [FormController::class, 'bulananPanel'])->name('bulanan');
                    // Route::get('tiga-bulanan', [FormController::class, 'tigaBulananPanel'])->name('tiga-bulanan');
                    Route::get('harian/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPanelTmharian'])->name('harian.index');
                    Route::patch('harian/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPanelTmharianUpdate'])->name('harian.update');
                    Route::get('bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPanelBulanan'])->name('bulanan.index');
                    Route::patch('bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPanelBulananUpdate'])->name('bulanan.update');
                    Route::get('tiga-bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPanelTigaBulanan'])->name('tiga-bulanan.index');
                    Route::patch('tiga-bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPanelTigaBulananUpdate'])->name('tiga-bulanan.update');

                });

                Route::prefix('power')->name('power.')->group(function () {
                    Route::get('/', [FormController::class, 'sistemPelaporanTransformer'])->name('index');
                    // Route::get('mingguan', [FormController::class, 'mingguanTransformer'])->name('mingguan');
                    // Route::get('bulanan', [FormController::class, 'bulananTransformer'])->name('bulanan');
                    // Route::get('tiga-bulanan', [FormController::class, 'tigaBulananTransformer'])->name('tiga-bulanan');
                    // Route::get('triwulan', [FormController::class, 'triwulanTransformer'])->name('triwulan');
                    // Route::get('tahunan', [FormController::class, 'tahunanTransformer'])->name('tahunan');
                    // Route::get('semesteran', [FormController::class, 'semesteranTransformer'])->name('semesteran');
                    // Route::get('dua-tahunan', [FormController::class, 'duaTahunanTransformer'])->name('dua-tahunan');
                    // Route::get('kondisional', [FormController::class, 'kondisionalTransformer'])->name('kondisional');

                    Route::get('mingguan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerMingguan'])->name('mingguan.index');
                    Route::patch('mingguan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerMingguanUpdate'])->name('mingguan.update');
                    Route::get('bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerBulanan'])->name('bulanan.index');
                    Route::patch('bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerBulananUpdate'])->name('bulanan.update');
                    Route::get('tiga-bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerTigaBulanan'])->name('tiga-bulanan.index');
                    Route::patch('tiga-bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerTigaBulananUpdate'])->name('tiga-bulanan.update');
                    Route::get('enam-bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerEnamBulanan'])->name('enam-bulanan.index');
                    Route::patch('enam-bulanan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerEnamBulananUpdate'])->name('enam-bulanan.update');
                    Route::get('tahunan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerTahunan'])->name('tahunan.index');
                    Route::patch('tahunan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerTahunanUpdate'])->name('tahunan.update');
                    Route::get('dua-tahunan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerDuaTahunan'])->name('dua-tahunan.index');
                    Route::patch('dua-tahunan/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerDuaTahunanUpdate'])->name('dua-tahunan.update');
                    Route::get('kondisional/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerKondisional'])->name('kondisional.index');
                    Route::patch('kondisional/{detailWorkOrderForm}', [FormHmvController::class, 'formHmvPowerKondisionalUpdate'])->name('kondisional.update');

                });
            });
        });

        // ELECTRICAL PROTECTION
        Route::prefix('elp')->name('elp.')->group(function () {
            Route::get('daily/{detailWorkOrderForm}', [FormElpController::class, 'formElpDaily'])->name('daily.index');
            Route::patch('daily/{detailWorkOrderForm}', [FormElpController::class, 'formElpDailyUpdate'])->name('daily.update');
            Route::get('daily-gh/{detailWorkOrderForm}', [FormElpController::class, 'formElpDailyGh'])->name('daily-gh.index');
            Route::patch('daily-gh/{detailWorkOrderForm}', [FormElpController::class, 'formElpDailyGhUpdate'])->name('daily-gh.update');
            Route::get('metering-dua-mingguan/{detailWorkOrderForm}', [FormElpController::class, 'formElpMeteringDuaMingguan'])->name('metering-dua-mingguan.index');
            Route::patch('metering-dua-mingguan/{detailWorkOrderForm}', [FormElpController::class, 'formElpMeteringDuaMingguanUpdate'])->name('metering-dua-mingguan.update');
            Route::get('trafo-dua-mingguan/{detailWorkOrderForm}', [FormElpController::class, 'formElpTrafoDuaMingguan'])->name('trafo-dua-mingguan.index');
            Route::patch('trafo-dua-mingguan/{detailWorkOrderForm}', [FormElpController::class, 'formElpTrafoDuaMingguanUpdate'])->name('trafo-dua-mingguan.update');
            Route::get('relay-dua-mingguan/{detailWorkOrderForm}', [FormElpController::class, 'formElpRelayDuaMingguan'])->name('relay-dua-mingguan.index');
            Route::patch('relay-dua-mingguan/{detailWorkOrderForm}', [FormElpController::class, 'formElpRelayDuaMingguanUpdate'])->name('relay-dua-mingguan.update');
            Route::get('laporan-kerusakan/{detailWorkOrderForm}', [FormElpController::class, 'formElpLaporanKerusakan'])->name('laporan-kerusakan.index');
            Route::patch('laporan-kerusakan/{detailWorkOrderForm}', [FormElpController::class, 'formElpLaporanKerusakanUpdate'])->name('laporan-kerusakan.update');

            Route::get('plc-dua-mingguan/{detailWorkOrderForm}', [FormElpController::class, 'formElpPlcDuaMingguan'])->name('plc-dua-mingguan.index');
            Route::patch('plc-dua-mingguan/{detailWorkOrderForm}', [FormElpController::class, 'formElpPlcDuaMingguanUpdate'])->name('plc-dua-mingguan.update');
            Route::get('tahunan/{detailWorkOrderForm}', [FormElpController::class, 'formElpTahunan'])->name('tahunan.index');
            Route::patch('tahunan/{detailWorkOrderForm}', [FormElpController::class, 'formElpTahunanUpdate'])->name('tahunan.update');
            Route::get('partly-enam-bulanan/{detailWorkOrderForm}', [FormElpController::class, 'formElpPartlyEnamBulanan'])->name('partly-enam-bulanan.index');
            Route::patch('partly-enam-bulanan/{detailWorkOrderForm}', [FormElpController::class, 'formElpPartlyEnamBulananUpdate'])->name('partly-enam-bulanan.update');
        });

        // APM
        Route::prefix('apm')->name('apm.')->group(function () {
            Route::get('vehicle-carbody-harian/{detailWorkOrderForm}', [FormApmController::class, 'formApmVehicleCarBodyHarian'])->name('vehicle-carbody-harian.index');
            Route::patch('vehicle-carbody-harian/{detailWorkOrderForm}', [FormApmController::class, 'formApmVehicleCarBodyHarianUpdate'])->name('vehicle-carbody-harian.update');
            Route::get('vehicle-air-brake-system-harian/{detailWorkOrderForm}', [FormApmController::class, 'formApmVehicleAirBrakeSystemHarian'])->name('vehicle-air-brake-system-harian.index');
            Route::patch('vehicle-air-brake-system-harian/{detailWorkOrderForm}', [FormApmController::class, 'formApmVehicleAirBrakeSystemHarianUpdate'])->name('vehicle-air-brake-system-harian.update');
            Route::get('vehicle-bogie-harian/{detailWorkOrderForm}', [FormApmController::class, 'formApmMekanikalVehicleBogieHarian'])->name('vehicle-bogie-harian.index');
            Route::patch('vehicle-bogie-harian/{detailWorkOrderForm}', [FormApmController::class, 'formApmMekanikalVehicleBogieHarianUpdate'])->name('vehicle-bogie-harian.update');
            Route::get('vehicle-mingguan/{detailWorkOrderForm}', [FormApmController::class, 'formApmMekanikalVehicleMingguan'])->name('vehicle-mingguan.index');
            Route::patch('vehicle-mingguan/{detailWorkOrderForm}', [FormApmController::class, 'formApmMekanikalVehicleMingguanUpdate'])->name('vehicle-mingguan.update');
            Route::get('vehicle-bogie-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmMekanikalVehicleBogieTigaBulanan'])->name('vehicle-bogie-tiga-bulanan.index');
            Route::patch('vehicle-bogie-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmMekanikalVehicleBogieTigaBulananUpdate'])->name('vehicle-bogie-tiga-bulanan.update');
            Route::get('vehicle-air-brake-system-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmMekanikalVehicleAirBrakeSystemTigaBulanan'])->name('vehicle-air-brake-system-tiga-bulanan.index');
            Route::patch('vehicle-air-brake-system-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmMekanikalVehicleAirBrakeSystemTigaBulananUpdate'])->name('vehicle-air-brake-system-tiga-bulanan.update');
            Route::get('vehicle-carbody-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmMekanikalVehicleCarBodyTigaBulanan'])->name('vehicle-carbody-tiga-bulanan.index');
            Route::patch('vehicle-carbody-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmMekanikalVehicleCarBodyTigaBulananUpdate'])->name('vehicle-carbody-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-harian/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorHarian'])->name('elektrikal-vehicle-exterior-harian.index');
            Route::patch('elektrikal-vehicle-exterior-harian/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorHarianUpdate'])->name('elektrikal-vehicle-exterior-harian.update');
            Route::get('elektrikal-vehicle-interior-harian/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleInteriorHarian'])->name('elektrikal-vehicle-interior-harian.index');
            Route::patch('elektrikal-vehicle-interior-harian/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleInteriorHarianUpdate'])->name('elektrikal-vehicle-interior-harian.update');
            Route::get('elektrikal-vehicle-exterior-mingguan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorMingguan'])->name('elektrikal-vehicle-exterior-mingguan.index');
            Route::patch('elektrikal-vehicle-exterior-mingguan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorMingguanUpdate'])->name('elektrikal-vehicle-exterior-mingguan.update');
            Route::get('elektrikal-vehicle-interior-gd-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleInteriorGDTigaBulanan'])->name('elektrikal-vehicle-interior-gd-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-interior-gd-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleInteriorGDTigaBulananUpdate'])->name('elektrikal-vehicle-interior-gd-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-interior-mc-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleInteriorMCTigaBulanan'])->name('elektrikal-vehicle-interior-mc-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-interior-mc-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleInteriorMCTigaBulananUpdate'])->name('elektrikal-vehicle-interior-mc-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-interior-tcms-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleInteriorTCMSTigaBulanan'])->name('elektrikal-vehicle-interior-tcms-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-interior-tcms-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleInteriorTCMSTigaBulananUpdate'])->name('elektrikal-vehicle-interior-tcms-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-interior-lpl-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleInteriorLPLTigaBulanan'])->name('elektrikal-vehicle-interior-lpl-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-interior-lpl-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleInteriorLPLTigaBulananUpdate'])->name('elektrikal-vehicle-interior-lpl-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-bec-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorBECTigaBulanan'])->name('elektrikal-vehicle-exterior-bec-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-bec-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorBECTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-bec-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-dc-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorDCTigaBulanan'])->name('elektrikal-vehicle-exterior-dc-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-dc-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorDCTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-dc-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-esk-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorESKTigaBulanan'])->name('elektrikal-vehicle-exterior-esk-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-esk-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorESKTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-esk-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-fjb-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorFJBTigaBulanan'])->name('elektrikal-vehicle-exterior-fjb-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-fjb-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorFJBTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-fjb-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-hjb-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorHJBTigaBulanan'])->name('elektrikal-vehicle-exterior-hjb-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-hjb-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorHJBTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-hjb-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-hscb-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorHSCBTigaBulanan'])->name('elektrikal-vehicle-exterior-hscb-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-hscb-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorHSCBTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-hscb-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-ljb-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorLJBTigaBulanan'])->name('elektrikal-vehicle-exterior-ljb-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-ljb-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorLJBTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-ljb-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-pcs-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorPCSTigaBulanan'])->name('elektrikal-vehicle-exterior-pcs-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-pcs-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorPCSTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-pcs-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-siv-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorSIVTigaBulanan'])->name('elektrikal-vehicle-exterior-siv-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-siv-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorSIVTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-siv-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-lht-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorLHTTigaBulanan'])->name('elektrikal-vehicle-exterior-lht-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-lht-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorLHTTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-lht-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-tm-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorTMTigaBulanan'])->name('elektrikal-vehicle-exterior-tm-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-tm-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorTMTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-tm-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-vac-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorVACTigaBulanan'])->name('elektrikal-vehicle-exterior-vac-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-vac-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorVACTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-vac-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-eh-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorEHTigaBulanan'])->name('elektrikal-vehicle-exterior-eh-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-eh-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorEHTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-eh-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-jp-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorJPTigaBulanan'])->name('elektrikal-vehicle-exterior-jp-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-jp-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorJPTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-jp-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-mds-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorMDSTigaBulanan'])->name('elektrikal-vehicle-exterior-mds-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-mds-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorMDSTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-mds-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-vv-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorVVTigaBulanan'])->name('elektrikal-vehicle-exterior-vv-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-vv-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorVVTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-vv-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-pc-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorPCTigaBulanan'])->name('elektrikal-vehicle-exterior-pc-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-pc-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorPCTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-pc-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-interior-fds-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleInteriorFDSTigaBulanan'])->name('elektrikal-vehicle-interior-fds-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-interior-fds-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleInteriorFDSTigaBulananUpdate'])->name('elektrikal-vehicle-interior-fds-tiga-bulanan.update');
            Route::get('elektrikal-vehicle-exterior-bat-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorBATTigaBulanan'])->name('elektrikal-vehicle-exterior-bat-tiga-bulanan.index');
            Route::patch('elektrikal-vehicle-exterior-bat-tiga-bulanan/{detailWorkOrderForm}', [FormApmController::class, 'formApmElektrikalVehicleExteriorBATTigaBulananUpdate'])->name('elektrikal-vehicle-exterior-bat-tiga-bulanan.update');

        });

        // ELECTRICAL PROTECTION
        Route::prefix('electrical-protection')->name('electrical-protection.')->group(function () {
            Route::get('/', [FormController::class, 'indexEP'])->name('index');
            Route::get('checklist-peralatan-harian', [
                FormController::class,
                'checklistPeralatanHarian'
            ])->name('checklist-peralatan-harian');
            Route::get('data_teknis_kwh_meter_unit_electrical_protection', [
                FormController::class,
                'dataTeknisKwhMeterUnitElectricalProtection'
            ])->name('data_teknis_kwh_meter_unit_electrical_protection');
            Route::get('data_teknis_perawatan_plc_unit_electrical_protection', [
                FormController::class,
                'dataTeknisPerawatanPlcUnitElectricalProtection'
            ])->name('data_teknis_perawatan_plc_unit_electrical_protection');
            Route::get('data_teknis_perawatan_relay_proteksi_unit_electrical_protection', [
                FormController::class,
                'dataTeknisPerawatanRelayProteksiUnitElectricalProtection'
            ])->name('data_teknis_perawatan_relay_proteksi_unit_electrical_protection');
            Route::get('data_teknis_perawatan_trafo_unit_electrical_protection', [
                FormController::class,
                'dataTeknisPerawatanTrafoUnitElectricalProtection'
            ])->name('data_teknis_perawatan_trafo_unit_electrical_protection');
            Route::get('laporan_kerusakan_unit_electeical_protection', [
                FormController::class,
                'laporanKerusakanUnitElectricalProtection'
            ])->name('laporan_kerusakan_unit_electeical_protection');
            Route::get('electrical_protection_maintenance_report', [
                FormController::class,
                'electricalProtectionMaintenanceReport'
            ])->name('electrical_protection_maintenance_report');

            // laporan kerusakan electrical protection
            Route::get('laporan_kerusakan_unit_electeical_protection/{detailWorkOrderForm}', [
                FormController::class,
                'laporanKerusakanUnitElectricalProtectionIndex'
            ])->name('laporan_kerusakan_unit_electeical_protection.index');

            Route::patch('laporan_kerusakan_unit_electeical_protection/{detailWorkOrderForm}', [
                FormController::class,
                'laporanKerusakanUnitElectricalProtectionUpdate'
            ])->name('laporan_kerusakan_unit_electeical_protection.update');
        });

        // ELECTRICAL UTILITY
        Route::prefix('ele')->name('ele.')->group(function () {
            Route::get('/', [FormController::class, 'indexEU'])->name('index');

            Route::get('pemeliharaan-tahunan/{detailWorkOrderForm}', [FormEleController::class, 'formElePemeliharaanTahunan'])->name('pemeliharaan-tahunan.index');
            Route::patch('pemeliharaan-tahunan/{detailWorkOrderForm}', [FormEleController::class, 'formElePemeliharaanTahunanUpdate'])->name('pemeliharaan-tahunan.update');

            Route::get('checklist1/{detailWorkOrderForm}', [FormEleController::class, 'formEleChecklist1Harian'])->name('checklist1.index');
            Route::patch('checklist1/{detailWorkOrderForm}', [FormEleController::class, 'formEleChecklist1HarianUpdate'])->name('checklist1.update');

            Route::get('checklist2/{detailWorkOrderForm}', [FormEleController::class, 'formEleChecklist2Harian'])->name('checklist2.index');
            Route::patch('checklist2/{detailWorkOrderForm}', [FormEleController::class, 'formEleChecklist2HarianUpdate'])->name('checklist2.update');

            Route::get('surat-izin-pelaksanaan-pekerjaan/{detailWorkOrderForm}', [FormEleController::class, 'formEleSuratIzinPelaksanaanPekerjaan'])->name('surat-izin-pelaksanaan-pekerjaan.index');
            Route::patch('surat-izin-pelaksanaan-pekerjaan/{detailWorkOrderForm}', [FormEleController::class, 'formEleSuratIzinPelaksanaanPekerjaanUpdate'])->name('surat-izin-pelaksanaan-pekerjaan.update');

            Route::get('pemeriksaan-rutin/{detailWorkOrderForm}', [FormEleController::class, 'formElePemeriksaanRutin'])->name('pemeriksaan-rutin.index');
            Route::patch('pemeriksaan-rutin/{detailWorkOrderForm}', [FormEleController::class, 'formElePemeriksaanRutinUpdate'])->name('pemeriksaan-rutin.update');


            Route::get('perintah-kerja', [FormController::class, 'perintahKerja'])->name('perintah-kerja');
            Route::get('perintah-pemasangan/{detailWorkOrderForm}', [FormController::class, 'perintahPemasangan'])->name('perintah-pemasangan');
            Route::patch('perintah-pemasangan/{detailWorkOrderForm}', [FormController::class, 'perintahPemasanganUpdate'])->name('perintah-pemasangan.update');

        });


        // NVA
        Route::prefix('nva')->name('nva.')->group(function () {
            Route::get('checklist1/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaChecklist1Harian'])->name('checklist1.index');
            Route::patch('checklist1/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaChecklist1HarianUpdate'])->name('checklist1.update');

            Route::get('checklist2/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaChecklist2Harian'])->name('checklist2.index');
            Route::patch('checklist2/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaChecklist2HarianUpdate'])->name('checklist2.update');

            Route::get('surat-izin-pelaksanaan-pekerjaan/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaSuratIzinPelaksanaanPekerjaan'])->name('surat-izin-pelaksanaan-pekerjaan.index');
            Route::patch('surat-izin-pelaksanaan-pekerjaan/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaSuratIzinPelaksanaanPekerjaanUpdate'])->name('surat-izin-pelaksanaan-pekerjaan.update');

            Route::get('perbaikan-gangguan/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaSuratPerbaikanGangguan'])->name('perbaikan-gangguan.index');
            Route::patch('perbaikan-gangguan/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaSuratPerbaikanGangguanUpdate'])->name('perbaikan-gangguan.update');

            Route::get('pemeriksaan-rutin/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaSuratPemeriksaanRutin'])->name('pemeriksaan-rutin.index');
            Route::patch('pemeriksaan-rutin/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaSuratPemeriksaanRutinUpdate'])->name('pemeriksaan-rutin.update');

            Route::get('hfc-papi/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaHFCPapiHarian'])->name('hfc-papi.index');
            Route::patch('hfc-papi/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaHFCPapiHarianUpdate'])->name('hfc-papi.update');

            Route::get('ccr/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaConstantCurrentRegulation'])->name('ccr.index');
            Route::patch('ccr/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaConstantCurrentRegulationUpdate'])->name('ccr.update');

            Route::get('ccrdua/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaConstantCurrentRegulationDua'])->name('ccrdua.index');
            Route::patch('ccrdua/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaConstantCurrentRegulationDuaUpdate'])->name('ccrdua.update');

            Route::get('uraian/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaUraianPerbaikanHarian'])->name('uraian.index');
            Route::patch('uraian/{detailWorkOrderForm}', [FormNvaController::class, 'formNvaUraianPerbaikanHarianUpdate'])->name('uraian.update');
        });

        // UPS
        Route::prefix('ups')->name('ups.')->group(function () {
            Route::get('laporan-hasil-kerja/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsLaporanHasilKerja'])->name('laporan-hasil-kerja.index');
            Route::patch('laporan-hasil-kerja/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsLaporanHasilKerjaUpdate'])->name('laporan-hasil-kerja.update');

            Route::get('laporan-hasil-kerja-malam/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsLaporanHasilKerjaMalam'])->name('laporan-hasil-kerja-malam.index');
            Route::patch('laporan-hasil-kerja-malam/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsLaporanHasilKerjaMalamUpdate'])->name('laporan-hasil-kerja-malam.update');
            // pengukuran-tegangan-battery
            Route::get('pengukuran-tegangan-battery/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsPengukuranTeganganBattery'])->name('pengukuran-tegangan-battery.index');
            Route::patch('pengukuran-tegangan-battery/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsPengukuranTeganganBatteryUpdate'])->name('pengukuran-tegangan-battery.update');
            // data-ukur-load-beban
            Route::get('data-ukur-load-beban/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsDataUkurLoadBeban'])->name('data-ukur-load-beban.index');
            Route::patch('data-ukur-load-beban/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsDataUkurLoadBebanUpdate'])->name('data-ukur-load-beban.update');
            // laporan-kerusakan-dan-perbaikan
            Route::get('laporan-kerusakan-dan-perbaikan/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsLaporanKerusakanDanPerbaikan'])->name('laporan-kerusakan-dan-perbaikan.index');
            Route::patch('laporan-kerusakan-dan-perbaikan/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsLaporanKerusakanDanPerbaikanUpdate'])->name('laporan-kerusakan-dan-perbaikan.update');
            // dokumentasi-kegiatan-rutin
            Route::get('dokumentasi-kegiatan-rutin/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsDokumentasiKegiatanRutin'])->name('dokumentasi-kegiatan-rutin.index');
            Route::patch('dokumentasi-kegiatan-rutin/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsDokumentasiKegiatanRutinUpdate'])->name('dokumentasi-kegiatan-rutin.update');
            // pengukuran-peralatan-dua-mingguan
            Route::get('pengukuran-peralatan-dua-mingguan/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsPengukuranPeralatanDuaMingguan'])->name('pengukuran-peralatan-dua-mingguan.index');
            Route::patch('pengukuran-peralatan-dua-mingguan/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsPengukuranPeralatanDuaMingguanUpdate'])->name('pengukuran-peralatan-dua-mingguan.update');
            // enam bulanan
            Route::get('pengukuran-peralatan-enam-bulanan/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsPengukuranPeralatanEnamBulanan'])->name('pengukuran-peralatan-enam-bulanan.index');
            Route::patch('pengukuran-peralatan-enam-bulanan/{detailWorkOrderForm}', [FormUpsController::class, 'formUpsPengukuranPeralatanEnamBulananUpdate'])->name('pengukuran-peralatan-enam-bulanan.update');
        });

        Route::prefix('snt')->name('snt.')->group(function () {
            Route::get('checklist-sewage-treatment-plant-harian/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistSewageTreatmentPlantHarian'])->name('checklist-sewage-treatment-plant-harian.index');
            Route::patch('checklist-sewage-treatment-plant-harian/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistSewageTreatmentPlantHarianUpdate'])->name('checklist-sewage-treatment-plant-harian.update');

            Route::get('perawatan-sewage-treatment-plant-harian/{detailWorkOrderForm}', [FormSntController::class, 'formSntPerawatanSewageTreatmentPlantHarian'])->name('perawatan-sewage-treatment-plant-harian.index');
            Route::patch('perawatan-sewage-treatment-plant-harian/{detailWorkOrderForm}', [FormSntController::class, 'formSntPerawatanSewageTreatmentPlantHarianUpdate'])->name('perawatan-sewage-treatment-plant-harian.update');

            Route::get('checklist-lifting-pump/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistLiftingPump'])->name('checklist-lifting-pump.index');
            Route::patch('checklist-lifting-pump/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistLiftingPumpUpdate'])->name('checklist-lifting-pump.update');

            Route::get('perawatan-t3/{detailWorkOrderForm}', [FormSntController::class, 'formSntPerawatanT3VIP'])->name('perawatan-t3.index');
            Route::patch('perawatan-t3/{detailWorkOrderForm}', [FormSntController::class, 'formSntPerawatanT3VIPUpdate'])->name('perawatan-t3.update');

            Route::get('checklist-delaceration-harian/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistDelacerationHarian'])->name('checklist-delaceration-harian.index');
            Route::patch('checklist-delaceration-harian/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistDelacerationHarianUpdate'])->name('checklist-delaceration-harian.update');

            Route::get('checklist-lifting-pump-harian/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistLiftingPumpHarian'])->name('checklist-lifting-pump-harian.index');
            Route::patch('checklist-lifting-pump-harian/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistLiftingPumpHarianUpdate'])->name('checklist-lifting-pump-harian.update');

            Route::get('checklist-perawatan-incinerator-123-harian/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistPerawatanIncinerator123Harian'])->name('checklist-perawatan-incinerator-123-harian.index');
            Route::patch('checklist-perawatan-incinerator-123-harian/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistPerawatanIncinerator123HarianUpdate'])->name('checklist-perawatan-incinerator-123-harian.update');

            Route::get('checklist-perawatan-incinerator-567-harian/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistPerawatanIncinerator567Harian'])->name('checklist-perawatan-incinerator-567-harian.index');
            Route::patch('checklist-perawatan-incinerator-567-harian/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistPerawatanIncinerator567HarianUpdate'])->name('checklist-perawatan-incinerator-567-harian.update');

            Route::get('checklist-perawatan-incinerator-123-mingguan/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistPerawatanIncinerator123Mingguan'])->name('checklist-perawatan-incinerator-123-mingguan.index');
            Route::patch('checklist-perawatan-incinerator-123-mingguan/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistPerawatanIncinerator123MingguanUpdate'])->name('checklist-perawatan-incinerator-123-mingguan.update');

            Route::get('checklist-perawatan-incinerator-456-mingguan/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistPerawatanIncinerator456Mingguan'])->name('checklist-perawatan-incinerator-456-mingguan.index');
            Route::patch('checklist-perawatan-incinerator-456-mingguan/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistPerawatanIncinerator456MingguanUpdate'])->name('checklist-perawatan-incinerator-456-mingguan.update');

            Route::get('checklist-perawatan-incinerator-123-bulanan/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistPerawatanIncinerator123Bulanan'])->name('checklist-perawatan-incinerator-123-bulanan.index');
            Route::patch('checklist-perawatan-incinerator-123-bulanan/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistPerawatanIncinerator123BulananUpdate'])->name('checklist-perawatan-incinerator-123-bulanan.update');

            Route::get('checklist-perawatan-incinerator-456-bulanan/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistPerawatanIncinerator456Bulanan'])->name('checklist-perawatan-incinerator-456-bulanan.index');
            Route::patch('checklist-perawatan-incinerator-456-bulanan/{detailWorkOrderForm}', [FormSntController::class, 'formSntChecklistPerawatanIncinerator456BulananUpdate'])->name('checklist-perawatan-incinerator-456-bulanan.update');
        });




        // SVA
        Route::prefix('sva')->name('sva.')->group(function () {

            Route::get('checklist1/{detailWorkOrderForm}', [FormSvaController::class, 'formSvaChecklist1Harian'])->name('checklist1.index');
            Route::patch('checklist1/{detailWorkOrderForm}', [FormSvaController::class, 'formSvaChecklist1HarianUpdate'])->name('checklist1.update');

            Route::get('checklist2/{detailWorkOrderForm}', [FormSvaController::class, 'formSvaChecklist2Harian'])->name('checklist2.index');
            Route::patch('checklist2/{detailWorkOrderForm}', [FormSvaController::class, 'formSvaChecklist2HarianUpdate'])->name('checklist2.update');

            Route::get('surat-izin-pelaksanaan-pekerjaan{detailWorkOrderForm}', [FormSvaController::class, 'formSvaSuratIzinPelaksanaanPekerjaan'])->name('surat-izin-pelaksanaan-pekerjaan.index');
            Route::patch('surat-izin-pelaksanaan-pekerjaan{detailWorkOrderForm}', [FormSvaController::class, 'formSvaSuratIzinPelaksanaanPekerjaanUpdate'])->name('surat-izin-pelaksanaan-pekerjaan.update');

            Route::get('perbaikan-gangguan{detailWorkOrderForm}', [FormSvaController::class, 'formSvaSuratPerbaikanGangguan'])->name('perbaikan-gangguan.index');
            Route::patch('perbaikan-gangguan{detailWorkOrderForm}', [FormSvaController::class, 'formSvaSuratPerbaikanGangguanUpdate'])->name('perbaikan-gangguan.update');

            Route::get('pemeriksaan-rutin{detailWorkOrderForm}', [FormSvaController::class, 'formSvaSuratPemeriksaanRutin'])->name('pemeriksaan-rutin.index');
            Route::patch('pemeriksaan-rutin{detailWorkOrderForm}', [FormSvaController::class, 'formSvaSuratPemeriksaanRutinUpdate'])->name('pemeriksaan-rutin.update');

            Route::get('hfc-papi{detailWorkOrderForm}', [FormSvaController::class, 'formSvaHFCPapiHarian'])->name('hfc-papi.index');
            Route::patch('hfc-papi{detailWorkOrderForm}', [FormSvaController::class, 'formSvaHFCPapiHarianUpdate'])->name('hfc-papi.update');

            Route::get('ccr{detailWorkOrderForm}', [FormSvaController::class, 'formSvaConstantCurrentRegulation'])->name('ccr.index');
            Route::patch('ccr{detailWorkOrderForm}', [FormSvaController::class, 'formSvaConstantCurrentRegulationUpdate'])->name('ccr.update');

            Route::get('uraian{detailWorkOrderForm}', [FormSvaController::class, 'formSvaUraianPerbaikanHarian'])->name('uraian.index');
            Route::patch('uraian{detailWorkOrderForm}', [FormSvaController::class, 'formSvaUraianPerbaikanHarianUpdate'])->name('uraian.update');
            

        });

        // AEW
        Route::prefix('aew')->name('aew.')->group(function () {
            Route::get('par-car/{detailWorkOrderForm}', [FormAewController::class, 'formAewParCarHarian'])->name('par-car.index');
            Route::patch('par-car/{detailWorkOrderForm}', [FormAewController::class, 'formAewParCarHarianUpdate'])->name('par-car.update');

            Route::get('rubber-remover/{detailWorkOrderForm}', [FormAewController::class, 'formAewRubberRemoverHarian'])->name('rubber-remover.index');
            Route::patch('rubber-remover/{detailWorkOrderForm}', [FormAewController::class, 'formAewRubberRemoverHarianUpdate'])->name('rubber-remover.update');

            Route::get('pkppk/{detailWorkOrderForm}', [FormAewController::class, 'formAewPkppkHarian'])->name('pkppk.index');
            Route::patch('pkppk/{detailWorkOrderForm}', [FormAewController::class, 'formAewPkppkHarianUpdate'])->name('pkppk.update');

            // Route::get('checklist2/{detailWorkOrderForm}', [FormAewController::class, 'formEleChecklist2Harian'])->name('checklist2.index');
            // Route::patch('checklist2/{detailWorkOrderForm}', [FormAewController::class, 'formEleChecklist2HarianUpdate'])->name('checklist2.update');
        });

        // WTR - PUMPING
        Route::prefix('wtr')->name('wtr.')->group(function () {
            Route::get('laporant-harian-pagi/{detailWorkOrderForm}', [FormWtrController::class, 'formWtrLaporanHarian'])->name('laporant-harian-pagi.index');
            Route::patch('laporant-harian-pagi/{detailWorkOrderForm}', [FormWtrController::class, 'formWtrLaporanHarianUpdate'])->name('laporant-harian-pagi.update');
        });

    });

    // Report Form
    Route::prefix('report')->name('report.')->group(function () {

        // Report Divisi Electrical Utility
        Route::prefix('electrical-utility')->name('electrical-utility.')->group(function () {

            // ELE
            Route::prefix('electrical-utility')->name('electrical-utility.')->group(function () {
                Route::get('index', [ReportController::class, 'reportEle'])->name('index');
                Route::get('preventive', [ReportController::class, 'reportElePreventive'])->name('preventive');
                Route::get('checklist1', [ReportController::class, 'reportEleChecklist1'])->name('checklist1');
                Route::get('checklist2', [ReportController::class, 'reportEleChecklist2'])->name('checklist2');
            });

            // SVA
            Route::prefix('south-visual-aid')->name('south-visual-aid.')->group(function () {
                Route::get('index', [ReportController::class, 'ReportSva'])->name('index');
                Route::get('preventive', [ReportController::class, 'ReportSvaPreventive'])->name('preventive');
                Route::get('checklist1', [ReportController::class, 'ReportSvaChecklist1'])->name('checklist1');
                Route::get('checklist2', [ReportController::class, 'ReportSvaChecklist2'])->name('checklist2');
                Route::get('suratIzin', [ReportController::class, 'ReportSvaSuratIzin'])->name('suratIzin');
                Route::get('suratPerbaikan', [ReportController::class, 'ReportSvaSuratPerbaikan'])->name('suratPerbaikan');
                Route::get('suratPemeriksaan', [ReportController::class, 'ReportSvaSuratPemeriksaan'])->name('suratPemeriksaan');
                Route::get('flightCalibration', [ReportController::class, 'ReportSvaFlightCalibration'])->name('flightCalibration');
                Route::get('currentRegulator', [ReportController::class, 'ReportSvaCurrentRegulator'])->name('currentRegulator');
            });
            // NVA
            Route::prefix('north-visual-aid')->name('north-visual-aid.')->group(function () {
                Route::get('index', [ReportController::class, 'ReportNva'])->name('index');
                Route::get('preventive', [ReportController::class, 'ReportNvaPreventive'])->name('preventive');
                Route::get('checklist1', [ReportController::class, 'ReportNvaChecklist1'])->name('checklist1');
                Route::get('checklist2', [ReportController::class, 'ReportNvaChecklist2'])->name('checklist2');
                Route::get('suratIzin', [ReportController::class, 'ReportNvaSuratIzin'])->name('suratIzin');
                Route::get('suratPerbaikan', [ReportController::class, 'ReportNvaSuratPerbaikan'])->name('suratPerbaikan');
                Route::get('suratPemeriksaan', [ReportController::class, 'ReportNvaSuratPemeriksaan'])->name('suratPemeriksaan');
                Route::get('flightCalibration', [ReportController::class, 'ReportNvaFlightCalibration'])->name('flightCalibration');
                Route::get('currentRegulator', [ReportController::class, 'ReportNvaCurrentRegulator'])->name('currentRegulator');
                Route::get('currentRegulatordua', [ReportController::class, 'ReportNvaCurrentRegulatorDua'])->name('currentRegulatordua');
            });

            // UPS
            Route::prefix('ups')->name('ups.')->group(function () {
                Route::get('index', [ReportController::class, 'ReportUps'])->name('index');
                Route::get('preventive', [ReportController::class, 'ReportUpsPreventive'])->name('preventive');
                Route::get('kerjaPagi', [ReportController::class, 'ReportUpsKerjaPagi'])->name('kerjaPagi');
                Route::get('kerjaMalam', [ReportController::class, 'ReportUpsKerjaMalam'])->name('kerjaMalam');
                Route::get('laporanKerusakan', [ReportController::class, 'ReportUpsLaporanKerusakan'])->name('laporanKerusakan');
                Route::get('pengukuranPeralatanMingguan', [ReportController::class, 'ReportUpsPengukuranPeralatanMingguan'])->name('pengukuranPeralatanMingguan');
                Route::get('pengukuranPeralatanBulanan', [ReportController::class, 'ReportUpsPengukuranPeralatanBulanan'])->name('pengukuranPeralatanBulanan');
                Route::get('dataUkur', [ReportController::class, 'ReportUpsDataUkur'])->name('dataUkur');
                Route::get('pengukuranBattery', [ReportController::class, 'ReportUpsPengukuranBattery'])->name('pengukuranBattery');
            });
        });

        // Report Divisi Electrical Protection
        Route::prefix('energy-power-supply')->name('energy-power-supply.')->group(function () {

            // ELP
            Route::prefix('electrical-protection')->name('electrical-protection.')->group(function () {
                Route::get('index', [ReportController::class, 'reportElp'])->name('index');
                Route::get('preventive', [ReportController::class, 'reportElpPreventive'])->name('preventive');
            });

            // PS1
            Route::prefix('power-station-1')->name('power-station-1.')->group(function () {
                Route::get('index', [ReportPs1Controller::class, 'index'])->name('index');
                Route::get('preventive', [ReportPs1Controller::class, 'reportPs1Preventive'])->name('preventive');
                Route::get('panel-automation-dua-mingguan', [ReportPs1Controller::class, 'reportPs1PanelAutomationDuaMingguan'])->name('panel-automation-dua-mingguan');
                Route::get('panel-tr-dua-mingguan', [ReportPs1Controller::class, 'reportPs1PanelTrDuaMingguan'])->name('panel-tr-dua-mingguan');
                Route::get('panel-tr-enam-bulanan', [ReportPs1Controller::class, 'reportPs1PanelTrEnamBulanan'])->name('panel-tr-enam-bulanan');
                Route::get('panel-tr-tahunan', [ReportPs1Controller::class, 'reportPs1PanelTrTahunan'])->name('panel-tr-tahunan');
                Route::get('panel-tm-dua-mingguan', [ReportPs1Controller::class, 'reportPs1PanelTmDuaMingguan'])->name('panel-tm-dua-mingguan');
                Route::get('panel-tm-enam-bulanan', [ReportPs1Controller::class, 'reportPs1PanelTmEnamBulanan'])->name('panel-tm-enam-bulanan');
                Route::get('panel-tm-tahunan', [ReportPs1Controller::class, 'reportPs1PanelTmTahunan'])->name('panel-tm-tahunan');
                Route::get('genset-mobile-dua-mingguan', [ReportPs1Controller::class, 'reportPs1GensetMobileDuaMingguan'])->name('genset-mobile-dua-mingguan');
                Route::get('genset-mobile-tiga-bulanan', [ReportPs1Controller::class, 'reportPs1GensetMobileTigaBulanan'])->name('genset-mobile-tiga-bulanan');
                Route::get('genset-mobile-enam-bulanan', [ReportPs1Controller::class, 'reportPs1GensetMobileEnamBulanan'])->name('genset-mobile-enam-bulanan');
                Route::get('genset-mobile-tahunan', [ReportPs1Controller::class, 'reportPs1GensetMobileTahunan'])->name('genset-mobile-tahunan');
                Route::get('genset-standby-gardu-teknik-dua-mingguan', [ReportPs1Controller::class, 'reportPs1GensetStandbyGarduTeknikDuaMingguan'])->name('genset-standby-gardu-teknik-dua-mingguan');
                Route::get('genset-standby-gardu-tiga-bulanan', [ReportPs1Controller::class, 'reportPs1GensetStandbyGarduTeknikTigaBulanan'])->name('genset-standby-gardu-teknik-tiga-bulanan');
                Route::get('genset-standby-gardu-enam-bulanan', [ReportPs1Controller::class, 'reportPs1GensetStandbyGarduTeknikEnamBulanan'])->name('genset-standby-gardu-teknik-enam-bulanan');
                Route::get('genset-standby-gardu-tahunan', [ReportPs1Controller::class, 'reportPs1GensetStandbyGarduTeknikTahunan'])->name('genset-standby-gardu-teknik-tahunan');
                Route::get('genset-standby-no1-dua-mingguan', [ReportPs1Controller::class, 'reportPs1GensetStandbyNo1DuaMingguan'])->name('genset-standby-no1-dua-mingguan');
                Route::get('genset-standby-tiga-bulanan', [ReportPs1Controller::class, 'reportPs1GensetStandbyTigaBulanan'])->name('genset-standby-tiga-bulanan');
                Route::get('genset-standby-enam-bulanan', [ReportPs1Controller::class, 'reportPs1GensetStandbyEnamBulanan'])->name('genset-standby-enam-bulanan');
                Route::get('genset-standby-tahunan', [ReportPs1Controller::class, 'reportPs1GensetStandbyTahunan'])->name('genset-standby-tahunan');
                Route::get('control-desk-dua-mingguan', [ReportPs1Controller::class, 'reportPs1ControlDeskDuaMingguan'])->name('control-desk-dua-mingguan');
                Route::get('control-desk-tahunan', [ReportPs1Controller::class, 'reportPs1ControlDeskTahunan'])->name('control-desk-tahunan');
                Route::get('checklist-genset', [ReportPs1Controller::class, 'reportPs1ChecklistGenset'])->name('checklist-genset');
                Route::get('genset-mobile', [ReportPs1Controller::class, 'reportPs1GensetMobile'])->name('genset-mobile');
                Route::get('panel-harian', [ReportPs1Controller::class, 'reportPs1PanelHarian'])->name('panel-harian');
                Route::get('test-onload-genset', [ReportPs1Controller::class, 'reportPs1TestOnloadGenset'])->name('test-onload-genset');
            });

            // PS2
            Route::prefix('power-station-2')->name('power-station-2.')->group(function () {
                Route::get('index', [ReportPs2Controller::class, 'index'])->name('index');
                Route::get('preventive', [ReportPs2Controller::class, 'reportPs2Preventive'])->name('preventive');
                Route::get('panel-dua-mingguan', [ReportPs2Controller::class, 'reportPs2PanelDuaMingguan'])->name('panel-dua-mingguan');
            });
        });
        
        // Report Divisi Mechanical Equipment
        Route::prefix('mechanical-equipment')->name('mechanical-equipment.')->group(function () {

            // APM
        Route::prefix('apm')->name('apm.')->group(function () {
            Route::get('index', [ReportController::class, 'ReportApm'])->name('index');
            Route::get('preventive', [ReportController::class, 'ReportApmPreventive'])->name('preventive');
            Route::get('carBodyHarian', [ReportController::class, 'ReportApmCarBodyHarian'])->name('carBodyHarian');
            Route::get('carBodyTigaBulanan', [ReportController::class, 'ReportApmCarBodyTigaBulanan'])->name('carBodyTigaBulanan');
            Route::get('airBrakeSystemHarian', [ReportController::class, 'ReportApmcAirBrakeSystemHarian'])->name('airBrakeSystemHarian');
            Route::get('bogieHarian', [ReportController::class, 'ReportApmBogieHarian'])->name('bogieHarian');
            Route::get('vehicleMingguan', [ReportController::class, 'ReportApmVehicleMingguan'])->name('vehicleMingguan');
            Route::get('bogieTigaBulanan', [ReportController::class, 'ReportApmBogieTigaBulanan'])->name('bogieTigaBulanan');
            Route::get('airBrakeSystemTigaBulanan', [ReportController::class, 'ReportApmAirBrakeSystemTigaBulanan'])->name('airBrakeSystemTigaBulanan');
            Route::get('exteriorHarian', [ReportController::class, 'ReportApmExteriorHarian'])->name('exteriorHarian');
            Route::get('interiorHarian', [ReportController::class, 'ReportApmInteriorHarian'])->name('interiorHarian');
            Route::get('exteriorMingguan', [ReportController::class, 'ReportApmExteriorMingguan'])->name('exteriorMingguan');
            Route::get('interiorGDTigaBulanan', [ReportController::class, 'ReportApmInteriorGDTigaBulanan'])->name('interiorGDTigaBulanan');
            Route::get('interiorMCTigaBulanan', [ReportController::class, 'ReportApmInteriorMCTigaBulanan'])->name('interiorMCTigaBulanan');
            Route::get('interiorTCMSTigaBulanan', [ReportController::class, 'ReportApmInteriorTCMSTigaBulanan'])->name('interiorTCMSTigaBulanan');
            Route::get('interiorLPLTigaBulanan', [ReportController::class, 'ReportApmInteriorLPLTigaBulanan'])->name('interiorLPLTigaBulanan');
            Route::get('exteriorBECTigaBulanan', [ReportController::class, 'ReportApmExteriorBECTigaBulanan'])->name('exteriorBECTigaBulanan');
            Route::get('exteriorDCTigaBulanan', [ReportController::class, 'ReportApmExteriorDCTigaBulanan'])->name('exteriorDCTigaBulanan');
            Route::get('exteriorESKTigaBulanan', [ReportController::class, 'ReportApmExteriorESKTigaBulanan'])->name('exteriorESKTigaBulanan');
            Route::get('exteriorHJBTigaBulanan', [ReportController::class, 'ReportApmExteriorHJBTigaBulanan'])->name('exteriorHJBTigaBulanan');
            Route::get('exteriorFJBTigaBulanan', [ReportController::class, 'ReportApmExteriorFJBTigaBulanan'])->name('exteriorFJBTigaBulanan');
            Route::get('exteriorHSCBTigaBulanan', [ReportController::class, 'ReportApmExteriorHSCBTigaBulanan'])->name('exteriorHSCBTigaBulanan');
            Route::get('exteriorLJBTigaBulanan', [ReportController::class, 'ReportApmExteriorLJBTigaBulanan'])->name('exteriorLJBTigaBulanan');
            Route::get('exteriorPCSTigaBulanan', [ReportController::class, 'ReportApmExteriorPCSTigaBulanan'])->name('exteriorPCSTigaBulanan');
            Route::get('exteriorSIVTigaBulanan', [ReportController::class, 'ReportApmExteriorSIVTigaBulanan'])->name('exteriorSIVTigaBulanan');
            Route::get('exteriorLHTTigaBulanan', [ReportController::class, 'ReportApmExteriorLHTTigaBulanan'])->name('exteriorLHTTigaBulanan');
            Route::get('exteriorTMTigaBulanan', [ReportController::class, 'ReportApmExteriorTMTigaBulanan'])->name('exteriorTMTigaBulanan');
            Route::get('exteriorVACTigaBulanan', [ReportController::class, 'ReportApmExteriorVACTigaBulanan'])->name('exteriorVACTigaBulanan');
            Route::get('exteriorEHTigaBulanan', [ReportController::class, 'ReportApmExteriorEHTigaBulanan'])->name('exteriorEHTigaBulanan');
            Route::get('exteriorJPTigaBulanan', [ReportController::class, 'ReportApmExteriorJPTigaBulanan'])->name('exteriorJPTigaBulanan');
            Route::get('exteriorMDSTigaBulanan', [ReportController::class, 'ReportApmExteriorMDSTigaBulanan'])->name('exteriorMDSTigaBulanan');
            Route::get('exteriorVVTigaBulanan', [ReportController::class, 'ReportApmExteriorVVTigaBulanan'])->name('exteriorVVTigaBulanan');
            Route::get('exteriorPCTigaBulanan', [ReportController::class, 'ReportApmExteriorPCTigaBulanan'])->name('exteriorPCTigaBulanan');
            Route::get('interiorFDSTigaBulanan', [ReportController::class, 'ReportApmInteriorFDSTigaBulanan'])->name('interiorFDSTigaBulanan');
            Route::get('exteriorBATTigaBulanan', [ReportController::class, 'ReportApmExteriorBATTigaBulanan'])->name('exteriorBATTigaBulanan');

        });

        // SNT
        Route::prefix('sanitation-facility')->name('sanitation-facility.')->group(function () {
            Route::get('index', [ReportController::class, 'ReportSnt'])->name('index');
            Route::get('preventive', [ReportController::class, 'ReportSntPreventive'])->name('preventive');
            Route::get('checklistSewage', [ReportController::class, 'ReportSntChecklistSewage'])->name('checklistSewage');
            Route::get('perawatanSewage', [ReportController::class, 'ReportSntPerawatanSewage'])->name('perawatanSewage');
            Route::get('checklistLp', [ReportController::class, 'ReportSntChecklistLP'])->name('checklistLp');
            Route::get('checklistLpHarian', [ReportController::class, 'ReportSntChecklistLPHarian'])->name('checklistLpHarian');
            Route::get('checklistDelaceration', [ReportController::class, 'ReportSntChecklistDelaceration'])->name('checklistDelaceration');
            Route::get('perawatanT3', [ReportController::class, 'ReportSntPerawatanT3'])->name('perawatanT3');
            Route::get('incinerator123Harian', [ReportController::class, 'ReportSntIncinerator123Harian'])->name('incinerator123Harian');
            Route::get('incinerator567Harian', [ReportController::class, 'ReportSntIncinerator567Harian'])->name('incinerator567Harian');
            Route::get('incinerator123Mingguan', [ReportController::class, 'ReportSntIncinerator123Mingguan'])->name('incinerator123Mingguan');
            Route::get('incinerator456Mingguan', [ReportController::class, 'ReportSntIncinerator456Mingguan'])->name('incinerator456Mingguan');
            Route::get('incinerator123Bulanan', [ReportController::class, 'ReportSntIncinerator123Bulanan'])->name('incinerator123Bulanan');
            Route::get('incinerator456Bulanan', [ReportController::class, 'ReportSntIncinerator456Bulanan'])->name('incinerator456Bulanan');
        });
    });
            
        });
        

    // Master Data
    Route::get('master-data', function () {
        $data['page_title'] = 'Master Data';
        return view('master-data.index', $data);
    })->name('master-data.index');

    // Role
    Route::resource('roles', RoleController::class);

    // Users
    Route::patch('change-password', [UserController::class, 'changePassword'])->name('users.change-password');
    Route::resource('users', UserController::class)->except([
        'show',
    ]);
    ;

    // Categories
    Route::resource('categories', CategoryController::class)->except([
        'show',
    ]);

    // Types
    Route::resource('types', TypeController::class)->except([
        'show',
    ]);

    // Divisi
    Route::resource('divisis', DivisiController::class)->except([
        'show',
    ]);

    // Material
    Route::resource('materials', MaterialController::class)->except([
        'show',
    ]);

    // BOM
    Route::resource('boms', BomController::class);
    Route::get('boms/{assetId}/{bomId}', [BomController::class, 'showMaterial']);

    // Task
    Route::get('tasks/create-modal', [TaskController::class, 'createModal'])->name('tasks.create-modal');
    Route::resource('tasks', TaskController::class)->except([
        'show',
    ]);

    // Task Group
    Route::get('task-groups/create-modal', [TaskGroupController::class, 'createModal'])->name('task-groups.create-modal');
    Route::resource('task-groups', TaskGroupController::class);

    // Report
    Route::get('reports', [ReportController::class, 'index'])->name('reports');
    Route::get('daily-wok-order-reports', [ReportController::class, 'dailyWorkOrderReport'])->name('daily-wok-order-reports');
    Route::get('view-daily-wok-order-reports', [ReportController::class, 'viewDailyWorkOrderReport'])->name('view-daily-wok-order-reports');
    Route::get('asset-reports/{id}', [ReportController::class, 'viewAssetReport'])->name('asset-reports');
    Route::get('work-order-reports/{id}', [ReportController::class, 'viewWorkOrderReport'])->name('work-order-reports');
    Route::get('maintenance-reports/{id}', [ReportController::class, 'viewMaintenanceReport'])->name('maintenance-reports');

    // User Technical
    Route::get('user-technicals/create-modal', [UserTechnicalController::class, 'createModal'])->name('user-technicals.create-modal');
    Route::patch('user-technicals-change-password', [UserTechnicalController::class, 'changePassword'])->name('user-technicals.change-password');
    Route::resource('user-technicals', UserTechnicalController::class)->except([
        'show',
    ]);

    // User Technical Group
    Route::get('user-technical-groups/create-modal', [UserGroupController::class, 'createModal'])->name('user-technical-groups.create-modal');
    Route::resource('user-technical-groups', UserGroupController::class);
    
    // User Technical
    Route::prefix('user-technical')->group(function () {
        Route::get('/show-user-group/{id}', [UserTechnicalController::class, 'showUserGroup'])->name('user-technical.show-user-group');
        Route::get('/dashboard', [UserTechnicalController::class, 'dashboard'])->name('user-technical.dashboard');
        Route::get('/work-orders', [UserTechnicalController::class, 'workOrder'])->name('user-technical.work-order');
        Route::get('/work-orders/{id}/edit', [UserTechnicalController::class, 'editWorkOrder'])->name('user-technical.work-order-edit');
        Route::patch('/work-orders/{id}', [UserTechnicalController::class, 'updateWorkOrder'])->name('user-technical.work-order-update');
    });
});