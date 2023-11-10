<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanKerusakanElectricalProtectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_kerusakan_electrical_protections', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->datetime('date')->nullable();
            $table->string('fasilitas')->nullable();
            $table->string('peralatan')->nullable();
            $table->text('bagian_peralatan')->nullable();
            $table->string('kategori_kerusakan')->nullable();
            $table->text('uraian_kerusakan')->nullable();
            $table->text('tindakan_perbaikan')->nullable();
            $table->text('penyebab_perbaikan')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->string('jumlah_jam_operasi_terputus')->nullable();
            $table->string('kode_hambatan')->nullable();
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
        Schema::dropIfExists('laporan_kerusakan_electrical_protections');
    }
}