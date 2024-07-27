<?php

namespace Database\Seeders;

use App\Models\Klub;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultKlubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $klubs = [
            ['name' => 'Arema FC', 'city' => 'Malang'],
            ['name' => 'Dewa United', 'city' => 'Bali'],
            ['name' => 'Madura United', 'city' => 'Pamekasan'],
            ['name' => 'Persebaya Surabaya', 'city' => 'Surabaya'],
            ['name' => 'Persib Bandung', 'city' => 'Bandung'],
            ['name' => 'Persija Jakarta', 'city' => 'Jakarta'],
            ['name' => 'Persik Kediri', 'city' => 'Kediri'],
            ['name' => 'Persis Solo', 'city' => 'Solo'],
            ['name' => 'Persita Tangerang', 'city' => 'Tangerang'],
            ['name' => 'PSIS Semarang', 'city' => 'Semarang'],
            ['name' => 'PSS Sleman', 'city' => 'Sleman'],
            ['name' => 'Bali United', 'city' => 'Bali'],
            ['name' => 'Barito Putera', 'city' => 'Banjarmasin'],
            ['name' => 'Borneo FC', 'city' => 'Samarinda'],
            ['name' => 'Malut United', 'city' => 'Ternate'],
            ['name' => 'PSBS Biak', 'city' => 'Biak'],
            ['name' => 'PSM Makassar', 'city' => 'Makassar'],
            ['name' => 'Semen Padang', 'city' => 'Padang'],
        ];

        foreach ($klubs as $klub) {
            Klub::create($klub);
        }
    }
}
