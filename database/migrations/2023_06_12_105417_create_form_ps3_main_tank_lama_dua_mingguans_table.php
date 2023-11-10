<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs3MainTankLamaDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps3_main_tank_lama_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('main_tank_p1a')->nullable();
            $table->string('main_tank_p1b')->nullable();
            $table->string('main_tank_p2a')->nullable();
            $table->string('main_tank_p2b')->nullable();
            $table->string('main_tank_p4')->nullable();

            $table->string('sump_tank_p1')->nullable();
            $table->string('sump_tank_p2')->nullable();

            $table->string('pompa_sumpit_main_tank_p1')->nullable();
            $table->string('pompa_sumpit_main_tank_p2')->nullable();

            $table->string('pompa_sumpit_sump_tank_p1')->nullable();
            $table->string('pompa_sumpit_sump_tank_p2')->nullable();

            $table->string('main_tank1')->nullable();
            $table->string('main_tank2')->nullable();
            $table->string('main_tank3')->nullable();
            $table->string('sump_tank1')->nullable();
            $table->string('sump_tank2')->nullable();

            $table->string('panel_hmi_main_tank')->nullable();
            $table->string('panel_kontrol_main_tank')->nullable();
            $table->string('panel_kontrol_sump_tank')->nullable();
            $table->text('catatan')->nullable();

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
        Schema::dropIfExists('form_ps3_main_tank_lama_dua_mingguans');
    }
}