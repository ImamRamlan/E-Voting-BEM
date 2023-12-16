<?php

namespace App\Controllers;

use App\Models\m_calon;
use App\Models\m_poling;

class Poling_user extends BaseController
{
    protected $m_calon;
    protected $m_poling;

    public function __construct()
    {
        $this->m_calon = new m_calon();
        $this->m_poling = new m_poling();
    }

    public function index()
    {
        $idmhs = session()->get('idmhs');

        // Get riwayat pemilihan mahasiswa
        $riwayat = $this->m_poling->getRiwayat($idmhs);

        $data = [
            'title' => 'Beranda Mahasiswa',
            'calon' => $this->m_calon->Data(),
            'riwayat' => $riwayat,
        ];
        return view('mahasiswa/poling/index', $data);
    }

    public function pilih($idcalon)
    {
        $idmhs = session()->get('idmhs');

        // Check apakah mahasiswa sudah pernah memilih
        $sudahMemilih = $this->m_poling->cekSudahMemilih($idmhs);

        $data = [
            'title' => 'Beranda Mahasiswa',
            'calon' => $this->m_calon->allData($idcalon),
            'sudahMemilih' => $sudahMemilih, // Menambahkan variabel $sudahMemilih ke dalam data yang dikirim ke view
        ];

        return view('mahasiswa/poling/pilih', $data);
    }
    public function save()
    {
        $idcalon = $this->request->getPost('idcalon');
        $idmhs = session()->get('idmhs');
        $waktu = $this->request->getPost('waktu');

        // Cek apakah mahasiswa sudah pernah memilih
        $sudahMemilih = $this->m_poling->cekSudahMemilih($idmhs);

        if ($sudahMemilih) {
            // Jika sudah memilih, tampilkan pesan error
            return redirect()->to('/poling_user')->with('error', 'Anda sudah memilih. Tidak dapat memilih lagi.');
        }

        // Jika belum memilih, lanjutkan dengan menyimpan pemilihan
        $result = $this->m_poling->saveData($idcalon, $idmhs, $waktu);

        if ($result) {
            // Data tersimpan dengan sukses
            return redirect()->to('/poling_user/pilih/' . $idcalon)->with('success', 'Berhasil memilih calon.');
        } else {
            // Gagal menyimpan data
            return redirect()->to('/poling_user/pilih/' . $idcalon)->with('error', 'Gagal memilih calon.');
        }
    }
}
