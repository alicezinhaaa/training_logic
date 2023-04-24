<?php
	
	//quando o ícone editar na lista é clicado.
	//o id da categoria é recebidp via GET.
	if(isset($_GET['produto'])){
	 	include '../config/conexao.php';
	 	$produto_id = $_GET['produto'];

	 	try{
	 		$consulta = "SELECT nome FROM produto WHERE id=$produto_id";

	 		foreach($bd->query($consulta) as $tupla_produto) {
	 			$nome_produto = $tupla_produto['nome'];
	 			include 'formulario_edicao_produto.html';
	 		}
	 	}catch(PDOException $e){
	 		echo $e->getMessage();
	 	}
	}

 	if(isset($_POST['edicao_produto'])){
 		include '../config/conexao.php';
 		$nome_produto = $_POST['nome_produto'];
 		$produto_id = $_POST['produto_id'];

		try{

			$updateProduto = "UPDATE produto SET nome  = '$nome_produto' WHERE id = '$produto_id' ";
			$statement = $bd->prepare($updateProduto);
			$statement->execute();

			$bd = null;
			header('Location:listar_produto.php');


	 	}catch(PDOException $e){
	 		echo $e->getMessage();
		}
	}


?>