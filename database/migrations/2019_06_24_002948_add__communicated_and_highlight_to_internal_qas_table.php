<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommunicatedAndHighlightToInternalQasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internal_qas', function (Blueprint $table) {
            $table->boolean('Communicated')->nullable();
            $table->boolean('highlight')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internal_qas', function (Blueprint $table) {
            $table->dropColumn('Communicated');
            $table->dropColumn('highlight');


        });
    }
}
