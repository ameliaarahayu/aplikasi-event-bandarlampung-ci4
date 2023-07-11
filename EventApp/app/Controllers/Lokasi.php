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

    public function index()
    {
        $data['data_lokasi'] = $this->lokasi->getAllData();
        return view("lokasi/index", $data);
    }

    public function update($id_loc)
    {
        $data["lokasi"] = $this->lokasi->getDataByID($id_loc);
        $data["errors"] = session('errors');
        $data["data_lokasi"] = $this->lokasi->getDataByID($id_loc);
        return view("lokasi/edit", $data);
    }

    public function destroy($id_loc)
    {
        $this->lokasi->delete($id_loc);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/lokasi');
    }

    public function add()
    {
        $data['lokasi'] = $this->lokasi->getAllData();
        $data['errors'] = session('errors');
        return view("lokasi/add", $data);
    }

    public function edit()
    {
        $validation = $this->validate([
            'nama_loc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Lokasi Harus diisi'
                ]
            ],
            'cover' => [
                'rules' => 'mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048]',
                'errors' => [
                    'mime_in' => 'Tipe file pada Kolom Cover harus berupa JPG, JPEG, atau PNG',
                    'max_size' => 'Ukuran file pada Kolom Cover melebihi batas maksimum'
                ]
            ]
        ]);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();

            return redirect()->back()->withInput()->with('errors', $errors);
        } else {
            // Proses pembaruan data lokasi
            $lokasi = $this->lokasi->find($this->request->getPost('id'));

            $data = [
                'id_loc' => $this->request->getPost('id_loc'),
                'nama_loc' => $this->request->getPost('nama_loc'),
            ];

            $cover = $this->request->getFile('cover');
            if ($cover->isValid() && !$cover->hasMoved()) {
                $imageName = $cover->getRandomName();
                $cover->move(ROOTPATH . 'public/assets/image/', $imageName);
                if ($lokasi['cover']) {
                    unlink(ROOTPATH . 'public/assets/image/' . $lokasi['cover']);
                }
                $data['cover'] = $imageName;
            }

            $this->lokasi->save($data);
            session()->setFlashdata('success', 'Data berhasil diperbarui.');
            return redirect()->to('/lokasi');
        }
    }
    public function tambah()
    {
        $validation = $this->validate([
            'nama_loc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Harus diisi'
                ]
            ],
            'cover'     => [
             'rules' => 'uploaded[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048]',
             'errors' => [
                 'uploaded' => 'Kolom Cover harus berisi file.',
                 'mime_in' => 'Tipe file pada Kolom Cover harus berupa JPG, JPEG, atau PNG',
                 'max_size' => 'Ukuran file pada Kolom Cover melebihi batas maksimum'
             ]
         ],
        ]);
 
        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
 
            return redirect()->back()->withInput()->with('errors', $errors);
        }
 
        $image = $this->request->getFile('cover');
        $imageName = $image->getRandomName();
        $image->move(ROOTPATH . 'public/assets/cover/', $imageName);
        $data = [
            'nama_loc' => $this->request->getPost('nama_loc'),
            'cover' => $imageName,
 
        ];
        $this->lokasi->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->to('/lokasi');
    } 
}