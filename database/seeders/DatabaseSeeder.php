<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'fullname' => 'Admin',
            'email' => 'admindonasien@gmail.com',
            'password' => bcrypt('admin01'),
            'roles' => 'admin',
        ]);

        DB::table('first_aids')->insert([
            'wound_code' => 'luka_lecet',
            'wound_name' => 'Luka Lecet',
            'first_aid' => 'Lorem Ipsum',
        ]);
        
        DB::table('first_aids')->insert([
            'wound_code' => 'luka_bakar',
            'wound_name' => 'Luka Bakar',
            'first_aid' => 'Lorem Ipsum',
        ]);

        DB::table('first_aids')->insert([
            'wound_code' => 'luka_tusuk',
            'wound_name' => 'Luka Tusuk',
            'first_aid' => 'Lorem Ipsum',
        ]);

        DB::table('first_aids')->insert([
            'wound_code' => 'luka_sobek',
            'wound_name' => 'Luka Sobek',
            'first_aid' => 'Lorem Ipsum',
        ]);

        DB::table('first_aids')->insert([
            'wound_code' => 'luka_sayat',
            'wound_name' => 'Luka Sayat',
            'first_aid' => 'Lorem Ipsum',
        ]);

        DB::table('first_aids')->insert([
            'wound_code' => 'koreng',
            'wound_name' => 'Koreng',
            'first_aid' => 'Lorem Ipsum',
        ]);
    }
}
