<?php

namespace App\Controllers;

use App\Models\DetailModel;
use App\Models\BukuModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Buku extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->Buku = new BukuModel();
        // $this->Detail = new DetailModel();
        // $this->Detail->getDetailModel();
    }

    public function index()
    {
        // $data = $this->Buku->getDetailModel();
        $data = $this->Buku->findAll();
        // dd($data);
        return $this->respond($data);
    }

    public function create()
    {
        $data = [
            'judul_buku' => $this->request->getVar('judul_buku'),
            'penulis_buku' => $this->request->getVar('penulis_buku'),
            'tahun_buku' => $this->request->getVar('tahun_buku'),
            'status_buku' => $this->request->getVar('status_buku'),
        ];
        $this->Detail->save($data);
        // $this->Buku->save($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Buku berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function show($id = null)
    {
        $data = $this->Buku->where('id_buku', $id)->first();
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
                'judul_buku'    => $json->judul_buku,
                'penulis_buku'     => $json->penulis_buku,
                'tahun_buku'   => $json->tahun_buku,
                'status_buku'  => $json->status_buku
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'judul_buku'    => $input['judul_buku'],
                'penulis_buku'     => $input['penulis_buku'],
                'tahun_buku'   => $input['tahun_buku'],
                'status_buku'  => $input['status_buku']
            ];
        }
        $this->Buku->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Buku berhasil diperbarui.'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function delete($id = null)
    {
        $data = $this->Buku->find($id);
        if ($data) {
            $this->Buku->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Buku berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}