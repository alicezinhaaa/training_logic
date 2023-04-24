<body>
	<div class="container" >
			<h1>Lista de produtos</h1>
			<table>
				<thead>
				<th>Nome do produto</th>
				<th colspan="2">Ações</th>
			</thead>	
				<tbody>

				<?php
					include '../config/conexao.php';
					//responsável por fazer a conexão com o bd
					$consulta = "SELECT * FROM produto ORDER BY nome";
					//não é legal usar o asterisco pq ele aumenta a capacidade de processamento exigida pelo bd

					foreach ($bd->query($consulta) as $tupla_produto) {
						$produto_id = $tupla_produto['id'];
						$nome_produto = $tupla_produto['nome'];

						echo "<tr>" .
								"<td>$nome_produto</td>" .
								"<td><a href='editar_produto.php?produto=$produto_id'><img src='../icones/editar.svg'></td>" .
								"<td><a href='excluir_produto.php?produto=$produto_id'><img src='../icones/excluir.svg'></td>" .
								"</tr>";

			
					}
				?>
				</tbody>
			</table>

	</div>
</body>
</html>