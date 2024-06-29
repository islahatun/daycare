<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' =>Hash::make('password'),
            'role' =>'Admininstrator'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepalasekolah@example.com',
            'password' =>Hash::make('password'),
            'role' =>'Headmaster'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Guru',
            'email' => 'guru@example.com',
            'password' =>Hash::make('password'),
            'role' =>'teacher'
        ]);

        Role::create(["name"=>"Admininstrator"]);
        Role::create(["name"=>"Headmaster"]);
        Role::create(["name"=>"Parent"]);
        Role::create(["name"=>"teacher"]);
    }
}
