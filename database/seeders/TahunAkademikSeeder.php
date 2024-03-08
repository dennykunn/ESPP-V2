<?php

namespace Database\Seeders;

use App\Models\TahunAkademik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TahunAkademik::create([
            'id' => 1,
            'kode' => '2021/2022'
        ]);
        TahunAkademik::create([
            'id' => 2,
            'kode' => '2022/2023'
        ]);
        TahunAkademik::create([
            'id' => 3,
            'kode' => '2023/2024'
        ]);
    }
}
