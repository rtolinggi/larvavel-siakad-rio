<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();

        \App\Models\User::factory()->create([
            'name' => 'Rio Tolinggi',
            'email' => 'rtolinggi@admin.com',
            'phone' => '081351441899',
            'roles' => 'admin',
            'address' => 'Lingkungan III, Kel. Paal IV',
            'password' => Hash::make('password'),
        ]);
    }
}
