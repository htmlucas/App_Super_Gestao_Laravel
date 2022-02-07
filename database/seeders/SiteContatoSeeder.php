<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* //
        $contato = new SiteContato(); 
        $contato->nome = 'Contato 1';
        $contato->telefone = '121323213';
        $contato->email = 'contato1@gmail.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'contato 1 mano';
        $contato->save(); */


        \App\Models\SiteContato::factory()->count(100)->create();
    }
}
