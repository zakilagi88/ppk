<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/dashboard/assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>/dashboard/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="<?= base_url() ?>/dashboard/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>/dashboard/assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?= base_url() ?>/dashboard/assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/dashboard/assets/css/pages/simple-datatables.css">

</head>

<body>
    <div id="app">
        <?= $this->include('template/sidebar'); ?>
        <div id="main">
            <?= $this->include('template/header'); ?>
            <?= $this->renderSection('page-content'); ?>
            <?= $this->include('template/footer'); ?>


        </div>
    </div>
    <script src="<?= base_url() ?>/dashboard/assets/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>/dashboard/assets/js/app.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script> -->
    <script type="text/javascript" src="<?= base_url() ?>/dashboard/assets/js/script.js"></script>

    <script src="<?= base_url() ?>/dashboard/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="<?= base_url() ?>/dashboard/assets/js/pages/simple-datatables.js"></script>

</body>

</html>