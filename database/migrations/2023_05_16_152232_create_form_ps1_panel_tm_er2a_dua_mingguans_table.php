<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs1PanelTmEr2aDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps1_panel_tm_er2a_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string("data_teknis")->nullable();
            $table->string("mca")->nullable();
            $table->string("mcb")->nullable();
            $table->string("msa")->nullable();
            $table->string("msb")->nullable();
            $table->string("msc")->nullable();
            $table->string("mcf")->nullable();
            $table->string("msd")->nullable();
            $table->string("msf")->nullable();
            $table->string("mse")->nullable();
            $table->string("msg")->nullable();
            $table->string("msj")->nullable();
            $table->string("msi")->nullable();
            $table->string("msh")->nullable();
            $table->string("msl")->nullable();
            $table->string("msk")->nullable();
            $table->string("mcc")->nullable();
            $table->string("satuan")->nullable();
            $table->string("keterangan")->nullable();
            
            $table->text("catatan")->nullable();
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
        Schema::dropIfExists('form_ps1_panel_tm_er2a_dua_mingguans');
    }
}
