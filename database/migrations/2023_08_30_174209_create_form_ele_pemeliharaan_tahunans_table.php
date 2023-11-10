<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormElePemeliharaanTahunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ele_pemeliharaan_tahunans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('pengawas')->nullable();
            $table->string('substation')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('sdp')->nullable();
            $table->string('temp')->nullable();
            $table->string('rs')->nullable();
            $table->string('st')->nullable();
            $table->string('tr')->nullable();
            $table->string('rn')->nullable();
            $table->string('sn')->nullable();
            $table->string('tn')->nullable();
            $table->string('ng')->nullable();
            $table->string('catatan')->nullable();

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
        Schema::dropIfExists('form_ele_pemeliharaan_tahunans');
    }
}
