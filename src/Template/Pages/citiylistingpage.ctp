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
	<div class="wrapper" id="bg-color">
		<?php echo $this->Element('front/cityheader'); ?>
		<?php if(!empty($setPage)){echo $setPage['content'];}?>
		
		<div class="content-section margin_0">
			<div class="container">
			
			
				<div class="page-content">
					<div class="cities-fixed">
						<div class="width-100">
							<div class="cities-col">
								
								<div class="half-cities-block">
									<div class="cities-title">
										<span><img alt="California" src="/terraappnew/img/images/california-map-ic.png"></span><h3> CALIFORNIA </h3>
									</div>
										<ul>
											<?php
												foreach($California as $itsState){
													?><li><a href="lawn-service-<?php echo $itsState['slug']; ?>"><?php echo $itsState['city']; ?></a> </li><?php
												}
											?>
										</ul>
								</div>
							
								<div class="half-cities-block">
									<div class="cities-title">
										<span><img alt="Colorado" src="/terraappnew/img/images/colorado-map-ic.png"></span>
										<h3> Colorado </h3>
									</div>
										<ul>
											<?php
												foreach($Colorado as $itsState){
													
													?><li><a href="lawn-service-<?php echo $itsState['slug']; ?>"><?php echo $itsState['city']; ?></a> </li><?php
												}
											?>
										</ul>
								</div>
							
								<div class="half-cities-block">
									<div class="cities-title">
										<span><img alt="Florida" src="/terraappnew/img/images/florida-map-ic.png"></span>
										<h3> Florida </h3>
									</div>
									<ul>
										<?php
												foreach($Florida as $itsState){
													?><li><a href="lawn-service-<?php echo $itsState['slug']; ?>"><?php echo $itsState['city']; ?></a> </li><?php
												}
											?>
									</ul>
								</div>
							
								<div class="half-cities-block">
									<div class="cities-title">
										<span><img alt="Georgia" src="/terraappnew/img/images/georgia-map-ic.png"></span>
										<h3> Georgia </h3>
									</div>
									<ul>
										<?php
												foreach($Georgia as $itsState){
													?><li><a href="lawn-service-<?php echo $itsState['slug']; ?>"><?php echo $itsState['city']; ?></a> </li><?php
												}
											?>
									</ul>
								</div>
						   
							</div>
							
							<div class="cities-col">
							
								<div class="half-cities-block">
									<div class="cities-title">
										<span><img alt="Illinois" src="/terraappnew/img/images/illinois-map-ic.png"></span>
										<h3> Illinois </h3>
									</div>
										<ul>
											<?php
												foreach($Illinois as $itsState){
													?><li><a href="lawn-service-<?php echo $itsState['slug']; ?>"><?php echo $itsState['city']; ?></a> </li><?php
												}
											?>
										</ul>
								</div>
							
							
								<div class="half-cities-block">
									<div class="cities-title">
										<span><img alt="North Carolina" src="/terraappnew/img/images/northcarolina-map-ic.png"></span>
										<h3> North Carolina </h3>
									</div>
										<ul>
											<?php
												foreach($NorthCarolina as $itsState){
													?><li><a href="lawn-service-<?php echo $itsState['slug']; ?>"><?php echo $itsState['city']; ?></a> </li><?php
												}
											?>
										</ul>
								</div>
								
								
								<div class="half-cities-block">
									<div class="cities-title">
										<span><img alt="Texas" src="/terraappnew/img/images/texas-map-ic.png"></span>
										<h3> Texas </h3>
									</div>
										<ul>
											<?php
												foreach($Texas as $itsState){
													?><li><a href="lawn-service-<?php echo $itsState['slug']; ?>"><?php echo $itsState['city']; ?></a> </li><?php
												}
											?>
										</ul>
								</div>
							
						   
								<div class="half-cities-block">
									<div class="cities-title">
										<span><img alt="Washington" src="/terraappnew/img/images/washington-map-ic.png"></span>
										<h3> Washington </h3>
									</div>
										<ul>
											<?php
												foreach($Washington as $itsState){
													?><li><a href="lawn-service-<?php echo $itsState['slug']; ?>"><?php echo $itsState['city']; ?></a> </li><?php
												}
											?>
										</ul>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="outer-container cities-bg">
		<div class="container">
			<div class="city-contact-wrap">
				<div class="cities-contact-icon">
					<img alt="Contact" src="/terraappnew/img/images/cities-contact-map-ic.png">
				</div>
				<div class="txt-center">
					<h2>Don't see your city?</h2>
					<h6>Let us know where we should launch next</h6>
				</div>
				
				<?php echo $this->Form->create('Pages', ['controller'=>'pages', 'action'=>'contacts', 'id'=>'contactform']); ?>
					<div class="contact-form">
						<div class="half-input">
							<?php echo $this->Form->input('name', ['label'=>false,'placeholder'=>'Name']); ?>
						</div>

						<div class="half-input">
							<?php echo $this->Form->input('email', ['label'=>false,'placeholder'=>'Email', 'type'=>'email']); ?>
						</div>
 
						<div class="full-input">
							<?php echo $this->Form->input('city', ['label'=>false,'placeholder'=>'Your city']); ?>
						</div>

						<div class="full-input" id="showResponse"></div>
						
						<div class="full-input">
							<?php echo $this->Form->button('PUT US ON NOTICE', ['type'=>'button', 'onclick'=>'submitcontactform()', 'class'=>'btn-submit']); ?>
						</div>
					</div>
				<?php echo $this->Form->end(); ?>
			</div>
			<div class="clear"></div>
		</div>	
	</div>
	<div class="clear"></div>
	<script type="text/javascript">
			$('#userform').validate({
				rules: {
						confirm: {
						equalTo: "#password"
					}
				}
			});
		</script>
	<script type="text/javascript">
		function submitcontactform(){
			var serializeArr = $('#contactform').serialize();
			$.ajax({
				url: '<?php  echo $this->Url->build('/submitcontactform'); ?>',
				type:'post',
				data:serializeArr,
				success:function(res){
					var json = $.parseJSON(res);
					if(json.response==1){	
						$('#showResponse').hide();
						$('.contact-form').replaceWith(json.data);
					}
					else{
						$('#showResponse').html(json.data);
					}
				}
			});
		}
	</script>
	<?php echo $this->Element('front/footer'); ?>
</div>