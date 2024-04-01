<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->unique()->numberBetween(21, 40),
            'nidn' => fake()->randomNumber(8),
            'alamat' => fake()->address(),
            'jenis_kelamin'=> fake()->randomElement(['Pria', 'Wanita']),
            'prodi' => fake()->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Manajemen Informatika']),
            'jurusan' => fake()->randomElement(['Teknik Elektro']),
            'jabatan' => fake()->randomElement(['Dosen', 'Asisten Dosen', 'Ketua Jurusan', 'Ketua Prodi']),
            'avatar' => fake()->imageUrl(640, 480, 'people', true),
        ];
    }
}
