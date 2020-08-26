<div class="fixed-top py-3 bg-dark light-shadow">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center align-content-center">
			<ul class="m-0 p-0 d-flex">
				<li class="font-weight-bold">
					<?php if(Application\Library\Session::get("role") === "applicant"): ?>
						<a href="<?= DOMAIN; ?>/profile" class="text-white">My Profile</a>
					<?php else: ?>
						<a href="<?= DOMAIN; ?>/dashboard" class="text-white">Dashboard</a>
					<?php endif; ?>
				</li>
			</ul>
			<ul class="m-0 p-0 d-flex">
				<li class="position-relative mt-0 ml-3 rounded-circle text-center text-orange bg-gray cursor-pointer icon-circle" data-toggle="modal" data-target="#settings">
			    	<i class="icofont-alarm"></i>
			    </li>
			    <li class="position-relative mt-0 ml-3 rounded-circle text-center text-white bg-danger cursor-pointer logout icon-circle" data-url="<?= DOMAIN; ?>/login/logout">
			    	<i class="icofont-power"></i>
			    </li>
			</ul>
		</div>
	</div>
</div>
<div class="update-password-modal">
	<?php require BACKEND_PATH . DS . "layouts" . DS . "password.php"; ?>
</div>

