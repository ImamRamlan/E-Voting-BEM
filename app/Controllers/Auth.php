<?php

namespace App\Controllers;
use App\Models\m_auth;
class auth extends BaseController
{
	protected $m_auth;
    public function __construct() {
        $this->m_auth = new m_auth;
    }
    public function index()
    {
        if(session()->get('log') == true){
            return redirect()->to('/beranda');
        }
        return view('auth/login');
    }
    public function log()
	{
        $username 	= $this->request->getPost('username');
		$password 	= $this->request->getPost('password');
		$cek_user = $this->m_auth->auth_mahasiswa($username,$password);
			if($cek_user){
				session()->set('log', true);
				// session()->set('akses', '2');
				session()->set('username', $cek_user['username']);
				session()->set('namamhs', $cek_user['namamhs']);
				session()->set('nim', $cek_user['nim']);
				session()->set('idmhs', $cek_user['idmhs']);
				session()->set('password', $cek_user['password']);
				// session()->setFlashdata('pesan','Selamat Datang',$username);
				return redirect()->to('/beranda');
			} else {  // jika username dan password tidak ditemukan atau salah
                session()->setFlashdata('gagal','Login Gagal');
				session()->setFlashdata('salah','Username atau password salah ');
				return redirect()->to('/auth');
			}
	}
    public function logout()
	{
		session()->destroy();
		return redirect()->to('/auth');
	}
}
