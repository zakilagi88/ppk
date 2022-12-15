<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Profile extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        helper('restclient');
        $url = "http://localhost/restapi/server/public/userme";
        $data = [
            'title' => 'Profile',
            'user' => akses_api('GET', $url, [])
        ];
        return view('profile/index', $data);
    }

    public function update($id = null)
    {
        $id = $this->request->getVar('kode');
        helper('restclient');
        $url = "http://localhost/restapi/server/public/userme/" . $id;
        $data = [
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'email' => $this->request->getVar('email'),
            'kelas' => $this->request->getVar('kelas'),
            'angkatan' => $this->request->getVar('angkatan'),
            'alamat' => $this->request->getVar('alamat'),
        ];
        $result = akses_api('PATCH', $url, $data);
        session()->setFlashdata('pesan', 'Profile berhasil diperbarui');

        $model = new MahasiswaModel();
        // $model->getMahasiswaModel();
        $user = $model->where('id', $id)->first();
        $Key = getenv('TOKEN_SECRET');
        $payload = array(
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "id" => $user['id'],
            "email" => $user['email'],
            "nim" => $user['nim'],
            "password" => $user['password'],
            "cpassword" => $user['cpassword'],
            "role" => $user['role'],
            "nama" => $user['nama'],
            "kelas" => $user['kelas'],
            "angkatan" => $user['angkatan'],
            "alamat" => $user['alamat']
        );

        $token = JWT::encode($payload, $Key, 'HS256');
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Profile berhasil diperbarui.'
            ],
            'token' => $token
        ];
        $responsex = $this->respondCreated($response);
        session()->set('token', $result['token']);

        $client = \Config\Services::curlrequest();
        $url = "http://localhost/restapi/server/public/userme";
        $response = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Bearer' . session()->get('token')
            ],
            'http_errors' => false
        ]);
        $user = json_decode($response->getBody(), true);
        session()->set('user', $user);
        // return view('profile/index');
        session()->setFlashdata('updated', json_decode($responsex->getBody(),true));    
        return redirect()->to('/profile');
    }
}