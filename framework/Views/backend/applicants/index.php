<div class="wrapper">
    <!-- DASHBOARD NAVBAR -->
    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="pt-5">
	    <div class="container pt-5">
	        <div class="row">
	            <?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
	            <div class="col-12 col-md-6 col-lg-6 mb-3">
	                <form action="<?= DOMAIN; ?>/applicants/search/" method="GET" class="search-applicant">
                        <div class="row no-gutters">
                            <div class="col-10 col-md-10 col-lg-10">
                                <div class="form-group input-group-lg">
                                    <input type="search" name="query" class="form-control backend-search-input border-orange" placeholder="Search applicants" autocomplete="on" value="<?= isset($_GET['query']) ? $_GET['query'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-2 col-md-2 col-lg-2">
                                <button type="submit" class="btn orange-gradient btn-block text-white mb-0 backend-search-button border-orange">
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
            				<?= empty($applicantsCount) ? 0 : $applicantsCount; ?> applicants
            			</div>
            		</div>
            		<div class="col-12 col-md-6 col-lg-6 mb-4">
            			<div class="text-muted bg-white light-shadow rounded px-3 py-2 d-flex">
            				<a href="javascript:;" class="text-muted">Delete</a>
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
                	    <?php require BACKEND_PATH . DS . "applicants" . DS . "partials" . DS . "view.php"; ?>
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