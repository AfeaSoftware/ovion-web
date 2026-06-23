<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('support_topics', function (Blueprint $table): void {
            $table->id();

            // Card icon (reuses the support page icon set)
            $table->string('icon')->default('book');

            // Translatable scalar text — Spatie HasTranslations stores {"tr":"...","en":"..."}
            $table->text('slug')->nullable();
            $table->text('title')->nullable();
            $table->text('summary')->nullable();
            $table->text('intro')->nullable();

            // Translatable JSON block — list of downloadable documents per locale
            // [{ "label": "...", "file": "support/documents/x.pdf" }, ...]
            $table->text('documents')->nullable();

            // SEO
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // Visibility & ordering
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('order')->default(0);

            $table->timestamps();

            $table->index(['is_active', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_topics');
    }
};
