<div class="paypal">
	<div class="donate-options-banner position-relative w-100">
		<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
		<div class="banner-content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-8 col-lg-6 mb-4">
						<?php if(isset($status) && $status === "success"): ?>
							<p class="text-center text-white mb-3">Thank you for your donation. Your transaction has been completed, and a receipt for your donation has been emailed to you. Log into your PayPal account to view transaction details.</p>
						<?php elseif(isset($status) && $status === "cancel"): ?>
							<p class="text-center text-white mb-3">Thank you for making an attempt to support us. Your donation was cancelled. Later.</p>
						<?php endif; ?>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="text-center mb-4">
							<input type="hidden" name="cmd" value="_s-xclick" />
							<input type="hidden" name="hosted_button_id" value="ZRZDGJRG8RV5Y" />
							<input type="image" class="btn btn-lg" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
							<img alt="" border="0" src="https://www.paypal.com/en_NG/i/scr/pixel.gif" width="2" height="2" />
						</form>
						<div class="text-center">
							<h2 class="text-orange">Or</h2>
							<p class="text-white">Scan QRcode Below</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="donate-options-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8 col-lg-4 mb-4">
					<img src="<?= IMAGES_URL; ?>/paypal/qrcode.png" class="img-fluid w-100">
				</div>
			</div>
		</div>
	</div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>