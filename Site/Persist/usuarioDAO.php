<?php
class UsuarioDAO{
	public function cadastrar($usuario,$link){
 		$query = "call INSERIR_USUARIO('".$usuario->getEmail()."','".$usuario->getPNome()."',
 			'".$usuario->getUNome()."', '".$usuario->getSenha()."',
 			".$usuario->getDataNascimento().",".$usuario->getStilPoints().",
 			'".$usuario->getFotoPerfil()."');"; 
		echo($query)."<br>";
		if(!mysqli_query($link, $query)) {
			die('Não foi possível salvar: ' . mysqli_error($link));
		}
		echo 'Salvar bem sucedido';
	}

	public function consultar($usuario,$link){			
		$query = "SELECT * FROM USUARIO_COMUM WHERE Email = $usuario->getEmail();"; 
		$result = mysqli_query($link,$query);
		if (!$result) {
		    die("Não foi possível consultar: ".mysqli_error($link));
		}					
		echo "<br/>Consulta bem sucedida!";
		return $result;
	}

	public function alterar($usuario,$link){			
		$query = "CALL ATT_USUARIO('$usuario->getEmail()','$usuario->getPNome()',
 			'$usuario->getUNome()', '$usuario->getSenha()',
 			'$usuario->getDataNascimento()',$usuario->getStilPoints(),
 			'$usuario->getFotoPerfil()');";
		if (!mysqli_query($link,$query)) {
		    die("Não foi possível alterar: ".mysqli_error($link));
		}					
		echo "<br/>Alteração bem sucedida!";
	}

	public function deletar($usuario,$link){			
		$query = "DELETE USUARIO_COMUM 
			WHERE Email = $usuario->getEmail();"; 
		if (!mysqli_query($link,$query)) {
		    die("Não foi possível deletar: ".mysqli_error($link));
		}					
		echo "<br/>Exclusão bem sucedida!";
	}

}

?>