<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductLangsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
                'constraint' => 5
            ],
            'product_id' => ['type' => 'INT'],
            'lang' => ['type' => 'VARCHAR', 'constraint' => 5],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'info_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'info_description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'meta_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'meta_keywords' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'meta_description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'content' => ['type' => 'TEXT', 'null' => true],
            'video_embed_code' => ['type' => 'TEXT', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('product_langs');
    }

    public function down()
    {
        $this->forge->dropTable('product_langs');
    }
}
