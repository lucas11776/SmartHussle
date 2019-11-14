<!DOCTYPE html>
<html lang="en">
<head>
<title>Category</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="<?= base_url() ?>">
<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="assets/styles/category.css">
<link rel="stylesheet" type="text/css" href="assets/styles/category_responsive.css">
</head>
<body>

<!-- Menu -->

<?= $this->load->view('templates/menu', ['active' => 'store'], true) ?>

<div class="super_container">

	<!-- Header -->

	<?= $this->load->view('templates/header', ['active' => 'store'], true) ?>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title"><i>SmartHussle <span class="fa fa-shopping-bag"></span> Store...</i></div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li>Be Smart About Your Choose...</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Products -->

		<div class="products">
			<div class="container">
				<div class="row products_bar_row">
					<div class="col">
						<div class="products_bar d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-start justify-content-center">
							<div class="products_bar_links">
								<ul class="d-flex flex-row align-items-start justify-content-start">
                                    <?php for ($i = 0; $i < count($categories); $i++): ?>
                                        <li>
                                            <a class="text-capitalize" href="<?= base_url('categories/' . $categories[$i]['slug']) ?>">
                                                <?= $categories[$i]['name'] ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row products_row products_container grid">
					
					<!-- Product -->
				
                    <?php for ($i = 0; $i < count($products); $i++): ?>
                        <?= $this->load->view('templates/product_preview', $products[$i], true) ?>
                    <?php endfor; ?>

				</div>
				<div class="row page_nav_row">
					<div class="col">
						<div class="page_nav">
							<?= $this->pagination->create_links() ?>
						</div>
					</div>
				</div>
			</div>
		</div>

        <!-- Footer -->
        
        <?= $this->load->view('templates/footer', [], true) ?>

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
<script src="assets/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="assets/plugins/Isotope/fitcolumns.js"></script>
<script src="assets/js/category.js"></script>
</body>
</html>