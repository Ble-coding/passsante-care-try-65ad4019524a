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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); 
            $table->string('last_name');
            $table->string('email', 191)->unique();
            $table->string('contact')->nullable();
            $table->date('dob')->nullable();
            $table->integer('gender')->nullable(); 
            $table->boolean('status')->default(1);
            $table->string('language')->default('en')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('type')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('region_code')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
