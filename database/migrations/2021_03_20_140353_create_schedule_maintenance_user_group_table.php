<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleMaintenanceUserGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_maintenance_user_group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("schedule_maintenance_id")->unsigned();
            $table->bigInteger("user_group_id")->unsigned();
            
            $table->foreign("schedule_maintenance_id")->references("id")->on("schedule_maintenances");
            $table->foreign("user_group_id")->references("id")->on("user_groups");
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
        Schema::dropIfExists('schedule_maintenance_user_group');
    }
}
