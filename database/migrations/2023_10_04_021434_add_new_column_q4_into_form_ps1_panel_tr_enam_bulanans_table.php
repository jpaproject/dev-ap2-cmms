<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnQ4IntoFormPs1PanelTrEnamBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_ps1_panel_tr_enam_bulanans', function (Blueprint $table) {
            $table->string('q4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_ps1_panel_tr_enam_bulanans', function (Blueprint $table) {
            $table->dropColumn('q4'); // If you ever need to rollback the migration
        });
    }
}
