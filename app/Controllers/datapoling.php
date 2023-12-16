<?php

namespace App\Controllers;
use App\Models\m_poling;
class datapoling extends BaseController
{
    public function index()
    {
        $model = new m_poling();
        $votesByCalon = $model->countVotesByCalon();
        $data = [
            'title' => 'Hasil Poling',
            'poling' => $model->Data(),
            'votesByCalon' => $votesByCalon,
        ];
        return view('admin/poling',$data);
    }
}
