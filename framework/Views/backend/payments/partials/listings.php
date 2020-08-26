<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 shadow">
		<div class="card-body">
			<div class="d-flex justify-content-between align-content-center">
				<a href="<?= DOMAIN; ?>/applicants/applicant/<?= $payment->applicant; ?>">
					<?php $fullname = ucwords($payment->surname." ".$payment->firstname); ?>
					<?= Application\Core\Help::limitStringLength($fullname, 18); ?>
				</a>
				<a href="javascript:;" class="<?= ($payment->status === 'paid') ? 'text-success' : 'text-danger'; ?>">
					<?= empty($payment->status) ? "Unpaid" : ucfirst($payment->status); ?>
				</a>
			</div>
			<div class="text-muted d-flex justify-content-between align-content-center">
				<small class="text-muted">
					<?= empty($payment->type) ? "Offline" : ucfirst($payment->type); ?>
				</small> 
				<small>
					NGN<?= empty($payment->amount) ? 0 : number_format($payment->amount); ?>
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark border-0 d-flex justify-content-between">
			<!-- <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="<?= $payment->id; ?>">
                <label class="custom-control-label" for="<?= $payment->id; ?>"></label>
            </div>
			<small class="cursor-pointer">
				<a href="<?= DOMAIN; ?>/applicants/applicant/<?= $payment->applicant; ?>" class="text-white">
					<i class="icofont-eye mr-1"></i>
				</a> 
                <i class="icofont-ui-delete text-white delete-payment" data-url="<?= DOMAIN; ?>/payment/delete/<?= $payment->id; ?>"></i>
            </small> -->
            <small class="text-white">
            	<?= Application\Core\Help::formatDate($payment->date); ?>
            </small>
		</div>
	</div>
</div>
