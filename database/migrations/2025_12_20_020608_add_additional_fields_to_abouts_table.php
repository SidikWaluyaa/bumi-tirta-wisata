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
        Schema::table('abouts', function (Blueprint $table) {
            // Hero Section
            $table->string('hero_title')->nullable()->after('image');
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_background')->nullable();
            
            // Company Info (extend existing content)
            $table->string('service_area')->nullable();
            $table->string('focus_services')->nullable();
            $table->text('highlight_text')->nullable();
            
            // Vision & Mission
            $table->text('vision')->nullable();
            
            // CTA Section
            $table->string('cta_title')->default('Siap Bersafari Bersama Bumi Tirta?');
            $table->text('cta_subtitle')->nullable();
            $table->string('cta_whatsapp_text')->default('Hubungi Kami');
            $table->string('cta_whatsapp_number')->nullable();
            $table->string('cta_packages_text')->default('Lihat Paket');
            $table->string('cta_background')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title',
                'hero_subtitle',
                'hero_background',
                'service_area',
                'focus_services',
                'highlight_text',
                'vision',
                'cta_title',
                'cta_subtitle',
                'cta_whatsapp_text',
                'cta_whatsapp_number',
                'cta_packages_text',
                'cta_background',
            ]);
        });
    }
};
