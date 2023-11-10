<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBomMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bom_material', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("bom_id")->unsigned();
            $table->bigInteger("material_id")->unsigned();

            $table->foreign("bom_id")->references("id")->on("boms");
            $table->foreign("material_id")->references("id")->on("materials");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asset_bom', function(Blueprint $table){
            $table->dropForeign(['bom_id']);
            $table->dropForeign(['material_id']);
        });
        Schema::dropIfExists('bom_material');
    }
}
