<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormApmVehicleAirBrakeSystemHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_apm_vehicle_air_brake_system_harians', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('pemeriksaan_air_brake_system')->nullable();
            $table->string('pemeriksaan_air_brake_system_group')->nullable();
            $table->string('hasil_mc1')->nullable();
            $table->string('hasil_mc2')->nullable();
            $table->string('referensi')->nullable();
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
        Schema::dropIfExists('form_apm_vehicle_air_brake_system_harians');
    }
}
