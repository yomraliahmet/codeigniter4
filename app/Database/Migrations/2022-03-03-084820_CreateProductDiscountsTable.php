<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductDiscountsTable extends Migration
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
            'customer_group' => ['type' => 'INT'],
            'priority' => ['type' => 'INT', 'null' => true],
            'tl_price' => ['type' => 'DECIMAL', 'null' => true],
            'tl_price_type' => ['type' => 'INT', 'null' => true],
            'dollar_price' => ['type' => 'DECIMAL', 'null' => true],
            'dollar_price_type' => ['type' => 'INT', 'null' => true],
            'euro_price' => ['type' => 'DECIMAL', 'null' => true],
            'euro_price_type' => ['type' => 'INT', 'null' => true],
            'start_date' => ['type' => 'DATE'],
            'end_date' => ['type' => 'DATE'],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('product_discounts');
    }

    public function down()
    {
        $this->forge->dropTable('product_discounts');
    }
}
