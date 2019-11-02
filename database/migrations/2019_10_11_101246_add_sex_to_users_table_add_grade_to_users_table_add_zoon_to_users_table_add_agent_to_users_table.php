<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSexToUsersTableAddGradeToUsersTableAddZoonToUsersTableAddAgentToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('sex')->nullable();
            $table->string('grade')->nullable();
            $table->string('zoon')->nullable();
            $table->integer('agent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('sex');
            $table->dropColumn('grade');
            $table->dropColumn('zoon');
            $table->dropColumn('agent');
        });
    }
}
