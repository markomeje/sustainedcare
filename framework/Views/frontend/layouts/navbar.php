<div class="navbar fixed-top bg-gray">
	<div class="container navbar-wrapper">
		<div class="row justify-content-between align-items-center">
			<div class="col-6 col-md-3 col-lg-2 navbar-left">
				<a href="<?= DOMAIN; ?>" class="text-decoration-none">
					<img src="<?= IMAGES_URL; ?>/logos/logo.png" class="img-fluid">
				</a>
			</div>
			<div class="col-1 col-md-1 col-lg-9 navbar-center">
				<ul class="d-flex justify-content-end mt-3">
					<li class="">
						<a href="<?= DOMAIN; ?>" class="text-forest navbar-link">Home</a>
					</li>
					<li class="ml-4">
						<a href="<?= DOMAIN; ?>/about" class="text-forest navbar-link">About</a>
					</li>
					<li class="ml-4">
						<a href="<?= DOMAIN; ?>/donate" class="text-forest navbar-link">Donate</a>
					</li>
					<li class="ml-4">
						<a href="<?= DOMAIN; ?>/apply" class="text-forest navbar-link">Apply</a>
					</li>
					<li class="ml-4">
						<a href="<?= DOMAIN; ?>/gallery" class="text-forest navbar-link">Gallery</a>
					</li>
					<li class="ml-4">
						<a href="<?= DOMAIN; ?>/contact" class="text-forest navbar-link">Contact</a>
					</li>
					<?php $role = Application\Library\Session::get("role"); $isLoggedIn = Application\Library\Session::get("isLoggedIn"); ?>
					<?php if($isLoggedIn === true): ?>
						<?php if($role === "applicant"): ?>
							<li class="ml-4">
								<a href="<?= DOMAIN; ?>/profile" class="text-forest navbar-link">Profile</a>
							</li>
						<?php elseif($role === "admin" || $role === "moderator"): ?>
							<li class="ml-4">
								<a href="<?= DOMAIN; ?>/dashboard" class="text-forest navbar-link">Dashboard</a>
							</li>
						<?php endif; ?>
					<?php endif; ?>
					<li class="ml-4">
						<a href="<?= DOMAIN; ?>/login" class="py-2 border-0 text-decoration-none orange-shadow rounded-pill px-4 border-0 text-white orange-gradient">Login</a>
					</li>
				</ul>
			</div>
			<div class="col-5 col-md-8 col-lg-1 navbar-right pr-md-0">
				<div class="text-center float-right d-flex justify-content-center align-items-center pr-md-3">
					<a href="<?= DOMAIN; ?>/donate" class="text-forest navbar-link mr-3">Donate</a>
					<div class="navbar-menu position-relative p-md-0 d-flex justify-content-end align-items-center">
						<div class="menu-lines"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="navbar-mobile position-fixed bg-white h-100 w-100">
    <div class="container inner p-3 w-100">
    	<ul class="d-block px-0 m-0">
			<li class="d-block mb-3">
				<a href="<?= DOMAIN; ?>" class="text-forest bg-gray navbar-link p-3 rounded d-block">Home</a>
			</li>
			<li class="d-block mb-3">
				<a href="<?= DOMAIN; ?>/about" class="text-forest bg-gray navbar-link p-3 rounded d-block">About</a>
			</li>
			<li class="d-block mb-3">
				<a href="<?= DOMAIN; ?>/donate" class="text-forest bg-gray navbar-link p-3 rounded d-block">Donate</a>
			</li>
			<li class="d-block mb-3">
				<a href="<?= DOMAIN; ?>/apply" class="text-forest bg-gray navbar-link p-3 rounded d-block">Apply</a>
			</li>
			<li class="d-block mb-3">
				<a href="<?= DOMAIN; ?>/gallery" class="text-forest bg-gray navbar-link p-3 rounded d-block">Gallery</a>
			</li>
			<li class="d-block mb-3">
				<a href="<?= DOMAIN; ?>/contact" class="text-forest bg-gray navbar-link p-3 rounded d-block">Contact</a>
			</li>
			<?php if($isLoggedIn === true): ?>
				<?php if($role === "applicant"): ?>
					<li class="d-block mb-3">
						<a href="<?= DOMAIN; ?>/profile" class="text-forest bg-gray navbar-link p-3 rounded d-block">Profile</a>
					</li>
				<?php elseif($role === "admin" || $role === "moderator"): ?>
					<li class="d-block mb-3">
						<a href="<?= DOMAIN; ?>/dashboard" class="text-forest bg-gray navbar-link p-3 rounded d-block">Dashboard</a>
					</li>
				<?php endif; ?>
			<?php endif; ?>
			<li class="d-block mb-3 mt-4">
				<a href="<?= DOMAIN; ?>/login" class="py-2 border-0 text-decoration-none orange-shadow rounded-pill px-4 border-0 text-white orange-gradient">Login</a>
			</li>
		</ul>
    </div>
</div>