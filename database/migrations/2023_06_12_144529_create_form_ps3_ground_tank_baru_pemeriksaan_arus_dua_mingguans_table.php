<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs3GroundTankBaruPemeriksaanArusDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps3_ground_tank_baru_pemeriksaan_arus_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('transfer_pump_antar_tank1_1')->nullable();
            $table->string('transfer_pump_antar_tank1_2')->nullable();
            $table->string('transfer_pump_antar_tank1_3')->nullable();

            $table->string('transfer_pump_antar_tank2_1')->nullable();
            $table->string('transfer_pump_antar_tank2_2')->nullable();
            $table->string('transfer_pump_antar_tank2_3')->nullable();
            
            $table->string('transfer_pump1_1')->nullable();
            $table->string('transfer_pump1_2')->nullable();
            $table->string('transfer_pump1_3')->nullable();

            $table->string('transfer_pump2_1')->nullable();
            $table->string('transfer_pump2_2')->nullable();
            $table->string('transfer_pump2_3')->nullable();

            $table->string('drain_pump_1')->nullable();
            $table->string('drain_pump_2')->nullable();
            $table->string('drain_pump_3')->nullable();

            $table->string('p1_1')->nullable();
            $table->string('p1_2')->nullable();
            $table->string('p1_3')->nullable();

            $table->string('p2_1')->nullable();
            $table->string('p2_2')->nullable();
            $table->string('p2_3')->nullable();
            
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
        Schema::dropIfExists('form_ps3_ground_tank_baru_pemeriksaan_arus_dua_mingguans');
    }
}
