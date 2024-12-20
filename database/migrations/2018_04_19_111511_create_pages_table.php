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
        Schema::create('pages', function (Blueprint $table) {
            $table->id(); // Use id() for bigIncrements

            $table->foreignId('user_id')->default(1)->constrained()->onDelete('set default'); // Use foreignId and constrained

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();

            $table->boolean('add_to_nav')->default(true); // Simplified boolean default
            $table->string('title_nav')->nullable();

            $table->string('layout')->nullable();

            $table->string('redirect')->nullable();
            $table->boolean('target')->default(false); // Simplified boolean default

            $table->boolean('published')->default(false); // Simplified boolean default
            $table->timestamp('publish_on')->nullable();
            $table->timestamp('publish_off')->nullable();

            $table->unsignedInteger('status')->default(0); // Use unsignedInteger for status
            $table->unsignedInteger('approved_id')->default(0); // Use unsignedInteger for approved_id
            $table->timestamp('approved_on')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
