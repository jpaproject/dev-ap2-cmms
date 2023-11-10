<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormElpTahunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_elp_tahunans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('drawing')->nullable();
            $table->string('manual_book')->nullable();
            $table->string('tool_set')->nullable();
            $table->string('cleaning_tools')->nullable();
            $table->string('supporting_cables')->nullable();
            $table->string('secondary_injector')->nullable();
            $table->string('voltage_meter')->nullable();
            $table->string('ampere_meter')->nullable();
            $table->string('safety_vest')->nullable();
            $table->string('safety_helmet')->nullable();
            $table->string('safety_shoes')->nullable();
            $table->string('electrical_gloves')->nullable();
            $table->string('handy_talkie')->nullable();
            $table->string('working_permit')->nullable();
            $table->string('operational_procedure')->nullable();
            $table->string('mask')->nullable();
            $table->string('relay_condition')->nullable();
            $table->string('terminals_condition')->nullable();
            $table->string('type_of_connect_ct_1')->nullable();
            $table->string('type_of_connect_ct_2')->nullable();
            $table->string('class_ct')->nullable();
            $table->string('burden_ct')->nullable();
            $table->string('ratio_ct')->nullable();
            $table->string('wires_condition')->nullable();
            $table->string('type_of_protection')->nullable();
            $table->string('setting_check')->nullable();
            $table->string('temperature')->nullable();
            $table->string('pressure')->nullable();
            $table->text('indication_rcms_note')->nullable();
            $table->text('indication_scada_note')->nullable();
            $table->text('order_rcms_note')->nullable();
            $table->text('order_scada_note')->nullable();
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
        Schema::dropIfExists('form_elp_tahunans');
    }
}
