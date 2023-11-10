<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs1PanelTmEnamBulananEr6sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps1_panel_tm_enam_bulanan_er6s', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string("data_teknis")->nullable();
            $table->string('xca')->nullable();
            $table->string('xcb')->nullable();
            $table->string('xcr')->nullable();
            $table->string('xsn')->nullable();
            $table->string('xsm')->nullable();
            $table->string('xce')->nullable();
            $table->string('xcd')->nullable();
            $table->string('xsp')->nullable();
            $table->string('xcs')->nullable();
            $table->string('xsq')->nullable();
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
        Schema::dropIfExists('form_ps1_panel_tm_enam_bulanan_er6s');
    }
}
