<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table             ='event';
    protected $primaryKey        ='id_event';
    protected $useAutoIncrement  = true;
    protected $allowedFields     = ['nama_event', 'cover', 'id_loc', 'tgl_event', 'price', 'id_catg'];

    public function getAllDataJoin(){
        $query = $this->db->table("event")
            ->select("event.*, kategori.nama_catg, lokasi.nama_loc")
            ->join("kategori", "kategori.id_catg = event.id_catg")
            ->join("lokasi","lokasi.id_loc = event.id_loc");
            return $query->get()->getResultArray();
       }
       
       public function getDataByID($id_event)
       {
           return $this->find($id_event);
       }
}