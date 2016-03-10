<div class="header">
	<div class="container">
		<?php echo $this->Html->link('', '/', array('class'=>'logo'));?>
		<a class="bacon" href="#"></a>
		<div class="nav-right">
			<nav>
				<ul>
					<li><?php echo $this->Html->link('How It Works', '/how-it-works');?></li>
					<li><?php echo $this->Html->link('Services', '/services');?></li>
					<li><?php echo $this->Html->link('Cities', '/city');?></li>
					<li><?php echo $this->Html->link('Partners', '/partners');?></li> 
					<li><?php  echo $this->Html->link('<i class="fa fa-facebook"></i>',"https://www.facebook.com/TerraLawnServiceApp",['escape' => false]);?></li> 
					<li><?php  echo $this->Html->link('<i class="fa fa-twitter"></i>',"https://twitter.com/terra_app",['escape' => false]);?></li> 
				</ul>
			</nav>
		</div>
	</div>
</div>
<script type="text/javascript">
		$( document ).ready(function() {
			$(".x-btn").click(function() {
				$(".green-banner").slideToggle();
			});
		});
</script>