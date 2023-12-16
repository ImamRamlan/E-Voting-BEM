<?php

namespace App\Controllers;

use App\Models\m_log;

class Admin extends BaseController
{
    protected $m_log;

    public function __construct()
    {
        $this->m_log = new m_log();
    }

    public function index()
    {
        $data['title'] = 'Data Admin';
        $data['admin'] = $this->m_log->findAll();

        return view('admin/admin/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Admin';
        return view('admin/admin/create', $data);
    }
    public function store()
    {
        $rules = [
            'nama' => 'required',
            'username' => 'required|is_unique[admin.username]',
            'password' => 'required',
        ];

        // Lakukan validasi
        if (!$this->validate($rules)) {
            // Jika validasi gagal, cek apakah pesan validasi kustom ada
            $customMessages = [
                'username' => [
                    'is_unique' => 'Username sudah digunakan. Pilih username lain.',
                ],
            ];

            // Set pesan validasi kustom
            $this->validator->setRules($rules, $customMessages);

            // Cek apakah terdapat error pada field username
            if ($this->validator->hasError('username', 'is_unique')) {
                // Jika error pada field username (is_unique), kembalikan dengan pesan kustom
                return redirect()->to('admin/create')->withInput()->with('validation', $this->validator);
            }
            return redirect()->to('admin/create')->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        $this->m_log->insert($data);

        return redirect()->to('/admin')->with('success', 'Data Admin berhasil ditambahkan');
    }

    public function edit($idadmin)
    {
        $data['title'] = 'Edit Admin';
        $data['admin'] = $this->m_log->find($idadmin);

        return view('admin/admin/edit', $data);
    }

    public function update($idadmin)
    {
        $rules = [
            'nama' => 'required',
            'username' => 'required|is_unique[admin.username,idadmin,' . $idadmin . ']',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to("admin/edit/{$idadmin}")->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        $this->m_log->update($idadmin, $data);

        return redirect()->to('/admin')->with('success', 'Data Admin berhasil diperbarui');
    }

    public function delete($idadmin)
    {
        $this->m_log->delete($idadmin);

        return redirect()->to('/admin')->with('hapus', 'Data Admin berhasil dihapus');
    }
}
