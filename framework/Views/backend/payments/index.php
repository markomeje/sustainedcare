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
                        <a href="javascript:;" class="text-muted mr-3"><?= empty($count) ? 0 : $count; ?> payment(s)</a>
                        <a href="javascript:;" class="text-muted mr-3">Multiple delete</a>
                    </div>
                </div>
	        </div>
	    </div>
    </div>
    <div class="">
	    <div class="container">
    		<?php if(empty($payments)): ?>
                <div class="text-muted">No payments yet.</div>
            <?php else: ?>
            	<div class="row">
	            	<?php foreach($payments as $payment): ?>
	                    <?php require BACKEND_PATH . DS . "payments" . DS . "partials" . DS . "listings.php"; ?>
	                <?php endforeach; ?>
                </div>
                <?php require BACKEND_PATH . DS . "payments" . DS . "pagination" . DS . "index.php"; ?>
            <?php endif; ?>
	    </div>
    </div>
</div>