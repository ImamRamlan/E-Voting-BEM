<?php

namespace App\Models;

use CodeIgniter\Model;

class m_log extends Model
{  
    protected $table            = 'admin';
    protected $primaryKey       = 'idadmin';
    protected $allowedFields    = ['nama','username','password'];
    
    public function auth_admin($username, $password)
    {
        return $this->db->table('admin')
            ->where([
                'username' => $username,
                'password' => $password,
            ])
            ->get()
            ->getRowArray();
    }

    public function getDataByUsername($username)
    {
        return $this->db->table('admin')
            ->select('nama') // Pilih kolom yang ingin diambil
            ->where('username', $username)
            ->get()
            ->getRowArray();
    }
}

