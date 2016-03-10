<header id="header">
	<div id="logo-group">
		<span id="logo"><?php echo $this->Html->image('logo.png',['alt'=>'logo']);?></span>
	</div>
	<span id="extr-page-header-space"> 
	<span class="hidden-mobile hiddex-xs">Need an account?</span> 
	<a href="<?php echo $this->Url->build('/users/add');?>" class="btn btn-danger">Create account</a> </span>
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

						<header>Reset Password</header>
				
						<fieldset>
							<section>
								<label class="label">New password</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<?php  echo $this->Form->input('new_pass', ['templates' => ['inputContainer' => '{{content}}'],'type'=>'password','label' => false]);?>
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
							</section>
							<section>
								<label class="label">Confirm Password</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<?php  echo $this->Form->input('confirm_pass', ['templates' => ['inputContainer' => '{{content}}'], 'type'=>'password','label' => false]);?>
									<?php  echo $this->Form->input('mytoken', ['type'=>'hidden','value'=>$mytoken]);?>
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>

							</section>
						</fieldset>
						
						  <?php 
						    $session = $this->request->session();
							if ($session->read('Flash.flash')): echo $this->Flash->render(); endif;
						  
							/* $session = $this->request->session();
							if ($session->read('Flash.flash')) {
								echo '<footer>';
								echo $this->Flash->render(); 
								echo '</footer>';
							} */
						?>
						
						<footer>
							<?php echo  $this->Form->button(__('Submit'),  ['class'=>'btn btn-primary']); ?>
						</footer>
							<?php echo $this->Html->link('Back to Login',['controller' => 'Users', 'action' => 'login']);?>
						
					<?php echo  $this->Form->end() ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
		$(document).ready(function() {
			$("#flash_notification").click(function(){
				//$(this).remove();
				$(this).slideUp();
			});
		})	
</script>	