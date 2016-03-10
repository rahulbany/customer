<?php echo $this->Html->css('adminDestop/style.css');  ?>
<aside class="sidebar">
	<h1>
		<a href="<?php echo $this->Url->build(array("controller" => "dashboard","action" => "index")); ?>">
			<?php echo $this->Html->image('adminDestop/logo.png');  ?>
		</a>
	</h1>
	<ul>
		<li> 
			<?php echo $this->Html->image('adminDestop/home.png');  ?>
			<a href="<?php echo $this->Url->build(array("controller" => "dashboard","action" => "index")); ?>">Dashboard</a>				
		</li>
		<li>
			<?php echo $this->Html->image('adminDestop/profile.png');  ?> 
			<a href="javascript:void()"><span class="menu-item-parent">My Profile</span></a>
			<ul class="subnav">
				<li>
					<?= $this->Html->link('<i class="glyphicon glyphicon-user"> </i> My Profile',['controller'=>'Profiles','action'=>'index'],['escape' => false]); ?>
				</li>
				<li>
					<?=  $this->Html->link('<i class="glyphicon glyphicon-user"> </i> Change Password',['controller'=>'Profiles','action'=>'changepass'],['escape' => false]); ?>
				</li>
			</ul>
		</li>
		<li>
			<?php echo $this->Html->image('adminDestop/requsts.png');  ?> 
			<a href="javascript:void()"><span class="menu-item-parent">Request</span></a>
			<ul>
				<li>
					<?=  	$this->Html->link('<i class="fa fa-plus"></i> Add Booking ',['controller'=>'jobs','action'=>'addbooking'],['escape' => false]); ?>
				</li>
				<li>
					<?=  	$this->Html->link('<i class="glyphicon glyphicon-user"></i> Booking Management ',['controller'=>'jobs','action'=>'index'],['escape' => false]); ?>
				</li>
			</ul>
		</li>	
		<li>
			<?php echo $this->Html->image('adminDestop/home.png');  ?> 
			<a href="javascript:void()"><span class="menu-item-parent">My Properties</span></a>
			<ul>
				<li>
					<?=  	$this->Html->link('<i class="fa fa-plus"></i> Add Property ',['controller'=>'Properties','action'=>'addproperty'],['escape' => false]); ?>
				</li>
				<li>
					<?=  	$this->Html->link('<i class="glyphicon glyphicon-user"></i> My Properties ',['controller'=>'Properties','action'=>'index'],['escape' => false]); ?>
				</li>
			</ul>
		</li>
		<li>
			<?php echo $this->Html->image('adminDestop/messages.png');  ?> 
			<a href="<?php //echo $this->Url->build(array("controller" => "messages","action" => "index")); ?>">Messages</a>
		</li>
		<li>
			<?php echo $this->Html->image('adminDestop/payments.png');  ?> 
			<a href="javascript:void()"><span class="menu-item-parent">My Payments</span></a>
			<ul>
				<li>
					<?=  	$this->Html->link('<i class="fa fa-plus"></i> Add Creditcard ',['controller'=>'Payments','action'=>'addcreditcard'],['escape' => false]); ?>
				</li>
				<li>
					<?=  	$this->Html->link('<i class="glyphicon glyphicon-user"></i> My Payments ',['controller'=>'Payments','action'=>'index'],['escape' => false]); ?>
				</li>
			</ul>
		</li>
		<li>
			<?php echo $this->Html->image('adminDestop/invite.png');  ?> 
			<a href="<?php echo $this->Url->build(array("controller" => "Invites","action" => "index")); ?>">Invite Friends</a>
		</li>
		<li>
			<?php echo $this->Html->image('adminDestop/help.png');  ?> 
			<a href="<?php echo $this->Url->build(array("controller" => "Helps","action" => "index")); ?>">Terra Help</a>
		</li>
	</ul>
	<a class="logout" href="<?php echo $this->Url->build(array("controller" => "users","action" => "logout")); ?>">logout</a>
</aside>