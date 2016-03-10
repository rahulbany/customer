<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<meta charset="utf-8">
		
			<?php
			if(isset($pagesTitle) && !empty($pagesTitle)){
				echo '<title>'.$pagesTitle.'</title>';
			}
			else{  
				echo '<title>Page</title>'; 
			}; 
			?> 
		
		<?php echo $this->Html->css('front/css/style.css'); ?>
		<?php echo $this->Html->css('front/fonts/helveticaneue.css'); ?>
		<?php echo $this->Html->css('front/css/custom.css'); ?>
		<?php echo $this->Html->css('front/css/media.css'); ?>
		<?php echo $this->Html->css('front/css/font-awesome.min.css'); ?>
		<?php echo $this->Html->meta ( 'favicon.ico','/img/images/favicon.ico', array ('type' => 'icon', 'rel'=>'icon') );?>
		
		<!-- scripts --> 
		<?php echo $this->Html->script('jquery.min.js'); ?>
		<script type="text/javascript">
			$( document ).ready(function() {
				$(".bacon").click(function() {
				$(".nav-right").slideToggle();
			});
			});
		</script>
		<?php echo $this->Html->script('parallax.js'); ?>
		<?php echo $this->Html->script('admin/js/jquery.validate.min.js'); ?>
	</head>
	<body>
		<?php echo $this->fetch('content'); ?>
	</body>
</html>