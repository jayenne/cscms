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
        Schema::create('media_files', function (Blueprint $table) {
            $table->id(); // Use id() for bigIncrements
            $table->string('title')->nullable()->default('Untitled');
            $table->text('excerpt')->nullable();
            $table->string('path');
            $table->string('icon')->nullable()->default('fa-file');
            $table->foreignId('user_id')->default(1)->constrained()->onDelete('set default'); // Foreign key constraint
            $table->timestamp('publish_on')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_files');
    }
};