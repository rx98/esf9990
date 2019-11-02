<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('AgentId');
            $table->string('IDnumber');
            $table->string('Time');
            $table->string('Critical');
            $table->string('NonCritical');
            $table->string('Item1');
            $table->string('Item2');
            $table->string('Item3');
            $table->string('Item5');
            $table->string('Item6');
            $table->string('Item7');
            $table->string('Item8');
            $table->string('Item9');
            $table->string('Item10');
            $table->string('Item11');
            $table->string('Item12');
            $table->string('Item13');
            $table->string('Bag')->nullable();
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
        Schema::dropIfExists('qualities');
    }
}
