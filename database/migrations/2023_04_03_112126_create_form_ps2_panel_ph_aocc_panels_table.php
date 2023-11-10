<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs2PanelPhAoccPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps2_panel_ph_aocc_panels', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('grup')->nullable();
            $table->string('modul')->nullable();
            $table->string('posisi_cb')->nullable();
            $table->string('cb_spring')->nullable();
            $table->string('local')->nullable();
            $table->string('remote')->nullable();
            $table->string('mode_modul1')->nullable();
            $table->string('mode_modul2')->nullable();
            $table->string('mode_scada1')->nullable();
            $table->string('mode_scada2')->nullable();
            $table->string('tegangan1')->nullable();
            $table->string('tegangan2')->nullable();
            $table->string('tegangan3')->nullable();
            $table->string('arus1')->nullable();
            $table->string('arus2')->nullable();
            $table->string('arus3')->nullable();
            $table->string('daya1')->nullable();
            $table->string('daya2')->nullable();
            $table->string('daya3')->nullable();
            $table->string('keterangan')->nullable();

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
        Schema::dropIfExists('form_ps2_panel_ph_aocc_panels');
    }
}