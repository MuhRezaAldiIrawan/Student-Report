<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mahasiswa;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Mahasiswa::class;
    public function definition()
    {
        return [
            'user_id' => fake()->unique()->numberBetween(1, 20),
            'nim' => fake()->randomNumber(8),
            'kelas' => fake()->randomElement(['X', 'XI', 'XII']),
            'prodi' => fake()->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Manajemen Informatika']),
            'jurusan' => fake()->randomElement(['Teknik Elektro']),
            'angkatan' => fake()->randomElement(['2020', '2021', '2022']),
            'alamat' => fake()->address(),
            'jenis_kelamin' => fake()->randomElement(['Pria', 'Wanita']),
            'avatar' => fake()->imageUrl(640, 480, 'people', true),

        ];
    }
}
