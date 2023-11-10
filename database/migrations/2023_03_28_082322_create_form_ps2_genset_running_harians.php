<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs2GensetRunningHarians extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps2_genset_running_harians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('mode_operasi')->nullable();
            $table->string('waktu')->nullable();
            $table->string('tegangan1')->nullable();
            $table->string('tegangan2')->nullable();
            $table->string('tegangan3')->nullable();
            $table->string('beban_arus1')->nullable();
            $table->string('beban_arus2')->nullable();
            $table->string('beban_arus3')->nullable();
            $table->string('daya')->nullable();
            $table->string('frekuensi')->nullable();
            $table->string('speed')->nullable();
            $table->string('tekanan_oli_mesin')->nullable();
            $table->string('temperature_oli_mesin')->nullable();
            $table->string('temperature_coolant')->nullable();
            $table->string('engine_hours_counter')->nullable();
            $table->string('pembebanan')->nullable();

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
        Schema::dropIfExists('form_ps2_genset_running_harians');
    }
}