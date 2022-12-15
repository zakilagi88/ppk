<?php

use App\Models\ModelOtentikasi;
use App\Models\UserModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use CodeIgniter\HTTP\RequestInterface;

function getJWT($otentikasiHeader)
{
    if (is_null($otentikasiHeader)) {
        return Services::response()->setJSON(['msg' => 'Token Required'])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
    }
    return explode(" ", $otentikasiHeader)[1];
}

function createJWT($email)
{
    $key = getenv('TOKEN_SECRET');
    $waktuRequest = time();
    $waktuToken = getenv('TOKEN_TIME');
    $waktuExpired = $waktuRequest + $waktuToken;
    $payload = [
        'email' => $email,
        'iat' => $waktuRequest,
        'exp' => $waktuExpired
    ];
    $jwt = JWT::encode($payload, $key, 'HS256');
    return $jwt;
}