<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo SITENAME; ?></title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="<?php echo URLROOT; ?>/manifest.json" rel="manifest">

	<!-- Backup PWA support -->
	<meta name="theme-color" content="#aaa">
	<meta name="apple-mobile-web-app-status-bar-style" content="#aaa">

	<meta name="apple-mobile-web-app-capable" content="yes"> <!-- iOS -->
  <meta name="mobile-web-app-capable" content="yes"> <!-- Android -->

	<!-- Favicon and backup touch icon support -->
	<link rel="icon" type="image/png" href="<?php echo URLROOT; ?>/img/icons/icon_36.png">

	<link rel="icon" sizes="192x192" href="<?php echo URLROOT; ?>/img/icons/icon_192.png">
	<link rel="icon" sizes="144x144" href="<?php echo URLROOT; ?>/img/icons/icon_144.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URLROOT; ?>/img/icons/icon_144.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo URLROOT; ?>/img/icons/icon_144.png">

	<!--  SEO -->
	<meta name="description" content="<?php echo SITENAME; ?>">
	<meta name="keywords" content="">
	<meta name="robots" content="index,follow,noodp">

	<meta itemprop="name" content="<?php echo SITENAME; ?>">
	<meta itemprop="description" content="">
	<meta itemprop="image" content="">

	<!-- Social media -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@">
	<meta name="twitter:title" content="<?php echo SITENAME; ?>">
	<meta name="twitter:description" content="">
	<meta name="twitter:creator" content="@">
	<meta name="twitter:image:src" content="">

	<meta property="og:title" content="<?php echo SITENAME; ?>" />
	<meta property="og:url" content="<?php echo URLROOT; ?>" />
	<meta property="og:image" content="" />
	<meta property="og:description" content="" />
	<meta property="og:site_name" content="<?php echo SITENAME; ?>" />
	<meta property="og:locale" content="en_UK" />


	<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/minified/style.css">
</head>
<body>
	<div class="page-wrapper">
		<?php require APPROOT . '/views/inc/navbar.php'; ?>
