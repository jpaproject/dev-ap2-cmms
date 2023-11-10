<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormElpPartlyEnamBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_elp_partly_enam_bulanans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('substation')->nullable();
            $table->string('gardu')->nullable();
            $table->string('relay')->nullable();
            $table->string('element')->nullable();
            $table->string('curve_tripping')->nullable();
            $table->string('isset_a_calculation')->nullable();
            $table->string('isset_a_test_trip_relay')->nullable();
            $table->string('isset_a_test_trip_cb')->nullable();

            $table->string('ifault_a_calculation')->nullable();
            $table->string('ifault_a_test_trip_relay')->nullable();
            $table->string('ifault_a_test_trip_cb')->nullable();

            $table->string('ten_i_calculation')->nullable();
            $table->string('ten_i_test_trip_relay')->nullable();
            $table->string('ten_i_test_trip_cb')->nullable();

            $table->string('tms_calculation')->nullable();
            $table->string('tms_test_trip_relay')->nullable();
            $table->string('tms_test_trip_cb')->nullable();

            $table->string('t_calculation')->nullable();
            $table->string('t_test_trip_relay')->nullable();
            $table->string('t_test_trip_cb')->nullable();
            $table->string('rasio_ct')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('catatan')->nullable();

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
        Schema::dropIfExists('form_elp_partly_enam_bulanans');
    }
}
