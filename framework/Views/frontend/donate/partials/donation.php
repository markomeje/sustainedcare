<div class="col-12 col-md-10 col-lg-8">
    <h1 class="text-shade text-center">Donation form</h1>
    <p class="text-muted text-center">Please all fields are required</p>
     <form method="POST" action="javascript:;" class="donate-form" data-action="<?= DOMAIN; ?>/donations/donate">
        <input type="hidden" name="type" value="<?= empty($type) ? "" : $type; ?>">
        <div class="form-row">
            <div class="form-group col-12">
                <label class="text-muted">Amount</label>
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <?= isset($nairaSymbol) ? $nairaSymbol : "$"  ?>
                        </span>
                    </div>
                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" name="amount" class="form-control amount" value="<?= empty($amount) ? "" : (int)$amount; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                     </div>
                </div>
                <small class="error amount-error text-danger"></small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group input-group-lg col-md-6">
                <label class="text-muted">Firstname</label>
                <input type="text" name="firstname" class="form-control firstname" placeholder="e.g., limet">
                <small class="error firstname-error text-danger"></small>
            </div>
            <div class="form-group input-group-lg col-md-6">
                <label class="text-muted">Lastname</label>
                <input type="text" name="lastname" class="form-control lastname" placeholder="e.g., john">
                <small class="error lastname-error text-danger"></small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group input-group-lg col-md-6">
                <label class="text-muted">Email</label>
                <input type="email" name="email" class="form-control email" placeholder="e.g., john@email.com">
                <small class="error email-error text-danger"></small>
            </div>
            <div class="form-group input-group-lg col-md-6">
                <label class="text-muted d-block">Phone</label>
                <input type="tel" name="phone" class="form-control phone w-100" placeholder="e.g., +1 702 123 456">
                <small class="error phone-error text-danger"></small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group input-group-lg col-md-6">
                <label class="text-muted">Country</label>
                <select class="custom-select country" name="country">
                    <?php if(empty($countries)): ?>
                        <option value="">No countries available</option>
                    <?php else: ?>
                        <option value="">Select country</option>
                        <?php foreach($countries as $country): ?>
                            <option value="<?= $country; ?>">
                                <?= $country; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <small class="error country-error text-danger"></small>
            </div>
            <div class="form-group input-group-lg col-md-6">
                <label class="text-muted">Currency</label>
                <select class="custom-select currency" name="currency">
                    <option value="">Select currency</option>
                    <?php if(isset($nairaSymbol)): ?>
                        <option value="<?= $nairaSymbol; ?>">Nigerian Naira</option>
                    <?php elseif(isset($crypto)): ?>
                        <?php foreach($crypto as $key => $value): ?>
                            <option value="<?= $key; ?>">
                                <?= $value; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="USD">US Dollar</option>
                    <?php endif; ?>
                </select>
                <small class="error currency-error text-danger"></small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group input-group-lg col-12">
                <label class="text-muted">Comment</label>
                <textarea name="comment" class="form-control comment" placeholder="e.g., I love helping people" rows="4"></textarea>
                <small class="error comment-error text-danger"></small>
            </div>
        </div>
        <div class="d-flex justify-content-left mt-2">
            <button type="submit" class="btn border-0 lemon-gradient forest-shadow rounded-pill text-white donate-button px-4">
                <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none donate-spinner mb-1">
                Continue
            </button>
        </div>
        <div class="alert-danger px-3 py-2 my-4 rounded donate-message d-none"></div>
    </form>
</div>