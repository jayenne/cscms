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
        Schema::create('page_blocks', function (Blueprint $table) {
            $table->id(); // Use id() for bigIncrements
            $table->string('block_uid')->nullable();

            $table->foreignId('user_id')->default(0)->constrained()->onDelete('set default'); // Foreign key constraint
            $table->foreignId('page_id')->default(0)->constrained()->onDelete('set default'); // Foreign key constraint

            $table->string('block_lid')->nullable();
            $table->string('block_name')->nullable();
            $table->unsignedInteger('block_anchor')->default(0); // Use unsignedInteger

            $table->text('block_attribute_values')->nullable();
            $table->text('block_content_values')->nullable();
            $table->text('block_content_values_approved')->nullable();

            $table->unsignedInteger('block_order')->default(0); // Use unsignedInteger
            $table->unsignedInteger('block_offset')->default(0); // Use unsignedInteger
            $table->boolean('block_published')->default(false);

            $table->timestamp('block_publish_on')->nullable();
            $table->timestamp('block_publish_off')->nullable();
            $table->timestamp('block_approved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_blocks');
    }
};
