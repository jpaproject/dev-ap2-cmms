<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs1PanelTmEnamBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps1_panel_tm_enam_bulanans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string("asset_name")->nullable();
            $table->string("group_name")->nullable();
            $table->string("lampu_indikator")->nullable();
            $table->string("gas_sf6")->nullable();
            $table->string("posisi_cb")->nullable();
            $table->string("indikator_spring_cb")->nullable();
            $table->string("tegangan")->nullable();
            $table->string("frequency")->nullable();
            $table->string("arus")->nullable();
            $table->string("power_factor")->nullable();
            $table->string("relay_proteksi")->nullable();
            $table->string("tegangan_kontrol")->nullable();
            $table->string("mcb_fuse_kontrol")->nullable();
            $table->string("setting_arus_max")->nullable();
            $table->string("setting_arus_bocor")->nullable();
            $table->string("setting_tegangan_short")->nullable();
            $table->string("counter_cb")->nullable();
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
        Schema::dropIfExists('form_ps1_panel_tm_enam_bulanans');
    }
}
