<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSvaPemeliharaanBulananHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_sva_pemeliharaan_bulanan_harians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('substation')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('peralatan')->nullable();
            $table->string('merk')->nullable();
            $table->string('tipe')->nullable();
            $table->string('kapasitas')->nullable();
            $table->string('tahun_pemasangan')->nullable();
            $table->string('arus_masuk')->nullable();
            $table->string('step1')->nullable();
            $table->string('step2')->nullable();
            $table->string('step3')->nullable();
            $table->string('step4')->nullable();
            $table->string('step5')->nullable();
            $table->string('vp1_p2')->nullable();
            $table->string('vp1_n')->nullable();
            $table->string('vp2_n')->nullable();

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
        Schema::dropIfExists('form_sva_pemeliharaan_bulanan_harians');
    }
}