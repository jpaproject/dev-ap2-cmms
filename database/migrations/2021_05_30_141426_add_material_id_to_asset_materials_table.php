<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaterialIdToAssetMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asset_materials', function (Blueprint $table) {
            $table->bigInteger("material_id")->unsigned()->nullable();
            $table->foreign("material_id")->references("id")->on("materials");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asset_materials', function (Blueprint $table) {
            $table->dropColumn('date_generate');
        });
    }
}
