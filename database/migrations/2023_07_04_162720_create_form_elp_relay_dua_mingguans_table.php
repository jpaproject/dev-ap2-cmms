<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormElpRelayDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_elp_relay_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('substation')->nullable();
            $table->string('panel')->nullable();
            $table->string('merek_type_relay')->nullable();
            $table->string('tegangan_power_suplay')->nullable();
            $table->string('arus_i')->nullable();
            $table->string('arus_ir')->nullable();
            $table->string('vdc_plus_to_ground')->nullable();
            $table->string('vdc_min_to_ground')->nullable();
            $table->string('body_to_ground')->nullable();
            $table->string('sudut')->nullable();
            $table->string('komunikasi')->nullable();
            $table->string('i_diff')->nullable();
            $table->string('i_bias')->nullable();
            $table->string('tegangan_kompensasi')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('form_elp_relay_dua_mingguans');
    }
}
