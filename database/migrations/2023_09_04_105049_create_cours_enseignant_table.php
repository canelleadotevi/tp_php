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
        Schema::create('cours_enseignant', function (Blueprint $table) {

            $table->timestamps();

            $table->unsignedBigInteger('cours_id');
            $table->unsignedBigInteger('enseignants_id');
            $table->primary(['cours_id', 'enseignants_id']);
            
            $table->foreign('cours_id')->references('id')
                ->on('cours')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('enseignants_id')->references('id')
                ->on('enseignants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        /*    $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('role_id');
        // Ajoutez d'autres colonnes si nécessaire
        $table->timestamps();

        // Définition des clés primaires composées
        

        // Clés étrangères vers les tables liées (dans cet exemple, User et Role)
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade'); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours_enseignant');
    }
};
