<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormHmvPanelTigaBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_hmv_panel_tiga_bulanans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('equipment_number')->nullable();
            $table->string('location_station')->nullable();
            $table->string('number_of_panel')->nullable();
            $table->string('type')->nullable();
            $table->string('reference_drawing')->nullable();
            $table->string('inspection_date')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('brand_merk')->nullable();
            $table->string('name_plate')->nullable();
            $table->string('status')->nullable();

            $table->string('pertanyaan')->nullable();
            $table->string('awal')->nullable();
            $table->string('akhir')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('form_hmv_panel_tiga_bulanans');
    }
}
