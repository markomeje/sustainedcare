<div class="col-12 col-md-6 col-lg-6 mb-3">
    <!-- DASHBOARD Links -->
    <div class="form-group input-group-lg">
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