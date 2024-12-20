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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id(); // Use id() for bigIncrements
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key constraint

            $table->string('forename')->nullable();
            $table->string('surname')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->text('biography')->nullable();
            $table->text('links')->nullable();
            $table->string('picture')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
