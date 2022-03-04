<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
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
            'product_code' => ['type' => 'VARCHAR', 'constraint' => 100],
            'quantity' => ['type' => 'INT'],
            'basket_discount' => ['type' => 'DECIMAL'],
            'kdv' => ['type' => 'DECIMAL'],
            'tl_price' => ['type' => 'DECIMAL'],
            'dollar_price' => ['type' => 'DECIMAL'],
            'euro_price' => ['type' => 'DECIMAL'],
            'second_price' => ['type' => 'DECIMAL'],
            'out_of_stock' => ['type' => 'BOOLEAN'],
            'status' => ['type' => 'BOOLEAN'],
            'property_show' => ['type' => 'BOOLEAN'],
            'product_end_date' => ['type' => 'DATE'],
            'show_on_homepage' => ['type' => 'BOOLEAN'],
            'order' => ['type' => 'INT'],
            'new_product' => ['type' => 'BOOLEAN'],
            'installment' => ['type' => 'BOOLEAN'],
            'warranty_period' => ['type' => 'INT', 'null' => true],
            'image_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],

            'created_at  DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => ['type' => 'DATETIME', 'null' => true, 'on update' => 'NOW()'],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
