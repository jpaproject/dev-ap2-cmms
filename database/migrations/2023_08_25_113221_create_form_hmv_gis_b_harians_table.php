<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormHmvGisBHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_hmv_gis_b_harians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('name')->nullable();
            $table->string('pms_bus_q1')->nullable();
            $table->string('pms_bus_q2')->nullable();
            $table->string('pmt')->nullable();
            $table->string('ceiling_end')->nullable();
            $table->string('vt_line')->nullable();
            $table->string('abnormal')->nullable();
            $table->string('posisi_pms_bus')->nullable();
            $table->string('posisi_pmt')->nullable();
            $table->string('counter_r')->nullable();
            $table->string('counter_s')->nullable();
            $table->string('counter_t')->nullable();
            $table->string('posisi_pms_line')->nullable();
            $table->string('earhing_pmt')->nullable();
            $table->string('earhing_line')->nullable();
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
        Schema::dropIfExists('form_hmv_gis_b_harians');
    }
}