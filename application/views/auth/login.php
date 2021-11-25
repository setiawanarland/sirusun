<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SIRUSUN</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/assets-page/'); ?>img/jpt.png">
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100 bg">
        <div class="overlay">
            <div class="container-fluid h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-4">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <img src="<?= base_url('assets/assets-page/'); ?>img/jpt.png" alt="" width="40%" class="figure-img img-fluid rounded mx-auto d-block">
                                        <h4 class="text-center text-white mb-4">SIRUSUN <br> Disperkimtan Kab. Jeneponto</h4>
                                        <?= $this->session->flashdata('message'); ?>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label class="text-white">Username</label>
                                                <input type="text" id="username" name="username" class="form-control" value="<?= set_value('username'); ?>" autofocus>
                                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-white">Password</label>
                                                <input type="password" id="password" name="password" class="form-control">
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                            </div>
                                        </form>
                                        <div class="text-center mt-4">
                                            <label class="text-white text-center">Copyright @2021 Disperkimtan Kab. Jeneponto. <br> All rights reserved.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('assets/'); ?>vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/quixnav-init.js"></script>
    <script src="<?= base_url('assets/'); ?>js/custom.min.js"></script>

</body>

</html>