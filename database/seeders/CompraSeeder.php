<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompraSeeder extends Seeder
{
    public function run()
    {
        DB::table('compras')->insert([
            [
                'visitante_id' => 1,
                'ingresso_id' => 1,
                'data_compra' => now(),
            ],
            [
                'visitante_id' => 1,
                'ingresso_id' => 4,
                'data_compra' => now(),
            ],
            [
                'visitante_id' => 2,
                'ingresso_id' => 3,
                'data_compra' => now(),
            ],
        ]);
    }
}

