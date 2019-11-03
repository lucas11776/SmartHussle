<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
                    <a class="nav-link" href="<?= base_url('shop') ?>">Shop</a>
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
        <div class="col-sm-6 col-md-4 offset-sm-3 offset-md-4">
            <?php echo validation_errors(); ?>
            <?= form_open('dashboard/categories/add') ?>
                <div class="input-group mb-3">
                    <input name="name" type="text" class="form-control" placeholder="Add Product Category ..."
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="input-group-text" id="basic-addon2">Add Category</button>
                    </div>
                </div>
            <?= form_close() ?>
            <ul class="list-group">
                <?php for ($i = 0; $i < count($categories); $i++): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= array_values($categories)[$i]['name'] ?>
                        <?= form_open('dashboard/categories/delete') ?>
                            <input type="hidden" name="id" value="<?= array_values($categories)[$i]['cid'] ?>">
                            <input type="hidden" name="redirect" value="<?= uri_string() ?>">
                            <button class="badge badge-primary badge-pill">Delete</button>
                        <?= form_close() ?>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>