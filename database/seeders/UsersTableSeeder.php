<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Data pengguna yang ingin dimasukkan ke dalam tabel users
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('admin123'),
                'password_lihat' => 'admin123',
            ],
            // Tambahkan data pengguna lainnya sesuai kebutuhan Anda
        ];

        // Memasukkan data pengguna ke dalam tabel users
        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
