<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<?php
			echo "<h1>Conectar a la BD</h1>";
			include("Clases/Dao.php");

			$db;
			$db = new Dao(array(
				'server_ip' => 'localhost',
				'server_user' => 'root',
				'server_password' => 'root',
				'server_db' => 'inventario_telematica'
			));

			//$db->query("update productos set pr_nombre = 'mi producto Octubre' where pr_id = 11");
			/*$db->query("
							insert into 
								productos
									(pr_codigo, pr_nombre, pr_preciocompra, pr_precioventa, pr_status)
								values
									('98', 'Hola', 56, 78, 1)
					");*/
			//$db->query("delete from productos where pr_id = 11");
			
			$datos = $db->query_array("select * from productos");
			//var_dump($datos);
		?>	
		<table>
			<thead>
				<th>Núm.</th>
				<th>Código</th>
				<th>Nombre</th>
				<th>P. Compra</th>
				<th>P. Venta</th>
			</thead>
			<tbody>
				<?php
					$cont = 0;
					foreach ($datos as $row => $item) {
							$cont++;
						?>
							<tr style="border: 1px solid blue;">
								<td><?php echo($cont); ?></td>
								<td><?php echo($item['pr_codigo']); ?></td>
								<td><?php echo(utf8_encode($item['pr_nombre'])); ?></td>
								<td><?php echo($item['pr_preciocompra']); ?></td>
								<td><?php echo($item['pr_precioventa']); ?></td>
							</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</body>
</html>


READ - SELECT
	
	select
		[campos]
	from
		[tabla]
	[where]
		[condicion]
	[order by]
		[campos]

	select pr_codigo from productos where pr_id = 5
	select * from productos where pr_nombre = 'producto 1'


CREATE - INSERT

	insert into
		[tabla]
			([campos])
		values
			[valores]

	insert into productos (pr_codigo, pr_nombre, pr_preciocompra) values ('87', 'producto 1', 5)


UPDATE - UPDATE

	update
		[tabla]
	set
		[valores]
	[where]
		[condicion]

	update productos set pr_codigo = '098', pr_nombre = '' where pr_id = 10


DELETE - DELETE

	delete from
		[tabla]
	[where]
		[condicion]

	delete from productos where pr_id = 12
	delete from productos where pr_id in (1, 5, 8, 10)