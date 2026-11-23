<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContatoSeeder extends Seeder
{
    public function run()
    {
        $dados = [
            [
                'nome' => 'Maria Silva',
                'email' => 'maria@exemplo.com',
                'telefone' => '(45) 99999-1111',
                'cep' => '85801-000',
                'endereco' => 'Centro, Cascavel/PR',
            ],
            [
                'nome' => 'João Souza',
                'email' => 'joao@exemplo.com',
                'telefone' => '(45) 99999-2222',
                'cep' => '',
                'endereco' => '',
            ],
        ];

        $this->db->table('contatos')->insertBatch($dados);
    }
}
