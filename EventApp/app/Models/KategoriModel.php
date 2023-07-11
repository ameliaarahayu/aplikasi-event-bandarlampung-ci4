<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table             ='kategori';
    protected $primaryKey        ='id_catg';
    protected $useAutoIncrement  = true;
    protected $allowedFields     = ['nama_catg'];

    public function getAllData()
    {
      return $this->findAll(); 
     }
       
    public function getDataByID($id)
    {
       return $this->find($id);
    }
}