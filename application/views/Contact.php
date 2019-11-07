<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Contact Us</title>
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

	<?= $this->load->view('templates/header', ['active' => 'contact'], true) ?>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title"><i>Get In Touch With Us.</i></div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li>Have a questiion about us just send a message.</li>
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
					<div class="col-lg-8 offset-lg-2">
						<div class="billing pb-5">
							<div class="checkout_title"><span class="fa fa-envelope-open-o"></span> Write us a quick message.</div>
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
                                    <div class="row">
										<div class="col-lg-6">
											<!-- Name -->
											<input type="text"
												   name="name"
                                                   id="name" 
                                                   class="checkout_input" 
                                                   placeholder="Name." 
                                                   value="<?= set_value('name') ?>"
												   required="required">
                                            <?= form_error('name') ?>     
										</div>
										<div class="col-lg-6">
											<!-- Surname -->
											<input type="text"
												   name="surname"
                                                   id="surname" 
                                                   class="checkout_input" 
                                                   placeholder="Surname." 
                                                   value="<?= set_value('surname') ?>"
												   required="required">
                                            <?= form_error('surname') ?>
										</div>
									</div>
									<div>
										<!-- Phone Number -->
										<input type="text"
											   name="phone_number"
										       id="phone-number" 
											   class="checkout_input" 
											   placeholder="Phone No." 
											   value="<?= set_value('phone_number') ?>">
										<?= form_error('phone_number') ?>     
									</div>
									<div>
										<!-- Email -->
										<input type="email"
											   name="email"
											   id="email" 
											   class="checkout_input" 
											   placeholder="Email Address." 
											   value="<?= set_value('email') ?>"
											   required="required">
										<?= form_error('email') ?>
									</div>
									<div class="row">
										<div class="col-lg-7">
											<!-- Subject -->
											<input type="text"
												   name="subject"
                                                   id="subject" 
                                                   class="checkout_input" 
                                                   placeholder="Message Subject." 
                                                   value="<?= set_value('subject') ?>"
												   required="required">
                                            <?= form_error('subject') ?>     
										</div>
									</div>
									<div>
										<!-- Email -->
										<textarea name="message"
                                                  id="message" 
                                               	  class="checkout_input p-3" 
                                                  placeholder="Message to SmartHussle."
                                                  style="height: 100px;"
											      required="required"><?= set_value('message') ?></textarea>
                                        <?= form_error('message') ?>
									</div>
                                    <button type="submit" class="btn mt-2 checkout_button trans_200 text-white">
                                        <strong class="text-uppercase"><i class="fa fa-send-o"></i> Send Message</strong>
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