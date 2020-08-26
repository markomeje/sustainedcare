<div class="form-group input-group-lg mb-0">
    <select class="custom-select backend-links border text-muted" data-url="<?= DOMAIN; ?>">
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
