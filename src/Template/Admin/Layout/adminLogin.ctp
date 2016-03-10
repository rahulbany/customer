<!DOCTYPE html>
<html lang="en-us" id="extr-page">
	<head>
		<meta charset="utf-8">
		<title>Admin | <?php if(isset($admintitle_for_page)){ echo $admintitle_for_page; } else{  echo 'Page'; }; ?></title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		
		<!--  Loading all type of css here -->
	   <!-- #CSS Links -->
		<!-- Basic Styles -->
		<?php echo $this->Html->css('admin/bootstrap.min.css'); ?>
		<?php echo $this->Html->css('admin/font-awesome.min.css'); ?>

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		
		<?php echo $this->Html->css('admin/smartadmin-production-plugins.min.css'); ?>
		<?php echo $this->Html->css('admin/smartadmin-production.min.css'); ?>
		<?php echo $this->Html->css('admin/smartadmin-skins.min.css'); ?>

		<!-- SmartAdmin RTL Support -->
		<?php echo $this->Html->css('admin/smartadmin-rtl.min.css'); ?>

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<?php echo $this->Html->css('admin/demo.min.css'); ?>

		<!-- #FAVICONS -->
		
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
	   
	   <!-- #APP SCREEN / ICONS -->
		<!-- Specifying a Webpage Icon for Web Clip 
		Ref:https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">
		
	</head>

	<body class="animated fadeInDown">
		<!--  Loading  main body content  here  -->
		<?php echo $this->fetch('content');  ?>
		
		<!-- Loading all type of js here -->
		<!--================================================== -->	
		<?php echo $this->Html->script('plugin/pace/pace.min.js'); ?>
		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
	 	
	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local --> 
		<?php echo $this->Html->script('jquery.min.js'); ?>
		<?php echo $this->Html->script('jquery-ui.min.js'); ?>
		<!-- IMPORTANT: APP CONFIG -->
		<?php echo $this->Html->script('app.config.js'); ?>
		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->
		<!-- BOOTSTRAP JS -->		
		<?php echo $this->Html->script('bootstrap/bootstrap.min.js'); ?>
		<!-- JQUERY VALIDATE -->
		<?php echo $this->Html->script('plugin/jquery-validate/jquery.validate.min.js'); ?>
		<!-- JQUERY MASKED INPUT -->
		<?php echo $this->Html->script('plugin/masked-input/jquery.maskedinput.min.js'); ?>
		<?php echo $this->Html->script('app.min.js'); ?>
		<script type="text/javascript">
			runAllForms();
			$(function() {
				$("#login-form").validate({
					rules : {
						username : {
							required : true
						},
						password : {
							required : true
						}
					},
					messages : {
						email : { 
							required : 'Please enter your email address',
							email : 'Please enter a VALID email address'
						},
						password : {
							required : 'Please enter your password'
						}
					},
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
			});
		</script>
	</body>
</html>
