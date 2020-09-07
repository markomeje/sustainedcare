<div class="donate">
	<div class="donate-banner position-relative w-100">
		<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
		<div class="banner-content">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-12 col-md-8 col-lg-6 mb-4">
						<h1 class="text-white font-weight-bolder mb-4" data-aos="fade-up">Donate and Change <span class="text-orange">Lives</span> as We Fulfill Vision Together<span class="text-orange d-inline">.</span></h1>
						<p class="text-center text-muted" data-aos="fade-up">Please choose your preferred donation option below.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-4 mb-4">
						<div class="card border-0" data-aos="fade-up">
							<a href="<?= DOMAIN; ?>/donate/paypal">
							    <div class="card-body border-0 payment-brands paypal">
								    <img src="<?= IMAGES_URL; ?>/paypal/paypal.jpg" class="img-fluid h-100 w-100">
							    </div>
						    </a>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 mb-4">
						<div class="card border-0" data-aos="fade-up">
							<a href="<?= DOMAIN; ?>/donate/paystack">
							    <div class="card-body border-0 payment-brands paystack">
								    <img src="<?= IMAGES_URL; ?>/payments/paystack.png" class="img-fluid h-100 w-100">
							    </div>
						    </a>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 mb-4">
						<div class="card border-0" data-aos="fade-up">
							<a href="<?= DOMAIN; ?>/donate/crypto">
							    <div class="card-body border-0 payment-brands crypto">
								    <img src="<?= IMAGES_URL; ?>/payments/crypto.png" class="img-fluid h-100 w-100">
							    </div>
						    </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>