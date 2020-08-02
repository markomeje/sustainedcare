<div class="wrapper bg-gray dashboard-wrapper">
    <!-- DASHBOARD NAVBAR -->
    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="pt-5">
	    <div class="container pt-5">
	        <div class="row align-items-bottom">
	            <?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
	            <div class="col-12 col-md-6 col-lg-6 mb-4">
	                <div class="border-0 rounded px-3 d-flex align-items-center bg-white top-right-bar">
	                    <a href="javascript:;" class="mr-3 text-muted" data-toggle="modal" data-target="#add-admin">Add admin</a>
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
			<div class="accordion" id="applicants-accordion">
				<div class="cursor-pointer px-3 py-2 bg-white mb-4 clearfix rounded" data-toggle="collapse" data-target="#applicants">
				    <div class="text-muted float-left">
				        Applicants statistics
				    </div>
				    <div class="text-muted float-right">
				        <i class="icofont-rounded-down"></i>
				    </div>
				</div>
				<div id="applicants" class="collapse show" data-parent="#applicants-accordion">
					<div class="row">
						<div class="col-12 mb-4">
							<div class="card border-faint">
								<div class="card-header bg-gray border-0 pb-0 pt-4 my-0">
									<div class="row">
										<div class="form-group input-group-lg col-md-6 mb-4">
											<select class="custom-select border-0 text-muted" data-url="<?= DOMAIN; ?>">
												<option>2020</option>
											</select>
										</div>
										<div class="form-group input-group-lg col-md-6 mb-4">
											<select class="custom-select border-0 text-muted" data-url="<?= DOMAIN; ?>">
												<option>January</option>
											</select>
										</div>
									</div>
								</div>
								<div class="card-body position-relative px-0">
									<div class="applicants-charts-loader position-absolute center-absolute">
										<h6 class="text-muted">Loading . . .</h6>
									</div>
									<canvas id="applicants-chart" class="w-100 mt-3 px-2" style="height: 350px;" data-url="<?= DOMAIN; ?>/bills/getBillsChart"></canvas>
								</div>
								<div class="card-footer bg-gray border-0">
									<small class="text-muted">+16.34% form last month</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
    </div>
</div>