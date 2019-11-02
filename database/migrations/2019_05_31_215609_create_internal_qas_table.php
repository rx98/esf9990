<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalQasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_qas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agent');
            $table->string('number');
            $table->string('datelisten');
            $table->string('date');
            $table->string('subject');
            $table->string('item1');
            $table->string('item2');
            $table->string('item3');
            $table->string('item5');
            $table->string('item6');
            $table->string('item7');
            $table->string('item8');
            $table->string('item9');
            $table->string('item10');
            $table->string('item11');
            $table->string('item12');
            $table->string('item13');
            $table->longText('comment');
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
        Schema::dropIfExists('internal_qas');
    }
}
