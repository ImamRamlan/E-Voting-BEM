<?php

namespace App\Controllers;
use Dompdf\Dompdf;
use Dompdf\Options;

use App\Models\m_calon;
use App\Models\m_mahasiswa;

class Calon extends BaseController
{
    protected $mCalon;
    protected $mMahasiswa;

    public function __construct()
    {
        $this->mCalon = new m_calon();
        $this->mMahasiswa = new m_mahasiswa();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Calon',
        ];
        $data['calon'] = $this->mCalon->Data();

        return view('admin/calon/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Input Calon'
        ];
        $data['mahasiswa'] = $this->mMahasiswa->findAll();
        return view('admin/calon/create', $data);
    }

    public function store()
    {
        $data = [
            'visi' => $this->request->getPost('visi'),
            'misi' => $this->request->getPost('misi'),
            'suara' => $this->request->getPost('suara'),
            'nama_calon' => $this->request->getPost('nama_calon'),
            'idmhs' => $this->request->getPost('idmhs'),
        ];

        $this->mCalon->insert($data);

        return redirect()->to('/calon')->with('success', 'Calon Mahasiswa berhasil ditambahkan.');
    }

    public function edit($idcalon)
    {
        $data = [
            'title' => 'Edit Calon Mahasiswa'
        ];
        $data['calon'] = $this->mCalon->find($idcalon);
        $data['mahasiswa'] = $this->mMahasiswa->findAll();

        return view('admin/calon/edit', $data);
    }

    public function update()
    {
        $idcalon = $this->request->getPost('idcalon');

        $data = [
            'visi' => $this->request->getPost('visi'),
            'misi' => $this->request->getPost('misi'),
            'suara' => $this->request->getPost('suara'),
            'nama_calon' => $this->request->getPost('nama_calon'),
            'idmhs' => $this->request->getPost('idmhs'),
        ];

        $this->mCalon->update($idcalon, $data);

        return redirect()->to('/calon')->with('success', 'Calon Mahasiswa berhasil diubah.');
    }

    public function delete($idcalon)
    {
        $this->mCalon->delete($idcalon);

        return redirect()->to(base_url('calon'));
    }
    public function exportPdf()
    {
        $model = new m_calon();
        $data['calon'] = $model->findAll();

        // Load library dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set("isPhpEnabled", true);
        $dompdf = new Dompdf($options);

        $html = view('admin/calon/export_pdf', $data);

        $dompdf->loadHtml($html, 'UTF-8');

        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Data_calon.pdf', ['Attachment' => false]); 
    }
}
