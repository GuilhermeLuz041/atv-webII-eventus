<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            ['nome' => 'Música'],
            ['nome' => 'Tecnologia'],
            ['nome' => 'Educação'],
            ['nome' => 'Esportes'],
            ['nome' => 'Artes Cênicas'],
            ['nome' => 'Gastronomia'],
        ]);
    }
}

