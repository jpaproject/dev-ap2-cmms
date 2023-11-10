<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupUserTechnicalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_group_user_technical', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("user_technical_id")->unsigned();
            $table->bigInteger("user_group_id")->unsigned();

            $table->foreign("user_technical_id")->references("id")->on("user_technicals");
            $table->foreign("user_group_id")->references("id")->on("user_groups");
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
        Schema::dropIfExists('user_group_user_technical');
    }
}
