<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormNvaChecklist1HariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_nva_checklist1_harians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('tanggal')->nullable();
            $table->string('jam_pagi')->nullable();
            $table->string('qfu_pagi')->nullable();
            $table->string('jam_sore')->nullable();
            $table->string('qfu_sore')->nullable();
            
            $table->string('pertanyaan')->nullable();
            $table->string('pagi_on')->nullable();
            $table->string('pagi_off')->nullable();
            $table->string('sore_on')->nullable();
            $table->string('sore_off')->nullable();
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
        Schema::dropIfExists('form_nva_checklist1_harians');
    }
}
