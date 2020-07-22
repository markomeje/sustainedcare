<div class="wrapper">
	<div class="container position-relative mt-md-5 pt-md-4">
		<div class="row align-items-center justify-content-center pt-lg-4">
			<div class="col-12 col-md-5 col-lg-6 bg-custom px-md-4 py-4">
				<div class="px-md-4 py-4 rounded">
					<h4 class="text-white">Don't Have An Account?</h4>
					<p class="text-muted font-weight-normal">To be a leading worldwide integrated and exceptional diagnostic service provider with the highest quality and safety standards.</p>
					<a href="<?= DOMAIN;?>/register" class="btn btn-lg rounded-pill border-white text-white register-login-button font-weight-lighter">
					Register Here</a>
				</div>
			</div>
			<div class="col-12 col-md-7 col-lg-6 box-shadow px-md-4 py-4">
				<div class="bg-white px-md-4 py-4 rounded">
					<h4 class="text-muted">Login Here</h4>
					<form action="javascript:;" method="POST" class="login-form" data-action="<?= DOMAIN; ?>/login/login">
						<div class="alert my-3 px-3 login-message d-none"></div>
						<input type="hidden" name="csrf" value="<?= Application\Library\Session::csrf(); ?>">
						<div class="form-group">
							<label for="" class="text-muted mb-2">Email</label>
							 <input type="email" name="email" class="form-control email" placeholder="e.g., john@doe.com">
							 <small class="error email-error text-danger"></small>
						</div>
						<div class="form-group">
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
						<button type="submit" class="btn btn-lg border-0 bg-custom rounded-pill text-white login-button btn-block">
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

