<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table): void {
            // Remove generic features (content now handles section-specific cards/lists)
            $table->dropColumn('features');

            // Structured content per section, keyed by section slug
            // phone:      camera, display, performance, battery
            // watch:      health, design, activity, battery
            // headphone:  anc, sound, design, battery, connectivity
            $table->json('content')->nullable()->after('strip_stats');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table): void {
            $table->dropColumn('content');
            $table->json('features')->nullable();
        });
    }
};
