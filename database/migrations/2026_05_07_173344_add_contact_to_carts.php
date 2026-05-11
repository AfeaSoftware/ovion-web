<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('carts', function (Blueprint $table): void {
            $table->timestamp('contacted_at')->nullable()->after('submitted_at');
            $table->text('admin_note')->nullable()->after('contacted_at');
        });
    }

    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table): void {
            $table->dropColumn(['contacted_at', 'admin_note']);
        });
    }
};
