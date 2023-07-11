<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\KategoriModel;
use App\Models\EventModel;
use App\Models\LokasiModel;

class Event extends BaseController
{
    protected $event;                                                                                        
    protected $kategori;
    protected $lokasi;
    public function __construct()
    {
        $this->event = new EventModel();
        $this->kategori = new KategoriModel();
        $this->lokasi = new LokasiModel();
    }

    public function index()
    {
       $data ['data_event'] = $this->event->getAllDataJoin();
       return view("event/index", $data);
    }

    public function home()
    {
        $data['home'] = $this->event->getAllDataJoin();
        return view("event/home", $data);
    }

    public function kategori()
    {
         $data['data_kategori'] = $this->kategori->getAllData();
         return view("event/kategori", $data);
     }

    public function lokasi()
    {
        $data['data_lokasi'] = $this->lokasi->getAllData();
        return view("event/lokasi", $data);
    }

    public function update($id_event)
    {
        $data["kategori"] = $this->kategori->getAllData();
        $data["lokasi"] = $this->lokasi->getAllData();
        $data["errors"] = session('errors');
        $data["event"] = $this->event->getDataByID($id_event);
        return view("event/edit", $data);
    }

    public function destroy($id_event)
    {
        $this->event->delete($id_event);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/event');
    }

    public function add()
    {
        $data['kategori'] = $this->kategori->getAllData();
        $data['lokasi'] = $this->lokasi->getAllData();
        $data['errors'] = session('errors');
        return view("event/add", $data);
    }
    public function store()
    {
        $validation = $this->validate([
            'nama_event' => [
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
            'id_catg'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini Harus diisi'
                ]
            ],
            'id_loc'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini Harus diisi'
                ]
            ],
            'tgl_event'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini Harus diisi'
                ]
            ],
            'price'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini Harus diisi'
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
            'nama_event' => $this->request->getPost('nama_event'),
            'id_catg' => $this->request->getPost('id_catg'),
            'id_loc' => $this->request->getPost('id_loc'),
            'tgl_event' => $this->request->getPost('tgl_event'),
            'price' => $this->request->getPost('price'),
            'cover' => $imageName,
        ];
        $this->event->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan.'); 
        return redirect()->to('/event');
    }
 
    public function edit()
    {
        $validation = $this->validate([
            'nama_event' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Harus diisi'
                ]
            ],
            'id_catg'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Harus diisi'
                ]
            ],
            'id_loc'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Harus diisi'
                ]
            ],
            'tgl_event'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Harus diisi'
                ]
            ],
            'price'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Harus diisi'
                ]
            ],
            'cover'     => [
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
        }
        $event = $this->event->find($this->request->getPost('id_event'));

        $data = [
            'id_event' => $this->request->getPost('id_event'),
            'nama_event' => $this->request->getPost('nama_event'),
            'id_catg' => $this->request->getPost('id_catg'),
            'id_loc' => $this->request->getPost('id_loc'),
            'tgl_event' => $this->request->getPost('tgl_event'),
            'price' => $this->request->getPost('price'),
        ];

        $cover = $this->request->getFile('cover');
        if($cover->isValid() && !$cover->hasMoved()){
            $imageName = $cover->getRandomName();
            $cover->move(ROOTPATH . 'public/assets/cover/', $imageName);
            if($event['cover']){
                unlink(ROOTPATH . 'public/assets/cover/' . $event['cover']);
            }
            $data['cover'] = $imageName;

        }
        $this->event->save($data);
        session()->setFlashdata('success', 'Data berhasil diperbarui.');
        return redirect()->to('/event');
    }
    
 
}