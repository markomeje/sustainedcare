<div class="wrapper bg-ash">
    <!-- DASHBOARD NAVBAR -->
    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="bg-custom mb-4">
	    <div class="container top-container">
	        <div class="row align-items-bottom pb-2">
	            <?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
	            <div class="col-12 col-md-6 col-lg-6 mb-4">
	                <form action="<?= DOMAIN; ?>/referrer/search/" method="GET" class="search-patient">
                        <div class="row no-gutters">
                            <div class="col-10 col-md-10 col-lg-10">
                                <div class="form-group mb-0">
                                    <input type="search" name="query" class="form-control backend-search-input border-0" placeholder="Search referrer" autocomplete="on" value="<?= isset($_GET['query']) ? $_GET['query'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-2 col-md-2 col-lg-2">
                                <button type="submit" class="btn bg-custom btn-block text-white mb-0 backend-search-button border-0">
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
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <div class="border-top-custom border-bottom-custom px-3 py-2 rounded d-flex">
                        <a href="javascript:;" class="text-muted">
                            <?= empty($referrers) ? "No referrer(s) found" : count($referrers)." referrer(s) found"; ?>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="border-top-custom border-bottom-custom  px-3 py-2 rounded">
                        <a href="javascript:;" class="text-muted">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if(empty($referrers)): ?>
                    <div class="text-muted px-3">No search results</div>
                <?php else: ?>
                    <div class="col-12 mb-3">
                        <div class="table-responsive">
                            <?php require BACKEND_PATH . DS . "referrer" . DS . "partials" . DS . "table.php"; ?>
                        </div>
                        <div class="pagination">
                            <?php require BACKEND_PATH . DS . "referrer" . DS . "pagination" . DS . "search.php"; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php require BACKEND_PATH . DS . "referrer" . DS . "partials" . DS . "add.php"; ?>
    </div>
</div>