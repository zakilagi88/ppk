<?php

namespace App\Controllers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;
use CodeIgniter\API\ResponseTrait;


require __DIR__ . '../../../vendor/autoload.php';

class RestClient extends BaseController
{

    public function index()
    {
        helper(['restclient']);
        $url = "http://localhost:8012/jwt_app/jekz/public/mahasiswa";
        $data = [];
        $response = akses_restapi('GET', $url, $data);
        echo $response;
        // $dataArray = json_decode($response, true);
    }
    public function create()
    {
        // return view('admin/index');
        if (isset($_POST['simpan'])) {
            // $id = $_POST['id'];
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $jurusan = $_POST['jurusan'];

            $url = "http://localhost:8012/jwt_app/jekz/public/mahasiswa";
            helper(['restclient']);
            //membuat data array data yang kirim
            $data = array(
                // 'id' => $id,
                'nama' => $nama,
                'nim' => $nim,
                'jurusan' => $jurusan,
            );

            //url untuk tambah data
            //menyimpan hasil dalam variabel
            $hasil = akses_restapi('POST', $url, $data);
            //memunculkan pesan 
            echo $hasil;
        }

        // helper(['restclient']);
        // $url = "http://localhost:8012/jwt_app/jekz/public/mahasiswa";
        // $data = [
        //     "nama" => $this->input->post('nama', true),
        //     "nim" => $this->input->post('nrp', true),
        //     "jurusan" => $this->input->post('email', true)
        // ];
        // $response = akses_restapi('POST', $url, $data);
        // $result = json_decode($response, true);
        // return $result;
    }
    public function delete($id)
    {
        helper(['restclient']);
        // $id = $_GET['id'];
        $url = "http://localhost:8012/jwt_app/jekz/public/mahasiswa/$id";
        $data = [];
        $response = akses_restapi('DELETE', $url, $data);
        echo $response;
    }
}