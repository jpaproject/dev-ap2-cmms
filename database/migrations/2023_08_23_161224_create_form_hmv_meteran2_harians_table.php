<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormHmvMeteran2HariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_hmv_meteran2_harians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('tengangan_l1')->nullable();
            $table->string('tengangan_l2')->nullable();
            $table->string('tengangan_l3')->nullable();

            $table->string('arus_l1')->nullable();
            $table->string('arus_l2')->nullable();
            $table->string('arus_l3')->nullable();

            $table->string('daya_aktif')->nullable();
            $table->string('daya_semu')->nullable();
            $table->string('daya_reaktif')->nullable();

            $table->string('frekuensi')->nullable();
            $table->string('cos')->nullable();

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
        Schema::dropIfExists('form_hmv_meteran2_harians');
    }
}