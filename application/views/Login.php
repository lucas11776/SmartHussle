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
                <li class="nav-item active">
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
        <div class="col-sm-6 offset-sm-3 col-md-4 offset-md-4">
            <?php echo validation_errors(); ?>
            <?= form_open(uri_string()) ?>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="username">Username</label>
                        <input type="text"
                               name="username"
                               class="form-control" 
                               id="username" 
                               placeholder="Username ..." 
                               value="<?= set_value('username') ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password">Email Address</label>
                        <input type="password" 
                               name="password"
                               class="form-control" 
                               id="password" 
                               placeholder="Password ..."
                               value="<?= set_value('password') ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            <?= form_close() ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>