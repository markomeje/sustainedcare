<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 light-shadow">
		<div class="card-body">
			<a href="<?= DOMAIN; ?>/applicants/applicant/<?= $withdrawal->applicant; ?>">
				<?php $fullname = $withdrawal->surname." ".$withdrawal->firstname; ?>
				<?= Application\Core\Help::limitStringLength($fullname, 20); ?>
			</a>
			<div class="d-flex justify-content-between align-content-center">
				<div class="text-muted">
					N<?= empty($withdrawal->amount) ? 0 : number_format($withdrawal->amount); ?>
				</div>
				<a href="javascript:;" class="<?= ($withdrawal->status === 'paid') ? 'text-success' : 'text-danger'; ?> <?= strtolower($withdrawal->status); ?>-withdrawal" data-url="<?= DOMAIN; ?>/withdrawals/approveCash/<?= $withdrawal->applicant; ?>">
					<?= strtolower($withdrawal->status) === "paid" ? "Paid" : "Approve"; ?>
				</a>
			</div>
		</div>
		<div class="card-footer bg-dark border-0 d-flex justify-content-between">
			<!-- <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="<?= $withdrawal->id; ?>">
                <label class="custom-control-label" for="<?= $withdrawal->id; ?>"></label>
            </div>
			<small class="cursor-pointer">
				<a href="<?= DOMAIN; ?>/applicants/applicant/<?= $withdrawal->applicant; ?>" class="text-white">
					<i class="icofont-eye mr-1"></i>
				</a> 
                <i class="icofont-ui-delete text-white delete-withdrawal" data-url="<?= DOMAIN; ?>/withdrawal/delete/<?= $withdrawal->id; ?>"></i>
            </small> -->
            <small class="text-white">
				<?= Application\Core\Help::formatDatetime($withdrawal->date); ?> 
			</small>
		</div>
	</div>
</div>
