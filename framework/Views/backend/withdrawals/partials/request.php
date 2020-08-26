<!-- Modal -->
<div class="modal fade" id="request-cash" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center border-bottom-orange">
                <div class="modal-title text-muted">Request Cash</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="request-cash-form" data-action="<?= DOMAIN; ?>/withdrawals/requestCash">
                <div class="px-3">
                    <div class="alert mt-4 mb-0 rounded request-cash-message d-none"></div>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="applicant" value="<?= Application\Library\Session::get("id"); ?>">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Amount</label>
                            <select class="custom-select amount" name="amount">
                                <option value="">Select amount</option>
                                <?php if(!empty($withdrawableAmount) && $withdrawableAmount >= 2000): ?>
                                    <option value="<?= $withdrawableAmount; ?>">NGN<?= $withdrawableAmount; ?></option>
                                <?php else: ?>
                                    <option value="">No amount</option>
                                <?php endif; ?>
                            </select>
                            <small class="error amount-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Priority</label>
                            <select class="custom-select priority" name="priority">
                                <option value="">Select priority</option>
                                <option value="High">High</option>
                                <option value="Average">Average</option>
                                <option value="Low">Low</option>
                            </select>
                            <small class="error priority-error text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn border-0 orange-gradient orange-shadow rounded-pill text-white request-cash-button px-4">
                            <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none request-cash-spinner mb-1">
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