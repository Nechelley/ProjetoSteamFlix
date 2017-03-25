<!-- Banner -->
<div id="banner-wrapper">
	<section id="banner">
		<h2>Bem-Vindo ao SteamFlix</h2>
		<p>Um site incrível onde você encontra todos os seus filmes e jogos prediletos</p>
		<?php
			if($nivelAcesso == -1){
				echo "<a href=\"View/TelaCadastroUsuario.php\" class=\"button\">Cadastre-se</a>";
			}
		?>
	</section>
</div>