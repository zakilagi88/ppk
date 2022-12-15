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
        $data = $this->Jersey->findAll();
        return $this->respond($data);
    }

    public function create()
    {
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
        $this->Jersey->save($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Jersey berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function show($id_jersey = null)
    {
        $data = $this->Jersey->where('id_jersey', $id_jersey)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }

    public function update($id_jersey = null)
    {
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'nama'    => $json->nama,
                'nim'     => $json->nim,
                'kelas'   => $json->kelas,
                'angkatan'  => $json->angkatan,
                'jk' => $json->jeniskelamin,
                'no_jersey' => $json->no_jersey,
                'nama_jersey' => $json->nama_jersey,
                'keterangan' => $json->keterangan
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'nama'    => $input['nama'],
                'nim'     => $input['nim'],
                'kelas'   => $input['kelas'],
                'angkatan'  => $input['angkatan'],
                'jk' => $input['jk'],
                'no_jersey' => $input['no_jersey'],
                'nama_jersey' => $input['nama_jersey'],
                'keterangan' => $input['keterangan']
            ];
        }
        $this->Jersey->update($id_jersey, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Jersey berhasil diperbarui.'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function delete($id_jersey = null)
    {
        $data = $this->Jersey->find($id_jersey);
        if ($data) {
            $this->Jersey->delete($id_jersey);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Jersey berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}