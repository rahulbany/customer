<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<title>Admin | <?php if(isset($admintitle_for_page)){ echo $admintitle_for_page; } else{  echo 'Page'; }; ?></title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<?php echo $this->Html->css('admin/bootstrap.min.css'); ?>
		<?php echo $this->Html->css('admin/font-awesome.min.css'); ?>
		
		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<?php echo $this->Html->css('admin/smartadmin-production-plugins.min.css'); ?>
		<?php echo $this->Html->css('admin/smartadmin-production.min.css'); ?>
		<?php echo $this->Html->css('admin/smartadmin-skins.min.css'); ?>
		<?php echo $this->Html->css('admin/smartadmin-rtl.min.css'); ?>
		<?php echo $this->Html->css('admin/demo.min.css'); ?>
		
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">
	</head>

	<body class="">
		<!--  Loading  main body content  here  -->
		<?php echo $this->fetch('content');  ?>
	</body>
</html>
