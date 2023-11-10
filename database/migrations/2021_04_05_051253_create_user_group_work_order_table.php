<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupWorkOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_group_work_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("work_order_id")->unsigned();
            $table->bigInteger("user_group_id")->unsigned();

            $table->foreign("work_order_id")->references("id")->on("work_orders");
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
        Schema::dropIfExists('user_group_work_order');
    }
}
