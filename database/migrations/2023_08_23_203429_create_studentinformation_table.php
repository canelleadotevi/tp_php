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
        Schema::create('studentinformation', function (Blueprint $table) {
            $table->id();
            $table->string('lastname')->nullable(false);
            $table->string('firstname')->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->longtext('hobbies')->nullable(false);
            $table->string('speciality')->nullable(false);
            $table->longtext('bio')->nullable(false);
            $table->string('profil')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentinformation');
    }
};
