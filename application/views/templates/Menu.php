<div class="menu">

    <!-- Search -->
    <div class="menu_search">
        <form action="#" id="menu_search_form" class="menu_search_form">
            <input type="text" class="search_input" placeholder="Search Item" required="required">
            <button class="menu_search_button"><img src="assets/images/search.png" alt=""></button>
        </form>
    </div>
    <!-- Navigation -->
    <div class="menu_nav">
        <ul>
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
    </div>
    <!-- Contact Info -->
    <div class="menu_contact">
        <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
            <div>
                <div><img src="assets/images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div>
            </div>
            <div>+2772 876 4344</div>
        </div>
        <div class="menu_social">
            <ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
                <li><a href="<?= base_url('') ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="<?= base_url('') ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                <li><a href="<?= base_url('') ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="<?= base_url('') ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>