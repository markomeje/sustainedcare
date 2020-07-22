<!-- Modal -->
<div class="modal fade" id="view-<?= $applicant->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center border-bottom-orange">
                <div class="modal-title text-muted">View details</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="view-form">
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
                                <option value="">
                                    <?= empty($applicant->amount) ? "" : "NGN".number_format($applicant->amount); ?>
                                </option>
                            </select>
                            <small class="error amount-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">State located</label>
                            <select class="custom-select state" name="state">
                                <option value="">
                                    <?= empty($applicant->state) ? "" : $applicant->state; ?>
                                </option>
                            </select>
                            <small class="error state-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted" for="gender">Gender</label>
                            <select class="custom-select gender" name="gender">
                                <option value="">
                                    <?= empty($applicant->gender) ? "" : $applicant->gender; ?>
                                </option>
                            </select>
                            <small class="error gender-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Relationship status</label>
                            <select class="custom-select relationship" name="relationship">
                                <option value="">
                                    <?= empty($applicant->relationship) ? "" : $applicant->relationship; ?>
                                </option>
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
            </form>
        </div>
    </div>
</div>