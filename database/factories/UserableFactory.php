<?php

namespace Database\Factories;

use App\Models\LayananDesa;
use App\Models\PengajuanLayanan;
use App\Models\PerangkatDesa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Userable>
 */
class UserableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,

            'userable_id' => fake()->randomElement([
                'Pengajuan_id' => PengajuanLayanan::all()->random()->id,
                'Layanan_id' => LayananDesa::all()->random()->id,
                'perangkat_id' => PerangkatDesa::all()->random()->id,
            ]),

            'userable_type' => fake()->randomElement([
                'App\Models\PengajuanLayanan',
                'App\Models\LayananDesa',
                'App\Models\PerangkatDesa',
            ]),
        ];
    }
}
