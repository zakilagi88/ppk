<?php

namespace App\Controllers;

use App\Models\DetailModel;
use App\Models\ArtikelModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Artikel extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->Artikel = new ArtikelModel();
        // $this->Detail = new DetailModel();
        // $this->Detail->getDetailModel();
    }

    public function index()
    {
        // $data = $this->Artikel->getDetailModel();
        $data = $this->Artikel->findAll();
        // dd($data);
        return $this->respond($data);
    }

    public function create()
    {
        $data = [
            'judul_artikel' => $this->request->getVar('judul_artikel'),
            'gambar_artikel' => $this->request->getVar('gambar_artikel'),
            'pengirim_artikel' => $this->request->getVar('pengirim_artikel'),
            'tanggal_artikel' => $this->request->getVar('tanggal_artikel'),
            'isi_artikel' => $this->request->getVar('isi_artikel'),
        ];
        $this->Artikel->save($data);
        // $this->Artikel->save($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Artikel berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function show($id = null)
    {
        $data = $this->Artikel->where('id', $id)->first();
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
                'judul_artikel'    => $json->judul_artikel,
                'gambar_artikel'     => $json->gambar_artikel,
                'pengirim_artikel'   => $json->pengirim_artikel,
                'tanggal_artikel'  => $json->tanggal_artikel,
                'isi_artikel' => $json->isi_artikel,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'judul_artikel'    => $input['judul_artikel'],
                'gambar_artikel'     => $input['gambar_artikel'],
                'pengirim_artikel'   => $input['pengirim_artikel'],
                'tanggal_artikel'  => $input['tanggal_artikel'],
                'isi_artikel' => $input['isi_artikel']
            ];
        }
        $this->Artikel->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Artikel berhasil diperbarui.'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function delete($id = null)
    {
        $data = $this->Artikel->find($id);
        if ($data) {
            $this->Artikel->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Artikel berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}