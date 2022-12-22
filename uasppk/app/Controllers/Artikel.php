<?php

namespace App\Controllers;

use App\Models\DetailModel;
use App\Models\ArtikelModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\Files\File;
    

class Artikel extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->Artikel = new ArtikelModel();
    }

    public function index()
    {
        $data = $this->Artikel->findAll();
        return $this->respond($data);
    }

    public function create()
    {
        $gambar_artikel = $this->request->getFile('gambar_artikel');
        $gambar_artikel->move('img');
        $nama_file = $gambar_artikel->getName();
        $data = [
            'judul_artikel' => $this->request->getVar('judul_artikel'),
            'gambar_artikel' => $nama_file,
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
        return $this->respond($response);
    }

    public function show($id = null)
    {
        $data = $this->Artikel->where('id_artikel', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }

    public function update($id)
    {
        helper(['form', 'array']);
        $gambar_artikel = dot_array_search('gambar_artikel.name', $_FILES);
        
            $data = [
                'judul_artikel'    => $this->request->getPost('judul_artikel'),
                'gambar_artikel'     => $this->request->getVar('gambar_artikel'),
                'pengirim_artikel'   => $this->request->getPost('pengirim_artikel'),
                'tanggal_artikel'  => $this->request->getPost('tanggal_artikel'),
                'isi_artikel' => $this->request->getPost('isi_artikel'),
            ];

        if ($gambar_artikel != '') {

            $img = $this->request->getFile('gambar_artikel');
            $img->move('img');
            $nama_file = $img->getName();
            $data['gambar_artikel'] = $nama_file;
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