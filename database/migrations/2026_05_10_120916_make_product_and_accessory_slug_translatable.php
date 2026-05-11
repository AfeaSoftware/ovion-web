<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Convert existing scalar slugs to JSON {"tr":"..."} so Spatie HasTranslations
        // can read them as translations going forward.
        $this->migrateSlugs('products');
        $this->migrateSlugs('accessories');

        Schema::table('products', function (Blueprint $table): void {
            $table->dropUnique(['slug']);
        });

        Schema::table('accessories', function (Blueprint $table): void {
            $table->dropUnique(['slug']);
        });

        Schema::table('products', function (Blueprint $table): void {
            $table->text('slug')->change();
        });

        Schema::table('accessories', function (Blueprint $table): void {
            $table->text('slug')->change();
        });
    }

    public function down(): void
    {
        // Best-effort restore: extract TR slug from JSON and re-add unique.
        $this->restoreSlugs('products');
        $this->restoreSlugs('accessories');

        Schema::table('products', function (Blueprint $table): void {
            $table->string('slug')->change();
            $table->unique('slug');
        });

        Schema::table('accessories', function (Blueprint $table): void {
            $table->string('slug')->change();
            $table->unique('slug');
        });
    }

    private function migrateSlugs(string $table): void
    {
        DB::table($table)->orderBy('id')->each(function ($row) use ($table): void {
            $current = $row->slug;
            if ($current === null || $current === '') {
                return;
            }
            $decoded = json_decode($current, true);
            if (is_array($decoded)) {
                return;
            }
            DB::table($table)
                ->where('id', $row->id)
                ->update(['slug' => json_encode(['tr' => $current], JSON_UNESCAPED_UNICODE)]);
        });
    }

    private function restoreSlugs(string $table): void
    {
        DB::table($table)->orderBy('id')->each(function ($row) use ($table): void {
            $decoded = json_decode($row->slug ?? '', true);
            if (! is_array($decoded)) {
                return;
            }
            $value = $decoded['tr'] ?? array_values($decoded)[0] ?? '';
            DB::table($table)->where('id', $row->id)->update(['slug' => $value]);
        });
    }
};
