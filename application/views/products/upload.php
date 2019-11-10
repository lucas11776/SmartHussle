<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <base href="<?= base_url() ?>">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="assets/dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/dashboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->load->view('templates/sidebar', [], true) ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->load->view('templates/topbar', ['orders' => $number_orders, 'messages' => $number_messages], true) ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            <span class="fas fa-shopping-bag"></span> Upload Product
                        </h1>
                    </div>

                    <!-- Content Row -->
                    <?= form_open(uri_string(), ['class' => 'row pt-3 col-md-8 col-lg-6 offset-md-2 offset-lg-3']) ?>

                        <div class="col-12">
                            <?php if ($this->session->flashdata('form_error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i><span class="fa fa-server"></span> <?= $this->session->flashdata('form_error') ?></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('form_success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i><span class="fa fa-server"></span> <?= $this->session->flashdata('form_success') ?></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Picture -->
                        <div class="form-group col-12">
                            <label for="picture"><span class="fa fa-image"></span> Product Picture</label>
                            <input type="file"
                                   name="picture"
                                   class="form-control-file <?= form_error('picture','','') ? 'is-invalid' : '' ?>" 
                                   id="picture">
                            <?= form_error('picture') ?></p>
                        </div>

                        <!-- Name -->
                        <div class="form-group col-12">
                            <label for="name"><span class="fa fa-shopping-bag"></span> Product Name</label>
                            <input type="text"
                                   name="name" 
                                   class="form-control form-control-lg <?= form_error('name','','') ? 'is-invalid' : '' ?>" 
                                   id="name" 
                                   value="<?= set_value('name') ?>"
                                   placeholder="Product Name...">
                            <?= form_error('name') ?>
                        </div>

                        <!-- Price -->
                        <div class="form-group col-12">
                            <label for="price"><span class="fa fa-money-bill-alt"></span> Price</label>
                            <input type="text"
                                   name="price"
                                   class="form-control form-control-lg <?= form_error('price','','') ? 'is-invalid' : '' ?>" 
                                   id="price" 
                                   value="<?= set_value('price') ?>"
                                   placeholder="Price (Rands)...">
                            <?= form_error('price') ?>
                        </div>

                        <!-- Category -->
                        <div class="form-group col-12">
                            <label for="category"><span class="fa fa-store-alt"></span> Category</label>
                            <select type="text"
                                    name="category"
                                    class="form-control form-control-lg text-capitalize <?= form_error('category','','') ? 'is-invalid' : '' ?>" 
                                    id="category">
                                <option value="<?= set_value('category') ?>">
                                    <?= set_value('category') ? set_value('category') : '--- Select Product Category ---' ?></option>
                                <?php for($i = 0; $i < count($categories); $i++): ?>
                                    <option value="<?= $categories[$i]['slug'] ?>"><?= $categories[$i]['name'] ?></option>
                                <?php endfor; ?>
                            </select>
                            <?= form_error('category') ?>
                        </div>

                        <!-- Description -->
                        <div class="form-group col-12">
                            <label for="description"><span class="fa fa-paperclip"></span> Description</label>
                            <textarea name="description"
                                      class="form-control form-control-lg <?= form_error('description','','') ? 'is-invalid' : '' ?>" 
                                      id="description"
                                      placeholder="Product Description..." rows="4"><?= set_value('description') ?></textarea>
                            <?= form_error('description') ?>
                        </div>

                        <div class="form-group col-12 mt-4 mb-5">
                            <button type="submit" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </span>
                                <span class="text">
                                    Upload Product
                                </span>
                            </button>
                        </div>

                    <?= form_close() ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SmartHussle 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('logout') ?>">Logout</a>
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

    <!-- Page level plugins -->

    <!-- Page level custom scripts -->

</body>

</html>