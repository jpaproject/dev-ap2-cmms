<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevision1FormNvaChecklist1HariansTable extends Migration
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

            $table->date('tanggal')->nullable();
            $table->time('jam_pagi')->nullable();
            $table->string('rw_in_use_pagi')->nullable();
            $table->time('jam_sore')->nullable();
            $table->string('rw_in_use_sore')->nullable();
            $table->string('runway')->nullable();
            $table->string('peralatan')->nullable();
            $table->string('hasil_pagi')->nullable();
            $table->string('hasil_sore')->nullable();
            $table->string('oleh')->nullable();
            $table->string('paraf')->nullable();

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
