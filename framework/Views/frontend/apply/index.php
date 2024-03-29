<div class="apply">
	<div class="apply-banner bg-dark position-relative w-100">
		<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
		<div class="banner-content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-10 col-lg-8 mb-3 text-center">
						<h1 class="text-white font-weight-bolder mb-4" data-aos="fade-up"><span class="text-orange">Apply</span> Here</h1>
						<p class="text-white" data-aos="fade-up">Kindly Note that a <span class="text-forest">Non-Refundable</span> Fee of <span class="text-forest">NGN1,000</span> is required to Activate you for this GRANT. </p>
						<p class="text-white" data-aos="fade-up">Once we reach the Total Number of Applicants as requested by our SPONSORS, we shall Carefully and Professionally go through all Applications and finally Select the very best of all Applications from our Applicants and quickly AWARD them the GRANTS according to the Amount Requested by them individually.</p>
					</div>
				</div>
				<div class="mb-5">
					<h3 class="text-white mb-4 pt-0 mt-0 text-center">In Partnership With</h3>
					<div class="row justify-content-center">
						<div class="col-12 col-md-4 mb-4">
							<div class="h-100">
								<img src="<?= IMAGES_URL; ?>/partners/eapn.jpg" class="img-fluid rounded w-100 h-100 mb-2">
							</div>
							<div class="text-white">European Anti-Poverty Network (EAPN)</div>
						</div>
						<div class="col-12 col-md-4 mb-4">
							<div class=" h-100">
								<img src="<?= IMAGES_URL; ?>/partners/download.jpg" class="img-fluid rounded w-100 h-100">
							</div>
						</div>
						<div class="col-12 col-md-4 mb-4">
							<div class="border rounded h-100">
								<img src="<?= IMAGES_URL; ?>/partners/logo.png" class="img-fluid rounded w-100 h-100 p-4">
							</div>
						</div>
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