<form action="javascript:;" method="POST" class="apply-form" data-action="<?= DOMAIN; ?>/applicants/apply">
    <div class="form-row">
        <div class="form-group input-group-lg col-md-6">
            <label class="text-muted">Surname</label>
            <input type="text" name="surname" class="form-control surname" id="surname" placeholder="e.g., john">
            <small class="error surname-error text-danger"></small>
        </div>
        <div class="form-group input-group-lg col-md-6">
          	<label class="text-muted">Firstname</label>
          	<input type="text" name="firstname" class="form-control firstname" placeholder="e.g., limet">
          	<small class="error firstname-error text-danger"></small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group input-group-lg col-md-6">
            <label class="text-muted" for="middlename">Middlename</label>
            <input type="text" name="middlename" class="form-control middlename" placeholder="e.g., olanmma">
            <small class="error middlename-error text-danger"></small>
        </div>
        <div class="form-group input-group-lg col-md-6">
            <label class="text-muted" for="phone">Phone</label>
            <input type="tel" name="phone" class="form-control phone" placeholder="e.g., 070062900011">
            <small class="error phone-error text-danger"></small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group input-group-lg col-md-6">
          	<label class="text-muted">Active email</label>
          	<input type="email" name="email" class="form-control email" placeholder="e.g., john@doe.com">
          	<small class="error email-error text-danger"></small>
        </div>
        <div class="form-group input-group-lg col-md-6">
          	<label class="text-muted">Referral code 
                (<?php if(empty($code)): ?>
                    <em class="text-info">if any</em> 
                <?php else: ?>
                    <em class="text-success">already filled</em>
                <?php endif; ?>)
            </label>
          	<input type="text" name="referrer" class="form-control referrer" placeholder="e.g., tn8e721hd902" value="<?= empty($code) ? "" : $code; ?>">
          	<small class="error referrer-error text-danger"></small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group input-group-lg col-md-6">
          	<label class="text-muted">Password</label>
          	<input type="password" name="password" class="form-control password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
          	<small class="error password-error text-danger"></small>
        </div>
        <div class="form-group input-group-lg col-md-6">
          	<label class="text-muted">Confirm password</label>
          	<input type="password" name="confirm-password" class="form-control confirm-password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
          	<small class="error confirm-password-error text-danger"></small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group input-group-lg col-md-6">
          	<label class="text-muted">Birthdate</label>
          	<input type="date" name="birthdate" class="form-control birthdate">
          	<small class="error birthdate-error text-danger"></small>
        </div>
        <div class="form-group input-group-lg col-md-6">
          	<label class="text-muted">Street address</label>
          	<input type="text" name="address" class="form-control address" placeholder="e.g., no 13 gian street">
          	<small class="error address-error text-danger"></small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group input-group-lg col-md-6">
            <label class="text-muted" for="lga">Amount</label>
            <select class="custom-select amount" name="amount">
                <?php if(empty($grantAmounts)): ?>
                    <option value="">No amounts available</option>
                <?php else: ?>
                    <option value="">Select amount</option>
                    <?php foreach($grantAmounts as $amount): ?>
                        <option value="<?= (int)$amount; ?>">
                            NGN<?= number_format($amount); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <small class="error amount-error text-danger"></small>
        </div>
        <div class="form-group input-group-lg col-md-6">
            <label class="text-muted">State located</label>
            <select class="custom-select state" name="state">
                <?php if(empty($nigerianStates)): ?>
                    <option value="">No states available</option>
                <?php else: ?>
                	<option value="">Select state</option>
                	<?php foreach($nigerianStates as $state): ?>
	                	<option value="<?= $state; ?>">
	                		<?= $state; ?>
	                	</option>
	                <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <small class="error state-error text-danger"></small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group input-group-lg col-md-6">
          	<label class="text-muted" for="gender">Gender</label>
          	<select class="custom-select gender" name="gender">
            	<?php if(empty($genders)): ?>
                    <option value="">No gender available</option>
                <?php else: ?>
                	<option value="">Select gender</option>
                	<?php foreach($genders as $gender): ?>
	                	<option value="<?= $gender; ?>">
	                		<?= $gender; ?>
	                	</option>
	                <?php endforeach; ?>
                <?php endif; ?>
          	</select>
          	<small class="error gender-error text-danger"></small>
        </div>
        <div class="form-group input-group-lg col-md-6">
            <label class="text-muted">Relationship status</label>
            <select class="custom-select relationship" name="relationship">
            	<?php if(empty($relationshipStatus)): ?>
                    <option value="">No status available</option>
                <?php else: ?>
                	<option value="">Select status</option>
                	<?php foreach($relationshipStatus as $status): ?>
	                	<option value="<?= $status; ?>">
	                		<?= $status; ?>
	                	</option>
	                <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <small class="error relationship-error text-danger"></small>
        </div>
    </div>
    <div class="form-row">
    	<div class="form-group input-group-lg col-md-12">
        	<label class="text-muted">Why do you want this grant?</label>
        	<textarea class="form-control why" name="why" rows="4" placeholder="eg., must be between 25 - 255 characters"></textarea>
        	<small class="error why-error text-danger"></small>
        </div>
    </div>
    <div class="form-row">
    	<div class="form-group input-group-lg col-md-12">
        	<label class="text-muted">How will you use this grant?</label>
        	<textarea class="form-control how" name="how" rows="4" placeholder="eg., answer must be between 25 - 255 characters"></textarea>
        	<small class="error how-error text-danger"></small>
        </div>
    </div>
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" value="on" name="agree" class="custom-control-input agree" id="agree">
            <label class="custom-control-label text-muted cursor-pointer" for="agree">I agree to <a href="<?= DOMAIN; ?>/terms" style="font-size: 14px !important;">terms and conditions</a>.</label>
        </div>
        <small class="error agree-error text-danger"></small>
    </div>
    <div class="clearfix mt-3">
	    <button type="submit" class="btn border-0 orange-gradient orange-shadow rounded-pill text-white apply-button px-4">
			<img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none apply-spinner mb-1">
			Apply
		</button>
	</div>
	<div class="apply-message px-3 py-2 mt-4 rounded d-none text-muted"></div>
</form>