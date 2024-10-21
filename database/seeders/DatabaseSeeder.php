<?php

namespace Database\Seeders;

use App\Models\User;
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

        $this->call([
            GelarBelakangSeeder::class,
            GelarDepanSeeder::class,
            PangkatDosenSeeder::class,
            JabatanFungsionalSeeder::class,
            RoleSeeder::class,
            ProvinsiSeeder::class,
            KotaSeeder::class,
            UniversitasSeeder::class,
            ProdiSeeder::class,
            BankSeeder::class,
            UserSeeder::class,
            PeriodeSeeder::class,
            PengajuanSeeder::class,
            PengajuanDokumenSeeder::class,
            PengajuanUserSeeder::class,
            // PermohonanSeeder::class,
            FaqSeeder::class,
            InformasiSeeder::class,
            BkdSeeder::class
        ]);
    }
}
