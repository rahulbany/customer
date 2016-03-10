<?php
if( !empty($setCity)  && $setCity['headlayout']){			
	?><div class="green-banner">
		<div class="gren-bnr-cntnt">
			<p>ARE YOU A LAWN CARE PROFESSIONAL? </p>
			<a href="partner.html"> Become A Partner </a>
		</div>
		<button class="x-btn"></button>
	</div><?php 
}
?>

<?php echo $this->Element('front/sidebar'); ?>
	<div class="wrapper" id="bg-color">
		<?php echo $this->Element('front/cityheader'); ?>
				<?php
					if(!empty($setCity)){
						echo $setCity['content'];
					}
				?>
		<div class="clear"></div>
		<?php echo $this->Element('front/footer'); ?>
	</div>