<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        return view('login/login');
    }
    public function login()
    {
        // Validasi input
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Username and password are required');
        }

        // Ambil input username dan password
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Implementasikan logika autentikasi sesuai kebutuhan Anda
        // Contoh: Cek apakah username dan password valid
        if ($username === 'username' && $password === 'password') {
            // Autentikasi berhasil
            session()->set('isLoggedIn', true);
            return redirect()->to('/event');
        } else {
            // Autentikasi gagal
            return redirect()->back()->withInput()->with('error', 'Invalid username or password');
        }
    }
}