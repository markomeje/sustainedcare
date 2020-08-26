<div class="login">
	<div class="login-banner lemon-gradient position-relative w-100">
		<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
	</div>
	<div class="login-section">
		<div class="container position-relative">
			<div class="row align-items-center justify-content-center">
				<div class="col-12 col-md-6 col-lg-4">
					<div class="login-form-wrapper">
						<h1 class="text-forest">Login Here</h1>
						<?php if($verifyEmail !== null): ?>
							<?php if($verifyEmail === false): ?>
								<div class="alert-danger my-3 px-3 py-2 rounded">Operation falied. Try again</div>
							<?php endif; ?>
						<?php endif; ?>
						<form action="javascript:;" method="POST" class="login-form" data-action="<?= DOMAIN; ?>/login/login">
							<div class="alert my-3 px-3 login-message d-none alert-dismissible"></div>
							<!-- <div class="mb-3 px-3 alert resend-email d-none alert-dismissible">If you did not get any link, please click <a href="javascript:;">Here</a> to resend email.</div> -->
							<input type="hidden" name="csrf" value="<?= Application\Library\Session::set("csrf", \Application\Library\Generate::bytes(85)); ?>">
							<div class="form-group input-group-lg">
								<label for="" class="text-muted mb-2">Email</label>
								 <input type="email" name="email" class="form-control email" placeholder="e.g., john@doe.com">
								 <small class="error email-error text-danger"></small>
							</div>
							<div class="form-group input-group-lg">
								<label for="" class="text-muted mb-2">Password</label>
								<input type="password" name="password" class="form-control password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
								<small class="error password-error text-danger"></small>
							</div>
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input type="checkbox" value="on" name="remember-me" class="custom-control-input remember-me" id="remember-me">
									<label class="custom-control-label text-muted cursor-pointer" for="remember-me">Remember Login</label>
								</div>
							</div>
							<button type="submit" class="btn btn-lg border-0 orange-shadow orange-gradient rounded-pill text-white login-button px-4 btn-block">
								<img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none login-spinner mb-1">
								Login
							</button>
							<div class="mt-3">
								<a href="<?= DOMAIN; ?>/password" class="mr-2 text-muted float-left">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?> 
