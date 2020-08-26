<div class="position-relative">
    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="pt-5">
	    <div class="container pt-5">
	        <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-4">
	                <?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
                </div>
	            <div class="col-12 col-md-6 col-lg-6 mb-4">
	                <form action="<?= DOMAIN; ?>/slips/search/" method="GET" class="search-slip">
                        <div class="row no-gutters">
                            <div class="col-10 col-md-10 col-lg-10">
                                <div class="form-group input-group-lg mb-0">
                                    <input type="search" name="query" class="form-control backend-search-input border" placeholder="Search slips" autocomplete="on" value="<?= isset($_GET['query']) ? $_GET['query'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-2 col-md-2 col-lg-2">
                                <button type="submit" class="btn bg-light btn-block text-muted mb-0 backend-search-button border">
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
    		<?php if(empty($slips)): ?>
                <div class="text-muted">No slip(s) found.</div>
            <?php else: ?>
            	<div class="row">
            		<div class="col-12 col-md-6 col-lg-6 mb-4">
            			<div class="text-muted bg-white light-shadow rounded px-3 py-2 d-flex">
            				<?= empty($slips) ? 0 : count($slips); ?> slip(s) found
            			</div>
            		</div>
            		<div class="col-12 col-md-6 col-lg-6 mb-4">
            			<div class="text-muted bg-white light-shadow rounded px-3 py-2 d-flex">
            				<a href="javascript:;" class="text-muted">Multiple delete</a>
            			</div>
            		</div>
            	</div>
            	<div class="row">
	            	<?php foreach($slips as $slip): ?>
	                    <?php require BACKEND_PATH . DS . "slips" . DS . "partials" . DS . "listings.php"; ?>
	                <?php endforeach; ?>
                </div>
                <div class="">
                	<?php foreach($slips as $slip): ?>
                	    <?php require BACKEND_PATH . DS . "slips" . DS . "partials" . DS . "view.php"; ?>
                	<?php endforeach; ?>
                </div>
                <?php require BACKEND_PATH . DS . "slips" . DS . "pagination" . DS . "search.php"; ?>
            <?php endif; ?>
	    </div>
    </div>
</div>