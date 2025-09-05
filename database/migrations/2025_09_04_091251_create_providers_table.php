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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->string('logo_path')->nullable();
            // if provider can have multiple categories
            // we should have providers_categories pivot table
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->timestamps();

            $table->index('category_id', 'category_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
