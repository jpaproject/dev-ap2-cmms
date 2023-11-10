<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs2GensetPhAoccHarian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps2_genset_ph_aocc_harians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('q1a')->nullable();
            $table->string('q1a_keterangan')->nullable();

            $table->string('q2a')->nullable();
            $table->string('q2b')->nullable();
            $table->string('q2c')->nullable();
            $table->string('q2d')->nullable();
            $table->string('q2e')->nullable();
            $table->string('q2f')->nullable();

            $table->string('q3a')->nullable();
            $table->string('q3b')->nullable();
            $table->string('q3c')->nullable();
            $table->string('q3d')->nullable();
            $table->string('q3e')->nullable();
            $table->string('q3f')->nullable();

            $table->string('q4a')->nullable();
            $table->string('q4a_keterangan')->nullable();

            $table->string('q5a')->nullable();
            $table->string('q5a_keterangan')->nullable();

            $table->string('q6a')->nullable();
            $table->string('q6b')->nullable();
            $table->string('q6c')->nullable();
            $table->string('q6d')->nullable();
            $table->string('q6e')->nullable();
            $table->string('q6f')->nullable();

            $table->string('q7a')->nullable();
            $table->string('q7b')->nullable();
            $table->string('q7c')->nullable();
            $table->string('q7d')->nullable();
            $table->string('q7e')->nullable();
            $table->string('q7f')->nullable();

            $table->string('q8a')->nullable();
            $table->string('q8a_keterangan')->nullable();

            $table->string('q9a')->nullable();
            $table->string('q9a_keterangan')->nullable();

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
        Schema::dropIfExists('form_ps2_genset_ph_aocc_harian');
    }
}