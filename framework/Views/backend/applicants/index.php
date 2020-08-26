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
	                <form action="<?= DOMAIN; ?>/applicants/search/" method="GET" class="search-applicant">
                        <div class="row no-gutters">
                            <div class="col-10 col-md-10 col-lg-10">
                                <div class="form-group input-group-lg mb-0">
                                    <input type="search" name="query" class="form-control backend-search-input border" placeholder="Search applicants" autocomplete="on" value="<?= isset($_GET['query']) ? $_GET['query'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-2 col-md-2 col-lg-2">
                                <button type="submit" class="btn bg-gray btn-block text-muted mb-0 backend-search-button border">
                                    <i class="icofont-ui-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
	            </div>
	        </div>
	    </div>
    </div>
    <div class="">
	    <div class="container">
    		<?php if(empty($applicants)): ?>
                <div class="text-muted">No applicants yet.</div>
            <?php else: ?>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 mb-4">
                        <div class="text-muted bg-white light-shadow rounded px-3 py-2 d-flex">
                            <?= empty($applicantsCount) ? 0 : $applicantsCount; ?> applicants applied
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 mb-4">
                        <div class="text-muted bg-white light-shadow rounded px-3 py-2 d-flex">
                            <a href="javascript:;" class="text-muted">Multiple delete</a>
                        </div>
                    </div>
                </div>
            	<div class="row">
	            	<?php foreach($applicants as $applicant): ?>
	                    <?php require BACKEND_PATH . DS . "applicants" . DS . "partials" . DS . "listings.php"; ?>
	                <?php endforeach; ?>
                </div>
                <div class="">
                	<?php foreach($applicants as $applicant): ?>
                	    <?php require BACKEND_PATH . DS . "applicants" . DS . "partials" . DS . "edit.php"; ?>
                	<?php endforeach; ?>
                </div>
            <?php endif; ?>
			<?php require BACKEND_PATH . DS . "applicants" . DS . "pagination" . DS . "index.php"; ?>
	    </div>
    </div>
</div>