<?php
	if(isset($_GET['produto'])){
		$produto_id = $_GET['produto'];
		include '../config/conexao.php';

		try{

			$consulta = "SELECT nome FROM produto WHERE id = $produto_id";

			foreach($bd->query($consulta) as $tupla_produto){
				$nome_produto = $tupla_produto['nome'];
				include 'formulario_excluir_produto.html';
			}
			$bd = null;


		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	

	if(isset($_POST['confirmar_exclusao'])){
		$produto_id = $_GET['produto'];
		include '../config/conexao.php';

		try{
			$excluirProduto = "DELETE FROM produto WHERE id = $produto_id";

			$statement = $bd->prepare($excluirProduto);

			$statement->execute();

			//A conexão com o banco é encerrada.
			$bd = null;

			header('Location:listar_produto.php');
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>