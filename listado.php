<?php
	define('p_title','.:: Listado de Productos ::.');
	include('templates/header.php');
	include("clases/Dao.php");

	session_start();
	if (!(isset($_SESSION['acceso']))){
		header('Location: login.php');
	}

	$db;
	$db = new Dao(array(
		'server_ip' => 'localhost',
		'server_user' => 'root',
		'server_password' => '',
		'server_db' => 'inventario_telematica'
	));

	$datos = $db->query_array("select * from productos");
?>
	<h1>Listado de Productos</h1>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<th>Núm</th>
				<th>Código</th>
				<th>Nombre</th>
				<th>$CPA</th>
				<th>$VTA</th>
				<th>Categoría</th>
				<th>Status</th>
				<th>Acciones</th>
			</thead>
			<tbody>
				<?php
					$cont = 0;
					foreach ($datos as $row => $item) {
							$cont++;
				?>
							<tr>
								<td><?php echo($cont); ?></td>
								<td><?php echo($item['pr_codigo']); ?></td>
								<td><?php echo(utf8_encode($item['pr_nombre'])); ?></td>
								<td><?php echo($item['pr_preciocompra']); ?></td>
								<td><?php echo($item['pr_precioventa']); ?></td>
								<td>
									<?php 
										$cat;
										if($item['pr_categoria']==1)
											$cat="Consumibles";
										else if($item['pr_categoria']==2)
											$cat="Aseo Personal";
										else if($item['pr_categoria']==3)
											$cat="Herramientas";
										else if($item['pr_categoria']==4)
											$cat="Atención Personal";
									?>	   
										<span class="label label-default"><?php echo($cat) ?></span>
								</td>
								<td>
									<?php
										$st;
										if($item['pr_status']==1)
											$st="Activo";
										else if($item['pr_status']==0)
											$st="Inactivo";
									?>
										<span class="label label-success"><?php echo($st) ?></span>
								</td>
								
								<td>
									<form action="" method="GET">
										 <a href="modificar.php?pr_id=<?php echo($item['pr_id']); ?>">
											 <button type="button" class="btn btn-info">
													<span class="glyphicon glyphicon-pencil"></span>
											 </button>
										 </a>

										 <a href="eliminar.php?pr_id=<?php echo($item['pr_id']); ?>">
											 <button type="button" class="btn btn-danger">
													<span class="glyphicon glyphicon-trash"></span>
											 </button>
										</a>
									</form>
								</td>
										
							</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
<?php
	include('templates/footer.php');
?>