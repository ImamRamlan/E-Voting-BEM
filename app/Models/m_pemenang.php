<?php

namespace App\Models;

use CodeIgniter\Model;

class m_pemenang extends Model
{
    protected $table            = 'pemenang';
    protected $primaryKey       = 'idpemenang';
    protected $allowedFields    = ['idcalon', 'jumlah_suara', 'tahunjabatan'];

    public function Data()
    {
        return $this->db->table('pemenang')
            ->join('calon', 'calon.idcalon=pemenang.idcalon', 'left')
            ->join('mahasiswa', 'mahasiswa.idmhs=calon.idmhs', 'left')
            ->Get()->getResultArray();
    }
}
