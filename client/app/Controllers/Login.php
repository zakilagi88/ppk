<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        echo view('Login/index');
    }

    public function process()
    {
        // session_start();
        $client = \Config\Services::curlrequest();
        $url = "http://localhost/restapi/server/public/login";

        $form_params = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];
        // akses_api('POST', $url, $data);
        $response = $client->request('POST', $url, ['http_errors' => false, 'form_params' => $form_params]);
        $result = json_decode($response->getBody(), true);
        if ($result['status'] == 200) {
            session()->set('token', $result['token']);
            return redirect()->to(base_url('mahasiswa/index'));
        } else {
            session()->setFlashdata('gagal_login', $result);
            return redirect()->to(base_url('login/index'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}