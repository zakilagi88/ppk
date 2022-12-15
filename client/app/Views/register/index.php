<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/dashboard/assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/dashboard/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/dashboard/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(); ?>/dashboard/assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12" style="background:#1E1E2D; zoom:90%">
                <div id="auth-left">
                    <!-- <div class="auth-logo">
                        <a href="index.html"><img src="/dashboard/assets/images/logo/logo.svg"
                                alt="Logo"></a>
                    </div> -->
                    <h1 class="auth-title mb-5">Register</h1>

                    <!-- <p class="auth-subtitle mb-5">Input your data to register to our website.</p> -->
                    <?php if (session()->getFlashdata('gagal_register')) :
                    ?>

                    <?php $msg = session()->getFlashdata('gagal_register'); ?>
                    <?php foreach ($msg['messages'] as $val) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo ($val) ?>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>

                    <form action="register/process" method="POST" data-parsley-validate>
                        <div class="form-group position-relative has-icon-left mb-4 mandatory ">
                            <input type="text" name="nama" class="form-control form-control-xl" placeholder="Nama"
                                data-parsley-required="true">
                            <label for="nama" class="form-label" hidden>Nama</label>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4 mandatory ">
                            <input type="text" name="nim" class="form-control form-control-xl" placeholder="Nim"
                                data-parsley-required="true">
                            <label for="nim" class="form-label" hidden>Nim</label>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4 mandatory">
                            <input type="text" name="email" class="form-control form-control-xl " placeholder="Email"
                                data-parsley-required="true">
                            <label for="email" class="form-label" hidden>email</label>
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4 mandatory">
                            <input type="password" name="password" class="form-control form-control-xl"
                                placeholder="Password" data-parsley-required="true">
                            <label for="password" class="form-label" hidden>password</label>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4 mandatory">
                            <input type="password" name="cpassword" class="form-control form-control-xl"
                                placeholder="Confirm Password" data-parsley-required="true">
                            <label for="cpassword" class="form-label" hidden>confirm password</label>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="auth-login.html"
                                class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block" style="background:#25396F">
                <!-- <div id="auth-right">

                </div> -->
            </div>
        </div>

    </div>
    <script src="<?= base_url(); ?>/dashboard/assets/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>/dashboard/assets/js/app.js"></script>
    <script src="<?= base_url(); ?>/dashboard/assets/extensions/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/dashboard/assets/extensions/parsleyjs/parsley.min.js"></script>
    <script src="<?= base_url(); ?>/dashboard/assets/js/pages/parsley.js"></script>
</body>

</html>