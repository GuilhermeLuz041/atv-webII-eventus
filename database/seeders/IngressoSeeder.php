<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngressoSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingressos')->insert([
            ['evento_id' => 1, 'preco' => 120.00, 'quantidade_total' => 150, 'quantidade_disponivel' => 150],
            ['evento_id' => 2, 'preco' => 300.00, 'quantidade_total' => 80, 'quantidade_disponivel' => 80],
            ['evento_id' => 3, 'preco' => 70.00,  'quantidade_total' => 60, 'quantidade_disponivel' => 60],
            ['evento_id' => 4, 'preco' => 50.00,  'quantidade_total' => 200, 'quantidade_disponivel' => 200],
            ['evento_id' => 5, 'preco' => 90.00,  'quantidade_total' => 100, 'quantidade_disponivel' => 100],
        ]);
    }
}
