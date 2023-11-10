<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAssetFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_asset_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("asset_id")->unsigned()->nullable();
            $table->bigInteger("form_id")->unsigned()->nullable();

            $table->foreign("asset_id")->references("id")->on("assets");
            $table->foreign("form_id")->references("id")->on("forms");

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
        Schema::dropIfExists('detail_asset_forms');
    }
}
