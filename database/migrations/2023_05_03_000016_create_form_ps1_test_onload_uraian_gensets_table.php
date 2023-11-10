<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs1TestOnloadUraianGensetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps1_test_onload_uraian_gensets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('uraian')->nullable();
            $table->string('tegangan')->nullable();
            $table->string('arus')->nullable();
            $table->string('freq')->nullable();
            $table->string('waktu')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('form_ps1_test_onload_uraian_gensets');
    }
}