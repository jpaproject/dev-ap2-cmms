<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSntChecklistLiftingPumpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_snt_checklist_lifting_pumps', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms");

            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms");

            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders");

            $table->string('nama_peralatan')->nullable();
            $table->string('periode')->nullable();
            $table->string('operasi')->nullable();
            $table->string('tegangan')->nullable();
            $table->string('tegangan_24')->nullable();
            $table->string('arus')->nullable();
            $table->string('relay')->nullable();
            $table->string('kontaktor')->nullable();
            $table->string('plc')->nullable();
            $table->string('pelampung')->nullable();
            $table->string('pemipaan')->nullable();
            $table->string('sampah')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('form_snt_checklist_lifting_pumps');
    }
}
