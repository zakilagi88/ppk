<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MahasiswaModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserMe extends ResourceController
{
    public function __construct()
    {
        $this->UserMe = new MahasiswaModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];
        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $response = [
                'id' => $decoded->id,
                'nim' => $decoded->nim,
                'email' => $decoded->email,
                'nama' => $decoded->nama,
                'role' => $decoded->role,
                'kelas' => $decoded->kelas,
                'angkatan' => $decoded->angkatan,
                'alamat' => $decoded->alamat
            ];
            return $this->respond($response);
        } catch (\Throwable $th) {
            return $this->fail('Invalid Token');
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'nama' => $json->nama,
                'email' => $json->email,
                'angkatan' => $json->angkatan,
                'kelas' => $json->kelas,
                'alamat' => $json->alamat,
            ];
        } else {
            $data = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'angkatan' => $this->request->getVar('angkatan'),
                'kelas' => $this->request->getVar('kelas'),
                'alamat' => $this->request->getVar('alamat'),
            ];
        }

        $this->UserMe->update($id, $data);

        $model = new MahasiswaModel();
        $user = $model->where("id", $id)->first();
        $key = getenv('TOKEN_SECRET');
        $payload = array(
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "id" => $user['id'],
            "nim" => $user['nim'],
            "email" => $user['email'],
            "nama" => $user['nama'],
            "angkatan" => $user['angkatan'],
            "kelas" => $user['kelas'],
            "alamat" => $user['alamat'],
            "role" => $user['role']
        );
        $model->save($payload);
        $token = JWT::encode($payload, $key, 'HS256');
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Profile berhasil diperbarui.'
            ],
            'token' => $token
        ];
        return $this->respondCreated($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}