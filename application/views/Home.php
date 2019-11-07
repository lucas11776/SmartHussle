<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SmartHussle (be smart about your choose).</title>
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
        <link rel="stylesheet" type="text/css" href="assets/styles/main_styles.css">
        <link rel="stylesheet" type="text/css" href="assets/styles/responsive.css">
    </head>
<body>

<!-- Menu -->

<?= $this->load->view('templates/menu', [], true) ?>

<div class="super_container">

	<!-- Header -->

	<?= $this->load->view('templates/header', [], true) ?>

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
						<div class="button load_more ml-auto mr-auto">
							<a href="<?= base_url('store') ?>">load more</a>
						</div>
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