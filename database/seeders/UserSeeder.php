<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        File::copy(public_path('assets/img/mlane.jpg'), storage_path('app/public/profile/mlane.jpg'));
        File::copy(public_path('assets/img/profile.jpg'), storage_path('app/public/profile/profile.jpg'));
        File::copy(public_path('assets/img/profile2.jpg'), storage_path('app/public/profile/profile2.jpg'));
        File::copy(public_path('assets/img/sauro.jpg'), storage_path('app/public/profile/sauro.jpg'));
        File::copy(public_path('assets/img/talha.jpg'), storage_path('app/public/profile/talha.jpg'));

        User::create([
            'id' => '1',
            'username' => 'Denny',
            'fullname' => 'Denny',
            'photo' => 'public/profile/mlane.jpg',
            'email' => 'Denny@gmail.com',
            'birth_date' => Carbon::now(),
            'password' => 'denny12345',
            'role' => 'murid',
        ]);
        User::create([
            'id' => '2',
            'username' => 'Said',
            'fullname' => 'Said',
            'photo' => 'public/profile/profile.jpg',
            'email' => 'Said@gmail.com',
            'birth_date' => Carbon::now(),
            'password' => 'Said12345',
            'role' => 'walimurid',
        ]);
        User::create([
            'id' => '3',
            'username' => 'admin',
            'fullname' => 'admin',
            'photo' => 'public/profile/profile2.jpg',
            'email' => 'admin@gmail.com',
            'birth_date' => Carbon::now(),
            'password' => 'admin12345',
            'role' => 'administrator',
        ]);
        User::create([
            'id' => '4',
            'username' => 'juned',
            'fullname' => 'juned',
            'photo' => 'public/profile/sauro.jpg',
            'email' => 'juned@gmail.com',
            'birth_date' => Carbon::now(),
            'password' => 'juned12345',
            'role' => 'walikelas',
        ]);
        User::create([
            'id' => '5',
            'username' => 'rahman',
            'fullname' => 'rahman',
            'photo' => 'public/profile/talha.jpg',
            'email' => 'rahman@gmail.com',
            'birth_date' => Carbon::now(),
            'password' => 'petugas12345',
            'role' => 'petugas',
        ]);
    }
}
