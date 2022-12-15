<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        return view('register/index');
    }

    public function process()
    {
        $client = \Config\Services::curlrequest();
        $url = "http://localhost/restapi/server/public/register";

        $form_params = [
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'cpassword' => $this->request->getVar('cpassword')
        ];
        // akses_api('POST', $url, $data);
        $response = $client->request('POST', $url, ['http_errors' => false, 'form_params' => $form_params]);
        // $response->getBody();
        $result = json_decode($response->getBody(), true);
        // dd($result);
        if ($result['status'] == 200) {
            session()->setFlashdata('register', 'Berhasil membuat akun');
            return redirect()->to(base_url('login'));
        } else {
            session()->setFlashdata('gagal_register', $result);
            return redirect()->to(base_url('register'));
        }
    }
    // public function logout()
    // {
    //     session()->destroy();
    //     return redirect()->to('/login');
    // }
}