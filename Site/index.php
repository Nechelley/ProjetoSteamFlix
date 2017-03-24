</!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<meta name="author" content="Nechelley Alves">
		<meta name="description" content="Home do site SteamFlix">
		<link rel="stylesheet" href="View/css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<div class="principal">

			<header>
				<section class="logo">
					<figure>
						<img src="Arquivos/Images/logo.png" alt="Logo da SteamFlix" title="Logo da SteamFlix">
						<figcaption> SteamFlix </figcaption>
					</figure>
				</section>
				

					<h1> SteamFlix </h1>


				<section class="login">
					<a href="login">Login</a>
					<a href="cadastro">Cadastre-se</a>
				</section>
			</header>

			<nav id="menu">
				<section class="links">
					<ul><a href="#"><li>Home</li></a><a href="#"><li>Filmes</li></a><a href="#"><li>Jogos</li></a><a href="#"><li>Comunidades</li></a><a href="#"><li>Perfil</li></a></ul>
				</section>
				<section class="busca">
					<form>
						<input type="text" name="busca" placeholder=" Procurar no Site">
						<input type="submit" name="enviar" value="Buscar">
					</form>
				</section>
			</nav>
			
			<section class="content">
				<article class="slides">
					<?php 
						require_once '/Model/produto.php'; 
						$prodTeste = new Produto(1,100,/*[10,5,9]*/1059,18,15.50,20.50,"Comédia","Revolta Comedy","10-10-2000","15-10-2000","Ingles","Portugues",/*["abc","cde"]*/"abcdef","F C.A","cpt@email.com");

						echo $prodTeste->getFornecedorNome();
					?>
				</article>
				<article class="noticia">
					noticia 1
				</article>
				<article class="noticia">
					noticia 2
				</article>
				<article class="noticia">
					noticia 3
				</article>
				<article class="noticia">
					noticia 4
				</article>
				<article class="fim"></article>
			</section>
			<footer>Designed and developed by Diego, Nechelley. Copyright 2016-2017</footer>
		</div>
	</body>
</html>