<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportAssetMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_asset_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('remarks')->nullable();
            $table->bigInteger("work_order_id")->unsigned()->nullable();
            $table->bigInteger("prev_material")->unsigned()->nullable();
            $table->bigInteger("current_material")->unsigned()->nullable();

            $table->foreign("work_order_id")->references("id")->on("work_orders");
            $table->foreign("prev_material")->references("id")->on("asset_materials");
            $table->foreign("current_material")->references("id")->on("asset_materials");

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
        Schema::dropIfExists('report_asset_materials');
    }
}
