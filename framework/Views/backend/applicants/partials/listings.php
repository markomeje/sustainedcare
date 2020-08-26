<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 shadow">
		<div class="card-body">
			<?php $id = empty($applicant->id) ? "" : $applicant->id; ?>
			<a href="<?= DOMAIN; ?>/applicants/applicant/<?= $id; ?>">
				<?php $fullname = Application\Core\Help::limitStringLength($applicant->surname." ".$applicant->firstname." ".$applicant->middlename, 15); ?>
				<?= $fullname; ?>
			</a>
			<div class="text-muted">
				<small>
					<em>Applied </em><?= Application\Core\Help::formatDate(empty($applicant->date) ? date() : $applicant->date); ?>
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark border-0 d-flex justify-content-between">
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="<?= $id; ?>">
                <label class="custom-control-label" for="<?= $id; ?>"></label>
            </div>
			<small class="cursor-pointer text-white">
                <i class="icofont-edit mr-1" data-toggle="modal" data-target="#edit-<?= $id; ?>"></i>
                <i class="icofont-ui-delete delete-applicant" data-url="<?= DOMAIN; ?>/applicants/delete/<?= empty($applicant->login) ? "" : $applicant->login; ?>"></i>
            </small>
		</div>
	</div>
</div>
