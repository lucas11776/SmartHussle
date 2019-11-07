<footer class="footer">
    <div class="footer_content">
        <div class="container">
            <div class="row">

                <!-- About -->
                <div class="col-lg-4 footer_col">
                    <div class="footer_about">
                        <div class="footer_logo">
                            <a href="#">
                                <div class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="footer_logo_icon"><img src="assets/images/logo_2.png" alt=""></div>
                                    <div>SmartHussle</div>
                                </div>
                            </a>
                        </div>
                        <div class="footer_about_text">
                            <p>
                                description about SmartHussle all details about company.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Footer Links -->
                <div class="col-lg-4 footer_col d-none">
                    <div class="footer_menu">
                        <div class="footer_title">Category</div>
                        <ul class="footer_list">
                            <?php for ($i = 0; $i < (count($categories) > 4 ? 4 : count($categories)); $i++): ?>
                            <li>
                                <a href="<?= base_url('categories/' . $categories[$i]['slug']) ?>"
                                    class="text-capitalize">
                                    <div><?= $categories[$i]['name'] ?></div>
                                </a>
                            </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 footer_col"></div>
                <!-- Footer Contact -->
                <div class="col-lg-4 offset footer_col">
                    <div class="footer_contact">
                        <div class="footer_social">
                            <div class="footer_title">Social</div>
                            <ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
                                <li><a href="<?= base_url('') ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="<?= base_url('') ?>"><i class="fa fa-youtube-play"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="<?= base_url('') ?>"><i class="fa fa-google-plus"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="<?= base_url('') ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
                        <div class="copyright order-md-1 order-2">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy; <?= date('Y') ?> SmartHussle | Web-Developer <a href="https://thembangubeni.epizy.com" target="_blank">T.L.Ngubeni</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <nav class="footer_nav ml-md-auto order-md-2 order-1">
                            <ul class="d-flex flex-row align-items-center justify-content-start">
                                <li><a href="<?= base_url('') ?>">Home</a></li>
                                <li><a href="<?= base_url('store') ?>">Store</a></li>
                                <?php if ($this->auth->guest(false)): ?>
                                    <li><a href="<?= base_url('register') ?>">Register</a></li>
                                    <li><a href="<?= base_url('login') ?>">Login</a></li>
                                <?php endif; ?>
                                <?php if ($this->auth->administrator(false)): ?>
                                    <li><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                                <?php endif; ?>
                                <li><a href="<?= base_url('contact') ?>">Contact</a></li>
                                <?php if ($this->auth->user(false)): ?>
                                    <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>