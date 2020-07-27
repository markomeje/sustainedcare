<div class="wrapper bg-gray dashboard-wrapper">
    <!-- DASHBOARD NAVBAR -->
    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="pt-5">
	    <div class="container pt-5">
	        <div class="row align-items-bottom">
	            <?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
	            <div class="col-12 col-md-6 col-lg-6 mb-4">
	                <div class="border-0 border-orange rounded px-3 d-flex align-items-center bg-white top-right-bar">
	                    <a href="javascript:;" class="mr-3 text-muted" data-toggle="modal" data-target="#add-admin">Add user</a>
	                    <a href="javascript:;" class="mr-3 text-muted">Reports</a>
	                </div>
	            </div>
	        </div>
	    </div>
    </div>
    <div class="">
	    <div class="container">
	    	<div class="row">
				<?php require BACKEND_PATH . DS . "dashboard" . DS . "partials" . DS . "panels.php"; ?>
			</div>
			<div class="row">
				<div class="col-12 mb-4">
					<div class="card border-orange mt-1">
						<div class="card-header orange-gradient d-flex justify-content-between">
							<small class="text-white">Applicants chart</small>
							<small class="text-white">+16.34%</small>
						</div>
						<div class="card-body position-relative px-0">
							<div class="bills-charts-loader position-absolute center-absolute">
								<h6 class="text-muted">Loading . . .</h6>
							</div>
							<canvas id="bills-chart" class="w-100 mt-3 px-2" style="height: 350px;" data-url="<?= DOMAIN; ?>/bills/getBillsChart"></canvas>
						</div>
						<div class="card-footer orange-gradient">
							<small class="text-white">+16.34% form last month</small>
						</div>
					</div>
				</div>
			</div>
	    </div>
    </div>
</div>