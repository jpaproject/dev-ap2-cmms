<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShiftColumnsToScheduleMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedule_maintenances', function (Blueprint $table) {
            $table->string('shift_pagi')->nullable();
            $table->string('shift_malam')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedule_maintenances', function (Blueprint $table) {
            $table->dropColumn('shift_pagi');
            $table->dropColumn('shift_malam');
        });
    }
}
