<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskGroupWorkOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_group_work_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("work_order_id")->unsigned();
            $table->bigInteger("task_group_id")->unsigned();

            $table->foreign("work_order_id")->references("id")->on("work_orders");
            $table->foreign("task_group_id")->references("id")->on("task_groups");
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
        Schema::dropIfExists('task_group_work_order');
    }
}
