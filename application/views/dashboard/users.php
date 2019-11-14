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
                        <h1 class="h3 mb-0 text-gray-800"><span class="fas fa-shopping-bag"></span> Products</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">SmartHussle Users Accounts</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <?php if ($this->session->flashdata('form_error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i><span class="fa fa-server"></span>
                                        <?= $this->session->flashdata('form_error') ?></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('form_success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i><span class="fa fa-server"></span>
                                        <?= $this->session->flashdata('form_success') ?></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th><i class="fas fa-clock"></i> Created</th>
                                        <th><i class="fas fa-key"></i> Role</th>
                                        <th><i class="fas fa-user"></i> Username</th>
                                        <th><i class="fas fa-envelope"></i> Email</th>
                                        <th><i class="fas fa-traffic-light"></i> Change User Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($users); $i++): ?>
                                    <tr>
                                        <td><strong class="text-primary"><?= $users[$i]['uid'] ?></strong></td>
                                        <td><?= date('d M Y h:ma', strtotime($users[$i]['created'])) ?></td>
                                        <td><?= array_keys($this->auth::ROLE)[$users[$i]['role']] ?></td>
                                        <td><?= $users[$i]['username'] ?></td>
                                        <td><?= $users[$i]['email'] ?></td>
                                        <td>
                                            <div class="input-group">
                                                <select class="form-control border-primary"
                                                    id="selectedUserRole-<?= $users[$i]['uid'] ?>">
                                                    <?php foreach ($this->auth::ROLE as $key => $value): ?>
                                                    <option value="<?= $value ?>"><?= $key ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-danger deleteUserBtn" type="button"
                                                        data-toggle="modal" data-target="#deleteUserModal"
                                                        value="<?= $users[$i]['uid'] ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <button class="btn btn-outline-primary changeUserRoleBtn"
                                                        type="submit" data-toggle="modal"
                                                        data-target="#changeUserRoleModal"
                                                        value='<?= json_encode(['uid' => $users[$i]['uid']]) ?>'>
                                                        <i class="fas fa-database"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endfor; ?>
                                <tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 offset-md-3">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="dataTable_previous">
                                                <a href="#" aria-controls="dataTable" class="page-link">Previous</a>
                                            </li>
                                            <li class="paginate_button page-item active">
                                                <a href="#" aria-controls="dataTable" class="page-link">1</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="dataTable" class="page-link">2</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="dataTable" class="page-link">3</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="dataTable" class="page-link">4</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="dataTable" class="page-link">5</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="dataTable" class="page-link">6</a>
                                            </li>
                                            <li class="paginate_button page-item next" id="dataTable_next">
                                                <a href="#" aria-controls="dataTable" class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
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

    <!-- Delete Category Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel"><span class="fas fa-trash"></span> Delete
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure your want to delete "User Account" click delete to confirm.</div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <?= form_open('dashboard/users/delete', ['class' => 'model-footer']) ?>
                        <input type="hidden" name="id" value="" id="deleteUserInput">
                        <input type="hidden" name="redirect" value="<?= uri_string() ?>">
                        <button class="btn btn-danger" type="submit">
                            <span class="fas fa-trash-o"></span> Delete
                        </button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Change User Role Modal -->
    <div class="modal fade" id="changeUserRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-info" id="exampleModalLabel">
                        <span class="fas fa-user"></span> Change User Role
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to change user role.</div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <?= form_open('dashboard/products/delete', ['class' => 'model-footer']) ?>
                        <input type="hidden" name="id" value="" id="changeUserIdInput">
                        <input type="hidden" name="role" value="" id="changeUserRoleInput">
                        <input type="hidden" name="redirect" value="<?= uri_string() ?>">
                        <button class="btn btn-warning" type="submit">
                            <span class="fas fa-key"></span> Change
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
        // delete user btn click
        $('.deleteUserBtn').click(function() {
            $('#deleteUserInput').val($(this).val());
        });
        // change user role btn click
        $('.changeUserRoleBtn').click(function() {
            var user = JSON.parse($(this).val());
            $('#changeUserIdInput').val(user.uid);
            $('#changeUserRoleInput').val($('#selectedUserRole-' + user.uid).val());
        });
    });
    </script>

</body>

</html>