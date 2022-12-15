<?= $this->extend('template/index'); ?>
<?= $this->section('page-content'); ?>
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
                    <tbody>
                        <?php foreach ($mhs as $val) { ?>
                        <tr>
                            <td><?php echo $val["id"] ?></td>
                            <td><?php echo $val["nama"] ?></td>
                            <td><?php echo $val['nim'] ?></td>
                            <td><?php echo $val['jurusan'] ?></td>
                            <td>
                                <!-- <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#inlineForm">
                                    Launch Modal
                                </button> -->
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#inlineForm">
                                    Tambah
                                </button>

                                <!--login form Modal -->
                                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Login Form </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form method="POST">
                                                <div class="modal-body">
                                                    <!-- <label>ID : </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="id" name="id"
                                                            class="form-control">
                                                    </div> -->
                                                    <label>Nama : </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="nama" name="nama"
                                                            class="form-control">
                                                    </div>
                                                    <label>NIM : </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="nim" name="nim"
                                                            class="form-control">
                                                    </div>
                                                    <label>Jurusan : </label>
                                                    <select class="form-select" name="jurusan" id="basicSelect">
                                                        <option value="Komputasi Statistik">Komputasi Statistik</option>
                                                        <option value="Statistika">Statistika</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button> -->
                                                    <button type="button" class="btn btn-primary ml-1"
                                                        data-bs-dismiss="modal" name="simpan">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Simpan</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- <a href="" class="btn icon btn-primary"><i
                                class="bi bi-pencil"></i></a> -->
                                <a href="<?= base_url('') ?>/rest/<?php echo $val['id'] ?>"
                                    class="btn icon btn-danger"><i class="bi bi-x"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<?= $this->endSection(); ?>