<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductLangs extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'product_langs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'product_id',
        'lang',
        'title',
        'info_title',
        'info_description',
        'meta_title',
        'meta_keywords',
        'slug',
        'content',
        'video_embed_code',
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


    public function getProductLangs($productId)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->where('product_id', $productId);
        $builder = $builder->get();
        return $builder->getResultArray();
    }

    public function getProductLang($productId)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->where('product_id', $productId);
        $builder = $builder->get();
        return $builder->getResult();
    }

    public function getProductLangsWithLang($productId, $lang)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->where('product_id', $productId);
        $builder = $builder->where('lang', $lang);
        $builder = $builder->get();
        return $builder->getResult();
    }
}
