<?php namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
	public function index()
	{
		return view('/login/user_login');
   }
   
   public function login_action() 
   {
      $muser = new UserModel();
      $email = $this->request->getPost('email');
      $password = $this->request->getPost('password');
    
      $cek = $muser->get_data($email, $password);
      if ($cek !== null && ($cek['user_email'] == $email) && ($cek['user_pass'] == $password))
      {
         session()->set('user_email', $cek['user_email']);
         session()->set('user_nama', $cek['user_nama']);
         session()->set('user_id', $cek['user_id']);
         return redirect()->to(base_url('event/home'));
      } else {
         session()->setFlashdata('gagal', 'Username / Password salah');
         return redirect()->back()->withInput()->with('error', 'Invalid username or password');
      }
   }

   public function logout() 
   {
      session()->destroy();
      return redirect()->to(base_url('login'));
   }

   public function register()
    {
        return view('login/register');
    }

   public function reg_action()
   {
        $validation = $this->validate([
            'user_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Harus diisi'
                ]
            ],
            'user_email'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini Harus diisi'
                ]
            ],
            'user_pass'  => [
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

        $data = [
            'user_nama' => $this->request->getPost('user_nama'),
            'user_email' => $this->request->getPost('user_email'),
            'user_pass' => $this->request->getPost('user_pass'),
        ];
        $this->user->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan.'); 
        return redirect()->to('/login');
    }
}