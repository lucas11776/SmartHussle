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
            <?php for ($i = 0; $i < count($messages); $i++): ?>
                <div class="col-lg-12">
                    <div class="card p-3">
                        <h3><?= $messages[$i]['subject'] ?></h3>
                        <ul class="list-unstyled list-inline">
                            <li><?= $messages[$i]['name'] ?></li>
                            <li><?= $messages[$i]['surname'] ?></li>
                            <li><?= $messages[$i]['email'] ?><li>
                            <li><?= $messages[$i]['phone_number'] ?></li>
                        </ul>
                        <p><?= $messages[$i]['message'] ?></p>
                        <div class="btn-group">
                            <?= form_open('dashboard/messages/delete') ?>
                                <input type="hidden" name="id" value="<?= $messages[$i]['mid'] ?>">
                                <input type="hidden" name="redirect" value="<?= uri_string() ?>">
                                <button class="btn btn-danger">Delete</button>
                            <?= form_close() ?>
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