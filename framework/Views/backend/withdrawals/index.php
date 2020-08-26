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
                        <a href="javascript:;" class="text-muted mr-3"><?= empty($countWithdrawals) ? 0 : $countWithdrawals; ?> withdrawal(s)</a>
                    </div>
                </div>
	        </div>
	    </div>
    </div>
    <div class="">
	    <div class="container">
    		<?php if(empty($withdrawals)): ?>
                <div class="text-muted">No withdrawals requests yet.</div>
            <?php else: ?>
            	<div class="row">
	            	<?php foreach($withdrawals as $withdrawal): ?>
	                    <?php require BACKEND_PATH . DS . "withdrawals" . DS . "partials" . DS . "listings.php"; ?>
	                <?php endforeach; ?>
                </div>
                <div class="">
                	<?php foreach($withdrawals as $withdrawal): ?>
                	    <?php require BACKEND_PATH . DS . "withdrawals" . DS . "partials" . DS . "view.php"; ?>
                	<?php endforeach; ?>
                </div>
                <?php require BACKEND_PATH . DS . "withdrawals" . DS . "pagination" . DS . "index.php"; ?>
            <?php endif; ?>
	    </div>
    </div>
</div>