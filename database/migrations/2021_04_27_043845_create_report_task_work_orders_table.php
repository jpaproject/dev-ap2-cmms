<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTaskWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_task_work_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('task_name');
            $table->boolean('status')->default(0);
            $table->text('remarks')->nullable();
            $table->bigInteger("work_order_id")->unsigned();
            $table->bigInteger("user_technical_id")->unsigned()->nullable();
            $table->integer('time_estimate')->nullable();

            $table->foreign("work_order_id")->references("id")->on("work_orders");
            $table->foreign("user_technical_id")->references("id")->on("user_technicals");
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
        Schema::dropIfExists('report_task_work_orders');
    }
}
