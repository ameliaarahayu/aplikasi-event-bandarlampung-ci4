<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
   //step 2
   protected $kategori;                                                                                        
   //step 3 fungsi constract
   public function __construct()
   {
       //step 4
       $this->kategori = new KategoriModel();
   }
   public function all()
   {
       $data['data_kategori'] = $this->kategori->getAllData();
       return view("kategori/all", $data);
   }

}
