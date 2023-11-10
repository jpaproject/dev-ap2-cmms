<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormUpsLaporanKerusakanDanPerbaikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ups_laporan_kerusakan_dan_perbaikans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->date('tanggal')->nullable();
            $table->string('lokasi_pekerjaan')->nullable();
            $table->string('fasilitas')->nullable();
            $table->string('bagian_peralatan')->nullable();
            $table->string('kategori_kerusakan')->nullable();
            $table->string('uraian')->nullable();
            $table->string('tindakan')->nullable();
            $table->string('penyebab')->nullable();
            $table->datetime('tanggal_kerusakan')->nullable();
            $table->datetime('tanggal_perbaikan')->nullable();
            $table->time('jumlah_jam')->nullable();
            $table->string('kode_hambatan')->nullable();
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
        Schema::dropIfExists('form_ups_laporan_kerusakan_dan_perbaikans');
    }
}
