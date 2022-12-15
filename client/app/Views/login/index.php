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

        <div class="row">
            <div class="col-lg-5 col-12" style="background:#1E1E2D;">
                <div id="auth-left">
                    <!-- <div class="auth-logo" style="margin-bottom:1rem ;">
                        <a href="index.html"><img style="height:5rem;"
                                src="<?= base_url(); ?>/dashboard/assets/images/logo/ball2.svg" alt="Logo"></a>
                    </div> -->
                    <h1 class="auth-title">Log in.</h1>
                    <!-- <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p> -->
                    <?php if (session()->getFlashdata('gagal_login')) :
                    ?>

                    <?php $msg = session()->getFlashdata('gagal_login'); ?>
                    <?php foreach ($msg['messages'] as $val) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo ($val) ?>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <form action="<?= base_url('login/process'); ?>" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="email" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl"
                                placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log
                            in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Belum punya akun?
                            <br><a href="<?= base_url(); ?>/register" class="font-bold">Sign
                                up</a>.
                        </p>
                        <!-- <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block" style="background:#25396F">
                <!-- <div id="auth-right" style="background-color:#25396F">

                </div> -->
            </div>
        </div>


</body>

</html>