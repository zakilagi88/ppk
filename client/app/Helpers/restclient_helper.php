<?php
function akses_api($method, $url, $data)
{
    $client = \Config\Services::curlrequest();
    $token = session()->get('token');
    // $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTM1NzAwMDAwMCwidWlkIjoiMSIsImVtYWlsIjoiemFraWxhZ2k4OEBnbWFpbC5jb20ifQ.o2JEPQZJQuPXHq_mNh-EfLXBPAPyWcDphfz1sx6Z5sQ";
    // $token = session()->get('token');

    $headers = [
        'Authorization' => 'Bearer ' . $token
    ];

    $response = $client->request($method, $url, [
        'headers' => $headers,
        'form_params' => $data,
        'http_errors' => false
    ]);

    $result = json_decode($response->getBody(), true);
    return $result;
}