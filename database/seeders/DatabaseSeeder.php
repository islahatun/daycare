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

        \App\Models\Student::create([
            'student_name' => 'Siswa1',
            'student_image' => 'test',
            'birth_date' =>'2020-02-02',
            'student_age' =>4,
            'birth_city' =>"serang",
            'mother_name' =>"ibu",
            'father_name' =>"ayah",
            'address' =>"Alamat",
            'mother_job' =>"Pekerjaan Ibu",
            'father_job' =>"Pekerjaan ayah",
            'email' =>"orangtua@example.com",
            'telp' =>"0987654",
            'year' =>"2024",
            'validate' =>1,
            'email' =>"orangtua@example.com",
            'payment_status' =>1,
            'status_gradulation' =>0,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Orang Tua',
            'personal_id'=>1,
            'email' => 'orangtua@example.com',
            'password' =>Hash::make('password'),
            'role' =>'Parent'
        ]);

        Role::create(["name"=>"Admininstrator"]);
        Role::create(["name"=>"Headmaster"]);
        Role::create(["name"=>"Parent"]);
        Role::create(["name"=>"teacher"]);
    }
}
