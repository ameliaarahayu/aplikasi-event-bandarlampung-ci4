<?php namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
      protected $table             ='user';
      protected $primaryKey        ='user_id';
      protected $useAutoIncrement  = true;
      protected $allowedFields     = ['user_nama', 'user_email', 'user_pass'];

	public function get_data($email, $password)
	{
      return $this->db->table('user')
      ->where(array('user_email' => $email, 'user_pass' => $password))
      ->get()->getRowArray();
	}
      
}