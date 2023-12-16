<?php

namespace App\Models;

use CodeIgniter\Model;

class m_calon extends Model
{
    protected $table            = 'calon';
    protected $primaryKey       = 'idcalon';
    protected $allowedFields    = ['visi', 'misi', 'suara', 'idmhs','nama_calon'];

    public function Data()
    {
        return $this->db->table('calon')
            ->join('mahasiswa', 'mahasiswa.idmhs=calon.idmhs', 'left')
            ->Get()->getResultArray();
    }
    public function allData($idcalon)
    {
        return $this->db->table('calon')
            ->join('mahasiswa', 'mahasiswa.idmhs=calon.idmhs', 'left')
            ->where('calon.idcalon', $idcalon)
            ->get()
            ->getRowArray(); // Use getRowArray() to get a single row as an array
    }
}
