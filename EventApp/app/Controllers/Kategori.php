<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
   protected $kategori;                                                                                        
   public function __construct()
   {
       $this->kategori = new KategoriModel();
   }
   public function all()
   {
       $data['data_kategori'] = $this->kategori->getAllData();
       return view("kategori/all", $data);
   }

}
