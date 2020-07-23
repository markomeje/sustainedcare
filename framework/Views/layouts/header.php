<?php ob_start(); ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
	<!-- COMPULSORY META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= IMAGES_URL; ?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= IMAGES_URL; ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= IMAGES_URL; ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= IMAGES_URL; ?>/favicon/site.webmanifest">
    <!-- SITE TITLE -->
    <title><?= isset($title) ? $title : SOFWARE_NAME; ?></title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" type="text/css" href="<?= PUBLIC_URL ;?>/bootstrap/bootstrap.min.css">
    <!-- General CSS -->
    <link rel="stylesheet" type="text/css" href="<?= PUBLIC_URL ;?>/css/general.css">
    <!-- aos CSS -->
    <link rel="stylesheet" type="text/css" href="<?= PUBLIC_URL ;?>/aos/aos.css">
    <!-- aos CSS -->
    <link rel="stylesheet" type="text/css" href="<?= PUBLIC_URL ;?>/aos/animate.css">
    <!-- Homepage CSS -->
    <link rel="stylesheet" type="text/css" href="<?= PUBLIC_URL ;?>/css/frontend.css">
    <!-- Chart CSS -->
    <link rel="stylesheet" type="text/css" href="<?= PUBLIC_URL ;?>/chartjs/chart.min.css">
    <!-- Homepage CSS -->
    <link rel="stylesheet" type="text/css" href="<?= PUBLIC_URL ;?>/css/backend.css">
    <!-- ico font css -->
    <link rel="stylesheet" type="text/css" href="<?= PUBLIC_URL ;?>/fonts/icofont/icofont.min.css">
</head>
<body>
<div class="preloader"></div>