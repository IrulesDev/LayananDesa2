<?php

namespace Database\Seeders;

use App\Models\keluarga;
use App\Models\LayananDesa;
use App\Models\PengajuanLayanan;
use App\Models\PerangkatDesa;
use App\Models\User;
use App\Models\Userable;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $pengajuanLayanans = PengajuanLayanan::factory(10)->create();
        PerangkatDesa::factory(4)->create([
            'pengajuan_id' => $pengajuanLayanans->random()->id,
        ]);
        LayananDesa::factory(20)->create();
        
        $keluargas = Keluarga::factory(50)->create();
        foreach($keluargas as $keluarga){
            User::factory(4)->create(['keluarga_id'=> $keluarga->id]);
        }
        Userable::factory(250)->create();
    }
}
