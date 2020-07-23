<div class="col-12 col-md-6 col-lg-6 mb-4">
    <!-- DASHBOARD Links -->
    <div class="form-group input-group-lg mb-0">
	    <select class="custom-select backend-links border-orange text-muted" data-url="<?= DOMAIN; ?>">
	    	<?php if(empty($links)): ?>
	    		<option value="">No links yet</option>
	        <?php else: ?>
	            <?php foreach($links as $link): ?>
	                <option value="<?= $link; ?>" <?= ($controller === $link) ? "selected" : ""; ?>>
	                	<?= ucfirst($link); ?>
	                </option>
	            <?php endforeach; ?>
	        <?php endif; ?>
	    </select>
	</div>
</div>