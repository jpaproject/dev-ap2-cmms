<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleMaintenanceTaskGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_maintenance_task_group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("schedule_maintenance_id")->unsigned();
            $table->bigInteger("task_group_id")->unsigned();

            $table->foreign("schedule_maintenance_id")->references("id")->on("schedule_maintenances");
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
        Schema::dropIfExists('schedule_maintenance_task_group');
    }
}
