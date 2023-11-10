<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs2RuangTenagaDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps2_ruang_tenaga_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('grup')->nullable();
            $table->string('nama_peralatan')->nullable();
            $table->string('tegangan_r')->nullable();
            $table->string('tegangan_s')->nullable();
            $table->string('tegangan_t')->nullable();
            $table->string('arus_r')->nullable();
            $table->string('arus_s')->nullable();
            $table->string('arus_t')->nullable();
            $table->string('daya')->nullable();
            $table->string('frekuensi')->nullable();
            $table->string('cos_phi')->nullable();
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();

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
        Schema::dropIfExists('form_ps2_ruang_tenaga_dua_mingguans');
    }
}
