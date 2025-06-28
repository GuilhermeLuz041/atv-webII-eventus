<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusEventoSeeder extends Seeder
{
    public function run()
    {
        DB::table('status_eventos')->insert([
            ['nome' => 'ingressos disponíveis'],
            ['nome' => 'ingressos indisponíveis'],
        ]);
    }
}

