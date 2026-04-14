<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash; // Tambahkan ini
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $destinationPath = storage_path('app/public/profile');
        File::ensureDirectoryExists($destinationPath);
 
        $users = [
            [
                'id' => '1',
                'username' => 'Denny',
                'fullname' => 'Denny',
                'photo_source' => 'mlane.jpg',
                'email' => 'Denny@gmail.com',
                'password' => 'denny12345',
                'role' => 'murid',
            ],
            [
                'id' => '2',
                'username' => 'Said',
                'fullname' => 'Said',
                'photo_source' => 'profile.jpg',
                'email' => 'Said@gmail.com',
                'password' => 'Said12345',
                'role' => 'walimurid',
            ],
            [
                'id' => '3',
                'username' => 'admin',
                'fullname' => 'admin',
                'photo_source' => 'profile2.jpg',
                'email' => 'admin@gmail.com',
                'password' => 'admin12345',
                'role' => 'administrator',
            ],
            [
                'id' => '4',
                'username' => 'juned',
                'fullname' => 'juned',
                'photo_source' => 'sauro.jpg',
                'email' => 'juned@gmail.com',
                'password' => 'juned12345',
                'role' => 'walikelas',
            ],
            [
                'id' => '5',
                'username' => 'rahman',
                'fullname' => 'rahman',
                'photo_source' => 'talha.jpg',
                'email' => 'rahman@gmail.com',
                'password' => 'petugas12345',
                'role' => 'petugas',
            ],
        ];

        foreach ($users as $userData) {
            $source = public_path("assets/img/{$userData['photo_source']}");
            $target = "{$destinationPath}/{$userData['photo_source']}";
 
            if (File::exists($source)) {
                File::copy($source, $target);
            }

            User::create([
                'id' => $userData['id'],
                'username' => $userData['username'],
                'fullname' => $userData['fullname'],
                'photo' => "public/profile/{$userData['photo_source']}",
                'email' => $userData['email'],
                // 'birth_date' => Carbon::now(), 
                'password' => Hash::make($userData['password']), 
                'role' => $userData['role'],
            ]);
        }
    }
}