<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFormPs3CraneGensetTigaBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_ps3_crane_genset_tiga_bulanans', function (Blueprint $table) {
            $table->dropColumn('crane_a');
            $table->dropColumn('crane_b');
            $table->string('arus_motor_crane_a')->nullable();
            $table->string('arus_motor_crane_b')->nullable();
            $table->string('panel_crane_a')->nullable();
            $table->string('panel_crane_b')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_ps3_crane_genset_tiga_bulanans', function (Blueprint $table) {
            $table->string('crane_a')->nullable();
            $table->string('crane_b')->nullable();
            $table->dropColumn('arus_motor_crane_a');
            $table->dropColumn('arus_motor_crane_b');
            $table->dropColumn('panel_crane_a');
            $table->dropColumn('panel_crane_b');
        });
    }
}
