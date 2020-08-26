<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 rounded bg-white shadow">
		<div class="card-body d-flex align-items-center">
			<div class="rounded bg-orange text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="">
					<a href="<?= DOMAIN; ?>/applicants">Applicants</a>
				</div>
				<small class="text-muted">
					<?= empty($applicantsCount) ? 0 : $applicantsCount; ?> Applied
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark">
			<small class="text-white">
				<?= empty($femaleApplicantsPercentage) ? 0 : $femaleApplicantsPercentage; ?>% female applied
			</small>
		</div>
	</div>
</div>
<!-- <div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 rounded bg-white shadow">
		<div class="card-body d-flex align-items-center">
			<div class="rounded bg-orange text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="">
					<a href="<?= DOMAIN; ?>/videos">Videos</a>
				</div>
				<small class="text-muted">
					<?= empty($videos) ? 0 : $videos; ?> Videos
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark">
			<small class="text-muted">
				<?= empty($publishedVideos) ? 0 : $publishedVideos; ?> published
			</small>
		</div>
	</div>
</div> -->
<!-- <div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 rounded bg-white shadow">
		<div class="card-body d-flex align-items-center">
			<div class="rounded bg-orange text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="">
					<a href="<?= DOMAIN; ?>/donations">Donations</a>
				</div>
				<small class="text-muted">
					<?= empty($allDonators) ? 0 : count($allDonators); ?> Donations
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark">
			<small class="text-muted">3 unverified slips</small>
		</div>
	</div>
</div> -->
<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 rounded bg-white shadow">
		<div class="card-body d-flex align-items-center">
			<div class="rounded bg-orange text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="">
					<a href="<?= DOMAIN; ?>/payments">Payments</a>
				</div>
				<small class="text-muted">
					NGN<?= empty($totalPayments) ? 0 : number_format($totalPayments); ?>
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark">
			<?php $total = $offlinePaymentsCount + $onlinePaymentsCount; ?>
			<small class="text-white">
				<?= Application\Core\Help::calculatePercent($offlinePaymentsCount, $total); ?>% paid offline
			</small>
		</div>
	</div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 rounded bg-white shadow">
		<div class="card-body d-flex align-items-center">
			<div class="rounded bg-orange text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="">
					<a href="<?= DOMAIN; ?>/slips">Slips</a>
				</div>
				<small class="text-muted">
					<?= empty($slips) ? 0 : $slips; ?> slip(s)
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark">
			<small class="text-white">
			    <?= empty($unVerifiedSlip) ? "No" : $unVerifiedSlip; ?> pending slip(s)
			</small>
		</div>
	</div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 rounded bg-white shadow">
		<div class="card-body d-flex align-items-center">
			<div class="rounded bg-orange text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="">
					<a href="<?= DOMAIN; ?>/withdrawals">Withdrawals</a>
				</div>
				<small class="text-muted">
					NGN<?= empty($totalPaidWithdrawals) ? 0 : $totalPaidWithdrawals; ?>
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark">
			<small class="text-white">
				<?= empty($allWithdrawals) ? 0 : count($allWithdrawals); ?> withdrawal(s)
			</small>
		</div>
	</div>
</div>
<!-- <div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 rounded bg-white shadow">
		<div class="card-body d-flex align-items-center">
			<div class="rounded bg-orange text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="">
					<a href="<?= DOMAIN; ?>/pictures">Pictures</a>
				</div>
				<small class="text-muted">
					<?= empty($pictures) ? 0 : $pictures; ?> pictures
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark">
			<small class="text-muted">
				<?= empty($publishedPictures) ? 0 : $publishedPictures; ?> published
			</small>
		</div>
	</div>
</div> -->
<!-- <div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 rounded bg-white shadow">
		<div class="card-body d-flex align-items-center">
			<div class="rounded bg-orange text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="">
					<a href="<?= DOMAIN; ?>/pictures">Contacts</a>
				</div>
				<small class="text-muted">
					<?= empty($allContacts) ? 0 : $allContacts; ?> contact(s)
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark">
			<small class="text-muted">
				<?= empty($repliedContacts) ? 0 : $repliedContacts; ?> replied
			</small>
		</div>
	</div>
</div> -->
<!-- <div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card border-0 rounded bg-white shadow">
		<div class="card-body d-flex align-items-center">
			<div class="rounded bg-orange text-center mr-3 panel-icons">
				<i class="icofont-hospital text-white"></i>
			</div>
			<div class="m-0">
				<div class="">
					<a href="<?= DOMAIN; ?>/accounts">Accounts</a>
				</div>
				<small class="text-muted">
					<?php $balance = $totalPayments - $totalPaidWithdrawals; ?>
					NGN<?= empty($balance) ? 0 : $balance; ?>
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark">
			<?php if($totalPayments > $totalPaidWithdrawals): ?>
			    <?php $profitPercent = Application\Core\Help::calculatePercent($balance, $totalPayments); ?>
			    <small class="text-muted">
			    	+<?= empty($profitPercent) ? 0 : $profitPercent; ?>% up
			    </small>
			<?php else: ?>
				<?php $lossPercent = Application\Core\Help::calculatePercentage($totalPaidWithdrawals, $totalPayments); ?>
			    <small class="text-muted">
			    	-<?= empty($lossPercent) ? 0 : $lossPercent; ?>% down
			    </small>
			<?php endif; ?>
		</div>
	</div>
</div> -->