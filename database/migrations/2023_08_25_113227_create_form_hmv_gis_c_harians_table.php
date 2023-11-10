<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormHmvGisCHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_hmv_gis_c_harians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('name')->nullable();
            $table->string('level')->nullable();
            $table->string('suhu')->nullable();
            $table->string('oil')->nullable();
            $table->string('hv')->nullable();
            $table->string('lv')->nullable();
            $table->string('posisi')->nullable();
            $table->string('counter')->nullable();
            $table->string('bucholz')->nullable();
            $table->string('jansen')->nullable();
            $table->string('termal')->nullable();
            $table->string('sudden')->nullable();
            $table->string('fire')->nullable();
            $table->string('ngr')->nullable();
            $table->string('dc')->nullable();

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
        Schema::dropIfExists('form_hmv_gis_c_harians');
    }
}