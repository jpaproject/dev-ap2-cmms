<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQ12ToFormAewRubberRemoverHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_aew_rubber_remover_harians', function (Blueprint $table) {
            $table->string('q12')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_aew_rubber_remover_harians', function (Blueprint $table) {
            //
        });
    }
}