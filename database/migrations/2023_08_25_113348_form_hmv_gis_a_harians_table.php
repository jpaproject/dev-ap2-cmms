<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormHmvGisAHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_hmv_gis_a_harians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");
            // indoor / outdoor
            $table->string('lokasi')->nullable();
            $table->string('suhu')->nullable();
            $table->string('kelembaban')->nullable();
            $table->string('benda_asing')->nullable();

            // ac / dc
            $table->string('status')->nullable();
            $table->string('status_110')->nullable();
            $table->string('status_48')->nullable();
            $table->string('local_remote')->nullable();
            // q15 / q25
            $table->string('earthing_busbar')->nullable();
            $table->string('posisi')->nullable();


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
        //
    }
}