<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentGroupSummaryReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_group_summary_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('DATE');
            $table->string('AgentGroup');
            $table->integer('AgentID');
            $table->string('AgentName');
            $table->bigInteger('ACDCalls');
            $table->time('AvgACDTime');
            $table->time('AvgACWTime');
            $table->time('PercAgentW');
            $table->string('PercAgentWO');
            $table->time('ACDTime');
            $table->time('ACWTime');
            $table->time('OtherTime');
            $table->time('AuxTime');
            $table->time('AvailTime');
            $table->time('StaffedTime');
            $table->time('AvgHandlingTime');
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
        Schema::dropIfExists('agent_group_summary_reports');
    }
}
