<div class="position-relative">
    <div class="backend-navbar">
        <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    </div>
    <div class="pt-5">
	    <div class="container pt-5">
	    </div>
    </div>
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="accordion mb-4" id="accordions-one">
                        <div class="cursor-pointer bg-dark px-3 py-2 clearfix mb-3 rounded" data-toggle="collapse" data-target="#profile-details">
                            <div class="text-white float-left">
                                Application details
                            </div>
                            <div class="float-right text-white">
                                <i class="icofont-rounded-down"></i>
                            </div>
                        </div>
                        <div id="profile-details" class="collapse mb-3 show" data-parent="#accordions-one">
                            <?php if(empty($application_details)): ?>
                                <div class="alert alert-danger">No application details found.</div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Surname</label>
                                        <input type="text" name="surname" class="form-control surname" value="<?= empty($application_details->surname) ? "" : $application_details->surname; ?>">
                                        <small class="error surname-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Firstname</label>
                                        <input type="text" name="firstname" class="form-control firstname" value="<?= empty($application_details->firstname) ? "" : $application_details->firstname; ?>">
                                        <small class="error firstname-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Middlename</label>
                                        <input type="text" name="middlename" class="form-control middlename" value="<?= empty($application_details->middlename) ? "" : $application_details->middlename; ?>">
                                        <small class="error middlename-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Phone</label>
                                        <input type="text" name="phone" class="form-control phone" value="<?= empty($application_details->phone) ? "" : $application_details->phone; ?>">
                                        <small class="error phone-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Address</label>
                                        <input type="text" name="address" class="form-control address" value="<?= empty($application_details->address) ? "" : $application_details->address; ?>">
                                        <small class="error address-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Gender</label>
                                        <input type="text" name="gender" class="form-control gender" value="<?= empty($application_details->gender) ? "" : $application_details->gender; ?>">
                                        <small class="error gender-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Relationship</label>
                                        <input type="text" name="relationship" class="form-control relationship" value="<?= empty($application_details->relationship) ? "" : $application_details->relationship; ?>">
                                        <small class="error relationship-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Birthdate</label>
                                        <input type="text" name="birthdate" class="form-control birthdate" value="<?= empty($application_details->birthdate) ? "" : Application\Core\Help::formatDate($application_details->birthdate); ?>">
                                        <small class="error birthdate-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">State</label>
                                        <input type="text" name="state" class="form-control state" value="<?= empty($application_details->state) ? "" : $application_details->state; ?>">
                                        <small class="error state-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Grant amount</label>
                                        <input type="text" name="amount" class="form-control amount" value="<?= empty($application_details->amount) ? "" : "NGN".number_format($application_details->amount); ?>">
                                        <small class="error amount-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-12">
                                        <label class="text-muted">How will you use this grant? (Answer)</label>
                                        <textarea class="form-control" rows="3"><?= isset($application_details->how) ? $application_details->how : ""; ?></textarea>
                                    </div>
                                    <div class="form-group input-group-lg col-12">
                                        <label class="text-muted">Why do you want this grant? (Answer)</label>
                                        <textarea class="form-control" rows="3"><?= isset($application_details->why) ? $application_details->why : ""; ?></textarea>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="accordion mb-4" id="accordions-two">
                        <div class="cursor-pointer bg-dark px-3 py-2 clearfix mb-3 rounded" data-toggle="collapse" data-target="#bank-details">
                            <div class="text-white float-left">
                                Bank details
                            </div>
                            <div class="float-right text-white">
                                <i class="icofont-rounded-down"></i>
                            </div>
                        </div>
                        <div id="bank-details" class="collapse mb-3 show" data-parent="#accordions-two">
                            <?php if(empty($bank_details)): ?>
                                <div class="alert alert-danger">No bank details addded.</div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Bank name</label>
                                        <input type="text" name="bankname" class="form-control bankname" placeholder="e.g., john" value="<?= empty($bank_details->bankname) ? "" : $bank_details->bankname; ?>">
                                        <small class="error bankname-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Account name</label>
                                        <input type="text" name="accountname" class="form-control accountname" placeholder="e.g., john" value="<?= empty($bank_details->accountname) ? "" : $bank_details->accountname; ?>">
                                        <small class="error accountname-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Account number</label>
                                        <input type="text" name="accountnumber" class="form-control accountnumber" placeholder="e.g., john" value="<?= empty($bank_details->accountnumber) ? "" : $bank_details->accountnumber; ?>">
                                        <small class="error accountnumber-error text-danger"></small>
                                    </div>
                                    <div class="form-group input-group-lg col-md-6">
                                        <label class="text-muted">Account type</label>
                                        <input type="text" name="accounttype" class="form-control accounttype" placeholder="e.g., john" value="<?= empty($bank_details->accounttype) ? "" : $bank_details->accounttype; ?>">
                                        <small class="error accounttype-error text-danger"></small>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>