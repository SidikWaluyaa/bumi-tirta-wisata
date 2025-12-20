<?php

namespace Database\Seeders;

use App\Models\CompanyValue;
use Illuminate\Database\Seeder;

class CompanyValueSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            [
                'icon' => 'shield-check',
                'title' => 'Keamanan & Asuransi',
                'description' => 'Semua peserta diasuransikan dengan safety equipment standar internasional untuk keamanan maksimal',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => 'academic-cap',
                'title' => 'Guide Bersertifikat',
                'description' => 'Instruktur dan guide profesional bersertifikat dengan pengalaman bertahun-tahun',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => 'adjustments',
                'title' => 'Paket Custom',
                'description' => 'Paket fleksibel yang dapat disesuaikan dengan kebutuhan dan budget Anda',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'icon' => 'users',
                'title' => 'Cocok Semua Usia',
                'description' => 'Aktivitas yang aman dan menyenangkan untuk semua kalangan, dari anak-anak hingga dewasa',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'icon' => 'camera',
                'title' => 'Dokumentasi Lengkap',
                'description' => 'Foto dan video kegiatan rafting gratis sebagai kenangan tak terlupakan',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'icon' => 'home',
                'title' => 'Fasilitas Lengkap',
                'description' => 'Toilet, kamar bilas, gazebo, area istirahat, dan P3K tersedia di lokasi',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($values as $value) {
            CompanyValue::create($value);
        }
    }
}
