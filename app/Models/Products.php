<?php

namespace App\Models;

use CodeIgniter\Model;

class Products extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'product_code',
        'quantity',
        'basket_discount',
        'kdv',
        'tl_price',
        'dollar_price',
        'euro_price',
        'second_price',
        'out_of_stock',
        'status',
        'property_show',
        'product_end_date',
        'show_on_homepage',
        'order',
        'new_product',
        'installment',
        'warranty_period',
        'image_url'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'product_code' => 'required',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getProducts($lang = 'tr')
    {
        $builder = $this->builder($this->table);
        $builder = $builder->join('product_langs', 'product_langs.product_id = products.id')
            ->where('product_langs.lang', $lang);
        $builder = $builder->where('deleted_at', null);
        $builder = $builder->get();
        return $builder->getResultArray();
    }

    public function getProduct($id = 1)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->where('id', $id);
        $builder = $builder->get();
        return $builder->getResultArray();
    }

    public function deleteProduct($id)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->where('id', $id);
        $builder->update(['deleted_at' => date('Y-m-d H:i:s')]);
        return 1;
    }

}
