<?php
class UsuarioDAO{
	public function cadastrar($usuario,$link){
 		$query = "call INSERIR_USUARIO(
 			'".$usuario->getEmail()."','".$usuario->getPNome()."',
 			'".$usuario->getUNome()."', '".$usuario->getSenha()."',
 			".$usuario->getDataNascimento().",".$usuario->getStilPoints().",
 			'".$usuario->getFotoPerfil()."');"; 
		if(!mysqli_query($link, $query)) {
			die('Não foi possível salvar: ' . mysqli_error($link));
		}
	}

	public function consultar($email,$link){			
		$query = "SELECT * FROM USUARIO_COMUM WHERE Email = '".$email."';"; 
		$result = mysqli_query($link,$query);
		if (!$result) {
		    die("Não foi possível consultar: ".mysqli_error($link));
		}					
		return $result;
	}

	public function alterar($usuario,$link){			
		$query = "call ATT_USER('".$usuario->getEmail()."','".$usuario->getPNome()."',
 			'".$usuario->getUNome()."', '".$usuario->getSenha()."',
 			".$usuario->getDataNascimento().",".$usuario->getStilPoints().",
 			'".$usuario->getFotoPerfil()."');"; 
		if (!mysqli_query($link,$query)) {
		    die("Não foi possível alterar: ".mysqli_error($link));
		}					
	}

	public function deletar($email,$link){			
		$query = "DELETE FROM USUARIO_COMUM 
			WHERE Email = '".$email."';";
		if (!mysqli_query($link,$query)) {
		    die("Não foi possível deletar: ".mysqli_error($link));
		}					
	}

}

?>