<!-- Nav -->
<nav id="nav">
	<ul>
		<li <?php if($nav == "Home"){ echo "class=\"current\"";} ?> ><a href="<?php if($ppb == "index"){ echo ""; }else if($ppb == "view" || $ppb == "controller"){ echo "../";} ?>index.php">Home</a></li>						
		<?php
			$bar = "<li ";
			if($nivelAcesso == -1){//n logado
				if($nav == "Login"){ 
					$bar .= "class=\"current\"";
				};
				$bar .= "><a href=\"";
				if($ppb == "index"){
					$bar .= "View/";
				}
				else if($ppb == "view"){ 
					$bar .= "";
				}
				$bar .= "telaLogin.php\">Login</a></li>";
				echo $bar;
			}
			else{
				if($nav == "Perfil"){ 
					$bar .= "class=\"current\"";
				};
				$bar .= "><a href=\"";
				if($ppb == "index"){
					$bar .= "Controller/";
				}
				else if($ppb == "view"){ 
					$bar .= "../Controller/";
				}
				$bar .= "consultarUsuario.php\">Perfil</a></li>";
				echo $bar;

				$bar = "<li ";
				$bar .= "><a href=\"";
				if($ppb == "index"){
					$bar .= "Controller/";
				}
				else if($ppb == "view"){ 
					$bar .= "../Controller/";
				}
				$bar .= "deslogarUsuario.php\">Sair</a></li>";
				echo $bar;
			}
		?>		
	</ul>
</nav>