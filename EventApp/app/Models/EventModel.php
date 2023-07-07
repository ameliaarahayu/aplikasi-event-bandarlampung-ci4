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
            ->select("event.*, kategori.nama_catg")
            ->join("kategori", "kategori.id_catg = event.id_catg");
            return $query->get()->getResultArray();
       }
    
       public function getEvent($data){
        return $this->where("event", $data)->findAll;
       }
       
       public function getDataByID($id)
       {
           return $this->find($id);
       }
}
