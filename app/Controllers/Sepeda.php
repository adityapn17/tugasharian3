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
        // $sepeda = $this->sepedaModel->findAll();
       
        $data=[
            'title' => 'Katalog Sepeda',
            'sepeda'=> $this->sepedaModel->getSepeda()
            
        ];

        // $sepedaModel= new SepedaModel();



        return view('sepeda/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title'=> 'Detail Sepeda',

            'sepeda'=>$this->sepedaModel->getSepeda($slug)
        ];

        //jika sepeda tidak ada di tabel
        if(empty($data['sepeda'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama produk '. $slug . ' tidak ditemukan');
        }
        return view('sepeda/detail', $data);
            
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Sepeda',
            'validation' => \Config\Services::validation()
        ];

        return view('sepeda/create', $data);
    }

    public function save()
    {
        // validasi input data
        if(!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[sepeda.nama]',
                'errors' => [
                    'required' => '{field} sepeda harus diisi.',
                    'is_unique' => '{field sepeda sudah terdaftar'
                ]
                    ],
                    'produk' => [
                        'rules' => 'max_size[produk,1024]|is_image[produk]|mime_in[produk,image/jpg,image/jpeg,image/png]',
                        'errors' =>[
                            'max_size' => 'Ukuran gambar terlalu besar',
                            'is_image' => 'yang anda pilih bukan gambar',
                            'mime_in' => 'yang anda pilih bukan gambar'
                        ]
                    ]
        ])){
            // $validation = \Config\Services:: validation();
            // return redirect()->to('/sepeda/create')->withInput()->with('validation', $validation);
            return redirect()->to('/sepeda/create')->withInput();
        }

         // ambil gambar
         $fileProduk = $this->request->getFile('produk');
         // jika tidak upload gambar
         if ($fileProduk->getError() == 4) {
             $namaProduk = 'default.jpg';
         } else {
             
             //generate nama produk random
             $namaProduk = $fileProduk->getRandomName();
             // pindahkan file ke folder img
             $fileProduk->move('img', $namaProduk);
         }
            
        $slug = url_title($this->request->getVar('nama'), '-', true);
       $this->sepedaModel->save(
           [
               'nama' => $this->request->getVar('nama'),
               'slug' =>$slug,
               'merk' => $this->request->getVar('merk'),
               'produk' => $namaProduk
           ]
       );

       session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

       return redirect()->to('/sepeda');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $sepeda = $this->sepedaModel->find($id);

        //cek jika file default.jpg
        if ($sepeda['produk'] != 'default.jpg') {          
            //hapus gambar
            unlink('img/' . $sepeda['produk']);
        }

        $this->sepedaModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to("/sepeda");
    }

    public function edit($slug){
        $data = [
            'title' => 'Form Ubah Data Sepeda',
            'validation' => \Config\Services::validation(),
            'sepeda' => $this->sepedaModel->getSepeda($slug)
        ];

        return view('sepeda/edit', $data);
    }

    public function update($id)
    {
        //cek judul

        $sepedaLama= $this->sepedaModel->getSepeda($this->request->getVar('slug'));
        if ($sepedaLama ['nama'] == $this->request->getVar('nama')){
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[sepeda.nama]';
        }

        
        if(!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} sepeda harus diisi.',
                    'is_unique' => '{field sepeda sudah terdaftar'
                ]
            ]
        ])){
            $validation = \Config\Services:: validation();
            return redirect()->to('/sepeda/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->sepedaModel->save(
            [
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'slug' =>$slug,
                'merk' => $this->request->getVar('merk'),
                'produk' => $this->request->getVar('produk')
            ]
        );
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to("/sepeda");
    }


}