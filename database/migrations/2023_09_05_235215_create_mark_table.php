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
        Schema::create('mark', function (Blueprint $table) {
            $table->id();
            $table->int('note');
            $table->string('type');

            $table->unsignedBigInteger('cours_id');
            $table->unsignedBigInteger('studentinformation_id');


            $table->foreign('cours_id')->references('id')
                ->on('cours')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('studentinformation_id')->references('id')
                ->on('studentinformation')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mark');
    }
};
