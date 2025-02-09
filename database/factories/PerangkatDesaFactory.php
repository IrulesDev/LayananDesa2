<?php

namespace Database\Factories;

use App\Models\PengajuanLayanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PerangkatDesa>
 */
class PerangkatDesaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pengajuan_id' => PengajuanLayanan::all()->random()->id,
            
            'perangkat' =>fake()->unique()->randomElement([
                'kades',
                'kadus',
                'carik',
                'bayan'
            ])
        ];
    }
}
