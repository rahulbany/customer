<footer>
	<div class="footer-section">
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="footer-logo">
					<?php echo $this->Html->image('images/footer-logo.png', ['alt' => 'quote-first']); ?>
					<h4>Terra, the Lawn Service App</h4>
				</div>
				<div class="google-images">
					<a href="https://itunes.apple.com/us/app/terra-lawn-service-app/id975487636?mt=8"><?php echo $this->Html->image('images/footer-app-store.png', ['alt' => 'quote-first']); ?></a>
					<a href="#"><?php echo $this->Html->image('images/footer-google-play.png', ['alt' => 'quote-first']); ?></a>
				</div>	
			</div>
			<div class="col-md-4 discover">
				<div class="col-md-12">
				<div class="col-md-6">
					<h4>DISCOVER</h4>
					<ul>
						<li><?php echo $this->Html->link('About Us', '/about-us', array('class' => 'light_blue', 'escape' => false)); ?></li>
						<li><?php echo $this->Html->link('How It Works', '/how-it-works', array('class' => 'light_blue', 'escape' => false)); ?></li>
						<li><?php echo $this->Html->link('Cities', '/city', array('class' => 'light_blue', 'escape' => false)); ?></li>
						<li><a href="#">Help</a></li>
						<li><a href="#">Blog</a></li>
					</ul>
				</div>
				<div class="col-md-6 terra">
					<h4>WORK WITH TERRA</h4>
					<ul>
						<li><?php echo $this->Html->link('Partners', '/partners', array('class' => 'light_blue', 'escape' => false)); ?></li>
						<li><a href="#">Sign up</a></li>
						<li><?php  echo $this->Html->link('Careers',"https://www.linkedin.com/company/terra-app",['escape' => false]);?></li>
						<li><a href="#">Press</a></li>
						<li><a href="#">Affiliates</a></li>
					</ul>
				</div>
				</div>		
			</div>
			<div class="col-md-4 contact">
				<div class="social">
					<h3>Connect with Us!</h3>
					<?php  echo $this->Html->link('<i class="fa fa-facebook fa-2x"></i>',"https://www.facebook.com/TerraLawnServiceApp",['escape' => false]);?>
					<?php  echo $this->Html->link('<i class="fa fa-twitter fa-2x"></i>',"https://twitter.com/terra_app",['escape' => false]);?>
					<?php  echo $this->Html->link('<i class="fa fa-instagram fa-2x"></i>',"https://instagram.com",['escape' => false]);?>
					<?php  echo $this->Html->link('<i class="fa fa-pinterest-p fa-2x"></i>',"https://www.pinterest.com/terraapp/",['escape' => false]);?>
					<?php  echo $this->Html->link('<i class="fa fa-google-plus fa-2x"></i>',"https://plus.google.com/u/0/+TerraApp/posts",['escape' => false]);?>
				</div>
				<div class="phone number"><?php echo $this->Html->image('images/phone.png', ['alt' => 'quote-first']); ?><h3> 888-625-8215</h3></div>
				<div class="phone mail"><?php echo $this->Html->image('images/mail.png', ['alt' => 'quote-first']); ?><h3> contact@terra-app.com</h3></div>
			</div>
		</div>
		<div class="col-md-12 copyright">
			<h3>	<?php  echo $this->Html->link('Privacy Policy',"/terra-privacy-policy",['escape' => false]);?> |  <?php  echo $this->Html->link('Terms of Use',"/terms-of-service",['escape' => false]);?></h3><br />
			<div class="divider"></div>
			<h4>COPYRIGHT - 2016 TERRA APP TECHNOLOGIES, INC.</h4>
		</div>
	</div>
</footer>