<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs1PanelTmDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps1_panel_tm_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string("data_teknis")->nullable();
            $table->string("panel_synchron_xda")->nullable();
            $table->string("panel_synchron_xdb")->nullable();
            $table->string("er1b_xsa")->nullable();
            $table->string("er1b_xsb")->nullable();
            $table->string("er1b_msa")->nullable();
            $table->string("er1b_xca")->nullable();
            $table->string("er7_xsa")->nullable();
            $table->string("er7_xsb")->nullable();
            $table->string("er7_msa")->nullable();
            $table->string("er7_xca")->nullable();
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
        Schema::dropIfExists('form_ps1_panel_tm_dua_mingguans');
    }
}
