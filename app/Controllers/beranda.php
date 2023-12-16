<?php

namespace App\Controllers;

use App\Models\m_calon;
use App\Models\m_setting;

class beranda extends BaseController
{
    protected $m_calon;
    protected $m_setting;

    public function __construct()
    {
        $this->m_calon = new m_calon();
        $this->m_setting = new m_setting();
    }

    public function index()
    {
        // Mendapatkan waktu mulai dan selesai dari tabel setting
        $setting = $this->m_setting->getActiveSetting();
        $set = $this->m_setting->findAll();

        // Mendapatkan waktu sekarang
        $currentDateTime = date('Y-m-d H:i:s');

        // Memeriksa apakah waktu sekarang berada di antara waktu mulai dan selesai
        $isPollingActive = $this->isPollingActive($setting['mulai'] ?? null, $setting['selesai'] ?? null, $currentDateTime);

        $data = [
            'title' => 'Beranda Mahasiswa',
            'calon' => $this->m_calon->Data(),
            'isPollingActive' => $isPollingActive,
        ];

        // Menentukan view berdasarkan kondisi waktu
        if ($isPollingActive !== null && $isPollingActive !== false) {
            return view('mahasiswa/index', $data);
        } else {
            $data = [
                'setting' => $set // Provide default values if $setting is null
            ];
            return view('mahasiswa/poling_view', $data);
        }
    }

    private function isPollingActive($startTime, $endTime, $currentTime)
    {
        return ($startTime !== null && $endTime !== null && $currentTime >= $startTime && $currentTime <= $endTime);
    }
}
