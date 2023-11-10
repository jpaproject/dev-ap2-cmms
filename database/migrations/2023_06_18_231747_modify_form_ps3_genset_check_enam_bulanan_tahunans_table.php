<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFormPs3GensetCheckEnamBulananTahunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('form_ps3_genset_check_enam_bulanan_tahunans');
        Schema::create('form_ps3_genset_check_enam_bulanan_tahunans', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            //PEMERIKSAAN TAHANAN BELITAN (AVOMETER)
            $table->string('motor_radiator_belitan_u1_u2')->nullable();
            $table->string('motor_radiator_belitan_v1_v2')->nullable();
            $table->string('motor_radiator_belitan_w1_w2')->nullable();
            $table->string('motor_radiator_belitan_l1_g')->nullable();
            $table->string('motor_radiator_belitan_l2_g')->nullable();
            $table->string('motor_radiator_belitan_l3_g')->nullable();
            
            // PEMERIKSAAN TAHANAN ISOLASI
            $table->string('motor_radiator_isolasi_l1_g_1m')->nullable();
            $table->string('motor_radiator_isolasi_l1_g_10m')->nullable();

            $table->string('motor_radiator_isolasi_l2_g_1m')->nullable();
            $table->string('motor_radiator_isolasi_l2_g_10m')->nullable();

            $table->string('motor_radiator_isolasi_l3_g_1m')->nullable();
            $table->string('motor_radiator_isolasi_l3_g_10m')->nullable();

            $table->string('motor_radiator_isolasi_l1_l2_1m')->nullable();
            $table->string('motor_radiator_isolasi_l1_l2_10m')->nullable();

            $table->string('motor_radiator_isolasi_l1_l3_1m')->nullable();
            $table->string('motor_radiator_isolasi_l1_l3_10m')->nullable();

            $table->string('motor_radiator_isolasi_l2_l3_1m')->nullable();
            $table->string('motor_radiator_isolasi_l2_l3_10m')->nullable();
            

            // PEMERIKSAAN TAHANAN ISOLASI
            $table->string('alternator_isolasi_l1_g_1m')->nullable();
            $table->string('alternator_isolasi_l1_g_10m')->nullable();

            $table->string('alternator_isolasi_l2_g_1m')->nullable();
            $table->string('alternator_isolasi_l2_g_10m')->nullable();

            $table->string('alternator_isolasi_l3_g_1m')->nullable();
            $table->string('alternator_isolasi_l3_g_10m')->nullable();

            $table->string('alternator_isolasi_l1_l2_l3_g_1m')->nullable();
            $table->string('alternator_isolasi_l1_l2_l3_g_10m')->nullable();

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
        Schema::dropIfExists('form_ps3_genset_check_enam_bulanan_tahunans');
    }
}
