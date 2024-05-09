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
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' =>Hash::make('password'),
            'role' =>'Admininstrator'
        ]);

        Role::create(["name"=>"Admininstrator"]);
        Role::create(["name"=>"Headmaster"]);
        Role::create(["name"=>"Parent"]);
        Role::create(["name"=>"teacher"]);
    }
}
