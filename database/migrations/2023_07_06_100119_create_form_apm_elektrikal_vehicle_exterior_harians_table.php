<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormApmElektrikalVehicleExteriorHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_apm_elektrikal_vehicle_exterior_harians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('pemeriksaan_exterior')->nullable();
            $table->string('pemeriksaan_exterior_group')->nullable();
            $table->string('hasil_mc1')->nullable();
            $table->string('hasil_mc2')->nullable();

            $table->string('hasil_pc1_plus')->nullable();
            $table->string('hasil_pc2_plus')->nullable();
            $table->string('hasil_pc3_plus')->nullable();
            $table->string('hasil_pc4_plus')->nullable();

            $table->string('hasil_pc1_min')->nullable();
            $table->string('hasil_pc2_min')->nullable();
            $table->string('hasil_pc3_min')->nullable();
            $table->string('hasil_pc4_min')->nullable();

            $table->string('hasil_tm1')->nullable();
            $table->string('hasil_tm2')->nullable();
            $table->string('hasil_tm3')->nullable();
            $table->string('hasil_tm4')->nullable();

            $table->string('hasil_1_led1')->nullable();
            $table->string('hasil_1_led2')->nullable();
            $table->string('hasil_2_led1')->nullable();
            $table->string('hasil_2_led2')->nullable();

            $table->string('hasil_jp_hjb')->nullable();
            $table->string('hasil_jp_ljb')->nullable();
            $table->string('referensi')->nullable();
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
        Schema::dropIfExists('form_apm_elektrikal_vehicle_exterior_harians');
    }
}
