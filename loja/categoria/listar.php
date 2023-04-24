<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Loja DougLand | Cadastrar categoria</title>
</head >
<body>
	<div class="container" >
			<h1>Lista de categoria de produtos</h1>
			<table>
				<thead>
				<th>Nome da categoria</th>
				<th colspan="2">Ações</th>
			</thead>	
				<tbody>

				<?php
					include '../config/conexao.php';
					//responsável por fazer a conexão com o bd
					$consulta = "SELECT * FROM categorias ORDER BY nome";
					//não é legal usar o asterisco pq ele aumenta a capacidade de processamento exigida pelo bd

					foreach ($bd->query($consulta) as $tupla_categoria) {
						$categoria_id = $tupla_categoria['id'];
						$nome_categoria = $tupla_categoria['nome'];

						echo "<tr>" .
								"<td>$nome_categoria</td>" .
								"<td><a href='editar.php?categoria=$categoria_id'><img src='../icones/editar.svg'></td>" .
								"<td><a href='excluir.php?categoria=$categoria_id'><img src='../icones/excluir.svg'></td>" .
								"</tr>";

			
					}
				?>
				</tbody>
			</table>

	</div>
</body>
</html>