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

    <div class="container pt-5 pb-5">
        <div class="col-md-8 offset-md-2">
            <?php echo validation_errors(); ?>
            <?php if ($this->session->flashdata('form_success')): ?>
                <div class="alert alert-success">
                    <i><?= $this->session->flashdata('form_success') ?></i>
                </div>
            <?php endif; ?>
            <?= form_open_multipart(uri_string()) ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="picture">Picture</label>
                        <input type="file"
                               name="picture"
                               class="form-control" 
                               id="picture" 
                               placeholder="picture ..." 
                               value="<?= set_value('picture') ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Product Name</label>
                        <input type="eamil" 
                               name="name"
                               class="form-control" 
                               id="name" 
                               placeholder="name ..."
                               value="<?= set_value('name') ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="picture">Price</label>
                        <input type="price"
                               name="price"
                               class="form-control"
                               id="price"
                               placeholder="price ..."
                               value="<?= set_value('price') ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Category</label>
                        <select class="form-control" name="category">
                            <option value="<?= set_value('category') ?>">Select Category</option>
                            <?php for ($i = 0; $i < count($categories); $i++): ?>
                                <option value="<?= array_values($categories)[$i]['slug'] ?>">
                                    <?= array_values($categories)[$i]['name'] ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="picture">Decription</label>
                        <textarea class="form-control" rows="4" name="description"><?= set_value('description') ?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Register</button>
            <?= form_close() ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>