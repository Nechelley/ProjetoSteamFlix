<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title><?php echo $titulo; ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="<?php if($ppb == "index"){echo "View/";} else if($ppb == "controller"){echo "../View/";} ?>html5up-txt/assets/css/main.css" />
	<link rel="stylesheet" href="<?php if($ppb == "index"){echo "View/";} else if($ppb == "controller"){echo "../View/";} ?>html5up-txt/assets/css/styleTemplate.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body class="homepage">
<div id="page-wrapper">

<!-- Header -->
	<header id="header">
		<div class="logo container">
			<div>
				<h1><a href="<?php if($ppb == "view" || $ppb == "controller"){echo "../";} ?>index.php" id="logo"><img src="<?php if($ppb == "view" || $ppb == "controller"){echo "../";} ?>Arquivos/Images/logo.png" alt="SteamFlix" class="imglogo"></a></h1>
				<p>SteamFlix</p>
			</div>
		</div>
	</header>