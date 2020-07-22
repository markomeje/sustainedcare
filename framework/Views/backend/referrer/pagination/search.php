<?php if(isset($pagination)): ?>
    <?php if(count($referrers) > 1): ?>
		<div class="row mb-4 mx-0 mt-2">
			<div class="col-12 px-0">
				<nav aria-label="">
                    <?php $query = $pagination->search("query"); $string = "/?query="; ?>
					<?php $currentPage = $pagination->currentPage; $link = DOMAIN."/referrer/search/"; ?>
				  	<ul class="pagination mb-0">
				  		<?php if($pagination->hasPreviousPage()): ?>
				  			<li class="page-item">
						        <a class="page-link px-3 border-custom text-custom" href="<?= $link.($currentPage - 1).$string.$query; ?>">
						        	<small><i class="icofont-arrow-left"></i></small>
						        </a>
						    </li>
						<?php endif; ?>
						<?php $visiblePages = (($currentPage - 1) > 1) ? ($currentPage - 1) : 1; ?>
				        <?php $pageEnd = (($currentPage + 1) < count($referrers)) ? ($currentPage + 1) : count($referrers); ?>
					    <?php for($page = $visiblePages; $page <= $pageEnd; $page++): ?>
					    	<?php  $active = ($page === $currentPage) ? true : false; ?>
						    <li class="page-item">
						        <a class="page-link px-3 border-custom <?= ($active) ? 'bg-custom text-white' : 'text-custom'; ?>" href="<?= ($active) ? "javascript:;" : $link.$page.$string.$query; ?>">
						        	<?= ($page); ?>
						        </a>
						    </li>
						<?php endfor; ?>
						<?php if($pagination->hasNextPage()): ?>
				  			<li class="page-item">
						        <a class="page-link px-3 border-custom text-custom" href="<?= $link.($currentPage + 1).$string.$query; ?>">
						        	<small><i class="icofont-arrow-right"></i></small>
						        </a>
						    </li>
						<?php endif; ?>
				  	</ul>
				</nav>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>
