<link rel="stylesheet" href="<?= base_url() ?>/dashboard/assets/extensions/sweetalert2/sweetalert2.min.css">

<?= $this->extend('template/index'); ?>
<?= $this->section('page-content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Formulir Jersey Basket</h3>
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
                Tabel Jersey
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
                            <th>Jk</th>
                            <th>NoJersey</th>
                            <th>NamaJersey</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                            </th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jersey as $data) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?php echo $data["nama"] ?></td>
                            <td><?php echo $data['nim'] ?></td>
                            <td><?php echo $data['kelas'] ?></td>
                            <td><?php echo $data['angkatan'] ?></td>
                            <td><?php echo $data['jeniskelamin'] ?></td>
                            <td><?php echo $data['no_jersey'] ?></td>
                            <td><?php echo $data['nama_jersey'] ?></td>
                            <td><?php echo $data['keterangan'] ?></td>
                            <td>
                                <a href="" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#inlineForm<?= $data['id_jersey']; ?>"><i
                                        class="bi bi-pencil"></i></a>
                                <div class="modal fade text-left" id="inlineForm<?= $data['id_jersey']; ?>"
                                    tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Perbarui data</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('jersey/update'); ?>" method="POST">
                                                <input type="hidden" name="kode" dataue="<?= $data['id_jersey']; ?>">
                                                <div class="modal-body">
                                                    <!-- <label>ID : </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="id" name="id"
                                                            class="form-control">
                                                    </div> -->
                                                    <label>Nama</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="nama"
                                                            dataue="<?= $data['nama']; ?>" name="nama"
                                                            class="form-control">
                                                    </div>
                                                    <label>NIM</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="nim" name="nim"
                                                            dataue="<?= $data['nim']; ?>" class="form-control">
                                                    </div>
                                                    <label>Kelas</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="kelas" name="kelas"
                                                            dataue="<?= $data['kelas']; ?>" class="form-control">
                                                    </div>
                                                    <label>Angkatan</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="angkatan" name="angkatan"
                                                            dataue="<?= $data['angkatan']; ?>" class="form-control">
                                                    </div>
                                                    <label>Jeniskelamin</label>
                                                    <select class="form-select" name="jk"
                                                        dataue="<?= $data['jeniskelamin']; ?>" id="basicSelect">
                                                        <option dataue="laki-laki">laki-laki
                                                        </option>
                                                        <option dataue="perempuan">perempuan</option>
                                                    </select>
                                                    <label>No Jersey</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="no jersey" name="no_jersey"
                                                            dataue="<?= $data['no_jersey']; ?>" class="form-control">
                                                    </div>
                                                    <label>Nama Jersey</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="nama jersey" name="nama_jersey"
                                                            dataue="<?= $data['nama_jersey']; ?>" class="form-control">
                                                    </div>
                                                    <label>Keterangan</label>
                                                    <select class="form-select" name="keterangan"
                                                        dataue="<?= $data['keterangan']; ?>" id="basicSelect">
                                                        <option dataue="lunas">lunas</option>
                                                        <option dataue="belum bayar">belum bayar</option>
                                                        <option dataue="dp">dp</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
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
                                <a href="<?= base_url('jersey/delete/' . $data['id_jersey']) ?>"
                                    class="btn btn-sm btn-danger"><i class="bi bi-x"></i></a>
                            </td>
                        </tr>
                        <?php $no++;
                        endforeach ?>
                    </tbody>
                </table>
                <button id="success" type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#inlineForm">
                    Tambah
                </button>

                <!--form Modal -->
                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Anggota Baru</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="<?= base_url('jersey/create'); ?>" method="POST">
                                <div class="modal-body">
                                    <!-- <label>ID : </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="id" name="id"
                                                            class="form-control">
                                                    </div> -->
                                    <label>Nama</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="nama" name="nama" class="form-control">
                                    </div>
                                    <label>NIM</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="nim" name="nim" class="form-control">
                                    </div>
                                    <label>Kelas</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="kelas" name="kelas" class="form-control">
                                    </div>
                                    <label>Angkatan</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="angkatan" name="angkatan" class="form-control">
                                    </div>
                                    <label>Jeniskelamin</label>
                                    <select class="form-select" name="jk" dataue="<?= $data['jeniskelamin']; ?>"
                                        id="basicSelect">
                                        <option dataue="laki-laki">laki-laki
                                        </option>
                                        <option dataue="perempuan">perempuan</option>
                                    </select>
                                    <label>No Jersey</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="no jersey" name="no_jersey"
                                            dataue="<?= $data['no_jersey']; ?>" class="form-control">
                                    </div>
                                    <label>Nama Jersey</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="nama jersey" name="nama_jersey"
                                            dataue="<?= $data['nama_jersey']; ?>" class="form-control">
                                    </div>
                                    <label>Keterangan</label>
                                    <select class="form-select" name="keterangan" dataue="<?= $data['keterangan']; ?>"
                                        id="basicSelect">
                                        <option dataue="lunas">lunas</option>
                                        <option dataue="belum bayar">belum bayar</option>
                                        <option dataue="dp">dp</option>
                                    </select>
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
        <div class="col-md-4 col-12">
            <button id="success" class="btn btn-outline-success btn-lg btn-block">Success</button>

        </div>
        <div class="col-md-4 col-12">
            <button id="success1" class="btn btn-outline-success btn-lg btn-block">Success</button>
        </div>
    </section>
</div>
<script src="<?= base_url() ?>/dashboard/assets/extensions/sweetalert2/sweetalert2.min.js"></script>>

<?= $this->endSection(); ?>
<script>
document.getElementById('success').addEventListener('click', (e) => {
    Swal.fire({
        icon: "success",
        title: "Success"
    })
})
document.getElementById('success1').addEventListener('click', (e) => {
    Swal.fire({
        icon: "success",
        title: "Succes1"
    })
})
</script>