<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Main Packages
        $packages = [
            [
                'title' => 'Safari Sehari #1',
                'subtitle' => 'Paket Rafting Basic',
                'price' => 185000,
                'price_unit' => '/ Orang',
                'location' => 'Sungai Elo, Magelang',
                'rating' => 4.8,
                'description' => 'Paket outbound basic dengan rafting seru di Sungai Elo sepanjang 4,8 KM. Cocok untuk pemula dan keluarga!',
                'features' => [
                    'Rafting 4,8 KM (90 Menit)',
                    'Makan 1x',
                    'Dokumentasi Foto',
                    'Asuransi Peserta',
                    'P3K & Safety Equipment',
                    'Tiket Masuk Wisata',
                    'Team Support/Fasilitator',
                    'Toilet & Kamar Bilas',
                ],
                'category' => 'paket',
            ],
            [
                'title' => 'Safari Sehari #2',
                'subtitle' => 'Rafting + Flying Fox',
                'price' => 205000,
                'price_unit' => '/ Orang',
                'location' => 'Sungai Elo, Magelang',
                'rating' => 4.9,
                'description' => 'Kombinasi rafting dan flying fox 300 meter lintas danau. Pengalaman yang menantang dan menyenangkan!',
                'features' => [
                    'Rafting 4,8 KM (90 Menit)',
                    'Flying Fox 300 M Lintas Danau',
                    'Makan 1x',
                    'Dokumentasi Foto',
                    'Asuransi Peserta',
                    'P3K & Safety Equipment',
                    'Tiket Masuk Wisata',
                    'Team Support/Fasilitator',
                    'Toilet & Kamar Bilas',
                ],
                'category' => 'paket',
            ],
            [
                'title' => 'Safari Sehari #3',
                'subtitle' => 'Rafting + Paintball',
                'price' => 260000,
                'price_unit' => '/ Orang',
                'location' => 'Sungai Elo, Magelang',
                'rating' => 4.9,
                'description' => 'Paket lengkap dengan rafting dan paintball war games. Sempurna untuk team building dan gathering!',
                'features' => [
                    'Rafting 4,8 KM (90 Menit)',
                    'Paintball War Games',
                    'Makan 1x',
                    'Coffee Break 1x',
                    'Dokumentasi Foto',
                    'Asuransi Peserta',
                    'P3K & Safety Equipment',
                    'Tiket Masuk Wisata',
                    'Team Support/Fasilitator',
                    'Toilet & Kamar Bilas',
                ],
                'category' => 'paket',
            ],
            [
                'title' => 'Safari Sehari #4',
                'subtitle' => 'Rafting + Paintball + Flying Fox',
                'price' => 280000,
                'price_unit' => '/ Orang',
                'location' => 'Sungai Elo, Magelang',
                'rating' => 5.0,
                'description' => 'Paket premium dengan 3 aktivitas seru! Rafting, paintball, dan flying fox dalam satu paket.',
                'features' => [
                    'Rafting 4,8 KM (90 Menit)',
                    'Paintball War Games',
                    'Flying Fox 300 M Lintas Danau',
                    'Makan 1x',
                    'Coffee Break 1x',
                    'Dokumentasi Foto',
                    'Asuransi Peserta',
                    'P3K & Safety Equipment',
                    'Tiket Masuk Wisata',
                    'Team Support/Fasilitator',
                    'Toilet & Kamar Bilas',
                ],
                'category' => 'paket',
            ],
            [
                'title' => 'Safari Sehari #5',
                'subtitle' => 'Rafting + ATV Adventure',
                'price' => 350000,
                'price_unit' => '/ Orang',
                'location' => 'Sungai Elo, Magelang',
                'rating' => 4.9,
                'description' => 'Petualangan seru dengan rafting dan ATV adventure. Jelajahi medan off-road yang menantang!',
                'features' => [
                    'Rafting 4,8 KM (90 Menit)',
                    'ATV Adventure',
                    'Makan 1x',
                    'Coffee Break 1x',
                    'Dokumentasi Foto',
                    'Asuransi Peserta',
                    'P3K & Safety Equipment',
                    'Tiket Masuk Wisata',
                    'Team Support/Fasilitator',
                    'Toilet & Kamar Bilas',
                ],
                'category' => 'paket',
            ],
            [
                'title' => 'Safari Sehari #6',
                'subtitle' => 'Rafting + Fun Off-Road',
                'price' => 400000,
                'price_unit' => '/ Orang',
                'location' => 'Sungai Elo, Magelang',
                'rating' => 5.0,
                'description' => 'Paket ultimate dengan rafting dan fun off-road. Pengalaman outbound yang tak terlupakan!',
                'features' => [
                    'Rafting 4,8 KM (90 Menit)',
                    'Fun Off-Road Adventure',
                    'Makan 1x',
                    'Coffee Break 1x',
                    'Dokumentasi Foto',
                    'Asuransi Peserta',
                    'P3K & Safety Equipment',
                    'Tiket Masuk Wisata',
                    'Team Support/Fasilitator',
                    'Toilet & Kamar Bilas',
                ],
                'category' => 'paket',
            ],
        ];

        // Add-ons / Additional Services
        $addons = [
            [
                'title' => 'Live Music Elektron',
                'subtitle' => 'Hiburan Musik Elektrik',
                'price' => 2510000,
                'price_unit' => '/ Paket',
                'description' => 'Lengkapi acara Anda dengan live music elektron yang meriah dan menghibur!',
                'features' => [
                    'Sound System Profesional',
                    'Keyboard & Keyboard Player',
                    'Gendang & Gendang Player',
                    '2 Penyanyi Profesional',
                    'Durasi 3-4 Jam',
                    'Lagu Request',
                ],
                'category' => 'addon',
            ],
            [
                'title' => 'Live Music Acoustic',
                'subtitle' => 'Hiburan Musik Akustik',
                'price' => 2510000,
                'price_unit' => '/ Paket',
                'description' => 'Suasana santai dengan live music acoustic yang menenangkan dan menyenangkan.',
                'features' => [
                    'Sound System',
                    'Alat Musik Akustik Lengkap',
                    'Pemain Musik Profesional',
                    'Durasi 3-4 Jam',
                    'Lagu Request',
                ],
                'category' => 'addon',
            ],
            [
                'title' => 'Kambing Guling',
                'subtitle' => 'Hidangan Spesial',
                'price' => 2510000,
                'price_unit' => '/ Ekor',
                'description' => 'Kambing guling lezat untuk 30 orang. Cocok untuk acara gathering dan celebration!',
                'features' => [
                    '1 Ekor Kambing Guling Utuh',
                    'Bumbu Spesial',
                    'Untuk 30 Orang',
                    'Sudah Matang & Siap Saji',
                    'Sambal & Lalapan',
                ],
                'category' => 'addon',
            ],
            [
                'title' => 'Barbeque Party',
                'subtitle' => 'BBQ Seru Bersama',
                'price' => 60000,
                'price_unit' => '/ Orang',
                'description' => 'Nikmati BBQ party dengan berbagai pilihan makanan panggang yang lezat!',
                'features' => [
                    'Sosis Premium',
                    'Bakso Sapi',
                    'Jagung Manis',
                    'Alat Pembakaran Lengkap',
                    'Bumbu & Saus',
                ],
                'category' => 'addon',
            ],
            [
                'title' => 'Dokumentasi Profesional',
                'subtitle' => 'Foto & Video Kegiatan',
                'price' => 1510000,
                'price_unit' => '/ Hari',
                'description' => 'Abadikan momen berharga dengan dokumentasi foto dan video profesional!',
                'features' => [
                    'Kamera DSLR Profesional',
                    'Drone Aerial Photography',
                    'Fotografer Berpengalaman',
                    'Team Support',
                    'Video Panjang Full Kegiatan',
                    'Video Pendek Highlight',
                    'Semua Foto Kegiatan',
                    'Editing Profesional',
                ],
                'category' => 'addon',
            ],
            [
                'title' => 'Api Unggun',
                'subtitle' => 'Suasana Hangat Malam Hari',
                'price' => 260000,
                'price_unit' => '/ Paket',
                'description' => 'Ciptakan suasana hangat dan akrab dengan api unggun di malam hari.',
                'features' => [
                    'Kayu Bakar Berkualitas',
                    'Tempat Api Unggun Aman',
                    'Perlengkapan Keamanan',
                    'Bantuan Setup',
                ],
                'category' => 'addon',
            ],
            [
                'title' => 'Custom T-Shirt',
                'subtitle' => 'Kaos Event Custom',
                'price' => 110000,
                'price_unit' => '/ Pcs',
                'description' => 'T-shirt custom dengan desain bebas untuk kenang-kenangan event Anda!',
                'features' => [
                    'Bahan Cotton Combed 30s',
                    'Sablon Berkualitas',
                    'Desain Bebas/Custom',
                    'Berbagai Ukuran (S-XXL)',
                    'Warna Pilihan',
                ],
                'category' => 'addon',
            ],
            [
                'title' => 'Banner & Spanduk',
                'subtitle' => 'Media Promosi Event',
                'price' => 70000,
                'price_unit' => '/ Meter',
                'description' => 'Banner dan spanduk custom untuk branding event Anda.',
                'features' => [
                    'Bahan Flexi Berkualitas',
                    'Desain Bebas/Custom',
                    'Cetak Full Color',
                    'Tahan Cuaca',
                    'Gratis Desain Sederhana',
                ],
                'category' => 'addon',
            ],
        ];

        // Insert packages
        foreach ($packages as $pkg) {
            Service::create([
                'title' => $pkg['title'],
                'subtitle' => $pkg['subtitle'] ?? null,
                'slug' => Str::slug($pkg['title']) . '-' . Str::random(5),
                'price' => $pkg['price'],
                'price_unit' => $pkg['price_unit'],
                'location' => $pkg['location'] ?? null,
                'rating' => $pkg['rating'] ?? 5.0,
                'description' => $pkg['description'],
                'features' => $pkg['features'],
                'category' => 'paket',
                'image' => null,
            ]);
        }

        // Insert add-ons
        foreach ($addons as $addon) {
            Service::create([
                'title' => $addon['title'],
                'subtitle' => $addon['subtitle'] ?? null,
                'slug' => Str::slug($addon['title']) . '-' . Str::random(5),
                'price' => $addon['price'],
                'price_unit' => $addon['price_unit'],
                'description' => $addon['description'],
                'features' => $addon['features'],
                'category' => 'addon',
                'image' => null,
            ]);
        }
    }
}
