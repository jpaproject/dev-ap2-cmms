<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormElpTrafoDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_elp_trafo_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('substation')->nullable();
            $table->string('panel')->nullable();
            $table->string('jenis_trafo')->nullable();
            $table->string('kapasitas_trafo')->nullable();
            
            $table->string('indikasi_trafo_suhu')->nullable();
            $table->string('indikasi_trafo_level_oli')->nullable();
            $table->string('indikasi_trafo_pressure')->nullable();
            
            $table->string('suhu_trafo_r')->nullable();
            $table->string('suhu_trafo_s')->nullable();
            $table->string('suhu_trafo_t')->nullable();
            $table->string('suhu_ruang')->nullable();

            $table->string('proteksi_trafo_kontrol_v')->nullable();
            $table->string('proteksi_trafo_suhu1')->nullable();
            $table->string('proteksi_trafo_suhu2')->nullable();
            $table->string('proteksi_trafo_kondisi_rele_trafo')->nullable();
            $table->string('proteksi_trafo_kondisi_kabel_kontrol')->nullable();

            $table->string('tegangan_tm_vl_l')->nullable();
            $table->string('tegangan_tm_vl_n')->nullable();

            $table->string('arus_tm_r')->nullable();
            $table->string('arus_tm_s')->nullable();
            $table->string('arus_tm_t')->nullable();

            $table->string('daya_tm_p')->nullable();
            $table->string('daya_tm_q')->nullable();
            $table->string('daya_tm_s')->nullable();
            $table->string('daya_tm_pf')->nullable();

            $table->string('daya_trafo_efisiensi_p')->nullable();
            $table->string('daya_trafo_efisiensi_q')->nullable();
            $table->string('daya_trafo_efisiensi_s')->nullable();

            $table->string('tahanan_n_g_trafo')->nullable();
            $table->string('tahanan_gardu_1')->nullable();
            $table->string('tahanan_gardu_2')->nullable();
            $table->string('tahanan_gardu_3')->nullable();
            $table->string('tahanan_gardu_4')->nullable();
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
        Schema::dropIfExists('form_elp_trafo_dua_mingguans');
    }
}
