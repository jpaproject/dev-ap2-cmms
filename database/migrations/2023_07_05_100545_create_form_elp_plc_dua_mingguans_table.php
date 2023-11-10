<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormElpPlcDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_elp_plc_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('substation')->nullable();
            $table->string('tegangan_power_supply_ac')->nullable();
            $table->string('tegangan_power_supply_dc')->nullable();
            $table->string('modul_power_supply_power_ok')->nullable();
            $table->string('cpu_run')->nullable();
            $table->string('cpu_lcd')->nullable();
            $table->string('ptq_active')->nullable();
            $table->string('ptq_e_data')->nullable();
            $table->string('ptq_e_link')->nullable();
            $table->string('ddi_active')->nullable();
            $table->string('dra_active')->nullable();
            $table->string('noe_active')->nullable();
            $table->string('egx_tx')->nullable();
            $table->string('egx_rx')->nullable();
            $table->string('conex_active')->nullable();
            $table->string('suhu_plc')->nullable();
            $table->string('lampu')->nullable();
            $table->string('fan')->nullable();
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
        Schema::dropIfExists('form_elp_plc_dua_mingguans');
    }
}
