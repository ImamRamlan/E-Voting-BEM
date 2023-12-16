<?php

namespace App\Models;

use CodeIgniter\Model;

class m_auth extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'idmhs';
    
    function auth_mahasiswa($username,$password){
        return $this->db->table('mahasiswa')->where([
            'username' => $username,
            'password' => $password
        ])->get()->getRowArray();

    }
}