<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs3GroundTankBaruDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps3_ground_tank_baru_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('main_tank1')->nullable();
            $table->string('main_tank2')->nullable();
            $table->string('main_tank3')->nullable();
            $table->string('sump_tank1')->nullable();
            $table->string('panel_monitor_maint_tank')->nullable();
            $table->string('panel_kontrol_pompa_transfer')->nullable();
            $table->string('panel_sumpit_pump')->nullable();
            
            $table->string('catatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_ps3_ground_tank_baru_dua_mingguans');
    }
}
