<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Mahasiswa extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->Mahasiswa = new MahasiswaModel();
    }

    public function index()
    {
        if (session()->get('token')) {
            helper('restclient');
            $url1 = "http://localhost/restapi/server/public/mahasiswa";
            $url2 = "http://localhost/restapi/server/public/userme";
            // dd(akses_api('GET', $url, []));
            $data = [
                'mahasiswa' => akses_api('GET', $url1, []),
                'user' => akses_api('GET', $url2, [])
            ];
            return view('mahasiswa/index', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function create()
    {

        helper('restclient');
        $url = "http://localhost/restapi/server/public/mahasiswa";

        $data = [
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'kelas' => $this->request->getVar('kelas'),
            'angkatan' => $this->request->getVar('angkatan'),
            'alamat' => $this->request->getVar('alamat'),
            // 'avatar' => $this->request->getVar('avatar')
        ];
        akses_api('POST', $url, $data);
        // $data = [
        //   'Mahasiswa' => akses_api('POST', $url, $data)
        // ];
        // echo $response->getBody();

        // $this->Mahasiswa->save($data);
        return redirect()->to('/mahasiswa');
    }

    public function show($id = null)
    {
        // $model = new ProductModel();
        $data = $this->Mahasiswa->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }

    // public function ubah($id)
    // {
    //     $data['Mahasiswa'] = $this->Mahasiswa->getMahasiswa($id);
    //     return view('/Mahasiswa/index', $data);
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
        // $data['Mahasiswa'] = $this->Mahasiswa->getMahasiswa($id);
        // return view('Mahasiswa', $data);
        helper('restclient');
        $url = "http://localhost/restapi/server/public/mahasiswa/" . $id;

        $data = [
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'kelas' => $this->request->getVar('kelas'),
            'angkatan' => $this->request->getVar('angkatan'),
            'alamat' => $this->request->getVar('alamat'),
            // 'avatar' => $this->request->getVar('avatar')
        ];
        akses_api('PUT', $url, $data);
        // $this->Mahasiswa->save($data);
        return redirect()->to('/mahasiswa');
    }

    public function delete($id)
    {
        helper('restclient');
        $url = "http://localhost/restapi/server/public/mahasiswa/" . $id;
        // $this->Mahasiswa->delete($id);
        akses_api('DELETE', $url, []);
        return redirect()->to('/mahasiswa');
    }
}