<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        // $users = [
        //         [
        //             'name' => 'Administrator',
        //             'email' => 'rezaaldiirawan007@gmail.com',
        //             'phone' => '08123456789101',
        //             'address' => 'Jl. Raya Cibaduyut No. 1',
        //             'gender' => 'Pria',
        //             'avatar' => '',
        //             'role' => 'Admin',
        //             'password' => bcrypt('admin'),
        //         ],
        //         [
        //             'name' => 'Tantri Indrabulan',
        //             'email' => 'titaniaelvs@gmail.com',
        //             'phone' => '08123456789102',
        //             'address' => 'Jl. Raya Cibaduyut No. 2',
        //             'gender' => 'Wanita',
        //             'avatar' => '',
        //             'role' => 'Dosen',
        //             'password' => bcrypt('dosen'),
        //         ],
        //         [
        //             'name' => 'Reza',
        //             'email' => 'savlenproject@gmail.com',
        //             'phone' => '08123456789103',
        //             'address' => 'Jl. Raya Cibaduyut No. 3',
        //             'gender' => 'Pria',
        //             'avatar' => '',
        //             'role' => 'Mahasiswa',
        //             'password' => bcrypt('mahasiswa'),
        //         ]
        //     ];
            // User::insert($users);
        }
    }
