<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment("外部キー");
            $table->text('content')->comment("内容");
            $table->dateTime('deadline')->nullable()->comment("締切日時");
            $table->string('category')->nullable()->comment("タスク種類");
            $table->boolean('flag')->default(false)->comment("完了/未完了フラグ");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};