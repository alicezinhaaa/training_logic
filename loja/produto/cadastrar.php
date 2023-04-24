<?php
	include "../config/conexao.php";

	if(isset($_POST['cadastro_produto'])){
		
		$nome_produto = $_POST['nome_produto'];
		$categoria_id = $_POST['categoria'];
		

		//verificar se um arquivo foi recebido
		if(isset($_FILES['arquivo'])){
			//Verificar se o arquivo recebido foi subido sem erro
			if($_FILES['arquivo']['error'] === UPLOAD_ERR_OK){
				$diretorio_destino = __DIR__ . '\imagens';
				$extensoes_aceitas = array("image/jpeg","image/jpg","image/png");
				$nome_arquivo_original = basename($_FILES['arquivo']['name']);
				$arquivo_temporario = $_FILES['arquivo']['tmp_name'];
				$extensao_arquivo = $_FILES['arquivo']['type'];

    //Verificar se a extensão do arquivo está dentro das extensões aceitas
			    if(in_array($extensao_arquivo,$extensoes_aceitas)){
			    	if(move_uploaded_file($arquivo_temporario,"$diretorio_destino/$nome_arquivo_original")){
			    		cadastrarProduto($nome_produto,$categoria_id,$nome_arquivo_original);
			    		echo "Upload de arquivo realizado com sucesso";
			    	}else{
			    		echo "Não foi possível processar o upload";
			    	}
			    }else{
			    	echo "O formato $extensao_arquivo não foi aceito";
			    }
			}
		}
	}


	function cadastrarProduto($nome_produto,$categoria_id,$nome_arquivo_original){
     	include '../config/conexao.php';

     	try{
     		$insertCategoria = "INSERT INTO produto (nome,imagem,categoria_id) VALUES ('$nome_produto','$nome_arquivo_original',$categoria_id)";

     		$statement = $bd->prepare($insertCategoria);

     		$statement->execute();

     		$bd = null;
     	}catch(PDOException $e){
     		echo $e->getMessage();
     	}
     }

	include 'formulario_cadastro_produto.php';

?>
