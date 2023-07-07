<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LokasiModel;

class Lokasi extends BaseController
{
   protected $lokasi;                                                                                        
   public function __construct()
   {
       $this->lokasi = new LokasiModel();
   }
   public function all()
   {
       $data['data_lokasi'] = $this->lokasi->getAllData();
       return view("lokasi/all", $data);
   }

}
