<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="apple-mobile-web-app-capable" content="yes">
		<?php echo $this->Html->css('admin/font-awesome.min.css'); ?>
		<title> Login Page - Customer </title>	 
		<?php echo $this->Html->css('admin/style.css'); ?>
		 
		 
	</head>
	<body class="login-page">
		<div class="user-login-page">
		<div class="login-header">
			<a href="#"><?php echo $this->Html->image("Login/images/login-terra-logo.png"); ?></a>
		</div><!-- header -->
			 
			<div class="login-container">
				<?php echo  $this->Form->create('users', ['class'=>'smart-form client-form']) ?>
				<div class="user-login-form">
					<h1>Enjoy your Home Life</h1>
					<h3>My account</h3>
					<h5 style="color:#FAAFBE;">
					<?php 
							############ Show Flash Message ##############
							$session = $this->request->session();
							if ($session->read('Flash.flash')): echo $this->Flash->render(); endif;
							############ End Flash Message ##############
					?>
					</h5>
					<input type="text" id="login-name" name="login_name" placeholder="Username">
					<input type="password" id="password" name="password" placeholder="Password">
					<div class="forgot-pwd">
						<a href="#">Forgot password?</a>
					</div>
					<button type="submit"><?php echo $this->Html->image("Login/images/email.png");?></button>
					<a href="#"><img src="<?php echo $this->Html->image("Login/images/email.png");?></a>
					<legend>or login via</legend>
					<a href="#"><?php echo $this->Html->image("Login/images/facebook.png");?></a>
					<a href="#"><?php echo $this->Html->image("Login/images/google+.png");?></a>
				</div><!-- form -->
				<?php echo  $this->Form->end() ?>
			</div><!-- container -->		 
		</div>

		<footer>
			<div class="footer-section">
				<div class="col-md-12">
					<div class="col-md-4">
						<div class="footer-logo">
							<?php echo $this->Html->image("Login/images/footer-logo.png");?>
							<h4>Terra, the Lawn Service App</h4>
						</div>
						<div class="google-images">
							<a href="#"><?php echo $this->Html->image("Login/images/footer-app-store.png");?></a>
							<a href="#"><?php echo $this->Html->image("Login/images/footer-google-play.png");?></a>
						</div>	
					</div>
					<div class="col-md-4 discover">
						<div class="col-md-12">
						<div class="col-md-6">
							<h4>DISCOVER</h4>
							<ul>
								<li><a href="about-us.html">About Us</a></li>
								<li><a href="how-it-works.html">How It Works</a></li>
								<li><a href="cities.html">Cities</a></li>
								<li><a href="#">Recently Relocated</a></li>
								<li><a href="#">Blog</a></li>
							</ul>
						</div>
						<div class="col-md-6 terra">
							<h4>WORK WITH TERRA</h4>
							<ul>
								<li><a href="partner.html">Partner</a></li>
								<li><a href="#">Airbnb Host</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Press</a></li>
								<li><a href="#">Affiliates</a></li>
							</ul>
						</div>
						</div>		
					</div>
					<div class="col-md-4 contact">
						<div class="social">
							<h3>Connect with Us!</h3>
							<a href="#"><i class="fa fa-facebook fa-2x"></i></a>
							<a href="#"><i class="fa fa-twitter fa-2x"></i></a>
							<a href="#"><i class="fa fa-pinterest-p fa-2x"></i></a>
							<a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
						</div>
						<div class="phone number"><?php echo $this->Html->image("Login/images/phone.png");?><h3> 888-625-8215</h3></div>
						<div class="phone mail"><?php echo $this->Html->image("Login/images/mail.png");?><h3> contact@terra-app.com</h3></div>
					</div>
				</div>
				<div class="col-md-12 copyright">
					<h3>Privacy Policy | Terms of Use</h3>
					<div class="divider"></div>
					<h4>COPYRIGHT - 2016 TERRA APP TECHNOLOGIES, INC.</h4>
				</div>
			</div>
		</footer>
	</body>
</html>
