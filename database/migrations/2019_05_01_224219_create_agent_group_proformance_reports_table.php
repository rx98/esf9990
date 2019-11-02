<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentGroupProformanceReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_group_proformance_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Day');
            $table->integer('AgentID');
            $table->string('Agentgroup');
            $table->bigInteger('CountofAnswredCallsWithTalkTimeGrThanTenSecond');
            $table->bigInteger('CountofTotalAnsweredCalls');
            $table->float('AverageofSuccessfulTalkTime');
            $table->bigInteger('TotalTalkTimeofSuccessfulTalk');
            $table->bigInteger('TotalWrapTimeofSuccessfulTalk');
            $table->bigInteger('TotalHoldTimeofSuccessfulTalk');
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
        Schema::dropIfExists('agent_group_proformance_reports');
    }
}
