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
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_unique_id', 191)->unique();
            $table->unsignedBigInteger('user_id');

            $table->string('lieu_de_residence'); 
            $table->string('profession');
            $table->enum('niveau_scolaire', ['1', '2', '3', '4', '5']);
            $table->enum('cas_social', ['1', '2', '3', '4']);
            $table->enum('categorie', ['A', 'E']);
            $table->enum('matrimonial', ['C', 'Cb','M','D', 'V']);

            $table->timestamps();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')
                ->onUpdate('cascade');




              

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('patients');
    }
};
