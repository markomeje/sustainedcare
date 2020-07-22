<!-- Modal -->
<div class="modal fade" id="add-patient" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg border-0" role="document">
        <div class="modal-content">
            <div class="modal-header py-2 align-items-center">
                <h5 class="modal-title text-muted font-weight-normal">Add patient</h5>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="add-patient-form" data-action="<?= DOMAIN; ?>/patients/add">
                <div class="px-3">
                    <div class="alert add-patient-message mb-0 mt-3 px-3 py-2 d-none rounded"></div>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="patient-firstname">Firstname</label>
                                <input type="text" name="firstname" class="form-control patient-firstname" placeholder="e.g., femil">
                                <small class="error firstname-error text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="patient-surname">Surname</label>
                                <input type="text" name="surname" class="form-control patient-surname" placeholder="e.g., kalu">
                                <small class="error surname-error text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="patient-gender">Gender</label>
                                <select class="custom-select patient-gender" name="gender">
                                    <option value="">Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <small class="error gender-error text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="patient-referrer">
                                    Referrer <?= empty($allReferrer) ? '(<a href='.DOMAIN."/referrer".'>Add</a>)' : ""; ?>
                                </label>
                                <select class="custom-select patient-referrer" name="referrer" <?= empty($allReferrer) ? "disabled" : ""; ?>>
                                    <?php if(empty($allReferrer)): ?>
                                         <option value="">No referrers added</option>
                                    <?php else: ?>
                                        <option value="">Select referrer</option>
                                        <?php foreach ($allReferrer as $referrer): ?>
                                            <option value="<?= $referrer->id; ?>">
                                                <?= $referrer->name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <small class="error referrer-error text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="patient-phone">Phone</label>
                                <input type="number" name="phone" class="form-control patient-phone" placeholder="e.g., 0801000001">
                                <small class="error phone-error text-danger"></small>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="text-muted" for="patient-age">Age</label>
                                <input type="number" name="age" class="form-control patient-age" placeholder="e.g., 46">
                                <small class="error age-error text-danger"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-right">
                        <button type="submit" class="btn bg-custom text-white add-patient-button d-flex justify-content-center align-items-center">
                            <img src="<?= IMAGES_URL; ?>/banners/spinner.svg" class="mr-2 d-none add-patient-spinner">
                            Submit
                        </button>
                        <button type="button" class="btn bg-danger text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                    
                </div>
                <div class="px-3">
                    <div class="alert register-message px-3 py-2 mb-3 d-none rounded"></div>
                </div>
            </form>
        </div>
    </div>
</div>