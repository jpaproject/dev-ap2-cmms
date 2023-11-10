<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormNvaHFCPapiHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_nva_h_f_c_papi_harians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");
            $table->string('judul')->nullable();
            $table->string('Fi')->nullable();
            $table->string('glide_a')->nullable();
            $table->string('glide_b')->nullable();
            $table->string('glide_c')->nullable();
            $table->string('glide_d')->nullable();
            $table->string('ccos')->nullable();
            $table->string('remark')->nullable();
            $table->string('hari')->nullable();
            $table->string('tanggal')->nullable();
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
        Schema::dropIfExists('form_nva_h_f_c_papi_harians');
    }
}
