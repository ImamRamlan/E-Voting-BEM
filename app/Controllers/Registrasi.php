<?php

namespace App\Controllers;

class Registrasi extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Registrasi User'
        ]; 
        return view('registrasi/registrasiuser',$data);
    }
}