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
        Schema::create('page_block_libraries', function (Blueprint $table) {
            $table->id(); // Use id() for bigIncrements

            $table->string('block_theme')->nullable();
            $table->string('block_template')->nullable();
            $table->string('block_lid')->nullable();

            $table->string('block_name')->nullable();
            $table->text('block_description')->nullable();

            $table->text('block_attribute_fields')->nullable();
            $table->text('block_attribute_values')->nullable();

            $table->text('block_content_fields')->nullable();
            $table->text('block_content_values')->nullable();

            $table->boolean('block_active')->default(false); // Simplified boolean default

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_block_libraries');
    }
};
