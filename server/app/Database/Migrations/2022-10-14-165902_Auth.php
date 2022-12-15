<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Auth extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'nim' => [
                'type' => 'INT',
                'constraint' => 10
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_mhs');
    }

    public function down()
    {
        //
    }
}