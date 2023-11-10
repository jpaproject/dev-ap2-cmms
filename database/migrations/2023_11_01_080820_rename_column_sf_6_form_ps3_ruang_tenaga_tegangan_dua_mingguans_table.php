<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnSf6FormPs3RuangTenagaTeganganDuaMingguansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_ps3_ruang_tenaga_tegangan_dua_mingguans', function (Blueprint $table) {
            $table->dropColumn('sf-6');
            $table->string('sf_6')->nullable();
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
        Schema::table('form_ps3_ruang_tenaga_tegangan_dua_mingguans', function (Blueprint $table) {
            $table->renameColumn('sf_6', 'sf-6');
        });
    }
}
