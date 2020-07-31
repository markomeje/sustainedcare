<div class="apply">
	<div class="apply-banner bg-white position-relative w-100">
		<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
		<div class="banner-content">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-10 col-lg-8 mb-5">
						<h1 class="text-shade font-weight-bolder mb-4" data-aos="fade-up"><em class="text-orange">Apply</em> Here</h1>
						<p class="text-muted mb-4" data-aos="fade-up">A non refundable application fee of NGN1,000 is required for due consideration and processing of your application. Please ready our <em><a href="<?= DOMAIN; ?>/terms" class="text-muted">terms and conditions</a></em> before processing your application.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="apply-section bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-10 col-lg-8">
					<h1 class="text-shade">Application form</h1>
					<p class="text-muted"><em>All fields are required</em></p>
					<?php require FRONTEND_PATH . DS . "apply" . DS . "partials" . DS . "form.php"; ?>
				</div>
				<div class="col-12 col-md-2 col-lg-4"></div>
			</div>
		</div>
	</div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?> 