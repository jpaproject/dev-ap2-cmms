<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs3RuangTenagaSuhuDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps3_ruang_tenaga_suhu_dua_mingguans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('trafo_a_n1')->nullable();
            $table->string('trafo_a_n2')->nullable();
            $table->string('trafo_a_n3')->nullable();
            $table->string('trafo_b_n1')->nullable();
            $table->string('trafo_b_n2')->nullable();
            $table->string('trafo_b_n3')->nullable();

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
        Schema::dropIfExists('form_ps3_ruang_tenaga_suhu_dua_mingguans');
    }
}
