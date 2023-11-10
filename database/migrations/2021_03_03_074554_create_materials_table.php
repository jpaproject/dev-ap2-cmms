<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('purchase_at');
            $table->bigInteger('purchase_price');
            $table->text('description')->nullable();
            $table->string('model');
            $table->string('brand');
            $table->bigInteger("type_id")->unsigned()->nullable();

            $table->foreign("type_id")->references("id")->on("types");

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
        Schema::dropIfExists('materials');
    }
}
