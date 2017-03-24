<?php
class FornecedorDAO{
	public function cadastrar($fornecedor,$link){
 		$query = "INSERT INTO FORNECEDOR VALUES('$fornecedor->getNome()','$fornecedor->getEmail()')"; 
		echo($query);
		if(!mysqli_query($link, $query)) {
			die('Não foi possível salvar: ' . mysqli_error($link));
		}
		echo 'Salvar bem sucedido';
	}

	public function consultar($fornecedor,$link){			
		$query = "SELECT * FROM FORNECEDOR WHERE Nome = $fornecedor->getNome();"; 
		$result = mysqli_query($link,$query);
		if (!$result) {
		    die("Não foi possível consultar: ".mysqli_error($link));
		}					
		echo "<br/>Consulta bem sucedida!";
		return $result;
	}

	public function alterar($fornecedor,$link){			
		$query = "UPDATE FORNECEDOR
			SET 
			Email='$fornecedor->getEmail()',
			Nome='$fornecedor->getNome()',
			WHERE Nome = $fornecedor->getNome();"; 
		if (!mysqli_query($link,$query)) {
		    die("Não foi possível alterar: ".mysqli_error($link));
		}					
		echo "<br/>Alteração bem sucedida!";
	}

	public function deletar($fornecedor,$link){			
		$query = "DELETE FORNECEDOR 
			WHERE Nome = $fornecedor->getNome();"; 
		if (!mysqli_query($link,$query)) {
		    die("Não foi possível deletar: ".mysqli_error($link));
		}					
		echo "<br/>Exclusão bem sucedida!";
	}

}

?>