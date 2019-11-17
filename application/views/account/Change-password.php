<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Account - <?= $this->auth->account('username') ?></title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Little Closet template">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<base href="<?= base_url() ?>"/>
		<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap-4.1.2/bootstrap.min.css">
		<link href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="assets/styles/checkout.css">
		<link rel="stylesheet" type="text/css" href="assets/styles/checkout_responsive.css">
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

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Order Product Online.</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li>
								<a href="<?= base_url('store/' . '') ?>" class="text-capitalize">
									<?= '' ?>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Checkout -->

		<div class="checkout">
			<div class="container">
				<div class="row">
					
					<!-- Billing -->
					<div class="col-md-6 offset-md-3">
						<div class="billing">
							<div class="checkout_title text-center"><span class="fa fa-key"></span> Change Account Password.</div>
							<div class="checkout_form_container">
								<?= form_open(uri_string(), ['id' => 'checkout_form', 'class' => 'checkout_form']) ?>
									<div class="row">
										<div class="col-lg-12">
											<?php if ($this->session->flashdata('form_success')): ?>
												<div class="alert alert-success alert-dismissible fade show" role="alert">
													<small>
														<strong><i class="fa fa-server"></i> <?= $this->session->flashdata('form_success') ?></strong>
													</small>
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											<?php endif; ?>
											<?php if ($this->session->flashdata('form_error')): ?>
												<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<small>
														<strong><i class="fa fa-server"></i> <?= $this->session->flashdata('form_error') ?></strong>
													</small>
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											<?php endif; ?>
										</div>
									</div>
									<div>
										<!-- Old Password -->
										<input type="password"
											   name="old_password"
                                               id="old-password" 
                                               class="checkout_input" 
                                               placeholder="Old Password." 
                                               value="<?= set_value('old_password') ?>"
											   required="required">
                                        <?= form_error('old_password') ?>
									</div>
									<div>
										<!-- New Password -->
										<input type="password"
										       name="new_password"
                                               id="new-password" 
                                               class="checkout_input" 
                                               placeholder="New Password." 
                                               value="<?= set_value('new_password') ?>">
                                        <?= form_error('new_oassword') ?>
									</div>
									<div>
										<!-- Confirm Password -->
										<input type="password"
										       name="confirm_password"
                                               id="confirm_password" 
                                               class="checkout_input" 
                                               placeholder="Confirm Password." 
                                               value="<?= set_value('confirm_password') ?>">
                                        <?= form_error('confirm_password') ?>
									</div>
                                    <button type="submit" class="btn mt-2 checkout_button trans_200 text-white">
                                        <strong class="text-capitalize">Change Password</strong>
                                    </button>
								<?= form_close() ?>
							</div>
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
<script src="assets/plugins/easing/easing.js"></script>
<script src="assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="assets/js/checkout.js"></script>
</body>
</html>