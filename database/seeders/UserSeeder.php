<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $orgId1 = DB::table('users')->insertGetId([
            'name' => 'Ana Organizador',
            'email' => 'ana.organizador@example.com',
            'password' => Hash::make('123456'),
            'role_id' => 2,
        ]);
        DB::table('organizadores')->insert(['user_id' => $orgId1]);
        
        $orgId2 = DB::table('users')->insertGetId([
            'name' => 'Bruno Organizador',
            'email' => 'bruno.organizador@example.com',
            'password' => Hash::make('123456'),
            'role_id' => 2,
        ]);
        DB::table('organizadores')->insert(['user_id' => $orgId2]);

        $visId1 = DB::table('users')->insertGetId([
            'name' => 'Carlos Visitante',
            'email' => 'carlos.visitante@example.com',
            'password' => Hash::make('123456'),
            'role_id' => 1,
        ]);
        DB::table('visitantes')->insert(['user_id' => $visId1]);

        $visId2 = DB::table('users')->insertGetId([
            'name' => 'Diana Visitante',
            'email' => 'diana.visitante@example.com',
            'password' => Hash::make('123456'),
            'role_id' => 1,
        ]);
        DB::table('visitantes')->insert(['user_id' => $visId2]);

        $adminId = DB::table('users')->insertGetId([
            'name' => 'Admin Principal',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'role_id' => 3,
        ]);
        DB::table('administradores')->insert(['user_id' => $adminId]);

    }
}
