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
                <li class="nav-item active">
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
        <div class="row">
            <?php for ($i = 0; $i < count($products); $i++): ?>
                <div class="col-sm-4 col-md-3">
                    <div class="card">
                        <img src="<?= $products[$i]['picture'] ?>" 
                             class="card-img-top" 
                             alt="<?= $products[$i]['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $products[$i]['name'] ?></h5>
                            <p class="card-text"><?= $products[$i]['description'] ?></p>
                            <div class="btn-group text-center" role="group" aria-label="Basic example">
                                <?= form_open('dashboard/products/delete') ?>
                                    <input type="hidden" name="id" value="<?= $products[$i]['pid'] ?>"/>
                                    <input type="hidden" name="redirect" value="<?= uri_string() ?>"/>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                <?= form_close() ?>
                                <a class="btn btn-primary">Edit</a>
                                <a href="<?= base_url('order/product/' . $products[$i]['pid']) ?>" class="btn btn-info">Order</a>
                            </div>
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