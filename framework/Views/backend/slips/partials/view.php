<!-- Modal -->
<div class="modal fade" id="view-slip-<?= $slip->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center border-bottom-orange">
                <div class="modal-title text-muted">Verify details</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group input-group-lg col-md-6">
                        <label class="text-muted mb-2">Bank name</label>
                        <select class="custom-select bankname" name="bankname">
                            <option value=""><?= $slip->bankname; ?></option>
                        </select>
                        <small class="error bankname-error text-danger"></small>
                    </div>
                    <div class="form-group input-group-lg col-md-6">
                        <label class="text-muted mb-2">Account name</label>
                        <input type="text" name="accountname" class="form-control accountname" placeholder="e.g., Godson Dily" value="<?= $slip->accountname; ?>">
                        <small class="error accountname-error text-danger"></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group input-group-lg col-md-6">
                        <label class="text-muted mb-2">Account number</label>
                        <input type="text" name="accountnumber" class="form-control accountnumber" placeholder="e.g., 0001001111" value="<?= $slip->accountnumber; ?>">
                        <small class="error accountnumber-error text-danger"></small>
                    </div>
                    <div class="form-group input-group-lg col-md-6">
                        <label class="text-muted mb-2">Payment date</label>
                        <input type="text" name="paymentdate" class="form-control paymentdate" value="<?= Application\Core\Help::formatDate($slip->paymentdate); ?>">
                        <small class="error paymentdate-error text-danger"></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group input-group-lg col-md-6">
                        <label class="text-muted mb-2">Bank branch</label>
                        <input type="text" name="branch" class="form-control branch" placeholder="e.g., Lekki phase1" value="<?= $slip->branch; ?>">
                        <small class="error branch-error text-danger"></small>
                    </div>
                    <div class="form-group input-group-lg col-md-6">
                        <label class="text-muted mb-2">Amount paid</label>
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <small class="input-group-text">NGN</small>
                            </div>
                            <input type="number" min="1000" oninput="this.value = Math.abs(this.value)" name="amount" class="form-control amount" value="<?= $slip->amount; ?>">
                            <div class="input-group-append">
                                <small class="input-group-text">.00</small>
                             </div>
                        </div>
                        <small class="error amount-error text-danger"></small>
                    </div>
                </div>
                <div class="alert mb-2 mt-1 verify-slip-message d-none"></div>
            </div>
            <div class="modal-footer border-top-orange">
                <div class="d-flex justify-content-left">
                    <a href="javasctipt:;" class="btn border-0 orange-gradient orange-shadow rounded-pill text-white verify-slip verify-slip-button px-4" data-url="<?= DOMAIN; ?>/slips/verifySlip/<?= $slip->applicant; ?>">
                        <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none verify-slip-spinner mb-1">
                        Verify
                    </a>
                    <button type="button" class="btn bg-danger text-white ml-3" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>