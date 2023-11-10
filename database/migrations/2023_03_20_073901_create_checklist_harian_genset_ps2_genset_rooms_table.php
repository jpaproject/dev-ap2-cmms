<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistHarianGensetPs2GensetRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_harian_genset_ps2_genset_rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('q1')->nullable();
            $table->float('q2')->nullable();
            $table->string('q3')->nullable();
            $table->string('q4')->nullable();
            $table->string('q5')->nullable();
            $table->string('q6')->nullable();
            $table->string('q7')->nullable();
            $table->string('q8')->nullable();
            $table->string('q9')->nullable();
            $table->string('q10')->nullable();
            $table->string('q11')->nullable();
            $table->string('q12')->nullable();
            $table->float('q13')->nullable();
            $table->string('q14')->nullable();
            $table->string('q15')->nullable();
            $table->float('q16_gt1')->nullable();
            $table->float('q16_gt2')->nullable();
            $table->float('q16_gt3')->nullable();
            $table->string('q17')->nullable();
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
        Schema::dropIfExists('checklist_harian_genset_ps2_genset_rooms');
    }
}