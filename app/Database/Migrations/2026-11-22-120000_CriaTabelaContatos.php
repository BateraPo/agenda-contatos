<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriaTabelaContatos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nome' => ['type' => 'VARCHAR', 'constraint' => 100],
            'email' => ['type' => 'VARCHAR', 'constraint' => 120],
            'telefone' => ['type' => 'VARCHAR', 'constraint' => 20],
            'cep' => ['type' => 'VARCHAR', 'constraint' => 9, 'null' => true],
            'endereco' => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('contatos');
    }

    public function down()
    {
        $this->forge->dropTable('contatos');
    }
}
