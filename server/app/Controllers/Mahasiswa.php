<?php

namespace App\Controllers;

use App\Models\DetailModel;
use App\Models\MahasiswaModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Mahasiswa extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->Mahasiswa = new MahasiswaModel();
        // $this->Detail = new DetailModel();
        // $this->Detail->getDetailModel();
    }

    public function index()
    {
        // $data = $this->Mahasiswa->getDetailModel();
        $data = $this->Mahasiswa->findAll();
        // dd($data);
        return $this->respond($data);
    }

    public function create()
    {
        $data = [
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'kelas' => $this->request->getVar('kelas'),
            'angkatan' => $this->request->getVar('angkatan'),
            'alamat' => $this->request->getVar('alamat'),
            'avatar' => $this->request->getVar('avatar')
        ];
        $this->Mahasiswa->save($data);
        // $this->Mahasiswa->save($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Mahasiswa berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function show($id = null)
    {
        $data = $this->Mahasiswa->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }

    public function update($id = null)
    {
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'nama'    => $json->nama,
                'nim'     => $json->nim,
                'kelas'   => $json->kelas,
                'angkatan'  => $json->angkatan,
                'alamat' => $json->alamat,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'nama'    => $input['nama'],
                'nim'     => $input['nim'],
                'kelas'   => $input['kelas'],
                'angkatan'  => $input['angkatan'],
                'alamat' => $input['alamat']
            ];
        }
        $this->Mahasiswa->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Mahasiswa berhasil diperbarui.'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function delete($id = null)
    {
        $data = $this->Mahasiswa->find($id);
        if ($data) {
            $this->Mahasiswa->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Mahasiswa berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}