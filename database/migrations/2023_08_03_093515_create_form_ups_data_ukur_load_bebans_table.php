<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormUpsDataUkurLoadBebansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ups_data_ukur_load_bebans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('kapasitas')->nullable();
            $table->string('distribusi')->nullable();
            $table->string('r')->nullable();
            $table->string('s')->nullable();
            $table->string('t')->nullable();
            $table->string('n')->nullable();
            $table->string('besaran')->nullable();
            $table->string('pengukuran')->nullable();
            $table->string('satuan')->nullable();
            $table->string('dokumentasi')->nullable();
            $table->string('dokumentasi2')->nullable();
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
        Schema::dropIfExists('form_ups_data_ukur_load_bebans');
    }
}
