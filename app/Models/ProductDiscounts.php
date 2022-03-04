<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductDiscounts extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'product_discounts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'product_id',
        'customer_group',
        'priority',
        'tl_price',
        'tl_price_type',
        'dollar_price',
        'dollar_price_type',
        'euro_price',
        'euro_price_type',
        'start_date',
        'end_date',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
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

    public function getProductDiscounts($productId)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->where('product_id', $productId);
        $builder = $builder->get();
        return $builder->getResult();
    }
}
