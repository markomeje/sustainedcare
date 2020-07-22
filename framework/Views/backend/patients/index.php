<div class="wrapper bg-ash">
    <!-- DASHBOARD NAVBAR -->
    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="bg-custom pt-5">
	    <div class="container pt-5">
	        <div class="row align-items-bottom pb-2">
	            <?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
	            <div class="col-12 col-md-6 col-lg-6 mb-4">
	                <form action="<?= DOMAIN; ?>/patients/search/" method="GET" class="search-patient">
                        <div class="row no-gutters">
                            <div class="col-10 col-md-10 col-lg-10">
                                <div class="form-group mb-0">
                                    <input type="search" name="query" class="form-control backend-search-input border-0" placeholder="Search patients" autocomplete="on" value="<?= isset($_GET['query']) ? $_GET['query'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-2 col-md-2 col-lg-2">
                                <button type="submit" class="btn bg-gradient btn-block text-white mb-0 backend-search-button border-0">
                                    <i class="icofont-ui-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
	            </div>
	        </div>
	    </div>
    </div>
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <div class="border-top border-bottom px-3 py-2 rounded d-flex">
                        <a href="javascript:;" class="text-muted mr-3" data-toggle="modal" data-target="#add-patient">Add patient</a>
                        <a href="javascript:;" class="text-muted mr-3">
                            <?= empty($count) ? "No patients yet" : $count." patient(s)"; ?>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="border-top border-bottom px-3 py-2 rounded">
                        <a href="javascript:;" class="text-muted">Delete</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if(empty($patients)): ?>
                    <div class="text-muted px-3">No patients added.</div>
                <?php else: ?>
                    <div class="col-12 mb-4">
                        <div class="table-responsive">
                            <?php require BACKEND_PATH . DS . "patients" . DS . "partials" . DS . "table.php"; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php require BACKEND_PATH . DS . "patients" . DS . "partials" . DS . "add.php"; ?>
            </div>
        </div>
    </div>
</div>