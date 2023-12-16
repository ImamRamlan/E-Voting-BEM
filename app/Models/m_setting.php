<?php

namespace App\Models;

use CodeIgniter\Model;

class m_setting extends Model
{
    protected $table            = 'setting';
    protected $primaryKey       = 'idsetting';
    protected $allowedFields    = ['mulai', 'selesai'];

    public function getActiveSetting()
    {
        $currentTime = date('Y-m-d H:i:s');
        return $this->where('mulai <=', $currentTime)
            ->where('selesai >=', $currentTime)
            ->first();
    }
}
