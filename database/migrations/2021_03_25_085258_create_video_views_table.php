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
        Schema::create('video_views', function (Blueprint $table) {
            $table->id(); // Use id() for bigIncrements
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key constraint
            $table->string('filename')->nullable();
            $table->float('time', 5, 2)->default(0); // Removed unnecessary nullable()
            $table->boolean('end')->default(false); // Simplified boolean default
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_views');
    }
};
