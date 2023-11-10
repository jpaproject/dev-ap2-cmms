<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRgSgTgGnToFormPs2PanelDuaMingguanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_ps2_panel_dua_mingguans', function (Blueprint $table) {
            $table->string('tegangan_rg')->nullable();
            $table->string('tegangan_sg')->nullable();
            $table->string('tegangan_tg')->nullable();
            $table->string('tegangan_gn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_ps2_panel_dua_mingguans', function (Blueprint $table) {
            //
        });
    }
}