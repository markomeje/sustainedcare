<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0">
		<div class="card-body">
			<a href="<?= DOMAIN; ?>/applicants/applicant/<?= $applicant->id; ?>" class="text-muted">
				<?php $fullname = Application\Core\Help::limitStringLength($applicant->surname." ".$applicant->firstname." ".$applicant->middlename, 18); ?>
				<small><?= $fullname; ?></small>
			</a>
			<div class="text-muted">
				<small>
					<em>Applied </em><?= Application\Core\Help::formatDate($applicant->date); ?>
				</small>
			</div>
		</div>
		<div class="card-footer orange-gradient d-flex justify-content-between">
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="<?= $applicant->id; ?>">
                <label class="custom-control-label" for="<?= $applicant->id; ?>"></label>
            </div>
			<small class="cursor-pointer text-white">
                <i class="icofont-edit mr-1" data-toggle="modal" data-target="#edit-<?= $applicant->id; ?>"></i>
                <i class="icofont-bullseye mr-1 font-weight-bold" data-toggle="modal" data-target="#view-<?= $applicant->id; ?>"></i>
                <i class="icofont-ui-delete delete-applicant" id="<?= $applicant->id; ?>"></i>
            </small>
		</div>
	</div>
</div>
