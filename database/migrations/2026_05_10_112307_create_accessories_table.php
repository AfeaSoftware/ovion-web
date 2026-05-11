<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accessories', function (Blueprint $table): void {
            $table->id();

            $table->enum('category', ['kilif', 'ekran', 'sarj', 'kayis', 'diger']);
            $table->string('slug')->unique();

            // Translatable scalar text — Spatie HasTranslations stores {"tr":"...","en":"..."}
            $table->text('name')->nullable();
            $table->text('summary')->nullable();
            $table->text('description')->nullable();

            // Pricing & purchase
            $table->decimal('price', 10, 2)->nullable();
            $table->text('price_note')->nullable();
            $table->string('buy_url', 2048)->nullable();

            // SEO
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // Visibility & ordering
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('order')->default(0);

            $table->timestamps();

            $table->index(['category', 'is_active', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accessories');
    }
};
