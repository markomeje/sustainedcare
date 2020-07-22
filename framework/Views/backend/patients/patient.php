<div class="wrapper bg-ash">
    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="bg-custom pt-5">
	    <div class="container pt-5">
	        <div class="row align-items-bottom">
	            <?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
	            <div class="col-12 col-md-6 col-lg-6 mb-2">
	                <div class="form-group">
                        <select class="custom-select backend-links border-0 text-muted" data-url="<?= DOMAIN; ?>">
                            <?php if(empty($links)): ?>
                                <option value="">No links yet</option>
                            <?php else: ?>
                                <?php foreach($links as $link): ?>
                                    <option value="<?= $link; ?>" <?= ($controller === $link) ? "selected" : ""; ?>>
                                        <?= ucfirst($link); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
	            </div>
	        </div>
	    </div>
    </div>
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <?php if(empty($patient)): ?>
                    <div class="text-muted px-3">Patient not found.</div>
                <?php else: ?>
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="accordion mt-2" id="accordions-two">
                            <div class="">
                                <?php require BACKEND_PATH . DS . 'bills' . DS . 'column.php'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="accordion mt-2" id="accordions-three">
                            <div class="">
                                <?php require BACKEND_PATH . DS . 'payments' . DS . 'column.php'; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>