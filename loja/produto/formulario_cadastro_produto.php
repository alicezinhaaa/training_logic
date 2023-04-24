<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Loja DougLand | Cadastrar produto</title>
</head>
<body>
	<div class="container" >
			<h1>Cadastro de produtos</h1>
			<form enctype="multipart/form-data" method="POST" action="">
				<fieldset>
					<div class="form-group">
						<label for="input_nome_produto">Nome do produto</label>
						<input class="form-control" id="input_nome_produto" type="text" name="nome_produto" required>
					</div>
					<div>
						<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />Little foto do produto: <input name="arquivo" type="file" />
					</div>
					
					
				<select name="categoria">
					<option value="" disabled>Selecione uma opção</option>
				<?php
					include '../config/conexao.php';
					//responsável por fazer a conexão com o bd
					$consulta = "SELECT * FROM categorias ORDER BY nome";
					//não é legal usar o asterisco pq ele aumenta a capacidade de processamento exigida pelo bd

					foreach ($bd->query($consulta) as $tupla_categoria) {
						$categoria_id = $tupla_categoria['id'];
						$nome_categoria = $tupla_categoria['nome'];

						echo "<option value='$categoria_id'>$nome_categoria</option>";

			
					}
				?>
				</select>
				<button class="botao" type="submit" name="cadastro_produto">Cadastrar</button>	
				</fieldset>		
			</form>
	</div>
</body>
</html>
