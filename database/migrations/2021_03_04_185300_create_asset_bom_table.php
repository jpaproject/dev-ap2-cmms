<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetBomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_bom', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("asset_id")->unsigned();
            $table->bigInteger("bom_id")->unsigned();

            $table->foreign("asset_id")->references("id")->on("assets");
            $table->foreign("bom_id")->references("id")->on("boms");
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
        Schema::dropIfExists('asset_bom');
    }
}
