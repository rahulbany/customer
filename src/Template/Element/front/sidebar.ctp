
<div class="sidebar">
<?php echo $this->Html->link('', '/',['class'=>'sidebar sidebar-logo']);?>
		
		<div class="sidebar-nav">
			<ul>
				<li><?php echo $this->Html->link('<br><span>Book Now</span>','/checkout',array('class'=>'nav-signin', 'escape' => FALSE));?></li>
				<!--li><a class="nav-signin" href="#"><br><span>Book Now</span></a></li-->
				<li>
					<?php echo $this->Html->link('<br><span>Services</span>','/services',array('class'=>'nav-services', 'escape' => FALSE));?>
				</li>
				<li>
					<?php echo $this->Html->link('<br><span>Cities</span>','/city',array('class'=>'nav-cities', 'escape' => FALSE));?>
				</li>
				<li>
					<?php echo $this->Html->link('<br><span>Partners</span>','/partners',array('class'=>'nav-partner', 'escape' => FALSE));?>
				</li>
				<li><a class="nav-os" href="https://itunes.apple.com/us/app/terra-lawn-service-app/id975487636?mt=8"><br><span>Download IOS</span></a></li>
				<li><a class="nav-download" href="javascript:void(0);"><br><span>Download Android</span></a></li>
				<li><a class="nav-help" href="#"><br><span>Help</span></a></li>
				<li><?php echo $this->Html->link('<br><span>Checkout</span>','/checkout',array('class'=>'nav-checkout', 'escape' => FALSE));?></li>
				
				<li><a class="nav-more" href="#"><br><span>More</span></a></li>
			</ul>
		</div>
	</div>