<div class="wrapper dashboard-wraper">
    <!-- DASHBOARD NAVBAR -->
    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="bg-custo pt-5">
	    <div class="container pt-5">
	        <div class="row align-items-bottom pb-2">
	            <?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
	            <div class="col-12 col-md-6 col-lg-6 mb-4">
	                <div class="border-0 border-orange rounded px-3 d-flex align-items-center bg-white top-right-bar">
	                    <a href="javascript:;" class="mr-3 text-muted" data-toggle="modal" data-target="#add-admin">Add user</a>
	                    <a href="javascript:;" class="mr-3 text-muted">Generate report</a>
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
			<div class="accordion mt-2 mb-4" id="charts-accordions">
	            <div class="cursor-pointer px-3 py-2 border-orange bg-white clearfix mb-4 rounded" data-toggle="collapse" data-target="#bills-charts">
	                <div class="text-muted float-left">
	                    Applicants chart
	                </div>
	                <div class="text-muted float-right">
	                    <i class="icofont-rounded-down"></i>
	                </div>
	            </div>
                <div id="bills-charts" class="collapse show" data-parent="#charts-accordions">
					<div class="row">
						<div class="col-12 col-md-12 col-lg-12">
							<div class="card light-shadow border-0 mt-1">
								<div class="card-body position-relative px-0">
									<div class="bills-charts-loader position-absolute center-absolute">
										<h6 class="text-muted">Loading . . .</h6>
									</div>
									<canvas id="bills-chart" class="w-100 mt-3 px-2" style="height: 350px;" data-url="<?= DOMAIN; ?>/bills/getBillsChart"></canvas>
								</div>
								<div class="card-footer orange-gradient"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
    </div>
</div>