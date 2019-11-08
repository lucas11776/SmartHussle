<header class="header">
    <div class="header_overlay"></div>
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
        <div class="logo">
            <a href="#">
                <div class="d-flex flex-row align-items-center justify-content-start">
                    <div><img src="assets/images/logo_1.png" alt=""></div>
                    <div>SmartHussle</div>
                </div>
            </a>	
        </div>
        <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
        <nav class="main_nav">
            <ul class="d-flex flex-row align-items-start justify-content-start">
                <li class="<?= ($active ?? '') == 'home' ? 'active' : '' ?>"><a href="<?= base_url('') ?>">Home</a></li>
                <li class="<?= ($active ?? '') == 'store' ? 'active' : '' ?>"><a href="<?= base_url('store') ?>">Store</a></li>
                <?php if ($this->auth->guest(false)): ?>
                    <li><a href="<?= base_url('register') ?>">Register</a></li>
                    <li><a href="<?= base_url('login') ?>">Login</a></li>
                <?php endif; ?>
                <?php if ($this->auth->administrator(false)): ?>
                    <li><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <?php endif; ?>
                <li class="<?= ($active ?? '') == 'contact' ? 'active' : '' ?>"><a href="<?= base_url('contact') ?>">Contact</a></li>
                <?php if ($this->auth->user(false)): ?>
                    <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
            <!-- Search -->
            <div class="header_search">
                <form action="#" id="header_search_form">
                    <input type="text" class="search_input" placeholder="Search Store" required="required">
                    <button class="header_search_button"><img src="assets/images/search.png" alt=""></button>
                </form>
            </div>
            <!-- User -->
            <!-- Removed User Link -->
            <!-- Cart -->
            <div class="cart">
                <a href="<?= base_url('store') ?>">
                    <div>
                        <img class="svg" src="assets/images/cart.svg" alt="https://www.flaticon.com/authors/freepik">
                    </div>
                </a>
            </div>
            <!-- Phone -->
            <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                <a href="<?= base_url('contact') ?>">
                    <div>
                        <img src="assets/images/phone.svg" alt="https://www.flaticon.com/authors/freepik">
                    </div>
                </a>
                <a href="tel:072 876 4344">072 876 4344</a>
            </div>
        </div>
    </div>
</header>