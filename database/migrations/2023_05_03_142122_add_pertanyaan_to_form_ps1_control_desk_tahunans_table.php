<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPertanyaanToFormPs1ControlDeskTahunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_ps1_control_desk_tahunans', function (Blueprint $table) {
            $table->string('pertanyaan')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_ps1_control_desk_tahunans', function (Blueprint $table) {
            //
        });
    }
}
