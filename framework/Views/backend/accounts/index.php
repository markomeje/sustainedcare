<div class="wrapper bg-ash">
    <!-- DASHBOARD NAVBAR -->
    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="bg-custom mb-4 top-wrapper">
	    <div class="container top-container">
	        <div class="row align-items-bottom pb-2">
	            <?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
	            <div class="col-12 col-md-6 col-lg-6 mb-4">
	                <form action="<?= DOMAIN; ?>/accounts/search/" method="GET" class="search-accounts">
                        <div class="row no-gutters">
                            <div class="col-10 col-md-10 col-lg-10">
                                <div class="form-group mb-0">
                                    <input type="search" name="query" class="form-control backend-search-input border-0" placeholder="Search accounts" autocomplete="on" value="<?= isset($_GET['query']) ? $_GET['query'] : ''; ?>">
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
    <dir class="container">
        <div class="accordion mt-2" id="incomes-accordions">
            <div class="cursor-pointer p-3 box-shadow clearfix mb-4 rounded" data-toggle="collapse" data-target="#incomes">
                <div class="text-muted float-left">
                    Accounts records
                </div>
                <div class="text-muted float-right">
                    <div>
                        <i class="icofont-rounded-down"></i>
                    </div>
                </div>
            </div>
            <div id="incomes" class="collapse show" data-parent="#incomes-accordions">
                <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <select class="custom-select months box-shadow border-0">
                                    <option class="">
                                        <?= date("Y"); ?>
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <select class="custom-select months box-shadow border-0">
                                    <?php if(empty($monthsOfYear)): ?>
                                        <option class="">No months listed</option>
                                    <?php else: ?>
                                        <?php foreach($monthsOfYear as $key => $value): ?>
                                            <option class="<?= $key; ?>" <?= (date("m") === $key) ? "selected" : ""; ?>>
                                                <?= $value; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <select class="custom-select months box-shadow border-0">
                                    <option class="">Week one</option>
                                    <option class="">Week two</option>
                                    <option class="">Week three</option>
                                    <option class="">Week four</option>
                                    <option class="">Week five</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if(empty($allAccounts)): ?>
                        <div>No accounts yet</div>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="table-responsive">
                                <?php require BACKEND_PATH . DS . "accounts" . DS . "partials" . DS . "table.php"; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="accordion" id="summary-accordions">
            <div class="cursor-pointer p-3 box-shadow clearfix mb-4 rounded" data-toggle="collapse" data-target="#summary">
                <div class="text-muted float-left">
                    Accounts summary
                </div>
                <div class="text-muted float-right">
                    <div>
                        <i class="icofont-rounded-down"></i>
                    </div>
                </div>
            </div>
            <div id="summary" class="collapse show" data-parent="#summary-accordions">
                <div class="row">
                    <?php require BACKEND_PATH . DS . "accounts" . DS . "partials" . DS . "summary.php"; ?>
                </div>
            </div>
        </div>
    </dir>
</div>