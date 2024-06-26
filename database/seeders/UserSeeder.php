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
        User::factory(20)->create(['role' => 'Mahasiswa']);
        User::factory(20)->create(['role' => 'Dosen']);
        User::factory()->create(['role' => 'Admin']);
    }
}
