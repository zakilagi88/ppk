<link rel="stylesheet" href="<?= base_url() ?>/dashboard/assets/css/widgets/chat.css">
<?= $this->extend('template/index'); ?>
<?= $this->section('page-content'); ?>
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="media d-flex align-items-center">
                        <div class="avatar me-3">
                            <img src="<?= base_url() ?>/dashboard/assets/images/faces/1.jpg" alt="" srcset="">
                            <span class="avatar-status bg-success"></span>
                        </div>
                        <div class="name flex-grow-1">
                            <h6 class="mb-0"><?= $user['nama']; ?></h6>
                            <span class="text-xs">Online</span>
                        </div>
                        <button class="btn btn-sm">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body pt-4 bg-grey">
                    <?php if (session()->getFlashdata('updated')) :
                    ?>

                    <?php $msg = session()->getFlashdata('updated'); ?>
                    <?php foreach ($msg['messages'] as $val) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo ($val) ?>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <form class="form" method="POST" action="<?= base_url('profile/update/' . $user['id']); ?>">
                        <input type="hidden" name="kode" value="<?= $user['id']; ?>">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Nama</label>
                                    <input type="text" id="first-name-column" class="form-control" placeholder="Nama"
                                        name="nama" value="<?= $user['nama']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">NIM</label>
                                    <input type="text" id="last-name-column" class="form-control" readonly="true"
                                        placeholder="NIM" name="nim" value="<?= $user['nim']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="city-column">Email</label>
                                    <input type="text" id="city-column" class="form-control" placeholder="Email"
                                        name="email" value="<?= $user['email']; ?>">
                                </div>
                            </div>
                            <!-- <input type="password" value="NULL" hidden> -->
                            <!-- <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="country-floating">Password</label>
                                    <input type="password" id="country-floating" class="form-control" name="password"
                                        placeholder="" value="<?= null ?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="company-column">ConfirmPassword</label>
                                    <input type="password" id="company-column" class="form-control" name="cpassword"
                                        placeholder="">
                                </div>
                            </div> -->

                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Kelas</label>
                                    <input type="text" id="email-id-column" class="form-control" name="kelas"
                                        placeholder="kelas" value="<?= $user['kelas']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="angkatan">Angkatan</label>
                                    <input type="angkatan" id="email-id-column" class="form-control" name="angkatan"
                                        placeholder="angkatan" value="<?= $user['angkatan']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="alamat" id="email-id-column" class="form-control" name="alamat"
                                        placeholder="alamat" value="<?= $user['alamat']; ?>">
                                </div>
                            </div>
                            <!-- <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Role</label>
                                    <input type="email" id="email-id-column" class="form-control" name="role"
                                        placeholder="role" readonly="true">
                                </div>
                            </div> -->
                            <div class="col-md-12 d-flex justify-content-center text-center">
                                <div class="form-group">
                                    <label for="email-id-column">Role</label>
                                    <input type="text" id="email-id-column" class="form-control" name="role"
                                        placeholder="role" readonly="true" value="<?= $user['role']; ?>">
                                </div>
                            </div>
                            <!-- <div class="form-group col-12">
                                <div class='form-check'>
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox5" class='form-check-input' checked>
                                        <label for="checkbox5">Remember Me</label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>