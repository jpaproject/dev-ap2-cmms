<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger("asset_id")->unsigned()->nullable();
            $table->bigInteger("work_order_status_id")->unsigned()->nullable();
            $table->bigInteger("maintenance_type_id")->unsigned()->nullable();
            $table->bigInteger("schedule_maintenance_id")->unsigned()->nullable();
            $table->enum('priority', ['highest', 'high', 'medium', 'low', 'lowest']);
            $table->text('description')->nullable();
            $table->datetime('suggested_completion_date')->nullable();
            $table->datetime('actual_completion_date')->nullable();
            $table->text('completion_notes')->nullable();

            $table->foreign("asset_id")->references("id")->on("assets");
            $table->foreign("work_order_status_id")->references("id")->on("work_order_statuses");
            $table->foreign("maintenance_type_id")->references("id")->on("maintenance_types");
            $table->foreign("schedule_maintenance_id")->references("id")->on("schedule_maintenances");

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
        Schema::dropIfExists('work_orders');
    }
}
