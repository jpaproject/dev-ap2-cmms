<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormHmvPanelTmHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_hmv_panel_tm_harians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('q1')->nullable();
            $table->string('q2')->nullable();
            $table->string('q3')->nullable();
            $table->string('q4')->nullable();
            $table->string('q5')->nullable();
            $table->string('q6a')->nullable();
            $table->string('q6b')->nullable();
            $table->string('q6c')->nullable();
            $table->string('q7')->nullable();
            $table->string('q8')->nullable();

            $table->string('b1_110_status')->nullable();
            $table->string('b1_110_metering')->nullable();
            $table->string('b1_48_status')->nullable();
            $table->string('b1_48_metering')->nullable();

            $table->string('b3_110_status')->nullable();
            $table->string('b3_110_metering')->nullable();
            $table->string('b3_48_status')->nullable();
            $table->string('b3_48_metering')->nullable();

            $table->string('catatan')->nullable();

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
        Schema::dropIfExists('form_hmv_panel_tm_harians');
    }
}