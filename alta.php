<?php
	define('p_title','.:: Alta de Productos ::.');
	include('templates/header.php');
	/*
	include("clases/Dao.php");
	
	$db;
	$db = new Dao(array(
		'server_ip' => 'localhost',
		'server_user' => 'root',
		'server_password' => '',
		'server_db' => 'inventario_telematica'
	));
	*/

	session_start();
	if (!(isset($_SESSION['acceso']))){
		header('Location: login.php');
	}
	else{
		header('Content-Type: text/html charset=utf-8');
		$pr_codigo=(isset($_POST['pr_codigo'])) ? trim($_POST['pr_codigo']) : '';
		$pr_nombre=(isset($_POST['pr_nombre'])) ? utf8_decode(trim($_POST['pr_nombre'])) : '';
		$pr_categoria=(isset($_POST['pr_categoria'])) ? trim($_POST['pr_categoria']) : '';
		$pr_preciocompra=(isset($_POST['pr_preciocompra'])) ? trim($_POST['pr_preciocompra']) : '';
		$pr_precioventa=(isset($_POST['pr_precioventa'])) ? trim($_POST['pr_precioventa']) : '';

		$pr_categoria_array=array('','','','','');
		$pr_categoria_array[$pr_categoria]='selected="selected"'; 
	}
	if(isset($_POST['btnguardar'])){
		session_start();
		if (!(isset($_SESSION['acceso']))){
			header('Location: login.php');
		}
		else{
			include('clases/funciones.php');
			$producto_class=new Producto();
			$response=$producto_class->guardar($pr_codigo,$pr_nombre,$pr_categoria,$pr_preciocompra,$pr_precioventa);
			if($response['done']){
				$pr_codigo='';
				$pr_nombre='';
				$pr_categoria='';
				$pr_preciocompra='';
				$pr_precioventa='';
			}
		} //Cierre del ELSE
	}	
?>
	<h1>Alta de Productos</h1>
	<div class="row">
		<form action="alta.php" class="form" method="POST">
			<?php
				if(isset($response))
					if(is_array($response)){
			?>
					<div class="alert alert-<?php echo(($response['done']) ? 'success' : 'danger') ?>">
						<?php echo($response['msg']); ?>						
					</div>
			<?php
					}
			?>

			<div class="form-group col-xs-12">
				<p class="col-xs-4">
					<label for=""><span>*</span> Núm. Control</label>
					<br />
					<input type="text" class="form-control" placeholder="Ej. 0578D" name="pr_codigo" />
				</p>
			</div>

			<div class="form-group col-xs-12">
				<p class="col-xs-8">
					<label for=""><span>*</span> Nombre del producto</label>
					<br />
					<input type="text" class="form-control" placeholder="Ej. Papel Higienico" name="pr_nombre" />
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
					<input type="text" class="form-control" placeholder="$0.00" name="pr_preciocompra">
				</p>
			</div>

			<div class="form-group col-xs-12">
				<p class="col-xs-3">
					<label for=""><span>*</span>Precio Venta</label>
					<br />
					<input type="text" class="form-control" placeholder="$0.00" name="pr_precioventa">
				</p>
			</div>

			<div class="form-group col-xs-12">
				<p class="col-xs-4">
					<input type="submit" value="Guardar" name="btnguardar" class="btn btn-success">
				</p>
			</div>					
		</form>
	</div>
<?php
	include('templates/footer.php');
?>