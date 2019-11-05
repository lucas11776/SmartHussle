<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <base href="<?= base_url() ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">

    <title>Smart Hussle</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SmartHussle</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('') ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('store') ?>">Store</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('contact') ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('register') ?>">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container pt-5">
        <div class="col-md-8 offset-md-2">
            <?php echo validation_errors(); ?>
            <?php if ($this->session->flashdata('form_error')): ?>
                <div class="alert alert-danger">
                    <i><?= $this->session->flashdata('form_error') ?></i>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('form_success')): ?>
                <div class="alert alert-success">
                    <i><?= $this->session->flashdata('form_success') ?></i>
                </div>
            <?php endif; ?>
            <?= form_open(uri_string()) ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text"
                               name="name"
                               class="form-control" 
                               id="name" 
                               placeholder="Name ..." 
                               value="<?= set_value('name') ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname">Surname</label>
                        <input type="text" 
                               name="surname"
                               class="form-control" 
                               id="surname" 
                               placeholder="Surname ..."
                               value="<?= set_value('surname') ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               id="email"
                               placeholder="Email Address ..."
                               value="<?= set_value('email') ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone-number">Phone Number</label>
                        <input type="text"
                               name="phone_number"
                               class="form-control"
                               id="phone-number"
                               placeholder="Phone Number ..."
                               value="<?= set_value('phone_number') ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Order</button>
            <?= form_close() ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>