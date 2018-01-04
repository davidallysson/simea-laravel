<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tiposdeusers')->insert([
            'descricao' => 'aluno'
        ]);

        DB::table('tiposdeusers')->insert([
            'descricao' => 'administrador'
        ]);

        DB::table('users')->insert([
            'name' => 'David Allysson Pereira Moreira',
            'email' => 'davidmoreirainformatica@gmail.com',
            'password' => bcrypt('123'),
            'tipo_id' => 1,
        ]);
    }
}
