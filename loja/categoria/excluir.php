<?php
	if(isset($_GET['categorias'])){
		$categoria_id = $_GET['categorias'];
		include '../config/conexao.php';

		try{

			$consulta = "SELECT nome FROM categorias WHERE id = $categoria_id";

			foreach($bd->query($consulta) as $tupla_categoria){
				$nome_categoria = $tupla_categoria['nome'];
				include 'formulario_excluir_categoria.html';
			}
			$bd = null;


		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	

	if(isset($_POST['confirmar_exclusao'])){
		$categoria_id = $_GET['categorias'];
		include '../config/conexao.php';

		try{
			$excluirCategoria = "DELETE FROM categorias WHERE id = $categoria_id";

			$statement = $bd->prepare($excluirCategoria);

			$statement->execute();

			//A conexão com o banco é encerrada.
			$bd = null;

			header('Location:listar.php');
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>