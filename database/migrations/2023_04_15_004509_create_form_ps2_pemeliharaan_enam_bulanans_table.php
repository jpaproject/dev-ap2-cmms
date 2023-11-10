<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs2PemeliharaanEnamBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps2_pemeliharaan_enam_bulanans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('panel')->nullable();
            $table->string('q1_panel')->nullable();
            $table->string('q2_panel')->nullable();
            $table->string('q3_panel')->nullable();
            $table->string('q4_panel')->nullable();
            $table->string('q5_panel')->nullable();
            $table->string('q6_panel')->nullable();
            $table->string('q7_panel')->nullable();
            $table->string('q8_panel')->nullable();
            $table->string('q9_panel')->nullable();
            $table->string('q10_panel')->nullable();
            $table->string('q11_panel')->nullable();
            $table->string('q12_panel')->nullable();
            $table->string('q13_panel')->nullable();
            $table->string('q14_panel')->nullable();
            $table->string('q15_panel')->nullable();
            $table->string('q16_panel')->nullable();
            $table->string('q17_panel')->nullable();
            $table->string('q18_panel')->nullable();
            $table->string('q19_panel')->nullable();
            $table->string('q20_panel')->nullable();
            $table->string('q21_panel')->nullable();
            $table->string('q22_panel')->nullable();
            $table->string('q23_panel')->nullable();
            $table->string('q24_panel')->nullable();
            $table->string('q25_panel')->nullable();
            $table->string('q26_panel')->nullable();
            $table->string('l1g_panel')->nullable();
            $table->string('l2g_panel')->nullable();
            $table->string('l3g_panel')->nullable();
            $table->string('q27_panel')->nullable();
            $table->string('q28_panel')->nullable();

            $table->string('q1_kabel')->nullable();
            $table->string('q2_kabel')->nullable();
            $table->string('q3_kabel')->nullable();
            $table->string('q4_kabel')->nullable();
            $table->string('l1g_kabel')->nullable();
            $table->string('l2g_kabel')->nullable();
            $table->string('l3g_kabel')->nullable();
            $table->string('l1_l2_kabel')->nullable();
            $table->string('l2_l3_kabel')->nullable();
            $table->string('l1_l3_kabel')->nullable();
            $table->string('q5_kabel')->nullable();
            $table->string('q6_kabel')->nullable();

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
        Schema::dropIfExists('form_ps2_pemeliharaan_enam_bulanans');
    }
}
