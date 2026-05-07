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

            // Type
            $table->enum('type', ['phone', 'watch', 'headphone', 'accessory']);

            // Identity
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('eyebrow')->nullable();       // "Yeni — Telefon"
            $table->string('tagline')->nullable();       // "Gücü hisset."

            // Purchase
            $table->string('price_label')->nullable();   // "₺6.499"
            $table->string('price_note')->nullable();    // "Ücretsiz kargo · 2 yıl garanti"
            $table->string('buy_url')->nullable();
            $table->string('cta_primary')->nullable();   // "Hemen Satın Al"
            $table->string('cta_secondary')->nullable(); // "Teknik Özellikler"

            // Quick-stat strip [{value, label}, ...]
            $table->json('strip_stats')->nullable();

            // Feature cards [{metric, title, description}, ...]
            $table->json('features')->nullable();

            // Full specs table [{key, value, note}, ...]
            $table->json('specs')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
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
