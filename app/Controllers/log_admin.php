<?php

namespace App\Controllers;

use App\Models\m_log;

class log_admin extends BaseController
{
    protected $m_log;

    public function __construct()
    {
        $this->m_log = new m_log();
    }

    public function index()
    {
        return view('auth/log_admin');
    }

    public function log()
	{
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$nama = $this->request->getPost('nama');
		
		$cek_admin = $this->m_log->auth_admin($username, $password, $nama);

		if ($cek_admin) {
			session()->set([
				'log' => true,
				'username' => $cek_admin['username'],
				'password' => $cek_admin['password'],
				'nama' => $cek_admin['nama']
			]);
			return redirect()->to('/page');
		} else {
			session()->setFlashdata('gagal', 'Login Gagal');
			session()->setFlashdata('salah', 'Username atau Password salah ');
			return redirect()->to('/log_admin');
		}
	}

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('password');
        session()->remove('nama');
        return redirect()->to('/log_admin');
    }
}
