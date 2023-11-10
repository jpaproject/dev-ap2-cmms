<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs3GensetDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps3_genset_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('level_oli_mesin_g1')->nullable();
            $table->string('level_air_radiator_g1')->nullable();
            $table->string('level_air_battery_g1')->nullable();
            $table->string('level_bahan_bakar_g1')->nullable();
            $table->string('tegangan_battery_starter_g1')->nullable();
            $table->string('coolant_temperature_g1')->nullable();
            $table->string('hour_meter_g1')->nullable();
            $table->string('alternator_heater_g1')->nullable();

            $table->string('level_oli_mesin_g2')->nullable();
            $table->string('level_air_radiator_g2')->nullable();
            $table->string('level_air_battery_g2')->nullable();
            $table->string('level_bahan_bakar_g2')->nullable();
            $table->string('tegangan_battery_starter_g2')->nullable();
            $table->string('coolant_temperature_g2')->nullable();
            $table->string('hour_meter_g2')->nullable();
            $table->string('alternator_heater_g2')->nullable();

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
        Schema::dropIfExists('form_ps3_genset_dua_mingguans');
    }
}
