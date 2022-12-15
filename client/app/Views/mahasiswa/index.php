<?= $this->extend('template/index'); ?>
<?= $this->section('page-content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Mahasiswa</h3>
                <p class="text-subtitle text-muted">Data pengguna</p>
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
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Kelas</th>
                            <th>Angkatan</th>
                            <th>Alamat</th>
                            <!-- <th>Aksi</th> -->
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        // dd($mahasiswa);
                        foreach ($mahasiswa as $data) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?php echo $data['nama'] ?></td>
                            <td><?php echo $data['nim'] ?></td>
                            <td><?php echo $data['kelas'] ?></td>
                            <td><?php echo $data['angkatan'] ?></td>
                            <td><?php echo $data['alamat'] ?></td>
                            <td>
                                <!-- <a href="" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#inlineForm<?= $data['id']; ?>"><i class="bi bi-pencil"></i></a> -->
                                <div class="modal fade text-left" id="inlineForm<?= $data['id']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Perbarui Data</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('mahasiswa/update'); ?>" method="POST">
                                                <input type="hidden" name="kode" value="<?= $data['id']; ?>">
                                                <div class="modal-body">
                                                    <!-- <label>ID : </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="id" name="id"
                                                            class="form-control">
                                                    </div> -->
                                                    <label>Nama</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="nama"
                                                            value="<?= $data['nama']; ?>" name="nama"
                                                            class="form-control" required="true">
                                                    </div>
                                                    <label>NIM</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="nim" name="nim"
                                                            value="<?= $data['nim']; ?>" class="form-control"
                                                            required="true">
                                                    </div>
                                                    <label>Kelas</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="kelas" name="kelas"
                                                            value="<?= $data['kelas']; ?>" class="form-control"
                                                            required="true">
                                                    </div>
                                                    <label>Angkatan</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="angkatan" name="angkatan"
                                                            value="<?= $data['angkatan']; ?>" class="form-control"
                                                            required="true">
                                                    </div>
                                                    <label>Alamat</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="alamat" name="alamat"
                                                            value="<?= $data['alamat']; ?>" class="form-control"
                                                            required="true">
                                                    </div>
                                                    <!-- <label>Jabatan</label>
                                                    <select class="form-select" name="jabatan"
                                                        value=">" id="basicSelect"
                                                        required="true">
                                                        <option dataue="ketua">Ketua
                                                        </option>
                                                        <option dataue="wakil">Wakil</option>
                                                        <option dataue="sekretaris">Sekretaris</option>
                                                        <option dataue="bendahara">Bendahara</option>
                                                        <option dataue="anggota">Anggota</option>
                                                    </select> -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="warning" type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Tutup</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1"
                                                        data-bs-dismiss="modal" name="simpan">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Update</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                        data-bs-target="#inlineForm">
                                    Launch Modal
                                </button> -->

                                <!-- <a href="" class="btn icon btn-primary"></a> -->
                                <!-- <a href="<?= base_url('mahasiswa/delete/' . $data['id']) ?>"
                                    class="btn btn-sm btn-danger"><i class="bi bi-x"></i></a> -->
                            </td>
                        </tr>
                        <?php $no++;
                        endforeach ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#inlineForm">
                    Tambah
                </button>

                <!--login form Modal -->
                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Anggota</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="<?= base_url('mahasiswa/create'); ?>" method="POST">
                                <div class="modal-body">
                                    <!-- <label>ID : </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="id" name="id"
                                                            class="form-control">
                                                    </div> -->
                                    <label>Nama</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="nama" name="nama" class="form-control"
                                            required="true">
                                    </div>
                                    <label>NIM</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="nim" name="nim" class="form-control"
                                            required="true">
                                    </div>
                                    <label>Kelas</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="kelas" name="kelas" class="form-control"
                                            required="true">
                                    </div>
                                    <label>Angkatan</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="angkatan" name="angkatan" class="form-control"
                                            required="true">
                                    </div>
                                    <label>Alamat</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="alamat" name="alamat" class="form-control"
                                            required="true">
                                    </div>
                                    <label>Avatar</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="avatar" name="avatar" class="form-control"
                                            required="true">
                                    </div>
                                    <!-- <label>Jabatan</label>
                                    <select class="form-select" name="jabatan" id="basicSelect" required="true">
                                        <option dataue="ketua">Ketua
                                        </option>
                                        <option dataue="wakil">Wakil</option>
                                        <option dataue="sekretaris">Sekretaris</option>
                                        <option dataue="bendahara">Bendahara</option>
                                        <option dataue="anggota">Anggota</option>
                                    </select> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button id="success" type="submit" class="btn btn-primary ml-1"
                                        data-bs-dismiss="modal" name="simpan">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Simpan</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<?= $this->endSection(); ?>

<script src="<?= base_url() ?>/dashboard/assets/extensions/sweetalert2/sweetalert2.min.js"></script>>
<script src="<?= base_url() ?>/dashboard/assets/js/pages/sweetalert2.js"></script>>