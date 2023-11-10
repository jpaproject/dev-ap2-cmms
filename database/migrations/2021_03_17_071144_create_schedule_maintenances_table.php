<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->bigInteger("asset_id")->unsigned()->nullable();
            $table->bigInteger("work_order_status_id")->unsigned()->nullable();
            $table->bigInteger("maintenance_type_id")->unsigned()->nullable();
            $table->enum('priority', ['highest', 'high', 'medium', 'low', 'lowest']);
            $table->text('description')->nullable();
            $table->boolean('status');
            $table->date('start_date');
            $table->date('end_date');

            // schedule maintenance
            $table->enum('schedule', ['hour', 'day', 'week', 'month', 'year']);       
            $table->integer('minute')->nullable();
            $table->integer('hour');
            $table->integer('day_of_month')->nullable();
            $table->integer('month')->nullable();
            $table->integer('week')->nullable();
            $table->string('day_of_week')->nullable();
            $table->integer('year')->nullable();

            $table->foreign("asset_id")->references("id")->on("assets");
            $table->foreign("work_order_status_id")->references("id")->on("work_order_statuses");
            $table->foreign("maintenance_type_id")->references("id")->on("maintenance_types");

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
        Schema::dropIfExists('schedule_maintenances');
    }
}
