<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevision2FormNvaChecklist1HariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_nva_checklist1_harians', function (Blueprint $table) {
            $table->dropColumn('rw_in_use_pagi');
            $table->dropColumn('rw_in_use_sore');
            $table->string('runway2_pagi')->nullable();
            $table->string('runway2_sore')->nullable();
            $table->string('runway3_pagi')->nullable();
            $table->string('runway3_sore')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_nva_checklist1_harians');
    }
}
