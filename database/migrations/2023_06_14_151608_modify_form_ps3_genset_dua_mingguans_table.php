<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFormPs3GensetDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_ps3_genset_dua_mingguans', function (Blueprint $table) {
            $table->dropColumn('level_oli_mesin_g1');
            $table->dropColumn('level_air_radiator_g1');
            $table->dropColumn('level_air_battery_g1');
            $table->dropColumn('level_bahan_bakar_g1');
            $table->dropColumn('tegangan_battery_starter_g1');
            $table->dropColumn('coolant_temperature_g1');
            $table->dropColumn('hour_meter_g1');
            $table->dropColumn('alternator_heater_g1');

            $table->dropColumn('level_oli_mesin_g2');
            $table->dropColumn('level_air_radiator_g2');
            $table->dropColumn('level_air_battery_g2');
            $table->dropColumn('level_bahan_bakar_g2');
            $table->dropColumn('tegangan_battery_starter_g2');
            $table->dropColumn('coolant_temperature_g2');
            $table->dropColumn('hour_meter_g2');
            $table->dropColumn('alternator_heater_g2');

            $table->string('level_oli_mesin')->nullable();
            $table->string('level_air_radiator')->nullable();
            $table->string('level_air_battery')->nullable();
            $table->string('level_bahan_bakar')->nullable();
            $table->string('tegangan_battery_starter')->nullable();
            $table->string('coolant_temperature')->nullable();
            $table->string('hour_meter')->nullable();
            $table->string('alternator_heater')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_ps3_genset_dua_mingguans', function (Blueprint $table) {
            $table->string('level_oli_mesin_g1')->nullable();
            $table->string('level_air_radiator_g1')->nullable();
            $table->string('level_air_battery_g1')->nullable();
            $table->string('level_bahan_bakar_g1')->nullable();
            $table->string('tegangan_battery_starter_g1')->nullable();
            $table->string('coolant_temperature_g1')->nullable();
            $table->string('hour_meter_g1')->nullable();
            $table->string('alternator_heater_g1')->nullable();

            $table->string('level_oli_mesin_g2')->nullable();
            $table->string('level_air_radiator_g2')->nullable();
            $table->string('level_air_battery_g2')->nullable();
            $table->string('level_bahan_bakar_g2')->nullable();
            $table->string('tegangan_battery_starter_g2')->nullable();
            $table->string('coolant_temperature_g2')->nullable();
            $table->string('hour_meter_g2')->nullable();
            $table->string('alternator_heater_g2')->nullable();

            $table->dropColumn('level_oli_mesin');
            $table->dropColumn('level_air_radiator');
            $table->dropColumn('level_air_battery');
            $table->dropColumn('level_bahan_bakar');
            $table->dropColumn('tegangan_battery_starter');
            $table->dropColumn('coolant_temperature');
            $table->dropColumn('hour_meter');
            $table->dropColumn('alternator_heater');
        });
    }
}
