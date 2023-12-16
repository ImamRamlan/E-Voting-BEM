<?php

namespace App\Controllers;

use App\Models\m_pemenang;
use App\Models\m_calon;
use App\Models\m_poling;


class Pemenang extends BaseController
{
    protected $m_pemenang;
    protected $m_calon;
    protected $m_poling;

    public function __construct()
    {
        $this->m_pemenang = new m_pemenang();
        $this->m_calon = new m_calon();
        $this->m_poling = new m_poling();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pemenang',
            'winner' => $this->m_poling->getWinnerByCalon(),
            'pemenang' => $this->m_pemenang->Data()
        ];
        return view('admin/pemenang/index', $data);
    }
    
    public function pilih()
    {
        $data = [
            'idcalon' => $this->request->getPost('idcalon'),
            'jumlah_suara' => $this->request->getPost('jumlah_suara'),
            'tahunjabatan' => $this->request->getPost('tahunjabatan'),
        ];

        $this->m_pemenang->insert($data);

        return redirect()->to('/pemenang')->with('success', 'Pemenang Berhasil disubmit.');
    }
    public function hapus($idpemenang)
    {
        $this->m_pemenang->delete($idpemenang);

        return redirect()->to('/pemenang')->with('hapus', 'Data Pemenang berhasil dihapus.');
    }

}
