<!-- Modal -->
<div class="modal fade" id="add-referrer" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg border-0" role="document">
        <div class="modal-content">
            <div class="modal-header py-2 align-items-center">
                <h5 class="modal-title text-muted font-weight-normal">Add referrer</h5>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="add-referrer-form" data-action="<?= DOMAIN; ?>/referrer/add">
                <div class="px-3">
                    <div class="alert add-referrer-message mb-0 mt-3 px-3 py-2 d-none rounded"></div>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="referrer-name">Referrer name</label>
                                <input type="text" name="name" class="form-control referrer-name" placeholder="e.g., femil">
                                <small class="error name-error text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="referrer-bonus">Percentage bonus</label>
                                <input type="number" name="bonus" class="form-control referrer-bonus" placeholder="e.g., 10">
                                <small class="error bonus-error text-danger"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-right">
                        <button type="submit" class="btn bg-custom text-white add-referrer-button d-flex justify-content-center align-items-center">
                            <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none add-referrer-spinner">
                            Submit
                        </button>
                        <button type="button" class="btn bg-danger text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                    
                </div>
                <div class="px-3">
                    <div class="alert register-message px-3 py-2 mb-3 d-none rounded"></div>
                </div>
            </form>
        </div>
    </div>
</div>