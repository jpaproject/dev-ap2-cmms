<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormWtrPeralatanHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_wtr_peralatan_harians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('peralatan')->nullable();
            $table->string('jumlah_alat_running')->nullable();
            $table->string('jumlah_alat_standby')->nullable();
            $table->string('jumlah_alat_off')->nullable();
            $table->string('jumlah_alat_total')->nullable();
            $table->string('satuan')->nullable();
            $table->float('tingkat_service_ability')->nullable();
            $table->float('peforma')->nullable();
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
        Schema::dropIfExists('form_wtr_peralatan_harians');
    }
}
