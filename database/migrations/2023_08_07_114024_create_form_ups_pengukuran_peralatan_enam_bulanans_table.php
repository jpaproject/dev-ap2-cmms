<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormUpsPengukuranPeralatanEnamBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ups_pengukuran_peralatan_enam_bulanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->date('tanggal')->nullable();
            $table->string('shift')->nullable();
            $table->string('nama_gardu')->nullable();
            $table->string('merk_ups')->nullable();
            $table->string('input_v_l1_n')->nullable();
            $table->string('input_v_l2_n')->nullable();
            $table->string('input_v_l3_n')->nullable();
            $table->string('input_i_l1')->nullable();
            $table->string('input_i_l2')->nullable();
            $table->string('input_i_l3')->nullable();
            $table->string('freq_input')->nullable();
            $table->string('teg_floating')->nullable();
            $table->string('teg_rata2_percell')->nullable();
            $table->string('teg_tot_batt')->nullable();
            $table->string('teg_otonomi')->nullable();
            $table->string('arus_discharge')->nullable();
            $table->string('arus_bhoscarge')->nullable();
            $table->string('output_v_l1_n')->nullable();
            $table->string('output_v_l2_n')->nullable();
            $table->string('output_v_l3_n')->nullable();
            $table->string('v_l1')->nullable();
            $table->string('v_l2')->nullable();
            $table->string('v_l3')->nullable();
            $table->string('output_i_l1')->nullable();
            $table->string('output_i_l2')->nullable();
            $table->string('output_i_l3')->nullable();
            $table->string('load_persen')->nullable();
            $table->string('load_perphase')->nullable();
            $table->string('total_load')->nullable();
            $table->string('freq_output')->nullable();
            $table->string('temp_ruang')->nullable();
            $table->string('temp_unit')->nullable();
            $table->string('temp_battery')->nullable();
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
        Schema::dropIfExists('form_ups_pengukuran_peralatan_enam_bulanans');
    }
}
