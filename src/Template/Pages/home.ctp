	<div class="green-banner">
		<div class="gren-bnr-cntnt">
			<p>ARE YOU A LAWN CARE PROFESSIONAL? </p>
			<?php echo $this->Html->link('Become A Partner', '/partners');?>
		</div>
		<button class="x-btn"></button>
	</div>
<?php echo $this->Element('front/sidebar'); ?>
	<div class="wrapper">
		<?php echo $this->Element('front/cityheader'); ?>
				<?php
					if(!empty($setPage)){
						echo $setPage['content'];
					}
				?>
		<div class="clear"></div>
		<?php echo $this->Element('front/footer'); ?>
	</div>