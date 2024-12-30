<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan data admin
        DB::table('users')->insert([
            'username' => 'admin123',
            'password' => Hash::make('admin123'), // Sesuaikan password yang diinginkan
            'role' => 'admin', // Menambahkan kolom role jika ada
        ]);
    }
}
