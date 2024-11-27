<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Petugas::create([
            'username' => 'Admin',
            'password' => Hash::make('admin123'), // Password terenkripsi
        ]);

        Petugas::create([
            'username' => 'Admin2',
            'password' => Hash::make('admin2'), 
        ]);
    }
}