<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngressoSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingressos')->insert([
            'evento_id' => 1,
            'preco' => 50.00,
            'quantidade_total' => 100,
            'quantidade_disponivel' => 100,
        ]);
    }
}
