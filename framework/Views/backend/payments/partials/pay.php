<!-- PATIENT ADMISSION Modal -->
<div class="modal fade" id="pay-bill-<?= $bill->id; ?>" tabindex="-1" role="dialog" aria-labelledby="edit-bill-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-2 align-items-center">
                <h5 class="modal-title text-muted font-weight-normal">Pay bill</h5>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="pay-bill-form" data-action="<?= DOMAIN; ?>/payments/pay/<?= $bill->patient; ?>">
                <div class="px-3">
                     <div class="alert py-2 px-3 mb-0 mt-3 rounded pay-bill-message d-none"></div>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="bill" value="<?= empty($bill->id) ? "" : $bill->id; ?>">
                    <div class="form-row">
                        <div class="form-group mb-2 col-md-6">
                            <label for="mode">Payment mode</label>
                            <select class="custom-select mode" name="mode">
                                <?php if(empty($modes)): ?>
                                    <option>No payment modes</option>
                                <?php else: ?>
                                    <option value="">Select mode</option>
                                    <?php foreach($modes as $mode): ?>
                                        <option value="<?= $mode; ?>">
                                            <?= ucfirst($mode); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error mode-error text-danger"></small>
                        </div>
                        <div class="form-group mb-2 col-md-6">
                            <?php $remainingBill = ($bill->amount - $bill->paid); ?>
                            <label for="amount">Amount <em class="text-success">(<strong><del>N</del></strong><?= $remainingBill; ?>)</em></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent" style="height: 38px;">
                                        <strong><del>N</del></strong>
                                    </span>
                                </div>
                                <input type="text" class="form-control amount" name="amount" placeholder="e.g., 55000" value="<?= $remainingBill; ?>">
                            </div>
                            <small class="error amount-error text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-right">
                        <button type="submit" class="btn bg-custom text-white pay-bill-button border-0">
                            <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none pay-bill-spinner">
                            Pay
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
