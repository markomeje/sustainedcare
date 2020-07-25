<div class="wrapper bg-gray dashboard-wrapper">
    <!-- DASHBOARD NAVBAR -->
    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="pt-5">
	    <div class="container pt-5">
	    	<?php if(strtolower($profile->payment) !== "paid"): ?>
		    	<div class="alert-warning mb-4 px-3 py-2 rounded">Click <a href="javascript:;" class="pay">here</a> to pay your application fee and get your referral link so you can start earning.</div>
		    <?php endif; ?>
	        <div class="row align-items-bottom">
	            <?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
	            <div class="col-12 col-md-6 col-lg-6 mb-4">
	                <div class="border-0 border-orange rounded px-3 d-flex align-items-center bg-white top-right-bar">
	                    <?php if(strtolower($profile->payment) === "paid"): ?>
	                    	<a href="javascript:;" class="mr-3 text-muted">No referral link</a>
	                    <?php else: ?>
	                    	<a href="<?= DOMAIN; ?>/apply/index/<?= $profile->code; ?>" class="mr-3 text-muted">Copy link</a>
	                    <?php endif; ?>
	                </div>
	            </div>
	        </div>
	    </div>
    </div>
    <div class="">
	    <div class="container">
	    	<div class="row">
				<?php require BACKEND_PATH . DS . "profile" . DS . "partials" . DS . "panels.php"; ?>
			</div>
			<div class="row">
				<div class="col-12 mb-4">
					<div class="card border-orange mt-1">
						<div class="card-header orange-gradient d-flex justify-content-between">
							<div class="text-white">Referrals chart</div>
							<div class="text-white">+16.34%</div>
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