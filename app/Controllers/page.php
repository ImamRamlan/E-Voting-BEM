<?php

namespace App\Controllers;

class page extends BaseController
{
    public function index(): string
    {
        $data =[
            'title' => 'Beranda Admin'
        ];
        return view('admin/index',$data);
    }
}
