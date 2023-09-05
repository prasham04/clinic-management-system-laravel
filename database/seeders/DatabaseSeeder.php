<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Database\Seeders\DoctorSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@admi.com',
        //     'password' => bcrypt('12345678'),
        //     'phone' => '123456789',
        //     'role' => 'admin'
        // ]);

        $this->call([
            MajorSeeder::class,
            DoctorSeeder::class
        ]);
    }
}
