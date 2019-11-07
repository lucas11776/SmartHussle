<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/dashboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container pt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">
                                    <strong><i class="fas fa-edit"></i> Register Now!</strong>
                                </h1>
                            </div>
                            <?= form_open(uri_string(), ['class' => 'user']) ?>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <?php if ($this->session->flashdata('form_error')): ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <small>
                                                    <strong><i class="fa fa-server"></i> <?= $this->session->flashdata('form_error') ?></strong>
                                                </small>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text"
                                               name="username"
                                               class="form-control form-control-user <?= form_error('username','','') ? 'is-invalid' : '' ?>"
                                               id="username"
                                               placeholder="Username..."
                                               value="<?= set_value('username') ?>">
                                        <?= form_error('username') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email"
                                               name="email"
                                               class="form-control form-control-user <?= form_error('email','','') ? 'is-invalid' : '' ?>"
                                               id="email" 
                                               aria-describedby="emailHelp"
                                               placeholder="Email Address..."
                                               value="<?= set_value('email') ?>">
                                        <?= form_error('email') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password"
                                               name="password"
                                               class="form-control form-control-user <?= form_error('password','','') ? 'is-invalid' : '' ?>"
                                               id="password"
                                               placeholder="Password..."
                                               value="<?= set_value('password') ?>">
                                        <?= form_error('password') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password"
                                               name="confirm_password"
                                               class="form-control form-control-user <?= form_error('confirm_password','','') ? 'is-invalid' : '' ?>"
                                               id="confirm-password"
                                               placeholder="Confirm Password..."
                                               value="<?= set_value('confirm_password') ?>">
                                        <?= form_error('confirm_password') ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            <?= form_close() ?>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('login') ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/dashboard/js/sb-admin-2.min.js"></script>

</body>

</html>