<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormNvaConstantCurrentRegulationDuasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_nva_constant_current_regulation_duas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('substation')->nullable();
            $table->string('peralatan')->nullable();
            $table->string('merk')->nullable();
            $table->string('tipe')->nullable();
            $table->string('kapasitas')->nullable();
            $table->string('tahun_pemasangan')->nullable();
            $table->string('supply_voltage')->nullable();
            $table->string('system_remote')->nullable();
            $table->string('running_hours')->nullable();
            $table->string('ampere')->nullable();
            $table->string('step1')->nullable();
            $table->string('step2')->nullable();
            $table->string('step3')->nullable();
            $table->string('step4')->nullable();
            $table->string('step5')->nullable();
            $table->string('cg')->nullable();
            $table->string('cc')->nullable();
            $table->string('tanggal')->nullable();
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
        Schema::dropIfExists('form_nva_constant_current_regulation_duas');
    }
}
