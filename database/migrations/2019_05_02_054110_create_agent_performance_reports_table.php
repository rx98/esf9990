<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentPerformanceReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_performance_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('AgentID');
            $table->string('AgentName');
            $table->string('Date');
            $table->bigInteger('CallsReceived');
            $table->bigInteger('CallsAnswered');
            $table->string('AnswerRate');
            $table->bigInteger('CallsAbandoned');
            $table->bigInteger('CountofAnswredCallsWithTalkTimeGrThanTenSecond');
            $table->time('AvgRingingDuration');
            $table->time('AvgTalkDuration');
            $table->time('MaxTalkDuration');
            $table->time('MinTalkDuration');
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
        Schema::dropIfExists('agent_performance_reports');
    }
}
