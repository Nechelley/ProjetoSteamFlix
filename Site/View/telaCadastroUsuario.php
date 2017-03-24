 <!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Cadastro Usuario</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="html5up-txt/assets/css/main.css" />
		<link rel="stylesheet" href="html5up-txt/assets/css/styleTemplate.css" />		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<div class="logo container">
						<div>
							<h1><a href="index.php" id="logo"><img src="../Arquivos/Images/logo.png" alt="SteamFlix" class="imglogo"></a></h1>
							<p>SteamFlix</p>
						</div>
					</div>
				</header>

			<!-- Nav -->
				<nav id="nav">
					<ul>
						<li><a href="../index.php">Home</a></li>						
						<li><a href="telaFilmes.php">Filmes</a></li>
						<li><a href="telaJogos.php">Jogos</a></li>
						<li><a href="telaComunidades.php">Comunidades</a></li>
						<li class="current"><a href="#">Perfil</a></li>
						<li><a href="telaMySpace.php">MySpace</a></li>
					</ul>
				</nav>

			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
						<div class="row 200%">
							<div class="12u">

								<!-- Highlight -->
									<section class="box highlight">
										<h1>Cadastro</h1>
										<form action="../Controller/cadastrar.php" method="POST" enctype="multipart/form-data" class="formulario">
											Primeiro Nome: <input type="text" name="pNome" maxlength="20" required="true"> <br/>
											Segundo Nome: <input type="text" name="uNome" maxlength="20" required="true"> <br/>
											Email: <input type="text" name="email" maxlength="45" required="true"> <br/>
											Senha: <input type="password" name="senha" maxlength="100" required="true"> <br/>
											Data de Nascimento: <input type="text" pattern="\d{1,2}/\d{1,2}/\d{4}"  name="dataNascimento" placeholder="dd/mm/aaaa" required="true"> <br/>
											<input type="submit" value="Enviar">
										</form>
									</section>

							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<footer id="footer" class="container">
					<div class="row 200%">
						<div class="12u">

							<!-- About -->
								<section>
									<h2 class="major"><span>O que é o SteamFlix?</span></h2>
									<p>
										SteamFlix é <strong>a revolução</strong>, para os que curtem 
										algum tipo de jogo e/ou filme e não querem ficar comprando
										os produtos de um determinado peersonagem ou série em lugares diferentes. Aqui tudo isso pode ser feito em um único lugar
										Apreveite e divirta-se :)
									</p>
								</section>

						</div>
					</div>
					<div class="row 200%">
						<div class="12u">

							<!-- Contact -->
								<section>
									<h2 class="major"><span>Entre em contato conosco!</span></h2>
									<ul class="contact">
										<li><a class="icon fa-facebook" href="#"><span class="label">Facebook</span></a></li>
										<li><a class="icon fa-twitter" href="#"><span class="label">Twitter</span></a></li>
										<li><a class="icon fa-instagram" href="#"><span class="label">Instagram</span></a></li>
										<li><a class="icon fa-dribbble" href="#"><span class="label">Dribbble</span></a></li>
										<li><a class="icon fa-google-plus" href="#"><span class="label">Google+</span></a></li>
									</ul>
								</section>

						</div>
					</div>

					<!-- Copyright -->
						<div id="copyright">
							<ul class="menu">
								<li>Designed and Developed by Diego Sousa e Nechelley Alves using html5up-txt &copy; 2016-2017. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>

				</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>