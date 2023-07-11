<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $table             ='lokasi';
    protected $primaryKey        ='id_loc';
    protected $useAutoIncrement  = true;
    protected $allowedFields     = ['nama_loc', 'cover'];
    
    public function getAllData()
    {
      return $this->findAll(); 
    }
     
    public function getDataByID($id_loc)
    {
         return $this->find($id_loc);
    }
}
