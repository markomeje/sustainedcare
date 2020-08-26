<div class="crypto">
	<div class="donate-options-banner position-relative w-100">
		<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
		<div class="banner-content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-8 col-lg-6 mb-4">
						<h1 class="text-center text-white">Securely <span class="text-orange">Donate</span> With Multiple Crypto Options<span class="text-orange d-inline">.</span></h1>
					</div>
				</div>
				<div class="row justify-content-center">
					<!-- Donation amount options -->
					<?php require FRONTEND_PATH . DS . "donate" . DS . "partials" . DS . "options.php"; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="donate-options-section">
		<div class="container">
			<div class="row justify-content-center">
				<!-- Donation form -->
				<?php require FRONTEND_PATH . DS . "donate" . DS . "partials" . DS . "donation.php"; ?>
			</div>
		</div>
	</div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>