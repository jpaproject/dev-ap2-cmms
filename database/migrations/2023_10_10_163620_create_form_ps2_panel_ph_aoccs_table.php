<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs2PanelPhAoccsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps2_panel_ph_aoccs', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string("group")->nullable();
            $table->string("modul")->nullable();
            $table->string("posisi_cb")->nullable();
            $table->string("cb_spring")->nullable();
            $table->string("local_remote")->nullable();
            $table->string("mode_kontrol_modul")->nullable();
            $table->string("mode_kontrol_scada")->nullable();
            $table->string("tegangan_v_1")->nullable();
            $table->string("tegangan_v_2")->nullable();
            $table->string("tegangan_v_3")->nullable();
            $table->string("arus_1")->nullable();
            $table->string("arus_2")->nullable();
            $table->string("arus_3")->nullable();
            $table->string("daya_1")->nullable();
            $table->string("daya_2")->nullable();
            $table->string("daya_3")->nullable();
            $table->string("normal_source")->nullable();
            $table->string("tegangan")->nullable();
            $table->string("transfer_switch")->nullable();
            $table->string("posisi_mccb")->nullable();
            $table->string("keterangan")->nullable();

            $table->text("catatan")->nullable();
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
        Schema::dropIfExists('form_ps2_panel_ph_aoccs');
    }
}
