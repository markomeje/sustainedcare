<div class="stripe">
	<div class="donate-options-banner position-relative w-100">
		<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
		<div class="banner-content">
			<div class="container">
				<?php if(isset($status) && $status === "success"): ?>
					<div class="row justify-content-center">
						<div class="col-12 col-md-8 col-lg-4">
							<h2 class="text-white text-center">Thank you for commiting to our vision.</h2>
						</div>
					</div>
				<?php elseif(isset($status) && $status === "checkout"): ?>
					<div class="row justify-content-center">
						<div class="col-12 col-md-8 col-lg-4">
							<img src="<?= IMAGES_URL; ?>/stripe/logo.jpg" class="img-fluid w-100 mb-4">
							<p class="text-white text-center">Please click the link below to securely make your donation.</p>
							<button class="checkout-button btn forest-shadow px-3 border-0 text-white rounded-pill lemon-gradient btn-lg btn-block" id="checkout-button">Donate</button>
						</div>
					</div>
				<?php else: ?>
					<div class="row justify-content-center">
						<div class="col-12 col-md-8 col-lg-6 mb-4">
							<h1 class="text-center text-white">Our Partnership With <span class="text-orange">Stripe</span> Makes Donation Easy<span class="text-orange d-inline">.</span></h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<?php require FRONTEND_PATH . DS . "donate" . DS . "partials" . DS . "options.php"; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="donate-options-section">
		<div class="container">
			<?php if(isset($status) && $status === "checkout"): ?>
				<div class="row justify-content-center">
					<div class="col-12 col-md-8 col-lg-4 mb-4">
						<img src="<?= IMAGES_URL; ?>/stripe/secure.jpg" class="img-fluid w-100 rounded">
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-12 col-md-8 col-lg-4 mb-4">
						<img src="<?= IMAGES_URL; ?>/stripe/encrypt.png" class="img-fluid w-100 rounded object-fit-cover">
					</div>
				</div>
			<?php else: ?>
				<div class="row justify-content-center">
					<?php require FRONTEND_PATH . DS . "donate" . DS . "partials" . DS . "donation.php"; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>