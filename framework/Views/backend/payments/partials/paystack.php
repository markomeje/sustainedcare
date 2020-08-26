<!-- Modal -->
<div class="modal fade" id="paystack-payment" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center border-bottom-orange">
                <div class="modal-title text-muted">Online payment</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="paystack-payment-form" data-action="<?= DOMAIN; ?>/payments/paystackPayment">
                <div class="px-3">
                    <div class="alert alert-info mb-0 mt-4">Filling this form means that you want to pay the application fee with your card via paystack payments. After payments, please wait for a redirect to your profile for automated verification.</div>
                </div>
                <div class="px-3">
                    <div class="alert mt-4 mb-0 paystack-payment-message d-none"></div>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="applicant" value="<?= Application\Library\Session::get("id"); ?>">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Type</label>
                            <select class="custom-select form-control type" name="type">
                                <option value="paystack">Paystack</option>
                            </select>
                            <small class="error type-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Amount</label>
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
                        <button type="submit" class="btn border-0 orange-gradient orange-shadow rounded-pill text-white paystack-payment-button px-4">
                            <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none paystack-payment-spinner mb-1">
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