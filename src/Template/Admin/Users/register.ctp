<header id="header">
	<div id="logo-group">
		<span id="logo"> <img src="img/logo.png" alt="SmartAdmin"> </span>
	</div>
	<span id="extr-page-header-space"> 
	<span class="hidden-mobile hiddex-xs">Need an account?</span> 
	<a href="javascript:void()" class="btn btn-danger">Create account</a> </span>
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
						<?php echo  $this->Form->create('/admin', ['class'=>'smart-form client-form', 'id'=>'login-form']) ?>
						<header>Sign In</header>

						<fieldset>
							<section>
								<label class="label">Username</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<?php  echo $this->Form->input('username', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false]);?>
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
							</section>

							<section>
								<label class="label">Password</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<?php  echo $this->Form->input('password', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false]);?>
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
								<div class="note">
									<a href="javascript:void();">Forgot password?</a>
								</div>
							</section>

							<section>
								<label class="checkbox">
									<input type="checkbox" name="remember" checked="">
									<i></i>Stay signed in</label>
							</section>
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