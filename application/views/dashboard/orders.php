<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <base href="<?= base_url() ?>">

    <title>Orders - Dashboard</title>

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
                        <h1 class="h3 mb-0 text-gray-800"><span class="fas fa-ticket-alt"></span> Orders</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php for ($i = 0; $i < count($orders); $i++): ?>
                            <div class="col-sm-8 col-md-6 col-lg-4 mb-4">
                                <div class="card">
                                    <img src="<?= $orders[$i]['picture'] ?>"
                                         class="card-img-top col-sm-8 col-md-6 offset-sm-2 offset-md-3"
                                         alt="<?= $orders[$i]['name'] ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= word_limiter($orders[$i]['product_name'], 10) ?></h5>
                                        <ul class="list-group list-group-flush small">
                                            <li class="list-group-item" title="Client name and surname">
                                                <span class="fas fa-user"></span> <?= $orders[$i]['name'] . ' ' . $orders[$i]['surname'] ?>
                                            </li>
                                            <li class="list-group-item" title="Client phone numbers">
                                                <a href="tel:<?= $orders[$i]['phone_number'] ?>">
                                                    <span class="fas fa-phone-alt"></span> <?= $orders[$i]['phone_number'] ?>
                                                </a>
                                            </li>
                                            <?php if ($orders[$i]['email']): ?>
                                                <li class="list-group-item" title="Client email address">
                                                    <a href="mailTo:<?= $orders[$i]['email'] ?>">
                                                        <span class="fas fa-envelope"></span> <?= $orders[$i]['email'] ?>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <li class="list-group-item" title="Product Price">
                                                <span class="fas fa-money-bill-wave-alt"></span> R<?= $orders[$i]['price'] ?>
                                            </li>
                                        </ul>
                                        <div class="btn-group pt-4" role="group" aria-label="Basic example">
                                            <button type="button"
                                                    class="btn btn-outline-danger deleteOrderBtn"
                                                    data-toggle="modal" 
                                                    data-target="#deleteOrderModal"
                                                    value="<?= $orders[$i]['oid'] ?>">
                                                <span class="fas fa-trash"></span> Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <div class="row pt-3 pb-3">
                        <div class="col-sm-12 col-md-6 offset-md-3">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <?= $this->pagination->create_links() ?>
                            </div>
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
    <div class="modal fade" id="deleteOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel"><span class="fas fa-trash"></span> Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure your want to delete "Order" click delete to confirm.</div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <?= form_open('dashboard/orders/delete', ['class' => 'model-footer']) ?>
                        <input type="hidden" name="id" value="" id="deleteOrderInput">
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
            $('.deleteOrderBtn').click(function() {
                $('#deleteOrderInput').val($(this).val());
            });
        });

    </script>

</body>

</html>