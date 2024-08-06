<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTodosTableNullableContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("todos", function (Blueprint $table) {
            $table->text("content")->nullable()->change();
            $table->dateTime("deadline")->nullable()->change();
            $table->time("deadline_time")->nullable()->change();
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
            $table->text("content")->nullable(false)->change();
            $table->dateTime("deadline")->nullable(false)->change();
            $table->time("deadline_time")->nullable(false)->change();
        });
    }
}
