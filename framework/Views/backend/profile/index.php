<div class="wrapper bg-gray dashboard-wrapper">
    <!-- DASHBOARD NAVBAR -->
    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="pt-5">
	    <div class="container pt-5">
	    	<?php $payment = empty($profile->payment) ? "" : strtolower($profile->payment); ?>
	    	<?php if($payment !== "paid"): ?>
		    	<div class="alert-warning mb-4 px-3 py-2 rounded">Click <a href="javascript:;" class="paystack-payment" data-url="<?= DOMAIN; ?>/payments/paystack">here</a> to pay your application fee and get your referral link so you can start earning.</div>
		    <?php endif; ?>
	        <div class="row align-items-bottom">
	            <?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
	            <div class="col-12 col-md-6 col-lg-6 mb-4">
	                <div class="border-0 border-orange rounded px-3 d-flex align-items-center bg-white top-right-bar">
	                    <?php if($payment !== "paid"): ?>
	                    	<a href="javascript:;" class="mr-3 text-muted">No referral link</a>
	                    <?php else: ?>
	                    	<a href="<?= DOMAIN; ?>/apply/index/<?= empty($profile->code) ? "" : $profile->code; ?>" class="mr-3 text-muted">Copy link</a>
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
	    </div>
    </div>
</div>