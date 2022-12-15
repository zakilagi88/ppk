<?= $this->extend('template/index'); ?>
<?= $this->section('page-content'); ?>
<?php
// helper(['restclient']);
// $url = "http://localhost:8012/jwt_app/jekz/public/mahasiswa";
// $data = [];
// $response = akses_restapi('GET', $url, $data);
// echo $response;
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Mahasiswa</h3>
                <p class="text-subtitle text-muted">Apa ya gmana ya</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Tabel Mahasiswa
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Jurusan</th>
                            <th>Status</th>
                        </tr>

                    </thead>
                    <tbody id="tempat_data">

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <!-- <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#inlineForm">
                                    Launch Modal
                                </button> -->
                                <!-- <a action="#" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
                                <a href="#" class="btn icon btn-danger"><i class="bi bi-x"></i></a> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<?= $this->endSection(); ?>