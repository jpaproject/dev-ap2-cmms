<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs3TrafoEnamBulananTahunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps3_trafo_enam_bulanan_tahunans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('type')->nullable();
            $table->string('phase_a')->nullable();
            $table->string('phase_b')->nullable();
            $table->string('phase_c')->nullable();
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
        Schema::dropIfExists('form_ps3_trafo_enam_bulanan_tahunans');
    }
}
