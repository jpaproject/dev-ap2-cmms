<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatatanToFormPs2PanelPhAoccMainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_ps2_panel_ph_aocc_mains', function (Blueprint $table) {
            $table->text('catatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_ps2_panel_ph_aocc_mains', function (Blueprint $table) {
            //
        });
    }
}