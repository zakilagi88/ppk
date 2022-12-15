<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use GuzzleHttp\Client;

require __DIR__ . '../../../vendor/autoload.php';

class Me extends ResourceController
{
    /**
     * Return an array of resource objects,themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function __construct()
    {
        $this->model = new UserModel();
    }
    public function index()
    {
        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];

        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $response = [
                'id' => $decoded->uid,
                'email' => $decoded->email
            ];
            return $this->respond($response);
        } catch (\Throwable $th) {
            return $this->fail('Invalid Token');
        }
        $data = $this->model->findAll();
        echo $data;
        // $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTM1NzAwMDAwMCwidWlkIjoiNCIsImVtYWlsIjoiemFraWxhZ2lpODhAZ21haWwuY29tIn0.SdMEme4La1UM8fwg1TIVwT2Ep4gMA9sCQ6SxyqVxfu0';
        // $client = new Client([
        //     'base_uri' => 'https://localhost:8080/me/',
        //     'headers' => ['Authorization' => "Bearer $token"]
        // ]);
        // $response = $client->request(
        //     'GET',
        //     'me',
        //     ['headers', 'http_error' => false]
        // );
        // echo $response->getBody()->getContents();
    }
    public function show($id = null)
    {

        $data = $this->model->findAll();
        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound("Data tidak ditemukan untuk id $id");
        }
    }


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
        $data = $this->request->getPost();
        // $data = [
        //     'name' => $this->request->getVar('name'),
        //     'email' => $this->request->getVar('email'),
        // ];
        // $this->model->save($data);
        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }
        $response = [
            'status' => 201,
            'error' => null,
            'message' => [
                'success' => 'berhasil memasukkan data'
            ]
        ];
        return $this->respond($response);
    }

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
        $data = $this->request->getRawInput();
        $data['id'] = $id;
        $isExist = $this->model->where('id', $id)->findAll();
        if (!$isExist) {
            return $this->failNotFound("Data tidak ditemukan untuk id $id");
        }

        if (!$this->model->save($data)) { //error saat save
            return $this->fail($this->model->errors());
        }
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => "Data member dengan id $id berhasil di update"
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $data = $this->model->where('id', $id)->findAll();
        if ($data) {
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => "Data member berhasil dihapus"
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}