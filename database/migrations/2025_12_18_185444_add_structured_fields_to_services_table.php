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
        Schema::table('services', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->after('title');
            $table->string('location')->nullable()->after('subtitle');
            $table->decimal('rating', 2, 1)->nullable()->default(5.0)->after('location');
            $table->json('features')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['subtitle', 'location', 'rating', 'features']);
        });
    }
};
