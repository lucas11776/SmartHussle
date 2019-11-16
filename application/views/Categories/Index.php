<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <base href="<?= base_url() ?>">

    <title>Products Categories - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="assets/dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800"><span class="fas fa-store"></span> Categories</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-sm-6 col-md-4 offset-sm-3 offset-md-4">
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
                            <?= form_open('dashboard/categories/add') ?>
                                <div class="input-group mb-3">
                                    <input name="name" 
                                           type="text" 
                                           class="form-control form-control-lg <?= form_error('name') ? 'is-invalid' : '' ?>" 
                                           placeholder="Add Category..."
                                           aria-label="Recipient's username" 
                                           aria-describedby="basic-addon2"
                                           value="<?= set_value('name') ?>">
                                    <div class="input-group-append">
                                        <button class="input-group-text text-uppercase" id="basic-addon2">
                                            <strong>Add +</strong>
                                        </button>
                                    </div>
                                    <?= form_error('name') ?>
                                </div>
                            <?= form_close() ?>
                            <ul class="list-group">
                                <?php for ($i = 0; $i < count($categories); $i++): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?= array_values($categories)[$i]['name'] ?>
                                        <button class="badge badge-danger btn-circle badge-pill deleteCategoryBtn"
                                                data-toggle="modal" 
                                                data-target="#deleteCategoryModal"
                                                value="<?= $categories[$i]['cid'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                    </div>

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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <!-- Delete Category Modal -->
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel"><span class="fas fa-trash"></span> Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure your want to delete "Product Category" click delete to confirm.</div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <?= form_open('dashboard/categories/delete', ['class' => 'model-footer']) ?>
                        <input type="hidden" name="id" value="" id="deleteCategoryInput">
                        <input type="hidden" name="redirect" value="<?= uri_string() ?>">
                        <button class="btn btn-danger" type="submit">
                            <span class="fas fa-trash-o"></span> Delete
                        </button>
                    <?= form_close() ?>
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

    <!-- Custom Javascript -->
    <script>

        $(document).ready(function() {
            $('.deleteCategoryBtn').click(function() {
                $('#deleteCategoryInput').val($(this).val());
            });
        });

    </script>

</body>

</html>