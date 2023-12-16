<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;

use App\Models\M_Mahasiswa;

class Mahasiswa extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new M_Mahasiswa();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Mahasiswa'
        ];
        $data['mahasiswa'] = $this->mahasiswaModel->paginate(10); // Assuming you want 10 records per page
        $data['pager'] = $this->mahasiswaModel->pager;
        $data['currentPage'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['mahasiswa'] = $this->mahasiswaModel->findAll();

        return view('admin/mahasiswa/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Data Mahasiswa'
        ];
        return view('admin/mahasiswa/create', $data);
    }

    public function store()
    {
        $validationRules = [
            'nim' => 'required|is_unique[mahasiswa.nim]',
            'namamhs' => 'required',
            'jk' => 'required',
            'jurusan' => 'required',
            'fakultas' => 'required',
            'notelp' => 'required',
            'tahunmasuk' => 'required',
            'username' => 'required|is_unique[mahasiswa.username]',
            'password' => 'required',
            'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/mahasiswa/create')->withInput()->with('validation', $this->validator);
        }

        $foto = $this->request->getFile('foto');
        $newName = $foto->getRandomName();
        $foto->move('path/to/folder', $newName);

        $data = [
            'nim' => $this->request->getPost('nim'),
            'namamhs' => $this->request->getPost('namamhs'),
            'jurusan' => $this->request->getPost('nim'),
            'fakultas' => $this->request->getPost('namamhs'),
            'jk' => $this->request->getPost('jk'),
            'notelp' => $this->request->getPost('notelp'),
            'tahunmasuk' => $this->request->getPost('tahunmasuk'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'foto' => $newName,
            'memilih' => $this->request->getPost('memilih'),
        ];

        $this->mahasiswaModel->insert($data);

        return redirect()->to('/mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Mahasiswa'
        ];
        $data['mahasiswa'] = $this->mahasiswaModel->find($id);

        return view('admin/mahasiswa/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nim' => $this->request->getPost('nim'),
            'namamhs' => $this->request->getPost('namamhs'),
            'jurusan' => $this->request->getPost('jurusan'),
            'fakultas' => $this->request->getPost('fakultas'),
            'jk' => $this->request->getPost('jk'),
            'notelp' => $this->request->getPost('notelp'),
            'tahunmasuk' => $this->request->getPost('tahunmasuk'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'memilih' => $this->request->getPost('memilih'),
        ];

        // Cek apakah ada foto baru yang diupload
        $newFoto = $this->request->getFile('foto');
        if ($newFoto->isValid() && !$newFoto->hasMoved()) {
            // Hapus foto lama
            $oldFotoPath = 'path/to/folder/' . $this->mahasiswaModel->find($id)['foto'];
            unlink($oldFotoPath);

            // Pindahkan foto baru
            $newFotoName = $newFoto->getRandomName();
            $newFoto->move('path/to/folder', $newFotoName);

            // Tambahkan data foto baru ke array $data
            $data['foto'] = $newFotoName;
        }

        $success = $this->mahasiswaModel->updateMahasiswa($id, $data);

        if ($success) {
            return redirect()->to('/mahasiswa')->with('success', 'Mahasiswa berhasil diupdate.');
        } else {
            return redirect()->to("/mahasiswa/edit/$id")->withInput()->with('validation', $this->validator);
        }
    }

    public function delete($id)
    {
        $this->mahasiswaModel->delete($id);

        return redirect()->to('/mahasiswa')->with('success', 'Mahasiswa berhasil dihapus.');
    }
    public function exportPdf()
    {
        $model = new M_Mahasiswa();
        $data['mahasiswa'] = $model->findAll();

        // Load library dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set("isPhpEnabled", true);
        $dompdf = new Dompdf($options);

        $html = view('admin/mahasiswa/export_pdf', $data);

        $dompdf->loadHtml($html, 'UTF-8');

        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Data_mahasiswa.pdf', ['Attachment' => false]);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Mahasiswa'
        ];
        $data['mahasiswa'] = $this->mahasiswaModel->find($id);

        if (!$data['mahasiswa']) {
            return redirect()->to('/mahasiswa')->with('error', 'Mahasiswa tidak ditemukan');
        }

        return view('admin/mahasiswa/detail', $data);
    }
}
