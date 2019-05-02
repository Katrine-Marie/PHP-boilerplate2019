<!DOCTYPE html>
<html lang="en">
<head>
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

	<title><?php echo SITENAME; ?></title>

	<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/minified/style.css">
</head>
<body>
	<div class="page-wrapper">
		<?php require APPROOT . '/views/inc/navbar.php'; ?>
