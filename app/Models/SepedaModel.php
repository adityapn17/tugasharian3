<?php

namespace App\Models;

use CodeIgniter\Model;

class SepedaModel extends Model
{
    protected $table      = 'sepeda';
    protected $useTimestamps = true;
    protected $createdField = 'created_app';
    protected $updatedField = 'updated_app';
    protected $allowedFields = ['nama', 'slug', 'merk', 'produk'];

    public function getSepeda($slug =false)
    {
        if ($slug== false){
            return $this->findAll();
        }


        return $this->where(['slug'=>$slug])->first();
    }

}