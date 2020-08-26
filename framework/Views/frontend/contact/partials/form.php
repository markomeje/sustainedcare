<form method="POST" action="javascript:;" class="contact-form" data-action="<?= DOMAIN; ?>/contact/emailContact">
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
    <!-- <div class="form-row">
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
            <label class="text-muted d-block">City</label>
            <input type="text" name="city" class="form-control city w-100" placeholder="e.g., palo alto">
            <small class="error city-error text-danger"></small>
        </div>
    </div> -->
    <div class="form-row">
        <div class="form-group input-group-lg col-12">
            <label class="text-muted">Message</label>
            <textarea name="message" class="form-control message" placeholder="e.g., Enter your message here" rows="4"></textarea>
            <small class="error message-error text-danger"></small>
        </div>
    </div>
    <div class="d-flex justify-content-left mt-2">
        <button type="submit" class="btn border-0 lemon-gradient forest-shadow rounded-pill text-white contact-button px-4">
            <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none contact-spinner mb-1">
            Submit
        </button>
    </div>
    <div class="alert-danger px-3 py-2 my-4 rounded contact-message d-none"></div>
</form>
