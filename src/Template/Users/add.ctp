<header id="header">
	<div id="logo-group">
		<span id="logo"> <?php echo $this->Html->image('logo.png',['alt'=>'logo']);?></span>
	</div>
	<span id="extr-page-header-space"> 
	<span class="hidden-mobile hiddex-xs">Already registered?</span> 
	<a href="<?php echo $this->Url->build('/admin');?>" class="btn btn-danger">Sign In</a> </span>
</header>


<div id="main" role="main">
	<div id="content" class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-4 hidden-xs hidden-sm">
				<div class="hero">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
				<div class="well no-padding">
						<?php echo  $this->Form->create($user, ['class'=>'smart-form client-form', 'id'=>'register-form']) ?>
						<header>Registration</header>
						<fieldset>
							<section>
								<label class="label">Username</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<?php  echo $this->Form->input('login_name', ['label' => false, 'placeholder'=>'Username']);?>
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
							</section>
							
							
							<section>
								<label class="label">Email</label>
										<label class="input"> <i class="icon-append fa fa-envelope"></i>
											<?php  echo $this->Form->input('email', ['label' => false,'type'=>'email','placeholder'=>'Email address']);?>
											<b class="tooltip tooltip-bottom-right">Needed to verify your account</b> </label>
							</section>

							<section>
								<label class="label">Password</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<?php  echo $this->Form->input('password', ['label' => false, 'placeholder'=>'Password']);?>
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
							</section>
							
							<section>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
									<?php  echo $this->Form->input('cpassword', ['label' => false, 'placeholder'=>'Confirm password','type'=>'password']);?>
									<b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
							</section>

						</fieldset>
						
						<fieldset>
									<div class="row">
										<section class="col col-6">
											<label class="input">
											<?php  echo $this->Form->input('first_name', ['label' => false, 'placeholder'=>'First name']);?>
											</label>
										</section>
										<section class="col col-6">
											<label class="input">
												<?php  echo $this->Form->input('last_name', ['label' => false, 'placeholder'=>'Last name']);?>
											</label>
										</section>
									</div>
									
								<!--	<section>
										<label class="checkbox">
											<input type="checkbox" id="subscription" name="subscription">
											<i></i>I want to receive news and special offers</label>
										<label class="checkbox">
											<input type="checkbox" id="terms" name="terms">
											<i></i>I agree with the <a data-target="#myModal" data-toggle="modal" href="#"> Terms and Conditions </a></label>
									</section> -->
						</fieldset>
						
						  <?php 
							$session = $this->request->session();
							if ($session->read('Flash.flash')) {
								echo '<footer>';
								echo $this->Flash->render(); 
								echo '</footer>';
							}
						?>
						
						<footer>
							<?php echo  $this->Form->button(__('Login'),  ['class'=>'btn btn-primary']); ?>
						</footer>
						
					<?php echo  $this->Form->end() ?>
					
				</div>
			</div>
		</div>
	</div>
</div>