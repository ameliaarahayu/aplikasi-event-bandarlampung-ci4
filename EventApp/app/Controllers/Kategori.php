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
   public function index()
   {
      $data ['data_kategori'] = $this->kategori->getAllData();
      return view("kategori/index", $data);
   }
   public function all()
   {
       $data['data_kategori'] = $this->kategori->getAllData();
       return view("kategori/all", $data);
   }

   public function destroy($id_catg)
   {
       $this->kategori->delete($id_catg);
       session()->setFlashdata('success', 'Data berhasil dihapus.');
       return redirect()->to('/kategori');
   }

   public function add()
   {
       $data['kategori'] = $this->kategori->getAllData();
       $data['errors'] = session('errors');
       return view("kategori/add", $data);
   }
   public function nambah()
   {
       $validation = $this->validate([
           'nama_catg' => [
               'rules' => 'required',
               'errors' => [
                   'required' => 'Kolom Nama Harus diisi'
               ]
           ],
       ]);

       if (!$validation) {
           $errors = \Config\Services::validation()->getErrors();

           return redirect()->back()->withInput()->with('errors', $errors);
       }
       $data = [
           'nama_catg' => $this->request->getPost('nama_catg'),
       ];
       $this->kategori->save($data);
       session()->setFlashdata('success', 'Data berhasil disimpan.');
       return redirect()->to('/kategori');
   }

   public function update($id_catg)
    {
        //$decryptedId = decryptUrl($id_loc);
        $data["kategori"] = $this->kategori->getAllData();
        $data["errors"] = session('errors');
        $data["kategori"] = $this->kategori->getDataByID($id_catg);
        return view("kategori/edit", $data);
    }

    public function edit()
    {
        $validation = $this->validate([
            'nama_catg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Harus diisi'
                ]
            ],
        ]);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();

            return redirect()->back()->withInput()->with('errors', $errors);
        }
        $kategori = $this->kategori->find($this->request->getPost('id_catg'));

        $data = [
            'id_catg' => $this->request->getPost('id_catg'),
            'nama_catg' => $this->request->getPost('nama_catg'),
        ];
        $this->kategori->save($data);
        session()->setFlashdata('success', 'Data berhasil diperbarui.');
        return redirect()->to('/kategori');
    }
    
}