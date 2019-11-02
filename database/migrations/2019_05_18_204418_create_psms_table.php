<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->integer('agentid')->nullable();
            $table->bigInteger('totalanswered')->nullable();
            $table->bigInteger('answeredgTen')->nullable();
            $table->time('totaltalktime(m)');
            $table->float('ATT(s)')->nullable();
            $table->time('totalwraptime(m)');
            $table->bigInteger('AWT(s)')->nullable();
            $table->bigInteger('totalholdtime(s)')->nullable();
            $table->time('totalhandletime(m)');
            $table->float('AHT(s)')->nullable();
            $table->float('ansScore')->nullable();
            $table->float('ttScore')->nullable();
            $table->float('wtScore')->nullable();
            $table->float('htScore')->nullable();
            $table->float('whScore')->nullable();
            $table->float('totalScore')->nullable();
            $table->text('label')->nullable();
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
        Schema::dropIfExists('psms');
    }
}
