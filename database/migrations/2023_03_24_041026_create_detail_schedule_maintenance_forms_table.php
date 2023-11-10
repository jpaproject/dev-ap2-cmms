<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailScheduleMaintenanceFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_schedule_maintenance_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("schedule_maintenance_id")->unsigned()->nullable();
            $table->bigInteger("form_id")->unsigned()->nullable();

            $table->foreign("schedule_maintenance_id")->references("id")->on("schedule_maintenances");
            $table->foreign("form_id")->references("id")->on("forms");
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
        Schema::dropIfExists('detail_schedule_maintenance_forms');
    }
}
