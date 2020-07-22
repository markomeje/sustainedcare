<!-- Modal -->
<div class="modal fade" id="edit-referrer-<?= $referrer->id; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg border-0" role="document">
        <div class="modal-content">
            <div class="modal-header py-2 align-items-center">
                <h5 class="modal-title text-muted font-weight-normal">Edit referrer</h5>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="edit-referrer-form" data-action="<?= DOMAIN; ?>/referrer/edit/<?= $referrer->id; ?>">
                <div class="px-3">
                    <div class="alert edit-referrer-message mb-0 mt-3 px-3 py-2 d-none rounded"></div>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="referrer-name">Referrer name</label>
                                <input type="text" name="name" class="form-control referrer-name" placeholder="e.g., femil" value="<?= $referrer->name; ?>">
                                <small class="error name-error text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="referrer-bonus">Percentage bonus</label>
                                <input type="number" name="bonus" class="form-control referrer-bonus" placeholder="e.g., 10" value="<?= $referrer->bonus; ?>">
                                <small class="error bonus-error text-danger"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-right">
                        <button type="submit" class="btn bg-custom text-white edit-referrer-button d-flex justify-content-center align-items-center">
                            <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none edit-referrer-spinner">
                            Submit
                        </button>
                        <button type="button" class="btn bg-danger text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>