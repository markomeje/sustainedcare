<!-- Modal -->
<div class="modal fade" id="edit-<?= $applicant->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center border-bottom-orange">
                <div class="modal-title text-muted" id="exampleModalLongTitle">Edit Details</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="edit-form" data-action="<?= DOMAIN; ?>/applicants/edit/<?= $applicant->id; ?>">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Surname</label>
                            <input type="text" name="surname" class="form-control surname" id="surname" placeholder="e.g., john" value="<?= empty($applicant->surname) ? "" : $applicant->surname; ?>">
                            <small class="error surname-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Firstname</label>
                            <input type="text" name="firstname" class="form-control firstname" placeholder="e.g., limet" value="<?= empty($applicant->firstname) ? "" : $applicant->firstname; ?>">
                            <small class="error firstname-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted" for="middlename">Middlename</label>
                            <input type="text" name="middlename" class="form-control middlename" placeholder="e.g., olanmma" value="<?= empty($applicant->firstname) ? "" : $applicant->firstname; ?>">
                            <small class="error middlename-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted" for="phone">Phone</label>
                            <input type="tel" name="phone" class="form-control phone" placeholder="e.g., 070062900011" value="<?= empty($applicant->phone) ? "" : $applicant->phone; ?>">
                            <small class="error phone-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Birthdate (<em><?= empty($applicant->birthdate) ? "" : Application\Core\Help::getAge($applicant->birthdate); ?> years</em>)</label>
                            <input type="date" name="birthdate" class="form-control birthdate" value="<?= empty($applicant->birthdate) ? "" : $applicant->birthdate; ?>">
                            <small class="error birthdate-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Street address</label>
                            <input type="text" name="address" class="form-control address" placeholder="e.g., no 13 gian street" value="<?= empty($applicant->address) ? "" : $applicant->address; ?>">
                            <small class="error address-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted" for="lga">Amount</label>
                            <select class="custom-select amount" name="amount">
                                <option value="1000000">NGN1,000,000</option>
                            </select>
                            <small class="error amount-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">State located</label>
                            <select class="custom-select state" name="state">
                                <?php if(empty($nigerianStates)): ?>
                                    <option value="">No states available</option>
                                <?php else: ?>
                                    <?php foreach($nigerianStates as $state): ?>
                                        <option value="<?= $state; ?>" <?= ($applicant->state === $state) ? "selected" : ""; ?>>
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
                                    <?php foreach($genders as $gender): ?>
                                        <option value="<?= $gender; ?>" <?= ($applicant->gender === $gender) ? "selected" : ""; ?>>
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
                                        <option value="<?= $status; ?>" <?= ($applicant->relationship === $status) ? "selected" : ""; ?>>
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
                            <textarea class="form-control why" name="why" rows="4" placeholder="eg., must be between 25 - 255 characters"><?= empty($applicant->why) ? "" : $applicant->why; ?></textarea>
                            <small class="error why-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-12">
                            <label class="text-muted">How will you use this grant?</label>
                            <textarea class="form-control how" name="how" rows="4" placeholder="eg., answer must be between 25 - 255 characters"><?= empty($applicant->how) ? "" : $applicant->how; ?></textarea>
                            <small class="error how-error text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn border-0 orange-gradient orange-shadow rounded-pill text-white edit-button px-4">
                            <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none edit-spinner mb-1">
                            Submit
                        </button>
                        <button type="button" class="btn bg-danger text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert py-2 px-3 mt-3 mb-4 rounded edit-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>