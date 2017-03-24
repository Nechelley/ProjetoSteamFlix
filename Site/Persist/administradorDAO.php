<?php
class AdministradorDAO{
	public function cadastrar($adiministrador,$link){
 		$query = "call INSERIR_ADMINISTRADOR(
 			'$adiministrador->getEmail()','$adiministrador->getPNome()',
 			'$adiministrador->getUNome()', '$adiministrador->getSenha()',
 			'$adiministrador->getDataNascimento()',$adiministrador->getSalario(),
 			$adiministrador->getCpf(),$adiministrador->getRoot(),
 			'$adiministrador->getFotoPerfil()');"; 
		echo($query);
		if(!mysqli_query($link, $query)) {
			die('Não foi possível salvar: ' . mysqli_error($link));
		}
		echo 'Salvar bem sucedido';
	}

	public function consultar($adiministrador,$link){			
		$query = "SELECT * FROM ADMINISTRADOR WHERE Email = $adiministrador->getEmail();"; 
		$result = mysqli_query($link,$query);
		if (!$result) {
		    die("Não foi possível consultar: ".mysqli_error($link));
		}					
		echo "<br/>Consulta bem sucedida!";
		return $result;
	}

	public function alterar($adiministrador,$link){			
		$query = "call ATT_ADMINISTRADOR(
 			'$adiministrador->getEmail()','$adiministrador->getPNome()',
 			'$adiministrador->getUNome()', '$adiministrador->getSenha()',
 			'$adiministrador->getDataNascimento()',$adiministrador->getSalario(),
 			$adiministrador->getCpf(),$adiministrador->getRoot(),
 			'$adiministrador->getFotoPerfil()');"; 
		if (!mysqli_query($link,$query)) {
		    die("Não foi possível alterar: ".mysqli_error($link));
		}					
		echo "<br/>Alteração bem sucedida!";
	}

	public function deletar($adiministrador,$link){			
		$query = "DELETE ADMINISTRADOR 
			WHERE Email = $adiministrador->getEmail();"; 
		if (!mysqli_query($link,$query)) {
		    die("Não foi possível deletar: ".mysqli_error($link));
		}					
		echo "<br/>Exclusão bem sucedida!";
	}

}

?>