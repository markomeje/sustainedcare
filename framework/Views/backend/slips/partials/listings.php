<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 light-shadow">
		<div class="card-body">
			<div class="d-flex justify-content-between align-content-center">
				<a href="javascript:;" data-toggle="modal" data-target="#view-slip-<?= $slip->id; ?>">
					View details
				</a>
				<a href="javascript:;" class="<?= ($slip->status === 'verified') ? 'text-success' : 'text-danger'; ?>">
					<?= ucfirst($slip->status); ?>
				</a>
			</div>
			<div class="text-muted d-flex justify-content-between align-content-center">
				<div>Slip code</div> 
				<div><?= $slip->code; ?></div>
			</div>
			<?php Application\Core\Help::formatDate($slip->paymentdate); ?>
		</div>
		<div class="card-footer bg-dark border-0 d-flex justify-content-between">
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="<?= $slip->id; ?>">
                <label class="custom-control-label" for="<?= $slip->id; ?>"></label>
            </div>
			<small class="cursor-pointer">
				<a href="<?= DOMAIN; ?>/applicants/applicant/<?= $slip->applicant; ?>" class="text-white">
					<i class="icofont-eye mr-1"></i>
				</a> 
                <i class="icofont-ui-delete text-white delete-slip" data-url="<?= DOMAIN; ?>/slip/delete/<?= $slip->id; ?>"></i>
            </small>
		</div>
	</div>
</div>
