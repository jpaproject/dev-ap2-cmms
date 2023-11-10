<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailWorkOrderFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_work_order_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->bigInteger("form_id")->unsigned()->nullable();

            $table->foreign("work_order_id")->references("id")->on("work_orders");
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
        Schema::dropIfExists('detail_work_order_forms');
    }
}
