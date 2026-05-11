<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->id();

            // Type & identity
            $table->enum('type', ['phone', 'watch', 'headphone', 'accessory']);
            $table->string('slug')->unique();

            // Translatable scalar text — Spatie HasTranslations stores {"tr":"...","en":"..."}
            $table->text('name')->nullable();
            $table->text('eyebrow')->nullable();
            $table->text('tagline')->nullable();

            // Translatable JSON blocks — Spatie wraps as {"tr":{...},"en":{...}}
            $table->text('strip_stats')->nullable();
            $table->text('content')->nullable();
            $table->text('specs')->nullable();

            // Pricing & purchase
            $table->decimal('price', 10, 2)->nullable();
            $table->text('price_label')->nullable();
            $table->text('price_note')->nullable();
            $table->text('cta_primary')->nullable();
            $table->text('cta_secondary')->nullable();
            $table->string('buy_url', 2048)->nullable();
            $table->string('cta_secondary_url', 2048)->nullable();

            // SEO
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // Visibility & ordering
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('order')->default(0);

            $table->timestamps();

            $table->index(['type', 'is_active', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
