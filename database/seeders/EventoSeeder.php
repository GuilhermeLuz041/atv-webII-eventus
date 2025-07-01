<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventoSeeder extends Seeder
{
    public function run()
    {
        DB::table('eventos')->insert([
            [
                'nome' => 'Festival de Jazz no Parque',
                'descricao' => 'Um dia inteiro de jazz ao ar livre com bandas renomadas.',
                'data_evento' => '2025-08-10 15:00:00',
                'local' => 'Parque Central',
                'status_evento_id' => 1,
                'categoria_id' => 1,
                'organizador_id' => 1,
            ],
            [
                'nome' => 'Conferência de Inteligência Artificial',
                'descricao' => 'Palestras e workshops com especialistas em IA e Machine Learning.',
                'data_evento' => '2025-09-05 09:00:00',
                'local' => 'Centro de Convenções TechCity',
                'status_evento_id' => 1,
                'categoria_id' => 2,
                'organizador_id' => 2,
            ],
            [
                'nome' => 'Oficina de Pintura ao Vivo',
                'descricao' => 'Aprenda técnicas de pintura com artistas locais em uma experiência prática.',
                'data_evento' => '2025-07-30 14:00:00',
                'local' => 'Galeria de Arte Moderna',
                'status_evento_id' => 1,
                'categoria_id' => 5,
                'organizador_id' => 1,
            ],
            [
                'nome' => 'Campeonato Amador de Futebol',
                'descricao' => 'Times locais disputando o título regional em partidas emocionantes.',
                'data_evento' => '2025-08-15 10:00:00',
                'local' => 'Estádio Municipal',
                'status_evento_id' => 1,
                'categoria_id' => 4,
                'organizador_id' => 2,
            ],
            [
                'nome' => 'Festival Gastronômico das Cores',
                'descricao' => 'Explore sabores de várias culinárias em um festival multicultural.',
                'data_evento' => '2025-09-20 12:00:00',
                'local' => 'Praça da Cultura',
                'status_evento_id' => 1,
                'categoria_id' => 6,
                'organizador_id' => 1,
            ],
        ]);
    }
}
