<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border rounded border-faint">
		<div class="card-body bg-dark d-flex align-items-center rounded">
			<div class="rounded bg-primary text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="text-white">Referrals</div>
				<small class="text-white">
					<?= empty($referrals) ? 0 : count($referrals); ?> Person(s)
				</small>
			</div>
		</div>
	</div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border rounded border-faint">
		<div class="card-body bg-dark d-flex align-items-center rounded">
			<div class="rounded bg-secondary text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="text-white">Earnings</div>
				<small class="text-white">
					NGN<?= empty($earnings) ? 0 : $earnings; ?>
				</small>
			</div>
		</div>
	</div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border rounded border-faint">
		<div class="card-body bg-dark d-flex align-items-center rounded">
			<div class="rounded bg-warning text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="text-white">Withdrawals</div>
				<small class="text-white">
					NGN<?= empty($withdrawals) ? 0 : $withdrawals; ?>
				</small>
			</div>
		</div>
	</div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border rounded border-faint">
		<div class="card-body bg-dark d-flex align-items-center rounded">
			<div class="rounded bg-success text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="text-white">Balance</div>
				<small class="text-white">
					NGN<?= $balance; ?>
				</small>
			</div>
		</div>
	</div>
</div>