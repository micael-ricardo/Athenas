<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
        $Pessoas = [
            [
                'nome' => 'Jorge da Silva',
                'cpf' => '111.111.111-11',
                'email' => 'jorge@terra.com.br',
                'categoria_id' => 1,
            ],
            [
                'nome' => 'Flavia Monteiro',
                'cpf' => '111.111.111-11',
                'email' => 'flavia@globo.com',
                'categoria_id' => 2,
            ],
         
            [
                'nome' => 'Marcos Frota Ribeiro',
                'cpf' => '111.111.111-11',
                'email' => 'ribeiro@gmail.com',
                'categoria_id' => 2,
            ],
         
            [
                'nome' => 'Raphael Souza Santos',
                'cpf' => '111.111.111-11',
                'email' => 'rsantos@gmail.com',
                'categoria_id' => 1,
            ],
         
            [
                'nome' => 'Pedro Paulo Mota',
                'cpf' => '111.111.111-11',
                'email' => 'ppmota@gmail.com',
                'categoria_id' => 1,
            ],
         
            [
                'nome' => 'Winder Carvalho da Silva',
                'cpf' => '111.111.111-11',
                'email' => 'winder@hotmail.com',
                'categoria_id' => 3,
            ],
         
            [
                'nome' => 'Maria da Penha Albuquerque',
                'cpf' => '111.111.111-11',
                'email' => 'mpa@hotmail.com',
                'categoria_id' => 3,
            ],
            [
                'nome' => 'Rafael Garcia Souza',
                'cpf' => '111.111.111-11',
                'email' => 'rgsouza@hotmail.com',
                'categoria_id' => 3,
            ],
            [
                'nome' => 'Tabata Costa',
                'cpf' => '111.111.111-11',
                'email' => 'tabata_costa@gmail.com',
                'categoria_id' => 2,
            ],
            [
                'nome' => 'Ronil Camarote',
                'cpf' => '111.111.111-11',
                'email' => 'camarote@terra.com.br',
                'categoria_id' => 1,
            ],
            [
                'nome' => 'Joaquim Barbosa',
                'cpf' => '111.111.111-11',
                'email' => 'barbosa@globo.com',
                'categoria_id' => 1,
            ],
            [
                'nome' => 'Eveline Maria Alcantra',
                'cpf' => '111.111.111-11',
                'email' => 'ev_alcantra@gmail.com',
                'categoria_id' => 2,
            ],
            [
                'nome' => 'João Paulo Vieira',
                'cpf' => '111.111.111-11',
                'email' => 'jpvieria@gmail.com',
                'categoria_id' => 1,
            ],
            [
                'nome' => 'Carla Zamborlini',
                'cpf' => '111.111.111-11',
                'email' => 'zamborlini@terra.com.br',
                'categoria_id' => 3,
            ],   
         
        ];

        DB::table('pessoas')->insert($Pessoas);
    }
}
