<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


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

        user::create(
        [
        'name'=> 'Admin',
        'email' =>'admin@gmail.com',
        'password'=>bcrypt('12345678'),
        'level'=>'admin',
        'aktif'=> '1'
        ],
    );
    user::create(
        
        [
        'name'=> 'Pemilik',
        'email' =>'pemilik@gmail.com',
        'password'=>bcrypt('12345678'),
        'level'=>'pemilik',
        'aktif'=> '1'
        ],
    );
        user::create(
        [
        'name'=> 'Bendahara',
        'email' =>'bendahara@gmail.com',
        'password'=>bcrypt('12345678'),
        'level'=>'bendahara',
        'aktif'=> '1'
        ],
    );

        user::create(
        [
        'name'=> 'Bryant',
        'email' =>'bryantnanur@gmail.com',
        'password'=>bcrypt('12345678'),
        'level'=>'pelanggan',
        'aktif'=> '1'
        ],
    );
    }
}