<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs3TrafoGensetCheckEnamBulananTahunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps3_trafo_genset_check_enam_bulanan_tahunans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('n1')->nullable();
            $table->string('n2')->nullable();
            $table->string('n3')->nullable();
            $table->string('hv_g_1m')->nullable();
            $table->string('hv_g_10m')->nullable();
            $table->string('lv_g_1m')->nullable();
            $table->string('lv_g_10m')->nullable();
            $table->string('hv_lv_1m')->nullable();
            $table->string('hv_lv_10m')->nullable();
            $table->string('l1_g_1m')->nullable();
            $table->string('l2_g_1m')->nullable();
            $table->string('l3_g_1m')->nullable();
            $table->string('l1_l2_1m')->nullable();
            $table->string('l2_l3_1m')->nullable();
            $table->string('l1_l3_1m')->nullable();

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
        Schema::dropIfExists('form_ps3_trafo_genset_check_enam_bulanan_tahunans');
    }
}
