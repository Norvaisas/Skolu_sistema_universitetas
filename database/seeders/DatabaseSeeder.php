<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Role::create([
            'role_name' => 'Studentas'
        ]);

        \App\Models\Role::create([
            'role_name' => 'Dėstytojas'
        ]);

        \App\Models\Role::create([
            'role_name' => 'Studijų administratorius'
        ]);

        \App\Models\Status::create([
            'status_name' => 'Laukiama patvirtinimo'
        ]);

        \App\Models\Status::create([
            'status_name' => 'Laukiama mokėjimo informacijos'
        ]);

        \App\Models\Status::create([
            'status_name' => 'Laukiama mokėjimo patvirtinimo'
        ]);

        \App\Models\Status::create([
            'status_name' => 'Patvirtinta'
        ]);

        \App\Models\User::create([
            'vidko' => 'E2767',
            'role_id' => '0',
            'name' => 'Rokas',
            'surname' => 'Norvaišas',
            'password' => '$2y$10$NRvvpWS2ZuRODXrpBPqKgePhTi6PlyP2IBJd4ftmIkNu.pncLaale'
        ]);

        \App\Models\User::create([
            'vidko' => 'D1234',
            'role_id' => '1',
            'name' => 'Jonas',
            'surname' => 'Jonaitis',
            'password' => '$2y$10$.Id5opYXFEkrOXixcqb8PuePpzOGr131Ua7bVyROiwszZPJ95UURK'
        ]);

        \App\Models\User::create([
            'vidko' => 'A5555',
            'role_id' => '2',
            'name' => 'Petras',
            'surname' => 'Petraitis',
            'password' => '$2y$10$.Id5opYXFEkrOXixcqb8PuePpzOGr131Ua7bVyROiwszZPJ95UURK'
        ]);

        \App\Models\Module::create([
            'name' => 'Matematika 1',
            'module_code' => 'P130B001',
        ]);

        \App\Models\Module::create([
            'name' => 'Tikimybių teorija ir statistika',
            'module_code' => 'P160B003',
        ]);

        \App\Models\Module::create([
            'name' => 'Lygiagretusis programavimas',
            'module_code' => 'P170B328',
        ]);
    }
}
