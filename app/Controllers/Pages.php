<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
        $data = [
            'title' => 'Home | Tugas OOP'
        ];
		return view('pages/home', $data);
	}

    public function about(){
        $data = [
            'title' => 'About me'
        ];
        return view('pages/about', $data);
    }
    public function contact(){
        $data = [
            'title' => 'Contact Us',
            'alamat'=>[
                [
                    'tipe'=> 'Kantor',
                    'alamat'=> 'Jalan Margonda Raya',
                    'kota' => 'Depok'
                ],
                [
                    'tipe'=> 'Rumah',
                    'alamat'=> 'Jalan Akses UI',
                    'kota'=> 'Depok'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}