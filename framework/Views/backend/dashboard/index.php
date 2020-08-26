<div class="position-relative">
	<div class="backend-navbar">
		<?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
	</div>
    <div class="pt-5">
	    <div class="container pt-5">
	    	<div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-4">
                    <!-- DASHBOARD Links -->
                    <?php require BACKEND_PATH . DS . 'layouts' . DS . 'links.php'; ?>
                </div>
	            <div class="col-12 col-md-6 col-lg-6 mb-4">
                    <div class="d-flex align-items-center bg-white px-3 py-2 border rounded top-right-bar">
                        <a href="javascript:;" class="text-muted mr-3">Add moderator</a>
                    </div>
                </div>
	        </div>
	    	<div class="row mb-1">
				<?php require BACKEND_PATH . DS . "dashboard" . DS . "partials" . DS . "panels.php"; ?>
			</div>
			<div class="row">
				<div class="col-12 mb-4">
					<div class="card bg-light border-0">
						<div class="card-header border-0 bg-dark pb-0 pt-4 my-0">
							<div class="row">
								<div class="form-group input-group-lg col-md-6 mb-4">
									<select class="custom-select border-0 text-muted" data-url="<?= DOMAIN; ?>">
										<option value="">2020</option>
									</select>
								</div>
								<div class="form-group input-group-lg col-md-6 mb-4">
									<select class="custom-select border-0 text-muted" data-url="<?= DOMAIN; ?>">
										<option value="">January</option>
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
						<div class="card-footer bg-dark border-0">
							<small class="text-white">+16.34% form last month</small>
						</div>
					</div>
				</div>
			</div>
	    </div>
    </div>
</div>