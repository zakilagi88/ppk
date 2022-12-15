<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MahasiswaModel;

class Register extends ResourceController
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
        'nama' => 'required',
        'nim' => 'required|is_unique[tbl_users.nim]|min_length[9]|is_unique[tbl_users.nim]',
        'email' => 'required|valid_email|is_unique[tbl_users.email]',
        'password' => 'required|min_length[6]',
        'cpassword' => 'matches[password]'
      ];
    $errors =
      [   // Errors
        'email' => [
          'is_unique' => 'Email telah digunakan',
        ],
        'password' => [
          'min_length' => 'Password terlalu pendek min 8 karakter',
        ],
        'nim' => [
          'is_unique' => 'NIM telah ada',
        ]
      ];
    if (!$this->validate($rules, $errors)) return $this->fail($this->validator->getErrors());
      $data = [
        'nama' => $this->request->getVar('nama'),
        'nim' => $this->request->getVar('nim'),
        'email' => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        'cpassword' => password_hash($this->request->getVar('cpassword'), PASSWORD_BCRYPT)
      ];
      $model = new MahasiswaModel();
      $registered = $model->save($data);
      $this->respondCreated($registered, 'Registrasi Berhasil');
      $response = [
        'status' => 200,
        'error' => null,
        'messages' => [
          'success' => 'Register Berhasil'
        ]
      ];
      return $this->respond($response);
    } 
  };