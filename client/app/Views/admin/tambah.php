<?= $this->extend('template/index'); ?>
<?php
// if (isset($_POST['simpan'])) {

//     $id = $_POST['id'];
//     $nama = $_POST['nama'];
//     $nim = $_POST['nim'];
//     $jurusan = $_POST['jurusan'];

//     //membuat data array data yang kirim
//     $data = array(
//         'id' => $id,
//         'nama' => $nama,
//         'nim' => $nim,
//         'jurusan' => $jurusan,
//     );

//     //url untuk tambah data
//     $url = "http://localhost:8012/jwt_app/jekz/public/mahasiswa";
//     helper(['restclient']);
//     //menyimpan hasil dalam variabel
//     $hasil = http_request_post($url, $data);
//     //memunculkan pesan 
//     var_dump($hasil);
// } 
?>
<?= $this->section('page-content'); ?>
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Mahasiswa</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Nama</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="nama" id="nama"
                                                    name="nama">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="form-group has-icon-left">
                                            <label for="email-id-icon">Email</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="nim" name="nim"
                                                    id="nim">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label">Mobile</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="jurusan" id="basicSelect">
                                                    <option value="Komputasi Statistik">Komputasi Statistik</option>
                                                    <option value="Statistika">Statistika</option>
                                                </select>
                                            </fieldset>
                                            </select>

                                    </div>
                                    <!-- <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control" placeholder="Password"
                                                    id="password-id-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-12">
                                        <div class='form-check'>
                                            <div class="checkbox mt-2">
                                                <input type="checkbox" id="remember-me-v" class='form-check-input'
                                                    checked>
                                                <label for="remember-me-v">Remember Me</label>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" name="simpan"
                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                        <!-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>