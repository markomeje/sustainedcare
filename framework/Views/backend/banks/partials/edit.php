<!-- Modal -->
<div class="modal fade" id="edit-bank-details" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center border-bottom-orange">
                <div class="modal-title text-muted">Edit bank details</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="edit-bank-details-form" data-action="<?= DOMAIN; ?>/banks/editBank">
                <div class="px-3">
                    <div class="alert mt-4 mb-0 edit-bank-details-message d-none"></div>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="applicant" value="<?= Application\Library\Session::get("id"); ?>">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Bank name</label>
                            <select class="custom-select bankname" name="bankname">
                                <option value="">Select bank</option>
                                <?php if(empty($nigerianBanks)): ?>
                                    <select value="">No banks available</select>
                                <?php else: ?>
                                    <?php foreach($nigerianBanks as $bank): ?>
                                        <?php $bankname = isset($bank_details->bankname) ? $bank_details->bankname : ""; ?>
                                        <option value="<?= ucwords($bank); ?>" <?= ($bankname === $bank) ? "selected" : ""; ?>>
                                            <?= ucwords($bank); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error bankname-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Account name</label>
                            <input type="text" name="accountname" class="form-control accountname" placeholder="e.g., Godson Dily" value="<?= isset($bank_details->accountname) ? $bank_details->accountname : ""; ?>">
                            <small class="error accountname-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Account number</label>
                            <input type="text" name="accountnumber" class="form-control accountnumber" placeholder="e.g., 0001001111" value="<?= isset($bank_details->accountnumber) ? $bank_details->accountnumber : ""; ?>">
                            <small class="error accountnumber-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Account type</label>
                            <select class="custom-select form-control accounttype" name="accounttype">
                                <option value="">Select account type</option>
                                <?php $accounttype = isset($bank_details->accounttype) ? $bank_details->accounttype : ""; ?>
                                <option value="Savings" <?= ($accounttype === "Savings") ? "selected" : ""; ?>>Savings</option>
                                <option value="Current" <?= ($accounttype === "Current") ? "selected" : ""; ?>>Current</option>
                                <option value="Others" <?= ($accounttype === "Others") ? "selected" : ""; ?>>Others</option>
                            </select>
                            <small class="error accounttype-error text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn border-0 orange-gradient orange-shadow rounded-pill text-white edit-bank-details-button px-4">
                            <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none edit-bank-details-spinner mb-1">
                            Save
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