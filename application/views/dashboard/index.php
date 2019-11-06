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
                    <a class="nav-link" href="<?= base_url('dashboard') ?>">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard/products') ?>">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard/orders') ?>">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard/messages') ?>">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard/users') ?>">Users</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6 pb-3 pt-3">
                <h1>Products</h1>
                <h3><?= $number_products ?></h3>
            </div>
            <div class="col-sm-6 pb-3 pt-3">
                <h1>Orders</h1>
                <h3><?= $number_orders ?></h3>
            </div>
            <div class="col-sm-6 pb-3 pt-3">
                <h1>Message</h1>
                <h3><?= $number_messages ?></h3>
            </div>
            <div class="col-sm-6 pb-3 pt-3">
                <h1>Users</h1>
                <h3><?= $number_users ?></h3>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>