<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
// use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class Mahasiswa extends ResourceController
{
    use ResponseTrait;
    function __construct()
    {
        $this->model = new MahasiswaModel();
    }
    public function index()
    {
        // helper(['restclient']);
        $data['mhs'] = $this->model->orderBy('id', 'asc')->findAll();
        // var_dump($data[1]);
        // foreach ($data as $val) {
        //     echo 'ID: ' . $val["id"] . '<br/>';
        //     echo 'Nama: ' . $val["nama"] . '<br/>';
        //     echo "Nim: " . $val['nim'] . "<br/>";
        //     echo "Jurusan: " . $val['jurusan'] . "<br/><br/>";
        // }
        // $this->model->view('template/header', $data);
        // $this->model->view('template/index', $data);
        // $this->model->view('template/footer');
        // $this->model->view('template/sidebar');
        echo view('admin/index', $data);
        // return $this->respond($data, 200);


    }
    public function show($id = null)
    {
        $data = $this->model->where('id', $id)->findAll();
        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound("Data tidak ditemukan untuk id $id");
        }
    }
    public function create()
    {
        // $data['mhs'] = [
        //     "nama" => $this->input->post('nama', true),
        //     "nim" => $this->input->post('nrp', true),
        //     "jurusan" => $this->input->post('email', true),
        //     // "" => $this->input->post('jurusan', true)
        // ];
        // helper(['restclient']);
        // $url = "http://localhost:8012/jwt_app/jekz/public/mahasiswa";
        // if (!$this->model->save($data)) {
        //     return $this->fail($this->model->errors());
        // }
        // return $this->respond($response);
        // return view('admin/tambah');
        helper(['form']);
        $data['mhs'] = $this->model->orderBy('id', 'asc')->findAll();
        $data = $this->request->getPost();
        $rules = [
            'nama' => 'required',
            'nim' => 'required|min_length[9]',
            'jurusan' => 'required'
        ];
        // return view('admin/tambah');
        if (!$this->validate($rules)) {
            $this->fail($this->validator->getErrors());
            // echo view('template/header', $data);
            echo view('admin/index', $data);
            // echo view('template/footer');
            // echo view('admin/tambah');
        } else {
            // $this->model->tambahmhs();
            $this->model->save($data);
            $response = [
                'status' => 201,
                'error' => null,
                'message' => [
                    'success' => 'berhasil memasukkan data'
                ]
            ];
            return $this->respond($response);
            echo view('admin/index', $data);
        }
    }
    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $data['id'] = $id;

        $isExists = $this->model->where('id', $id)->findAll();
        if (!$isExists) {
            return $this->failNotFound("Data tidak ditemukan untuk id $id");
        }

        if (!$this->model->save($data)) { //kalau ada error saat menyimpan
            return $this->fail($this->model->errors());
        }

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => "Data mahasiswa dengan id $id berhasil diupdate"
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        echo view('admin/index');
        $data = $this->model->where('id', $id)->findAll();
        if ($data) {
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data berhasil dihapus'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}