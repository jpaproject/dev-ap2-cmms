<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHmvGisKondisional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_hmv_gis_kondisional', function (Blueprint $table) {
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

            $table->string('q4_awal')->nullable();
            $table->string('q4_akhir')->nullable();
            $table->string('q4_remarks')->nullable();

            $table->string('q5_awal')->nullable();
            $table->string('q5_akhir')->nullable();
            $table->string('q5_remarks')->nullable();

            $table->string('q6_awal')->nullable();
            $table->string('q6_akhir')->nullable();
            $table->string('q6_remarks')->nullable();

            $table->string('q7_awal')->nullable();
            $table->string('q7_akhir')->nullable();
            $table->string('q7_remarks')->nullable();

            $table->string('q8_awal')->nullable();
            $table->string('q8_akhir')->nullable();
            $table->string('q8_remarks')->nullable();

            $table->string('q9_awal')->nullable();
            $table->string('q9_akhir')->nullable();
            $table->string('q9_remarks')->nullable();

            $table->string('q10_awal')->nullable();
            $table->string('q10_akhir')->nullable();
            $table->string('q10_remarks')->nullable();

            $table->string('q11_awal')->nullable();
            $table->string('q11_akhir')->nullable();
            $table->string('q11_remarks')->nullable();

            $table->string('q12_awal')->nullable();
            $table->string('q12_akhir')->nullable();
            $table->string('q12_remarks')->nullable();

            $table->string('q13_awal')->nullable();
            $table->string('q13_akhir')->nullable();
            $table->string('q13_remarks')->nullable();

            $table->string('q14_awal')->nullable();
            $table->string('q14_akhir')->nullable();
            $table->string('q14_remarks')->nullable();

            $table->string('q15_awal')->nullable();
            $table->string('q15_akhir')->nullable();
            $table->string('q15_remarks')->nullable();

            $table->string('q16_awal')->nullable();
            $table->string('q16_akhir')->nullable();
            $table->string('q16_remarks')->nullable();

            $table->string('q17_awal')->nullable();
            $table->string('q17_akhir')->nullable();
            $table->string('q17_remarks')->nullable();

            $table->string('q18_awal')->nullable();
            $table->string('q18_akhir')->nullable();
            $table->string('q18_remarks')->nullable();

            $table->string('q19_awal')->nullable();
            $table->string('q19_akhir')->nullable();
            $table->string('q19_remarks')->nullable();

            $table->string('q20_awal')->nullable();
            $table->string('q20_akhir')->nullable();
            $table->string('q20_remarks')->nullable();

            $table->string('q21_awal')->nullable();
            $table->string('q21_akhir')->nullable();
            $table->string('q21_remarks')->nullable();

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
        Schema::dropIfExists('hmv_gis_kondisional');
    }
}