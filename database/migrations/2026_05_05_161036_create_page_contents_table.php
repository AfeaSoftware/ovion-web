<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_contents', function (Blueprint $table): void {
            $table->id();
            $table->string('type');
            $table->string('locale', 5);
            $table->json('content')->nullable();
            $table->timestamps();

            $table->unique(['type', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
