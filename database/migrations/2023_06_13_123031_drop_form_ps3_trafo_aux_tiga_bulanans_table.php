<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropFormPs3TrafoAuxTigaBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_ps3_trafo_aux_tiga_bulanans', function (Blueprint $table) {
            Schema::dropIfExists('form_ps3_trafo_aux_tiga_bulanans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_ps3_trafo_aux_tiga_bulanans', function (Blueprint $table) {
            //
        });
    }
}
