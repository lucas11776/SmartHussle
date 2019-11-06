<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SmartHussle (be smart about your choose).</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Little Closet template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/styles/bootstrap-4.1.2/bootstrap.min.css">
        <link href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
        <link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/animate.css">
        <link rel="stylesheet" type="text/css" href="assets/styles/main_styles.css">
        <link rel="stylesheet" type="text/css" href="assets/styles/responsive.css">
    </head>
<body>

<!-- Menu -->

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
        <li><a href="<?= base_url('register') ?>">Register</a></li>
        <li><a href="<?= base_url('login') ?>">Login</a></li>
        <li><a href="<?= base_url('contact') ?>">Contact</a></li>
		</ul>
	</div>
	<!-- Contact Info -->
	<div class="menu_contact">
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="assets/images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
			<div>+1 912-252-7350</div>
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

<div class="super_container">

	<!-- Header -->

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
					<li><a href="<?= base_url('') ?>">Home</a></li>
					<li><a href="<?= base_url('store') ?>">Store</a></li>
					<li><a href="<?= base_url('register') ?>">Register</a></li>
					<li><a href="<?= base_url('login') ?>">Login</a></li>
					<li><a href="<?= base_url('contact') ?>">Contact</a></li>
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
				<div class="user"><a href="#"><div><img src="assets/images/user.svg" alt="https://www.flaticon.com/authors/freepik"><div>1</div></div></a></div>
				<!-- Cart -->
				<div class="cart"><a href="cart.html"><div><img class="svg" src="assets/images/cart.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><img src="assets/images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
					<div>+1 912-252-7350</div>
				</div>
			</div>
		</div>
	</header>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->

        <!-- Removed Home Html -->

		<!-- Products -->

		<div class="products">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="section_title text-center">SmartHussle Latest Products...</div>
					</div>
				</div>
				<div class="row page_nav_row">
					<div class="col">
						<div class="page_nav">
							<ul class="d-flex flex-row align-items-start justify-content-center">
                                <?php for ($i = 0; $i < count($categories); $i++): ?>
								    <li class="text-uppercase">
                                        <a href="<?= base_url('categories/' . $categories[$i]['slug']) ?>">
                                            <?= $categories[$i]['name'] ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="row products_row">
					
					<!-- Product -->
                    <?php for ($i = 0; $i < count($products); $i++): ?>
                        <?= $this->load->view('templates/product_preview', $products[$i], true) ?>
                    <?php endfor; ?>
                    
				</div>
				<div class="row load_more_row">
					<div class="col">
						<div class="button load_more ml-auto mr-auto"><a href="#">load more</a></div>
					</div>
				</div>
			</div>
		</div>

		<!-- Boxes -->

        <!-- Removed Boxes -->

		<!-- Features -->

        <!-- Removed features html -->

		<!-- Footer -->

		<?= $this->load->view('templates/footer', ['categories' => $categories], true) ?>
	</div>
		
</div>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/styles/bootstrap-4.1.2/popper.js"></script>
<script src="assets/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="assets/plugins/greensock/TweenMax.min.js"></script>
<script src="assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="assets/plugins/easing/easing.js"></script>
<script src="assets/plugins/progressbar/progressbar.min.js"></script>
<script src="assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>