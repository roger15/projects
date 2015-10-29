<?php
	define('p_title','.:: Actualizar Producto ::.');
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

	$valor=$_GET['pr_id'];
	
	$info = $db->query_array("select * from productos where pr_id=$valor");
	
	$pr_categoria_array = array('', '', '', '', '');
	$pr_categoria_array[$info[0]['pr_categoria']] = 'selected = "selected"'; //Colocar opcion del Select 
?>
	<h1>Modificar Producto</h1>
		<div class="row">
			<form action="mod.php" class="form" method="POST">

			<div class="form-group col-xs-12">
				<p class="col-xs-4">
					<label for=""><span>*</span> Núm. Control</label>
					<br />
					<input type="text" class="form-control" value="<?php echo($info[0]['pr_codigo']) ?>" placeholder="Ej. 0578D" name="pr_codigo"/>
				</p>
			</div>

			<div class="form-group col-xs-12">
				<p class="col-xs-8">
					<label for=""><span>*</span> Nombre del producto</label>
					<br />
					<input type="text" class="form-control" value="<?php echo($info[0]['pr_nombre']) ?>" placeholder="Ej. Papel Higienico" name="pr_nombre" autofocus />
				</p>
			</div>

			<div class="form-group col-xs-12">
				<p class="col-xs-8">
					<label for=""><span>*</span> Categoría</label>
					<br />
					<select name="pr_categoria" id="" class="form-control">
						<option value="">--Seleccione una categoria--</option>
						<option value="1" <?php echo($pr_categoria_array[1]) ?>> Consumibles</option>
						<option value="2" <?php echo($pr_categoria_array[2]) ?>> Aseo Personal</option>
						<option value="3" <?php echo($pr_categoria_array[3]) ?>> Herramientas</option>
						<option value="4" <?php echo($pr_categoria_array[4]) ?>> Atencion Personal</option>
					</select>
				</p>
			</div>

			<div class="form-group col-xs-12">
				<p class="col-xs-3">
					<label for=""><span>*</span>Precio Compra</label>
					<br />
					<input type="text" class="form-control" value="<?php echo($info[0]['pr_preciocompra']) ?>" placeholder="$0.00" name="pr_preciocompra">
				</p>
			</div>

			<div class="form-group col-xs-12">
				<p class="col-xs-3">
					<label for=""><span>*</span>Precio Venta</label>
					<br />
					<input type="text" class="form-control" value="<?php echo($info[0]['pr_precioventa']) ?>" placeholder="$0.00" name="pr_precioventa">
				</p>
			</div>

			<div class="form-group col-xs-12">
				<p class="col-xs-4">
					<input type="submit" value="Actualizar" name="btnguardar" class="btn btn-success">
				</p>
			</div>	
			<div><input type="hidden" value="<?php echo($valor) ?>" name='pr_id'></div>
			</form>
		</div>

<?php
	include('templates/footer.php');
?>