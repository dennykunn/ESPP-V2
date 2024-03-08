<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '1',
            'nama' => 'Denny',
            'tgl_lahir' => Carbon::now(),
            'password' => 'denny12345',
            'role' => 'murid',
        ]);
        User::create([
            'id' => '2',
            'nama' => 'Said',
            'tgl_lahir' => Carbon::now(),
            'password' => 'Said12345',
            'role' => 'walimurid',
        ]);
        User::create([
            'id' => '3',
            'nama' => 'admin',
            'tgl_lahir' => Carbon::now(),
            'password' => 'admin12345',
            'role' => 'administrator',
        ]);
        User::create([
            'id' => '4',
            'nama' => 'juned',
            'tgl_lahir' => Carbon::now(),
            'password' => 'juned12345',
            'role' => 'walikelas',
        ]);
        User::create([
            'id' => '5',
            'nama' => 'rahman',
            'tgl_lahir' => Carbon::now(),
            'password' => 'petugas12345',
            'role' => 'petugas',
        ]);
    }
}
