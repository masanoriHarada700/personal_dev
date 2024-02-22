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
        Schema::dropIfExists('users_profiles');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('users_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mail_address');
            $table->string('introduction')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }
};
