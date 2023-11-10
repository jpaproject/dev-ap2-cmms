<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs2GensetPhAoccDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps2_genset_ph_aocc_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->timestamp('waktu')->nullable();
            $table->float('tegangan_r')->nullable();
            $table->float('tegangan_s')->nullable();
            $table->float('tegangan_t')->nullable();
            $table->float('arus_r')->nullable();
            $table->float('arus_s')->nullable();
            $table->float('arus_t')->nullable();
            $table->float('daya')->nullable();
            $table->float('oil_pres')->nullable();
            $table->float('oil_temp')->nullable();
            $table->float('coolant_temp')->nullable();
            $table->float('batt')->nullable();
            $table->float('hc')->nullable();
            $table->float('frequency')->nullable();
            $table->float('cos_phi')->nullable();
            $table->integer('durasi')->nullable();
            $table->float('bbm')->nullable();
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
        Schema::dropIfExists('form_ps2_genset_ph_aocc_dua_mingguans');
    }
}