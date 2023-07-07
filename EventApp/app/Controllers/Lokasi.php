<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LokasiModel;

class Lokasi extends BaseController
{
   //step 2
   protected $lokasi;                                                                                        
   //step 3 fungsi constract
   public function __construct()
   {
       //step 4
       $this->lokasi = new LokasiModel();
   }
   public function all()
   {
       $data['data_lokasi'] = $this->lokasi->getAllData();
       return view("lokasi/all", $data);
   }

}
