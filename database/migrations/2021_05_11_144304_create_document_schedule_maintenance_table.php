<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentScheduleMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_schedule_maintenance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("schedule_maintenance_id")->unsigned();
            $table->bigInteger("document_id")->unsigned();

            $table->foreign("schedule_maintenance_id")->references("id")->on("schedule_maintenances");
            $table->foreign("document_id")->references("id")->on("documents");
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
        Schema::dropIfExists('document_schedule_maintenance');
    }
}
