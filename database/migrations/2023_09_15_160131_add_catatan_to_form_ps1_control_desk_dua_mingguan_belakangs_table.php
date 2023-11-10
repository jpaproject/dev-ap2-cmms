<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatatanToFormPs1ControlDeskDuaMingguanBelakangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_ps1_control_desk_dua_mingguan_belakangs', function (Blueprint $table) {
            $table->string('catatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_ps1_control_desk_dua_mingguan_belakangs', function (Blueprint $table) {
            $table->dropColumn('catatan');
        });
    }
}
