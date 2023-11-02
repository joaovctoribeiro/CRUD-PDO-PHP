<?php

	require 'Config/Database.php';

	/**
	 * Query SQL pra pegar todos os produtos registrados.
	 * 
	 * SQL Query to get all registered products.
	 */

	$result = $pdo->query("SELECT * FROM products ORDER BY id_product DESC");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD com PDO</title>
</head>
<body>

	<h1>Bem vindo, Admin.</h1>

	<a href="pages/add-product.php">Adicionar produto</a> |

	<h2>Confira a tabela dos produtos que estão registrados:</h2>

	<table>
		<tr>
			<td>Nome:</td>
			<td>Descrição:</td>
			<td>Preço:</td>
		</tr>

		<?php

			/**
			 * Renderizando os resultados do Banco de Dados.
			 * 
			 * Rendering the results from the Database.
			 */

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				echo "<tr>";
				echo "<td>".$row['product_name']."</td>";
				echo "<td>".$row['product_description']."</td>";
				echo "<td>".$row['product_price']."</td>";	
				echo "<td><a href=\"pages/edit-product.php?id=$row[id_product]\">Editar produto</a> | <a href=\"pages/delete-product.php?id=$row[id_product]\" onClick=\"return confirm('Você tem certeza que quer deletar este produto?')\">Deletar produto</a></td>";
			}

		?>

	</table>

</body>
</html>