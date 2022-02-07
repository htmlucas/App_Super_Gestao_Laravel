<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Database\Seeders\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 forma instanciando obj
        $fornecedor = new Fornecedor();
        $fornecedor->nome='Fornecedor 1';
        $fornecedor->site ='fornecedro@g.com.br';
        $fornecedor->uf ='SP';
        $fornecedor->email ='contato@fornecedor.com.br';
        $fornecedor->save();

        // 2 forma metodo create (atencao para o fillable da classe)
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'Fornecedor2@g.com.br',
            'uf' => 'BA',
            'email' => 'Fornecedor2@g.com.br',
        ]);

        //insert
       /*  DB::table('fornecedores')->insert([
        'nome' => 'Fornecedor 300',
        'site' => 'Fornecedor3@g.com.br',
        'uf' => 'BA',
        'email' => 'Fornecedor3@g.com.br',
        ]); */
    }
}
