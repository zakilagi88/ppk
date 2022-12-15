<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Buku extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->Buku = new BukuModel();
    }

    public function index()
    {
        if (session()->get('token')) {
            helper('restclient');
            $url1 = "http://localhost/restapi/server/public/buku";
            $url2 = "http://localhost/restapi/server/public/userme";
            // dd(akses_api('GET', $url, []));
            $data = [
                'buku' => akses_api('GET', $url1, []),
                'user' => akses_api('GET', $url2, [])
            ];
            return view('buku/index', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function create()
    {

        helper('restclient');
        $url = "http://localhost:8080/restapi/server/public/buku";

        $data = [
            'judul_buku' => $this->request->getVar('judul_buku'),
            'penulis_buku' => $this->request->getVar('penulis_buku'),
            'tahun_buku' => $this->request->getVar('tahun_buku'),
            'status_buku' => $this->request->getVar('status_buku')
        ];
        akses_api('POST', $url, $data);
        // $data = [
        //   'Buku' => akses_api('POST', $url, $data)
        // ];
        // echo $response->getBody();

        // $this->Buku->save($data);
        return redirect()->to('/buku');
    }

    public function show($id = null)
    {
        // $model = new ProductModel();
        $data = $this->Buku->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }

    // public function ubah($id)
    // {
    //     $data['Buku'] = $this->Buku->getBuku($id);
    //     return view('/Buku/index', $data);
    // }

    public function update($id = null)
    {
        $id = $this->request->getVar('kode');
        // $nim = $this->request->getVar('nim');
        // $password = $this->request->getVar('password');
        // $nama = $this->request->getVar('nama');

        // $data=[
        //     'id'=>$id,
        //     'nim'=>$nim,
        //     'password'=>$password,
        //     'nama'=>$nama
        // ];
        // $data['Buku'] = $this->Buku->getBuku($id);
        // return view('Buku', $data);
        helper('restclient');
        $url = "http://localhost:8080/restapi/server/public/buku/" . $id;

        $data = [
            'judul_buku' => $this->request->getVar('judul_buku'),
            'penulis_buku' => $this->request->getVar('penulis_buku'),
            'tahun_buku' => $this->request->getVar('tahun_buku'),
            'status_buku' => $this->request->getVar('status_buku')
        ];
        akses_api('PUT', $url, $data);
        // $this->Buku->save($data);
        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        helper('restclient');
        $url = "http://localhost:8080/restapi/server/public/buku/" . $id;
        // $this->Buku->delete($id);
        akses_api('DELETE', $url, []);
        return redirect()->to('/buku');
    }
}