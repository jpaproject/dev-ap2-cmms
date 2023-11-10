<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("detail_work_order_form_id")->unsigned()->nullable();
            $table->foreign("detail_work_order_form_id")->references("id")->on("detail_work_order_forms")->onDelete('set null');
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign("form_id")->references("id")->on("forms")->onDelete('set null');
            $table->bigInteger('work_order_id')->unsigned()->nullable();
            $table->foreign("work_order_id")->references("id")->on("work_orders")->onDelete('set null');
            $table->string('status')->nullable();
            $table->timestamp('time_record')->nullable();
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
        Schema::dropIfExists('form_activity_logs');
    }
}
