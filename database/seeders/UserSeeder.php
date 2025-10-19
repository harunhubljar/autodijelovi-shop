<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin korisnik
        User::create([
            'name' => 'Admin',
            'email' => 'admin@autodijelovi.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        // Obični korisnik
        User::create([
            'name' => 'Korisnik Test',
            'email' => 'korisnik@autodijelovi.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        // Dodatni testni korisnici
        User::create([
            'name' => 'Haris Hodžić',
            'email' => 'haris@test.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'Amina Karić',
            'email' => 'amina@test.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);
    }
}
