<?php foreach ($allReferrer as $referrer): ?>
    <div class="col-12 col-md-4 col-lg-3 mb-4">
        <div class="card box-shadow border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?= DOMAIN; ?>/referrer/bills/<?= $referrer->id; ?>" class="text-muted">
                        <small class="font-weight-bold">
                            <?= Application\Core\Help::limitStringLength($referrer->name, 20); ?>
                        </small>
                    </a>
                    <small class="text-success">
                        <?= $referrer->number; ?>
                    </small>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        Referral bonus
                    </small>
                    <small class="text-success">
                        <?= empty($referrer->bonus) ? "Nill" : $referrer->bonus."%"; ?>
                    </small>
                </div>
            </div>
            <div class="card-footer bg-custom border-top-custom d-flex align-items-center justify-content-between">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="<?= $referrer->id; ?>">
                    <label class="custom-control-label" for="<?= $referrer->id; ?>"></label>
                </div>
                <small class="cursor-pointer text-white">
                    <i class="icofont-patient-file mr-1"></i>
                    <i class="icofont-edit mr-1" data-toggle="modal" data-target="#edit-referrer-<?= $referrer->id; ?>"></i>
                    <i class="icofont-ui-delete delete-referrer" id="<?= $referrer->id; ?>"></i>
                </small>
            </div>
        </div>
    </div>
<?php endforeach; ?>