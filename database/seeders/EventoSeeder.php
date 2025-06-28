<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventoSeeder extends Seeder
{
    public function run()
    {
        DB::table('eventos')->insert([
            'nome' => 'Show de Rock',
            'descricao' => 'Show com várias bandas',
            'data_evento' => '2025-07-20',
            'local' => 'Estádio Municipal',
            'status_evento_id' => 1,
            'categoria_id' => 1,
            'organizador_id' => 1,
        ]);
    }
}
