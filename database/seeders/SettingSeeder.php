<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'label' => 'Site Name', 'value' => 'CV. Bumi Tirta Wisata', 'type' => 'text'],
            ['key' => 'site_description', 'label' => 'Site Description', 'value' => 'Company Profile Website', 'type' => 'textarea'],
            ['key' => 'phone', 'label' => 'Phone / WhatsApp', 'value' => '082315328691', 'type' => 'text'],
            ['key' => 'email', 'label' => 'Email Address', 'value' => 'safaristatour@gmail.com', 'type' => 'text'],
            ['key' => 'address', 'label' => 'Address', 'value' => 'Komplek Kebon Kopi Blok B, Desa Margamulya, Pangalengan, Kab. Bandung 40378', 'type' => 'textarea'],
            ['key' => 'instagram', 'label' => 'Instagram URL', 'value' => 'https://instagram.com/safaristaa_', 'type' => 'text'],
            ['key' => 'tiktok', 'label' => 'TikTok URL', 'value' => 'https://tiktok.com/@safarista_', 'type' => 'text'],
            ['key' => 'logo', 'label' => 'Logo', 'value' => null, 'type' => 'image'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
