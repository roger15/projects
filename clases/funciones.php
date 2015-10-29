<?php
	include('DAO.php');
	class Producto{
		var $db;
		public function __construct(){
			$this->db=new Dao(array(
				'server_ip' => 'localhost',
				'server_user' => 'root',
				'server_password' => '',
				'server_db' => 'inventario_telematica',
			));
		}

		public function guardar($codigo, $nombre, $categoria, $preciocompra, $precioventa){
			$response = array ('done' => false, 'msg' => 'No se pudo guardar el producto');
			if($codigo != '' && $nombre != '' && $categoria !='' && $preciocompra !='' && $precioventa!=''){
				if(!($this->verificar($codigo))){
					$this->db->query("
						insert into productos(pr_codigo, pr_nombre, pr_categoria, pr_preciocompra, pr_precioventa) 
						values('$codigo', '$nombre', $categoria, $preciocompra, $precioventa)
					"); 
					$response['done']=true;
					$response['msg']='Producto guardado';
				}
				else
				 	$response['msg']='Ya existe un producto con el codigo que indicó'; 
			}else
					$response['msg']='Llene todos los campos con *';
			return $response; 
		} //Cierre de funcion guardar

		private function verificar($codigo){
			$res= $this->db->query_array("select count(*) as existe from productos where pr_codigo ='$codigo'");
			if(intval($res[0]['existe'])!=0)
				return true;
			else 
				return false; 
		} //Cierre de funcion verificar

	} //Cierre de la clase general 
   	  //Cierre de PHP 
?>	