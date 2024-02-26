<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('learning_data', function (Blueprint $table) {
            $table->bigIncrements('learning_id');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('user_id')->constrained('users');
            $table->string('learning_item');
            $table->integer('learning_time');
            $table->integer('learning_month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_data');
    }
};
