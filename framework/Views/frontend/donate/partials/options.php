<?php if(isset($dollarAmounts)): ?>
	<?php if(count($dollarAmounts) > 0 && is_array($dollarAmounts)): ?>
		<?php foreach($dollarAmounts as $dollar): ?>
			<div class="col-12 col-md-6 col-lg-3 mb-4">
				<div class="card border-0" data-aos="fade-up">
					<a href="javascript:;" class="text-white bg-dark rounded cursor-pointer donate-option text-decoration-none" id="<?= empty($dollar) ? 0 : $dollar; ?>">
						<div class="card-body border-0 d-flex justify-content-between">
					    	<div class=""><?= empty($dollar) ? "Others" : "$".number_format($dollar); ?></div>
					    </div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
<?php elseif(isset($nairaAmounts)): ?>
	<?php if(count($nairaAmounts) > 0 && is_array($nairaAmounts)): ?>
		<?php foreach($nairaAmounts as $naira): ?>
			<div class="col-12 col-md-6 col-lg-3 mb-4">
				<div class="card border-0" data-aos="fade-up">
					<a href="javascript:;" class="text-white bg-dark rounded cursor-pointer donate-option text-decoration-none" id="<?= empty($naira) ? 0 : $naira; ?>">
						<div class="card-body border-0 d-flex justify-content-between">
					    	<div class=""><?= empty($naira) ? "Others" : (isset($nairaSymbol) ? $nairaSymbol : "N").number_format($naira); ?></div>
					    </div>
					</a>
				</div>
			</div>
	    <?php endforeach; ?>
	<?php endif; ?>
<?php else: ?>
	<div class="col-12 col-md-6 col-lg-3 mb-4">
		<div class="card border-0" data-aos="fade-up">
			<div class="card-body border-0 text-center">
		    	No Donation Amounts Set
		    </div>
		</div>
	</div>
<?php endif; ?>
