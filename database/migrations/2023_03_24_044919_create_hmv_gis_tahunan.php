<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHmvGisTahunan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_hmv_gis_tahunan', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('equipment_number')->nullable();
            $table->string('location_station')->nullable();
            $table->string('type')->nullable();
            $table->string('reference_drawing')->nullable();
            $table->string('inspection_date')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('brand_merk')->nullable();
            $table->string('name_plate')->nullable();
            $table->string('status')->nullable();

            $table->string('q1_awal')->nullable();
            $table->string('q1_akhir')->nullable();
            $table->string('q1_remarks')->nullable();

            $table->string('q2_awal')->nullable();
            $table->string('q2_akhir')->nullable();
            $table->string('q2_remarks')->nullable();

            $table->string('q3_awal')->nullable();
            $table->string('q3_akhir')->nullable();
            $table->string('q3_remarks')->nullable();

            $table->string('remarks')->nullable();

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
        Schema::dropIfExists('hmv_gis_tahunan');
    }
}