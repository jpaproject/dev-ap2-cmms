<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormUpsLaporanHasilKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ups_laporan_hasil_kerjas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('serah_terima')->nullable();
            $table->string('koordinasi')->nullable();
            $table->string('hasil_visual')->nullable();
            $table->boolean('toolkit')->default(false);
            $table->boolean('avometer')->default(false);
            $table->boolean('reytex')->default(false);
            $table->boolean('kendaraan')->default(false);
            $table->boolean('apd')->default(false);
            $table->boolean('alat_cleaning')->default(false);
            $table->boolean('pengukuran')->default(false);
            $table->boolean('temperatur')->default(false);
            $table->boolean('membersihkan')->default(false);
            $table->boolean('dokumentasi')->default(false);
            $table->boolean('serahterima')->default(false);
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
        Schema::dropIfExists('form_ups_laporan_hasil_kerjas');
    }
}
