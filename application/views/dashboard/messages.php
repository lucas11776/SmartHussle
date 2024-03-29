<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <base href="<?= base_url() ?>">

    <title>Messages (<?= $number_messages ?>)</title>

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
                        <h1 class="h3 mb-0 text-gray-800"><span class="fas fa-envelope-open-text"></span> Messages</h1>
                    </div>

                    <!-- Content Row  -->
                    <div class="row">
                        <?php for ($i = 0; $i < count($messages); $i++): ?>
                            <div class="col-12 mb-4"> 
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-10 text-left">
                                                <h3><?= $messages[$i]['subject'] ?></h3>
                                            </div>
                                            <div class="col-2 text-right">
                                                <button class="btn btn-link p-0 m-0 deleteMessageBtn"
                                                        data-toggle="modal" 
                                                        data-target="#deleteMessageModal"
                                                        value="<?= $messages[$i]['mid'] ?>">
                                                    <span class="fa fa-trash text-danger"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-horizontal list-unstyled mt-3 mb-3">
                                            <li class="text-primary list-group-item">
                                                <i class="fas fa-user"></i> <?= $messages[$i]['name'] . ' ' . $messages[$i]['surname'] ?>
                                            </li>
                                            <?php if ($messages[$i]['phone_number']): ?>
                                                <li class="list-group-item">
                                                    <a href="tel:<?= $messages[$i]['phone_number'] ?>">
                                                        <i class="fas fa-envelope"></i> <?= $messages[$i]['phone_number'] ?>
                                                    </a>
                                                <li>
                                            <?php endif; ?>
                                            <?php if ($messages[$i]['email']): ?>
                                                <li class="list-group-item">
                                                    <a href="mailTo:<?= $messages[$i]['email'] ?>">
                                                        <i class="fas fa-envelope"></i> <?= $messages[$i]['email'] ?>
                                                    </a>
                                                <li>
                                            <?php endif; ?>
                                        </ul>
                                        <p class="card-text pt-2 pb-3"><?= $messages[$i]['message'] ?></p>
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
    <div class="modal fade" id="deleteMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel"><span class="fas fa-trash"></span> Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure your want to delete "Message" click delete to confirm.</div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <?= form_open('dashboard/messages/delete', ['class' => 'model-footer']) ?>
                        <input type="hidden" name="id" value="" id="deleteMessageInput">
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
            $('.deleteMessageBtn').click(function() {
                $('#deleteMessageInput').val($(this).val());
            });
        });

    </script>

</body>

</html>