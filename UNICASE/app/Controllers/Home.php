<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'isi' => 'Layout2/v_pills',
            'menu' => 'list'
        ];

         return view('Layout2/v_wrapper', $data);
    }


    public function v_box(): string
    {

        $data = [
            'isi' => 'Layout2/v_box',
            'menu' => 'box'
        ];

         return view('Layout2/v_wrapper', $data);
    }

}