<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistGensetPhAoccTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_genset_ph_aoccs', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('mode_operasi_kontrol_genset')->nullable();
            $table->string('tegangan_battery_starter')->nullable();
            $table->string('kondisi_battery_charger')->nullable();
            $table->string('lampu_indikator_ecu')->nullable();
            $table->string('level_oli_mesin')->nullable();
            $table->string('level_air_radiator')->nullable();
            $table->string('level_bbm_tangki')->nullable();
            $table->string('indikator_filter_udara_intake')->nullable();
            $table->string('water_heater_pump')->nullable();
            $table->string('oil_engine_temperature')->nullable();
            $table->string('valve_bbm_genset')->nullable();
            $table->string('kondisi_switch_battery')->nullable();
            $table->string('valve_bbm_monthly_tank')->nullable();
            $table->string('level_bbm_monthly_tank')->nullable();
            $table->string('kondisi_pintu_ruang_genset')->nullable();
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
        Schema::dropIfExists('checklist_genset_ph_aocc');
    }
}