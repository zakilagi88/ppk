<?php

use App\Models\MahasiswaModel;

function akses_restapi($method, $url, $data)
{
    $client = \Config\Services::curlrequest();
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTM1NzAwMDAwMCwidWlkIjoiNSIsImVtYWlsIjoiY29iYWxhZ2lAZ21haWwuY29tIn0.VOth1nYckn_ptZPHGQkZX7JzIQz4bXI8xqokIAm2YdY';
    // $url = "http://localhost:8012/jwt_app/appstarter/public/me";
    $headers = ['Authorization' => "Bearer " . $token];
    $response = $client->request(
        $method,
        $url,
        [
            'headers' => $headers, 'Accept' => 'application/json', 'http_error' => false, 'form_params' => $data
        ]
    );
    return $response->getBody();
}