<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {

        $orgId = DB::table('users')->insertGetId([
            'name' => 'Organizador Exemplo',
            'email' => 'org@example.com',
            'password' => Hash::make('123456'),
            'role_id' => 2,
        ]);

        DB::table('organizadores')->insert([
            'user_id' => $orgId,
        ]);


        $visId = DB::table('users')->insertGetId([
            'name' => 'Visitante Exemplo',
            'email' => 'visitante@example.com',
            'password' => Hash::make('123456'),
            'role_id' => 1,
        ]);

        DB::table('visitantes')->insert([
            'user_id' => $visId,
        ]);
    }
}

