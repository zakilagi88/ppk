<?php

namespace App\Controllers;

require __DIR__ . '/../../vendor/autoload.php';

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MahasiswaModel;
use Firebase\JWT\JWT;

class Login extends ResourceController
{
  /**
   * Return an array of resource objects,themselves in array format
   *
   * @return mixed
   */
  use ResponseTrait;
  public function index()
  {
    helper(['form']);
    $rules =
      [
        'email' => 'required|valid_email',
        'password' => 'required|min_length[6]'
      ];
    if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
    $model = new MahasiswaModel();
    // $model->getMahasiswaModel();
    $user = $model->where("email", $this->request->getVar('email'))->first();
    if (!$user) return $this->failNotFound('Email Tidak Ditemukan');

    $verify = password_verify($this->request->getVar('password'), $user['password']);
    if (!$verify) return $this->fail('Password Anda Salah');
    $key = getenv('TOKEN_SECRET');
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

    $token = JWT::encode($payload, $key, 'HS256');

    $response = [
      'status' => 200,
      'token' => $token
    ];
    return $this->respond($response);
  }
}