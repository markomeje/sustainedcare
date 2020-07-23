<div class="login">
	<div class="login-banner lemon-gradient position-relative w-100">
		<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
	</div>
	<div class="login-section">
		<div class="container position-relative">
			<div class="row align-items-center justify-content-center">
				<div class="col-12 col-md-6 col-lg-4">
					<div class="bg-white rounded">
						<h1 class="text-shade"><em class="text-orange">Login</em> Here</h1>
						<form action="javascript:;" method="POST" class="login-form" data-action="<?= DOMAIN; ?>/login/login">
							<div class="alert my-3 px-3 login-message d-none"></div>
							<input type="hidden" name="csrf" value="<?= Application\Library\Session::csrf(); ?>">
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
							<button type="submit" class="btn border-0 orange-shadow orange-gradient rounded-pill text-white login-button px-4">
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
