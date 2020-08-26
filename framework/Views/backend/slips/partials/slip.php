<!-- Modal -->
<div class="modal fade" id="payment-slip" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center border-bottom-orange">
                <div class="modal-title text-muted">Payment slip</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="payment-slip-form" data-action="<?= DOMAIN; ?>/slips/addSlip">
                <div class="px-3">
                    <div class="alert alert-info mb-0 mt-4">Filling this form means that you have paid the application fee to the bank details as specified. Please note that any false payment details will not be verified.</div>
                </div>
                <div class="px-3">
                    <div class="alert mt-4 mb-0 payment-slip-message d-none"></div>
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
                                        <option value="<?= ucwords($bank); ?>">
                                            <?= ucwords($bank); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error bankname-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Account name</label>
                            <input type="text" name="accountname" class="form-control accountname" placeholder="e.g., Godson Dily">
                            <small class="error accountname-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Account number</label>
                            <input type="text" name="accountnumber" class="form-control accountnumber" placeholder="e.g., 0001001111">
                            <small class="error accountnumber-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Payment date</label>
                            <input type="date" name="paymentdate" class="form-control paymentdate">
                            <small class="error paymentdate-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Bank branch</label>
                            <input type="text" name="branch" class="form-control branch" placeholder="e.g., Lekki phase1">
                            <small class="error branch-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Amount paid</label>
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                    <small class="input-group-text">NGN</small>
                                </div>
                                <input type="number" min="1000" oninput="this.value = Math.abs(this.value)" name="amount" class="form-control amount">
                                <div class="input-group-append">
                                    <small class="input-group-text">.00</small>
                                 </div>
                            </div>
                            <small class="error amount-error text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn border-0 orange-gradient orange-shadow rounded-pill text-white payment-slip-button px-4">
                            <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none payment-slip-spinner mb-1">
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