<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompraSeeder extends Seeder
{
    public function run()
    {
        DB::table('compras')->insert([
            'visitante_id' => 1,
            'ingresso_id' => 1,
            'data_compra' => now(),
        ]);
    }
}

