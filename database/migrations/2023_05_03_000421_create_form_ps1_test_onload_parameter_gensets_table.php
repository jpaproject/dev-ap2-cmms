<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs1TestOnloadParameterGensetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps1_test_onload_parameter_gensets', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('waktu10')->nullable();
            $table->string('waktu20')->nullable();
            $table->string('waktu30')->nullable();
            $table->string('waktu40')->nullable();
            $table->string('waktu50')->nullable();
            $table->string('waktu60')->nullable();
            $table->string('waktu70')->nullable();
            $table->string('waktu80')->nullable();
            $table->string('waktu90')->nullable();
            $table->string('waktu100')->nullable();
            $table->string('waktu110')->nullable();
            $table->string('waktu120')->nullable();
            $table->string('waktudst')->nullable();

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
        Schema::dropIfExists('form_ps1_test_onload_parameter_gensets');
    }
}
