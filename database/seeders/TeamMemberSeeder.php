<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use App\Models\Certification;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        // Team Member 1
        $member1 = TeamMember::create([
            'name' => 'Budi Santoso',
            'role' => 'Lead Guide & Instruktur Rafting',
            'photo' => null,
            'is_certified' => true,
            'bio' => 'Berpengalaman lebih dari 15 tahun di bidang rafting dan outbound. Memiliki sertifikat internasional dari FAJI (Federasi Arung Jeram Indonesia).',
            'order' => 1,
            'is_active' => true,
        ]);

        // Certifications for Member 1
        Certification::create([
            'team_member_id' => $member1->id,
            'title' => 'Sertifikat Guide Rafting Level 3',
            'description' => 'Sertifikasi guide rafting tingkat lanjut',
            'certificate_image' => null,
            'issued_by' => 'FAJI (Federasi Arung Jeram Indonesia)',
            'issued_date' => '2020-01-15',
            'expiry_date' => '2025-01-15',
            'type' => 'guide',
            'order' => 1,
            'is_active' => true,
        ]);

        // Team Member 2
        $member2 = TeamMember::create([
            'name' => 'Andi Wijaya',
            'role' => 'Instruktur Outbound',
            'photo' => null,
            'is_certified' => true,
            'bio' => 'Spesialis team building dan high rope activities dengan pengalaman 10 tahun.',
            'order' => 2,
            'is_active' => true,
        ]);

        Certification::create([
            'team_member_id' => $member2->id,
            'title' => 'Sertifikat Instruktur Outbound',
            'description' => 'Sertifikasi instruktur outbound profesional',
            'certificate_image' => null,
            'issued_by' => 'APOWI (Asosiasi Profesi Outbound Indonesia)',
            'issued_date' => '2021-06-20',
            'expiry_date' => '2026-06-20',
            'type' => 'instructor',
            'order' => 2,
            'is_active' => true,
        ]);

        // Team Member 3
        $member3 = TeamMember::create([
            'name' => 'Siti Rahayu',
            'role' => 'Guide Wisata',
            'photo' => null,
            'is_certified' => true,
            'bio' => 'Guide wisata berpengalaman dengan pengetahuan mendalam tentang destinasi wisata Yogyakarta.',
            'order' => 3,
            'is_active' => true,
        ]);

        // Company Certification
        Certification::create([
            'team_member_id' => null,
            'title' => 'Izin Usaha Pariwisata',
            'description' => 'Izin resmi usaha jasa pariwisata',
            'certificate_image' => null,
            'issued_by' => 'Dinas Pariwisata Yogyakarta',
            'issued_date' => '2019-03-10',
            'expiry_date' => null,
            'type' => 'company',
            'order' => 10,
            'is_active' => true,
        ]);
    }
}
