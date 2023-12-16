<?php

namespace App\Controllers;

use App\Models\m_setting;
use CodeIgniter\Controller;

class Setting extends Controller
{
    protected $m_setting;

    public function __construct()
    {
        $this->m_setting = new m_setting();
    }

    public function index()
    {
        $data = [
            'title' => 'Atur Waktu.',
            'setting' => $this->m_setting->findAll()
        ];
        return view('admin/setting/index', $data);
    }

    public function save()
    {
        // Check if there is any existing data
        $existingData = $this->m_setting->findAll();

        if (!empty($existingData)) {
            // If there is existing data, redirect with a message
            return redirect()->to('/setting')->with('error', 'Data waktu sudah ada. Tidak dapat menambahkan waktu poling.');
        }

        // If there is no existing data, proceed with inserting new data
        $data = [
            'mulai' => $this->request->getPost('mulai'),
            'selesai' => $this->request->getPost('selesai'),
        ];

        $this->m_setting->insert($data);

        return redirect()->to('/setting')->with('success', 'Waktu Poling berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Atur Waktu.',
            'setting' => $this->m_setting->find($id)
        ];
        return view('admin/setting/edit', $data);
    }
    public function update($id)
    {
        $data = [
            'mulai' => $this->request->getPost('mulai'),
            'selesai' => $this->request->getPost('selesai'),
        ];
        $this->m_setting->update($id, $data);

        return redirect()->to('/setting')->with('success', 'Waktu Poling berhasil diperbarui.');
    }
    public function delete($id)
    {
        $this->m_setting->delete($id);

        session()->setFlashdata('hapus', 'Data waktu berhasil dihapus.');
        return redirect()->to('/setting');
    }
}
