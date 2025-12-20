<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::updateOrCreate(
            ['id' => 1],
            [
                // Basic Info
                'title' => 'Bumi Tirta Wisata',
                'content' => 'Bumi Tirta Wisata adalah penyedia jasa manajemen pelayanan wisata outbound terpercaya di Yogyakarta. Kami menyediakan berbagai paket petualangan seru untuk keluarga, sahabat, perusahaan, dan instansi/organisasi. Dengan guide bersertifikat dan peralatan safety standar internasional, kami siap memberikan pengalaman outbound yang aman, seru, dan tak terlupakan.',
                'image' => null,
                
                // Hero Section
                'hero_title' => 'Petualangan Seru Menanti Anda',
                'hero_subtitle' => 'Jelajahi keindahan alam dengan paket outbound terbaik di Yogyakarta',
                'hero_background' => null,
                
                // Company Info
                'service_area' => 'Yogyakarta & Sekitarnya',
                'focus_services' => 'Outbound, Rafting, Team Building, Adventure Tour',
                'highlight_text' => 'Lebih dari 10 tahun pengalaman melayani ribuan customer dengan kepuasan 100%',
                
                // Vision
                'vision' => 'Menjadi penyedia layanan outbound dan wisata adventure yang aman, berkualitas, dan berkesan di Yogyakarta',
                
                // CTA Section
                'cta_title' => 'Siap Berpetualang Bersama Bumi Tirta?',
                'cta_subtitle' => 'Hubungi kami sekarang untuk konsultasi gratis dan dapatkan penawaran terbaik!',
                'cta_whatsapp_text' => 'Chat WhatsApp',
                'cta_whatsapp_number' => '6281214696299',
                'cta_packages_text' => 'Lihat Paket Kami',
                'cta_background' => null,
            ]
        );
    }
}
