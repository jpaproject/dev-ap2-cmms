<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormApmElektrikalVehicleExteriorBAThasilTigaBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_apm_elektrikal_vehicle_exterior_b_a_thasil_tiga_bulanans', function (Blueprint $table) {
            $table->id();
            $table
                ->bigInteger('form_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('form_id')
                ->references('id')
                ->on('forms');

            $table
                ->bigInteger('detail_work_order_form_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('detail_work_order_form_id')
                ->references('id')
                ->on('detail_work_order_forms');

            $table
                ->bigInteger('work_order_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('work_order_id')
                ->references('id')
                ->on('work_orders');

            $table->string('pemeriksaan_bat')->nullable();
            $table->string('pemeriksaan_bat_group')->nullable();
            $table->string('hasil_pengukuran')->nullable();
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
        Schema::dropIfExists('form_apm_elektrikal_vehicle_exterior_b_a_thasil_tiga_bulanans');
    }
}
