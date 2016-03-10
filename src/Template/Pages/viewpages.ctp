<?php
if( !empty($setPage)  && $setPage['headlayout']){			
	?><div class="green-banner">
		<div class="gren-bnr-cntnt">
			<p>ARE YOU A LAWN CARE PROFESSIONAL? </p>
			<?php echo $this->Html->link('Become A Partner', '/partners');?>
		</div>
		<button class="x-btn"></button>
	</div><?php 
}
?>

<?php echo $this->Element('front/sidebar'); ?>
	<div class="wrapper <?php if($setPage['slug']=='about-us' || $setPage['slug']=='terra-privacy-policy' || $setPage['slug']=='terms-of-service') { echo 'about-res';} ?>" id="bg-color">
			
			<?php 
			if($setPage['slug']=='partner') { 
				echo $this->Element('front/cityheader'); 
			} 
			else if($setPage['slug']=='about-us' || $setPage['slug']=='terms-of-service' || $setPage['slug']=='terra-privacy-policy') { 
				echo $this->Element('front/cityheader'); 
			} 
			else{ 
				echo $this->Element('front/header'); 
			}
			?>
			
			<?php
				if(!empty($setPage)){
					echo $setPage['content'];
				}
			?>
			
		<div class="clear"></div>
		<?php echo $this->Element('front/footer'); ?>
	</div>