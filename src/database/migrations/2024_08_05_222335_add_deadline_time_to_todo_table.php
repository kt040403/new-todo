<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeadlineTimeToTodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("todos", function (Blueprint $table) {
            $table->time("deadline_time")->nullable()->comment("締め切り時間");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("todos", function (Blueprint $table) {
            $table->dropColumn('deadline_time');
        });
    }
}