<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevision1FormNvaHFCPapiHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_nva_h_f_c_papi_harians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");
            $table->string('judul')->nullable();
            $table->string('Fi')->nullable();
            $table->string('glide_a_derajat')->nullable();
            $table->string('glide_b_derajat')->nullable();
            $table->string('glide_c_derajat')->nullable();
            $table->string('glide_d_derajat')->nullable();
            $table->string('glide_a_menit')->nullable();
            $table->string('glide_b_menit')->nullable();
            $table->string('glide_c_menit')->nullable();
            $table->string('glide_d_menit')->nullable();
            $table->string('ccos')->nullable();
            $table->string('current_calibration')->nullable();
            $table->string('next_calibration')->nullable();
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
        Schema::dropIfExists('revision1_form_nva_h_f_c_papi_harians');
    }
}
