<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('material_name');
            $table->date('purchase_at');
            $table->bigInteger('purchase_price');
            $table->text('description')->nullable();
            $table->string('model');
            $table->string('brand');
            $table->bigInteger("type_id")->unsigned()->nullable();
            $table->bigInteger("asset_id")->unsigned()->nullable();
            $table->bigInteger("bom_id")->unsigned()->nullable();

            $table->foreign("type_id")->references("id")->on("types");
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
        Schema::dropIfExists('asset_materials');
    }
}
