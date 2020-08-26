<div class="apply">
	<div class="apply-banner bg-dark position-relative w-100">
		<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
		<div class="banner-content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-10 col-lg-8 mb-5 text-center">
						<h1 class="text-white font-weight-bolder mb-4" data-aos="fade-up"><span class="text-orange">Apply</span> Here</h1>
						<p class="text-white mb-4" data-aos="fade-up">A non refundable application fee of NGN1,000 is required for due consideration and processing of your application. Please ready our <a href="<?= DOMAIN; ?>/terms">terms and conditions</a> before processing your application.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="apply-section">
		<div class="container">
			<div class="row justify-content-center" data-aos="fade-up">
				<div class="col-12 col-md-8 col-lg-6">
					<h1 class="text-shade text-center">Application form</h1>
					<p class="text-muted text-center">Please all fields are required</p>
					<?php require FRONTEND_PATH . DS . "apply" . DS . "partials" . DS . "form.php"; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?> 