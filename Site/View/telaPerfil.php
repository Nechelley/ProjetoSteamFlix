 <?php
	$ppb = "controller";
	$titulo = "Perfil Usuario";
	include_once("../View/Templates/header.php");
	$nav = "Perfil";
	include_once("../View/Templates/nav.php");
?>
<!-- Main -->
<div id="main-wrapper">
<div id="main" class="container">
<div class="row 200%">
<div class="12u">

<!-- Highlight -->
	<section class="box highlight">	
		<div class="divTitulo">
			<h1 class="titulo">Perfil</h1>
		</div>			
		<?php if($nivelAcesso == 0){
			echo "<div class=\"formulario\">
					<form class=\"formularioBotao\" action=\"../Controller/alterarUsuario.php\" method=\"post\">
						<input type=\"submit\" value=\"Alterar Dados\">
					</form>
					<form class=\"formularioBotao\"action=\"../Controller/deletarUsuario.php\" method=\"post\">
						<input type=\"submit\" value=\"Deletar Perfil\">
					</form>									
				<form action=\"NADA.php\" method=\"POST\">
					Primeiro Nome: <input type=\"text\" name=\"pNome\" value=\"".$pNome."\" readonly> <br/>
					Segundo Nome: <input type=\"text\" name=\"uNome\"  value=\"".$uNome."\" readonly> <br/>
					Email: <input type=\"text\" name=\"email\" value=\"".$email."\" readonly> <br/>
					Data de Nascimento: <input type=\"text\" name=\"dataNascimento\"  value=\"".$data."\" readonly> <br/>
					Foto de Perfil: <img class=\"fotoPerfil\" src=\"../Arquivos/FotosPerfil/".$img."\" alt=\"Foto perfil\"> <br/><br/>
				</form>
			</div>";
			}
			else{
				echo "<div clas=\"opcoesAdmin\">
					<form class=\"opcoesAdminBotoes\"action=\"../View/telaCadastroJogo.php\" method=\"post\">
						<input type=\"submit\" value=\"Add Jogo \">
					</form>
					<form class=\"opcoesAdminBotoes\"action=\"../View/telaBuscaJogoParaListar.php\" method=\"post\">
						<input type=\"submit\" value=\"Listar Jogo \">
					</form>
					<form class=\"opcoesAdminBotoes\" action=\"../View/telaBuscaJogoParaAlterar.php\" method=\"post\">
						<input type=\"submit\" value=\"Alterar Jogo\">
					</form>
					<form class=\"opcoesAdminBotoes\"action=\"../View/telaBuscaJogoParaExcluir.php\" method=\"post\">
						<input type=\"submit\" value=\"Drop Jogo \">
					</form>
				</div>
				<div class=\"formulario\">		
				<form action=\"NADA.php\" method=\"POST\">
					Primeiro Nome: <input type=\"text\" name=\"pNome\" value=\"".$pNome."\" readonly> <br/>
					Segundo Nome: <input type=\"text\" name=\"uNome\"  value=\"".$uNome."\" readonly> <br/>
					Email: <input type=\"text\" name=\"email\" value=\"".$email."\" readonly> <br/>
					Data de Nascimento: <input type=\"text\" name=\"dataNascimento\"  value=\"".$data."\" readonly> <br/>
					Cpf: <input type=\"text\" name=\"cpf\"  value=\"".$Cpf."\" readonly> <br/>					
					Salario: <input type=\"text\" name=\"Salario\"  value=\"".$Salario."\" readonly> <br/>					
					Foto de Perfil: <img class=\"fotoPerfil\" src=\"../Arquivos/FotosPerfil/".$img."\" alt=\"Foto perfil\"> <br/><br/>
				</form>
			</div>";	
			} 
		?>		
	</section>

</div>
</div>
</div>
</div>

<?php 
	include_once("../View/Templates/footer.php");
?>