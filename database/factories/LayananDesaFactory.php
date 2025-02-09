<?php

namespace Database\Factories;

use App\Models\PengajuanLayanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LayananDesa>
 */
class LayananDesaFactory extends Factory
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

            'layanan' => fake()->randomElement([
                'KTP',
                'KK',
                'Surat Keterangan',
                'Surat Pindah',
                'Surat Kematian',
                'Surat Kelahiran',
                'Surat Usaha',]),
        ];
    }
}
