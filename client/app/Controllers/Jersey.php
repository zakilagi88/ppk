<?php

namespace App\Controllers;

use App\Models\JerseyModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Jersey extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->Jersey = new JerseyModel();
    }

    public function index()
    {
        helper('restclient');
        $url = "http://localhost:8080/restapi/server/public/jersey";
        // dd(akses_api('GET', $url, []));
        $data = [
            'jersey' => akses_api('GET', $url, [])
        ];
        return view('jersey/index', $data);
    }

    public function create()
    {

        helper('restclient');
        $url = "http://localhost:8080/restapi/server/public/jersey";

        $data = [
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'kelas' => $this->request->getVar('kelas'),
            'angkatan' => $this->request->getVar('angkatan'),
            'jk' => $this->request->getVar('jeniskelamin'),
            'no_jersey' => $this->request->getVar('no_jersey'),
            'nama_jersey' => $this->request->getVar('nama_jersey'),
            'keterangan' => $this->request->getVar('keterangan')
        ];
        akses_api('POST', $url, $data);
        // $data = [
        //   'Jersey' => akses_api('POST', $url, $data)
        // ];
        // echo $response->getBody();

        // $this->Jersey->save($data);
        return redirect()->to('/jersey');
    }

    public function show($id = null)
    {
        // $model = new ProductModel();
        $data = $this->Jersey->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }

    // public function ubah($id)
    // {
    //     $data['Jersey'] = $this->Jersey->getJersey($id);
    //     return view('/Jersey/index', $data);
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
        // $data['Jersey'] = $this->Jersey->getJersey($id);
        // return view('Jersey', $data);
        helper('restclient');
        $url = "http://localhost:8080/restapi/server/public/jersey/" . $id;

        $data = [
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'kelas' => $this->request->getVar('kelas'),
            'angkatan' => $this->request->getVar('angkatan'),
            'jk' => $this->request->getVar('jeniskelamin'),
            'no_jersey' => $this->request->getVar('no_jersey'),
            'nama_jersey' => $this->request->getVar('nama_jersey'),
            'keterangan' => $this->request->getVar('keterangan')

        ];
        akses_api('PUT', $url, $data);
        // $this->Jersey->save($data);
        return redirect()->to('/jersey');
    }

    public function delete($id)
    {
        helper('restclient');
        $url = "http://localhost:8080/restapi/server/public/jersey/" . $id;
        // $this->Jersey->delete($id);
        akses_api('DELETE', $url, []);
        return redirect()->to('/jersey');
    }
}