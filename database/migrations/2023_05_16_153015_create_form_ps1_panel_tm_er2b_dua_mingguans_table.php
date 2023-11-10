<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs1PanelTmEr2bDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps1_panel_tm_er2b_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string("data_teknis")->nullable();
            $table->string('mcd')->nullable();
            $table->string('mce')->nullable();
            $table->string('msx')->nullable();
            $table->string('msw')->nullable();
            $table->string('msv')->nullable();
            $table->string('mcg')->nullable();
            $table->string('msu')->nullable();
            $table->string('mss')->nullable();
            $table->string('mst')->nullable();
            $table->string('msr')->nullable();
            $table->string('mso')->nullable();
            $table->string('msp')->nullable();
            $table->string('msq')->nullable();
            $table->string('msm')->nullable();
            $table->string('msn')->nullable();
            $table->string('mcc')->nullable();
            $table->string('satuan')->nullable();
            $table->string('keterangan')->nullable();

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
        Schema::dropIfExists('form_ps1_panel_tm_er2b_dua_mingguans');
    }
}
