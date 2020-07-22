<!-- Modal -->
<div class="modal fade" id="add-expenses" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg border-0" role="document">
        <div class="modal-content">
            <div class="modal-header py-2 align-items-center">
                <h5 class="modal-title text-muted font-weight-normal">Add expenses</h5>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="add-expenses-form" data-action="<?= DOMAIN; ?>/expenses/add">
                <div class="px-3">
                    <div class="alert add-expenses-message mb-0 mt-3 px-3 py-2 d-none rounded"></div>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="amount">Amount</label>
                                <input type="number" name="amount" class="form-control amount" placeholder="e.g., 6340">
                                <small class="error amount-error text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="type">Type</label>
                                <select class="custom-select type" name="type">
                                    <?php if(empty($expenseTypes)): ?>
                                        <option value="">No expenses types</option>
                                    <?php else: ?>
                                        <option value="">Select type</option>
                                        <?php foreach($expenseTypes as $type): ?>
                                            <option value="<?= $type; ?>">
                                                <?= ucfirst($type); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <small class="error type-error text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="item">Item (details)</label>
                                <textarea class="form-control item" name="item" rows="3" placeholder="e.g., Service charge for cleaning."></textarea>
                                <small class="error item-error text-danger"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-right">
                        <button type="submit" class="btn bg-custom text-white add-expenses-button d-flex justify-content-center align-items-center">
                            <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none add-expenses-spinner">
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