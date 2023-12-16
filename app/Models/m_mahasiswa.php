<?php

namespace App\Models;

use CodeIgniter\Model;

class m_mahasiswa extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'idmhs';
    protected $allowedFields    = ['jurusan','fakultas','nim','namamhs','jk','notelp','tahunmasuk','username','password','foto','memilih'];
    
    public function updateMahasiswa($id, $data)
    {
        $validationRules = [
            'nim' => "required|is_unique[mahasiswa.nim,idmhs,$id]",
            'namamhs' => 'required',
            'jurusan' => 'required',
            'fakultas' => 'required',
            'jk' => 'required',
            'notelp' => 'required',
            'tahunmasuk' => 'required',
            'username' => 'required',
            'password' => 'required',
            'memilih' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return false; // Validation failed
        }

        // Validation passed, update the record
        $this->update($id, $data);
        return true; // Update successful
    }
}   