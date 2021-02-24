<?php

namespace App\Controllers;

use App\Models\SepedaModel;

class Sepeda extends BaseController
{
    protected $sepedaModel;
    public function __construct()
    {
        $this->sepedaModel= new SepedaModel();  
    }
    public function index(){
        $sepeda = $this->sepedaModel->findAll();
       
        $data=[
            'title' => 'Katalog Sepeda',
            'sepeda'=> $sepeda
        ];

        // $sepedaModel= new SepedaModel();



        return view('sepeda/index', $data);
    }
}