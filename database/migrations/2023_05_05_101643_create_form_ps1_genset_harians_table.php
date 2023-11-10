<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs1GensetHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps1_genset_harians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('q1a_cd')->nullable();
            $table->string('q1b_cd')->nullable();
            $table->string('q2a_cd')->nullable();
            $table->string('q2b_cd')->nullable();
            $table->string('q3a_cd')->nullable();
            $table->string('q3b_cd')->nullable();
            $table->string('q3_keterangan_cd')->nullable();
            $table->string('q4a_cd')->nullable();
            $table->string('q4b_cd')->nullable();
            $table->string('q4_keterangan_cd')->nullable();
            $table->string('q5a_cd')->nullable();
            $table->string('q5b_cd')->nullable();
            $table->string('q5_keterangan_cd')->nullable();

            $table->string('q1a')->nullable();
            $table->string('q1b')->nullable();
            $table->string('q2a')->nullable();
            $table->string('q2b')->nullable();
            $table->string('q3a')->nullable();
            $table->string('q3b')->nullable();
            $table->string('q4a')->nullable();
            $table->string('q4b')->nullable();
            $table->string('q5a')->nullable();
            $table->string('q5b')->nullable();
            $table->string('q6a')->nullable();
            $table->string('q6b')->nullable();
            $table->string('q7a')->nullable();
            $table->string('q7b')->nullable();
            $table->string('q8a')->nullable();
            $table->string('q8b')->nullable();
            $table->string('q9a')->nullable();
            $table->string('q9b')->nullable();
            $table->string('q10a')->nullable();
            $table->string('q10b')->nullable();
            $table->string('q10_keterangan')->nullable();
            $table->string('q11a')->nullable();
            $table->string('q11b')->nullable();
            $table->string('q12a')->nullable();
            $table->string('q12b')->nullable();
            $table->string('q13a')->nullable();
            $table->string('q13b')->nullable();
            $table->string('q14a')->nullable();
            $table->string('q14b')->nullable();
            $table->string('q14_keterangan')->nullable();

            $table->string('tank1')->nullable();
            $table->string('tank2')->nullable();
            $table->string('tank3')->nullable();

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
        Schema::dropIfExists('form_ps1_genset_harians');
    }
}