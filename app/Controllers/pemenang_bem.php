<?php

namespace App\Controllers;

use App\Models\m_pemenang;

class pemenang_bem extends BaseController
{
    protected $m_pemenang;

    public function __construct()
    {
        $this->m_pemenang = new m_pemenang();
    }

    public function index()
    {
        $data = [
            'title' => 'Pemenang Bem Universitas.',
            'pemenang' => $this->m_pemenang->Data(),
        ];
        return view('mahasiswa/pemenang', $data);
    }
}