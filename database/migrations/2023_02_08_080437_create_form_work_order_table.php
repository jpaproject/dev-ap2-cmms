<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormWorkOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_work_order', function (Blueprint $table) {
            $table->id();
            $table->boolean('drawing')->nullable();
            $table->boolean('manualBook')->nullable();
            $table->boolean('toolSet')->nullable();
            $table->boolean('cleaningTools')->nullable();
            $table->boolean('supportingCables')->nullable();
            $table->boolean('seconddaryInjector')->nullable();
            $table->boolean('voltageMeter')->nullable();
            $table->boolean('ampereMeter')->nullable();
            $table->boolean('safetyVest')->nullable();
            $table->boolean('safetyHelmet')->nullable();
            $table->boolean('safetyShoes')->nullable();
            $table->boolean('electricalGloves')->nullable();
            $table->boolean('handyTalkie')->nullable();
            $table->boolean('workingPermit')->nullable();
            $table->boolean('operationalProcedure')->nullable();
            $table->boolean('mask')->nullable();
            $table->string('relayCondition')->nullable();
            $table->string('wiresConditionB')->nullable();
            $table->string('terminalCondition')->nullable();
            $table->string('type3')->nullable();
            $table->string('type0')->nullable();
            $table->string('classCT')->nullable();
            $table->string('burdenCT')->nullable();
            $table->string('ratioCT')->nullable();
            $table->string('typeProtection')->nullable();
            $table->string('wiresCondition')->nullable();
            $table->string('settingCheck')->nullable();
            $table->string('temperature')->nullable();
            $table->string('pressure')->nullable();
            $table->text('indicationsRcms')->nullable();
            $table->text('remoteOrdersRcms')->nullable();
            $table->text('scada')->nullable();
            $table->text('scada2')->nullable();
            $table->boolean('backupBox')->nullable();
            $table->boolean('checkBox')->nullable();
            $table->boolean('tighteningBox')->nullable();
            $table->boolean('cleaningBox')->nullable();
            $table->string('backup')->nullable();
            $table->string('check')->nullable();
            $table->string('tightening')->nullable();
            $table->string('cleaning')->nullable();
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
        Schema::dropIfExists('form_work_order');
    }
}
