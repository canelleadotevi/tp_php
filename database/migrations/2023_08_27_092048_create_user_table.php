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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable(false);
            $table->string('lastname')->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('avatar')->nullable(false);
            $table->boolean('emailverified')->nullable(false);
            $table->date('verify_at')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
