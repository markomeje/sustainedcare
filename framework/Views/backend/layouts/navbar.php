<div class="fixed-top py-3 bg-white light-shadow">
	<div class="container">
		<div class="row d-flex justify-content-between px-3 align-items-center">
			<ul class="nav backend-navbar">
			    <li class="position-relative mt-0 rounded-circle text-center text-orange bg-gray cursor-pointer icon-circle">
			    	<i class="icofont-signal"></i>
			    </li>
			</ul>
			<ul class="nav">
				<li class="position-relative mt-0 ml-3 rounded-circle text-center text-orange bg-gray cursor-pointer icon-circle" data-toggle="modal" data-target="#settings">
			    	<i class="icofont-alarm"></i>
			    </li>
			    <li class="position-relative mt-0 ml-3 rounded-circle text-center text-white bg-danger cursor-pointer logout icon-circle" data-url="<?= DOMAIN; ?>/login/logout">
			    	<i class="icofont-power"></i>
			    </li>
			    <li class="ml-3 mt-0 cursor-pointer toggle-right-sidebar text-orange">
			    	<div class="backend-menu position-relative d-flex justify-content-center align-items-center">
			    		<div class="menu-sticks"></div>
			    	</div>
			    </li>
			</ul>
		</div>
	</div>
</div>
<div class="sidebar right-sidebar position-fixed h-100 w-100">
	<div class="d-flex justify-content-end">
		<div class="inner light-shadow bg-white pt-2">
			<ul class="pt-4 px-4 m-0">
				<li class="border-orange rounded px-3 py-2 mb-3">
					<a href="javascript:;" class="text-muted" data-toggle="modal" data-target="#update-password">Update password</a>
				</li>
				<li class="border-orange rounded px-3 py-2 mb-3">
					<a href="javascript:;" class="text-muted">Change email</a>
				</li>
				<li class="border-orange rounded px-3 py-2 mb-3">
					<a href="javascript:;" class="text-muted">My account</a>
				</li>
				<li class="border-orange rounded px-3 py-2 mb-3">
					<a href="javascript:;" class="text-muted">My account</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="">
	<?php require BACKEND_PATH . DS . "layouts" . DS . "password.php"; ?>
</div>
<div class="">
	<?php require BACKEND_PATH . DS . "layouts" . DS . "email.php"; ?>
</div>

