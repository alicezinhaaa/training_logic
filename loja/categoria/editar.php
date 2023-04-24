<?php
	
	//quando o ícone editar na lista é clicado.
	//o id da categoria é recebidp via GET.
	if(isset($_GET['categoria'])){
	 	include '../config/conexao.php';
	 	$categoria_id = $_GET['categoria'];

	 	try{
	 		$consulta = "SELECT nome FROM categorias WHERE id=$categoria_id";

	 		foreach($bd->query($consulta) as $tupla_categoria) {
	 			$nome_categoria = $tupla_categoria['nome'];
	 			include 'formulario_edicao_categoria.html';
	 		}
	 	}catch(PDOException $e){
	 		echo $e->getMessage();
	 	}
	}

 	if(isset($_POST['edicao_categoria'])){
 		include '../config/conexao.php';
 		$nome_categoria = $_POST['nome_categoria'];
 		$categoria_id = $_POST['categoria_id'];

		try{

			$updateCategoria = "UPDATE categorias SET nome  = '$nome_categoria' WHERE id = '$categoria_id' ";
			$statement = $bd->prepare($updateCategoria);
			$statement->execute();

			$bd = null;
			header('Location:listar.php');


	 	}catch(PDOException $e){
	 		echo $e->getMessage();
		}
	}


?>