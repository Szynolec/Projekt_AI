<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Uruchomienie seederów bazy danych.
     */
    public function run(): void
    {
        // Wywołanie seederów
        $this->call([
            UsersSeeder::class, // Seeder dla użytkowników
            ProductsSeeder::class, // Seeder dla produktów
            AppointmentSeeder::class // Seeder dla wizyt
        ]);
    }
}
