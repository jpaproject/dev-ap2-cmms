<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPs3ControlRoomHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_ps3_control_room_harians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('er2a_mca')->nullable();
            $table->string('er2a_mcb')->nullable();
            $table->string('er2b_mcd')->nullable();
            $table->string('er2b_mce')->nullable();
            $table->string('keterangan_pln_incoming')->nullable();
            $table->string('er2a_mcf')->nullable();
            $table->string('er2b_mcg')->nullable();
            $table->string('keterangan_genset_incoming')->nullable();
            $table->string('genset1')->nullable();
            $table->string('genset2')->nullable();
            $table->string('genset3')->nullable();
            $table->string('genset4')->nullable();
            $table->string('genset5')->nullable();
            $table->string('genset6')->nullable();
            $table->string('genset7')->nullable();
            $table->string('genset8')->nullable();
            $table->string('keterangan_hmi')->nullable();
            $table->boolean('busbar_a')->default(false);
            $table->boolean('busbar_b')->default(false);
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
        Schema::dropIfExists('form_ps3_control_room_harians');
    }
}
