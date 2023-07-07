<?php

namespace App\Controllers;

use App\Controllers\BaseController;

//step 1
use App\Models\KategoriModel;
use App\Models\EventModel; //add2

class Event extends BaseController
{
    //step 2
    protected $event;                                                                                        
    //step 3 fungsi constract
    protected $kategori;
    public function __construct()
    {
        //step 4
        $this->event = new EventModel();
        $this->kategori = new KategoriModel(); //add2
    }

    public function index()
    {
       $data ['data_event'] = $this->event->getAllDataJoin();
       return view("event/index", $data);
    }

    public function all()
    {
        $data['semuaevent'] = $this->event->getAllDataJoin();
        return view("event/semuaevent", $data);
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

    public function add()
    {
        $data['kategori'] = $this->kategori->getAllData(); //2
        $data['errors'] = session('errors');
        return view("event/add", $data);
    }
    public function store()
    {
        $validation = $this->validate([
            'nama_event' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Film Harus diisi'
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
                    'required' => 'Kolom Genre Harus diisi'
                ]
            ],
            'lokasi'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Durasi Harus diisi'
                ]
            ],
            'tgl_event'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Durasi Harus diisi'
                ]
            ],
            'price'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Durasi Harus diisi'
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
            'lokasi' => $this->request->getPost('lokasi'),
            'tgl_event' => $this->request->getPost('tgl_event'),
            'price' => $this->request->getPost('price'),
            'cover' => $imageName,
        ];
        $this->event->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan.'); // tambahkan ini
        return redirect()->to('/event');
    }
 
    public function addcatg()
    {
        $data['kategori'] = $this->kategori->getAllData(); //2
        $data['errors'] = session('errors');
        return view("kategori/addcatg", $data);
    }
    public function stores()
    {
        $validation = $this->validate([
            'nama_catg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Film Harus diisi'
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
        session()->setFlashdata('success', 'Data berhasil disimpan.'); // tambahkan ini
        return redirect()->to('/kategori');
    }
 
}