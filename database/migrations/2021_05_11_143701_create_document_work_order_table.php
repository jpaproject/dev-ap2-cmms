<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentWorkOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_work_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("work_order_id")->unsigned();
            $table->bigInteger("document_id")->unsigned();

            $table->foreign("work_order_id")->references("id")->on("work_orders");
            $table->foreign("document_id")->references("id")->on("documents");
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
        Schema::dropIfExists('document_work_order');
    }
}
