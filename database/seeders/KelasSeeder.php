<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'id' => 1,
            'kode' => '10A',
            'tahunakademik_id' => 1
        ]);
        Kelas::create([
            'id' => 2,
            'kode' => '10B',
            'tahunakademik_id' => 1
        ]);
        Kelas::create([
            'id' => 3,
            'kode' => '11A',
            'tahunakademik_id' => 2
        ]);
        Kelas::create([
            'id' => 4,
            'kode' => '11B',
            'tahunakademik_id' => 2
        ]);
        Kelas::create([
            'id' => 5,
            'kode' => '12A',
            'tahunakademik_id' => 3
        ]);
        Kelas::create([
            'id' => 6,
            'kode' => '12B',
            'tahunakademik_id' => 3
        ]);
    }
}
