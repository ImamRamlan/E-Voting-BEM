<?php

namespace App\Models;

use CodeIgniter\Model;

class m_poling extends Model
{
    protected $table            = 'poling';
    protected $primaryKey       = 'idpoling';
    protected $allowedFields    = ['idcalon', 'idmhs', 'waktu'];

    public function getWinnerByCalon()
    {
        return $this->db->table('poling')
            ->join('calon', 'calon.idcalon=poling.idcalon', 'left')
            ->select('calon.idcalon, calon.nama_calon, calon.visi, calon.misi, COUNT(*) as count') // Include 'nama_calon', 'visi', dan 'misi' in the select
            ->groupBy('calon.idcalon')
            ->orderBy('count', 'DESC') // Order by count in descending order
            ->get()
            ->getRowArray();
    }

    public function countVotesByCalon()
    {
        return $this->db->table('poling')
            ->join('mahasiswa', 'mahasiswa.idmhs=poling.idmhs', 'left')
            ->join('calon', 'calon.idcalon=poling.idcalon', 'left')
            ->select('calon.idcalon, calon.nama_calon,calon.visi,calon.misi, COUNT(*) as count') // Include 'nama_calon' in the select
            ->groupBy('calon.idcalon')
            ->get()->getResultArray();
    }
    public function Data()
    {
        return $this->db->table('poling')
            ->join('mahasiswa', 'mahasiswa.idmhs=poling.idmhs', 'left')
            ->join('calon', 'calon.idcalon=poling.idcalon', 'left')
            ->get()->getResultArray();
    }
    public function allData($idcalon)
    {
        return $this->db->table('poling')
            ->join('mahasiswa', 'mahasiswa.idmhs=poling.idmhs', 'left')
            ->join('calon', 'calon.idcalon=poling.idcalon', 'left')
            ->where('calon.idcalon', $idcalon)
            ->Get()
            ->getResultArray();
    }
    public function saveData($idcalon, $idmhs, $waktu)
    {
        $data = [
            'idcalon' => $idcalon,
            'idmhs' => $idmhs,
            'waktu' => $waktu
        ];

        // Use insert method to save data to the database
        return $this->insert($data);
    }
    // public function getRiwayat($idmhs)
    // {
    //     return $this->db->table('poling')
    //         ->join('calon as calon_pemilih', 'calon_pemilih.idcalon = poling.idcalon')
    //         ->join('mahasiswa', 'mahasiswa.idmhs = poling.idmhs')
    //         ->join('calon as calon_terpilih', 'calon_terpilih.idmhs = mahasiswa.idmhs')
    //         ->select('poling.*, calon_pemilih.*, calon_terpilih.namamhs as namaterpilih')
    //         ->where('poling.idmhs', $idmhs)
    //         ->get()->getResultArray();
    // }
    // models/m_poling.php

    public function getRiwayat($idmhs)
    {
        return $this->db->table('poling')
            ->join('calon as calon_pemilih', 'calon_pemilih.idcalon = poling.idcalon')
            ->join('mahasiswa', 'mahasiswa.idmhs = poling.idmhs')
            ->where('poling.idmhs', $idmhs)
            ->get()->getResultArray();
    }

    public function cekSudahMemilih($idmhs)
    {
        $result = $this->db->table('poling')
            ->where('idmhs', $idmhs)
            ->countAllResults();

        return ($result > 0);
    }
}
