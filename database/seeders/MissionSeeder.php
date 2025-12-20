<?php

namespace Database\Seeders;

use App\Models\Mission;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    public function run(): void
    {
        $missions = [
            [
                'mission_text' => 'Mengutamakan keamanan dan keselamatan peserta dalam setiap kegiatan',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'mission_text' => 'Memberikan pengalaman petualangan yang seru, menantang, dan berkesan',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'mission_text' => 'Menyediakan fasilitator dan guide profesional bersertifikat',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'mission_text' => 'Melayani berbagai kalangan usia dengan paket yang fleksibel',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'mission_text' => 'Menjaga kelestarian alam dan lingkungan di setiap lokasi wisata',
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($missions as $mission) {
            Mission::create($mission);
        }
    }
}
