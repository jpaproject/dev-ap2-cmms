<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs3PanelPompaBbmLamaEnamBulananTahunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps3_panel_pompa_bbm_lama_enam_bulanan_tahunans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('p1a_1')->nullable();
            $table->string('p1a_2')->nullable();
            $table->string('p1a_3')->nullable();

            $table->string('p1b_1')->nullable();
            $table->string('p1b_2')->nullable();
            $table->string('p1b_3')->nullable();

            $table->string('p2a_1')->nullable();
            $table->string('p2a_2')->nullable();
            $table->string('p2a_3')->nullable();

            $table->string('p2b_1')->nullable();
            $table->string('p2b_2')->nullable();
            $table->string('p2b_3')->nullable();

            $table->string('p4_1')->nullable();
            $table->string('p4_2')->nullable();
            $table->string('p4_3')->nullable();

            $table->string('panel_kontrol_main_tank_1')->nullable();
            $table->string('panel_kontrol_main_tank_2')->nullable();
            $table->string('panel_kontrol_main_tank_3')->nullable();

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
        Schema::dropIfExists('form_ps3_panel_pompa_bbm_lama_enam_bulanan_tahunans');
    }
}
