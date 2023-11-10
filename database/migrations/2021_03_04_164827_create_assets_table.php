<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('name');
            $table->date('purchase_at');
            $table->bigInteger('purchase_price');
            $table->text('description')->nullable();
            $table->boolean('status');
            $table->string('model');
            $table->text('image')->nullable();
            $table->string('brand');
            $table->bigInteger("category_id")->unsigned()->nullable();
            $table->bigInteger("type_id")->unsigned()->nullable();
            $table->bigInteger("location_id")->unsigned()->nullable();
            $table->bigInteger("parent_id")->unsigned()->nullable();

            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("type_id")->references("id")->on("types");
            $table->foreign("location_id")->references("id")->on("locations");
            $table->foreign("parent_id")->references("id")->on("assets");

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
        Schema::dropIfExists('assets');
    }
}
