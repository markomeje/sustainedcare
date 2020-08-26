<div class="wrapper">
    <!-- DASHBOARD NAVBAR -->
    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="pt-5">
	    <div class="container pt-5">
	    	<?php if($verify === false): ?>
    			<div class="alert alert-danger">Transaction verification failed. Please contact us immediately.</div>
    		<?php endif; ?>
	    	<?php if(strtolower($payments->status) === "paid"): ?>
	    		<?php if(empty($bank_details)): ?>
	    			<div class="alert alert-warning mb-4">
	    				Please <a href="javascript:;" data-toggle="modal" data-target="#add-bank-details">Click here</a> to add your bank details of choice.
	    			</div>
	    			<?php require BACKEND_PATH . DS . "banks" . DS . "partials" . DS . "details.php"; ?>
	    		<?php endif; ?>
	    		<div class="row">
	    			<div class="col-12 col-md-6 mb-4">
	    				<div class="alert alert-info mb-0">
	    					<a href="javascript:;" class="copy mr-2" data-clipboard-text="<?= DOMAIN; ?>/apply/index/<?= empty($applicant->code) ? "" : $applicant->code; ?>">Copy link</a>
	    					<?php if(!empty($bank_details)): ?>
	    						<a href="javascript:;" class="" data-toggle="modal" data-target="#edit-bank-details">Bank details</a>
		    					<?php require BACKEND_PATH . DS . "banks" . DS . "partials" . DS . "edit.php"; ?>
		    				<?php endif; ?>
	    				</div>
	    			</div>
	    			<div class="col-12 col-md-6 mb-4">
	    				<div class="alert alert-info mb-0">
	    					<a href="javascript:;" class="copy mr-2" data-toggle="modal" data-target="#update-password">Update password</a>
	    					<?php if(empty($cashrequest)): ?>
	    						<?php if(empty($earnings)): ?>
	    							<a href="javascript:;" class="">No earnings</a>
	    						<?php elseif(!empty($withdrawableAmount) && $withdrawableAmount < 2000): ?>
                                    <a href="javascript:;" class="">Pending</a>
                                <?php else: ?>
			    					<a href="javascript:;" class="" data-toggle="modal" data-target="#request-cash">Request cash</a>
			    					<?php require BACKEND_PATH . DS . "withdrawals" . DS . "partials" . DS . "request.php"; ?>
		    					<?php endif; ?>
		    				<?php else: ?>
		    					<div class="text-danger">Cash pending</div>
		    				<?php endif; ?>
	    				</div>
	    			</div>
	    		</div>
	    		<?php if(!empty($cashrequest)): ?>
	    		    <div class="alert-info alert mb-4">
	    		    	We're processing your request. Note that payments will be made to the bank details you added. If you've not added your bank details, please do that immediately.
	    		    </div>
	    		<?php endif; ?>
	    		<?php if(!empty($withdrawableAmount) && $withdrawableAmount < 2000): ?>
	    			<div class="alert-info alert mb-4">
	    		    	Minimum withdrawal amount is NGN2,000.
	    		    </div>
	    		<?php endif; ?>
	    	<?php else: ?>
	    		<?php if(empty($slip)): ?>
	    			<div class="accordion mb-4" id="accordions-one">
	    				<div class="cursor-pointer alert-info alert p-3 clearfix mb-2 rounded" data-toggle="collapse" data-target="#online-payment">
						    <div class="text-muted float-left">
						        Pay online.
						    </div>
						    <div class="float-right">
						        <i class="icofont-rounded-down"></i>
						    </div>
						</div>
						<div id="online-payment" class="collapse mb-3 text-muted" data-parent="#accordions-one">
							To pay with your card online <a href="javascript:;" class="" data-toggle="modal" data-target="#paystack-payment">Click here.</a> You will be redirected to make your payment and on success will be redirected back to your profile.
						</div>
						<?php require BACKEND_PATH . DS . "payments" . DS . "partials" . DS . "paystack.php"; ?>
                    </div>
                    <div class="accordion mb-4" id="accordions-two">
	    				<div class="cursor-pointer alert-info alert p-3 clearfix mb-2 rounded" data-toggle="collapse" data-target="#offline-payment">
						    <div class="text-muted float-left">
						        Pay offline.
						    </div>
						    <div class="float-right">
						        <i class="icofont-rounded-down"></i>
						    </div>
						</div>
						<div id="offline-payment" class="collapse mb-3" data-parent="#accordions-two">
							To pay offline, use the details; Bank name: STANBIC IBTC, Account name: Sustained Care Foundation, Account number: 0032878953 and after your payment, <a href="javascript:;" data-toggle="modal" data-target="#payment-slip">Click here</a> to add your payment details for verification. Please note that verificaion will take about 48 working hours as opposed to card online payment which is automatically verified.
						</div>
						<?php require BACKEND_PATH . DS . "slips" . DS . "partials" . DS . "slip.php"; ?>
                    </div>
			    <?php else: ?>
			    	<div class="alert alert-info mb-4">Awaiting verification. This might take up to 48 working hours. <?= isset($slip->code) ? " Slip code  ".$slip->code : ""; ?>.</div>
			    <?php endif; ?>
		    <?php endif; ?>
	    </div>
    </div>
    <div class="">
	    <div class="container">
	    	<div class="panels">
		    	<div class="row">
					<?php require BACKEND_PATH . DS . "profile" . DS . "partials" . DS . "panels.php"; ?>
				</div>
			</div>
			<div class="referrers">
				<div class="accordion mb-4" id="accordions-three">
    				<div class="cursor-pointer bg-dark p-3 clearfix mb-4 rounded" data-toggle="collapse" data-target="#my-referrals">
					    <div class="text-white float-left">
					        My Referrals
					    </div>
					    <div class="float-right text-white">
					        <i class="icofont-rounded-down"></i>
					    </div>
					</div>
				    <div id="my-referrals" class="collapse mb-3 show" data-parent="#accordions-three">
						<?php if(empty($referrals)): ?>
							<div class="alert alert-danger">You've not referred anyone. Please use your referral link to refer others and earn 40% bonus.</div>
						<?php else: ?>
							<div class="row">
								<?php foreach($referrals as $referred): ?>
									<div class="col-12 col-md-6 col-lg-3 mb-4">
										<div class="card">
											<div class="card-body">
												<?php $fullname = $referred->firstname." ".$referred->surname; ?>
												<small class="text-muted">
													<?= Application\Core\Help::limitStringLength($fullname, 20); ?>
												</small>
												<div class="">
													<a href="tel:<?= $referred->phone; ?>">
														<?= $referred->phone; ?>
													</a>
												</div>
											</div>
											<div class="card-footer">
												<small class="text-muted">
													<?= Application\Core\Help::formatDate($referred->date); ?>
												</small>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
	    </div>
    </div>
</div>