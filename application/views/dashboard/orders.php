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

    <div class="container pt-5 pb-5">
        <div class="row">
            <?php for ($i = 0; $i < count($orders); $i++): ?>
                <div class="col-sm-6 col-md-4">
                    <div class="card">
                        <div class="card-title">
                            <h5><?= $orders[$i]['product_name'] ?></h5>
                        </div>
                        <div class="card-img">
                            <img src="<?= $orders[$i]['picture'] ?>" class="img-thumbnail">
                        </div>
                        <div class="card-text">
                            <ul class="list-unstyled list-inline">
                                <li><?= $orders[$i]['name'] ?></li>
                                <li><?= $orders[$i]['surname'] ?></li>
                                <li><?= $orders[$i]['email'] ?></li>
                                <li><?= $orders[$i]['phone_number'] ?></li>
                            </ul>
                            <br/>
                            <?= form_open('dashboard/orders/delete', ['class' => 'text-center']) ?>
                                <input name="id" type="hidden" value="<?= $orders[$i]['oid'] ?>">
                                <input name="redirect" type="hidden" value="<?= uri_string() ?>">
                                <button type="submit" class="btn btn-danger">Delete Order</button>
                            <?= form_close() ?>
                            <br/>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>