	<aside id="left-panel">
		<!-- User info -->
		<div class="login-info">
			<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
				<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
					<!-- echo $this->Html->image('avatars/sunny.png', ['alt'=>'me', 'class'=>'online']); -->
					<?php 
					if(!empty($logedinUser1->profile_image)) {
						echo $this->Html->image('profileImage/'.$logedinUser1->profile_image, ['alt'=>'demouserdpscrrenshot']); 
					} else {
						echo $this->Html->image('profileImage/default.png'); 
					}	
					?>
					<span>
						<?php echo $this->request->session()->read('Auth.User.login_name') ?>
					</span>
					<i class="fa fa-angle-down"></i>
				</a> 					
			</span>
		</div>
		<!-- end user info -->
		<!-- NAVIGATION : This navigation is also responsive-->
		<nav>
			<ul>				
				<li> 
				  	<?=  $this->Html->link('<i class="fa fa-lg fa-fw fa-home"></i> Dashboard',['controller'=>'dashboard','action'=>'index'],['escape' => false]); ?>
				</li>
				<li>
					<a href="javascript:void()"><i class="glyphicon glyphicon-user"></i>  <span class="menu-item-parent">My Profile</span></a>
					<ul>
						<li>
							<?= $this->Html->link('<i class="glyphicon glyphicon-user"></i> My Profile',['controller'=>'Profiles','action'=>'index'],['escape' => false]); ?>
						</li>
						<li>
							<?=  $this->Html->link('<i class="glyphicon glyphicon-user"></i> Change Password',['controller'=>'Profiles','action'=>'changepass'],['escape' => false]); ?>
						</li>
					</ul>
				</li>	
				<li>
					<a href="javascript:void()"><i class="glyphicon glyphicon-user"></i>  <span class="menu-item-parent">Request</span></a>
					<ul>
						<li>
							<?=  	$this->Html->link('<i class="fa fa-plus"></i>Add Booking ',['controller'=>'jobs','action'=>'addbooking'],['escape' => false]); ?>
						</li>
						<li>
							<?=  	$this->Html->link('<i class="glyphicon glyphicon-user"></i>Booking Management ',['controller'=>'jobs','action'=>'index'],['escape' => false]); ?>
						</li>
					</ul>
				</li>	
				<li>
						  <?=  $this->Html->link('<i class="glyphicon glyphicon-home"></i> My Properties',['controller'=>'Invites','action'=>'index'],['escape' => false]); ?>
				</li>					
				<li>
						  <?=  $this->Html->link('<i class="glyphicon glyphicon-user"></i> Message',['controller'=>'Helps','action'=>'index'],['escape' => false]); ?>
				</li>
				<li>
					<?=  $this->Html->link('<i class="glyphicon glyphicon-user"></i> My Payments',['controller'=>'Payments','action'=>'index'],['escape' => false]); ?>
				</li>
				<li>
						  <?=  $this->Html->link('<i class="glyphicon glyphicon-user"></i> Invite Friends',['controller'=>'Invites','action'=>'index'],['escape' => false]); ?>
				</li>					
				<li>
						  <?=  $this->Html->link('<i class="glyphicon glyphicon-user"></i> Tera Help',['controller'=>'Helps','action'=>'index'],['escape' => false]); ?>
				</li>
				<li>
						  <?=  $this->Html->link('<i class="glyphicon glyphicon-user"></i> View Open Jobs',['controller'=>'Openjobs','action'=>'index'],['escape' => false]); ?>
				</li>
			</ul>
		</nav>
	</aside>