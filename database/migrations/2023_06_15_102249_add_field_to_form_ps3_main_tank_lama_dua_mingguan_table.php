<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToFormPs3MainTankLamaDuaMingguanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_ps3_main_tank_lama_dua_mingguans', function (Blueprint $table) {
            $table->string('main_tank_p1a_2')->nullable();
            $table->string('main_tank_p1b_2')->nullable();
            $table->string('main_tank_p2a_2')->nullable();
            $table->string('main_tank_p2b_2')->nullable();
            $table->string('main_tank_p4_2')->nullable();

            $table->string('sump_tank_p1_2')->nullable();
            $table->string('sump_tank_p2_2')->nullable();

            $table->string('pompa_sumpit_main_tank_p1_2')->nullable();
            $table->string('pompa_sumpit_main_tank_p2_2')->nullable();

            $table->string('pompa_sumpit_sump_tank_p1_2')->nullable();
            $table->string('pompa_sumpit_sump_tank_p2_2')->nullable();

            $table->string('main_tank_p1a_3')->nullable();
            $table->string('main_tank_p1b_3')->nullable();
            $table->string('main_tank_p2a_3')->nullable();
            $table->string('main_tank_p2b_3')->nullable();
            $table->string('main_tank_p4_3')->nullable();

            $table->string('sump_tank_p1_3')->nullable();
            $table->string('sump_tank_p2_3')->nullable();

            $table->string('pompa_sumpit_main_tank_p1_3')->nullable();
            $table->string('pompa_sumpit_main_tank_p2_3')->nullable();

            $table->string('pompa_sumpit_sump_tank_p1_3')->nullable();
            $table->string('pompa_sumpit_sump_tank_p2_3')->nullable();


            $table->string('panel_hmi_main_tank_2')->nullable();
            $table->string('panel_kontrol_main_tank_2')->nullable();
            $table->string('panel_kontrol_sump_tank_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_ps3_main_tank_lama_dua_mingguans', function (Blueprint $table) {
            //
        });
    }
}
